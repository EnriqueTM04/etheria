<?php

namespace Model;

class Reporte extends ActiveRecord {
    protected static $tabla = 'Reporte';
    protected static $columnasDB = ['id', 'tipoReporte', 'mejoresLugares', 'datosCompetidores'];

    private $id;
    private $tipoReporte;
    private $mejoresLugares;
    private $datosCompetidores;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->tipoReporte = $args['tipoReporte'] ?? '';
        $this->mejoresLugares = $args['mejoresLugares'] ?? '';
        $this->datosCompetidores = $args['datosCompetidores'] ?? '';
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

    public function getTipoReporte() {
        return $this->tipoReporte;
    }

    public function getMejoresLugares() {
        return $this->mejoresLugares;
    }

    public function getDatosCompetidores() {
        return $this->datosCompetidores;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTipoReporte($tipoReporte) {
        $this->tipoReporte = $tipoReporte;
    }

    public function setMejoresLugares($mejoresLugares) {
        $this->mejoresLugares = $mejoresLugares;
    }

    public function setDatosCompetidores($datosCompetidores) {
        $this->datosCompetidores = $datosCompetidores;
    }
}

?>