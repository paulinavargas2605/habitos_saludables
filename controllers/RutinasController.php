<?php

require_once __DIR__ . '/../config/Database.php';

class RutinasController
{
  public function index()
  {
    $parte = $_GET['parte'] ?? '';
    $objetivo = $_GET['objetivo'] ?? '';

    $conn = Database::connect();

    // Obtener partes del cuerpo (músculos)
    $musculosResult = $conn->query("SELECT DISTINCT Nombre FROM musculo");
    $partesCuerpo = $musculosResult->fetch_all(MYSQLI_ASSOC);

    // Obtener objetivos
    $objetivosResult = $conn->query("SELECT DISTINCT Nombre FROM objetivo");
    $objetivos = $objetivosResult->fetch_all(MYSQLI_ASSOC);

    // Consulta de ejercicios
    $sql = "
        SELECT e.Id, e.Nombre, e.Descripcion, e.Series, e.Repeticiones, e.imagen
        FROM ejercicio e
        INNER JOIN ejercicio_musculo em ON e.Id = em.Id_ejercicio
        INNER JOIN musculo m ON em.Id_musculo = m.Id
        INNER JOIN ejercicio_objetivo eo ON e.Id = eo.Id_ejercicio
        INNER JOIN objetivo o ON eo.Id_objetivo = o.Id
        WHERE 1 = 1
    ";

    $params = [];
    $types = "";

    if ($parte) {
        $sql .= " AND m.Nombre = ?";
        $params[] = $parte;
        $types .= "s";
    }

    if ($objetivo) {
        $sql .= " AND o.Nombre = ?";
        $params[] = $objetivo;
        $types .= "s";
    }

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $ejerciciosRaw = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();

    // FILTRO para eliminar duplicados por Id
    $ejercicios = [];
    $idsUnicos = [];

    foreach ($ejerciciosRaw as $e) {
      if (!in_array($e['Id'], $idsUnicos)) {
          $ejercicios[] = $e;
          $idsUnicos[] = $e['Id'];
      }
    }

    require_once __DIR__ . '/../views/rutina/index.php';
  }
}
