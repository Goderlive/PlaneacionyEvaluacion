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
  $sql = "SELECT actividades.id_actividad, actividades.nombre_actividad FROM actividades 
  LEFT JOIN areas ON areas.id_area = actividades.id_area
  LEFT JOIN dependencias ON dependencias.id_dependencia = areas.id_dependencia
  WHERE dependencias.id_dependencia = 41 OR dependencias.id_dependencia = 42 OR dependencias.id_dependencia = 43 
  GROUP BY actividades.id_actividad   ORDER BY actividades.id_actividad";
$stm = $con->query($sql);
$lineas = $stm->fetchAll(PDO::FETCH_ASSOC);
?>


<?php foreach($lineas as $l): ?>
["<?= $l['id_actividad']?>", "<?= $l['nombre_actividad'] ?>"], <br>
<?php endforeach ?>

</body>
</html>