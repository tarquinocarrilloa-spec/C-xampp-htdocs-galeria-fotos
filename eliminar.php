<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/FotoController.php';

if (!AuthController::estaLogueado()) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    (new FotoController())->eliminar((int) $_GET['id']);
}

header('Location: index.php');
exit;
