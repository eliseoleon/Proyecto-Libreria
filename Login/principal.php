<?php

session_start();

$usuario = $_SESSION['username'];
if (!isset($usuario)) {
    header("location: ../login.php");
} else {
    echo"<h1>Bienvenido Usuario</h1>";


    echo"<a href='Logica'>Salir</a>";
}






?>