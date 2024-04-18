<?php


// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf_include.php');
require_once '../../../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setAuthor('');
$pdf->setTitle('1c');
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

function traeAvances($con, $id_actividad){
    $consulta = "SELECT SUM(avance) as sumavance
    FROM avances
    WHERE id_actividad = $id_actividad";

    $stm = $con->query($consulta);
    $actividades = $stm->fetch(PDO::FETCH_ASSOC);
    if($actividades['sumavance']){
        return $actividades['sumavance'];
    }else{
        return 0;
    }
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
        $sumaAvence = traeAvances($con, $a['id_actividad']);
        $progAnte = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre']; 
        $progOrg = $a['ene'] + $a['feb'] + $a['mar'] + $a['abr'] + $a['may'] + $a['jun'] + $a['jul'] + $a['ago'] + $a['sep'] + $a['oct'] + $a['nov'] + $a['dic']; 

        $varAbs = $progAnte - $sumaAvence;
        $varPorcentual = ($varAbs && $sumaAvence != 0) ? substr(($progAnte/$sumaAvence) *100, 0, 3) . '%'  : '0%';
        $renglon .= '<tr>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['codigo_actividad']. '</td>';
        $renglon .= '<td style="text-align: left; border:1px solid gray; font-size: 7px">' . $a['nombre_actividad']. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $a['nombre_unidad']. '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $progOrg . '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $sumaAvence . '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $progAnte . '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $varAbs . '</td>';
        $renglon .= '<td style="text-align: center; border:1px solid gray; font-size: 7px">' . $varPorcentual . '</td>';
        $renglon .= '</tr>';
        
    }

    return $renglon;
}


$consulta = "SELECT *, ante_dependencias.id_antedependencia as id_dependencia, ar.id_area as id_area 
FROM ante_areas ar
LEFT JOIN dependencias_generales ON ar.id_dependencia_general = dependencias_generales.id_dependencia 
LEFT JOIN dependencias_auxiliares ON ar.id_dependencia_aux = dependencias_auxiliares.id_dependencia_auxiliar 
LEFT JOIN proyectos ON ar.id_proyecto = proyectos.id_proyecto 
LEFT JOIN programas_presupuestarios ON proyectos.id_programa = programas_presupuestarios.id_programa 
LEFT JOIN ante_dependencias ON ar.id_dependencia = ante_dependencias.id_antedependencia
LEFT JOIN titulares ON titulares.id_area = ar.id_area
WHERE ante_dependencias.tipo = 1
GROUP BY ar.id_area";
$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);




$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);


foreach($areas as $a){
    $Director = traeDirector($con, $a['id_dependencia']);

    $anteActividades = traeAnteActividades($con, $a['id_area']);
    
    $renglon = generaRenglon($con, $anteActividades);



    // add a page
    $pdf->AddPage();
    $html0 = '
    <table style="width:100%;">
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

    <table style="width:70%">
        <tr>
            <td style="width:90%; text-align: rigth;" rowspan="3"></td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 8px"> Ejercicio Fiscal:</td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 8px" rowspan="3">2024 </td>
        </tr>

    </table> &nbsp; <br>&nbsp;';
    $html1= '
    <table style="width:100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="width:50%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; <br> ENTE PUBLICO: ///</td>
                            <td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">No.: //</td>
                        </tr>
                        <tr>
                            <td style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-01c</td> 
                            <td style="width:60%;text-align: center; border:1px solid gray; font-size: 8px">PROGRAMA ANUAL DE METAS DE ACTIVIDADES POR PROYECTO</td> 
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
    <table style="width:100%;">
        <tr>
            <td rowspan="3" style="width:5%; text-align: center; border:1px solid gray; font-size: 7px">Código</td>
            <td rowspan="3" style="width:50%; text-align: center; border:1px solid gray; font-size: 7px">Descripción de las Metas de Actividades Sustantivas Relevantes</td>
            <td colspan="4" style="width:35%; text-align: center; border:1px solid gray; font-size: 7px ">Metas de Actividades</td>
            <td colspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 7px">Variacion</td>
        </tr>
        <tr>

            <td rowspan="2" style="text-align: center; border:1px solid gray; font-size: 7px">Unidad de Medida</td>
            <td colspan="2" style="text-align: center; border:1px solid gray; font-size: 7px"> 2023</td>
            <td rowspan="2" style="text-align: center; border:1px solid gray; font-size: 7px" >2024 programado</td>
            <td rowspan="2" style="text-align: center; border:1px solid gray; font-size: 7px">Absoluta</td>
            <td rowspan="2" style="text-align: center; border:1px solid gray; font-size: 7px">%</td>
        </tr>
        <tr>
            <td style="text-align: center; border:1px solid gray; font-size: 7px">Programado</td>
            <td style="text-align: center; border:1px solid gray; font-size: 7px ">Alcanzado</td>
        </tr>

            '. $renglon .'


    </table>&nbsp; <br> &nbsp; <br>&nbsp;';

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
$pdf->Output('01c.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
