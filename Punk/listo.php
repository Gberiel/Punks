<?php
include ("conexion.php");

$id = $_POST['id'];

    

$usuario1 = $_POST["usuario1"];
$correo1 = $_POST["correo1"];
$lista1 = $_POST["telefono1"];
$edad1 = $_POST["edad1"];

$insertar2 = "INSERT INTO `pacientes` VALUES (NULL, '$usuario1', , '$lista1','$correo1')";

mysqli_query($datos_bd,$insertar2);
echo "hola";
$borrar = "DELETE FROM `inicio_usuario` WHERE id_usuario = $lista ['id_usuario'] "; 


?>