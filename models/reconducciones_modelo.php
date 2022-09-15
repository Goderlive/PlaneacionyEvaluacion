<?php
require_once 'conection.php';

function TraerAreas($con,$dep){
    $stm = $con->query("SELECT * FROM areas WHERE id_dependencia = $dep");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function TraerActividades($con, $area){
    $stm = $con->query("SELECT * FROM actividades WHERE id_area = $area");
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}

function NombreActividad($con, $actividad){
    $stm = $con->query("SELECT * FROM actividades WHERE id_actividad = $actividad");
    $actividad = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividad;
}   

function TraeDatosReconduccion($con, $id_area){
    $stm = $con->query("SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON ar.id_proyecto = py.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    LEFT JOIN titulares t ON t.id_area = ar.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE ar.id_area = $id_area");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function ProgramaMensual($con, $actividad){
    $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $actividad");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    $data = array_slice($data, 1,-1);
    return $data;
}

function MuestraAvanceActual($con, $mes, $id_actividad){
    $stm = $con->query("SELECT * FROM avances WHERE id_actividad = $id_actividad AND mes = $mes");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function MuestraProgramacion($con, $id_actividad){
    $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $id_actividad");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function MuestraSumaProgramacion($con, $id_actividad){
    $data = MuestraProgramacion($con, $id_actividad);
    $sum = $data['enero'] + $data['febrero'] + $data['marzo'] + $data['abril'] + $data['mayo'] + $data['junio'] + $data['julio'] + $data['agosto'] + $data['septiembre'] + $data['octubre'] + $data['noviembre'] + $data['diciembre'];
    return $sum;
}

function TraeEncargados($con, $id_area, $id_dependencia){
    $stm = $con->query("SELECT * FROM titulares WHERE id_area = $id_area");
    $area = $stm->fetch(PDO::FETCH_ASSOC);
    
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $dependencia = $stm->fetch(PDO::FETCH_ASSOC);

    if ($area && $dependencia){
        $array = array();
        array_push($array, $area,$dependencia);
        return $array;
    }else{
        return 0;
    }
}

if (isset($_POST['data'])) {
    print"<pre>";
    var_dump($_POST);
    // Primero creamos la reconduccion
    $sql = "INSERT INTO reconducciones_atividades (id_area, id_solicitante, no_oficio, dep_general, dep_aux, programa) VALUES (?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($_POST['id_area'], $_POST['id_usuario'], $_POST['no_oficio'], $_POST['general'], $_POST['auxiliar'], $_POST['programa']));

    $stm = $con->query("SELECT LAST_INSERT_ID()");
    $last = $stm->fetch(PDO::FETCH_ASSOC);
    $last = $last['LAST_INSERT_ID()'];


    foreach($_POST['actividades'] as $actividad){
        $programacion_nueva = '{';
        $no_actividad = array_splice($_POST[$actividad], 0, 1);
        $no_actividad = $no_actividad[0];
        
        $descripcion_actividad = array_splice($_POST[$actividad], 0, 1);
        $descripcion_actividad = $descripcion_actividad[0];
        
        $unidad_medida = array_splice($_POST[$actividad], 0, 1);
        $unidad_medida = $unidad_medida[0];
        

        $stm = $con->query("SELECT SUM(avance) FROM avances WHERE id_actividad = $actividad");
        $avance_actual = $stm->fetch(PDO::FETCH_ASSOC);
        $avance_actual = $avance_actual['SUM(avance)'];
        
        $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $actividad");
        $old_programacion = $stm->fetch(PDO::FETCH_ASSOC);
        $old_programacion = array_slice($old_programacion, 1);
        $old_programacion = array_slice($old_programacion, 0,-1);

        $programacion_old = "";
        $suma_old = 0;
        foreach ($old_programacion as $old){
            $programacion_old .= '"'.$old . '", '; 
            $suma_old += $old;
        }
        $programacion_old = substr($programacion_old, 0, -2);
        $programacion_old .= "";

        $programacion_nueva = "";
        $programacion_anual_nueva = 0;
        $contador = 0;
        $justificacion = end($_POST[$actividad]);
        array_pop($_POST[$actividad]);
        foreach($_POST[$actividad] as $prog){
            $programacion_nueva .= '"'.$prog .'", '; 
            $programacion_anual_nueva += $prog;
        } 
        $programacion_nueva = substr($programacion_nueva, 0, -2);
        
        $sql = "INSERT INTO programacion_reconducciones (id_reconduccion, id_actividad, no_actividad, desc_actividad, u_medida, meta_anual_anterior, meta_anual_actual, act_realizadas_sofar, programacion_inicial, programacion_final, justificacion) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($last, $actividad, $no_actividad, $descripcion_actividad, $unidad_medida, $suma_old, $programacion_anual_nueva, $avance_actual, $programacion_old, $programacion_nueva, $justificacion));
        header("Location: ../actividades.php");
        
    }  
}
?>