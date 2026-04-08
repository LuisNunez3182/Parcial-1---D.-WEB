<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destruir la sesion
unset($_SESSION['usuario']);
session_destroy();

// Redirigir al login
header('Location: ../public/login.php');
exit();
?>