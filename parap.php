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



$id_area = 5;
$sqlmag = "SELECT * FROM actividades ac
LEFT JOIN areas ar ON ar.id_area = ac.id_area
LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
LEFT JOIN lineasactividades la ON la.id_actividad = ac.id_actividad 
LEFT JOIN pdm_lineas pl ON pl.id_linea = la.id_linea
LEFT JOIN pdm_estrategias pe ON pe.id_estrategia = pl.id_estrategia
LEFT JOIN pdm_objetivos po ON po.id_objetivo = pe.id_objetivo
WHERE ar.id_area = $id_area
ORDER BY po.clave_objetivo ASC,
CAST(REPLACE(po.clave_objetivo, 'O', '') AS INTEGER) ASC
";
$stmmag = $con->query($sqlmag);
$seguimiento = $stmmag->fetchAll(PDO::FETCH_ASSOC); ?>


<?php 
print '<pre>';
var_dump($seguimiento);
die();
?>

<table>
    <thead>
        <tr>
            <th>Objetivo </th>
            <th>Estrategias </th>
            <th>Líneas de acción </th>
            <th>Área(s) Responsable (s)</th>
            <th>Acciones realizadas</th>
            <th>Localidad (es) beneficiada (s)</th>
            <th>Beneficiarios directos</th>
            <th>Origen de los Recursos públicos aplicados</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($seguimiento as $s): ?>
            <?php traeavance() ?>
        <tr>
            <td><?= $s['nombre_objetivo'] ?></td>
            <td><?= $s['nombre_estrategia'] ?></td>
            <td><?= $s['nombre_linea'] ?></td>
            <td><?= $s['nombre_dependencia'] ?></td>
            <td><?= $s[''] ?></td> Programacion del avance
            <td><?= $s['nombre_dependencia'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?php include 'footer.php';?>

</body>
</html>