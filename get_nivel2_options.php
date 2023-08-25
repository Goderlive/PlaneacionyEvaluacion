<?php
include 'config.php';

$padreId = $_GET['padre_id'];

$query_nivel2 = "SELECT id_estrategia, nombre_estrategia FROM pdm_estrategias WHERE id_objetivo = :padre_id";
$stmt_nivel2 = $conn->prepare($query_nivel2);
$stmt_nivel2->bindParam(':padre_id', $padreId, PDO::PARAM_INT);
$stmt_nivel2->execute();

$opcionesNivel2 = $stmt_nivel2->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($opcionesNivel2);
?>
