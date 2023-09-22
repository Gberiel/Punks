<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos Personales</title>
</head>
<body>
    <h1>Formulario de Datos Personales</h1>
    <form action="historial_llamadas.php" method="POST">
        <div>
            <label for="nombre"> Tipo de llamado:</label>
            <select id="nombre" name="tipo_llamado">
                <option value="Normal">Normal     </option>
                <option value="Emergencia">Emergencia</option>
                <!-- Agrega más opciones aquí -->
            </select>
        </div>
        <div>   
            <label for="se_atendio"> Hubo respuesta?:</label>
            <select id="se_atendio" name="respuesta">
                <option value="Si">Si</option>
                <option value="No">No</option>
                <!-- Agrega más opciones aquí -->
            </select>
        </div>

        <label for="duracion">Duración (minutos):</label>
        <input type="text" id="duracion" name="duracion"><br>
 
        <div>
            <label for="fecha_nacimiento">Fecha de llamado:</label>
            <input type="date" id="fecha_nacimiento" name="fecha">
        </div>
        <div>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora"><br>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>