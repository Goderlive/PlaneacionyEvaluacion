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

function traeIndicador($con, $id_indicador){
    $sentencia = "SELECT * FROM ante_indicadores_uso WHERE id = $id_indicador";
    $stm = $con->query($sentencia);
    return $indicadores = $stm->fetch(PDO::FETCH_ASSOC);
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
    $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $indicadores;
}

function traeActividadesDependencia($con, $id_dependencia){
    $sentencia = "SELECT * FROM ante_actividades a
    LEFT JOIN ante_areas ar ON ar.id_area = a.id_area
    LEFT JOIN ante_dependencias d ON d.id_antedependencia = ar.id_dependencia
    WHERE d.id_antedependencia = $id_dependencia
    ORDER BY a.id_area ASC";
    $stm = $con->query($sentencia);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
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

if(isset($_POST['program_indicador'])){

    $id_indicador = $_POST['id_indicador'];
    
    $tipo_op_a = (isset($_POST['tipo_op_a'])) ? $_POST['tipo_op_a'] : NULL;
    $tipo_op_b = (isset($_POST['tipo_op_b'])) ? $_POST['tipo_op_b'] : NULL;
    $tipo_op_c = (isset($_POST['tipo_op_c'])) ? $_POST['tipo_op_c'] : NULL;
    $umedida_a = (isset($_POST['umedida_a'])) ? $_POST['umedida_a'] : NULL;
    $umedida_b = (isset($_POST['umedida_b'])) ? $_POST['umedida_b'] : NULL;
    $umedida_c = (isset($_POST['umedida_c'])) ? $_POST['umedida_c'] : NULL;
    $interpretacion = (isset($_POST['interpretacion'])) ? $_POST['interpretacion'] : NULL;
    $factor_de_comparacion = (isset($_POST['factor_de_comparacion'])) ? $_POST['factor_de_comparacion'] : NULL;
    $desc_factor_de_comparacion = (isset($_POST['desc_factor_de_comparacion'])) ? $_POST['desc_factor_de_comparacion'] : NULL;
    $linea_base = (isset($_POST['linea_base'])) ? $_POST['linea_base'] : NULL;
    $actividades_ids = ($_POST['id_actividades'] ? json_encode($_POST['id_actividades']) : NULL);
    $desc_meta_anual = (isset($_POST['desc_meta_anual'])) ? $_POST['desc_meta_anual'] : NULL;
    $medios_de_verificacion = (isset($_POST['medios_de_verificacion'])) ? $_POST['medios_de_verificacion'] : NULL;
    $at1 = (isset($_POST['at1'])) ? $_POST['at1'] : 0;
    $at2 = (isset($_POST['at2'])) ? $_POST['at2'] : 0;
    $at3 = (isset($_POST['at3'])) ? $_POST['at3'] : 0;
    $at4 = (isset($_POST['at4'])) ? $_POST['at4'] : 0;
    $bt1 = (isset($_POST['bt1'])) ? $_POST['bt1'] : 0;
    $bt2 = (isset($_POST['bt2'])) ? $_POST['bt2'] : 0;
    $bt3 = (isset($_POST['bt3'])) ? $_POST['bt3'] : 0;
    $bt4 = (isset($_POST['bt4'])) ? $_POST['bt4'] : 0;
    $ct1 = (isset($_POST['ct1'])) ? $_POST['ct1'] : 0;
    $ct2 = (isset($_POST['ct2'])) ? $_POST['ct2'] : 0;
    $ct3 = (isset($_POST['ct3'])) ? $_POST['ct3'] : 0;
    $ct4 = (isset($_POST['ct4'])) ? $_POST['ct4'] : 0;
    $id_alta = (isset($_POST['id_alta'])) ? $_POST['id_alta'] : NULL;
    $validado = 1;

    $sql = "UPDATE ante_indicadores_uso SET tipo_op_a = '$tipo_op_a', tipo_op_b = '$tipo_op_b', tipo_op_c = '$tipo_op_c', umedida_a = '$umedida_a', umedida_b = '$umedida_b', umedida_c = '$umedida_c', interpretacion = '$interpretacion', factor_de_comparacion = '$factor_de_comparacion', desc_factor_de_comparacion = '$desc_factor_de_comparacion', linea_base = '$linea_base', actividades_ids = '$actividades_ids', desc_meta_anual = '$desc_meta_anual', medios_de_verificacion = '$medios_de_verificacion', at1 = '$at1', at2 = '$at2', at3 = '$at3', at4 = '$at4', bt1 = '$bt1', bt2 = '$bt2', bt3 = '$bt3', bt4 = '$bt4', ct1 = '$ct1', ct2 = '$ct2', ct3 = '$ct3', ct4 = '$ct4', id_alta = '$id_alta', validado = '$validado' WHERE id = ?";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_indicador));

    print $id_indicador;
    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_dependencia" value="<?=$id_dependencia?>">
        <input type="hidden" name="tipo" value="d">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php
}
?>