
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entrada'])) {
    require_once '../models/conection.php';
    $entrada = $_POST['entrada'];
    $actividades = explode("\n", $entrada);

    function limpiarDatos($actividades) {
        $datosLimpios = [];
        foreach ($actividades as $linea) {
            // Eliminar comillas y dividir la línea en elementos
            $linea = str_replace('"', '', $linea);  // Remueve comillas
            $elementos = explode("|", $linea);
            $elementosLimpios = array_map('trim', $elementos);  // Limpia espacios antes y después
            $datosLimpios[] = $elementosLimpios; // Guarda el array limpio
        }
        return $datosLimpios;
    }

    // Limpieza de los datos
    $actividadesTxt = limpiarDatos($actividades);
    

    // El siguiente foreach nos dice las areas unicas que tenemos y las agregara a dependencias y luego a areas
    foreach ($actividadesTxt as $item) {
        // Crear una clave única a partir de los índices especificados
        $key = $item[2] . $item[3] . $item[4] . $item[5] . $item[6] . $item[7] . $item[8] . $item[9];

        // Si la clave no está en el array asociativo, añadir el elemento al array único
        if (!isset($uniqueKeys[$key])) {
            $uniqueKeys[$key] = true;
            $nareastxt[] = $item;
        }
    }



    







}   



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <title>Captura Areas</title>
</head>

<body class="m-4">

    <form action="" method="post">
        <p>Pegar el contenido del TXT 02a a continuación</p>
        <textarea name="entrada" id="entrada" cols="90" rows="30" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Revisar</button>

    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>