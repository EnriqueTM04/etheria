<?php

namespace Model;

class Reporte extends ActiveRecord {
    protected static $tabla = 'Reporte';
    protected static $columnasDB = ['id', 'tipoReporte', 'importeGastos', 'datosCompetidores'];

    private $id;
    private $tipoReporte;
    private $importeGastos;
    private $datosCompetidores;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->tipoReporte = $args['tipoReporte'] ?? '';
        $this->importeGastos = $args['importeGastos'] ?? '';
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

    public function getImporteGastos() {
        return $this->importeGastos;
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

    public function setImporteGastos($importeGastos) {
        $this->importeGastos = $importeGastos;
    }

    public function setDatosCompetidores($datosCompetidores) {
        $this->datosCompetidores = $datosCompetidores;
    }
}

?>