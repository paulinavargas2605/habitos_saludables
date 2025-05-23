<?php
session_start();
$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style-login.css">
    <link rel="icon" type="image/png" href="/habitos_saludables/public/images/logo1.png">
</head>
<body>
    <div class="todo">
        <div class="form">
            <img src="/habitos_saludables/public/images/logo1.png" alt="Logo" class="logo">
            <h1 class="titulo">Iniciar Sesión</h1>

            <?php if (!empty($errores)): ?>
                <div class="errores">
                    <ul>
                        <?php foreach ($errores as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/habitos_saludables/public/index.php?controlador=login&accion=iniciar" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" required>

                <input type="submit" value="Iniciar Sesión">
            </form>

            <span class="text-footer">¿Aún no te has registrado?
                <a href="/habitos_saludables/public/index.php?controlador=registro&accion=index">Registrate</a>
            </span>
        </div>
    </div>
</body>
</html>
