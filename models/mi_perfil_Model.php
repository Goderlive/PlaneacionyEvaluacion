<?php
require_once 'conection.php';


function TraeAreas($con){
    $stm = $con->query("SELECT id_dependencia, nombre_dependencia FROM dependencias");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function TraeUsuario($con, $id_usuario){ // Primero traemos el principal
    $stm = $con->query("SELECT * FROM usuarios WHERE id_usuario = $id_usuario");
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}


function BuscaDependientes($con, $sentencia){
    $stm = $con->query($sentencia);
    $dependientes = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependientes;
}

if(isset($_POST['nuevo'])){
    session_start();
    if($_SESSION['sistema'] != "pbrm"){
        header("Location: ../login.php");
    }


    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $id_permiso = $_POST['id_permiso'];
    $correo_electronico = $_POST['correo_electronico'];
    $tel = $_POST['tel'];
    $contrasena = $_POST['contrasena'];
    $id_dependencia = $_POST['id_dependencia'];
    $id_registrante = $_POST['id_registrante'];


    $sql = "INSERT INTO usuarios (nombre, apellidos, id_permiso, correo_electronico, tel, contrasena, id_dependencia, id_registro) VALUES (?,?,?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($nombre,$apellidos,$id_permiso,$correo_electronico,$tel,$contrasena,$id_dependencia,$id_registrante));

    header("Location: ../mi_perfil.php");
   
}

?>