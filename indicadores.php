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



//Primero definimos el trimestre en el que estamos
if(isset($_POST) && $_POST){
    @$trimestre_actual = $_POST['trimestre'];
}else{
    $trimestre_actual = ceil(date('m')/3) -1;
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
                    <?= MenuTrimestre($id_dependencia, $trimestre_actual); ?>
                </ul>
            </nav>
        </div>   
        <br>
        <?php if($trimestre_actual == ceil(date('m')/3) -1): ?>
        <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                Estamos en el trimestre <?= $trimestre_actual +1;?>, Se debe reportar este trimestre
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <?php endif ?>


        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-3 py-3">
                                #
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Nombre Indicador
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Variables    
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Frecuencia
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Trimestre <?= $trimestre_actual?>
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Reportado
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Anual
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Accion
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $ta = TextoTrimestre($trimestre_actual)?>
                        <?php $indicadores = Indicadores($con, $trimestre_actual, $id_dependencia);
                        //var_dump($indicadores);
                        if($indicadores): 
                            $i = 1;
                            foreach( $indicadores as $datos ): ?>

                                <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <?= $i++;?>
                                    </th>
                                    <td class="px-2 py-4">
                                        <?= $datos['nombre_indicador'];?>
                                    </td>
                                    <td class="px-2 py-4" align="left">
                                        <?= "- " . $datos['variable_a'] . "<br>"?>
                                        <?= "- " . $datos['variable_b']?>
                                        <?php if($datos['variable_c']){
                                            print "<br>- " . $datos['variable_c'];
                                        }?>
                                    </td>
                                    <td class="px-2 py-4">
                                        <?= $datos['umedida_a'] . "<br>"?>
                                        <?= $datos['umedida_b']?>
                                        <?php if($datos['umedida_c']){
                                            print $datos['umedida_c'];
                                        }?>
                                    </td>
                                    <td class="px-2 py-4">
                                        <?= $datos['periodicidad'];?>
                                    </td>
                                    <td class="px-2 py-4">
                                        <?= $datos[$ta[0]] . "<br>" . $datos[$ta[1]];?>
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td class="px-2 py-4">
                                        <?php print $datos['at1'] + $datos['at2'] + $datos['at3'] + $datos['at4'] . "<br>" . $datos['bt1'] + $datos['bt2'] + $datos['bt3'] + $datos['bt4']; 
                                            if($datos['ct1']){
                                                print "<br>" . $datos['at1'] + $datos['at2'] + $datos['at3'] + $datos['at4'];
                                            }
                                        ?>
                                    </td>
                                    <td class="px-2 py-4 text-center">

                                        <?= CreaBotones($datos['id'], $trimestre_actual, $con)?>
                                    </td>
                                </tr>
                        

                            <?php endforeach ?> 
                        <?php endif ?>
                    </tbody>
            </table>
        </div>




<!-- Modales -->
        <?php foreach($indicadores as $ind): 
            var_dump($ind)?>
            <div id="mymodal<?= $ind['id']?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="mymodal<?= $ind['id']?>">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">   <!-- Aqui comienza -->
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Reportar Indicador
                            </h3>
                            <br>
                            <form action="guardar_reportar_indicador.php" method="POST" enctype="multipart/form-data">  <!-- datos ocultos del formulario -->
                                <input type="hidden" name="id_dependencia" value="<?= $ind['id_dependencia'] ?>">
                                <input type="hidden" name="id_indicador" value="<?= $ind['id'] ?>">
                                <input type="hidden" name="trimestre" value="<?= $trimestre_actual ?>">
                                    
                                <div class="overflow-x-auto relative">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="py-1 px-2">
                                                    Var
                                                </th>
                                                <th scope="col" class="py-1 px-2">
                                                    Variables
                                                </th>
                                                <th scope="col" class="py-1 px-2">
                                                    Unidad de Medida
                                                </th>
                                                <th scope="col" class="py-1 px-2">
                                                    Avance
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-5">
                                                    A
                                                </td>
                                                <th class="py-4 px-5">
                                                    <?= $ind['variable_a'] ?>
                                                </th>
                                                <td class="py-4 px-5">
                                                    <?= $ind['umedida_b'] ?>
                                                </td>

                                                <td class="py-4 px-5">
                                                    <input type="number" required name="avvara" id="avvara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </td>
                                            </tr>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-5">
                                                    B
                                                </td>
                                                <th class="py-4 px-5">
                                                    <?= $ind['variable_b'] ?>
                                                </th>
                                                <td class="py-4 px-5">
                                                <?= $ind['umedida_b'] ?>
                                                </td>
                                                <td class="py-4 px-5">
                                                    <input type="number" required name="avvarb" id="avvarb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </td>
                                            </tr>
                                            <?php if($ind['variable_c']): ?>
                                                <tr class="bg-white dark:bg-gray-800">
                                                    <th class="py-4 px-5">
                                                        C
                                                    </th>
                                                    <td class="py-4 px-5">
                                                        <?= $ind['variable_c'] ?>
                                                    </td>
                                                    <td class="py-4 px-5">
                                                        <?= $ind['umedida_c'] ?>
                                                    </td>
                                                    <td class="py-4 px-5">
                                                        <input type="number" required name="avvarc" id="avvarc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Subir Evidencia</label>
                                <input aria-describedby="file_input_help" name="path_evidencia" id="file_input" type="file" accept="image/png,image/jpeg,image/jpg" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                
                                <br>
                                <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="2" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                
                                <br>
                                <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                <textarea id="justificacion" name="justificacion" rows="2" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    <br>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reportar</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div> 
        <?php endforeach ?>

    </div>

    <br>
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