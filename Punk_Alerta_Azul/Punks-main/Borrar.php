<?php
include("conexion.php");

$id = $_POST['id_us'];

$borrar = "DELETE FROM `inicio_usuario` WHERE id_usuario = $id";

mysqli_query ($conexion, $borrar);
?>
<button><a href="notis.php"> Volver </a></button>