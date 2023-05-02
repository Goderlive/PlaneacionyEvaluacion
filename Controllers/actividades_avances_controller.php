<?php
require_once 'models/actividades_avances_modelo.php';


function TraeDependenciasController($con, $permisos){
    if($permisos['nivel'] == 1 ){
        $dependencias = TraeTodasDependencias($con, $permisos['id_usuario']);
    }
    if($permisos['nivel'] == 2){
        $dependencias = TraeDependencias($con, $permisos['id_usuario']);
    }
    return $dependencias;
}