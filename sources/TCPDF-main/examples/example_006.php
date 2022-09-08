<?php
session_start();
if($_SESSION['sistema'] != "pbrm" || !isset($_POST['trimestre'])){
	header("Location: ../../../formatos_actividades.php");
	die();
}
$id_area = $_POST['id_area'];
$trimestre = $_POST['trimestre'];
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Dirección de Gobierno por Resultados');
$pdf->setTitle('Formato Avances Trimestrales');
$pdf->setSubject('Este es el mensaje del titulo');
$pdf->setKeywords('08c, avance, trimestral');

// ---------------------------------------------------------
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set font
$pdf->setFont('helvetica', '', 10);

// add a page
$pdf->AddPage();



// **************************** Area de Titulares *****************************************
$stm = $con->query("SELECT * FROM dependencias d
JOIN areas a ON a.id_dependencia = d.id_dependencia
WHERE id_area = $id_area ");
$dependencia = $stm->fetch(PDO::FETCH_ASSOC);

$id_dependencia =$dependencia['id_dependencia'];

$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$titular_dependencia = $stm->fetch(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM titulares WHERE id_area = $id_area ");
$titular_area = $stm->fetch(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM titulares WHERE cargo LIKE '%Gobierno por Resultados%' ");
$Director_gobierno_por_resultados = $stm->fetch(PDO::FETCH_ASSOC);

// **************************** FIN *****************************************


function Sumador($data, $trimestre){
	if ($trimestre != 0){
		$meses = QueTrimestreEs($trimestre);
		$data = array_slice($data,$meses[0]-1, $meses[1]-1);
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


function AgregaMetas($con, $trimestre, $id_area){
	$cols = '';
	$stm = $con->query("SELECT * FROM actividades a 
	LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
	WHERE id_area = $id_area ");
	$actividades = $stm->fetchAll(PDO::FETCH_ASSOC);


	
	foreach($actividades as $actividad){
		$programacionAnual = array_slice($actividad, 14,-1);
		$sumaAnual = Sumador($programacionAnual,0);
		$metaTrimestral = Sumador($programacionAnual, $trimestre);
		$alcanzadoTrimestre = BuscaAvances($con, $actividad['id_actividad'], $trimestre);
		$programadoAcomulado = SumadorAcumulado($programacionAnual, $trimestre);
		$acumuladoAvances = BuscaAvancesAcumulados($con, $actividad, $trimestre);

		$cols .= 
			'<tr>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$actividad['codigo_actividad'].'</td>
				<td style="text-align: left; border:1px solid gray; font-size: 6px">'.$actividad['nombre_actividad'].'</td>
				<td style="text-align: left; border:1px solid gray; font-size: 6px">'.$actividad['unidad'].'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$sumaAnual.'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$metaTrimestral.'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.intval(($metaTrimestral / $sumaAnual) * 100).'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$alcanzadoTrimestre.'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.intval(($alcanzadoTrimestre / $sumaAnual) * 100).'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.intval($alcanzadoTrimestre - $metaTrimestral).'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'.intval((($alcanzadoTrimestre - $metaTrimestral)/$sumaAnual) *100 ).'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $programadoAcomulado .'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'. intval(($programadoAcomulado / $sumaAnual) *100) .'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'. $acumuladoAvances .'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'. intval(($acumuladoAvances / $sumaAnual) *100) .'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'. ($acumuladoAvances - $programadoAcomulado) .'</td>
				<td style="text-align: center; border:1px solid gray; font-size: 6px">'. (($acumuladoAvances - $programadoAcomulado) / $sumaAnual) *100 .'</td>
			</tr>
		';
	}
	return $cols;
}


$cols = AgregaMetas($con, $trimestre, $id_area);



$html = '
<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 18%" rowspan="3"><img src="images/metepec_logoc.jpg"/></td>
      <td style="width: 67%; text-align: center">SISTEMA DE COORDINACION HACENDARIA DEL ESTADO DE MEXICO CON SUS MUNICIPIOS</td>
      <td style="width: 15%;text-align: center " rowspan="3"><img src="images/logo_metepec.jpg" height="70"/></td>
    </tr>
    <tr>
      <td style="text-align: center">GUIA METADOLOGICA PARA EL SEGUIMIENTO Y EVALUACION DEL PLAN DE DESARROLLO MUNICIPAL VIGENTE</td>
    </tr>
    <tr>
      <td style="text-align: center;">&nbsp; <br> Presupuesto Basado en Resultados Municipal</td>
    </tr>
  </tbody>
</table>




<table style="width:100%">
  <tr>
    <td style="width:40%">
		&nbsp;<br>
		<table style="width:100%; border:1px solid gray;">
			<tr>
				<td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; <br> PbRM 08c</td>
				<td style="width:60%; text-align: center; font-size: 8px">AVANCE TRIMESTRAL DE METAS DE ACCION POR PROYECTO</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center; border:1px solid gray; font-size: 8px">PRIMER TRIMESTRE </td> 
			</tr>
			<tr>
				<td style="text-align: center; border:1px solid gray; font-size: 8px">ENTE PUBLICO: METEPEC </td> 
				<td style="text-align: center; border:1px solid gray; font-size: 8px">No.: 0103</td> 
			</tr>
		</table>
	
	</td>
	<td style="width:60%">
		<table style="width:100%;">
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Dependencia </td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Dependencia General</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Dependencia Auxiliar</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Programa</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<td style="width:30%; text-align: right; font-size: 8px">Proyecto</td>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
		</table>
	</td>
  </tr>
</table>

&nbsp;
<br>





<table style="width:100%;">
	<tr>
		<td colspan="4" style="width:34%; text-align: left; border:1px solid gray; font-size: 8px">Principales Acciones</td>
		<td colspan="6" style="width:33%; text-align: left; border:1px solid gray; font-size: 8px">Avance Trimestral de Metas de Actividad</td>
		<td colspan="6" style="width:33%; text-align: left; border:1px solid gray; font-size: 8px">Avance Acumulado Anual de Metas de Actividad</td>
	</tr>
	<tr>
		<td rowspan="2" style="width:2%; text-align: center; border:1px solid gray; font-size: 9px">ID</td>
		<td rowspan="2" style="width:21%; text-align: left; border:1px solid gray; font-size: 9px">Nombre de la Meta de Actividad</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Prog Anual</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Programada</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Alcanzada</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Variación</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Programada</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Alcanzada</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Variación</td>
	</tr>
	<tr>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">U d M</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">Prog</td>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
		<td style="width:7%; text-align: center; border:1px solid gray; font-size: 7px">Meta</td>
		<td style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">%</td>
	</tr>'.
		$cols.'
</table>

&nbsp; <br>

<table style="width: 100%; text-align: center; border-spacing: 3px; ">
	<tr>
		<td style="font-size: 8px; width: 25%; border: 1px solid gray;"> ELABORÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $titular_area['nombre'] . " " . $titular_area['apellidos'] . "<br>" . $titular_area['cargo']. '</td>
		<td style="font-size: 8px; width: 25%; border: 1px solid gray;"> REVISÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $titular_dependencia['nombre'] . " " . $titular_dependencia['apellidos'] . "<br>" . $titular_dependencia['cargo']. '</td>
		<td style="font-size: 8px; width: 25%; border: 1px solid gray;"> AUTORIZÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $Director_gobierno_por_resultados['nombre'] . " " . $Director_gobierno_por_resultados['apellidos'] . "<br>" . $Director_gobierno_por_resultados['cargo']. '</td>
		<td style="font-size: 8px; width: 25%; border: 1px solid gray;"> </td>
	</tr>	
</table>







';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>




