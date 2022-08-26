<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/Inicio_Controlador.php';

?>
<!DOCTYPE html>
<html lang="es">

<body>
    <?php var_dump($_SESSION)?>

  <div class="container text-center mx-auto">
        <br>
        
        <h3 class="font-bold text-4xl text-gray-800 border-b-3 border-gray-100 p-2 mb-2">Bienvenido <?= $user['nombre'] . " ". $user['apellidos'] ?></h3>
        <br>


        <?php
        // Aqui va lo que pasa si eres nivel 2 (osea de la wipe o gobierno digital)
		if($_SESSION['id_permiso'] == 1){
			print AlertaAvancesActividades($con);
			print AlertaAvancesIndicadores($con);
            print AlertaReconduccionActividades($con);
            //AlertaReconduccionIndicadores($con);
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