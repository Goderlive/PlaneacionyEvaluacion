<?php
require_once 'conection.php';

function TraeUnidadesMedida($con){
    $stm = $con->query("SELECT * FROM unidades_medida ORDER BY nombre_unidad ASC");
    $unidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $unidades;
}



function TraeIndividual($con, $id_unidad){
    $stm = $con->query("SELECT * FROM unidades_medida WHERE id_unidad = $id_unidad");
    $unidad = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $unidad;
}



if($_POST){
    if(isset($_POST['eliminar']) && $_POST['eliminar']){
        
    }
    if(isset($_POST['actualizar']) && $_POST['actualizar']){
        
    }
}