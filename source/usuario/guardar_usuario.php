<?php
    include '../../includes/conectar.php';

    $conexion = conectar();

    $name = $_POST['name'];
    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Añade el campo id_rol y asigna el valor '4' por defecto
    $sql = "INSERT INTO users(name, dni, nombres, apellidos, telefono, direccion, email, password, id_rol) VALUES('$name','$dni','$nombres','$apellidos','$telefono', '$direccion', '$email', '$password', '4')";
    mysqli_query($conexion, $sql) or die('Error al guardar.');

    header('location:listar_usuarios.php');
?>
