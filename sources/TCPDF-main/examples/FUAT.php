<?php
if(!$_POST['id_dependencia'] || !$_POST['trimestre']){
    header("Location: ../../../index.php");
}
$id_dependencia = $_POST['id_dependencia'];
$trimestre = $_POST['trimestr'];

require_once('tcpdf_include.php');
require_once '../../../models/conection.php';



// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, 'letter', true, 'UTF-8', false);

// set document information
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);


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
$pdf->setFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->setAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'back-FUAT2.jpg';
$pdf->Image($img_file, 0, 0, 0, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->setAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


function traeavances($con, $id_actividad){
    $sql = "SELECT SUM(avance) as avance FROM avances
    WHERE id_actividad = $id_actividad";
    $stm = $con->query($sql);
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance['avance'];
}


// Primero traemos las areas con base al id de la dependencia
$sql = "SELECT * FROM areas a
WHERE a.id_dependencia = $id_dependencia";
$stm = $con->query($sql);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);


foreach($areas as $a){ //Recorremos las areas y buscamos sus actividades
    $id_area = $a['id_area'];
    $sql = "SELECT * FROM actividades a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($actividades as $a){ // Recorremos las actividades en busqueda de sus avances y los sumamos a un total por area
        $metaActividad = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
        $id_actividad = $a['id_actividad'];
        $avancetotal = traeavances($con, $id_actividad);



    }

}



$membrete = '<table style="width:100%;">
<tbody>
    <tr>
        <td style="width:15%; text-align: center;" rowspan="3"><img src="images/logo_metepec.jpg" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
        <td style="width:70%; text-align: center; font-size: 12px">Sistema de Monitoreo, Tablero de Control y Seguimiento del PbRM</td>
        <td style="width:15%; text-align: center;" rowspan="3"> <img src="images/metepec_logoc.jpg" class="img-fluid" alt="" align="right"></td>
    </tr>
    <tr>
        <td style="text-align: center; font-size: 12px"></td>
    </tr>
    <tr>
        <td style="text-align: center; font-size: 12px">&nbsp; <br> Formato Único de Avances Trimestrales (FUAT)<br></td>
    </tr>
</tbody>
</table> 
';

$titulos = '
    <p style="text-align: right;">Fecha de impresión: <br>Hora: </p>
    <p style="text-align: Left;">Dependencia:  <br>Trimestre: </p>
';


$principalTable = '
<div style="height: 100%;">
    <table style="border: 1px solid black; background-color: #22a7df">
        <tr>
            <td>    
                <table>
                    <tr>
                        <td style="color: white">
                            <b>
                                Actividades
                            </b>
                        </td>
                        <td>
                        </td>
                    </tr>

                </table>
            </td>    
            <td>    
                <table>
                    <tr>
                        <td style="color: white">
                            <b>
                                Indicadores
                            </b>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>
    </table>
<div>
    ';

// output the HTML content
$pdf->writeHTML($membrete.$titulos.$principalTable);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
