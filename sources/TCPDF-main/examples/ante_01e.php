<?php
if (!$_POST['id_dependencia']) {
    header("Location: ../../../index.php");
}
$id_dependencia = $_POST['id_dependencia'];

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setAuthor('');
$pdf->setTitle('1e');
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


$consulta = "SELECT * FROM indicadores_uso iu
LEFT JOIN dependencias dp ON iu.id_dependencia = dp.id_dependencia
LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = dp.id_dependencia_gen
WHERE iu.id_dependencia = $id_dependencia
GROUP BY pp.id_programa;";
$stm = $con->query($consulta);
$programas = $stm->fetchAll(PDO::FETCH_ASSOC);

$id_dependencia = $_POST['id_dependencia'];
$stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
$Director = $stm->fetch(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);


function indicadoresdeprograma($con, $id_programa){
    $texto = '';
    $sentencia = "SELECT * FROM indicadores
    WHERE id_programa_presupuestario = $id_programa";
    $stm = $con->query($sentencia);
    $ind = $stm->fetch(PDO::FETCH_ASSOC);

    foreach($ind as $i){
        
    }

    return $texto;
}




foreach ($programas as $a) {
    $indicadores = 1;
    
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
                <td style="text-align: center; font-size: 12px">&nbsp; <br> Presupuesto Basado en Resultados Municipal</td>
            </tr>
        </tbody>
    </table>

    <table style="width:70%">
        <tr>
            <td style="width:90%; text-align: rigth;" rowspan="3"></td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 8px"> Ejercicio Fiscal:</td>
            <td style="width:13%; text-align: center; border:1px solid gray; font-size: 8px" rowspan="3">2024 </td>
        </tr>

    </table> &nbsp; <br>';
    $html1= '
    <table style="width:100%">
        <tr>
            <td style="width:30%">
                <table>
                    <tr>
                        <td style="width:60%; text-align: center; border:1px solid gray; font-size: 8px">ENTE PUBLICO: METEPEC</td>
                        <td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">No.:0103</td>
                    </tr>
                    <tr>
                        <td style="width:25%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-01e</td> 
                        <td style="width:75%;text-align: center; border:1px solid gray; font-size: 8px">MATRIZ DE INDICADORES PARA RESULTADOS, POR PROGRAMA PRESUPUESTARIO Y DEPENDENCIA GENERAL
                        </td> 
                    </tr>
                </table>
            </td>
            <td style="width:70%">
                <table>
                    <tr>
                        <td style="width:30%; text-align: rigth; border:1px solid gray; font-size: 8px">Programa presupuestario:</td>
                        <td style="width:10%; text-align: center; border:1px solid gray; font-size: 8px">'.$a['codigo_programa'].'</td>
                        <td style="width:60%;text-align: center; border:1px solid gray; font-size: 8px">'.$a['nombre_programa'].'</td> 
                    </tr>
                    <tr>
                        <td style="width:30%; text-align: rigth; border:1px solid gray; font-size: 8px">Objetivo del programa presupuestario:</td> 
                        <td style="width:70%;text-align: left; border:1px solid gray; font-size: 8px">'.$a['objetivo_pp'].'</td> 
                    </tr>
                    <tr>
                        <td style="width:30%; text-align: rigth; border:1px solid gray; font-size: 8px">Dependencia General o Auxiliar:</td> 
                        <td style="width:10%;text-align: center; border:1px solid gray; font-size: 8px">'.$a['clave_dependencia'].'</td> 
                        <td style="width:60%;text-align: center; border:1px solid gray; font-size: 8px">'.$a['nombre_dependencia'].'</td> 
                    </tr>
                    <tr>
                        <td style="width:30%; text-align: rigth; border:1px solid gray; font-size: 8px">Pílar o Eje transversal:</td> 
                        <td style="width:70%;text-align: center; border:1px solid gray; font-size: 8px">'.$a['pilar_o_eje'].'</td> 
                    </tr>
                    <tr>
                        <td style="width:30%; text-align: rigth; border:1px solid gray; font-size: 8px">Tema de Desarrollo:</td> 
                        <td style="width:70%;text-align: center; border:1px solid gray; font-size: 8px">'.$a['tema_desarrollo'].'</td> 
                    </tr>
                </table>
            </td>
        </tr>
</table>&nbsp; <br> &nbsp;';


    $html3 = '<table style="width:100%" >
        <tr>
            <td rowspan="2" style="width:20%; text-align: center; border:1px solid gray; font-size: 9px">Objetivo o resumen narrativo</td>
            <td colspan="3" style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">Indicadores</td>
            <td rowspan="2" style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">Medios de verificación</td>
            <td rowspan="2" style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">Supuestos</td>
        </tr>
        <tr>
            <td style="width:10%; text-align: center; border:1px solid gray; font-size: 7px">Nombre</td>
            <td style="width:10%; text-align: center; border:1px solid gray; font-size: 7px">Fórmula</td>
            <td style="width:10%; text-align: center; border:1px solid gray; font-size: 7px">Frecuencia y Tipo</td>
        </tr>
        '.$indicadores.'
        </table>&nbsp; <br> &nbsp; <br>&nbsp;';

        $html4 = '
        <table style="width: 100%; text-align: center; border-spacing: 3px">
            <tr>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> ELABORÓ </td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> REVISÓ </td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"> AUTORIZÓ </td>
            </tr>
            <tr>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br> '. mb_strtoupper($Director['gradoa'],'utf-8') .' '. mb_strtoupper($Director['nombre'],'utf-8') ." ". mb_strtoupper($Director['apellidos'],'utf-8') .'<br>'. mb_strtoupper($Director['cargo'],'utf-8') .'</td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br> '. mb_strtoupper($Director['gradoa'],'utf-8') .' '. mb_strtoupper($Director['nombre'],'utf-8') ." ". mb_strtoupper($Director['apellidos'],'utf-8') .'<br>'. mb_strtoupper($Director['cargo'],'utf-8') .'</td>
                <td style="font-size: 8px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>'. mb_strtoupper($DirectorUIPPE['gradoa'],'utf-8') .' '. mb_strtoupper($DirectorUIPPE['nombre'],'utf-8') ." ". mb_strtoupper($DirectorUIPPE['apellidos'],'utf-8') .'<br>'. mb_strtoupper($DirectorUIPPE['cargo'],'utf-8') .'</td>
            </tr>	
        </table>&nbsp; <br> &nbsp; <br>&nbsp;';


    $html = $html0 . $html1 . $html3 . $html4  ;

    $pdf->writeHTML($html);
}
// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
