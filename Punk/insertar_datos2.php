<?php
$usuario =  $_POST['usuario'];
$contraseña =  $_POST['contraseña'];

//include("conexion.php");
$conexion = mysqli_connect("localhost","root","","Punk") or exit ("No se pudo rei");
$insertar= "INSERT INTO `inicio_sesion` VALUES (NULL, '$usuario','$contraseña')";

mysqli_query($conexion,$insertar);
echo "consulta enviada";
?>