<?php 
require_once 'conection.php';
function traePrograma($con, $id_area){
    $sentencia = "SELECT * FROM areas a 
    JOIN proyectos p ON p.id_proyecto = a.id_proyecto
    JOIN programas_presupuestarios pp ON pp.id_programa = p.id_programa ";
    $stm = $con->query($sentencia);
    return $programa = $stm->fetch(PDO::FETCH_ASSOC);
}

?>