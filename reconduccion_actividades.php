<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/reconducciona_Controlador.php';
 	include 'Controllers/breadcrumbs.php';

$dep = $_SESSION['id_dependencia'];
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

<?php
if(isset($_POST['id_area']) && $_POST){
	$nombre_area = NombreArea($con, $_POST['id_area']);
}else{
	$nombre_area = "";
}
?>

	<br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Actividades"=> "actividades.php", "Reconducción de Actividades"=>"", $nombre_area => ""))?>
	
<br>

	<?php if(!$_POST): ?>
		<?php if(($rec_pendientes = Existentes($con, $dep)) || ($rec_validadas = Validadas($con, $dep))):?>


		
		<div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
			<h2 id="accordion-flush-heading-1">
				<button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
				<span>Reconducciones Pendientes de Validación</span>
				<svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</h2>
			<div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
				<div class="py-5 font-light border-b border-gray-200 dark:border-gray-700"> <!-- Aqui llega el drop -->
				<?php foreach($rec_pendientes as $p):?>	

					<div class="overflow-x-auto relative">
						<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th scope="col" class="py-3 px-6">
										Area
									</th>
									<th scope="col" class="py-3 px-6">
										No. Oficio
									</th>
									<th scope="col" class="py-3 px-6">
										Fecha
									</th>
									<th scope="col" class="py-3 px-6">
										Estado
									</th>
								</tr>
							</thead>
								<tr>
									<th scope="col" class="py-3 px-6">
										<?= $p['id_area']?>
									</th>
									<th scope="col" class="py-3 px-6">
										<?= $p['no_oficio']?>
									</th>
									<th scope="col" class="py-3 px-6">
										<?= $p['fecha']?>
									</th>
									<th scope="col" class="py-3 px-6">
										<p class="text-yellow-600">Pendiente de Revisión</p>
									</th>
								</tr>
							</tbody>
						</table>
						<br>
						<table>

						<?php $programacion = TraeProgramaciones($con, $p['id_reconduccion_actividades'])?>
						<?php foreach($programacion as $q):?>
							<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
								<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
									<?php //var_dump($q)?>
									<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
										<th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
											Nombre Actividad
										</th>
										<td class="py-4 px-6">
											Unidad de Medida
										</td>
										<td class="py-4 px-6">
											Prog Anual Inicial
										</td>
										<td class="py-4 px-6">
											Prog Anual Final											
										</td>
										<td class="py-4 px-6">
											Tipo											
										</td>
									</tr>
							</thead>
							<tbody>
								<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
									<th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
										<?= $q['desc_actividad'] ?>
									</th>
									<td class="py-4 px-6">
										<?= $q['u_medida'] ?>
									</td>
									<td class="py-4 px-6">
										<?= SumaAnual($q['programacion_inicial']) ?>
									</td>
									<td class="py-4 px-6">
										<?= SumaAnual($q['programacion_final']) ?>
									</td>
									<td class="py-4 px-6">
										<?= DefineReconduccion($q['programacion_inicial'], $q['programacion_final'])?>
									</td>
								</tr>
							</tbody>
						</table>
						<?php endforeach?>
					</div>
				<?php endforeach?>
				</div>
			</div>
			<h2 id="accordion-flush-heading-2">
				<button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
				<span>Reconducciones Realizadas</span>
				<svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</h2>
			<div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
				<div class="py-5 font-light border-b border-gray-200 dark:border-gray-700"> <!-- Hasta aquillega eldrop -->
					<?php $rec_validadas = Validadas($con, $dep)?>
					<?php foreach($rec_validadas as $v):?>
						<div class="overflow-x-auto relative">
							<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
								<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
									<tr>
										<th scope="col" class="py-3 px-6">
											Area
										</th>
										<th scope="col" class="py-3 px-6">
											No. Oficio
										</th>
										<th scope="col" class="py-3 px-6">
											Fecha
										</th>
										<th scope="col" class="py-3 px-6">
											Estado
										</th>
										<th scope="col" class="py-3 px-6">
											Acción
										</th>
									</tr>
								</thead>
									<tr>
										<th scope="col" class="py-3 px-6">
											<?= $v['id_area']?>
										</th>
										<th scope="col" class="py-3 px-6">
											<?= $v['no_oficio']?>
										</th>
										<th scope="col" class="py-3 px-6">
											<?= $v['fecha']?>
										</th>
										<th scope="col" class="py-3 px-6">
											Validada
										</th>
										<th scope="col" class="py-3 px-6">
											<form action="sources/TCPDF-main/examples/Reconduccion_Actividades.php" method="POST">
												<input type="hidden" name="id_reconduccion" value="<?= $p['id_reconduccion_actividades']?>">
												<input type="submit" value="aaaaa" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
											</form>
										</th>
									</tr>
								</tbody>
							</table>
							<br>
							<table>

							<?php $programacion = TraeProgramaciones($con, $v['id_reconduccion_actividades'])?>
							<?php foreach($programacion as $q):?>
								<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
									<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
										<?php //var_dump($q)?>
										<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
											<th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
												Nombre Actividad
											</th>
											<td class="py-4 px-6">
												Unidad de Medida
											</td>
											<td class="py-4 px-6">
												Prog Anual Inicial
											</td>
											<td class="py-4 px-6">
												Prog Anual Final											
											</td>
											<td class="py-4 px-6">
												Tipo											
											</td>
										</tr>
								</thead>
								<tbody>
									<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
										<th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
											<?= $q['desc_actividad'] ?>
										</th>
										<td class="py-4 px-6">
											<?= $q['u_medida'] ?>
										</td>
										<td class="py-4 px-6">
											<?= SumaAnual($q['programacion_inicial']) ?>
										</td>
										<td class="py-4 px-6">
											<?= SumaAnual($q['programacion_final']) ?>
										</td>
										<td class="py-4 px-6">
											<?= DefineReconduccion($q['programacion_inicial'], $q['programacion_final'])?>
										</td>
									</tr>
								</tbody>
							</table>
							<?php endforeach?>
						</div>
					<?php endforeach?>
					
				</div>
			</div>
		</div>

		<?php endif ?>
	<?php endif ?>  <!-- Aqui terminamos el area de reconducciones realizadas -->

	<?php 
	if(!$_POST): //Hacemos la verificacion de que no se ha seleccionado un area para reconducir
		$areas = TraerAreas($con, $dep);
		?> 
		<br>
		<h3 class="mb-2 center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nueva Reconducción</h3>
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

			
			//$nombre_area = TraeNombreArea($con, $_POST['id_area']);
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
								<span class="sr-only">Cerrar</span>
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


									<?php $mensual = ProgramaMensual($con, $actividad); // La funcion limita lo 12 campos solamente de los 15 que tiene
										$contadorMes = 1;
										$thisTrimestre = ceil($thismes/3);
									foreach($mensual as $mes): // Primer recorremos los 12 
									// Primero tenemos que mostrar los que esten fuera del trimestre en el que estamos
										$trimestreAvance= ceil($contadorMes/3);
										
										if($thisTrimestre > $trimestreAvance):?>  <!-- Si los avances estan en un trimestre menor al actual no se pueden cambiar, entonces mostraremos un boton desabilitado -->
											<td class="py-4 px-6">
												<input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $mes ?>" disabled required>
												<input type="hidden" name="<?= $actividad?>[]" value="<?= $mes ?>">
											</td>
											<!--Aqui ya sabemos que estamos ante un caso posible, primero vamos a revisar si tiene avance... -->
										<?php else:
											if($avance = MuestraAvanceActual($con, $contadorMes, $actividad)):?>
											<td class="py-4 px-6">
												<input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $avance['avance'] ?>" disabled required>
												<input type="hidden" name="<?= $actividad?>[]" value="<?= $mes ?>">
											</td>	
											<?php else:?>
												<td class="py-4 px-6">
													<input type="text" name="<?= $actividad?>[]" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="<?= $mes ?>" required>
												</td>
											<?php endif ?>
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

