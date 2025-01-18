<?php
$host='localhost';
$username='root';
$password='';
$dbname='consejos_comunales';

$conn = new mysqli("$host","$username","$password","$dbname");
	
	if($conn->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
?>

