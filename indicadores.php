<?php
session_start();
if($_SESSION['id_permiso'] !=3){
    $id_dependencia = 3;
    $_SESSION['trimestre'] = 3;

    //Definimos el trimestre a mano
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'conexion.php';
include 'Controllers/breadcrumbs.php';
include 'Controllers/indicadores_Controller.php';

$setings = TraeConfiguracion($con);


$year = $setings['year_report'];



//Prmero definimos el trimestre en el que estamos


if(isset($_POST) && $_POST){
    @$trimestre_actual = $_POST['trimestre'];
}else{
    $trimestre_actual = ceil(date('m')/3);
}
?>

<body>
    <br>
    <div class="container mx-auto">
    <?= breadcrumbs(array("Inicio"=>"index,php", "Indicadores"=> "")); ?>
        <br>

        <div class="text-center">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px">
                    <?= MenuTrimestre($id_dependencia, $trimestre_actual -1); ?>
                </ul>
            </nav>
        </div>   
        <br>
        <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                Estamos en el trimestre <?= $trimestre_actual;?>, Debemos reportar el trimestre anterior
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre Indicador
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Frecuencia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Trimestre <?php echo $_SESSION['trimestre'];?>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reportado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Anual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Reportar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $anio = $_SESSION['anio'];
                        $i = 1;
                        $id_dependencia = $mysqli->real_escape_string($_SESSION['id_dependencia']);
                        $trimestre = $mysqli->real_escape_string($_SESSION['trimestre']); 
                        if($trimestre == 1 && date('m') == 4 and date('d') >= 1){
                            $consulta = "SELECT * FROM indicadores_uso iu LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador WHERE iu.anio = $anio AND id_dependencia = '$id_dependencia'  AND (periodicidad = 'trimestral' OR periodicidad = 'mensual')";
                            $resultado = $mysqli->query($consulta);
                            print_r($consulta);
                            if( $resultado->num_rows > 0 ) {
                                foreach( $resultado as $datos ) {
                                    ?>
                                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <?php echo $i++;?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo $datos['nombre_indicador'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $datos['tipo'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $datos['periodicidad'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $datos['t1'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $datos['t1'] + $datos['t2'] + $datos['t3'] + $datos['t4']; ?>
                                        </td>
                                        <?php
                                        if( date('m') == 4 && date('d') >= 05) {
                                            ?>
                                            <td class="px-6 py-4 text-right">
                                                Ya no puedes reportar
                                            </td>
                                            <?php
                                        }else if($datos['reportado'] == 0){
                                            ?>
                                            <td class="px-6 py-4 text-right">
                                                <a href="reportar_indicador.php?id=<?php echo $datos['id'];?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reportar</a>
                                            </td>
                                            <?php
                                        }  else{
                                            ?>
                                            <td class="px-6 py-4 text-center">
                                                <button type="button" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Reportado</button>
                                            </td>
                                            <?php
                                        }               
                                            ?>
                                    </tr>
                                    <?php                                       
                                }
                            } else {
                                    ?>
                                    <td class="px-6 py-4 text-center">Sin Indicadores</td>
                                    <?php
                            }   
                        } else if($trimestre == 2 && date('m') == 7 and date('d') >= 01){
                            $ano = $_SESSION['anio'];
                            echo '2';
                            echo'<br>';
                            $trimestre_2 = "SELECT * FROM indicadores_uso iu LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador WHERE iu.anio = $ano  AND id_dependencia = '$id_dependencia' AND (periodicidad = 'trimestral' OR periodicidad = 'semestral' OR periodicidad = 'mensual')";
                            $resul_t2 = $mysqli->query($trimestre_2);
                            print_r($trimestre_2);
                            if( $resul_t2->num_rows > 0 ) {
                                foreach( $resul_t2 as $t2 ) {
                                    ?>
                                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <?php echo $i++;?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo $t2['nombre_indicador'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t2['tipo'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t2['periodicidad'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t2['t2'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t2['t1'] + $t2['t2'] + $t2['t3'] + $t2['t4']; ?>
                                        </td>
                                        <?php
                                        if( date('m') == 7 && date('d') == 05) {
                                            ?>
                                            <td class="px-6 py-4 text-right">
                                                Ya no puedes reportar
                                            </td>
                                            <?php
                                        }else{
                                            ?>
                                            <td class="px-6 py-4 text-right">
                                                <a href="reportar_indicador.php?id=<?php echo $t2['id'];?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reportar</a>
                                        </td>
                                            <?php
                                        } 
                                    ?>
                                    </tr>
                                    <?php                                       
                                }
                            } else {
                                    ?>
                                    <td class="px-6 py-4 text-center">Sin Indicadores</td>
                                    <?php
                            }
                        } else if($trimestre == 3 && date('m') == 10 and date('d') >= 01){
                            $ano = $_SESSION['anio'];
                            echo '3';
                            echo'<br>';
                            $trimestre_3 = "SELECT * FROM indicadores_uso iu LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador WHERE iu.anio = $ano  AND id_dependencia = '$id_dependencia' AND (periodicidad = 'mensual' OR periodicidad = 'trimestral')";
                            $resul_t3 = $mysqli->query($trimestre_3);
                            print_r($trimestre_3);
                            if( $resul_t3->num_rows > 0 ) {
                                foreach( $resul_t3 as $t3 ) {
                                    ?>
                                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <?php echo $i++;?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo $t3['nombre_indicador'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t3['tipo'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t3['periodicidad'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t3['t3'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t3['t1'] + $t3['t2'] + $t3['t3'] + $t3['t4']; ?>
                                        </td>
                                        <?php
                                        if( date('m') == 10 && date('d') >= 05) {
                                            ?>
                                            <td class="px-6 py-4 text-right">
                                                Ya no puedes reportar
                                            </td>
                                            <?php
                                            }else if($t3['reportado'] == ''){
                                            ?>
                                            <td class="px-6 py-4 text-center">
                                                <a href="reportar_indicador.php?id=<?php echo $t3['id'];?>" type="button" class="text-white bg-blue-600 dark:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reportar</a>
                                            </td>
                                        <?php
                                        } else if($t3['reportado'] == 0){
                                            ?>
                                            <td class="px-6 py-4 text-center">
                                                <button type="button" class="text-white bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" disabled>En revisión</button>
                                            </td>
                                        <?php
                                        } else if($t3['reportado'] == 1 ){
                                            ?>
                                            <td class="px-6 py-4 text-center">
                                                <button type="button" class="text-white bg-green-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Reportado</button>
                                                <a href="./indicadores_pdf.php" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" download="reporte_indicador">PDF</a>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php                                       
                                }
                            } else {
                                    ?>
                                    <td class="px-6 py-4 text-center">Sin Indicadores</td>
                                    <?php
                            }
                        } else if($trimestre == 4 && date('m') == 1 && date('d') >= 1){
                            $ano = $_SESSION['anio'];
                            echo '4';
                            echo'<br>';
                            $trimestre_4 = "SELECT * FROM indicadores_uso iu LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador WHERE iu.anio = $ano  AND id_dependencia = '$id_dependencia'";
                            print_r($trimestre_4);
                            $trimestre_4 = $mysqli->query($trimestre_4);
                            if( $trimestre_4->num_rows > 0 ) {
                                foreach( $trimestre_4 as $t4 ) {
                                    ?>
                                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <?php echo $i++;?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo $t4['nombre_indicador'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t4['tipo'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t4['periodicidad'] = 'Trimestral';?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t4['t4'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $t4['t1'] + $t4['t2'] + $t4['t3'] + $t4['t4']; ?>
                                        </td>
                                        <?php
                                        if( date('m') == 1 && date('d') >= 15) {
                                            ?>
                                            <td class="px-6 py-4 text-right">
                                                Ya no puedes reportar
                                            </td>
                                            <?php
                                        }else{
                                            ?>
                                            <td class="px-6 py-4 text-right">
                                                <a href="reportar_indicador.php?id=<?php echo $t4['id'];?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reportar</a>
                                            </td>
                                        <?php
                                        }
                                    ?>
                                    </tr>
                                    <?php                                       
                                }
                            } else {
                                    ?>
                                    <td class="px-6 py-4 text-center">Sin Indicadores</td>
                                    <?php
                            }
                        }
                        ?>                        
                    </tbody>
            </table>
        </div>
    </div>
<?php include 'footer.php';?>    
</body>
</html>
<?php
} else{
    ?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}
?>