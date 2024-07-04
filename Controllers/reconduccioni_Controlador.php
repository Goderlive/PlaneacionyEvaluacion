<?php
require_once 'models/reconduccioni_modelo.php';


function TraeDependenciasController($con, $permisos){
    $anio = $permisos['anio'];
    if($permisos['nivel'] == 1 ){
        $dependencias = TraeTodasDependencias($con, $anio);
    }
    if($permisos['nivel'] == 2){
        $dependencias = TraeDependencias($con, $permisos['id_usuario'], $anio);
    }
    return $dependencias;
}