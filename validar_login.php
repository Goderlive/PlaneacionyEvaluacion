<?php
session_start();
include_once 'models/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(strip_tags($_POST["correo_electronico"]));
    $password = htmlspecialchars(strip_tags($_POST["contrasena"]));
    $anio = htmlspecialchars(strip_tags($_POST["anio"]));

    if (!empty($email) && !empty($password)) {
        $sentencia = "SELECT * FROM usuarios u
        JOIN permisos p ON p.id_usuario = u.id_usuario 
        WHERE u.correo_electronico = ? AND u.activo = 1 AND p.anio = ?";
        $stmt = $con->prepare($sentencia);
        if ($stmt->execute(array($email, $anio))) {
            $usuario = $stmt->fetch();
            if ($usuario && password_verify($password, $usuario["contrasena"])) {
                // Credenciales válidas, redirige al usuario a la página de inicio
                $_SESSION["id_usuario"] = $usuario["id_usuario"];
                $_SESSION["sistema"] = "pbrm";
                $_SESSION['correo_electronico'] = $usuario['correo_electronico'];
                $_SESSION['anio'] = $usuario['anio'];
                $_SESSION['inicio_sesion'] = time();
                $_SESSION['nivel'] = $usuario['nivel'];
                $_SESSION['rol'] = ($usuario['rol'] ? $usuario['rol'] : NULL);
                $_SESSION['id_area'] = ($usuario['id_area'] ? $usuario['id_area'] : NULL);
                $_SESSION['id_dependencia'] = ($usuario['id_dependencia'] ? $usuario['id_dependencia'] : NULL);
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error_message'] = 'El email o contraseña son incorrectos';
            }
        } else {
            $_SESSION['error_message'] = 'Error en la consulta de la base de datos';
        }
    } else {
        $_SESSION['error_message'] = 'Ingrese sus datos correctamente';
    }
    header("Location: login.php");
    exit();
}

// Si no es una solicitud POST, redirige al usuario a la página de inicio de sesión
header("Location: login.php");
exit();
?>
