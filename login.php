<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
	  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Iniciar Sesión</title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
      <img src="./img/logo_ayuntamiento.png" class="img-fluid" alt="">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <h3 class="text-center">Sistema de Control y Monitoreo</h3>
      <br>
        <form action="validar_login.php" method="POST" autocomplete="off">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="correo_electronico" class="form-control form-control-lg" placeholder="Ingresa tu correo electrónico" required />
            <label class="form-label">Correo</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="contrasena" id="contrasena" class="form-control form-control-lg" placeholder="Ingresa tu contraseña" required />
            <label class="form-label">Contraseña</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" onclick="ver_contrasena()" type="checkbox" value="" id=""/>
            <label class="form-check-label" for="">Mostrar Contraseña</label>
          </div>
          <div class="d-flex justify-content-center pt-2">
		        <div class="g-recaptcha" data-sitekey="6LfZhsceAAAAAGaNBKstStjuyOLk6eO2iB1ZRSf0"></div>
          </div>

          <div class="text-center text-lg-center mt-4 pt-2">
            <button type="submit" class="btn text-white btn-lg" style="padding-left: 1.5rem; padding-right: 1.5rem; background-color:#a184bc;">Ingresar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column flex-md-row text-md-start justify-content-center py-4 px-4 px-xl-5" style="background-color: #a184bc;" >
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2022. H. Ayuntamiento Metepec 2022-2024.
    </div>
    <!-- Copyright -->
  </div>
</section>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>
</html>
<script>
    function ver_contrasena(){
        document.getElementById('contrasena').type = document.getElementById('contrasena').type == 'password' ? 'text' : 'password';
    }
    function resetear(){
      form.reset();
    }
</script>
