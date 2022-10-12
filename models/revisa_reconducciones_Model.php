<?php
require_once 'conection.php';

function FetchAll($con, $sentencia){
    $stm = $con->query($sentencia);
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}


function Fetch($con, $sentencia){
    $stm = $con->query($sentencia);
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function TraeTodasReconduccionesActividades($con){
    $sql = "SELECT * FROM reconducciones_atividades ra
        LEFT JOIN areas ar ON ar.id_area = ra.id_area
        LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
        WHERE ra.validado != 1";
    $stm = $con->query($sql);
    $reconducciones_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconducciones_actividades;
}

function CalendarizacionesdeReconduccionAct($con, $id_reconduccion){
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

function TraeNombreArea($con, $id_area){
    $sentencia = "SELECT * FROM dependencias d
    LEFT JOIN areas a ON d.id_dependencia = a.id_dependencia
    WHERE a.id_area = $id_area";
    return Fetch($con, $sentencia);
}


 
if(isset($_POST) && $_POST){
    session_start();
    if (isset($_POST['valida_reconduccion_act'])) {
        //vamos haciendo anotaciones o no nos sale
        
        
        //Buscamos la reconduccion a sacar
        $id_reconduccion = $_POST['reconduccion'];

        $reconduccion = Fetch($con, "SELECT * FROM reconducciones_atividades WHERE id_reconduccion_actividades");
        // Ya que tenemos la reconduccion, vamos a cambiarla a activa.
       
        // Traemos las programaciones afectadas por la reconduccion
        $programaciones = FetchAll($con, "SELECT * FROM programacion_reconducciones WHERE id_reconduccion = $id_reconduccion");
        

        // ******* lo primero que hay que hacer es respaldar los datos que vamos a eliminar
        // ** armamos el array
        foreach($programaciones as $a){
            //limpiamos la programacion inicial y la ponemos en un array
            $prog_inicial = str_replace('"', '', $a['programacion_inicial']);
            $prog_inicial = str_replace(' ', '', $prog_inicial);
            $array_programacion_inicial = explode(",", $prog_inicial);
            
            //agregamos el id y lo demas...
            array_push($array_programacion_inicial, $a['id_actividad'], $a['txt_creacion']);

            //Gardamos en la tabla de cosas eliminadas
            $sql = "INSERT INTO programaciones_eliminadas (enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,id_actividad,creacion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            $sqlr->execute($array_programacion_inicial);

            //armamos la nueva programacion
            $prog_final = str_replace('"', '', $a['programacion_final']);
            $prog_final = str_replace(' ', '', $prog_final);
            $array_programacion_final = explode(",", $prog_final);


            //Ahora Guardamos la nueva programación 
            $ene_fin = $array_programacion_final[0];
            $feb_fin = $array_programacion_final[1];
            $mar_fin = $array_programacion_final[2];
            $abr_fin = $array_programacion_final[3];
            $may_fin = $array_programacion_final[4];
            $jun_fin = $array_programacion_final[5];
            $jul_fin = $array_programacion_final[6];
            $ago_fin = $array_programacion_final[7];
            $sep_fin = $array_programacion_final[8];
            $oct_fin = $array_programacion_final[9];
            $nov_fin = $array_programacion_final[10];
            $dic_fin = $array_programacion_final[11];

            try {
                $id_actividad = $a['id_actividad'];
                $sql = "UPDATE programaciones SET 
                enero = $ene_fin,
                febrero = $feb_fin,
                marzo = $mar_fin,
                abril = $abr_fin,
                mayo = $may_fin,
                junio = $jun_fin,
                julio = $jul_fin,
                agosto = $ago_fin,
                septiembre = $sep_fin,
                octubre = $oct_fin,
                noviembre = $nov_fin,
                diciembre = $dic_fin
                WHERE id_actividad = $id_actividad";
              
                // Prepare statement
                $stmt = $con->prepare($sql);
              
                // execute the query
                $stmt->execute();
              
                // echo a message to say the UPDATE succeeded
                echo $stmt->rowCount() . " Se actualizo la reconduccion nueva";
              } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
              }
      
        }
            // Por ultimo, actualizamos la reconduccion con los datos como VALIDADA
        try {
            $id_usuario = $_SESSION['id_usuario'];
            $sql = "UPDATE reconducciones_atividades SET validado = 1, id_validador = $id_usuario, fecha_validacion = NOW() WHERE id_reconduccion_actividades = $id_reconduccion";
          
            // Prepare statement
            $stmt = $con->prepare($sql);
          
            // execute the query
            $stmt->execute();
          
            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " Se Actualizo el status de la reconduccion";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }


        header("Location: ../reconduccion_actividades.php");
    }
}







?>