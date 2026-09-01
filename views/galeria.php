<section class="hero-galeria">
    <div>
        <span class="etiqueta-azul">GALERÍA DIGITAL</span>
        <h1>Galería de fotos</h1>
        <p>Organiza tus imágenes de forma sencilla y permite que tu equipo las administre.</p>
    </div>
    <?php if ($logueado): ?>
        <div class="acciones-inicio">
            <a class="boton-principal" href="agregar.php">+ Agregar foto</a>
            <a class="boton-secundario" href="agregar_usuario.php">+ Nuevo usuario</a>
        </div>
    <?php endif; ?>
</section>

<?php if (empty($fotos)): ?>
    <p class="vacio">
        Todavía no hay fotos.
        <?php if ($logueado): ?>
            <a href="agregar.php">Sube la primera</a>.
        <?php endif; ?>
    </p>
<?php else: ?>
    <div class="grid-galeria">
        <?php foreach ($fotos as $foto): ?>
            <figure class="tarjeta-foto">
                <img src="<?= htmlspecialchars($foto['ruta_archivo']) ?>" alt="<?= htmlspecialchars($foto['titulo']) ?>">
                <figcaption>
                    <h3><?= htmlspecialchars($foto['titulo']) ?></h3>
                    <?php if (!empty($foto['descripcion'])): ?>
                        <p><?= htmlspecialchars($foto['descripcion']) ?></p>
                    <?php endif; ?>
                    <?php if ($logueado): ?>
                        <a class="enlace-eliminar" href="eliminar.php?id=<?= (int) $foto['id'] ?>" onclick="return confirm('¿Eliminar esta foto?');">Eliminar</a>
                    <?php endif; ?>
                </figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
