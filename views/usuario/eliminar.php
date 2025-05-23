<?php
require_once(dirname(__DIR__, 2) . '/config/Database.php');

$conexion = Database::connect();

//Consultar id del usuario
session_start();
$id_user = $_SESSION['usuario']['id'];

$query_eliminar = mysqli_query($conexion, "DELETE
                                        FROM `usuario`
                                        WHERE `Id` = '$id_user'")
					or die('error'.mysqli_error($conexion));

if($query_eliminar){
    header("Location: /habitos_saludables/views/login/index.php");
    exit();
}else{
    header("Location: /habitos_saludables/public/index.php");
    exit();
}
?>