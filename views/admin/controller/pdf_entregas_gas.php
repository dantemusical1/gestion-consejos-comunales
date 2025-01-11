<?php
require('../../../fpdf186/fpdf.php'); 

class PDF extends FPDF {
    // Cabecera de la tabla
    function Header() {
        // Selecciona la fuente
        $this->SetFont('Arial', 'B', 12);
        // Mueve a la derecha
        $this->Cell(0, 10, 'Lista de Entregas de Gas', 0, 1, 'C');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer() {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Selecciona la fuente
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    // Tabla
    function Tabla($header, $data) {
        // Cabecera
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $col) {
            $this->Cell(60, 10, $col, 1);
        }
        $this->Ln();

        // Datos
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(60, 10, $col, 1);
            }
            $this->Ln();
        }
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();

// Definir cabecera de la tabla
$header = ['Responsable de la Entrega', 'Beneficiado', 'Fecha de Entrega'];

// Simulación de datos (deberías reemplazar esto con tus datos reales)
$data = [
    ['Juan Pérez', 'María Gómez', '2023-10-01'],
    ['Ana Torres', 'Luis Martínez', '2023-10-15'],
];

// Generar la tabla
$pdf->Tabla($header, $data);

// Salida del PDF
$pdf->Output('D', 'entregas_gas.pdf'); // 'D' para forzar la descarga
?>