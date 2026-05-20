<?php
$host = "localhost";
$usuario = "a25kilguapio_admin";
$contrasenia = "Caballos09***";
$base_de_datos = "a25kilguapio_digisos";

$conn = new mysqli($host, $usuario, $contrasenia, $base_de_datos);

if ($conn->connect_errno) {   
    die("Falló la conexión a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error);
}