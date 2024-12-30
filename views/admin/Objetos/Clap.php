<?php

class Clap {
    private $miembro; 
    private $numeroCasa;
    private $fechaEntrega;

    public function __construct($miembro, $numeroCasa, $fechaEntrega) {
        $this->miembro = $miembro;
        $this->numeroCasa = $numeroCasa;
        $this->fechaEntrega = $fechaEntrega;
    }

    public function getMiembro() {
        return $this->miembro;
    }

    public function getNumeroCasa() {
        return $this->numeroCasa;
    }

    public function getFechaEntrega() {
        return $this->fechaEntrega;
    }

    public function getDetallesEntrega() {
        return [
            'nombre' => $this->miembro->getNombre(),
            'apellido' => $this->miembro->getApellido(),
            'cedula' => $this->miembro->getCedulaIdentidad(),
            'numeroCasa' => $this->numeroCasa,
            'fechaEntrega' => $this->fechaEntrega,
        ];
    }
}