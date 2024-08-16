<?php session_start();
require_once 'models/inicio_modelo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza el Programa Anual</title>
</head>


<?php

$anioobjetivo = $_SESSION['anio'] + 1;
//$anioobjetivo = '2024';


function actualizaAnteDependencias($con,$anioobjetivo){
    $sentencia = "SELECT * FROM ante_dependencias a
    LEFT JOIN dependencias_generales d ON a.id_dependencia_gen = d.id_dependencia
    WHERE a.anio = $anioobjetivo AND a.tipo = 1";
    $stm = $con->query($sentencia);
    $ante_dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    $sentencia = "SELECT * FROM dependencias_generales  
    WHERE anio = $anioobjetivo AND tipo = 'Municipios'";
    $stm = $con->query($sentencia);
    $dependencias_generales = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($ante_dependencias as $d){
        $dg_ante = $d['clave_dependencia'];
        $encontrado = 0;
        foreach($dependencias_generales as $g){
            if($dg_ante == $g['clave_dependencia']){
                $encontrado = $g['id_dependencia'];
            }
        }
        if($encontrado != 0){
            $id = $d['id_antedependencia'];
            $sql = "UPDATE ante_dependencias SET id_dependencia_gen = ? WHERE id_antedependencia = $id";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($encontrado));
        }else{
            print "no encontrado";
        }
    }
}



function actualizaAreas($con,$anioobjetivo){
    
    $sentencia = "SELECT * FROM ante_areas ar
    LEFT JOIN dependencias_generales g ON ar.id_dependencia_general = g.id_dependencia  
    LEFT JOIN dependencias_auxiliares a ON ar.id_dependencia_aux = a.id_dependencia_auxiliar
    LEFT JOIN proyectos p ON ar.id_proyecto = p.id_proyecto
    LEFT JOIN ante_dependencias d ON ar.id_dependencia = d.id_antedependencia   
    WHERE ar.anio = $anioobjetivo AND d.tipo = 1";
    $stm = $con->query($sentencia);
    $ante_anreas = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    $sentencia = "SELECT * FROM dependencias_generales  
    WHERE anio = $anioobjetivo AND tipo = 'Municipios'";
    $stm = $con->query($sentencia);
    $dependencias_generales = $stm->fetchAll(PDO::FETCH_ASSOC);

    $sentencia = "SELECT * FROM dependencias_auxiliares  
    WHERE anio = $anioobjetivo AND tipo = 'Municipios'";
    $stm = $con->query($sentencia);
    $dependencias_auxiliares = $stm->fetchAll(PDO::FETCH_ASSOC);

    $sentencia = "SELECT * FROM proyectos  
    WHERE anio = $anioobjetivo";
    $stm = $con->query($sentencia);
    $proyectos = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($ante_anreas as $d){
        $dg_ante = $d['clave_dependencia'];
        $encontrado_dependencias_generales = 0;
        
        $da_ante = $d['clave_dependencia_auxiliar'];
        $encontrado_dependencias_auxiliares = 0;

        $py_ante = $d['codigo_proyecto'];
        $encontrado_proyectos = 0;

        //Busca Dependencias Generales
        foreach($dependencias_generales as $g){
            if($dg_ante == $g['clave_dependencia']){
                $encontrado_dependencias_generales = $g['id_dependencia'];
            }
        }
        
        //Busca Dependencias Auxiliares
        foreach($dependencias_auxiliares as $a){
            if($da_ante == $a['clave_dependencia_auxiliar']){
                $encontrado_dependencias_auxiliares = $a['id_dependencia_auxiliar'];
            }
        }
        
        //Busca Proyectos
        foreach($proyectos as $p){
            if($py_ante == $p['codigo_proyecto']){
                $encontrado_proyectos = $p['id_proyecto'];
            }
        }

        if($encontrado_dependencias_generales != 0 && $encontrado_dependencias_auxiliares != 0 && $encontrado_proyectos != 0){
            $id = $d['id_area'];
            $sql = "UPDATE ante_areas SET id_dependencia_general = ?, id_dependencia_aux = ?, id_proyecto = ? WHERE id_area = $id";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($encontrado_dependencias_generales, $encontrado_dependencias_auxiliares, $encontrado_proyectos));
            print "Se actualizo correctamente <br>";
        }else{
            $id = $d['id_area'];
            $sql = "UPDATE ante_areas SET id_dependencia_general = null, id_dependencia_aux = null, id_proyecto = null WHERE id_area = $id";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(); 
            print "Area no actualizada. contactar al administrador con el numero: " . $id . "<br>";
        }

    }
}


function actualizaIndicadores($con, $anioobjetivo){
    $sentencia = "SELECT * FROM ante_indicadores_uso ai 
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ai.id_dep_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ai.id_dep_aux
    LEFT JOIN proyectos p ON p.id_proyecto = ai.id_proyecto
    WHERE ai.anio = $anioobjetivo";
    $stm = $con->query($sentencia);
    $ante_indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);


    foreach($ante_indicadores as $a){
        $id = $a['id'];


        $general = $a['clave_dependencia'];
        $stm = $con->query("SELECT * FROM dependencias_generales WHERE clave_dependencia = '$general' AND anio = $anioobjetivo");
        $generales = $stm->fetch(PDO::FETCH_ASSOC);
        $generales = $generales['id_dependencia'];
        
        $auxiliar = $a['clave_dependencia_auxiliar'];
        $stm = $con->query("SELECT * FROM dependencias_auxiliares WHERE clave_dependencia_auxiliar = '$auxiliar' AND anio = $anioobjetivo");
        $auxiliares = $stm->fetch(PDO::FETCH_ASSOC);
        $auxiliares = $auxiliares['id_dependencia_auxiliar'];

        $proyecto = $a['codigo_proyecto'];
        $stm = $con->query("SELECT * FROM proyectos WHERE codigo_proyecto = '$proyecto' AND anio = $anioobjetivo");
        $proyectos = $stm->fetch(PDO::FETCH_ASSOC);
        $proyectos = $proyectos['id_proyecto'];

        $sql = "UPDATE ante_indicadores_uso SET id_dep_general = ?, id_dep_aux = ?, id_proyecto = ? WHERE id = $id";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($generales, $auxiliares, $proyectos));
    }
}



?>

<body>
    <div class="ml-5">

        Primero las dependencias <br>

        <?php actualizaAnteDependencias($con, $anioobjetivo); ?>
        <?php actualizaAreas($con, $anioobjetivo); ?>
        <?php actualizaIndicadores($con, $anioobjetivo); ?>

       
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>