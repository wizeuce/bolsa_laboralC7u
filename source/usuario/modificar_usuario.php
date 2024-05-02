<?php
include("../../includes/head.php");
include("../../includes/conectar.php");

$conexion = conectar();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Inicio de la zona central del sistema -->
    <!-- Todo -->
    <h1>Modificación de Usuarios</h1>
    <?php

    //recibimos el id a modificar
    $pid = $_REQUEST['pid'];
    //recibimos los datos del formulario    
    $sql = "SELECT * FROM users WHERE id='$pid'";
    $registro = mysqli_query($conexion, $sql);
    //en la variable fila tenemos todos los datos que queremos modificar
    $fila = mysqli_fetch_array($registro);

    // echo var_dump($fila);
    ?>
    <form method="POST" action="editar_usuario.php">
        <!-- Agrega un campo oculto para pasar el ID del usuario -->
        <input type="hidden" name="idUsuarioEditar" value="<?php echo $pid; ?>">
        <div class="row mb-3">
            <label for="name" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" name="name" value="<?php echo $fila['name'] ?>">
        </div>
        <div class="row mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="text" class="form-control" name="email" value="<?php echo $fila['email'] ?>">
        </div>
        <div class="row mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres" value="<?php echo $fila['nombres'] ?>">
        </div>
        <div class="row mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" value="<?php echo $fila['apellidos'] ?>">
        </div>
        <div class="row mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" value="<?php echo $fila['dni'] ?>">
        </div>
        <div class="row mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono" value="<?php echo $fila['telefono'] ?>">
        </div>
        <div class="row mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="text" class="form-control" name="password" value="<?php echo $fila['password'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>

    <!-- Fin  de la zona central del sistema -->
</div>

<!-- /.container-fluid -->
<?php
include("../../includes/food.php");
?>