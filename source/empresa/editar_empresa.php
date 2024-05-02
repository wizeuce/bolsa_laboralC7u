<?php
include '../../includes/conectar.php';

$conexion = conectar();

// Asegúrate de recibir el ID de la empresa a editar
$id = $_POST['idEmpresaEditar'];

$razon_social = $_POST['razon_social'];
$ruc = $_POST['ruc'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion']; // Agrega dirección si es necesario

// Actualizar los datos en la base de datos utilizando una consulta UPDATE
$sql = "UPDATE empresas SET razon_social='$razon_social', ruc='$ruc', telefono='$telefono', correo='$correo', direccion='$direccion' WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    // Redirigir a la página de listado de empresas si la actualización fue exitosa
    header('Location: listar_empresas.php');
    exit();
} else {
    // Mostrar un mensaje de error si la actualización falló
    echo "Error al actualizar la empresa.";
}
?>
