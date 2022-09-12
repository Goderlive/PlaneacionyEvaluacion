<?php
require_once 'conection.php';
function TraerTesorero($con, $id_tesorero){
    $stm = $con->query("SELECT * FROM setings a 
    JOIN titulares t ON t.id_titular = a.id_tesorero
    WHERE a.id_tesorero = $id_tesorero");
    $tesorero = $stm->fetch(PDO::FETCH_ASSOC);
    return $tesorero;
}

function TraerUippe($con, $id_uippe){
    $stm = $con->query("SELECT * FROM setings a
    JOIN titulares t ON t.id_titular = a.id_uippe
    WHERE a.id_uippe = $id_uippe");
    $uippe = $stm->fetch(PDO::FETCH_ASSOC);
    return $uippe;
}



function TraeAjustes($con){
    $stm = $con->query("SELECT * FROM setings");
    $ajustes = $stm->fetch(PDO::FETCH_ASSOC);
    return $ajustes;
}
?>