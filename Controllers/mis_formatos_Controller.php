<?php 
require_once 'models/mis_formatos_Model.php';

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
			if((CuentaAvancesFUAT($con, $permiso['id_dependencia'], $mes_down, $mes_top) == CuentaActividadesFUAT($con, $permiso['id_dependencia']))){
				return TRUE;
			}
		}else{
			$mes_down = 10;
			$mes_top = 12;
			$trimestre = 4;
			if((CuentaAvancesFUAT($con, $permiso['id_dependencia'], $mes_down, $mes_top) == CuentaActividadesFUAT($con, $permiso['id_dependencia']))){
				return TRUE;
			}
		}
	}
}

?>