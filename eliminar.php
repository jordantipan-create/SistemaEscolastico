<?php
include("conexion.php");

$id = $_POST['id'];

$conexion->query("DELETE FROM clientes WHERE id=$id");
?>