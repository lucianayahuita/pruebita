<?php
include '../conectar.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET': // Obtener todas las noticias
        handleGet();
        break;
    case 'POST': // Registrar una nueva noticia
        handlePost();
        break;
    case 'DELETE': // Eliminar una noticia
        handleDelete();
        break;
    default:
        echo json_encode(['message' => 'Método no soportado']);
        break;
}

function handleGet() {
    $mysqli = conexion();
    $result = $mysqli->query("SELECT id_noticia, titulo_noticia, contenido_noticia, imagen_noticia FROM noticia WHERE eliminado = 0");
    $noticias = [];

    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }

    echo json_encode($noticias); // Devuelve solo noticias no eliminadas
}

function handlePost() {
    if (!empty($_POST['titulo_noticia']) && !empty($_POST['contenido_noticia']) && !empty($_FILES['imagen_noticia']['name'])) {
        $titulo_noticia = $_POST['titulo_noticia'];
        $contenido_noticia = $_POST['contenido_noticia'];

        // Procesar el archivo subido
        $foto = $_FILES['imagen_noticia'];
        $nombreTemporal = $foto['tmp_name'];
        $imagen_noticia = "imagenes/" . uniqid("img_", true) . "_" . basename($foto['name']);

        if (move_uploaded_file($nombreTemporal, $imagen_noticia)) {
            $mysqli = conexion();
            $stmt = $mysqli->prepare("INSERT INTO noticia (titulo_noticia, contenido_noticia, imagen_noticia, eliminado) VALUES (?, ?, ?, 0)");
            $stmt->bind_param("sss", $titulo_noticia, $contenido_noticia, $imagen_noticia);

            if ($stmt->execute()) {
                echo json_encode(["message" => "Datos guardados correctamente"]);
            } else {
                echo json_encode(["message" => "Error al guardar en la base de datos"]);
            }
        } else {
            echo json_encode(["message" => "Error al mover el archivo"]);
        }
    } else {
        echo json_encode(["message" => "Datos incompletos"]);
    }
}

function handleDelete() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data['id_noticia'])) {
        $mysqli = conexion();
        $stmt = $mysqli->prepare("UPDATE noticia SET eliminado = 1 WHERE id_noticia = ?");
        $stmt->bind_param("i", $data['id_noticia']);

        if ($stmt->execute()) {
            echo json_encode(["message" => "noticia eliminada exitosamente"]);
        } else {
            echo json_encode(["message" => "Error al eliminar la noticia"]);
        }
    } else {
        echo json_encode(["message" => "ID no proporcionado"]);
    }
}
