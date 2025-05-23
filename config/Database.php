<?php
class Database{
    public static function connect(){
        // Conexión a la base de datos, el nombre de la base de datos es 'habitossaludables'
        $conexion = new mysqli('localhost','root','sbarman','habitossaludables');

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        $conexion->set_charset("utf8");
        return $conexion;
    } 
}
?>
