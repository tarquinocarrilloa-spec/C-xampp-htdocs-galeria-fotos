<section class="panel-usuarios">
    <div class="encabezado-panel">
        <div>
            <span class="etiqueta-azul">ADMINISTRACIÓN</span>
            <h1>Agregar usuarios</h1>
            <p>Crea cuentas adicionales para que otras personas puedan entrar y administrar la galería.</p>
        </div>
        <a class="boton-secundario" href="index.php">← Volver a inicio</a>
    </div>

    <?php if ($mensaje): ?>
        <div class="alerta <?= $tipo === 'exito' ? 'alerta-exito' : 'alerta-error' ?>">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <div class="usuarios-layout">
        <div class="tarjeta-formulario">
            <h2>Nuevo usuario</h2>
            <form method="post" action="agregar_usuario.php">
                <label for="nombre_usuario">Nombre de usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" minlength="3" maxlength="50" value="<?= htmlspecialchars($_POST['nombre_usuario'] ?? '') ?>" required>

                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" minlength="6" required>

                <label for="confirmar_contrasena">Repetir contraseña</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" minlength="6" required>

                <button class="boton-principal" type="submit">+ Crear usuario</button>
            </form>
        </div>

        <div class="tarjeta-lista-usuarios">
            <div class="titulo-lista">
                <h2>Usuarios registrados</h2>
                <span class="contador-usuarios"><?= count($usuarios) ?></span>
            </div>
            <div class="lista-usuarios">
                <?php foreach ($usuarios as $usuario): ?>
                    <div class="usuario-item">
                        <div class="avatar-usuario"><?= strtoupper(substr($usuario['nombre_usuario'], 0, 1)) ?></div>
                        <div>
                            <strong><?= htmlspecialchars($usuario['nombre_usuario']) ?></strong>
                            <small>Registrado <?= htmlspecialchars(date('d/m/Y', strtotime($usuario['creado_en']))) ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
