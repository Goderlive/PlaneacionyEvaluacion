<?php 
session_start();
require_once '../models/conection.php';
$sql = "SELECT path_evidenia_evidencia FROM avances"; 
$stm = $con->query($sql);
$rutas = $stm->fetchAll();


// Ruta y nombre del archivo ZIP de salida
$archivoZip = 'archivos.zip';

$directorio = '.'; // Reemplaza con la ruta del directorio que deseas verificar

if (is_writable($directorio)) {
    echo "El directorio es escribible. Tiene permisos para crear archivos ZIP.";
} else {
    echo "El directorio no es escribible. No tiene permisos para crear archivos ZIP.";
}

// Crear una instancia de la clase ZipArchive
$zip = new ZipArchive();

// Abrir el archivo ZIP para escritura
if ($zip->open($archivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
    // Iterar sobre cada ruta y agregar archivos y subcarpetas al archivo ZIP
    foreach ($rutas as $ruta) {
        $ruta = $ruta[0];
        // Verificar si la ruta es válida
        if (!empty($ruta) && file_exists($ruta)) {
            // Comprobar si es una carpeta
            if (is_dir($ruta)) {
                // Agregar la carpeta al archivo ZIP con su estructura de subcarpetas
                $zip->addEmptyDir($ruta);
            } else {
                // Agregar el archivo al archivo ZIP con su ruta relativa
                $zip->addFile($ruta, ltrim($ruta, '/'));
            }
        }
    }

    // Cerrar el archivo ZIP
    $zip->close();

    // Verificar si el archivo ZIP existe
    if (file_exists($archivoZip)) {
        // Descargar el archivo ZIP resultante
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $archivoZip . '"');
        header('Content-Length: ' . filesize($archivoZip));

        readfile($archivoZip);

        // Eliminar el archivo ZIP después de la descarga
        unlink($archivoZip);
    } else {
        echo 'No se pudo encontrar el archivo ZIP.';
    }
} else {
    echo 'No se pudo crear el archivo ZIP.';
}
?>
