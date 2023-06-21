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
	<!-- MDB --><link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

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
					<img src="./img/logo_ayuntamiento.png" class="img-fluid" alt="">
				</div>
				<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
					<h3 class="text-center">Sistema de Monitoreo Tablero de Control y Seguimiento del PBRM <br><b>(SIMONTS)</b></h3>
					<br>
					<form action="validar_login.php" id="loginsimonts" method="POST">
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
							<input class="form-check-input" onclick="ver_contrasena()" type="checkbox" value="" id="" />
							<label class="form-check-label" for="">Mostrar Contraseña</label>
						</div>
						<div class="text-center text-lg-center mt-4 pt-2">
							<button type="submit" class="btn text-white btn-lg" style="padding-left: 1.5rem; padding-right: 1.5rem; background-color:#a184bc;">Ingresar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column flex-md-row text-md-start justify-content-center py-4 px-4 px-xl-5">
			<!-- Copyright -->
			<div class="text-white mb-3 mb-md-0">
				<a href="https://copladem.edomex.gob.mx/" target="_blank" style="text-color: white;" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Comité de Planeación para el Desarrollo del Estado de México</a>
			</div>
			<!-- Copyright -->
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