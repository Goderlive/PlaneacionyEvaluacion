<?php
require_once 'conection.php';

function TraeReconduccionesporvalidarInd($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM reconducciones_indicadores ri 
    LEFT JOIN dependencias dp ON dp.id_dependencia = ri.id_dependencia
    WHERE dp.id_dependencia = $id_dependencia AND ri.validado != 1");
    $reconduccion = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconduccion;
}



function TraeReconduccionesValidadasInd($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM reconducciones_indicadores ri 
    LEFT JOIN dependencias dp ON dp.id_dependencia = ri.id_dependencia
    WHERE dp.id_dependencia = $id_dependencia AND ri.validado = 1");
    $reconduccion = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconduccion;
}


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


function TraeDependencias($con, $id_usuario){
    $stm = $con->query("SELECT * FROM dependencias dp
    JOIN indicadores_uso iu ON iu.id_dependencia = dp.id_dependencia 
    WHERE id_administrador = $id_usuario
    GROUP BY dp.id_dependencia
    ");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}

function TraeTodasDependencias($con){
    $stm = $con->query("SELECT * FROM dependencias dp
    JOIN indicadores_uso iu ON iu.id_dependencia = dp.id_dependencia 
    GROUP BY dp.id_dependencia
    ");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($dependencias);
    return $dependencias;
}




function TraeDatosIndicador($con, $id_indicador){
    $sentencia = "SELECT *  FROM indicadores_uso iu
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
    session_start();
    if($_SESSION['sistema'] != "pbrm"){
        header("Location: ../login.php");
        die();
    }
    $no_oficio = $_POST['no_oficio'];
    $dep_general = $_POST['dep_general'];
    $dep_aux = $_POST['dep_aux'];
    $programa_p = $_POST['programa_p'];
    $objetivo = $_POST['objetivo_pp'];
    $proyecto = $_POST['proyecto'];
    $proyecto_name = $_POST['proyecto_name'];
    $id_indicador = $_POST['id_indicador'];
    $nombre_indicador = $_POST['nombre_indicador'];
    $id_reporta = $_POST['id_reporta'];
    $variable_a = isset($_POST['variable_a']) ? $_POST['variable_a'] : NULL;
    $variable_b = isset($_POST['variable_b']) ? $_POST['variable_b'] : NULL;
    $variable_c = isset($_POST['variable_c']) ? $_POST['variable_c'] : NULL;
    $tipo_op_a = isset($_POST['tipo_op_a']) ? $_POST['tipo_op_a'] : NULL;
    $tipo_op_b = isset($_POST['tipo_op_b']) ? $_POST['tipo_op_b'] : NULL;
    $tipo_op_c = isset($_POST['tipo_op_c']) ? $_POST['tipo_op_c'] : NULL;
    $umedida_a = isset($_POST['umedida_a']) ? $_POST['umedida_a'] : NULL;
    $umedida_b = isset($_POST['umedida_b']) ? $_POST['umedida_b'] : NULL;
    $umedida_c = isset($_POST['umedida_c']) ? $_POST['umedida_c'] : NULL;
    $programacion_modificada_a = $_POST['at1'] . "|" . $_POST['at2'] . "|" . $_POST['at3'] . "|" . $_POST['at4'];
    $programacion_modificada_b = $_POST['bt1'] . "|" . $_POST['bt2'] . "|" . $_POST['bt3'] . "|" . $_POST['bt4']; 
    $programacion_modificada_c = $_POST['ct1'] . "|" . $_POST['ct2'] . "|" . $_POST['ct3'] . "|" . $_POST['ct4']; 
    $justificacion_impacto = $_POST['justificacion'];
    $id_dependencia = $_POST['id_dependencia'];

    $sqlold = "SELECT * FROM indicadores_uso WHERE id = $id_indicador";
    $oldprog = Fetch($con, $sqlold);
    
    $programacion_inicial_a = $oldprog['at1'] . "|" . $oldprog['at2'] . "|" . $oldprog['at3'] . "|" . $oldprog['at4'];
    $programacion_inicial_b = $oldprog['bt1'] . "|" . $oldprog['bt2'] . "|" . $oldprog['bt3'] . "|" . $oldprog['bt4'];
    $programacion_inicial_c = $oldprog['ct1'] . "|" . $oldprog['ct2'] . "|" . $oldprog['ct3'] . "|" . $oldprog['ct4'];
    

    $sqlav = "SELECT * FROM avances_indicadores WHERE id_indicador = $id_indicador";
    $avances = FetchAll($con, $sqlav);
    if($avances){
        $asum = 0;
        $bsum = 0;
        $csum = 0;
        foreach($avances as $a){
            $asum += (isset($a['avance_a']) ? intval($a['avance_a']) : 0);
            $bsum += (isset($a['avance_b']) ? intval($a['avance_b']) : 0);
            $csum += (isset($a['avance_c']) ? intval($a['avance_c']) : 0);
        }
            $avance_a = $asum;
            $avance_b = $bsum;
            $avance_c = $csum;
    }else{
        $avance_a = 0;
        $avance_b = 0;
        $avance_c = 0;
    }

    $tipo_movimiento = "Reconduccion de indicadores";


    try {
        $sql = "INSERT INTO reconducciones_indicadores 
        (no_oficio, tipo_movimiento, dep_general, dep_aux, programa_p, objetivo, proyecto, proyecto_name, id_indicador, nombre_indicador, id_reporta, variable_a, variable_b, variable_c, tipo_op_a, tipo_op_b, tipo_op_c, umedida_a, umedida_b, umedida_c, programacion_inicial_a, programacion_inicial_b, programacion_inicial_c, avance_a, avance_b, avance_c, programacion_modificada_a, programacion_modificada_b, programacion_modificada_c, justificacion_impacto, id_dependencia) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($no_oficio, $tipo_movimiento, $dep_general, $dep_aux, $programa_p, $objetivo, $proyecto, $proyecto_name, $id_indicador, $nombre_indicador, $id_reporta, $variable_a, $variable_b, $variable_c, $tipo_op_a, $tipo_op_b, $tipo_op_c, $umedida_a, $umedida_b, $umedida_c, $programacion_inicial_a, $programacion_inicial_b, $programacion_inicial_c, $avance_a, $avance_b, $avance_c, $programacion_modificada_a, $programacion_modificada_b, $programacion_modificada_c, $justificacion_impacto, $id_dependencia));
        header("Location: ../reconduccion_indicadores.php");
      } catch (Exception $e) {
        // Manejo de la excepción, por ejemplo:
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        die();
        }
}
?>