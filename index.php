<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/Inicio_Controlador.php';

?>
<!DOCTYPE html>
<html lang="es">

<body>
    

  <div class="container text-center mx-auto">
        <br>
        <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                Atención! <a href="#" class="font-semibold underline hover:text-blue-800 dark:hover:text-blue-900"></a>Verifica que tengas reportados tus actividades e indicadores.
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <h3 class="font-bold text-4xl text-gray-800 border-b-3 border-gray-100 p-2 mb-2">Bienvenido <?= $user['nombre'] . " ". $user['apellidos'] ?></h3>
        <br>


        <?php
        // Aqui va lo que pasa si eres nivel 2 (osea de la wipe o gobierno digital)
		if($_SESSION['id_permiso'] == 1){
			print AlertaAvancesActividades($con);
			print AlertaAvancesIndicadores($con);
		}
        ?>
        <br>
        <hr>

        
    </div>

<?php include 'footer.php';?>
</body>
</html>
<?php 
}else{?>
    <script>
    window.location.href = 'login.php';
    </script>
<?php
}
?>