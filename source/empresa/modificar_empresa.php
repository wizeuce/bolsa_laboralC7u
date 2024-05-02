<?php
include("../../includes/head.php");
include("../../includes/conectar.php");

$conexion = conectar();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Inicio de la zona central del sistema -->
    <!-- Todo -->
    <h1>Modificación de Empresas</h1>
    <?php

    // Recibimos el id a modificar
    $pid = $_REQUEST['pid'];
    // Recibimos los datos del formulario    
    $sql = "SELECT * FROM empresas WHERE id='$pid'";
    $registro = mysqli_query($conexion, $sql);
    // En la variable fila tenemos todos los datos que queremos modificar
    $fila = mysqli_fetch_array($registro);

    // echo var_dump($fila);
    ?>
    <form method="POST" action="editar_empresa.php">
        <!-- Agrega un campo oculto para pasar el ID de la empresa -->
        <input type="hidden" name="idEmpresaEditar" value="<?php echo $pid; ?>">
        <div class="row mb-3">
            <label for="razon_social" class="form-label">Razón Social</label>
            <input type="text" class="form-control" name="razon_social" value="<?php echo $fila['razon_social'] ?>">
        </div>
        <div class="row mb-3">
            <label for="ruc" class="form-label">RUC</label>
            <input type="text" class="form-control" name="ruc" value="<?php echo $fila['ruc'] ?>">
        </div>
        <div class="row mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="<?php echo $fila['telefono'] ?>">
        </div>
        <div class="row mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="text" class="form-control" name="correo" value="<?php echo $fila['correo'] ?>">
        </div>
        <div class="row mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="<?php echo $fila['direccion'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
    </form>

    <!-- Fin de la zona central del sistema -->
</div>

<!-- /.container-fluid -->
<?php
include("../../includes/food.php");
?>
