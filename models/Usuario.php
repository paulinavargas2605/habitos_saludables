<?php
require_once __DIR__ . '/../config/Database.php';

class Usuario {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function obtenerPorEmail($email) {
        $sql = "SELECT * FROM usuario WHERE Email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc(); // devuelve un arreglo con datos o null si no existe
    }

    public function login($email, $password) {
        $usuario = $this->obtenerPorEmail($email);
        if ($usuario && password_verify($password, $usuario['Contrasena'])) {
            return $usuario;
        }
        return false;
    }

    public static function obtenerPorId($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT id, nombre, edad, estatura, peso, email FROM usuario WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function actualizar($id, $nombre, $edad, $estatura, $peso, $email, $contrasena) {
        $conexion = Database::connect();
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "UPDATE usuario SET nombre=?, edad=?, estatura=?, peso=?, email=?, contrasena=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("siddssi", $nombre, $edad, $estatura, $peso, $email, $contrasenaHash, $id);

        return $stmt->execute();
    }

}

