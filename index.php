<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/FotoController.php';

$fotoController = new FotoController();
$fotos = $fotoController->listar();

require __DIR__ . '/views/layout/header.php';
require __DIR__ . '/views/galeria.php';
require __DIR__ . '/views/layout/footer.php';
