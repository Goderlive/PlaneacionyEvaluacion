<?php 
require_once 'conection.php';
function traePrograma($con, $id_area){
    $sentencia = "SELECT * FROM areas a 
    JOIN proyectos p ON p.id_proyecto = a.id_proyecto
    JOIN programas_presupuestarios pp ON pp.id_programa = p.id_programa
    WHERE a.id_area = $id_area";
    $stm = $con->query($sentencia);
    return $programa = $stm->fetch(PDO::FETCH_ASSOC);
}

function traeFoda($con, $id_area){
    $sentencia = "SELECT * FROM ante_unob WHERE id_area = $id_area";
    $stm = $con->query($sentencia);
    $foda = $stm->fetch(PDO::FETCH_ASSOC);
    return $foda;
}


function AreasAntep($con, $anio){
    $aux = FetchAll2($con, "SELECT * FROM dependencias_auxiliares WHERE anio = $anio");
    $gen = FetchAll2($con, "SELECT * FROM dependencias_generales WHERE anio = $anio");
    $mix = array_merge($aux, $gen);
    return $mix;    
}

function traeobjetivoPDM($con, $id_objetivo){
    $sentencia = "SELECT * FROM pdm_objetivos WHERE id_objetivo = $id_objetivo";
    $stm = $con->query($sentencia);
    $objetivo = $stm->fetch(PDO::FETCH_ASSOC);
    return $objetivo['clave_objetivo'] . " " . $objetivo['nombre_objetivo'];
}

function traeoestrategia_pdm($con, $id_estrategia){
    $sentencia = "SELECT * FROM pdm_estrategias e
    LEFT JOIN pdm_objetivos o ON o.id_objetivo = e.id_objetivo
    WHERE e.id_estrategia = $id_estrategia";
    $stm = $con->query($sentencia);
    $estrategia = $stm->fetch(PDO::FETCH_ASSOC);
    return $estrategia['clave_objetivo'] . " " . $estrategia['nombre_objetivo'] . '<br>' . $estrategia['clave_estrategia']. ' ' . $estrategia['nombre_estrategia'] ;
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

function validaActividad($con, $id_actividad, $sesion){
    if($sesion['nivel'] > 3){
        if($sesion['id_area']){
            return false;
        }
        if($sesion['id_dependencia']){
            $id_dependencia = $sesion['id_dependencia'];
            $sentencia = "SELECT d.id_antedependencia FROM ante_dependencias d
                JOIN ante_areas a ON a.id_dependencia = d.id_antedependencia
                JOIN ante_actividades ac ON ac.id_area = a.id_area
                WHERE ac.id_actividad = $id_actividad
                AND d.id_seguimiento_dependencia = $id_dependencia
            ";
            $stm = $con->query($sentencia);
            $consulta = $stm->fetch(PDO::FETCH_ASSOC);
            return $consulta;
            
        }
    }else{
        return true;
    }
}


function validaArea($con, $id_area, $sesion){
    if($sesion['nivel'] > 3){
        if($sesion['id_area']){
            return false;
        }
        if($sesion['id_dependencia']){
            $id_dependencia = $sesion['id_dependencia'];
            $sentencia = "SELECT * 
                FROM ante_dependencias d
                JOIN ante_areas a ON a.id_dependencia = d.id_antedependencia
                WHERE a.id_area = $id_area
                AND d.id_seguimiento_dependencia = $id_dependencia
            ";
            $stm = $con->query($sentencia);
            $consulta = $stm->fetch(PDO::FETCH_ASSOC);
            return $consulta;
        }
    }else{
        return true;
    }
}


function validaIndicador($con, $id_indicador, $sesion){
    if($sesion['nivel'] > 3){
        if($sesion['id_area']){
            return false;
        }
        if($sesion['id_dependencia']){
            $id_dependencia = $sesion['id_dependencia'];
            $sentencia = "SELECT * 
                FROM ante_dependencias d
                JOIN ante_indicadores_uso i ON i.id_dependencia = d.id_antedependencia
                WHERE i.id = $id_indicador
                AND d.id_seguimiento_dependencia = $id_dependencia
            ";
            $stm = $con->query($sentencia);
            $consulta = $stm->fetch(PDO::FETCH_ASSOC);
            return $consulta;
        }
    }else{
        return true;
    }
}

function traeIndicador($con, $id_indicador){
    $sentencia = "SELECT * FROM ante_indicadores_uso iu 
    LEFT JOIN indicadores id ON id.id_indicador = iu.id_indicador_gaceta
    WHERE id = $id_indicador";
    $stm = $con->query($sentencia);
    return $indicadores = $stm->fetch(PDO::FETCH_ASSOC);
}

function revisaAreas($con, $anio){
    $sentencia = "SELECT a.id_area FROM ante_areas a
    LEFT JOIN proyectos p ON p.id_proyecto = a.id_proyecto
    WHERE p.anio = $anio";
    $stm = $con->query($sentencia);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    if($areas){
        return true;
    }else{
        return false;
    }
}

function traeLineas($con, $id_estrategia){
    $sentencia = "SELECT * FROM pdm_lineas WHERE id_estrategia = $id_estrategia";
    $stm = $con->query($sentencia);
    return $lineas = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeProgramacionesOld($con, $id_actividad){
    $sentencia = "SELECT * FROM programaciones WHERE id_actividad = $id_actividad";
    $stm = $con->query($sentencia);
    return $programacion = $stm->fetch(PDO::FETCH_ASSOC);
}

function traeAlcanzadoOld($con, $id_actividad){
    $sentencia = "SELECT SUM(avance) AS suma FROM avances WHERE id_actividad = $id_actividad";
    $stm = $con->query($sentencia);
    return $programacion = $stm->fetch(PDO::FETCH_ASSOC);
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


function tieneMatriz($con, $id_dependencia){
    $sentencia = "SELECT id_diagnosticoPrograma FROM diagnosticoprograma WHERE id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    $oel = $stm->fetch(PDO::FETCH_ASSOC);
    return $oel;
}

function traeImpacto($con){
    $sentencia = "SELECT * FROM risks_impacto ORDER BY id_impacto DESC";
    $stm = $con->query($sentencia);
    return $impacto = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeProbabilidad($con){
    $sentencia = "SELECT * FROM risks_probabilidad ORDER BY id_probabilidad DESC";
    $stm = $con->query($sentencia);
    return $probabilidad = $stm->fetchAll(PDO::FETCH_ASSOC);
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

function traeAreasUnoB($con, $id_dependencia){
    $sentencia = "SELECT * FROM ante_areas a
    LEFT JOIN ante_unob u ON u.id_area = a.id_area
    WHERE a.id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    return $unoB= $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeAreeasUnoC($con, $id_dependencia){
    $sentencia = "SELECT * FROM ante_actividades a
    LEFT JOIN ante_areas ar ON ar.id_area = a.id_area
    WHERE ar.id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    return $unoB= $stm->fetchAll(PDO::FETCH_ASSOC);
}

function anteAreas_con($con, $id_dependencia){
    $sql = "SELECT *, a.id_area as id_area FROM ante_areas a
        INNER JOIN dependencias_generales dp ON a.id_dependencia_general = dp.id_dependencia
        INNER JOIN dependencias_auxiliares da ON a.id_dependencia_aux = da.id_dependencia_auxiliar
        INNER JOIN proyectos py ON a.id_proyecto = py.id_proyecto
        INNER JOIN programas_presupuestarios pp ON py.id_programa = pp.id_programa
        LEFT JOIN ante_unob ab ON ab.id_area = a.id_area
        WHERE a.id_dependencia = $id_dependencia
        GROUP BY a.id_area
        ORDER BY a.id_area ASC
        ";
    $stm = $con->query($sql);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function ante_actividadesValidadas($con, $id_area){
    $sql = "SELECT * FROM ante_actividades
    WHERE id_area = $id_area";
    $stm = $con->query($sql);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function traeAreeas02a($con, $id_dependencia){
    $sentencia = "SELECT * FROM ante_actividades a
    LEFT JOIN ante_areas ar ON ar.id_area = a.id_area
    WHERE ar.id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    return $unoB= $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeAnteIndicadores($con, $id_dependencia){
    $sentencia = "SELECT * FROM ante_indicadores_uso i
    WHERE i.id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    return $unod = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeRisks($con, $id_actividad){
    $sentencia = "SELECT * FROM risks WHERE id_actividad = $id_actividad";
    $stm = $con->query($sentencia);
    return $risks = $stm->fetch(PDO::FETCH_ASSOC);
}

function traeActividad($con, $id_actividad){
    $sentencia = "SELECT *, a.id_actividad as id_actividad 
    FROM ante_actividades a
    LEFT JOIN ante_programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN ante_lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas pl ON pl.id_linea = la.id_linea
    LEFT JOIN pdm_estrategias pe ON pe.id_estrategia = pl.id_estrategia
    LEFT JOIN pdm_objetivos po ON po.id_objetivo = pe.id_objetivo
    WHERE a.id_actividad = $id_actividad";
    $stm = $con->query($sentencia);
    try {
        $dato = $stm->fetch(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
        throw $th;
    }
    return $dato;
}

function traeIndicadores($con, $id_dependencia){
    $sentencia = "SELECT * FROM ante_indicadores_uso iu
    LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
    WHERE id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $indicadores;
}

function traeUnidades($con){
    $sentencia = "SELECT * FROM unidades_medida ORDER BY nombre_unidad";
    $stm = $con->query($sentencia);
    $unidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $unidades;
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

function verificaAnteproyecto($con, $anio, $etapa){
    $sentencia = "SELECT *
    FROM ante_dependencias d
    JOIN ante_areas a ON a.id_dependencia = d.id_antedependencia
    JOIN ante_actividades act ON act.id_area = a.id_area
    WHERE d.anio = $anio 
    AND a.anio = $anio 
    AND act.anio = $anio
    AND d.etapa = $etapa ";
    $stm = $con->query($sentencia);
    $anteproyecto = $stm->fetch(PDO::FETCH_ASSOC);
    return $anteproyecto;
}


function catalogoActualizado($con, $anio){
    $sentencia = "SELECT 
    CASE 
        WHEN EXISTS (SELECT 1 FROM dependencias_generales WHERE anio = $anio) 
        AND EXISTS (SELECT 1 FROM dependencias_auxiliares WHERE anio = $anio) 
        THEN 1 
        ELSE 0 
    END AS result;
";
    $stm = $con->query($sentencia);
    $existe = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $existe;
}


function actividadesArea($con, $id_area){
    $sentencia = "SELECT *, a.id_actividad as id_actividad FROM ante_actividades a
    JOIN ante_programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN ante_lineasactividades la ON la.id_actividad = a.id_actividad  
    LEFT JOIN pdm_lineas pl ON pl.id_linea = la.id_linea
    LEFT JOIN unidades_medida u ON u.id_unidad = a.id_unidad
    WHERE a.id_area = $id_area
    GROUP BY a.id_actividad";
    $stm = $con->query($sentencia);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
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
        <input type="hidden" name="tipo" value="b">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php

}



if(isset($_POST['update_estrategia'])){
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
        <input type="hidden" name="tipo" value="b">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php

}



if(isset($_POST['id_linea'])){
    // Sanitizar y validar los datos
    $id_area = filter_var($_POST['id_area'], FILTER_VALIDATE_INT);
    $id_linea = filter_var($_POST['id_linea'], FILTER_VALIDATE_INT);


    if ($id_area === false || $id_linea === false) {
        // Manejar el caso en el que los datos no sean válidos
        echo "Datos no válidos.";
        die();
    } else {
        // Verificar si ya existe un registro con id_area e id_linea
        $stm = $con->prepare("SELECT * FROM ante_unob WHERE id_area = ?");
        $stm->execute(array($id_area));
        $existingRecord = $stm->fetch();

        if($existingRecord){
            // Actualizar el registro existente
            $sql = "UPDATE ante_unob SET linea_accion = ? WHERE id_area = ?";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($id_linea, $id_area));
        } else {
            // Insertar un nuevo registro
            $sql = "INSERT INTO ante_unob (linea_accion, id_area) VALUES (?, ?)";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($id_linea, $id_area));
        }
        
        // Redirigir después de la operación
        header("Location: anteproyecto.php");
        exit();
    }
}



if(isset($_POST['update_ODS'])){
    // Obtener y validar los datos del formulario
    $id_area = filter_var($_POST['id_area'], FILTER_VALIDATE_INT);
    $id_estrategia_ods = filter_var($_POST['id_estrategia_ods'], FILTER_VALIDATE_INT);

    if ($id_area === false || $id_estrategia_ods === false) {
        // Manejar el caso en el que los datos no sean válidos
        echo "Datos no válidos.";
        die();
    }

    // Verificar si ya existe un registro con id_area
    $stm = $con->prepare("SELECT * FROM ante_unob WHERE id_area = ?");
    $stm->execute(array($id_area));
    $id_ante_unob = $stm->fetch();

    if($id_ante_unob){
        // Actualizar el registro existente
        $sql = "UPDATE ante_unob SET id_ods = ? WHERE id_area = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($id_estrategia_ods, $id_area));
    }else{
        // Insertar un nuevo registro
        $sql = "INSERT INTO ante_unob (id_ods, id_area) VALUES (?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($id_estrategia_ods, $id_area));
    }

    // Redirigir después de la operación
    header("Location: anteproyecto.php");
    exit();

?>
<form id="myForm" action="" method="get">
    <input type="hidden" name="id_area" value="<?=$id_area?>">
    <input type="hidden" name="tipo" value="b">
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
<?php
}


if(isset($_POST['delete_pdm'])){
    $id_area = $_POST['id_area'];
    $id_estrategia_pdm = $_POST['linea_accion'];


    $sql = "UPDATE ante_unob SET linea_accion = NULL WHERE id_area = $id_area";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_estrategia_pdm));


    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="tipo" value="b">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php
}



if(isset($_POST['delete_ods'])){
    $id_area = $_POST['id_area'];
    $id_estrategia_ods = $_POST['id_ods'];


    $sql = "UPDATE ante_unob SET id_ods = NULL WHERE id_area = $id_area";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_estrategia_ods));


    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="tipo" value="b">
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
    $id_umedida_a = (isset($_POST['id_umedida_a'])) ? $_POST['id_umedida_a'] : NULL;
    $umedida_b = (isset($_POST['umedida_b'])) ? $_POST['umedida_b'] : NULL;
    $id_umedida_b = (isset($_POST['id_umedida_b'])) ? $_POST['id_umedida_b'] : NULL;
    $umedida_c = (isset($_POST['umedida_c'])) ? $_POST['umedida_c'] : NULL;
    $id_umedida_c = (isset($_POST['id_umedida_c'])) ? $_POST['id_umedida_c'] : NULL;
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

    $sql = "UPDATE ante_indicadores_uso SET 
    tipo_op_a = '$tipo_op_a', 
    tipo_op_b = '$tipo_op_b', 
    tipo_op_c = '$tipo_op_c', 
    umedida_a = '$umedida_a', 
    id_umedida_a = '$id_umedida_a', 
    umedida_b = '$umedida_b', 
    id_umedida_b = '$id_umedida_b', 
    umedida_c = '$umedida_c', 
    id_umedida_c = '$id_umedida_c', 
    interpretacion = '$interpretacion', 
    factor_de_comparacion = '$factor_de_comparacion', 
    desc_factor_de_comparacion = '$desc_factor_de_comparacion', 
    linea_base = '$linea_base', 
    actividades_ids = '$actividades_ids', 
    desc_meta_anual = '$desc_meta_anual', 
    medios_de_verificacion = '$medios_de_verificacion', 
    at1 = '$at1', 
    at2 = '$at2', 
    at3 = '$at3', 
    at4 = '$at4', 
    bt1 = '$bt1', 
    bt2 = '$bt2', 
    bt3 = '$bt3', 
    bt4 = '$bt4', 
    ct1 = '$ct1', 
    ct2 = '$ct2', 
    ct3 = '$ct3', 
    ct4 = '$ct4', 
    id_alta = '$id_alta', 
    validado = '$validado' WHERE id = ?";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_indicador));

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



if(isset($_POST['actividad_update'])){

    $id_actividad = $_POST['id_actividad'];
    $id_area = $_POST['id_area'];
    $nombre_actividad = $_POST['nombre_actividad'];
    $id_unidad = $_POST['id_unidad'];

    // Aqui traemos la informacion del 08c
    if($p = traeProgramacionesOld($con, $id_actividad)){
        $programado_anual_anterior = $p['enero'] + $p['febrero'] + $p['marzo'] + $p['abril'] + $p['mayo'] + $p['junio'] + $p['julio'] + $p['agosto'] + $p['septiembre'] + $p['octubre'] + $p['noviembre'] + $p['diciembre'];
    }else{
        $programado_anual_anterior = 0;
    }
    $a = traeAlcanzadoOld($con, $id_actividad);


    $alcanzado_anual_anterior = $a['suma'];

    $enero = $_POST['enero'];
    $febrero = $_POST['febrero'];
    $marzo = $_POST['marzo'];
    $abril = $_POST['abril'];
    $mayo = $_POST['mayo'];
    $junio = $_POST['junio'];
    $julio = $_POST['julio'];
    $agosto = $_POST['agosto'];
    $septiembre = $_POST['septiembre'];
    $octubre = $_POST['octubre'];
    $noviembre = $_POST['noviembre'];
    $diciembre = $_POST['diciembre'];
    $validado = 1;
    
    $sql = "UPDATE ante_actividades SET validado = $validado, nombre_actividad = '$nombre_actividad', id_unidad = '$id_unidad', programado_anual_anterior = '$programado_anual_anterior', alcanzado_anual_anterior = '$alcanzado_anual_anterior' WHERE id_actividad = ?";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_actividad));

    $sql = "UPDATE ante_programaciones SET enero = '$enero', febrero = '$febrero', marzo = '$marzo', abril = '$abril', mayo = '$mayo', junio = '$junio', julio = '$julio', agosto = '$agosto', septiembre = '$septiembre', octubre = '$octubre', noviembre = '$noviembre', diciembre = '$diciembre' WHERE id_actividad = ?";
    $sqlp = $con->prepare($sql);
    $sqlp->execute(array($id_actividad));

    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="tipo" value="a">
    </form>

    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php
}





if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nueva_actividad'])){
    $id_area = $_POST['id_area'];
    $nombre_actividad = $_POST['nombre_actividad'];
    $id_unidad = $_POST['id_unidad'];
    $enero = $_POST['enero'];
    $febrero = $_POST['febrero'];
    $marzo = $_POST['marzo'];
    $abril = $_POST['abril'];
    $mayo = $_POST['mayo'];
    $junio = $_POST['junio'];
    $julio = $_POST['julio'];
    $agosto = $_POST['agosto'];
    $septiembre = $_POST['septiembre'];
    $octubre = $_POST['octubre'];
    $noviembre = $_POST['noviembre'];
    $diciembre = $_POST['diciembre'];
    $programado_anual_anterior = 0;
    $alcanzado_anual_anterior = 0;
    $validado = 1;
    
    $sql = "INSERT INTO ante_actividades (nombre_actividad, id_unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, validado) VALUES (?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($nombre_actividad, $id_unidad, $programado_anual_anterior, $alcanzado_anual_anterior, $id_area, $validado));   
    
    $ultimoId = $con->lastInsertId();
    
    $sql = "INSERT INTO ante_programaciones (enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, id_actividad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $septiembre, $octubre, $noviembre, $diciembre, $ultimoId));
    

    ?>
    <form id="myForm" action="" method="get">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="tipo" value="a">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
    <?php
}

?>