<?php 
require_once 'models/conection.php';


$sentencia = "SELECT * FROM ante_indicadores_uso aiu
WHERE anio = 2025";
$stmset = $con->query($sentencia);
$indicadores = $stmset->fetchAll(PDO::FETCH_ASSOC);



foreach($indicadores as $i){
    if(strpos($i['factor_de_comparacion'], "2023") != 0){
       print $i['factor_de_comparacion'] . "<br>";
    }
}


?>