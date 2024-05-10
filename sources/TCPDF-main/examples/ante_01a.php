<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['sistema']) || !$_SESSION['sistema'] == "pbrm") {
    header("Location: /index.php");
}

if(!$_POST['id_dependencia']){
    header("Location: /index.php");
}
$variable = $_POST['id_dependencia'];


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setAuthor('');
$pdf->setTitle('1a');
$pdf->setSubject('');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set header and footer fonts

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins

// set auto page breaks

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)

// set font
$pdf->setFont('dejavusans', '', 10);


$consulta = "SELECT ante_areas.*, dependencias_generales.*, dependencias_auxiliares.*, proyectos.*,titulares.*, dependencias.*, programas_presupuestarios.*,ante_unob.* FROM ante_areas 
LEFT JOIN dependencias_generales ON ante_areas.id_dependencia_general = dependencias_generales.id_dependencia 
LEFT JOIN dependencias_auxiliares ON ante_areas.id_dependencia_aux = dependencias_auxiliares.id_dependencia_auxiliar 
LEFT JOIN proyectos ON ante_areas.id_proyecto = proyectos.id_proyecto 
LEFT JOIN dependencias ON ante_areas.id_dependencia = dependencias.id_dependencia
LEFT JOIN programas_presupuestarios ON proyectos.id_programa = programas_presupuestarios.id_programa 
LEFT JOIN titulares ON titulares.id_area = ante_areas.id_area 
JOIN ante_unob ON ante_areas.id_area = ante_areas.id_area
WHERE ante_areas.id_dependencia = $variable
GROUP BY ante_areas.id_area";
$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_tesoreria");
$tesorero = $stm->fetch(PDO::FETCH_ASSOC);

$id_dependencia = $_POST['id_dependencia'];

$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$Director = $stm->fetch(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);

// add a pages
foreach($areas as $a){
$pdf->AddPage();
$html0 = '<table style="width:100%;">
    <tbody>
        <tr>
            <td style="width:15%; text-align: center;" rowspan="3"><img src="../../../'.$logos['path_logo_ayuntamiento'].'" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
            <td style="width:70%; text-align: center; font-size: 12px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
            <td style="width:15%; text-align: center;" rowspan="3"> <img src="../../../'.$logos['path_logo_administracion'].'" class="img-fluid" alt="" align="right"></td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 12px"> Manual para la Planeación, Programación y Presupuesto de Egresos Municipal 2024</td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 12px">&nbsp; <br> Presupuesto Basado en Resultados Municipal <br></td>
        </tr>
    </tbody>
</table> 
<br>
<table style="width:70%">
	<tr>
	<td style="width:90%; text-align: rigth;" rowspan="3"></td>
	<td style="width:13%; text-align: center; border:1px solid gray; font-size: 7px"> Ejercicio Fiscal:</td>
	<td style="width:13%; text-align: center; border:1px solid gray; font-size: 7px" rowspan="3">2024 </td>
</tr>
</table> &nbsp; <br> &nbsp; <br>&nbsp;';

$html1= '
<table style="width:100%">
        <tr>
            <td>
                <table>
                    <tr>
                        <td style="width:50%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; <br> ENTE PUBLICO: METEPEC</td>
                        <td style="width:50%; text-align: center; border:1px solid gray; font-size: 8px">No.: 0103</td>
                    </tr>
                    <tr>
                        <td style=" text-align: center; border:1px solid gray; font-size: 8px">PbRM-01a</td> 
                        <td style="text-align: center; border:1px solid gray; font-size: 8px">PROGRAMA ANUAL DIMENSION ADMINISTRATIVA DEL GASTO</td> 
                    </tr>
                </table>
            </td>
            <td>
                <table >
                    <tr>
                        <td style="width:40%; text-align: right; font-size: 8px"></td>
                        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 10px"> Identificador</td>
                        <td style="width:30%; text-align: left; border:1px solid gray; font-size: 10px"> Denominacion</td>
                    </tr>
                    <tr>
                        <td style="width:40%; text-align: right; font-size: 8px">PROGRAMA</td>
                        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">'. $a['codigo_programa'] .'</td>
                        <td style="width:30%; text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_programa'] .'</td>
                    </tr>
                    <tr>
                        <td style="width:40%; text-align: right; font-size: 8px">DEPENDENCIA GENERAL</td>
                        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">'. $a['clave_dependencia'] .'</td>
                        <td style="width:30%; text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_dependencia_general'] .'</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>&nbsp; <br> &nbsp; <br>&nbsp;';

$html3 = '<table style="width:100%; padding: 1px; border:1px solid gray;">
<tr>
	<td rowspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 9px">Código dependencia auxiliar</td>
	<td rowspan="2" style="width:30%; text-align: center; border:1px solid gray; font-size: 9px">Denominación Dependencia Auxiliar </td>
	<td colspan="2" style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">Proyectos Ejecutados</td>
	<td rowspan="2" style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">Presupuesto Autorizado por Proyecto</td>
</tr>
<tr>
	<td style="width:15%; text-align: center; border:1px solid gray; font-size: 7px">Clave del Proyecto</td>
	<td style="width:25%; text-align: center; border:1px solid gray; font-size: 7px">Denominacion del Proyecto</td>
</tr>	
    <tr>
    <td style="width:10%; text-align: center; border:1px solid gray; font-size: 9px">'. $a['clave_dependencia_auxiliar'] .' <br><br><br><br><br><br></td>
    <td style="width:30%; text-align: center; border:1px solid gray; font-size: 9px">'. $a['nombre_dependencia_auxiliar'] .'</td>
    <td style="width:15%; text-align: center; border:1px solid gray; font-size: 7px">'. $a['codigo_proyecto'] .'</td>
    <td style="width:25%; text-align: center; border:1px solid gray; font-size: 7px">'. $a['nombre_proyecto'] .'</td>
    </tr>
</table>&nbsp; <br> &nbsp; <br>&nbsp;
<table>
    <tbody>
        <tr>
            <td style="width:60%; text-align: right;" rowspan="3">
        </td>
            <td style="width:20%; text-align: center; border:1px solid gray; font-size: 10px">Presupuesto Autorizado por Programa</td>
            <td style="width:20%; text-align: center; border:1px solid gray; " rowspan="3"> </td>
        </tr>
    </tbody>
</table>&nbsp; <br> &nbsp; <br>&nbsp;';

$html4 = '<table style="width: 100%; text-align: center; border-spacing: 3px">
<tr>
	<td style="font-size: 8px; width: 33%; border: 1px solid gray;"> ELABORÓ </td>
	<td style="font-size: 8px; width: 33%; border: 1px solid gray;"> REVISÓ </td>
	<td style="font-size: 8px; width: 33%; border: 1px solid gray;"> AUTORIZÓ </td>
</tr>
<tr>
    <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br> '. mb_strtoupper($Director['gradoa'],'utf-8') .' '. mb_strtoupper($Director['nombre'],'utf-8') ." ". mb_strtoupper($Director['apellidos'],'utf-8') .'<br>'. mb_strtoupper($Director['cargo'],'utf-8') .'</td>
    <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>'. mb_strtoupper($tesorero['gradoa'],'utf-8') .' '. mb_strtoupper($tesorero['nombre'],'utf-8') ." ". mb_strtoupper($tesorero['apellidos'],'utf-8') .'<br>'. mb_strtoupper($tesorero['cargo'],'utf-8') .'</td>
	<td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>'. mb_strtoupper($DirectorUIPPE['gradoa'],'utf-8') .' '. mb_strtoupper($DirectorUIPPE['nombre'],'utf-8') ." ". mb_strtoupper($DirectorUIPPE['apellidos'],'utf-8') .'<br>'. mb_strtoupper($DirectorUIPPE['cargo'],'utf-8') .'</td>
</tr>	
</table>&nbsp; <br> &nbsp; <br>&nbsp;';

$html = $html0 . $html1 . $html3 . $html4;

$pdf->writeHTML($html);
} 
// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('01a.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+