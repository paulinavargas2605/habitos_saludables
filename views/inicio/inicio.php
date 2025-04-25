<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCheck</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style.css">
    <link rel="icon" type="image/png" href="/habitos_saludables/public/images/logo1.png">
</head>
<body>
    <header>
        <img src="/habitos_saludables/public/images/logo1.png" class="logo">
        <nav>
        <?php include_once dirname(__DIR__) . '/nav.php'; ?>
        </nav>
    </header>
    <section id="banner">
        <div class="contenido-banner">
            <h3><span>FitCheck: </span>Tu mejor aliado en tu cuidado personal<br> y estilo de vida.</h3>
        </div>
    </section>
    <section id="servicios">
        <div>
            <img src="/habitos_saludables/public/images/ejercicio.jpg">
            <h4>Recomendaciones de rutina</h4>
            <p>¡Descubre la rutina ideal para ti!</p> 
            <a href="/habitos_saludables/public/index.php?controlador=rutinas&accion=index"  class="boton-saber-mas">Saber más</a>
        </div>
        <div>
            <img src="/habitos_saludables/public/images/alimentacion.jpg">
            <h4>Recomendaciones de alimentación</h4>
            <p>¡Descubre la alimentación ideal para ti!</p> 
            <a href="/habitos_saludables/public/index.php?controlador=alimentacion&accion=index"  class="boton-saber-mas">Saber más</a>
            <!--
            <a href="/habitos_saludables/views/alimentacion/alimentacion.php" class="boton-saber-mas">Saber más</a>
            -->
        </div>
    </section>
    <footer>
        &copy:2025 FitCheck (Todos los derechos reservados)
    </footer>
</body>
</html>
