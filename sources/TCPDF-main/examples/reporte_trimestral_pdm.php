<?php
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
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
$pdf->setFont('helvetica', 'BI', 9);

// add a page
$pdf->AddPage('L', 'LETTER');
$txt = "";
// set some text to print

//primero imprimimos los pilares y ejes y luego los recorremos con los temas.
$sql = " SELECT * FROM pilaresyejes";
$stm = $con->query($sql);
$pilaresyejes = $stm->fetchAll(PDO::FETCH_ASSOC);

function traeobjetivos($con, $id_tema){
	$sql = " SELECT * FROM pdm_objetivos WHERE id_tema = $id_tema";
	$stm = $con->query($sql);
	$objetivos = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $objetivos;
}

function traetemas($con, $id_pilar){
	$sql = " SELECT * FROM temas_pdm WHERE id_pilar = $id_pilar";
	$stm = $con->query($sql);
	$temas = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $temas;
}

function traeestrategias($con, $id_objetivo){
	$sql = " SELECT * FROM pdm_estrategias WHERE id_objetivo = $id_objetivo";
	$stm = $con->query($sql);
	$estrategias = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $estrategias;
}


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



foreach($pilaresyejes as $pil):
	$txt .= "<h4>" . $pil['nombre_pilaoeje'] . " " . $pil['descripcion'] . "</h4>";
	$temas = traetemas($con, $pil['id_pilaroeje']);
	foreach($temas as $t): 
		$txt .= '<table bgcolor="pink" style="width: 100%;border:1px solid gray;"> <tr><td>' . $t['nombre_tema'] . '</td></tr></table>';
		$objetivos = traeobjetivos($con, $t['id_tema']);
		$txt .= "<table>";
		$txt .= $trhead;
		$txt .= "<tbody>";
		foreach($objetivos as $o):
			$estrategias = traeestrategias($con, $o['id_objetivo']);
			$altoobjetivos = count($estrategias);
			$txt .= '<tr>';
			$txt .= '<td rowspan='.$altoobjetivos.' style="font-size: 7px; border:1px solid gray;">' . $o['clave_objetivo'] . " - " . $o['nombre_objetivo'] . '</td>';
			foreach($estrategias as $es):
				$txt .= '<td style="font-size: 7px; border:1px solid gray;">' . $es['clave_estrategia'] . " - " . $es['nombre_estrategia'] . '</td>';
			endforeach;// end estrategias
			$txt .= '</tr>';
		endforeach; // end objetivos
		$txt .= "</tbody>";
		$txt .= "</table>";
	endforeach; //end de temas
endforeach; //end de pilares


$iniciotable = '<table>';





$fintable = '</table>'; 



// print a block of text using Write()
$pdf->writeHTML($txt, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
