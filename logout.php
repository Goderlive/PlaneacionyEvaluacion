<?php

session_start();

$_SESSION = array();

session_unset();     // Elimina las variables de sesión
session_destroy();   // Destruye la sesión

header("location:index.php");
