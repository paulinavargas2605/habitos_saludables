<?php
// Se obtienen los valores de los parámetros 'controlador' y 'accion' de la URL.
// Si no existen, se asignan valores por defecto: 'login' para controlador y 'index' para acción.
$controlador = $_GET['controlador'] ?? 'login';
$accion = $_GET['accion'] ?? 'index';

// Se construye el nombre del controlador, agregando "Controller" al nombre con la primera letra en mayúscula
$controlador = ucfirst($controlador) . 'Controller';

// Se define la ruta al archivo del controlador
$archivo = "../controllers/$controlador.php";

// Se verifica si el archivo del controlador existe
if (file_exists($archivo)) {
    // Se incluye el archivo del controlador
    require_once $archivo;

    // Se verifica si la clase del controlador existe
    if (class_exists($controlador)) {
        // Se crea una instancia del controlador
        $obj = new $controlador();

        // Se verifica si el método (acción) existe dentro del controlador
        if (method_exists($obj, $accion)) {
            // Se ejecuta el método correspondiente (acción solicitada)
            $obj->$accion();
        } else {
            // Si la acción no existe, se muestra un mensaje de error
            echo "La acción '$accion' no existe.";
        }
    } else {
        // Si la clase del controlador no existe, se muestra un mensaje de error
        echo "Clase '$controlador' no encontrada.";
    }
} else {
    // Si el archivo del controlador no existe, se muestra un mensaje de error
    echo "Archivo de controlador '$archivo' no encontrado.";
}
?>