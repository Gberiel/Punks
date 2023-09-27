<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Tucumán</title>
    <link rel="stylesheet" href="./css/Punk.css">
    <link rel="icon" href="./img/Icono.ico">

        
    <style>
    .mostrar{
        padding: 20px;
        display: inline-flex;
        color: white;
        background-color: #11125a;
        border: 3px solid blue;
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
<!-- Botonera -->
    <div class="top-bar">
        <a href="historial_llamadas.php">Historial Llamadas</a>
        <a href="adm.php">Administracion</a>
        <a href="hospital.php">Quirofanos</a>
        <a href="index.php">Log-Out</a>
        <a href="hospital.php">Atras</a>
    </div>
<!-- //Botonera -->

<!-- Adm base de datos -->
<div class="btn_adm"> 
    <a href="adm_enfermeros.php"><button>Administar enfermeros</button></a>
    <a href="adm_pacientes.php"><button>Administar pacientes</button></a>
    <a href="adm_areas.php"><button>Administar areas</button></a>
    <a href="notis.php"><button>Solicitudes</button></a>
</div>
<!-- //Adm base de datos -->

<!-- Lista --> 
    <div>
    <h1>Enfermeros</h1>
        <?php
                include ("conexion.php");
                $consulta = mysqli_query($conexion,"SELECT  * FROM enfermeros");
                while ($lista_consulta= mysqli_fetch_assoc($consulta) ){
        ?>
                <div class="mostrar">
                <h1 id="titulo" onclick="mostrarLista()">Enfermeros</h1>
                <ul id="lista" style="display:none;">
                        <li><?php echo $lista_consulta["nombre"] . " " . $lista_consulta["apellido"]; ?></li>
                        <li><b>Telefono:</b><?php echo $lista_consulta["telefono"];?></li>
                        <li><b>Área:</b><?php echo $lista_consulta["area"];?></li>
                        <li><b>Disponible:</b> <?php echo $lista_consulta["disponible"];?></li>
                    </ul>
                </div>
        <?php } ?>
<!-- //Lista --> 

<!-- Script Lista --> 
        <script>
            function mostrarLista() {
                var lista = document.getElementById("lista");
                if (lista.style.display === "none") {
                    lista.style.display = "block";
                } else {
                    lista.style.display = "none";
                }
            }
        </script>
<!-- //Script Lista --> 
    </div>

    
<!-- Pie de pagina --> 
    <div class="elemento-abajo">
        <p>Para más informacion: ayuda@gmail.com</p>
    </div>
<!-- //Pie de pagina --> 
</body>
</html>