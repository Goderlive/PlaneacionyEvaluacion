<?php
session_start();

$id_usuario = $_SESSION['id_usuario'];

if (!isset($_SESSION) || !isset($_SESSION['sistema']) || !$_SESSION['sistema'] == "pbrm") {
    header("Location: login.php");
}
//require_once 'Controllers/Inicio_Controlador.php';
include 'header.php';
include 'head.php';
?>
<!DOCTYPE html>
<html lang="es">

<body>
    
<h1>Área en construcción</h1>
    <?php include 'footer.php'; ?>
</body>

</html>