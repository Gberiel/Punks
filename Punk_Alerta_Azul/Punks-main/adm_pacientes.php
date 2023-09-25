<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Tucumán</title>
    <link rel="stylesheet" href="./css/Punk.css">
</head>
<body id="inicio" style="color:Black;">
    <div class="top-bar">
        <a href="#inicio">Inicio</a>
        <a href="adm.php">Administracion</a>
        <a href="hospital.php">Quirofanos</a>
        <a href="index.php">Log-Out</a>
        <a href="hospital.php">Atras</a>
    </div>
    <div>
    <h2>Mostrar datos</h2>
    <hr>
<!-- Seccion añadida -->
    <?php
        
            include ("conexion.php");
            $consulta = mysqli_query($conexion,"SELECT  * FROM inicio_usuario");
            while ($lista_consulta= mysqli_fetch_assoc($consulta) ){
    ?>
            <div class="Form" style="color:Black;">
            <ul>
            <p>
                <b>N° Paciente:<?php echo $lista_consulta["id_usuario"]; ?></b>
                <br>
                <b>Nombre y Apellido:</b><?php echo $lista_consulta["usuario"];?>
                <b>Email:</b><?php echo $lista_consulta["correo"];?>
                <b>Edad:</b><?php echo $lista_consulta["edad"];?> 
                <b>Telefono:</b><?php echo $lista_consulta["telefono"];?>  
                <br>
                <textarea placeholder="Historial Medico:" name="historial_medico" rows="3" cols="50"></textarea>
                <input type="text" name="Medico" placeholder="Nombre Medico" required>
            </p>
            </ul>
            <hr style="color:Black;">
            </div>
            
    <?php } ?>

 <!--
<section class="Form">
   
    <form action="insertar_pacientes.php" method="POST">
    <h2>Agregrar datos</h2>
        <div>
            <label> Nombre: </label>
            <input type="text" name="nombre" placeholder=" Campo obligatorio" required>
        </div>
        <div>
            <label> Apellido: </label>
            <input type="text" name="apellido" placeholder=" Campo obligatorio" required>
        </div>
        <div>
            <label> Edad: </label>
            <input type="int" name="edad" placeholder=" Campo obligatorio" required>
        </div>
        <div>
            <label> Fecha_ingreso: </label>
            <input type="date" name="fecha_ingreso" placeholder=" Campo obligatorio" required>
        </div>
            -->
        
<!--        <div>
            <label for="historial_penal">Historial penal:</label>     
            <textarea name="historial_penal" rows="4" cols="50"></textarea>
            <input type="text" name="historial_penal" placeholder="Nombre Medico" required>
        </div>--> 
        <div>
            <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Enviar</button>
        </div>

    </form>

    </div>
    <div class="elemento-abajo">
        <p>Para más informacion: ayuda@gmail.com</p>
    </div>
</body>
</html>