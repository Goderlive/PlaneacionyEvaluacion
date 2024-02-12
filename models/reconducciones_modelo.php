<?php
require_once 'conection.php';


function TraeReconduccionesporvalidar($con, $id_area)
{
    $stm = $con->query("SELECT * FROM reconducciones_atividades ra 
    JOIN areas ar ON ar.id_area = ra.id_area
    JOIN actividades a ON a.id_area = ra.id_area
    JOIN dependencias d ON ar.id_dependencia = d.id_dependencia
    WHERE d.id_dependencia = $id_area AND ra.validado != 1
    GROUP BY ra.id_reconduccion_actividades");
    $reconduccion = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconduccion;
}


function traeNumeroActividad($con, $id_area)
{
    $sentencia = "SELECT codigo_actividad FROM actividades WHERE id_actividad = $id_area ORDER BY codigo_actividad DESC";
    $stm = $con->query($sentencia);
    $numero = $stm->fetch(PDO::FETCH_ASSOC);
    return $numero['codigo_actividad'] + 1;
}


function traeUnidades($con)
{ // Trae unidades de Medida registradas
    $sentencia = "SELECT * FROM unidades_medida ORDER BY nombre_unidad";
    $stm = $con->query($sentencia);
    $unidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $unidades;
}



function Traedepndencias($con)
{
    $stm = $con->query("SELECT * FROM dependencias");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}


function TraeReconduccionesValidadas($con, $id_dependencia)
{
    $stm = $con->query(
        "SELECT ra.* FROM reconducciones_atividades ra 
        LEFT JOIN areas a ON a.id_area = ra.id_area
        LEFT JOIN dependencias d ON d.id_dependencia = a.id_dependencia
        WHERE d.id_dependencia = $id_dependencia AND validado = 1"
    );
    $reconduccion = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconduccion;
}


function TraeProgramaciones($con, $id_reconduccion)
{
    $stm = $con->query("SELECT * FROM programacion_reconducciones WHERE id_reconduccion = $id_reconduccion");
    $programaciones = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $programaciones;
}


function TraerAreas($con, $dep)
{
    $stm = $con->query("SELECT * FROM areas WHERE id_dependencia = $dep");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}


function TraerActividades($con, $area)
{
    $stm = $con->query("SELECT * FROM actividades WHERE id_area = $area");
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}


function NombreActividad($con, $actividad)
{
    $stm = $con->query("SELECT * FROM actividades WHERE id_actividad = $actividad");
    $actividad = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividad;
}


function NombreArea($con, $id_area)
{
    $stm = $con->query("SELECT nombre_area FROM areas WHERE id_area = $id_area");
    $area = $stm->fetch(PDO::FETCH_ASSOC);
    return $area['nombre_area'];
}


function TraeDatosReconduccion($con, $id_area)
{
    $stm = $con->query("SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON ar.id_proyecto = py.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    LEFT JOIN titulares t ON t.id_area = ar.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE ar.id_area = $id_area");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}


function ProgramaMensual($con, $actividad)
{
    $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $actividad");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    $data = array_slice($data, 1, -2);
    return $data;
}


function MuestraAvanceActual($con, $mes, $id_actividad)
{
    $stm = $con->query("SELECT * FROM avances WHERE id_actividad = $id_actividad AND mes = $mes");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}


function MuestraProgramacion($con, $id_actividad)
{
    $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $id_actividad");
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}


function MuestraSumaProgramacion($con, $id_actividad)
{
    $data = MuestraProgramacion($con, $id_actividad);
    $sum = $data['enero'] + $data['febrero'] + $data['marzo'] + $data['abril'] + $data['mayo'] + $data['junio'] + $data['julio'] + $data['agosto'] + $data['septiembre'] + $data['octubre'] + $data['noviembre'] + $data['diciembre'];
    return $sum;
}


function TraeEncargados($con, $id_area, $id_dependencia)
{
    $stm = $con->query("SELECT * FROM titulares WHERE id_area = $id_area");
    $area = $stm->fetch(PDO::FETCH_ASSOC);

    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $dependencia = $stm->fetch(PDO::FETCH_ASSOC);

    if ($area && $dependencia) {
        $array = array();
        array_push($array, $area, $dependencia);
        return $array;
    } else {
        return 0;
    }
}


if (isset($_POST) && $_POST) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg_nueva_actividad'])) {
        // Validar y limpiar entradas
        $idArea = filter_input(INPUT_POST, 'id_area', FILTER_VALIDATE_INT);
        $idUsuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_STRING);
        $noOficio = filter_input(INPUT_POST, 'no_oficio', FILTER_SANITIZE_STRING);
        $depGeneral = filter_input(INPUT_POST, 'general', FILTER_SANITIZE_STRING);
        $depAuxiliar = filter_input(INPUT_POST, 'auxiliar', FILTER_SANITIZE_STRING);
        $programa = filter_input(INPUT_POST, 'programa', FILTER_SANITIZE_STRING);

        if ($idArea && $idUsuario && $noOficio && $depGeneral && $depAuxiliar && $programa) {
            // Preparar la consulta
            $sql = "INSERT INTO reconducciones_atividades (id_area, id_solicitante, no_oficio, dep_general, dep_aux, programa) VALUES (?, ?, ?, ?, ?, ?)";
            $sqlr = $con->prepare($sql);

            // Vincular parámetros
            $sqlr->bindParam(1, $idArea);
            $sqlr->bindParam(2, $idUsuario);
            $sqlr->bindParam(3, $noOficio);
            $sqlr->bindParam(4, $depGeneral);
            $sqlr->bindParam(5, $depAuxiliar);
            $sqlr->bindParam(6, $programa);

            // Ejecutar la consulta
            try {
                $sqlr->execute();
            } catch (PDOException $e) {
                // Manejar error
                error_log('Error en la inserción: ' . $e->getMessage());
                // Redirigir o informar al usuario
            }
        }
        $stm = $con->query("SELECT LAST_INSERT_ID()");
        $last = $stm->fetch(PDO::FETCH_ASSOC);
        $last = $last['LAST_INSERT_ID()'];

        $last = 0;
        $suma_old = 0;
        $desc_actividad = filter_input(INPUT_POST, 'nombre_actividad', FILTER_VALIDATE_INT);
        $id_unidad = filter_input(INPUT_POST, 'id_unidad', FILTER_VALIDATE_INT);
        $nombre_actividad = $_POST['nombre_actividad'];
        $id_unidad = $_POST['id_unidad'];
        $meta_anual_actual = 0;
        $meta_anual_actual = sumaMeses($_POST);
        $avance_actual = 0;
        $programacion_old = array("0");



        $sql = "INSERT INTO programacion_reconducciones (id_reconduccion, desc_actividad, u_medida, meta_anual_anterior, meta_anual_actual, act_realizadas_sofar, programacion_inicial, programacion_final, justificacion) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($last, $desc_actividad, $id_unidad, $suma_old, $meta_anual_actual, $avance_actual, $programacion_old, $programacion_nueva, $justificacion));
        header("Location: ../reconduccion_actividades.php");
    }



    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg_nueva_actividad'])) {
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
        $validado = 0;
        // Primero recabamos los datos
        //Luego complementamos los datos que no tenemos, como el NUMERO DE LA ACTIVIDAD

        $codigo_actividad = traeNumeroActividad($con, $id_area);


        $sql = "INSERT INTO actividades (codigo_actividad, nombre_actividad, id_unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, validado) VALUES (?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($codigo_actividad, $nombre_actividad, $id_unidad, $programado_anual_anterior, $alcanzado_anual_anterior, $id_area, $validado));

        $ultimoId = $con->lastInsertId();

        $sql = "INSERT INTO programaciones (enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, id_actividad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $septiembre, $octubre, $noviembre, $diciembre, $ultimoId));

?>
        <form id="myForm" action="mis_reconducciones_actividades.php" method="get">
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
        </script>
<?php
    }

    if (isset($_POST['data'])) {
        print "<pre>";
        // Primero creamos la reconduccion
        $sql = "INSERT INTO reconducciones_atividades (id_area, id_solicitante, no_oficio, dep_general, dep_aux, programa) VALUES (?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($_POST['id_area'], $_POST['id_usuario'], $_POST['no_oficio'], $_POST['general'], $_POST['auxiliar'], $_POST['programa']));

        $stm = $con->query("SELECT LAST_INSERT_ID()");
        $last = $stm->fetch(PDO::FETCH_ASSOC);
        $last = $last['LAST_INSERT_ID()'];


        foreach ($_POST['actividades'] as $actividad) {
            $programacion_nueva = '{';
            $no_actividad = array_splice($_POST[$actividad], 0, 1);
            $no_actividad = $no_actividad[0];

            $descripcion_actividad = array_splice($_POST[$actividad], 0, 1);
            $descripcion_actividad = $descripcion_actividad[0];

            $unidad_medida = array_splice($_POST[$actividad], 0, 1);
            $unidad_medida = $unidad_medida[0];


            $stm = $con->query("SELECT SUM(avance) FROM avances WHERE id_actividad = $actividad");
            $avance_actual = $stm->fetch(PDO::FETCH_ASSOC);
            $avance_actual = $avance_actual['SUM(avance)'];


            // ******************************** OLD Programacion **************************
            $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $actividad");
            $old_programacion = $stm->fetch(PDO::FETCH_ASSOC);
            $old_programacion = array_slice($old_programacion, 1);
            $old_programacion = array_slice($old_programacion, 0, -2);

            $programacion_old = "";
            $suma_old = 0;
            foreach ($old_programacion as $old) {
                $programacion_old .= '"' . $old . '", ';
                $suma_old += $old;
            }
            $programacion_old = substr($programacion_old, 0, -2);
            $programacion_old .= "";



            // ******************************** NEW Programacion **************************

            $programacion_nueva = "";
            $programacion_anual_nueva = 0;
            $contador = 0;
            $justificacion = end($_POST[$actividad]);
            array_pop($_POST[$actividad]);
            foreach ($_POST[$actividad] as $prog) {
                $programacion_nueva .= '"' . $prog . '", ';
                $programacion_anual_nueva += $prog;
            }
            $programacion_nueva = substr($programacion_nueva, 0, -2);



            // ***************************************** INCERTAMOS *******************************************
            $sql = "INSERT INTO programacion_reconducciones (id_reconduccion, id_actividad, no_actividad, desc_actividad, u_medida, meta_anual_anterior, meta_anual_actual, act_realizadas_sofar, programacion_inicial, programacion_final, justificacion) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($last, $actividad, $no_actividad, $descripcion_actividad, $unidad_medida, $suma_old, $programacion_anual_nueva, $avance_actual, $programacion_old, $programacion_nueva, $justificacion));
            header("Location: ../reconduccion_actividades.php");
        }
    }
}
?>