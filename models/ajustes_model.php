<?php
require_once 'conection.php';
function TraerTesoreria($con, $id_tesoreria){
    $stm = $con->query("SELECT * FROM setings a 
    JOIN titulares t ON t.id_titular = a.id_tesoreria
    WHERE a.id_tesoreria = $id_tesoreria");
    $tesoreria = $stm->fetch(PDO::FETCH_ASSOC);
    return $tesoreria;
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


function TraeDirectores($con){
    $stm = $con->query("SELECT * FROM titulares");
    $titulares = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $titulares;
}

if($_POST){
    var_dump($_POST);
    session_start();
    if($_SESSION['sistema'] != 'pbrm'){
        header("Location: ../login.php");
        die();
    }

    if(isset($_POST['agregar'])){
        if(isset($_POST['id_uippe']) && $_POST['id_uippe']){
            $id_uippe = $_POST['id_uippe'];
            $sql = "UPDATE setings SET id_uippe = $id_uippe WHERE id_setings =1";
        }elseif(isset($_POST['id_teso']) && $_POST['id_teso']){
            $id_tesoreria = $_POST['id_teso'];
            $sql = "UPDATE setings SET id_tesoreria = $id_tesoreria WHERE id_setings =1";
        }
        $sqlr = $con->prepare($sql);
        $sqlr->execute();
        header("Location: ../ajustes.php");
    }


    if($_POST['delete']){
        if(isset($_POST['uippe']) && $_POST['uippe']){
            $id_uippe = $_POST['id_uippe'];
            $sql = "UPDATE setings SET id_uippe = NULL";
        }elseif(isset($_POST['teso']) && $_POST['teso']){
            $id_tesoreria = $_POST['id_teso'];
            $sql = "UPDATE setings SET id_tesoreria = NULL";
        }
        $sqlr = $con->prepare($sql);
        $sqlr->execute();
        header("Location: ../ajustes.php");
    }
}


?>