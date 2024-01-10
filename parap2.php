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
$consulta = "SELECT programas_presupuestarios.codigo_programa, `ante_unob`.`diagnostico_fortaleza`, `ante_unob`.`diagnostico_oportunidad`, `ante_unob`.`diagnostico_debilidad`, `ante_unob`.`diagnostico_amenaza`, `dependencias_generales`.`clave_dependencia`, `dependencias_auxiliares`.`clave_dependencia_auxiliar`, `proyectos`.`codigo_proyecto`, `programas_presupuestarios`.`id_programa`
FROM ante_unob
LEFT JOIN  ante_areas ON ante_unob.id_area = ante_areas.id_area
LEFT JOIN `dependencias_generales` ON dependencias_generales.id_dependencia = ante_areas.id_dependencia_general 
LEFT JOIN `dependencias_auxiliares` ON dependencias_auxiliares.id_dependencia_auxiliar = ante_areas.id_dependencia_aux
LEFT JOIN `proyectos` ON proyectos.id_proyecto = ante_areas.id_proyecto
LEFT JOIN `programas_presupuestarios` ON `proyectos`.`id_programa` = `programas_presupuestarios`.`id_programa`;";

$stm = $con->query($consulta);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach($areas as $a){

  print $a['codigo_programa'] . '|' . $a['clave_dependencia'] . "|" . $a['clave_dependencia_auxiliar'] . "|" . $a['codigo_proyecto']. '|' . $a['diagnostico_fortaleza'] . "|" . $a['diagnostico_oportunidad'] . "|" . $a['diagnostico_debilidad'] . "|" . $a['diagnostico_amenaza'];
  print "<br>";
}

?>


</body>
</html>