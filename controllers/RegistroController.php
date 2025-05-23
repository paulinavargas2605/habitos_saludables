<?php

require_once __DIR__ . '/../config/Database.php';
session_start();

class RegistroController
{
    public function index()
    {
        require_once __DIR__ . '/../views/registro/registro.php';
    }

    public function guardar()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $contrasena = $_POST['contrasena'] ?? '';
        $estatura = $_POST['estatura'] ?? '';
        $edad = $_POST['edad'] ?? '';
        $peso = $_POST['peso'] ?? '';

        $errores = [];

        if (!$nombre) $errores[] = "El nombre es obligatorio.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "Email inválido.";
        if (strlen($contrasena) < 6) $errores[] = "La contraseña debe tener al menos 6 caracteres.";
        if (!is_numeric($estatura) || $estatura <= 0) $errores[] = "Estatura inválida.";
        if (!is_numeric($edad) || $edad <= 0) $errores[] = "Edad inválida.";
        if (!is_numeric($peso) || $peso <= 0) $errores[] = "Peso inválido.";

        if ($errores) {
            $_SESSION['errores'] = $errores;
            header("Location: /habitos_saludables/public/index.php?controlador=registro&accion=index");
            exit();
        }

        $conn = Database::connect();

        $stmt = $conn->prepare("INSERT INTO usuario (Nombre, Email, Contrasena, Estatura, Edad, Peso) VALUES (?, ?, ?, ?, ?, ?)");
        $hashedPass = password_hash($contrasena, PASSWORD_BCRYPT);
        $stmt->bind_param("sssddi", $nombre, $email, $hashedPass, $estatura, $edad, $peso);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['exito'] = "¡Usuario registrado exitosamente!";
        } else {
            $_SESSION['errores'] = ["Hubo un problema al registrar el usuario."];
        }

        $stmt->close();
        $conn->close();

        header("Location: /habitos_saludables/public/index.php?controlador=registro&accion=index");
        exit();
    }
}
