<?php
session_start();
if(!$_SESSION){
    header("Location: ../../../../../index.php");
}

// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf_include.php');
require_once '../../../../../models/conection.php';
$anio = $_SESSION['anio'];
$etapa = $_POST['etapa'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setAuthor('');
$pdf->setTitle('1c');
$pdf->setSubject('');
$pdf->setKeywords('01c');

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

// set font
$pdf->setFont('dejavusans', '', 10);


function traeAvances($con, $id_actividad){
    $consulta = "SELECT SUM(avance) as sumavance
    FROM avances
    WHERE id_actividad = $id_actividad";

    $stm = $con->query($consulta);
    $actividades = $stm->fetch(PDO::FETCH_ASSOC); 
    return $actividades['sumavance'];
}


function traeResponsable($con, $id_area){
    $stm = $con->query("SELECT * FROM titulares  WHERE id_dependencia = $id_area");
    $responsable = $stm->fetch(PDO::FETCH_ASSOC);
    if($responsable){
        return $responsable;
    }else{
        return array("id_titular"=>0,"nombre"=>" ","apellidos"=>" ","cargo"=>" ","gradoa"=>" ","id_area"=>NULL,"id_registrante"=>0,"fecha_alta"=>"","id_dependencia"=>0);
    }
}

function traeDirector($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $Director = $stm->fetch(PDO::FETCH_ASSOC);
    if($Director){
        return $Director;
    }else{
        return array("id_titular"=>0,"nombre"=>" ","apellidos"=>" ","cargo"=>" ","gradoa"=>" ","id_area"=>NULL,"id_registrante"=>0,"fecha_alta"=>"","id_dependencia"=>0);
    }
}

function traeAnteActividades($con, $id_area){
    $consulta = "SELECT a.*, ap.*, u.*, 
    p.enero as aene, p.febrero as afeb, p.marzo as amar, p.abril as aabr, p.mayo as amay, p.junio as ajun, p.julio as ajul, p.agosto as aago, p.septiembre as asep, p.octubre as aoct, p.noviembre as anov, p.diciembre as adic,
    ap.enero as anene, ap.febrero as anfeb, ap.marzo as anmar, ap.abril as anabr, ap.mayo as anmay, ap.junio as anjun, ap.julio as anjul, ap.agosto as anago, ap.septiembre as ansep, ap.octubre as anoct, ap.noviembre as annov, ap.diciembre as andic
    FROM ante_actividades a
    LEFT JOIN unidades_medida u ON u.id_unidad = a.id_unidad
    LEFT JOIN ante_programaciones ap ON ap.id_actividad = a.id_actividad
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad_seguimiento
    WHERE id_area = $id_area";

    $stm = $con->query($consulta);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC); 

    return $actividades;
}


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

function generaRenglon($con, $anteActividades){
    $renglon = '';
    foreach($anteActividades as $a){
        $sumaAvence = traeAvances($con, $a['id_actividad_seguimiento']);
        $progAnte = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre']; 
        $progOrg = $a['aene'] + $a['afeb'] + $a['amar'] + $a['aabr'] + $a['amay'] + $a['ajun'] + $a['ajul'] + $a['aago'] + $a['asep'] + $a['aoct'] + $a['anov'] + $a['adic']; 

        $varAbs = $progAnte - $sumaAvence;
        $varPorcentual = ($varAbs && $sumaAvence != 0) ? substr(($progAnte/$sumaAvence) *100, 0, 3) . '%'  : '0%';
        $renglon .= '<tr>
                        <td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['codigo_actividad']. '</td>
                        <td style="text-align: left; border:1px solid gray; font-size: 7px">' . $a['nombre_actividad'] . '</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['nombre_unidad']. '</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 7px">' . $progOrg . '</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 7px">' . $sumaAvence . '</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 7px">' . $progAnte . '</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 7px">' . $varAbs . '</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 7px">' . $varPorcentual . '</td>
                    </tr>';
        
    }

    return $renglon;
}


$consulta = "SELECT *, dp.id_antedependencia as id_dependencia, ar.id_area as id_area
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
if($_SESSION['nivel'] == 4 && $_POST['id_dependencia']){
    $id_dependencia = $_POST['id_dependencia'];
    $consulta .= 'AND ar.id_dependencia = ' . $id_dependencia;
}
$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);

$stmset = $con->query("SELECT * FROM setings WHERE year_report = $anio");
$logos = $stmset->fetch(PDO::FETCH_ASSOC);



$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);


foreach($areas as $a){
    $Director = traeDirector($con, $a['id_dependencia']);
    $anteActividades = traeAnteActividades($con, $a['id_area']);
    $renglon = generaRenglon($con, $anteActividades);
    $espacios = generaEspacios($anteActividades);



    // add a page
    $pdf->AddPage();
    $html0 = '
    <table style="width:100%;">
        <tbody>
            <tr>
                <td style="width:15%; text-align: center;" rowspan="3"><img src="../../../../../'.$logos['path_logo_ayuntamiento'].'" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
                <td style="width:70%; text-align: center; font-size: 12px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
                <td style="width:15%; text-align: center;" rowspan="3"> <img src="../../../../../'.$logos['path_logo_administracion'].'" class="img-fluid" alt="" align="right"></td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 12px"> Manual para la Planeación, Programación y Presupuesto de Egresos Municipal '. $anio + 1 .'</td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 12px">&nbsp; <br> Presupuesto Basado en Resultados Municipal <br></td>
            </tr>
        </tbody>
    </table> 
    <table style="width:70%; padding: 2px;">
        <tr>
            <td style="width:90%; text-align: rigth;" rowspan="3"></td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 8px"> Ejercicio Fiscal:</td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 8px" rowspan="3">'. $anio + 1 .'</td>
        </tr>      
    </table>

    <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 6px"></td></tr></table>
    ';

    $html1= '
    <table style="width:100%">
            <tr>
                <td style="width:35%;">
                    <table style="padding: 2px;">
                        <tr>
                            <td style="width:50%; text-align: center; border:1px solid gray; font-size: 9px">ENTE PUBLICO: '. $logos['nombre_ente'] .'</td>
                            <td style="width:50%; text-align: center; border:1px solid gray; font-size: 9px">No.: '. $logos['numero_ente'] .'</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:1px solid gray; font-size: 9px">PbRM-01c</td> 
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">PROGRAMA ANUAL DE METAS DE ACTIVIDADES POR PROYECTO</td> 
                        </tr>
                    </table>
                </td>
                <td style="width:65%;">
                    <table style="padding: 2px;">
                        <tr>
                            <td style="width:20%; text-align: right; font-size: 8px"></td>
                            <td style="width:20%; text-align: center; border:1px solid gray; font-size: 10px">Identificador</td>
                            <td style="width:60%; text-align: left; border:1px solid gray; font-size: 10px"> Denominacion</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-size: 8px">PROGRAMA</td>
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">'. $a['codigo_programa'] .'</td>
                            <td style="text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_programa'] .'</td>
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
        <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 6px"></td></tr></table>
        <table style="width:100%; text-align: left; font-size: 6px">
            <tr>
                <td style="width:12%; text-align: right; font-size: 8px">Descripción del Proyecto</td>
                <td style="width:88%; text-align: left; border:1px solid gray; font-size: 7px">'.$a['objetivo_pp'].'</td>
            </tr>
         </table>
        <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 6px"></td></tr></table>
        ';


    $html3 = '
    <table style="width:100%; padding: 2px">
        <tr>
            <td rowspan="3" style="width:4%; text-align: center; border:1px solid gray; font-size: 7px">&nbsp;<br>Código</td>
            <td rowspan="3" style="width:55%; text-align: center; border:1px solid gray; font-size: 7px">&nbsp;<br>Descripción de las Metas de Actividades Sustantivas Relevantes</td>
            <td colspan="4" style="width:32%; text-align: center; border:1px solid gray; font-size: 7px ">Metas de Actividades</td>
            <td colspan="2" style="width:9%; text-align: center; border:1px solid gray; font-size: 7px">Variacion</td>
        </tr>
        <tr>

            <td rowspan="2" style="text-align: center; border:1px solid gray; font-size: 7px">Unidad de Medida</td>
            <td colspan="2" style="text-align: center; border:1px solid gray; font-size: 7px">'. $_SESSION['anio'] .'</td>
            <td style="text-align: center; border:1px solid gray; font-size: 7px" >'. $_SESSION['anio'] + 1 .'</td>
            <td rowspan="2" style="text-align: center; border:1px solid gray; font-size: 7px">&nbsp;<br>Absoluta</td>
            <td rowspan="2" style="text-align: center; border:1px solid gray; font-size: 7px">%</td>
        </tr>
        <tr>
            <td style="text-align: center; border:1px solid gray; font-size: 7px">Programado</td>
            <td style="text-align: center; border:1px solid gray; font-size: 7px ">Alcanzado</td>
            <td style="text-align: center; border:1px solid gray; font-size: 7px">Programado</td>
        </tr>

            '. $renglon .'


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
    </table>';

    $html = $html0 . $html1 . $html3 . $html4;

    $pdf->writeHTML($html);
}

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('01c.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
