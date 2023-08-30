<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
$id_dependencia = 123;
$trimestre = 2;
$actividad = "Ejemplo de actividad";

// Concatenar los valores en una cadena
$data = $id_dependencia . "-" . $trimestre . "-" . $actividad;

// "Encriptar" la cadena (en este caso, simplemente codificarla en base64)
$encrypted_data = base64_encode($data);

echo "Cadena encriptada: " . $encrypted_data;

print "<br>";



$encrypted_data = $encrypted_data; // Obtener la cadena encriptada de la solicitud POST

// "Desencriptar" la cadena (decodificarla de base64)
$data = base64_decode($encrypted_data);

// Dividir la cadena en los componentes originales
list($id_dependencia, $trimestre, $actividad) = explode("-", $data);

echo "ID Dependencia: " . $id_dependencia . "<br>";
echo "Trimestre: " . $trimestre . "<br>";
echo "Actividad: " . $actividad . "<br>";
?>



    
</body>
</html>