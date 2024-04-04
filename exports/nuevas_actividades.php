<?php


require_once '../models/conection.php';
$excel = array(
    array("A00", "100", "010301010201", "Secretaría Particular"),
    array("A00", "101", "010502050108", "Secretaría Técnica"),
    array("A00", "101", "010805010103", "Secretaría Técnica"),
    array("A00", "108", "010309030101", "Oficialía Mediadora - Conciliadora"),
    array("A00", "113", "010301010101", "Cronista Municipal"),
    array("A00", "122", "010804010101", "Unidad de Transparencia"),
    array("A00", "137", "010502060401", "Simplificación Administrativa"),
    array("A00", "A00", "010301010101", "PRESIDENCIA"),
    array("A01", "103", "010803010103", "Comunicación Social"),
    array("A02", "102", "010204010101", "Derechos Humanos"),
    array("A02", "102", "010204010102", "Derechos Humanos"),
    array("B00", "B01", "010304010101", "Sindicatura"),
    array("C01", "C01", "010309020101", "Regiduría I"),
    array("C02", "C02", "010309020101", "Regiduría II"),
    array("C03", "C03", "010309020101", "Regiduría III"),
    array("C04", "C04", "010309020101", "Regiduría IV"),
    array("C05", "C05", "010309020101", "Regiduría V"),
    array("C06", "C06", "010309020101", "Regiduría VI"),
    array("C07", "C07", "010309020101", "Regiduría VII"),
    array("D00", "109", "010801010301", "Registro Civil"),
    array("D00", "111", "010302010103", "Coordinación de Delegaciones"),
    array("D00", "112", "010302010103", "Participación Ciudadana"),
    array("D00", "114", "010502060301", "Control Patrimonial"),
    array("D00", "143", "020608060201", "Atención a la Juventud"),
    array("D00", "143", "020608060202", "Atención a la Juventud"),
    array("D00", "143", "020608060102", "Atención a la Juventud"),
    array("D00", "143", "020608060103", "Atención a la Juventud"),
    array("D00", "148", "010302010103", "Servicio Militar Municipal"),
    array("D00", "164", "010309030101", "Oficialía Calificadora"),
    array("D00", "D00", "010309020101", "SECRETARÍA DEL AYUNTAMIENTO"),
    array("E00", "120", "010502060102", "Administración y Desarrollo de Personal"),
    array("E00", "121", "010502060201", "Recursos Materiales"),
    array("E00", "E00", "010502060101", "ADMINISTRACIÓN"),
    array("F00", "107", "020201010502", "Obras Públicas"),
    array("F00", "124", "020103010101", "Obras Públicas"),
    array("F00", "124", "020201010301", "Obras Públicas"),
    array("F00", "124", "020201010401", "Obras Públicas"),
    array("F00", "124", "020201010202", "Obras Públicas"),
    array("F00", "124", "020201010302", "Obras Públicas"),
    array("F00", "124", "020201010402", "Obras Públicas"),
    array("F00", "124", "020201010203", "Obras Públicas"),
    array("F00", "124", "020201010303", "Obras Públicas"),
    array("F00", "124", "020201010503", "Obras Públicas"),
    array("F00", "124", "020203010201", "Obras Públicas"),
    array("F00", "124", "020204010201", "Obras Públicas"),
    array("F00", "136", "030305010103", "Obras Públicas"),
    array("F00", "F00", "020201010503", "DESARROLLO URBANO Y OBRAS PÚBLICAS"),
    array("F01", "123", "010308010202", "Desarrollo Urbano"),
    array("F01", "F01", "010308010201", "Desarrollo Urbano y Servicios Públicos"),
    array("G00", "160", "020104010301", "Prevención y Control Ambiental"),
    array("G00", "160", "020104010501", "Prevención y Control Ambiental"),
    array("G00", "160", "020104010202", "Prevención y Control Ambiental"),
    array("G00", "160", "020104010302", "Prevención y Control Ambiental"),
    array("G00", "160", "020104010502", "Prevención y Control Ambiental"),
    array("G00", "G00", "020105010201", "ECOLOGÍA"),
    array("G00", "G00", "020105010101", "ECOLOGÍA"),
    array("G00", "G00", "020105010302", "ECOLOGÍA"),
    array("H00", "126", "020101010102", "Limpia"),
    array("H00", "127", "020204010201", "Alumbrado Público"),
    array("H00", "128", "020206010301", "Parques y Jardines"),
    array("H00", "128", "020206010302", "Parques y Jardines"),
    array("H00", "H00", "020101010101", "SERVICIOS PÚBLICOS"),
    array("I01", "129", "020301010203", "Antirrábico"),
    array("I01", "139", "020608030102", "Control Social"),
    array("I01", "153", "020301010201", "Atención a la Salud"),
    array("I01", "153", "020301010101", "Atención a la Salud"),
    array("I01", "153", "020301010102", "Atención a la Salud"),
    array("I01", "166", "020202010102", "Programas Sociales"),
    array("I01", "I01", "020202010101", "Desarrollo Social"),
    array("J00", "144", "020206010101", "Gobernación"),
    array("K00", "161", "010304020201", "Unidad Substanciadora y Resolutora"),
    array("K00", "162", "010304020204", "Unidad Investigadora"),
    array("K00", "K00", "010304010101", "CONTRALORÍA"),
    array("K00", "K00", "010304010102", "CONTRALORÍA"),
    array("K00", "K00", "010304020101", "CONTRALORÍA"),
    array("K00", "K00", "010304020202", "CONTRALORÍA"),
    array("L00", "115", "010502020101", "Ingresos"),
    array("L00", "116", "010502050203", "Egresos"),
    array("L00", "116", "040201010104", "Egresos"),
    array("L00", "116", "040401010101", "Egresos"),
    array("L00", "118", "010801020201", "Catastro Municipal"),
    array("L00", "119", "010502050203", "Contabilidad"),
    array("L00", "L00", "010502020401", "TESORERÍA"),
    array("M00", "155", "010305010105", "Área Jurídica"),
    array("N00", "132", "030402010103", "Desarrollo Comercial y de Servicios"),
    array("N00", "140", "030102010301", "Servicio Municipal de Empleo"),
    array("N00", "140", "030102010202", "Servicio Municipal de Empleo"),
    array("N00", "140", "030102010203", "Servicio Municipal de Empleo"),
    array("N00", "146", "020206010303", "Rastro"),
    array("N00", "147", "020206010304", "Mercados"),
    array("N00", "N00", "030402010102", "DIRECCIÓN DE DESARROLLO ECONÓMICO"),
    array("N01", "130", "030201010201", "Desarrollo Agricola y Ganadero"),
    array("N01", "130", "030203010102", "Desarrollo Agricola y Ganadero"),
    array("N01", "130", "030203010103", "Desarrollo Agricola y Ganadero"),
    array("N01", "N01", "030201020201", "Desarrollo Agropecuario"),
    array("N01", "N01", "030201030105", "Desarrollo Agropecuario"),
    array("N01", "N01", "030201040104", "Desarrollo Agropecuario"),
    array("O00", "141", "020502010105", "Educación  "),
    array("O00", "141", "020503010105", "Educación  "),
    array("O00", "150", "020402010101", "Cultura"),
    array("O00", "O00", "020501010106", "EDUCACIÓN CULTURAL Y BIENESTAR SOCIAL"),
    array("O00", "O00", "020505010101", "EDUCACIÓN CULTURAL Y BIENESTAR SOCIAL"),
    array("Q00", "104", "010701010101", "Seguridad Pública"),
    array("Q00", "104", "010701010107", "Seguridad Pública"),
    array("Q00", "159", "010704010101", "Secretaría Técnica de Seguridad Pública"),
    array("Q00", "Q00", "010701010102", "SEGURIDAD PÚBLICA Y TRÁNSITO"),
    array("Q00", "Q00", "010701010103", "SEGURIDAD PÚBLICA Y TRÁNSITO"),
    array("S00", "165", "010502050107", "Planeación"),
    array("T00", "105", "010702010201", "Coordinación Municipal de Protección Civil"),
    array("T00", "105", "010702010101", "Coordinación Municipal de Protección Civil"),
    array("T00", "105", "010702010102", "Coordinación Municipal de Protección Civil"),
    array("T00", "105", "010702010202", "Coordinación Municipal de Protección Civil"),
    array("T00", "105", "010702010103", "Coordinación Municipal de Protección Civil"),
    array("U00", "133", "030903010202", "Fomento Artesanal"),
    array("U00", "133", "030903010102", "Fomento Artesanal"),
    array("U00", "U00", "030701010101", "TURISMO"),
    array("U00", "U00", "030701010201", "TURISMO"),
    array("U00", "U00", "030701010102", "TURISMO"),
    array("V00", "152", "020608050101", "Atención a la Mujer"),
    array("V00", "152", "020608050102", "Atención a la Mujer"),
    array("V00", "152", "020608050104", "Atención a la Mujer"),
);







$cero1a = array(
    array("A02", "102", "01", "02", "04", "01", "01", "01"),
    array("A02", "102", "01", "02", "04", "01", "01", "02"),
    array("A00", "113", "01", "03", "01", "01", "01", "01"),
    array("A00", "A00", "01", "03", "01", "01", "01", "01"),
    array("A00", "100", "01", "03", "01", "01", "02", "01"),
    array("D00", "111", "01", "03", "02", "01", "01", "03"),
    array("D00", "112", "01", "03", "02", "01", "01", "03"),
    array("D00", "148", "01", "03", "02", "01", "01", "03"),
    array("B01", "B01", "01", "03", "04", "01", "01", "01"),
    array("K00", "K00", "01", "03", "04", "01", "01", "01"),
    array("K00", "K00", "01", "03", "04", "01", "01", "02"),
    array("K00", "K00", "01", "03", "04", "02", "01", "01"),
    array("K00", "161", "01", "03", "04", "02", "02", "01"),
    array("K00", "K00", "01", "03", "04", "02", "02", "02"),
    array("K00", "162", "01", "03", "04", "02", "02", "04"),
    array("M00", "155", "01", "03", "05", "01", "01", "05"),
    array("M00", "M00", "01", "03", "05", "01", "01", "05"),
    array("F01", "F01", "01", "03", "08", "01", "02", "01"),
    array("F01", "123", "01", "03", "08", "01", "02", "02"),
    array("C01", "C01", "01", "03", "09", "02", "01", "01"),
    array("C02", "C02", "01", "03", "09", "02", "01", "01"),
    array("C03", "C03", "01", "03", "09", "02", "01", "01"),
    array("C04", "C04", "01", "03", "09", "02", "01", "01"),
    array("C05", "C05", "01", "03", "09", "02", "01", "01"),
    array("C06", "C06", "01", "03", "09", "02", "01", "01"),
    array("C07", "C07", "01", "03", "09", "02", "01", "01"),
    array("D00", "D00", "01", "03", "09", "02", "01", "01"),
    array("D00", "164", "01", "03", "09", "03", "01", "01"),
    array("L00", "115", "01", "05", "02", "02", "01", "01"),
    array("L00", "L00", "01", "05", "02", "02", "04", "01"),
    array("A00", "101", "01", "05", "02", "05", "01", "08"),
    array("L00", "165", "01", "05", "02", "05", "01", "07"),
    array("S00", "165", "01", "05", "02", "05", "01", "07"),
    array("L00", "116", "01", "05", "02", "05", "02", "03"),
    array("L00", "119", "01", "05", "02", "05", "02", "03"),
    array("E00", "E00", "01", "05", "02", "06", "01", "01"),
    array("E00", "120", "01", "05", "02", "06", "01", "02"),
    array("E00", "121", "01", "05", "02", "06", "02", "01"),
    array("D00", "114", "01", "05", "02", "06", "03", "01"),
    array("A00", "137", "01", "05", "02", "06", "04", "01"),
    array("Q00", "104", "01", "07", "01", "01", "01", "01"),
    array("Q00", "Q00", "01", "07", "01", "01", "01", "01"),
    array("Q00", "Q00", "01", "07", "01", "01", "01", "02"),
    array("Q00", "Q00", "01", "07", "01", "01", "01", "03"),
    array("T00", "105", "01", "07", "02", "01", "01", "01"),
    array("T00", "105", "01", "07", "02", "01", "01", "02"),
    array("T00", "105", "01", "07", "02", "01", "01", "03"),
    array("T00", "105", "01", "07", "02", "01", "02", "01"),
    array("T00", "105", "01", "07", "02", "01", "02", "02"),
    array("Q00", "159", "01", "07", "04", "01", "01", "01"),
    array("D00", "109", "01", "08", "01", "01", "03", "01"),
    array("L00", "118", "01", "08", "01", "02", "02", "01"),
    array("A01", "103", "01", "08", "03", "01", "01", "03"),
    array("A00", "122", "01", "08", "04", "01", "01", "01"),
    array("A00", "101", "01", "08", "05", "01", "01", "03"),
    array("H00", "H00", "02", "01", "01", "01", "01", "01"),
    array("H00", "126", "02", "01", "01", "01", "01", "02"),
    array("F00", "124", "02", "01", "03", "01", "01", "01"),
    array("G00", "160", "02", "01", "04", "01", "02", "02"),
    array("G00", "160", "02", "01", "04", "01", "03", "01"),
    array("G00", "160", "02", "01", "04", "01", "03", "02"),
    array("G00", "160", "02", "01", "04", "01", "05", "01"),
    array("G00", "160", "02", "01", "04", "01", "05", "02"),
    array("G00", "G00", "02", "01", "05", "01", "01", "01"),
    array("G00", "G00", "02", "01", "05", "01", "01", "02"),
    array("G00", "G00", "02", "01", "05", "01", "02", "01"),
    array("G00", "G00", "02", "01", "05", "01", "03", "02"),
    array("F00", "124", "02", "02", "01", "01", "02", "01"),
    array("F00", "124", "02", "02", "01", "01", "02", "02"),
    array("F00", "124", "02", "02", "01", "01", "02", "03"),
    array("F00", "124", "02", "02", "01", "01", "03", "01"),
    array("F00", "124", "02", "02", "01", "01", "03", "02"),
    array("F00", "124", "02", "02", "01", "01", "03", "03"),
    array("F00", "124", "02", "02", "01", "01", "04", "01"),
    array("F00", "107", "02", "02", "01", "01", "05", "02"),
    array("F00", "F00", "02", "02", "01", "01", "05", "03"),
    array("I01", "I01", "02", "02", "02", "01", "01", "01"),
    array("I01", "166", "02", "02", "02", "01", "01", "02"),
    array("F00", "124", "02", "02", "03", "01", "02", "01"),
    array("F00", "124", "02", "02", "04", "01", "02", "01"),
    array("H00", "127", "02", "02", "04", "01", "02", "01"),
    array("J00", "144", "02", "02", "06", "01", "01", "01"),
    array("J00", "J00", "02", "02", "06", "01", "01", "01"),
    array("H00", "128", "02", "02", "06", "01", "03", "01"),
    array("H00", "128", "02", "02", "06", "01", "03", "02"),
    array("N00", "146", "02", "02", "06", "01", "03", "03"),
    array("N00", "132", "02", "02", "06", "01", "03", "04"),
    array("N00", "147", "02", "02", "06", "01", "03", "04"),
    array("I01", "129", "02", "03", "01", "01", "01", "01"),
    array("I01", "153", "02", "03", "01", "01", "01", "01"),
    array("I01", "153", "02", "03", "01", "01", "01", "02"),
    array("I01", "129", "02", "03", "01", "01", "02", "01"),
    array("I01", "153", "02", "03", "01", "01", "02", "01"),
    array("I01", "129", "02", "03", "01", "01", "02", "03"),
    array("O00", "150", "02", "04", "02", "01", "01", "01"),
    array("O00", "O00", "02", "05", "01", "01", "01", "06"),
    array("O00", "141", "02", "05", "02", "01", "01", "06"),
    array("O00", "141", "02", "05", "03", "01", "01", "05"),
    array("O00", "O00", "02", "05", "05", "01", "01", "01"),
    array("I01", "139", "02", "06", "08", "03", "01", "02"),
    array("V00", "152", "02", "06", "08", "05", "01", "01"),
    array("V00", "152", "02", "06", "08", "05", "01", "02"),
    array("V00", "152", "02", "06", "08", "05", "01", "04"),
    array("D00", "143", "02", "06", "08", "06", "01", "02"),
    array("D00", "143", "02", "06", "08", "06", "01", "03"),
    array("D00", "143", "02", "06", "08", "06", "02", "01"),
    array("D00", "143", "02", "06", "08", "06", "02", "02"),
    array("N00", "140", "03", "01", "02", "01", "02", "02"),
    array("N00", "140", "03", "01", "02", "01", "02", "03"),
    array("N00", "140", "03", "01", "02", "01", "03", "01"),
    array("N01", "130", "03", "02", "01", "01", "02", "01"),
    array("N01", "N01", "03", "02", "01", "02", "02", "01"),
    array("N01", "N01", "03", "02", "01", "03", "01", "05"),
    array("N01", "N01", "03", "02", "01", "04", "01", "04"),
    array("N01", "130", "03", "02", "03", "01", "01", "02"),
    array("N01", "130", "03", "02", "03", "01", "01", "03"),
    array("F00", "136", "03", "03", "05", "01", "01", "03"),
    array("N00", "N00", "03", "04", "02", "01", "01", "02"),
    array("N00", "132", "03", "04", "02", "01", "01", "03"),
    array("U00", "U00", "03", "07", "01", "01", "01", "01"),
    array("U00", "U00", "03", "07", "01", "01", "01", "02"),
    array("U00", "U00", "03", "07", "01", "01", "02", "01"),
    array("U00", "133", "03", "09", "03", "01", "01", "02"),
    array("U00", "133", "03", "09", "03", "01", "02", "02"),
    array("L00", "116", "04", "02", "01", "01", "01", "04"),
    array("L00", "116", "04", "04", "01", "01", "01", "01"),
);

$armado = array(
    array("A00","100","010301010201","Secretaría Particular"),
    array("A00","101","010502050108","Secretaría Técnica"),
    array("A00","101","010805010103","Secretaría Técnica"),
    array("A00","113","010301010101","Cronista Municipal"),
    array("A00","122","010804010101","Unidad de Transparencia"),
    array("A00","137","010502060401","Simplificación Administrativa"),
    array("A00","A00","010301010101","PRESIDENCIA"),
    array("A01","103","010803010103","Comunicación Social"),
    array("A02","102","010204010101","Derechos Humanos"),
    array("A02","102","010204010102","Derechos Humanos"),
    array("B01","B01","010304010101",""),
    array("C01","C01","010309020101","Regiduría I"),
    array("C02","C02","010309020101","Regiduría II"),
    array("C03","C03","010309020101","Regiduría III"),
    array("C04","C04","010309020101","Regiduría IV"),
    array("C05","C05","010309020101","Regiduría V"),
    array("C06","C06","010309020101","Regiduría VI"),
    array("C07","C07","010309020101","Regiduría VII"),
    array("D00","109","010801010301","Registro Civil"),
    array("D00","111","010302010103","Coordinación de Delegaciones"),
    array("D00","112","010302010103","Participación Ciudadana"),
    array("D00","114","010502060301","Control Patrimonial"),
    array("D00","143","020608060102","Atención a la Juventud"),
    array("D00","143","020608060103","Atención a la Juventud"),
    array("D00","143","020608060201","Atención a la Juventud"),
    array("D00","143","020608060202","Atención a la Juventud"),
    array("D00","148","010302010103","Servicio Militar Municipal"),
    array("D00","164","010309030101","Oficialía Calificadora"),
    array("D00","D00","010309020101","SECRETARÍA DEL AYUNTAMIENTO"),
    array("E00","120","010502060102","Administración y Desarrollo de Personal"),
    array("E00","121","010502060201","Recursos Materiales"),
    array("E00","E00","010502060101","ADMINISTRACIÓN"),
    array("F00","107","020201010502","Obras Públicas"),
    array("F00","124","020103010101","Obras Públicas"),
    array("F00","124","020201010201",""),
    array("F00","124","020201010202","Obras Públicas"),
    array("F00","124","020201010203","Obras Públicas"),
    array("F00","124","020201010301","Obras Públicas"),
    array("F00","124","020201010302","Obras Públicas"),
    array("F00","124","020201010303","Obras Públicas"),
    array("F00","124","020201010401","Obras Públicas"),
    array("F00","124","020203010201","Obras Públicas"),
    array("F00","124","020204010201","Obras Públicas"),
    array("F00","136","030305010103","Obras Públicas"),
    array("F00","F00","020201010503","DESARROLLO URBANO Y OBRAS PÚBLICAS"),
    array("F01","123","010308010202","Desarrollo Urbano"),
    array("F01","F01","010308010201","Desarrollo Urbano y Servicios Públicos"),
    array("G00","160","020104010202","Prevención y Control Ambiental"),
    array("G00","160","020104010301","Prevención y Control Ambiental"),
    array("G00","160","020104010302","Prevención y Control Ambiental"),
    array("G00","160","020104010501","Prevención y Control Ambiental"),
    array("G00","160","020104010502","Prevención y Control Ambiental"),
    array("G00","G00","020105010101","ECOLOGÍA"),
    array("G00","G00","020105010102",""),
    array("G00","G00","020105010201","ECOLOGÍA"),
    array("G00","G00","020105010302","ECOLOGÍA"),
    array("H00","126","020101010102","Limpia"),
    array("H00","127","020204010201","Alumbrado Público"),
    array("H00","128","020206010301","Parques y Jardines"),
    array("H00","128","020206010302","Parques y Jardines"),
    array("H00","H00","020101010101","SERVICIOS PÚBLICOS"),
    array("I01","129","020301010101",""),
    array("I01","129","020301010201",""),
    array("I01","129","020301010203","Antirrábico"),
    array("I01","139","020608030102","Control Social"),
    array("I01","153","020301010101","Atención a la Salud"),
    array("I01","153","020301010102","Atención a la Salud"),
    array("I01","153","020301010201","Atención a la Salud"),
    array("I01","166","020202010102","Programas Sociales"),
    array("I01","I01","020202010101","Desarrollo Social"),
    array("J00","144","020206010101","Gobernación"),
    array("J00","J00","020206010101",""),
    array("K00","161","010304020201","Unidad Substanciadora y Resolutora"),
    array("K00","162","010304020204","Unidad Investigadora"),
    array("K00","K00","010304010101","CONTRALORÍA"),
    array("K00","K00","010304010102","CONTRALORÍA"),
    array("K00","K00","010304020101","CONTRALORÍA"),
    array("K00","K00","010304020202","CONTRALORÍA"),
    array("L00","115","010502020101","Ingresos"),
    array("L00","116","010502050203","Egresos"),
    array("L00","116","040201010104","Egresos"),
    array("L00","116","040401010101","Egresos"),
    array("L00","118","010801020201","Catastro Municipal"),
    array("L00","119","010502050203","Contabilidad"),
    array("L00","165","010502050107",""),
    array("L00","L00","010502020401","TESORERÍA"),
    array("M00","155","010305010105","Área Jurídica"),
    array("M00","M00","010305010105",""),
    array("N00","132","020206010304",""),
    array("N00","132","030402010103","Desarrollo Comercial y de Servicios"),
    array("N00","140","030102010202","Servicio Municipal de Empleo"),
    array("N00","140","030102010203","Servicio Municipal de Empleo"),
    array("N00","140","030102010301","Servicio Municipal de Empleo"),
    array("N00","146","020206010303","Rastro"),
    array("N00","147","020206010304","Mercados"),
    array("N00","N00","030402010102","DIRECCIÓN DE DESARROLLO ECONÓMICO"),
    array("N01","130","030201010201","Desarrollo Agricola y Ganadero"),
    array("N01","130","030203010102","Desarrollo Agricola y Ganadero"),
    array("N01","130","030203010103","Desarrollo Agricola y Ganadero"),
    array("N01","N01","030201020201","Desarrollo Agropecuario"),
    array("N01","N01","030201030105","Desarrollo Agropecuario"),
    array("N01","N01","030201040104","Desarrollo Agropecuario"),
    array("O00","141","020502010105",""),
    array("O00","141","020503010105","Educación"),
    array("O00","150","020402010101","Cultura"),
    array("O00","O00","020501010106","EDUCACIÓN CULTURAL Y BIENESTAR SOCIAL"),
    array("O00","O00","020505010101","EDUCACIÓN CULTURAL Y BIENESTAR SOCIAL"),
    array("Q00","104","010701010101","Seguridad Pública"),
    array("Q00","159","010704010101","Secretaría Técnica de Seguridad Pública"),
    array("Q00","Q00","010701010101",""),
    array("Q00","Q00","010701010102","SEGURIDAD PÚBLICA Y TRÁNSITO"),
    array("Q00","Q00","010701010103","SEGURIDAD PÚBLICA Y TRÁNSITO"),
    array("S00","165","010502050107","Planeación"),
    array("T00","105","010702010101","Coordinación Municipal de Protección Civil"),
    array("T00","105","010702010102","Coordinación Municipal de Protección Civil"),
    array("T00","105","010702010103","Coordinación Municipal de Protección Civil"),
    array("T00","105","010702010201","Coordinación Municipal de Protección Civil"),
    array("T00","105","010702010202","Coordinación Municipal de Protección Civil"),
    array("U00","133","030903010102","Fomento Artesanal"),
    array("U00","133","030903010202","Fomento Artesanal"),
    array("U00","U00","030701010101","TURISMO"),
    array("U00","U00","030701010102","TURISMO"),
    array("U00","U00","030701010201","TURISMO"),
    array("V00","152","020608050101","Atención a la Mujer"),
    array("V00","152","020608050102","Atención a la Mujer"),
    array("V00","152","020608050104","Atención a la Mujer")
    );







function comparador($cero1a, $excel)
{
    foreach ($cero1a as $o) {
        $gen = $o[0];
        $aux = $o[1];
        $proy = $o[2] . $o[3] . $o[4] . $o[5] . $o[6] . $o[7];
        $clave_o = $gen . $aux . $proy;

        $find = 0;

        foreach ($excel as $e) {
            $gen_e = $e[0];
            $aux_e = $e[1];
            $proy_e = $e[2];
            $clave_e = $gen_e . $aux_e . $proy_e;

            if ($clave_o == $clave_e) {
                $find = $e;
            }
        }
        if ($find != 0) {
            print $find[0] . "|" . $find[1] . "|" . $find[2] . "|" . $find[3] . '<br>';
        } else {
            print $gen . "|" . $aux . "|" . $proy . '|<br>';
        }
    }
}



function armaids_areas($con, $armado){
    $stm = $con->query("SELECT * FROM dependencias_generales");
    $dependencias_generales = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM dependencias_auxiliares");
    $dependencias_auxiliares = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM proyectos");
    $proyectos = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($armado as $a){

        $gen = $a[0];
        $aux = $a[1];
        $proy = $a[2];
        $gen_c = 0;
        $aux_c = 0;
        $proy_c = 0;

        foreach($dependencias_generales as $d){
            if($d['clave_dependencia'] == $gen){
                $gen_c = $d['id_dependencia'];
            }
        }

        foreach($dependencias_auxiliares as $da){
            if($da['clave_dependencia_auxiliar'] == $aux){
                $aux_c = $da['id_dependencia_auxiliar'];
            }
        }

        foreach($proyectos as $p){
            if($p['codigo_proyecto'] == $proy){
                $proy_c = $p['id_proyecto'];
            }
        }

        if($gen_c == 0 || $aux_c == 0 || $proy_c == 0){
            print "falto: ";
            var_dump($a);
        }else{
            
        }
    }
    

}





























//comparador($cero1a, $excel);
armaids_areas($con, $armado);




