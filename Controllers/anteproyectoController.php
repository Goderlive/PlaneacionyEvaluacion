<?php 
require_once 'models/anteproyectoModel.php';



function boton1b($con, $id_dependencia){
    $areas = traeAreasUnoB($con, $id_dependencia);
    $total = count($areas);
    $contador = 0;
    foreach($areas as $a){
        if($a['diagnostico_fortaleza'] && $a['diagnostico_oportunidad'] && $a['diagnostico_debilidad'] && $a['diagnostico_amenaza'] && $a['estrategia'] && $a['id_ods'] && $a['linea_accion']){
            $contador += 1;
        }
    }
    if($contador == $total){
        return '
        <form action="sources\TCPDF-main\examples\ante_01b.php" method="post">
        <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">01b</button>
        </form>
        ';
    }else{
        return ' <button type="button" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>01b</button>';
    }

}


function boton01c($con, $id_dependencia){
    $actividades = traeAreeasUnoC($con, $id_dependencia);
    $total = count($actividades);
    $contador = 0;
    foreach($actividades as $a){
        if($a['validado'] == 1){
            $contador += 1;
        }
    }
    if($contador == $total){
        return '
        <form action="sources\TCPDF-main\examples\ante_01c.php" method="post">
            <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">01c</button>
        </form>
        ';
    }else{
        return ' <button type="button" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>01c</button>';
    }
}


function boton01d($con, $id_dependencia){
    $indicadores = traeAnteIndicadores($con, $id_dependencia);
    $total = count($indicadores);
    $contador = 0;
    foreach($indicadores as $a){
        if($a['validado'] == 1){
            $contador += 1;
        }
    }
    if($contador == $total){
        return '
        <form action="sources\TCPDF-main\examples\ante_01d.php" method="post">
            <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">01d</button>
        </form>
        ';
    }else{
        return ' <button type="button" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>01d</button>';
    }
}


function boton02a($con, $id_dependencia){
    $actividades = traeAreeas02a($con, $id_dependencia);
    $total = count($actividades);
    $contador = 0;
    foreach($actividades as $a){
        if($a['validado'] == 1){
            $contador += 1;
        }
    }
    if($contador == $total){
        return '
        <form action="sources\TCPDF-main\examples\ante_02a.php" method="post">
            <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">02a</button>
        </form>
        ';
    }else{
        return ' <button type="button" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>02a</button>';
    }
}

function controller_ante_actividadesValidadas($con, $id_area){
    $actividades = ante_actividadesValidadas($con, $id_area);
    $total = count($actividades);
    $contador = 0;
    foreach($actividades as $a){
        if($a['validado'] == 1){
            $contador += 1;
        }
    }
    if($contador == $total){
        return 1;
    }
}




?>