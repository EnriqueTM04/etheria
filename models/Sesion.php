<?php

namespace Model;

class Sesion extends ActiveRecord {
    protected static $tabla = 'Sesion';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'descripcion', 'metrosRecorridos', 'idEvento'];

    private $id;
    private $fecha;
    private $hora;
    private $descripcion;
    private $metrosRecorridos;
    private $idEvento;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->metrosRecorridos = $args['metrosRecorridos'] ?? '';
        $this->idEvento = $args['idEvento'] ?? '';
    }

    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getMetrosRecorridos() {
        return $this->metrosRecorridos;
    }

    public function getIdEvento() {
        return $this->idEvento;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setMetrosRecorridos($metrosRecorridos) {
        $this->metrosRecorridos = $metrosRecorridos;
    }

    public function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }
}

?>