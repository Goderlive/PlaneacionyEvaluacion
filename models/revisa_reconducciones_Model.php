<?php
require_once 'conection.php';

function FetchAll($con, $sentencia)
{
    $stm = $con->query($sentencia);
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}


function Fetch($con, $sentencia)
{
    $stm = $con->query($sentencia);
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function TraeTodasReconduccionesActividades($con)
{
    $sql = "SELECT * FROM reconducciones_atividades ra
        LEFT JOIN areas ar ON ar.id_area = ra.id_area
        LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
        WHERE ra.validado != 1";
    $stm = $con->query($sql);
    $reconducciones_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconducciones_actividades;
}

function CalendarizacionesdeReconduccionAct($con, $id_reconduccion)
{
    $sql = "SELECT * FROM programacion_reconducciones WHERE id_reconduccion = $id_reconduccion";
    $stm = $con->query($sql);
    $programacion_nueva = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $programacion_nueva;
}


function datosdeActividad($con, $id_actividad)
{
    $stm = $con->query("SELECT * FROM actividades WHERE id_actividad = $id_actividad");
    $dataActividad = $stm->fetch(PDO::FETCH_ASSOC);
    return $dataActividad;
}

function TraeNombreArea($con, $id_area)
{
    $sentencia = "SELECT * FROM dependencias d
    LEFT JOIN areas a ON d.id_dependencia = a.id_dependencia
    WHERE a.id_area = $id_area";
    return Fetch($con, $sentencia);
}

function NombreArea($con, $id_area)
{
    $sentencia = "SELECT * FROM areas WHERE id_area = $id_area";
    return Fetch($con, $sentencia);
}



function TraeTodasReconduccionesIndicadores($con)
{
    $sql = "SELECT * FROM reconducciones_indicadores ri
        LEFT JOIN dependencias dp ON dp.id_dependencia = ri.id_dependencia
        LEFT JOIN usuarios us ON us.id_usuario = ri.id_reporta
        WHERE ri.validado != 1";
    $stm = $con->query($sql);
    $reconducciones_indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconducciones_indicadores;
}

function TraeOriginalIndicador($con, $id_indicador)
{
    $sql = "SELECT * FROM indicadores_uso  WHERE id = $id_indicador ";
    $stm = $con->query($sql);
    $indicador_original = $stm->fetch(PDO::FETCH_ASSOC);
    return $indicador_original;
}



if (isset($_POST['cancela_reconduccion_act']) && $_POST['cancela_reconduccion_act'] == "cancelar") {
    session_start();
    if ($_SESSION['sistema'] != "pbrm") {
        header("Location: ../login.php");
        die();
    }
    if (isset($_POST['id_reconduccion'])) {
        $id_reconduccion = filter_var($_POST['id_reconduccion'], FILTER_SANITIZE_NUMBER_INT);
        if ($id_reconduccion === false) {
            echo "El ID proporcionado no es válido.";
            exit;
        }
    } else {
        echo "No se proporcionó ningún ID.";
        exit;
    }

    $consulta = $con->prepare("DELETE FROM reconducciones_atividades WHERE id_reconduccion_actividades = :id_reconduccion");

    // Enlazar el valor a los marcadores de posición
    $consulta->bindParam(':id_reconduccion', $id_reconduccion);

    // Ejecutar la sentencia de eliminación
    $consulta->execute();
    header("Location: ../revisa_reconducciones.php?type=actividades");
}



if (isset($_POST['cancelarreconduccionindicadores']) && $_POST['cancelarreconduccionindicadores'] == "cancelar") {
    session_start();
    if ($_SESSION['sistema'] != "pbrm") {
        header("Location: ../login.php");
        die();
    }
    if (isset($_POST['id_reconduccion'])) {
        $id_reconduccion = filter_var($_POST['id_reconduccion'], FILTER_SANITIZE_NUMBER_INT);
        if ($id_reconduccion === false) {
            echo "El ID proporcionado no es válido.";
            exit;
        }
    } else {
        echo "No se proporcionó ningún ID.";
        exit;
    }

    $consulta = $con->prepare("DELETE FROM reconducciones_indicadores WHERE id_reconduccion_indicadores = :id_reconduccion");

    // Enlazar el valor a los marcadores de posición
    $consulta->bindParam(':id_reconduccion', $id_reconduccion);

    // Ejecutar la sentencia de eliminación
    $consulta->execute();
    header("Location: ../revisa_reconducciones.php?type=indicadores");
}




if (isset($_POST['valida_reconduccion_act']) && ($_POST['valida_reconduccion_act'])) {
    session_start();
    if ($_SESSION['sistema'] != "pbrm") {
        header("Location: ../login.php");
        die();
    }


    $id_reconduccion = $_POST['id_reconduccion'];

    $reconduccion = Fetch($con, "SELECT * FROM reconducciones_atividades WHERE id_reconduccion_actividades = $id_reconduccion");
    // Ya que tenemos la reconduccion, vamos a cambiarla a activa.

    // Traemos las programaciones afectadas por la reconduccion
    $programaciones = FetchAll($con, "SELECT * FROM programacion_reconducciones WHERE id_reconduccion = $id_reconduccion");

    if ($programaciones[0]['programacion_inicial'] == '"0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"') {
        $programaciones = $programaciones[0];
        $prog_final = str_replace('"', '', $programaciones['programacion_final']);
        $prog_final = str_replace(' ', '', $prog_final);
        $arry_final = explode(",", $prog_final);

        $codigo_actividad = $programaciones['no_actividad'];
        $nombre_actividad = $programaciones['desc_actividad'];
        $unidad = $programaciones['u_medida'];
        $id_unidad = $programaciones['id_u_medida'];
        $programado_anual_anterior = 0;
        $alcanzado_anual_anterior = 0;
        $id_area = $reconduccion['id_area'];
        $id_validacion = $_SESSION['id_usuario'];
        $id_usuario = $_SESSION['id_usuario'];
        $validado = 1;
        $anio = $_SESSION['anio'];
        $id_creacion = $reconduccion['id_validador'];

        //Ahora Guardamos la nueva programación 
        $ene_fin = $arry_final[0];
        $feb_fin = $arry_final[1];
        $mar_fin = $arry_final[2];
        $abr_fin = $arry_final[3];
        $may_fin = $arry_final[4];
        $jun_fin = $arry_final[5];
        $jul_fin = $arry_final[6];
        $ago_fin = $arry_final[7];
        $sep_fin = $arry_final[8];
        $oct_fin = $arry_final[9];
        $nov_fin = $arry_final[10];
        $dic_fin = $arry_final[11];

        $sql = "INSERT INTO actividades 
        (codigo_actividad, nombre_actividad, unidad, id_unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado, anio, id_creacion) 
        VALUES 
        (?,?,?,?,?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        try {
            $sqlr->execute(array($codigo_actividad, $nombre_actividad, $unidad, $id_unidad, $programado_anual_anterior, $alcanzado_anual_anterior, $id_area, $id_validacion, $validado, $anio, $id_creacion));
        } catch (\Throwable $th) {
            throw $th;
        }

        $id_actividadn = $con->lastInsertId();


        $sqlprog = "INSERT INTO programaciones 
        (enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, id_actividad) 
        VALUES 
        (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sqlprogamaciones = $con->prepare($sqlprog);
        try {
            $sqlprogamaciones->execute(array($ene_fin, $feb_fin, $mar_fin, $abr_fin, $may_fin, $jun_fin, $jul_fin, $ago_fin, $sep_fin, $oct_fin, $nov_fin, $dic_fin, $id_actividadn));
        } catch (\Throwable $th) {
            throw $th;
        }

        // Validar la reconduccion
        $sql = "UPDATE reconducciones_atividades SET validado = 1, id_validador = $id_usuario, fecha_validacion = NOW() WHERE id_reconduccion_actividades = $id_reconduccion";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        header("Location: ../revisa_reconducciones.php");
    }

    // ******* lo primero que hay que hacer es respaldar los datos que vamos a eliminar
    // ** armamos el array
    foreach ($programaciones as $a) {
        //limpiamos la programacion inicial y la ponemos en un array
        $prog_inicial = $a['programacion_inicial'];
        $id_actividad = $a['id_actividad'];

        if ($id_actividad != 0) {
            //Gardamos en la tabla de cosas eliminadas
            $sql = "INSERT INTO programaciones_eliminadas (programacion, id_actividad) VALUES (?,?)";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($prog_inicial, $id_actividad));
        }

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
        } catch (PDOException $e) {
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
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    header("Location: ../revisa_reconducciones.php");
}




if (isset($_POST['validareconduccionindicadores']) && $_POST['validareconduccionindicadores'] == "validar") {
    session_start();
    if ($_SESSION['sistema'] != "pbrm") {
        header("Location: ../login.php");
        die();
    }
    if (isset($_POST['id_reconduccion'])) {
        $id_reconduccion = filter_var($_POST['id_reconduccion'], FILTER_SANITIZE_NUMBER_INT);
        if ($id_reconduccion === false) {
            echo "El ID proporcionado no es válido.";
            exit;
        }
    } else {
        echo "No se proporcionó ningún ID.";
        exit;
    }

    try {
        // Preparar la sentencia de actualización
        $consulta = $con->prepare("UPDATE reconducciones_indicadores SET validado = :valor1 WHERE id_reconduccion_indicadores = :id_reconduccion_indicadores");

        $true = 1;
        // Enlazar los valores a los marcadores de posición
        $consulta->bindParam(':valor1', $true);
        $consulta->bindParam(':id_reconduccion_indicadores', $id_reconduccion);

        if ($consulta->execute()) {
            $id_indicador = intval(filter_var($_POST['id_indicador'], FILTER_SANITIZE_NUMBER_INT));

            var_dump($id_indicador);
            $programacion_modificada_a = $_POST['programacion_modificada_a'];
            $programacion_modificada_b = $_POST['programacion_modificada_b'];
            $programacion_modificada_c = $_POST['programacion_modificada_c'];
            $programacion_modificada_a = explode("|", $programacion_modificada_a);
            $programacion_modificada_b = explode("|", $programacion_modificada_b);
            $programacion_modificada_c = explode("|", $programacion_modificada_c);
            $tipo_op_a = $_POST['tipo_op_a'];
            $tipo_op_b = $_POST['tipo_op_b'];
            $tipo_op_c = $_POST['tipo_op_c'];
            $umedida_a = $_POST['umedida_a'];
            $umedida_b = $_POST['umedida_b'];
            $umedida_c = $_POST['umedida_c'];



            try {
                $consulta = $con->prepare("UPDATE indicadores_uso SET at1 = :at1, at2 = :at2, at3 = :at3, at4 = :at4, bt1 = :bt1, bt2 = :bt2, bt3 = :bt3, bt4 = :bt4, ct1 = :ct1, ct2 = :ct2, ct3 = :ct3, ct4 = :ct4, tipo_op_a = :tipo_op_a, tipo_op_b = :tipo_op_b, tipo_op_c = :tipo_op_c, umedida_a = :umedida_a, umedida_b = :umedida_b, umedida_c = :umedida_c WHERE id = $id_indicador");

                // Enlazar los valores a los marcadores de posición
                $consulta->bindParam(':at1', $programacion_modificada_a[0]);
                $consulta->bindParam(':at2', $programacion_modificada_a[1]);
                $consulta->bindParam(':at3', $programacion_modificada_a[2]);
                $consulta->bindParam(':at4', $programacion_modificada_a[3]);
                $consulta->bindParam(':bt1', $programacion_modificada_b[0]);
                $consulta->bindParam(':bt2', $programacion_modificada_b[1]);
                $consulta->bindParam(':bt3', $programacion_modificada_b[2]);
                $consulta->bindParam(':bt4', $programacion_modificada_b[3]);
                $consulta->bindParam(':ct1', $programacion_modificada_c[0]);
                $consulta->bindParam(':ct2', $programacion_modificada_c[1]);
                $consulta->bindParam(':ct3', $programacion_modificada_c[2]);
                $consulta->bindParam(':ct4', $programacion_modificada_c[3]);
                $consulta->bindParam(':tipo_op_a', $tipo_op_a);
                $consulta->bindParam(':tipo_op_b', $tipo_op_b);
                $consulta->bindParam(':tipo_op_c', $tipo_op_c);
                $consulta->bindParam(':umedida_a', $umedida_a);
                $consulta->bindParam(':umedida_b', $umedida_b);
                $consulta->bindParam(':umedida_c', $umedida_c);
                //$consulta->bindParam(':id_indicador', $id_indicador);



                if ($consulta->execute()) {
                    header("Location: ../revisa_reconducciones.php?type=indicadores");
                } else {
                    // Mostrar el error de PDO
                    echo "La actualización falló en la actualizacion del indicador: " . $consulta->errorInfo()[2];
                }
            } catch (\Throwable $th) {
                echo "La actualización falló desde el armado de la consulta para la actualizacion del indicador: " . $th->getMessage();
            }
        } else {
            // Mostrar el error de PDO
            echo "La actualización falló desde la validacion de la reconduccion, previa a la programacion: " . $consulta->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "La actualización falló en la integracion para la consulta de la actualizacion de la reconudccion: " . $e->getMessage();
    }
}
