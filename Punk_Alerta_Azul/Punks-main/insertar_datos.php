<?php 
include("conexion.php");

$nombre =  $_POST['nombre'];
$apellido =  $_POST['apellido'];
$correo =  $_POST['correo'];
$edad =  $_POST['edad'];
$telefono =  $_POST['telefono'];

$usuario = $nombre . " " . $apellido;

$insertar= "INSERT INTO `inicio_usuario` VALUES (NULL,'$usuario','$correo','$telefono','$edad')";
mysqli_query($conexion,$insertar);
header("Location:index.php")
?> 