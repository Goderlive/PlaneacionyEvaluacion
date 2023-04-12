<?php require_once 'models/conection.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php include 'head.php'; ?>
</head>
<body>

<?php 
$id_area = 20;

$sql = "SELECT * FROM actividades ac
LEFT JOIN lineasactividades la ON la.id_actividad = ac.id_actividad
LEFT JOIN pdm_lineas l ON l.id_linea = la.id_linea";

$sql = "SELECT * FROM lineasactividades la
JOIN actividades ac ON la.id_actividad = ac.id_actividad
JOIN pdm_lineas l ON l.id_linea = la.id_linea 
ORDER BY l.clave_linea ASC";
$stm = $con->query($sql);
$programaciones = $stm->fetchAll(PDO::FETCH_ASSOC);

print "<pre>";
foreach($programaciones as $p){
    foreach($p as $a){
        print $a;
        print "|";
    }
    print "<br>";
}

?>


</body>
</html>