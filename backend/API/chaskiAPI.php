<?php
include '../conectar.php';

// Configuración de encabezados para la API
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Obtener el método HTTP de la solicitud
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        if (!is_dir('docs_chaskis')) {
            mkdir('docs_chaskis', 0777, true); // Crear la carpeta si no existe
        }
        handlePost();
        break;
    case 'PUT':
        handleUpdate();
        break;
    case 'DELETE':
        handleDelete();
        break;
    case 'GET':
        if (isset($_GET['titulo_chaski'])) {
            handleSearch();
        } else {
            handleGet();
        }
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
        $carpeta = "docs_chaskis/";
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

// Función para manejar actualizaciones
function handleUpdate() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id_chaskiposta'], $data['titulo_chaski'], $data['numero'], $data['ruta_chaskiposta']) &&
        !empty($data['id_chaskiposta']) &&
        !empty($data['titulo_chaski']) &&
        !empty($data['numero']) &&
        !empty($data['ruta_chaskiposta'])) {

        $id_chaskiposta = $data['id_chaskiposta'];
        $titulo_chaski = $data['titulo_chaski'];
        $numero = $data['numero'];
        $ruta_chaskiposta = $data['ruta_chaskiposta'];

        $mysqli = conexion();
        $stmt = $mysqli->prepare("UPDATE chaskiposta SET titulo_chaski = ?, numero = ?, chaskiposta = ? WHERE id_chaskiposta = ?");
        if ($stmt === false) {
            echo json_encode(["message" => "Error en la preparación de la consulta: " . $mysqli->error]);
            return;
        }
        $stmt->bind_param("sisi", $titulo_chaski, $numero, $ruta_chaskiposta, $id_chaskiposta);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Chaskiposta actualizada correctamente"]);
        } else {
            echo json_encode(["message" => "Error al actualizar la chaskiposta: " . $stmt->error]);
        }
    } else {
        echo json_encode(["message" => "Datos incompletos o incorrectos"]);
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

// Función para manejar consultas con vista previa
function handleGet() {
    $mysqli = conexion();
    $result = $mysqli->query("SELECT * FROM chaskiposta WHERE eliminado = 0");

    $chaskipostas = [];
    while ($row = $result->fetch_assoc()) {
        $rutaChaskiposta = $row['chaskiposta'];
        $rutaCompleta = "http://localhost/proyecto/login/backend/API/" . $rutaChaskiposta;

        $chaskipostas[] = [
            'id_chaskiposta' => $row['id_chaskiposta'],
            'titulo_chaski' => $row['titulo_chaski'],
            'numero' => $row['numero'],
            'chaskiposta' => $rutaCompleta,
            'vista_previa' => "<iframe src='$rutaCompleta' width='100%' height='600px'></iframe>"
        ];
    }

    echo json_encode($chaskipostas);
}

// Función para manejar búsquedas
function handleSearch() {
    $mysqli = conexion();
    $chaskipostas = [];

    if (!empty($_GET['titulo_chaski'])) {
        $titulo_chaski = "%" . $_GET['titulo_chaski'] . "%";
        $stmt = $mysqli->prepare("SELECT * FROM chaskiposta WHERE eliminado = 0 AND titulo_chaski LIKE ?");
        $stmt->bind_param("s", $titulo_chaski);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $row['chaskiposta'] = "http://localhost/proyecto/login/backend/" . $row['chaskiposta'];
                $chaskipostas[] = $row;
            }
        }
    }

    echo json_encode($chaskipostas);
}
?>