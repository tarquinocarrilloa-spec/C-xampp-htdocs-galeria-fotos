<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function iniciarSesion($nombre_usuario, $contrasena)
    {
        $usuario = $this->usuarioModel->buscarPorNombre($nombre_usuario);

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            return true;
        }
        return false;
    }

    public static function estaLogueado()
    {
        return isset($_SESSION['usuario_id']);
    }

    public static function cerrarSesion()
    {
        session_unset();
        session_destroy();
    }
}
