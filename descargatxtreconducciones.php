<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['txt']) {
    if(!$_SESSION['sistema'] == "pbrm"){
        header("Location: login.php");
    }

    require_once 'models/revisa_todas_reconducciones_Modelo.php';
    $reconducciones = Traelasreconducciones($con);

    foreach($reconducciones as $r):   
        $programaciones = CalendarizacionesdeReconduccionAct($con, $r['id_reconduccion_actividades']);
        foreach($programaciones as $programacion):   // Tenemos una vista de cada programacion dentro de cada reconduccion.
            $dataActividad = datosdeActividad($con, $programacion['id_actividad']);


            print '<pre>';
            var_dump($programacion);
        endforeach;
    endforeach;



    // Contenido del archivo
    $contenido = "Este es el contenido de mi archivo de texto.";

    // Nombre del archivo
    $nombre_archivo = 'archivo.txt';

    // Crear el archivo
    $file = fopen($nombre_archivo, "w");
    fwrite($file, $contenido);
    fclose($file);

    // Limpiar el búfer de salida
    ob_clean();

    // Descargar el archivo
    header("Content-disposition: attachment; filename=$nombre_archivo");
    header("Content-type: text/plain");
    readfile($nombre_archivo);
    exit;
}
?>