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
    $id_unidad = (isset($_POST['id_unidad'])) ? $_POST['id_unidad'] : "";
    if(isset($_POST['eliminar'])){
        // Primero traemos la que vamos a eliminar y la subimos a eliminadas
        $borrar = TraeIndividual($con, $id_unidad);
        array_shift($borrar);
        array_push($borrar, $_POST['id_elimina']);

        $sql = " INSERT INTO unidades_medida_eliminadas 
        (nombre_unidad, descripcion_unidad, id_registro, last_edit, fecha_alta, id_elimina) 
        VALUES (?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        
        var_dump(array_values($borrar));

        $sqlr->execute(array_values($borrar));


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
        var_dump($_POST);
        $nombre = $_POST['nombre_unidad'];
        $descripcion = $_POST['descripcion_unidad'];
        $id_registro = $_POST['id_registro'];

        try {
            $sql = "INSERT INTO unidades_medida
            (nombre_unidad, descripcion_unidad, id_registro) 
            VALUES (?,?,?)";
            $sqlr = $con->prepare($sql);
            
            $sqlr->execute(array($nombre, $descripcion, $id_registro));

        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    header("Location: ../unidades_medida.php");

}