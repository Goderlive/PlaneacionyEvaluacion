<?php
require_once 'conection.php';


function TraeTodasReconduccionesActividades($con){
    $sql = "SELECT * FROM reconducciones_atividades ra
        LEFT JOIN areas ar ON ar.id_area = ra.id_area
        LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
        WHERE ra.validado != 1";
    $stm = $con->query($sql);
    $reconducciones_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconducciones_actividades;
}

function CalendarizacionesdeReconduccion($con, $id_reconduccion){
    $sql = "SELECT * FROM programacion_reconducciones WHERE id_reconduccion = $id_reconduccion";
    $stm = $con->query($sql);
    $programacion_nueva = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $programacion_nueva;
}


function datosdeActividad($con, $id_actividad){
    $stm = $con->query("SELECT * FROM actividades WHERE id_actividad = $id_actividad");
    $dataActividad = $stm->fetch(PDO::FETCH_ASSOC);
    return $dataActividad;
}



if (isset($_POST['valida'])) {
    //vamos haciendo anotaciones o no nos sale
    //Buscamos la reconduccion a sacar
    
    $id_reconduccion = $_POST;

    var_dump($id_reconduccion);

    die();
    //lo primero que hay que hacer es respaldar los datos que vamos a eliminar
    $sql = "INSERT INTO programaciones_eliminadas 
    (enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,id_actividad,creacion) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute();

    header("Location: ../mi_perfil.php");
}

?>