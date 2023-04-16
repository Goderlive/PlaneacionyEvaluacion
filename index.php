<?php
session_start();

if(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm"){    
    require_once 'Controllers/Inicio_Controlador.php';
    include 'header.php';
    include 'head.php';
    // consultamos los permisos
?>
<!DOCTYPE html>
<html lang="es">
<body>

  <div class="container text-center mx-auto">
        <br>
        <h3 class="font-bold text-4xl text-gray-800 border-b-3 border-gray-100 p-2 mb-2">Bienvenido <?= $user['nombre'] . " ". $user['apellidos'] ?></h3>
        <br>


        <?php
        // Aqui va lo que pasa si eres nivel 2 (osea de la wipe o gobierno digital)
		if($permisos['nivel']  == 1 || $permisos['nivel']  == 2){
			print AlertaAvancesActividades($con);
			print AlertaAvancesIndicadores($con);
            print AlertaReconduccionActividades($con);
            print AlertaReconduccionIndicadores($con);
		}
        ?>
        <br>
        <hr>

        
    </div>

<?php include 'footer.php';?>
</body>
</html>
<?php 
}else{?>
    <script>
    window.location.href = 'login.php';
    </script>
<?php
}
?>