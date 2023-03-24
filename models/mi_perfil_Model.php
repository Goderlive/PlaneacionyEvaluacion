<?php
require_once 'conection.php';


function TraeDependencias($con){
    $stm = $con->query("SELECT id_dependencia, nombre_dependencia FROM dependencias ORDER BY nombre_dependencia ASC");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function TraeSubAreas($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM areas WHERE id_dependencia = $id_dependencia ORDER BY nombre_area ASC");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}



function buscacincos($con, $id_usuario){
    $anio = date('Y');
    $sql = "SELECT u.nombre, u.apellidos, u.id_usuario, u.correo_electronico, a.nombre_area FROM usuarios u
            JOIN permisos p ON p.id_usuario = u.id_usuario
            JOIN areas a ON a.id_area = p.id_area
            WHERE u.id_registro = $id_usuario AND p.anio = $anio
    ";
    $stm = $con->query($sql);
    $dependientes = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependientes;
}


function buscacuatros($con, $id_usuario){
    $anio = date('Y');
    $sql = "SELECT u.nombre, u.apellidos, u.id_usuario, u.correo_electronico, d.nombre_dependencia FROM usuarios u
            JOIN permisos p ON p.id_usuario = u.id_usuario
            JOIN dependencias d ON d.id_dependencia = p.id_dependencia
            WHERE u.id_registro = $id_usuario AND p.anio = $anio
    ";
    $stm = $con->query($sql);
    $dependientes = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependientes;
}



function Dependencia($con, $id_dependencia){
    $stm = $con->query("SELECT id_dependencia, nombre_dependencia FROM dependencias WHERE id_dependencia = $id_dependencia");
    $dependencia = $stm->fetch();
    return $dependencia;
}

function Area($con, $id_area){
    $stm = $con->query("SELECT id_area, nombre_area FROM areas WHERE id_area = $id_area");
    $area = $stm->fetch();
    return $area;
}

function TraeUsuario($con, $id_usuario){ // Primero traemos el principal
    $stm = $con->query("SELECT * FROM usuarios WHERE id_usuario = $id_usuario");
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}


if(isset($_POST['registro'])){
    $nombre = $_POST["nombre"];    
    $apellidos = $_POST["apellidos"];    
    $email = $_POST["email"];    
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];

    
    // Cifrar la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellidos, tel, correo_electronico, contrasena) VALUES ('$nombre', '$apellidos', '$telefono', '$email', '$password_hash')";
    
    
    if ($con->query($sql)) {

        $id_usuario = $con->lastInsertId();
        $sql = "INSERT INTO permisos (id_usuario, nivel, anio) VALUES ($id_usuario, 1, '2023')";
        $con->query($sql);
        echo "Usuario registrado correctamente.";
        header("Location: ../login.php");
        exit();
        die();
    } else {
        echo "Error: ";
    }
}



if(isset($_POST['nuevo'])){
    session_start();

    if($_SESSION['sistema'] != "pbrm"){
        header("Location: ../login.php");
    }

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo_electronico = $_POST['correo_electronico'];
    $tel = $_POST['tel'];
    $contrasena = $_POST['contrasena'];

    $id_dependencia = isset($_POST['id_dependencia']) ? $_POST['id_dependencia'] : NULL;
    $id_area = isset($_POST['id_area']) ? $_POST['id_area'] : NULL;
    $id_registrante = $_POST['id_registrante'];

    $password_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    

    if($id_dependencia){
        $nivel = 4;
        try {
            $sql = "INSERT INTO usuarios (nombre, apellidos, correo_electronico, tel, contrasena, id_registro) VALUES ('$nombre','$apellidos','$correo_electronico','$tel','$password_hash',$id_registrante)";
            if($con->query($sql)){
                $id_usuario = $con->lastInsertId();
    
                $anio = date('Y');
                $sql = "INSERT INTO permisos (id_usuario, id_dependencia, nivel, anio) VALUES (?,?,?,?)";
                $sqlr = $con->prepare($sql);
                $sqlr->execute(array($id_usuario, $id_dependencia, $nivel, $anio));
            }
        }catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "Ya existe un registro con el mismo valor en la columna UNIQUE. Por favor, ingrese un valor diferente.";
                sleep(3);
                header("Location: ../mi_perfil.php");
            } else {
                echo "Ocurrió un error al intentar insertar los datos en la base de datos. Por favor, inténtelo de nuevo más tarde.";
                sleep(3);
                header("Location: ../mi_perfil.php");        
            }
        }
    }

    if($id_area){
        $nivel = 5;
        try {
            $sql = "INSERT INTO usuarios (nombre, apellidos, correo_electronico, tel, contrasena, id_registro) VALUES ('$nombre','$apellidos','$correo_electronico','$tel','$password_hash',$id_registrante)";
            if($con->query($sql)){
                $id_usuario = $con->lastInsertId();
    
                $anio = date('Y');
                $sql = "INSERT INTO permisos (id_usuario, id_area, nivel, anio) VALUES (?,?,?,?)";
                $sqlr = $con->prepare($sql);
                $sqlr->execute(array($id_usuario, $id_area, $nivel, $anio));
            }
        }catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "Ya existe un registro con el mismo valor en la columna UNIQUE. Por favor, ingrese un valor diferente.";
                sleep(3);
                header("Location: ../mi_perfil.php");
            } else {
                echo "Ocurrió un error al intentar insertar los datos en la base de datos. Por favor, inténtelo de nuevo más tarde.";
                sleep(3);
                header("Location: ../mi_perfil.php");        
            }
        }
    }
    

            
  
    
    




    header("Location: ../administra_usuarios.php");
   
}

?>