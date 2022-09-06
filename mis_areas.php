<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/misareas_Controller.php';
    $id_dependencia = $_SESSION['id_dependencia']; 
    $id_usuario = $_SESSION['id_usuario']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Áreas</title>
</head>
<body>
<div class="container mx-auto">

<br>

<nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Mis Areas</a>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl dark:text-white">Esta Sección permite administrar el nombre de los representantes de las areas, incluido el director</h2>
        <br>
    
<div class="grid grid-cols-2">

    <?php 
        $director = TraeDirector($con, $id_dependencia);
        if(!$director):
        ?>
            <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="models/misareas_Model.php" method="POST">
                    <h3 class="font-normal text-gray-900 dark:text-white">Registra al director o equivalente</h3>
                    <div>
                        <input type="text" required name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nombres" required="">
                    </div>
                    <div>
                        <input type="text" required name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Apellidos" required="">
                    </div>
                    <div>
                        <input type="text" required name="cargo" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Cargo" required="">
                    </div>
                    <input type="hidden" name="id_dependencia" value="<?= $id_dependencia ?>">
                    <input type="hidden" name="id_registrante" value="<?= $id_usuario ?>">
                    <button type="submit" name="registrarDirector" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                </form>
            </div>
        <?php else:?>
            <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">

                <h3 class="font-normal text-gray-900 dark:text-white">Director o Equivalente</h3>
                <br>
                <h3 class="font-normal text-gray-900 dark:text-white"><?= $director['nombre'] . " " . $director['apellidos'] ?></h3>
                <h3 class="font-normal text-sm text-gray-900 dark:text-white"><?= $director['cargo']  ?></h3>
                <form action="models/misareas_Model.php" method="post">
                <input type="hidden" name="id_eliminante" value="<?= $id_usuario ?>">
                    <input type="hidden" name="id_titular" value="<?= $director['id_titular'] ?>">
                <br>
                    <input type="submit" name="eliminar" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">

                </form>
            </div>
        
        <?php endif?>
            <br>

        <?php
    foreach($areas = TraerAreas($con, $id_dependencia) as $area):
        $id_area = $area['id_area'];
        $titular = TraeTitular($con, $id_area);
        if(!$titular):?>
        <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="models/misareas_Model.php" method="POST">
                <h3 class="font-normal text-gray-900 dark:text-white"><strong><?= $area['nombre_area']?> </strong> no tiene registrado titular</h3>
                <div>
                    <input type="text" required name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nombres" required="">
                </div>
                <div>
                    <input type="text" required name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Apellidos" required="">
                </div>
                <div>
                    <input type="text" required name="cargo" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Cargo" required="">
                </div>
                <input type="hidden" name="id_area" value="<?= $id_area ?>">
                <input type="hidden" name="id_registrante" value="<?= $id_usuario ?>">
                <button type="submit" name="registrar" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            </form>
        </div>
        <?php else:?>  
            <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">

                <h3 class="font-normal text-gray-900 dark:text-white"><strong><?= $area['nombre_area']?> </strong></h3>
                <br>
                <h3 class="font-normal text-gray-900 dark:text-white"><?= $titular['nombre'] . " " . $titular['apellidos'] ?></h3>
                <h3 class="font-normal text-sm text-gray-900 dark:text-white"><?= $titular['cargo']  ?></h3>
                <form action="models/misareas_Model.php" method="post">
                <input type="hidden" name="id_eliminante" value="<?= $id_usuario ?>">
                    <input type="hidden" name="id_titular" value="<?= $titular['id_titular'] ?>">
                <br>
                    <input type="submit" name="eliminar" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">

                </form>
            </div>
        <?php
        endif;
    endforeach
    ?>
	

    </div>

<?php include 'footer.php';?>
    </div>
</body>
</html>
<?php
}
?>

