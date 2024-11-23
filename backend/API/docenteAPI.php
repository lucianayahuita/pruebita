<?php
include '../conectar.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST': // Insertar nuevo docente
        handlePost();
        break;
    case 'GET': // Obtener todos los docentes
        handleGet();
        break;
    default:
        echo json_encode(['message' => 'Método no soportado']);
        break;
}

function handlePost()
{
    if (!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['nombre'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $ap_paterno = $_POST['ap_paterno'] ?? null;
        $ap_materno = $_POST['ap_materno'] ?? null;
        $correo = $_POST['correo'] ?? null;
        $tipo_docente = $_POST['tipo_docente'] ?? null;

        $foto_docente = null;

        // Procesar la foto subida
        if (isset($_FILES['foto_docente']) && $_FILES['foto_docente']['error'] === UPLOAD_ERR_OK) {
            $foto = $_FILES['foto_docente'];
            $nombreTemporal = $foto['tmp_name'];
            $nombreArchivo = uniqid("foto_docente_", true) . "_" . basename($foto['name']);
            $rutaCarpeta = __DIR__ . "/fotos_docentes/"; // Carpeta de destino
            $foto_docente = "API/fotos_docentes/" . $nombreArchivo;

            // Crear la carpeta si no existe
            if (!is_dir($rutaCarpeta)) {
                mkdir($rutaCarpeta, 0777, true);
            }

            // Mover la imagen a la carpeta
            if (!move_uploaded_file($nombreTemporal, $rutaCarpeta . $nombreArchivo)) {
                echo json_encode(["message" => "Error al mover la imagen subida."]);
                return;
            }
        }

        $mysqli = conexion();
        $stmt = $mysqli->prepare("INSERT INTO docente (usuario, password, nombre, ap_paterno, ap_materno, correo, tipo_docente, foto_docente, eliminado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0)");

        if ($stmt === false) {
            echo json_encode(["message" => "Error en la preparación de la consulta: " . $mysqli->error]);
            return;
        }

        $stmt->bind_param("ssssssss", $usuario, $password, $nombre, $ap_paterno, $ap_materno, $correo, $tipo_docente, $foto_docente);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Docente registrado correctamente"]);
        } else {
            echo json_encode(["message" => "Error al registrar el docente: " . $stmt->error]);
        }
    } else {
        echo json_encode(["message" => "Datos incompletos"]);
    }
}

function handleGet()
{
    $mysqli = conexion();
    $result = $mysqli->query("SELECT * FROM docente WHERE eliminado = 0");

    $docentes = [];
    while ($row = $result->fetch_assoc()) {
        $rutaImagen = $row['foto_docente'];
        $rutaCompleta = "http://localhost/proyecto/login/backend/" . $rutaImagen;

        $docentes[] = [
            'id' => $row['id_docente'],
            'imagen' => $rutaCompleta,
            'nombre' => $row['nombre'],
            'descripcion' => trim($row['ap_paterno'] . ' ' . $row['ap_materno']),
            'email' => $row['correo'],
            'tipo_docente' => $row['tipo_docente'],
        ];
    }

    echo json_encode($docentes);
}
?>
