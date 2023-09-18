<?php

$nombre =  $_POST['nombre'];
$apellido =  $_POST['apellido'];
$telefono =  $_POST['telefono'];
$correo =  $_POST['correo'];
$area =  $_POST['area'];

include("conexion.php");
$insertar= "INSERT INTO `enfermeros` VALUES (NULL, '$nombre','$apellido','$telefono','$correo','$area')";

mysqli_query($conexion,$insertar);
header("Location:adm_enfermeros.php")

?>