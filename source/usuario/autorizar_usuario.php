<?php


include '../../includes/conectar.php';

$conexion = conectar();


// Asegúrate de recibir el ID del usuario a editar
$id = $_REQUEST['id'];


// Cambiar el valor del campo id_rol a 3
$sql = "UPDATE users SET id_rol='3' WHERE id='$id'";
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
