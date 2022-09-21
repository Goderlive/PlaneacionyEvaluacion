<?php
require_once 'conection.php';


function TraeUsuario($con, $id_usuario){
    $stm = $con->query("SELECT * FROM indicadores_uso iu LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador WHERE iu.anio = $anio AND id_dependencia = '$id_dependencia'  AND (periodicidad = 'trimestral' OR periodicidad = 'mensual'");
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}
