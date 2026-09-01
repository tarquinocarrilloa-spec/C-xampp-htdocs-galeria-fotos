<?php
require_once __DIR__ . '/../config/Database.php';

class Foto
{
    private $conn;
    private $tabla = 'fotos';

    public function __construct()
    {
        $this->conn = (new Database())->conectar();
    }

    public function obtenerTodas()
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->tabla} ORDER BY fecha_subida DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->tabla} WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function agregar($titulo, $descripcion, $ruta_archivo, $usuario_id)
    {
        $sql = "INSERT INTO {$this->tabla} (titulo, descripcion, ruta_archivo, usuario_id, fecha_subida)
                VALUES (:titulo, :descripcion, :ruta_archivo, :usuario_id, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':ruta_archivo', $ruta_archivo);
        $stmt->bindParam(':usuario_id', $usuario_id);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->tabla} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
