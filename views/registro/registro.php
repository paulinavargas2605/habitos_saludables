<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$errores = $_SESSION['errores'] ?? [];
$exito = $_SESSION['exito'] ?? '';
unset($_SESSION['errores'], $_SESSION['exito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style-login.css">
</head>
<body>
<div class="todo">
    <div class="form">
        <img src="/habitos_saludables/public/images/logo1.png" alt="Logo" class="logo">
        <h1 class="titulo">Registrarse</h1>

        <?php if (!empty($errores)): ?>
            <div class="errores">
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($exito): ?>
            <div class="exito"><?= htmlspecialchars($exito) ?></div>
        <?php endif; ?>

       <div class="buscador-ejercicio">
            <form action="/habitos_saludables/public/index.php" method="POST">
                <input type="hidden" name="controlador" value="registro">
                <input type="hidden" name="accion" value="guardar">

                <label for="nombre">Nombre de Usuario</label>
                <input type="text" id="nombre" name="nombre">

                <label for="edad">Edad</label>
                <input type="number" id="edad" name="edad">

                <label for="estatura">Estatura</label>
                <input type="text" id="estatura" name="estatura">

                <label for="peso">Peso</label>
                <input type="text" id="peso" name="peso">

                <label for="email">Email</label>
                <input type="email" id="email" name="email">

                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena">

                <input type="submit" value="Registrarse">
            </form>
        </div>


        <span class="text-footer">¿Ya estás registrado?
            <a href="/habitos_saludables/views/login/index.php">Iniciar Sesión</a>
        </span>
    </div>
</div>
</body>
</html>

