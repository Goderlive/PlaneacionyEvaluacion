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



function traeCampos($con, $id_programa, $id_dependencia){
    $sentencia = "SELECT * FROM actualizacionFoda WHERE id_programa_presupuestario = $id_programa AND id_dependencia_responsable = $id_dependencia ";
    $stm = $con->query($sentencia);
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
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

    $id_programa = $_POST['id_programa'];
    $id_dependencia = $_POST['id_dependencia'];
    $diagnostico = $_POST['diagnostico'];
    $informe = $_POST['informe'];
    
    $vdiagnostico = "";
    $vinforme= "";
    if($_POST['trimestre'] == 1){
        $vdiagnostico= "1t_txt";
        $vinforme = "i1t_txt";
    }
    if($_POST['trimestre'] == 2){
        $vdiagnostico= "2t_txt";
        $vinforme = "i2t_txt";
    }
    if($_POST['trimestre'] == 3){
        $vdiagnostico= "3t_txt";
        $vinforme = "i3t_txt";
    }
    if($_POST['trimestre'] == 4){
        $vdiagnostico= "4t_txt";
        $vinforme = "i4t_txt";
    }


    $sql = "UPDATE actualizacionFoda SET $vdiagnostico = ?, $vinforme = ? WHERE id_programa_presupuestario = ? AND id_dependencia_responsable = ?";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($diagnostico, $informe, $id_programa, $id_dependencia));
    
}