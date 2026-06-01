<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$sql = "INSERT INTO clientes(nombre, correo)
        VALUES('$nombre','$correo')";

echo $conexion->query($sql) ? "Guardado" : "Error";
?>