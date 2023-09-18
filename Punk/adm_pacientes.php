<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Tucumán</title>
    <link rel="stylesheet" href="./css/Punk.css">
</head>
<body id="inicio">
    <div class="top-bar">
        <a href="#inicio">Inicio</a>
        <a href="adm.php">Administracion</a>
        <a href="hospital.php">Quirofanos</a>
        <a href="index.php">Log-Out</a>
        <a href="hospital.php">Atras</a>
    </div>
    <div>
    <h2>Mostrar datos</h2>

<!-- Seccion añadida -->
    <?php
            include ("conexion.php");
            $consulta = mysqli_query($conexion,"SELECT  * FROM enfermeros");
            while ($lista_consulta= mysqli_fetch_assoc($consulta) ){
    ?>
            <div class="mostrar">
                <ul>
                    <li> <?php echo $lista_consulta["nombre"] . " " . $lista_consulta["apellido"]; ?></li>
                    <li><?php echo $lista_consulta["telefono"];?></li>
                    <li><?php echo $lista_consulta["correo"];?></li>
                    <li><?php echo $lista_consulta["area"];?></li>
                    <li><?php echo $lista_consulta["disponible"];?></li>
                </ul>
            </div>
    <?php } ?>


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
        <div>
            <label for="historial_medico">Historial medico:</label>     
            <textarea name="historial_medico" rows="4" cols="50"></textarea>
            <input type="text" name="historial_medico" placeholder=" Campo obligatorio" required>
        </div>
        <div>
            <label for="historial_penal">Historial penal:</label>     
            <textarea name="historial_penal" rows="4" cols="50"></textarea>
            <input type="text" name="historial_penal" placeholder=" Campo obligatorio" required>
        </div>
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