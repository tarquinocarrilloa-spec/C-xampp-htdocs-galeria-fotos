# Galería de Fotos — PHP MVC + MariaDB

Sistema sencillo de galería de fotos en PHP puro (patrón MVC), con inicio
de sesión para poder agregar y eliminar fotos. Pensado para correr en
XAMPP con MariaDB.

## Estructura

```
galeria-fotos/
├── config/         -> Conexión a la base de datos (Database.php)
├── models/         -> Usuario.php, Foto.php (hablan con la base de datos)
├── controllers/    -> AuthController.php, FotoController.php (lógica)
├── views/          -> Plantillas HTML/PHP que ve el usuario
├── public/
│   ├── css/        -> estilos.css
│   └── uploads/    -> aquí se guardan las fotos subidas
├── database/
│   └── galeria_fotos.sql -> crea la base de datos y las tablas
├── index.php       -> galería pública
├── login.php       -> inicio de sesión
├── logout.php      -> cerrar sesión
├── agregar.php     -> subir foto (requiere sesión)
├── eliminar.php    -> borrar foto (requiere sesión)
└── crear_admin.php -> crea el usuario admin (ejecutar una sola vez)
```

## Instalación (XAMPP)

1. Copia la carpeta `galeria-fotos` dentro de `htdocs`
   (en Windows: `C:\xampp\htdocs\`).
2. Abre el panel de XAMPP e inicia **Apache** y **MySQL** (MariaDB).
3. Entra a `http://localhost/phpmyadmin`, pestaña **Importar**, y sube
   el archivo `database/galeria_fotos.sql`. Esto crea la base
   `galeria_fotos` con las tablas `usuarios` y `fotos`.
4. Si tu MariaDB usa un usuario/contraseña distinto al de XAMPP por
   defecto (`root` sin contraseña), edítalo en `config/Database.php`.
5. Abre `http://localhost/galeria-fotos/crear_admin.php` una sola vez:
   esto crea el usuario administrador con la contraseña ya cifrada.
6. Entra a `http://localhost/galeria-fotos/`.

## Usuario de prueba

- **Usuario:** admin
- **Contraseña:** admin123

## Funcionalidad

- Cualquier visitante puede ver la galería (`index.php`).
- Solo con sesión iniciada se puede agregar (`agregar.php`) o eliminar
  fotos.
- Las imágenes se guardan en `public/uploads/` y su ruta queda
  registrada en la tabla `fotos`.
- Formatos permitidos: jpg, jpeg, png, gif, webp — máximo 5MB.

## Notas

Es una base simple y clara, pensada para ampliarse fácilmente:
registro de nuevos usuarios, categorías, paginación, edición de fotos,
etc.

## Usuarios adicionales

Con una sesión iniciada puedes entrar a **+ Usuarios** desde el menú o desde el inicio. Allí puedes crear nuevas cuentas con contraseña cifrada y ver los usuarios registrados.
