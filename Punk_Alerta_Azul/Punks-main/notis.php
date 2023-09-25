<?php
include ("conexion.php");

$Tabla = "SELECT * FROM inicio_usuario WHERE 1";
mysqli_query ($conexion,$Tabla);

$consulta1 = mysqli_query($conexion,"SELECT  * FROM inicio_usuario");
?>
<link rel="stylesheet" href="./css/Punk.css">

<body id="inicio" style="color:Black;">
<h3 class="text">Aceptar Solicitud</h3>

<form action="Borrar.php" method="POST">
	<div style="display: block">
		<label> Numero de paciente </label>
		<input type="int" name="id_us" placeholder=" Campo obligatorio" required>
	</div>
    <button action="Borrar.php" >Cargar</button>
				
</form>
<br *2>
<h3 class="text">Solicitudes de Atencion</h3>
<?php
while ($lista= mysqli_fetch_assoc($consulta1) ){

?>

<div class="Form" >
    <ul>  
    <p>    
        <b>Solicitud N°:</b> <?php echo $lista ["id_usuario"] ;?>
        <b>Identidad:</b> <?php echo $lista ["usuario"];?>
        <b>Correo:</b> <?php echo $lista ["correo"];?>
        <b>Telefono:</b> <?php echo $lista ["telefono"] ; ?>
        <b>Edad:</b> <?php echo $lista ["edad"] ; ?>
    </p>
        <hr>
    </ul>    
</div>

<?php
}


?>
</body>