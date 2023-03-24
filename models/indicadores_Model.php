<?php
require_once 'conection.php';


/* function TraeUsuario($con, $id_usuario){
    $stm = $con->query("SELECT * FROM indicadores_uso iu LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador WHERE iu.anio = $anio AND id_dependencia = '$id_dependencia'  AND (periodicidad = 'trimestral' OR periodicidad = 'mensual'");
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $usuario;
} */


function traepermiso ($con, $id_usuario){
    $resp = Fetch($con, "SELECT id_dependencia FROM  permisos WHERE permiso = $id_usuario");
    return $resp['id_dependencia'];
}


function Fetch($con, $string){
    try {
        $stm = $con->query($string);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th) {
        print $th;
    }
}

function FetchAll($con, $string){
    try {
        $stm = $con->query($string);
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th) {
        print $th;
        print $data;
    }
}

function Indicadores($con, $trimestre, $id_dependencia){
    if($trimestre == "1" || $trimestre == "3"){
        $string = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        WHERE iu.id_dependencia = $id_dependencia AND (periodicidad = 'trimestral' OR periodicidad = 'mensual')";
    }
    if($trimestre == "2"){
        $string = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        WHERE iu.id_dependencia = $id_dependencia AND (periodicidad = 'trimestral' OR periodicidad = 'mensual' OR periodicidad = 'semestral')";
    }
    if($trimestre == "4"){
        $string = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        WHERE iu.id_dependencia = $id_dependencia AND (periodicidad = 'trimestral' OR periodicidad = 'mensual' OR periodicidad = 'semestral' OR periodicidad = 'anual')";
    }
    return FetchAll($con, $string);
}

function TraeConfiguracion($con){
    return Fetch($con, "SELECT * FROM setings");
}


if($_POST){
    session_start();
    if($_SESSION['sistema'] = 'pbrm'){
        $extensiones = array('image/jpg','image/jpeg','image/png');
        if(in_array( $_FILES['path_evidencia']['type'], $extensiones ) && $_FILES['path_evidencia']['error'] == 0 ) {
            $anio = date('Y');
            $id_dependencia = $_POST['id_dependencia'];
            $id_indicador = $_POST['id_indicador'];
            $trimestre = $_POST['trimestre'];
            $ruta_base = '../archivos/indicadores/'.$anio.'/'.$trimestre.'/'.$id_dependencia.'/'.$id_indicador.'/';
            if( !is_dir( $ruta_base ) ) {
                mkdir($ruta_base, 0755, true);
            }
            $avance_a =  $_POST['avvara'];
            $avance_b =  $_POST['avvarb'];
            $avance_c =  $_POST['avvarc'];
            if (isset($_POST['avvarc']) && $_POST['avvarc']){
                $avance_c =  $_POST['avvarc'] ;
            }else{
                $avance_c = NULL;
            }
            $justificacion =  $_POST['justificacion'];
            $id_usuario_reporta = $_SESSION['id_usuario'];
            $descripcion_evidencia = $_POST['descripcion_evidencia'];
            $imagen = str_replace(array(' ', 'php','js','phtml','php3'), '_', date('Ymd_His') . '_' . $_FILES['path_evidencia']['name']);
            if( move_uploaded_file( $_FILES['path_evidencia']['tmp_name'] , $ruta_base . $imagen ) ) {
                    $rutacompleta = $ruta_base . $imagen;
                    $sql = "INSERT INTO avances_indicadores(id_indicador,year,trimestre,avance_a,avance_b,avance_c,descripcion_evidencia,justificacion,id_usuario_reporta,path_evidenia_evidencia) 
                    VALUES ($id_indicador,'$anio','$trimestre','$avance_a','$avance_b','$avance_c','$descripcion_evidencia ','$justificacion','$id_usuario_reporta','$rutacompleta')";
                    $con->query($sql);
                    ?>
                    <script>
                        alert('Registro exitoso');
                        window.location.href = '../indicadores.php';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('Ha ocurrido un error al mover el archivo, intenta nuevamente');
                        window.location.href = '../indicadores.php';
                    </script>
                    <?php   
                }
            } else{
                ?>
                <script>
                    alert('Formato de imagen no válido');
                </script>
                <?php
            }
        } else{
            ?>
            <script>
                window.location.href = 'login.php';
            </script>
            <?php
        }
}
?>

