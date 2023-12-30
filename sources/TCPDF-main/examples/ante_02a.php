<?php
if (!$_POST['id_dependencia']) {
    header("Location: ../../../index.php");
}
$variable = $_POST['id_dependencia'];
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setAuthor('');
$pdf->setTitle('02a');
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


function traeAnteActividades($con, $id_area){
    $consulta = "SELECT a.*, ap.*, u.*, p.enero as ene, p.febrero as feb, p.marzo as mar, p.abril as abr, p.mayo as may, p.junio as jun, p.julio as jul, p.agosto as ago, p.septiembre as sep, p.octubre as oct, p.noviembre as nov, p.diciembre as dic
    FROM ante_actividades a
    LEFT JOIN unidades_medida u ON u.id_unidad = a.id_unidad
    LEFT JOIN ante_programaciones ap ON ap.id_actividad = a.id_actividad
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    WHERE id_area = $id_area";

    $stm = $con->query($consulta);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC); 

    return $actividades;
}

function generaRenglon($con, $anteActividades){
    $renglon = '';
    foreach($anteActividades as $a){

        $progAnte = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre']; 
        $prog1er = $a['enero'] + $a['febrero'] + $a['marzo']; 
        $prog2do = $a['abril'] + $a['mayo'] + $a['junio']; 
        $prog3er = $a['julio'] + $a['agosto'] + $a['septiembre']; 
        $prog4to = $a['octubre'] + $a['noviembre'] + $a['diciembre']; 

        if($progAnte != 0){
            $porcentual1 = number_format(($prog1er/$progAnte) *100,1) . '%';
            $porcentual2 = number_format(($prog2do/$progAnte) *100,1) . '%';
            $porcentual3 = number_format(($prog3er/$progAnte) *100,1) . '%';
            $porcentual4 = number_format(($prog4to/$progAnte) *100,1) . '%';
        }else{
            $porcentual1 = "0%";
            $porcentual2 = "0%";
            $porcentual3 = "0%";
            $porcentual4 = "0%";
        }

        $renglon .= '<tr>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['codigo_actividad']. '</td>';
        $renglon .= '<td style="text-align: left; border:1px solid gray; font-size: 7px">' . $a['nombre_actividad']. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['nombre_unidad']. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $progAnte. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog1er. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual1. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog2do. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual2. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog3er. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual3. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog4to. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual4. '</td>';
        $renglon .= '</tr>';
        
    }

    return $renglon;
}


$consulta = "SELECT * FROM ante_areas ar
LEFT JOIN dependencias_generales ON ar.id_dependencia_general = dependencias_generales.id_dependencia 
LEFT JOIN dependencias_auxiliares ON ar.id_dependencia_aux = dependencias_auxiliares.id_dependencia_auxiliar 
LEFT JOIN proyectos ON ar.id_proyecto = proyectos.id_proyecto 
LEFT JOIN programas_presupuestarios ON proyectos.id_programa = programas_presupuestarios.id_programa 
LEFT JOIN dependencias ON ar.id_dependencia = dependencias.id_dependencia
LEFT JOIN titulares ON titulares.id_area = ar.id_area
WHERE ar.id_dependencia = $variable
GROUP BY ar.id_area";
$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);

$id_dependencia = $_POST['id_dependencia'];
$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$Director = $stm->fetch(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);


foreach ($areas as $a) {

    $anteActividades = traeAnteActividades($con, $a['id_area']);
    
    $renglon = generaRenglon($con, $anteActividades);


    // add a page
    $pdf->AddPage();
    $html0 = '
    <table style="width:100%;">
    <tbody>
        <tr>
            <td style="width:15%; text-align: center;" rowspan="3"><img src="images/logo_metepec.jpg" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
            <td style="width:70%; text-align: center; font-size: 12px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
            <td style="width:15%; text-align: center;" rowspan="3"> <img src="images/metepec_logoc.jpg" class="img-fluid" alt="" align="right"></td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 12px"> Manual para la Planeación, Programación y Presupuesto de Egresos Municipal 2024</td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 12px">&nbsp; <br> Presupuesto Basado en Resultados Municipal <br></td>
        </tr>
    </tbody>
</table> 

        <table style="width:70%">
            <tr>
            <td style="width:90%; text-align: rigth;" rowspan="3"></td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 7px"> Ejercicio Fiscal:</td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 7px" rowspan="3">2024 </td>
        </tr>
        </table> &nbsp; <br> &nbsp;';

    $html1 = '
        <table style="width:100%">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="width:50%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; <br> ENTE PUBLICO: METEPEC</td>
                                <td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">No.: 0103</td>
                            </tr>
                            <tr>
                                <td style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-02a</td> 
                                <td style="width:60%;text-align: center; border:1px solid gray; font-size: 8px">CALENDARIZACION DE METAS DE ACTIVIDADES POR PROYECTO</td> 
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="width:20%; text-align: right; font-size: 8px"></td>
                                <td style="width:20%; text-align: center; border:1px solid gray; font-size: 10px">Identificador</td>
                                <td style="width:60%; text-align: left; border:1px solid gray; font-size: 10px"> Denominacion</td>
                            </tr>
                            <tr>
                                <td style="width:20%; text-align: right; font-size: 8px">Proyecto </td>
                                <td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'.$a['codigo_proyecto'].'</td>
                                <td style="width:60%; text-align: left; border:1px solid gray; font-size: 8px">'.$a['nombre_proyecto'].'</td>
                            </tr>
                            <tr>
                                <td style="width:20%; text-align: right; font-size: 8px">Dependencia General </td>
                                <td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'.$a['clave_dependencia'].'</td>
                                <td style="width:60%; text-align: left; border:1px solid gray; font-size: 8px">'.$a['nombre_dependencia_general'].'</td>
                            </tr>
                            <tr>
                                <td style="width:20%; text-align: right; font-size: 8px">Dependencia Auxiliar </td>
                                <td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">'.$a['clave_dependencia_auxiliar'].'</td>
                                <td style="width:60%; text-align: left; border:1px solid gray; font-size: 8px">'.$a['nombre_dependencia_auxiliar'].'</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>&nbsp; <br>&nbsp;';

    $html3 = '
        <table style="width:100%; padding: 1px; border:1px solid gray;">
            <tr>
                <td rowspan="2"style="width:5%; text-align: center; border:1px solid gray; font-size: 9px">Codigo</td>
                <td rowspan="2" style="width:40%; text-align: center; border:1px solid gray; font-size: 9px">Descripción de actividades</td>
                <td rowspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 9px">Unidad de Medida</td>
                <td rowspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 9px">Programado anual</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Primero trimestre</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Segundo Trimestre</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Tercer Trimestre</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Cuarto trimestre</td>
            </tr>
            <tr>
                <td style=" text-align: center; border:1px solid gray; font-size: 7px">Absoluta</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 7px">%</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 7px">Absoluta</td>
                <td style=" text-align: center; border:1px solid gray; font-size: 7px">%</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 7px">Absoluta</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 7px">%</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 7px">Absoluta</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 7px">%</td>
            </tr> 

            '.$renglon.'
        </table>&nbsp; <br> &nbsp;';

$html4 = '<table style="width: 100%; text-align: center; border-spacing: 3px">
<tr>
    <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> ELABORÓ </td>
    <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> REVISÓ </td>
    <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> AUTORIZÓ </td>
</tr>	
<tr>
<td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>'. mb_strtoupper($a['gradoa'],'utf-8') .' '. mb_strtoupper($a['nombre'],'utf-8') ." ". mb_strtoupper($a['apellidos'],'utf-8') .'<br>'. mb_strtoupper($a['cargo'],'utf-8') .' </td>
<td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br> '. mb_strtoupper($Director['gradoa'],'utf-8') .' '. mb_strtoupper($Director['nombre'],'utf-8') ." ". mb_strtoupper($Director['apellidos'],'utf-8') .'<br>'. mb_strtoupper($Director['cargo'],'utf-8') .'</td>
<td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>'. mb_strtoupper($DirectorUIPPE['gradoa'],'utf-8') .' '. mb_strtoupper($DirectorUIPPE['nombre'],'utf-8') ." ". mb_strtoupper($DirectorUIPPE['apellidos'],'utf-8') .'<br>'. mb_strtoupper($DirectorUIPPE['cargo'],'utf-8') .'</td>
</tr>	
</table>&nbsp; <br> &nbsp; <br>&nbsp;';

    $html = $html0 . $html1 . $html3 . $html4;

    $pdf->writeHTML($html);
}
// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('02a.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+