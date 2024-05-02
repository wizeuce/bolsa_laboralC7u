<?php
include '../../includes/head.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Inicio de la zona central del sistema -->
  <!-- Todo -->
  <h1>Registro de nuevas empresas diversas</h1>

  <form method="POST" action="guardar_empresa.php">
    <div>
      <div class="form-row">
        <div class="col">
          <label for="razon_social" class="form-label">Nombre de Empresa</label>
          <input type="text" class="form-control" name="razon_social">
        </div>
        <div class="col">
          <label for="correo" class="form-label">Correo Electrónico</label>
          <input type="text" class="form-control" name="correo">
        </div>
      </div>
     
      <div class="form-row">
        <div class="col">
          <label for="ruc" class="form-label">RUC</label>
          <input type="text" class="form-control" name="ruc">
        </div>
        <div class="col">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" class="form-control" name="telefono">
        </div>
      </div>
      <div class="col">
          <label for="direccion" class="form-label">Direccion</label>
          <input type="text" class="form-control" name="direccion">
        </div>
      </div>

      <div style="display: none;">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" class="form-control" value="<?php echo $_SESSION['SESSION_USER_ID']; ?>" name="user_id">
        </div>
      </div>
         
    <div style="width: 100%; display: grid; justify-content: center;">
      <button type="submit" class="btn btn-primary" style="margin: 1rem;" id="submitButton">Registrar Empresa</button>
    </div>
  </form>

  <!-- Fin  de la zona central del sistema -->
</div>
<!-- /.container-fluid -->
<?php
include '../../includes/food.php';
?>
