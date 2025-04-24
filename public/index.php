<?php
$controlador = $_GET['controlador'] ?? 'login';
$accion = $_GET['accion'] ?? 'index';

$controlador = ucfirst($controlador) . 'Controller';
$archivo = "../controllers/$controlador.php";

if (file_exists($archivo)) {
    require_once $archivo;

    if (class_exists($controlador)) {
        $obj = new $controlador();

        if (method_exists($obj, $accion)) {
            $obj->$accion();
        } else {
            echo "La acción '$accion' no existe.";
        }
    } else {
        echo "Clase '$controlador' no encontrada.";
    }
} else {
    echo "Archivo de controlador '$archivo' no encontrado.";
}
