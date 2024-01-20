<?php
require_once 'models/conection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Parap2</title>
</head>

<body>
	<?php
	$consulta = "SELECT * FROM ante_indicadores_uso";

	$stm = $con->query($consulta);
	$indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);

	function eliminarElemento($array, $elemento)
	{
		return array_values(array_diff($array, [$elemento]));
	}


	function buscaActividadesi($con, $id_actividad)
	{
		$stm = $con->query("SELECT * FROM ante_actividades WHERE id_actividad = $id_actividad");
		$actividad = $stm->fetch(PDO::FETCH_ASSOC);
		if ($actividad) {
			return $actividad;
		} else {
			return null;
		}
	}


	foreach ($indicadores as $i) {
		if ($i['tipo'] == "Estratégico") {

			print $i['nombre_indicador'];
			print '<br>';
		}
	}

	print '<br>';
	print '<br>';

	foreach ($indicadores as $i) {
		if ($i['tipo'] == "Estratégico") {
			if ($i['actividades_ids'] != '') {

				$arry = json_decode($i['actividades_ids']);
				if (in_array("Seleccione las Actividades", $arry)) {
					$arry = eliminarElemento($arry, "Seleccione las Actividades");
				}
				if ($arry) {
					print $i['nombre_indicador'] . ':<br> ' . $i['formula'] . "<br>";
					if (count($arry) > 1) {
						foreach ($arry as $a) {
							print buscaActividadesi($con, $a)['nombre_actividad'] . "<br>";
						}
					} else {
						if (buscaActividadesi($con, $arry[0])['nombre_actividad']) {
							print buscaActividadesi($con, $arry[0])['nombre_actividad'];
						}
					}
					print "<br><br>";
				}
			}
		}
	} ?>

</body>

</html>