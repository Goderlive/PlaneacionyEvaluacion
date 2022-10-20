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
$pdf->setTitle('Formato Avances Trimestrales');
$pdf->setSubject('Este es el mensaje del titulo');
$pdf->setKeywords('08c, avance, trimestral');

// ---------------------------------------------------------
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set font
$pdf->setFont('helvetica', '', 7);

// add a page
$pdf->AddPage();


function TraeReconduccion($con, $id_reconduccion){
    $stm = $con->query("SELECT * FROM reconducciones_atividades WHERE id_reconduccion_actividades = $id_reconduccion");
    $reconduccion = $stm->fetch(PDO::FETCH_ASSOC);
    return $reconduccion;
}
$reconduccion = TraeReconduccion($con, $id_reconduccion);




// ============ objetivo programa ==============
$codigo_programa = $reconduccion['programa'];
$codigo_programa = substr($codigo_programa, 0, 8);



$stm = $con->query("SELECT * FROM programas_presupuestarios WHERE codigo_programa = $codigo_programa");
$objetivo_programa = $stm->fetch(PDO::FETCH_ASSOC);

$objetivo_programa = $objetivo_programa['objetivo_pp'];
// ============ END objetivo programa ==============


function TraeProgramaciones($con, $id_reconduccion){
    $stm = $con->query("SELECT * FROM programacion_reconducciones WHERE id_reconduccion = $id_reconduccion");
    $programaciones = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $programaciones;
}
$programaciones = TraeProgramaciones($con, $id_reconduccion);

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

function DefineReconduccion($ini, $fin){
    $Tini = SumaAnual($ini);
    $Tfin = SumaAnual($fin);
    
    $ini = arregladata($ini);
    $fin = arregladata($fin);
    if ($Tini == $Tfin){ // Estamos hablando de Disminucion de programacion
        if (Sumador(array_slice($ini, 0, 3)) == Sumador(array_slice($fin, 0, 3)) && Sumador(array_slice($ini, 3, 3)) == Sumador(array_slice($fin, 3, 3)) && Sumador(array_slice($ini, 6, 3)) == Sumador(array_slice($fin, 6, 3)) && Sumador(array_slice($ini, 9, 3)) == Sumador(array_slice($fin, 9, 3))){ 
            return "Interna";
        }else{
            return 'Recalendirización';
        }
    }
    if ($Tini < $Tfin){ // Estamos hablando de aumento de programacion
        return "Ampliación";
    }
    if ($Tini > $Tfin){ // Estamos hablando de Disminucion de programacion
        return "Reducción";        
    }
    return "Hola";
}

$a = 0;
$b = 0;
$c = 0;
$d = 0;
foreach($programaciones as $p){
	if(DefineReconduccion($p['programacion_inicial'], $p['programacion_final']) == "Reducción"){
		$a = 1;
	}
	if(DefineReconduccion($p['programacion_inicial'], $p['programacion_final']) == "Ampliación"){
		$b = 1;
	}
	if(DefineReconduccion($p['programacion_inicial'], $p['programacion_final']) == "Recalendirización") {
		$c = 1;
	}
	if(DefineReconduccion($p['programacion_inicial'], $p['programacion_final']) == "Interna") {
		$d = 1;
	}
}





$membretes = '
<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 15%" rowspan="3"><img src="images/logo_metepec.jpg" height="50"/></td>
      <td style="width: 67%; text-align: center">SISTEMA DE COORDINACIÓN HACENDARIA DEL ESTADO DE MÉXICO CON SUS MUNICIPIOS</td>
      <td style="width: 18%;text-align: center " rowspan="3"><img src="images/metepec_logoc.jpg" height="50"/></td>
    </tr>
    <tr>
      <td style="text-align: center">DICTAMEN DE RECONDUCCIÓN Y ACTUALIZACIÓN PROGRAMATÍCA - PRESUPUESTAL PARA RESULTADOS</td>
    </tr>
  </tbody>
</table>
';

$oficio_movimiento_fecha = '&nbsp;
<br>
	<table class="GeneratedTable" style="width: 100%;">
		<tbody>
		<tr>
			<td rowspan="2" style="width: 15%; text-align: left">&nbsp;</td>
			<td style="width: 50%; text-align: left">Tipo de Movimiento: Reconucción Programatica</td>
			<td style="width: 0%; text-align: left">N. Oficio: '.$reconduccion['no_oficio'].'</td>
		</tr>
		<tr>
			<td style="width: 450%; text-align: left">Fecha: '.$reconduccion['fecha'].'</td>
		</tr>
		</tbody>
	</table>
';

if($a == 1 && $b == 0 && $c == 0 && $d == 0){
	$encabezado_gen_aux_etc = ' &nbsp;
	<br>
	<table style="width: 100%;">
		<thead>
			<tr>
				<td bgcolor="#97d6f7" style="width: 47%; border: 1px solid black; border-collapse: collapse;">Identificación del Proyecto que se Cancela o Reduce</td>
				<td style="width: 6%"></td>
				<td bgcolor="#97d6f7" style="width: 47%; border: 1px solid black; border-collapse: collapse;">Identificación del Proyecto que se Asigna o Amplía</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Dependencia General: '.$reconduccion['dep_general'].'</td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
			</tr>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Dependencia Auxiliar: '.$reconduccion['dep_aux'].'</td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
			</tr>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Programa: '.$reconduccion['programa'].'</td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
			</tr>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Objetivo: '.$objetivo_programa.'</td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
			</tr>
		</tbody>
	</table>	
	';}


if($b == 1 || $c == 1 || $d == 1){
	$encabezado_gen_aux_etc = ' &nbsp;
	<br>
	<table style="width: 100%;">
		<thead>
			<tr>
				<td bgcolor="#97d6f7" style="width: 47%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación del Proyecto que se Cancela o Reduce</td>
				<td style="width: 6%"></td>
				<td bgcolor="#97d6f7" style="width: 47%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación del Proyecto que se Asigna o Amplía</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Dependencia General: '.$reconduccion['dep_general'].'</td> 
			</tr>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Dependencia Auxiliar: '.$reconduccion['dep_aux'].'</td> 
			</tr>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Programa: '.$reconduccion['programa'].'</td> 
			</tr>
			<tr>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 6%"></td>
				<td style="width: 47%; border: 1px solid black; border-collapse: collapse;">Objetivo: '.$objetivo_programa.'</td> 
			</tr>
		</tbody>
	</table>	
	';}


$vacio = '&nbsp;
<br>
<table style="width: 100%;">
	<thead>
		<tr>
			<td bgcolor="#97d6f7" style="width: 47%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación de recursos a nivel de Proyecto que se Cancela o Reduce</td>
			<td style="width: 6%">&nbsp;</td> 
			<td bgcolor="#97d6f7" style="width: 47%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación de recursos a nivel de Proyecto que se Asigna o Amplía</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="#97d6f7" rowspan="2" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br>Clave</td> 
			<td bgcolor="#97d6f7" rowspan="2" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp; <br>Denominación</td> 
			<td bgcolor="#97d6f7" style="width: 31%; border: 1px solid black; border-collapse: collapse; text-align: center">Presupuesto</td> 
			<td style="width: 6%">&nbsp;</td> 
			<td bgcolor="#97d6f7" rowspan="2" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br>Clave</td> 
			<td bgcolor="#97d6f7" rowspan="2" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp; <br>Denominación</td> 
			<td bgcolor="#97d6f7" style="width: 31%; border: 1px solid black; border-collapse: collapse; text-align: center">Presupuesto</td> 
		</tr>
		<tr>
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Ejercer</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Cancelar o Reducir</td> 
			<td bgcolor="#97d6f7" style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado Modificado</td> 
			<td  style="width: 6%">&nbsp;</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Ejercer</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Cancelar o Reducir</td> 
			<td bgcolor="#97d6f7" style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado Modificado</td> 
		</tr>
		<tr>
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td  style="width: 6%">&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
		</tr>
	</tbody>
</table>';

//Procedemos a definir las actividades y programacion
// primero contamos
// si es mas de una, sabemos donde va

$left = array();
$right = array();
foreach ($programaciones as $prog) {
	if(DefineReconduccion($prog['programacion_inicial'], $prog['programacion_final']) == "Reducción"){
		array_push($left, $prog);
	}else{
		array_push($right, $prog);
	}
}


function CreaTabla(){
	$table = '
	<table style="width: 100%;">
	<tbody>
	<tr>
		  <td style="width: 47%; text-align: center">Metas de Actividad Programadas y alcanzadas del Proyecto a cancelar o Reducir.
			  <table style="width: 100%;">
				  <tbody>
					  <tr>
						  <td bgcolor="#97d6f7" rowspan="2" style="width: 20%; border: 1px solid black; border-collapse: collapse; text-align: center;">Codigo</td>
						  <td bgcolor="#97d6f7" rowspan="2" style="width: 20%; border: 1px solid black; border-collapse: collapse; text-align: center;">Descripción</td>
						  <td bgcolor="#97d6f7" rowspan="2" style="width: 20%; border: 1px solid black; border-collapse: collapse; text-align: center;">Unidad de Medida</td>
						  <td bgcolor="#97d6f7" style="width: 20%; border: 1px solid black; border-collapse: collapse; text-align: center;">Cantidad Programada de la Meta de Actividad</td>
						  <td bgcolor="#97d6f7" style="width: 20%; border: 1px solid black; border-collapse: collapse; text-align: center;">Calendarización Trimestral Modificada</td>
					  </tr>
					  <tr>
						  <td bgcolor="#97d6f7" style="width: 4%; border: 1px solid black; border-collapse: collapse; text-align: center;">1</td>
						  <td bgcolor="#97d6f7" style="width: 4%; border: 1px solid black; border-collapse: collapse; text-align: center;">2</td>
						  <td bgcolor="#97d6f7" style="width: 4%; border: 1px solid black; border-collapse: collapse; text-align: center;">3</td>
						  <td bgcolor="#97d6f7" style="width: 4%; border: 1px solid black; border-collapse: collapse; text-align: center;">4</td>
						  <td bgcolor="#97d6f7" style="width: 4%; border: 1px solid black; border-collapse: collapse; text-align: center;">5</td>
						  <td bgcolor="#97d6f7" style="width: 4%; border: 1px solid black; border-collapse: collapse; text-align: center;">6</td>
					  </tr>
				  </tbody>
			  </table>
		  </td>
		  <td style="width: 6%">&nbsp;</td> 
		  <td style="width: 47%; text-align: center">Metas de Actividad Programadas y alcanzadas del Proyecto que se crea o incrementa.

		  </td>
	  </tr>
	</tbody>';
	return $table;
}


if($left){
	$left = CreaTabla();
}else{
	$left = "";
}

if($right){
	$right = CreaTabla();
}else{
	$right = "";
}

$htmlprog = '
<table>
	<tr>
		<td style="width: 47%;">
			'.$left.'
		</td>
		<td style="width: 6%">&nbsp;</td> 
		<td style="width: 47%; ">
			'.$right.'
		</td>
	
	</tr>
</table>';




$html = $membretes . $oficio_movimiento_fecha . $encabezado_gen_aux_etc . $vacio . $htmlprog;
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



