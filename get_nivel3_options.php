<?php
include 'config.php';

$padreId = $_GET['padre_id'];

$query_nivel3 = "SELECT id_linea, nombre_linea FROM pdm_lineas WHERE id_estrategia = :padre_id";
$stmt_nivel3 = $conn->prepare($query_nivel3);
$stmt_nivel3->bindParam(':padre_id', $padreId, PDO::PARAM_INT);
$stmt_nivel3->execute();

$opcionesNivel3 = $stmt_nivel3->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($opcionesNivel3);
?>
