<?php
include '../../includes/head.php';
?>

<div class="container-fluid">
  <!-- Inicio de la zona central del sistema -->
  <h1>Registro de Ofertas Laborales Nuevas</h1>

  <form method="POST" action="guardar_oferta.php">
    <div>
      <div class="form-row">
        <div class="col">
          <label for="titulo" class="form-label">Título</label>
          <input type="text" class="form-control" name="titulo">
        </div>
        <div class="col">
          <label for="descripcion" class="form-label">Descripción</label>
          <input type="text" class="form-control" name="descripcion">
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
          <input type="date" class="form-control" name="fecha_publicacion">
        </div>
        <div class="col">
          <label for="fecha_cierre" class="form-label">Fecha de Cierre</label>
          <input type="date" class="form-control" name="fecha_cierre">
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="remuneracion" class="form-label">Remuneración</label>
          <input type="text" class="form-control" name="remuneracion">
        </div>
        <div class="col">
          <label for="ubicacion" class="form-label">Ubicación</label>
          <input type="text" class="form-control" name="ubicacion">
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="tipo" class="form-label">Tipo</label>
          <input type="text" class="form-control" name="tipo">
        </div>
        <div class="col">
          <label for="empresa_id" class="form-label">Empresa ID</label>
          <input type="text" class="form-control" name="empresa_id">
        </div>
      </div>
    </div>
    <div style="width: 100%; display: grid; justify-content: center;">
      <button type="submit" class="btn btn-primary" style="margin: 1rem;">Registrar Oferta Laboral</button>
    </div>
  </form>

  <!-- Fin de la zona central del sistema -->
</div>

<?php
include '../../includes/food.php';
?>
