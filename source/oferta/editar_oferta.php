<?php
include '../../includes/conectar.php';

$conexion = conectar();

// Asegúrate de recibir el ID de la oferta a editar
$id = $_POST['idOfertaEditar'];

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_publicacion = $_POST['fecha_publicacion'];
$fecha_cierre = $_POST['fecha_cierre'];
$remuneracion = $_POST['remuneracion'];
$ubicacion = $_POST['ubicacion'];
$tipo = $_POST['tipo'];
$empresa_id = $_POST['empresa_id'];

// Actualizar los datos en la base de datos utilizando una consulta UPDATE
$sql = "UPDATE oferta_laborals SET titulo='$titulo', descripcion='$descripcion', fecha_publicacion='$fecha_publicacion', fecha_cierre='$fecha_cierre', remuneracion='$remuneracion', ubicacion='$ubicacion', tipo='$tipo', empresa_id='$empresa_id' WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    // Redirigir a la página de listado de ofertas si la actualización fue exitosa
    header('Location: listar_ofertas.php');
    exit();
} else {
    // Mostrar un mensaje de error si la actualización falló
    echo "Error al actualizar la oferta laboral.";
}
?>
