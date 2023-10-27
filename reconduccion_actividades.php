<?php
session_start();

if ($_SESSION['sistema'] == "pbrm") {
	include 'header.php';
	include 'head.php';
	require_once 'Controllers/reconducciona_Controlador.php';
	include 'Controllers/breadcrumbs.php';

	if ($permisos['nivel'] == 5) {
		print " Tu cuenta no permite realizar esta acción";
		die();
	} else {
		if (isset($permisos['id_dependencia'])) {
			$dep = $permisos['id_dependencia'];
		}
	}

	$id_usuario = $_SESSION['id_usuario'];


	// Nos permite saber el trimestre
	$thismes = ceil(date('m'));
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Reconducción de Actividades</title>
	</head>

	<body>
		<div class="container mx-auto">


			<?php if ($permisos['nivel'] == 4) : ?>
				<?php
				if (isset($_POST['id_area']) && $_POST) {
					$nombre_area = NombreArea($con, $_POST['id_area']);
				} else {
					$nombre_area = "";
				}
				?>

				<br>
				<?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => "actividades.php", "Reconducción de Actividades" => "", $nombre_area => "")) ?>

				<br>


				<?php if (!$_POST && $rec_validadas = TraeReconduccionesValidadas($con, $dep)) : ?>
					<div id="alert-additional-content-3" class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
						<div class="flex items-center">
							<svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
							</svg>
							<h3 class="text-lg font-medium">Tienes Reconducciones validadas</h3>
						</div>
						<div class="mt-2 mb-4 text-sm">
							Tienes reconducciones validadas listas para imprimir (Probablemente estos formatos ya fueron impresos anteriormente)
						</div>
						<div class="flex">
							<button type="button" onclick="window.location.href='mis_reconducciones_actividades.php'" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
								<svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
									<path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
								</svg>
								Ver
							</button>
							<button type="button" class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800" data-dismiss-target="#alert-additional-content-3" aria-label="Close">
								Cerrar
							</button>
						</div>
					</div>
				<?php endif ?>

				<?php if (!$_POST && $rec_pendientes = TraeReconduccionesporvalidar($con, $dep)) : ?>
					<div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
						<div class="flex items-center">
							<svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
							</svg>
							<span class="sr-only">Info</span>
							<h3 class="text-lg font-medium">Tienes Reconducciones esperando ser Validadas</h3>
						</div>
						<div class="mt-2 mb-4 text-sm">
							Tienes una o varias reconducciones esperando ser validadas.
						</div>
						<div class="flex">
							<button type="button" onclick="window.location.href='mis_reconducciones_actividades.php'" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
								<svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
									<path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
								</svg>
								Ver
							</button>
							<button type="button" class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800" data-dismiss-target="#alert-additional-content-4" aria-label="Close">
								Cerrar
							</button>
						</div>
					</div>
				<?php endif ?>

				<?php
				if (!$_POST) : //Hacemos la verificacion de que no se ha seleccionado un area para reconducir
					$areas = TraerAreas($con, $dep);
				?>
					<br>
					<h3 class="mb-2 center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nueva Reconducción de ACTIVIDADES</h3>
					<br>

					<div class="grid grid-cols-2">


						<?php foreach ($areas as $a) :
							$area = $a['id_area']; ?>

							<div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
                <h5 class=" mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $a['nombre_area'] ?></h5>


								<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
									<form action="" method="post">
										<table class="w-full text-xs text-left text-gray-500 dark:text-gray-400 my-1">
											<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
												<tr>
													<th scope="col" class="py-3 px-6">

													</th>
													<th scope="col" class="py-3 px-6">
														No
													</th>
													<th scope="col" class="py-3 px-6">
														Actividad
													</th>
													<th scope="col" class="py-3 px-6">
														UdM
													</th>
													<th scope="col" class="py-3 px-6">
														Anual
													</th>

												</tr>
											</thead>
											<tbody>
												<?php $actividades = TraerActividades($con, $area);
												foreach ($actividades as $value) :
													$id_actividad = $value['id_actividad'];
												?>
													<tr class="bg-white dark:bg-gray-800">

														<td class="py-4 px-6">
															<div class="flex items-center mb-4">
																<input id="default-checkbox" name="actividad[]" type="checkbox" value="<?= $id_actividad ?>" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
															</div>
														</td>
														<td class="py-4 px-6">
															<?= $value['codigo_actividad'] ?>
														</td>
														<td class="py-4 px-6">
															<?= $value['nombre_actividad'] ?>
														</td>
														<td class="py-4 px-6">
															<?= $value['unidad'] ?>
														</td>
														<td class="py-4 px-6">
															<?= MuestraSumaProgramacion($con, $id_actividad) ?>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
										<input type="hidden" name="id_area" value="<?= $area ?>">
										<input type="submit" value="Reconducir" class=" inline-flex items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
										<input type="hidden" name="reconducir">
									</form>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

				<?php
				endif;
				?>

				<!-- Aqui comienza el codigo cuando estamos ya en la reconduccion. -->

				<?php
				if ($_POST && !isset($_POST['actividad'])) :
					unset($_POST);
				?>
					<script>
						window.location.href = 'reconduccion_actividades.php';
					</script>
				<?php endif ?>

				<?php if (isset($_POST['actividad'])) : //Hacemos la verificacion de se pasan actividades a reconducir


					//$nombre_area = TraeNombreArea($con, $_POST['id_area']);
					$id_area = $_POST['id_area'];
					$data = TraeDatosReconduccion($con, $id_area);
					$id_dependencia = $data['id_dependencia'];
					$encargados = TraeEncargados($con, $id_area, $id_dependencia);

					if (!$encargados) : ?>
						<div id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
							<div class="relative p-4 w-full max-w-md h-full md:h-auto">
								<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
									<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
										<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
										</svg>
										<span class="sr-only">Cerrar</span>
									</button>
									<div class="p-6 text-center">
										<svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
										</svg>
										<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Aún no registras los titulares necesarios para realizar esta operación</h3>
										<a href="mis_areas.php" t ype="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Registrar Nombres</a>

									</div>
								</div>
							</div>
						</div>
					<?php
						die();
					endif; ?>
					<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
						<form action="models/reconducciones_modelo.php" method="post">
							<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
								<thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
									<tr>
										<th scope="col" class="py-3 px-6">
											Dependencia
										</th>
										<th scope="col" class="py-3 px-6">
											Dependencia General
										</th>
										<th scope="col" class="py-3 px-6">
											Dependencia Auxiliar
										</th>
										<th scope="col" class="py-3 px-6">
											Programa Presupuestario
										</th>
										<th scope="col" class="py-3 px-6">
											Proyecto
										</th>
										<th scope="col" class="py-3 px-6">
											No. Oficio
										</th>
									</tr>
								</thead>
								<tbody>
									<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
										<td class="py-4 px-6">
											<?= $data['nombre_dependencia'] ?>
										</td>
										<td class="py-4 px-6">
											<?= $data['clave_dependencia'] . " " . $data['nombre_dependencia_general'] ?>
										</td>
										<td class="py-4 px-6">
											<?= $data['clave_dependencia_auxiliar'] . " " . $data['nombre_dependencia_auxiliar'] ?>
										</td>
										<td class="py-4 px-6">
											<?= $data['codigo_programa'] . " " . $data['nombre_programa'] ?>
										</td>
										<td class="py-4 px-6">
											<?= $data['codigo_proyecto'] . " " . $data['nombre_proyecto'] ?>
										</td>
										<td class="py-4 px-6">
											<input type="text" name="no_oficio" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
										</td>
										<input type="hidden" name="general" value="<?= $data['clave_dependencia'] . " " . $data['nombre_dependencia_general'] ?>">
										<input type="hidden" name="auxiliar" value="<?= $data['clave_dependencia_auxiliar'] . " " . $data['nombre_dependencia_auxiliar'] ?>">
										<input type="hidden" name="programa" value="<?= $data['codigo_programa'] . " " . $data['nombre_programa'] ?>">
										<input type="hidden" name="id_area" value="<?= $id_area ?>">
										<input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
									</tr>
								</tbody>
							</table>
							<br>
							<!-- Aqui imprimimos la tabla donde nos permitira visualizar la programacion y los posibles cambios -->
							<?php foreach ($_POST['actividad'] as $actividad) :
								$dataActividad = NombreActividad($con, $actividad); ?>
								<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

									<thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
										<tr>
											<th colspan="12" center>
												<?= $dataActividad['codigo_actividad'] . " - " . $dataActividad['nombre_actividad'] . " - " . $dataActividad['unidad'] ?>
											</th>
										</tr>
										<tr>
											<?php
											$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
											foreach ($meses as $mes) {
												print
													'<th scope="col" class="py-3 px-6">
									' . $mes . '
									</th>';
											} ?>
										</tr>

									</thead>
									<tbody>
										<tr>
											<input type="hidden" name="actividades[]" value="<?= $actividad ?>">
											<input type="hidden" name="<?= $actividad ?>[]" value="<?= $dataActividad['codigo_actividad'] ?>">
											<input type="hidden" name="<?= $actividad ?>[]" value="<?= $dataActividad['nombre_actividad'] ?>">
											<input type="hidden" name="<?= $actividad ?>[]" value="<?= $dataActividad['unidad'] ?>">


											<?php $mensual = ProgramaMensual($con, $actividad); // La funcion limita lo 12 campos solamente de los 15 que tiene
											$contadorMes = 1;
											$thisTrimestre = ceil($thismes / 3);

											foreach ($mensual as $mes) : // Primer recorremos los 12 
												// para configuracion normal, cambiar el signo siguiente.
												if ($contadorMes < 7) : ?> <!-- Si los avances estan en un trimestre menor al actual no se pueden cambiar, entonces mostraremos un boton desabilitado -->
													<td class="py-4 px-6">
														<input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $mes ?>" disabled required>
														<input type="hidden" name="<?= $actividad ?>[]" value="<?= $mes ?>">
													</td>
													<!--Aqui ya sabemos que estamos ante un caso posible, primero vamos a revisar si tiene avance... -->
												<?php else : ?>

													<td class="py-4 px-6">
														<input type="text" name="<?= $actividad ?>[]" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $mes ?>" required>
													</td>
												<?php endif ?>
											<?php $contadorMes += 1;
											endforeach ?>
										</tr>
										<tr>
											<td colspan="12">
												<label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación de la reconducción</label>
												<textarea id="justificacion" name="<?= $actividad ?>[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Redacta tu justificación"></textarea>
											</td>
										</tr>
										<br>
										<br>
									</tbody>

								<?php endforeach ?>
								</table>
								<br>
								<input type="submit" value="Solicitar Reconducción" name="data" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
						</form>
					</div>


				<?php
				endif;
				?>

			<?php
			endif;
			?>







			<?php if ($permisos['nivel'] < 3) : ?>
				<br>
				<?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => "actividades.php", "Reconducción de Actividades" => "")) ?>
				<br>

				<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
					<span class="font-medium">Reconducciones </span> <a href="revisa_todas_reconducciones.php">Todas</a>
				</div>

				<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
					<form action="descargatxtreconducciones.php" method="post">
					   <button type="submit" name="txt" value="txt" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reconducciones TXT</button>
					</form>
				</div>

				<?php $dependencias = Traedepndencias($con) ?>
				<div class="grid grid-cols-4">
					<?php foreach ($dependencias as $dp) : ?>
						<div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
							<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $dp['nombre_dependencia'] ?> </h5>
							<br>

							<form action="mis_reconducciones_actividades.php" method="post">
								<input type="hidden" name="id_dependencia" value="<?= $dp['id_dependencia'] ?>">
								<button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_dependencia" value="<?= $dp['id_dependencia'] ?>">
									Ver Reconducciones
								</button>
							</form>
							<br>
						</div>
					<?php endforeach ?>
				</div>



			<?php endif ?>

		</div>
		<?php include 'footer.php'; ?>
	</body>

	</html>
<?php
} else {
?>
	<script>
		window.location.href = 'login.php';
	</script>
<?php
}
?>