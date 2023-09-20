<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $sintomas = $_POST['sintomas'];
    $historial_medico = $_POST['historial_medico'];
    $historial_penal = $_POST['historial_penal'];

    include("conexion.php"); // Asegúrate de que este archivo existe y contiene la conexión a la base de datos.

    // Corrige los valores NULL si son campos numéricos
    $insertar = "INSERT INTO `pacientes` VALUES (NULL, '$nombre', '$apellido', '$edad', '$fecha_ingreso', '$sintomas', '$historial_medico', '$historial_penal')";

    if (mysqli_query($conexion, $insertar)) {
        header("Location: adm_pacientes.php");
        exit(); // Termina la ejecución del script después de redirigir
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }
} else {
    echo "No se han recibido datos del formulario.";
}
?>
