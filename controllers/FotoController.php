<?php
require_once __DIR__ . '/../models/Foto.php';

class FotoController
{
    private $fotoModel;
    private $rutaSubidasFS;
    private $rutaSubidasWeb = 'public/uploads/';

    public function __construct()
    {
        $this->fotoModel = new Foto();
        $this->rutaSubidasFS = __DIR__ . '/../public/uploads/';
    }

    public function listar()
    {
        return $this->fotoModel->obtenerTodas();
    }

    public function subir($titulo, $descripcion, $archivo, $usuario_id)
    {
        $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $extensionesPermitidas)) {
            return ['ok' => false, 'mensaje' => 'Formato no permitido. Usa jpg, png, gif o webp.'];
        }

        if ($archivo['size'] > 5 * 1024 * 1024) {
            return ['ok' => false, 'mensaje' => 'La imagen supera los 5MB permitidos.'];
        }

        $nombreArchivo = uniqid('foto_') . '.' . $extension;

        if (!move_uploaded_file($archivo['tmp_name'], $this->rutaSubidasFS . $nombreArchivo)) {
            return ['ok' => false, 'mensaje' => 'No se pudo guardar la imagen en el servidor.'];
        }

        $this->fotoModel->agregar($titulo, $descripcion, $this->rutaSubidasWeb . $nombreArchivo, $usuario_id);
        return ['ok' => true, 'mensaje' => 'Foto agregada correctamente.'];
    }

    public function eliminar($id)
    {
        $foto = $this->fotoModel->obtenerPorId($id);
        if ($foto) {
            $rutaFisica = __DIR__ . '/../' . $foto['ruta_archivo'];
            if (file_exists($rutaFisica)) {
                unlink($rutaFisica);
            }
            $this->fotoModel->eliminar($id);
        }
    }
}
