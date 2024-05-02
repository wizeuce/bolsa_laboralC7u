<?php
include '../../includes/conectar.php';

$conexion = conectar();

// Asegúrate de recibir el ID del usuario a editar
$id = $_POST['idUsuarioEditar'];

$name = $_POST['name'];
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion']; // Agrega dirección si es necesario
$email = $_POST['email'];
$password = $_POST['password'];

// Actualizar los datos en la base de datos utilizando una consulta UPDATE
$sql = "UPDATE users SET name='$name', dni='$dni', nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', email='$email', password='$password' WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    // Redirigir a la página de listado de usuarios si la actualización fue exitosa
    header('Location: listar_usuarios.php');
    exit();
} else {
    // Mostrar un mensaje de error si la actualización falló
    echo "Error al actualizar el usuario.";
}
?>
