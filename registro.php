<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style-login.css">
</head>
<body>
    <div class="todo">
        <div class="form">
            <img src="images/login.png" alt="" class="logo">
            <h1 class="titulo">Registrarse</h1>
            <form action="inicio.php" method="get">
                <label for="">Nombre de Usuario</label>
                <input type="text">
                <label for="">Edad</label>
                <input type="int">
                <label for="">Estatura</label>
                <input type="float">
                <label for="">Peso</label>
                <input type="float">
                <label for="">Email</label>
                <input type="email">
                <label for="">Contraseña</label>
                <input type="password">
                <input type="submit" value="Registrarse">
            </form>
            <span class="text-footer">¿Ya estás registrado?<a href="index.php">Iniciar Sesión</a>
            </span>
            
        </div>
    </div>
</body>
</html>
