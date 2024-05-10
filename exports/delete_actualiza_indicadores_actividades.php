<?php
require_once '../models/conection.php';


$sentencia = "SELECT * FROM ante_indicadores_uso";
$stm = $con->query($sentencia);
$ante_indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);

$sentencia = "SELECT * FROM indicadores_uso iu
LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
WHERE iu.anio = '2024'";
$stm = $con->query($sentencia);
$indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);



foreach ($ante_indicadores as $i) {
    $elarry = json_decode($i['actividades_ids']);
    if ($elarry && count($elarry) > 0) {
        if ($elarry[0] == 'Seleccione las Actividades') {
            array_shift($elarry);
        }
    }


    $super_porcentaje_indicador = 90;
    $foundind = 0;
    foreach($indicadores as $ind) {
        similar_text(mb_strtoupper($ind['nombre']), mb_strtoupper($i['nombre_indicador']), $porcentaje);
        if ($porcentaje > $super_porcentaje_indicador) {
            $super_porcentaje_indicador = $porcentaje;
            $foundind = $ind;
        }
    }

    if($foundind == 0){
        print "no se encontro";
    }


    
    $id_indicador = $foundind['id'];
    if ($elarry && count($elarry) > 0) {

        foreach($elarry as $el){
            $stm = $con->query("SELECT id_actividad FROM actividades WHERE id_actividad_seguimiento = $el");
            if($n_id_actividad = $stm->fetch(PDO::FETCH_ASSOC)){
                $n_id_actividad = $n_id_actividad['id_actividad'];
                $sql_editar = "INSERT INTO indicadores_actividades (id_indicador_uso, id_actividad_actividades) VALUES ($id_indicador, $n_id_actividad)";
                $sentencia_agregar = $con->prepare($sql_editar);
                $sentencia_agregar->execute();
            }
        }
    }
}
