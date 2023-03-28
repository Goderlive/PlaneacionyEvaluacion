<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'head.php'; ?>
</head>
<body>
    

<h5 class="text-xl font-medium text-gray-800 dark:text-white">Registra un Enlace Nuevo</h5>
<br>


<button data-modal-toggle="mymodal36" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"" type="button" >Reportar</button>                                    </td>

<div id="mymodal36" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="mymodal36">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">   <!-- Aqui comienza -->
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Reportar Indicador
                            </h3>
                            <br>
                            <form action="models/indicadores_Model.php" method="POST" enctype="multipart/form-data">  <!-- datos ocultos del formulario -->
                                <input type="hidden" name="id_dependencia" value="31">
                                <input type="hidden" name="id_indicador" value="36">
                                <input type="hidden" name="trimestre" value="1">
                                    
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
                                                    TRAMITACIóN DE ASUNTOS JURíDICOS REALIZADOS                                                </th>
                                                <td class="py-4 px-5">
                                                    Reporte                                                </td>

                                                <td class="py-4 px-5">
                                                    <input type="number" required name="avvara" id="avvara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </td>
                                            </tr>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-5">
                                                    B
                                                </td>
                                                <th class="py-4 px-5">
                                                    TRAMITACIóN DE ASUNTOS JURíDICOS PROGRAMADOS                                                </th>
                                                <td class="py-4 px-5">
                                                Reporte                                                </td>
                                                <td class="py-4 px-5">
                                                    <input type="number" required name="avvarb" id="avvarb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </td>
                                            </tr>
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
                                <button type="submit" name="reportar" value="reportar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reportar</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div> 


<?php include 'footer.php';?>

</body>
</html>