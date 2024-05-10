<?php
session_start();

$id_usuario = $_SESSION['id_usuario'];

if (isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm") {
    require_once 'models/revisa_todas_reconducciones_Modelo.php';
    include 'header.php';
    include 'head.php';
    // consultamos los permisos
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisar Reconducciones</title>
</head>

<body>

    <?php
    $reconducciones = traeReconduccionesIndicadores($con);
    foreach ($reconducciones as $a) {
        print 
        "id: " . $a['id_reconduccion_indicadores'] . "<br>" . 
        "Oficio: " . $a['no_oficio'] . "<br>" . 
        "Fecha: " . $a['fecha'] . "<br>" . 
        "Dependencia: " . $a['dep_general'] . "<br>" . 
        "Dependencia Aux: " . $a['dep_aux'] . "<br>" . 
        "Nombre Indicador: " . $a['nombre_indicador'] . "<br><br><br><br>" 
        
        
        ;
    }
    ?>
</body>

</html>