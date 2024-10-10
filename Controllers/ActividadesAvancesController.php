<?php
require_once 'models/ActividadesAvancesModel.php';

class ActividadesAvances
{
    public $id_actividad;
    public $numero;
    public $nombre;
    public $programado_anual;
    public $unidad;
    public $nombre_unidad;
    public $nombre_unidad_old;
    private $meses_prog_nombre = [];
    private $meses_prog_numero = [];
    private $ActividadesAvancesModel;


    public function __construct($actividad)
    {
        $this->id_actividad = $actividad['id_actividad'];
        $this->ActividadesAvancesModel = new ActividadesAvancesModel();
        $this->numero = $actividad['codigo_actividad'];
        $this->nombre = $actividad['nombre_actividad'];

        // Sumar los valores de cada mes para el campo programado_anual
        $this->programado_anual = $actividad['enero'] + $actividad['febrero'] + $actividad['marzo'] + $actividad['abril'] + $actividad['mayo'] + $actividad['junio'] + $actividad['julio'] + $actividad['agosto'] + $actividad['septiembre'] + $actividad['octubre'] + $actividad['noviembre'] + $actividad['diciembre'];

        // Guardar unidad y nombre_unidad
        $this->unidad = $actividad['id_unidad'];
        $this->nombre_unidad = $actividad['nombre_unidad'];
        $this->nombre_unidad_old = $actividad['unidad'];

        $this->meses_prog_nombre = [
            'enero' => $actividad['enero'],
            'febrero' => $actividad['febrero'],
            'marzo' => $actividad['marzo'],
            'abril' => $actividad['abril'],
            'mayo' => $actividad['mayo'],
            'junio' => $actividad['junio'],
            'julio' => $actividad['julio'],
            'agosto' => $actividad['agosto'],
            'septiembre' => $actividad['septiembre'],
            'octubre' => $actividad['octubre'],
            'noviembre' => $actividad['noviembre'],
            'diciembre' => $actividad['diciembre']
        ];

        $this->meses_prog_numero = [
            1 => $actividad['enero'],
            2 => $actividad['febrero'],
            3 => $actividad['marzo'],
            4 => $actividad['abril'],
            5 => $actividad['mayo'],
            6 => $actividad['junio'],
            7 => $actividad['julio'],
            8 => $actividad['agosto'],
            9 => $actividad['septiembre'],
            10 => $actividad['octubre'],
            11 => $actividad['noviembre'],
            12 => $actividad['diciembre']
        ];
    }

    // Método para obtener la unidad
    public function getUnidad()
    {
        // Si la actividad tiene un id_unidad definido, usamos el nombre_unidad
        if (!empty($this->unidad)) {
            return $this->nombre_unidad;
        } else {
            // Si no tiene, se usa la unidad que esté disponible
            return $this->nombre_unidad_old;
        }
    }

    public function getMesProgramacion($mes)
    {
        return $this->meses_prog_numero[$mes];
    }

    public function getTrimestreProgramacion($mes) {
        // Validar que el mes sea un número válido entre 1 y 12
        if ($mes < 1 || $mes > 12) {
            return null; // Manejar el caso donde el mes no es válido
        }
        $total = 0; // Inicializar la variable $total
        if ($mes >= 1 && $mes <= 3) { // Primer trimestre (enero, febrero, marzo)
            $total = $this->meses_prog_numero[1] + $this->meses_prog_numero[2] + $this->meses_prog_numero[3];
        }
        elseif ($mes >= 4 && $mes <= 6) { // Segundo trimestre (abril, mayo, junio)
            $total = $this->meses_prog_numero[4] + $this->meses_prog_numero[5] + $this->meses_prog_numero[6];
        }
        elseif ($mes >= 7 && $mes <= 9) { // Tercer trimestre (julio, agosto, septiembre)
            $total = $this->meses_prog_numero[7] + $this->meses_prog_numero[8] + $this->meses_prog_numero[9];
        }
        else { // Cuarto trimestre (octubre, noviembre, diciembre)
            $total = $this->meses_prog_numero[10] + $this->meses_prog_numero[11] + $this->meses_prog_numero[12];
        }
        return $total; // Retornar el total sumado del trimestre
    }

    public function getAcumuladoProgramacion($mes){
        $total = 0;
        for ($i=1; $i <= $mes; $i++) { 
            $total += $this->meses_prog_numero[$i];
        }
        return $total;
    }

    public function getAvance($mes){
        $cantidad = $this->ActividadesAvancesModel->getAvanceModel($mes, $this->id_actividad);
        if($cantidad){
            return $cantidad['avance'];
        }else{
            return "-";
        }
    }


    public function getAvanceTrimestre($mes){

        if ($mes >= 1 && $mes <= 3) { // Primer trimestre (enero, febrero, marzo)
            $start = 1;
            $end = 3;
        }elseif ($mes >= 4 && $mes <= 6) { // Segundo trimestre (abril, mayo, junio)
            $start = 4;
            $end = 6;
        }elseif ($mes >= 7 && $mes <= 9) { // Tercer trimestre (julio, agosto, septiembre)
            $start = 7;
            $end = 9;
        }else { // Cuarto trimestre (octubre, noviembre, diciembre)
            $start = 10;
            $end = 12;
        }

        $cantidad = $this->ActividadesAvancesModel->AvanceTrimestreModel($start, $end, $this->id_actividad);
        if($cantidad){
            return $cantidad['avance'];
        }else{
            return "-";
        }
    }


    public function getAvanceAcumulado($mes){
        $avance = $this->ActividadesAvancesModel->modelAvanceAcumulado($mes, $this->id_actividad);
        if($avance){
            return $avance['avance'];
        }else{
            return '-';
        }
    }

    
}

?>