<?php
// Incluir la biblioteca FPDF
include('../../../../fpdf186/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Lista de Entregas', 0, 1, 'C');
        $this->Ln(10); // Espacio después del encabezado
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(60, 10, 'Jefe de Familia', 1); 
        $this->Cell(30, 10, 'Fecha Entrega', 1);
        $this->Cell(30, 10, 'Nro Casa', 1);
        $this->Cell(40, 10, 'Detalles', 1);
        $this->Ln();
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

include('../../../../config/conexion.php');

// Consulta a la base de datos
$query = "
SELECT 
    hec.id_entrega, 
    CONCAT(jf.primer_nombre, ' ', jf.segundo_nombre, ' ', jf.primer_apellido, ' ', jf.segundo_apellido) AS jefe_familia, 
    hec.id_miembro, 
    hec.fecha_entrega, 
    hec.nro_casa, 
    hec.detalles 
FROM 
    historial_entregas_clap hec
JOIN 
    jefes_familia jf ON hec.id_jefe_familia = jf.id
WHERE 
    1";

$result = mysqli_query($conn, $query);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times', '', 10);

// Agregar los datos al PDF
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(60, 10, $row['jefe_familia'], 1); 
    $pdf->Cell(30, 10, $row['fecha_entrega'], 1);
    $pdf->Cell(30, 10, $row['nro_casa'], 1);
    $pdf->Cell(40, 10, $row['detalles'], 1);
    $pdf->Ln();
}

// Cerrar la conexión
mysqli_close($conn);

// Salida del PDF
$pdf->Output();
?>
