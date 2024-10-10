<?php
require_once 'conection.php';



class ActividadesAvancesModel {
    
    private $con;

    public function __construct() {
        global $con;
        $this->con = $con;
    }


    public function ejecutarConsulta($sql, $params = [], $fetchAll = true) {
        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);
        if (stripos($sql, 'SELECT') === 0) {
            return $fetchAll ? $stmt->fetchAll(PDO::FETCH_ASSOC) : $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $stmt->rowCount();
    }


    public function getAvanceModel($mes, $id_actividad) {
        $sql = "SELECT avance FROM avances WHERE mes = :mes AND id_actividad = :id_actividad";
        $params = ['mes' => $mes, 'id_actividad' => $id_actividad ];
        $dato = $this->ejecutarConsulta($sql, $params, false); // Usar fetch
        return $dato;
    }


    public function AvanceTrimestreModel($start, $end, $id_actividad) {
        $sql = "SELECT SUM(avance) as avance 
        FROM avances 
        WHERE mes BETWEEN :start AND :end
        AND id_actividad = :id_actividad";
        $params = ['start' => $start, 'end' => $end, 'id_actividad' => $id_actividad ];
        $dato = $this->ejecutarConsulta($sql, $params, false); // Usar fetch
        return $dato;
    }


    public function modelAvanceAcumulado($mes, $id_actividad){
        $sql = "SELECT SUM(avance) as avance 
        FROM avances 
        WHERE mes BETWEEN 1 AND :mes
        AND id_actividad = :id_actividad";
        $params = ['mes' => $mes, 'id_actividad' => $id_actividad ];
        $dato = $this->ejecutarConsulta($sql, $params, false); // Usar fetch
        return $dato;
    }
}