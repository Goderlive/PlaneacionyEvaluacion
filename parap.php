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

require_once 'sources/phpqrcode/qrlib.php'; // Asegúrate de ajustar la ruta

$param = $_GET['id']; // remember to sanitize that - it is user input!
    
// we need to be sure ours script does not output anything!!!
// otherwise it will break up PNG binary!

ob_start("callback");

// here DB request or some processing
$codeText = 'DEMO - '.$param;

// end of processing here
$debugLog = ob_get_contents();
ob_end_clean();

// outputs image directly into browser, as PNG stream
QRcode::png($codeText);






?>



</body>
</html>