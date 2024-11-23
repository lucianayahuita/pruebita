<?php
include '../conectar.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST': // Insertar
        if (!is_dir('documentos_revista')) {
            mkdir('documentos_revista', 0777, true); // Crear carpeta con permisos
        }
        handlePost();
        break;
    case 'DELETE': // Eliminar
        handleDelete();
        break;
    case 'GET': // Obtener
        handleGet();
        break;
    default:
        echo json_encode(['message' => 'Método no soportado']);
        break;
}

function handlePost() {
    // Verificar que los datos necesarios estén presentes
    if (!empty($_POST['numero']) && !empty($_POST['tema_revista']) && !empty($_FILES['revista'])) {
        $numero = $_POST['numero'];
        $tema_revista = $_POST['tema_revista'];

        // Obtener la fecha actual
        date_default_timezone_set('America/La_Paz');
        $fecha_publicacion_revista = date('Y-m-d');

        // Manejo del archivo
        $file = $_FILES['revista'];
        $nombre = basename($file['name']);
        $tipo = $file['type'];
        $ruta_provisional = $file['tmp_name'];
        $size = $file['size'];
        $carpeta = "documentos_revista/";

        // Validaciones del archivo
        if (!this.$refs.revistaFile.files || this.$refs.revistaFile.files.length === 0) {
            alert("Por favor, selecciona un archivo PDF.");
            return;
          }
                  
        if ($size > 30 * 1024 * 1024) { // 30 MB
            echo json_encode(["message" => "Error: Tamaño máximo permitido es 30 MB."]);
            return;
        }

        $rutaCompleta = $carpeta . $nombre;

        if (!move_uploaded_file($ruta_provisional, $rutaCompleta)) {
            echo json_encode([
                "message" => "Error al subir el archivo.",
                "ruta_provisional" => $ruta_provisional,
                "rutaCompleta" => $rutaCompleta,
                "error" => error_get_last()
            ]);
            return;
        }

        // Insertar en la base de datos
        $mysqli = conexion();
        $stmt = $mysqli->prepare("INSERT INTO revista (numero, tema_revista, fecha_publicacion_revista, revista, eliminado) VALUES (?, ?, ?, ?, 0)");

        if ($stmt === false) {
            echo json_encode(["message" => "Error en la preparación de la consulta: " . $mysqli->error]);
            return;
        }

        $stmt->bind_param("isss", $numero, $tema_revista, $fecha_publicacion_revista, $rutaCompleta);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Revista registrada correctamente"]);
        } else {
            echo json_encode(["message" => "Error al registrar la revista: " . $stmt->error]);
        }
    } else {
        echo json_encode(["message" => "Datos incompletos"]);
    }
}

function handleDelete() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data['id_revista'])) {
        $id_revista = $data['id_revista'];
        $mysqli = conexion();

        $stmt = $mysqli->prepare("UPDATE revista SET eliminado = 1 WHERE id_revista = ?");
        $stmt->bind_param("i", $id_revista);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Revista eliminada exitosamente"]);
        } else {
            echo json_encode(["message" => "Error al eliminar la revista"]);
        }
    } else {
        echo json_encode(["message" => "ID de la revista no proporcionada"]);
    }
}

function handleGet() {
    $mysqli = conexion();
    $result = $mysqli->query("SELECT * FROM revista WHERE eliminado = 0");

    $revistas = [];
    while ($row = $result->fetch_assoc()) {
        $rutaRevista = $row['revista'];
        $rutaCompleta = "http://localhost/proyecto/login/backend/" . $rutaRevista;

        $revistas[] = [
            'id_revista' => $row['id_revista'],
            'numero' => $row['numero'],
            'tema_revista' => $row['tema_revista'],
            'fecha_publicacion_revista' => $row['fecha_publicacion_revista'],
            'revista' => $rutaCompleta
        ];
    }

    echo json_encode($revistas);
}
?>
