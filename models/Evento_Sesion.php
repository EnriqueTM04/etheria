<?php

namespace Model;

class Evento_Sesion extends ActiveRecord {
    protected static $tabla = 'Evento_Sesion';
    protected static $columnasDB = ['id', 'idEvento', 'idSesion'];

    private $id;
    private $idEvento;
    private $idSesion;
    private $sala;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idEvento = $args['idEvento'] ?? '';
        $this->idSesion = $args['idSesion'] ?? '';
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

    public function getIdEvento() {
        return $this->idEvento;
    }

    public function getIdSesion() {
        return $this->idSesion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    public function setIdSesion($idSesion) {
        $this->idSesion = $idSesion;
    }
    
}

?>