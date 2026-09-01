<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/FotoController.php';

if (!AuthController::estaLogueado()) {
    header('Location: login.php');
    exit;
}

$mensaje = '';
$fotoController = new FotoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    if ($titulo === '' || !isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        $mensaje = 'Ingresa un título y selecciona una imagen válida.';
    } else {
        $resultado = $fotoController->subir($titulo, $descripcion, $_FILES['imagen'], $_SESSION['usuario_id']);
        if ($resultado['ok']) {
            header('Location: index.php');
            exit;
        }
        $mensaje = $resultado['mensaje'];
    }
}

require __DIR__ . '/views/layout/header.php';
require __DIR__ . '/views/agregar.php';
require __DIR__ . '/views/layout/footer.php';
