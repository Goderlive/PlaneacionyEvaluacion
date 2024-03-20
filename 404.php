<?php 
require_once 'models/conection.php';

$stm = $con->query("SELECT path_logo_login FROM setings");
$logo = $stm->fetch(PDO::FETCH_ASSOC);

$logo = $logo['path_logo_login'];
?>
<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.0/dist/flowbite.min.css" />
        <title>Página no encontrada</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
	  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Error 404 - Página no encontrada</title>
  </head>
  <body>

    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="<?= $logo ?>" class="img-fluid" alt="">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h1>Error 404 - Página no encontrada</h1>
                <p>Lo siento, la página que estás buscando no existe.</p>
                <button type="button" id="extra-large-button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-6 py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Regresar</button>
            </div>
          </div>
        </div>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
        <script>
            document.getElementById("extra-large-button").addEventListener("click", function() {
              window.location.href = "index.php";
            });
          </script>
  </body>
</html>
