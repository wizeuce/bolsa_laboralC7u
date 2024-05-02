<?php
include("../../includes/conectar.php");
$conexion = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM oferta_laborals WHERE id='$id'";

mysqli_query($conexion, $sql) or die("Error al eliminar la empresa.");

header("Location:listar_ofertas.php");
?>