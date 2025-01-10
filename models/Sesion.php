<?php

namespace Model;


class Sesion extends ActiveRecord {
    protected static $tabla = 'Sesion';
    protected static $columnasDB = ['id', 'descripcion', 'metrosRecorridos', 'idEvento','fechaHora'];

    private $id;
    private $descripcion;
    private $metrosRecorridos;
    private $idEvento;
    private $fechaHora;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->metrosRecorridos = $args['metrosRecorridos'] ?? '';
        $this->idEvento = $args['idEvento'] ?? '';
        $this->fechaHora = $args['fechaHora'] ?? '';
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

   public function getFechaHora() {
        return $this->fechaHora;
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

    public function setFechaHora($fechaHora) {
        $this->fechaHora = $fechaHora;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function getEvento() {
        return Evento::find($this->idEvento);
    }


    public function validar() {
       if(!$this->fechaHora) {
            self::$alertas['fechaHora'] = 'Debes añadir una fecha y hora.';
        }

        if (!$this->descripcion) {
            self::$alertas['descripcion'] = 'Debes añadir una descripción.';
        }

        if (!$this->metrosRecorridos) {
            self::$alertas['metrosRecorridos'] = 'Debes añadir los metros recorridos.';
        }

        if (!$this->idEvento) {
            self::$alertas['idEvento'] = 'Debes añadir un evento.';
        }
        

        return self::$alertas;
    }

    public function guardar() {
        if (!is_null($this->id)) {
            // actualizar
            return $this->actualizar();
        } else {
            // crear
            return $this->crear();
        }
    }


}

?>