<?php
session_start();

$id_usuario = $_SESSION['id_usuario'];

if (!isset($_SESSION) || !isset($_SESSION['sistema']) || !$_SESSION['sistema'] == "pbrm") {
    header("Location: login.php");
}
require_once 'Controllers/Inicio_Controlador.php';
include 'header.php';
include 'head.php';
?>
<!DOCTYPE html>
<html lang="es">

<body>

    <div class="container text-center mx-auto">
<br><br>
        <h4 class="text-2xl font-bold dark:text-white">Área en construcción</h4>

    </div>

    <?php include 'footer.php'; ?>
</body>

</html>