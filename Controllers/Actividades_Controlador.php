<?php
require_once 'models/modelo_actividades.php';
require_once 'models/inicio_modelo.php';


$id_usuario = $_SESSION['id_usuario'];
if(isset($_SESSION['id_dependencia'])){
    $dep = $_SESSION['id_dependencia'];
}else{
}
?>

