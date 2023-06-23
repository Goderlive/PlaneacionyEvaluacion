<?php 
require_once 'conection.php';


function traeAvance($con, $id_avance){
    $stm = $con->query("SELECT *, a.id_actividad as id_actividad FROM avances a 
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_avance
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    WHERE a.id_avance = $id_avance");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}

function traeAvanceyareas($con, $id_avance){
    $stm = $con->query("SELECT * FROM avances av 
    JOIN actividades ac ON ac.id_actividad = av.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE av.id_avance = $id_avance");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}


function traelocalidades($con)
{
    $stm = $con->query("SELECT * FROM localidades");
    $localidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $localidades;
}


function traeModificacion($con, $id_modificacion){
    $stm = $con->query("SELECT * FROM modificaciones_actividades WHERE id_modificacion = $id_modificacion");
    $modificacion = $stm->fetch(PDO::FETCH_ASSOC);
    return $modificacion;
}

function TraeActividad($con, $id_actividad){

    $sql = "SELECT * FROM actividades a
    JOIN programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas li ON li.id_linea = la.id_linea 
    WHERE a.id_actividad = $id_actividad";
    $stm = $con->query($sql);
    $actividades = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividades;
}

function traeDatosDependencia($con, $id_actividad){
    $sql = "SELECT * FROM actividades ac
    JOIN areas ar ON ar.id_area = ac.id_area
    JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia 
    WHERE ac.id_actividad = $id_actividad";
    $stm = $con->query($sql);
    $dependencia = $stm->fetch(PDO::FETCH_ASSOC);
    return $dependencia;
}


if (isset($_POST['actualizar']) == "actualizar") {
    session_start();

    print '<pre>';
    var_dump($_POST);
    if ($_SESSION['sistema'] = 'pbrm') {
        $id_modificacion = $_POST['id_modificacion'];
        $id_avance = $_POST['id_avance'];
        $avance = traeAvanceyareas($con, $id_avance);

        $fecha = $avance['fecha_avance'];
        $year = date("Y", strtotime($fecha));
        $mes = date("m", strtotime($fecha));
        $id_dependencia = $avance['id_dependencia'];
        $id_area = $avance['id_area'];
        $id_actividad = $avance['id_actividad'];

        print '<pre>';
        var_dump($avance);

        $localidades = isset($_POST['localidades']) ? $_POST['localidades'] : NULL;
        $beneficiarios = (isset($_POST['beneficiarios']) && $_POST['beneficiarios'] != "") ? $_POST['beneficiarios'] : NULL;
        $recursos_federales = isset($_POST['recursos_federales']) ? $_POST['recursos_federales'] : NULL;
        $recursos_estatales = isset($_POST['recursos_estatales']) ? $_POST['recursos_estatales'] : NULL;
        $recursos_propios = isset($_POST['recursos_propios']) ? $_POST['recursos_propios'] : NULL;
        $recursos = '';
        if($recursos_federales){
            $recursos .= "R F: " . $recursos_federales . "%, ";
        }
        if($recursos_estatales){
            $recursos .= "R E: " . $recursos_estatales . "%, ";
        }
        if($recursos_propios){
            $recursos .= "R P: " . $recursos_propios . "%";
        }
        if(!$recursos_federales && !$recursos_estatales && !$recursos_propios) {
            $recursos = NULL;
        }


        if (isset($_FILES['evidencia_de_evidencia']) && $_FILES['evidencia_de_evidencia']['error'] == 0 && in_array($_FILES['evidencia_de_evidencia']['type'], array('image/jpg', 'image/jpeg', 'image/png'))) {
                
            $dir = '../archivos/actividades/' . $year . '/' . $mes . '/' . $id_dependencia . '/' . $id_area . '/' . $id_actividad . '/';
            if (!is_dir($dir)) {
                mkdir($dir, 0741, true);
            }

            $path_evidencia_evidencia = $_POST['evidencia_de_evidencia'];
            if ($_FILES["evidencia_de_evidencia"]["error"] == UPLOAD_ERR_OK) {
                $imagen = str_replace(array(' ', 'php', 'js', 'phtml', 'php3', 'exe'), '_', date('Ymd_His') . '_' . $_FILES['evidencia_de_evidencia']['name']);
                $uno = rand(1, 99);
                $nombre_evidencia_de_evidencia = basename("ede" . $uno . $imagen);
                $full_evidencia_evidencia = $dir . $nombre_evidencia_de_evidencia;

                if (move_uploaded_file($_FILES['evidencia_de_evidencia']['tmp_name'], $full_evidencia_evidencia)) {
                    $path_evidencia_evidencia = $full_evidencia_evidencia;
                }
            }
        }

        // Obtener los valores de los campos del formulario
        $id_avance = $_POST['id_avance'];
        $avance = $_POST["avance"];
        $descevidencia = $_POST["descevidencia"];
        $justificacion = $_POST["justificacion"];
        $localidades = $_POST["localidades"];
        $beneficiarios = $_POST["beneficiarios"];
        $recursos = $_POST["recursos"];

        // Preparar la consulta UPDATE
        $sql = "UPDATE avances SET avance = :avance, descripcion_evidencia = :descevidencia, path_evidenia_evidencia = :path_evidencia_evidencia, justificacion = :justificacion, localidades = :localidades, beneficiarios = :beneficiarios, recursos = :recursos WHERE id_avance = :id_avance";

        try {
            $stmt = $con->prepare($sql);
            $stmt->bindParam(":id_avance", $id_avance);
            $stmt->bindParam(":avance", $avance);
            $stmt->bindParam(":path_evidencia_evidencia", $path_evidencia_evidencia);
            $stmt->bindParam(":descevidencia", $descevidencia);
            $stmt->bindParam(":justificacion", $justificacion);
            $stmt->bindParam(":localidades", $localidades);
            $stmt->bindParam(":beneficiarios", $beneficiarios);
            $stmt->bindParam(":recursos", $recursos);
            $stmt->execute();
            
            
            
            // Mostrar un mensaje de éxito
            echo "La información se ha actualizado correctamente.";
            echo "<br>";
            
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta 1: " . $e->getMessage();
            echo "<br>";
        }
        
        // Si todo salio bien, ahora tenemos que quitar el editable y la validacion

        try{
            $sql2 = "UPDATE avances SET validado = 0, validado_2 = 0 WHERE id_avance = :id_avance";
            $stmt2 = $con->prepare($sql2);
            $stmt2->bindParam(":id_avance", $id_avance);
            $stmt2->execute();
            echo "La información se ha actualizado correctamente.";
            echo "<br>";
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta 2: " . $e->getMessage();
            echo "<br>";
        }

        try{   

        $sql3 = "UPDATE modificaciones_actividades SET atendida = 1 WHERE id_modificacion = :id_modificacion";
        $stmt3 = $con->prepare($sql3);
        $stmt3->bindParam(":id_modificacion", $id_modificacion);
        $stmt3->execute();
        echo "La información se ha actualizado correctamente.";
        echo "<br>";
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta 3: " . $e->getMessage();
            echo "<br>";
        }


        header("Location: ../actividades.php");


    }
}

?>