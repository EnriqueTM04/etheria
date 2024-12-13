<?php

namespace Model;

class Instructor extends ActiveRecord {
    protected static $tabla = 'Instructor';
    protected static $columnasDB = ['id', 'nombre', 'contacto', 'rol', 'idEvento'];

    private $id;
    private $nombre;
    private $contacto;
    private $rol;
    private $idEvento;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
        $this->rol = $args['rol'] ?? '';
        $this->idEvento = $args['idEvento'] ?? '';
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

    public function getContacto() {
        return $this->contacto;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getIdEvento() {
        return $this->idEvento;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }
}

?>