<?php
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'metepec_logoc.jpg';
		$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->setFont('helvetica', 'B', 15);
		// Title
		$this->Cell(0, 15, 'Reporte de maggy', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->setY(-15);
		// Set font
		$this->setFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Magali Benitez');
$pdf->setTitle('Reporte trimestral del seguimiento al Plan de Desarrollo Municipal');
$pdf->setSubject('PDM');
$pdf->setKeywords('PDM');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('helvetica', 'BI', 8);

// add a page
$pdf->AddPage('L', 'LETTER');
$txt = "";
// set some text to echo
// deben ser 959
//primero imprimimos los pilares y ejes y luego los recorremos con los temas.
$stm = $con->query("SELECT * FROM localidades");
$localidades = $stm->fetchAll();

$trimestre = 1;
$sql = " SELECT * FROM lineasactividades la
LEFT JOIN actividades ac ON ac.id_actividad = la.id_actividad
LEFT JOIN pdm_lineas pl ON pl.id_linea = la.id_linea
LEFT JOIN pdm_estrategias es ON es.id_estrategia = pl.id_estrategia
LEFT JOIN pdm_objetivos ob ON ob.id_objetivo = es.id_objetivo
LEFT JOIN temas_pdm tm ON tm.id_tema = ob.id_tema
LEFT JOIN pilaresyejes pe ON pe.id_pilaroeje = tm.id_pilar
LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad 
LEFT JOIN areas ar ON ar.id_area = ac.id_area
LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
ORDER BY pe.id_pilaroeje, tm.id_tema, ob.id_objetivo, es.id_estrategia, pl.id_linea ASC";
$stm = $con->query($sql);
$magali = $stm->fetchAll(PDO::FETCH_ASSOC);


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
			$thislocalidades = explode( "," ,$a['localidades']);
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







echo "<table>";



foreach($magali as $mag){
	$avance =  BuscaAvances2($con, $mag['id_actividad'], $trimestre, $localidades);
	// Primero la programacion
	if($trimestre == 1){
		$progTrim = $mag['enero'] + $mag['febrero'] + $mag['marzo'];
	}
	if($trimestre == 2){
		$progTrim = $mag['abril'] + $mag['mayo'] + $mag['junio'];
	}
	if($trimestre == 3){
		$progTrim = $mag['julio'] + $mag['agosto'] + $mag['septiembre'];
	}
	if($trimestre == 4){
		$progTrim = $mag['octubre'] + $mag['noviembre'] + $mag['diciembre'];
	}

	$progAnual = $mag['enero'] + $mag['febrero'] + $mag['marzo'] + $mag['abril'] + $mag['mayo'] + $mag['junio'] + $mag['julio'] + $mag['agosto'] + $mag['septiembre'] + $mag['octubre'] + $mag['noviembre'] + $mag['diciembre'];

	if($progTrim != 0){
		$porcentajetrimestral = $avance[3]/$progTrim *100;
	}else{
		$porcentajetrimestral = "N/A";
	}

	if($progAnual != 0){
		$porcentajeanual = $avance[3]/$progAnual *100;
	}else{
		$porcentajeanual = "N/A";
	}



	echo "<tr>";
		echo "<td>" . $mag['nombre_pilaoeje'] . "</td>";
		echo "<td>" . $mag['nombre_tema'] . "</td>";
		echo "<td>" . $mag['clave_objetivo'] . "</td>";
		echo "<td>" . $mag['nombre_objetivo'] . "</td>";
		echo "<td>" . $mag['clave_estrategia'] . "</td>";
		echo "<td>" . $mag['nombre_estrategia'] . "</td>";
		echo "<td>" . $mag['clave_linea'] . "</td>";
		echo "<td>" . $mag['nombre_linea'] . "</td>";
		echo "<td>" . $mag['nombre_dependencia'] . "</td>";
		echo "<td>" . $mag['nombre_actividad'] . "</td>";
		echo "<td>" . $mag['unidad'] . "</td>";
		echo "<td>" . $progAnual . "</td>";
		echo "<td>" . $progTrim . "</td>";
		echo "<td>" . $avance[3] . "</td>";
		echo "<td>" . substr($porcentajetrimestral, 0, 4) . "%</td>";
		echo "<td>" . substr($porcentajeanual, 0, 4) . "%</td>";
		echo "<td>" . $avance[0] . "</td>";
		echo "<td>" . $avance[1] . "</td>";
		echo "<td>" . $avance[2] . "</td>";
	echo "</tr>";
}
echo "</table>";



$trhead = '
	<thead>
		<tr>
			<th style="width:4%; text-align: center; border:1px solid gray; font-size: 8px"><b>Obj. </b></th>
			<th style="width:4%; text-align: center; border:1px solid gray; font-size: 8px"><b>Estr. </b></th>
			<th style="width:16%; text-align: center; border:1px solid gray; font-size: 8px"><b>Líneas de acción </b></th>
			<th style="width:7%; text-align: center; border:1px solid gray; font-size: 8px"><b>Área(s) Responsable (s)</b></th>
			<th style="width:10%; text-align: center; border:1px solid gray; font-size: 8px"><b>Acciones realizadas</b></th>
			<th style="width:6%; text-align: center; border:1px solid gray; font-size: 8px"><b>Unidad de Medida</b></th>
			<th style="width:5%; text-align: center; border:1px solid gray; font-size: 8px"><b>Prog.</b></th>
			<th style="width:5%; text-align: center; border:1px solid gray; font-size: 8px"><b>Alc.</b></th>
			<th style="width:5%; text-align: center; border:1px solid gray; font-size: 8px"><b>%</b></th>
			<th style="width:14%; text-align: center; border:1px solid gray; font-size: 8px"><b>Localidad (es) beneficiada (s)</b></th>
			<th style="width:12%; text-align: center; border:1px solid gray; font-size: 8px"><b>Beneficiarios directos</b></th>
			<th style="width:12%; text-align: center; border:1px solid gray; font-size: 8px"><b>Origen de los Recursos públicos aplicados</b></th>
		</tr>
	</thead>
';






// echo a block of text using Write()
$pdf->writeHTML($txt, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
