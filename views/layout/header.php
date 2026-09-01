<?php $logueado = AuthController::estaLogueado(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Galería de Fotos</title>
<link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
<header class="cabecera">
    <a class="marca" href="index.php">Galería</a>
    <nav class="nav">
        <?php if ($logueado): ?>
            <a href="index.php">Inicio</a>
            <a href="agregar.php">Agregar foto</a>
            <a href="agregar_usuario.php">+ Usuarios</a>
            <span class="usuario-activo"><?= htmlspecialchars($_SESSION['nombre_usuario']) ?></span>
            <a href="logout.php">Salir</a>
        <?php else: ?>
            <a href="login.php">Iniciar sesión</a>
        <?php endif; ?>
    </nav>
</header>
<main class="contenido">
