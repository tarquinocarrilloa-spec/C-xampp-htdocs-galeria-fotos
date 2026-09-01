-- Base de datos: Galería de Fotos (MVC)
-- Motor: MariaDB / MySQL

CREATE DATABASE IF NOT EXISTS galeria_fotos
    CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE galeria_fotos;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS fotos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(120) NOT NULL,
    descripcion TEXT NULL,
    ruta_archivo VARCHAR(255) NOT NULL,
    usuario_id INT NULL,
    fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- El usuario administrador NO se inserta aquí a mano: se crea ejecutando
-- crear_admin.php una vez, para que la contraseña quede cifrada
-- correctamente con password_hash() de PHP.
