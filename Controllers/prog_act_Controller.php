<?php
require_once 'models/prog_act_Model.php';


function Programacion($con, $id_area){
    $actividades = TraeActividades($con, $id_area);
}


?>