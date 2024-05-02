<?php
include '../../includes/conectar.php';

$conexion = conectar();

$razon_social = $_POST['razon_social'];
$ruc = $_POST['ruc'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$user_id = $_POST[''];
$direccion = $_POST['direccion'];
$sql = "INSERT INTO empresas (razon_social, ruc, telefono, correo, direccion) VALUES ('$razon_social', '$ruc', '$telefono', '$correo','$direccion')";
mysqli_query($conexion, $sql) or die('Error al guardar la empresa.');

header('location:listar_empresas.php');
?>
