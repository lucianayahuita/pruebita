<?php
include '../conectar.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
try {
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);
        if (strlen($usuario) > 20 || strlen($password) > 20) {
            echo json_encode(['success' => false, 'message' => 'Usuario o contraseña inválidos']);
            exit;
        }
        $mysqli = conexion();
        $stmt = $mysqli->prepare("SELECT id_docente, password FROM docente WHERE usuario = ? AND (eliminado IS NULL OR eliminado = 0)");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password']; 
            if ($password === $storedPassword) {
                echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
            }
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
