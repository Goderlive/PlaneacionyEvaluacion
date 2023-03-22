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

                <form action="editar_perfil.php" method="POST">
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="email" name="correo_electronico" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo $datos['correo_electronico'];?>" />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Correo:</label>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="password" name="contrasena" id="contrasena" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $datos['contrasena'];?>" required />
                            <label for="contrasena" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Contraseña:</label>
                            <div class="flex items-center">
                                <input id="mostrar" type="checkbox" onclick="ver_contrasena()" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="mostrar" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mostrar Contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="nombre" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $datos['nombre'];?> " required />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nombre Completo:</label>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" name="apellidos" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $datos['apellidos'];?> " required />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Apellidos:</label>
                        </div>
                        <div class="relative z-0 w-full mb-3 group">
                            <input type="tel" name="telefono" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value=" <?php echo $datos['tel'];?>" required />
                            <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Teléfono</label>
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
<hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

<?php if($permiso['id_area'] == ""): ?>

<form action="administra_usuarios.php" method="POST">    
    <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Administrar mis Usuarios</button>
</form>

<?php endif ?>

        
<?php include 'footer.php';?>
</body>
</html>
<script>
function ver_contrasena() {
    var contrasena = document.getElementById('contrasena');
    if (contrasena.type == 'password') {
        contrasena.type = 'text';
    } else {
        contrasena.type = 'password';
    }
}
</script>
