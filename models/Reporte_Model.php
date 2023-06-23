<?php
require_once 'conection.php';

function NombreArea($con, $id_area)
{
    $stm = $con->query("SELECT * FROM areas WHERE id_area = $id_area");
    $area = $stm->fetch(PDO::FETCH_ASSOC);
    return $area["nombre_area"];
}

function traeladependencia($con, $id_area)
{
    $stm = $con->query("SELECT d.id_dependencia FROM dependencias d
                        JOIN areas a ON a.id_dependencia = d.id_dependencia 
                        WHERE a.id_area = $id_area");
    $actividad = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividad;
}


function GetModificaciones($con, $id_avance){
    $stm = $con->query("SELECT * FROM modificaciones_actividades WHERE id_avance = $id_avance");
    $edicion = $stm->fetch(PDO::FETCH_ASSOC);
    return $edicion;
}

function traelocalidades($con)
{
    $stm = $con->query("SELECT * FROM localidades");
    $localidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $localidades;
}


function buscaactilistas($con, $id_actividad)
{
    $stm = $con->query("SELECT * FROM lineasactividades WHERE id_actividad = $id_actividad");
    $actividad = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividad;
}

function CuentaAvances($con, $id_area, $mes)
{
    $stm = $con->query("SELECT COUNT(av.id_avance) FROM avances av
    LEFT JOIN actividades ac ON ac.id_actividad = av.id_actividad
    WHERE ac.id_area = $id_area AND av.mes < $mes+1 AND av.validado = 1");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(av.id_avance)']) ? $c_avance['COUNT(av.id_avance)'] : NULL;
    return $c_avance;
}

function CuentaActividades($con, $id_area, $mes)
{
    $stm = $con->query("SELECT COUNT(id_actividad) FROM actividades WHERE id_area = $id_area");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(id_actividad)']) ? $c_avance['COUNT(id_actividad)'] : NULL;
    return $c_avance;
}



function Actividades_DB($con, $id_area)
{
    $sql = "SELECT * FROM actividades a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}

function Actividad_DB($con, $id_actividad)
{
    $sql = "SELECT * FROM actividades a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN lineasactividades l ON l.id_actividad = a.id_actividad
    WHERE a.id_actividad = $id_actividad";
    $stm = $con->query($sql);
    $actividades = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividades;
}

function traeudmed($con){
    $sqlav = "SELECT * FROM udmed_pdm";
    $stma = $con->query($sqlav);
    $unidadesdemedida = $stma->fetchAll(PDO::FETCH_ASSOC);
    return $unidadesdemedida;
}


function AvanceMes($con, $id_actividad, $mes)
{
    $sqlav = "SELECT * FROM avances a
    WHERE a.mes = $mes AND id_actividad = $id_actividad";
    $stma = $con->query($sqlav);
    $actividades = $stma->fetch(PDO::FETCH_ASSOC);
    return $actividades;
}

function ProgramaActividad($con, $id_actividad)
{
    $stm = $con->query("SELECT * FROM programaciones WHERE id_actividad = $id_actividad");
    $programacion = $stm->fetch(PDO::FETCH_ASSOC);
    $programacion = array_slice($programacion, 1, -1);
    return $programacion;
}


function editable($con, $avance)
{
    if ($avance) {
        $id_avance = $avance['id_avance'];
    } else {
        return 0;
    }
    $stm = $con->query("SELECT * FROM modificaciones_actividades WHERE id_avance = $id_avance");
    $editable = $stm->fetch(PDO::FETCH_ASSOC);
    return $editable;
}

function RevisaAvancesExistentes($con, $id_actividad, $mes)
{
    $stm = $con->query("SELECT * FROM avances WHERE id_actividad = $id_actividad AND mes = $mes");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    if ($avance) {
        return true;
    }
}


function AvancesActividad($con, $id_actividad, $mes)
{
    $stm = $con->query("SELECT SUM(avance) FROM avances WHERE id_actividad = $id_actividad AND mes < $mes+1 AND validado = 1");
    $avances = $stm->fetch(PDO::FETCH_ASSOC);

    $avances = ($avances['SUM(avance)']) ? $avances['SUM(avance)'] : NULL;
    return $avances;
}

function AvanceThisMes($con, $id_actividad, $mes)
{
    $stm = $con->query("SELECT avance FROM avances WHERE id_actividad = $id_actividad AND mes = $mes ");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}


function AvanceFullThisMes($con, $id_actividad, $mes)
{
    $stm = $con->query("SELECT * FROM avances a
    JOIN usuarios u ON a.id_usuario_avance = u.id_usuario
    LEFT JOIN lineasactividades l ON l.id_actividad = a.id_actividad
    WHERE a.id_actividad = $id_actividad AND a.mes = $mes");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}

function tieneReconduccion($con, $id_actividad){
    $stm = $con->query("SELECT * FROM programacion_reconducciones pr
    LEFT JOIN reconducciones_atividades ra ON ra.id_reconduccion_actividades = id_reconduccion
    WHERE pr.id_actividad = $id_actividad AND validado != 1");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}



if (isset($_POST['jfnkasjnkasdf34q345']) && $_POST['jfnkasjnkasdf34q345'] == "Enviar") {
    if ($_SESSION['sistema'] == 'pbrm') {
        $year = date('Y');
        $mes = $_POST['mes'];
        $id_actividad = $_POST['id_actividad'];
        $id_dependencia = $_POST['id_dependencia'];
        $id_area = $_POST['id_area'];
        $localidades = isset($_POST['localidades']) ? implode(",", $_POST['localidades']) : NULL;
        $beneficiarios = (isset($_POST['beneficiarios']) && $_POST['beneficiarios'] != "") ? $_POST['beneficiarios'] : NULL;
        $recursos_federales = isset($_POST['recursos_federales']) ? $_POST['recursos_federales'] : NULL;
        $recursos_estatales = isset($_POST['recursos_estatales']) ? $_POST['recursos_estatales'] : NULL;
        $justificacion = isset($_POST['justificacion']) ? $_POST['justificacion'] : NULL;
        $recursos_propios = isset($_POST['recursos_propios']) ? $_POST['recursos_propios'] : NULL;
        $actividad_trimestral = isset($_POST['actividad_trimestral']) ? $_POST['actividad_trimestral'] : NULL;

        if ($recursos_federales || $recursos_estatales || $recursos_propios) {
            $recursos = '';
            if($recursos_federales){
                $recursos .= "R F: " . $recursos_federales . "% - ";
            }
            if($recursos_estatales){
                $recursos .=  "R E: " . $recursos_estatales . "% - ";
            }
            if($recursos_propios){
                $recursos .= "R P: " . $recursos_propios . "%";
            }
        } else {
            $recursos = NULL;
        }

        // Verificamos que no exista este avance
        if (RevisaAvancesExistentes($con, $id_actividad, $mes)) { ?>
            <form id="myForm" action="reportes.php" method="post">
                <input type="hidden" name="id_area" value="<?= $id_area ?>">
                <input type="hidden" name="mes" value="<?= $mes ?>">
            </form>
            <script type="text/javascript">
                alert("Meta Actualizada r")
                document.getElementById('myForm').submit();
            </script>
        <?php
            die();
        }

        $dir = 'archivos/actividades/' . $year . '/' . $mes . '/' . $id_dependencia . '/' . $id_area . '/' . $id_actividad . '/';
        if (!is_dir($dir)) {
            mkdir($dir, 0741, true);
        }

        $path_evidencia_evidencia = NULL;

        if (isset($_FILES['evidencia_de_evidencia']) && $_FILES['evidencia_de_evidencia']['error'] == 0 && in_array($_FILES['evidencia_de_evidencia']['type'], array('image/jpg', 'image/jpeg', 'image/png'))) {
            if ($_FILES["evidencia_de_evidencia"]["error"] == UPLOAD_ERR_OK) {
                $imagen = str_replace(array(' ', 'php', 'js', 'phtml', 'php3', 'exe'), '_', date('Ymd_His') . '_' . $_FILES['evidencia_de_evidencia']['name']);
                $uno = rand(1, 99);
                $nombre_evidencia_de_evidencia = basename("ede" . $uno . $imagen);
                $full_evidencia_evidencia = $dir . $nombre_evidencia_de_evidencia;

                if (move_uploaded_file($_FILES['evidencia_de_evidencia']['tmp_name'], $full_evidencia_evidencia)) {
                    $path_evidencia_evidencia = $full_evidencia_evidencia;
                }
            }
        }

        $sql = "INSERT INTO avances (mes, avance, justificacion, path_evidenia_evidencia, descripcion_evidencia, id_actividad, id_usuario_avance, localidades, beneficiarios, recursos, actividad_trimestral) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($mes, $_POST['avance'], $justificacion, $path_evidencia_evidencia, $_POST['descripcion_evidencia'], $id_actividad, $_POST['id_usuario'], $localidades, $beneficiarios, $recursos, $actividad_trimestral));


        if(isset($_POST['udmed'])) {
            $udmed = $_POST['udmed'];
            $id_actividad = $_POST['id_actividad']; // Suponiendo que se obtiene el valor de id_actividad correctamente
        
            try {
                $sqlupdate = "UPDATE lineasactividades SET udmed = '$udmed' WHERE id_actividad = $id_actividad";
                $sqlu = $con->prepare($sqlupdate);
                $sqlu->execute();
            } catch (\Throwable $th) {
                throw $th;
                die();
            }
        
        }
        
        ?>
        <form id="myForm" action="reportes.php" method="post">
            <input type="hidden" name="id_area" value="<?= $id_area ?>">
            <input type="hidden" name="mes" value="<?= $mes ?>">
        </form>
        <script type="text/javascript">
            alert("Meta Actualizada")
            document.getElementById('myForm').submit();
        </script>
<?php
    }
}
