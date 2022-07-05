<?php
    session_start();
    if($_SESSION['sistema'] == 'pbrm'){
        if(isset($_POST['actualizar'])){
            include 'conexion.php';
            $nombre_empleado = $mysqli->real_escape_string($_POST['nombre_empleado']);
            $telefono = $mysqli->real_escape_string($_POST['telefono']);
            $contrasena = $mysqli->real_escape_string($_POST['contrasena']);
            $correo_electronico = $mysqli->real_escape_string($_POST['correo_electronico']);
            $activo = $mysqli->real_escape_string($_POST['activo']);
            $consulta = "UPDATE usuarios SET nombre_empleado = '$nombre_empleado', telefono = '$telefono', contrasena = '$contrasena', correo_electronico = '$correo_electronico', activo = $activo";
            $resultado = $mysqli->query($consulta);
            print_r($consulta);
            if(!$resultado){
                ?>
                <script>
                    alert('Error al actualizar tus datos, por favor intenta nuevamente.');
                    window.location.href = 'mi_perfil.php';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Actualización exitosa!');
                    window.location.href = 'mi_perfil.php';
                </script>
                <?php
            }
        } else{
            ?>
            <script>
                window.location.href = 'mi_perfil.php';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            window.location.href = 'login.php';
        </script>
        <?php
    }
?>