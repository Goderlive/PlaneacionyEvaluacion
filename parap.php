
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.0/dist/flowbite.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <title>Sistema</title>
</head>



<header>
    <nav class="bg-gray-100 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="index.php" class="flex items-center">
                <img src="img/logo_simonts.png" class="mr-6 h-6 sm:h-9" alt="SIMONTS Metepec"/>
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
            <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="index.php" class="text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Dirección de Gobierno Por Resultados</a>
                    </li>
                    <li><a href="index.php"class="py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Inicio</a></li>                    <li><a href="anteproyecto.php"class="py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Anteproyecto2023</a></li>                                        <li><a href="actividades.php"class="py-6 pr-4 pl-3 text-white bg-gray-200 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white">Actividades</a></li>                                        <li><a href="indicadores.php"class="py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Indicadores</a></li>                                        <button id="dropdownNavbarButton" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Mas <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
    <!-- Dropdown menu -->
                                                                    <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                                
            <li>
                <a href="actividades.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Actividades por Área</a>
            </li>
                                                                    </ul>
                        </div>                                                                                                 <a href="login.php"><svg class="w-6 h-6 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <br>
    <div class="container mx-auto">

            <nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
            
                    <li class="inline-flex items-center">
                        <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Inicio
                        </a>
                    </li>
                    
                    <li class="inline-flex items-center">
                        <a href="actividades.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            Actividades
                        </a>
                    </li>
                    
                    <li class="inline-flex items-center">
                        <a href="actividades.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            Reportar
                        </a>
                    </li>
                    
                    <li class="inline-flex items-center">
                        <a href="actividades.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            Dirección de Gobierno Por Resultados
                        </a>
                    </li>
                    
        </ol>
        </nav>
                
        <br>
        <h2 class="text-2xl font-extrabold dark:text-white"></h2>
<br>
        
        <div class="text-center">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px">
                    <li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="1" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Enero</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="2" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Febrero</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="3" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Marzo</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="4" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">Abril</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="5" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Mayo</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="6" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Junio</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="7" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Julio</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="8" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Agosto</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="9" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Septiembre</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="10" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Octubre</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="11" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Noviembre</button>
                </form>
            </li><li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="212">
                    <button name="mes" value="12" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Diciembre</button>
                </form>
            </li>                </ul>
            </nav>
        </div>           
        <br>

        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Programado Anual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Avance Actual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Programado Abril                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reportado Abril                            </th>
                            <th scope="col" class="px-6 py-3">
                            Reportar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">1</th>
            <td class="px-6 py-4">Supervisión del cumplimiento de la implementación de la Guía Consultiva de Desempeño Municipal.</td>
            <td class="px-6 py-4">Supervisión</td>
            <td class="px-6 py-4">1</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-ray-600 text-xs font-medium text-blue-200 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 0%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal839">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal1"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">2</th>
            <td class="px-6 py-4">Monitoreo de las actualizaciones que realicen las dependencias a sus manuales de organización y manuales de procedimientos.</td>
            <td class="px-6 py-4">Monitoreo</td>
            <td class="px-6 py-4">4</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal840">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal2"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">3</th>
            <td class="px-6 py-4">Supervisión a la operación del Sistema de Protesta Ciudadana.</td>
            <td class="px-6 py-4">Supervisión</td>
            <td class="px-6 py-4">1</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-ray-600 text-xs font-medium text-blue-200 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 0%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal841">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal3"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">4</th>
            <td class="px-6 py-4">Supervisión a la publicación del Programa Anual de Mejora Regulatoria en la página web del municipio.</td>
            <td class="px-6 py-4">Supervisión</td>
            <td class="px-6 py-4">1</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal842">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal4"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">5</th>
            <td class="px-6 py-4">Supervisión de las acciones referentes a acreditaciones, premios, certificaciones, reconocimientos y prácticas.</td>
            <td class="px-6 py-4">Supervisión</td>
            <td class="px-6 py-4">4</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal843">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal5"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">6</th>
            <td class="px-6 py-4">Supervisión a la implementación y el correcto funcionamiento del Sistema de Monitoreo, Tablero de Control y Seguimiento de PbRM.</td>
            <td class="px-6 py-4">Supervisión</td>
            <td class="px-6 py-4">4</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                </div></td>
            <td class="px-6 py-4">1</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal844">1</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal6"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">7</th>
            <td class="px-6 py-4">Monitoreo a la integración del Informe Trimestral de las Acciones y Resultados del Plan de Desarrollo Municipal</td>
            <td class="px-6 py-4">Monitoreo</td>
            <td class="px-6 py-4">4</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal845">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal7"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">8</th>
            <td class="px-6 py-4">Supervisión de la implementación de los sistemas de gestión, de calidad y antisoborno.</td>
            <td class="px-6 py-4">Supervisión</td>
            <td class="px-6 py-4">4</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal846">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal8"> Reportado</button> </td>
        </tr><tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">9</th>
            <td class="px-6 py-4">Supervisión a la integración del Presupuesto basado en Resultados Municipal 2023 (PbRM).</td>
            <td class="px-6 py-4">Supervisión</td>
            <td class="px-6 py-4">1</td>
            <td class="px-6 py-4"><div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                </div></td>
            <td class="px-6 py-4">0</td>
            <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal847">0</button></td>
            <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="mymodal9"> Reportado</button> </td>
        </tr>                    </tbody>
            </table>
        </div>
    </div>

    <!-- Main modal -->
        <div id="mymodal1" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión del cumplimiento de la implementación de la Guía Consultiva de Desempeño Municipal.</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="839">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="839">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal1" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal2" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Monitoreo de las actualizaciones que realicen las dependencias a sus manuales de organización y manuales de procedimientos.</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="840">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="840">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal2" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal3" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión a la operación del Sistema de Protesta Ciudadana.</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="841">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="841">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal3" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal4" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión a la publicación del Programa Anual de Mejora Regulatoria en la página web del municipio.</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal4">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="842">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="842">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal4" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal5" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión de las acciones referentes a acreditaciones, premios, certificaciones, reconocimientos y prácticas.</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="843">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="843">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal5" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal6" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión a la implementación y el correcto funcionamiento del Sistema de Monitoreo, Tablero de Control y Seguimiento de PbRM.</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal6">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="844">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="844">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 1" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal6" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal7" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Monitoreo a la integración del Informe Trimestral de las Acciones y Resultados del Plan de Desarrollo Municipal</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal7">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="845">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="845">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal7" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal8" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión de la implementación de los sistemas de gestión, de calidad y antisoborno.</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal8">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="846">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="846">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal8" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Main modal -->
        <div id="mymodal9" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión a la integración del Presupuesto basado en Resultados Municipal 2023 (PbRM).</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal9">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="4">
                            <input type="hidden" name="year" value="2023">
                            <input type="hidden" name="id_actividad" value="847">
                            <input type="hidden" name="id_dependencia" value="37">
                            <input type="hidden" name="id_usuario" value="102">
                            <input type="hidden" name="id_area" value="212">
                            <input type="hidden" name="id_actividad" value="847">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal9" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>    <br>
    0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 13:45:25</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 13:45:44</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 13:46:05</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-05-02 13:43:32</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 13:46:31</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>-1</td>
                                    <td class="py-2 px-6" align="center">
                <a target="_blank" href="archivos/actividades/2023/4/37/212/844/ede8020230428_135238_Evidencia_Supervisión_SIMONTS.jpeg">
                <img src="archivos/actividades/2023/4/37/212/844/ede8020230428_135238_Evidencia_Supervisión_SIMONTS.jpeg" alt="evidencia" style="max-width: 150px; max-height: 150px;">
                </a>
                </td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b>Reuniones de capacitación para enlaces de la Administración Pública Municipal de Metepec en materia de la implementación del Sistema de Monitoreo, Tablero de Control y Seguimiento de PbRM. </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 13:52:38</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 15:07:51</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 15:07:59</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>0</td>
                                    <td class="py-2 px-6" align="center">Sin Evidencia</td>
                                </tr>
                            </table><table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b> </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b> </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> Christian    Ávila Fernández</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reportado el 2023-04-28 15:08:13</td>
                                </tr>
                            </table> </div>
                        </div>
                    </div>
                </div>    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
