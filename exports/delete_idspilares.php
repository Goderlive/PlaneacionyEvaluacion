<?php
session_start();
require_once '../models/conection.php';

$sentencia = "SELECT * FROM programas_presupuestarios";
$stm = $con->query($sentencia);
$programas = $stm->fetchAll(PDO::FETCH_ASSOC);

$sentencia = "SELECT * FROM pilaresyejes";
$stm = $con->query($sentencia);
$pilaresyejes = $stm->fetchAll(PDO::FETCH_ASSOC);



foreach ($programas as $p) {
    $pilaroeje = $p['pilar_o_eje'];
    $encontrado = 0;

    foreach ($pilaresyejes as $e) {
        $pilaryeje = $e['nombre_pilaoeje'];

        similar_text($pilaroeje, $pilaryeje, $percent_nombre);

        if ($percent_nombre > 80) {
            $encontrado = $e;
        }
    }
    if ($encontrado != 0) {
        $id_programa = $p['id_programa'];
        $id = $encontrado['id_pilaroeje'];
        $sql = "UPDATE programas_presupuestarios SET id_pilaryeje = ? WHERE id_programa = $id_programa";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($id));
    } else {
        print $p['id_programa'] .  "No encontrado <br>";
    }
}
