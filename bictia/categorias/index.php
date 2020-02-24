<?php

include('Categoria.php');
$categoria = new Categoria();


if (isset($_POST) && !empty($_POST)) {
  $insert = $categoria->crearCategoria($_POST);
  if ($insert) {
    echo "Registro exitoso";
  } else {
    echo "Falló";
  }
}

$todasLasCategorias =  $categoria->obtenerCategorias();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Categoria</title>
</head>

<body>
   

    <center><h1>Categorias</h1></center>
    
    <br>
    <div class="container">
    <form method="POST">

        <label for="nombres"> <h1>Nombre de la categoria</h1></label><br>
        
        <input name="nombres" id="nombres" class="input" placeholder="Ingrese el nombre" type="text" require>
        <hr>
        <br>

        <button class="boton">Enviar</button>

        <div class="container">
        <table border="1px">
            <th> <h3>id</h3> </th>
            <th> <h3>Nombres </h3> </th>
            <th> <h3>Actualizar</h3> </th>
            <th> <h3>Eliminar</h3> </th>



            <?php
      while ($pers = mysqli_fetch_object($todasLasCategorias)) {
        echo " <tr> ";
        echo " <td> $pers->id </td> ";
        echo " <td> $pers->nombre </td> ";
        echo " <td><a href='actualizar.php?id=$pers->id'>Actualizar</a></td>";
        echo " <td><a href='eliminar.php?id=$pers->id'>Eliminar</a></td>";
      }
      ?>

        </table>
        </div>
      <hr>
        </div>