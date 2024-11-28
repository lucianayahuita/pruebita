<?php
include '../conectar.php';

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        if (!is_dir('documentos_tesis')) {
            mkdir('documentos_tesis', 0777, true); // Crear la carpeta si no existe
        }
        handlePost();
        break;
    case 'DELETE':
        handleDelete();
        break;
    case 'GET':
        handleGet();
        break;
    default:
        echo json_encode(['message' => 'Método no soportado']);
        break;
}

function handlePost() {
    // Verificar si los datos son completos
    if (!empty($_POST['titulo_tesis']) && !empty($_POST['fecha_publicacion_tesis']) && !empty($_FILES['tesis']) && !empty($_POST['autor_tesis'])) {
        $titulo_tesis = $_POST['titulo_tesis'];
        $fecha_publicacion_tesis = $_POST['fecha_publicacion_tesis'];
        $autor_tesis = $_POST['autor_tesis'];
        $file = $_FILES['tesis'];

        $nombre = $file['name'];
        $tipo = $file['type'];
        $ruta_provisional = $file['tmp_name'];
        $size = $file['size'];
        $carpeta = "documentos_tesis/";

        // Verificar si el archivo es un PDF
        if ($tipo !== 'application/pdf') {
            echo json_encode(["message" => "El archivo debe ser un PDF"]);
            return;
        }

        // Verificar el tamaño del archivo (máximo 100MB)
        if ($size > 100 * 1024 * 1024) { // 100 MB
            echo json_encode(["message" => "El archivo no puede superar los 100MB"]);
            return;
        }

        // Establecer la ruta donde se guardará el archivo
        $src = $carpeta . $nombre;

        // Mover el archivo a la carpeta
        if (move_uploaded_file($ruta_provisional, $src)) {
            $tesis = $src;
        } else {
            echo json_encode(["message" => "Error al guardar el archivo"]);
            return;
        }

        // Conectar a la base de datos y guardar los datos
        $mysqli = conexion();
        $stmt = $mysqli->prepare("INSERT INTO tesis (titulo_tesis, fecha_publicacion_tesis, tesis, autor_tesis, eliminado) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("ssss", $titulo_tesis, $fecha_publicacion_tesis, $tesis, $autor_tesis);

        // Ejecutar la consulta e informar el resultado
        if ($stmt->execute()) {
            echo json_encode(["message" => "Tesis registrada correctamente"]);
        } else {
            echo json_encode(["message" => "Error al registrar la Tesis: " . $stmt->error]);
        }
    } else {
        echo json_encode(["message" => "Datos incompletos"]);
    }
}

function handleDelete() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data['id_tesis'])) {
        $id_tesis = $data['id_tesis'];
        $mysqli = conexion();
        $stmt = $mysqli->prepare("UPDATE tesis SET eliminado = 1 WHERE id_tesis = ?");
        $stmt->bind_param("i", $id_tesis);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Tesis eliminada exitosamente"]);
        } else {
            echo json_encode(["message" => "Error al eliminar la Tesis"]);
        }
    } else {
        echo json_encode(["message" => "ID de la Tesis no proporcionada"]);
    }
}

function handleGet() {
    // Conectar a la base de datos y obtener las tesis
    $mysqli = conexion();
    $result = $mysqli->query("SELECT * FROM tesis WHERE eliminado = 0");

    $tesis = [];
    while ($row = $result->fetch_assoc()) {
        // Ruta completa para acceder al archivo PDF
        $rutaTesis = $row['tesis'];
        $rutaCompleta = "http://localhost/proyecto/login/backend/API/" . $rutaTesis;

        $tesis[] = [
            'id_tesis' => $row['id_tesis'],
            'titulo_tesis' => $row['titulo_tesis'],
            'fecha_publicacion_tesis' => $row['fecha_publicacion_tesis'],
            'tesis' => $rutaCompleta,  // Ruta completa del archivo
            'autor_tesis' => $row['autor_tesis'],
        ];
    }

    // Enviar los datos en formato JSON
    echo json_encode($tesis);
}
?>
