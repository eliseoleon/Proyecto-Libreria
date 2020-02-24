<?php

require('conexion.php');

session_start();


$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];


$q="SELECT COUNT(*) as contar FROM usuarios WHERE nombre= '$usuario' AND id_rol='$contraseña'";
$consulta = mysqli_query($conexion, $q);

$array = mysqli_fetch_array($consulta);

if ($array['contar']>0) {
    $_SESSION['username'] =$usuario;
    header("location: ../../bictia/index.php");
} else {
    header("location: ../login.php");
    echo("<h1>DATOS INCORRECTOS</h1>");
    
}
?>