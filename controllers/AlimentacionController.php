<?php
class AlimentacionController {
  public function index() {
    $tipo_alimentacion = $_GET['tipo_alimentacion'] ?? null;

    // array con los datos de los platos dependiendo del tipo de alimentación
    $platos = [
      'desayuno' => [
        [
          'nombre' => 'Avena con frutas',
          'ingredientes' => ['avena', 'leche o bebida vegetal', 'banana', 'fresas', 'arándanos'],
          'calorias_aprox' => 350,
          'imagen' => 'avena-frutas.jpg'
        ],
        [
          'nombre' => 'Tostadas integrales con aguacate y huevo',
          'ingredientes' => ['pan integral', 'aguacate', 'huevo'],
          'calorias_aprox' => 400,
          'imagen' => 'tostadas-aguacate.jpg'
        ]
      ],
      'almuerzo' => [
        [
          'nombre' => 'Pechuga de pollo a la plancha con quinoa y vegetales',
          'ingredientes' => ['pechuga de pollo', 'quinoa', 'brócoli', 'zanahoria'],
          'calorias_aprox' => 550,
          'imagen' => 'pollo-quinoa.jpg'
        ],
        [
          'nombre' => 'Ensalada de lentejas con verduras y huevo cocido',
          'ingredientes' => ['lentejas', 'pimiento', 'pepino', 'huevo'],
          'calorias_aprox' => 500,
          'imagen' => 'ensalada-de-lentejas.jpg'
        ]
      ],
      'cena' => [
        [
          'nombre' => 'Tortilla de espinacas con pan integral',
          'ingredientes' => ['huevo', 'espinaca', 'cebolla', 'pan integral'],
          'calorias_aprox' => 400,
          'imagen' => 'tortilla-espinacas.jpg'
        ],
        [
          'nombre' => 'Sopa de verduras con tofu',
          'ingredientes' => ['calabacín', 'zanahoria', 'tofu', 'apio'],
          'calorias_aprox' => 350,
          'imagen' => 'sopa-tofu.jpg'
        ]
      ],
      'snack' => [
        [
          'nombre' => 'Yogur natural con nueces y miel',
          'ingredientes' => ['yogur griego', 'nueces', 'miel'],
          'calorias_aprox' => 250,
          'imagen' => 'yogur-nueces.jpg'
        ],
        [
          'nombre' => 'Manzana con mantequilla de maní',
          'ingredientes' => ['manzana', 'mantequilla de maní natural'],
          'calorias_aprox' => 200,
          'imagen' => 'manzana-mani.jpg'
        ]
      ]
    ];

    $tipo_seleccionado = [];

    //en este if, se verifica que la variable parte tenga valor y revisa que sea parte del array de tipo_alimentacion
    if ($tipo_alimentacion && array_key_exists($tipo_alimentacion, $platos)) {
      //se guarda los datos en la variable para despues mostrarlos en la vista
      $tipo_seleccionado = $platos[$tipo_alimentacion];
    }

    // Pasamos el tipo de alimentación y los platos a la vista
    require_once '../views/alimentacion/alimentacion.php';
  }
}