<?php
require_once 'conection.php';
session_start();
if($_SESSION['sistema'] != "pbrm"){
    header("Location: ../login.php");
    die();
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
    $programacion_modificada_a = isset($_POST['at1']) . "|" . isset($_POST['at2']) . "|" . isset($_POST['at3']) . "|" . isset($_POST['at4']);
    $programacion_modificada_b = isset($_POST['bt1']) . "|" . isset($_POST['bt2']) . "|" . isset($_POST['bt3']) . "|" . isset($_POST['bt4']); 
    $programacion_modificada_c = isset($_POST['ct1']) . "|" . isset($_POST['ct2']) . "|" . isset($_POST['ct3']) . "|" . isset($_POST['ct4']); 
    $justificacion_impacto = $_POST['justificacion'];
    $id_dependencia = $_POST['id_dependencia'];

    $sqlold = "SELECT * FROM indicadores_uso WHERE id = $id_indicador";
    $oldprog = Fetch($con, $sqlold);
    
    $programacion_inicial_a = isset($oldprog['at1']) . "|" . isset($oldprog['at2']) . "|" . isset($oldprog['at3']) . "|" . isset($oldprog['at4']);
    $programacion_inicial_b = isset($oldprog['bt1']) . "|" . isset($oldprog['bt2']) . "|" . isset($oldprog['bt3']) . "|" . isset($oldprog['bt4']);
    $programacion_inicial_c = isset($oldprog['ct1']) . "|" . isset($oldprog['ct2']) . "|" . isset($oldprog['ct3']) . "|" . isset($oldprog['ct4']);
    var_dump($programacion_inicial_c);
    

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


    print '<pre>';
    print "- " . $oldprog['ct1'];
    print "- " . $oldprog['ct2'];
    print "- " . $oldprog['ct3'];
    print "- " . $oldprog['ct4'];
    die();
    $tipo_movimiento = "Reconduccion de indicadores";


    try {
        $sql = "INSERT INTO reconducciones_indicadores 
        (no_oficio, tipo_movimiento, dep_general, dep_aux, programa_p, objetivo, proyecto, proyecto_name, id_indicador, nombre_indicador, id_reporta, variable_a, variable_b, variable_c, tipo_op_a, tipo_op_b, tipo_op_c, umedida_a, umedida_b, umedida_c, programacion_inicial_a, programacion_inicial_b, programacion_inicial_c, avance_a, avance_b, avance_c, programacion_modificada_a, programacion_modificada_b, programacion_modificada_c, justificacion_impacto, id_dependencia) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($no_oficio, $tipo_movimiento, $dep_general, $dep_aux, $programa_p, $objetivo, $proyecto, $proyecto_name, $id_indicador, $nombre_indicador, $id_reporta, $variable_a, $variable_b, $variable_c, $tipo_op_a, $tipo_op_b, $tipo_op_c, $umedida_a, $umedida_b, $umedida_c, $programacion_inicial_a, $programacion_inicial_b, $programacion_inicial_c, $avance_a, $avance_b, $avance_c, $programacion_modificada_a, $programacion_modificada_b, $programacion_modificada_c, $justificacion_impacto, $id_dependencia));
        header("Location: ../indicadores.php");
      } catch (Exception $e) {
        // Manejo de la excepción, por ejemplo:
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        die();
        }
}
?>