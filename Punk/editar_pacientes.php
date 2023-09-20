<?php
$conn = mysqli_connect("localhost", "root", "", "Punk");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_paciente = $_POST['id_paciente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $sintomas = $_POST['sintomas'];
    $historial_medico = $_POST['historial_medico'];
    $historial_penal = $_POST['historial_penal'];

    // Validar que el ID del paciente sea un número

        $query = "UPDATE pacientes SET nombre='$nombre', apellido='$apellido', edad='$edad', fecha_ingreso ='$fecha_ingreso', sintomas='$sintomas', historial_medico='$historial_medico', historial_penal='$historial_penal' WHERE id_paciente='$id_paciente'";
        echo $query;
        mysqli_query($conn, $query);
    
        header("Location: adm_pacientes.php");
    }

?>
