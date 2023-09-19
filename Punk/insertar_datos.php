<?php 
$nombre =  $_POST['nombre'];
$apellido =  $_POST['apellido'];
$correo =  $_POST['correo'];
$contraseña =  $_POST['contraseña'];

$usuario = $nombre . " " . $apellido;

$conexion = mysqli_connect("localhost","root","","Punk") or exit ("No se pudo rei");
$insertar= "INSERT INTO `inicio_usuario` VALUES (NULL, '$usuario','$correo','$contraseña')";

mysqli_query($conexion,$insertar);
header("Location:index.php")
?> 