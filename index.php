<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style-login.css">
</head>
<body>
    <div class="todo">
        <div class="form">
            <img src="/habitos_saludables/images/logo1.png" alt="" class="logo">
            <h1 class="titulo">Iniciar Sesión</h1>
            <form action="/habitos_saludables/views/inicio/inicio.php" method="get">
                <label for="">Email</label>
                <input type="email">
                <label for="">Contraseña</label>
                <input type="password">
                <input type="submit" value="Iniciar Sesión">
            </form>
            <span class="text-footer">¿Aún no te has registrado?<a href="/habitos_saludables/views/registro/registro.php"> Registrate</a>
            </span>
            
        </div>
    </div>
</body>
</html>
