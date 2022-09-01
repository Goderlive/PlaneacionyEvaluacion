<?php
    session_start();
    if($_SESSION['sistema'] == 'pbrm'){
        if(isset($_POST['actualizar'])){
            include 'conexion.php';
            $nombre = $mysqli->real_escape_string($_POST['nombre']);
            $apellido = $mysqli->real_escape_string($_POST['apellidos']);
            $telefono = $mysqli->real_escape_string($_POST['telefono']);
            $contrasena = $mysqli->real_escape_string($_POST['contrasena']);
            $correo_electronico = $mysqli->real_escape_string($_POST['correo_electronico']);
            $consulta = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellido', tel = '$telefono', contrasena = '$contrasena', correo_electronico = '$correo_electronico'";
            $resultado = $mysqli->query($consulta);
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