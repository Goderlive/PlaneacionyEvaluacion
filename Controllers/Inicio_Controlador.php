<?php
require_once 'models/inicio_modelo.php';

function controllerrevisaDependencias($session, $con){
	if($session['nivel'] == 1){
		if(revisaDependencias($con, $session['anio'])){
			return true;
		}
	}
}

function verificaFuat($con, $permiso){
	if (date('Y') != $_SESSION['anio']) {
		return false;
	}

	if($permiso['id_dependencia']){
		if (date('Y') == $_SESSION['anio']) {
			$mes = date('m') - 1;
			$trimestre = ceil($mes/3);
			$mes_permitido = (($trimestre*3) + 1);
			$mes_top = $trimestre * 3;
			$mes_down = $mes_top - 2;
			if((CuentaAvancesFUAT($con, $permiso['id_dependencia'], $mes_down, $mes_top) == CuentaActividadesFUAT($con, $permiso['id_dependencia'])) && (CuentaActividadesIndFUAT($con, $permiso['id_dependencia'], $trimestre) == CuentaAvancesIndFUAT($con, $permiso['id_dependencia'], $trimestre))){
				return TRUE;
			}
		}else{
			$mes_down = 10;
			$mes_top = 12;
			$trimestre = 4;
			if((CuentaAvancesFUAT($con, $permiso['id_dependencia'], $mes_down, $mes_top) == CuentaActividadesFUAT($con, $permiso['id_dependencia'])) && (CuentaActividadesIndFUAT($con, $permiso['id_dependencia'], $trimestre) == CuentaAvancesIndFUAT($con, $permiso['id_dependencia'], $trimestre))){
				return TRUE;
			}
		}
	}
}


function revisainconsistencias($con){
	if($inconsisitencia = traeinconsistencias($con)){
		$txttoreturn = "";
		foreach($inconsisitencia as $incon){
			$txttoreturn .= '
			<div id="alert-Actividades" class="flex p-4 mb-4 bg-yellow-100 rounded-lg dark:bg-yellow-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-yellow-700 dark:text-yellow-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<div class="ml-3 text-sm font-medium text-yellow-700 dark:text-yellow-800">
					Tienes Inconsistencias en la DB en la actividad '.$incon['id_actividad'].'
				</div>
			</div>';
		}
		return $txttoreturn;
	}
}

function revisainconsistenciasi($con){
	if($inconsisitencia = traeinconsistenciasi($con)){
		$txttoreturn = "";
		foreach($inconsisitencia as $incon){
			$txttoreturn .= '
			<div id="alert-Actividades" class="mt-4 flex p-4 mb-4 bg-yellow-100 rounded-lg dark:bg-yellow-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-yellow-700 dark:text-yellow-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<div class="ml-3 text-sm font-medium text-yellow-700 dark:text-yellow-800">
					Tienes Inconsistencias en la DB en Indicadores '.$incon['id_avance'].'
				</div>
			</div>';
		}
		return $txttoreturn;
	}
}


function AlertaAvancesIndicadores($con){
	if(VerificaAvancesIndicadores($con)){
		return '
			<div id="alert-Indicadores" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
					Tienes Avances de <b>Indicadores</b> pendientes de revisión <a href="revisa_avances.php?type=indicadores" class="justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"> Revisar </a>
				</div>
				<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-Indicadores" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</div>';
	}
}


function AlertaReconduccionIndicadores($con){
	if(VerificaReconduccionesIndicadores($con)){
		return '
			<div id="alert-Indicadores" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
					Tienes <b>Reconducciones</b> de <b>Indicadores</b> pendientes de revisión <a href="revisa_reconducciones.php?type=indicadores" class="justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"> Validar </a>
				</div>
				<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-Indicadores" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</div>';
	}
}



?>