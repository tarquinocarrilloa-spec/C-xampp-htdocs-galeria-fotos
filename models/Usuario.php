<?php
require_once __DIR__ . '/../config/Database.php';

class Usuario
{
    private $conn;
    private $tabla = 'usuarios';

    public function __construct()
    {
        $this->conn = (new Database())->conectar();
    }

    public function buscarPorNombre($nombre_usuario)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE nombre_usuario = :nombre_usuario LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($nombre_usuario, $contrasena)
    {
        if ($this->buscarPorNombre($nombre_usuario)) {
            return ['ok' => false, 'mensaje' => 'Ese usuario ya existe.'];
        }

        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "INSERT INTO {$this->tabla} (nombre_usuario, contrasena) VALUES (:u, :c)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':u', $nombre_usuario);
        $stmt->bindParam(':c', $hash);
        $stmt->execute();

        return ['ok' => true, 'mensaje' => 'Usuario creado correctamente.'];
    }

    public function listar()
    {
        $stmt = $this->conn->query("SELECT id, nombre_usuario, creado_en FROM {$this->tabla} ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
