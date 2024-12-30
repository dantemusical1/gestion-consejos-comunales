<?php

class Persona {
    protected $fechaNacimiento;
    protected $cedulaIdentidad;
    protected $genero;
    protected $numeroCasa;
    protected $nombre;
    protected $apellido;

    public function __construct($fechaNacimiento, $cedulaIdentidad, $genero, $numeroCasa, $nombre, $apellido) {
        $this->fechaNacimiento = $fechaNacimiento;
        $this->cedulaIdentidad = $cedulaIdentidad;
        $this->genero = $genero;
        $this->numeroCasa = $numeroCasa;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNombreCompleto() {
        return $this->nombre . ' ' . $this->apellido;
    }

    // Métodos getters y setters para los atributos
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getCedulaIdentidad() {
        return $this->cedulaIdentidad;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getNumeroCasa() {
        return $this->numeroCasa;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }
}

class MiembroConsejoComunal extends Persona {
    private $cargo;

    public function __construct($fechaNacimiento, $cedulaIdentidad, $genero, $numeroCasa, $nombre, $apellido, $cargo) {
        parent::__construct($fechaNacimiento, $cedulaIdentidad, $genero, $numeroCasa, $nombre, $apellido);
        $this->cargo = $cargo;
    }

    public function getCargo() {
        return $this->cargo;
    }
}

class Asesor extends Persona {
    private $especialidad;

    public function __construct($fechaNacimiento, $cedulaIdentidad, $genero, $numeroCasa, $nombre, $apellido, $especialidad) {
        parent::__construct($fechaNacimiento, $cedulaIdentidad, $genero, $numeroCasa, $nombre, $apellido);
        $this->especialidad = $especialidad;
    }

    public function getEspecialidad() {
        return $this->especialidad;
    }
}

// Ejemplo de uso
$miembro = new MiembroConsejoComunal('1980-01-01', '12345678', 'Masculino', '10', 'Juan', 'Pérez', 'Presidente');
$asesor = new Asesor('1990-05-15', '87654321', 'Femenino', '20', 'María', 'Gómez', 'Desarrollo Comunitario');

echo "Miembro: " . $miembro->getNombreCompleto() . ", Cargo: " . $miembro->getCargo() . "\n";
echo "Asesor: " . $asesor->getNombreCompleto() . ", Especialidad: " . $asesor->getEspecialidad() . "\n";

?>