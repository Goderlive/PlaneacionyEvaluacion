<?php 
require_once 'models/conection.php';



$stm = $con->query("SELECT * FROM avances WHERE anio = '2024'");
$avances = $stm->fetchall(PDO::FETCH_ASSOC);

print '<pre>';
var_dump($avances);
die();
foreach($avances as $a){
    print $a['beneficiarios'];
    $nbenef = json_encode($a['beneficiarios']);
    print "<br>";
}


?>