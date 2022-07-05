<?php
require_once 'models/inicio_modelo.php';
$id_usuario = $_SESSION['id_usuario'];

$user = get_usuario($id_usuario,$con);




?>