<?php

$host = "localhost"; 

$usuario = "root"; 

$password_db = "";

$nombre_base_datos = "consejos_comunales"; 

$mysqli = new mysqli($host, $usuario, $password_db, $nombre_base_datos);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>