<?php
// Ejecuta este archivo UNA sola vez (desde el navegador) para crear el
// usuario administrador inicial. Después puedes borrarlo si quieres.

require_once __DIR__ . '/config/Database.php';

$nombre_usuario = 'admin';
$contrasena_plana = 'admin123';

$conn = (new Database())->conectar();

$verificar = $conn->prepare('SELECT id FROM usuarios WHERE nombre_usuario = :u');
$verificar->bindParam(':u', $nombre_usuario);
$verificar->execute();

if ($verificar->fetch()) {
    echo "El usuario '{$nombre_usuario}' ya existe. No se creó ninguno nuevo.";
} else {
    $hash = password_hash($contrasena_plana, PASSWORD_BCRYPT);

    $insertar = $conn->prepare('INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (:u, :c)');
    $insertar->bindParam(':u', $nombre_usuario);
    $insertar->bindParam(':c', $hash);
    $insertar->execute();

    echo "Usuario '{$nombre_usuario}' creado con contraseña '{$contrasena_plana}'. ";
    echo 'Ya puedes borrar este archivo (crear_admin.php) si quieres.';
}
