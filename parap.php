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

<?php 
$sql = " SELECT * FROM indicadores_uso iu
LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador
LEFT JOIN dependencias dp ON iu.id_dependencia = dp.id_dependencia 
LEFT JOIN dependencias_generales dg ON iu.id_dep_general = dg.id_dependencia
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
ORDER BY dg.clave_dependencia, da.clave_dependencia_auxiliar, py.codigo_proyecto
";
$stm = $con->query($sql);
$indicadores_avances = $stm->fetchAll(PDO::FETCH_ASSOC);?>




Muestra los avances de indicadores <br>
<table>
    
    <?php foreach($indicadores_avances as $indica): ?>
        <?php if($indica['id_avance'] ): ?>
            <?= '["' . $indica['clave_dependencia'] . " | " . $indica['clave_dependencia_auxiliar'] . " | " . $indica['codigo_proyecto'] . " | " . $indica['nombre_indicador'] . " | " . $indica['at1'] . " | " . $indica['avance_a'] . "</td>". "</tr>" ?>
            <?= '["' . $indica['clave_dependencia'] . " | " . $indica['clave_dependencia_auxiliar'] . " | " . $indica['codigo_proyecto'] . " | " . $indica['nombre_indicador'] . " | " . $indica['bt1'] . " | " . $indica['avance_b'] . "</td>". "</tr>" ?>
        <?php endif ?>
    <?php endforeach ?>
            <br>
            <br>
</table>


</body>
</html>