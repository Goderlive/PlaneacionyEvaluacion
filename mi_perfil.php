<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php 
include 'head.php';
include 'header.php';
require_once 'Controllers/mi_perfil_Controller.php';
include 'Controllers/breadcrumbs.php';

?>
<body>
    <br>
    <div class="container mx-auto">
<?= breadcrumbs(array("Inicio"=> "index.php", "Mi Perfil" => "mi_perfil.php"))?>
        
        <br>
        <h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl dark:text-white">Administrador de Cuentas</h2>
        <br>


        
        <?php
            $datos = TraeUsuario($con, $id_usuario);
            if($datos): ?>
            <div role="status" class="animate-pulse">
                <h1 class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl dark:text-white">Cuenta de Administrador</h1>

                <form action="models/mi_perfil_Model.php" method="POST">
                    <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="email" readonly name="correo_electronico" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="<?= $datos['correo_electronico'];?>" />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Correo:</label>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="tel" name="telefono" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $datos['tel'];?>" required />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Teléfono</label>
                        </div>
                    </div>
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="nombre" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $datos['nombre'];?>" required />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nombre Completo:</label>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="apellidos" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $datos['apellidos'];?>" required />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Apellidos:</label>
                        </div>
                        
                    </div>
                    
                    <br>
                    <div class="text-center">
                        <button type="submit" name="actualizar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                    </div>
                </div>
                    
                    <?php endif?>
            </form>
<br>
<button data-modal-toggle="cambiarcontrasenia" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"" type="button" >Cambiar Contraseña</button>                                    </td>

<hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

<?php if($permisos['id_area'] == ""): ?>

    <a href="administra_usuarios.php" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Administrar mis Usuarios</a>
    <?php endif ?>



    <div id="cambiarcontrasenia" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="cambiarcontrasenia">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">   <!-- Aqui comienza -->
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Cambiar la contraseña
                            </h3>
                            <br>
                            <form action="models/mi_perfil_Model.php" id="formulario1" method="POST">
                                <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña Nueva:</label>
                                    <input type="password" id="contrasena" name="contrasena" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Almenos 8 caracteres Letras y Numeros">
                                </div>
                                <br>
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repetir la Contraseña Nueva:</label>
                                    <input type="password" id="verificar_contrasena" name="verificar_contrasena" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Repite la misma contraseña">
                                </div>
                                <br>

                                <button type="submit" id="submit1" name="contrasenia" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cambiar Contraseña</button>
<br>
                            </form>


                        </div>
                    </div>
                </div>
            </div> 




        
<?php include 'footer.php';?>

<script>
const form1 = document.querySelector('#formulario1');
const contraseña1 = form1.elements['contraseña'];
const verificarContraseña1 = form1.elements['verificar_contraseña'];

form1.addEventListener('submit', function(event) {
  if (contraseña1.value !== verificarContraseña1.value) {
    alert('Las contraseñas del formulario 1 no coinciden. Por favor, verifica de nuevo.');
    event.preventDefault();
  } else if (!verificarComplejidadContraseña(contraseña1.value)) {
    alert('La contraseña del formulario 1 debe tener al menos 8 caracteres, incluyendo al menos un número y una letra.');
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
