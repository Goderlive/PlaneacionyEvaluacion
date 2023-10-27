<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>

<?php
// Texto que quieres "encriptar"
$texto_original = "id_area=34&trimestre=1";

// "Encriptar" el texto
$texto_oculto = base64_encode($texto_original);

echo 'Texto oculto: ' . $texto_oculto . "<br>";

// Desencriptar el texto
$nuevo = 'L2luZGV4LnBocD9kPTI3JnQ9Mw==';

$texto_desencriptado = base64_decode($nuevo);

echo 'Texto desencriptado: ' . $texto_desencriptado;
?>
</body>

</html>