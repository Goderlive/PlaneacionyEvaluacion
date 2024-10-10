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
$pdf->setTitle('1b');
$pdf->setSubject('');
$pdf->setKeywords('01b');

// set default header data
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set header and footer fonts
$pdf->setFont('dejavusans', '', 10);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins

// set auto page breaks

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
$stmset = $con->query("SELECT * FROM setings WHERE year_report = $anio");
$logos = $stmset->fetch(PDO::FETCH_ASSOC);


$consulta = "SELECT *, ante_unob.estrategia AS estrategiab, ad.id_antedependencia as id_dependencia, ar.id_area as id_area
FROM ante_areas ar
LEFT JOIN ante_unob ON ante_unob.id_area = ar.id_area
LEFT JOIN estrategias_ods e ON e.id_estrategia = ante_unob.id_ods
LEFT JOIN objetivos_ods o ON o.id_objetivo = ante_unob.id_ods
LEFT JOIN dependencias_generales ON ar.id_dependencia_general = dependencias_generales.id_dependencia 
LEFT JOIN dependencias_auxiliares ON ar.id_dependencia_aux = dependencias_auxiliares.id_dependencia_auxiliar 
LEFT JOIN proyectos ON ar.id_proyecto = proyectos.id_proyecto 
LEFT JOIN ante_dependencias ad ON ar.id_dependencia = ad.id_antedependencia
LEFT JOIN programas_presupuestarios ON proyectos.id_programa = programas_presupuestarios.id_programa 
LEFT JOIN titulares ON titulares.id_area = ar.id_area 
LEFT JOIN pdm_lineas l ON l.id_linea = ante_unob.linea_accion
WHERE ar.anio = $anio + 1
AND ad.etapa = $etapa 
AND ad.tipo = 1
";
if(isset($_POST['id_dependencia']) && $_SESSION['nivel'] == 4){
    $id_dependencia = $_SESSION['id_dependencia'];
    $consulta .= "AND ar.id_dependencia = $id_dependencia";
}

$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);


if($etapa == '1'){
    $etapa = '<td colspan="4" style="width:10%; text-align: center; border:1px solid gray; font-size: 10px">Anteproyecto</td>';
}elseif($etapa == '2'){
    $etapa = '<td colspan="4" style="width:10%; text-align: center; border:1px solid gray; font-size: 10px">Proyecto</td>';
}else{
    $etapa = '';
}


function traeResponsable($con, $id_area){
    $stm = $con->query("SELECT * FROM titulares WHERE id_area = $id_area");
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


$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);

// add a page
foreach($areas as $a){
    $responsable = traeResponsable($con, $a['id_seguimiento_area']);
    $Director = traeDirector($con, $a['id_seguimiento_dependencia']);

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
                <td style="text-align: center; font-size: 12px"> Manual para la Planeación, Programación y Presupuesto de Egresos Municipal '. ($anio + 1) .'</td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 12px">&nbsp; <br> Presupuesto Basado en Resultados Municipal <br></td>
            </tr>
        </tbody>
    </table> 
    <table style="width:100%; padding: 2px;">
        <tr>
            <td style="width:70%; text-align: rigth;" rowspan="3"></td>
            <td style="width:10%; text-align: center; border:1px solid gray; font-size: 10px; margin "> Ejercicio Fiscal:</td>
            <td style="width:10%; text-align: center; border:1px solid gray; font-size: 10px">'. ($anio + 1) .'</td>
            '. $etapa .'
        </tr>
    </table>
        <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 6px"></td></tr></table>
    
    ';

    $html1= '
        <table style="width:100%">
            <tr>
                <td style="width:40%">
                    <table style="width:100%; padding: 3px;">
                        <tr>
                            <td style="width:60%; text-align: center; border:1px solid gray; font-size: 10px">ENTE PUBLICO: '. $logos['nombre_ente'] .'</td>
                            <td style="width:40%; text-align: center; border:1px solid gray; font-size: 10px">No.: '. $logos['numero_ente'] .'</td>
                        </tr>
                        <tr>
                            <td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-01b</td> 
                            <td style="width:80%;text-align: center; border:1px solid gray; font-size: 8px">PROGRAMA ANUAL DESCRIPCION DEL PROGRAMA PRESUPUESTARIO</td> 
                        </tr>
                        <tr>
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">'. $a['id_dependencia'] .'</td>
                            <td style="text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_dependencia'] .'</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">'. $a['id_area'] .'</td>
                            <td style="text-align: left; border:1px solid gray; font-size: 8px">'. substr($a['nombre_area'], 0, 60) .'</td>
                        </tr>
                    </table>
                </td>
                <td tyle="width:60%">
                    <table style="width:100%; padding: 2px;">
                        <tr>
                            <td style="width:25%; text-align: right; font-size: 8px"></td>
                            <td style="width:25%; text-align: center; border:1px solid gray; font-size: 10px"> Identificador</td>
                            <td style="width:70%; text-align: left; border:1px solid gray; font-size: 10px"> Denominacion</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-size: 8px">DEPENDENCIA GENERAL</td>
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">'. $a['clave_dependencia'] .'</td>
                            <td style="text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_dependencia_general'] .'</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-size: 8px">DEPENDENCIA AUXILIAR</td>
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">'. $a['clave_dependencia_auxiliar'] .'</td>
                            <td style="text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_dependencia_auxiliar'] .'</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-size: 8px">PROGRAMA</td>
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">'. $a['codigo_programa'] .'</td>
                            <td style="text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_programa'] .'</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-size: 8px">PROYECTO</td>
                            <td style="text-align: center; border:1px solid gray; font-size: 8px">'. $a['codigo_proyecto'] .'</td>
                            <td style="text-align: left; border:1px solid gray; font-size: 8px">'. $a['nombre_proyecto'] .'</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 6px"></td></tr></table>
        ';


    $html3 = '
    <table style="padding: 2px;">
        <tr>
            <td style="width:100%; text-align: left; border:1px solid gray; font-size: 9px"><b>Diagnóstico de Programa Presupuestario elaborado usando Analisis FODA: </b></td>
        </tr>
        <tr>
            <td style="width:100%; height: 85px; text-align: left; border:1px solid gray; font-size: 6px">
            Fotaleza: '. $a['diagnostico_fortaleza'] .'<br>
            Oportunidad: '. $a['diagnostico_oportunidad'] .'<br>
            Debilidad: '. $a['diagnostico_debilidad'] .'<br>
            Amenaza: '. $a['diagnostico_amenaza'] .'</td>
        </tr>
        <tr>
            <td style="width:100%; text-align: left; border:1px solid gray; font-size: 9px"><b>Objetivos del Programa presupuestario: </b></td>
        </tr>
        <tr>
            <td style="width:100%; height: 40px text-align: left;border:1px solid gray; font-size: 9px">'. $a['objetivo_pp'] .'</td>
        </tr>
        <tr>
            <td style="width:100%; text-align: left; border:1px solid gray; font-size: 9px"><b>Estrategia para alcanzar el objetivo del Programa presupuestario: </b></td>
        </tr>
        <tr>
            <td style="width:100%; height: 50px text-align: left;border:1px solid gray; font-size: 9px">'. $a['estrategiab'] .'</td>
        </tr>
        <tr>
            <td style="width:100%; text-align: left; border:1px solid gray; font-size: 9px"><b>Objetivos, Estrategias y Lineas de Acción del PDM atendidas: </b></td>
        </tr>
        <tr>
            <td style="width:100%; height: 50px text-align: left;border:1px solid gray; font-size: 9px">'. $a['nombre_linea'] .'</td>
        </tr>
        <tr>
            <td style="width:100%; text-align: left; border:1px solid gray; font-size: 9px"><b>Objetivos y Metas para el Desarrollo Sostenible (ODS), atendidas por el Programa Presupuestario: </b></td>
        </tr>
        <tr>
            <td style="width:100%; height: 50px text-align: left;border:1px solid gray; font-size: 9px">'. $a['estrategia'] .'</td>
        </tr>

    </table>
        <table><tr><td style="width:100%; height: 7px; text-align: left; font-size: 6px"></td></tr></table>
    ';

    $html4 = '
    <table style="width: 100%; text-align: center; border-spacing: 3px; margin-top: 2px">
        <tr>
            <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br>'.mb_strtoupper($responsable['gradoa'],'utf-8') .' '.mb_strtoupper($responsable['nombre'],'utf-8') ." ".mb_strtoupper($responsable['apellidos'],'utf-8') .'<br>'.mb_strtoupper($responsable['cargo'],'utf-8') .'</td>
            <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br>'.mb_strtoupper($Director['gradoa'],'utf-8') .' '. mb_strtoupper($Director['nombre'],'utf-8') ." ".mb_strtoupper($Director['apellidos'],'utf-8') .'<br>'.mb_strtoupper($Director['cargo'],'utf-8') .'</td>
            <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br>'. mb_strtoupper($DirectorUIPPE['gradoa'],'utf-8') .' '.mb_strtoupper($DirectorUIPPE['nombre'],'utf-8') ." ".mb_strtoupper($DirectorUIPPE['apellidos'],'utf-8') .'<br>'.mb_strtoupper($DirectorUIPPE['cargo'],'utf-8') .' </td>
        </tr>
    </table>';

    $html = $html0 . $html1 . $html3 . $html4;

    $pdf->writeHTML($html);
}
// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('01b.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
