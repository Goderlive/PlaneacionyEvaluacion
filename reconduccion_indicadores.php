<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/reconduccioni_Controlador.php';
 	include 'Controllers/breadcrumbs.php';

if($permisos['id_dependencia'] != NULL){
	$dep = $permisos['id_dependencia'];
}else{
	print" Tu cuenta no permite realizar esta acción";
	die();
}

$id_usuario = $_SESSION['id_usuario'];
$trimestre = ceil(date('m')/4);


// Nos permite saber el trimestre
$thismes = ceil(date('m'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconducción de Indiadores</title>
</head>
<body>
<div class="container mx-auto">
<br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Indicadores"=> "indicadores.php", "Reconducción de Indicadores"=>""))?>
	
<br>

	<?php if(!$_POST): ?>
		<?php if(($rec_pendientes = TraeReconduccionesporvalidar($con, $dep)) || ($rec_validadas = TraeReconduccionesValidadas($con, $dep))):?>

			<div id="accordion-collapse" data-accordion="collapse" class="my-2">
				<h2 id="accordion-collapse-heading-1">
					<button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
						<span>Reconducciones Pendientes de Validación</span>
						<svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
				</h2>
				<div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
					<div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
					<?php foreach($rec_pendientes as $p):?>	


						<div class="overflow-x-auto relative">
							<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
								<thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
										<th scope="col" class="py-3 px-6 bg-gray-50">
											<?= NombreArea($con, $p['id_area'])?>
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

								<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
									<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
									<?php foreach($programacion as $q):?>
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
									<?php endforeach?>
								</tbody>
							</table>
						</div>
						<br>
						<?php endforeach?>	
					</div>
				</div>


				<h2 id="accordion-collapse-heading-2">
					<button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
						<span>Reconducciones Realizadas</span>
						<svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
				</h2>
				<div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
					<div class="my-2 p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
						<?php $rec_validadas = TraeReconduccionesValidadas($con, $dep)?>
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
												<?= NombreArea($con, $v['id_area'])?>
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
													<input type="hidden" name="id_reconduccion" value="<?= $v['id_reconduccion_actividades']?>">
													<input type="submit" formtarget="_blank" value="Imprimir" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
												</form>
											</th>
										</tr>
									</tbody>
								</table>
								<br>
								<table>

								<?php $programacion = TraeProgramaciones($con, $v['id_reconduccion_actividades'])?>
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
									<?php foreach($programacion as $q):?>

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
										<?php endforeach?>
									</tbody>
								</table>
							</div>
							<br>
						<?php endforeach?>
					</div>
				</div>
			</div>

		<?php endif ?>
	<?php endif ?>  <!-- Aqui terminamos el area de reconducciones realizadas -->

	<?php 
	if(!$_POST): //Primera etapa, primero hay que elegir el indicador a reconducir
        $indicadores = TraeIndicadores($con, $dep);
		?> 
		<br>
		<h3 class="mb-2 center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nueva Reconducción de Indicadores</h3>
		<br>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3">
                        #
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Nombre Indicador
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Variables    
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Unidad de Medida
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Frecuencia
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Anual
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Accion
                    </th>

                </tr>
            </thead>
            <tbody>
        <?php $i=1; ?>
        <?php foreach( $indicadores as $datos ): ?>

            <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $i++;?>
                </th>
                <td class="px-2 py-4">
                    <?= $datos['nombre_indicador'];?>
                </td>
                <td class="px-2 py-4" align="left">
                    <?= "- " . $datos['variable_a'] . "<br>"?>
                    <?= "- " . $datos['variable_b']?>
                    <?php if($datos['variable_c']){
                        print "<br>- " . $datos['variable_c'];
                    }?>
                </td>
                <td class="px-2 py-4">
                    <?= $datos['umedida_a'] . "<br>"?>
                    <?= $datos['umedida_b']?>
                    <?php if($datos['umedida_c']){
                        print $datos['umedida_c'];
                    }?>
                </td>
                <td class="px-2 py-4">
                    <?= $datos['periodicidad'];?>
                </td>

                <td class="px-2 py-4">
                    <?php print $datos['at1'] + $datos['at2'] + $datos['at3'] + $datos['at4'] . "<br>" . $datos['bt1'] + $datos['bt2'] + $datos['bt3'] + $datos['bt4']; 
                        if($datos['ct1']){
                            print "<br>" . $datos['at1'] + $datos['at2'] + $datos['at3'] + $datos['at4'];
                        }
                    ?>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id_indicador" value="<?= $datos['id'] ?>">
                        <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-xs px-3 py-2 mb-2 my-3 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Reconducir</button>
                    </form>
                </td>

            </tr>


        <?php endforeach ?> 
        </tbody>
    </table>

		
	<?php 
	endif;
	?>
 
 <!-- Aqui comienza el codigo cuando estamos ya en la reconduccion. -->

	<?php 
	if($_POST && !isset($_POST['id_indicador'])):
		unset($_POST);
	?>
		<script>
			window.location.href = 'reconduccion_indicadores.php';
		</script>
	<?php endif?>

		<?php if(isset($_POST['id_indicador'])): //Hacemos la verificacion de se pasan actividades a reconducir


			
			$id_indicador = $_POST['id_indicador'];
			$data = TraeDatosIndicador($con, $id_indicador);
			$id_dependencia = $data['id_dependencia'];
			$encargados = TraeEncargados($con, $id_indicador, $id_dependencia);

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
								<a href="mis_areas.php" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Registrar Nombres</a>
								
							</div>
						</div>
					</div>
				</div>
			<?php
			die(); 
		endif; ?> 
			<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
				<form action="models/reconduccioni_modelo.php" method="post">
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
							<input type="hidden" name="dep_general" value="<?= $data['clave_dependencia'] ?>">
							<input type="hidden" name="dep_aux" value="<?= $data['clave_dependencia_auxiliar']?>">
							<input type="hidden" name="programa_p" value="<?= $data['codigo_programa'] ?>">
							<input type="hidden" name="objetivo_pp" value="<?= $data['objetivo_pp'] ?>">
							<input type="hidden" name="proyecto" value="<?= $data['codigo_proyecto'] ?>">
							<input type="hidden" name="proyecto_name" value="<?= $data['codigo_proyecto'] ?>">
							<input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
						</tr>
					</tbody>
				</table>
				<br> 
<!-- Aqui imprimimos la tabla donde nos permitira visualizar la programacion y los posibles cambios -->
                Programación Actual:

                <?php print '<pre>';
                var_dump($data); ?>
             
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-4">
                                Nombre Indicador
                            </th>
                            <th class="px-6 py-4">
                                Variables
                            </th>
                            <th class="px-6 py-4">
                                Unidad de Medida
                            </th>
                            <th class="px-6 py-4">
                                Tipo
                            </th>
                            <th class="px-6 py-4">
                                1er Trimestre
                            </th>
                            <th class="px-6 py-4">
                                2do Trimestre
                            </th>
                            <th class="px-6 py-4">
                                3er Trimestre
                            </th>
                            <th class="px-6 py-4">
                                4to Trimestre
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <input type="hidden" name="id_indicador" value="<?= $data['id'] ?>">
                            <input type="hidden" name="nombre_indicador" value="<?= $data['nombre_indicador'] ?>">
                            <td class="px-2 py-2">
                                <?= $data['nombre_indicador'] ?>
                            </td>
                            <td class="px-2 py-2">
                                <?= $data['variable_a'] . "<br>" . $data['variable_b'] . "<br>" . $data['variable_c'] ?> 
                            </td>
                            <td class="px-2 py-2"> 
                                <input type="text" name="umedida_a" id="umedida_a" value="<?= $data['umedida_a'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <input type="text" name="umedida_b" id="umedida_b" value="<?= $data['umedida_b'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php if($data['umedida_c']):?>
                                    <input type="text" name="umedida_c" id="umedida_c" value="<?= $data['umedida_c'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php endif?>
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="tipo_op_a" id="tipo_op_a" value="<?= $data['tipo_op_a'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <input type="text" name="tipo_op_b" id="tipo_op_b" value="<?= $data['tipo_op_b'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php if($data['tipo_op_c']):?>
                                    <input type="text" name="tipo_op_c" id="tipo_op_c" value="<?= $data['tipo_op_c'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php endif?>
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="at1" id="at1" value="<?= $data['at1'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <input type="text" name="bt1" id="bt1" value="<?= $data['bt1'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php if($data['bt1']):?>
                                    <input type="text" name="ct1" id="ct1" value="<?= $data['ct1'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php endif?>
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="at2" id="at2" value="<?= $data['at2'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <input type="text" name="bt2" id="bt2" value="<?= $data['bt2'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php if($data['tipo_op_c']):?>
                                    <input type="text" name="ct2" id="ct2" value="<?= $data['ct2'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php endif?>
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="at3" id="at3" value="<?= $data['at3'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <input type="text" name="bt3" id="bt3" value="<?= $data['bt3'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php if($data['bt3']):?>
                                    <input type="text" name="ct3" id="ct3" value="<?= $data['ct3'] ?>" placeholder="Variable A" required <?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "disabled" : "" ?> class="<?php echo $disable = ($data['periodicidad'] == 'Semestral' || $data['periodicidad'] == 'Anual') ? "block cursor-not-allowed " : "" ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php endif?>
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="at4" id="at4" value="<?= $data['at4'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <input type="text" name="bt4" id="bt4" value="<?= $data['bt4'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php if($data['tipo_op_c']):?>
                                    <input type="text" name="ct4" id="ct4" value="<?= $data['ct4'] ?>" placeholder="Variable A" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>
                                <?php endif?>
                            </td>
                        </tr>
                        <tr>
                            
                        </tr>
                        <br>
                        <br>
                    </tbody>
                </table>

                <div class="relative overflow-x-auto">
                <br>    
                
                </div>


					<input type="submit" value="Solicitar Reconducción" name="reconduccionindicadores" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
}else{
	?>
    <script>
    window.location.href = 'login.php';
    </script>
<?php
}
?>

