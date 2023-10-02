<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Solicitudes</title>
        <link rel="stylesheet" type="text/css" href="./css/Punk.css">
        <link rel="icon" href="./img/icono.png" type="image/png">

        <style>
            .Form ul{
                display: inline-flex;
                list-style: none;   
            }

            .Form ul b{
                padding-left: 20px;
                margin-right: 5px;
            }
        </style>
    </head>
    
    <body id="inicio" style="color:Black;">
        <div class="top-bar">
        <a href="#inicio">Inicio</a>
        <a href="adm.php">Administracion</a>
        <a href="hospital.php">Quirofanos</a>
        <a href="index.php">Log-Out</a>
        <a href="hospital.php">Atras</a>
    </div>

        <h3 class="text">Aceptar Solicitud</h3>

        <form action="Borrar.php" method="POST">
            <div style="display: block">
                <label> Numero de paciente: </label>
                <input type="int" name="id_usuario" placeholder=" Campo obligatorio" required>
            </div>
            <button action="Borrar.php">Cargar</button>
        </form>

        <br *2> 
        <h3 class="text">Solicitudes de inicio       sesion:</h3>

        <div class="Form">
        <?php
                include ("conexion.php");
                $consulta = mysqli_query($conexion,"SELECT  * FROM inicio_usuario");
                while ($lista_consulta= mysqli_fetch_assoc($consulta) ){
        ?>
                <div>   
                    <ul>
                        <li><b>Solicitud N°:</b><?php echo $lista ["id_usuario"] ;?></li>
                        <li><b>Usuario:</b><?php echo $lista_consulta["usuario"]; ?></li>
                        <li><b>Contraseña:</b><?php echo $lista_consulta["contraseña"];?></li>
                    </ul>
                    <hr>
                </div>
        <?php } ?>
        </div>

    </body>
    <!-- Pie de pagina --> 
    <div class="elemento-abajo">
        <p>Para más informacion: ayuda@gmail.com</p>
    </div>
<!-- //Pie de pagina --> 
</html>
