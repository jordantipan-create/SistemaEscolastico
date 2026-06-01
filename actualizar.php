<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$conexion->query("UPDATE clientes 
SET nombre='$nombre', correo='$correo'
WHERE id=$id");
?>