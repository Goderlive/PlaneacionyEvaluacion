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
		$this->setFont('helvetica', 'B', 20);
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
$pdf->setFont('times', 'BI', 12);

// add a page
$pdf->AddPage('L', 'LETTER');

// set some text to print

$sql = " SELECT * FROM lineasactividades la
JOIN actividades ac ON ac.id_actividad = la.id_actividad
JOIN pdm_lineas pl ON pl.id_linea = la.id_linea
LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
LEFT JOIN avances av ON av.id_actividad = ac.id_actividad
LEFT JOIN areas ar ON ar.id_area = ac.id_area 
LEFT JOIN dependencias dp ON ar.id_dependencia = dp.id_dependencia 
LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
LEFT JOIN pdm_estrategias pe ON pe.id_estrategia = pl.id_estrategia = pe.id_estrategia 
LEFT JOIN pdm_objetivos po ON po.id_objetivo = pe.id_objetivo
LEFT JOIN temas_pdm tp ON tp.id_tema = po.id_tema
LEFT JOIN pilaresyejes pye ON pye.id_pilaroeje = tp.id_pilar
ORDER BY po.nombre_objetivo, pe.clave_estrategia, pl.clave_linea, ac.codigo_actividad
";
$stm = $con->query($sql);
$actividades = $stm->fetchAll(PDO::FETCH_ASSOC);


$iniciotable = '<table>';


print '<pre>';
var_dump($actividades);
die();
foreach($actividades as $a){

    print $a['nombre_pilaoeje'];

}


$trhead = '
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
';



$fintable = '</table>'; 


$txt = $iniciotable . $trhead . $fintable;

// print a block of text using Write()
$pdf->writeHTML($txt, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
