<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <title>Sistema</title>
</head>



<header>
    <nav class="bg-gray-100 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="index.php" class="flex items-center">
                <img src="img/logo_simonts.png" class="mr-6 h-6 sm:h-9" alt="SIMONTS Metepec" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
            <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="index.php" class="text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">IMCUFIDEM</a>
                    </li>
                    <li><a href="index.php" class="py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Inicio</a></li>
                    <li><a href="actividades.php" class="py-6 pr-4 pl-3 text-white bg-gray-200 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white">Actividades</a></li>
                    <li><a href="indicadores.php" class="py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Indicadores</a></li> <button id="dropdownNavbarButton" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Mas <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">

                            <li>
                                <a href="actividades.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Actividades por Área</a>
                            </li>

                            <li>
                                <a href="reconduccion_actividades.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reconducción de Actividades</a>
                            </li>

                            <li>
                                <a href="formatos_actividades.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Impresion Formatos</a>
                            </li>

                            <li>
                                <a href="actividades_todas.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Todas las Actividades</a>
                            </li>
                        </ul>
                    </div> <a href="login.php"><svg class="w-6 h-6 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg></a>
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
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Inicio
                    </a>
                </li>

                <li class="inline-flex items-center">
                    <a href="actividades.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Actividades
                    </a>
                </li>

                <li class="inline-flex items-center">
                    <a href="actividades.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Reportar
                    </a>
                </li>

                <li class="inline-flex items-center">
                    <a href="actividades.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Departamento de Deporte
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
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="1" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Enero</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="2" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Febrero</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="3" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">Marzo</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="4" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Abril</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="5" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Mayo</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="6" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Junio</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="7" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Julio</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="8" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Agosto</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="9" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Septiembre</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="10" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Octubre</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="11" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Noviembre</button>
                        </form>
                    </li>
                    <li>
                        <form action="reportes.php" method="POST">
                            <input type="hidden" name="id_area" value="305">
                            <button name="mes" value="12" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Diciembre</button>
                        </form>
                    </li>
                </ul>
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
                            Programado Marzo </th>
                        <th scope="col" class="px-6 py-3">
                            Reportado Marzo </th>
                        <th scope="col" class="px-6 py-3">
                            Reportar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">1</th>
                        <td class="px-6 py-4">Crear y consolidar Centros de Iniciación, Formación y Desarrollo Deportivo</td>
                        <td class="px-6 py-4">Centros</td>
                        <td class="px-6 py-4">16</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">4</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1180">4</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal1"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">2</th>
                        <td class="px-6 py-4">Organizar eventos deportivos, formativos y competitivos para personas con discapacidad</td>
                        <td class="px-6 py-4">Evento</td>
                        <td class="px-6 py-4">4</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1181">1</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal2"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">3</th>
                        <td class="px-6 py-4">Organizar eventos deportivos, formativos y competitivos</td>
                        <td class="px-6 py-4">Evento</td>
                        <td class="px-6 py-4">17</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-ray-600 text-xs font-medium text-blue-200 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 0%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">8</td>
                        <td class="px-6 py-4 text-center"> </td>
                        <td class="px-6 py-4 text-right"><button class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800type=" button" data-modal-toggle="mymodal3"> Reportar</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">4</th>
                        <td class="px-6 py-4">Realizar capacitaciones y certificaciones a entrenadores deportivos</td>
                        <td class="px-6 py-4">Capacitaciones</td>
                        <td class="px-6 py-4">10</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">3</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1183">3</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal4"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">6</th>
                        <td class="px-6 py-4">Realizar Talleres Deportivos</td>
                        <td class="px-6 py-4">Talleres</td>
                        <td class="px-6 py-4">8</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">3</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1185">3</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal6"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">7</th>
                        <td class="px-6 py-4">Capacitar y actualizar entrenadores deportivos, personal técnico en materia deportiva y deporte adaptado.</td>
                        <td class="px-6 py-4">Capacitaciones</td>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-ray-600 text-xs font-medium text-blue-200 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 0%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">0</td>
                        <td class="px-6 py-4 text-center"> </td>
                        <td class="px-6 py-4 text-right"><button disabled class="bg-yellow-300 cursor-not-allowed text-white hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800type=" button" data-modal-toggle="mymodal7"> Revisión</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">8</th>
                        <td class="px-6 py-4">Realizar entrenamientos deportivos de Para-Atletismo a personas con discapacidad</td>
                        <td class="px-6 py-4">Sesiones</td>
                        <td class="px-6 py-4">960</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">240</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1187">240</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal8"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">9</th>
                        <td class="px-6 py-4">Realizar entrenamientos deportivos de Para-Natación a personas con discapacidad</td>
                        <td class="px-6 py-4">Sesiones</td>
                        <td class="px-6 py-4">92</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">20</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1188">20</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal9"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">10</th>
                        <td class="px-6 py-4">Realizar entrenamientos deportivos de Tenis de Mesa a personas con discapacidad</td>
                        <td class="px-6 py-4">Sesiones</td>
                        <td class="px-6 py-4">88</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">20</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1189">20</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal10"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">11</th>
                        <td class="px-6 py-4">Realizar entrenamientos deportivos de Basquetbol Sobre Silla de Ruedas a personas con discapacidad</td>
                        <td class="px-6 py-4">Sesiones</td>
                        <td class="px-6 py-4">254</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">65</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1190">65</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal11"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">12</th>
                        <td class="px-6 py-4">Entregar la Preseaa deportistas destacados</td>
                        <td class="px-6 py-4">Presea</td>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-ray-600 text-xs font-medium text-blue-200 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 0%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">0</td>
                        <td class="px-6 py-4 text-center"> </td>
                        <td class="px-6 py-4 text-right"><button disabled class="bg-yellow-300 cursor-not-allowed text-white hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800type=" button" data-modal-toggle="mymodal12"> Revisión</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">13</th>
                        <td class="px-6 py-4">Realizar entrenamientos deportivos a Personas con Discapacidad en la Disciplina de Activación Física en los Centros de Inclusión y Desarrollo del Muni</td>
                        <td class="px-6 py-4">Sesiones</td>
                        <td class="px-6 py-4">96</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">24</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1192">24</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal13"> Reportado</button> </td>
                    </tr>
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">14</th>
                        <td class="px-6 py-4">Asignar y entregar estímulos económicos a deportistas, entrenadores, activadores físicos, jueces, árbitros en el ámbito deportivo</td>
                        <td class="px-6 py-4">Beca</td>
                        <td class="px-6 py-4">56</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">8</td>
                        <td class="px-6 py-4 text-center"> <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal1193">8</button></td>
                        <td class="px-6 py-4 text-right"><button disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-centertype=" button" data-modal-toggle="mymodal14"> Reportado</button> </td>
                    </tr>
                </tbody>
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Crear y consolidar Centros de Iniciación, Formación y Desarrollo Deportivo</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1180">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1180">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 4" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Organizar eventos deportivos, formativos y competitivos para personas con discapacidad</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1181">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1181">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 1" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Organizar eventos deportivos, formativos y competitivos</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1182">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1182">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 8" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Realizar capacitaciones y certificaciones a entrenadores deportivos</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal4">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1183">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1183">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 3" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <button data-modal-toggle="mymodal4" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Realizar Talleres Deportivos</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal6">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1185">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1185">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 3" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Capacitar y actualizar entrenadores deportivos, personal técnico en materia deportiva y deporte adaptado.</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal7">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1186">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1186">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Realizar entrenamientos deportivos de Para-Atletismo a personas con discapacidad</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal8">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1187">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1187">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 240" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Realizar entrenamientos deportivos de Para-Natación a personas con discapacidad</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal9">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1188">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1188">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 20" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <button data-modal-toggle="mymodal9" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- Main modal -->
    <div id="mymodal10" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-7xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Realizar entrenamientos deportivos de Tenis de Mesa a personas con discapacidad</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal10">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1189">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1189">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 20" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <button data-modal-toggle="mymodal10" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- Main modal -->
    <div id="mymodal11" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-7xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Realizar entrenamientos deportivos de Basquetbol Sobre Silla de Ruedas a personas con discapacidad</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal11">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1190">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1190">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 65" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <button data-modal-toggle="mymodal11" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- Main modal -->
    <div id="mymodal12" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-7xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Entregar la Preseaa deportistas destacados</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal12">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1191">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1191">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 0" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <button data-modal-toggle="mymodal12" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- Main modal -->
    <div id="mymodal13" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-7xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Realizar entrenamientos deportivos a Personas con Discapacidad en la Disciplina de Activación Física en los Centros de Inclusión y Desarrollo del Muni</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal13">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1192">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1192">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 24" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <button data-modal-toggle="mymodal13" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- Main modal -->
    <div id="mymodal14" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-7xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Asignar y entregar estímulos económicos a deportistas, entrenadores, activadores físicos, jueces, árbitros en el ámbito deportivo</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal14">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="3">
                        <input type="hidden" name="year" value="2023">
                        <input type="hidden" name="id_actividad" value="1193">
                        <input type="hidden" name="id_dependencia" value="43">
                        <input type="hidden" name="id_usuario" value="94">
                        <input type="hidden" name="id_area" value="305">
                        <input type="hidden" name="id_actividad" value="1193">

                        <div class="relative">
                            <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                            <input required name="avance" min=0 id="avance" type="number" placeholder="Programado: 8" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </div>
                        <br>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                        <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />



                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 42%" ;>
                                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                                    <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="1" placeholder="Fecha, lugar y descripción breve de la actividad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                                <th style="width: 6%" ;>
                                </th>
                                <th style="width: 42%" ;>
                                    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de +10% o -10% de variación:</label>
                                    <textarea id="justificacion" name="justificacion" rows="1" placeholder="En caso de variacion superior al 10%, describir una justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </th>
                            </tr>
                        </table>

                        <br>

                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>

                                    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione multiples opciones<b title="Usa el boton " Ctrl" en tu teclado mas "Click" del mouse"> ?</b></label>
                                    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione las Localidades</option>
                                        <option value="1">Todo el Municipio</option>
                                        <option value="2">Administración Municipal</option>
                                        <option value="3">Barrio de Coaxustenco</option>
                                        <option value="4">Barrio de San Mateo</option>
                                        <option value="5">Barrio de San Miguel</option>
                                        <option value="6">Barrio de Santa Cruz</option>
                                        <option value="7">Barrio de Santa Cruz Ocotitlán</option>
                                        <option value="8">Barrio de Santiaguito</option>
                                        <option value="9">Barrio del Espíritu Santo</option>
                                        <option value="10">Colonia Agrícola Álvaro Obregón</option>
                                        <option value="11">Colonia Agrícola Bellavista</option>
                                        <option value="12">Colonia Agrícola Francisco I. Madero</option>
                                        <option value="13">Colonia Agrícola Lázaro Cárdenas</option>
                                        <option value="14">Colonia Doctor Jorge Jiménez Cantú</option>
                                        <option value="15">Colonia El Hípico</option>
                                        <option value="16">Colonia La Michoacana</option>
                                        <option value="17">Colonia La Providencia</option>
                                        <option value="18">Colonia Luisa Isabel Campos de Jiménez Cantú</option>
                                        <option value="19">Colonia Municipal</option>
                                        <option value="20">Colonia Unión</option>
                                        <option value="21">Condominio Agripín García Estrada</option>
                                        <option value="22">Fraccionamiento Casa Blanca</option>
                                        <option value="23">Fraccionamiento Fuentes de San Gabriel</option>
                                        <option value="24">Fraccionamiento Izcalli Cuauhtémoc I</option>
                                        <option value="25">Fraccionamiento Izcalli Cuauhtémoc II</option>
                                        <option value="26">Fraccionamiento Izcalli Cuauhtémoc III</option>
                                        <option value="27">Fraccionamiento Izcalli Cuauhtémoc IV</option>
                                        <option value="28">Fraccionamiento Izcalli Cuauhtémoc V</option>
                                        <option value="29">Fraccionamiento Izcalli Cuauhtémoc VI</option>
                                        <option value="30">Fraccionamiento Jesús Jiménez Gallardo</option>
                                        <option value="31">Fraccionamiento Las Haciendas</option>
                                        <option value="32">Fraccionamiento Las Margaritas</option>
                                        <option value="33">Fraccionamiento Las Marinas</option>
                                        <option value="34">Fraccionamiento Licenciado Juan Fernández Albarrán</option>
                                        <option value="35">Fraccionamiento Los Pilares</option>
                                        <option value="36">Fraccionamiento Rancho San Francisco</option>
                                        <option value="37">Fraccionamiento Rancho San Lucas</option>
                                        <option value="38">Fraccionamiento San Javier</option>
                                        <option value="39">Fraccionamiento San José La Pilita</option>
                                        <option value="40">Fraccionamiento Xinantécatl</option>
                                        <option value="41">Pueblo de San Bartolomé Tlaltelulco</option>
                                        <option value="42">Pueblo de San Francisco Coaxusco</option>
                                        <option value="43">Pueblo de San Gaspar Tlahuelilpan</option>
                                        <option value="44">Pueblo de San Jerónimo Chicahualco</option>
                                        <option value="45">Pueblo de San Jorge Pueblo Nuevo</option>
                                        <option value="46">Pueblo de San Lorenzo Coacalco</option>
                                        <option value="47">Pueblo de San Lucas Tunco</option>
                                        <option value="48">Pueblo de San Miguel Totocuitlapilco</option>
                                        <option value="49">Pueblo de San Salvador Tizatlalli</option>
                                        <option value="50">Pueblo de San Sebastián</option>
                                        <option value="51">Pueblo de Santa María Magdalena Ocotitlán</option>
                                        <option value="52">Unidad Habitacional Andrés Molina Enríquez</option>
                                        <option value="53">Unidad Habitacional Lázaro Cárdenas</option>
                                        <option value="54">Unidad Habitacional Tollocan II</option>

                                    </select>

                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>


                        <br>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <button data-modal-toggle="mymodal14" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div> <br>





    <div id="evidenciasModal1180" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Extra Large modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="evidenciasModal1180">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Crear y consolidar Centros de Iniciación, Formación y Desarrollo Deportivo</th>
                        <td class="py-2 px-6" align="center" valign="top">Centros</td>
                        <td class="py-2 px-6" align="center" valign="top">16</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">4</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>4 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1180/ede6020230509_130728_centros_de_formación.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1180/ede6020230509_130728_centros_de_formación.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Se realizó la apertura de 1 Centro de Iniciación, Formación y Desarrollo Deportivo en la disciplina de Atletismo y se consolidaron 3 CEFOR, en donde se benefician 80 niños, niñas y jóvenes del municipio de Metepec. <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            29 días, 1 hora, 55 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="evidenciasModal1180" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="evidenciasModal1180" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>




    <!-- Modal Evidencia -->
    <div id="evidenciasModal1181" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Organizar eventos deportivos, formativos y competitivos para personas con discapacidad</th>
                        <td class="py-2 px-6" align="center" valign="top">Evento</td>
                        <td class="py-2 px-6" align="center" valign="top">4</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">1</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>1 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1181/ede420230509_131141_organización_de_eventos_deportivos.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1181/ede420230509_131141_organización_de_eventos_deportivos.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Como parte del programa de Deporte Adaptado se realizó el Evento “Ciudadanos por un mundo Mejor” en donde se beneficiaron a más de 200 niños y niñas con diversos tipos de discapacidad del Valle de Toluca. <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            29 días, 1 hora, 51 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1183" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Realizar capacitaciones y certificaciones a entrenadores deportivos</th>
                        <td class="py-2 px-6" align="center" valign="top">Capacitaciones</td>
                        <td class="py-2 px-6" align="center" valign="top">10</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">3</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>3 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1183/ede3520230509_132018_capacitaciones_y_certificaciones.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1183/ede3520230509_132018_capacitaciones_y_certificaciones.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Se realizaron 3 capacitaciones enfocadas a resaltar la importancia de la Psicología en el ámbito deportivo, entre ellos destacan el “Seminario de Psicología Deportiva de Alto Rendimiento” misma que se dividió en dos sesiones y beneficio a un total de 190 personas, y la capacitación “Psicología Deportiva y sus beneficios en el deporte en la etapa base”. <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            29 días, 1 hora, 43 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1185" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Realizar Talleres Deportivos</th>
                        <td class="py-2 px-6" align="center" valign="top">Talleres</td>
                        <td class="py-2 px-6" align="center" valign="top">8</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">3</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>3 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1185/ede9920230509_135417_talleres_deportivos.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1185/ede9920230509_135417_talleres_deportivos.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Como parte del programa de Deporte Adaptado se impartieron los siguientes talleres: “Taller de inclusión para personas con discapacidad” en la Escuela Telesecundaria Cuitláhuac en la colonia Fuentes de San Gabriel, “Taller de sensibilización, promoviendo la inclusión de los jóvenes con discapacidad” en la secundaria técnica “Bandera Nacional”, “Taller de sensibilización, promoviendo la inclusión de los jóvenes con discapacidad” en el Centro de Atención Múltiple No. 43. <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            29 días, 1 hora, 9 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1187" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Realizar entrenamientos deportivos de Para-Atletismo a personas con discapacidad</th>
                        <td class="py-2 px-6" align="center" valign="top">Sesiones</td>
                        <td class="py-2 px-6" align="center" valign="top">960</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">240</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>240 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1187/ede220230509_141801_8._entrenamientos_discapacidad_para-atletismo.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1187/ede220230509_141801_8._entrenamientos_discapacidad_para-atletismo.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Entrenamiento en la disciplina de Atletismo para niñas, niños, jóvenes y adultos con diversos tipos de discapacidad (intelectual, síndrome de Down, motriz) en pruebas de pista y campo. <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            29 días, 45 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1188" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Realizar entrenamientos deportivos de Para-Natación a personas con discapacidad</th>
                        <td class="py-2 px-6" align="center" valign="top">Sesiones</td>
                        <td class="py-2 px-6" align="center" valign="top">92</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">20</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>20 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1188/ede8420230509_143402_9._entrenamientos_discapacidad_para-natación.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1188/ede8420230509_143402_9._entrenamientos_discapacidad_para-natación.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Programa “Sin Miedo al Agua” entrenamientos para niñas, niños y jóvenes con diversos tipos de discapacidad (intelectual, síndrome de Down, motriz). <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            29 días, 29 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1189" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Realizar entrenamientos deportivos de Tenis de Mesa a personas con discapacidad</th>
                        <td class="py-2 px-6" align="center" valign="top">Sesiones</td>
                        <td class="py-2 px-6" align="center" valign="top">88</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">20</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>20 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1189/ede1220230509_151425_10._entrenamientos_discapacidad_para-tenis_de_mesa.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1189/ede1220230509_151425_10._entrenamientos_discapacidad_para-tenis_de_mesa.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Entrenamientos en la disciplina de Tenis de Mersa adaptado para niñas y niños, jóvenes y adultos con diversos tipos de discapacidad (intelectual, síndrome de Down, motriz). <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            28 días, 23 horas, 48 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1190" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Realizar entrenamientos deportivos de Basquetbol Sobre Silla de Ruedas a personas con discapacidad</th>
                        <td class="py-2 px-6" align="center" valign="top">Sesiones</td>
                        <td class="py-2 px-6" align="center" valign="top">254</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">65</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>65 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1190/ede4920230509_145423_11._Basquetbol_Sobre_Silla_de_Ruedas.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1190/ede4920230509_145423_11._Basquetbol_Sobre_Silla_de_Ruedas.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Entrenamientos de la disciplina de Basquetbol Sobre Silla de Ruedas para niñas y niños, jóvenes y adultos con diversos tipos de discapacidad (intelectual, síndrome de Down, motriz). <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            29 días, 8 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1192" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Realizar entrenamientos deportivos a Personas con Discapacidad en la Disciplina de Activación Física en los Centros de Inclusión y Desarrollo del Muni</th>
                        <td class="py-2 px-6" align="center" valign="top">Sesiones</td>
                        <td class="py-2 px-6" align="center" valign="top">96</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">24</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>24 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1192/ede4420230509_181051_13._entrenamientos_a_depor_discapacidad.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1192/ede4420230509_181051_13._entrenamientos_a_depor_discapacidad.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: Entrenamientos para niñas y niños con diversos tipos de discapacidad (intelectual, síndrome de Down, motriz) en el Centro de Integración y Desarrollo DIF Metepec. <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            28 días, 20 horas, 52 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <!-- Modal Evidencia -->
    <div id="evidenciasModal1193" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" align="center">
                            Nombre de la Meta de Actividad
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            U d M
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog. Anual
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Prog Mes
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Alcanzada
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Variacion
                        </th>
                        <th scope="col" class="py-3 px-6" align="center">
                            Evidencia
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="py-2 px-6" align="center" valign="top">Asignar y entregar estímulos económicos a deportistas, entrenadores, activadores físicos, jueces, árbitros en el ámbito deportivo</th>
                        <td class="py-2 px-6" align="center" valign="top">Beca</td>
                        <td class="py-2 px-6" align="center" valign="top">56</td>
                        <td class="py-2 px-6" align="center" valign="top">Marzo</td>
                        <td class="py-2 px-6" align="center" valign="top">8</td>
                        <td class="py-2 px-6" align="center" valign="top">
                            <b>8 "<b>"
                        </td>
                        <td class="py-2 px-6" align="center" valign="top">0</td>
                        <td class="py-2 px-6" align="center">
                            <a target="_blank" href="archivos/actividades/2023/3/43/305/1193/ede1420230509_181222_14._estimulos_economicos.jpg">
                                imgmd(../archivos/actividades/2023/3/43/305/1193/ede1420230509_181222_14._estimulos_economicos.jpg)
                            </a>
                        </td>
                    </tr>
                </table>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <td>
                            Descripcion de la Evidencia: El municipio de Metepec a través del Instituto Municipal de Cultura Física y Deporte de Metepec reconoce a través de estímulos y becas económicas los logros deportivos de las y los deportistas de alto rendimiento y talentos deportivos. <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Justificación por variación: <br>
                        </td>
                    <tr>
                        <td>
                            Reportado por: <b> José David Escamilla Santana"</b> <br>" <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Reportado hace:
                            28 días, 20 horas, 50 minutos</td>
                    </tr>
                </table> Puedes solicitar una edicion a tu enlace
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>