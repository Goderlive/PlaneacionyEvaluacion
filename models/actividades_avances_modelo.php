<?php
require_once 'conection.php';

function TraeDependencias($con, $id_usuario)
{
    $stm = $con->query("SELECT * FROM dependencias dp 
    WHERE id_administrador = $id_usuario");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}

function TraeTodasDependencias($con)
{
    $stm = $con->query("SELECT * FROM dependencias dp ");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($dependencias);
    return $dependencias;
}

function TraerAreas($con, $id_dependencia)
{
    $stm = $con->query("SELECT * FROM areas 
    WHERE id_dependencia = $id_dependencia");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}


function Pendientespbrm($con, $id_dependencia)
{
    $sentencia = "SELECT COUNT(*) AS total_resultados FROM avances av
    JOIN actividades ac ON av.id_actividad = ac.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.id_dependencia = $id_dependencia AND av.validado = 0";
    $stm = $con->query($sentencia);
    $areas = $stm->fetch(PDO::FETCH_ASSOC);
    return $areas;
}
function Pendientespdm($con, $id_dependencia)
{
    $sentencia = "SELECT COUNT(*) AS total_resultados FROM avances av
    JOIN actividades ac ON av.id_actividad = ac.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.id_dependencia = $id_dependencia AND av.validado_2 = 0";
    $stm = $con->query($sentencia);
    $areas = $stm->fetch(PDO::FETCH_ASSOC);
    return $areas;
}


function GetModificaciones($con, $id_avance)
{
    $stm = $con->query("SELECT * FROM modificaciones_actividades WHERE id_avance = $id_avance");
    $edicion = $stm->fetch(PDO::FETCH_ASSOC);
    return $edicion;
}


function Pendientesareaspbrm($con, $id_area)
{
    $sentencia = "SELECT COUNT(*) AS total_resultados FROM avances av
    JOIN actividades ac ON av.id_actividad = ac.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    WHERE ar.id_area = $id_area AND av.validado = 0";
    $stm = $con->query($sentencia);
    $areas = $stm->fetch(PDO::FETCH_ASSOC);
    return $areas;
}
function Pendientesareaspdm($con, $id_area)
{
    $sentencia = "SELECT COUNT(*) AS total_resultados FROM avances av
    JOIN actividades ac ON av.id_actividad = ac.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    WHERE ar.id_area = $id_area AND av.validado_2 = 0";
    $stm = $con->query($sentencia);
    $areas = $stm->fetch(PDO::FETCH_ASSOC);
    return $areas;
}

function Actividades_DB($con, $id_area)
{
    $sql = "SELECT a.*, p.*, li.* FROM actividades a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas li ON li.id_linea = la.id_linea 
    WHERE a.id_area = $id_area
    GROUP BY a.id_actividad
    ORDER BY a.codigo_actividad ASC
    ";
    $stm = $con->query($sql);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}


function TraeActividad($con, $id_actividad)
{
    $sql = "SELECT * FROM actividades a
    JOIN programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas li ON li.id_linea = la.id_linea 
    WHERE a.id_actividad = $id_actividad";
    $stm = $con->query($sql);
    $actividades = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividades;
}

function TraeAvance($con, $id_avance)
{
    $stm = $con->query("SELECT *, ac.id_actividad as actividad FROM avances a
    JOIN actividades ac ON ac.id_actividad = a.id_actividad
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas li ON li.id_linea = la.id_linea 
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_avance
    WHERE a.id_avance = $id_avance");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}



function AvanceMes($con, $actividad, $mes)
{
    $sqlav = "SELECT *, u.nombre as nombre, u.apellidos as apellidos, upb.nombre AS nombrepbrm, upd.nombre AS nombrepdm, a.id_actividad as id_actividad FROM avances a
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas li ON li.id_linea = la.id_linea
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_avance
    LEFT JOIN usuarios upb ON upb.id_usuario = a.id_usuario_validador
    LEFT JOIN usuarios upd ON upd.id_usuario = a.id_usuario_validador_2
    WHERE a.mes = $mes AND a.id_actividad = $actividad";
    $stma = $con->query($sqlav);
    $avance = $stma->fetch(PDO::FETCH_ASSOC);
    return $avance;
}


function TraeLocalidades($con)
{
    $stm = $con->query("SELECT * FROM localidades");
    return $localidades = $stm->fetchAll(PDO::FETCH_ASSOC);
}


function SumaAvancesmesymes($con, $mes, $id_actividad)
{
    $stm = $con->query("SELECT SUM(avance) AS total_avance
    FROM avances
    WHERE (mes BETWEEN 1 AND $mes) AND (validado=1) AND id_actividad = $id_actividad;
    ");
    $sumaavances = $stm->fetch(PDO::FETCH_ASSOC);
    return $sumaavances['total_avance'];
}


function TraeNombredependencia($con, $id_dependencia)
{
    $stm = $con->query("SELECT nombre_dependencia FROM dependencias WHERE id_dependencia = $id_dependencia");
    $nombre_dependencia = $stm->fetch(PDO::FETCH_ASSOC);
    return $nombre_dependencia['nombre_dependencia'];
}

function TraeNombreArea($con, $id_area)
{
    $stm = $con->query("SELECT nombre_area FROM areas WHERE id_area = $id_area");
    $nombre_area = $stm->fetch(PDO::FETCH_ASSOC);
    return $nombre_area['nombre_area'];
}


function DependenciafromArea($con, $id_area)
{
    $stm = $con->query("SELECT d.nombre_dependencia, a.nombre_area, d.id_dependencia, a.id_area FROM areas a
    LEFT JOIN dependencias d ON d.id_dependencia = a.id_dependencia 
    WHERE a.id_area = $id_area");
    $nombre_area = $stm->fetch(PDO::FETCH_ASSOC);
    return $nombre_area;
}



function TraeAvances($con, $id_usuario, $nivel)
{ // Debemos revisar esto
    $stm = $con->query("SELECT *,
    us1.nombre as nombre1, us1.apellidos as apellidos1,
    us2.nombre as nombre2, us2.apellidos as apellidos2,
    FROM avances a
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas pdml ON pdml.clave_linea = la.id_linea
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_avance
    LEFT JOIN actividades ac ON ac.id_actividad = a.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    LEFT JOIN dependencias_generales dpg ON dpg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares dpa ON dpa.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
    LEFT JOIN usuarios us1 ON us1.id_usuario = a.id_usuario_validador
    LEFT JOIN usuarios us2 ON us2.id_usuario = a.id_usuario_validador
    WHERE (a.validado != 1 OR a.validado_2 != 1) AND dp.id_administrador = $id_usuario
    GROUP BY a.id_actividad");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data_avances_actividades);
    return $data_avances_actividades;
}

if (isset($_POST['editar'])) {
    $id_area = $_POST['id_area'];
    $mes = $_POST['mes'];
    $id_avance = $_POST['id_avance'];
    $permitidas = json_encode($_POST['permitidas']);
    $id_aut_edicion = $_POST['id_aut_edicion'];


    $sql = "INSERT INTO modificaciones_actividades (id_avance, permitidas, id_aut_edicion) VALUES (?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($id_avance, $permitidas, $id_aut_edicion));


    $sql = "INSERT INTO avances (mes, avance, justificacion, path_evidenia_evidencia, descripcion_evidencia, id_actividad, id_usuario_avance, localidades, beneficiarios, recursos) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($mes, $_POST['avance'], $_POST['justificacion'], $path_evidencia_evidencia, $_POST['descripcion_evidencia'], $id_actividad, $_POST['id_usuario'], $localidades, $beneficiarios, $recursos));
?>
    <form id="myForm" action="../actividades_avances.php" method="post">
        <input type="hidden" name="id_area" value="<?= $id_area ?>">
        <input type="hidden" name="mes" value="<?= $mes ?>">
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
<?php

}
