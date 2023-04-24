<?php require_once 'models/conection.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php include 'head.php'; ?>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tags-input/1.3.6/jquery.tagsinput.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tags-input/1.3.6/jquery.tagsinput.min.js"></script>
</head>
<body>

  <?php require_once 'models/conection.php' ?>
  
  <?php 
  $sql = "SELECT * FROM lineasactividades la
    INNER JOIN actividades a ON a.id_actividad = la.id_actividad
    INNER JOIN pdm_lineas li ON la.id_linea = li.id_linea
    ORDER BY la.id_linea, la.id_actividad";
$stm = $con->query($sql);
$lineas = $stm->fetchAll(PDO::FETCH_ASSOC);
?>


<?php foreach($lineas as $l): ?>

  <p><?= $l['clave_linea'] . "|" . $l['codigo_actividad'] . " " . $l['nombre_actividad'] ?></p>

<?php endforeach ?>

</body>
</html>