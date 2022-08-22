<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/reconducciona_Controlador.php';
	require_once 'models/reconducciones_modelo.php';

$dep = $_SESSION['id_dependencia'];
$id_usuario = $_SESSION['id_usuario'];
// Nos permite saber el trimestre
if (date('m') > 8) {
	$thismes = 9;
}elseif(date('m') > 5){
	$thismes = 6;
}elseif(date('m') > 2){
	$thismes = 3;
}else{
	$thismes = 0;
}
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

	<br>
	<nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Inicio
                </a>
            </li>
			<li class="inline-flex items-center">
                <a href="actividades.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    Actividades
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Reconducción de Actividades</span>
                </div>
            </li>
        </ol>
    </nav>
<br>
	<?php 
	if(!$_POST): //Hacemos la verificacion de que no se ha seleccionado un area para reconducir
		$areas = TraerAreas($con, $dep);
		?> 
		<br>
		<h3 class="mb-2 center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Seleccione el Área de la actividad a reconducir</h3>
		<br>

		<div class="grid grid-cols-2">
    

		<?php foreach($areas as $a):
				$area = $a['id_area']; ?>

			<div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
                <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $a['nombre_area'] ?></h5>

                
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
							foreach ($actividades as $value):
								$id_actividad = $value['id_actividad'];
								?>
								<tr class="bg-white dark:bg-gray-800">

									<td class="py-4 px-6">
										<div class="flex items-center mb-4">
											<input id="default-checkbox" name="actividad[]" type="checkbox" value="<?= $id_actividad ?>" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										</div>
									</td>
									<td class="py-4 px-6">
										<?= $value['codigo_actividad']?>
									</td>
									<td class="py-4 px-6">
										<?= $value['nombre_actividad']?>
									</td>
									<td class="py-4 px-6">
										<?= $value['unidad']?>
									</td>
									<td class="py-4 px-6">
										<?=MuestraSumaProgramacion($con, $id_actividad)?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<input type="hidden" name="id_area" value="<?= $area ?>">
					<input type="submit" value="Reconducir" class=" inline-flex items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >
					<input type="hidden" name="reconducir">
				</form>
			</div>
            </div>
				<?php endforeach;?>
	</div>

	<?php 
	endif;
	?>
 
 <!-- Aqui comienza el codigo cuando estamos ya en la reconduccion. -->

	<?php 
	if($_POST && !isset($_POST['actividad'])):
		unset($_POST);
	?>
		<script>
			window.location.href = 'reconduccion_actividades.php';
		</script>
	<?php endif?>

		<?php if(isset($_POST['actividad'])): //Hacemos la verificacion de se pasan actividades a reconducir
			$id_area = $_POST['id_area'];
			$data = TraeDatosReconduccion($con, $id_area);
			$id_dependencia = $data['id_dependencia'];
			$encargados = TraeEncargados($con, $id_area, $id_dependencia);

			if (!$encargados): ?>
				<div id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
					<div class="relative p-4 w-full max-w-md h-full md:h-auto">
						<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
							<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
								<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
								<span class="sr-only">Close modal</span>
							</button>
							<div class="p-6 text-center">
								<svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
								<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Aún no registras los titulares necesarios para realizar esta operación</h3>
								<a href="mis_areas.php" t
								ype="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Registrar Nombres</a>
								
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
								<?= $data['clave_dependencia_auxiliar'] . " " . $data['nombre_dependencia_auxiliar']?>
							</td>
							<td class="py-4 px-6">
								<?= $data['codigo_programa'] . " " . $data['nombre_programa']?> 
							</td>
							<td class="py-4 px-6">
								<?= $data['codigo_proyecto'] . " " . $data['nombre_proyecto']?>
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
				<?php foreach ($_POST['actividad'] as $actividad):
					$dataActividad = NombreActividad($con, $actividad);?>
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
								foreach ($meses as $mes){
									print 
									'<th scope="col" class="py-3 px-6">
									'.$mes.'
									</th>';
								}?>
							</tr>
							
						</thead>
						<tbody>
							<tr>
					<input type="hidden" name="actividades[]" value="<?= $actividad ?>">
					<input type="hidden" name="<?= $actividad?>[]" value="<?= $dataActividad['codigo_actividad'] ?>">
					<input type="hidden" name="<?= $actividad?>[]" value="<?= $dataActividad['nombre_actividad'] ?>">
					<input type="hidden" name="<?= $actividad?>[]" value="<?= $dataActividad['unidad'] ?>">


									<?php $mensual = ProgramaMensual($con, $actividad);
										$contadorMes = 0;
									foreach($mensual as $mes): 
										if($contadorMes < $thismes): ?>
											<td class="py-4 px-6">
												<input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $mes ?>" disabled required>
												<input type="hidden" name="<?= $actividad?>[]" value="<?= $mes ?>">
											</td>		
										<?php elseif ($contadorMes >= $thismes): 
											if($avance = MuestraAvanceActual($con, $contadorMes+1, $actividad)):?>
												<td class="py-4 px-6">
													<input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $avance['avance'] ?>" disabled required>
													<input type="hidden" name="<?= $actividad?>[]" value="<?= $mes ?>">
												</td>	
											<?php else:?>
												<td class="py-4 px-6">
													<input type="text" name="<?= $actividad?>[]" id="first_name" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="<?= $mes ?>" required>
												</td>
											<?php endif?>		

										<?php endif ?>
									<?php 
										$contadorMes += 1;
										endforeach?>
							</tr>
							<tr>
								<td colspan="12">
									<label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación de la reconducción</label>
									<textarea id="justificacion" name="<?= $actividad?>[]" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Redacta tu justificación"></textarea>
								</td>
							</tr>
							<br>
							<br>
						</tbody>
						
						<?php endforeach?>
					</table>
					<input type="submit" value="Solicitar Reconducción" name="data" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
				</form>
			</div>


		<?php
		endif;
		?>
</div>
<?php include 'footer.php';?>
</body>
</html>
<?php
}
?>

