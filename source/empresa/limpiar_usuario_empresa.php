<?php

include("../../includes/conectar.php");
$conexion = conectar();
// Verificar si se recibió el ID de la empresa
if(isset($_POST['id_empresa'])) {

    $id_empresa = $_POST['id_empresa'];

    $sql = "UPDATE empresas SET user_id = NULL WHERE id = '$id_empresa'";
    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        echo "Usuario limpiado correctamente de la empresa.";
    } else {
        echo "Error al limpiar usuario de la empresa: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "ID de empresa no recibido.";
}
?>
