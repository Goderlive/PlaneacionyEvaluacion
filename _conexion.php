<?php
$mysqli = new mysqli("localhost","root","","planeacion_y_evaluacion");
if(mysqli_connect_errno()){
    printf("Fallo la conexión: %s\n", mysqli_connect_error());
    exit();
}
$mysqli->set_charset("utf8");

?>