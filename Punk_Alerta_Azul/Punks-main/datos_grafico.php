<?php
$datos_bd = mysqli_connect("localhost", "root", "", "Punk") or exit("No se puede conectar");

// Consulta SQL para obtener la cantidad de llamadas por tipo (Normal o Emergencia)
$consulta = "SELECT tipo_llamado, COUNT(*) as cantidad FROM registro_llamada GROUP BY tipo_llamado";
$resultado = $datos_bd->query($consulta);

$datos = array();

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = array(
        "tipo_llamado" => $fila['tipo_llamado'],
    );
}
// Devuelve los datos en formato JSON
echo json_encode($datos);

// Cerrar la conexión
$datos_bd->close();
?>