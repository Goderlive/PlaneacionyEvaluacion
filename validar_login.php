<?php
/* if( isset( $_POST['g-recaptcha-response'] ) && $_POST['g-recaptcha-response'] != '' ) {
	$secretKey = "6LfZhsceAAAAAKvH9bKZACZM9L7uG4W3wv3wXObb";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . trim( $_POST['g-recaptcha-response'] ) . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$recaptcha = json_decode( curl_exec($curl), true );
	curl_close($curl); */
	if($_POST) {
		if( isset( $_POST['correo_electronico'] ) && $_POST['correo_electronico'] != '' && isset( $_POST['contrasena'] ) && $_POST['contrasena'] != '' ) {
            include  'conexion.php';
            $consulta = "SELECT * FROM usuarios WHERE correo_electronico = '" . $mysqli->real_escape_string( $_POST['correo_electronico'] ) . "' AND contrasena =  '" . $mysqli->real_escape_string( $_POST['contrasena'] ) . "'";
            $resultado = $mysqli->query($consulta);

            if( $resultado->num_rows > 0 ) {
                $datos = $resultado->fetch_assoc();

                session_start();
                $_SESSION['id_usuario'] = $datos['id_usuario'];
                $_SESSION['correo_electronico'] = $datos['correo_electronico'];
                $_SESSION['id_permiso'] = $datos['id_permiso'];
                $_SESSION['sistema'] = 'pbrm';
                $_SESSION['id_dependencia'] = $datos['id_dependencia'];
                $_SESSION['anio'] = date('Y');
                ?>
                <script>window.location.href = 'index.php';</script>
                <?php
            } else{
                ?>
                <script>
                    alert('Correo o contraseña incorrecto, por favor intenta nuevamente');
                    window.location.href = 'login.php';
                </script>
                <?php
            }
        } else {
            ?>

            <script>
                alert('Error al verificar el Recaptcha por favor intenta nuevamente');
                window.location.href = 'login.php';
            </script>

            <?php
        }
    } else{
        ?>
        <script>
            alert('Error de verificación captcha por favor intenta nuevamente');
            window.location.href = 'login.php';
        </script>
        <?php
    }
/* } */
?>

