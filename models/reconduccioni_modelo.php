<?php
require_once 'conection.php';

function FetchAll($con, $string){
    try {
        $stm = $con->query($string);
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th) {
        print $th;
        print $data;
    }
}

function Fetch($con, $string){
    try {
        $stm = $con->query($string);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th) {
        print $th;
        print $data;
    }
}


function TraeIndicadores($con, $id_dependencia){
        $resp = FetchAll($con, "SELECT * FROM indicadores_uso 
        WHERE id_dependencia = $id_dependencia");
        return $resp;
}


function TraeReconduccionesporvalidar($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM reconducciones_indicadores ri
    JOIN dependencias d ON ri.id_dependencia = d.id_dependencia
    WHERE d.id_dependencia = $id_dependencia AND ri.validado != 1");
    $reconduccion = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconduccion;
}

function TraeReconduccionesValidadas($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM reconducciones_indicadores ri
    JOIN dependencias d ON ri.id_dependencia = d.id_dependencia
    WHERE d.id_dependencia = $id_dependencia AND ri.validado = 1");
    $reconduccion = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconduccion;
}


function TraeDatosIndicador($con, $id_indicador){
    $sentencia = "SELECT *,  FROM indicadores_uso iu
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = iu.id_dep_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
    LEFT JOIN proyectos py ON iu.id_proyecto = py.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    LEFT JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
    WHERE id = $id_indicador";
    $resp = Fetch($con, $sentencia); 
    return $resp;
}

function TraeEncargados($con, $id_area, $id_dependencia){    
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $dependencia = $stm->fetch(PDO::FETCH_ASSOC);

    return $dependencia;
}


if(isset($_POST['reconduccionindicadores'])){
    print "<pre>";
    var_dump($_POST);
    die();

    $no_oficio = $_POST['no_oficio']; 
    $dep_general = $_POST['dep_general']; 
    $dep_aux = $_POST['dep_aux']; 
    $programa_p = $_POST['programa_p']; 
    $objetivo = $_POST['objetivo_pp']; 
    $proyecto = $_POST['proyecto']; 
    $proyecto_name = $_POST['proyecto_name']; 
    $niv_mir = $_POST['niv_mir']; 
    $nombre_indicador = $_POST['nombre_indicador']; 
    $variables_indicador = $_POST['variables_indicador']; 
    $unidad_medida = $_POST['unidad_medida']; 
    $tipos_operacion = $_POST['tipos_operacion']; 
    $programacion_inicial = $_POST['programacion_inicial']; 
    $avance = $_POST['avance']; 
    $programacion_modificada = $_POST['programacion_modificada']; 
    $calendario_trimestral = $_POST['calendario_trimestral']; 
    $justificacion_impacto = $_POST['justificacion_impacto']; 
    $id_dependencia = $_POST['id_dependencia']; 
    $validado = $_POST['validado']; 
    $id_validado = $_POST['id_validado']; 
    
    $tipo_movimiento = $_POST['tipo_movimiento']; 
}
?>