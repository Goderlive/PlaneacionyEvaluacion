<?php
require_once 'models/mi_perfil_Model.php';

$permiso = permisos($con, $_SESSION['id_usuario']);
$nivel = $permiso['nivel'];


if($permiso['nivel'] == 4){ //Director o coordinador de dependencia, puede agrar avances, evidencia, pedir reconducciones y CREAR USUARIOS. @metepec.
    $id_dependencia = $permiso['id_dependencia'];
    $sentencia = "SELECT * FROM usuarios WHERE id_dependencia = $id_dependencia AND id_permiso > $nivel AND id_usuario != $id_usuario";
}elseif($permiso['nivel'] == 2){ //Validacion de avances, agregar actividades e indicadores, validar reconducciones y mas
    $sentencia = "SELECT * FROM usuarios u 
    LEFT JOIN dependencias dp ON dp.id_dependencia = u.id_dependencia
    WHERE id_permiso > $nivel AND id_usuario != $id_usuario
    ";
}elseif($permiso['nivel'] == 1){
    $sentencia = "SELECT * FROM usuarios u 
    LEFT JOIN dependencias dp ON dp.id_dependencia = u.id_dependencia
    WHERE id_usuario != $id_usuario
    ";
}




?>