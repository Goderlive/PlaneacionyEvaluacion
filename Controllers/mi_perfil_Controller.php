<?php
require_once 'models/mi_perfil_Model.php';

$permiso = permisos($con, $_SESSION['id_usuario']);
$nivel = $permiso['nivel'];


if($permiso['nivel'] == 4){ //Director o coordinador de dependencia, puede agrar avances, evidencia, pedir reconducciones y CREAR USUARIOS. @metepec.
    $id_dependencia = $permiso['id_dependencia'];
    $id_usuario = $_SESSION['id_usuario'];
    $sentencia = "SELECT * FROM usuarios WHERE id_registro = $id_usuario";
}elseif($permiso['nivel'] == 2){ //Validacion de avances, agregar actividades e indicadores, validar reconducciones y mas
    $sentencia = "
    WITH RECURSIVE usuarios_creados AS (
        SELECT id_usuario, nombre, apellidos, correo_electronico, tel, fecha_creacion, id_registro
        FROM usuarios
        WHERE id_registro = $id_usuario
        UNION ALL
        SELECT u.id_usuario, u.nombre, u.apellidos, u.correo_electronico, u.tel, u.fecha_creacion, u.id_registro
        FROM usuarios_creados uc
        JOIN usuarios u ON uc.id_usuario = u.id_registro
      )
      SELECT * FROM usuarios_creados
    ";
}elseif($permiso['nivel'] <= 2){
    $sentencia = "
    WITH RECURSIVE usuarios_creados AS (
        SELECT id_usuario, nombre, apellidos, correo_electronico, tel, fecha_creacion, id_registro
        FROM usuarios
        WHERE id_registro = $id_usuario
        UNION ALL
        SELECT u.id_usuario, u.nombre, u.apellidos, u.correo_electronico, u.tel, u.fecha_creacion, u.id_registro
        FROM usuarios_creados uc
        JOIN usuarios u ON uc.id_usuario = u.id_registro
      )
      SELECT * FROM usuarios_creados
    ";
}




?>