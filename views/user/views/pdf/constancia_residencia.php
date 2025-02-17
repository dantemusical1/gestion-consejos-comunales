<?php
include('../../../../fpdf186/fpdf.php');
include('../../../../config/conexion.php');
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Times', 'B', 12);
        $headerText = "REPUBLICA BOLIVARIANA DE VENEZUELA";
        $headerText2 = "ESTADO BOLIVARIANO DE MERIDA";
        $headerText3 = "LA AZULITA";
        
        // Calcular el ancho del texto
        $textWidth = $this->GetStringWidth($headerText);
        
        // Establecer la posición X para centrar
        $this->SetX((210 - $textWidth) / 2); // 210 mm es el ancho de A4
        
        // Imprimir el encabezado
        $this->Cell($textWidth, 10, $headerText, 0, 1, 'C');
        $this->Cell(0, 10, $headerText2, 0, 1, 'C');
        $this->Cell(0, 10, $headerText3, 0, 1, 'C');
        $this->Ln(10); // Espacio después del encabezado
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->SetMargins(20, 20, 20);

$nombre = "Jesus Medina Ruz";
$cedula_identidad = "123456789";
$nombre_consejo_comunal = "CONSEJO COMUNAL DE MIRABEL";
$nombre_municipio = "ANDRES BELLO";
$numero_carta = "AB1234";
$numero_de_casa = "12-73";
$fecha = date('d/m/Y'); 

$texto = "
Coordinadora del consejo comunal: YELITZA RODRIGUEZ

CARTA Nro " . $numero_carta . "
Ciudadano (a) de este Consejo Comunal " . $nombre_consejo_comunal . ", nos dirigimos por medio de la presente para indicar que el ciudadano: " . $nombre . ", titular de la Cedula de Identidad Personal Nro: " . $cedula_identidad . ", se encuentra residenciado en la casa " . $numero_de_casa . ", desde la fecha " . $fecha . " hasta la actualidad: 
de manera tal que el ciudadano " . $nombre . ", actualmente esta recidenciado entre las calles tal y tal, y esta adscrito(a) al Consejo comunal " . $nombre_consejo_comunal . " del Municipio ".$nombre_municipio.", Parroquia La Azulita.

Constancia que se expide el dia ".$fecha." .
";

// Agregar el texto al PDF
$pdf->MultiCell(0, 10, $texto);

// Salida del PDF
$pdf->Output();
?>