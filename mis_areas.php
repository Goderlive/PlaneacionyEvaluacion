<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/misareas_Controller.php';
    $id_dependencia = $_SESSION['id_dependencia']; 
    $id_usuario = $_SESSION['id_usuario']; 
    include 'Controllers/breadcrumbs.php';
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

<?= breadcrumbs(array("Inicio"=> "index.php", "Mis Areas"=> ""))?>


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

