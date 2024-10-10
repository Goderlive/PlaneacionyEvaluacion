<?php
// Esta clase nos permite usar codificaciones

class CodificadorDecodificadorURLS
{
    private $clave = "uippe2224";

    public function codificar($id_area)
    {
        $obfuscated_area_id = $this->clave . $id_area; // Añadir prefijo o sufijo
        $encoded_area = base64_encode($obfuscated_area_id); // Codificar el resultado
        echo $encoded_area; // Regresa el resultado
    }

    public function decodificar($encoded_area)
    {
        $obfuscated_area_id = base64_decode($encoded_area);
        $id_area = str_replace($this->clave, '', $obfuscated_area_id); // Eliminar el prefijo
        return $id_area;
    }
}
