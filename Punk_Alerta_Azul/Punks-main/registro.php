<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="css/Punk.css">
</head>
<body style="background-image: url(./img/foto.jpg);background-repeat: no-repeat;background-size: cover;">
	
	<?php include("conexion.php"); ?>

	<div class="container">
        <header>
            <h1>Registro</h1>
        </header>
		
		<main>
			<form action="insertar_datos.php" method="POST">
				<div>
					<label> Nombre: </label>
					<input type="text" name="nombre" placeholder=" Campo obligatorio" required>
				</div>
				<div>
					<label> Apellido: </label>
					<input type="text" name="apellido" placeholder=" Campo obligatorio" required>
				</div>
				<div>
					<label> Correo: </label>
					<input type="email" name="correo" placeholder=" Campo obligatorio" required>
				</div>
				<div>
					<label> Edad: </label>
					<input type="int" name="edad" placeholder=" Campo obligatorio" required>
				</div>
				<div>
					<label> Telefono: </label>
					<input type="int" name="telefono" placeholder=" Campo obligatorio" required>
				</div>
				<div>
					<button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Enviar</button>
				</div>
			</form>
		</main>
	</div>
<!-- Seccion añadida -->

    <!-- <script src="js/registroP.js"></script> -->
</body>
</html>

