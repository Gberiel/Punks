<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Tucumán</title>
    <link rel="stylesheet" href="./css/Punk.css">
    <link rel="icon" href="./img/icono.png" type="image/png">

</head>
<body id="inicio">

    <div class="top-bar">
        <a href="#inicio">Inicio</a>
        <a href="adm.php">Administracion</a>
        <div class="dropdown">
            <a href="#Q1">Areas</a>
            <div class="dropdown-content">
                <?php
                    include ("conexion.php");
                    $consulta = mysqli_query($conexion,"SELECT * FROM areas");
                    while ($lista_consulta= mysqli_fetch_assoc($consulta) ){            ?>
                <a href="#Q1"> <?php echo $lista_consulta["tipo_de_area"]?></a>       <?php } ?>
            </div>
        </div>
        <a href="index.php">Log-Out</a>
    </div>
        


<!-- MOSTRAR DATOS -->
<?php
    include ("conexion.php");
    $consulta = mysqli_query($conexion,"SELECT * FROM areas");
    while ($lista_consulta= mysqli_fetch_assoc($consulta) ){
?>

    <div class="hospital">
        <h2 class="area"><b>Area:</b> <?php echo $lista_consulta["tipo_de_area"]?></h2>
        <div class="quirofano">
            <h2><b>*</b><?php echo $lista_consulta["ocupado"];?><b>*</b></h2>
            <h2><button>Pedir asistencia</button></h2>
            <h2><button>Pedir emergencia</button></h2>
        </div>
        <div class="quirofano">
            <h3>Paciente:</b><?php echo $lista_consulta["paciente"];?></h3>
            <a href="plantilla.pdf" download="plantilla.pdf"><button>Descargar historial medico</button></a>
            <h3>Medico:<?php echo $lista_consulta["medico"];?></h3>
            <h3 style="padding-left: 20px;">Enfermero:<?php echo $lista_consulta["enfermero"];?></h3>
        </div>
    </div>
<?php } ?>
<!-- MOSTRAR DATOS -->
    <div class="elemento-abajo">
        <p>Para más informacion: ayuda@gmail.com</p>
    </div>
</body>
</html>
