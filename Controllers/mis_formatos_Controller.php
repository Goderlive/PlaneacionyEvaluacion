<?php 
require_once 'models/mis_formatos_Model.php';

function verificaFuat($con, $id_dependencia, $trimestre){

	if($trimestre == 1){
		$mes_top = $trimestre = 3;
	}elseif($trimestre == 2){
		$mes_top = $trimestre = 6;
	}elseif($trimestre == 3){
		$mes_top = $trimestre = 9;
	}elseif($trimestre == 4){
		$mes_top = $trimestre = 12;
	}
	$mes_down = $mes_top - 2;
	if((CuentaAvancesFUAT($con, $id_dependencia, $mes_down, $mes_top) == CuentaActividadesFUAT($con, $id_dependencia))){
		return TRUE;
	}

}

?>