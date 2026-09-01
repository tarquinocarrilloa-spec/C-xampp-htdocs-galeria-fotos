<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';

if (AuthController::estaLogueado()) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new AuthController();
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    if ($auth->iniciarSesion($nombre_usuario, $contrasena)) {
        header('Location: index.php');
        exit;
    }
    $error = 'Usuario o contraseña incorrectos.';
}

require __DIR__ . '/views/layout/header.php';
require __DIR__ . '/views/login.php';
require __DIR__ . '/views/layout/footer.php';
