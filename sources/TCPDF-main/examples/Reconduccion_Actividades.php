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
				<td bgcolor="#97d6f7" style="width: 48%; border: 1px solid black; border-collapse: collapse;">Identificación del Proyecto que se Cancela o Reduce</td>
				<td style="width: 4%"></td>
				<td bgcolor="#97d6f7" style="width: 48%; border: 1px solid black; border-collapse: collapse;">Identificación del Proyecto que se Asigna o Amplía</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Dependencia General: '.$reconduccion['dep_general'].'</td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
			</tr>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Dependencia Auxiliar: '.$reconduccion['dep_aux'].'</td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
			</tr>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Programa: '.$reconduccion['programa'].'</td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
			</tr>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Objetivo: '.$objetivo_programa.'</td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
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
				<td bgcolor="#97d6f7" style="width: 48%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación del Proyecto que se Cancela o Reduce</td>
				<td style="width: 4%"></td>
				<td bgcolor="#97d6f7" style="width: 48%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación del Proyecto que se Asigna o Amplía</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Dependencia General: '.$reconduccion['dep_general'].'</td> 
			</tr>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Dependencia Auxiliar: '.$reconduccion['dep_aux'].'</td> 
			</tr>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Programa: '.$reconduccion['programa'].'</td> 
			</tr>
			<tr>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;"></td> 
				<td style="width: 4%"></td>
				<td style="width: 48%; border: 1px solid black; border-collapse: collapse;">Objetivo: '.$objetivo_programa.'</td> 
			</tr>
		</tbody>
	</table>	
	';}


$vacio = '&nbsp;
<br>
<table style="width: 100%;">
	<thead>
		<tr>
			<td bgcolor="#97d6f7" style="width: 48%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación de recursos a nivel de Proyecto que se Cancela o Reduce</td>
			<td style="width: 4%">&nbsp;</td> 
			<td bgcolor="#97d6f7" style="width: 48%; border: 1px solid black; border-collapse: collapse; text-align: center">Identificación de recursos a nivel de Proyecto que se Asigna o Amplía</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="#97d6f7" rowspan="2" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br>Clave</td> 
			<td bgcolor="#97d6f7" rowspan="2" style="width: 9%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp; <br>Denominación</td> 
			<td bgcolor="#97d6f7" style="width: 31%; border: 1px solid black; border-collapse: collapse; text-align: center">Presupuesto</td> 
			<td style="width: 4%">&nbsp;</td> 
			<td bgcolor="#97d6f7" rowspan="2" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br>Clave</td> 
			<td bgcolor="#97d6f7" rowspan="2" style="width: 9%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp; <br>Denominación</td> 
			<td bgcolor="#97d6f7" style="width: 31%; border: 1px solid black; border-collapse: collapse; text-align: center">Presupuesto</td> 
		</tr>
		<tr>
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Ejercer</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Cancelar o Reducir</td> 
			<td bgcolor="#97d6f7" style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado Modificado</td> 
			<td  style="width: 4%">&nbsp;</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Ejercer</td> 
			<td bgcolor="#97d6f7" style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">Por Cancelar o Reducir</td> 
			<td bgcolor="#97d6f7" style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center">Autorizado Modificado</td> 
		</tr>
		<tr>
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 9%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td  style="width: 4%">&nbsp;</td> 
			<td style="width: 8%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
			<td style="width: 9%; border: 1px solid black; border-collapse: collapse; text-align: center">&nbsp;<br>N/A<br>&nbsp;</td> 
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
$contadorProgramaciones = 0;
$justificaciones = "";
foreach ($programaciones as $prog) {
	$contadorProgramaciones += 1;
	$justificaciones .= $prog['no_actividad'] . $prog['justificacion'] . "; ";
	if(DefineReconduccion($prog['programacion_inicial'], $prog['programacion_final']) == "Reducción"){
		array_push($left, $prog);
	}else{
		array_push($right, $prog);
	}
}


function Espacios($data){
	$espaciado = '';
	if($data < 5){
		$espacios = 5;
	}
	if($data > 5){
		$espacios = 1;
	}
	for ($i=0; $i < $espacios; $i++) { 
		$espaciado .= '&nbsp;<br>&nbsp;';
	}
	return $espaciado;
}

function traeavances($con, $id_actividad){
	$stm = $con->query("SELECT SUM(avance) FROM avances WHERE id_actividad = $id_actividad");
    $avances = $stm->fetch(PDO::FETCH_ASSOC);
	if(!$avances['SUM(avance)']){
		return "0";
	}
    return $avances['SUM(avance)'];

}

function Trimestres($data){
	$trimestral = array();
	$data = arregladata($data);
	$per = Sumador(array_slice($data, 2,3));
	$sdo = Sumador(array_slice($data, 5,3));
	$tro = Sumador(array_slice($data, 7,3));
	$cto = Sumador(array_slice($data, 9,3));
	array_push($trimestral, $per, $sdo, $tro, $cto);
	return $trimestral;
}

function CreaTabla($data, $con){
	$temp = "";
	if(count($data) != 0){
		foreach($data as $d){
		//var_dump($d);
		$tavances = traeavances($con, $d['id_actividad']);
		$totalold = SumaAnual($d['programacion_inicial']);
		$totalnew = SumaAnual($d['programacion_final']);
		$trimestral = Trimestres($d['programacion_final']);
		$temp.= '
		<tr>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$d['no_actividad'].'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$d['desc_actividad'].'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$d['u_medida'].'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$totalold.'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$tavances.'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$totalnew.'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$trimestral[0].'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$trimestral[1].'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$trimestral[2].'</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$trimestral[3].'</td>
		</tr>
		';
		}
	}else{
		$temp.= '
		<tr>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br> N/A</td>
		</tr>
		';
	}
	

	$table = '&nbsp;
	<br>&nbsp;
	<table style="width: 100%;">
		<tbody>
			<tr>
				<td bgcolor="#97d6f7" rowspan="2" style="width: 7%; border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br>Codigo</td>
				<td bgcolor="#97d6f7" rowspan="2" style="width: 27%; border: 1px solid black; border-collapse: collapse; text-align: center;">&nbsp; <br>Descripción</td>
				<td bgcolor="#97d6f7" rowspan="2" style="width: 10%; border: 1px solid black; border-collapse: collapse; text-align: center;">Unidad de Medida</td>
				<td bgcolor="#97d6f7" colspan="3" style="width: 31%; border: 1px solid black; border-collapse: collapse; text-align: center;">Cantidad Programada de la Meta de Actividad</td>
				<td bgcolor="#97d6f7" colspan="4" style="width: 25%; border: 1px solid black; border-collapse: collapse; text-align: center;">Calendarización Trimestral Modificada</td>
			</tr>
			<tr>
				<td bgcolor="#97d6f7" style="border: 1px solid black; border-collapse: collapse; text-align: center;">Inicial</td>
				<td bgcolor="#97d6f7" style="border: 1px solid black; border-collapse: collapse; text-align: center;">Avance</td>
				<td bgcolor="#97d6f7" style="border: 1px solid black; border-collapse: collapse; text-align: center;">Modificada</td>
				<td bgcolor="#97d6f7" style="border: 1px solid black; border-collapse: collapse; text-align: center;">1</td>
				<td bgcolor="#97d6f7" style="border: 1px solid black; border-collapse: collapse; text-align: center;">2</td>
				<td bgcolor="#97d6f7" style="border: 1px solid black; border-collapse: collapse; text-align: center;">3</td>
				<td bgcolor="#97d6f7" style="border: 1px solid black; border-collapse: collapse; text-align: center;">4</td>
			</tr>
			'.$temp.'
		</tbody>
	</table>';


	return $table;
}



	$left = CreaTabla($left, $con);



	$right = CreaTabla($right, $con);





$htmlprog = '
<table>
	<tr>
		<td style="width: 48%;">
			'.$left.'
		</td>
		<td style="width: 3.5%">&nbsp;</td> 
		<td style="width: 48.5%; ">
			'.$right.'
		</td>
	
	</tr>
</table>';




$justificacion = '&nbsp;
<br>
&nbsp;
<br>
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
	<tr>
		<td>Justificación: '.$justificaciones.'</td>
	</tr>

</table>
<br>
&nbsp;
<br>
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
	<tr>
		<td>De creación o reasignación de metas de actividad y/o recursos al proyecto (Benef icio, Impacto, Repercusión programática). En su caso Utilizar hoja anexa.</td>
	</tr>
</table>
<br>
&nbsp;
<br>
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
	<tr>
		<td>Identificación del Origen de los recursos. En su caso utilizar hoja anexa.</td>
	</tr>
</table>
';



// ============================== Aqui traemos a los Titulares ===============================

$id_area = $reconduccion['id_area'];

$stm = $con->query("SELECT t.nombre, t.apellidos, t.cargo 
FROM reconducciones_atividades pr
JOIN areas a ON a.id_area = pr.id_area
JOIN titulares t ON t.id_area = a.id_area  
WHERE pr.id_area = $id_area");
$titular_area = $stm->fetch(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT d.id_dependencia 
FROM dependencias d
JOIN areas a ON a.id_dependencia = d.id_dependencia
WHERE id_area = $id_area ");
$id_dependencia = $stm->fetch(PDO::FETCH_ASSOC);
$id_dependencia = $id_dependencia['id_dependencia'];



$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$titular_dependencia = $stm->fetch(PDO::FETCH_ASSOC);





$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$Director_gobierno_por_resultados = $stm->fetch(PDO::FETCH_ASSOC);

$espacios = Espacios($contadorProgramaciones);
$firmas = $espacios .'
<table style="width: 100%; text-align: center; border-spacing: 3px; ">
	<tr>
		<td style="font-size: 8px; width: 32%; border: 1px solid gray;"> ELABORÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $titular_area['nombre'] . " " . $titular_area['apellidos'] . "<br>" . $titular_area['cargo']. '</td>
		<td style="width: 2%;"> &nbsp; </td> 
		<td style="font-size: 8px; width: 32%; border: 1px solid gray;"> REVISÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $titular_dependencia['nombre'] . " " . $titular_dependencia['apellidos'] . "<br>" . $titular_dependencia['cargo']. '</td>
		<td style="width: 2%;"> &nbsp; </td> 
		<td style="font-size: 8px; width: 32%; border: 1px solid gray;"> AUTORIZÓ <br>&nbsp;<br>&nbsp;<br>&nbsp;'. $Director_gobierno_por_resultados['nombre'] . " " . $Director_gobierno_por_resultados['apellidos'] . "<br>" . $Director_gobierno_por_resultados['cargo']. '</td>
	</tr>	
</table>';


$html = $membretes . $oficio_movimiento_fecha . $encabezado_gen_aux_etc . $vacio . $htmlprog . $justificacion . $firmas;
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


