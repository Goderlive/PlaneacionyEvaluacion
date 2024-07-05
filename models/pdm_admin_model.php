<?php
require_once 'conection.php';

function traeProgramas($con, $id_dependencia){
    $sentencia = "SELECT * FROM diagnosticoPrograma di 
    LEFT JOIN dependencias de ON de.id_dependencia = di.id_dependencia
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = di.id_programa
    WHERE di.id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    $programas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $programas;
}




function NombrePrograma($con, $id_programa){
    $sentencia = "SELECT * FROM programas_presupuestarios pp
    LEFT JOIN pilaresyejes pe ON pe.id_pilaroeje = pp.id_pilaryeje
    WHERE id_programa = $id_programa";
    $stm = $con->query($sentencia);
    $programas = $stm->fetch(PDO::FETCH_ASSOC);
    return $programas;
}


if($_POST){
    if ($_SESSION['sistema'] != 'pbrm') {
        header("Location: ../login.php");
        die();
    }


    $anio = $_SESSION['anio'];

    print '<pre>';
    var_dump($_POST);
    die();
}