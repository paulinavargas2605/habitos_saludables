<?php
class RutinasController {
  public function index() {
    $parte = $_GET['parte'] ?? null;

    $maquinas = [
        'pecho' => [
          [
            'nombre' => 'Press de banca',
            'series' => 3,
            'repeticiones' => '10-12',
            'imagen' => 'press_banca.jpg'
          ],
          [
            'nombre' => 'Press inclinado con mancuernas',
            'series' => 4,
            'repeticiones' => '8-10',
            'imagen' => 'press_inclinado.jpg'
          ],
          [
            'nombre' => 'Pec Deck',
            'series' => 3,
            'repeticiones' => '12',
            'imagen' => 'pec_deck.jpg'
          ]
        ],
        'piernas' => [
          [
            'nombre' => 'Prensa de piernas',
            'series' => 4,
            'repeticiones' => '10-15',
            'imagen' => 'prensa_piernas.jpg'
          ],
          [
            'nombre' => 'Extensión de piernas',
            'series' => 3,
            'repeticiones' => '12-15',
            'imagen' => 'extension_piernas.jpg'
          ],
          [
            'nombre' => 'Curl femoral',
            'series' => 3,
            'repeticiones' => '10-12',
            'imagen' => 'curl_femoral.jpg'
          ]
        ],
        'espalda' => [
          [
            'nombre' => 'Remo en máquina',
            'series' => 3,
            'repeticiones' => '8-12',
            'imagen' => 'remo_maquina.jpg'
          ],
          [
            'nombre' => 'Jalón al pecho',
            'series' => 4,
            'repeticiones' => '10-15',
            'imagen' => 'jalon_pecho.jpg'
          ],
          [
            'nombre' => 'Remo con barra',
            'series' => 3,
            'repeticiones' => '10',
            'imagen' => 'remo_barra.jpg'
          ]
        ],
        'brazos' => [
          [
            'nombre' => 'Curl de bíceps con barra',
            'series' => 3,
            'repeticiones' => '10-12',
            'imagen' => 'curl_barra.jpg'
          ],
          [
            'nombre' => 'Fondos en paralelas',
            'series' => 3,
            'repeticiones' => '8-10',
            'imagen' => 'fondos_paralelas.jpg'
          ],
          [
            'nombre' => 'Curl con mancuerna alternado',
            'series' => 3,
            'repeticiones' => '12',
            'imagen' => 'curl_mancuerna.jpg'
          ]
        ],
        'abdomen' => [
          [
            'nombre' => 'Crunch en máquina',
            'series' => 4,
            'repeticiones' => '15-20',
            'imagen' => 'crunch_maquina.jpg'
          ],
          [
            'nombre' => 'Elevación de piernas',
            'series' => 3,
            'repeticiones' => '12-15',
            'imagen' => 'elevacion_piernas.jpg'
          ],
          [
            'nombre' => 'Plancha abdominal',
            'series' => 3,
            'repeticiones' => '30 seg',
            'imagen' => 'plancha.jpg'
          ]
        ]
      ];
      

    $maquinasSeleccionadas = [];

    if ($parte && array_key_exists($parte, $maquinas)) {
      $maquinasSeleccionadas = $maquinas[$parte];
    }

    // Pasamos la parte y las máquinas a la vista
    require_once '../views/rutina/index.php';
  }
}

