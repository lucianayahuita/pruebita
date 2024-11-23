<?php
include '../conectar.php';

header('Content-Type: application/json');

try {
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        // Obtener conexión desde conectar.php
        $mysqli = conexion();

        // Preparar consulta segura
        $stmt = $mysqli->prepare("SELECT * FROM docente WHERE usuario = ? AND password = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
        }

        $stmt->close();
        $mysqli->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error interno del servidor', 'error' => $e->getMessage()]);
}
?>
