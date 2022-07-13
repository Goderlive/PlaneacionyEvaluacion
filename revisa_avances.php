<?php
session_start();
if($_SESSION['sistema'] == "pbrm" || $_SESSION['id_permiso'] != 1){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/avances_controlador.php';
?>
<!DOCTYPE html>
<html lang="es">

<body>
	<div class="container text-center mx-auto">
<br>
		<?php
			echo MuestraAvancesActividades($con);
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