<?php
session_start();

$id_usuario = $_SESSION['id_usuario'];

if (!isset($_SESSION) || !isset($_SESSION['sistema']) || !$_SESSION['sistema'] == "pbrm") {
    header("Location: login.php");
}
require_once 'Controllers/Inicio_Controlador.php';
include 'header.php';
include 'head.php';
?>
<!DOCTYPE html>
<html lang="es">

<body>
    <?php if ($_POST) {
        
        $id_actividad = $_POST['id_actividad'];

        $sql_editar = "INSERT INTO cuentaactividades (id_actividad) VALUES ($id_actividad)";
        $sentencia_agregar = $con->prepare($sql_editar);
        try{
            $sentencia_agregar->execute();
            echo "<br>";
        }catch(Exception $e){
            echo 'No se registró: ',  $e->getMessage(), "\n";
            die();
        }

        if(isset($_POST['udmed'])){
            $udmed = $_POST['udmed'];
            $id_actividad = $_POST['id_actividad'];
            $sql = "UPDATE lineasactividades SET udmed = ? WHERE id_actividad = ?";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($udmed, $id_actividad));
        }

        $eneroclv = $_POST['eneroclv'];
        $enero = $_POST['enero'];
        $sql = "UPDATE avances SET beneficiarios = ? WHERE id_avance = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($enero, $eneroclv));

        $febreroclv = $_POST['febreroclv'];
        $febrero = $_POST['febrero'];
        $sql = "UPDATE avances SET beneficiarios = ? WHERE id_avance = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($febrero, $febreroclv));

        $marzoclv = $_POST['marzoclv'];
        $marzo = $_POST['marzo'];
        $sql = "UPDATE avances SET beneficiarios = ? WHERE id_avance = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($marzo, $marzoclv));

        $abrilclv = $_POST['abrilclv'];
        $abril = $_POST['abril'];
        $sql = "UPDATE avances SET beneficiarios = ? WHERE id_avance = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($abril, $abrilclv));

        $mayoclv = $_POST['mayoclv'];
        $mayo = $_POST['mayo'];
        $sql = "UPDATE avances SET beneficiarios = ? WHERE id_avance = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($mayo, $mayoclv));

        $junioclv = $_POST['junioclv'];
        $junio = $_POST['junio'];
        $sql = "UPDATE avances SET beneficiarios = ? WHERE id_avance = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($junio, $junioclv));




        print('<br> <a href="pdm_admin.php" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Siguiente </a> ');
        die();
    } ?>

    <?php
    function avacespormes($con, $id_actividad, $mes)
    {
        $sentencia = "SELECT * FROM avances
        WHERE id_actividad = $id_actividad AND mes = $mes";
        $stm = $con->query($sentencia);
        $avances = $stm->fetch(PDO::FETCH_ASSOC);
        return $avances;
    }
    function traeudmed($con){
        $sqlav = "SELECT * FROM udmed_pdm";
        $stma = $con->query($sqlav);
        $unidadesdemedida = $stma->fetchAll(PDO::FETCH_ASSOC);
        return $unidadesdemedida;
    }
    ?>
    <div class="container text-center mx-auto">

        <?php

        if($permisos['id_dependencia']){
            $id_dependencia = $permisos['id_dependencia'];
            
            $stm = $con->query("SELECT dp.nombre_dependencia, ar.nombre_area, ac.id_actividad, ac.codigo_actividad, ac.nombre_actividad, ac.unidad, la.udmed FROM actividades ac
            JOIN lineasactividades la ON la.id_actividad = ac.id_actividad 
            LEFT JOIN areas ar ON ar.id_area = ac.id_area
            LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
            WHERE ac.id_actividad NOT IN (SELECT id_actividad FROM cuentaactividades) AND dp.id_dependencia = $id_dependencia ");
        }else{
            $stm = $con->query("SELECT dp.nombre_dependencia, ar.nombre_area, ac.id_actividad, ac.codigo_actividad, ac.nombre_actividad, ac.unidad, la.udmed FROM actividades ac
            JOIN lineasactividades la ON la.id_actividad = ac.id_actividad 
            LEFT JOIN areas ar ON ar.id_area = ac.id_area
            LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
            WHERE ac.id_actividad NOT IN (SELECT id_actividad FROM cuentaactividades)
            LIMIT 1");

        }

        $actividad = $stm->fetch(PDO::FETCH_ASSOC);
        ?>
        <br>
        <div class="relative overflow-x-auto my-3">
            <?= $actividad['nombre_dependencia'] ?>
            <br>
            <?= $actividad['nombre_area'] ?>
            <form action="" method="post">
                <input type="hidden" name="id_actividad" value="<?= $actividad['id_actividad'] ?>">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-2 py-3">
                                No
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Enero
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Febrero
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Marzo
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Abril
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Mayo
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Junio
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Unidad de Medidad PDM
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $actividad['id_actividad'] ?>
                            </th>
                            <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $actividad['codigo_actividad'] ?>
                            </th>
                            <td class="px-2 py-4">
                                <?= $actividad['nombre_actividad'] ?>
                            </td>
                            <td class="px-2 py-4">
                                <?= $actividad['unidad'] ?>
                            </td>
                            <td class="px-2 py-4">
                                <?php $enero = avacespormes($con, $actividad['id_actividad'], 1); ?>
                                <input type="hidden" name="eneroclv" value="<?= $enero['id_avance'] ?>">
                                <input type="text" name="enero" value="<?= $enero['beneficiarios'] ?>" <?php echo $readonly = (($enero['beneficiarios']) ? "" : "readonly") ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </td>
                            <td class="px-2 py-4">
                                <?php $febrero = avacespormes($con, $actividad['id_actividad'], 2); ?>
                                <input type="hidden" name="febreroclv" value="<?= $febrero['id_avance'] ?>">
                                <input type="text" name="febrero" value="<?= $febrero['beneficiarios'] ?>" <?php echo $readonly = (($febrero['beneficiarios']) ? "" : "readonly") ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </td>
                            <td class="px-2 py-4">
                                <?php $marzo = avacespormes($con, $actividad['id_actividad'], 3); ?>
                                <input type="hidden" name="marzoclv" value="<?= $marzo['id_avance'] ?>">
                                <input type="text" name="marzo" value="<?= $marzo['beneficiarios'] ?>" <?php echo $readonly = (($marzo['beneficiarios']) ? "" : "readonly") ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </td>
                            <td class="px-2 py-4">
                                <?php $abril = avacespormes($con, $actividad['id_actividad'], 4); ?>
                                <input type="hidden" name="abrilclv" value="<?= $abril['id_avance'] ?>">
                                <input type="text" name="abril" value="<?= $abril['beneficiarios'] ?>" <?php echo $readonly = (($abril['beneficiarios']) ? "" : "readonly") ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </td>
                            <td class="px-2 py-4">
                                <?php $mayo = avacespormes($con, $actividad['id_actividad'], 5); ?>
                                <input type="hidden" name="mayoclv" value="<?= $mayo['id_avance'] ?>">
                                <input type="text" name="mayo" value="<?= $mayo['beneficiarios'] ?>" <?php echo $readonly = (($mayo['beneficiarios']) ? "" : "readonly") ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </td>
                            <td class="px-2 py-4">
                                <?php $junio = avacespormes($con, $actividad['id_actividad'], 6); ?>
                                <input type="hidden" name="junioclv" value="<?= $junio['id_avance'] ?>">
                                <input type="text" name="junio" value="<?= $junio['beneficiarios'] ?>" <?php echo $readonly = (($junio['beneficiarios']) ? "" : "readonly") ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </td>
                            <td class="px-2 py-4">
                                <?php if($actividad['udmed']): ?>
                                    <?= $actividad['udmed'] ?>
                                <?php else: ?>
                                    <label for="udmed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidad de Medida</label>
                                        <select id="udmed" name="udmed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            <option disabled>Seleccione su unidad</option>
                                            <?php $udmed = traeudmed($con) ?>
                                            <?php var_dump($udmed) ?>
                                            <?php foreach($udmed as $u): ?>
                                                <option value="<?= $u['nombre'] ?>"><?= $u['nombre'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                <?php endif ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Actualizar</button>

            </form>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>