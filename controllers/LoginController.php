<?php
require_once dirname(__DIR__) . '/models/Usuario.php';

class LoginController
{
    public function index()
    {
        // Muestra el formulario de login
        require_once dirname(__DIR__) . '/views/login/index.php';
    }

    public function iniciar()
    {
        session_start();

        // Validar que se hayan enviado los datos por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            // Cargar el modelo
            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->obtenerPorEmail($email);

            if ($usuario && password_verify($contrasena, $usuario['Contrasena'])) {
                // Inicio de sesión exitoso
                $_SESSION['usuario'] = [
                    'id' => $usuario['Id'],
                    'nombre' => $usuario['Nombre'],
                    'email' => $usuario['Email']
                ];
                // Redireccionar a la página de inicio
                header('Location: /habitos_saludables/views/inicio/inicio.php');
                exit();
            } else {
                // Error: credenciales inválidas
                $_SESSION['errores'] = ['Credenciales inválidas.'];
                header('Location: /habitos_saludables/public/index.php?controlador=login&accion=index');
                exit();
            }
        } else {
            // Si no vino por POST, redirigir
            header('Location: /habitos_saludables/public/index.php?controlador=login&accion=index');
            exit();
        }
    }

    public function cerrar()
    {
        session_start();
        session_destroy();
        header('Location: /habitos_saludables/public/index.php?controlador=login&accion=index');
        exit();
    }
}
