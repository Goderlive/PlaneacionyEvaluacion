<?php
session_start();
if($_SESSION['sistema'] != "pbrm" || !isset($_POST['id_reconduccion'])){
	header("Location: ../../../formatos_actividades.php");
	die();
}
$id_reconduccion = $_POST['id_reconduccion'];
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Dirección de Gobierno por Resultados');
$pdf->setTitle('Formato de Reconducción de Indicadores');
$pdf->setSubject('Formato de Reconducción de indicadores');
$pdf->setKeywords('Reconduccion, Indicadores');

// ---------------------------------------------------------
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set font
$pdf->setFont('helvetica', '', 8);

// add a page
$pdf->AddPage('P', 'LETTER');


function TraeReconduccion($con, $id_reconduccion){
    $stm = $con->query("SELECT * FROM reconducciones_indicadores WHERE id_reconduccion_indicadores = $id_reconduccion");
    $reconduccion = $stm->fetch(PDO::FETCH_ASSOC);
    return $reconduccion;
}
$reconduccion = TraeReconduccion($con, $id_reconduccion);


function arregladata($data){
    $data = str_replace('"', "", $data);
    $data = str_replace(' ', "", $data);
    $data = explode(",", $data);
    return $data;
}


function Sumador($data){
    $sum = 0;
    foreach ($data as $value) {
        $sum += $value;
    }
    return $sum;
}

function SumaAnual($data){
    $data = arregladata($data);
    $sum = 0;
    foreach ($data as $value) {
        $sum += $value;
    }
    return $sum;
}



$membretes = '
<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 15%" rowspan="3"><img src="images/logo_metepec.jpg" height="50"/></td>
      <td style="width: 67%; text-align: center">SISTEMA DE COORDINACIÓN HACENDARIA DEL ESTADO DE MÉXICO CON SUS MUNICIPIOS<br>FORMATO DE RECONDUCCIÓN DE INDICADORES ESTRATÉGICOS Y/O DE GESTIÓN </td>
      <td style="width: 18%;text-align: center " rowspan="3"><img src="images/metepec_logoc.jpg" height="50"/></td>
    </tr>
  </tbody>
</table>
';

$oficio_movimiento_fecha = '&nbsp;
<br>
	<table class="GeneratedTable" style="width: 100%;">
		<tbody>
		<tr>
			<td style="width: 100%; text-align: left">Tipo de Movimiento: Reconucción Programatica</td>
		</tr>
		<tr>
			<td style="width: 100%; text-align: left">N. Oficio: '.$reconduccion['no_oficio'].'</td>
		</tr>
		<tr>
			<td style="width: 100%; text-align: left">Fecha: '.$reconduccion['fecha'].'</td>
		</tr>
		</tbody>
	</table>
';



$encabezado_gen_aux_etc = ' &nbsp;
	<br>
	<table style="width: 100%; padding: 4px;">
		<thead>
			<tr>
				<td bgcolor="#97d6f7" style="width: 100%; border: 1px solid black; border-collapse: collapse;"><b>Datos de identificación del indicador sujeto a modificación</b></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 100%; border: 1px solid black; border-collapse: collapse;">Dependencia General: '.$reconduccion['dep_general'].'</td> 
			</tr>
			<tr>
				<td style="width: 100%; border: 1px solid black; border-collapse: collapse;">Dependencia Auxiliar: '.$reconduccion['dep_aux'].'</td> 
			</tr>
			<tr>
				<td style="width: 100%; border: 1px solid black; border-collapse: collapse;">Programa: '.$reconduccion['programa_p'].'</td> 
			</tr>
			<tr>
				<td style="width: 100%; border: 1px solid black; border-collapse: collapse;">Objetivo: '. $reconduccion['objetivo'] .'</td> 
			</tr>
			<tr>
				<td style="width: 100%; border: 1px solid black; border-collapse: collapse;">Objetivo: '. $reconduccion['proyecto'] .  ' ' . $reconduccion['proyecto_name'] .'</td> 
			</tr>
		</tbody>
	</table>
	&nbsp;
	<br>
	&nbsp;
	<br>
	<table style="width: 100%; padding: 2px;">
		<thead>
			<tr>
				<td bgcolor="#97d6f7" style="width: 100%; border: 1px solid black; border-collapse: collapse;">Detalle de la modificación del Indicador </td>
			</tr>
	</table>
	
	';



$proginicial_a = explode("|", $reconduccion['programacion_inicial_a']);
$proginicial_b = explode("|", $reconduccion['programacion_inicial_b']);
$proginicial_a = $proginicial_a[0] + $proginicial_a[1] + $proginicial_a[2] + $proginicial_a[3]; 
$proginicial_b = $proginicial_b[0] + $proginicial_b[1] + $proginicial_b[2] + $proginicial_b[3]; 

$id_indicador = $reconduccion['id_indicador'];
$stm = $con->query("SELECT avance_a, avance_b FROM avances_indicadores WHERE id_indicador = $id_indicador");
$avances = $stm->fetchAll(PDO::FETCH_ASSOC);


$progfinal_a = explode("|", $reconduccion['programacion_modificada_a']);
$progfinal_b = explode("|", $reconduccion['programacion_modificada_b']);
$progfinalfinal_a = $progfinal_a[0] + $progfinal_a[1] + $progfinal_a[2] + $progfinal_a[3]; 
$progfinalfinal_b = $progfinal_b[0] + $progfinal_b[1] + $progfinal_b[2] + $progfinal_b[3]; 


$av_a = 0;
$av_b = 0;
foreach($avances as $a){
	$av_a += $a['avance_a'];
	$av_b += $a['avance_b'];
}


$tab1 = ($progfinal_b[0] != 0) ? substr(($progfinal_a[0]/$progfinal_b[0])*100, 0,5) : 0;
$tab2 = ($progfinal_b[1] != 0) ? substr(($progfinal_a[1]/$progfinal_b[1])*100, 0,5) : 0;
$tab3 = ($progfinal_b[2] != 0) ? substr(($progfinal_a[2]/$progfinal_b[2])*100, 0,5) : 0;
$tab4 = ($progfinal_b[3] != 0) ? substr(($progfinal_a[3]/$progfinal_b[3])*100, 0,5) : 0;


$infoReconduccion = '
	<table style="width: 100%; padding: 2px;">
		<thead>
			<tr>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">Nivel de la MIR</td>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 10%; text-align: center; border: 1px solid black; border-collapse: collapse;">Denominación del Indicador</td>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 10%; text-align: center; border: 1px solid black; border-collapse: collapse;">Variables de Indicador </td>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">Unidad de Medida</td>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">Tipo de Operación</td>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">Programación inicial del indicador </td>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">Avance a la fecha </td>
				<td rowspan="2" bgcolor="#D5D5D5" style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">Programación Modificada</td>
				<td bgcolor="#D5D5D5" style="width: 28%; text-align: center; border: 1px solid black; border-collapse: collapse;">Calendarización Trimestral Modificada</td>
			</tr>
			<tr>
				<td bgcolor="#D5D5D5" style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">1</td>
				<td bgcolor="#D5D5D5" style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">2</td>
				<td bgcolor="#D5D5D5" style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">3</td>
				<td bgcolor="#D5D5D5" style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">4</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td rowspan="3" style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>Nivel Indicador</td> 
				<td rowspan="3" style="width: 10%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$reconduccion['nombre_indicador'].'</td> 
				<td style="width: 10%; text-align: center; border: 1px solid black; border-collapse: collapse; font-size: 7px">'.$reconduccion['variable_a'].'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$reconduccion['umedida_a'].'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$reconduccion['tipo_op_a'].'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$proginicial_a.'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$av_a.'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinalfinal_a.'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_a[0].'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_a[1].'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_a[2].'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_a[3].'</td> 
			</tr>
			<tr>
				<td style="width: 10%; text-align: center; border: 1px solid black; border-collapse: collapse; font-size: 7px">'.$reconduccion['variable_b'].'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$reconduccion['umedida_b'].'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$reconduccion['tipo_op_b'].'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$proginicial_b.'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$av_b.'</td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinalfinal_a.'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_b[0].'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_b[1].'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_b[2].'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">&nbsp;<br>&nbsp;<br>'.$progfinal_b[3].'</td> 
			</tr>
			<tr>
				<td colspan="3" style="width: 28%; text-align: rigth; border: 1px solid black; border-collapse: collapse;">Resultado del Indicador: </td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 9%; text-align: center; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">'.$tab1.'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">'.$tab2.'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">'.$tab3.'</td> 
				<td style="width: 7%; text-align: center; border: 1px solid black; border-collapse: collapse;">'.$tab4.'</td> 
			</tr>
		</tbody>
	</table>
	&nbsp;<br>
';










$justificacion = '&nbsp;
<br>

<table style="width: 100%; padding: 2px;">
	<tr>
		<td style="border: 1px solid black; border-collapse: collapse;">Justificación: '.$reconduccion['justificacion_impacto'].'</td>
	</tr>
	<tr>
		<td style="border: 1px solid black; border-collapse: collapse;">&nbsp;</td>
	</tr>
	<tr>
		<td style="border: 1px solid black; border-collapse: collapse;">Resumen sobre la cancelación o reducción de la programación de indicadores estratégicos y/o de gestión</td>
	</tr>
	<tr>
		<td style="border: 1px solid black; border-collapse: collapse;">&nbsp;</td>
	</tr>
	<tr>
		<td style="border: 1px solid black; border-collapse: collapse;">Resumen sobre la creación o incremento de programación de indicadores estratégicos y/o de gestión</td>
	</tr>
	<tr>
		<td style="border: 1px solid black; border-collapse: collapse;">&nbsp;</td>
	</tr>
</table>
&nbsp;<br>
&nbsp;<br>

';



// ============================== Aqui traemos a los Titulares ===============================
$id_dependencia = $reconduccion['id_dependencia'];
$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$titular_dependencia = $stm->fetch(PDO::FETCH_ASSOC);





$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$Director_gobierno_por_resultados = $stm->fetch(PDO::FETCH_ASSOC);

$firmas = '
<table style="width: 100%; text-align: center; border-spacing: 4px; ">
	<tr>
		<td style="font-size: 8px; width: 32%; border: 1px solid gray;"> REVISÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $titular_dependencia['nombre'] . " " . $titular_dependencia['apellidos'] . "<br>" . $titular_dependencia['cargo']. '</td>
		<td style="width: 2%;"> &nbsp; </td> 
		<td style="font-size: 8px; width: 32%; border: 1px solid gray;"> AUTORIZÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $Director_gobierno_por_resultados['nombre'] . " " . $Director_gobierno_por_resultados['apellidos'] . "<br>" . $Director_gobierno_por_resultados['cargo']. '</td>
	</tr>	
</table>';


$html = $membretes . $oficio_movimiento_fecha . $encabezado_gen_aux_etc . $infoReconduccion . $justificacion . $firmas;




// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Reconduccion de Actividades.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
?>



