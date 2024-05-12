<?php 
require_once '../models/inicio_modelo.php';


// Creamos el array de las cuentas a crear (dependencia, correo, pass, nombre completo)
$data = array(
array("Secretaría Particular","marydepaz2030@gmail.com","OR7668","María De Paz López"),
array("Secretaría Técnica","eejm081425@gmail.com","RO4569","ELVIA ELVIRA JIMENEZ MARTINEZ"),
array("Unidad de Transparencia","arevabla16@gmail.com","IO7453","Areli Vásquez Blanquel"),
array("Mejora Regulatoria","olix_oliver@hotmail.com","LL5959","María Olivia Cruz Galindo"),
array("Coordinación de Comunicación Social","janethcaslesh@gmail.com","VD5458","Yesenia Janeth Casimiro Rosales."),
array("Derechos Humanos","coquisduvas@gmail.com","MW7367","Ma. Del Socorro Duarte Vasquez"),
array("Sindicatura","hamshari252629@gmail.com","LZ7478","Hamshari Solis Araujo"),
array("Primera Regiduría","smgl_070@hotmail.com","LM6942","Sandra Margarita Guadarrama Lugo"),
array("Segunda Regiduría","kr_02@live.com.mx","TR4662","María del Carmen Cordoba Cruzalta"),
array("Tercera Regiduría","maricarmensodi_a@hotmail.com","XX7243","Maricarmen Soto Díaz"),
array("Cuarta Regiduría","martindoms2@gmail.com","VT5175","Martín Domínguez Serrano"),
array("Quinta Regiduría","5ta.regiduria@tenancingo.gob.mx","GX5862","virginia elias cruz"),
array("Sexta Regiduría","mar_ceph72@hotmail.com","UI5352","Marcela Padilla Hernández"),
array("Séptima Regiduría","gracielamejiasanchez@hotmail.com","LO5468","Graciela Mejia Sanchez"),
array("Secretaría del Ayuntamiento","jfjues55@gmail.com","AR5554","Janeth Juárez Espejel"),
array("Registro Civil","dioruda03@gmail.com","PE5453","LAURA VERONICA MARCIAL López"),
array("Juzgado Civico","legui1217@hotmail.com","MM9991","Yolanda Leguizamo Martinez"),
array("Dirección de Administración","luis.yevanny@gmail.com","AA5215","Luis Yevanny Arévalo Romero"),
array("Dirección de Obras Públicas","matedeacamilpa@hotmail.com","OP8320","Marcelino Mendoza Marquina"),
array("Dirección de Desarrollo Urbano","romy-153@hotmail.com","DE3010","Ma Rosario Díaz Reynoso"),
array("Dirección de Ecología","tanysnoopy@gmail.com","XI7274","Tania Valeria Aguilar Serrano"),
array("Dirección de Servicios Públicos","servicios.publicos@tenancingo.gob.mx","WB4874","Yuridiana bernal vazquez"),
array("Dirección de Bienestar","lupita.jsrt@gmail.com","WS5666","Edith Guadalupe Ortiz Napoles"),
array("Dirección de Gobernación","jemuy@hotmail.com","VO7165","EMMA MORALES BELTRAN"),
array("Contraloría","rocmlae@hotmail.com","WZ5070","Margarita Romero Cruz"),
array("Tesorería Municipal","adrian.lya1706@gmail.com","YD7047","JULIO CESAR SANCHEZ MARURI"),
array("Consejeria Juridica","manuel.lpz120597@gmail.com","NE7147","Manuel Alberto López López"),
array("Dirección de Desarrollo Economico","marilyiziii@hotmail.com","QK7374","Marili Bustos Vásquez"),
array("Direccion del Campo","ralchavez@hotmail.com","KT5258","Rosa Alcántara Chávez"),
array("Dirección de Educación y Cultura","lilylizethherreratapia@gmail.com","EC0091","Lilián Lizeth Herrera Tapia"),
array("Dirección de Seguridad Pública","liveausmexico@gmail.com","SD7175","Dayro Antonio Sánchez Bautista"),
array("Protección Civil","mcjardonat@hotmail.com","PF7567","Ma del Carmen Jardón Aguirre"),
array("Dirección de Turismo","rosvick15@gmail.com","CF5671","Víctor Fernando Martínez Urbina"),
array("Dirección de Mujeres","villegas.sandya@gmail.com","SC6763","Sandra Maria Villegas Martínez")
);


$sentencia = "SELECT * FROM dependencias";
$stm = $con->query($sentencia);
$dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);



// Recorremos las cuentas
foreach($data as $dd){
    $ffound = 0;
    $porcentaje_nombre = 80;
    $nombre_data = $dd[0];

    foreach($dependencias as $dp){
        $nombre_dependencia = $dp['nombre_dependencia']; 
        similar_text(mb_strtoupper($nombre_data), mb_strtoupper($nombre_dependencia), $porcentaje);
        if ($porcentaje > $porcentaje_nombre) {
            $porcentaje_nombre = $porcentaje;
            $ffound = $dp;
        }
    }
    if($ffound == 0){
        print "No encontrado";
    }
}
