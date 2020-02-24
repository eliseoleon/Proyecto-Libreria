<?php
include('Libro.php'); //Llamamos al archivo
$libro = new Libro(); //Creamos una nueva instancia de persona.

//Validamos si ya se envió algun dato desde el formulario.





$todosLosLibros =  $libro->traerLibros();


?>
<?php

session_start();
$usuario = $_SESSION['username'];
if (!isset($usuario)) {
    header("location: ../login.php");
} else {
  


    echo"<a href='salir.php'>Salir</a>";
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
   <link rel="stylesheet" href="estilosP.css">
   <link rel="stylesheet" href="estilos.css">
    <title>Lista de libreria</title>
</head>
<body>
<header>

<h1>Bienvenidos a <i>la biblioteca</i></h1>
<nav>
    <a href="#">Inicio</a>
    <a href="#">Libros</a>
    <a href="#">Categorias</a>
    <a href="#">Login</a>
</nav>


</header>
<div class="body-container">
 <center> <h1>Lista libreria</h1></center>
 <hr>

<div class="container">

  <form action="buscar_libro.php" method="$_GET" class="form_search" enctype="multipart/form-data">
     
    <input type="text" name="busqueda" id="busqueda" placeholder="BUSQUEDA" class="input">
    <button class="boton"><input type="submit" value="BUSCAR" class="btn-search" class="form-control"></button>
    
   </form>

</div>
<hr>

<div class="container">

<a href="/bictia/autores"><input type="button" value="Autores" class="input"></a></button>

<a href="/bictia/categorias"><input type="button" value="Categorias" class="input"></a>
<a href="/bictia/crearLibro"><input type="button" value="Crear nuevo libro" class="input"></a>

</div>

<hr>
<div class="container-fluit">
<table border="px" >
    <th><h5>id</h5></th>
    <th> <h5>Nombre</h5> </th>
    <th> <h5>Categoria</h5> </th>
    <th> <h5>Nombre Autor</h5> </th>
    <th> <h5>Apellido Autor</h5> </th>
    <th> <h5>Comentario </h5></th>
    <th><h5> Descripcion</h5> </th>
    <th> <h5> Descripcion</h5> </th>
    <th> <h5>Fecha_publicacion</h5> </th>
    <th> <h5>Imagen</h5></th>
    <th> <h5>Modificar</h5> </th>
    <th> <h5>Eliminar</h5></th>
    




    <?php
    while ($libr = mysqli_fetch_object($todosLosLibros)) {
        $root = 'http://'.$_SERVER['HTTP_HOST'].'/bictia';
        $image = !empty($libr->imagen) ? "$root/images/$libr->imagen" : "$root/biblioteca.jpg";
        echo " <tr> ";
        echo " <td> $libr->id </td> ";
        echo " <td> $libr->nombre </td> ";
        echo " <td> $libr->categoria</td> ";
        echo " <td> $libr->nombre_autor </td> ";
        echo " <td> $libr->apellido_autor </td> ";
        echo " <td> $libr->comentario </td> ";
        echo " <td>". utf8_encode($libr->descripcion)." </td> ";
        echo " <td> $libr->valor </td> ";
        echo " <td> $libr->fecha_publicacion </td> ";
        echo " <td> <img src='$image' alt='Imagen' width='50' height='50' /> </td> ";
        echo " <td><a href='edit.php?id=$libr->id'>Modificar</a></td>";
        echo " <td><a href='eliminar.php?id=$libr->id'>Eliminar</a></td>";
    }
    ?>

</table>
<br>
</div>
</div>
<script src="jquery-1.11.0.min.js"></script>
<script src="javascript.js"></script>
</body>
</html>

