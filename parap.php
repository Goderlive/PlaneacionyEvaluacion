<?php require_once 'models/conection.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php include 'head.php'; ?>
</head>
<body>

<?php 
$id_area = 20;

$sql = "SELECT * FROM actividades ac
LEFT JOIN areas ar ON ar.id_area = ac.id_area
WHERE ar.id_area = $id_area
ORDER BY ac.codigo_actividad";

$stm = $con->query($sql);
$programaciones = $stm->fetchAll(PDO::FETCH_ASSOC);



<div id="mymodal36" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="mymodal36">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">   <!-- Aqui comienza -->
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Cambiar la contraseña
                            </h3>
                            <br>
                            <form>
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña:</label>
                                    <input type="password" id="contraseña" name="contraseña" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Almenos 8 caracteres Letras y Numeros">
                                </div>
                                <br>
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verificar Contraseña:</label>
                                    <input type="password" id="verificar_contraseña" name="verificar_contraseña" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Repite la misma contraseña">
                                </div>
                                <br>

                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cambiar Contraseña</button>
<br>
                            </form>


                        </div>
                    </div>
                </div>
            </div> 


<?php include 'footer.php';?>

<script>

const form = document.querySelector('form');
const contraseña = form.elements['contraseña'];
const verificarContraseña = form.elements['verificar_contraseña'];

form.addEventListener('submit', function(event) {
  if (contraseña.value !== verificarContraseña.value) {
    alert('Las contraseñas no coinciden. Por favor, verifica de nuevo.');
    event.preventDefault();
  } else if (!verificarComplejidadContraseña(contraseña.value)) {
    alert('La contraseña debe tener al menos 8 caracteres, incluyendo al menos un número y una letra.');
    event.preventDefault();
  }
});

function verificarComplejidadContraseña(contraseña) {
  const regex = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){8,}$/;
  return regex.test(contraseña);
}


</script>
</body>
</html>