<?php
include '../../includes/head.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Inicio de la zona central del sistema -->
  <!-- Todo -->
  <h1>Registro de usuarios nuevos</h1>

  <form method="POST" action="guardar_usuario.php" id="registrationForm">
    <div>
      <div class="form-row">
        <div class="col">
          <label for="name" class="form-label">Nombre de Usuario</label>
          <input type="text" class="form-control" name="name" maxlength="20">
        </div>
        <div class="col">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" name="email" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="nombres" class="form-label">Nombres </label>
          <input type="text" class="form-control" name="nombres" maxlength="20">
        </div>
        <div class="col">
          <label for="apellidos" class="form-label">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" maxlength="20">
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="dni" class="form-label">DNI</label>
          <input type="tel" pattern="[0-9]*" class="form-control" name="telefono"
           oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="8">  
        </div>
        <div class="col">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="tel" pattern="[0-9]*" class="form-control" name="telefono"
           oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="9">  
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="col">
          <label for="confirm_password" class="form-label">Vuelva a escribir la contraseña</label>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
        </div>
        <div id="passwordError" class="text-danger" style="display: none;"></div>
      </div>
    </div>
    <div style="width: 100%; display: grid; justify-content: center;">
      <button type="submit" class="btn btn-primary" style="margin: 1rem;" id="submitButton">Registrar Usuario</button>
    </div>
  </form>

  <!-- Fin  de la zona central del sistema -->
</div>
<!-- /.container-fluid -->
<?php
include '../../includes/food.php';
?>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");
    var passwordError = document.getElementById("passwordError");
    var submitButton = document.getElementById("submitButton");
    var registrationForm = document.getElementById("registrationForm");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        passwordError.textContent = "Las contraseñas no coinciden";
        confirm_password.setCustomValidity("Las contraseñas no coinciden");
      } else {
        passwordError.textContent = "";
        confirm_password.setCustomValidity("");
      }
    }

    function validateForm(event) {
      if (password.value != confirm_password.value) {
        event.preventDefault(); // Evitar que el formulario se envíe si las contraseñas no coinciden
      }
    }

    function validateEmail() {
      var email = document.getElementById("email");
      var emailRegex = /\S+@\S+\.\S+/;
      if (!emailRegex.test(email.value)) {
        email.setCustomValidity("Ingrese una dirección de correo electrónico válida");
      } else {
        email.setCustomValidity("");
      }
    }

    // Add event listeners
    password.addEventListener("change", validatePassword);
    confirm_password.addEventListener("keyup", validatePassword);
    submitButton.addEventListener("click", validateForm);
    registrationForm.addEventListener("submit", validateEmail);
  });
</script>
