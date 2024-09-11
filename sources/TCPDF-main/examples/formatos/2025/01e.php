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
$pdf->setTitle('1e');
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
$pdf->setFont('dejavusans', '', 7);


$consulta = "SELECT * FROM ante_indicadores_uso iu
LEFT JOIN ante_dependencias dp ON iu.id_dependencia = dp.id_antedependencia
LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = dp.id_dependencia_gen
LEFT JOIN titulares tt ON tt.id_dependencia = dp.id_seguimiento_dependencia
WHERE dp.anio = $anio + 1
AND dp.etapa = $etapa

";
if($id_dependencia){
    $consulta .= " AND iu.id_dependencia = $id_dependencia";
}
$consulta .= " GROUP BY pp.id_programa";

$stm = $con->query($consulta);
$programas = $stm->fetchAll(PDO::FETCH_ASSOC);



$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);

if ($etapa == 1) {
    $etapa = '<td colspan="4" style="width:43%; text-align: center; border:1px solid gray; font-size: 8px">Anteproyecto</td>';
}elseif ($etapa == 2) {
    $etapa = '<td colspan="4" style="width:43%; text-align: center; border:1px solid gray; font-size: 8px">Anteproyecto</td>';
}else{
    $etapa = '';
}



function indicadoresdeprograma($con, $id_programa){
    $texto = '';
    $sentencia = "SELECT * FROM indicadores
    WHERE id_programa_presupuestario = $id_programa";
    $stm = $con->query($sentencia);
    $ind = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($ind as $i){

        $altura = 200;
        if(count($ind) == 4){
            $altura = 75;
        }
        if(count($ind) == 5){
            $altura = 108;
        }
        if(count($ind) == 6){
            $altura = 100;
        }
        if(count($ind) > 6 && count($ind) <= 13){
            $altura = 70;
        }
        if(count($ind) > 13 && count($ind) <= 15){
            $altura = 90;
        }
        if(count($ind) > 15  && count($ind) <= 20){
            $altura = 70;
        }
        if(count($ind) > 20 && count($ind) <= 22){
            $altura = 70;
        }
        if(count($ind) > 22 && count($ind) <= 30){
            $altura = 75;
        }
        
        if($i['nivel_indicador'] == "Fin"){
            $texto .= '
            <tr>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px; background-color: LightGray;">FIN</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'. $i['sub_nivel']. " " . $i['resumen'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['nombre'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['formula'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['frecuencia']. "<br>" . $i['tipo'] .'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['medios_verificacion'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['supuestos'].'</td>
            </tr>
            ';
        }
        if($i['nivel_indicador'] == "Propósito"){
            $texto .= '
            <tr>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px; background-color: LightGray;">Propósito</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'. $i['sub_nivel']. " " . $i['resumen'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['nombre'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['formula'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['frecuencia']. "<br>" . $i['tipo'] .'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['medios_verificacion'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['supuestos'].'</td>
            </tr>
            ';
        }
        if($i['nivel_indicador'] == "Componente"){
            $texto .= '
            <tr>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px; background-color: LightGray;">Componente</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'. $i['sub_nivel']. " " . $i['resumen'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['nombre'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['formula'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['frecuencia']. "<br>" . $i['tipo'] .'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['medios_verificacion'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['supuestos'].'</td>
            </tr>
            ';
        }
        if($i['nivel_indicador'] == "Actividad"){
            $texto .= '
            <tr>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px; background-color: LightGray;">Actividad</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'. $i['sub_nivel']. " " . $i['resumen'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['nombre'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['formula'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['frecuencia']. "<br>" . $i['tipo'] .'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['medios_verificacion'].'</td>
                <td style="height: '.$altura.'px; text-align: center; border:1px solid gray; font-size: 8px">'.$i['supuestos'].'</td>
            </tr>
            ';
        }
    }

    return $texto;
}


$stmset = $con->query("SELECT * FROM setings WHERE year_report = $anio");
$logos = $stmset->fetch(PDO::FETCH_ASSOC);


foreach ($programas as $a) {
    $indicadores = indicadoresdeprograma($con, $a['id_programa']);
    $id_seguimiento_dependencia = $a['id_seguimiento_dependencia'];
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_seguimiento_dependencia ");
    $Director = $stm->fetch(PDO::FETCH_ASSOC);
    // add a page
    $pdf->AddPage();
    $html0 = '

    <table style="width:100%;">
        <tbody>
            <tr>
                <td style="width:15%; text-align: center;" rowspan="3"><img src="../../../../../' . $logos['path_logo_ayuntamiento'] . '" style="width: 60px;" class="img-fluid" alt="" align="left"></td>
                <td style="width:70%; text-align: center; font-size: 9px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
                <td style="width:15%; text-align: center;" rowspan="3"> <img src="../../../../../' . $logos['path_logo_administracion'] . '" class="img-fluid" alt="" align="right"></td>
            </tr>
            <tr>
            <td style="text-align: center; font-size: 10px"> Manual para la Planeación, Programación y Presupuesto de Egresos Municipal ' . $anio + 1 . '</td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 10px">&nbsp; <br> Presupuesto Basado en Resultados Municipal</td>
            </tr>
        </tbody>
    </table>
    <table><tr><td style="width:100%; height: 8px; text-align: left; font-size: 8px"></td></tr></table>
    ';
    $html1= '
    <table style="width:100%">
        <tr>
            <td style="width:30%">
                <table style="width:70%">
                    <tr>
                        <td style="width:50%; text-align: center; border:1px solid gray; font-size: 8px"> Ejercicio Fiscal:</td>
                        <td style="width:50%; text-align: center; border:1px solid gray; font-size: 8px">' . $anio + 1 . '</td>
                        ' . $etapa . '
                    </tr>
                </table>
                <table style="padding: 2px">
                    <tr>
                        <td style="width:70%; text-align: center; border:1px solid gray; font-size: 8px">ENTE PUBLICO: ' . $logos['nombre_ente'] . '</td>
                        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">No.: ' . $logos['numero_ente'] .'</td>
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-01e</td> 
                        <td style="width:80%;text-align: center; border:1px solid gray; font-size: 8px">MATRIZ DE INDICADORES PARA RESULTADOS, POR PROGRAMA PRESUPUESTARIO Y DEPENDENCIA GENERAL</td> 
                    </tr>
                </table>
            </td>
            <td style="width:70%">
                <table style="padding: 2px">
                    <tr>
                        <td style="width:20%; text-align: rigth; border:1px solid gray; font-size: 8px">Programa presupuestario:</td>
                        <td style="width:80%; text-align: left; border:1px solid gray; font-size: 8px">'.$a['codigo_programa']. " ". $a['nombre_programa'] .'</td>
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: rigth; border:1px solid gray; font-size: 8px">Objetivo del programa presupuestario:</td> 
                        <td style="width:80%;text-align: left; border:1px solid gray; font-size: 8px">'.$a['objetivo_pp'].'</td> 
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: rigth; border:1px solid gray; font-size: 8px">Dependencia General o Auxiliar:</td> 
                        <td style="width:80%;text-align: left; border:1px solid gray; font-size: 8px">'.$a['clave_dependencia']. " " . $a['nombre_dependencia']. '</td> 
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: rigth; border:1px solid gray; font-size: 8px">Pílar o Eje transversal:</td> 
                        <td style="width:80%;text-align: left; border:1px solid gray; font-size: 8px">'.$a['pilar_o_eje'].'</td> 
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: rigth; border:1px solid gray; font-size: 8px">Tema de Desarrollo:</td> 
                        <td style="width:80%;text-align: left; border:1px solid gray; font-size: 8px">'.$a['tema_desarrollo'].'</td> 
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table><tr><td style="width:100%; height: 8px; text-align: left; font-size: 8px"></td></tr></table>

';


    $html3 = '<table style="width:100%; padding: 2px" >
        <tr>
            <td rowspan="2" style="width:7%; font-size: 8px;"></td>
            <td rowspan="2" style="width:16%; text-align: center; border:1px solid gray; font-size: 8px">Objetivo o resumen narrativo</td>
            <td colspan="3" style="width:46%; text-align: center; border:1px solid gray; font-size: 8px">Indicadores</td>
            <td rowspan="2" style="width:14%; text-align: center; border:1px solid gray; font-size: 8px">Medios de verificación</td>
            <td rowspan="2" style="width:17%; text-align: center; border:1px solid gray; font-size: 8px">Supuestos</td>
        </tr>
        <tr>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 8px">Nombre</td>
            <td style="width:27%; text-align: center; border:1px solid gray; font-size: 8px">Fórmula</td>
            <td style="width:6%; text-align: center; border:1px solid gray; font-size: 8px">Frecuencia y Tipo</td>
        </tr>
        '.$indicadores.'
        </table>
    <table><tr><td style="width:100%; height: 8px; text-align: left; font-size: 8px"></td></tr></table>
        ';

        $html4 = '
        <table style="width: 100%; text-align: center; border-spacing: 3px" nobr="true">
            <tr>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> ELABORÓ </td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> REVISÓ </td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> AUTORIZÓ </td>
            </tr>
            <tr>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br> '. mb_strtoupper($a['gradoa'],'utf-8') .' '. mb_strtoupper($a['nombre'],'utf-8') ." ". mb_strtoupper($a['apellidos'],'utf-8') .'<br>'. mb_strtoupper($a['cargo'],'utf-8') .'</td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br> '. mb_strtoupper($Director['gradoa'],'utf-8') .' '. mb_strtoupper($Director['nombre'],'utf-8') ." ". mb_strtoupper($Director['apellidos'],'utf-8') .'<br>'. mb_strtoupper($Director['cargo'],'utf-8') .'</td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>'. mb_strtoupper($DirectorUIPPE['gradoa'],'utf-8') .' '. mb_strtoupper($DirectorUIPPE['nombre'],'utf-8') ." ". mb_strtoupper($DirectorUIPPE['apellidos'],'utf-8') .'<br>'. mb_strtoupper($DirectorUIPPE['cargo'],'utf-8') .'</td>
            </tr>	
        </table>';


    $html = $html0 . $html1 . $html3 . $html4  ;

    $pdf->writeHTML($html);
}
// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('01e.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
