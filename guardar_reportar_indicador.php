<?php 
session_start();
if($_SESSION['sistema'] = 'pbrm'){
    include 'conexion.php';
    $extensiones = array('image/jpg','image/jpeg','image/png');
    if(in_array( $_FILES['path_evidencia']['type'], $extensiones ) && $_FILES['path_evidencia']['error'] == 0 ) {
        $anio = date('Y');
        $id_dependencia = $mysqli->real_escape_string($_SESSION['id_dependencia']);
        $id_indicador = $mysqli->real_escape_string($_POST['id_indicador']);
        $trimestre = $_POST['trimestre'];
        $ruta_base = './archivos/indicadores/'.$anio.'/'.$trimestre.'/'.$id_dependencia.'/'.$id_indicador.'/';
        if( !is_dir( $ruta_base ) ) {
            mkdir($ruta_base, 0755, true);
        }
        $avance_a = $mysqli->real_escape_string( $_POST['avvara'] );
        $avance_b = $mysqli->real_escape_string( $_POST['avvarb'] );
        if (isset($_POST['avvarc']) && $_POST['avvarc']){
            $avance_c = $mysqli->real_escape_string( $_POST['avvarc'] );
        }else{
            $avance_c = NULL;
        }
        $justificacion = $mysqli->real_escape_string( $_POST['justificacion'] );
        $id_usuario_reporta = $_SESSION['id_usuario'];
        $descripcion_evidencia = $mysqli->real_escape_string($_POST['descripcion_evidencia']);
        $imagen = str_replace(array(' ', 'php','js','phtml','php3'), '_', date('Ymd_His') . '_' . $_FILES['path_evidencia']['name']);
        if( move_uploaded_file( $_FILES['path_evidencia']['tmp_name'] , $ruta_base . $imagen ) ) {
                $rutacompleta = $ruta_base . $imagen;
                $consulta = "INSERT INTO avances_indicadores(id_indicador,year,trimestre,avance_a,avance_b,avance_c,descripcion_evidencia,justificacion,id_usuario_reporta,path_evidenia_evidencia) 
                VALUES ($id_indicador,'$anio','$trimestre','$avance_a','$avance_b','$avance_c','$descripcion_evidencia ','$justificacion','$id_usuario_reporta','$rutacompleta')";
                $resultado = $mysqli->query($consulta);
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