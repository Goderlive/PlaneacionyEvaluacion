<?php
require_once 'conection.php';


function traepermisoarea ($con, $permisos){
    $id_area = $permisos['id_area'];
    $resp = Fetch($con, "SELECT d.id_dependencia FROM dependencias d
    JOIN areas a ON a.id_dependencia = d.id_dependencia
    JOIN permisos p ON p.id_area = a.id_area
    WHERE a.id_area = $id_area");
    return $resp;
}


function traeavance($con, $id_indicador, $trimestre){
    $resp = Fetch($con, "SELECT av.*, us.id_usuario, us.nombre, us.apellidos, us.correo_electronico, us.tel FROM avances_indicadores av
    LEFT JOIN usuarios us ON av.id_usuario_reporta = us.id_usuario
    WHERE av.id_indicador = $id_indicador AND av.trimestre = $trimestre");
    return $resp;
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

function Indicadores($con, $trimestre, $id_dependencia, $permisos){


    if($permisos['id_area'] != ''){
        $id_area = $permisos['id_area'];


        if($trimestre == "1" || $trimestre == "3"){
            $thesql = "SELECT * FROM indicadores_uso iu 
            LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
            WHERE iu.id_area = $id_area AND (iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Mensual')
            GROUP BY iu.id";
        }
        if($trimestre == "2"){
            $thesql = "SELECT * FROM indicadores_uso iu 
            LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
            WHERE iu.id_area = $id_area AND (iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Mensual' OR iu.periodicidad = 'Semestral')
            GROUP BY iu.id";
        }
        if($trimestre == "4"){
            $thesql = "SELECT * FROM indicadores_uso iu 
            LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
            WHERE iu.id_area = $id_area AND (iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Mensual' OR iu.periodicidad = 'Semestral' OR iu.periodicidad = 'Anual')
            GROUP BY iu.id";
        }
    }else{
        if($trimestre == "1" || $trimestre == "3"){
            $thesql = "SELECT * FROM indicadores_uso iu 
            LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
            WHERE iu.id_dependencia = $id_dependencia AND (iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Mensual')
            GROUP BY iu.id";
        }
        if($trimestre == "2"){
            $thesql = "SELECT * FROM indicadores_uso iu 
            LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
            WHERE iu.id_dependencia = $id_dependencia AND (iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Mensual' OR iu.periodicidad = 'Semestral')
            GROUP BY iu.id";
        }
        if($trimestre == "4"){
            $thesql = "SELECT * FROM indicadores_uso iu 
            LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
            WHERE iu.id_dependencia = $id_dependencia AND (iu.periodicidad = 'Trimestral' OR iu.periodicidad = 'Mensual' OR iu.periodicidad = 'Semestral' OR iu.periodicidad = 'Anual')
            GROUP BY iu.id";
        }
    }



    return FetchAll($con, $thesql);
}

function TraeConfiguracion($con){
    return Fetch($con, "SELECT * FROM setings");
}

if(isset($_POST['reportar']) and $_POST['reportar']){
    session_start();
    if($_SESSION['sistema'] = 'pbrm'){
        $extensiones = array('image/jpg','image/jpeg','image/png');
        $anio = date('Y');
        $id_dependencia = $_POST['id_dependencia'];
        $id_indicador = $_POST['id_indicador'];
        $trimestre = $_POST['trimestre'];
        
        $ruta_base = '../archivos/indicadores/'.$anio.'/'.$trimestre.'/'.$id_dependencia.'/'.$id_indicador.'/';
        if( !is_dir( $ruta_base ) ) {
            mkdir($ruta_base, 0741, true);
        }
        $avance_a =  $_POST['avvara'];
        $avance_b =  $_POST['avvarb'];
        $avance_c =  isset($_POST['avvarc']) ? $_POST['avvarc'] : NULL;
        $justificacion =  $_POST['justificacion'];
        $id_usuario_reporta = $_SESSION['id_usuario'];
        $descripcion_evidencia = $_POST['descripcion_evidencia'];
        $imagen = NULL;

        if(isset($_FILES['path_evidencia']) && in_array($_FILES['path_evidencia']['type'], $extensiones) && $_FILES['path_evidencia']['error'] == 0 ) {
            $imagen = str_replace(array(' ', 'php','js','phtml','php3'), '_', date('Ymd_His') . '_' . $_FILES['path_evidencia']['name']);
            if( move_uploaded_file( $_FILES['path_evidencia']['tmp_name'] , $ruta_base . $imagen ) ) {
                $rutacompleta = $ruta_base . $imagen;
            } else {
                ?>
                <script>
                    alert('Ha ocurrido un error al mover el archivo, intenta nuevamente');
                    window.location.href = '../indicadores.php';
                </script>
                <?php   
            }
        }
       
        $sql = "INSERT INTO avances_indicadores(id_indicador,year,trimestre,avance_a,avance_b,avance_c,descripcion_evidencia,justificacion,id_usuario_reporta,path_evidenia_evidencia) 
                VALUES ($id_indicador,'$anio','$trimestre','$avance_a','$avance_b','$avance_c','$descripcion_evidencia ','$justificacion','$id_usuario_reporta','$rutacompleta')";
        $con->query($sql);
        ?>
        <form id="myForm" action="../indicadores.php" method="post">
            <input type="hidden" name="id_dependencia" value="<?=$id_dependencia?>">
            <input type="hidden" name="trimestre" value="<?=$trimestre?>">
        </form>
        <script type="text/javascript">
            alert("Indicador Actualizado")
            document.getElementById('myForm').submit();
        </script>
        <?php
    } else{
        ?>
        <script>
            window.location.href = 'login.php';
        </script>
        <?php
    }
}

?>

