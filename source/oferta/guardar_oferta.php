<?php
include '../../includes/conectar.php';

$conexion = conectar();

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_publicacion = $_POST['fecha_publicacion'];
$fecha_cierre = $_POST['fecha_cierre'];
$remuneracion = $_POST['remuneracion'];
$ubicacion = $_POST['ubicacion'];
$tipo = $_POST['tipo'];
$empresa_id = $_POST['empresa_id'];

$sql = "INSERT INTO oferta_laborals (titulo, descripcion, fecha_publicacion, fecha_cierre, remuneracion, ubicacion, tipo, empresa_id) VALUES ('$titulo', '$descripcion', '$fecha_publicacion', '$fecha_cierre', '$remuneracion', '$ubicacion', '$tipo', '$empresa_id')";

mysqli_query($conexion, $sql) or die('Error al guardar la oferta laboral.');

header('location:listar_ofertas.php');
?>
