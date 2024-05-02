<?php
include("../../includes/head.php");
include("../../includes/conectar.php");

$conexion = conectar();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Inicio de la zona central del sistema -->
    <!-- Todo -->
    <h1>Modificación de la Oferta</h1>
    <?php

    // Recibimos el id a modificar
    $pid = $_REQUEST['pid'];
    // Recibimos los datos del formulario    
    $sql = "SELECT * FROM oferta_laborals WHERE id='$pid'";
    $registro = mysqli_query($conexion, $sql);
    // En la variable fila tenemos todos los datos que queremos modificar
    $fila = mysqli_fetch_array($registro);

    // echo var_dump($fila);
    ?>
    <form method="POST" action="editar_oferta.php">
        <!-- Agrega un campo oculto para pasar el ID de la oferta -->
        <input type="hidden" name="idOfertaEditar" value="<?php echo $pid; ?>">
        <div class="row mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" value="<?php echo $fila['titulo'] ?>">
        </div>
        <div class="row mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" value="<?php echo $fila['descripcion'] ?>">
        </div>
        <div class="row mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
            <input type="text" class="form-control" name="fecha_publicacion" value="<?php echo $fila['fecha_publicacion'] ?>">
        </div>
        <div class="row mb-3">
            <label for="fecha_cierre" class="form-label">Fecha de Cierre</label>
            <input type="text" class="form-control" name="fecha_cierre" value="<?php echo $fila['fecha_cierre'] ?>">
        </div>
        <div class="row mb-3">
            <label for="remuneracion" class="form-label">Remuneración</label>
            <input type="text" class="form-control" name="remuneracion" value="<?php echo $fila['remuneracion'] ?>">
        </div>
        <div class="row mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" name="ubicacion" value="<?php echo $fila['ubicacion'] ?>">
        </div>
        <div class="row mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" name="tipo" value="<?php echo $fila['tipo'] ?>">
        </div>
        <div class="row mb-3">
            <label for="empresa_id" class="form-label">Empresa ID</label>
            <input type="text" class="form-control" name="empresa_id" value="<?php echo $fila['empresa_id'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Oferta</button>
    </form>

    <!-- Fin de la zona central del sistema -->
</div>

<!-- /.container-fluid -->
<?php
include("../../includes/food.php");
?>
