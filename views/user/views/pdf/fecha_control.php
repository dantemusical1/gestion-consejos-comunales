<?php
function convertirNumeroADias($numero) {
    $numeros = [
        0 => 'Cero', 1 => 'Uno', 2 => 'Dos', 3 => 'Tres', 4 => 'Cuatro', 5 => 'Cinco',
        6 => 'Seis', 7 => 'Siete', 8 => 'Ocho', 9 => 'Nueve', 10 => 'Diez',
        11 => 'Once', 12 => 'Doce', 13 => 'Trece', 14 => 'Catorce', 15 => 'Quince',
        16 => 'Dieciséis', 17 => 'Diecisiete', 18 => 'Dieciocho', 19 => 'Diecinueve',
        20 => 'Veinte', 21 => 'Veintiuno', 22 => 'Veintidos', 23 => 'Veintitres',
        24 => 'Veinticuatro', 25 => 'Veinticinco', 26 => 'Veintiseis', 27 => 'Veintisiete',
        28 => 'Veintiocho', 29 => 'Veintinueve', 30 => 'Treinta', 31 => 'Treinta y uno'
    ];
    return $numeros[$numero];
}

function convertirNumeroAAño($numero) {
    $unidades = [
        0 => '', 1 => 'Uno', 2 => 'Dos', 3 => 'Tres', 4 => 'Cuatro', 5 => 'Cinco',
        6 => 'Seis', 7 => 'Siete', 8 => 'Ocho', 9 => 'Nueve'
    ];
    
    $decenas = [
        0 => '', 1 => 'Diez', 2 => 'Veinte', 3 => 'Treinta', 4 => 'Cuarenta',
        5 => 'Cincuenta', 6 => 'Sesenta', 7 => 'Setenta', 8 => 'Ochenta', 9 => 'Noventa'
    ];
    
    $centenas = [
        0 => '', 1 => 'Cien', 2 => 'Doscientos', 3 => 'Trescientos', 4 => 'Cuatrocientos',
        5 => 'Quinientos', 6 => 'Seiscientos', 7 => 'Setecientos', 8 => 'Ochocientos', 9 => 'Novecientos'
    ];
    
    $miles = [
        0 => '', 1 => 'Mil', 2 => 'Dos Mil', 3 => 'Tres Mil', 4 => 'Cuatro Mil',
        5 => 'Cinco Mil', 6 => 'Seis Mil', 7 => 'Siete Mil', 8 => 'Ocho Mil', 9 => 'Nueve Mil'
    ];

    $resultado = '';
    
    // Descomponer el año
    $mil = (int)($numero / 1000);
    $cent = (int)(($numero % 1000) / 100);
    $dec = (int)(($numero % 100) / 10);
    $uni = $numero % 10;

    // Construir la representación en palabras
    if ($mil > 0) {
        $resultado .= $miles[$mil] . ' ';
    }
    if ($cent > 0) {
        $resultado .= $centenas[$cent] . ' ';
    }
    if ($dec > 1) {
        $resultado .= $decenas[$dec] . ' ';
        if ($uni > 0) {
            $resultado .= 'y ' . $unidades[$uni] . ' ';
        }
    } elseif ($dec == 1) {
        if ($uni == 0) {
            $resultado .= $decenas[$dec] . ' ';
        } else {
            $resultado .= 'Diez y ' . $unidades[$uni] . ' ';
        }
    } else {
        if ($uni > 0) {
            $resultado .= $unidades[$uni] . ' ';
        }
    }

    return trim($resultado);
}

// Obtener la fecha actual
$fechaActual = new DateTime();
$dias = $fechaActual->format('d');
$mes = $fechaActual->format('m');
$año = $fechaActual->format('Y');
// Nombres de los meses
$nombresMeses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
    7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];

// Formatear la salida
$salida = sprintf(
    "%s (%d) dias del mes de %s del año %s (%d);",
    convertirNumeroADias($dias),
    $dias,
    $nombresMeses[(int)$mes],
    convertirNumeroAAño($año),
    $año
);

// Mostrar el resultado
echo $salida;
?>