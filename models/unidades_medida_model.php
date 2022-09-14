<?php
require_once 'conection.php';


function Select($con, $string, $option){
    try {
        $stm = $con->query($string);
        if($option == "all"){
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $data = $stm->fetch(PDO::FETCH_ASSOC);
        }
    } catch (\Throwable $th) {
        throw $th;
    }
    return $data;
}


function Insert($con, $sentence, $data){
    var_dump($sentence);
    var_dump($data);
    try {
        $sqlr = $con->prepare($sentence);
        $sqlr->execute($data);
    } catch (\Throwable $th) {
        throw $th;
        die();
    }
}


function TraeUnidadesMedida($con){
    $unidades = Select($con, "SELECT * FROM unidades_medida ORDER BY nombre_unidad ASC", "all");
    return $unidades;
}

function TraeIndividual($con, $id_unidad){
    $sentencia = "SELECT * FROM unidades_medida WHERE id_unidad = $id_unidad";
    $unidad = Select($con, $sentencia, "");
    return $unidad;
}

if(isset($_POST['edit'])){
    $id_unidad = $_POST['id_unidad'];
    if(isset($_POST['eliminar'])){
        // Primero traemos la que vamos a eliminar y la subimos a eliminadas
        $borrar = TraeIndividual($con, $id_unidad);
        array_shift($borrar);
        array_push($borrar, $_POST['id_elimina']);

        $sql = " INSERT INTO unidades_medida_eliminadas 
        (nombre_unidad, descripcion_unidad, id_registro, last_edit, fecha_alta, id_elimina) 
        VALUES (?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        
        $sqlr->execute(array($mes, $data['avance'], $data['justificacion'], $full_evidencia_evidencia, $data['descripcion_evidencia'], $id_actividad, $data['id_usuario']));

        $sql = "DELETE FROM unidades_medida WHERE id_unidad = $id_unidad";
        try {
            $con->exec($sql);
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    if(isset($_POST['actualizar'])){
        $nombre = $_POST['nombre_unidad'];
        $descripcion = $_POST['descripcion_unidad'];
        try {
            $sql = "UPDATE unidades_medida SET nombre_unidad = '$nombre', descripcion_unidad = '$descripcion' WHERE id_unidad = $id_unidad";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            
        } catch (\Throwable $th) {
            echo $sql . "<br>" . $th->getMessage();
            die();
        }
    }
    

    if(isset($_POST['new'])){
        
    }

    header("Location: ../unidades_medida.php");

}