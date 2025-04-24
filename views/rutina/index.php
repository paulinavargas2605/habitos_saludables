<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutinas</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style.css">
</head>
<body>
    <header>
        <img src ="/habitos_saludables/public/images/logo1.png" class="logo">
        <?php include_once dirname(__DIR__) . '/nav.php'; ?>
    </header>

    <section id="banner-rutina">
        <div class="contenido-banner-rutina">
            <h3><span>Rutinas de ejercicio</span><br>Cada rutina es un paso hacia una mejor versión de ti.</h3>
        </div>
    </section>
    
  <div class="container">
    
    <h1>Selecciona la parte del cuerpo que desea trabajar</h1>
    
    <form method="GET" action="/habitos_saludables/public/index.php">
      
      <input type="hidden" name="controlador" value="rutinas">
      <input type="hidden" name="accion" value="index">

      <select name="parte">
        <option value="">-- Selecciona --</option>
        <option value="pecho" <?= ($parte == 'pecho') ? 'selected' : '' ?>>Pecho</option>
        <option value="piernas" <?= ($parte == 'piernas') ? 'selected' : '' ?>>Piernas</option>
        <option value="espalda" <?= ($parte == 'espalda') ? 'selected' : '' ?>>Espalda</option>
        <option value="brazos" <?= ($parte == 'brazos') ? 'selected' : '' ?>>Brazos</option>
      </select>
      <button type="submit">Mostrar máquinas</button>
    </form>

      <?php if (!empty($maquinasSeleccionadas)) : ?>
      <h2>Máquinas para ejercitar <?= htmlspecialchars($parte) ?>:</h2>
      <ul class="lista-maquinas">
      
      <?php foreach ($maquinasSeleccionadas as $maquina) : ?>
        <li class="maquina">
          <h3><?= htmlspecialchars($maquina['nombre']) ?></h3>
          <img src="/habitos_saludables/public/images/maquinas/<?= htmlspecialchars($maquina['imagen']) ?>" alt="<?= htmlspecialchars($maquina['nombre']) ?>" width="200">
          <p><strong>Series:</strong> <?= $maquina['series'] ?> repeticiones</p>
          <p><strong>Repeticiones por serie:</strong> <?= htmlspecialchars($maquina['repeticiones']) ?></p>
        </li>
      <?php endforeach; ?>
      </ul>
    <?php elseif ($parte): ?>
      <p>No hay máquinas para la parte seleccionada.</p>
    <?php endif; ?>
  
  </div>
  <footer>
    &copy:2025 FitCheck (Todos los derechos reservados)
  </footer>
</body>

</html>
