```php
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>CRUD Clientes PRO</title>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
body{
    background:#0f172a;
    color:#e2e8f0;
    font-family: Arial;
    text-align:center;
}

.container{
    width:400px;
    margin:50px auto;
    padding:20px;
    background:#1e293b;
    border-radius:10px;
    box-shadow:0 0 20px #00f0ff;
}

h2{
    color:#00f0ff;
}

input{
    width:90%;
    padding:10px;
    margin:10px;
    border:none;
    border-radius:5px;
    outline:none;
}

button{
    padding:10px 15px;
    margin:5px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    background:#00f0ff;
    color:#000;
    font-weight:bold;
    transition:0.3s;
}

button:hover{
    background:#0ff;
    transform:scale(1.05);
}

#resultado{
    margin-top:20px;
    text-align:left;
}

.card{
    background:#0f172a;
    padding:10px;
    margin:10px 0;
    border-left:5px solid #00f0ff;
    border-radius:5px;
}

.msg{
    margin-top:10px;
    padding:10px;
    border-radius:5px;
    display:none;
}

.success{background:#16a34a;}
.error{background:#dc2626;}
</style>

</head>
<body>

<div class="container">

<h2>CRUD Clientes</h2>

<input type="text" id="nombre" placeholder="Nombre">
<input type="email" id="correo" placeholder="Correo">

<br>

<button onclick="agregar()">Agregar</button>
<button onclick="listar()">Mostrar</button>

<div id="mensaje" class="msg"></div>

<div id="resultado"></div>

</div>

<script>

function mostrarMsg(texto, tipo){
    $("#mensaje").removeClass().addClass("msg " + tipo).text(texto).fadeIn();
    setTimeout(()=> $("#mensaje").fadeOut(), 2000);
}

function agregar(){
    let nombre = $("#nombre").val().trim();
    let correo = $("#correo").val().trim();

    if(nombre === "" || correo === ""){
        mostrarMsg("Completa todos los campos", "error");
        return;
    }

    $.post("insertar.php", {nombre, correo}, function(res){
        mostrarMsg(res, "success");
        $("#nombre").val("");
        $("#correo").val("");
        listar();
    });
}

function listar(){
    $.get("listar.php", function(data){
        $("#resultado").html(data);
    });
}

function eliminar(id){
    if(confirm("¿Eliminar registro?")){
        $.post("eliminar.php", {id}, function(){
            mostrarMsg("Eliminado", "success");
            listar();
        });
    }
}

function actualizar(id){
    let nombre = prompt("Nuevo nombre:");
    let correo = prompt("Nuevo correo:");

    if(nombre && correo){
        $.post("actualizar.php", {id, nombre, correo}, function(){
            mostrarMsg("Actualizado", "success");
            listar();
        });
    }
}

// Cargar datos al iniciar
$(document).ready(function(){
    listar();
});

</script>

</body>
</html>
```
