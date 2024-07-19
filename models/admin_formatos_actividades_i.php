<?php 
require_once 'conection.php';

function traeporDependenciasytrim($con, $id_dependencia, $trimestre){
    $stm = $con->query("SELECT * FROM firmadosIndicadores WHERE id_dependencia = $id_dependencia AND trimestre = $trimestre");
    $formatos = $stm->fetch(PDO::FETCH_ASSOC);
    return $formatos;
}

function TraeDependencias($con, $year){
    $sentencia = "SELECT * FROM dependencias WHERE anio = $year ";
    $stm = $con->query($sentencia);
    $dependenciasyareas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependenciasyareas;
}



if(isset($_POST['subida'])){
    if(!$_SESSION || $_SESSION['sistema'] != 'pbrm'){
        header("Location: ../index.php");
    }
    if ($_FILES['file_input']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file_input']['name'];
        $file_tmp = $_FILES['file_input']['tmp_name'];
        $file_size = $_FILES['file_input']['size'];
    
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_ext !== 'pdf') {
            echo "Solo se permiten archivos PDF.";
            exit;
        }
    
        $trimestre = $_POST['trimestre'];
        $id_dependencia = $_POST['id_dependencia'];
    
        $year = date('Y');
        $upload_dir = "archivos/$year/$id_dependencia/$trimestre";
    
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
    
        if (move_uploaded_file($file_tmp, $upload_dir . '/' . $file_name)) {
            try {
                $file_path = $upload_dir . '/' . $file_name;
    
                $query = "INSERT INTO firmadosindicadores (dir_formatoindicador, id_dependencia, trimestre)
                          VALUES (?, ?, ?)";
    
                $stmt = $con->prepare($query);
                $stmt->bindParam(1, $file_path);
                $stmt->bindParam(2, $id_dependencia);
                $stmt->bindParam(3, $trimestre);
    
                if ($stmt->execute()) {
                    echo "<script>window.location.href = 'admin_formatos_actividades_i.php';</script>";
                    exit;
                } else {
                    echo "Error al ejecutar la consulta: " . $stmt->errorInfo()[2];
                }
            } catch (PDOException $e) {
                echo "Error al conectar a la base de datos: " . $e->getMessage();
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Error al cargar el archivo: " . $_FILES['file_input']['error'];
    }
}
?>