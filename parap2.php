<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />

</head>

<body>
<?php 
require_once 'models/conection.php';


$sql = "SELECT * FROM actividades ac
	JOIN lineasactividades la ON la.id_actividad = ac.id_actividad
	LEFT JOIN programaciones p ON p.id_actividad = ac.id_actividad
	GROUP BY ac.id_actividad 
	";
$stm = $con->query($sql);
$actividades = $stm->fetchAll(PDO::FETCH_ASSOC);


foreach($actividades as $a){
	print $a['id_actividad']. "|". $a['nombre_actividad'] . "|" . $a['unidad'] . "|";
	print $a['enero'] . "|" . $a['febrero'] . "|" . $a['marzo'] . "|" . $a['abril'] . "|" . $a['mayo'] . "|" . $a['junio'] . "|" . $a['julio'] . "|" . $a['agosto'] . "|" . $a['septiembre'] . "|" . $a['octubre'] . "|" . $a['noviembre'] . "|" . $a['diciembre'];
	print '<br>';
}




?>






	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

</body>

</html>