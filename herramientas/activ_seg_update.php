<?php session_start();
require_once '../models/inicio_modelo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza el Programa Anual</title>
</head>


<?php

//$anioobjetivo = $_SESSION['anio'] + 1;
$anioobjetivo = '2024';


function actualizaActividades($con,$anioobjetivo){
    $sentencia = "SELECT * FROM ante_actividades
    WHERE anio = $anioobjetivo";
    $stm = $con->query($sentencia);
    $ante_dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    

    foreach($ante_dependencias as $d){
            $id = $d['id_actividad'];
            $sql = "UPDATE ante_actividades SET id_actividad_seguimiento = ? WHERE id_actividad = $id";
            $sqlr = $con->prepare($sql);
            $sqlr->execute(array($id));

    }
}



?>

<body>
    <div class="ml-5">

        Primero las actividades <br>

        <?php actualizaActividades($con, $anioobjetivo); ?>
        

       
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>