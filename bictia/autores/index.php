<?php

include('Autores.php');
$autor = new Autores();


if (isset($_POST) && !empty($_POST)){
$insert = $autor->crearAutor($_POST);
if ($insert) {
    echo"Registro exitoso";
}else{
    echo "Falló";
}
}

$todosLosAutores =  $autor->obtenerAutores();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autores</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="estilos.css">
</head>

<body>



<div class="container">

<form  method="POST" >
<center><h1>Autores</h1></center>
<label for="nombres"> <h3>Nombre:</h3></label><br>
<input name="nombres" id="nombres" placeholder="Ingrese el nombre del autor" type="text" require class="input" >
<hr>
<br>
<label for="apellidos"> <h3>Apellido:</h3></label><br>
<input name="apellidos" id="apellidos" placeholder="Ingrese el apellido del autor" type="text" require  class="input">
<br>
<br>
<button class="boton">Enviar</button>

<hr>


<div class="tabla">

<table  border=1px>
  <th> <h3>Id</h3></th>
  <th><h3> Nombres </h3> </th>
  <th> <h3>Apellidos </h3></th>
  <th> <h3>Actualizar</h3> </th>
  <th><h3> Eliminar</h3> </th>
  
  

  <?php 
  while( $pers = mysqli_fetch_object($todosLosAutores) ){
    echo " <tr> ";
    echo " <td> $pers->id </td> ";
    echo " <td> $pers->nombre </td> ";
    echo " <td> $pers->apellido </td> ";
    echo " <td><a href='actualizar.php?id=$pers->id'>Actualizar</a></td>";
    echo " <td><a href='eliminar.php?id=$pers->id'>Eliminar</a></td>";
    
  }
  ?>

</table>
<hr>
</div>

</div>
</body>
</html>
