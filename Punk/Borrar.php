<?php
include("conexion.php");

$id_usuario = $_POST['id_usuario'];

$borrar = "DELETE FROM `inicio_usuario` WHERE id_usuario = $id_usuario";

mysqli_query ($conexion, $borrar);
?>

<button><a href="notis.php"> Volver </a></button>