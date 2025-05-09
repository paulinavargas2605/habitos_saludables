<?php
class RutinasController {
  public function index() {
    $parte = $_GET['parte'] ?? null;

    // array con los datos de las rutinas dependiendo la parte de cuerpo a trabjar
    $maquinas = [
        'pecho' => [
          [
            'nombre' => 'Press de banca',
            'series' => 3,
            'repeticiones' => '10-12',
            'imagen' => 'bench-press.jpg'
          ],
          [
            'nombre' => 'Press inclinado con mancuernas',
            'series' => 4,
            'repeticiones' => '8-10',
            'imagen' => 'press_inclinado.webp'
          ],
          [
            'nombre' => 'Pec Deck',
            'series' => 3,
            'repeticiones' => '12',
            'imagen' => 'Pec-Deck.png'
          ]
        ],
        'piernas' => [
          [
            'nombre' => 'Prensa de piernas',
            'series' => 4,
            'repeticiones' => '10-15',
            'imagen' => 'Prensa-piernas.jpg'
          ],
          [
            'nombre' => 'Extensión de piernas',
            'series' => 3,
            'repeticiones' => '12-15',
            'imagen' => 'Extension-piernas.jpg'
          ],
          [
            'nombre' => 'Curl femoral',
            'series' => 3,
            'repeticiones' => '10-12',
            'imagen' => 'Curl-femoral.jpg'
          ]
        ],
        'espalda' => [
          [
            'nombre' => 'Remo en máquina',
            'series' => 3,
            'repeticiones' => '8-12',
            'imagen' => 'Remo-máquina.jpg'
          ],
          [
            'nombre' => 'Jalón al pecho',
            'series' => 4,
            'repeticiones' => '10-15',
            'imagen' => 'Jalon-pecho.jpg'
          ],
          [
            'nombre' => 'Remo con barra',
            'series' => 3,
            'repeticiones' => '10',
            'imagen' => 'Remo-barra.jpg'
          ]
        ],
        'brazos' => [
          [
            'nombre' => 'Curl de bíceps con barra',
            'series' => 3,
            'repeticiones' => '10-12',
            'imagen' => 'Curl-barra.jpg'
          ],
          [
            'nombre' => 'Fondos en paralelas',
            'series' => 3,
            'repeticiones' => '8-10',
            'imagen' => 'Fondos-paralelas.png'
          ],
          [
            'nombre' => 'Curl con mancuerna alternado',
            'series' => 3,
            'repeticiones' => '12',
            'imagen' => 'Curl- alternado.png'
          ]
        ],
      ];
      

    $maquinasSeleccionadas = [];

    //en este if, se verifica que la variable parte tenga valor y revisa que sea parte del array de máquinas
    if ($parte && array_key_exists($parte, $maquinas)) {
      //se guarda los datos en la variable para despues mostrarlos en la vista
      $maquinasSeleccionadas = $maquinas[$parte];
    }

    // Pasamos la parte y las máquinas a la vista
    require_once '../views/rutina/index.php';
  }
}

