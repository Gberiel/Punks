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
        <div class="dropdown">
            <a href="#Q1">Quirofanos</a>
            <div class="dropdown-content">
                <a href="#Q1">Quirofano 1</a>
                <a href="#Q2">Quirofano 2</a>
                <a href="#Q3">Quirofano 3</a>
                <a href="#Q4">Quirofano 4</a>
                <a href="#Q5">Quirofano 5</a>
                <a href="#Q6">Quirofano 6</a>
                <a href="#Q7">Quirofano 7</a>
                <a href="#Q8">Quirofano 8</a>
            </div>
        </div>
        <a href="index.php">Log-Out</a>
    </div>



    <div class="hospital">
        <h2 id="Q1" style="text-align:center">Quirofano Nº1</h2>
        <div class="quirofano">
            <h2>*Ocupado*</h2> <!-- Cambiar por PHP BD -->
            <h2><button>Pedir asistencia</button></h2>
            <h2><button>Pedir emergencia</button></h2>
        </div>
        <div class="quirofano">
            <h3>Paciente: </h3> <!-- Cambiar por PHP BD -->
            <button>Descargar historial medico </button> <!-- Cambiar por PHP BD -->
            <h3>Enfermero a cargo: Julian Serrano</h3> <!-- Cambiar por PHP BD -->
        </div>
    </div>
    <div class="elemento-abajo">
        <p>Para más informacion: ayuda@gmail.com</p>
    </div>
</body>
</html>
