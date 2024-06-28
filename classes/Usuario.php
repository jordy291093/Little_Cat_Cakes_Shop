<?php 

namespace App;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id', 'email', 'password', 'createdt'];

    // Validaciones
    protected static $errores = [];

    public $id;
    public $email;
    public $password;
    public $createdt;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? NULL;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->createdt = date('Y/m/d') ?? '';
    }

    public function validar() {
        if (!$this->email) {
            self::$errores[] = "Añadir Email";
        }

        if (!$this->password) {
            self::$errores[] = "Añadir Password";
        }

        return self::$errores;
    }

    public function crearUser() {
        $atributos = $this->sanitizarDatos();

        $passwordHash = password_hash($atributos['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES ('" . $atributos['email'] . "', '" . $passwordHash . "', '" . $atributos['createdt'];
        $query .= "')";

        // debug($query);

        $resultado = self::$db->query($query);

        // Mensaje de exito
        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /login.php?resultado=1');
        }
    }
}