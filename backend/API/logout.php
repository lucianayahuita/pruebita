<?php
session_start(); // Inicia la sesión si no está iniciada

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al login después de cerrar sesión
echo json_encode(['success' => true]);
?>
