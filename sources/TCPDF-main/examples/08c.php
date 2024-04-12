<?php
session_start();
if($_SESSION['sistema'] != "pbrm" || !isset($_POST['trimestre'])){
	header("Location: ../../../formatos_actividades.php");
	die();
}
$id_area = $_POST['id_area'];
$trimestre = $_POST['trimestre'];
$anio = $_SESSION['anio'];
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Dirección de Gobierno por Resultados');
$pdf->setTitle('Formato Avances Trimestrales');
$pdf->setSubject('Formato Avances Trimestrales');
$pdf->setKeywords('08c, avance, trimestral');

// ---------------------------------------------------------
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set font
$pdf->setFont('helvetica', '', 10);

// add a page
$pdf->AddPage();


//****************************************** Area de Dependencia General y Demas ****************************************** 
$stm = $con->query("SELECT d.* , 
a.*, 
da.*,
py.*,
pp.*,
dg.id_dependencia as id_dependencia_general, dg.clave_dependencia, dg.nombre_dependencia_general
FROM dependencias d
JOIN areas a ON a.id_dependencia = d.id_dependencia
JOIN proyectos py ON py.id_proyecto = a.id_proyecto
JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
JOIN dependencias_generales dg ON a.id_dependencia_general = dg.id_dependencia
JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = a.id_dependencia_aux
WHERE a.id_area = $id_area");
$dependencia = $stm->fetch(PDO::FETCH_ASSOC);  // Dependencia (Nombre organigrama), y Nombre del Area



// ******************************************  FIN ******************************************  


// ******************************************  Area de Titulares y Extras ****************************************** 
$id_dependencia =$dependencia['id_dependencia'];

$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$titular_dependencia = $stm->fetch(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM setings WHERE year_report = $anio");
$setings = $stm->fetch(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM titulares WHERE id_area = $id_area ");
$titular_area = $stm->fetch(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM localidades");
$localidades = $stm->fetchAll();


$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$Director_gobierno_por_resultados = $stm->fetch(PDO::FETCH_ASSOC);


$stmset = $con->query("SELECT * FROM setings");
$logos = $stmset->fetch(PDO::FETCH_ASSOC);



// ******************************************  FIN ****************************************** 

function Sumador($data, $trimestre){
	if ($trimestre != 0){
		$thismes = substr($trimestre, 0,1);
		if($thismes == 1){
			$narray = array();
			array_push($narray, $data['enero'], $data['febrero'], $data['marzo']); 
			$data = $narray;
		}
		if($thismes == 2){
			$narray = array();
			array_push($narray, $data['abril'], $data['mayo'], $data['junio']);
			$data = $narray;
		}
		if($thismes == 3){
			$narray = array();
			array_push($narray, $data['julio'], $data['agosto'], $data['septiembre']); 
			$data = $narray;
		}
		if($thismes == 4){
			$narray = array();
			array_push($narray,  $data['octubre'], $data['noviembre'], $data['diciembre']); 
			$data = $narray;
		}
	}
	$sum = 0;
	foreach($data as $d){
		$sum += $d;
	}
	return $sum;
}


function QueTrimestreEs($trimestre){
	if($trimestre == "1er" || $trimestre == "1"){
		$inicio = 1;
		$fin = 3;
	}
	if($trimestre == "2do" || $trimestre == "2"){
		$inicio = 4;
		$fin = 6;
	}
	if($trimestre == "3er" || $trimestre == "3"){
		$inicio = 7;
		$fin = 9;
	}
	if($trimestre == "4to" || $trimestre == "4"){
		$inicio = 10;
		$fin = 12;
	}
	$data = array($inicio, $fin);
	return $data;
}

function TrimestreNombreCompleto($trimestre){
	if($trimestre == "1er" || $trimestre == "1"){
		return "PRIMER TRIMESTRE";
	}
	if($trimestre == "2do" || $trimestre == "2"){
		return "SEGUNDO TRIMESTRE";
	}
	if($trimestre == "3er" || $trimestre == "3"){
		return "TERCER TRIMESTRE";
	}
	if($trimestre == "4to" || $trimestre == "4"){
		return "CUARTO TRIMESTRE";
	}
	return "TRIMESTRE";
}


function BuscaAvances($con, $actividad, $trimestre){
	$trimestre = QueTrimestreEs($trimestre);
	$stm = $con->query("SELECT SUM(avance) FROM avances  
	WHERE id_actividad = $actividad AND mes > $trimestre[0] - 1 AND mes < $trimestre[1]+ 1 AND validado = 1");
	$avances = $stm->fetch(PDO::FETCH_ASSOC);
	$avances = $avances['SUM(avance)'];
	return $avances;
}

function BuscaAvancesAcumulados($con, $actividad, $trimestre){
	$id_actividad = $actividad['id_actividad'];
	$trimestre = QueTrimestreEs($trimestre);
	$stm = $con->query("SELECT SUM(avance) FROM avances  
	WHERE id_actividad = $id_actividad AND mes < $trimestre[1]+ 1 AND validado = 1");
	$avances = $stm->fetch(PDO::FETCH_ASSOC);
	$avances = $avances['SUM(avance)'];
	return $avances;
}


function SumadorAcumulado($programacion, $trimestre){
	$mes = QueTrimestreEs($trimestre);
	$programacion = array_slice($programacion, 0, $mes[1]);
	return Sumador($programacion, 0);
}



$cols = '';
$stm = $con->query("SELECT * FROM actividades a 
LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
WHERE id_area = $id_area ");
$actividades = $stm->fetchAll(PDO::FETCH_ASSOC);


function calcularPorcentaje($numerador, $denominador) {
	if ($denominador != 0) {
	  return intval(($numerador / $denominador) * 100);
	} else {
	  return "N/A";
	}
  }
foreach($actividades as $actividad){
	$programacionAnual = array_slice($actividad, 15,-1);
	$sumaAnual = Sumador($programacionAnual,0);
	$metaTrimestral = Sumador($programacionAnual, $trimestre);
	$alcanzadoTrimestre = BuscaAvances($con, $actividad['id_actividad'], $trimestre);
	$programadoAcomulado = SumadorAcumulado($programacionAnual, $trimestre);
	$acumuladoAvances = BuscaAvancesAcumulados($con, $actividad, $trimestre);

	// condiciones de ceros
	
	  
	  $porcentajetrimestral = calcularPorcentaje($metaTrimestral, $sumaAnual);
	  $avancetromestreprocentaje = calcularPorcentaje($alcanzadoTrimestre, $sumaAnual);
	  $porcentajediferenciatrimestral = calcularPorcentaje($alcanzadoTrimestre - $metaTrimestral, $sumaAnual);
	  $porcentajealcanzadoacumuladotrimestral = calcularPorcentaje($programadoAcomulado, $sumaAnual);
	  $porcentajealcanzadoacumuladoanual = calcularPorcentaje($acumuladoAvances, $sumaAnual);
	  $porcentajealcanzadoacumuladoanualdiferencia = calcularPorcentaje($acumuladoAvances - $programadoAcomulado, $sumaAnual);
	  

	$cols .= 
		'<tr>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$actividad['codigo_actividad'].'</td>
			<td style="text-align: left; border:1px solid gray; font-size: 6px">'.$actividad['nombre_actividad'].'</td>
			<td style="text-align: left; border:1px solid gray; font-size: 6px">'.$actividad['unidad'].'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$sumaAnual.'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$metaTrimestral.'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $porcentajetrimestral .'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$alcanzadoTrimestre.'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$avancetromestreprocentaje.'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'.intval($alcanzadoTrimestre - $metaTrimestral).'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $porcentajediferenciatrimestral.'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $programadoAcomulado .'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $porcentajealcanzadoacumuladotrimestral .'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $acumuladoAvances .'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $porcentajealcanzadoacumuladoanual .'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. ($acumuladoAvances - $programadoAcomulado) .'</td>
			<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $porcentajealcanzadoacumuladoanualdiferencia .'</td>
		</tr>
	';
}





$trimestreNombre = TrimestreNombreCompleto($trimestre);

$membretes = '
<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 15%; text-align: center;" rowspan="3"><img src="../../../'.$logos['path_logo_ayuntamiento'].'" height="70"/></td>
      <td style="width: 67%; text-align: center;">SISTEMA DE COORDINACION HACENDARIA DEL ESTADO DE MEXICO CON SUS MUNICIPIOS</td>
      <td style="width: 18%; text-align: center;" rowspan="3"><img src="../../../'.$logos['path_logo_administracion'].'" width="100px"/></td>
    </tr>
    <tr>
      <td style="text-align: center">GUIA METODOLOGICA PARA EL SEGUIMIENTO Y EVALUACIÓN DEL PLAN DE DESARROLLO MUNICIPAL VIGENTE</td>
    </tr>
    <tr>
      <td style="text-align: center;">&nbsp; <br> Presupuesto Basado en Resultados Municipal</td>
    </tr>
  </tbody>
</table>
';


$html = $membretes . '
<table style="width:100%">
  <tr>
    <td style="width:35%">
		&nbsp;<br>
		<table style="width:100%; border:1px solid gray;">
			<tr>
				<td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; <br> PbRM 08c</td>
				<td style="width:60%; text-align: center; font-size: 8px">AVANCE TRIMESTRAL DE METAS DE ACCION POR PROYECTO</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center; border:1px solid gray; font-size: 8px"> '. $trimestreNombre.' </td> 
			</tr>
			<tr>
				<td style="width:60%; text-align: center; border:1px solid gray; font-size: 8px">ENTE PUBLICO: '. $logos['nombre_ente'] .' </td> 
				<td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">No.: '. $logos['numero_ente'] .'</td> 
			</tr>
		</table>
	
	</td>
	<td style="width:65%">
		<table style="width:100%;">
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Dependencia </td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'.$dependencia['id_dependencia'].'</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia'].'</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Área</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['id_area'].'</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_area'].'</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Dependencia General</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['clave_dependencia'].'</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia_general'].'</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Dependencia Auxiliar</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['clave_dependencia_auxiliar'].'</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia_auxiliar'].'</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Programa</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['codigo_programa'].'</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_programa'].'</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Proyecto</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['codigo_proyecto'].'</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_proyecto'].'</td>
			</tr>
		</table>
	</td>
  </tr>
</table>

&nbsp;
<br>





<table style="width:100%; padding: 1px;">
	<tr>
		<td colspan="4" style="width:46%; text-align: center; border:1px solid gray; font-size: 8px">Principales Acciones</td>
		<td colspan="6" style="width:27%; text-align: center; border:1px solid gray; font-size: 8px">Avance Trimestral de Metas de Actividad</td>
		<td colspan="6" style="width:27%; text-align: center; border:1px solid gray; font-size: 8px">Avance Acumulado Anual de Metas de Actividad</td>
	</tr>
	<tr>
		<td rowspan="2" style="width:2%; text-align: center; border:1px solid gray; font-size: 9px">ID</td>
		<td rowspan="2" style="width:35%; text-align: left; border:1px solid gray; font-size: 9px">Nombre de la Meta de Actividad</td>
		<td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Prog Anual</td>
		<td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Programada</td>
		<td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Alcanzada</td>
		<td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Variación</td>
		<td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Programada</td>
		<td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Alcanzada</td>
		<td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Variación</td>
	</tr>
	<tr>
		<td style="width:6%; text-align: center; border:1px solid gray; font-size: 7px">Unidad de Medida</td>
		<td style="width:3%; text-align: center; border:1px solid gray; font-size: 7px">Programado '. $dependencia['anio'] .'</td>
		<td style="width:6%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:3%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:6%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:3%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:6%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:3%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:6%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:3%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:6%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:3%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:6%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:3%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
	</tr>'.
		$cols.'
</table>

&nbsp; <br>

<table style="width: 100%; text-align: center; border-spacing: 3px; keep-together:always;" nobr="true">
	<tr>
		<td style="font-size: 8px; width: 33%; border: 1px solid gray;"> ELABORÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;' . strtoupper($titular_area['gradoa']) . " " . strtoupper($titular_area['nombre']) . " " . strtoupper($titular_area['apellidos']) . "<br>" . strtoupper($titular_area['cargo']) . '</td>
		<td style="font-size: 8px; width: 33%; border: 1px solid gray;"> REVISÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;' . strtoupper($titular_dependencia['gradoa']) . " " . strtoupper($titular_dependencia['nombre']) . " " . strtoupper($titular_dependencia['apellidos']) . "<br>" . strtoupper($titular_dependencia['cargo']) . '</td>
		<td style="font-size: 8px; width: 33%; border: 1px solid gray;"> AUTORIZÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;' . strtoupper($Director_gobierno_por_resultados['gradoa']) . " " .strtoupper($Director_gobierno_por_resultados['nombre']) . " " . strtoupper($Director_gobierno_por_resultados['apellidos']) . "<br>" . strtoupper($Director_gobierno_por_resultados['cargo']) . '</td>
	</tr>	
</table>
';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');




// ================================================== Aqui comienza la pagina 2 ===================================


//Lo primero que haremos es la sentencia SQL para traer los datos.
$sqlmag = "SELECT * FROM actividades ac
JOIN lineasactividades la ON la.id_actividad = ac.id_actividad 
LEFT JOIN pdm_lineas pl ON pl.id_linea = la.id_linea
LEFT JOIN pdm_estrategias pe ON pe.id_estrategia = pl.id_estrategia
LEFT JOIN pdm_objetivos po ON po.id_objetivo = pe.id_objetivo
LEFT JOIN areas ar ON ar.id_area = ac.id_area
LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
LEFT JOIN programaciones pg ON pg.id_actividad = ac.id_actividad
WHERE ar.id_area = $id_area
ORDER BY po.clave_objetivo ASC,
CAST(REPLACE(po.clave_objetivo, 'O', '') AS SIGNED) ASC
";

$stmmag = $con->query($sqlmag);
$seguimiento = $stmmag->fetchAll(PDO::FETCH_ASSOC);


if($seguimiento): // Condicion de cumplimiento lineas de acción.
$pdf->AddPage('L', 'LETTER');



function QueTrimestreEs2($trimestre){
	if($trimestre == "1er" || $trimestre == "1"){
		return 1;
	}
	if($trimestre == "2do" || $trimestre == "2"){
		return 2;
	}
	if($trimestre == "3er" || $trimestre == "3"){
		return 3;
	}
	if($trimestre == "4to" || $trimestre == "4"){
		return 4;
	}
}


function BuscaAvances2($con, $actividad, $trimestre, $localidades){
	$trimestre = QueTrimestreEs($trimestre);
	$stm = $con->query("SELECT * FROM avances  
	WHERE id_actividad = $actividad AND mes > $trimestre[0] - 1 AND mes < $trimestre[1]+ 1 AND validado = 1
	ORDER BY mes");
	$avances = $stm->fetchAll(PDO::FETCH_ASSOC);
	$todasLocalidades = "";
	$todosbeneficiarios = "";
	$todosrecursos = "";
	$porcentaje = 0;
	$i= 0;
	foreach($avances as $a){
		$i += 1;
		if($a['localidades']){
			$thislocalidades = explode("," ,$a['localidades']);
			$local = "Mes " . $i . ": ";
			foreach($thislocalidades as $tl){
				$local .= $localidades[$tl -1]['nombre_localidad'] . ", ";
			}
		}else{
			$local = "";
		}
		$todasLocalidades .= $local . "<br>";
		$todosbeneficiarios .= $a['beneficiarios']. "<br>";
		$todosrecursos .= $a['recursos'] . "<br>";
		$porcentaje += $a['avance'];
	}
	$arrmag = array();
	array_push($arrmag, $todasLocalidades,$todosbeneficiarios,$todosrecursos, $porcentaje);
	return $arrmag;
}




$magg = "";

$membretesmagg = '
<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 15%" rowspan="3"><img src="./img/pdm.png" height="70"/></td>
      <td style="width: 67%; text-align: center"></td>
      <td style="width: 18%;text-align: center " rowspan="3"><img src="../../../'.$logos['path_logo_administracion'].'" width="100px"/></td>
    </tr>
    <tr>
      <td style="text-align: center"><br>Informe de Acciones y Resultados de la Ejecución del Plan de Desarrollo Municipal</td>
    </tr>
    <tr>
      <td style="text-align: center;">Descripción de acciones y metas alcanzadas en el '. $trimestre .' Trimestre </td>
    </tr>
  </tbody>
</table>
<table style="width:100%; padding: 2px;">
		<tr>
			<td style="width:12%; text-align: right; font-size: 8px">Dependencia </td>
			<td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'.$dependencia['id_dependencia'].'</td>
			<td style="width:28%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia'].'</td>

			<td style="width:12%; text-align: right; font-size: 8px">Área</td>
			<td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['id_area'].'</td>
			<td style="width:28%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_area'].'</td>
		</tr>
		<tr>
			<td style="width:12%; text-align: right; font-size: 8px">Dependencia General</td>
			<td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['clave_dependencia'].'</td>
			<td style="width:28%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia_general'].'</td>

			<td style="width:12%; text-align: right; font-size: 8px">Dependencia Auxiliar</td>
			<td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['clave_dependencia_auxiliar'].'</td>
			<td style="width:28%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia_auxiliar'].'</td>
		</tr>
		<tr>
			<td style="width:12%; text-align: right; font-size: 8px">Programa</td>
			<td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['codigo_programa'].'</td>
			<td style="width:28%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_programa'].'</td>

			<td style="width:12%; text-align: right; font-size: 8px">Proyecto</td>
			<td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['codigo_proyecto'].'</td>
			<td style="width:28%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_proyecto'].'</td>
		</tr>
</table>
&nbsp; <br>

';
$magg .= $membretesmagg;
        
    
$tabseg = '
<table style="width:100%;">
    <thead>
        <tr>
            <th style="width:4%; text-align: center; border:1px solid gray; font-size: 8px"><b>Obj. </b></th>
            <th style="width:4%; text-align: center; border:1px solid gray; font-size: 8px"><b>Estr. </b></th>
            <th style="width:16%; text-align: center; border:1px solid gray; font-size: 8px"><b>Líneas de acción </b></th>
            <th style="width:7%; text-align: center; border:1px solid gray; font-size: 8px"><b>Área(s) Responsable (s)</b></th>
            <th style="width:16%; text-align: center; border:1px solid gray; font-size: 8px"><b>Acciones realizadas</b></th>
            <th style="width:5%; text-align: center; border:1px solid gray; font-size: 8px"><b>Prog. Trim.</b></th>
            <th style="width:5%; text-align: center; border:1px solid gray; font-size: 8px"><b>Alc. Trim.</b></th>
            <th style="width:5%; text-align: center; border:1px solid gray; font-size: 8px"><b>%</b></th>
            <th style="width:16%; text-align: center; border:1px solid gray; font-size: 8px"><b>Localidad (es) beneficiada (s)</b></th>
            <th style="width:11%; text-align: center; border:1px solid gray; font-size: 8px"><b>Beneficiarios directos</b></th>
            <th style="width:11%; text-align: center; border:1px solid gray; font-size: 8px"><b>Origen de los Recursos públicos aplicados</b></th>
        </tr>
    </thead>
    <tbody>';

foreach($seguimiento as $s){
	$avance = BuscaAvances2($con, $s['id_actividad'], $trimestre, $localidades);
	$thistrimestre = QueTrimestreEs2($trimestre);
	$proganual = $s['enero'] + $s['febrero'] + $s['marzo'] + $s['abril'] + $s['mayo'] + $s['junio'] + $s['julio'] + $s['agosto'] + $s['septiembre'] + $s['octubre'] + $s['noviembre'] + $s['diciembre'];
	if($thistrimestre == 1){
		$progtrimestral = intval($s['enero']) + intval($s['febrero']) + intval($s['marzo']);
	}
	if($thistrimestre == 2){
		$progtrimestral = intval($s['abril']) + intval($s['mayo']) + intval($s['junio']);
	} 
	if($thistrimestre == 3){
		$progtrimestral = intval($s['julio']) + intval($s['agosto']) + intval($s['septiembre']);
	} 
	if($thistrimestre == 4){
		$progtrimestral = intval($s['octubre']) + intval($s['noviembre']) + intval($s['diciembre']);
	} 
	if($avance[3] != 0){
		$porcentajecumplimiento = substr(($avance['3'] / $proganual) *100, 0,5) . "%";
	}else{
		$porcentajecumplimiento = "N/A";
	}

	$tabseg .= '
	<tr>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">'.$s['clave_objetivo'].'</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">'.$s['clave_estrategia'].'</td>
		<td style="width:16%; text-align: center; border:1px solid gray; font-size: 7px">'. $s['clave_linea']. " " .$s['nombre_linea'].'</td>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">'.$s['nombre_dependencia'].'</td>
		<td style="width:16%; text-align: center; border:1px solid gray; font-size: 7px">'.$s['nombre_actividad'].'</td>
		<td style="width:5%; text-align: center; border:1px solid gray; font-size: 7px">'.$progtrimestral.'</td>
		<td style="width:5%; text-align: center; border:1px solid gray; font-size: 7px">'. $avance[3].'</td>
		<td style="width:5%; text-align: center; border:1px solid gray; font-size: 7px">'.$porcentajecumplimiento.'</td>
		<td style="width:16%; text-align: center; border:1px solid gray; font-size: 7px">'.$avance[0].'</td>
		<td style="width:11%; text-align: center; border:1px solid gray; font-size: 7px">'.$avance[1]. '<br>' . $s['udmed'] . '</td>
		<td style="width:11%; text-align: center; border:1px solid gray; font-size: 7px">'.$avance[2].'</td>
	</tr>
	';
}

$firmas = '
&nbsp;
<br>
<table style="width: 100%; text-align: center; border-spacing: 3px; keep-together:always;" nobr="true">
	<tr>
		<td style="font-size: 8px; width: 34%; border: 1px solid gray;"> ELABORÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. strtoupper($titular_area['gradoa']) . " " . strtoupper($titular_area['nombre']) . " " . strtoupper($titular_area['apellidos']) . "<br>" . strtoupper($titular_area['cargo']) . '</td>
		<td style="font-size: 8px; width: 34%; border: 1px solid gray;"> REVISÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. strtoupper($titular_dependencia['gradoa']) . " " . strtoupper($titular_dependencia['nombre']) . " " . strtoupper($titular_dependencia['apellidos']) . "<br>" . strtoupper($titular_dependencia['cargo']) . '</td>
		<td style="font-size: 8px; width: 32%;"> </td>
	</tr>	
</table>
';

$tabseg .= "</tbody>
</table>";

$magg .= $tabseg . $firmas;

$pdf->writeHTML($magg, true, false, true, false, '');
endif; // If de seguimiento

// ================================================== Aqui comienza la pagina 3 ===================================

$pdf->AddPage('P', 'LETTER');


// ================== Obtenemos las evidencias ==================
try {

	$mestres = QueTrimestreEs($trimestre)[1];
	$mesdos = $mestres -1;
	$mesuno = $mesdos -1;

	$meses = array();


	$sql = "SELECT * FROM avances e 
	LEFT JOIN actividades ac ON e.id_actividad = ac.id_actividad
	LEFT JOIN areas a ON a.id_area = ac.id_area
	WHERE e.path_evidenia_evidencia IS NOT NULL AND a.id_area = $id_area AND (e.mes = $mesuno OR e.mes = $mesdos OR e.mes = $mestres)
	ORDER BY ac.codigo_actividad ASC, e.mes ASC";

	$sql = "SELECT * FROM actividades ac
	LEFT JOIN areas ar ON ar.id_area = ac.id_area
	WHERE ar.id_area = $id_area
	ORDER BY ac.codigo_actividad";


	$stm = $con->query($sql);
	$evidencias = $stm->fetchAll(PDO::FETCH_ASSOC);

} catch (\Throwable $th) {
	throw $th;
}

function pideevidencias($con, $id_actividad, $mes){
	$sql = "SELECT av.* FROM avances av
		LEFT JOIN actividades ac ON ac.id_actividad = av.id_actividad
		WHERE av.id_actividad = $id_actividad AND av.mes = $mes";
	$stm = $con->query($sql);
	$evidencia = $stm->fetch(PDO::FETCH_ASSOC);
	return $evidencia;
} 


function meses($trimestre){
	if($trimestre == "1er"){
		return $meses = array(array("1", "2", "3"), array("Enero","Febrero","Marzo"));
	}
	if($trimestre == "2do"){
		return $meses = array(array("4", "5", "6"), array("Abril","Mayo","Junio"));
	}
	if($trimestre == "3er"){
		return $meses = array(array("7", "8", "9"), array("Julio","Agosto","Septiembre"));
	}
	if($trimestre == "4to"){
		return $meses = array(array("10", "11", "12"), array("Octubre","Noviembre","Diciembre"));
	}
}



function TablaEvidencias($evidencias, $trimestre, $con){
	$meses = meses($trimestre);
	$data = '
	<tr>
		<td style="width:34%; text-align: left; font-size: 8px; border: 1px solid gray;">Actividad</td>
		<td style="width:22%; text-align: left; font-size: 8px; border: 1px solid gray;">'.$meses[1][0].'</td>
		<td style="width:22%; text-align: left; font-size: 8px; border: 1px solid gray;">'.$meses[1][1].'</td>
		<td style="width:22%; text-align: left; font-size: 8px; border: 1px solid gray;">'.$meses[1][2].'</td>
	</tr>
	';
	foreach($evidencias as $a){ // Aunque se llama evidencias, en realidad trae las actividades.

		

		$mes1 = pideevidencias($con, $a['id_actividad'], $meses[0][0]);
		$imagen1 = ($mes1['path_evidenia_evidencia'] != '' ? '<img src="../../'  . $mes1['path_evidenia_evidencia'].'" alt="" width="80px"> <br>' : '');
		$mes2 = pideevidencias($con, $a['id_actividad'], $meses[0][1]);
		$imagen2 = ($mes2['path_evidenia_evidencia'] != '' ? '<img src="../../'  . $mes2['path_evidenia_evidencia'].'" alt="" width="80px"> <br>' : '');
		$mes3 = pideevidencias($con, $a['id_actividad'], $meses[0][2]);
		$imagen3 = ($mes3['path_evidenia_evidencia'] != '' ? '<img src="../../'  . $mes3['path_evidenia_evidencia'].'" alt="" width="80px"> <br>' : '');


		$data .= '
		<tr> 
			<td style="width:34%; text-align: left; font-size: 6px; border: 1px solid gray;">'. $a['codigo_actividad'] . ". ".  $a['nombre_actividad'] .'</td> 
			<td style="width:22%; text-align: left; font-size: 6px; border: 1px solid gray;">'.$imagen1.'<br>' . substr($mes1['path_evidenia_evidencia'], 23,) .'</td> 
			<td style="width:22%; text-align: left; font-size: 6px; border: 1px solid gray;">'.$imagen2.'<br>' . substr($mes2['path_evidenia_evidencia'], 23,) .'</td> 
			<td style="width:22%; text-align: left; font-size: 6px; border: 1px solid gray;">'.$imagen3.'<br>' . substr($mes3['path_evidenia_evidencia'], 23,) .'</td>  
		</tr>';

	}



	
	return $data;	
}


$data = "";
$data = TablaEvidencias($evidencias, $trimestre, $con);



$html = '
<head>
<style>
</style>
</head>
<br>
<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 15%" rowspan="3"><img src="images/logo_metepec.jpg" height="70"/></td>
      <td style="width: 67%; text-align: center"><br><br>Reporte de Evidencias correspondiente al '. $trimestreNombre.'</td>
      <td style="width: 18%;text-align: center " rowspan="3"> <img src="../../../'.$logos['path_logo_administracion'].'" width="100px"/></td>
    </tr>
  </tbody>
</table>


<table style="width:100%;">
	<tr>
		<td style="width:30%; text-align: right; font-size: 8px">Dependencia </td>
		<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'.$dependencia['id_dependencia'].'</td>
		<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia'].'</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: right; font-size: 8px">Área</td>
		<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['id_area'].'</td>
		<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_area'].'</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: right; font-size: 8px">Dependencia General</td>
		<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['clave_dependencia'].'</td>
		<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia_general'].'</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: right; font-size: 8px">Dependencia Auxiliar</td>
		<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['clave_dependencia_auxiliar'].'</td>
		<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_dependencia_auxiliar'].'</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: right; font-size: 8px">Programa</td>
		<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['codigo_programa'].'</td>
		<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_programa'].'</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: right; font-size: 8px">Proyecto</td>
		<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'. $dependencia['codigo_proyecto'].'</td>
		<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">'. $dependencia['nombre_proyecto'].'</td>
	</tr>
</table>
&nbsp;
<br>

<table style="width:100%; padding: 3px;">

'.$data.'	

</table>

&nbsp;
<br>
<table style="width: 100%; text-align: center; border-spacing: 3px; keep-together:always;" nobr="true">
	<tr>
		<td style="font-size: 8px; width: 34%; border: 1px solid gray;"> ELABORÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. strtoupper($titular_area['gradoa']) . " " . strtoupper($titular_area['nombre']) . " " . strtoupper($titular_area['apellidos']) . "<br>" . strtoupper($titular_area['cargo']) . '</td>
		<td style="font-size: 8px; width: 34%; border: 1px solid gray;"> REVISÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. strtoupper($titular_dependencia['gradoa']) . " " . strtoupper($titular_dependencia['nombre']) . " " . strtoupper($titular_dependencia['apellidos']) . "<br>" . strtoupper($titular_dependencia['cargo']) . '</td> 
		<td style="font-size: 8px; width: 34%; border: 1px solid gray;"> VALIDÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. strtoupper($Director_gobierno_por_resultados['gradoa']) . " " . strtoupper($Director_gobierno_por_resultados['nombre']) . " " . strtoupper($Director_gobierno_por_resultados['apellidos']) . "<br>" . strtoupper($Director_gobierno_por_resultados['cargo']) . '</td>
		<td style="font-size: 8px; width: 32%;"> </td>
	</tr>	
</table>

';


$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------
$nombrecito = substr($dependencia['nombre_area'], 0,12);
//Close and output PDF document

//$pdf->Output($nombrecito. "_" .$dependencia['clave_dependencia'] . "-" . $dependencia['clave_dependencia_auxiliar'] . "-" . $dependencia['codigo_proyecto'] . "_". $trimestre .' trimestre.pdf', 'D');
$pdf->Output($nombrecito. "_" .$dependencia['clave_dependencia'] . "-" . $dependencia['clave_dependencia_auxiliar'] . "-" . $dependencia['codigo_proyecto'] . "_". $trimestre .' trimestre.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
?>

