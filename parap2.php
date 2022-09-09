<!DOCTYPE html>
<html lang="en">
<body>

<?php

$uno = 45 * 170390;
$dos = 2 * 170390;
$dato1 = bin2hex($uno);
$dato2 = bin2hex($dos);
$id_area = bin2hex("id_area");
$trimestre = bin2hex("trimestre");

?>

<form action="" method="get">
    <input type="hidden" name="<?= $id_area ?>" value="<?= $dato1 ?>">
    <input type="hidden" name="<?= $trimestre ?>" value="<?= $dato2 ?>">
    <input type="submit" value="send">
</form>


<?php 

if($_GET){

    var_dump($_GET);

    print $_GET[bin2hex("id_area")];
}   

?>

</body>
</html>
