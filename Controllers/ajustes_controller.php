<?php
require_once 'models/ajustes_model.php';

function ListadeTitulares($titulares){
    $lista = '<option value="">Selecciona un Titular</option>';
    foreach ($titulares as $titular) {
        $lista .= '<option value="'. $titular['id_titular'] .'">'. $titular['nombre'] . " " . $titular['apellidos'] .'</option>';
    }
    return $lista;
}

?>
