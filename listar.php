<?php
include("conexion.php");

$result = $conexion->query("SELECT * FROM clientes");

while($row = $result->fetch_assoc()){
    echo $row['id']." - ".$row['nombre']." - ".$row['correo'];
    echo " 
    <button onclick='eliminar(".$row['id'].")'>Eliminar</button>
    <button onclick='actualizar(".$row['id'].")'>Editar</button>
    <br>";
}
?>