<?php
require_once 'conection.php';
function TraerTesoreria($con, $id_tesoreria)
{
    $stm = $con->query("SELECT * FROM setings a 
    JOIN titulares t ON t.id_titular = a.id_tesoreria
    WHERE a.id_tesoreria = $id_tesoreria");
    $tesoreria = $stm->fetch(PDO::FETCH_ASSOC);
    return $tesoreria;
}

function TraerUippe($con, $id_uippe)
{
    $stm = $con->query("SELECT * FROM setings a
    JOIN titulares t ON t.id_titular = a.id_uippe
    WHERE a.id_uippe = $id_uippe");
    $uippe = $stm->fetch(PDO::FETCH_ASSOC);
    return $uippe;
}


function TraeDirectores($con)
{
    $stm = $con->query("SELECT * FROM titulares
    WHERE id_dependencia != ''");
    $titulares = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $titulares;
}

function armaFechas($d1, $m1, $d2, $m2)
{
    $concat = $d1 . "," . $m1 . ";" . $d2 . ',' . $m2;
    return $concat;
}

if ($_POST) {


    if ($_SESSION['sistema'] != 'pbrm') {
        header("Location: ../login.php");
        die();
    }
    $anio = $_SESSION['anio'];

    if (isset($_POST['nombre_municipio']) && isset($_POST['numero_municipio'])) {
        $nombre = $_POST['nombre_municipio'];
        $numero = $_POST['numero_municipio'];
        $sql = "UPDATE setings SET nombre_ente = '$nombre', numero_ente = '$numero' WHERE year_report = $anio";
        $sqlr = $con->prepare($sql);
        $sqlr->execute();
    }


    if (isset($_POST['agregar'])) {
        if (isset($_POST['id_uippe']) && $_POST['id_uippe']) {
            $id_uippe = $_POST['id_uippe'];
            $sql = "UPDATE setings SET id_uippe = $id_uippe WHERE year_report = $anio";
        } elseif (isset($_POST['id_teso']) && $_POST['id_teso']) {
            $id_tesoreria = $_POST['id_teso'];
            $sql = "UPDATE setings SET id_tesoreria = $id_tesoreria WHERE year_report = $anio";
        }
        $sqlr = $con->prepare($sql);
        $sqlr->execute();
        header("Location: ajustes.php");
    }


    if (isset($_POST['delete'])) {
        if (isset($_POST['uippe'])) {
            $quien = "id_uippe";
        } elseif (isset($_POST['id_teso'])) {
            $quien = "id_tesoreria";
            }
        $sql = "UPDATE setings SET $quien = NULL WHERE year_report = $anio";
        $sqlr = $con->prepare($sql);
        $sqlr->execute();
        header("Location: ajustes.php");

    }

    if (isset($_POST['anteproyecto']) || isset($_POST['proyecto']) || isset($_POST['programa'])) {
        $d1 = $_SESSION['anio'];
        $d1 .= (strlen($_POST['mes1'])) < 2 ? "0".$_POST['mes1'] : $_POST['mes1'];  
        $d1 .= (strlen($_POST['dia1'])) < 2 ? "0".$_POST['dia1'] : $_POST['dia1'];

        $d2 = $_SESSION['anio'];
        $d2 .= (strlen($_POST['mes2'])) < 2 ? "0".$_POST['mes2'] : $_POST['mes2'];  
        $d2 .= (strlen($_POST['dia2'])) < 2 ? "0".$_POST['dia2'] : $_POST['dia2'];  

        $date = array("$d1", "$d2");        
        $date = json_encode($date);

        if(isset($_POST['anteproyecto'])){
            $sql = "UPDATE setings SET anteproyectoFechas = '$date' WHERE year_report = $anio";
        }
        if(isset($_POST['proyecto'])){
            $sql = "UPDATE setings SET proyectoFechas = '$date' WHERE year_report = $anio";
        }
        if(isset($_POST['programa'])){
            $sql = "UPDATE setings SET programaAFechas = '$date' WHERE year_report = $anio";
        }



        $sqlr = $con->prepare($sql);
        $sqlr->execute();
    }
    

    if (isset($_POST['logo_principal']) && $_FILES['imagen_principal']['error'] == 0) {
        // Directorio donde se guardarán las imágenes
        $directorioImagenes = 'img/';

        // Ruta completa del archivo
        $rutaCompleta = $directorioImagenes . $_FILES['imagen_principal']['name'];

        // Obtener la extensión del archivo
        $extension = pathinfo($_FILES['imagen_principal']['name'], PATHINFO_EXTENSION);

        // Verificar si la extensión es jpg o png
        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
            // Mover la imagen al directorio de destino
            move_uploaded_file($_FILES['imagen_principal']['tmp_name'], $rutaCompleta);

            // Conexión a la base de datos utilizando PDO


            try {
                // Actualizar el registro en la base de datos
                $idRegistro = 1; // Reemplaza con el ID del registro que deseas actualizar
                $rutaImagenDB = 'img/' . $_FILES['imagen_principal']['name'];

                $consulta = $con->prepare("UPDATE setings SET path_logo_login = :ruta WHERE year_report = :anio");
                $consulta->bindParam(':ruta', $rutaImagenDB);
                $consulta->bindParam(':anio', $anio);
                $consulta->execute();

                echo 'Imagen subida y registro actualizado correctamente.';
            } catch (PDOException $e) {
                echo 'Error al conectar a la base de datos: ' . $e->getMessage();
            }
        } else {
            echo '<script>alert("Formato de archivo no válido. Solo se permiten archivos jpg y png.")</script>';
        }
    }


    if (isset($_POST['escudo']) && $_FILES['escudo_municipio']['error'] == 0) {
        // Directorio donde se guardarán las imágenes
        $directorioImagenes = 'img/';

        // Ruta completa del archivo
        $rutaCompleta = $directorioImagenes . $_FILES['escudo_municipio']['name'];

        // Obtener la extensión del archivo
        $extension = pathinfo($_FILES['escudo_municipio']['name'], PATHINFO_EXTENSION);

        // Verificar si la extensión es jpg o png
        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
            // Mover la imagen al directorio de destino
            move_uploaded_file($_FILES['escudo_municipio']['tmp_name'], $rutaCompleta);

            // Conexión a la base de datos utilizando PDO


            try {
                // Actualizar el registro en la base de datos
                $idRegistro = 1; // Reemplaza con el ID del registro que deseas actualizar
                $rutaImagenDB = 'img/' . $_FILES['escudo_municipio']['name'];

                $consulta = $con->prepare("UPDATE setings SET path_logo_ayuntamiento = :ruta WHERE year_report = :anio");
                $consulta->bindParam(':ruta', $rutaImagenDB);
                $consulta->bindParam(':anio', $anio);
                $consulta->execute();

                echo 'Imagen subida y registro actualizado correctamente.';
            } catch (PDOException $e) {
                echo 'Error al conectar a la base de datos: ' . $e->getMessage();
            }
        } else {
            echo '<script>alert("Formato de archivo no válido. Solo se permiten archivos jpg y png.")</script>';
        }
    }


    if (isset($_POST['logo']) && $_FILES['path_logo_administracion']['error'] == 0) {
        // Directorio donde se guardarán las imágenes
        $directorioImagenes = 'img/';

        // Ruta completa del archivo
        $rutaCompleta = $directorioImagenes . $_FILES['path_logo_administracion']['name'];

        // Obtener la extensión del archivo
        $extension = pathinfo($_FILES['path_logo_administracion']['name'], PATHINFO_EXTENSION);

        // Verificar si la extensión es jpg o png
        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
            // Mover la imagen al directorio de destino
            move_uploaded_file($_FILES['path_logo_administracion']['tmp_name'], $rutaCompleta);

            // Conexión a la base de datos utilizando PDO


            try {
                // Actualizar el registro en la base de datos
                $idRegistro = 1; // Reemplaza con el ID del registro que deseas actualizar
                $rutaImagenDB = 'img/' . $_FILES['path_logo_administracion']['name'];

                $consulta = $con->prepare("UPDATE setings SET path_logo_administracion = :ruta WHERE year_report = :anio");
                $consulta->bindParam(':ruta', $rutaImagenDB);
                $consulta->bindParam(':anio', $anio);
                $consulta->execute();

                echo 'Imagen subida y registro actualizado correctamente.';
            } catch (PDOException $e) {
                echo 'Error al conectar a la base de datos: ' . $e->getMessage();
            }
        } else {
            echo '<script>alert("Formato de archivo no válido. Solo se permiten archivos jpg y png.")</script>';
        }
    }
}
