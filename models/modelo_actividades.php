<?php
require_once 'conection.php';

function Fetch($con, $sentence){
    $stm = $con->query($sentence);
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function areas_con($con, $dep, $anio){
    $sql = "SELECT * FROM areas a
        INNER JOIN dependencias_generales dp ON a.id_dependencia = dp.id_dependencia
        INNER JOIN dependencias_auxiliares da ON a.id_dependencia_aux = da.id_dependencia_auxiliar
        INNER JOIN proyectos py ON a.id_proyecto = py.id_proyecto
        WHERE a.id_dependencia = $dep AND a.anio = $anio";
    $stm = $con->query($sql);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function dependencias($con, $anio){
    $stm = $con->query("SELECT * FROM dependencias WHERE anio = $anio");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}


function TraeUnidades_Medida($con){
    $sql = "SELECT * FROM unidades_medida"; 
    $stm = $con->query($sql);
    $unidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $unidades;
}



if(isset($_POST)){
    if(isset($_POST['guardar'])){
        session_start();
        $id_area = $_POST['id_area'];
        $usuario = $_SESSION['id_usuario'];

        $nombre_actividad = $_POST['nombre_actividad'];
        $id_unidad = $_POST['id_unidad'];
        
        // Verificamos si hay anteriores
        $ultimo = Fetch($con, "SELECT * FROM actividades WHERE id_area = $id_area ORDER BY codigo_actividad DESC LIMIT 1;");
        if($ultimo){
            $numero = $ultimo + 1;
        }else{
            $numero = 1;
        }


        $sql = "INSERT INTO actividades (codigo_actividad,nombre_actividad,id_unidad,id_area,id_creacion) VALUES (?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($numero, $nombre_actividad, $id_unidad. $id_area, $usuario));
    }

}
?>