<?php
session_start();
include_once 'models/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["correo_electronico"];
    $password = $_POST["contrasena"];

    if (!empty($email) && !empty($password)) {
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE correo_electronico = ? AND activo = 1");
        if ($stmt->execute([$email])) {
            $usuario = $stmt->fetch();
            if ($usuario && password_verify($password, $usuario["contrasena"])) {
                // Credenciales válidas, redirige al usuario a la página de inicio
                $_SESSION["id_usuario"] = $usuario["id_usuario"];
                $_SESSION["sistema"] = "pbrm";
                $_SESSION['correo_electronico'] = $usuario['correo_electronico'];
                $_SESSION['anio'] = $_POST['anio'];
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error_message'] = 'La contraseña ingresada es incorrecta';
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
