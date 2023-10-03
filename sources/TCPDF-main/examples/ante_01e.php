<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

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

// add a page
$pdf->AddPage();
$html0 = '

<table style="width:100%;">
    <tbody>
        <tr>
            <td style="width:15%; text-align: center;" rowspan="3"><img src="./sources/TCPDF-main/examples/img/logo_metepec.png" class="img-fluid" alt="" align="left"></td>    
            <td style="width:70%; text-align: center; font-size: 12px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
            <td style="width:15%; text-align: center;" rowspan="3"> <img src="./img/metepec_logoc.png" class="img-fluid" alt="" align="right"></td>
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

</table> &nbsp; <br> &nbsp; <br>&nbsp;';
$html1= '
<table style="width:100%">
        <tr>
            <td>
                <table>
                    <tr>
                        <td style="width:60%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; <br> ENTE PUBLICO: METEPEC</td>
                        <td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">No.:0103</td>
                    </tr>
                    <tr>
                        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-01e</td> 
                        <td style="width:70%;text-align: center; border:1px solid gray; font-size: 8px">MATRIZ DE INDICADORES PARA RESULTADOS, POR PROGRAMA PRESUPUESTARIO Y DEPENDENCIA GENERAL
                        </td> 
                    </tr>
                </table>
            </td>
           </tr>
    </table>&nbsp; <br> &nbsp; <br>&nbsp;';

$html2= '<table style="width:100%" >
    <tr>
    <td style="text-align:left; font-size: 10px">PROGRAMA PRESUPUESTARIO : </td>
    </tr>
    <tr>
    <td style="text-align:left; font-size: 10px">OBJETIVO DEL PROGRAMA PRESUPUESTARIO : </td>
    </tr>
    <tr>
    <td style="text-align:left; font-size: 10px">DEPENDENCIA GENERAL: </td>
    </tr>
    <tr>
    <td style="text-align:left; font-size: 10px">PILAR TEMATICO O EJE TRANSVERSAL: </td>
    </tr>
    <tr>
    <td style="text-align:left; font-size: 10px">TEMA DE DESARROLLO : </td>
    </tr>
    </table>&nbsp; <br> &nbsp; <br>&nbsp;';

$html3 = '<table style="width:100%" >
    <tr>
    <td rowspan="2" style="width:20%; text-align: center; border:1px solid gray; font-size: 9px">OBJETIVO O RESUMEN NARRATIVO</td>
    <td colspan="3" style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">INDICADORES</td>
    <td rowspan="2" style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">MEDIOS DE VERIFICACION</td>
    <td rowspan="2" style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">SUPUESTOS</td>
    </tr>
    <tr>
    <td style="width:10%; text-align: center; border:1px solid gray; font-size: 7px">NOMBRE</td>
    <td style="width:10%; text-align: center; border:1px solid gray; font-size: 7px">FORMULA</td>
    <td style="width:10%; text-align: center; border:1px solid gray; font-size: 7px">FRECUENCIA Y TIPO</td>
    </tr>
    </table>&nbsp; <br> &nbsp; <br>&nbsp;';

    $html4 = '<table style="width: 100%; text-align: center; border-spacing: 3px">
    <tr>
        <td style="font-size: 8px; width: 25%; border: 1px solid gray;"> ELABORÓ </td>
        <td style="font-size: 8px; width: 25%; border: 1px solid gray;"> REVISÓ </td>
        <td style="font-size: 8px; width: 25%; border: 1px solid gray;"> AUTORIZÓ </td>
        <td style="font-size: 8px; width: 25%;"> </td>
    </tr>	
    </table>&nbsp; <br> &nbsp; <br>&nbsp;';


$html = $html0 . $html1 . $html2 . $html3 . $html4  ;

$pdf->writeHTML($html);

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
