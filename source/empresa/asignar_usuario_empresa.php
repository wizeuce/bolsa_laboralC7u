<?php
include("../../includes/conectar.php");
$conexion = conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empresa = $_POST['id_empresa'];
    $id_usuario = $_POST['id_usuario'];

    // Consulta para verificar si el usuario ya está asignado a alguna otra empresa
    $sql_verificar_asignacion = "SELECT COUNT(*) AS num_empresas FROM empresas WHERE user_id = $id_usuario";
    $resultado_verificacion = mysqli_query($conexion, $sql_verificar_asignacion);
    if ($resultado_verificacion) {
        $fila = mysqli_fetch_assoc($resultado_verificacion);
        if ($fila['num_empresas'] > 0) {
            echo "El usuario ya está asignado a otra empresa.";
            // Puedes salir del script aquí o hacer alguna otra acción si lo deseas
        } else {
            // Si el usuario no está asignado a otra empresa, actualizar la asignación
            $sql_actualizar_empresa = "UPDATE empresas SET user_id = $id_usuario WHERE id = $id_empresa";
            if (mysqli_query($conexion, $sql_actualizar_empresa)) {
                echo "Usuario asignado correctamente a la empresa.";
            } else {
                echo "Error al asignar usuario a la empresa: " . mysqli_error($conexion);
            }
        }
    } else {
        echo "Error al verificar asignación de usuario: " . mysqli_error($conexion);
    }
}
?>
