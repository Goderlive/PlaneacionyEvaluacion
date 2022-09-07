<?php


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

function Sumador($data){
	$sum = 0;
	foreach($data as $d){
		$sum += $d;
	}
	return $sum;
}

function BuscaAvances($con, $actividad, $trimestre){
	if($trimestre == 1){
		$inicio = 1;
		$fin = 3;
	}

	$stm = $con->query("SELECT SUM(avance) FROM avances  
	WHERE id_actividad = 134 AND mes > $inicio - 1 AND mes < $fin + 1 AND validado = 1");
	$avances = $stm->fetchAll(PDO::FETCH_ASSOC);
	var_dump($avances);
	return $avances;
}


function AgregaMetas($con){
	$cols = '';
	$stm = $con->query("SELECT * FROM actividades a 
	LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
	WHERE id_area = 134 ");
	$actividades = $stm->fetchAll(PDO::FETCH_ASSOC);


	
	foreach($actividades as $actividad){

		$suma = Sumador(array_slice($actividad, 14,-1));
		$metaTrimestral = Sumador(array_slice($actividad, 14, 3));
		$porcentajeProgramado = ($metaTrimestral / $suma) * 100;
		$alcanzadoTrimestre = BuscaAvances($con, $actividad['id_actividad'], 1);



		$cols .= 
		'<tr>
		<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$actividad['codigo_actividad'].'</td>
		<td style="text-align: left; border:1px solid gray; font-size: 6px">'.$actividad['nombre_actividad'].'</td>
		<td style="text-align: left; border:1px solid gray; font-size: 6px">'.$actividad['unidad'].'</td>
		<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$suma.'</td>
		<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$metaTrimestral.'</td>
		<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$porcentajeProgramado.'</td>
		<td style="text-align: center; border:1px solid gray; font-size: 6px">'.$alcanzadoTrimestre.'</td>

		</tr>
		';
	}
	return $cols;
}


$cols = AgregaMetas($con);


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
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Variaciónn</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Programada</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Alcanzada</td>
		<td colspan="2" style="width:11%; text-align: center; border:1px solid gray; font-size: 8px">Variaciónn</td>
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
	$cols
	.'
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




<table style="width:100%;">
	<tr>
		<td colspan="4" style="width:34%; text-align: left; border:1px solid gray; font-size: 8px">Principales Acciones</td>
		<td colspan="6" style="width:33%; text-align: left; border:1px solid gray; font-size: 8px">Avance Trimestral de Metas de Actividad</td>
		<td colspan="6" style="width:33%; text-align: left; border:1px solid gray; font-size: 8px">Avance Acumulado Anual de Metas de Actividad</td>
	</tr>
	<tr>
		<td rowspan="2" style="width:2%; text-align: center; border:1px solid gray; font-size: 8px">ID</td>
		<td rowspan="2" style="width:21%; text-align: left; border:1px solid gray; font-size: 8px">Nombre de la Meta de Actividad</td>
		<td colspan="2" style="width:11%; text-align: left; border:1px solid gray; font-size: 8px">Prog Anual</td>
		<td colspan="2" style="width:11%; text-align: left; border:1px solid gray; font-size: 8px">Programada</td>
		<td colspan="2" style="width:11%; text-align: left; border:1px solid gray; font-size: 8px">Alcanzada</td>
		<td colspan="2" style="width:11%; text-align: left; border:1px solid gray; font-size: 8px">Variaciónn</td>
		<td colspan="2" style="width:11%; text-align: left; border:1px solid gray; font-size: 8px">Programada</td>
		<td colspan="2" style="width:11%; text-align: left; border:1px solid gray; font-size: 8px">Alcanzada</td>
		<td colspan="2" style="width:11%; text-align: left; border:1px solid gray; font-size: 8px">Variaciónn</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td style="width:5%; text-align: left; border:1px solid gray; font-size: 8px">Prog Anual</td>

	</tr>
</table>
