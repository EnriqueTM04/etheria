<?php

namespace Model;

class Reconocimiento extends ActiveRecord {
    protected static $tabla = 'Reconocimiento'; 
    protected static $columnasDB = ['id', 'datosCompetidor', 'lugar', 'meritos', 'descripcion', 'competidor', 'evento'];

    public $id;
    public $datosCompetidor;
    public $lugar;
    public $meritos;
    public $descripcion;
    public $competidor;
    public $evento;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->datosCompetidor = $args['datosCompetidor'] ?? '';
        $this->lugar = $args['lugar'] ?? '';
        $this->meritos = $args['meritos'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->competidor = $args['competidor'] ?? '';
        $this->evento = $args['evento'] ?? '';
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

    public function getDatosCompetidor() {
        return $this->datosCompetidor;
    }

    public function getLugar() {
        return $this->lugar;
    }

    public function getMeritos() {
        return $this->meritos;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCompetidor() {
        return $this->competidor;
    }

    public function getEvento() {
        return $this->evento;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDatosCompetidor($datosCompetidor) {
        $this->datosCompetidor = $datosCompetidor;
    }

    public function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    public function setMeritos($meritos) {
        $this->meritos = $meritos;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCompetidor($competidor) {
        $this->competidor = $competidor;
    }

    public function setEvento($evento) {
        $this->evento = $evento;
    }
}

?>