<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Dirección de Gobierno por Resultados');
$pdf->setTitle('Formato Avances Trimestrales');
$pdf->setSubject('Este es el mensaje del titulo');
$pdf->setKeywords('08c, avance, trimestral');

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
// $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// // set margins
// $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// // set auto page breaks
// $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// // set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// // set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
// 	require_once(dirname(__FILE__).'/lang/eng.php');
// 	$pdf->setLanguageArray($l);
// }

// ---------------------------------------------------------
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set font
$pdf->setFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '

<table class="GeneratedTable" style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 18%" rowspan="3"><img src="images/metepec_logoc.jpg"/></td>
      <td style="width: 67%; text-align: center">SISTEMA DE COORDINACION HACENDARIA DEL ESTADO DE MEXICO CON SUS MUNICIPIOS</td>
      <td style="width: 15%;text-align: center " rowspan="3"><img src="images/logo_metepec.jpg" height="70"/></td>
    </tr>
    <tr>
      <td style="text-align: center">GUIA METADOLOGICA PARA EL SEGUIMIENTO Y EVALUACION DEL PLAN DE DESARROLLO MUNICIPAL VIGENTE
	  </td>
    </tr>
    <tr>
      <td style="text-align: center;">&nbsp; <br> Presupuesto Basado en Resultados Municipal</td>
    </tr>
  </tbody>
</table>




<table style="width:100%">
  <tr>
    <th style="width:40%">
		&nbsp;<br>
		<table style="width:100%; border:1px solid gray;">
			<tr>
				<th style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; <br> PbRM 08c</th>
				<td style="width:60%; text-align: center; font-size: 8px">AVANCE TRIMESTRAL DE METAS DE ACCION POR PROYECTO</td>
			</tr>
			<tr>
				<th colspan="2" style="text-align: center; border:1px solid gray; font-size: 8px">PRIMER TRIMESTRE </th> 
			</tr>
		</table>
	
	</th>
	<td style="width:60%">

		<table style="width:100%;">
			<tr>
				<th style="width:30%; text-align: right; font-size: 8px">Dependencia </th>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<th style="width:30%; text-align: right; font-size: 8px">Dependencia General</th>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<th style="width:30%; text-align: right; font-size: 8px">Dependencia Auxiliar</th>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<th style="width:30%; text-align: right; font-size: 8px">Programa</th>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			<tr>
				<th style="width:30%; text-align: right; font-size: 8px">Proyecto</th>
				<td style="width:20%; text-align: center; border:1px solid gray; font-size: 8px">0203050600802</td>
				<td style="width:50%; text-align: left; border:1px solid gray; font-size: 8px">AVANCE TRIMESTRAL DE M</td>
			</tr>
			
		</table>
	
	
	</td>
  </tr>
</table>


<h1>HTML Example</h1>
<h2>List</h2>
List example:
<ol>
	<li><img src="images/logo_example.png" alt="test alt attribute" width="30" height="30" border="0" /> test image</li>
	<li><b>bold text</b></li>
	<li><i>italic text</i></li>
	<li><u>underlined text</u></li>
	<li><b>b<i>bi<u>biu</u>bi</i>b</b></li>
	<li><a href="http://www.tecnick.com" dir="ltr">link to http://www.tecnick.com</a></li>
	<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>
	<li>SUBLIST
		<ol>
			<li>row one
				<ul>
					<li>sublist</li>
				</ul>
			</li>
			<li>row two</li>
		</ol>
	</li>
	<li><b>T</b>E<i>S</i><u>T</u> <del>line through</del></li>
	<li><font size="+3">font + 3</font></li>
	<li><small>small text</small> normal <small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal</li>
</ol>
<dl>
	<dt>Coffee</dt>
	<dd>Black hot drink</dd>
	<dt>Milk</dt>
	<dd>White cold drink</dd>
</dl>
<div style="text-align:center">IMAGES<br />
<img src="images/tcpdf_box.svg" alt="test alt attribute" width="100" height="100" border="0" />
</div>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// output some RTL HTML content
$html = '<div style="text-align:center">The words &#8220;<span dir="rtl">&#1502;&#1494;&#1500; [mazel] &#1496;&#1493;&#1489; [tov]</span>&#8221; mean &#8220;Congratulations!&#8221;</div>';
$pdf->writeHTML($html, true, false, true, false, '');

// test some inline CSS
$html = '<p>This is just an example of html code to demonstrate some supported CSS inline styles.
<span style="font-weight: bold;">bold text</span>
<span style="text-decoration: line-through;">line-trough</span>
<span style="text-decoration: underline line-through;">underline and line-trough</span>
<span style="color: rgb(0, 128, 64);">color</span>
<span style="background-color: rgb(255, 0, 0); color: rgb(255, 255, 255);">background color</span>
<span style="font-weight: bold;">bold</span>
<span style="font-size: xx-small;">xx-small</span>
<span style="font-size: x-small;">x-small</span>
<span style="font-size: small;">small</span>
<span style="font-size: medium;">medium</span>
<span style="font-size: large;">large</span>
<span style="font-size: x-large;">x-large</span>
<span style="font-size: xx-large;">xx-large</span>
</p>';

$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();



// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
