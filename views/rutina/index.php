<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutinas</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style.css">
    <link rel="icon" type="image/png" href="/habitos_saludables/public/images/logo1.png">
</head>
<body>
    <header>
        <img src ="/habitos_saludables/public/images/logo1.png" class="logo">
        <!-- Llama el archivo que tiene el menu de navegacion -->
        <?php include_once dirname(__DIR__) . '/nav.php'; ?>
    </header>

    <section id="banner-rutina">
        <div class="contenido-banner-rutina">
            <h3><span>Rutinas de ejercicio</span><br>Cada rutina es un paso hacia una mejor versión de ti.</h3>
        </div>
    </section>
    
  <div class="container">
    
    <h1>Selecciona la parte del cuerpo que desea trabajar</h1>
    
    <!-- Formulario para seleccionar una sola parte del cuerpo y enviarla al controller -->
    <form method="GET" action="/habitos_saludables/public/index.php">

      <!-- Se define el controlador que se va a usar al enviar el formulario -->
      <input type="hidden" name="controlador" value="rutinas">
      <!-- Se define el metodo al que se le va a enviar el formulario -->
      <input type="hidden" name="accion" value="index">

      <!-- Menú desplegable con las partes del cuerpo, se le asigna
      el valor a cada una y mantenemos la seleccion marcada despues de enviar los datos  -->
      <select name="parte">
        <option value="">-- Selecciona --</option>
        <option value="pecho" <?= ($parte == 'pecho') ? 'selected' : '' ?>>Pecho</option>
        <option value="piernas" <?= ($parte == 'piernas') ? 'selected' : '' ?>>Piernas</option>
        <option value="espalda" <?= ($parte == 'espalda') ? 'selected' : '' ?>>Espalda</option>
        <option value="brazos" <?= ($parte == 'brazos') ? 'selected' : '' ?>>Brazos</option>
      </select>
      <button type="submit">Mostrar máquinas</button>
    </form>

      <!-- Se muestra la lista de máquinas si se encontraron para la parte seleccionada -->
      <?php if (!empty($maquinasSeleccionadas)) : ?>
      <h2>Máquinas para ejercitar <?= htmlspecialchars($parte) ?>:</h2>
      <ul class="lista-maquinas">
      
      <!-- Se recorre el array de máquinas y se muestra la informacion de cada una (imagen, series y repeticiones)-->
      <?php foreach ($maquinasSeleccionadas as $maquina) : ?>
        <li class="maquina">
          <h3><?= htmlspecialchars($maquina['nombre']) ?></h3>
          <img src="/habitos_saludables/public/images/maquinas/<?= htmlspecialchars($maquina['imagen']) ?>" alt="<?= htmlspecialchars($maquina['nombre']) ?>" width="200">
          <p><strong>Series:</strong> <?= $maquina['series'] ?> repeticiones</p>
          <p><strong>Repeticiones por serie:</strong> <?= htmlspecialchars($maquina['repeticiones']) ?></p>
        </li>
      <?php endforeach; ?>
      </ul>
    
      <!-- Si no hay máquinas pero sí se seleccionó una parte, se muestra mensaje -->
    <?php elseif ($parte): ?>
      <p>No hay máquinas para la parte seleccionada.</p>
    <?php endif; ?>
  
  </div>
  <footer>
    &copy:2025 FitCheck (Todos los derechos reservados)
  </footer>
</body>

</html>
