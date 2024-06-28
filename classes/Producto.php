<?php 

namespace App;

class Producto extends ActiveRecord {
    protected static $tabla = 'producto';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'imagen', 'tipo', 'categoria', 'tipoCorte', 'cantidadGde', 'cantidadMed', 'cantidadCh', 'tamañoGde', 'tamañoMed', 'tamañoCh', 'createdt'];

    public $id;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $tipo;
    public $categoria;
    public $tipoCorte;
    public $cantidadGde;
    public $cantidadMed;
    public $cantidadCh;
    public $tamañoGde;
    public $tamañoMed;
    public $tamañoCh;
    public $createdt;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->tipoCorte = $args['tipoCorte'] ?? '';
        $this->cantidadGde = $args['cantidadGde'] ?? '';
        $this->cantidadMed = $args['cantidadMed'] ?? '';
        $this->cantidadCh = $args['cantidadCh'] ?? '';
        $this->tamañoGde = $args['tamañoGde'] ?? '';
        $this->tamañoMed = $args['tamañoMed'] ?? '';
        $this->tamañoCh = $args['tamañoCh'] ?? '';
        $this->createdt = date('Y/m/d') ?? '';
    }

    public function validar() {
        if (!$this->nombre) {
            self::$errores[] = "Añadir nombre";
        }

        if (!$this->descripcion) {
            self::$errores[] = "Añadir descripcion";
        }

        if (!$this->imagen) {
            self::$errores[] = "Añadir imagen";
        }

        if (!$this->tipo) {
            self::$errores[] = "Añadir tipo";
        }

        if (!$this->categoria) {
            self::$errores[] = "Añadir categoria";
        }

        if (!$this->tipoCorte) {
            self::$errores[] = "Añadir tipo de corte";
        }

        if (!$this->cantidadGde) {
            self::$errores[] = "Añadir cantidad para tamaño grande";
        }

        if (!$this->cantidadMed) {
            self::$errores[] = "Añadir cantidad para tamaño mediano";
        }

        if (!$this->cantidadCh) {
            self::$errores[] = "Añadir cantidad para tamaño chico";
        }
        
        if (!$this->tamañoGde) {
            self::$errores[] = "Añadir Tamaño para tamaño chico";
        }
        
        if (!$this->tamañoMed) {
            self::$errores[] = "Añadir Tamaño para tamaño chico";
        }
        
        if (!$this->tamañoCh) {
            self::$errores[] = "Añadir Tamaño para tamaño chico";
        }

        return self::$errores;
    }
    public function guardar() {
        if (!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Creando un nuevo registro
            $this->crear();
        }
    }

    public function crear(){
        $atributos = $this->sanitizarDatos();

        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "')";

        // debug($query);

        $resultado = self::$db->query($query);

        // Mensaje de exito
        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin/productos.php?resultado=1');
        }
    }

    public function actualizar() {

        // Sanitizar los datos, evita que ningun usuario inyecte sql a la base de datos
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) ."' ";
        $query .= " LIMIT 1 ";

        // debug($query);

        $resultado = self::$db->query($query);

        // debug($resultado);

        // Mensjae de exito
        if($resultado) {
            header('Location: /admin/productos.php?resultado=2');
        }
    }

    public function setImagen($imagen) {
        
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Eliminacion del archivo
    public function borrarImagen() {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_PRODUCTO . $this->imagen);

        if ($existeArchivo) {
            unlink(CARPETA_PRODUCTO . $this->imagen);
        }
    }
}