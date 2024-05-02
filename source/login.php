<?php

include '../includes/conectar.php';

$conexion = conectar();

session_start();

// recibimos los datos de usuario y contraseña

$usuario = $_POST['txt_usuario'];
$password = $_POST['txt_password'];

// echo "usuario: " . $usuario;
// echo "password: " . $password;

$sql = "SELECT * FROM users WHERE email ='$usuario' AND password='$password'";

$resultado = mysqli_query($conexion, $sql);

$numero_resultados = mysqli_affected_rows($conexion);

// echo "numero_resultados: " . $numero_resultados;

if ($numero_resultados == 1) {
    $fila = mysqli_fetch_assoc($resultado);

    $_SESSION['SESSION_ROL'] = $fila['id_rol'];

    $sql_rol = "SELECT * FROM roles WHERE id = '{$fila['id_rol']}'";
    $resultado_rol = mysqli_query($conexion, $sql_rol);
    $rol = mysqli_fetch_assoc($resultado_rol);
    
    $sql_empresa = "SELECT * FROM empresas WHERE user_id = '{$fila['id']}'";
    $resultado_empresa = mysqli_query($conexion, $sql_empresa);
    $empresa = mysqli_fetch_assoc($resultado_empresa);

    $_SESSION['SESSION_EMPRESA'] = $empresa['razon_social'];

    $_SESSION['SESSION_ROL_NAME'] = $rol['name'];

    $_SESSION['SESSION_USER_ID'] = $fila['id'];

    $_SESSION['SESSION_NOMBRES'] = $fila['nombres'];

    $_SESSION['SESSION_APELLIDOS'] = $fila['apellidos'];

    // echo $_SESSION["SESSION_NOMBRES"];
    // echo $_SESSION["SESSION_APELLIDOS"];

    // die();
    header('location:../index.php');

    // echo "Bienvenido al sistema";
} else {
    header('location:form_login.php?error_login=error');
}

?>
