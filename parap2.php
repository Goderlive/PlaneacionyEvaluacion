<?php
require_once 'models/conection.php';
// Consulta SQL para obtener las etiquetas desde la base de datos
$query = "SELECT nombre_dependencia FROM dependencias";
$stmt = $con->prepare($query);
$stmt->execute();
$labels = $stmt->fetchAll(PDO::FETCH_COLUMN);

$stm = $con->query("SELECT id_dependencia FROM dependencias");
$dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);

function avances($con, $id_dependencia){
	$sentencia1 = "SELECT ac.* FROM actividades ac
	JOIN programaciones pr ON pr.id_actividad = ac.id_actividad 
	LEFT JOIN areas ar ON ar.id_area = ac.id_area
	LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
	WHERE dp.id_dependencia = $id_dependencia
	";
	$stm = $con->query($sentencia1);
	$actividades = $stm->fetchAll(PDO::FETCH_ASSOC);

	


}

foreach($dependencias as $d):
	$avance = avances($con, $d['id_dependencia']);

endforeach;

// Cerrar la conexión
$conn = null;

$datos = [12, 19, 3, 5, 2, 19, 3, 5, 2, 19, 3, 5, 2, 19, 3, 5, 2]; // Reemplaza esto con tu propio array de datos


$datos_json = json_encode($datos);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Barras con Chart.js y Datos desde MySQL</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
		var datos = <?php echo $datos_json; ?>; // Convertir datos JSON de PHP a JavaScript

        var labels = <?php echo json_encode($labels); ?>; // Convertir los datos PHP a JavaScript

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Usar las etiquetas obtenidas desde MySQL
                datasets: [{
                    label: 'Ventas',
                    data: datos, // Usar los datos desde el array en PHP
                    backgroundColor: 'rgba(54, 162, 235, 0.6)', // Azul más oscuro
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
