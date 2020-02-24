
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    

<form action="Logica/loguear.php" method="POST" class="formulario">

<h1>Login</h1>
<div class="contenedor">


<div class="input_contenedor">

    <input type="text" name="usuario" placeholder="Ingrese su nombre">
    

</div>
<div class="input_contenedor">
    <input type="password" name="contraseña" placeholder="Ingrese su contraseña">

</div>

<input type="submit" value="Ingrese" class="button">
<p>El login solo podra ser accedido por un administrador,<br>   
     si usted no lo es regrese a la pagina anterior</p>
</div>


</form>


</body>
</html>