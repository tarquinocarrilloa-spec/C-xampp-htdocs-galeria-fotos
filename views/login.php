<section class="tarjeta-login">
    <h1>Iniciar sesión</h1>
    <?php if (!empty($error)): ?>
        <p class="alerta alerta-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label for="nombre_usuario">Usuario</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required autofocus>

        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit">Entrar</button>
    </form>
    <p class="ayuda">Usuario de prueba: admin / admin123 (créalo primero con crear_admin.php)</p>
</section>
