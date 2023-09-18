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
    <h2 style="padding-left: 15px">Enfermeros:</h2> 
<!-- Seccion añadida -->
        <?php
            include ("conexion.php");
            $consulta = mysqli_query($conexion,"SELECT * FROM enfermeros");
            while ($lista_consulta= mysqli_fetch_assoc($consulta) ){
        ?>
            <div>
                <ul>
                    <li><b>Nº:</b> <?php echo $lista_consulta["id_enfermero"];?> </li>
                    <li><b>Nombre:</b> <?php echo $lista_consulta["nombre"]." ".$lista_consulta["apellido"];?> </li>
                    <li><b>Contacto:</b> <?php echo $lista_consulta["telefono"];?> </li>
                    <li><b>Area:</b> <?php echo $lista_consulta["area"];?> </li>
                </ul>
            </div>
        <?php } ?>
    </div>
<!-- Seccion añadida -->


    <div class="edit">
        <!-- Seccion añadida -->
        <?php include("conexion.php"); ?>
        <section class="Form">
            <h2>Agregrar datos</h2>
            <form action="insertar_enfermeros.php" method="POST">
                <div>
                    <label> Nombre: </label>
                    <input type="text" name="nombre" placeholder=" Campo obligatorio" required>
                </div>
                <div>
                    <label> Apellido: </label>
                    <input type="text" name="apellido" placeholder=" Campo obligatorio" required>
                </div>
                <div>
                    <label> Telefono: </label>
                    <input type="int" name="telefono" placeholder=" Campo obligatorio" required>
                </div>
                <div>
                    <label> Correo: </label>
                    <input type="email" name="correo" placeholder=" Campo obligatorio" required>
                </div>
                <div>
                    <label> Area: </label>
                    <input type="text" name="area" placeholder=" Campo obligatorio" required>
                </div>
                <div>
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Enviar</button>
                </div>
            </form>
        </section>
        <!-- Seccion añadida -->

        <!-- Seccion añadida -->
        <?php include("conexion.php"); ?>
        <section class="Form">
            <h2>Editar datos</h2>
            <form action="insertar_enfermeros.php" method="POST">
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
                    <label> Telefono: </label>
                    <input type="int" name="telefono" placeholder=" Campo obligatorio" required>
                </div>
                <div>
                    <label> Area: </label>
                    <input type="text" name="area" placeholder=" Campo obligatorio" required>
                </div>
                <div>
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Enviar</button>
                </div>
            </form>
        </section>
        <!-- Seccion añadida -->

        <?php
            $conn = mysqli_connect("localhost", "root", "", "Punk");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['id_enfermero'])) {
                    $id_enfermero = $_POST['id_enfermero'];

                    // Verificar si el ID proporcionado es numérico
                    if (is_numeric($id_enfermero)) {
                        $id_enfermero = mysqli_real_escape_string($conn, $id_enfermero);

                        $sql = "DELETE FROM `enfermeros` WHERE `id_enfermero` = $id_enfermero";

                    }
                }
            }
        ?>  

<section>
    <h2>Eliminar datos</h2>
    <form method="POST">
        <input type="text" name="id_enfermero" placeholder="Nº del dato">
        <input type="submit" name="submit" value="Borrar">
    </form>
</section>


    </div>

    <h1>Holi</h1>

    <div class="elemento-abajo">
        <p>Para más informacion: ayuda@gmail.com</p>
    </div>
</body>
</html>