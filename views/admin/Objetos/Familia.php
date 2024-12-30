<?php
class JefeFamilia {
    private $id;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $cedula;

    public function __construct($id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $cedula) {
        $this->id = $id;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->cedula = $cedula;
    }

    public function getNombreCompleto() {
        return $this->primerNombre . ' ' . $this->segundoNombre . ' ' . $this->primerApellido . ' ' . $this->segundoApellido;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getId() {
        return $this->id;
    }
}

class MiembroFamilia {
    private $id;
    private $idJefeFamilia;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $cedula;

    public function __construct($id, $idJefeFamilia, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $cedula) {
        $this->id = $id;
        $this->idJefeFamilia = $idJefeFamilia;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->cedula = $cedula;
    }

    public function getNombreCompleto() {
        return $this->primerNombre . ' ' . $this->segundoNombre . ' ' . $this->primerApellido . ' ' . $this->segundoApellido;
    }

    public function getCedula() {
        return $this->cedula;
    }
}

class CargaFamiliar {
    private $id;
    private $idJefeFamilia;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;

    public function __construct($id, $idJefeFamilia, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido) {
        $this->id = $id;
        $this->idJefeFamilia = $idJefeFamilia;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
    }

    public function getNombreCompleto() {
        return $this->primerNombre . ' ' . $this->segundoNombre . ' ' . $this->primerApellido . ' ' . $this->segundoApellido;
    }
}

// Simulación de datos
$jefeFamilia = new JefeFamilia(1, 'Juan', 'Carlos', 'Pérez', 'González', '12345678');

$miembrosFamilia = [
    new MiembroFamilia(1, 1, 'Ana', 'María', 'Pérez', 'González', '87654321'),
    new MiembroFamilia(2, 1, 'Luis', 'Fernando', 'Pérez', 'González', '11223344')
];

$cargasFamiliares = [
    new CargaFamiliar(1, 1, 'Sofía', 'Isabel', 'Pérez', 'González'),
    new CargaFamiliar(2, 1, 'Carlos', 'Andrés', 'Pérez', 'González')
];
?>