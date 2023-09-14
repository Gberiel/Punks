<?php
$nombre =  $_POST['nombre'];
$apellido =  $_POST['apellido'];
$telefono =  $_POST['telefono'];
$correo =  $_POST['correo'];
$fecha_nac =  $_POST['fecha_nac'];
$area =  $_POST['area'];
$disponible =  $_POST['disponible'];



//$nombre_com = $nombre . " " . $apellido;

//include("conexion.php");
$conexion = mysqli_connect("localhost","root","","Punk") or exit ("No se pudo rei");
$insertar= "INSERT INTO `enfermeros` VALUES (NULL,'$nombre','$apellido','$telefono','$correo','$fecha_nac','$area','$disponible')";

mysqli_query($conexion,$insertar);
header("Location:adm.php")
?>