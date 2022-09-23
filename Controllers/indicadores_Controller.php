<?php

require_once 'models/indicadores_Model.php';

function MenuTrimestre($id_dependencia, $this_mes){
    $item = '';
    $trimestre = array("Sin Trimestre", "1er Trimestre", "2do Trimestre", "3er Trimestre", "4to Trimestre");
        for ($i=1; $i < 5; $i++) { 
            $l= $i+1;
            if($i == $this_mes){
                $item .= '<li>
                <form action="indicadores.php" method="POST">
                    <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
                    <button name="trimestre" value="'.$l.'" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">'.$trimestre[$i].'</button>
                </form>
            </li>';
            }else{
                $item .='<li>
                <form action="indicadores.php" method="POST">
                    <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
                    <button name="trimestre" value="'.$l.'" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">'.$trimestre[$i].'</button>
                </form>
            </li>';
            }
        }
    return $item;
}


?>