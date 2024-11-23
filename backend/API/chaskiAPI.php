<?php
include '../conectar.php';

// Configuración de encabezados para la API
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Obtener el método HTTP de la solicitud
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        if (!is_dir('documentos_chaskis')) {
            mkdir('documentos_chaskis', 0777, true); // Crear la carpeta si no existe
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

// Función para manejar inserciones
function handlePost() {
    if (isset($_POST['titulo_chaski'], $_POST['numero'], $_FILES['chaskiposta']) &&
    !empty($_POST['titulo_chaski']) &&
    !empty($_POST['numero']) &&
    !empty($_FILES['chaskiposta']['name'])) {
    $titulo_chaski = $_POST['titulo_chaski'];
    $numero = $_POST['numero'];

    $file = $_FILES['chaskiposta'];
    $nombre = time() . "_" . basename($file['name']); // Nombre único
    $tipo = $file['type'];
    $ruta_provisional = $file['tmp_name'];
    $size = $file['size'];
    $carpeta = "documentos_chaskis/";
    $rutaCompleta = $carpeta . $nombre;

    if ($tipo !== 'application/pdf') {
        echo json_encode(["message" => "El archivo debe ser un PDF"]);
        return;
    }
    if ($size > 30 * 1024 * 1024) {
        echo json_encode(["message" => "El archivo no puede superar los 30MB"]);
        return;
    }
    if (!move_uploaded_file($ruta_provisional, $rutaCompleta)) {
        echo json_encode(["message" => "Error al subir el archivo"]);
        return;
    }

    $mysqli = conexion();
    $stmt = $mysqli->prepare("INSERT INTO chaskiposta (titulo_chaski, numero, chaskiposta, eliminado) VALUES (?, ?, ?, 0)");
    if ($stmt === false) {
        echo json_encode(["message" => "Error en la preparación de la consulta: " . $mysqli->error]);
        return;
    }
    $stmt->bind_param("sis", $titulo_chaski, $numero, $rutaCompleta);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Chaskiposta registrada correctamente"]);
    } else {
        echo json_encode(["message" => "Error al registrar la chaskiposta: " . $stmt->error]);
    }
} else {
    echo json_encode(["message" => "Datos incompletos o archivo no proporcionado."]);
}

}

// Función para manejar eliminaciones lógicas
function handleDelete() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data['id_chaskiposta'])) {
        $id_chaskiposta = $data['id_chaskiposta'];
        $mysqli = conexion();

        $stmt = $mysqli->prepare("UPDATE chaskiposta SET eliminado = 1 WHERE id_chaskiposta = ?");
        $stmt->bind_param("i", $id_chaskiposta);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Chaskiposta eliminada correctamente"]);
        } else {
            echo json_encode(["message" => "Error al eliminar la chaskiposta"]);
        }
    } else {
        echo json_encode(["message" => "ID de la chaskiposta no proporcionado"]);
    }
}

// Función para manejar consultas
function handleGet() {
    $mysqli = conexion();
    $result = $mysqli->query("SELECT * FROM chaskiposta WHERE eliminado = 0");

    $chaskipostas = [];
    while ($row = $result->fetch_assoc()) {
        $rutaChaskiposta = $row['chaskiposta'];
        $rutaCompleta = "http://localhost/proyecto/login/backend/" . $rutaChaskiposta;

        $chaskipostas[] = [
            'id_chaskiposta' => $row['id_chaskiposta'],
            'titulo_chaski' => $row['titulo_chaski'],
            'numero' => $row['numero'],
            'chaskiposta' => $rutaCompleta
        ];
    }

    echo json_encode($chaskipostas);
}
?>
