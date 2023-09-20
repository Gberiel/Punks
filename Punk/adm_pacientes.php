<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Tucumán</title>
    <link rel="stylesheet" href="./css/Punk.css">
    <link rel="icon" href="./img/icono.png" type="image/png">
        
    <style>
    .mostrar{
        display: inline-block;
        color: white;
        background-color: #11125a;
        border: 3px solid blue;
        align-items: center;
    }

    .mostrar ul li{
        list-style: none;
        display: inline-flex;
        color: white;
        background-color: #11125a;
    }
    </style>

</head>
<body id="inicio">
    <div class="top-bar">
        <a href="#inicio">Inicio</a>
        <a href="adm.php">Administracion</a>
        <a href="hospital.php">Quirofanos</a>
        <a href="index.php">Log-Out</a>
        <a href="hospital.php">Atras</a>
    </div>

    <div class="mostrar">
    <h2 style="padding-left: 15px">Pacientes:</h2>
<!-- MOSTRAR DATOS -->
        <?php
            include ("conexion.php");
            $consulta = mysqli_query($conexion,"SELECT * FROM pacientes");
            while ($lista_consulta= mysqli_fetch_assoc($consulta) ){
        ?>
            <div>
                <ul>    
                    <li><b>Nº:</b> <?php echo $lista_consulta["id_paciente"];?> </li>
                    <li><b>Nombre:</b> <?php echo $lista_consulta["nombre"] . " " . $lista_consulta["apellido"]; ?></li>
                    <li><b>Edad:</b> <?php echo $lista_consulta["edad"];?></li>
                    <li><b>Fecha ingreso:</b><?php echo $lista_consulta["fecha_ingreso"];?></li>
                    <li><b>Historial medico:</b><?php echo $lista_consulta["historial_medico"];?></li>
                    <li><b>Historial penal:</b><?php echo $lista_consulta["historial_penal"];?></li>
                </ul>
            </div>
        <?php } ?>
    </div>
<!-- MOSTRAR DATOS -->



<!-- AGREGAR DATOS -->
    <div class="edit">
        <?php include("conexion.php"); 

        // Consulta SQL para obtener los nombres de los enfermeros
        $query = "SELECT nombre FROM enfermeros";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            // Almacena los nombres de los enfermeros en un arreglo
            $nombres_enfermeros = [];
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $nombres_enfermeros[] = $fila['nombre'];
            }
        } else {
            echo "Error al obtener los nombres de los enfermeros: " . mysqli_error($conexion);
        }
        ?>

        <section class="Form">
            <h2>Agregar datos</h2>
            <form action="insertar_pacientes.php" method="POST">
                <div>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Campo obligatorio" required>
                </div>
                <div>
                    <label>Apellido:</label>
                    <input type="text" name="apellido" placeholder="Campo obligatorio" required>
                </div>
                <div>
                    <label>Edad:</label>
                    <input type="number" name="edad" placeholder="Campo obligatorio" required>
                </div>
                <div>
                    <label>Fecha ingreso:</label>
                    <input type="text" name="fecha_ingreso" placeholder="Campo obligatorio" required>
                </div>
                <div>
                    <label>Sintomas:</label>
                    <input type="text" name="sintomas" placeholder="Campo obligatorio" required>
                </div>
                <div>
                    <label for="historial_medico">Historial médico:</label>
                    <textarea name="historial_medico" rows="4" cols="50" placeholder="Campo obligatorio" required></textarea>
                </div>
                <div>
                    <label for="historial_penal">Historial penal:</label>
                    <textarea name="historial_penal" rows="4" cols="50" placeholder="Campo obligatorio" required></textarea>
                </div>  
                <div>
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Enviar</button>
                </div>
            </form>
        </section>

<!-- AGREGAR DATOS -->

<!-- EDITAR DATOS -->   

<?php include("conexion.php"); ?>

<section class="Form">
    <h2>Editar datos</h2>
    <form action="editar_pacientes.php" method="POST">
        <div>
            <label>ID del Paciente a Editar:</label>
            <input type="text" name="id_paciente" placeholder="ID del paciente a editar" required>
        </div>
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Nuevo nombre">
        </div>
        <div>
            <label>Apellido:</label>
            <input type="text" name="apellido" placeholder="Nuevo apellido">
        </div>
        <div>
            <label>Edad:</label>
            <input type="number" name="edad" placeholder="Nueva edad">
        </div>  
        <div>
            <label>Fecha ingreso:</label>
            <input type="text" name="fecha_ingreso" placeholder="Nueva fecha de ingreso">
        </div>
        <div>
            <label>Síntomas:</label>
            <input type="text" name="sintomas" placeholder="Nuevos síntomas">
        </div>
        <div>
            <label for="historial_medico">Historial médico:</label>     
            <textarea name="historial_medico" rows="4" cols="50" placeholder="Nuevo historial médico"></textarea>
        </div>
        <div>
            <label for="historial_penal">Historial penal:</label>     
            <textarea name="historial_penal" rows="4" cols="50" placeholder="Nuevo historial penal"></textarea>
        </div>
        <div>
            <button type="submit">Guardar Cambios</button>
        </div>
    </form>
</section>



<!-- EDITAR DATOS -->

<!-- BORRAR DATOS -->

        <?php
        $conn = mysqli_connect("localhost", "root", "", "Punk");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['id_paciente'])) {
                $id_paciente = $_POST['id_paciente'];

                if (is_numeric($id_paciente)) {
                    $id_paciente = mysqli_real_escape_string($conn, $id_paciente);

                    $sql = "DELETE FROM pacientes WHERE id_paciente = '$id_paciente'";

                    mysqli_query($conn, $sql);
                    header("Location:adm_pacientes.php");
                }
            }
        }
        ?>   

        <section>
            <h2>Eliminar datos</h2>
            <form method="POST">
                <input type="text" name="id_paciente" placeholder="Nº del dato">
                <button type="submit" name="submit" value="Borrar">Borrar</button>
            </form>
        </section>
    </div>
<!-- BORRAR DATOS -->

    <h1>Holi</h1>

    <div class="elemento-abajo">
        <p>Para más informacion: ayuda@gmail.com</p>
    </div>
</body>
</html>