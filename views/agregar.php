<section class="tarjeta">
    <h1>Agregar foto</h1>
    <?php if (!empty($mensaje)): ?>
        <p class="alerta"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <form method="post" action="agregar.php" enctype="multipart/form-data">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="descripcion">Descripción (opcional)</label>
        <textarea id="descripcion" name="descripcion" rows="3"></textarea>

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>

        <button type="submit">Subir</button>
    </form>
    <p class="ayuda"><a href="index.php">Volver a la galería</a></p>
</section>
