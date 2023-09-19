<?php
$conn = mysqli_connect("localhost", "root", "", "Punk");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_enfermero = $_POST['id_enfermero'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $area = $_POST['area'];

    // Validar que el ID del enfermero sea un número
    if (is_numeric($id_enfermero)) {
        $query = "UPDATE enfermeros SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono', area='$area' WHERE id_enfermero=$id_enfermero";
        mysqli_query($conn, $query)
        header("Location:adm_enfermeros.php")
    }
}

mysqli_close($conn);
?>
