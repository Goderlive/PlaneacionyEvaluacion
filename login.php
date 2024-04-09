<?php
session_start();

// Redirigir si ya existe una sesión activa
if (isset($_SESSION['id_usuario'])) {
    header("Location: index.php"); // Redirecciona a la página principal
    exit();
}

$tiempo_maximo = 28800; // 8 horas

if (isset($_SESSION['inicio_sesion']) && (time() - $_SESSION['inicio_sesion'] > $tiempo_maximo)) {
    // La sesión es muy vieja
    session_unset();     // Elimina las variables de sesión
    session_destroy();   // Destruye la sesión
    // Aquí podrías redirigir a la página de inicio de sesión o mostrar un mensaje
} else {
    // Actualizar el tiempo de inicio de sesión
    $_SESSION['inicio_sesion'] = time();
}

require_once 'models/conection.php';

$stm = $con->query("SELECT * FROM setings");
$ajustes = $stm->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/styles.css">
	<!-- MDB -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
	<script src="https://www.google.com/recaptcha/api.js?render=6LcZfqElAAAAADzerIJUYxVVssVh6IMposVwupF2"></script>
	<script>
		function onClick(e) {
			e.preventDefault();
			grecaptcha.ready(function() {
				grecaptcha.execute('reCAPTCHA_site_key', {
					action: 'submit'
				}).then(function(token) {
					// Add your logic to submit to your backend server here.
				});
			});
		}
	</script>
	<style>
		body {
			background-image: url("img/pdmc.png");
			background-repeat: no-repeat;
			background-position: center bottom;
			background-size: 100% auto;
		}

		A:link {
			text-decoration: none
		}

		A:hover {
			color: black;
			font-family: arial;
			text-decoration: none
		}

		A:visited {
			color: black;
			font-family: arial;
			text-decoration: none
		}

		* {
			outline: none !important;
		}

		*:focus {
			outline: none !important;
		}

		textarea:focus,
		input:focus {
			outline: none !important;
		}

		a {
			text-decoration: none !important;
			outline: none !important;
		}
	</style>

	<title>Iniciar Sesión</title>
</head>

<body>
	<section class="vh-100">
		<div class="container-fluid h-custom">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-md-9 col-lg-6 col-xl-5">
					<?php if($ajustes['path_logo_login']): ?>
					<img src="<?= $ajustes['path_logo_login'] ?>" class="img-fluid" alt="">
					<?php endif ?>
				</div>
				<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
					<h3 class="text-center">Sistema de Monitoreo, Tablero de Control y Seguimiento del PbRM <br><b>(SIMONTS)</b></h3>
					<br>
					<?php 
					if (isset($_SESSION['error_message'])) {
						echo '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
						<span class="font-medium">' . htmlspecialchars($_SESSION['error_message']) . '</span></div>';
						// Limpia el mensaje de error para que no se muestre de nuevo en la próxima carga
						unset($_SESSION['error_message']);
					}
					 ?>
					<form action="validar_login.php" id="loginsimonts" method="POST">
						<div>
							<label for="anio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año fiscal</label>
							<select id="anio" name="anio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="2023">2023</option>
								<option selected value="2024">2024</option>
							</select>

						</div>
						<br>
						<!-- Email input -->
						<div class="form-outline mb-4">
							<input autofocus type="email" name="correo_electronico" class="form-control form-control-lg" placeholder="Ingresa tu correo electrónico" required />
							<label class="form-label">Correo</label>
						</div>

						<!-- Password input -->
						<div class="form-outline mb-3">
							<input type="password" name="contrasena" id="contrasena" class="form-control form-control-lg" placeholder="Ingresa tu contraseña" required />
							<label class="form-label">Contraseña</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" onclick="ver_contrasena()" type="checkbox" value="" id="showpass" />
							<label class="form-check-label" for="showpass">Mostrar Contraseña</label>
						</div>
						<div class="text-center text-lg-center mt-4 pt-2">
							<button type="submit" class="btn text-white btn-lg" style="padding-left: 1.5rem; padding-right: 1.5rem; background-color:#a184bc;">Ingresar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column flex-md-row text-md-start justify-content-center py-4 px-4 px-xl-5">
			<div class="text-white mb-3 mb-md-0">
				<a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/" target="_blank" style="text-color: white;" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Objetivos de Desarrollo Sostenible</a>
			</div>
		</div>
	</section>
	<!-- MDB -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>

</html>
<script>
	function ver_contrasena() {
		document.getElementById('contrasena').type = document.getElementById('contrasena').type == 'password' ? 'text' : 'password';
	}

	function resetear() {
		form.reset();
	}
</script>