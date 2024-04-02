<?php
require_once 'models/conection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Para Pruebas 1</title>
</head>

<body>


<?php 

$email = 'desarrollosocial@metepec.gob.mx';

$stm = $con->query("SELECT * FROM dependencias WHERE anio = $anio ORDER BY nombre_dependencia ASC");
$dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
return $dependencias;

$sentencia = "SELECT * FROM usuarios u
WHERE u.correo_electronico = ? AND u.activo = 1";
$stmt = $con->prepare($sentencia);
$stmt->execute(array($email));
$usuario = $stmt->fetch();


print '<pre>';
var_dump($usuario);
die();


?>



</body>
</html>