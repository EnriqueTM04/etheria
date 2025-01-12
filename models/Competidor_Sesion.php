<?php

namespace Model;

class Competidor_Sesion extends ActiveRecord {
    protected static $tabla = 'Competidor_Sesion';
    protected static $columnasDB = ['id', 'idCompetidor', 'idSesion', 'tiempo', 'distancia'];

    private $id;
    private $idCompetidor;
    private $idSesion;
    private $tiempo;
    private $distancia;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idCompetidor = $args['idEvento'] ?? '';
        $this->idSesion = $args['idSesion'] ?? '';
        $this->tiempo = $args['tiempo'] ?? '';
        $this->distancia = $args['distancia'] ?? '';
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

    public function getIdCompetidor() {
        return $this->idCompetidor;
    }

    public function getIdSesion() {
        return $this->idSesion;
    }

    public function getTiempo() {
        return $this->tiempo;
    }

    public function getDistancia() {
        return $this->distancia;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCompetidor($idEvento) {
        $this->idEvento = $idEvento;
    }

    public function setIdSesion($idSesion) {
        $this->idSesion = $idSesion;
    }

    public function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

    public function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    public function validar() {
        if (!$this->tiempo) {
            self::$alertas[] = 'El tiempo es obligatorio.';
        }

        if (!$this->distancia) {
            self::$alertas[] = 'La distancia es obligatoria.';
        }

        if (!$this->idCompetidor) {
            self::$alertas[] = 'El competidor es obligatorio.';
        }

        if (!$this->idSesion) {
            self::$alertas[] = 'La sesión es obligatoria.';
        }

        return self::$alertas;
    }
    
}
