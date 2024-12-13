<?php

namespace Model;

class Evento extends ActiveRecord {
    protected static $tabla = 'Evento';
    protected static $columnasDB = ['id', 'nombre', 'fechaInicio', 'fechaPublicacion', 'fechaFinalizacion', 'duracion', 'modalidad', 'requisitos', 'convocatoria'];

    private $id;
    private $nombre;
    private $fechaInicio;
    private $fechaPublicacion;
    private $fechaFinalizacion;
    private $duracion;
    private $modalidad;
    private $requisitos;
    private $convocatoria;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->fechaPublicacion = $args['fechaPublicacion'] ?? '';
        $this->fechaFinalizacion = $args['fechaFinalizacion'] ?? '';
        $this->duracion = $args['duracion'] ?? '';
        $this->modalidad = $args['modalidad'] ?? '';
        $this->requisitos = $args['requisitos'] ?? '';
        $this->convocatoria = $args['convocatoria'] ?? '';

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

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaPublicacion() {
        return $this->fechaPublicacion;
    }

    public function getFechaFinalizacion() {
        return $this->fechaFinalizacion;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getModalidad() {
        return $this->modalidad;
    }

    public function getRequisitos() {
        return $this->requisitos;
    }

    public function getConvocatoria() {
        return $this->convocatoria;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaPublicacion($fechaPublicacion) {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    public function setFechaFinalizacion($fechaFinalizacion) {
        $this->fechaFinalizacion = $fechaFinalizacion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function setModalidad($modalidad) {
        $this->modalidad = $modalidad;
    }

    public function setRequisitos($requisitos) {
        $this->requisitos = $requisitos;
    }

    public function setConvocatoria($convocatoria) {
        $this->convocatoria = $convocatoria;
    }
}

?>