<?php
$parte = $parte ?? '';
$objetivo = $objetivo ?? '';
$ejercicios = $ejercicios ?? [];
$partesCuerpo = $partesCuerpo ?? [];
$objetivos = $objetivos ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutinas</title>
    <link rel="stylesheet" href="/habitos_saludables/public/css/style.css">
    <link rel="icon" type="image/png" href="/habitos_saludables/public/images/logo1.png">
</head>
<body>
    <header>
        <img src="/habitos_saludables/public/images/logo1.png" class="logo">
        <?php include_once dirname(__DIR__) . '/nav.php'; ?>
    </header>

    <section id="banner-rutina">
        <div class="contenido-banner-rutina">
            <h3><span>Rutinas de ejercicio</span><br>Cada rutina es un paso hacia una mejor versión de ti.</h3>
        </div>
    </section>
    
    <div class="container">
        <h1>Selecciona la parte del cuerpo que deseas trabajar</h1>

        <form method="GET" action="/habitos_saludables/public/index.php">
            <input type="hidden" name="controlador" value="rutinas">
            <input type="hidden" name="accion" value="index">

            <label for="parte">Parte del cuerpo:</label>
            <select name="parte" id="parte">
                <option value="">-- Selecciona --</option>
                <?php foreach ($partesCuerpo as $musculo): ?>
                    <option value="<?= htmlspecialchars($musculo['Nombre']) ?>" <?= ($parte === $musculo['Nombre']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($musculo['Nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="objetivo">Objetivo:</label>
            <select name="objetivo" id="objetivo">
                <option value="">-- Objetivo --</option>
                <?php foreach ($objetivos as $obj): ?>
                    <option value="<?= htmlspecialchars($obj['Nombre']) ?>" <?= ($objetivo === $obj['Nombre']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($obj['Nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <button type="submit">Mostrar ejercicios</button>
        </form>

        <h2>Ejercicios para <?= htmlspecialchars($parte) ?></h2>

        <?php if (count($ejercicios) > 0): ?>
            <div class="lista-maquinas">
                <?php foreach ($ejercicios as $ejercicio): ?>
                    <div class="maquina">
                        <?php if (!empty($ejercicio['imagen'])): ?>
                            <img src="/habitos_saludables/public/images/maquinas/<?= htmlspecialchars($ejercicio['imagen']) ?>" alt="<?= htmlspecialchars($ejercicio['Nombre']) ?>">
                        <?php endif; ?>
                        <h3><?= htmlspecialchars($ejercicio['Nombre']) ?></h3>
                        <p><strong>Descripción:</strong> <?= htmlspecialchars($ejercicio['Descripcion']) ?></p>
                        <p><strong>Series:</strong> <?= $ejercicio['Series'] ?> </br> <strong>Repeticiones:</strong> <?= $ejercicio['Repeticiones'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No hay ejercicios para esa parte del cuerpo y objetivo.</p>
        <?php endif; ?>
    </div>

    <footer>
        &copy; 2025 FitCheck (Todos los derechos reservados)
    </footer>
</body>
</html>
