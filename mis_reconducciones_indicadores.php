<?php
session_start();

if(!$_SESSION['sistema'] == "pbrm"){    
    header("Location: login.php");
    die();
}else{
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/reconduccioni_Controlador.php';
    include 'Controllers/breadcrumbs.php';
}
if($permisos['id_dependencia'] != NULL){
	$dep = $permisos['id_dependencia'];
}else{
	print" Tu cuenta no permite realizar esta acción";
	die();
}

$id_usuario = $_SESSION['id_usuario'];
$trimestre = ceil(date('m')/4);


// Nos permite saber el trimestre
$thismes = ceil(date('m'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconducción de Indiadores</title>
</head>
<body>
<div class="container mx-auto">

<br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Mis Reconducciones Actividades" => "mis_reconducciones_actividades.php"))?>
<br>


<br>
<h3 class="mb-2 center text-2xl font-bold text-gray-900 dark:text-white">Reconducciones de <b>Indicadores</b></h3>
<br>

<?php
if(!$_POST): ?>
    <?php if(($rec_pendientes = TraeReconduccionesporvalidarInd($con, $dep)) || ($rec_validadas = TraeReconduccionesValidadasInd($con, $dep))):?>
        <div id="accordion-collapse" data-accordion="collapse" class="my-2">
            <h2 id="accordion-collapse-heading-1">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    <span>Reconducciones Pendientes de Validación</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <?php foreach($rec_pendientes as $p):?>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No. Oficio
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Fecha
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        <?= $p['no_oficio']?>
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        <?= $p['fecha']?>
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        <p class="text-yellow-600">Pendiente de Revisión</p>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <br>
                    <?php endforeach?>	
                </div>
            </div>


            <h2 id="accordion-collapse-heading-2">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span>Reconducciones Realizadas</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="my-2 p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
                    <?php $rec_validadas = TraeReconduccionesValidadasInd($con, $dep) ?>
                    <?php foreach($rec_validadas as $v):?>
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            No. Oficio
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Fecha
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Estado
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Acción
                                        </th>
                                    </tr>
                                </thead>
                                    <tr>

                                        <th scope="col" class="py-3 px-6">
                                            <?= $v['no_oficio']?>
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <?= $v['fecha']?>
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Validada
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <form action="sources/TCPDF-main/examples/Reconduccion_Indicadores.php" method="POST">
                                                <input type="hidden" name="id_reconduccion" value="<?= $v['id_reconduccion_indicadores']?>">
                                                <input type="submit" formtarget="_blank" value="Imprimir" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            </form>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table>
                        </div>
                        <br>
                    <?php endforeach?>
                </div>
            </div>
        </div>

    <?php endif ?>
<?php endif ?>  <!-- Aqui terminamos el area de reconducciones realizadas -->



</div>
<?php include 'footer.php';?>
</body>
</html>