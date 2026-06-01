<?php
$conexion = new mysqli("localhost", "root", "", "crud_app");

if ($conexion->connect_error) {
    die("Error de conexión");
}
?>