<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mi aplicación' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <?php require_once 'nheader.php'; ?>

    <!-- Contenido principal -->
    <main class="container mx-auto p-4">
        <?= $content; // Aquí se inyectará el contenido dinámico ?>
    </main>


    <!-- Pie de página -->
    <footer class="bg-gray-800 text-white p-4 mt-4 text-center">
        <p>&copy; <?= date('Y'); ?> SIMONTS</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>