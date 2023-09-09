<?php 
require_once 'conection.php';
function traePrograma($con, $id_area){
    $sentencia = "SELECT * FROM areas a 
    JOIN proyectos p ON p.id_proyecto = a.id_proyecto
    JOIN programas_presupuestarios pp ON pp.id_programa = p.id_programa ";
    $stm = $con->query($sentencia);
    return $programa = $stm->fetch(PDO::FETCH_ASSOC);
}

function traeFoda($con, $id_area){
    $sentencia = "SELECT * FROM ante_unob WHERE id_area = $id_area";
    $stm = $con->query($sentencia);
    return $foda = $stm->fetch(PDO::FETCH_ASSOC);
}

function traeobjetivoPDM($con, $id_objetivo){
    $sentencia = "SELECT * FROM pdm_objetivos WHERE id_objetivo = $id_objetivo";
    $stm = $con->query($sentencia);
    $objetivo = $stm->fetch(PDO::FETCH_ASSOC);
    return $objetivo['clave_objetivo'];
}

function traeoestrategia_pdm($con, $id_estrategia){
    $sentencia = "SELECT * FROM pdm_objetivos o
    JOIN pdm_estrategias e ON o.id_objetivo = e.id_estrategia
    WHERE id_estrategia = $id_estrategia";
    $stm = $con->query($sentencia);
    $estrategia = $stm->fetch(PDO::FETCH_ASSOC);
    return $estrategia['clave_objetivo'] . '<br>' . $estrategia['clave_estrategia'];
}

function traeObjetivos_todos($con){
    $sentencia = "SELECT * FROM pdm_objetivos";
    $stm = $con->query($sentencia);
    return $objetivos = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeObjetivoODS($con, $id_objetivo){
    $sentencia = "SELECT * FROM objetivos_ods WHERE id_objetivo = $id_objetivo";
    $stm = $con->query($sentencia);
    $objetivo = $stm->fetch(PDO::FETCH_ASSOC);
    return $objetivo['clv_objetivo'];
}

function traeEstrategias($con, $id_objetivo){
    $sentencia = "SELECT * FROM pdm_estrategias WHERE id_objetivo = $id_objetivo";
    $stm = $con->query($sentencia);
    return $estrategias = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeLineas($con, $id_estrategia){
    $sentencia = "SELECT * FROM pdm_lineas WHERE id_estrategia = $id_estrategia";
    $stm = $con->query($sentencia);
    return $lineas = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeOEL($con, $id_linea){
    $sentencia = "SELECT * FROM pdm_lineas l
    LEFT JOIN pdm_estrategias e ON e.id_estrategia = l.id_estrategia
    LEFT JOIN pdm_objetivos o ON o.id_objetivo = e.id_objetivo  
    WHERE l.id_linea = $id_linea";
    $stm = $con->query($sentencia);
    return $oel = $stm->fetch(PDO::FETCH_ASSOC);
}

function traeODSO($con){
    $sentencia = "SELECT * FROM objetivos_ods";
    $stm = $con->query($sentencia);
    return $oel = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeEstrategiasODS($con, $objetivo_ods){
    $sentencia = "SELECT * FROM estrategias_ods
    WHERE id_objetivo = $objetivo_ods";
    $stm = $con->query($sentencia);
    return $eODS = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeODSyE($con, $id_estrategia){
    $sentencia = "SELECT * FROM objetivos_ods o
    JOIN estrategias_ods e ON e.id_objetivo = o.id_objetivo
    WHERE e.id_estrategia = $id_estrategia";
    $stm = $con->query($sentencia);
    return $oel = $stm->fetch(PDO::FETCH_ASSOC);
}

function traeIndicadores($con, $id_dependencia){
    $sentencia = "SELECT * FROM ante_indicadores_uso
    WHERE id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    return $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);
}




if(isset($_POST['update_foda'])){
    $id_area = $_POST['id_area'];

    $fortalezas = $_POST['fortalezas'];
    $oportunidades = $_POST['oportunidades'];
    $debilidades = $_POST['debilidades'];
    $amenazas = $_POST['amenazas'];

    
    $stm = $con->query("SELECT * FROM ante_unob WHERE id_area = $id_area");
    $id_ante_unob = $stm->fetch();

    if($id_ante_unob){
        $sql = "UPDATE ante_unob SET diagnostico_fortaleza = ?, diagnostico_oportunidad = ?, diagnostico_debilidad = ?, diagnostico_amenaza = ? WHERE id_area = $id_area";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($fortalezas, $oportunidades, $debilidades, $amenazas));
    }else{
        $sql = "INSERT INTO ante_unob (diagnostico_fortaleza, diagnostico_oportunidad, diagnostico_debilidad, diagnostico_amenaza, id_area) VALUES (?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($fortalezas, $oportunidades, $debilidades, $amenazas, $id_area));
    }

    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="b" value="<?=$id_area?>">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php

}



if(isset($_POST['update_objetivo'])){
    $id_area = $_POST['id_area'];
    $estrategia = $_POST['estrategia'];

    $stm = $con->query("SELECT * FROM ante_unob WHERE id_area = $id_area");
    $id_ante_unob = $stm->fetch();

    if($id_ante_unob){
        $sql = "UPDATE ante_unob SET estrategia = ? WHERE id_area = $id_area";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($estrategia));
    }else{
        $sql = "INSERT INTO ante_unob (estrategia, id_area) VALUES (?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($estrategia, $id_area));
    }

    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="b" value="<?=$id_area?>">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php

}


if(isset($_POST['id_linea'])){
    $id_area = $_POST['id_area'];
    $id_linea = $_POST['id_linea'];

    $stm = $con->query("SELECT * FROM ante_unob WHERE id_area = $id_area");
    $id_ante_unob = $stm->fetch();

    if($id_ante_unob){
        $sql = "UPDATE ante_unob SET linea_accion = ? WHERE id_area = $id_area";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($id_linea));
    }else{
        $sql = "INSERT INTO ante_unob (linea_accion, id_area) VALUES (?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($id_linea, $id_area));
    }

    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="b" value="<?=$id_area?>">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php

}




if(isset($_POST['update_ODS'])){
    $id_area = $_POST['id_area'];
    $id_estrategia_ods = $_POST['id_estrategia_ods'];

    $stm = $con->query("SELECT * FROM ante_unob WHERE id_area = $id_area");
    $id_ante_unob = $stm->fetch();

    if($id_ante_unob){
        $sql = "UPDATE ante_unob SET id_ods = ? WHERE id_area = $id_area";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($id_estrategia_ods));
    }else{
        $sql = "INSERT INTO ante_unob (id_ods, id_area) VALUES (?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($id_estrategia_ods, $id_area));
    }

    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="b" value="<?=$id_area?>">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php

}



if(isset($_POST['delete_pdm'])){
    $id_area = $_POST['id_area'];
    $id_estrategia_pdm = $_POST['linea_accion'];


    $sql = "UPDATE ante_unob SET linea_accion = NULL WHERE linea_accion = ?";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_estrategia_pdm));


    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="b" value="<?=$id_area?>">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php
}

if(isset($_POST['delete_ods'])){
    $id_area = $_POST['id_area'];
    $id_estrategia_ods = $_POST['id_ods'];


    $sql = "UPDATE ante_unob SET id_ods = NULL WHERE id_ods = ?";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_estrategia_ods));


    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="b" value="<?=$id_area?>">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php
}
?>