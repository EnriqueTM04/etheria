<?php

namespace Model;

class Instructor extends ActiveRecord {
    protected static $tabla = 'Instructor';  // Nombre de la tabla en la base de datos (en minúsculas)
    protected static $columnasDB = ['id', 'nombre', 'correo', 'rol', 'idEvento', 'pass'];  // Añadí el campo 'correo' y 'pass'

    private $id;
    private $nombre;
    private $correo;  // Cambié 'contacto' por 'correo' según la tabla
    private $rol;
    private $idEvento;
    private $pass;  // Añadí la propiedad 'pass' según la tabla

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->correo = $args['correo'] ?? '';  // Inicialicé 'correo'
        $this->rol = $args['rol'] ?? '';
        $this->idEvento = $args['idEvento'] ?? '';
        $this->pass = $args['pass'] ?? '';  // Inicialicé 'pass'
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }    

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            return "La propiedad '$name' no existe.";
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;  // Método para obtener 'correo'
    }

    public function getRol() {
        return $this->rol;
    }

    public function getIdEvento() {
        return $this->idEvento;
    }

    public function getPass() {
        return $this->pass;  // Método para obtener 'pass'
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;  // Método para establecer 'correo'
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    public function setPass($pass) {
        $this->pass = $pass;  // Método para establecer 'pass'
    }
}

?>
