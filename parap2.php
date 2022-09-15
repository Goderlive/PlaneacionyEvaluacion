<!DOCTYPE html>
<html>
<head>
</head>
<body>
  


<?php
include 'models/conection.php';
$stm = $con->query("SELECT descripcion_unidad FROM unidades_medida");
$desc_u_m = $stm->fetchAll(PDO::FETCH_ASSOC);
?>


<table>


  <?php
foreach($desc_u_m as $d){
  print "<tr>";
  print("<t>" . $d['descripcion_unidad'] . "</t>");
  print "</tr>";
  
}
?>


</table>

</body>
</html>
