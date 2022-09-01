<?php
require_once 'models/mi_perfil_Model.php';

$id_permiso = $_SESSION['id_permiso'];


if($id_permiso == 4){
    $id_dependencia = $_SESSION['id_dependencia'];
    $sentencia = "SELECT * FROM usuarios WHERE id_dependencia = $id_dependencia AND id_permiso > $id_permiso AND id_usuario != $id_usuario";
}elseif($id_permiso == 3){
    $id_dependencia = $_SESSION['id_dependencia'];
    $sentencia = "SELECT * FROM usuarios WHERE id_registro = $id_usuario AND id_usuario != $id_usuario";
}elseif($id_permiso == 2){
    $sentencia = "SELECT * FROM usuarios u 
    LEFT JOIN dependencias dp ON dp.id_dependencia = u.id_dependencia
    WHERE id_permiso > $id_permiso AND id_usuario != $id_usuario
    ";
}elseif($id_permiso == 1){
    $sentencia = "SELECT * FROM usuarios u 
    LEFT JOIN dependencias dp ON dp.id_dependencia = u.id_dependencia
    WHERE id_usuario != $id_usuario
    ";
}




?>