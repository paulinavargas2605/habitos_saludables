<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {

   public function editar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header("Location: /habitos_saludables/views/login/login.php");
            exit();
        }

        $id = $_SESSION['usuario']['id'];
        $usuario = Usuario::obtenerPorId($id);

        require_once dirname(__DIR__) . '/views/usuario/editar.php';
    }



  public function actualizar() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['usuario'])) {
        header("Location: /habitos_saludables/views/login/login.php");
        exit();
    }

    $id = $_SESSION['usuario']['id'];

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $estatura = $_POST['estatura'];
    $peso = $_POST['peso'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $resultado = Usuario::actualizar($id, $nombre, $edad, $estatura, $peso, $email, $contrasena);

    if ($resultado) {
        $_SESSION['exito'] = "Perfil actualizado correctamente.";
    } else {
        $_SESSION['errores'][] = "Error al actualizar el perfil.";
    }

    header("Location: /habitos_saludables/public/index.php?controlador=usuario&accion=editar");
    exit();
}

}
