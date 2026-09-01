<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/models/Usuario.php';

if (!AuthController::estaLogueado()) {
    header('Location: login.php');
    exit;
}

$usuarioModel = new Usuario();
$mensaje = '';
$tipo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';
    $confirmar = $_POST['confirmar_contrasena'] ?? '';

    if ($nombre === '' || $contrasena === '') {
        $mensaje = 'Completa todos los campos.';
        $tipo = 'error';
    } elseif (!preg_match('/^[A-Za-z0-9_.-]{3,50}$/', $nombre)) {
        $mensaje = 'El usuario debe tener entre 3 y 50 caracteres y solo puede usar letras, números, punto, guion y guion bajo.';
        $tipo = 'error';
    } elseif (strlen($contrasena) < 6) {
        $mensaje = 'La contraseña debe tener al menos 6 caracteres.';
        $tipo = 'error';
    } elseif ($contrasena !== $confirmar) {
        $mensaje = 'Las contraseñas no coinciden.';
        $tipo = 'error';
    } else {
        $resultado = $usuarioModel->crear($nombre, $contrasena);
        $mensaje = $resultado['mensaje'];
        $tipo = $resultado['ok'] ? 'exito' : 'error';
        if ($resultado['ok']) {
            $_POST = [];
        }
    }
}

$usuarios = $usuarioModel->listar();

require __DIR__ . '/views/layout/header.php';
require __DIR__ . '/views/agregar_usuario.php';
require __DIR__ . '/views/layout/footer.php';
