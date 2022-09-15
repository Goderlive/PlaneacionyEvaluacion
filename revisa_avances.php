<?php
if(!$_GET['type']){
    header("Location: index.php");
}
$tipo = $_GET['type'];
session_start();
if($_SESSION['sistema'] == "pbrm" || $_SESSION['id_permiso'] != 1){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/avances_controlador.php';
    include 'Controllers/breadcrumbs.php';
?>
<!DOCTYPE html>
<html lang="es">

<body>
	<div class="container text-center mx-auto">
        <br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Revisa Avances"=>""))?>

<br>
    <?php
        if($tipo == "actividades"){
            echo MuestraAvancesActividades($con);
        }
        if($tipo == "indicadores"){
            echo MuestraAvancesIndicadores($con);
        }
        
    ?>

		<br>

		
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