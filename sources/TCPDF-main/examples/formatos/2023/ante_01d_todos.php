<?php
// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf_include.php');
require_once '../../../../../models/conection.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setAuthor('');
$pdf->setTitle('01d');
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

$consulta = "SELECT * FROM ante_indicadores_uso
LEFT JOIN dependencias_generales ON ante_indicadores_uso.id_dep_general = dependencias_generales.id_dependencia 
LEFT JOIN dependencias_auxiliares ON ante_indicadores_uso.id_dep_aux = dependencias_auxiliares.id_dependencia_auxiliar 
LEFT JOIN proyectos ON ante_indicadores_uso.id_proyecto = proyectos.id_proyecto
LEFT JOIN programas_presupuestarios ON programas_presupuestarios.id_programa = proyectos.id_programa
LEFT JOIN dependencias ON ante_indicadores_uso.id_dependencia = dependencias.id_dependencia
";
$stm = $con->query($consulta);
$indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);


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
$Directoruippe = $stm->fetch(PDO::FETCH_ASSOC);


// add a page
foreach ($indicadores as $a) {
    $Director = traeDirector($con, $a['id_dependencia']);

    $pdf->AddPage();

    if($a['tipo_op_a'] == "Sumable")
    {
        $sumacondicionalA= $a['at1'] + $a['at2'] + $a['at3'] + $a['at4'];
    }
    else
    {

        $sumacondicionalA =  $a['at4'];
    }
    if($a['tipo_op_b'] == "Sumable")
    {
        $sumacondicionalB= $a['bt1'] + $a['bt2'] + $a['bt3'] + $a['bt4'];
    }
    else
    {

        $sumacondicionalB =  $a['bt4'];
    }
    
        

$html0 = '

<table style="width:100%;">
    <tbody>
        <tr>
            <td style="width:15%; text-align: center;" rowspan="3"><img src="../../../'.$logos['path_logo_ayuntamiento'].'" style="width: 60px;" class="img-fluid" alt="" align="left"></td>    
            <td style="width:70%; text-align: center; font-size: 12px">Sistema de Coordinación Hacendaria del Estado de México con sus Municipios</td>
            <td style="width:15%; text-align: center;" rowspan="3"> <img src="../../../'.$logos['path_logo_administracion'].'" alt="" align="right"></td>
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

</table> &nbsp;';
$html1= '
<table style="width:100%">
        <tr>
            <td>
                <table>
                    <tr>
                        <td style="width:60%; text-align: center; border:1px solid gray; font-size: 8px">&nbsp; ENTE PUBLICO: ////</td>
                        <td style="width:40%; text-align: center; border:1px solid gray; font-size: 8px">No.: ////</td>
                    </tr>
                    <tr>
                        <td style="width:30%; text-align: center; border:1px solid gray; font-size: 8px">PbRM-01d</td> 
                        <td style="width:70%;text-align: center; border:1px solid gray; font-size: 8px">FICHA TECNICA DE DISEÑO DE INDICADORES ESTRATEGICOS O DE GESTIÓN</td> 
                    </tr>
                </table>
            </td>
           </tr>
    </table>&nbsp; <br> ';

$html2= '
<table style="width:100%" >
    <tr>
		<td style="width:25%; text-align: left; font-size: 9px">PILAR DE DESARROLLO/EJE TRANSVERSAL :</td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['pilar_o_eje'] .'</td>
         
		<td style="width:25%; text-align: center; font-size: 9px">TEMA DE DESARROLLO :</td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['tema_desarrollo'] .'</td>
	</tr>
	<tr>
		<td style="width:25%; text-align: left; font-size: 9px">PROGRAMA PRESUPUESTARIO : </td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['codigo_programa'] .'</td>
		<td style="width:25%; text-align: center; font-size: 9px">PROYECTO :</td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['codigo_proyecto'] .'</td>
       
  
      
	</tr>
	<tr>
		<td style="width:25%; text-align: left; font-size: 9px">OBJETIVO DEL PROGRAMA PRESUPUESTARIO:</td>
        <td style="width:75%; text-align: left; font-size: 9px">'. $a['objetivo_pp'] .'</td>
  
	</tr>
	<tr>
		<td style="width:20%; text-align: left; font-size: 9px">DEPENDENCIA GENERAL :</td>
        <td style="width:30%; text-align: left; font-size: 9px">'. $a['nombre_dependencia_general'] .'</td>
		<td style="width:20%; text-align: center; font-size: 9px">DEPENDENCIA AUXILIAR :</td>
        <td style="width:30%; text-align: left; font-size: 9px">'. $a['nombre_dependencia_auxiliar'] .'</td>
      
	</tr>


    </table>&nbsp; <br>';

$html3 = '<table style="width:100%" >
	<tr>
		<td style="width:100%; text-align: center; font-size: 11px">ESTRUCTURA DEL INDICADOR</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: left; font-size: 9px"><b>NOMBRE DEL INDICADOR:</b></td>
        <td style="width:70%; text-align: left; font-size: 9px">'. $a['nombre_indicador'] .'</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: left; font-size: 9px">FORMULA DE CALCULO:</td>
        <td style="width:70%; text-align: left; font-size: 9px">'. $a['formula'] .'</td>
	</tr>
	<tr>
		<td style="width:30%; text-align: left; font-size: 9px">INTERPRETACION:</td>
        <td style="width:70%; text-align: left; font-size: 9px">'. $a['interpretacion'] .'</td>
	</tr>
	<tr>
		<td style="width:25%; text-align: left; font-size: 9px">DIMENSIÓN QUE ATIENDE:</td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['dimension'] .'</td>
		<td style="width:25%; text-align: left; font-size: 9px">FRECUENCIA DE MEDICIÓN:</td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['periodicidad'] .'</td>
	</tr>
	<tr>
		<td style="width:25%; text-align: left; font-size: 9px">FACTOR DE COMPARACIÓN</td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['factor_de_comparacion'] .'</td>
		<td style="width:25%;  text-align: left; font-size: 9px">TIPO DE INDICADOR</td>
        <td style="width:25%; text-align: left; font-size: 9px">'. $a['tipo'] .'</td>

	</tr>
	<tr>
		<td style="width:30%; text-align: left; font-size: 9px"> DESCRIPCION DEL FACTOR DE COMPARACION :</td>
        <td style="width:70%; text-align: left; font-size: 9px">'. $a['desc_factor_de_comparacion'] .'</td>
	</tr>
	<tr>
		<td style="width:10%; text-align: left; font-size: 9px"> LINEA BASE :</td>
        <td style="width:90%; text-align: left; font-size: 9px">'. $a['linea_base'] .'</td>
	</tr>
    </table>&nbsp; <br> &nbsp; ';

    $html4 = '<table style="width:100%; padding: 3px;" >
    <tr>
		<td style="width:40%; text-align: center; border:1px solid gray; font-size: 9px"> VARIABLE DEL INDICADOR </td>
		<td style="width:10%; text-align: center; border:1px solid gray; font-size: 9px"> UNIDAD DE MEDIDA </td>
		<td style="width:10%; text-align: center; border:1px solid gray; font-size: 9px"> TIPO DE OPERACION </td>
		<td style="width:8%; text-align: center; border:1px solid gray; font-size: 9px"> PRIMER TRIMESTRE </td>
		<td style="width:8%; text-align: center; border:1px solid gray; font-size: 9px"> SEGUNDO TRIMESTRE  </td>
		<td style="width:8%; text-align: center; border:1px solid gray; font-size: 9px"> TERCER TRIMESTRE </td>
		<td style="width:8%; text-align: center; border:1px solid gray; font-size: 9px"> CUARTO TRIMESTRE </td>
		<td style="width:8%; text-align: center; border:1px solid gray; font-size: 9px"> META ANUAL </td>
	</tr>
    <tr>
        <td style="text-align: left; border:1px solid gray; font-size: 9px">'. $a['variable_a'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['umedida_a'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['tipo_op_a'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['at1'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['at2'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['at3'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['at4'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $sumacondicionalA .' </td>
     </tr>
     <tr>
        <td style="text-align: left; border:1px solid gray; font-size: 9px">'. $a['variable_b'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['umedida_b'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['tipo_op_b'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['bt1'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['bt2'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['bt3'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px">'. $a['bt4'] .'</td>
        <td style="text-align: center; border:1px solid gray; font-size: 9px"> '. $sumacondicionalB .' </td>
     </tr>
    
    
    </table>&nbsp; <br> &nbsp;';

    $html5 = '<table style="width:100%">
    <tr>
    <td style="width:25%; text-align: left; font-size: 9px">DESCRIPCION DE LA META ANUAL :</td>
    <td style="text-align: left; font-size: 9px">'.$a['desc_meta_anual'].'</td>
    </tr>
    <tr>
    <td style="width:20%; text-align: left; font-size: 9px">MEDIOS DE VERIFICACION :</td>
    <td style="text-align: left; font-size: 9px">'.$a['medios_de_verificacion'].'</td>
    </tr>
    <tr>
    <td style="width:29%; text-align: left; font-size: 9px">METAS DE ACTIVIDAD RELACIONADAS Y AVANCES :</td>
    <td style="text-align: left; font-size: 9px">'.$a['actividades_ids'].'</td>
    </tr>
    </table>&nbsp; <br> &nbsp; <br>&nbsp;';

    $html6 = '<table style="width: 100%; text-align: center; border-spacing: 3px">
    <tr>
        
    <td style="font-size: 8px; width: 50%; border: 1px solid gray;"><br><br><br><br><br><br>'. mb_strtoupper($Director['gradoa'],'utf-8') .' '. mb_strtoupper($Director['nombre'],'utf-8') ." ". mb_strtoupper($Director['apellidos'],'utf-8') .'<br>'. mb_strtoupper($Director['cargo'],'utf-8') .'</td>
        <td style="font-size: 8px; width: 50%; border: 1px solid gray;"><br><br><br><br><br><br> '. mb_strtoupper($Directoruippe['gradoa'],'utf-8') .' '. mb_strtoupper($Directoruippe['nombre'],'utf-8') ." ". mb_strtoupper($Directoruippe['apellidos'],'utf-8') .'<br>'. mb_strtoupper($Directoruippe['cargo'],'utf-8') .'</td>
        
        <td style="font-size: 8px; width: 25%;"> </td>
    </tr>
    </table>&nbsp; <br> &nbsp; <br>&nbsp;';


$html = $html0 . $html1 . $html2 . $html3 . $html4 . $html5 . $html6;

$pdf->writeHTML($html);
}
// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('01d.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
