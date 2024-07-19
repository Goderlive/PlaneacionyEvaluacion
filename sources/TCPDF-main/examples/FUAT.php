<?php
session_start();

if (!$_POST['id_dependencia'] || !$_POST['trimestre']) {
    header("Location: ../../../index.php");
}
require_once('tcpdf_include.php');
require_once '../../../models/conection.php';

setlocale(LC_TIME, 'es_MX.UTF-8', 'Spanish_Mexico.1252');

$id_dependencia = $_POST['id_dependencia'];
$trimestre = $_POST['trimestre'];

$mes_maximo = $trimestre * 3;
$mes_minimo = $mes_maximo - 2;

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, 'letter', true, 'UTF-8', false);

// set document information
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);


// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 10);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
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
$img_file = K_PATH_IMAGES . 'back-FUAT2.jpg';
$pdf->Image($img_file, 0, 0, 0, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->setAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$sqldependencia = "SELECT * FROM dependencias WHERE id_dependencia = $id_dependencia";
$stmdependencia = $con->query($sqldependencia);
$dependencia = $stmdependencia->fetch(PDO::FETCH_ASSOC);

$anio = $_SESSION['anio'];
$sql = "SELECT * FROM setings WHERE year_report = $anio";
$stm = $con->query($sql);
$ajustes = $stm->fetch(PDO::FETCH_ASSOC);


function traeAvanceIndicador($con, $id_indicador, $trimestre)
{
    $sql = "SELECT * FROM avances_indicadores a
    WHERE id_indicador = $id_indicador AND trimestre = $trimestre";
    $stm = $con->query($sql);
    return $stm->fetch(PDO::FETCH_ASSOC);
}

function espaciador($areas, $indicadores)
{
    if ($areas < $indicadores) {
        $areas = $indicadores;
    }
    $espaciador = '';
    $diferencia = 24 - count($areas);
    if ($diferencia > 1) {
        for ($i = 0; $i < $diferencia; $i++) {
            $espaciador .= '<br>';
        }
    }
    return $espaciador;
}

function sumaProgramada($a, $trimestre)
{
    if ($trimestre == 1) {
        return $a['enero'] + $a['febrero'] + $a['marzo'];
    }
    if ($trimestre == 2) {
        return $a['abril'] + $a['mayo'] + $a['junio'];
    }
    if ($trimestre == 3) {
        return $a['julio'] + $a['agosto'] + $a['septiembre'];
    }
    if ($trimestre == 4) {
        return $a['octubre'] + $a['noviembre'] + $a['diciembre'];
    }
}


function traeavances($con, $id_actividad, $mes_maximo, $mes_minimo)
{
    $sql = "SELECT SUM(avance) as avance 
    FROM avances 
    WHERE validado = 1 AND validado_2 = 1
    AND id_actividad = $id_actividad 
    AND mes BETWEEN $mes_minimo AND $mes_maximo";
    $stm = $con->query($sql);
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance['avance'];
}



// Traemos el nombre del director que firmara
$sqltitu = "SELECT * FROM titulares WHERE id_dependencia = $id_dependencia";
$stmtitu = $con->query($sqltitu);
$titular = $stmtitu->fetch(PDO::FETCH_ASSOC);



// Primero traemos las titular con base al id de la dependencia
$sql = "SELECT * FROM areas a
WHERE a.id_dependencia = $id_dependencia
GROUP BY a.id_area
ORDER BY a.id_area";
$stm = $con->query($sql);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);




$andtrimestr = '&t=' . $trimestre;
$texto_original = '/index.php?d=' . $id_dependencia . $andtrimestr;
$texto_oculto = base64_encode($texto_original);
$server_url = $_SERVER['HTTP_HOST'];
// Si necesitas incluir el protocolo (HTTP o HTTPS)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$server_url_with_protocol = $protocol . '://' . $server_url;

$codigo = $server_url_with_protocol . '/qr' . urlencode($texto_original);






$qr_code = '
<table style="width:100%; padding: 2px; padding-left: 2px; border: 1px solid gray; keep-together:always;" nobr="true">
    <tr>
        <td style="width:80%; padding-left: 70px;">
            <p>
            Id_acuse: ' . $texto_oculto . '
            </p>
            <br>
            <br>
            <br>
            <p>
            Al firmar este comprobante de entrega, confirmo que he revisado los documentos mencionados y no requeriré versiones impresas de los mismos, contribuyendo así al esfuerzo por reducir el uso de papel.
            </p>
        </td>
        <td style="width:20%;">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $codigo . '" alt="qrcode" width="150" height="150">
        </td>
    </tr>
</table>
';





$promediosActividades = '';
foreach ($areas as $ar) { //Recorremos las areas y buscamos sus actividades
    $id_area = $ar['id_area'];
    $sql = "SELECT * FROM actividades a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    $actvidadesSuma = array();
    foreach ($actividades as $a) { // Recorremos las actividades en busqueda de sus avances y los sumamos a un total por area
        $metaActividad = sumaProgramada($a, $trimestre);
        $id_actividad = $a['id_actividad'];
        $avancetotal = traeavances($con, $id_actividad, $mes_maximo, $mes_minimo);
        $resultado_operacion = ($metaActividad != 0) ? ($avancetotal / $metaActividad) * 100 : "100";
        array_push($actvidadesSuma, $resultado_operacion);
    }

    $suma = 0;
    foreach ($actvidadesSuma as $numero) {
        $suma += $numero;
    }
    // Obtener longitud
    $cantidadDeElementos = count($actvidadesSuma);
    // Dividir, y listo
    if ($cantidadDeElementos > 0) {
        $promedio = $suma / $cantidadDeElementos;
    } else {
        $promedio = 0;
    }


    $promediosActividades .= '  
    <tr>
        <td style="font-size:10px; border: 1px solid gray;">
            ' . $ar['nombre_area'] . '
        </td>
        <td style="font-size:10px; border: 1px solid gray; text-align: center;">' .
        number_format($promedio, 2) . '%
        </td>
    </tr>';
}




if ($trimestre == 1 || $trimestre == 3) {
    $sqlInd = "SELECT * FROM indicadores_uso iu
    LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
    LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    WHERE iu.id_dependencia = $id_dependencia
    AND (i.frecuencia != 'Anual' AND i.frecuencia != 'Semestral')
    GROUP BY iu.id
    ORDER BY py.id_programa
";
} elseif ($trimestre == 2) {
    $sqlInd = "SELECT * FROM indicadores_uso iu
    LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
    LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    WHERE iu.id_dependencia = $id_dependencia
    AND (i.frecuencia != 'Anual')
    GROUP BY iu.id
    ORDER BY py.id_programa
";
} else {
    $sqlInd = "SELECT * FROM indicadores_uso iu
    LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
    LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    WHERE iu.id_dependencia = $id_dependencia
    GROUP BY iu.id
    ORDER BY py.id_programa
";
}
$stmInd = $con->query($sqlInd);
$indicadores = $stmInd->fetchAll(PDO::FETCH_ASSOC);

$programaciona = '';
$programacionb = '';


$filasIndicadores = '';
$codigo = '';
$arrayDef = array();
$arrayTemp = array();
if ($indicadores) {
    foreach ($indicadores as $key => $value) { // Recorremos cada uno de los indicadores y operaremos

        $nombre_indicador = preg_replace('([^A-Za-z0-9áéíóúÁÉÍÓÚüÜñÑ ])', ' ', $value['nombre']);

        // Sacamos el porcentaje de cumplimiento de cada indicador
        $programaciona = ($trimestre == 1) ? $value['at1'] :
                        (($trimestre == 2) ? $value['at2'] :
                        (($trimestre == 3) ? $value['at3'] : $value['at4']));

        $programacionb = ($trimestre == 1) ? $value['bt1'] :
                        (($trimestre == 2) ? $value['bt2'] :
                        (($trimestre == 3) ? $value['bt3'] : $value['bt4']));

        $avance = traeAvanceIndicador($con, $value['id'], $trimestre);

        $porcentajea = ($programaciona != 0 && $avance) ?  $avance['avance_a'] / $programaciona * 100 : 100;
        $porcentajeb = ($programacionb != 0 && $avance) ?  $avance['avance_b'] / $programacionb * 100 : 100;
        $porcentajeI = ($porcentajeb != 0) ? $porcentajea / $porcentajeb * 100 : 100;
        // Hasta este punto tenemos el porcentaje total de un indicador

        $maxCaracteres = 51; // El número máximo de caracteres que deseas mostrar

        if (strlen($nombre_indicador) >= $maxCaracteres) {
            $nombreIndicador = mb_substr($nombre_indicador, 0, $maxCaracteres, "UTF-8") . "..."; // Agrega "..." al final
        } else {
            $nombreIndicador = $nombre_indicador; // No es necesario truncar
        }

        $filasIndicadores .= '
        <tr>
            <td style="font-size:10px; border: 1px solid gray;">
                ' . $nombreIndicador . '
            </td>
            <td style="font-size:10px; border: 1px solid gray; text-align: center;">
                ' . number_format($porcentajeI, 2) . '
            </td>
        </tr>
        ';
    }
} else {
    //sin indicadores
}




$membrete = '<table style="width:100%;">
<tbody>
    <tr>
        <td style="width:15%; text-align: center;" rowspan="3"><img src="../../../' . $ajustes['path_logo_ayuntamiento'] . '" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
        <td style="width:70%; text-align: center; font-size: 12px">' . $ajustes['nombre_sistema'] . '</td>
        <td style="width:15%; text-align: center;" rowspan="3"> <img src="../../../' . $ajustes['path_logo_administracion'] . '" class="img-fluid" alt="" align="right"></td>
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
    <p style="text-align: right;">Fecha y Hora de impresión: ' . strftime("%B %d, %Y, %I:%M %p") . '</p>
    <p style="text-align: Left;">Dependencia: ' . $dependencia['nombre_dependencia'] . ' <br>Trimestre: ' . $trimestre . '</p>
';


$principalTable = '
<div style="height: 100%;">
    <table style="width:100%; padding: 2px">
        <tr>
            <td style="max-width:50%; width:50%;">
                <table style="padding: 3px">
                    <tr>
                        <td style="width:100%; font-size:13px; border: 1px solid gray; text-align: center;" colspan="2">
                            <b>Actividades</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid gray; width:82%;">
                            <b>Área</b>
                        </td>
                        <td style="border: 1px solid gray; width:18%; text-align: center;">
                            <b>%</b>
                        </td>
                    </tr>
                    ' . $promediosActividades . '
                </table>
            </td>    
			<td style="max-width:50%; width:50%; ">
                <table style="padding: 3px">
                    <tr>
                        <td style="width:100%; font-size:13px; border: 1px solid gray; text-align: center;" colspan="2">
                            <b>Indicadores</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid gray; width:82%;">
                            <b>Nombre del Indicador</b>
                        </td>
                        <td style="border: 1px solid gray; width:18%; text-align: center;">
                            <b>%</b>
                        </td>
                    </tr>
                    ' . $filasIndicadores . '
                </table>
            </td>    
        </tr>
    </table>
<div>
';


$firmas = '
<br>
<table style="width:100%; padding: 1px;">
    <tr>
        <td style="width:100%; text-align: center;">
        <br>
        <br>
        <br>
        _______________________________
        <br>
        ' . $titular['gradoa'] . ' ' . $titular['nombre'] . ' ' . $titular['apellidos'] . ' <br>
        ' . $titular['cargo'] . ' <br>
        </td>
    </tr>
</table>
<br>
';





// output the HTML content
$pdf->writeHTML($membrete . $titulos . $principalTable . espaciador($areas, $indicadores) . $firmas . $qr_code);


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document

$pdf->Output('FUAT - ' . $trimestre . ' - ' . $dependencia['nombre_dependencia'] . '.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
