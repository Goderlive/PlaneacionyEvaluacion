<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['sistema']) || !$_SESSION['sistema'] == "pbrm") {
    header("Location: /index.php");
}

$anio = $_SESSION['anio'];
$etapa = $_POST['etapa'];
if ($_SESSION['id_dependencia'] && $_SESSION['nivel'] == 4) {
    $id_dependencia = $_SESSION['id_dependencia'];
} else {
    $id_dependencia = 0;
}


// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf_include.php');
require_once '../../../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setAuthor('');
$pdf->setTitle('02a');
$pdf->setSubject('');
$pdf->setKeywords('');

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


function generaEspacios($anteActividades){
    $total = 0;
    foreach($anteActividades as $a){
        $total += 1;
        if(strlen($a['nombre_actividad']) > 250){
            $total += 2;
        }elseif(strlen($a['nombre_actividad']) < 250 && strlen($a['nombre_actividad']) > 130){
            $total += 1;
        }
    }
    return 290 - ($total * 11);
}



function traeAnteActividades($con, $id_area){
    $consulta = "SELECT li.clave_linea, a.*, ap.*, u.*, p.enero as ene, p.febrero as feb, p.marzo as mar, p.abril as abr, p.mayo as may, p.junio as jun, p.julio as jul, p.agosto as ago, p.septiembre as sep, p.octubre as oct, p.noviembre as nov, p.diciembre as dic
    FROM ante_actividades a
    LEFT JOIN unidades_medida u ON u.id_unidad = a.id_unidad
    LEFT JOIN ante_programaciones ap ON ap.id_actividad = a.id_actividad
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas li ON li.id_linea = la.id_linea
    WHERE id_area = $id_area
    GROUP BY a.id_actividad
    ORDER BY CAST(a.codigo_actividad AS UNSIGNED) ASC
    
    ";

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

        $renglon .= '
        <tr>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['codigo_actividad']. '</td>'.
            '<td style="text-align: left; border:1px solid gray; font-size: 7px">' . $a['nombre_actividad']. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['nombre_unidad']. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $progAnte. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog1er. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual1. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog2do. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual2. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog3er. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual3. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $prog4to. '</td>'.
            '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $porcentual4. '</td>'.
        '</tr>';
        
    }

    return $renglon;
}


$consulta = "SELECT *, ar.id_dependencia as id_dependencia, ar.id_area as id_area 
FROM ante_areas ar
LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia 
LEFT JOIN dependencias_auxiliares da ON ar.id_dependencia_aux = da.id_dependencia_auxiliar 
LEFT JOIN proyectos py ON ar.id_proyecto = py.id_proyecto 
LEFT JOIN programas_presupuestarios pp ON py.id_programa = pp.id_programa 
LEFT JOIN ante_dependencias dp ON ar.id_dependencia = dp.id_antedependencia
LEFT JOIN titulares tt ON tt.id_area = ar.id_seguimiento_area
WHERE dp.anio = $anio + 1
AND dp.etapa = $etapa
AND dp.tipo = 1
";
$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);


function traeDirector($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $Director = $stm->fetch(PDO::FETCH_ASSOC);
    if($Director){
        return $Director;
    }else{
        return array("id_titular"=>0,"nombre"=>" ","apellidos"=>" ","cargo"=>" ","gradoa"=>" ","id_area"=>NULL,"id_registrante"=>0,"fecha_alta"=>"","id_dependencia"=>0);
    }
}

$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);

$stmset = $con->query("SELECT * FROM setings WHERE year_report = $anio");
$logos = $stmset->fetch(PDO::FETCH_ASSOC);

if ($etapa == 1) {
    $etapa = '<td style="width:15%; text-align: center; border:1px solid gray; font-size: 8px">Anteproyecto</td>';
}elseif ($etapa == 2) {
    $etapa = '<td style="width:15%; text-align: center; border:1px solid gray; font-size: 8px">Proyecto</td>';
}else{
    $etapa = '';
}


foreach ($areas as $a) {
    if(!$a['id_area']){
        continue;
    }
    $Director = traeDirector($con, $a['id_dependencia']);
    $anteActividades = traeAnteActividades($con, $a['id_area']);
    $renglon = generaRenglon($con, $anteActividades);
    $espacios = generaEspacios($anteActividades);


    // add a page
    $pdf->AddPage();
    $html0 = '
        <table style="width:100%;">
            <tr>
                <td style="width:15%; text-align: center;" rowspan="3"><img src="../../../../../' . $logos['path_logo_ayuntamiento'] . '" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
                <td style="width:70%; text-align: center; font-size: 10px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
                <td style="width:15%; text-align: center;" rowspan="3"> <img src="../../../../../' . $logos['path_logo_administracion'] . '" class="img-fluid" alt="" align="right"></td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 10px"> Manual para la Planeación, Programación y Presupuesto de Egresos Municipal ' . $anio + 1 . '</td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 10px">&nbsp; <br> Presupuesto Basado en Resultados Municipal <br></td>
            </tr>
        </table> 

        <table style="width:70%">
            <tr>
                <td style="width:95%; text-align: rigth;" rowspan="3"></td>
                <td style="width:15%; text-align: center; border:1px solid gray; font-size: 8px"> Ejercicio Fiscal:</td>
                <td style="width:15%; text-align: center; border:1px solid gray; font-size: 8px">' . $anio + 1 . '</td>
                '. $etapa .'
            </tr>
        </table>
    <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 8px"></td></tr></table>
        
        ';

    $html1 = '
        <table style="width:100%">
            <tr>
                <td style="width:35%;">
                    <table style="padding: 2px;">
                        <tr>
                            <td style="width:75%; text-align: center; border:1px solid gray; font-size: 8px">ENTE PUBLICO: '. $logos['nombre_ente'] .'</td>
                            <td style="width:25%; text-align: center; border:1px solid gray; font-size: 8px">No.: '. $logos['numero_ente'] .'</td>
                        </tr>
                        <tr>
                            <td style="width:15%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-02a</td> 
                            <td style="width:85%;text-align: center; border:1px solid gray; font-size: 8px">CALENDARIZACION DE METAS DE ACTIVIDADES POR PROYECTO</td> 
                        </tr>
                    </table>
                </td>
                <td style="width:65%;">
                    <table style="padding: 2px;">
                        <tr>
                            <td style="width:20%; text-align: right; font-size: 8px"></td>
                            <td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">Identificador</td>
                            <td style="width:60%; text-align: left; border:1px solid gray; font-size: 8px"> Denominacion</td>
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
        </table>
    <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 8px"></td></tr></table>
            
            ';

    $html3 = '
        <table style="width:100%; padding: 2px; border:1px solid gray;">
            <tr>
                <td rowspan="2"style="width:4%; text-align: center; border:1px solid gray; font-size: 8px">Codigo</td>
                <td rowspan="2" style="width:43%; text-align: center; border:1px solid gray; font-size: 8px">Descripción de actividades</td>
                <td rowspan="2" style="width:8%; text-align: center; border:1px solid gray; font-size: 8px">Unidad de Medida</td>
                <td rowspan="2" style="width:8%; text-align: center; border:1px solid gray; font-size: 8px">Programado anual</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Primero trimestre</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Segundo Trimestre</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Tercer Trimestre</td>
                <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 8px">Cuarto trimestre</td>
            </tr>
            <tr>
                <td style=" text-align: center; border:1px solid gray; font-size: 8px">Absoluta</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 8px">%</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 8px">Absoluta</td>
                <td style=" text-align: center; border:1px solid gray; font-size: 8px">%</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 8px">Absoluta</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 8px">%</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 8px">Absoluta</td>
                <td  style=" text-align: center; border:1px solid gray; font-size: 8px">%</td>
            </tr> 

            '.$renglon.'
        </table>
    <table><tr><td style="width:100%; height: '. $espacios .'px; text-align: left; font-size: 6px"></td></tr></table>
        ';

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
</table>
';

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