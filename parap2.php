<?php 
require_once 'models/conection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php 
$consulta = "SELECT * FROM ante_areas 
LEFT JOIN dependencias_generales ON ante_areas.id_dependencia_general = dependencias_generales.id_dependencia 
LEFT JOIN dependencias_auxiliares ON ante_areas.id_dependencia_aux = dependencias_auxiliares.id_dependencia_auxiliar 
LEFT JOIN proyectos ON ante_areas.id_proyecto = proyectos.id_proyecto 
LEFT JOIN ante_dependencias ON ante_areas.id_dependencia = ante_dependencias.id_antedependencia
LEFT JOIN programas_presupuestarios ON proyectos.id_programa = programas_presupuestarios.id_programa 
LEFT JOIN titulares ON titulares.id_area = ante_areas.id_area 
WHERE ante_areas.id_dependencia < 41
GROUP BY ante_areas.id_area";

$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach($areas as $a){

  print $a['clave_dependencia'] . " " . $a['clave_dependencia_auxiliar'] . " " . $a['codigo_proyecto'];
  print "<br>";
}

?>


</body>
</html>