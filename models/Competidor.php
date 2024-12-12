<?php

namespace Model;

class Competidor extends ActiveRecord {

    protected static $tabla = 'Competidor';
    protected static $columnasDB = ['id', 'nombre', 'edadCompetidor', 'genero', 'contacto', 'historialClinico'];

    private $id;
    private $nombre;
    private $edadCompetidor;
    private $genero;
    private $contacto;
    private $historialClinico;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->edadCompetidor = $args['edadCompetidor'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
        $this->historialClinico = $args['historialClinico'] ?? '';
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

    public function getEdadCompetidor() {
        return $this->edadCompetidor;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getContacto() {
        return $this->contacto;
    }

    public function getHistorialClinico() {
        return $this->historialClinico;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEdadCompetidor($edadCompetidor) {
        $this->edadCompetidor = $edadCompetidor;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    public function setHistorialClinico($historialClinico) {
        $this->historialClinico = $historialClinico;
    }

}

?>