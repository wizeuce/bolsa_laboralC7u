<?php
include("../includes/head.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Inicio de la zona central del sistema -->
    <!-- Todo -->
    <h1 >Acceder al sistema</h1>

    <div class="row dflex flexwrap justify-content-center ">
        <div class="col-6 border border-primary">
 
            <form class="p-4" method="POST" action="login.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input name="txt_usuario" type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Usuario" required="required">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input name="txt_password"type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa Contraseña" required="required">
  </div>
    
    <?php
            if(isset($_REQUEST['error_login'])){
    
    ?>

            <div class="form-group">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Error</h4>
                    <p>Usuario o contraseña incorrectos</p>
                </div>
            </div>
            <?php
    }
    ?>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    <!-- Fin  de la zona central del sistema -->
</div>
<!-- /.container-fluid -->
<?php
include("../includes/food.php");
?>