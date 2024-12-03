<?php

namespace Model;

class EventoCompetidor extends ActiveRecord {
    protected static $tabla = 'Evento_Competidor';
    protected static $columnasDB = ['id', 'idEvento', 'idCompetidor'];

    private $id;
    private $idEvento;
    private $idCompetidor;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idEvento = $args['idEvento'] ?? '';
        $this->idCompetidor = $args['idCompetidor'] ?? '';
    }

    public function getId() {
        return $this->id;
    }

    public function getIdEvento() {
        return $this->idEvento;
    }

    public function getIdCompetidor() {
        return $this->idCompetidor;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    public function setIdCompetidor($idCompetidor) {
        $this->idCompetidor = $idCompetidor;
    }

}

?>