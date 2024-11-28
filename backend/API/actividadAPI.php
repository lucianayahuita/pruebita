<?php
include '../conectar.php';

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
$mysqli = conexion();
switch ($method) {
    case 'POST': // Insertar 
        handlePost($mysqli);
        break;
    case 'GET': // Obtener 
        handleGet($mysqli); // Pasa $mysqli como argumento
        break;
    case 'PATCH': //Actualiazr
        handlePatch($mysqli);
        break;
    case 'DELETE': // Eliminar
        handleDelete($mysqli);
        break;
    default:
        echo json_encode(['message' => 'Método no soportado']);
        break;
}
function handlePost($mysqli) {
    if (
        !empty($_POST['nombre_actividad']) && 
        !empty($_POST['fecha_actividad']) && 
        !empty($_POST['hora_actividad']) && 
        !empty($_POST['lugar_actividad'])
    ) {
        $nombre_actividad = $_POST['nombre_actividad'];
        $fecha_actividad = $_POST['fecha_actividad'];
        $hora_actividad = $_POST['hora_actividad'];
        $lugar_actividad = $_POST['lugar_actividad'];

        $stmt = $mysqli->prepare("INSERT INTO actividad (nombre_actividad, fecha_actividad, hora_actividad, lugar_actividad, completada, eliminado) VALUES (?, ?, ?, ?, 0, 0)");

        if ($stmt === false) {
            echo json_encode(["message" => "Error en la preparación de la consulta: " . $mysqli->error]);
            return;
        }

        $stmt->bind_param("ssss", $nombre_actividad, $fecha_actividad, $hora_actividad, $lugar_actividad);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Actividad registrada correctamente"]);
        } else {
            echo json_encode(["message" => "Error al registrar la Actividad: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["message" => "Datos incompletos"]);
    }
}
function handleDelete($mysqli)
{
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data['id_actividad'])) {
        $id_actividad = $data['id_actividad']; // Cambia a $data en lugar de $_POST

        $stmt = $mysqli->prepare("UPDATE actividad SET eliminado = 1 WHERE id_actividad = ?");
        if ($stmt === false) {
            echo json_encode(["message" => "Error en la preparación de la consulta: " . $mysqli->error]);
            return;
        }

        $stmt->bind_param("i", $id_actividad);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Actividad eliminada exitosamente"]);
        } else {
            echo json_encode(["message" => "Error al eliminar la Actividad: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["message" => "ID de la actividad no proporcionada"]);
    }
}
function handleGet($mysqli) {
    $stmt = $mysqli->prepare("SELECT * FROM actividad WHERE eliminado = 0");

    if ($stmt === false) {
        echo json_encode(["message" => "Error en la preparación de la consulta: " . $mysqli->error]);
        return;
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        echo json_encode(["message" => "Error al obtener las actividades"]);
        return;
    }

    $activities = $result->fetch_all(MYSQLI_ASSOC);

    if (empty($activities)) {
        echo json_encode(["message" => "No se encontraron actividades"]);
    } else {
        echo json_encode($activities);
    }

    $stmt->close();
}

?>