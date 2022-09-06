<?php
require_once 'conection.php';

function Actividades_DB($con, $id_area){
    $sql = "SELECT * FROM actividades a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}

function AvanceMes($con, $actividad, $mes){
    $sqlav = "SELECT * FROM avances a
    WHERE a.mes = $mes AND id_actividad = $actividad";
    $stma = $con->query($sqlav);
    $actividades = $stma->fetch(PDO::FETCH_ASSOC);
    return $actividades;
}

function ProgramaActividad($con, $id_actividad){
    $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $id_actividad");
    $programacion = $stm->fetch(PDO::FETCH_ASSOC);
    $programacion = array_slice($programacion, 1, -1);
    return $programacion;
}

function AvancesActividad($con, $id_actividad, $mes){
    $stm = $con->query("SELECT SUM(avance) FROM avances WHERE id_actividad = $id_actividad AND mes < $mes+1 AND validado = 1");
    $avances = $stm->fetch(PDO::FETCH_ASSOC);

    $avances = ($avances['SUM(avance)']) ? $avances['SUM(avance)'] : NULL;
    return $avances;
}

function AvanceThisMes($con, $id_actividad, $mes){
    $stm = $con->query("SELECT avance FROM avances WHERE id_actividad = $id_actividad AND mes = $mes AND validado = 1");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}

if (isset($_POST['jfnkasjnkasdf34q345']) == "Enviar") {
    $data = $_POST;
    $year = $data['year'];
    $mes = $data['mes'];
    $id_actividad = $data['id_actividad'];
    $id_dependencia = $data['id_dependencia'];
    $id_area = $data['id_area'];
    $id_actividad = $data['id_actividad'];

    if(!is_dir("../archivos/actividades/$year")){
        mkdir("../archivos/actividades/$year");
    }
    if(!is_dir("../archivos/actividades/$year/$mes")){
        mkdir("../archivos/actividades/$year/$mes");
    }
    if(!is_dir("../archivos/actividades/$year/$mes/$id_dependencia")){
        mkdir("../archivos/actividades/$year/$mes/$id_dependencia");
    }
    if(!is_dir("../archivos/actividades/$year/$mes/$id_dependencia/$id_area")){
        mkdir("../archivos/actividades/$year/$mes/$id_dependencia/$id_area");
    }
    if(!is_dir("../archivos/actividades/$year/$mes/$id_dependencia/$id_area/$id_actividad")){
        mkdir("../archivos/actividades/$year/$mes/$id_dependencia/$id_area/$id_actividad");
    }

    $dir = "../archivos/actividades/$year/$mes/$id_dependencia/$id_area/$id_actividad/";

    if($_FILES["evidencia_de_evidencia"]["error"] == UPLOAD_ERR_OK){
        $uno = rand(1,99);
        $nombre_tmp = $_FILES["evidencia_de_evidencia"]["tmp_name"];
        $nombre_evidencia_de_evidencia = basename("evidencia_de_evidencia".$uno.$_FILES["evidencia_de_evidencia"]["name"]);
        $full_evidencia_evidencia = $dir.$nombre_evidencia_de_evidencia;
        move_uploaded_file($nombre_tmp, $full_evidencia_evidencia);
    }
    $sql = "INSERT INTO avances (mes, avance, justificacion, path_evidenia_evidencia, descripcion_evidencia, id_actividad, id_usuario_avance) VALUES (?,?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($mes, $data['avance'], $data['justificacion'], $full_evidencia_evidencia, $data['descripcion_evidencia'], $id_actividad, $data['id_usuario']));
    //header("Location: ../revisa_avances.php?type=$tipo");

    ?>
    
    <form id="myForm" action="../reportes.php" method="post">
        <input type="hidden" name="id_area" value="<?=$id_area?>">
        <input type="hidden" name="mes" value="<?=$mes?>">
    </form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
    
<?php

}?>
