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


$consulta = "SELECT *, dp.id_antedependencia as id_dependencia, ar.id_area as id_area 
FROM ante_areas ar
LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia 
LEFT JOIN dependencias_auxiliares da ON ar.id_dependencia_aux = da.id_dependencia_auxiliar 
LEFT JOIN proyectos py ON ar.id_proyecto = py.id_proyecto 
LEFT JOIN ante_dependencias dp ON ar.id_dependencia = dp.id_antedependencia
LEFT JOIN programas_presupuestarios pp ON py.id_programa = pp.id_programa 
LEFT JOIN titulares tt ON tt.id_area = ar.id_area 
WHERE ar.anio = :anio + 1 
AND dp.etapa = :etapa 
AND dp.tipo = 1";

// Agregar la condición de id_dependencia solo si $id_dependencia es diferente de 0
if ($id_dependencia != 0) {
    $consulta .= " AND ar.id_dependencia = :id_dependencia";
}

$stm = $con->prepare($consulta);

// Vinculamos los parámetros
$stm->bindParam(':anio', $anio, PDO::PARAM_INT);
$stm->bindParam(':etapa', $etapa, PDO::PARAM_INT);

if ($id_dependencia != 0) {
    $stm->bindParam(':id_dependencia', $id_dependencia, PDO::PARAM_INT);
}

$stm->execute();
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);



$stmset = $con->query("SELECT * FROM setings WHERE year_report = $anio");
$logos = $stmset->fetch(PDO::FETCH_ASSOC);



function traeDirector($con, $id_dependencia)
{
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $Director = $stm->fetch(PDO::FETCH_ASSOC);
    if ($Director) {
        return $Director;
    } else {
        return array("id_titular" => 0, "nombre" => " ", "apellidos" => " ", "cargo" => " ", "gradoa" => " ", "id_area" => NULL, "id_registrante" => 0, "fecha_alta" => "", "id_dependencia" => 0);
    }
}

$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_tesoreria");
$tesorero = $stm->fetch(PDO::FETCH_ASSOC);
if(!$tesorero){
    $tesorero = array("id_titular" => 0, "nombre" => " ", "apellidos" => " ", "cargo" => " ", "gradoa" => " ", "id_area" => NULL, "id_registrante" => 0, "fecha_alta" => "", "id_dependencia" => 0);
}

$stm = $con->query("SELECT * FROM setings a
JOIN titulares t ON t.id_titular = a.id_uippe");
$DirectorUIPPE = $stm->fetch(PDO::FETCH_ASSOC);


if ($etapa == 1) {
    $etapa = '
        <tr>
            <td colspan="4" style="width:30%; text-align: center; border:1px solid gray; font-size: 10px">Anteproyecto</td>
        </tr>';
}elseif ($etapa == 2) {
    $etapa = '
        <tr>
            <td colspan="4" style="width:30%; text-align: center; border:1px solid gray; font-size: 10px">Anteproyecto</td>
        </tr>';
}else{
    $etapa = '';
}


$sqlajustes = $con->query("SELECT * FROM setings WHERE year_report = $anio");
$ajustes = $sqlajustes->fetch(PDO::FETCH_ASSOC);
$escudo = '../../../../../' . $ajustes['path_logo_ayuntamiento'];
$administracion = '../../../../../' . $ajustes['path_logo_administracion'];

// add a pages
foreach ($areas as $a) {
    $Director = traeDirector($con, $a['id_dependencia']);

    $pdf->AddPage();
    $html0 = '
    <table style="width:100%;">
        <tbody>
            <tr>
                <td style="width:15%; text-align: center;" rowspan="3"><img src="../../../../../' . $logos['path_logo_ayuntamiento'] . '" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
                <td style="width:70%; text-align: center; font-size: 12px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
                <td style="width:15%; text-align: center;" rowspan="3"> <img src="../../../../../' . $logos['path_logo_administracion'] . '" class="img-fluid" style="width: 70px;" alt="" align="right"></td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 12px"> Manual para la Planeación, Programación y Presupuesto de Egresos Municipal ' . $anio + 1 . '</td>
            </tr>
            <tr>
                <td style="text-align: center; font-size: 12px">&nbsp; <br> Presupuesto Basado en Resultados Municipal <br></td>
            </tr>
        </tbody>
    </table> 
    <br>
    <table style="width:100%; padding: 2px;">
        <tr>
            <td style="width:69%; text-align: rigth;" rowspan="3"></td>
            <td style="width:15%; text-align: center; border:1px solid gray; font-size: 10px; margin "> Ejercicio Fiscal:</td>
            <td style="width:15%; text-align: center; border:1px solid gray; font-size: 10px">' . $anio + 1 . '</td>
        </tr>
        ' . $etapa . '
    </table> &nbsp; <br> &nbsp;';

    $html1 = '
    <table style="width:100%;">
        <tr>
            <td>
                <table style="width:100%; padding: 3px;">
                    <tr>
                        <td style="width:60%; text-align: center; border:1px solid gray; font-size: 10px">ENTE PUBLICO: ' . $logos['nombre_ente'] . '</td>
                        <td style="width:40%; text-align: center; border:1px solid gray; font-size: 10px">No.: ' . $logos['numero_ente'] . '</td>
                    </tr>
                    <tr>
                        <td style=" text-align: center; border:1px solid gray; font-size: 10px">PbRM-01a</td> 
                        <td style="text-align: center; border:1px solid gray; font-size: 10px">PROGRAMA ANUAL DIMENSION ADMINISTRATIVA DEL GASTO</td> 
                    </tr>
                </table>
            </td>
            <td>
                <table style="width:100%; padding: 3px;">
                    <tr>
                        <td style="width:30%; text-align: right; font-size: 10px"></td>
                        <td style="width:20%; text-align: center; border:1px solid gray; font-size: 10px"> Identificador</td>
                        <td style="width:50%; text-align: left; border:1px solid gray; font-size: 10px"> Denominacion</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-size: 10px">PROGRAMA</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 10px">' . $a['codigo_programa'] . '</td>
                        <td style="text-align: left; border:1px solid gray; font-size: 10px">' . $a['nombre_programa'] . '</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-size: 10px; padding-right: 10px;">DEPENDENCIA GENERAL</td>
                        <td style="text-align: center; border:1px solid gray; font-size: 10px">' . $a['clave_dependencia'] . '</td>
                        <td style="text-align: left; border:1px solid gray; font-size: 10px">' . $a['nombre_dependencia_general'] . '</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>&nbsp; <br> &nbsp; ';

    $html3 = '
<table style="width:100%; padding: 3px; border:1px solid gray;">
    <tr>
        <td rowspan="2" style="width:10%; text-align: center; border:1px solid gray; font-size: 10px">Código dependencia auxiliar</td>
        <td rowspan="2" style="width:30%; text-align: center; border:1px solid gray; font-size: 10px">Denominación Dependencia Auxiliar </td>
        <td colspan="2" style="width:45%; text-align: center; border:1px solid gray; font-size: 10px">Proyectos Ejecutados</td>
        <td rowspan="2" style="width:15%; text-align: center; border:1px solid gray; font-size: 10px">Presupuesto Autorizado por Proyecto</td>
    </tr>
    <tr>
        <td style="width:15%; text-align: center; border:1px solid gray; font-size: 10px">Clave del Proyecto</td>
        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 10px">Denominacion del Proyecto</td>
    </tr>	
        <tr>
        <td style="width:10%; text-align: center; border:1px solid gray; font-size: 10px"> <br>' . $a['clave_dependencia_auxiliar'] . ' <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td>
        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 10px"> <br>' . $a['nombre_dependencia_auxiliar'] . '</td>
        <td style="width:15%; text-align: center; border:1px solid gray; font-size: 10px"> <br>' . $a['codigo_proyecto'] . '</td>
        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 10px"> <br>' . $a['nombre_proyecto'] . '</td>
    </tr>
</table>&nbsp; <br> &nbsp;&nbsp;
<table style="padding: 3px;">
    <tbody>
        <tr>
            <td style="width:65%; text-align: right;" rowspan="3">
        </td>
            <td style="width:20%; text-align: center; border:1px solid gray; font-size: 10px">Presupuesto Autorizado por Programa</td>
            <td style="width:15%; text-align: center; border:1px solid gray; " rowspan="3"> </td>
        </tr>
    </tbody>
</table>&nbsp; <br> &nbsp;&nbsp;';

    $html4 = '
<table style="width: 100%; text-align: center; border-spacing: 3px">
    <tr>
        <td style="font-size: 10px; width: 34%; border: 1px solid gray;"> ELABORÓ </td>
        <td style="font-size: 10px; width: 33%; border: 1px solid gray;"> REVISÓ </td>
        <td style="font-size: 10px; width: 33%; border: 1px solid gray;"> AUTORIZÓ </td>
    </tr>
    <tr>
        <td style="font-size: 10px; width: 34%; border: 1px solid gray;"><br><br><br><br><br><br> ' . mb_strtoupper($Director['gradoa'], 'utf-8') . ' ' . mb_strtoupper($Director['nombre'], 'utf-8') . " " . mb_strtoupper($Director['apellidos'], 'utf-8') . '<br>' . mb_strtoupper($Director['cargo'], 'utf-8') . '</td>
        <td style="font-size: 10px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>' . mb_strtoupper($tesorero['gradoa'], 'utf-8') . ' ' . mb_strtoupper($tesorero['nombre'], 'utf-8') . " " . mb_strtoupper($tesorero['apellidos'], 'utf-8') . '<br>' . mb_strtoupper($tesorero['cargo'], 'utf-8') . '</td>
        <td style="font-size: 10px; width: 33%; border: 1px solid gray;"><br><br><br><br><br><br>' . mb_strtoupper($DirectorUIPPE['gradoa'], 'utf-8') . ' ' . mb_strtoupper($DirectorUIPPE['nombre'], 'utf-8') . " " . mb_strtoupper($DirectorUIPPE['apellidos'], 'utf-8') . '<br>' . mb_strtoupper($DirectorUIPPE['cargo'], 'utf-8') . '</td>
    </tr>	
</table>';

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