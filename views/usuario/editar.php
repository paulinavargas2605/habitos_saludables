<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Para mostrar errores y mensajes de éxito guardados en sesión
$errores = $_SESSION['errores'] ?? [];
$exito = $_SESSION['exito'] ?? '';
unset($_SESSION['errores'], $_SESSION['exito']);

// Aquí asumimos que la variable $usuario llega desde el controlador con datos actuales
// Ejemplo: $usuario['nombre'], $usuario['edad'], $usuario['estatura'], $usuario['peso'], $usuario['email']

// Si no hay datos, redirigir al login o página principal (por seguridad)
if (!isset($usuario)) {
    header("Location: /habitos_saludables/views/login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style-login.css">
</head>
<body>
<div class="todo">
    
    <div class="form">
        <button type="button" class="boton-regresar" onclick="window.location.href='/habitos_saludables/views/inicio/inicio.php'">
            Regresar
        </button>
        <img src="/habitos_saludables/public/images/logo1.png" alt="Logo" class="logo">
        <h1 class="titulo">Editar Perfil</h1>
        
       

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

        <form action="/habitos_saludables/public/index.php" method="POST">
            <input type="hidden" name="controlador" value="usuario">
            <input type="hidden" name="accion" value="actualizar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">

            <label for="nombre">Nombre de Usuario</label>
            <input type="text" id="nombre" name="nombre" required value="<?= htmlspecialchars($usuario['nombre']) ?>">

            <label for="edad">Edad</label>
            <input type="number" id="edad" name="edad" required value="<?= htmlspecialchars($usuario['edad']) ?>">

            <label for="estatura">Estatura</label>
            <input type="text" id="estatura" name="estatura" required value="<?= htmlspecialchars($usuario['estatura']) ?>">

            <label for="peso">Peso</label>
            <input type="text" id="peso" name="peso" required value="<?= htmlspecialchars($usuario['peso']) ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($usuario['email']) ?>">

            <label for="contrasena">Nueva contraseña (dejar vacío para no cambiar)</label>
            <input type="password" id="contrasena" name="contrasena">

            <input type="submit" value="Actualizar Perfil">
        </form>
    </div>
</div>
</body>
</html>
