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
                        <input id="ver" type="checkbox" onclick="ver_contrasena()" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="ver" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mostrar Contraseña</label>
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



        <?php if($_SESSION['id_permiso'] != 5):?>
<br>
    <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700"></ul>
<br>
<h5 class="text-xl font-medium text-gray-800 dark:text-white">Registra un Enlace Nuevo</h5>
<br>
<button class = "bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="mymodal1"> Registrar Nuevo</button>

<br>
<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700"></ul>
<br>
<?php endif?>

<!-- Ahora mostrara los ya registrados -->
<?php
if($_SESSION['id_permiso'] != 5){
    $dependientes = BuscaDependientes($con, $sentencia);
}
if(isset($dependientes) && $dependientes):?>
    <div class="p-4 w-full max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Otros Usuarios</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <?php foreach($dependientes as $dependiente):?>

                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    <?= $dependiente['nombre'] . " " . $dependiente['apellidos'] ?>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <?= $dependiente['correo_electronico'] ?>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <?= $dependiente['nombre_dependencia'] ?>
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <button type="submit" name="eliminar" class="mx-1 py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                <button type="submit" name="actualizar" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Contraseña</button>

                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif?>












<!-- Main modal -->
<div id="mymodal1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Registra un Nuevo Usuario</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal1">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="models/mi_perfil_Model.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_registrante" value="<?= $_SESSION['id_usuario']?>">
                    <input type="hidden" name="id_dependencia" value="<?= $_SESSION['id_dependencia']?>">


                    <?php if($_SESSION['id_permiso'] == 2 ||  $_SESSION['id_permiso'] == 1): ?>
                        <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Direccion</label>
                        <select name="id_dependencia" id="small" class="block p-2 mb-6 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Seleccione un Área</option>
                            <?php $areas = TraeAreas($con);
                            foreach($areas as $area):?>
                                <option value="<?= $area['id_dependencia']?>"><?=$area['nombre_dependencia'] ?></option>
                            <?php endforeach?>
                        </select>
                    <?php else: ?>
                        <input type="hidden" name="id_dependencia" value="<?= $_SESSION['id_dependencia']?>">
                    <?php endif ?>
                    

                    <?php if($_SESSION['id_permiso'] <= 3): ?>
                        <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nivel</label>
                        <select id="small" name="id_permiso" class="block p-2 mb-6 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="5"> Enlace </option>
                            <option value="4"> Dependencia </option>
                            <?php if($_SESSION['id_permiso'] <= 2): ?>
                                <option value="3"> Presidente </option>
                                <option value="2"> Admin </option>
                            <?php endif ?>

                            <?php if($_SESSION['id_permiso'] == 1):?>
                                <option value="1"> SuperAdmin </option>
                            <?php endif ?>
                        </select>
                    <?php else:?>
                    <input type="hidden" name="id_permiso" value="5">
                    <?php endif?>

                    
                    <div class="relative"> 
                        <input type="email" name="correo_electronico" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required/>
                        <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Correo:</label>
                    </div>
                    <br>
                    <div class="relative"> 
                        <input type="password" name="contrasena" id="contrasena" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                        <label for="contrasena" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Contraseña:</label>
                    </div>
                    <br>
                    <div class="relative"> 
                        <input type="text" name="nombre" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                        <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nombres:</label>
                    </div>
                    <br>
                    <div class="relative"> 
                        <input type="text" name="apellidos" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                        <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Apellidos:</label>
                    </div>
                    <br>
                    <div class="relative"> 
                        <input type="tel" name="tel" id="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                        <label for="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Teléfono</label>
            </div>
        </div>
                        <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Registrar" name="nuevo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                </div>
                </form>
    </div>
</div>

</div> <!-- Este es el div principal -->
<br>

<?php include 'footer.php';?>
</body>
</html>
<script>
    function ver_contrasena(){
        document.getElementById('contrasena').type = document.getElementById('contrasena').type == 'password' ? 'text' : 'password';
    }
</script>
