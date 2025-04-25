<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentación</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style.css">
    <link rel="icon" type="image/png" href="/habitos_saludables/public/images/logo1.png">
</head>
<body>
    <header>
        <img src ="/habitos_saludables/public/images/logo1.png" class="logo">
        <!-- Llama el archivo que tiene el menu de navegacion -->
        <?php include_once dirname(__DIR__) . '/nav.php'; ?>
    </header>

    <section id="banner-alimentacion">
        <div class="contenido-banner-alimentacion">
            <h3><span>Alimentos saludables</span><br>La alimentación saludable no es una moda, es una forma diaria de cuidarte mejor.</h3>
        </div>
    </section>
    
    <div class="container">
        
        <h1>Selecciona la comida del día</h1>
        
        <!-- Formulario para seleccionar una opción y enviarla al controller -->
        <form method="GET" action="/habitos_saludables/public/index.php">

        <!-- Se define el controlador que se va a usar al enviar el formulario -->
        <input type="hidden" name="controlador" value="alimentacion">
        <!-- Se define el metodo al que se le va a enviar el formulario -->
        <input type="hidden" name="accion" value="index">

        <!-- Menú desplegable con las comidas del día, se le asigna
        el valor a cada una y mantenemos la seleccion marcada despues de enviar los datos  -->
        <select name="tipo_alimentacion">
            <option value="">-- Selecciona --</option>
            <option value="desayuno" <?= ($tipo_alimentacion == 'desayuno') ? 'selected' : '' ?>>Desayuno</option>
            <option value="almuerzo" <?= ($tipo_alimentacion == 'almuerzo') ? 'selected' : '' ?>>Almuerzo</option>
            <option value="cena" <?= ($tipo_alimentacion == 'cena') ? 'selected' : '' ?>>Cena</option>
            <option value="snack" <?= ($tipo_alimentacion == 'snack') ? 'selected' : '' ?>>Snack</option>
        </select>
        <button type="submit">Mostrar comidas</button>
        </form>
        <!-- Se muestra la lista de comidas si se encontraron para la opción seleccionada -->
        <?php if (!empty($tipo_seleccionado)) : ?>
        <h2><?= ucfirst(htmlspecialchars($tipo_alimentacion)) ?>:</h2>
        <ul class="lista-comidas">
        
        <!-- Se recorre el array de platos y se muestra la informacion de cada una -->
        <?php foreach ($tipo_seleccionado as $tipo) : ?>
            <li class="comida">
            <h3><?= htmlspecialchars($tipo['nombre']) ?></h3>
            <img src="/habitos_saludables/public/images/comidas/<?= htmlspecialchars($tipo['imagen']) ?>" alt="<?= htmlspecialchars($tipo['nombre']) ?>" width="200">
            <p><strong>Ingredientes:</strong> <?= implode(', ', $tipo['ingredientes']) ?></p>
            <p><strong>Calorías:</strong> <?= htmlspecialchars($tipo['calorias_aprox']) ?></p>
            <br>
            </li>
        <?php endforeach;?>
        </ul>
        
        <!-- Si no hay comidas pero sí se seleccionó una opción, se muestra mensaje -->
        <?php elseif (isset($tipo_seleccionado) && $tipo_seleccionado): ?>
        <p>No hay comidas para la opción seleccionada.</p>
        <?php endif;?>
    
    </div>
    <footer>
        &copy:2025 FitCheck (Todos los derechos reservados)
    </footer>
</body>

</html>