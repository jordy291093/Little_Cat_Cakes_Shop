<?php

namespace App;

class Cliente extends ActiveRecord {
    protected static $tabla = 'cliente';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'celular', 'direccion', 'imagen', 'precio', 'anticipo', 'restante', 'estatus', 'tamaño', 'tipo', 'categoria', 'sabor', 'saborGurmet', 'relleno', 'rellenoExtra', 'naturalExtra', 'createdt', 'entrega', 'compra'];

    public $id;
    public $nombre;
    public $apellidos;
    public $celular;
    public $direccion;
    public $imagen;
    public $precio;
    public $anticipo;
    public $restante;
    public $estatus;
    public $tamaño;
    public $tipo;
    public $categoria;
    public $sabor;
    public $saborGurmet;
    public $relleno;
    public $rellenoExtra;
    public $naturalExtra;
    public $createdt;
    public $compra;
    public $entrega;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->celular = $args['celular'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->anticipo = $args['anticipo'] ?? '';
        $this->restante = $args['restante'] ?? '';
        $this->estatus = $args['estatus'] ?? '';
        $this->tamaño = $args['tamaño'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->sabor = $args['sabor'] ?? '';
        $this->saborGurmet = $args['saborGurmet'] ?? '';
        $this->relleno = $args['relleno'] ?? '';
        $this->rellenoExtra = $args['rellenoExtra'] ?? '';
        $this->naturalExtra = $args['naturalExtra'] ?? '';
        $this->createdt = date('Y/m/d') ?? '';
        $this->compra = $args['compra'] ?? '';
        $this->entrega = $args['entrega'] ?? '';
    }

    public function validar() {
        
        if (!$this->nombre) {
            self::$errores[] = "Añadir nombre";
        }

        if (!$this->apellidos) {
            self::$errores[] = "Añadir apellidos";
        }

        if (!$this->celular) {
            self::$errores[] = "Añadir numero de celular";
        }

        if (!$this->direccion) {
            self::$errores[] = "Añadir dirección";
        }

        if (!$this->imagen) {
            self::$errores[] = "Añadir imagen del producto";
        }

        if (!$this->precio) {
            self::$errores[] = "Añadir precio";
        }

        if (!$this->anticipo) {
            self::$errores[] = "Añadir anticipo";
        }

        if (!$this->estatus) {
            self::$errores[] = "Añadir estatus";
        }

        if (!$this->tamaño) {
            self::$errores[] = "Añadir tamaño";
        }

        if (!$this->tipo) {
            self::$errores[] = "Añadir tipo";
        }

        if (!$this->categoria) {
            self::$errores[] = "Añadir categoria";
        }

        if (!$this->sabor) {
            self::$errores[] = "Añadir sabor";
        }

        if (!$this->saborGurmet) {
            self::$errores[] = "Añadir sabor Gurmet";
        }

        if (!$this->relleno) {
            self::$errores[] = "Añadir relleno";
        }

        if (!$this->rellenoExtra) {
            self::$errores[] = "Añadir relleno extra";
        }

        if (!$this->naturalExtra) {
            self::$errores[] = "Añadir natural extra";
        }

        if (!$this->compra) {
            self::$errores[] = "Añadir Fecha de compra";
        }

        if (!$this->entrega) {
            self::$errores[] = "Añadir fecha de entrega";
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
        // Sanitizar los datos, evita que ningun usuario inyecte sql a la base de datos
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
            header('Location: /admin/clientes.php?resultado=1');
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
            header('Location: /admin/clientes.php?resultado=2');
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
        $existeArchivo = file_exists(CARPETA_CLIENTES . $this->imagen);

        if ($existeArchivo) {
            unlink(CARPETA_CLIENTES . $this->imagen);
        }
    }
}