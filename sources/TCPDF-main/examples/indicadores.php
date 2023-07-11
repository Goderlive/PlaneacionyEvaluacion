<?php
session_start();
if($_SESSION['sistema'] != "pbrm" || !isset($_POST['trimestre'])){
	header("Location: ../../../formatos_indicadores.php");
	die();
}
$id_dependencia = $_POST['id_dependencia'];
$trimestre = $_POST['trimestre'];
$num_trimestre = QueTrimestreEs($trimestre);

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Dirección de Gobierno por Resultados');
$pdf->setTitle('Formato Avances Trimestrales de Indicadores');
$pdf->setSubject('Formato Avances Trimestrales');
$pdf->setKeywords('08b, avance, trimestral');

// ---------------------------------------------------------
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set font
$pdf->setFont('helvetica', '', 10);




//****************************************** Area de Dependencia General y Demas ****************************************** 
if($num_trimestre == 1 || $num_trimestre == 3){
	$stm = $con->query("SELECT * FROM indicadores_uso iu
	JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
	JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
	JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
	JOIN dependencias_generales dg ON iu.id_dep_general = dg.id_dependencia
	JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
	WHERE dp.id_dependencia = $id_dependencia AND (iu.periodicidad = 'Mensual' OR iu.periodicidad = 'Trimestral')" );
}
if($num_trimestre == 2){
	$stm = $con->query("SELECT * FROM indicadores_uso iu
	JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
	JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
	JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
	JOIN dependencias_generales dg ON iu.id_dep_general = dg.id_dependencia
	JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
	WHERE dp.id_dependencia = $id_dependencia AND (iu.periodicidad = 'Mensual' OR iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Semestral')
	GROUP BY iu.id
	" );
}
if($num_trimestre == 4){
	$stm = $con->query("SELECT * FROM indicadores_uso iu
	JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
	JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
	JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
	JOIN dependencias_generales dg ON iu.id_dep_general = dg.id_dependencia
	JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
	WHERE dp.id_dependencia = $id_dependencia AND (iu.periodicidad = 'Mensual' OR iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Semestral' OR iu.periodicidad = 'Anual')
	GROUP BY iu.id
	" );
}
$indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);  // 

// ******************************************  FIN ******************************************  


// ******************************************  Area de Titulares ****************************************** 
$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$titular_dependencia = $stm->fetch(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$Director_gobierno_por_resultados = $stm->fetch(PDO::FETCH_ASSOC);

// ******************************************  FIN ****************************************** 


function Sumador($data, $trimestre){
	if ($trimestre != 0){
		$meses = QueTrimestreEs($trimestre);
		$data = array_slice($data,$meses[0], $meses[1]);
	}
	$sum = 0;
	foreach($data as $d){
		$sum += $d;
	}
	return $sum;
}


function QueTrimestreEs($trimestre){
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


function BuscaAvances($con, $id_indicador, $num_trimestre){
	$stm = $con->query("SELECT * FROM avances_indicadores  
	WHERE id_indicador = $id_indicador AND trimestre = $num_trimestre AND validado = 1");
	$avances = $stm->fetch(PDO::FETCH_ASSOC);
	return $avances;
}

function BuscaAvancesAcumulados($con, $id_indicador, $trimestre){
	$stm = $con->query("SELECT SUM(avance_a), SUM(avance_b) FROM avances_indicadores
	WHERE id_indicador = $id_indicador AND trimestre <= $trimestre AND validado = 1");
	$avances = $stm->fetch();
	return $avances;
}


function SumadorAcumulado($programacion, $trimestre){
	$mes = QueTrimestreEs($trimestre);
	$programacion = array_slice($programacion, 0, $mes[1]);
	return Sumador($programacion, 0);
}


$trimestreNombre = TrimestreNombreCompleto($trimestre);


foreach($indicadores as $indica): // Aqui deberia comenzar el foreach /////////////////////////////////////////////////////////
// add a page
$pdf->AddPage();


$metaAnual_a = intval($indica['at1']) + intval($indica['at2']) + intval($indica['at3']) + intval($indica['at4']); 
$metaAnual_b = intval($indica['bt1']) + intval($indica['bt2']) + intval($indica['bt3']) + intval($indica['bt4']); 


$membretes = '
<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 15%"><img src="images/logo_metepec.jpg" height="50"/></td>
      <td style="width: 67%; text-align: center">&nbsp; <br>&nbsp; <br>Presupuesto Basado en Resultados Municipal</td>
      <td style="width: 18%;text-align: center "><img src="images/metepec_logoc.jpg" height="50px"/></td>
    </tr>
  </tbody>
</table>
';

$membretestrimestre = '
<table class="GeneratedTable" style="width: 100%; padding: 2px;">
  <tbody>
    <tr>
      <td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">ENTE PUBLICO: METEPEC</td>
      <td style="width:10%; text-align: left; border:1px solid gray; font-size: 8px">No.: 103</td>
      <td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">'. $indica['nombre_dependencia'] .'</td>
      <td style="width:10%; text-align: rigth; border:1px solid gray; font-size: 8px">Trimestre :</td>
      <td style="width:20%; text-align: left; border:1px solid gray; font-size: 8px">' . $trimestreNombre . '</td>
    </tr>
    <tr>
      <td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-08b</td>
      <td style="width:90%; text-align: center; border:1px solid gray; font-size: 8px">FICHA TECNICA DE SEGUIMIENTO DE INDICADORES ' . $indica['anio'] . ' ESTRATEGICOS O DE GESTION</td>
    </tr>
  </tbody>
</table>
';

$dataindicador = '
<table class="GeneratedTable" style="width: 100%; padding: 2px;">
  <tbody>
    <tr>
		<td style="width:22%; text-align: left; font-size: 8px">PILAR TEMATICO / EJE TRANSVERSAL:</td>
		<td style="width:28%; text-align: left; font-size: 8px">' . $indica['pilar_o_eje'] . '</td>
		<td style="width:14%; text-align: left; font-size: 8px">TEMA DE DESARROLLO:</td>
		<td style="width:56%; text-align: left; font-size: 8px">' . $indica['tema_desarrollo'] . '</td>
    </tr>
    <tr>
		<td style="width:18%; text-align: left; font-size: 8px">PROGRAMA PRESUPUESTARIO:</td>
		<td style="width:32%; text-align: left; font-size: 8px">' . $indica['codigo_programa'] . " " . $indica['nombre_programa'] . '</td>
		<td style="width:7%; text-align: left; font-size: 8px">PROYECTO:</td>
		<td style="width:43%; text-align: left; font-size: 8px">' . $indica['codigo_proyecto'] . " " . $indica['nombre_proyecto'] . '</td>
    </tr>
    <tr>
		<td style="width:16%; text-align: left; font-size: 8px">OBJETIVO DEL PROGRAMA PRESUPUESTARIO:</td>
		<td style="width:84%; text-align: left; font-size: 8px">' . $indica['objetivo_pp'] . '</td>
    </tr>
    <tr>
		<td style="width:25%; text-align: rigth; font-size: 8px">DEPENDENCIA GENERAL:</td>
		<td style="width:25%; text-align: left; font-size: 8px">' . $indica['clave_dependencia'] . " " . $indica['nombre_dependencia_general'] . '</td>
		<td style="width:25%; text-align: rigth; font-size: 8px">DEPENDENCIA AUXILIAR:</td>
		<td style="wid8h:25%; text-align: left; font-size: 8px">' . $indica['clave_dependencia_auxiliar'] . " " . $indica['nombre_dependencia_auxiliar'] .'</td>
    </tr>
  </tbody>
</table>
';



$estructura = '
<table class="GeneratedTable" style="width: 100%; padding: 2px;">
  <tbody>
    <tr>
		<td style="width:100%; text-align: center; font-size: 8px">ESTRUCTURA DEL INDICADOR</td>
    </tr>
    <tr>
		<td style="width:18%; text-align: left; font-size: 8px">NOMBRE DEL INDICADOR</td>
		<td style="width:82%; text-align: left; font-size: 8px">' . $indica['nombre_indicador'] . '</td>
    </tr>
    <tr>
		<td style="width:18%; text-align: left; font-size: 8px">FORMULA DE CALCULO:</td>
		<td style="width:82%; text-align: left; font-size: 8px">' . $indica['formula'] . '</td>
    </tr>
    <tr>
		<td style="width:18%; text-align: left; font-size: 8px">INTERPRETACION:</td>
		<td style="width:82%; text-align: left; font-size: 8px">' . $indica['interpretacion'] . '</td>
    </tr>
    <tr>
		<td style="width:18%; text-align: left; font-size: 8px">DIMENCION QUE ATIENDE:</td>
		<td style="width:32%; text-align: left; font-size: 8px">' . $indica['dimension'] . '</td>
		<td style="width:18%; text-align: left; font-size: 8px">FRECUENCIA DE MEDICION:</td>
		<td style="width:32%; text-align: left; font-size: 8px">' . $indica['periodicidad'] . '</td>
    </tr>
    <tr>
		<td style="width:18%; text-align: left; font-size: 8px">FACTOR DE COMPARACION:</td>
		<td style="width:32%; text-align: left; font-size: 8px">' . $indica['factor_de_comparacion'] . '</td>
		<td style="width:18%; text-align: left; font-size: 8px">DESCRIPCION DEL FACTOR DE COMPARACION:</td>
		<td style="width:32%; text-align: left; font-size: 8px">' . $indica['desc_factor_de_comparacion'] . '</td>
    </tr>
  </tbody>
</table>
&nbsp;<br>&nbsp;
';

$id_indicador = $indica['id'];

$programacion_trimestre_a = ($num_trimestre == 1) ? $indica['at1'] : (($num_trimestre == 2) ? $indica['at2'] : (($num_trimestre == 3) ? $indica['at3'] : $indica['at4']));
$programacion_trimestre_b = ($num_trimestre == 1) ? $indica['bt1'] : (($num_trimestre == 2) ? $indica['bt2'] : (($num_trimestre == 3) ? $indica['bt3'] : $indica['bt4']));

$avance = BuscaAvances($con, $id_indicador, $num_trimestre);

$total_acumulado_a = ($num_trimestre == 1) ? intval($indica['at1']) : (($num_trimestre == 2) ? intval($indica['at1']) + intval($indica['at2']) : (($num_trimestre == 3) ? intval($indica['at1']) + intval($indica['at2']) + intval($indica['at3']) : intval($indica['at1']) + intval($indica['at2']) + intval($indica['at3']) + intval($indica['at4'])));
$total_acumulado_b = ($num_trimestre == 1) ? intval($indica['bt1']) : (($num_trimestre == 2) ? intval($indica['bt1']) + intval($indica['bt2']) : (($num_trimestre == 3) ? intval($indica['bt1']) + intval($indica['bt2']) + intval($indica['bt3']) : intval($indica['bt1']) + intval($indica['bt2']) + intval($indica['bt3']) + intval($indica['bt4'])));


$alcanzadoAcumulado = BuscaAvancesAcumulados($con, $id_indicador, $num_trimestre);

$porcentajeAvance = $metaAnual_a != 0 ? substr(($programacion_trimestre_a / $metaAnual_a) *100, 0, 5) : "N/A";
$porcentajealcanzado = $programacion_trimestre_a != 0 ? substr(($avance['avance_a'] / $programacion_trimestre_a) *100 , 0, 5) : "N/A";
$porcentajeacumulado = $metaAnual_a !=0 ? substr(($total_acumulado_a / $metaAnual_a) * 100, 0,5) : "N/A";
$porcentajetotalAcumulado = $total_acumulado_a != 0 ? substr(($alcanzadoAcumulado[0] / $total_acumulado_a) *100, 0,5) : 'N/A';

$porcentajeAvance2 = $metaAnual_b != 0 ? substr(($programacion_trimestre_b / $metaAnual_b) *100, 0, 5) : "N/A";
$porcentajealcanzado2 = $programacion_trimestre_b != 0 ? substr(($avance['avance_b'] / $programacion_trimestre_b) *100 , 0, 5) : "N/A";
$porcentajeacumulado2 = $metaAnual_b != 0 ? substr(($total_acumulado_b / $metaAnual_b) * 100, 0,5) : "N/A";
$porcentajetotalAcumulado2 = $total_acumulado_b != 0 ? substr(($alcanzadoAcumulado[1] / $total_acumulado_b) *100, 0,5) : "N/A";

$comportamiento = '
<table style="width: 100%; text-align: center; padding: 2px;">
	<tr>
		<td style="width:100%; text-align: center; font-size: 8px">COMPORTAMIENTO DE LAS VARIABLES DURANTE EL '. $trimestreNombre.'</td>
	</tr>
	<tr>
		<td rowspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">VARIABLES</td>
		<td rowspan="2" style="width:15%; text-align: center; border:1px solid gray; font-size: 8px">U. DE M.</td>
		<td rowspan="2" style="width:15%; text-align: center; border:1px solid gray; font-size: 8px">TIPO OP.</td>
		<td rowspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">META ANUAL</td>
		<td style="width:25%;text-align: center; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL</td>
		<td style="width:25%;text-align: center; border:1px solid gray; font-size: 8px">AVANCE ACUMULADO</td>
	</tr>	
	<tr>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">PROG.</td>	
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">%</td>	
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">ALCAN.</td>	
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">%</td>	
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">PROG.</td>	
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">%</td>	
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">ALCAN.</td>	
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">%</td>	
	</tr>
	<tr>
		<td style="width:10%;text-align: center; border:1px solid gray; font-size: 8px">A</td>
		<td style="width:15%;text-align: center; border:1px solid gray; font-size: 8px">'. $indica['umedida_a'] .'</td>
		<td style="width:15%;text-align: center; border:1px solid gray; font-size: 8px">'. $indica['tipo_op_a'] .'</td>
		<td style="width:10%;text-align: center; border:1px solid gray; font-size: 8px">'. $metaAnual_a .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $programacion_trimestre_a .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajeAvance .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $avance['avance_a'] .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajealcanzado .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $total_acumulado_a .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajeacumulado .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $alcanzadoAcumulado[0] .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajetotalAcumulado .'</td>
		</tr>	
	<tr>
		<td style="width:10%;text-align: center; border:1px solid gray; font-size: 8px">B</td>
		<td style="width:15%;text-align: center; border:1px solid gray; font-size: 8px">'. $indica['umedida_b'] .'</td>
		<td style="width:15%;text-align: center; border:1px solid gray; font-size: 8px">'. $indica['tipo_op_b'] .'</td>
		<td style="width:10%;text-align: center; border:1px solid gray; font-size: 8px">'. $metaAnual_b .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $programacion_trimestre_b .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajeAvance2 .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $avance['avance_b'] .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajealcanzado2 .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $total_acumulado_b .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajeacumulado2 .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $alcanzadoAcumulado[1] .'</td>
		<td style="width:6.25%;text-align: center; border:1px solid gray; font-size: 8px">'. $porcentajetotalAcumulado2 .'</td>
	</tr>	
</table>
&nbsp;<br>
';


if ($programacion_trimestre_b != 0 && $avance['avance_b'] != 0) {
    $eficienciatrimetral_a = ($programacion_trimestre_a / $programacion_trimestre_b) * 100;
    $eficienciatrimetral_b = ($avance['avance_a'] / $avance['avance_b']) * 100;
    if ($eficienciatrimetral_b != 0) {
        $eficienciatrimetral = substr(substr(($eficienciatrimetral_a / $eficienciatrimetral_b) * 100, 0, 5), 0, 5);
    } else {
        $eficienciatrimetral = "N/A";
    }
} else {
    $eficienciatrimetral = "N/A";
}

if(($eficienciatrimetral > 90) && ($eficienciatrimetral < 110) || $eficienciatrimetral == "N/A"){
	$color = "color:green;";
	$semaforotrimestral = "Aceptable";
}else{
	$color = "color:red;";
	$semaforotrimestral = "Critico";
}

if ($total_acumulado_b != 0 && $alcanzadoAcumulado[1] != 0 && $total_acumulado_a != 0) {
    $eficienciaanual = substr(substr(($total_acumulado_a / $total_acumulado_b)*100, 0, 5) / substr(($alcanzadoAcumulado[0] / $alcanzadoAcumulado[1]) *100, 0, 5)*100, 0,5);
} else {
    $eficienciaanual = "N/A";
}

if(($eficienciaanual > 90) && ($eficienciaanual < 110) || $eficienciaanual == "N/A"){
	$colora = "color:green;";
	$semaforoanual = "Aceptable";	
}else{
	$colora = "color:red;";
	$semaforoanual = "Critico";
}



if ($avance['avance_b'] != 0) {
    $division_a = ($programacion_trimestre_b != 0) ? ($programacion_trimestre_a / $programacion_trimestre_b) : 0;
    $division_b = ($avance['avance_b'] != 0) ? ($avance['avance_a'] / $avance['avance_b']) : 0;
    if ($division_b != 0) {
        $eficienciatrimetral_alcanzada = substr(($division_a / $division_b) * 100, 0, 5);
    } else {
        $eficienciatrimetral_alcanzada = "N/A";
    }
} else {
    $eficienciatrimetral_alcanzada = "N/A";
}


if ($total_acumulado_b != 0 && $alcanzadoAcumulado[1] != 0) {
    $division_c = ($total_acumulado_b != 0) ? ($total_acumulado_a / $total_acumulado_b) : 0;
    $division_d = ($alcanzadoAcumulado[1] != 0) ? ($alcanzadoAcumulado[0] / $alcanzadoAcumulado[1]) : 0;
    if ($division_d != 0) {
        $eficienciaacumulado = substr(($division_c / $division_d) * 100, 0, 5);
    } else {
        $eficienciaacumulado = "N/A";
    }
} else {
    $eficienciaacumulado = "N/A";
}

$totalalcanzadoacumulado = is_numeric($alcanzadoAcumulado[0]) && is_numeric($alcanzadoAcumulado[1]) && $alcanzadoAcumulado[1] > 0 ? substr(($alcanzadoAcumulado[0] / $alcanzadoAcumulado[1]) * 100, 0, 5) : 'N/A';

$programacion_trimestre_b = $programacion_trimestre_b ? substr(($programacion_trimestre_a / $programacion_trimestre_b) *100, 0, 5) : "N/A";


$porcentajes = '
<table style="width: 100%; text-align: center; padding: 2px;">
	<tr>
		<td style="width:100%; text-align: center; font-size: 8px">DESCRIPCION DE LA META ANUAL:</td>
	</tr>
	<tr>
		<td rowspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">META ANUAL</td>
		<td style="width:45%; text-align: center; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL</td>
		<td style="width:45%; text-align: center; border:1px solid gray; font-size: 8px">AVANCE ACUMULADO</td>
	</tr>	
	<tr>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">PROG.</td>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">ALC.</td>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">EF%</td>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">SEMAFORO</td>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">PROG.</td>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">ALC.</td>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">EF%</td>
		<td style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">SEMAFORO</td>
	</tr>	
	<tr>
		<td rowspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'. substr(($metaAnual_a / $metaAnual_b) *100, 0, 5) .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">'. $programacion_trimestre_b .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">'. $eficienciatrimetral_alcanzada .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">' . $eficienciatrimetral .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px; '.$color.'">' . $semaforotrimestral .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">' . $eficienciaacumulado .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">' . $totalalcanzadoacumulado .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px">' . $eficienciaanual .'</td>
		<td rowspan="2" style="width:11.25%; text-align: center; border:1px solid gray; font-size: 8px; '.$colora.'">' . $semaforoanual .'</td>
	</tr>	
</table>
<br>&nbsp;<br>

';


$firmas = '
<table style="width: 100%; text-align: center; border-spacing: 10px; ">
	<tr>
		<td style="font-size: 8px; width: 50%; border: 1px solid gray;"> ELABORÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. strtoupper($titular_dependencia['gradoa']) . " " . strtoupper($titular_dependencia['nombre']) . " " . strtoupper($titular_dependencia['apellidos']) . "<br>" . strtoupper($titular_dependencia['cargo']) . '</td>
		<td style="font-size: 8px; width: 50%; border: 1px solid gray;"> VALIDÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. strtoupper($Director_gobierno_por_resultados['gradoa']) . " " . strtoupper($Director_gobierno_por_resultados['nombre']) . " " . strtoupper($Director_gobierno_por_resultados['apellidos']) . "<br>" . strtoupper($Director_gobierno_por_resultados['cargo']) . '</td>
	</tr>	
</table>
';

$html = $membretes . $membretestrimestre . $dataindicador . $estructura . $comportamiento . $porcentajes . $firmas;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
endforeach;
// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------
//Close and output PDF document

//$pdf->Output($nombrecito. "_" .$dependencia['clave_dependencia'] . "-" . $dependencia['clave_dependencia_auxiliar'] . "-" . $dependencia['codigo_proyecto'] . "_". $trimestre .' trimestre.pdf', 'D');
$pdf->Output('08b-' . $indica['clave_dependencia'] . $trimestreNombre .  '.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
?>