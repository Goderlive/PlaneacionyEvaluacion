<?php
session_start();
if (!$_SESSION['sistema'] == 'pbrm') : ?>
    <script>
        alert("ya te hubiera sacado");
        window.location.href = 'login.php';
    </script>

<?php endif; ?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<?php include 'Controllers/breadcrumbs.php'; ?>
<?php include 'models/admin_formatos_actividades_i.php'; ?>

<?php if ($permisos['nivel'] > 2) {
    header("Location: index.php");
}

function BotonSubir($id_dependencia, $trimestre){
    return '
    <form action="" method="post">
        <input type="hidden" name="trimestre" value="'.$trimestre.'">
        <input type="hidden" name="id_dependencia" value="'.$id_dependencia . '">
        <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Subir</button>
    </form>
    ';
}
?>
<body>
    <div class="container mx-auto"><!--Este es el contenedor principal -->
        <br>
        <?= breadcrumbs(array("Inicio" => "index.php", "Formatos Impresos" => "")) ?>
        <br>

        <?php if(!$_POST): ?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Dependencia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            1er T
                        </th>
                        <th scope="col" class="px-6 py-3">
                            2do T
                        </th>
                        <th scope="col" class="px-6 py-3">
                            3er T
                        </th>
                        <th scope="col" class="px-6 py-3">
                            4to T
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $dependencias  = TraeDependencias($con, $_SESSION['anio']) ?>
                    <?php foreach($dependencias as $dependencia): 
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $dependencia['nombre_dependencia'] ?>
                        </th>


                        <td class="px-6 py-4">
                            <?php if($formato = traeporDependenciasytrim($con, $dependencia['id_dependencia'], 1)): ?>
                                <?php $dir = $formato['dir_formatoindicador'] ?>
                                <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                            <?php else: ?>
                                <?= BotonSubir($dependencia['id_dependencia'], '1') ?>
                            <?php endif ?>

                        </td>
                        <td class="px-6 py-4">
                        <?php if($formato = traeporDependenciasytrim($con, $dependencia['id_dependencia'], 2)): ?>
                            <?php $dir = $formato['dir_formatoactividades'] ?>
                                <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                            <?php else: ?>
                                <?= BotonSubir($dependencia['id_dependencia'], '2') ?>
                            <?php endif ?>

                        </td>
                        <td class="px-6 py-4">
                        <?php if($formato = traeporDependenciasytrim($con, $dependencia['id_dependencia'], 3)): ?>
                            <?php $dir = $formato['dir_formatoactividades'] ?>
                                <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                            <?php else: ?>
                                <?= BotonSubir($dependencia['id_dependencia'], '3') ?>
                            <?php endif ?>

                        </td>
                        <td class="px-6 py-4">
                        <?php if($formato = traeporDependenciasytrim($con, $dependencia['id_dependencia'], 4)): ?>
                            <?php $dir = $formato['dir_formatoactividades'] ?>
                                <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                            <?php else: ?>
                                <?= BotonSubir($dependencia['id_dependencia'], '4') ?>
                            <?php endif ?>

                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php endif ?>
        
        <?php if($_POST): ?>
            <?php 
            $id_dependencia = $_POST['id_dependencia'];
            $trimestre = $_POST['trimestre'];
                ?>
            <form action="" method="POST" enctype="multipart/form-data">
                                
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Subir Archivo</label>

                <input require class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="file_input">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Exclusivamente PDF</p>
                <input type="hidden" name="trimestre" value="<?= $trimestre ?>">
                <input type="hidden" name="id_dependencia" value="<?= $id_dependencia ?>">
                <input type="hidden" name="subida" value="1">
                <button type="submit" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Subir</button>

            </form>
        <?php endif ?>
        </div><!--Este es el contenedor principal -->




    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>