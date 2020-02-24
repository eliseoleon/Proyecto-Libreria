<?php
include('Libro.php'); //Llamamos al archivo
$libro = new Libro(); //Creamos una nueva instancia de persona.

//Validamos si ya se envió algun dato desde el formulario.
if (isset($_POST) && !empty($_POST)) {
    $insert = $libro->crearLibro($_POST); //Enviamos los parametros del post a la función de crearPersona().
    if ($insert) {
        header('location: /bictia/index.php');
    } else {
        echo "Falló... ";
    }
}


$todosLosLibros =  $libro->traerLibros();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="estilosL.css">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
 <center><h1>Crear nuevo libro</h1></center> 
  <hr>
<form method="POST" enctype="multipart/form-data">
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="nombre"><h2>Nombre</h2> </label>
    <input name="nombre" id="nombre" class="form-control" placeholder="Ingresa el nombre " type="text" require /> <br />
</div>
  <div class="form-group col-md-6">  
    <label for="id_categoria"> <h2>categoria </h2></label>
    <input name="id_categoria" id="id_categoria" class="form-control" placeholder="Ingresa la categoria " type="text" require /> <br />
  </div>
 </div> 
 <div class="form-row">
  <div class="form-group col-md-6">
    <label for="id_autor"> <h2>Autor</h2> </label>
    <input name="id_autor" id="id_autor" class="form-control" placeholder="Ingresa el autor " type="text" require /> <br />
  </div>
  <div class="form-group col-md-6">
    <label for="id_comentario"> <h2>comentario</h2> </label>
    <input name="id_comentario" id="id_comentario"  class="form-control" placeholder="Ingresa el comentario " type="text" require /> <br />
  </div>

 </div>

 <div class="form-row">
   <div class="form-group col-md-6">
    <label for="descripcion"><h2>descripcion </h2> </label>
    <input name="descripcion" id="descripcion"  class="form-control" placeholder="Ingresa la descripcion " type="text" require /> <br />
   </div>  
  <div class="form-group col-md-6">
    <label for="valor"> <h2>valor</h2> </label>
    <input name="valor" id="valor"  class="form-control" placeholder="Ingresa el valor " type="text" require /> <br />
  </div>
 </div>

 <div class="form-row">
   <div class="form-group col-md-6">
    <label for="fecha_publicacion"><h2>Fecha_publicacion</h2>  </label>
    <input name="fecha_publicacion" id="fecha_publicacion"  class="form-control"  placeholder="Ingresa el nombre " type="date" require />
    
  </div>
  <div class="form-row">
  <div class="form-group col-md-7">
  
    <label for="imagen"><h2>Imagen</h2> </label>
    <input type="file" id="urlImage" name="imagen" accept="image/png, image/jpeg" required />
</div>
</div>
  <hr>
   <center><button class="boton"> CREAR </button></center> 
   <br>
  
</form>

</div>
<br>





</body>
</html>