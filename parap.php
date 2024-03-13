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





<input type="text" id="rangoFechas" />





</body>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  // Calcular el primer y último día del año actual
  const fechaActual = new Date();
  const primerDiaDelAno = new Date(fechaActual.getFullYear(), 0, 1);
  const ultimoDiaDelAno = new Date(fechaActual.getFullYear(), 11, 31);

  // Inicializar Flatpickr con minDate y maxDate
  flatpickr("#rangoFechas", {
    mode: "range",
    minDate: primerDiaDelAno,
    maxDate: ultimoDiaDelAno,
    dateFormat: "Y-m-d"
  });
</script>

</html>