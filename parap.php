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
LEFT JOIN areas ar ON ar.id_area = ac.id_area
WHERE ar.id_area = $id_area
ORDER BY ac.codigo_actividad";

$stm = $con->query($sql);
$programaciones = $stm->fetchAll(PDO::FETCH_ASSOC);




foreach($programaciones as $a):


endforeach;
?>




<?php include 'footer.php';?>


<table>
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>td</td><td>td2</td><td>td3</td>
        </tr>
    </tbody>
</table>

<img src="" alt="">
</body>
</html>