<?php 
session_start();
if($_SESSION['sistema'] = 'pbrm'){
    var_dump($_POST);
    include 'conexion.php';
    $extensiones = array('image/jpg','image/jpeg','image/png');
    if(in_array( $_FILES['path_evidencia']['type'], $extensiones ) && $_FILES['path_evidencia']['error'] == 0 ) {
        $anio = date('Y');
        $id_dependencia = $mysqli->real_escape_string($_SESSION['id_dependencia']);
        $id_indicador = $mysqli->real_escape_string($_POST['id_indicador']);
        $trimestre = floor( (  date('m') -1 ) / 3 ) + 1;
        $ruta_base = './archivos/indicadores/'.$anio.'/'.$trimestre.'/'.$id_dependencia.'/'.$id_indicador.'/';
        if( !is_dir( $ruta_base ) ) {
            mkdir($ruta_base, 0755, true);
        }
        $avance_a = $mysqli->real_escape_string( $_POST['avvara'] );
        $avance_b = $mysqli->real_escape_string( $_POST['avvarb'] );
        $avance_c = $mysqli->real_escape_string( $_POST['avvarc'] );
        $porcentaje_avance = $mysqli->real_escape_string( $_POST['porcentaje_avance'] );
        $justificacion = $mysqli->real_escape_string( $_POST['justificacion'] );
        $id_usuario_reporta = $_SESSION['id_usuario'];
        $descripcion_evidencia = $mysqli->real_escape_string($_POST['descripcion_evidencia']);
        $imagen = str_replace(array(' ', 'php','js','phtml','php3'), '_', date('Ymd_His') . '_' . $_FILES['path_evidencia']['name']);
        if( move_uploaded_file( $_FILES['path_evidencia']['tmp_name'] , $ruta_base . $imagen ) ) {
                $consulta = "INSERT INTO avances_indicadores(id_indicador,anio,trimestre,avance_a,avance_b,avance_c,porcentaje_avance,descripcion_evidencia,justificacion,id_usuario_reporta,path_evidencia) VALUES ($id_indicador,'$anio','$trimestre','$avance_a','$avance_b','$avance_c','$porcentaje_avance','$descripcion_evidencia ','$justificacion','$id_usuario_reporta','$imagen')";
                $resultado = $mysqli->query($consulta);
                print_r($consulta);
                ?>
                <script>
                    alert('Registro exitoso');
                    window.location.href = 'indicadores.php';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Ha ocurrido un error al mover el archivo, intenta nuevamente');
                    window.location.href = 'reportar_indicador.php';
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
?>