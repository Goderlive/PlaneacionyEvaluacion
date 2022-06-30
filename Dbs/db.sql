DROP DATABASE IF EXISTS planeacion_y_evaluacion;
CREATE DATABASE planeacion_y_evaluacion;
USE planeacion_y_evaluacion;

DROP TABLE IF EXISTS titulares;
CREATE TABLE titulares(
    id_titular INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL, 
    apellidos VARCHAR(255) NOT NULL,
    cargo ENUM('Director', 'Coordinador', 'Jefe de Departamento', 'Subdirector', 'Enlace Administrativo'),
    codigo_area VARCHAR(3)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS dependencias_generales;
CREATE TABLE dependencias_generales(
    id_dependencia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    clave_dependencia VARCHAR(15) NOT NULL,
    nombre_dependencia_general VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("A00", "PRESIDENCIA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("A01", "COMUNICACIÓN SOCIAL");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("A02", "DERECHOS HUMANOS");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("B00", "SINDICATURAS");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("B01", "SINDICATURA I");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("B02", "SINDICATURA II");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("B03", "SINDICATURA III");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C00", "REGIDURIAS");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C01", "REGIDURÍA I");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C02", "REGIDURÍA II");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C03", "REGIDURÍA III");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C04", "REGIDURÍA IV");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C05", "REGIDURÍA V");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C06", "REGIDURÍA VI");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C07", "REGIDURÍA VII");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C08", "REGIDURÍA VIII");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C09", "REGIDURÍA IX");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C10", "REGIDURÍA X");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C11", "REGIDURÍA XI");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C12", "REGIDURÍA XII");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C13", "REGIDURÍA XIII");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C14", "REGIDURÍA XIV");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C15", "REGIDURÍA XV");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C16", "REGIDURÍA XVI");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C17", "REGIDURÍA XVII");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C18", "REGIDURÍA XVIII");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("C19", "REGIDURÍA XIX");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("D00", "SECRETARÍA DEL AYUNTAMIENTO");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("E00", "ADMINISTRACIÓN");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("E01", "PLANEACIÓN");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("E02", "INFORMÁTICA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("E03", "EVENTOS ESPECIALES");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("F00", "DESARROLLO URBANO Y OBRAS PÚBLICAS");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("F01", "DESARROLLO URBANO Y SERVICIOS PÚBLICOS");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("G00", "ECOLOGÍA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("H00", "SERVICIOS PÚBLICOS");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("H01", "AGUA POTABLE");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("I00", "PROMOCIÓN SOCIAL");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("I01", "DESARROLLO SOCIAL");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("I02", "SALUD");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("J00", "GOBIERNO MUNICIPAL");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("K00", "CONTRALORÍA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("L00", "TESORERÍA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("M00", "CONSEJERÍA JURÍDICA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("N00", "DIRECCIÓN DE DESARROLLO ECONÓMICO");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("N01", "DESARROLLO AGROPECUARIO");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("O00", "EDUCACIÓN CULTURAL Y BIENESTAR SOCIAL");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("P00", "ATENCIÓN CIUDADANA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("Q00", "SEGURIDAD PÚBLICA Y TRÁNSITO");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("R00", "CASA DE LA CULTURA");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("S00", "UNIDADDEINFORMACIÓN,PLANEACIÓN, PROGRAMACIÓN Y EVALUACIÓN");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("T00", "PROTECCIÓN CIVIL");
INSERT INTO dependencias_generales (clave_dependencia, nombre_dependencia_general) VALUES ("U00", "TURISMO");

DROP TABLE IF EXISTS dependencias_auxiliares;
CREATE TABLE dependencias_auxiliares(
    id_dependencia_auxiliar INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    clave_dependencia_auxiliar VARCHAR(15),
    nombre_dependencia_auxiliar VARCHAR(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("100","Secretaría Particular");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("101","Secretaría Técnica");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("102","Derechos Humanos");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("103","Comunicación Social");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("104","Seguridad Pública");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("105","Coordinación Municipal de Protección Civil");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("106","Cuerpo de Bomberos");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("107","Urbanismo y Vivienda");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("108","Oficialía Mediadora - Conciliadora");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("109","Registro Civil");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("110","Acción Cívica");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("111","Coordinación de Delegaciones");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("112","Participación Ciudadana");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("113","Cronista Municipal");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("114","Control Patrimonial");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("115","Ingresos");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("116","Egresos");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("117","Presupuesto");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("118","Catastro Municipal");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("119","Contabilidad");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("120","Administración y Desarrollo de Personal");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("121","Recursos Materiales");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("122","Unidad de Transparencia");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("123","Desarrollo Urbano");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("124","Obras Públicas");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("125","Servicios Públicos");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("126","Limpia");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("127","Alumbrado Público");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("128","Parques y Jardines");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("129","Antirrábico");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("130","Desarrollo Agrícola y Ganadero");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("131","Fomento Industrial");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("132","Desarrollo Comercial y de Servicios");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("133","Fomento Artesanal");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("134","Auditoría Financiera");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("135","Auditoría de Obra");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("136","Auditoría Administrativa");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("137","Simplificación Administrativa");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("138","Responsabilidad y Situación Patrimonial");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("139","Control Social");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("140","Servicio Municipal de Empleo");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("141","Educación");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("142","Deporte");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("143","Atención a la Juventud");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("144","Gobernación");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("145","Panteones");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("146","Rastro");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("147","Mercados");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("148","Servicio Militar Municipal");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("149","Fomento Turístico");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("150","Cultura");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("151","Atención a los Pueblos Indígenas");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("152","Atención a la Mujer");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("153","Atención a la Salud");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("154","Vialidad y Transporte");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("155","Área Jurídica");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("156","Suministro de Agua Potable");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("157","Drenaje y Saneamiento");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("158","Tránsito");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("159","Secretaría Técnica de Seguridad Pública");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("160","Prevención y Control Ambiental");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("161","Unidad Substanciadora y Resolutoria");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("162","Unidad Investigadora");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("163","Oficialía Mediadora");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C00","REGIDURIAS");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C01","REGIDURÍA I");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C02","REGIDURÍA II");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C03","REGIDURÍA III");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C04","REGIDURÍA IV");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C05","REGIDURÍA V");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C06","REGIDURÍA VI");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C07","REGIDURÍA VII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C08","REGIDURÍA VIII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C09","REGIDURÍA IX");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C10","REGIDURÍA X");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("164","Oficialía Calificadora");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("A00", "PRESIDENCIA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("A01", "COMUNICACIÓN SOCIAL");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("A02", "DERECHOS HUMANOS");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("B00", "SINDICATURAS");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("B01", "SINDICATURA I");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("B02", "SINDICATURA II");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("B03", "SINDICATURA III");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C00", "REGIDURIAS");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C01", "REGIDURÍA I");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C02", "REGIDURÍA II");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C03", "REGIDURÍA III");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C04", "REGIDURÍA IV");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C05", "REGIDURÍA V");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C06", "REGIDURÍA VI");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C07", "REGIDURÍA VII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C08", "REGIDURÍA VIII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C09", "REGIDURÍA IX");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C10", "REGIDURÍA X");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C11", "REGIDURÍA XI");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C12", "REGIDURÍA XII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C13", "REGIDURÍA XIII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C14", "REGIDURÍA XIV");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C15", "REGIDURÍA XV");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C16", "REGIDURÍA XVI");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C17", "REGIDURÍA XVII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C18", "REGIDURÍA XVIII");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("C19", "REGIDURÍA XIX");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("D00", "SECRETARÍA DEL AYUNTAMIENTO");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("E00", "ADMINISTRACIÓN");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("E01", "PLANEACIÓN");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("E02", "INFORMÁTICA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("E03", "EVENTOS ESPECIALES");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("F00", "DESARROLLO URBANO Y OBRAS PÚBLICAS");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("F01", "DESARROLLO URBANO Y SERVICIOS PÚBLICOS");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("G00", "ECOLOGÍA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("H00", "SERVICIOS PÚBLICOS");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("H01", "AGUA POTABLE");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("I00", "PROMOCIÓN SOCIAL");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("I01", "DESARROLLO SOCIAL");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("I02", "SALUD");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("J00", "GOBIERNO MUNICIPAL");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("K00", "CONTRALORÍA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("L00", "TESORERÍA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("M00", "CONSEJERÍA JURÍDICA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("N00", "DIRECCIÓN DE DESARROLLO ECONÓMICO");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("N01", "DESARROLLO AGROPECUARIO");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("O00", "EDUCACIÓN CULTURAL Y BIENESTAR SOCIAL");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("P00", "ATENCIÓN CIUDADANA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("Q00", "SEGURIDAD PÚBLICA Y TRÁNSITO");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("R00", "CASA DE LA CULTURA");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("S00", "UNIDADDEINFORMACIÓN,PLANEACIÓN, PROGRAMACIÓN Y EVALUACIÓN");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("T00", "PROTECCIÓN CIVIL");
INSERT INTO dependencias_auxiliares (clave_dependencia_auxiliar, nombre_dependencia_auxiliar) VALUES ("U00", "TURISMO");


DROP TABLE IF EXISTS programas_presupuestarios;
CREATE TABLE programas_presupuestarios(
    id_programa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    objetivo_pp TEXT, -- Objetivo o resumen narrativo
    dependencia_general_gaceta VARCHAR(255), -- El que aparece en la gaceta
    pilar_o_eje VARCHAR(255), -- Transcripcion de la gaceta
    tema_desarrollo VARCHAR(255),
    codigo_programa VARCHAR(12) NOT NULL,
    nombre_programa VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba los proyectos orientados a proteger, defender y garantizar los derechos humanos de todas las personas que se encuentren en cada territorio municipal, sin discriminación por condición alguna y fomentar la cultura de los derechos humanos para promover el respeto y la tolerancia entre los individuos en todos los ámbitos de la interrelación social apoyando a las organizaciones sociales que impulsan estas actividades","A02 Derechos Humanos","Pilar 4 Seguridad","Derechos Humanos","01020401","Derechos humanos");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye las acciones que favorezcan el desarrollo de un gobierno democrático que impulse la participación social y ofrezca servicio de calidad en el marco de legalidad y justicia, para elevar las condiciones de vida de la población.","J00 Gobierno municipal","Eje transversal II Gobierno Moderno, Capaz y Responsible","Comunicación y diálogo con la ciudadanía como elemento clave de gobernabilidad.","01030101","Conducción de las políticas generales de gobierno");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incorpora las acciones orientadas a la realización de acciones de apoyo al estado democrático con la participación ciudadana y la consolidación del estado de derecho y la justicia social, propiciando una cultura política y fortaleciendo el sistema de partidos","J00 Gobierno municipal","Eje transversal II Gobierno Moderno, Capaz y Responsible","Comunicación y diálogo con la ciudadanía como elemento clave de gobernabilidad.","01030201","Democracia y pluralidad política");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye las acciones encaminadas a mantener y transmitir el conocimiento del patrimonio público tangible e intangible, como devenir de la identidad de los mexiquenses.","J00 Gobierno Municipal","Pilar 3 Territorial","Ciudades y comunidades sostenibles","01030301","Conservación del patrimonio público");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Considera las acciones orientadas a la mejora en la prestación de los servicios que recibe la población de manera clara, honesta, pronta y expedita , promoviendo que los servidores públicos realicen su función con calidez, y cuenten con las competencias y conducta ética necesarias en el servicio público, conforme a los principios que rigen la actuación del servidor público","K00 Contraloría","Eje transversal II Gobierno Moderno, Capaz y Responsible","Eficiencia y eficacia en el sector público","01030401","Desarrollo de la función pública y ética en el servicio público");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Conjunto de acciones orientadas a establecer las bases de coordinación entre el Estado y los Municipios para el funcionamiento de los Sistemas Anticorrupción, de conformidad con lo dispuesto en la Constitución Política de los Estados Unidos Mexicanos, la Constitución Política del Estado Libre y Soberano de México, la Ley General del Sistema Nacional Anticorrupción y la Ley del Sistema Anticorrupción del Estado de México y Municipios, para que las autoridades estatales y municipales competentes prevengan, investiguen y sancionen las faltas administrativas y los hechos de corrupción.","","Eje transversal II: Gobierno Moderno, Capaz y Responsible","Sistema Anticorrupción del Estado de México y Municipios","01030402","Sistema Anticorrupción del Estado de México y Municipios");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende todas las acciones orientadas al fortalecimiento y mejora de los procedimientos regulatorios y conductos legales establecidos, que influyan directamente en la garantía jurídica del gobierno y la sociedad.","M00 Consejería Jurídica","Eje transversal II Gobierno Moderno, Capaz y Responsible","Eficiencia y eficacia en el sector público","01030501","Asistencia jurídica al ejecutivo");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Es el conjunto de acciones a aplicar en una demarcación territorial definida, en beneficio de toda la población o comunidades específicas ahí establecidas.","J00 Gobierno municipal","Pilar 3 Territorial","Ciudades y comunidades sostenibles"," 01030801","Política territorial");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Se orienta al cumplimiento de las atribuciones contenidas en el Título VI de la Ley Orgánica Municipal del Estado de México, vigente.","D00 Secretaría del Ayuntamiento","Eje transversal II Gobierno Moderno, Capaz y Responsible","Estructura del gobierno municipal","01030902","Reglamentación municipal");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Se orienta al cumplimiento de las atribuciones contenidas en el Título V de la Ley Orgánica Municipal del Estado de México, v igente.","M00 Consejería jurídica","Pilar 4 Seguridad","Mediación y conciliación","01030903","Mediación y conciliación municipal");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Se orienta al impulso del desarrollo armónico sustentable de las regiones con la eficaz intervención y coordinación de un ayuntamiento con otros gobiernos municipales, estatales y el gobierno federal en beneficio de la población y sus actividades productivas; asimismo incluye las acciones que permitan fortalecer la cooperación regional, incluyendo el desarrollo metropolitano, para alcanzar una efectiva coordinación y aplicación de políticas públicas de ámbito regional","N00 Dirección de Desarrollo Económico","Eje transversal II Gobierno Moderno, Capaz y Responsible","Coordinación Institucional","01030904","Coordinación intergubernamental regional");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye todas las acciones relacionadas con la celebración de reuniones, eventos, convenios y acuerdos para la formalización de proyectos de cooperación internacional y para la promoción, económica, comercial y turística de los municipios. Considera también todas las actividades de coordinación, gestión y enlace para la prestación de servicios de protección y apoyo a la población que viven en el extranjero y a sus familias en las comunidades de origen.","A00 Presidencia","Pilar 1 Social","Desarrollo humano incluyente, sin discriminación y libre de violencia"," 01040101","Relaciones exteriores");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Considera acciones que permitan generar una relación respetuosa, solidaria y equitativa con la federación y el estado mediante la descentralización de facultades, funciones y recursos, estableciendo esquemas de coordinación, que equilibren las cargas de responsabilidad y beneficios en las acciones compartidas, además de fomentar planes, programas y políticas de desarrollo municipal de largo plazo","J00 Gobierno Municipal","Eje Transversal III Tecnología y Coordinación para el Buen Gobierno","Alianzas para el desarrollo"," 01050201","Impulso al federalismo y desarrollo municipal");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye acciones que permitan elevar la calidad, capacidad y equidad tributaria, con seguridad jurídica, transparencia y simplificación de trámites para el contribuyente, desarrollando un régimen fiscal que amplíe la base de contribuyentes e intensificando las acciones de control para el cumplimiento de las obligaciones tributarias que eviten la elusión y evasión fiscal.","L00 Tesorería","Eje transversal II Gobierno Moderno, Capaz y Responsible","Finanzas públicas sanas","01050202","Fortalecimiento de los ingresos");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Elaborar con las Dependencias y Organismos municipales los planes y programas estatales, sectoriales, regionales y los referentes a inversión pública física, vigilando que los recursos que se asignen se apliquen de acuerdo a la normatividad vigente, así como fortalecer la relación con el estado, la federación y otros municipios, reconociendo sus responsabilidades en la ejecución de la obra pública.","F00 Desarrollo Urbano y Obras Públicas","Eje transversal II Gobierno Moderno, Capaz y Responsible","Finanzas públicas sanas"," 01050203","Gasto social e inversión pública");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Fomentar el desarrollo económico y la inversión productiva en los sectores económicos, involucrando al sector privado en esquemas de financiamiento para desarrollar infraestructura, ampliar y facilitar medios de financiamiento a los municipios, asegurando que la aplicación de los recursos promueva proyectos estratégicos.","F00 Desarrollo Urbano y Obras Públicas","Eje transversal II Gobierno Moderno, Capaz y Responsible","Finanzas públicas sanas"," 01050204","Financiamiento de la infraestructura para el desarrollo");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye las acciones y procedimientos necesarios para desarrollar y fortalecer las fases para la planeación, programación, presupuestación, seguimiento y evaluación programáticopresupuestal, considerando las fases del registro contable-presupuestal y el correspondiente proceso de rendición de cuentas, adicionalmente incluye los procedimientos de planeación y evaluación de los Planes de Desarrollo Municipal, los programas regionales y sectoriales que de él derivan","E01 Planeación - Información, Planeación, Programación y Evaluación","Eje transversal II Gobierno Moderno, Capaz y Responsible","Eje transversal II Gobierno Moderno, Capaz y Responsible","01050205","Planeación y presupuesto basado en resultados");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende el conjunto de actividades y herramientas para coadyuvar a que la actuación de los servidores públicos sea eficaz, eficiente y transparente, a fin de generar resultados con apego a los principios de legalidad, objetividad, profesionalismo, honradez, lealtad, imparcialidad, eficiencia, eficacia, equidad, transparencia, economía, integridad, que permiten la toma de decisiones sobre la aplicación de los recursos públicos con el objeto de mejorar la calidad del gasto público y la rendición de cuentas.","J00 Gobierno municipal.","Eje transversal II Gobierno Moderno, Capaz y Responsible","Gestión para Resultados y evaluación del desempeño"," 01050206","Consolidación de la administración pública de resultados");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye los proyectos orientados a combatir la inseguridad pública con estricto apego a la ley para erradicar la impunidad y la corrupción, mediante la profesionalización de los cuerpos de seguridad, modificando los métodos y programas de estudio para humanizarlos, dignificarlos y hacerlos más eficientes, apl icando sistemas de reclutamiento y selección confiable y riguroso proceso estandarizado de evaluación, así como promover la participación social en acciones preventivas del delito.","Q00 Seguridad Pública y tránsito","Pilar 4: Seguridad","Seguridad con visión ciudadana","01070101","Seguridad pública");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba los proyectos que integran acciones dirigidas a la protección de la vida e integridad física de las personas, a través de la capacitación y organización de la sociedad, para evitar y reducir los daños por accidentes, siniestros, desastres y catástrofes y fomentar la cultura de autoprotección, prevención y solidaridad en las tareas de auxilio y recuperación entre la población, así como proteger la infraestructura urbana básica y el medio ambiente.","Q00 Seguridad Pública y tránsito.","Pilar 3: Territorial","Riesgo y protección civil"," 01070201","Protección civil");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Se orienta a la coordinación de acciones municipales que permitan eficientar los mecanismos en materia de seguridad pública con apego a la legalidad que garantice el logro de objetivos gubernamentales.","Q00 Seguridad pública y tránsito","Pilar 4: Seguridad","Seguridad con visión ciudadana"," 01070401","Coordinación intergubernamental para la seguridad pública");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Conjunto de acciones para el fortalecimiento de la certeza jurídica, edificando una alianza entre los distintos órdenes de gobierno y la población, a fin de consolidar una cultura de legalidad que impacte en la prevención del delito","J00 Gobierno municipal","Pilar 4: Seguridad","Seguridad con visión ciudadana","01080101","Protección jurídica de las personas y sus bienes");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba las acciones que se llevan a cabo por los gobiernos municipales en los procesos de registro de bienes inmuebles en el territorio estatal, así como determinar extensión geográfica y valor catastral por demarcación que definan la imposición fiscal","J00 Gobierno municipal","Eje transversal II Gobierno Moderno, Capaz y Responsible","Finanzas públicas sanas"," 01080102","Modernización del catastro mexiquense");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende el conjunto de acciones municipales que se llevan a cabo para la captación, registro, procesamiento, actualización y resguardo de información estadística y geográfica del territorio estatal.","E02 Informática","Eje transversal II Gobierno Moderno, Capaz y Responsible","Eficiencia y eficacia en el sector público","01080201","Administración del sistema estatal de información estadística y geográfica");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Difundir los valores y principios de gobierno, promoviendo la cultura de la información transparente y corresponsable entre gobierno, medios y sectores sociales, con pleno respeto a la libertad de expresión y mantener informada a la sociedad sobre las acciones gubernamentales, convocando su participación en asuntos de interés público.","A01 Comunicación social","Eje transversal II Gobierno Moderno, Capaz y Responsible","Comunicación y diálogo con la ciudadanía como elemento clave de gobernabilidad"," 01080301","Comunicación pública y fortalecimiento informativo");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Se refiere a la obligación que tiene el sector público en el ejercicio de sus atribuciones para generar un ambiente de confianza, seguridad y franqueza, de tal forma que se tenga informada a la ciudadanía sobre las responsabilidades, procedimientos, reglas, normas y demás información que se genera en el sector, en un marco de abierta participación social y escrutinio público; así como garantizar la protección de sus datos personales en posesión de los sujetos obligados.","P00 Atención Ciudadana","Eje transversal II Gobierno Moderno, Capaz y Responsible","Transparencia y rendición de cuentas","01080401","Transparencia");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba todas las actividades o servicios que las administraciones municipales otorgan a la población a través de tecnologías de información, mejorando la eficiencia y eficacia en los procesos facilitando la operación y distribución de información que se brinda a la población","E02 Informática","Eje transversal III: Conectividad y Tecnología para el Buen Gobierno","Municipio moderno en tecnologías de información y comunicaciones","01080501","Gobierno electrónico");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Conjunto articulado e interrelacionado de acciones, para el manejo integral de residuos sólidos, desde su generación hasta la disposición final, a fin de lograr beneficios ambientales, la optimización económica de su manejo y la aceptación social para la separación de los mismos, proporcionando una mejor calidad de vida de la población","H00 Servicios públicos","Pilar 3: Territorial","Acción por el clima","02010101","Gestión integral de residuos sólidos");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Considera el conjunto de procedimientos que se llevan a cabo para el tratamiento de aguas residuales y saneamiento de redes de drenaje y alcantarillado, manteniendo en condiciones adecuadas la infraestructura para proporcionar una mejor calidad de servicios a la población.","","Pilar 3: Territorial","Manejo sustentable y distribución del agua","02010301","Manejo de aguas residuales, drenaje y alcantarillado");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Considera acciones relacionadas con la protección, conservación y restauración del equilibrio ambiental, la mitigación de los contaminantes atmosféricos para mejorar la calidad del aire, así como la gestión integral de los residuos sólidos, el fomento de la participación ciudadana y la promoción de la educación ambiental en todos los sectores de la sociedad, orientadas a promover el desarrollo sustentable en el municipio y el combate al cambio climático en el Estado de México.","G00 Ecología","Pilar 3: Territorial","Vida de los ecosistemas terrestres","02010401","Protección al ambiente");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende el conjunto de acciones orientadas al desarrollo de proyectos que contribuyan a la prevención, conservación, protección, saneamiento y restauración de los ecosistemas, con la finalidad de garantizar la permanencia de la biodiversidad en los municipios del Estado de México, así como fomentar la educación ambiental, el manejo de áreas verdes y arbolado en zonas urbanas.","G00 Ecología","Pilar 3: Territorial","Vida de los ecosistemas terrestres","02010501","Manejo sustentable y conservación de los ecosistemas y la biodiversidad");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye las acciones para ordenar y regular el crecimiento urbano municipal vinculándolo a un desarrollo regional sustentable, replanteando los mecanismos de planeación urbana y fortaleciendo el papel del municipio como responsable de su planeación y operación.","F00 Desarrollo Urbano y Obras Públicas","Pilar 3: Territorial","Ciudades y comunidades sostenibles","02020101","Desarrollo urbano");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye proyectos cuyas acciones de coordinación para la concurrencia de los recursos en los programas de desarrollo social se orientan a la mejora de los distintos ámbitos de los municipios y los grupos sociales que en ellos habitan, en especial a los de mayor vulnerabilidad, y que tengan como propósito asegurar la reducción de la pobreza.","I00 Promoción Social","Pilar 1: Social","Desarrollo humano incluyente, sin discriminación y libre de violencia","02020201","Desarrollo comunitario");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba el conjunto de acciones encaminadas al desarrollo de proyectos que propicien en la población el cuidado y manejo eficiente del agua, procurando la conservación del vital líquido para otorgar este servicio con calidad.","","Pilar 3: Territorial","Manejo sustentable y distribución del agua","02020301","Manejo eficiente y sustentable del agua");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Contiene el conjunto de acciones encaminadas a otorgar a la población del municipio el servicio de iluminación de las vías, parques y espacios de libre circulación con el propósito de proporcionar una visibilidad adecuada para el desarrollo de las actividades","F00 Desarrollo urbano y obras públicas.","Pilar 3: Territorial","Energía asequible y no contaminante","02020401","Alumbrado público");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba las actividades orientadas a promover y fomentar la adquisición, construcción y mejoramiento de la vivienda en beneficio de la población de menores ingresos, para abatir el rezago existente, y que ésta sea digna y contribuya al mejoramiento de la calidad de vida y al desarrollo e integración social de las comunidades.","I01 Desarrollo Social","Pilar 1: Social","Vivienda digna","02020501","Vivienda");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Se refiere al conjunto de acciones que se llevan a cabo para la modernización y rehabilitación de plazas, jardines públicos, centros comerciales y demás infraestructura en donde se presten servicios comunales, contando con la participación de los diferentes niveles de gobierno incluyendo la iniciativa privada","F00 Desarrollo urbano y obras públicas","Pilar 2: Económico","Infraestructura y modernización de los servicios comunales","02020601","Modernización de los servicios comunales");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye acciones de promoción, prevención y fomento de la salud pública para contribuir a la disminución de enfermedades y mantener un buen estado de salud de la población municipal.","","Pilar 1: Social","Salud y bienestar incluyente","02030101","Prevención médica para la comunidad");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Agrupa las líneas de acción dirigidas a proporcionar atención médica a la población mexiquense, con efectividad y calidad de los servicios de salud que otorgan las instituciones del sector público, así como lograr la cobertura universal de los servicios de salud, para reducir los índices de morbilidad y mortalidad aumentando la esperanza de vida de la población de la entidad.","","Pilar 1: Social","Salud y bienestar incluyente","02030201","Atención médica");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Agrupa los proyectos encaminados a mejorar la estructura jurídica, orgánica, funcional y física; ampliar la oferta y calidad de los servicios que proporcionan las entidades promotoras de actividades físicas, recreativas y deportivas para fomentar la salud física y mental de la población a través de una práctica sistemática.","","Pilar 1: Social","Cultura física, deporte y recreación","02040101","Cultura física y deporte");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye los proyectos encaminados a promover la difusión y desarrollo de las diferentes manifestaciones culturales y artísticas.","O00 Educación Cultural y Bienestar Social","Pilar 3: Territorial","Ciudades y comunidades sostenibles","02040201","Cultura y arte");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye las políticas públicas orientadas al fortalecimiento de la gobernanza democrática, la modernización de la participación social organizada en la solución de los problemas actuales en los diversos ámbitos de la agenda pública","J00 Gobierno municipal","Eje Transversal III: Tecnología y Coordinación para el Buen Gobierno","Alianzas para el desarrollo","02040401","Nuevas organizaciones de la sociedad");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba las acciones de apoyo tendientes al mejoramiento de los servicios de educación en los diferentes sectores de la población en sus niveles inicial, preescolar, primaria y secundaria conforme a los programas de estudio establecidos en el Plan y programas autorizados por la SEP, asimismo incluye las acciones de apoyo para el fortalecimiento de la formación, actualización, capacitación y profesionalización de docentes y administrativos en concordancia con las necesidades del proceso educativo.","O00 Educación Cultural y Bienestar Social","Pilar 1: Social","Educación Incluyente y de calidad","02050101","Educación básica");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende las acciones de apoyo tendientes a mejorar los servicios de bachillerato general y tecnológico en las modalidades escolarizada, no escolarizado, mixto, a distancia y abierto, conforme a los programas de estudio establecidos en el plan y programas autorizados por la SEP, con el objeto de fortalecer la formación, actualización, capacitación y profesionalización de docentes y administrativos en concordancia con las necesidades del proceso educativo","O00 Educación Cultural y Bienestar Social","Pilar 1: Social","Educación Incluyente y de calidad","02050201","Educación media superior");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye las acciones de apoyo tendientes a mejorar la atención a la demanda educativa del tipo superior, tecnológica, universitaria, a distancia y formación docente, en las modalidades escolarizada, no escolarizada , abierta, a distancia y mixta, con programas de estudio de calidad basado en competencias profesionales acordes a las necesidades del sector productivo, público y social; fortaleciendo la formación, actualización, capacitación y profesionalización de docentes y administrativos, con la finalidad de formar profesionales con conocimientos científicos, tecnológicos y humanísticos","O00 Educación Cultural y Bienestar Social","Pilar 1: Social","Educación Incluyente y de calidad","02050301","Educación superior");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye los proyectos tendientes a incrementar programas que ofrezcan a la población adulta con rezago educativo o desempleo oportunidades para concluir la educación básica, así como capacitarse para incorporarse al mercado laboral.","O00 Educación Cultural y Bienestar Social","Pilar 1: Social","Educación Incluyente y de calidad","02050501","Educación para adultos");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba las acciones encaminadas a disminuir la desnutrición, el sobrepeso y la obesidad en la población preescolar en zonas indígenas, rurales y urbano marginadas del territorio estatal.","","Pilar 1: Social","Alimentación y nutrición para las familias","02050603","Alimentación para la población infantil");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye el grupo de proyectos que tienen como propósito procurar elevar el estado nutricional de grupos vulnerables, promover la autosuficiencia alimenticia en zonas y comunidades marginadas, y fomentar hábitos adecuados de consumo.","","Pilar 1: Social","Alimentación y nutrición para las familias","02060501","Alimentación y nutrición familiar");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye el quehacer gubernamental para impulsar el desarrollo integral de los pueblos indígenas con la participación social y el respeto a sus costumbres y tradiciones.","","Pilar 1: Social","Desarrollo humano incluyente, sin discriminación y libre de violencia","02060701","Pueblos indígenas");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Agrupa los proyectos que llevan a cabo los gobiernos municipales para garantizar el respeto a los derechos de los infantes y adolescentes, incluyendo aquellos que se encuentran en condiciones de marginación no acompañada, con acciones que mejoren su bienestar y desarrollo.","","Pilar 1: Social","Desarrollo humano incluyente, sin discriminación y libre de violencia","02060801","Protección a la población infantil y adolescente");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Integra los proyectos orientados a fortalecer la prevención, rehabilitación e integración social, de las personas con discapacidad, con la participación activa de la población en general, promoviendo el desarrollo de esta población en condiciones de respeto y dignidad.","","Pilar 1: Social","Desarrollo humano incluyente, sin discriminación y libre de violencia","02060802","Atención a personas con discapacidad");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye acciones oportunas y de calidad en materia de nutrición, educación, cultura, recreación, atención psicológica y jurídica, para que los adultos mayores disfruten de un envejecimiento activo, digno y con autosuficiencia.","","Pilar 1: Social","Desarrollo humano incluyente, sin discriminación y libre de violencia","02060803","Apoyo a los adultos mayores");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba los proyectos orientados a fomentar la integración familiar, el respeto y el impulso de valores que permitan a cada individuo un desarrollo armónico, sano, pleno que asista al mejoramiento en las condiciones de vida y empoderando el respeto a los derechos de la niñez, adolescentes, mujeres, discapacitados y adultos mayores","","Pilar 1: Social","Desarrollo humano incluyente, sin discriminación y libre de violencia","02060804","Desarrollo integral de la familia");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Engloba los proyectos para promover en todos los ámbitos sociales la igualdad sustantiva desde una perspectiva de género como una condición necesaria para el desarrollo integral de la sociedad, en igualdad de condiciones, oportunidades, derechos y obligaciones.","","Eje transversal I: Igualdad de Género","Cultura de igualdad y prevención de la violencia contra las mujeres","02060805","Igualdad de trato y oportunidades para la mujer y el hombre");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Contiene acciones que se orientan a brindar más y mejores oportunidades a los jóvenes que les permitan alcanzar su desarrollo físico – mental adecuado, que les permita incorporarse a la sociedad de manera productiva.","","Pilar 1: Social","Desarrollo humano incluyente, sin discriminación y libre de violencia","02060806","Oportunidades para los jóvenes");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Integra los proyectos dirigidos a dinamizar el empleo en territorio municipal, fomentando el desarrollo de la planta productiva, aumentar la oportunidad de empleo, vinculando su oferta y demanda, y garantizar que la población económicamente activa disfrute de las mismas condiciones de empleo, remuneración y oportunidades sin discriminación alguna, mediante la formación de los recursos humanos para el trabajo.","N00 Dirección de Desarrollo Económico","Pilar 2: Económico","Desarrollo económico","03010201","Empleo");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Desarrolla acciones enfocadas a disminuir las barreras para la inclusión de las mujeres en la actividad económica del municipio, que permitan el pleno ejercicio de sus derechos laborales, fomentando valores de igualdad de género, para construir una relación de respeto e igualdad social.","","Eje transversal I: Igualdad de Género","Cultura de igualdad y prevención de la violencia contra las mujeres","03010203","Inclusión económica para la igualdad de género");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Agrupa las líneas de acción enfocadas al incremento de los niveles de producción, productividad y rentabilidad de las actividades agrícolas, promoviendo la generación del valor agregado a la producción primaria principalmente de los cultivos intensivos, para satisfacer la demanda interna y reducir las importaciones y minimizar los impactos ambientales que derivan del desarrollo de las diferentes actividades agrícolas","N01 Desarrollo Agropecuario","Pilar 2: Económico","Desarrollo económico","03020101","Desarrollo agrícola");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende las acciones tendientes a apoyar la puesta en marcha de proyectos productivos y sociales, fomentar la agroempresa, la capacitación, la organización de productores rurales y la comercialización, a fin de mejorar la productividad y calidad de los productos agropecuarios.","N01 Desarrollo Agropecuario","Pilar 2: Económico","Desarrollo económico","03020102","Fomento a productores rurales");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Se refiere a las acciones orientadas a incrementar la producción pecuaria y disminuir la dependencia del Estado de México en su conjunto de productos cárnicos y lácteos del mercado nacional e internacional y consolidar agroempresas y organizaciones rentables que propicien el desarrollo integral y sostenible de la actividad pecuaria, generando valor agregado a la producción.","N01 Desarrollo Agropecuario","Pilar 2: Económico","Desarrollo económico","03020103","Fomento pecuario");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incorpora el conjunto de líneas de acción que se desarrollan para procurar las condiciones adecuadas en la producción agroalimentaria, así como el desarrollo de acciones de vigilancia para verificar la calidad de los productos.","N01 Desarrollo Agropecuario","Pilar 2: Económico","Desarrollo económico","03020104","Sanidad, inocuidad y calidad agroalimentaria");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende los proyectos para asegurar la permanencia de los bosques a través del manejo y aprovechamiento sustentable con la participación directa de dueños, poseedores y prestadores de servicios técnicos, así como acciones dirigidas a evitar la degradación del recurso forestal en el territorio estatal.","G00 Ecología","Pilar 3: Territorial","Vida de los ecosistemas terrestres","03020201","Desarrollo forestal");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Integra acciones encaminadas a la implementación de proyectos productivos para desarrollar la producción acuícola del municipio, de acuerdo al potencial productivo regional, impulsando su aprovechamiento sustentable, para contribuir a la generación de empleos productivos y a la mejora de la dieta básica de la población.","N00 Dirección de Desarrollo Económico","Pilar 2: Económico","Desarrollo económico","03020301","Fomento acuícola");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Integra las acciones realizadas en el marco de un sistema de riesgos; que evite la descapitalización del productor ante la ocurrencia de un siniestro y dé protección al patrimonio de la gente del campo a través de seguros y fianzas.","N00 Dirección de Desarrollo Económico","Pilar 2: Económico","Desarrollo económico","03020601","Seguros y garantías financieras agropecuarias");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incorpora los proyectos que fomentan al uso de tecnologías que mejoren la calidad de los servicios de electrificación; así como la habitabilidad, seguridad e higiene de la vivienda social, para hacerla económica y ambientalmente sustentable, privilegiando en la atención de las comunidades que carecen del servicio","H00 Servicios Públicos","Pilar 3: Territorial","Energía asequible y no contaminante","03030501","Electrificación");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Agrupa los proyectos orientados a fomentar una cultura empresarial que asegure la modernización industrial para atraer inversión productiva nacional y extranjera, con fuerte impulso de las exportaciones, donde las cadenas productivas concreten el fortalecimiento de la micro y pequeña empresa con absoluto respeto al medio ambiente.","N00 Dirección de Desarrollo Económico","Pilar 2: Económico","Desarrollo económico","03040201","Modernización industrial");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende las acciones orientadas a la modernización y optimización del servicio transporte terrestre, a través de la coordinación intergubernamental para la organización técnica oportuna y racional que contribuya a la eficiencia y calidad en la prestación del servicio de transporte público.","J00 Gobierno Municipal","Pilar 3: Territorial","Ciudades y comunidades sostenibles","03050101","Modernización de la movilidad y el transporte terrestre");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Incluye acciones para ampliar, mantener y mejorar las condiciones de la red carretera en el territorio estatal y fomentar el equipamiento, con el propósito de que contribuyan almejoramiento de la movilidad, el desarrollo regional, metropolitano y suburbano.","F00 Desarrollo urbano y obras públicas","Pilar 3: Territorial","Ciudades y comunidades sostenibles","03050103","Modernización de la infraestructura para el transporte terrestre");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Integra los proyectos que lleva a cabo el Gobierno Municipal para impulsar la inversión social y privada que incremente la calidad de los servicios turísticos, desarrollando nuevos destinos altamente competitivos que generen ingresos y empleo para la población, a través de acciones tendientes a mejorar, diversificar y consolidar la oferta de infraestructura turística con una regulación administrativa concertada con los prestadores de servicios.","N00 Dirección de Desarrollo Económico","Pilar 2: Económico","Desarrollo económico","03070101","Fomento turístico");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende las líneas de acción destinadas al apoyo de la investigación científica básica y aplicada, promoviendo el desarrollo del conocimiento científico.","N00 Dirección de Desarrollo Económico","Pilar 2: Económico","Innovación, investigación y desarrollo","03080101","Investigación científica ");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Agrupa los proyectos destinados a preservar y fomentar las expresiones artesanales municipales e impulsar su creatividad, diseño, producción y comercialización en el mercado local, nacional e internacional, a fin de mejorar el nivel de vida de los artesanos y grupos étnicos","N00 Dirección de Desarrollo Económico","Pilar 2: Económico","Desarrollo económico","03090301","Promoción artesanal");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Refiere todas aquellas acciones relacionadas con el manejo eficiente y sustentable de la deuda pública, entre ellas, la contratación, amortización, servicio, refinanciamiento y/o reestructuración de la deuda del gobierno municipal, así como el registro, vigilancia, seguimiento y control de sus obligaciones multianuales correspondientes al gobierno municipal","L00 Tesorería","Eje transversal II: Gobierno Moderno, Capaz y Responsible","Finanzas públicas sanas","04010101","Deuda pública");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Comprende la suma de recursos transferidos por los municipios y organismos municipales para cumplir con objetivos diversos, además engloba las acciones necesarias para la celebración de convenios previstos en la Ley de Coordinación Fiscal vigente.","L00 Tesorería","Eje transversal II: Gobierno Moderno, Capaz y Responsible","Finanzas públicas sanas","04020101","Transferencias");
INSERT INTO programas_presupuestarios (objetivo_pp, dependencia_general_gaceta, pilar_o_eje, tema_desarrollo, codigo_programa, nombre_programa) VALUES ("Tiene por objeto integrar los recursos financieros presupuestales para el pago de adeudos que no fueron cubiertos en ejercicios anteriores.","L00 Tesorería","Eje transversal II: Gobierno Moderno, Capaz y Responsible","Finanzas públicas sanas","04040101","Previsiones para el pago de adeudos de ejercicios fiscales anteriores");



DROP TABLE IF EXISTS proyectos;
CREATE TABLE proyectos(
    id_proyecto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codigo_proyecto VARCHAR(12) NOT NULL,
    nombre_proyecto VARCHAR(255) NOT NULL,
    descripcion TEXT,
    conac VARCHAR(1),
    id_programa INT, 
    CONSTRAINT FK_programa FOREIGN KEY (id_programa) REFERENCES programas_presupuestarios(id_programa) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010204010101","Investigación, capacitación, promoción y divulgación de los derechos humanos","E","Comprende las actividades de investigación y docencia, como mecanismos para fortalecer la capacitación, promoción, difusión y divulgación entre la sociedad civil y las instituciones públicas que consoliden el conocimiento en derechos humanos y los servicios que se ofrecen en la materia.",1);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010204010102","Protección y defensa de los derechos humanos","E","Contempla las acciones encaminadas a atender oportuna y diligentemente los actos u omisiones de naturaleza administrativa que impliquen presuntas violaciones a los derechos humanos integrando el desarrollo de supervisiones, revisiones y visitas a centros e instituciones del sistema penitenciario, sector salud, justicia, localidades de alto y muy alto nivel de marginación y zonas de tránsito de migrantes, emitiendo, si fuere necesario las recomendaciones conducentes a una mejor protección de los derechos humanos y brindando orientación y asesoría a la población.",1);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010301010101","Relaciones públicas","E","Contiene las acciones dirigidas a establecer y mantener sistemas de comunicación directa para el despacho de los asuntos de responsabilidad de los presidentes municipales.",2);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010301010201","Audiencia pública y consulta popular","E","Considera las acciones que permiten garantizar el derecho de la ciudadanía a ser escuchada por las autoridades del ayuntamiento y las que se refieren a promover la solicitud de opiniones, sugerencias y demandas de la población para ser incorporadas en los planes y programas de gobierno.",2);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010302010103","Capacitación para el desarrollo de la cultura política","E","Considera las acciones que contribuyan en la consolidación de una cultura política, democrática, participativa y corresponsable a través de la capacitación en la materia, orientada principalmente a la educación media superior y superior con contenidos en los diversos sectores de la sociedad, la integración social, la solidaridad y la identidad mexiquense, coadyuvando a fortalecer la relación gobierno-sociedad y reconstruir el tejido social.",3);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010303010101","Conservación, restauración y difusión del patrimonio cultural","E","Engloba las actividades enfocadas a restaurar, conservar y mantener en óptimas condiciones de uso, el patrimonio histórico, artístico y cultural de la entidad, con la finalidad de difundirlo entre la población.",4);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010304010101","Fiscalización, control y evaluación interna de la gestión pública","O","Comprende las acciones de dirección para vigilar, fiscalizar, controlar y evaluar la gestión de los servidores públicos en la administración pública municipal y el cumplimiento de sus obligaciones derivadas de los convenios suscritos con los gobiernos federal, estatal y municipales, así como la inspección, vigilancia y evaluación de los órganos internos de control de las dependencias y entidades públicas municipales.",5);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010304010102","Participación social en la formulación, seguimiento, control y evaluación interna de obras, programas y servicios públicos","P","Comprende las acciones para promover la participación organizada de la ciudadanía en la formulación, seguimiento, control y evaluación de programas de la administración pública municipal y en particular en lo relativo a obras y servicios de mayor impacto, como apoyo al diseño de las políticas públicas; asimismo incluye las acciones relacionadas con las autoridades auxiliares municipales.",5);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010304020101","Prevención, detección, disuasión, sanción y combate de la corrupción","O","Incluye las acciones y procesos orientados al establecimiento y operación del Sistema Anticorrupción del Estado de México y Municipios, así como aquellas destinadas a instituir los principios, bases generales y procedimientos para la coordinación entre las autoridades del Estado de México y los municipios, con el objeto de fiscalizar y controlar los recursos públicos; promover la transparencia y rendición de cuentas; prevenir, investigar, resolver y en su caso, sancionar las faltas administrativas, hechos de corrupción y conflicto de intereses, en congruencia con el Sistema Nacional Anticorrupción.",6);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010304020201","Responsabilidades administrativas","O","Comprende el conjunto de acciones orientadas a procurar que el desempeño de los servidores públicos se apegue a los principios rectores y directrices de su actuación, así como a las acciones que permitan llevar a cabo la substanciación de procedimientos derivados de hechos irregulares y actos de corrupción de los servidores públicos, para constituir las responsabilidades administrativas y la resolución de los mismos por la autoridad competente.",6);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010304020202","Declaración de situación patrimonial; de interés y constancia de la declaración fiscal de los servidores públicos","O","Comprende la integración del padrón de servidores públicos de la administración pública municipal, obligados a la presentación de las declaraciones de situación patrimonial, de intereses y la constancia de la declaración fiscal, cuyo fin es su recepción, registro y resguardo, así como la verificación aleatoria de las mismas.",6);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010304020204","Investigación de faltas administrativas","O","Es el conjunto de acciones que integran un procedimiento debidamente fundado y motivado, para investigar presuntas responsabilidades por faltas administrativas en que incurran servidores públicos y particulares relacionados con hechos de corrupción, que deriven de denuncias, auditorías practicadas por autoridad competente y actuaciones de oficio y en su caso, determinar su calificación como graves o no graves.",6);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010305010105","Asesoría jurídica al ayuntamiento","E","Consiste en otorgar orientación, asesoría, tramitación y defensa de los asuntos de carácter civil, mercantil, laboral, penal, agrario, administrativo, fiscal, amparos, controversias constitucionales y acciones de inconstitucionalidad a los Ayuntamientos.",7);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010308010201","Planeación integral y concertada","P","Conjunto de acciones que permitan la elaboración, modificación e implementación de planes de desarrollo urbano municipal, que promuevan la incorporación ordenada y planificada del suelo al desarrollo urbano.",8);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010308010202","Instrumentación urbana","E","Incluye las acciones que permitan mejorar la atención a la ciudadanía en la gestión de trámites, que asegure su incorporación ordenada y planificada al desarrollo urbano, garantizando la aplicación del marco legal y normativo, para el uso y aprovechamiento del suelo, procurando garantizar el ordenamiento territorial y desarrollo urbano de los centros de población del municipio.",8);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010308010302","Regularización de predios","E","Conjunto de acciones para incorporar al régimen jurídico urbano, los inmuebles del régimen de propiedad privada en los que ex istan asentamientos humanos irregulares.",8);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010309020101","Revisión y emisión de la reglamentación municipal","G","Incluye todos los procesos necesarios para que los ayuntamientos desarrollen los trabajos para creación, rediseño, actualización, publicación y difusión de la reglamentación municipal.",9);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010309030101","Mediación, conciliación y función calificadora municipal","E","Engloba las actividades y procesos descritos en el título V de la Ley Orgánica Municipal relativa a la función mediadora-conciliadora y de la calificadora de los ayuntamientos.",10);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010309040101","Vinculación intergubernamental regional","E","Comprende las acciones de coordinación con autoridades de los gobiernos de otros municipios, gobiernos estatales, incluyendo el gobierno federal, para la planeación, ejecución y difusión de programas para el desarrollo regional, incluyendo el desarrollo metropolitano, además incluye el impulso del desarrollo y la vinculación institucional, con organizaciones públicas y privadas.",11);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010401010103","Cooperación internacional para el desarrollo del municipio","E","Incluye todas las acciones relacionadas con la celebración de reuniones, eventos, convenios y acuerdos para la formalización de proyectos de cooperación internacional y para la promoción, económica, comercial y turística de los ayuntamientos del Estado de México.",12);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502010201","Capacitación y profesionalización hacendaria","E","Considera las acciones de profesionalización, actualización, y formación académica que se llevan a cabo mediante programas es tructurados con base en las necesidades detectadas; así como las actividades relativas a la certificación de los conocimientos y habilidades de los servidores públicos hacendarios, en las normas institucionales de competencia laboral.",13);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502020101","Captación y recaudación de ingresos","E","Comprende el conjunto de actividades encaminadas a captar y recaudar los recursos provenientes de las contribuciones municipales y de los ingresos derivados del Sistema de Coordinación Fiscal, así como los ingresos percibidos del Organismos Auxiliares, otros ingresos e ingresos netos derivados de financiamiento autorizados presupuestalmente con base en la legislación vigente; elaborar y rediseñar un padrón confiable por los diferentes ingresos tributarios municipales.",14);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502020401","Registro y control de caja y tesorería","E","Se refiere al establecimiento de criterios, lineamientos, procedimientos y sistemas de carácter técnico y administrativo, a fin de mantener un control que permita la correcta evaluación de la administración; asimismo planear y organizar las políticas financieras y crediticias de los gobiernos municipales, mediante una estricta administración de los recursos financieros y de control en las disposiciones de los egresos cuidando la liquidez conforme a los programas y presupuestos aprobados.",14);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502030104","Asignación, registro, seguimiento y control de la inversión pública municipal","K","Comprende el conjunto de acciones dirigidas al análisis, distribución y registro de los recursos de inversión pública asignados para el ejercicio fiscal que corresponda; así como las acciones que se realizan para su seguimiento, control y el nivel de cumplimiento en la ejecución de las obras y/o acciones programadas.",15);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502040101","Formulación y evaluación de proyectos rentables","K","Comprende las acciones de concertación que se llevan a cabo por dependencias de la administración pública municipal para la formulación, implementación, seguimiento y evaluación de proyectos de inversión de alta rentabilidad social y económica, preferentemente aquellos que cuenten con la participación social y privada, y cuyo esquema financiero no constituya deuda públia",16);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502050102","Planeación de proyectos para el desarrollo social","P","Engloba las acciones de coordinación entre la Tesorería y las dependencias y organismos municipales, para determinar los proyectos de inversión y vigilar que los mismos respondan a los objetivos nacionales, estatales y municipales de desarrollo.",17);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502050107","Planeación y evaluación para el desarrollo municipal","P","Comprende el conjunto de actividades para la coordinación, participación, elaboración, actualización e instrumentación del Plan de Desarrollo Municipal y planes y programas que de él se deriven; asimismo incluye las actividades asociadas a la operación del Sistema de Coordinación Hacendaria del Estado de México; así como la definición de los mecanismos necesarios para facilitar el proceso de planeación, programación, presupuestación y evaluación de las dependencias y organismos municipales para en su caso; analizar, operar y emitir reportes sobre el Sistema de Evaluación del Desempeño municipal.",17);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502050108","Operación y seguimiento del COPLADEMUN","P","Comprende el conjunto de acciones para coordinar y fungir como medio de enlace entre los sectores de la sociedad y los tres órdenes de gobierno para la integración, seguimiento y  evaluación del Plan de Desarrollo Municipal y los planes y programas que de él deriven.",17);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502050109","Integración, seguimiento y control presupuestal del ayuntamiento","P","Incluye el conjunto de acciones y procedimientos orientados a establecer los mecanismos de planeación, programación y presupuestación que faciliten la integración seguimiento y control del presupuesto de egresos acorde al Plan de Desarrollo Municipal vigente y los documentos que de él se derivan; contiene asimismo los procedimientos necesarios para contribuir a un Balance Presupuestario Sostenible en un contexto de racionalidad, austeridad y disciplina presupuestal.",17);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502050203","Registro, control contable-presupuestal y cuenta de la hacienda pública municipal","E","Incluye las acciones para la integración de la Cuenta Pública Municipal, las acciones orientadas a manejar, registrar y controlar los recursos financieros de la administración pública municipal, para el desarrollo de los diversos planes y programas; así mismo, registrar, analizar y controlar contablemente los resultados financieros y presupuestales de las operaciones tanto del ingreso como del egreso de las administraciones municipales.",17);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502060101","Administración de personal","E","Comprende las actividades para la administración de personal, así como aquellas para celebrar con el sindicato en tiempo y forma, los convenios que rigen las relaciones laborales entre los gobiernos municipales y sus servidores públicos; consolidar un sistema integral de personal y llevar a cabo el reclutamiento, selección, inducción, promoción, evaluación del desempeño, así como el fortalecimiento de las actividades de integración familiar en beneficio del personal.",18);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502060102","Selección, capacitación y desarrollo de personal","M","Integra el conjunto de acciones encaminadas a mejorar la calidad en la prestación de los servicios públicos, a través de los procesos de profesionalización, capacitación, desarrollo de los servidores públicos municipales.",18);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502060201","Adquisiciones y servicios","M","Engloba las actividades que se enfocan a la adquisición y distribución racional de los bienes y servicios necesarios para el funcionamiento de las dependencias y organismos de las administraciones públicas municipales.",18);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502060301","Control del patrimonio y normatividad","M","Contempla las acciones tendientes a preservar el patrimonio del ayuntamiento, mediante el registro, actualización y control permanente del inventario de bienes; la verificación constante del uso, asignación y aprovechamiento de los mismos para su optimización.",18);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502060401","Simplificación y modernización de la administración pública","M","Comprende acciones orientadas al logro de una administración pública accesible, eficiente y eficaz, que genere resultados e impulse las mejores prácticas en desarrollo administrativo, así como contribuir en la modernización y calidad de los trámites y servicios gubernamentales.",18);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010502060402","Desarrollo institucional","M","Comprende el conjunto de acciones relativas al diseño, mejora, cambio o reingeniería organizacional de las dependencias y organismos municipales, con base en los objetivos y programas gubernamentales; así como a la formulación y actualización de reglamentos interiores y manuales administrativos que regulen su organización y funcionamiento.",18);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010701010101","Operación y vigilancia para la seguridad y prevención del delito","E","Comprende las acciones de despliegue operativo para prevenir el delito y disuadir su comisión en zonas vulnerables o de alta incidencia a partir de la inteligencia policial, así como aquellas para la protección de la población en casos de emergencia y desastre.",19);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010701010102","Sistemas de información, comunicación y tecnologías para la seguridad pública","E","Comprende acciones que permitan ampliar la cobertura y alcance de los sistemas de comunicación, mediante la operación de redes de voz, datos y video, así como modernizar los sistemas de telecomunicación y radiocomunicación, con tecnología para implementar y operar la plataforma coordinada que garantice un eficiente intercambio de información entre los tres órdenes de gobierno, con la finalidad de fortalecer la seguridad pública.",19);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010701010103","Formación profesional especializada para servidores públicos de instituciones de seguridad pública","E","Se refiere a las actividades para desarrollar investigación académica e impartir programas de estudio en materia policial, ministerial, pericial y en general para las instituciones de seguridad pública a nivel municipal, así como coadyuvar en el ámbito de sus atribuciones en el diseño de políticas y normas para el reclutamiento y selección de aspirantes.",19);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010701010107","Vinculación, participación, prevención y denuncia social","E","Conjunto de acciones para el fortalecimiento de la seguridad pública, edificando una alianza entre los distintos órdenes de gobierno y la población, a fin de consolidar una cultura de legalidad que impacte en la prevención del delito.",19);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010701010203","Educación vial","E","Contempla acciones para desarrollar y fomentar la cultura de la seguridad vial, a través de cursos y actividades que integren una cultura de respeto a la señalización y reglamentos al respecto.",19);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010701010204","Mantenimiento a los dispositivos para el control del tránsito","E","Considera las acciones y recursos que se destinan para conservar en óptimas condiciones la red de semaforización y el señalamiento informativo y correctivo oportuno, así como la rotulación de vehículos oficiales de la Dependencias de Seguridad Pública y Tránsito.",19);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010702010101","Concertación para la protección civil","E","Contiene acciones que promueven la participación de los sectores público, social y privado en el fomento a la cultura de la protección civil, a través de acuerdos que permitan lograr que se genere en la población hábitos y conductas de autoprotección y conciencia de corresponsabilidad.",20);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010702010102","Capacitación integral y actualización para la protección civil","E","Consiste en impartir pláticas, cursos, simulacros y talleres de carácter preferentemente preventivo para proporcionar conocimientos y habilidades básicas a la población del municipio, para actuar de manera adecuada, en forma preventiva, ante la probable ocurrencia de un fenómeno perturbador, así como capacitar de manera específica a individuos que les permita impulsar la cultura de la prevención y salvaguarda de las personas y sus bienes, así como mantener el funcionamiento de los servicios públicos y el equipamiento estratégico en el caso de riesgo, siniestro o desastre.",20);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010702010103","Difusión y comunicación para la protección civil","E","Comprende actividades para difundir las medidas de prevención, para saber cómo actuar antes, durante y después de un desastre natural o siniestro, mediante los medios masivos electrónicos e impresos para fomentar con esto, una cultura de protección civil entre la población.",20);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010702010201","Prevención de riesgos y evaluación técnica de protección civil","E","Incluye las acciones para recopilar, integrar y analizar la información que permita la identificación y determinación de las condiciones de riesgo existentes o potenciales por posibles fenómenos naturales o antropogénicos en inmuebles destinados al desarrollo de actividades industriales, comerciales y de servicio, incorpora el manejo de sustancias explosivas que impacten el desarrollo de proyectos o a la población, con la finalidad de proteger la integridad física de las personas, el entorno y sus bienes, trabajando coordinadamente con los sectores público, privado y social, así como elaborar programas de protección civil.",20);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010702010202","Identificación, sistematización y atlas de riesgos","E","Agrupa las acciones enfocadas al levantamiento, sistematización y análisis de información cartográfica y estadística sobre los agentes perturbador, afectable y regulador, tendientes a una eficiente y eficaz gestión integral del riesgo en el municipio.",20);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010702010303","Coordinación de atención de emergencias y desastres","N","Comprende las acciones enfocadas a la atención oportuna de emergencias que demanda la población del municipio, a través de la participación coordinada de instancias de los diferentes ámbitos y órdenes de gobierno.",20);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010704010101","Acciones del programa nacional de seguridad pública","S","Contiene acciones enfocadas a coordinar con el gobierno federal y estatal la ejecución de los programas derivados del convenio de acciones en materia de seguridad, el seguimiento a los convenios y acuerdos que se suscriban entre los órdenes de gobierno y en su caso con instituciones policiales a nivel internacional.",21);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010801010101","Asesoría jurídica para los mexiquenses","E","Consiste en otorgar orientación, asesoría, tramitación y defensa de los asuntos de carácter civil, mercantil, laboral, penal, agrario, administrativo, fiscal, amparos, controversias constitucionales y acciones de inconstitucionalidad para beneficio de la población.",22);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010801010201","Regularización de los bienes inmuebles","E","Contempla acciones de asesoría y orientación a la población, sobre los procedimientos e instancias de atención para la regularización de sus bienes inmuebles; así como de difusión de los beneficios que representa la seguridad jurídica por la inscripción de los bienes inmuebles.",22);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010801010301","Actualización del registro civil","E","Incluye acciones orientadas a modernizar la función registral civil, considerando la implementación de nuevas herramientas tecnológicas que conlleven a garantizar la viabilidad y seguridad de la base de datos de los registros de los actos y hechos del estado civil de las personas, con una visión de largo plazo orientada a la prestación de un servicio ágil y eficiente en la emisión de copias certificadas y constancias de no registro.",22);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010801010302","Operación registral civil","E","Contempla las acciones encaminadas a lograr que la operación de la función registral civil sea eficiente, otorgando certeza jurídica a la población en los procesos de certificación, aclaración y supervisión de los actos y hechos del estado civil. Así como apoyar a los grupos vulnerables en este tipo de trámites.",22);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010801020201","Información catastral municipal","E","Comprende las actividades de los gobiernos municipales enfocadas a la integración, conservación y actualización del padrón catastral de los inmuebles localizados en el territorio estatal para que las mismas sean sustento para la planeación del desarrollo territorial de los municipios.",23);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010802010201","Información geográfica municipal","E","Incluye el marco de referencia territorial y el conjunto de datos e información geoespacial que representa los rasgos y elementos del medio físico y del espacio geográfico, y sirve como instrumento estratégico para la elaboración de diagnósticos, estudios e investigaciones en el ámbito municipal; con el propós ito de incidir y coadyuvar en la toma de decisiones en el ejercicio de la planeación del desarrollo y del ordenamiento del territorio municipal.",24);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010802010202","Información estadística municipal","E","Engloba las actividades enfocadas a la captación, integración, procesamiento, producción y actualización de la información demográfica, social y económica para orientar las políticas, estrategias y líneas de acción que coadyuven en la planeación del desarrollo municipal.",24);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010803010103","Difusión y comunicación institucional","F","Engloba aquellas actividades que se enfocan a difundir y comunicar a la población en general sobre las acciones gubernamentales.",25);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010804010101","Vinculación ciudadana con la administración pública","E","Integra el conjunto de actividades encaminadas a proporcionar información gubernamental de interés a la ciudadanía, así como a mantenerla informada sobre los programas especiales, acciones y logros del quehacer gubernamental, mediante procesos de transparencia, rendición de cuentas y acceso a la información pública, que propicien una buena interacción entre la población y el gobierno, siempre garantizando la protección de los datos personales.",26);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("010805010103","Innovación gubernamental con tecnologías de información","E","Incluye el conjunto de acciones tendientes a impulsar el gobierno electrónico; contribuir a la automatización de procesos, de sistemas prioritarios y al desarrollo de sistemas que requiera la administración pública, basados en tecnología de punta, conservando los criterios de estandarización para su optimización, así como diseñar y administrar la infraestructura de redes de telecomunicaciones, que permitan hacer eficiente la gestión interna y contribuir al mejoramiento en la prestación de los servicios públicos.",27);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020101010101","Manejo integral de residuos sólidos","E","Engloba las acciones para el manejo integral de los residuos sólidos municipales, a partir de su generación, separación, tratamiento, transporte y disposición final; se adapta a las condiciones y necesidades de cada lugar; para cumplir los objetivos de valorización, eficiencia sanitaria, ambiental, tecnológica, económica y social.",28);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020101010102","Coordinación para servicios de limpia y recolección de desechos sólidos","E","Incluye aquellas acciones de coordinación entre los gobiernos estatal y municipales para que operen los sitios de disposición final y de aseguramiento y confinamiento de residuos sólidos, para otorgar a la población servicios óptimos y de calidad.",28);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020103010101","Construcción de infraestructura para drenaje y alcantarillado","K","Comprende acciones orientadas a implementar el servicio de drenaje sanitario para evitar riesgos y enfermedades, a fin de mejorar la calidad de vida de la población; así mismo dotar de la infraestructura de drenaje necesario para evitar y reducir los riesgos de inundación, evitando pérdidas económicas y daños a los habitantes.",29);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020103010102","Operación de infraestructura para drenaje y alcantarillado","K","Comprende el conjunto de acciones tendientes a ejecutar los lineamientos para la operación de la infraestructura hidráulica de drenaje sanitario, que permita el desalojo de aguas negras y pluviales de las zonas de influencia de los cárcamos que son atendidos; así mismo operar los lineamientos para el mantenimiento preventivo y correctivo de la infraestructura de drenaje y alcantarillado, así como las redes de drenaje y canales a cielo abierto.",29);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020103010201","Construcción de infraestructura para tratamiento de aguas residuales","K","Comprende aquellas acciones encaminadas al tratamiento de aguas residuales y fomentar su reutilización productiva, así como a contribuir el cumplimiento de la normatividad en materia de tratamiento de aguas residuales.",29);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020103010202","Operación y mantenimiento de infraestructura para tratamiento de aguas residuales","E","Comprende el conjunto de actividades orientadas a promover las acciones de cobertura en el tratamiento de aguas residuales de origen municipal y promover su reutilización en beneficio de un mayor número de habitantes, así como, las acciones necesarias para mantener en funcionamiento las plantas de tratamiento de aguas existentes.",29);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020103010203","Innovación tecnológica para el tratamiento de aguas residuales","E","Engloba el conjunto de acciones encaminadas al mejoramiento y transformación de la infraestructura para el tratamiento de aguas residuales, drenaje y alcantarillado que permitan la mejora de los servicios que se brindan a la población a través de la introducción de nuevas tecnologías.",29);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020104010202","Prevención y control de la contaminación atmosférica","G","Integra el conjunto de acciones tendientes a mejorar la calidad del aire, incluyendo acciones coordinadas con el Gobierno Estatal para la reducción en la emisión de contaminantes generados por fuentes móviles y fijas.",30);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020104010301","Concertación y participación ciudadana para la protección del ambiente","F","Comprende el conjunto de acciones tendientes a fortalecer la participación de los sectores de la sociedad y con esto lograr la concertación y vinculación de dichos sectores en programas, proyectos y temas ambientales.",30);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020104010302","Promoción de la cultura ambiental","G","Comprende el conjunto de acciones de promoción de la cultura ambiental para hacer conciencia en la población, a través de capacitación, promoción y orientación en materia ambiental en los diferentes sectores de la sociedad.",30);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020104010501","Prevención y control de la contaminación del suelo","F","Considera el conjunto de acciones encaminadas a implementar la asistencia técnica y normativa recibida por instancias estatales y federales para el manejo integral de sus residuos sólidos para prevenir y controlar la contaminación del suelo.",30);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020104010502","Prevención y control de la contaminación del agua","E","Incluye las acciones para elaborar y aplicar los programas hidráulicos municipales, considerando los diagnósticos técnicos existentes, así como las acciones de capacitación en materia de manejo de aguas residuales y el saneamiento de las cuencas hidrológicas, observando la normatividad vigente.",30);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020105010101","Promoción y difusión de parques y zoológicos","F","Contempla las acciones tendientes a promover y difundir los parques recreativos municipales, a través de los medios masivos de comunicación, coordinar y apoyar actividades culturales y deportivas en los parques; así como promover y coordinar talleres, cursos, campamentos y visitas especiales en parques recreativos.",31);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020105010102","Desarrollo y protección de la flora y fauna","E","Integra acciones destinadas a apoyar el manejo y control de las áreas naturales protegidas del territorio estatal, incluye las facilidades para el mantenimiento y la procuración de recursos para apoyar la protección de las distintas especies de la fauna en peligro de extinción.",31);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020105010201","Prevención y combate de incendios forestales","E","Incluye las acciones tendientes a evitar la degradación del recurso forestal por los efectos del fuego, contiene las actividades en donde participan los tres órdenes de gobierno, las brigadas municipales contra incendios, productores forestales y agropecuarios, organizaciones de productores y población en general para la prevención y combate de incendios forestales.",31);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020105010202","Inspección y vigilancia forestal","G","Comprende acciones para prevenir, combatir e inhibir la tala clandestina a través de operativos coordinados con instituciones de seguridad, así como inspecciones a industrias y predios forestales, filtros de revisión al transporte de materias primas y productos forestales maderables y no maderables para verificar su legal procedencia y elaborar los dictámenes para determinar los impactos ambientales y reparación de daños.",31);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020105010302","Reforestación y restauración integral de microcuencas","E","Incluye las acciones de apoyo para la restauración de las cuencas hidrológicas existentes en el territorio estatal (v.g. Pánuco, Lerma, Balsas y Valle de México), con el fin de revertir la degradación de suelos y mantener una buena calidad del agua, se agregan las acciones de apoyo para el acondicionamiento de suelos (subsoleo y terraceo), y desarrollo de obras de control de escurrimientos (presas de gavión, zanjas, trincheras), los trabajos inherentes a la reforestación, acciones de mantenimiento y protección (brechas corta fuego, cercado, cajeteo, deshierbe, poda, fertilización, riego de auxilio, control de plagas, entre otras); así como una constante supervisión y monitoreo de las áreas reforestadas para asegurar su sobrevivencia.",31);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010201","Pavimentación de calles","E","Incluye el conjunto de acciones encaminadas a reducir el rezago en materia de pavimentación de calles en el territorio estatal.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010202","Participación comunitaria para el mejoramiento urbano","K","Engloba las acciones tendientes a reducir el rezago existente en obras de equipamiento urbano, mejorar la imagen urbana y dotar de servicios públicos básicos a la población, con el apoyo de los diferentes sectores de la comunidad.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010203","Guarniciones y banquetas","K","Incluye las actividades encaminadas a mejorar la imagen urbana de las comunidades e incrementar los niveles de seguridad en zonas de alto riesgo para los peatones; así mismo reducir el rezago existente en la construcción de guarniciones y banquetas.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010204","Construcción y remodelación de plazas cívicas y jardines","K","Contiene las acciones relativas a la construcción y remodelación de plazas cívicas y jardines, con el fin de conservar y mantener un constante y óptimo funcionamiento de este servicio.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010301","Construcción de vialidades urbanas","K","Comprende aquellas acciones orientadas a fortalecer el equipamiento e infraestructura urbana en el municipio, mediante la construcción de vialidades urbanas para el transporte público y asimismo contribuir al desarrollo de la entidad.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010302","Rehabilitación de vialidades urbanas","K","Contiene el conjunto de acciones encaminadas a fortalecer el equipamiento e infraestructura urbana en el municipio, mediante la rehabilitación de las vialidades urbanas existentes.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010303","Equipamiento de vialidades urbanas","K","Contempla las acciones encaminadas a fortalecer la infraestructura urbana en el municipio, mediante el equipamiento de las vialidades urbanas existentes.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010401","Construcción y ampliación de edificaciones urbanas","K","Comprende aquellas acciones tendientes a ampliar la cantidad y calidad de los espacios públicos destinados para la atención a la ciudadanía, respecto de los servicios que requieren los habitantes; es decir la construcción de edificios públicos.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010402","Rehabilitación de edificaciones urbanas","K","Consiste en las acciones encaminadas a fortalecer el equipamiento e infraestructura urbana en el municipio, mediante la rehabilitación de edificaciones urbanas existentes.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010502","Proyectos para obras públicas","K","Integra acciones para elaborar y desarrollar proyectos que tengan que ver con el establecimiento de las normas técnicas de construcción de obras y la realización y ejecución de las mismas, para contribuir al incremento de la infraestructura urbana municipal.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020201010503","Control y supervisión de obras públicas","K","Comprende acciones encaminadas a controlar las actividades relacionadas con la elaboración de programas, estudios y proyectos para obras públicas, y la vigilancia para garantizar el cumplimiento en la realización de las obras públicas asignadas.",32);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020202010101","Promoción a la participación comunitaria","S","Incluye estrategias de desarrollo comunitario que impulsa procesos de organización y participación comunitaria para mejorar las condiciones de vida de los grupos de desarrollo ubicados en localidades de alta y muy alta marginación.",33);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020202010102","Apoyo a la comunidad","E","Incluye las actividades que permiten otorgar apoyos, la adquisición y suministro de bienes materiales y de servicios, la realización de acciones y obras sociales promovidas en las comunidades a través de los legisladores, sus grupos parlamentarios o las regidurías.",33);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020203010201","Construcción de infraestructura para agua potable","K","Comprende las acciones dirigidas a dotar a la población de agua potable en cantidad y calidad para su consumo, así como programar, organizar y gestionar la construcción, rehabilitación y ampliación de la infraestructura hidráulica para el servicio de agua potable.",34);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020203010203","Agua limpia","E","Contiene aquellas acciones que permiten garantizar que el agua potable que se suministra a la población del municipio cumpla con los parámetros de calidad establecidos para el consumo humano.",34);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020203010204","Cultura del agua","F","Incluye el conjunto de acciones dirigidas a concientizar a la población en el uso eficiente y ahorro del agua, a través de eventos y de los distintos medios de comunicación, en donde participen los tres ordenes de gobierno y el sector educativo para inculcar los valores de responsabilidad y respeto al uso del agua.",34);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020203010205","Operación y mantenimiento de infraestructura hidráulica para el suministro de agua","S","Engloba las acciones encaminadas a ejecutar los lineamientos para la operación y el mantenimiento preventivo y correctivo de la infraestructura hidráulica, así como la rehabilitación de sus fuentes de abastecimiento.",34);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020204010201","Alumbrado público","E","Incluye aquellas acciones orientadas a satisfacer las necesidades de alumbrado público de la población, mediante la promoción del servicio y mantenimiento de los equipos respectivos; así mismo reducir el consumo de energía en las instalaciones de alumbrado público, utilizando tecnología de punta.",35);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020205010101","Mejoramiento de la vivienda","K","Comprende aquellas acciones que tienen como propósito fomentar la participación coordinada de los sectores público, social y privado en la ejecución de acciones de mejoramiento de vivienda, que puedan ser aplicadas por medio de proyectos dirigidos a la población de menores ingresos, incluyendo a quienes se han limitado a autoconstruir de manera gradual su vivienda, con el propósito de contribuir al mejoramiento de las condiciones de habitabilidad, seguridad e higiene que requiere todo ser humano.",36);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020206010101","Modernización del comercio tradicional","K","Comprende el conjunto de acciones orientadas al desarrollo de actividades tendientes a impulsar la modernización operativa y de infraestructura de abasto y comercio; es decir, brindar capacitación y asesoría técnica en materia de construcción, rehabilitación, ampliación y consolidación de mercados públicos, explanadas comerciales y rastros con la participación de los niveles de gobierno federal, estatal y municipal; incluyendo al sector privado.",37);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020206010201","Abasto social de productos básicos","E","Contempla las acciones de aseguramiento del suministro de productos básicos a precios accesibles, en apoyo a la economía de las familias de escasos recursos para elevar la disponibilidad de productos principalmente alimenticios. También incluye las acciones de respuesta oportuna a las demandas que en materia de abasto social de productos básicos que formule la ciudadanía.",37);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020206010301","Coordinación para la conservación de parques y jardines","E","Contiene las acciones de apoyo para que los municipios puedan mantener en buen estado de uso las áreas verdes y espacios recreativos naturales de las comunidades y centros de población.",37);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020206010302","Coordinación para servicios de administración y mantenimiento de panteones","E","Incluye las acciones municipales y aquellas que son coordinadas con el Gobierno Estatal que apoyan la implementación y actualización de instrumentos administrativos, asimismo incorpora aquellas necesarias para la conservación de los panteones, con el propósito de ofertar un servicio de calidad.",37);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020206010303","Coordinación para servicios de administración y mantenimiento de rastros","E","Contiene las actividades propias de los municipios y aquellas que son coordinadas con el Gobierno Estatal que apoyan los procesos de administración, mantenimiento preventivo y rehabilitación de las instalaciones dispuestas para el sacrificio de ganado en los rastros.",37);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020206010304","Coordinación para servicios de administración y mantenimiento de mercados y centrales de abasto","E","Contiene actividades propias de los municipios y aquellas que son coordinadas con el Gobierno Estatal que apoyan el fortalecimiento de los servicios de administración y el propio mantenimiento de las instalaciones dedicadas a la comercialización de productos y que operen en condiciones óptimas.",37);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020301010101","Medicina preventiva","S","Comprende las acciones enfocadas a la aplicación de biológicos, para disminuir las enfermedades prevenibles por vacunación y preservar el estado de salud de la población.",38);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020301010102","Vigilancia y blindaje epidemiológico","S","Incluye las acciones de apoyo al monitoreo y generación de información que permiten detectar y afrontar situaciones epidemiológicas críticas y los efectos en la salud provocados por desastres naturales que pongan en riesgo a la población; fomentando la coordinación, de acciones que permitan mejorar la toma de decisiones para contener adecuadamente una posible epidemia, endemia o cualquier otra amenaza local y global contra la salud.",38);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020301010201","Promoción de la salud","S","Incluye acciones enfocadas a mantener informada a la población sobre los temas relacionados con el autocuidado de la salud que contribuyan a la disminución de enfermedades.",38);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020301010202","Prevención de las adicciones","S","Engloba aquellas acciones de prevención a través de la promoción y la enseñanza de herramientas que permitan crear conciencia en la población sobre la importancia de evitar el uso y consumo de situaciones psicotrópicas.",38);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020301010203","Entornos y comunidades saludables","S","Incorpora las acciones de apoyo para combatir los problemas que amenazan la salud integral de las personas, familias y comunidades, al fortalecer las conductas saludables que benefician a su población, todo esto a través de la promoción de políticas públicas que fomenten la creación de entornos favorables a la salud y refuercen el poder de las comunidades sobre los determinantes de su salud",38);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020302010111","Apoyo municipal a la prestación de servicios de salud para las personas","S","Engloba todas las acciones que resulten en apoyo municipal al desarrollo en materia de infraestructura, equipamiento, apoyo directo a pacientes, atención médica o de diagnóstico con fines médicos, materiales y suministros, o subsidios otorgados para proporcionar servicios de salud de las personas.",39);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020401010101","Promoción y fomento de la cultura física","F","Integra las acciones enfocadas a promover, organizar y fomentar a través de los diferentes programas municipales, estatales y federales, los programas de activación física y eventos de recreación comunitaria entre la población e instituciones sociales, con la finalidad de detectar talentos deportivos en distintas disciplinas y acercarlos a los apoyos estatales y/o federales.",40);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020401010102","Fomento de las actividades deportivas recreativas","F","Incluye las acciones orientadas a apoyar a las asociaciones deportivas y deportistas estatales en su participación en eventos nacionales e internacionales; así como detectar y apoyar a niños y jóvenes que presenten aptitudes sobresalientes en las disciplinas deportivas y coordinar acciones con las asociaciones deportivas de la entidad para hacer más eficiente el desempeño de los deportistas.",40);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020401010201","Impulso y fortalecimiento del deporte de alto rendimiento","F","Comprende acciones para establecer en el deporte de alto rendimiento, programas de atención y apoyo para atletas, entrenadores, directivos y personal de soporte, considerando los resultados obtenidos y asesorar, evaluar y controlar los programas de entrenamiento y competencias de los deportistas y entrenadores que les permita elevar su nivel competitivo.",40);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020402010101","Servicios culturales","F","Engloba las actividades que se enfocan a presentar una amplia gama de eventos artístico-culturales en los diversos espacios municipales, coadyuvando así a la promoción y difusión de las bellas artes en la población.",41);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020402010102","Difusión de la cultura","F","Comprende aquellas actividades enfocadas a promover y difundir al interior y exterior del municipio las expresiones artísticas y culturales representativas de éstos ámbitos.",41);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020404010102","Participación ciudadana","E","Incluye acciones para impulsar la participación ciudadana como eje fundamental del desarrollo político, económico y social de los municipios, así mismo fortalecer la cultura política democrática, a través de la promoción y discusión de ideas con representantes de órganos de participación ciudadana, organizaciones sociales y ciudadanía en general.",42);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020501010106","Apoyo municipal a la educación básica","S","Engloba todas las acciones que resulten en apoyo municipal al desarrollo en materia de infraestructura, equipamiento, apoyo directo a alumnos y/o profesores, materiales y suministros, o subsidios otorgados a la educación de tipo básica",43);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020502010105","Apoyo municipal a la educación media superior","S","Engloba todas las acciones de apoyo municipal al desarrollo en materia de infraestructura, equipamiento, apoyo directo a alumnos y/o profesores, materiales y suministros, o subsidios otorgados a la educación de tipo medio superior.",44);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020503010105","Apoyo municipal a la educación superior","S","Engloba todas las acciones de apoyo municipal al desarrollo en materia de infraestructura, equipamiento, apoyo directo a alumnos y/o profesores, materiales y suministros, o subsidios otorgados a la educación de tipo superior, incluyendo posgrado.",45);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020505010101","Alfabetización y educación básica para adultos","S","Engloba las acciones necesarias para ofrecer a la población de 15 años o más en situación de rezago educativo, la oportunidad de realizar estudios de primaria y secundaria, mediante opciones educativas flexibles y acordes con sus necesidades, de manera que alienten su superación personal, familiar y social.",46);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020505010102","Capacitación no formal para el trabajo","S","El proyecto engloba las acciones tendientes a proporcionar capacitación a la población de 16 años o más, con el propósito de que puedan incorporarse al mercado laboral o auto emplearse en mejora de la economía familiar.",46);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020506030101","Desayunos escolares","E","Incluye acciones de los Sistemas Municipales DIF enfocadas a la mejora del estado de nutrición de los niños en edad preescolar y escolar que sean diagnosticados con desnutrición o en riesgo, a través de la entrega de desayunos escolares fríos o raciones vespertinas en planteles escolares públicos, ubicados principalmente en zonas indígenas, rurales y urbano marginadas del territorio Estatal.",47);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020506030102","Desayuno escolar comunitario","E","Comprende actividades de distribución de paquetes de insumos alimentarios en centros escolares públicos de educación básica beneficiados, para que durante los días hábiles del ciclo escolar, los padres de familia preparen el desayuno caliente a los menores.",47);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020605010101","Estudios nutricionales","E","Abarca el conjunto de acciones para coordinar el seguimiento y vigilancia nutricional, y promover estudios y definición de hábitos alimenticios de la población",48);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020605010102","Dotación alimenticia a población marginada","S","Incluye acciones enfocadas a proporcionar apoyo alimentario y complementarias de orientación nutricional a familias con mayor índice de marginación o pobreza multidimensional, para contribuir así a mejorar su economía.",48);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020605010103","Cultura alimentaria","E","Incluye las actividades que orientan y fomentan el consumo de una alimentación nutritiva y balanceada, rescatando las tradiciones y el consumo de alimentos propios de las distintas regiones del territorio estatal, fortaleciendo la seguridad alimentaria.",48);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020605010104","Asistencia alimentaria a familias","S","Considera las acciones de capacitación que se les proporciona a las personas que habitan en zonas preferentemente de alta y muy alta marginación, para que generen sus propios alimentos, mediante la realización de proyectos productivos, de especies menores, los cuales además les pueden generar la obtención de algún ingreso.",48);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020605010105","Huertos familiares","S","Incluye las acciones de capacitación hortoflorícola y de proyectos productivos autosustentables, mediante la entrega de insumos, para el establecimiento de huertos familiares comunitarios y/o proyectos productivos sustentables, que genere la producción de alimentos para el autoconsumo y/o comercialización, dando prioridad a las comunidades de alta y muy alta marginación en el territorio estatal.",48);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020607010101","Concertación para el desarrollo de los pueblos indígenas","P","Engloba todas aquellas actividades que se enfocan a coordinar y concertar con instancias del sector público y privado, la ejecución de acciones que coadyuven a elevar el nivel de vida de la población de las comunidades indígenas, con pleno respeto a su identidad cultural.",49);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020607010102","Capacitación a población indígena","E","Incluye aquellas acciones que se enfocan a capacitar a la población de los pueblos indígenas, para integrarlos al proceso productivo en los tres sectores de la economía, a fin defortalecer sus ingresos familiares y elevar sus condiciones de vida.",49);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020607010103","Proyectos de desarrollo en comunidades indígenas","K","Contempla actividades enfocadas a la promoción y financiamiento de proyectos para disminuir los rezagos en servicios e incorporar a los habitantes de las comunidades indígenas a un trabajo que les permita la obtención de ingresos.",49);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020607010104","Difusión y protección de las manifestaciones y el patrimonio cultural de los pueblos indígenas","E","Engloba las acciones enfocadas a la asistencia, promoción, difusión y protección de los espacios que pertenecen a la población de comunidades indígenas donde se desarrollan actividades culturales.",49);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608010103","Detección y prevención de niños en situación de calle","S","Engloba aquellas actividades que se enfocan a retirar de la calle y sitios públicos a los menores de edad que viven y trabajan en éstos lugares, tratando de reincorporarlos al seno familiar y a la educación formal. Asimismo, comprende las acciones enfocadas a la prevención de riesgos asociados al trabajo infantil, tales como adicciones y explotación laboral o sexual.",50);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608010104","Niñas, niños y adolescentes repatriados y en riesgo de migración","S","Engloba aquellas actividades coordinadas entre los Sistemas Municipales DIF y el DIF Estatal, encaminadas a la prevención de los riesgos asociados a la migración, así como la atención de las necesidades de los niños, niñas y adolescentes migrantes y repatriados que viajan solos, así como la atención de la problemática colateral a que están expuestos, incluye la promoción de acciones coordinadas de protección y contención familiar y comunitaria con organizaciones sociales civiles.",50);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608010105","Promoción de la participación infantil y adolescente","S","Engloba aquellas actividades orientadas a fomentar y difundir los derechos de los niños, niñas y adolescentes, con el objeto de que cuenten con las herramientas necesarias para su conocimiento, defensa y ejercicio de sus derechos e impulsar en ellos los valores de igualdad, democracia, respeto, tolerancia y amor a la patria, asimismo incluye las acciones para garantizar y proteger el pleno goce, respeto, protección y promoción de sus derechos humanos y todas las funciones conferidas al Ejecutivo Estatal por la Ley de los Derechos de Niñas, Niños y Adolescentes del Estado de México.",50);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608020102","Orientación e información sobre discapacidad","E","Incluye las actividades coadyuvantes en la prevención y disminución de la incidencia- prevalencia de las enfermedades y lesiones que conllevan a la discapacidad.",51);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608020201","Capacitación a personas con discapacidad","S","Engloba las acciones para promover la integración de personas con discapacidad a actividades de educación, la apertura de espacios laborales, así como el fortalecimiento de acciones que permitan el autoempleo para personas con discapacidad y por consecuencia al desarrollo de las actividades culturales, deportivas y recreativas.",51);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608020202","Promoción para el trabajo productivo de personas con discapacidad","E","Incorpora las actividades que promueven la apertura de espacios laborales, así como la creación de microempresas que permitan el empleo o autoempleo para personas con discapacidad.",51);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608020301","Atención especializada, médica y paramédica a personas con discapacidad","E","Incluye las acciones destinadas a brindar atención médica y paramédica especializada a la población con discapacidad física, mental y sensorial, que carezca de seguridad social.",51);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608020302","Atención terapéutica a personas con discapacidad","S","Comprende las actividades tendientes a proporcionar atención especializada de carácter terapéutico, físico, ocupacional y de lenguaje a personas con discapacidad, para lograr su rehabilitación en forma integral.",51);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608030102","Asistencia social a los adultos mayores","S","Incluye acciones enfocadas a proporcionar atención integral al adulto mayor de escasos o nulos recursos como son consultas médicas, asesoría jurídica, y atención psicológica.",52);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608030201","Vida activa para el adulto mayor","E","Engloba las acciones dirigidas a crear espacios adecuados para los adultos mayores en donde sea posible realizar actividades recreativas, deportivas, educativas, proyectos productivos y talleres de manualidades de acuerdo a las necesidades de cada región.",52);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608040101","Fomento a la integración de la familia","S","Contempla las acciones para otorgar atención, orientación y asesoría a familias sobre los procesos físicos, psicológicos, biológicos y sociales, mediante diversas actividades para mejorar la calidad de vida de sus integrantes en la esfera personal y de grupo familiar, y establecer proyectos de vida más eficaces.",53);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608040102","Atención a víctimas por maltrato y abuso","E","Incluye las acciones para brindar atención integral a menores, personas con discapacidad, adultos mayores, mujeres y hombres que hayan sido víctimas y/o generadores de maltrato, así como a sus familias, a través de un grupo de profesionales en el área médica, psicológica, jurídica y social.",53);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608040103","Servicios jurídico asistenciales a la familia","E","Contiene las acciones relacionadas con la orientación y asesoría jurídica a hombres y mujeres en situación de vulnerabilidad, en donde no se vean comprometidos de manera directa o indirecta los derechos de niñas, niños y adolescentes y/o adultos mayores; a fin de salvaguardar sus derechos y garantizar una sana convivencia al interior del núcleo familiar.",53);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608040106","Orientación y atención psicológica y psiquiátrica","E","Incluye aquellas actividades enfocadas a disminuir la aparición de trastornos emocionales y conductuales en la población, tratando de incidir en las causas familiares, individuales y sociales; incorpora las acciones orientadas a la atención de enfermedades mentales.",53);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608050101","Coordinación Institucional para la igualdad de género","E","Incluye las acciones realizadas por los gobiernos municipales, que deriven de la 'Ley de Igualdad de Trato y Oportunidades entre Mujeres y Hombres del Estado de México'; dirigidas a fortalecer el goce, respeto, protección y promoción de los derechos y el desarrollo integral de las mujeres y los hombres.",54);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608050102","Cultura de igualdad y prevención de la violencia de género","F","Incorpora las actividades enfocadas a promover, fomentar y consolidar la igualdad de derechos entre hombres y mujeres, a través de valores de convivencia y ayuda mutua, para contribuir a mejorar la situación social.",54);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608050103","Atención social y educativa para hijos de madres y padres trabajadores","S","Incluye las actividades referentes a la operación de estancias, guarderías y jardines de niños con servicio de comedor, para hijos de madres trabajadoras.",54);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608050104","Apoyo social para el empoderamiento económico de la mujer","S","Comprende aquellas acciones encaminadas a reconocer el trabajo no remunerado que realizan las mujeres como amas de casa y tomar acciones para combinar esta tarea con el empleo remunerado.",54);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608060102","Bienestar y orientación juvenil","E","Engloba las acciones orientadas a atender las necesidades de desarrollo y bienestar de los jóvenes, así como la orientación con temas relacionados con la prevención de adicciones, acoso escolar (bullying); salud reproductiva y sexual.",55);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608060103","Promoción del desarrollo integral del adolescente","F","Incorpora las actividades de promoción que permiten brindar más y mejores oportunidades a los jóvenes para alcanzar su pleno desarrollo en una forma integral, con el fin de que se incorporen a los diferentes ámbitos de la sociedad.",55);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608060104","Atención integral para la reducción del embarazo adolescente","S","Comprende las acciones enfocadas a difundir, asistir y prevenir el embarazo en los adolescentes en la sociedad, concientizándolos en la afectación del embarazo no deseado, por temas de salud, educación, proyecto de vida, relaciones sociales y culturales, así como en la economía.",55);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608060105","Atención integral a la madre adolescente","S","Incluye las acciones orientadas a mejorar la salud de manera integral, (conjunta educación sexual, salud reproductiva y servicios asistenciales), incluye capacitación en y para el trabajo, así como opciones educativas, para coadyuvar a mejorar las oportunidades de desarrollo de las madres adolescentes.",55);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608060201","Expresión juvenil","E","Comprende las acciones dirigidas a los jóvenes con la finalidad de reconocer su talento creando espacios de participación y expresión social, cultural y política.",55);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("020608060202","Asistencia social a la juventud","E","Contempla las acciones encaminadas a disminuir los rezagos más apremiantes para la juventud y su comunidad mediante la realización de brigadas de trabajo comunitario que atienda a sus necesidades y asimismo permita su inclusión y participación en la aportación de sus conocimientos y habilidades la solución a problemas locales.",55);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030102010202","Colocación de trabajadores desempleados","E","Comprende las acciones de atención a la población desocupada, subocupada y buscadores activos de empleo, facilitándoles princ ipalmente su vinculación y colocación mediante los servicios de bolsa de empleo, ferias de empleo y medios de difusión de los servicios y programas específicos.",56);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030102010203","Fomento para el autoempleo","S","Abarca las acciones de apoyo a personas desempleadas con experiencia laboral que sean buscadores activos de empleo, con deseos de emplearse o auto emplearse.",56);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030102010301","Capacitación, adiestramiento y productividad en el trabajo","E","Incluye las acciones encaminadas a formar profesionistas y técnicos, a través de la impartición de diplomados, cursos de profesionalización y capacitación.",56);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030102030101","Capacitación de la mujer para el trabajo","E","Comprende aquellas acciones de capacitación para el trabajo que se les proporciona a mujeres, principalmente para aquellas que se encuentran en desventaja económica, mediante las escuelas técnicas que operan en los Sistemas Municipales DIF, con el propósito de que puedan obtener ingresos económicos para mejorar sus condiciones de vida.",57);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030102030102","Proyectos productivos para el desarrollo de la mujer","S","Engloba las actividades de diseño, promoción y asistencia técnica para el desarrollo de proyectos productivos, que permitan a las mujeres obtener ingresos económicos o beneficios que apoyen su bienestar.",57);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030102030103","Proyectos de inclusión financiera e igualdad salarial para la mujer","F","Comprende aquellas acciones encaminadas a promover la capacidad de las mujeres en asegurar la propiedad de bienes, participar en el aparato productivo y en las instituciones, así como ser sujeto de las políticas públicas que determinen su desarrollo integral, impulsando su inclusión financiera.",57);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030201010201","Apoyos especiales a productores agrícolas","K","Incluye acciones de apoyo a los productores; contribuyendo a mejorar la calidad en la producción agrícola.",58);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030201020201","Fomento a proyectos de producción rural","F","Engloba las actividades de apoyo en forma subsidiada y acompañamiento a pequeños y medianos productores para la adquisición de equipo que permita la recapitalización de la actividad agropecuaria en sus distintas etapas; así como el establecimiento y fortalecimiento de las micro unidades familiares de traspatio, que incorporen a la mujer campesina al proceso productivo; también ofrece modelos probados que permitan diversificar la producción agropecuaria e inicie al productor en actividades que incorporen valor a la producción primaria.",59);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030201030105","Desarrollo de capacidades pecuarias","F","Integra acciones como el subsidio para la contratación de profesionales y técnicos promotores de desarrollo agropecuario, para el desarrollo de proyectos productivos por beneficiario, fomentando el desarrollo regional que impulse la formación de cuencas productivas vía módulos de producción pecuaria; proporcionando simultáneamente asistencia técnica, capacitación y transferencia de tecnología.",60);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030201040104","Acciones municipales de apoyo a la sanidad, inocuidad y calidad agroalimentaria","E","Comprende el conjunto de acciones de apoyo municipal para el desarrollo del muestreo, diagnóstico, control y erradicación de enfermedades que ponen en riesgo la producción agrícola, acuícola y pecuaria, así como el apoyo y acompañamiento a las unidades de producción para que apliquen manuales de buenas prácticas; asimismo engloba las actividades que permiten dar garantía de que los productos agropecuarios cumplan con los estándares de calidad que garanticen su inocuidad y legitimidad; comprende las acciones de apoyo para la trazabilidad y control de la movilización de productos agropecuarios.",61);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030202010103","Organización y capacitación de productores forestales","F","Incorpora las acciones de capacitación y organización de los productores forestales a núcleos agrarios, pequeños productores y permisionarios de aprovechamientos forestales, para integrarlos en esquemas de organización para tener mayores beneficios de sus recursos naturales, incluye la asesoría y vinculación con instancias estatales y federales para la celebración de asambleas o reuniones con productores forestales, además de promover la educación y cultura forestal en la población",62);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030202010104","Desarrollo de proyectos productivos en zonas forestales","F","Engloba las acciones tendientes a incrementar la oferta de empleos e ingresos de los dueños o poseedores de los bosques, promoviendo el valor agregado a la materia prima forestal mediante la instalación de industria forestal, además de asociar el aprovechamiento integral de todos los recursos naturales de que dispongan los productores forestales (agrícola, pecuario, acuícola, ecoturismo, materiales pétreos, etc.), por lo que atenderá la identificación, gestión, asesoría y acompañamiento para la elaboración de proyectos y su financiamiento, así como la puesta en marcha en su caso.",62);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030202010107","Plantaciones forestales de administración municipal","F","Incluye las acciones orientadas a la producción de árboles en cantidad y calidad, de las especies que se requieren para abastecer los programas de forestación, reforestación y plantaciones forestales comerciales; considerando asegurar la disponibilidad de semilla para la producción de la planta y su mantenimiento hasta lograr la talla óptima para su salida a plantación, llevando a cabo los procesos de riego fertilización, deshierbe, prevención y combate de plagas, enfermedades y control de las heladas.",62);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030203010102","Capacitación para la producción acuícola","F","Contempla el establecimiento de acciones de asistencia técnica y capacitación para productores acuícolas, asimismo incluye las acciones de vinculación y gestión con instancias estatales y federales para la impartición de capacitación y asistencia técnica a productores acuícolas.",63);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030203010103","Acuicultura rural","F","Comprende las acciones que contribuyen al incremento de los bienes de capital de producción acuícola al interior del territorio que conforma el estado, se engloban los apoyos y el acompañamiento ante instancias estatales y federales que otorgan beneficios a productores rurales para la adquisición de jaulas flotantes, módulos acuícolas, equipos acuícolas, medidas de bioseguridad y elaboración de proyectos productivos estratégicos.",63);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030206010101","Seguro agropecuario y otros servicios financieros","L","Se refiere a las acciones orientadas a la protección integral al sector agropecuario, como instrumento eficiente de política pública para impulsar la cultura financiera preventiva que favorezca el desarrollo sostenible a pesar de externalidades negativas que pudiesen comprometer la producción agropecuaria al interior del territorio que conforma el estado.",64);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030305010102","Ahorro de energía","E","Comprende el conjunto de operaciones orientadas a garantizar la atención de la demanda futura de energía eléctrica, mediante la ampliación de la infraestructura ecológica y sustentable; así mismo incluye las acciones para fomentar el ahorro y uso eficiente de la energía, incluye las acciones para ampliar la infraestructura y el involucramiento de instituciones prestadoras de servicios de electrificación y alumbrado público.",65);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030305010103","Electrificación urbana","E","Incluye aquellas acciones dirigidas a atender la demanda actual y el rezago en el servicio eléctrico domiciliario; así mismo, mejorar la calidad del servicio eléctrico en aquellas zonas donde se presentan deficiencias, y promover la creación de comités pro- electrificación, con el fin de agilizar y dar seguimiento hasta su conclusión de los trámites ante las instancias responsables de la introducción del servicio.",65);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030305010104","Electrificación rural","E","Comprende el conjunto de acciones, encaminadas a atender la demanda actual y el rezago en el servicio eléctrico domiciliario rural, asimismo aquellas acciones específicas para mejorar la calidad del servicio eléctrico zonas rurales de la entidad y las actividades para promover la creación de comités pro-electrificación diseñados para agilizar el proceso de introducción del servicio.",65);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030305010105","Electrificación no convencional","E","Comprende el conjunto de acciones destinadas a impulsar la utilización de fuentes alternas de energía, para brindar el servicio eléctrico domiciliario a aquellas comunidades a las que no es factible dotar del servicio convencional.",65);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030402010102","Fortalecimiento a la micro y pequeña empresa","F","Incorpora las acciones para la atención de micro y pequeños empresarios a través de acciones de capacitación, financiamiento, asistencia técnica, vinculación financiera y comercial con la mediana y gran industria y con otros agentes económicos que operan en la entidad.",66);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030402010103","Fortalecimiento a la competitividad","F","Incluye las acciones y procedimientos diseñados para favorecer el desarrollo de la competitividad de las empresas establecidas en el territorio mexiquense, asimismo aquellas que favorezcan la productividad laboral, apoyen la captación de capital, la transferencia de tecnología y la capacitación encaminada a mejorar la productividad laboral.",66);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030501010105","Apoyo municipal a las políticas para el desarrollo del transporte","P","Incluye las acciones municipales de apoyo, coordinación intergubernamental e implementación de la política de transporte terrestre estatal.",67);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030501030201","Construcción de carreteras alimentadoras","K","Implica acciones tendientes a integrar un banco de estudios y proyectos, que garanticen factibilidad de las obras, actualizar la normatividad técnica y atender los requerimientos para la construcción de las vialidades.",68);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030501030206","Construcción y rehabilitación de puentes en carreteras","K","Incluye las acciones para evaluar las condiciones físicas de los puentes peatonales, así como aquellas para construir, reconstruir y rehabilitarlos para mejorar la seguridad y circulación peatonal y vehicular.",68);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030501030402","Construcción y modernización de vialidades primarias","K","Incluye acciones para mejorar las características de la superficie de rodamiento, la ampliación de las vialidades y su equipamiento, tendientes a ofrecer mejores niveles de servicio e incrementar la infraestructura de la red vial primaria, con el objeto de atender la demanda de movilidad de la población de los centros urbanos.",68);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030501030403","Construcción y rehabilitación de puentes en vialidades","K","Incluye acciones para evaluar las condiciones físicas de los puentes peatonales, así como aquellas dirigidas a construir, reconstruir, rehabilitar y equipar los puentes para circulación peatonal.",68);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030701010101","Promoción e información turística","F","Comprende las acciones para posicionar los destinos turísticos del municipio, a través de la promoción y difusión de sus atractivos, que den como resultado una importante derrama económica y la generación de empleos.",69);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030701010102","Difusión y apoyo para la comercialización turística","F","Se refiere a las acciones que realiza el gobierno municipal y empresarios para crear instrumentos de comercialización turística y canalizar recursos financieros a este sector, con la operación de fondos mixtos de promoción turística y la edición de material para promoción turística del municipio a nivel regional, nacional e internacional.",69);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030701010201","Gestión y desarrollo de productos turísticos","K","Considera acciones tendientes al impulso del desarrollo de nuevos productos turísticos con estándares de calidad nacional e internacional, que sean elementos básicos para la promoción del atractivo turístico del municipio.",69);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030801010101","Fomento a la investigación científica y formación de recursos humanos","F","Integra todas las acciones municipales de apoyo para el desarrollo y consolidación de la investigación científica de calidad, apoyando de forma prioritaria a proyectos que coadyuven a la solución de la problemática económica y social; así como la formación y capacitación del capital humano y el apoyo a vocaciones científicas para incentivar el interés por la ciencia y la tecnología en los sectores estratégicos.",70);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030903010102","Organización, capacitación y asesoría financiera","F","Incluye las acciones para fomentar la integración de artesanos en organizaciones formalmente constituidas, para realizar eventos de capacitación que contribuyan al desarrollo integral del sector artesanal, y las acciones para promover las distintas fuentes de financiamiento a las que los artesanos pueden acceder.",71);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("030903010202","Promoción y fomento artesanal","F","Comprende las acciones municipales de apoyo para incremento de las ventas y expectativas del mercado y comercialización de productos artesanales con la participación directa de artesanos principalmente en ferias y exposiciones de carácter estatal, nacional e internacional e impulsar las acciones orientación, asesoría, organización y acompañamiento a artesanos para gestión de financiamiento a proyectos de producción artesanal.",71);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("040101010202","Amortización de la deuda (capital)","D","Considera las erogaciones que implica el pago total o parcial de un empréstito de origen interno o ex terno otorgado al sector público amparado por un título de crédito, convenio o contrato. La deuda del sector público comúnmente se amortiza en el largo plazo mediante pagos periódicos.",72);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("040101010203","Costo financiero de la deuda (intereses)","D","Incluye acciones orientadas a radicar gradualmente el servicio de la deuda, con el propósito de que los recursos obtenidos se destinen a la inversión pública productiva, y mantener el perfil de vencimiento en los plazos más convenientes para atender presiones presupuestales.",72);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("040201010103","Convenios de coordinación","C","Se refiere a las acciones que se llevan a cabo con las con la federación, para celebrar convenios en términos de la Ley de Coordinación Fiscal vigente.",73);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("040201010104","Transferencias del ayuntamiento a organismos municipales","E","Incluye el registro de las transferencias realizadas por los ayuntamientos a los organismos municipales para objetivos diversos.",73);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("040401010101","Pasivos derivados de erogaciones devengadas y pendientes de ejercicios anteriores","H","Contiene las acciones que se realizan para la erogación de recursos correspondientes al pago de adeudos que se adquirieron en ejercicios distintos al actual.",74);
INSERT INTO proyectos (codigo_proyecto, nombre_proyecto, conac, descripcion, id_programa) VALUES("040401010102","Pasivos por contratación de créditos","H","Integra las acciones que se realizan los ayuntamientos con el objeto de atender el pasivo de los créditos de corto plazo pagaderos en el mismo año, créditos para organismos descentralizados, vencimientos y refinanciamiento.",74);



DROP TABLE IF EXISTS dependencias;
CREATE TABLE dependencias(
    id_dependencia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_dependencia VARCHAR(255) NOT NULL,
    nivel VARCHAR(50),
    id_dependencia_gen INT,
    id_director INT,
    CONSTRAINT FK_dependencia_general FOREIGN KEY (id_dependencia_gen) REFERENCES dependencias_generales(id_dependencia) ON DELETE CASCADE,
    CONSTRAINT FK_director FOREIGN KEY (id_director) REFERENCES titulares(id_titular) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Presidencia",NULL,1);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Giras y Logística","Coordinación",1);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Gobierno Digital y Electrónico","Coordinación",1);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Transparencia","Unidad",1);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Comunicación Social","Coordinación",2);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Secretaría del Ayuntamiento",NULL,28);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Servicios Públicos","Dirección",36);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Igualdad de Género","Coordinación",38);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Tesorería","Dirección",43);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Desarrollo Económico, Turístico y Artesanal","Dirección",45);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Protección Civil y Bomberos","Coordinación",52);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Gobierno Por Resultados","Dirección",51);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 1",NULL,9);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 2",NULL,10);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 3",NULL,11);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 4",NULL,12);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 5",NULL,13);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 6",NULL,14);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 7",NULL,15);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 8",NULL,16);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Regiduría 9",NULL,17);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Seguridad Pública","Dirección",49);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Medio Ambiente","Dirección",35);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Defensoría Municipal de los Derechos Humanos",NULL,3);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Gobernación","Dirección",41);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Educación","Dirección",47);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Desarrollo Urbano","Dirección",33);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Obras Publicas","Dirección",33);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Desarrollo Social","Dirección",39);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Cultura","Dirección",47);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Administración","Dirección",29);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Contraloría Interna Municipal",NULL,42);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Consejería Jurídica Municipal",NULL,44);
INSERT INTO dependencias (nombre_dependencia, nivel, id_dependencia_gen) VALUES ("Sindicatura Municipal",NULL,5);



DROP TABLE IF EXISTS areas;
CREATE TABLE areas(
    id_area INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_area VARCHAR(255) NOT NULL,
    id_dependencia INT,
    id_dependencia_general INT,
    id_dependencia_aux INT,
    id_proyecto INT,
    id_titular INT,
    CONSTRAINT FK_area_dependencia_general FOREIGN KEY (id_dependencia) REFERENCES dependencias(id_dependencia) ON DELETE CASCADE,
    CONSTRAINT FK_area_clave_general FOREIGN KEY (id_dependencia_general) REFERENCES dependencias_generales(id_dependencia) ON DELETE CASCADE,
    CONSTRAINT FK_dependencia_auxiliar FOREIGN KEY (id_dependencia_aux) REFERENCES dependencias_auxiliares(id_dependencia_auxiliar) ON DELETE CASCADE,
    CONSTRAINT FK_proyeto FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto) ON DELETE CASCADE,
    CONSTRAINT FK_area_titular FOREIGN KEY (id_titular) REFERENCES titulares(id_titular) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Secretaria Particular",1,1,1,36);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Geo Informática",3,1,1,55);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Gobierno Digital y Electrónico",3,1,1,59);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Oficina de Presidencia",1,1,2,36);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Logística de la Oficina de Presidencia",2,1,2,57);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Sistemas",3,1,2,59);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Transparencia",4,1,23,58);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Soporte Técnico",3,1,38,59);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Análisis Monitoreo de la Coordinación de Comunicación Social de Metepec",5,2,1,57);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Producción Multimedia de la Coordinación de Comunicación Social de Metepec",5,2,1,59);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Secretaria Técnica de la Coordinación de Comunicación Social de Metepec",5,2,2,57);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Diseño e Imagen Institucional de la Coordinación de Comunicación Social",5,2,2,59);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Administración, Recursos Materiales y Logística",5,2,4,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Comunicación Social",5,2,4,57);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Información Fotógrafa y Atención a Medios de la Coordinación de Comunicación Social de Metepec",5,2,4,59);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Redes Sociales",5,2,13,57);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Defensoría Municipal de los Derechos Humanos",24,3,3,2);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Sindicatura Municipal",34,5,2,13);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 1",13,9,85,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 2",14,10,86,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 3",15,11,87,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 4",16,12,88,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 5",17,13,89,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 6",18,14,90,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 7",19,15,91,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 8",20,16,92,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Regiduría 9",21,17,93,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Asuntos Sociopolíticos",6,28,1,3);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinacion de archivo  Municipal",6,28,1,6);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Secretaria del Ayuntamiento",6,28,1,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Apoyo Técnico",6,28,1,27);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Legislación y Difusión",6,28,1,57);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección Técnica de Cabildo",6,28,2,17);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Bienes Muebles e Inmuebles",6,28,15,34);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Atención Ciudadana",6,28,49,3);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Nomina",31,29,1,31);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Concursos, Dictamen y Apoyo al Comité",31,29,1,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Arrendamientos de Bienes Inmuebles y Control Patrimonial",31,29,1,34);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de Administración",31,29,1,35);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Adjudicaciones Directas",31,29,2,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Almacén General",31,29,2,34);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Recursos Humanos",31,29,21,31);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Relaciones Laborales",31,29,21,32);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Adquisiciones y Contratación de Servicios",31,29,22,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Recursos Materiales",31,29,22,34);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Taller Mecánico",31,32,2,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Servicios Generales",31,32,22,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Apoyo a Eventos",31,32,32,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Proyectos y Normatividad de Obra",28,33,109,86);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Construcción, Supervisión y Conservación",28,33,109,87);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Operación Urbana",27,33,110,14);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Alineamiento y Control Urbano",27,33,110,15);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Planes y Proyectos",27,33,1,15);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Regularización de Tenencia de la Tierra",27,33,1,16);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de Obras Publicas",28,33,1,78);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Secretaría Técnica",28,33,2,87);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Seguimiento de Autorizaciones Urbanas",27,33,8,15);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Asuntos Jurídicos",27,33,24,13);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de Desarrollo Urbano",27,33,24,14);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Inspección",27,33,24,15);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Tenencia de la Tierra",27,33,24,16);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Movilidad",27,33,24,83);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Obra Pública",28,33,25,8);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Programación y Control Presupuestal",28,33,25,29);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Concursos, Contratos y Estimaciones",28,33,25,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Participación Comunitaría",28,33,25,78);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Guarniciones y Banquetas",28,33,25,79);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Conservación",28,33,25,82);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Estudios, Proyectos y Presupuestos",28,33,25,86);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Construcción y Supervisión de Obra",28,33,25,87);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Licencias de Construcción",27,34,110,14);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Licencias de Publicidad",27,34,8,14);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Alineamiento y Numero Oficial",27,34,8,15);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Control y Vigilancia",23,35,1,69);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento del Centro de Control Canino y Felino",23,35,30,106);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Gestión Ambiental",23,35,61,68);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de Medio Ambiente",23,35,61,69);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Limpia",7,36,112,60);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección",7,36,112,61);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Limpia",7,36,1,61);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Alumbrado Público",7,36,1,94);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Parques y Jardines",7,36,1,98);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Calidad",7,36,2,61);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Podas y Derribos",7,36,2,98);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Control y Seguimiento",7,36,21,98);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura Administrativa",7,36,22,98);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Barrido Manual",7,36,26,61);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Limpia",7,36,27,61);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Alumbrado Público",7,36,28,94);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Áreas Verdes",7,36,29,98);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Panteones",7,36,46,99);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Asesoría Jurídica y Acompañamiento",8,38,53,13);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Igualdad de Género",8,38,53,144);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento Psicológico",8,38,53,145);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Promoción Para la Igualdad de Género",8,38,53,147);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de desarrollo Social",29,39,1,88);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Vinculación Institucional",29,39,1,89);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Delegaciones, Participación y Atención Ciudadana",29,39,1,113);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Planificación Alimentaria",29,39,1,122);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Política Sectorial",29,39,2,88);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Comedores Comunitarios",29,39,2,122);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Programas Integrales",29,39,11,88);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Atención Ciudadana",29,39,13,4);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Delegaciones y Participación Ciudadana",29,39,13,113);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Programas Transversales",29,39,38,88);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Programas Federales y Estatales",29,39,38,89);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Gestión con Sector Público y Privado",29,39,40,89);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Programas Municipales",29,39,40,122);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Atención a la Juventud",29,39,44,153);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Atención a la Mujer",29,39,53,145);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Médico en tu Casa",29,40,54,107);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Verificación y Regulación del Comercio",25,41,1,96);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Gobierno en Comunidad",25,41,13,8);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Inspección",25,41,33,96);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Verificación del Comercio Establecido",25,41,38,96);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Prevención Social del Delito",25,41,45,37);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de Gobernación",25,41,45,96);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Regularización del Comercio Semifijo, Tianguis y Mercados",25,41,48,96);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subcontraloría de Auditoria e Investigación",32,42,35,7);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefe de Auditoria de Obra",32,42,36,8);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Contraloría Interna Municipal",32,42,37,7);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subcontraloría de Responsabilidades",32,42,39,10);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subcontraloría Social e Investigación",32,42,63,12);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Recaudación y Cobro Coactivo",9,43,1,22);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Tesorería",9,43,1,23);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Valuación",9,43,1,54);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Caja General",9,43,2,22);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Apoyo Técnico",9,43,2,35);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Informática",9,43,2,54);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Ingresos",9,43,16,22);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Egresos",9,43,17,30);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Presupuesto",9,43,18,29);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Catastro",9,43,19,54);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Contabilidad",9,43,20,30);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Consejería Jurídica Municipal",33,44,1,13);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Convenios y Contratos",33,44,2,13);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Oficialía Mediadora-Conciliadora",33,44,9,18);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Oficialías de Registro Civil",33,44,10,53);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Receptoría Juvenil Regional de Reintegración Social",33,44,44,148);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Contenciosos",33,44,56,13);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Oficialías Calificadoras",33,44,76,18);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Programación y Evaluación",10,45,1,27);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Difusión y Gestión Artesanal",10,45,1,186);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Dictamen de giro",10,45,2,174);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Administración del Centro de Desarrollo Artesanal",10,45,2,186);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Desarrollo Económico, Turístico y Artesanal",10,45,32,174);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Atención Empresarial",10,45,32,175);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Licencias y Permisos",10,45,33,174);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Desarrollo Económico",10,45,33,175);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Fomento Artesanal",10,45,34,186);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Capacitación y Empleo",10,45,41,154);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Fomento Turístico",10,45,50,181);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Promoción y Atracción Turístico",10,45,50,182);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento Fomento Agropecuario",10,46,31,161);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Actividades Culturales y Artísticas",30,47,1,111);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Fomento Cultural",30,47,1,112);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Instituciones Educativas",26,47,1,114);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Vinculación Interinstitucional y Elaboración de Proyectos",30,47,2,6);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento Editorial",30,47,2,112);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Normatividad y Proyectos",26,47,2,114);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Mantenimiento a Escuelas",26,47,2,115);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Casas de Cultura y Museo del Barro",30,47,11,112);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Cronista Municipal",30,47,14,112);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Fomento y Patrimonio Cultural",30,47,15,6);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Mantenimiento Escolar y Bienes Muebles e Inmuebles",26,47,25,114);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento Tecnológico",26,47,42,59);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de Educación",26,47,42,114);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Bibliotecas, Servicio Social y Practicas Profesionales",26,47,42,116);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Educación basica para Adultos",26,47,42,117);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Bienestar juvenil",26,47,42,148);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Servicios y Actividades Culturales y Festivales",30,47,51,111);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección de Cultura",30,47,51,112);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección",22,49,5,37);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Recursos Humanos",22,49,21,31);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección Administrativa",22,49,21,33);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de operación policial",22,49,21,37);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación del Centro de Mando Municipal",22,49,21,38);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Unidad de Profesionalización y desarrollo Policial",22,49,21,39);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección Seguridad Vial y Transito",22,49,55,41);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Políticas de Buen Gobierno",12,51,127,20);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Planeación y Evaluación",12,51,127,27);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación General de Monitoreo y Evaluación de Resultados",12,51,127,29);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subdirección de Desarrollo Organizacional",12,51,127,36);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Dirección General",12,51,1,29);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Mejora Regulatoria",12,51,38,35);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Departamento de Calidad e Innovación",12,51,38,36);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Verificaciones",11,52,1,46);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura de Administrativa",11,52,2,46);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Coordinación de Protección Civil y Bomberos",11,52,6,43);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Subordinación de Verificación y Normatividad",11,52,6,46);
INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto) VALUES ("Jefatura Técnca operativa",11,52,7,48);





DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
    id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    id_permiso INT NOT NULL,
    correo_electronico VARCHAR(255),
    tel VARCHAR(255),
    contrasena VARCHAR(255),
    id_dependencia INT,
    activo INT,
    CONSTRAINT FK_dependencia FOREIGN KEY (id_dependencia) REFERENCES dependencias (id_dependencia) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO usuarios VALUES (NULL, 'German', 'Guillen', 1, 'goder@live.com', '7224531128', '123456', 6, 1);


DROP TABLE IF EXISTS actividades;
CREATE TABLE actividades(
    id_actividad INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codigo_actividad VARCHAR(2) NOT NULL,
    nombre_actividad VARCHAR(500) NOT NULL,
    unidad VARCHAR(255) NOT NULL, 
    programado_anual_anterior VARCHAR(50),
    alcanzado_anual_anterior VARCHAR(50),
    id_area INT,
    id_validacion INT,
    validado INT,
    creacion DATETIME DEFAULT CURRENT_TIMESTAMP(),
    id_creacion INT,
    modificacion DATETIME, 
    id_modifiacion INT,
    CONSTRAINT FK_area FOREIGN KEY (id_area) REFERENCES areas(id_area) ON DELETE CASCADE,
    CONSTRAINT FK_id_validacion FOREIGN KEY (id_validacion) REFERENCES usuarios (id_usuario) ON DELETE CASCADE,
    CONSTRAINT FK_id_creacion FOREIGN KEY (id_creacion) REFERENCES usuarios (id_usuario) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte trimestral de Tramites de Asuntos Turnados  canalizados a las dependencias","Informe","0","0",1,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte trimestral de Tramites de Asuntos Turnados concluidos por las dependencias","Reporte","0","0",1,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de canalizacion de solicitudes ciudadanas","Reporte","0","0",1,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de atencion de solicitudes ciudadanas","Reporte","4","4",1,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de control de la agenda del Presidente Municipal","Reporte","0","0",1,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Entrega de apoyos a la ciudadania","Reporte","0","0",1,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Canalizacion de agenda del Presidente Municipal para la pregira","Reporte","0","0",1,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe de Actualización periódica de los registros administrativos","Informe","4","4",2,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Registro de Integraciòn de Mapas Tematicos","Registro","0","4",2,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Mantenimiento preventivo y correctivo al equipos informaticos.","Mantenimiento","2","2",2,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Establecimiento de convenios con otros órdenes de gobierno e instituciones inancieras para el establecimiento de recepción de pagos de los trámites electrónicos. ","Convenio","1","1",3,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Digitalización Las unidades de documentación oficial por  unidad administrativa.","Reporte","0","0",3,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Elaboración de un programa de capacitación a  los  servidores públicos municipales sobre e-gobierno.","Cronograma","4","4",3,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Impartición de capacitación sobre TIC⿿s a los servidores públicos.","Lista de Asistencia","4","4",3,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Renovación de  Cuentas de Correo Institucionales","Actualización","350","350",3,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Aplicación Metepec *7311","Aplicación","0","0",3,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Feria de Innovaciòn  tecnología y Ciencia  Metepec 2022","Evento","1","0",3,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de asistencias  a reuniones de gabinete convocadas por el Presidente Municipal .","Reporte","0","0",4,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe del seguimiento a las órdenes y acuerdos generados entre el Ejecutivo Municipal y las dependencias organismos descentralizados y órganos autónomos integrantes de la Administracion Pública Municipal.","Informe","4","4",4,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Registro del cumplimiento de los compromisos y acuerdos municipales.","Registro","0","1",4,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Gestión del cumplimiento de la respuesta de atención ciudadana a cargo de los titulares de las dependencias, organismos descentralizados y organos autónomos de la Administración Pública Municipal.","Gestion","0","1",4,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Informe de actividades de las politicas publicas y su evaluacion a cargo de las dependencias de la Administracion Municipal","Informe","3","0",4,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Registro de pre giras para preparar la logistica de los eventos sistematicos del Calendario Oficial 2022, asi como los eventos tradicionales del municipio.","Registro","0","0",5,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Registro de eventos sistematicos del Calendario Oficial 2022, asi como los eventos tradicionales del municipio.","Registro","0","0",5,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Registro de pre giras para eventos programados que cuenten con la asistencia del Presidente Municipal, que reflejen el cumplimiento de los ejes de gobierno establecidos en el Plan de Desarrollo Municipal del ejercicio 2022.","Registro","0","0",5,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Registro de eventos programados que cuenten con la asistencia del Presidente Municipal, que reflejen el cumplimiento de los ejes de gobierno establecidos en el Plan de Desarrollo Municipal del ejercicio 2022","Registro","0","0",5,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboración de un catálogo de trámites y servicios por unidad  administrativa municipal.","Registro","4","4",6,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Desarrollo e Implementación de sistemas y paginas web","Informe","0","0",6,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Actualización de paginas y sistemas Web","Informe","0","0",6,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Verificacion del portal de trasparencia IPOMEX.","Verificacion","4","4",7,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de respuestas a solicitudes de Acceso a la Informacion Publica y Derechos ARCO.","Reporte","0","0",7,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de respuestas a Recursos de Revision.","Reporte","6","6",7,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Sesiones del Comite de Transparencia.","Sesion","12","12",7,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Intregracion del Programa Anual de Sistemaizacion y Actualizacion de la Informacion 2022 INFOEM.","Programa","0","0",7,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Entrega del Informe Anual 2022 INFOEM.","Informe","1","0",7,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Capacitaciones en materia de Transparencia, Acceso a la Informacion Publica y Proteccion de Datos Personales  a los Servidores Publicos Habilitados.","Capacitacion","3","3",7,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Readecuación  del procedimiento presencial hacia procedimientos remotos","Manual","1","1",8,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Gestión adecuada de atención y mejoramiento de TICs.","Informe","1","1",8,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Modernización y actualización de la red y equipos tecnológicos","Registro","0","0",8,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de monitoreo de medios","Reporte","0","0",9,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de sintesis de medios electrónicos e impresos","Reporte","0","0",9,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de spots","Reporte","0","0",10,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Registro de grabación de eventos","Registro","0","0",10,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Evaluación de los planes y porgramas de acción gubernamental para instancias del gobieno y la sociedad. ","Evaluación","0","0",11,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Coordinar el registro de asistentes a las conferencias de prensa de los diferentes medios de comunicación.","Registro","0","0",11,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Registro de ordenes de trabajo de elaboración de diseños","Registro","0","0",12,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Plan de medios","Plan","0","0",13,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de gestión ante medios de comunicación ","Reporte","0","0",13,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2"," Difusiones del Informe de Gobierno ","Difusion","0","0",14,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Archivo de las fotografías recabadas.","Archivo","0","0",15,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Boletines elaborados para su difusión.","Boletin","0","0",15,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de Cobertura de eventos .","Reporte","0","0",15,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de publicaciones en redes sociales oficiales del Ayuntamiento.","Reporte","0","0",16,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Impartir pláticas sobre derechos humanos","Plática","132","132",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Asesorías jurídicas a la ciudadanía","Asesoría","45","45",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Eventos para la difusión de derechos humanos","Evento","50","50",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reuniones con organizaciones civiles","Reunión","20","20",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Capacitación para el personal que integra la DMDH","Capacitación","30","30",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Recibir y tramitar quejas sobre probables violaciones de los derechos humanos","Queja","2","2",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Capacitación a delegados municipales sobre derechos humanos","Capacitación","7","7",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Visitas al Centro de Sanciones Administrativas y de Integración Social","Visita","180","180",17,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Revision de la Cuenta Publica Anual del H. Ayuntamiento de Metepec","Revision","1","1",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Revision del informe trimestral del H. Ayuntamiento de Metepec","Revision","11","11",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Revision del presupuesto de la Sindicatura Municipal","Revision","1","1",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Resolver recursos de inconformidad y arbitrajes","Recurso","100","100",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Asesoria Juridica","Asesoria","12","12",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Seguimiento a la Comision de Hacienda","Asistencia","0","0",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Supervisar en galeras a las y los infractores que se les respete sus Derechos Humanos","Asistencia","0","0",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Verificar el estatus de la atencion y defensa de los litigios laborales","Asistencia","0","0",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Verificar que las multas que inpongan las auroridades municipalesque ingresen a la Tesoreria Municipal","Revision","0","0",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Asistencia a las visitas de inspeccion del OSFEM a la Tesoreria","Asistencia","0","0",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Realizar visitas al inventario de bienes inmuebles y muebles del municipio de Metepec para la realizacion del libro especial","Revision","0","0",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","comprobar que los servidores publicos cumplan la realizacion de la declaracion anual y alta y baja de la manifestacion de bienes","Revision","0","0",18,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",19,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",20,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",21,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",22,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",23,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",24,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",25,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",26,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","ASISTIR A SESIONES DE CABILDO","Asistencia","48","48",27,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe de atención de asuntos sociopolíticos","Informe","0","0",28,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe trimestral del estado del Archivo Municipal","Informe","0","0",29,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realizacion de actas de las sesiones de cabildo","acta","0","0",30,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Ceremonias oficiales para el fortalecimiento de la gobernabilidad","evento","0","0",30,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaborar informes y reportes","Documentos","0","0",31,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboracion y publicacion de las Gacetas Municipales.","Gacetas","0","0",32,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Integracion de acuerdos para las sesones de cabildo","Expdiene","0","0",33,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Inventario de bienes inmuebles del Ayuntamiento de Metepec","Inventario","2","2",34,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboración de Constancias de Identidad, Vecindad y ultima residencia.","Informe","0","0",35,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Expedición  Cartillas del Servicio Militar Nacional","informe","0","0",35,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Aplicación de incidencias determninadas","Registro","5","5",36,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realización de movimientos de altas y bajas","Registro","4","4",36,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Planeación de adquisiciones de bienes y contratación de servicios con las áreas usuarias","Programa","1","1",37,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe mensual del total de requisiciones ingresadas a la Subdirección de Adquisiciones para trámite de compra.","Informe","12","12",37,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Informe de estudios de mercado y cotizaciones realizadas","Informe","0","0",37,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Actualización de resguardos generales a traves de los inventarios físicos semestrales.","Proceso","12","12",38,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Aseguramiento del parque vehicular mediante póliza de seguro.","Reporte","12","12",38,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Verificación física al inventario patrimonial municipal.","Reporte","4","4",38,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Apoyo en el trámite de verificación vehicular","Reporte","12","12",38,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Capacitación en el uso de ofimática","Curso","5","5",39,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Seguimiento y supervisión al programa de trabajo de la Dirección de Administración","Reporte","4","4",39,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Atención a los requerimientos de compra de las Subdirecciones a cargo de la Dirección de Administración.","Reporte","12","12",39,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe mensual de requisiciones a la Subdirección de Adquisiciones para trámite de compra.","Informe","1","1",40,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe de estudios de mercado y cotizaciones realizadas","Informe","1","1",40,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Resguardo, control y registro de los moviemientos de los bienes y materiales ingresados al almacén.","Proceso","12","12",41,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Revisión y validación del Programa Anual de Capacitación","Programa","0","0",42,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Verificación de personal en funciones","Registro","2","2",42,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Detección de necesidades de capacitación","Encuesta","1","1",43,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Programa de capacitación y profesionalización","Programa","1","1",43,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Impartición de capacitación","Capacitación","12","12",43,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Circular para adquisición de bienes y contratación de servicios","Circular","1","1",44,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Revisión y depuración del Catálogo de Proveedores de Bienes y Servicios","Informe","1","1",44,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Control y suministro de combustible y lubricantes del parque vehicular","Proceso","5","5",45,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Constancias de no afectación al patrimonio municipal","Reporte","4","4",45,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Servicio de mantenimiento preventivo y correctivo al parque vehicular.","Servicio","600","450",46,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Atender las solicitudes de mantenimiento preventivo y correctivo de los bienes muebles e inmuebles.","Reporte","30","30",47,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Seguimiento y control del servicio de fotocopiado","Reporte","12","12",47,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Atender las solicitudes de mantenimiento preventivo y correctivo de los bienes muebles e inmuebles.","Reporte","0","0",47,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Proporcionar los servicios de intendencia a las oficinas públicas así como los eventos especiales que otorfa el H. Ayuntamiento.","Servicio","3500","3500",47,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Otorgar apoyos a traves de bienes y servicios para los eventos que organizan las dependencias de la Administración Pública Municipal.","Servicio","600","156",48,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Atención de peticiones ciudadanas","Petición","0","0",49,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Atención de auditorías","Documento","0","0",50,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Atención al público sobre expedición de Licencias de Uso de Suelo, Cédulas Informativas de Zonificación, Construcción y Públicidad a traves del Programa de Ventanilla Itinerante","Reporte","0","0",51,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Asignación de nomenclatura a las calles existentes sin nombre.","Calle","40","23",52,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Poner a consideración del Cabildo las propuestas para la autorización de  la liberación y/o reconocimiento de calles.","Propuesta","5","14",52,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de asesorias al publico nomenclatura de calle","Reporte","0","0",52,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Permisos de obra","Permisos","0","0",52,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Validación de las constancias de alineamiento","Reporte","0","0",52,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte de asesorias al publico liberación d de calle","Reporte","0","0",52,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Permiso de mantenimiento preventivo y correctivo","Permisos","0","0",52,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaborar la presentación y preparativos para las sesiones ordinarias de la  Comisión de Planeación para el Desarrollo Municipal (CPDM)","Presentación","0","0",53,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Elaborar opiniones técnicas y/o dictámenes en materia de planeación urbana y ordenamiento territorial","Dictamen","0","0",53,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Analizar y evaluar expedientes ingresados para cambio de uso de suelo, a fin de verificar su viabilidad en el entorno urbano y conforme a la normatividad.","Expedientes","0","0",53,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Elaboración de proyectos en materia de planeación para el mejoramiento y/o rehabilitación del equipamiento urbano","Proyecto","0","0",53,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Asesorar a los ciudadanos interesados en obtener un cambio a las normas de aprovechamiento de uso de suelo en un predio.","Asesoría","0","0",53,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Promover la publicación de boletines mensuales del Plan Municipal de Desarrollo Urbano de Metepec (página Web)","Boletín","0","0",53,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Conferencias y/o pláticas para difusión del Plan Municipal de Desarrollo Urbano de Metepec al sector social, público y privado","Evento","0","0",53,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Registro de gestion de asesorias a la población  del municipio en materia de regularización de la Tenencia de la Tierra","Registro","0","0",54,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Asistencia a las sesiones del Comité de Prevención y Control del Cremiento Urbano","Asistencia","4","4",54,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboración del Programa Anual de Obra","Documento","1","1",55,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Presentar para autorización el Programa Anual de Obras","Documento","0","0",56,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Recorridos y visitas de supervisión para verificar obligaciones de desarrolladores inmobiliarios, pueden realizarse en coordinación con el Gobierno del Estado de México.","Bitacora","24","20",57,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Brindar capacitación permanente a integrantes de la Unidad de Inspección","Capacitación","0","0",58,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Instaurar, tramitar,  y resolver los procedimientos administrativos","Procedimiento","0","0",58,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Atender en tiempo y forma las solicitudes por parte de la Unidad de Transparencia Municipal","Oficios","0","0",58,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Desahogar garantías de audiencia a los ciudadanos","Audiencia","0","0",58,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reuniones para temas relacionados con el desarrollo y planeación del medio urbano.","Reunión","0","0",59,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Notificación de avisos de obra y publicidad","Aviso","0","0",60,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reportes de obra y publicidad","Reporte","0","0",60,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Registro de Certificados de No Adeudo de Aportación de Mejoras","Registro","0","0",61,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Registro de asesorias para Certificacion de Aportacion de Mejoras","Registro","0","0",61,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaborar la presentación y preparativos para las sesiones ordinarias del Comité Municipal de Movilidad.","Presentación","0","0",62,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Elaboración de opiniones y/o dictámenes técnicos en materia de movilidad urbana.","Dictamen","0","0",62,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Estudio y definición de paradas de transporte público ","Estudio","0","0",62,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Diseñar y generar un sistema de información geográfica (SIG), que concentre datos de los componentes del sistema de movilidad","Archivo","0","0",62,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Impartir pláticas a Delegados, Copacis y público en general en materia de accesibilidad y de normatividad urbana","Plática","0","0",62,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Realizar talleres de sensibilización en materia de movilidad urbana sustentable, segura e incluyente para operadores transporte publico, privado y oficial.","Taller","0","0",62,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Proponer acciones de bajo costo (urbanismo táctico para el mejoramiento de movilidad urbana)","Propuesta","0","0",62,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Comité Interno de Obra Pública","Documento","10","10",63,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaborar e integrar el SIAVAMEN","Documento","12","12",64,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Elaborar e integrar el Informe Trimestral de Obras","Documento","4","4",64,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Elaborar e integrar el Informe Anual de Obras","Documento","1","1",64,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Asignación de Obras de acuerdo al Programa Anual de Obras","Contrato","9","9",65,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Obras de participacion comunitaria para el mejoramiento urbano ","obra","0","0",66,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Obras de guarniciones y banquetas ","Obra","0","0",67,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Mantenimientos menores","Informe","12","12",68,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Peticiones ciudadanas de reparación de vialidades urbanas mediante bacheo y apoyos","Documento","0","0",68,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Proyectos para obras públicas","Proyecto","9","9",69,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informes de supervisión de obras","Informe","12","12",70,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Licencias de Construcción expedidas","Licencia","880","1000",71,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Expedicion de Licencias de Publicidad.","Licencia","800","1012",72,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Expedición de constancias de alineamiento  emitidas.","Constancia","1200","1472",73,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Expedición de constancias de número oficial emitidas.","Constancia","0","0",73,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de inspecciones de arbolado en espacio público y privado.","Reporte","0","0",74,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe de atención a la ciudadanía por contaminación ambiental.","Informe","0","0",74,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de cirugías de esterilización.","Reporte","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe de la población informada sobre temas de enfermedades zoonoticas.","Informe","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Registros de Jornadas de esterilización .","Registro","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de difusión de programas de prevención de enfermedades zoonóticas.","Reporte","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de pláticas sobre prevención de enfermedades zoonóticas.","Reporte","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Informe de dosis de vacunas antirrábica aplicadas.","Informe","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Informe de Trípticos distribuidos  de información sobre  tenencia responsable, normatividad, agresiones y accidentes causados por caninos y felinos.","Informe","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Informe de adopción de perros y gatos","Informe","0","0",75,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de manejo de plantas en el vivero municipal.","Reporte","0","0",76,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de reforestación  y arborización urbana y rural.","Reporte","0","0",76,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Informe de pláticas y sensibilización en materia ambiental.","Informe","12","12",76,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de talleres dirigidos para la protección y conservación del medio ambiente.","Reporte","12","12",76,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Informe sobre el mantenimiento del Parque Cerro de los Magueyes.","Informe","12","12",76,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Gestionar instrumentos jurídicos que permitan realizar acciones conjuntas con la Secretaría del medio Ambiente del Gobierno del Estado de México","Gestion","0","0",77,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Gestionar actividades de planeación, forestación y reforestación de árboles y plantas en coordinación con la Protectora de Bosques del Gobierno del Estado de México.","Gestion","0","0",77,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Gestionar acciones conjuntas con la facultad de Medicina y Veterinaria y Zootecnia de la Universidad Autónoma del Estado de México para fortalecer las actividades de esterilización de animales de compañía.","Gestion","0","0",77,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Gestionar instrumentos de coordinación con el Instituto de Salud del Estado de México, para las actividades de vacunación de animales de compañía.","Gestion","0","0",77,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Gestionar acuerdos con dependencias municipales o estatales, con la finalidad de realizar acciones en materia de medio ambiente municipal","Gestion","0","0",77,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Coordinar la regulacion para el manejo de residuos solidos","reporte","0","0",78,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realizar un Proyecto de  diagnostico del sitio de disposición final para contratar una empresa que de mantenimiento post-clausura.","Proyecto","1","1",79,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Proyecto de adquisición de  herramientas para brindar el servicio de recolección de residuos sólidos urbanos y limpieza en el municipio","Proyecto","0","0",80,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de recolección de residuos solidos urbanos","Reporte","0","0",80,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Faenas  de recolección de residuos sólidos ","Faena","0","0",80,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Unidades  de recolección de residuos sólidos.","Unidad recolectora ","0","0",80,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Rutas de recolección en el municipio.","Ruta","0","0",80,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de Supervisión de circuitos y lineas de alimentación del alumbrado público","Reporte","0","0",81,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de encuestas aplicables a la ciudadania","Reporte","0","0",81,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Actualización de padrón de luminarias y su estado","Actualizacion","1","1",81,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de supervisión de brigadas de mantenimiento de áreas verdes del municipio","Reporte","0","0",82,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informes  de calidad administrativa  de la Direccion de Servicios Públicos.","Informe","0","0",83,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de la demanda de podas y derribos de arboles que pongan en riesgo o afecten a las personas o sus bienes","Reporte","0","0",84,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte  de las acciones laborales administrativas.","Reporte","0","0",85,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte  de personal de la Dirección en funcion.","Reporte","0","0",86,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realizar el barrido manual en rutas establecidas del municipio","Barrido manual","102","102",87,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe de las rutas de barrido establecidas en el municipio","Informe","0","0",87,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Mantener en optimas condiciones las unidades recolectoras y de supervisión a fin de mejor el servicio de recolección domiciliaria","Mantenimiento","12","12",88,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Actualizacion de  rutas de recolección con base en la demanda y crecimiento poblacional","Actualizacion","1","1",88,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de traslados de residuos solidos","Reporte","0","0",88,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Informe  del reciclaje de residuos solidos","Informe ","0","0",88,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Llevar a cabo un plan de trabajo preventivo y correctivo en rehabilitación del alumbrado público","Luminaria","0","0",89,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Proyecto de Adquisición de herramientas y material electrico para brindar  el servicio de mantenimiento y ampliación de alumbrado público del municipio","Proyecto","0","0",89,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Proyecto para adquirir herramientas para brindar el servicio de mantenimiento de las áreas verdes.","Proyecto","0","0",90,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Administración del panteón municipal.","Reporte","0","0",91,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realizar embellecimiento  de 11 panteones pertenecientes del  municipio","Embellecimiento","0","0",91,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de  Asesorías Jurídicas Integrales con Perspectiva de Género de manera presencial  y/ó telefónica.","Reporte","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de visitas domiciliarias a mujeres en situación de violencia.","Reporte","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de acompañamientos a las personas Victimas de Violencia de Género que lo soliciten, a las Instancias correspondientes.","Reporte","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de seguimiento al Proceso Certificado bajo la norma ISO 9000.","Reporte","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de segumiento en Coordinación con las Instancias Estatales y Fiscalía General de Justicia del Estado de México, a los refugios para Mujeres en situación de violencia de Metepec.","Reporte","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Pláticas para Prevenir la Violencia de Género.","Plática","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Dar seguimiento al Comité de Mejora Regulatoria.","Acta","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Informe de las actualizaciones a las fracciones del Sistema de Información Pública de Oficio Mexiquense (IPOMEX).","Informe","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Brindar obras de Teatro para prevenir la Violencia de Género.","Obra ","0","0",92,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe sobre la política pública de Cultura Institucional con Perspectiva de Género en el H. Ayuntamiento de Metepec.","Informe","15","15",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe de las reuniones  para garantizar la Igualdad de Trato y Oportunidades en la Cultura Institucional con Perspectiva de Género en la Administración Publica Municipal con diferentes sectores públicos y privados.","Informe","0","0",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Realizar Foros de la Mujer, reuniendo a mujeres, instituciones y ponentes para promover la participación, igualdad y adelanto de las mujeres metepequenses con diferentes directrices.","Foro","360","360",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Sesionar e Integrar el Consejo Directivo de Mujeres Construyendo la Igualdad para promover la comunicación de aportaciones sobre las acciones de la Dirección","Sesión","0","0",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Armonizar y homologar los instrumentos jurídicos internacionales, nacionales y estatales en materia de no discriminación por razones de género dentro del H. Ayuntamiento de Metepec de acuerdo a sus necesidades.","Informe","0","0",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Sesionar el Sistema Municipal de Igualdad de Trato y Oportunidades entre Mujeres y Hombres y para Prevenir, Atender y Sancionar la Violencia hacía Mujeres y Niñas","Sesión","0","0",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Firma de convenios de colaboración con instancias públicas, vigentes a partir de la fecha de la firma hasta el 31 de diciembre de 2024.","Convenio","0","0",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Garantizar protección institucional en casos de violencia laboral entre el personal de la Administración Pública Municipal","Informe","0","0",93,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Pláticas de sensibilización en escuelas y delegaciones, orientados a disminuir la discriminación y la violencia de género en la ciudadanía","Plática","40","34",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Otorgar tratamiento psicológico integral a la ciudadanía con perspectiva de género","Sesión","2000","2635",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Brindar orientación psicológica a mujeres víctimas de violencia de género a través de líneas de Call Center, con atención 24/7","Llamada","100","113",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de difusión de terapia psicológica a distancia, mediante medios electrónicos dirigidos a la ciudadanía","Reporte","0","0",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Programar y realizar jornada de salud mental con perspectiva de género","Jornada","0","0",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Realizar sesiones de capacitación en temas de Igualdad Laboral, no Discriminación y Derechos Humanos a vocales de la Norma Mexicana NMX-R-025-SCFI-2015","Capacitación","10","10",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Ejecutar programas de capacitación, psicoeducación y desarrollo de habilidades psicoemocionales dirigida a las familias de las y los pacientes.","Capacitación","0","0",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Reporte de visitas domiciliarias a mujeres en crisis psicológica que se encuentren en alguna situación de violencia de género","Reporte","0","0",94,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de cursos y talleres de manera presencial y virtual orientados a eliminar progresivamente la discriminación y los estereotipos que obstaculizan el pleno desarrollo de las mujeres  para el Programa de Cultura Institucional para la Igualdad entre Mujeres y Hombres.","Reporte","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe de la  agenda interinstitucional, que dé seguimiento a la vinculación y colocación laboral a las mujeres víctimas de violencia buscadoras de empleo.","Informe","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Coordinar, evaluar y dirigir las acciones, programas y actividades del Departamento, mediante reuniones semanales con integrantes del área.","Junta","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Informar de las actividades y acciones del Departamento a la Dirección de Igualdad de Género.","Informe","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de cursos y talleres de autoempleo dirigidos a las mujeres y sus familias, con el propósito de apoyarles en lograr su autonomía económica.","Reporte","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Campañas informativas sobre riesgos y mecanismos de protección y prevención en infecciones de transmisión sexual, con especial énfasis en el VIH-SIDA, en las escuelas y grupos de mujeres en condiciones de alto riesgo (indígenas, migrantes, cónyuges de migrantes y trabajadoras sexuales).","Campaña","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Campañas de difusión en las escuelas para promover el uso del lenguaje no sexista y difundir materiales con contenidos y prácticas educativas, la valorización de las actividades y aportes de las mujeres a la vida social, al desarrollo y la democracia.","Campaña","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Informe  interinstitucional para el desarrollo de habilidades productivas de las mujeres orientadas al autoempleo.","Informe","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Informe de Gestion de Ferias de Productoras, Artesanas y Emprendedoras donde se permita a las mujeres micro empresarias o pequeñas productoras comerciar sus productos, tanto al interior como al exterior del municipio prioritariamente a fin de dar a conocer sus productos y/o servicios que les permitan mejorar sus ingresos económicos.","Informe","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Ferias de manera presencial o virtual de Servicios Especializados en la Mujer y sus Familias para mejorar los accesos a los servicios que otorgan el municipio y  Gobierno del Estado de México para las mujeres en situación más vulnerable.","Feria","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Campañas de salud sexual y reproductiva, como la planeación y planificación familiar y la prevención de embarazos no deseados en niñas, adolescentes  y mujeres metepequenses.","Campaña","0","0",95,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Coordinar las acciones de atención a la población a través de la operación de los programas sociales.","Reporte","0","0",96,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Vigilar la actuación de las autoridades auxiliares en el cumplimiento de sus planes.","Visita","0","0",96,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Fortalecer el vínculo institucional y comunitaria de las autoridades auxiliares.","Reunión","0","0",96,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Supervisión de los mecanismos de participaciòn ciudadana.","Reporte","0","0",96,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Supervisar el proceso para la elección de autoridades auxiliares.","Elección","0","0",96,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Coadyuvar con los distintos programas Federales que aplican en el municipio.","Reporte","0","0",97,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Supervisar los programas estatales otorgados en el municipio.","0","0","0",97,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Verificar la gestion de apoyos con el sector privado.","0","0","0",97,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Supervisar los proyectos de convenios.","0","0","0",97,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Coadyuvar con los cursos de capacitacion del personal de la Direccion de Desarrollo Social","0","0","0",97,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Coadyuvar en los diagnósticos de Delegaciones y Centros Sociales.","Diagnósticos","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Supervisar la convocatoria para elección de Autoridades Auxiliares.","Convocatoria","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Contribuir en la integración de Comités de Delegados Municipales y COPACI`s.","Comité","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Supervisar y coadyuvar en la capacitación constante de Autoridades Auxiliares.","Capacitación","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Recopilar, verificar y direccionar el seguimiento de la demanda ciudadana.","Reporte","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Coadyuvar en la validaciòn del padrón de beneficiarios del programa Para tu casa, a través del censo de beneficiarios.","Validación","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Coadyuvar en la audiencia pùblica.","Audiencia","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Integraciòn del informe de la demanda ciudadana.","Reporte","0","0",98,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboración de las reglas de operación para el programa alimentarioCASAFF.","Documento","0","0",99,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reorganización administrativa y operativa para un mejor control territorial de atención.","Reporte","0","0",99,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Censo en campo a beneficiarios 2019-2021","Censo","0","0",99,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Aplicaciòn de cuestionarios IMMIS, para identificar nuevos beneficiarios.","Cuestionario","0","0",99,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Integración de propuestas de beneficiarios.","Integración","0","0",99,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Entrega de tarjetas a beneficiarios del programa CASAFF.","Entrega","0","0",99,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Entrega de Canastas alimentarias CASAFF","Canasta","57000","57000",99,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Coadyuvar en la realización de actividades de sensibilización, fomentando valores.","Actividad","0","0",100,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Atención, integración y generación de acciones con grupos indígenas.","Actividad","0","0",100,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Coadyuvar en la programación de los actos cívicos.","Actividad","0","0",100,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Coadyuvar en la realizaciòn del censo de beneficiarios de programas sociales 2019-2021.","Censo","0","0",100,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Validar la consolidación y administración de los padrones de nuevos beneficiarios 2022-2024.","Validación","0","0",100,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Verificación periódica de la base de datos de beneficiarios de los programas de Desarrollo Social.","Verificación","0","0",100,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboración de las Reglas de Operación para el programa Comedores Comunitarios","Documento","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Ubicación y valoración de los espacios para activación de los comedores.","Ubicación","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Equpamiento de Comedores Comunitarios","Equipamiento","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Convocatoria para Integración de Comités Comunitarios","Convocatoria","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Asambleas Constitutivas de los Comités Comunitarios","Asamblea","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Capacitación a Comités Comunitarios, administrativos y operativos.","Capacitación","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Registro al programa Comedores Comunitarios","Registro","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Entrega de tarjetas a beneficiarios del programa Comedores Comunitarios","Entrega","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Eventos de apertura de Comedores Comunitarios","Evento","0","0",101,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Actividades de sensibilización fomentando valores, para promover el desarrollo humano en la población.","Actividad","214","214",102,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Atención, integración y generación de acciones con grupos indígenas.","Actividad","5","5",102,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Curso de Verano","Curso","1","1",102,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Actividades cívicas.","Actividad","0","0",102,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Recepción, análisis, canalización, supervisión y seguimiento de cada mecanismo e instrumento para la captación de la demanda ciudadana.","Reporte","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Validaciòn del padrón de beneficiarios a través de un censo.","Censo","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Capacitación constante al personal que opera call center y módulos de atención ciudadana","Capacitación","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Integración de módulos itinerantes para participación ciudadana a través de los medios tradicionales (digital y físico).","Modulo","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Programa de seguimiento y evaluación de diágnostico de necesidades en audiencias públicas y Delegaciones.","Reporte","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Seguimiento de demanda ciudadana a través de COPACIs, Delegados Municipales, módulos, call center y estructura.","Reporte","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Audiencia pública.","Audiencia","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Informe de la demanda ciudadana.","Informe","0","0",103,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Diagnóstico de Delegaciones Municipales y Centros Sociales.","Diagnóstico","0","0",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reuniones para preparativos de  la elección de Delegados y COPACIs.","Reunión","0","0",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Convocatoria para elección de Delegados y COPACIs.","Convocatoria","0","0",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Elección de Delegados Municipales y COPACIs.","Elección","0","0",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Capacitación a Delegados Municipales y COPACIs.","Capacitación","4","4",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reuniones con Delegados Municipales y COPACIs.","Reunión","0","0",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Sesiones ordinarias, extraordinarias y plenarias con Delegados Municipales y COPACIs."," sesión","0","0",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Capacitaciones para incentivar la participación ciudadana en Delegaciones Municipales.","Capacitación","0","0",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Jornadas de labor comunitaria.","Jornada","36","36",104,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Manejo y administración de redes sociales","Publicación","0","0",105,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Coadyuvar en la realización del censo de beneficiarios de programas sociales 2019-2021.","Censo","0","0",105,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Depuración de padrones de beneficiarios correspondientes al periodo 2019-2021.","Depuración","0","0",105,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Alinear, depurar, consolidar y administrar padrones de nuevos beneficiarios 2022-2024.","Actualización","0","0",105,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Actualización de la base de datos de beneficiarios de los programas de Desarrollo Social.","Actualización","0","0",105,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Estrategia Nacional de vacunación contra COVID-19 en Metepec","Jornada","5","5",106,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Entrega de apoyos de los programas 'Pensión para el Bienestar de las personas Adultas Mayores y Pensión para el Bienestar de las personas con Discapacidad.","Entrega","6","6",106,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reuniones con Instancias del Gobierno Federal Y Estatal.","Reunión","0","0",106,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Asesoramientos por parte de Gobierno Estatal y Federal para la operación de los programas.","Asesoramiento","14","14",106,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reuniones con Dependencias Municipales.","Reunión","0","0",106,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Programa de entrega de aparatos funcionales.","Entrega","6","6",106,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Proyectos de convenios de colaboración con Gobierno Federal y Estatal.","Proyecto","0","0",106,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Solicitudes de apoyo al sector privado.","Solicitud","0","0",107,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Proyectos de convenio de colaboración con empresas privadas.","Proyecto","0","0",107,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Solicitudes de apoyo a escuelas y universidades privadas.","Solicitud","0","0",107,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Proyectos de convenio de colaboración con escuelas y universidades privadas.","Proyecto","0","0",107,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reuniones de colaboración.con Asociaciones civiles sin fines de lucro, Fundaciones y Sector Privado.","Reunión","0","0",107,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Cursos de capacitación al personal de la Dirección de Desarrollo Social.","Curso","0","0",107,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboración de las reglas de operación para los programas municipales que ejecuta la Subdirección.","Documento","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reorganización administrativa y operativa para un eficiente control territorial de atención.","Reporte","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Identificación y valoración de los espacios físicos para la operación de los programas municipales.","Recorrido","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Convocatorias para la operación de los programas municipales.","Convocatoria","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Capacitación para personal médico y a comités comunitarios, para la ejecución de los programas.","Capacitación","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Integración de propuestas de beneficiarios al padrón de beneficiarios de canastas alimentarias.","Integración","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Campañas de registro a los programas municipales.","Campaña","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Equipamiento de las instalaciones para los comedores comunitarios y consultorios médicos.","Equipamiento","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Entrega de tarjetas a beneficiarios.","Entrega","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Eventos de apertura de comedores comunitarios y consultorios médicos.","Evento","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Eventos de entrega de canastas alimentarias 2022.","Entrega","0","0",108,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Acciones en pro del bienestar y recreación de los jóvenes metepequenses.","Acción","11","11",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Talleres para el desarrollo juvenil.","Taller","60","60",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Actividad del día del amor y la amistad.","Actividad","0","0",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Concursos para conservar y preservar las tradiciones en el Municipio de Metepec.","Concurso","0","0",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Programa Juventud Activa.","Actividad","0","0",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Entrega de tarjeta de descuento El privilegio de ser Jóven y vivir en Metepec.","Entrega","0","0",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Bazar juvenil cambia y recicla.","Bazar","0","0",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Olimpiada de la juventud 2022.","Evento","0","0",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Premio Municipal de la Juventud 2022.","Premio","1","1",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Propuesta de creación del Instituto de la Juventud.","Propuesta","0","0",109,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Coordinar platicas sobre cultura de igualdad y prevencion de la violencia, en sectores vulnerables ","Platica ","0","0",110,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboración de las Reglas de operación para el programa Médico en tu casa.","Documento","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Ubicaciòn de espacios para consultorios médicos.","Recorrido","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Convocatoria para personal médico.","Convocatoria","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Selección y reclutamiento de personal médico.","Selección","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Capacitación del personal médico.","Capacitación","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Equipamiento de consultorios médicos.","Equipamiento","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Registro al programa Médico en tu casa.","Registro","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Entrega de tarjetas para el programa Médico en tu casa.","Entrega","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Eventos de apertura de consultorios médicos.","Evento","0","0",111,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de reuniones de trabajo para diseñar y dirigir las políticas que permitan verificar y ordenar la actividad comercial, industrial o de servicios, así como los eventos públicos que se desarrollen dentro del municipio","Reporte","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de reuniones de trabajo para la realización de eventos tales como: semana santa, feria de san isidro, paseo de la agricultura, 15 de septiembre, festival quimera, día de muertos, ferias navideñas","Reporte","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3"," Reuniones de trabajo con lideres tianguistas para acordar los lineamientos para el desarrollo de su actividad comercial","Minuta","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reun iones de trabajo con los jefes de departamento para verificar el desarrollo y avances de las actividades programadas","Minuta","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de seguimiento de las acciones de control, verificación e inspección de las actividades comerciales, industriales y de servicios que se realicen en el municipio, de manera oportuna, eficaz y planeada conforme a los ordenamientos jurídicos aplicables","Reporte","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte trimestral de actividades realizadas en el departamento del comercio establecido","Reporte","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte trimestral de actividades realizadas en el departamento del comercio semifijo, tianguis y mercados","Reporte","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Reporte trimestral de las actividades realizadas en el departemento de inspección","Reporte","0","0",112,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte sobre problematíca detectada dentro del territorio municipal","Reporte","0","0",113,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de solicitudes atendidas de las problemáticas detectadas en recorridos","Reporte","0","0",113,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Informe de reuniones con autoridades auxiliares y líderes vecinales de las diferenes zonas del municipio, para tratar asuntos relacionados con las necesidades de su localidad.","Reporte","0","0",113,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Operativos de vigilancia de la actividad comercial en tianguis","Reporte","12","12",114,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Operativos de vigilancia de la actividad comercial en mercados","Reporte","12","12",114,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Operativo de vigilancia de la actividad comercial en comercio informal","Reporte","12","12",114,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Operativos especiales (semana santa, paseo san isidro, feria de san isidro, quimera, día de muertos, feria del alfeñique, día de reyes, día de la calendaria, 15 de septiembre y festividades navideñas","Reporte","10","10",114,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Operativos nocturnos (fines de semana)","Operativo","208","208",114,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte de verificación de puestos por temporada, semifijos, eventos públicos, ferias, circos, bailes, conciertos, degustaciones y juegos mecánicos ","Reporte","12","12",114,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte mensual de recorridos de inspección al comercio establecido en el municipio","Reporte","12","12",114,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte mensual de invitaciones al comercio establecido y semifijo, para su regularización","Reporte","12","12",115,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte mensual de sanciones por violaciones al bando municipal mediante amonestaciones","Reporte","12","12",115,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte mensual de sanciones por violaciones al bando municipal mediante infracciones","Reporte","12","12",115,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte mensual de clausuras a unidades económicas por contravención a la normatividad municipal aplicable","Reporte","12","12",115,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de expedientes iniciados por quejas ciudadanas","Reporte","12","12",115,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Operativos de verificación a comercios aledaños a escuelas","Reporte","12","12",116,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reportes de reuniones con comites ciudadanos y contructores de paz y generadoras de unidad","Reporte","12","10",116,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de reuniones con redes ciudadanas constructoras de paz y  generadoras de unidad","Reporte","12","12",116,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Actividades recreativas, cursos y/o tallerespara la prevencion social del delito","Reporte","4","4",116,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte mensual de documentos necesarios para la correcta función del área","Reporte","0","0",117,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Ilustrativos distribuidos con contenido sobre normatividad municipal, cívica y democrática","Reporte","4","4",117,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte mensual de encuestas de satisfacción al cliente","Reporte","12","12",118,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte mensual de expedición y renovación de permisos de tianguis","Reporte","12","12",118,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte mensual de expedición y renovación de permisos de locatarios","Reporte","12","12",118,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte mensual de expedición y renovación de permisos de semifijos","Reporte","12","12",118,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte mensual de expedición y renovación de permisos de temporada y eventuales","Reporte","12","12",118,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte mensual de expedición y renovación de permisos de eventos públicos","Reporte","12","12",118,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte mensual de expedición y renovación de permisos de degustaciones","Reporte","12","12",118,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Supervición de las auditorias de obra pública ","Auditoria","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Supervición de las inspección a la integración del expediente único de obra","Inspeccion","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Supervición de las revisión a las obras particulres y solicitudes de licencias, permisos de contrucción y cambios de densidad, intensidad y altura.","Revision","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Supervición de las participaciones en sesiones del comité interno de obra pública","Partiticipacion","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Supervición a la testificación a los actos de entrega-recepción de obra","Revision","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Supervición de la asistencia a los procesos de adjudicación de obra pública (visita al siitio, junta de aclaraciones, apertura de proposiciones y fallos)","Intervencion","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Supervición de las visita de obra pública","Visita","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Supervición de las Auditorías Financieras y Administrativas","Auditoria","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Supervición de las Inspecciones  Administrativas ","Inspeccion","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Supervición a las Supervisiones Administrativas ","Supervision","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Supervición de los Arqueos de caja","Arqueo de Caja","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Supervición de las Acciones de Control (Inspección a los servidores públicos en su lugar de trabajo)","Verificación","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Supervición al Seguimiento a Observaciones del ÿrgano Superior de ","Seguimiento","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("14","Supervición de la Destrucción de Papeleria Oficial","Testificacion","0","0",119,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Auditoria de obra pública ","Auditoria","0","0",120,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Inspección a la integración del expediente único de obra","Inspeccion","0","0",120,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Revisión a las obras particulres y solicitudes de licencias, permisos de contrucción y cambios de densidad, intensidad y altura.","Revision","0","0",120,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Participaciones en sesiones del comité interno de obra pública","Participacion","0","0",120,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Testificación a los actos de entrega-recepción de obra","Revision","0","0",120,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Asistencia a los procesos de adjudicación de obra pública (visita al siitio, junta de aclaraciones, apertura de proposiciones y fallos)","Intervencion","0","0",120,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Visita de obra pública","Visita","0","0",120,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Participacion en Sesiones de Comites de Organos Colegiados","Comité","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Testificacion en el Programa Conduce sin alcohol","Testificacion","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Participacion en el Levantamieto Fisico del inventario de bienes muebles e inmuebles","Participacion","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Testificacion de Entrega Recpeción de las oficinas administrativas","Testificacion","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Actas administrativas o circunstanciadas","Acta","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","capacitacion del sistema CREG","Capacitacion","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","asesorias para el proceso entrega recepcion y observaciones","Participacion","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","campaña para actualizacion del sistema CREG","Campaña","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Atencion a solicitudes de Transparencia","Solicitud","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Actualizacion del sistema de informacion","Actualizacion","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Bases de Auditoria","Bases","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Codigo de Etica","Codigo","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Codigo de Conducta","Codigo","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("14","Propuesta a la modificación del Codigo de Reglamentacion Municipal de Metepec","Propuesta","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("15","Campañas sobre la toleracia cero a la corrupcion","Campaña","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("16","Eventos en materia de corrupcion para servidores publicos","Evento","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("17","Elaboracion del Programa Anual de trabajo del Comité Coordinador Municipal","Programa","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("18","Integracion del informe anual de resultados y avances del Comité Coordinador Municipal","Integracion","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("19","Programa Anual de Auditorias","Programa","0","0",121,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realización de campañas de Información dirigidas a los servidores públicos a fin de que cumplan con la presentación de la Declaración de Situación Patrimonial y de Intereses","Campañas","1","1",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Expedientes Iniciados en el Procedimiento de Responsabilidad Administrativa","Acuerdo de Inicio de Procedimiento","15","5",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Certificacion de expedientes para el emplazamiento","Certificación","0","0",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Citatorios a Audiencia Inicial dentro del procedimiento de Responsabilidad Administrativa","Citatorios","0","0",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Audiencia Inicial del presunto responsable dentro del procedimiento de Responsabilidad Administrativa","Actas de Audiencia","0","0",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Acuerdos de desahogo de pruebas dentro del procedimiento de Responsabilidad Administrativa","Acuerdos ","0","0",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Resoluciones emitidas en el procedimiento de Responsabilidad Administrativa","Resoluciones","0","0",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Acuerdos del Sistema Anticorrupcion","Acuerdos","0","0",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Sesiones del Sistema Anticorrupcion","Sesiones","0","0",122,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Inicio de investigación por posibles conductas contrearias a la Ley de Responsabilidades Administrativas del Estado de México y Municipios.","Radicación","0","0",123,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Remisión de Informes de Presunta Responsibilidad Administrativa","Informe","2","2",123,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Determinación de Calificación de falta administrativa","Calificación","0","0",123,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Acuerdos de Terminacion y Archivo","Acuerdo","0","0",123,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Comites ciudadano de control y vigilancia","Comité","0","0",123,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Evaluación de Control Interno","Evaluación","0","0",123,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Recomendaciones de Control Interno","Recomendación","0","0",123,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informes de expedición y entrega de invitaciones a contribuyentes morosos.","Informe","0","0",124,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte del procedimiento administrativo de ejecución (PAE)","Reporte ","0","0",124,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de la participación  en comités y comisiones del ayuntamiento en materia hacendaria","Reporte","0","0",125,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Supervisar la elaboración de estados financieros, informes mensuales y trimestrales.","Informe","0","0",125,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Coordinación de la elaboración y publicación del presupuesto de ingresos y egresos 2022","Gaceta","0","0",125,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Coordinación de la integración y entrega de la cuenta pública","Acuse de recibo","0","0",125,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Programación para la realizacion  de la diligencia de inspeccion  y medicion fisica de los predios","Diligencia","1000","1296",126,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Notificacion para la realizacion  de diligencias para la inspeccion y medicion  fisica de los predios.","Notificacion","100","144",126,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Levantamiento de planos topograficos en campo.","Plano","100","144",126,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Incorporar a un mayor número de Instituciones Bancarias en los convenios de cobranza","Convenio en liquidación","0","0",127,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Fomentar el financiamiento de las contribuciones mediante pago de tarjetas de credito","Convenio","0","0",127,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de las requisiciones de las áreas de la tesorería municipal","Reporte","0","0",128,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de las bitacoras de gasolina  del parque vehicular de  la tesorería municipal","Reporte","0","0",128,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Gestiónar la contratación de la fianza de fidelidad","Fianza","0","0",128,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Informe  de la entrega y suministro  de materiales, enseres, papeleria y equipo de oficina para las áreas de la tesorería municipal","Informe","0","0",128,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Gestionar la contratación de calificadoras para emisión de calificaciones al municipio de metepec","Contrato","0","0",128,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Gestionar los avances del  comité interno de mejora regulatoria de la tesorería municipal","Acta","0","0",128,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte del respaldo del sistema de Gestión Catastral complemento del reporte mensual","Reporte","12","12",129,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","informes de las actualizaciónes de los padrones fiscales de los diferentes conceptos de ingresos","Informe","0","0",130,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reportes de las Expedición y entrega de invitaciones de pago a contribuyentes, morosos y remisos detectados","Reporte","0","0",130,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Profesionalización de los servicios públicos en materia de hacienda pública y atención al contribuyente","Capacitación","0","0",130,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reuniones de planeación, seguimiento y reconducción de estrategias recaudatorias","Minuta","0","0",130,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Campañas de difusión masiva de los apoyos, subsidios fiscales y exhortación al pago puntual","Campaña","0","0",130,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Publicacion de los lineamientos para el ejercicio y control del presupuesto","Publicacion","1","1",131,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Cumplimiento en el pago de impuestos federales (ISR)","Porcentaje","12","12",131,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaborar y presentar ante cabildo el presupuesto definitivo para su publicacion","Publicacion","1","1",132,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Implementar control presupuestal","Distribucion","12","12",132,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Recepcion de solicitudes de tramite catastral presentadas por la ciudadania","Solicitud","5000","5956",133,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Atencion a las solicitudes de tramite catastral presentadas por la ciudadania","Solicitud","5000","5956",133,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaboracion y entrega de  los informes financieros","Reporte","12","12",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Integrar y enviar la cuenta publica municipal","Reporte","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Publicacion de formatos en cumplimiento a la ley de disciplina financiera","Publicacion","40","40",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Norma para establecer la estructura del formato de la relacion de bienes que componen el patrimonio del ente publico.","Publicacion","2","2",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Publicacion de la cuenta publica para consulta de la poblacion en general","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Norma para la difusion a la ciudadania de la ley de ingresos y del presupuesto de egresos","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Norma para armonizar la prestacion de la informacion adicional a la iniciativa de la ley de ingresos.","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Norma para armonizar la prestacion de la informacion adicional del proyecto de presupuesto de egresos.","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Norma para establecer la estructura del calendario de ingresos base mensual","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Norma para establecer la estructura del calendario del presupuesto de egresos base mensual","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Norma para establecer la estructura de informacion de montos pagados por ayudas y subsidios.","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Norma para establecer la estructura de informacion del formato de programas con recursos federales por orden de gobierno","Publicacion","4","4",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Norma para establecer la estructura de informacion de la relacion de las cuentas bancarias productivas especificas que se presentan en la cuenta publica","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("14","Norma para establecer la estructura de informacion del fromato de aplicacion de recursos del fondo de aportaciones para el fortalecimiento de los municipios","Publicacion","4","4",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("15","Normas y modelos de estructura de la informacion relativa a los fondos de ayuda federal para la seguridad publica.","Publicacion","4","4",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("16","Norma para establecer la estructura de los formatos de informacion de obligaciones pagadas o garantizadas con fondos federales.","Publicacion","4","4",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("17","Norma para establecer la estructura de informacion del formato del ejercicio y destino del gasto federalizado y reintegros","Publicacion","4","4",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("18","Programa anual de evaluaciones","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("19","Norma para establecer el formato para la difucion de los resultados de las evaluaciones de los recursos federales ministrados a las entidades federativas.","Publicacion","1","1",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("20","Lineamientos de informacion publica financiera para el fondo de aportaciones para la infraestructura social municipal.","Publicacion","4","4",134,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de Asesorías a la Administración Pública Municipal ","Reporte","2","2",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de Asesorías a la  Ciudadanía","Reporte","2","2",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de Asesorías a la  Ciudadanía turnadas por Presidencia","Reporte","2","2",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Adecuación y Publicación del Bando Municipal","Adecuación","2","2",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Adecuación y Publicación del Código de Reglamentación","Adecuación","2","2",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Elaboración de Manual de Procedimeintos","Elaboración","1","1",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Elaboració de Manual de Organización","Elaboración","1","1",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Informe de contingencias laborales","Informe","0","0",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Capacitación de Asesores Jurídicos","Capacitación","1","1",135,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte sobre el análisis jurídico, emisión de opinión jurídica y trámite de firmas de Convenios y Acuerdos de Colaboración, Coordinación y Afectación","Reporte","0","0",136,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte sobre la elaboración y/o análisis jurídico y trámite de firmas de Convenios Modificatorios, Convenios de Terminación Anticipada y Addendums a Convenios y Contratos elebrados por la administración municipal","Reporte","0","0",136,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3"," Reporte sobre la elaboración y trámite de firmas de Contratos de Arrendamiento, Adquisiciones, Prestación de Servicios, Comodato, Enajenación de Bienes y Donación","Reporte","0","0",136,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte sobre el análisis jurídico y trámite de firmas de Contratos de Obra Pública elaborados por la Dirección de obras Públicas","Reporte","0","0",136,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte sobre el análisis jurídico y emisión de opinión jurídica de expedientes de procedimientos de contratación de Arrendamientos, Adquisiciones y Servicios","Repore","0","0",136,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte sobre el análisis jurídico y emisión de opinión jurídica de Convocatorias","Reporte","0","0",136,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Actas Informativas Solicitadas","Reporte","1500","1300",137,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Proporcionar Asesorías Juridicas a la Ciudadania","Reporte","790","843",137,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Audiencias de Mediación y Conciliación","Reporte","0","0",137,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Levantamiento de Actas de Nacimiento","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Levantamiento de Actas de Defunción","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Levantamiento de Actas de Matrimonio","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Levantamiento de Actas de Divorcio","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Levantamiento de Actas de Adopciones","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Levantamiento de Actas de Reconocimiento de Hijos","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Levantamiento de Actas de Declaración de Ausencia","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Atender la totalidad de copias certificadas de los diferentes actos y hechos del Registro Civil","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Atender la totalidad de asesorías solicitadas","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Atender la totalidad de actas solicitadas","Reportes","12","12",138,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe mensual de ingresos de adolescentes infractores que remite el Juzgado de la materia","Informe","12","12",139,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Informe en materia de Difusión para la prevención social (platicas, periódico mural, módulos de prevención social y visitas comunitarias)","Informe","12","12",139,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Informe sobre el Fortalecimiento para la integración social :  (encuentro de padres y jóvenes, actividades deportivas, artísticas y culturales, juntas de padres, pláticas de orientacion, canalización de adolescentes al sector salud y educativo, semana interactiva de la prevención, semana de la prevención social, talleres de instrucción de oficios y manualidades y jornadas de servicio comunitario)","Informe","12","12",139,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Informe de la Detección de adolescentes con altos factores de riesgo social  (Adolescentes en estado de riesgo)","Informe","12","12",139,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de Juicios Administrativos","Reporte","2","2",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de Juicios Fiscales","Reporte","2","2",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de Juicios  Civiles","Reporte","2","2",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de Juicios de Amparo","Reporte","2","2",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de Procedimientos de Reclamación","Reporte","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Informe de Apoyos a la Fiscalía","Informe","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Informe de quejas a la Comisión de Derechos Humanos","Informe","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Informe de Carpetas de Investigación","Informe","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Informe de Procedimientos ante la Comisión de Honor y Justicia","Informe","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Informe de Derechos de Petición","Informe","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Informe de Requerimiento de la Contraloría del Poder Legislativo","Informe","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Reporte de Juicios de Nulidad Federal","Reporte","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Informe sobre Medidas Cautelares","Informe","12","12",140,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Sanciones Procedentes de las Faltas Administrativas Contempladas y Calificadas en el Bando Municipal","Registro","12","12",141,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Expedición de Recibos Oficiales por Concepto de Multas Conforme al Marco Jurídico Aplicable","Registro","12","12",141,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Otorgamiento de Boletas de Libertad","Registro","12","12",141,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de integracion de los  Programas Presupuestarios para el ejercicio fiscal 2022","Reporte","0","0",142,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de elaboración y presentación de propuestas de reformas a la normatividad municipal que competen a la Dirección de Desarrollo Económico, Turístcio y Artesanal.","Reporte","0","0",142,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Integracion de los Manuales de Organización y de Procedimientos.","Manual","0","0",142,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de la  Instalación y sesiones del Comité Interno de Mejora Regulatoría","Reporte","0","0",142,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de integracion de las Cartas Compromiso para el Ciudadano","Reporte","0","0",142,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Registro de Evaluación del cumplimiento de los Programas Presupuestarios","Reporte","0","0",142,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Eventos realizados para la venta de los productos de los artesanos","Evento","3","3",143,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realizar concursos y certamenes en el ambito artesanal","Concurso","1","1",143,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Platicas informativas a artesanos","Platica","2","2",143,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Gestión de espacios de exposición en aeropuerto Lic. Adolfo López Mateos","Gestion","0","0",143,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Gestión de un Catalogo Digital de Artesanias","Gestion","0","0",143,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Homenaje a Artesano","Evento","0","0",143,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Organización de la Instalación del Comité Municipal de Dictámenes de Giro.","Acta","0","0",144,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de Organizacion y coordinacion las sesiones del Comité Municipal de Dictámenes de Giro.","Reporte","0","0",144,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Informes de dictámenes de giro expedidos.","informe","0","0",144,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Registro de Asesorias tecnica y normativa para la expedición de dictamenes de giro.","Registro","0","0",144,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de oficios de procedencia juridica expedidos y de oficios de no procedencia juridica.","Reporte","0","0",144,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte de solicitudes de dictamen de giro recibidas.","Reporte","0","0",144,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte  mensual de servicio de embalaje","Reporte","12","12",145,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte mensual de servicio de quemas que se realizan en los hornos del Centro de Desarrollo Artesanal","Reporte","12","12",145,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de encuestas de satisfacción realizadas a los artesanos beneficiados  de los servicios proporcionados en el Centro de Desarrollo Artesanal","Reporte","4","4",145,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Gestion de mantenimiento y limpieza de hornos y equipo de embalaje","Gestion","0","0",145,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realización de Eventos de Promoción y  Fomento Económico (Eventos: Artesanales, Turísticos, Emprendedores, Empleo, Agropecuario  y Mejora Regulatoria)","Evento","12","12",146,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Cursos de capacitación financiera para obtención de financiamientos.","Curso","2","2",146,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de los apoyos brindados a sector artesanal","Reporte","4","4",146,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Cursos de capacitación al personal de la Dirección ","Curso","2","2",146,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de promocion y/o difusion de eventos empresariales locales, nacionales o internacionales dirigidos a los empresarios.","Reporte","12","12",147,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Cursos de capacitación para micro, pequeños y medianos empresarios para la obtención de financiamiento.","Curso","0","0",147,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de registros y difusión de los servicios de la Dirección de Desarrollo Económico, Turístico y Artesanal.","Reporte","0","0",147,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de empresarios que solicitan vinculacion con instituciones publicas o privadas para la obtencion de creditos y/o asistencia tecnica.","Reporte","12","12",147,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Apoyos económicos para micro, pequeños y medianos empresarios del municipio.","Apoyo","4","4",147,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Cursos de capacitacion para micro, pequeños y medianos empresarios para manejo de finanzas sanas, impuestos y proyectos productivos.","Curso","21","21",147,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de Autorización de Refrendo de Licencia de Funcionamiento Comercial.","Reporte","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de Altas de Licencias de Funcionamiento Comercial.","Reporte","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte Autorización de Alta de Permiso Provisional de Funcionamiento Comercial .","Reporte","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte  Altas de Licencias de Funcionamiento Comercial de Bajo Impacto (SARE).","Reporte","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte  Renovación de Licencia de Funcionamiento Comercial.","Reporte","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte Altas de Licencia de Funcionamiento Comercial de bajo impacto (SARE en línea).","Reporte","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte Renovación de Permiso Provisional de Funcionamiento Comercial .","Reporte","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Reporte de Jornada de Regularización de unidades económicas","Reporte ","0","0",148,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Gestionar ante las instancias federales y estatales vinculadas al sector secundario y terciario, apoyos, subsidios o financiamiento para micro, pequeñas y medianas empresas del municipio","Gestion","2","2",149,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de microempresarios atendidos que buscan microcreditos y a poyos economicos.","Reporte","12","12",149,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Cursos de capacitacion  al sector comercio tradicional, establecido o de servicios.","Curso","3","3",149,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Gestionar un  programa de apoyos económicos dirigidos a micro, pequeños y medianos empresarios.","Gestión","0","0",149,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Estimulos a  micro, pequeños y medianos empresarios del municipio.","Estímulos","60","60",149,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Actualizacion del Padron de Artesanos mediante la realizacion de un censo","Padron","1","1",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Gestion de credencialización de artesanos del municipio de Metepec","Gestion","0","0",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Asistencia a exposiciones en diferentes espacios del ambito Federal, Estatal, Municipal e independiente, promoviendo la participacion de los artesanos de nuestro municipio y el intercambio artesanal","Reporte","3","3",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Cursos para fortalecer los conocimientos y tecnicas  en la comunidad artesanal ","Curso","6","6",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Gestion de apoyos para artesanos","Gestion","1","1",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Gestion de espacios sin costo para artesanos en Feria San Isidro Metepec","Gestion","0","0",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Gestion de la norma Hecho en Metepec","Gestion","0","0",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Reporte de platicas informativas sobre promocion y comercializacion.","Reporte","0","0",150,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1"," Boletin semanal de empleo","Boletin","41","41",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Registro y promocion del evento presencial y/o virtual","Registro","500","500",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Reporte de atencion personalizada a buscadores de empleo","Reporte","12","12",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de canalizados a entrevista de los servicios brindados de oferta de empleo","Reporte","12","12",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de Jornadas Itinerantes de empleo","Reporte","0","0",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Cursos de capacitacion para el autoempleo","Curso","8","8",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte del Portal de empleo","Reporte","12","12",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Reporte de empresas participantes en el boletin y portal de empleo","Reporte","12","12",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Taller para obtener un empleo","Taller","4","4",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Jornadas de bolsa de empleo presenciales","Jornada","5","5",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Oranización de una Expo Emprendimiento","Expo","0","0",151,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Asistir a Eventos Nacionales de Gestion Turistica","Evento","2","2",152,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Platicas de Fortalecimiento de la Identidad Turística Local","Platica","2","2",152,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Sesiones del Comite Turistico Pueblo Magico","Sesion","2","2",152,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de impulsos Estrategicos e Instrumentos Digitales la Promocion de los Atractivos del Pueblo Magico","Reporte","2","2",152,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Gestion de Proyectos Especiales","Gestion","2","2",152,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Gestion de cursos de profesionalizacion para Prestadores de Servicios Turisticos y/o Servidores Publicos","Gestion","2","2",152,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Gestion de actividades de promocion turistica","Gestion","0","0",152,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Participacion a ferias y exposiciones para la promoción del Pueblo Mágico de Metepec.","Participacion ","2","2",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Publicar la convocatoria para la organización de la Fería San Isidro 2022.","Convocatoria ","1","1",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Difundir las festividades más importantes del Pueblo Mágico de Metepec, así como sus atráctivos turísticos, culturales y gatronómicos.","Difusion","8","8",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Aplicación de encuestas a visitantes.","Encuesta","170","170",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Difusión de enventos y/o concursos de promoción turística.","Difusión","2","2",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte de los distintos tours por Metepec.","Reporte","4","4",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte de atención a turístas en el Módulo de Información Turística.","Reporte","4","4",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Promoción de los diferentes atractivos turísticos del Pueblo Mágico","Promocion","4","4",153,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Asistir a prácticas demostrativas aplicadas al sector agropecuario, promoviéndolo con los productores","Asistencia","4","4",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Capacitación y/o asistencia técnica en temas agropecuarios","Capacitación","16","16",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Promoción de productores (as) agropecuarios en la Feria de San Isidro","Promoción","1","1",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Sesiones del Consejo de Desarrollo Rural Sustentable","Sesión","12","12",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Reporte de Encuestas de Satisfacción a los Ciudadanos","Reporte","12","12",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Gestionar u otorgar paquetes tecnológicos y apoyos agropecuarios","Gestión","6","6",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte de constancia de productor (a) agrícola y/o pecuario","Reporte","4","4",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Talleres impartidos a productores (as) rurales y urbanos","Taller","12","12",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Reporte de Empadronamiento  a productores rurales y semirurales","Reporte","0","0",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Gestión de Apoyo a productores (as) agropecuarios","Gestión ","0","0",154,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realizar actividades artísticas itinerantes","Actividad","0","0",155,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Presentación de la Banda Municipal a eventos Culturales","Presentación","0","0",155,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Supervisar las actividades realizadas de la subdirección","Reporte","0","0",156,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Difundir las actividades culturales del Municipio","Publicación","0","0",156,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Solicitar  la capacitación de personal para el manejo de la Librería del Fondo de Cultura Económica del Municipio de Metepec","Solicitud","0","0",156,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Realizar exposiciones al aire libre en espacios públicos","Exposicion","0","0",156,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Difundir el patrimonio cultural dl Municipio","Difusión","0","0",156,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Impulsar la investigaciones sobre las raices históricas, artísticas y culturales del Municipio","Investigación ","0","0",156,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Ceremonias de honores a la bandera en escuelas públicas","Ceremonia","9","9",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Evento del día del maestro","Evento","0","0",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Organizar el desfile cívico militar","Organización","1","1",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Publicación y difusión de convocatoria","Difusión","1","1",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Evento de entrega de apoyo de beca","Evento","1","1",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Instituciones educativas beneficiadas para atender sus necesidades escolares (equipo electrónico, material para rehabilitación, mobiliario escolar y/o material cívico escolar).","Donación","1","1",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Mantenimiento de los edificios escolares (rehabilitación en módulos sanitarios, canchas deportivas, areas verdes, impermeabilización, pintura, herrería etc.) para mejorar su infraestructura física.","Servicio","0","0",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Construcción de techumbres, aulas, módulos sanitarios, aumento, derribo y construcción de bardas perimetrales.","Institución Educativa","0","0",157,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Gestionar proyectos para acceder a recursos Federales y Estatales","Gestión","0","0",158,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Gestionar patrocinios para la realización de eventos culturales ","Gestión","0","0",158,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Gestionar Vinculaciones artisticas y culturales.","Gestión","0","0",158,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realizar charlas con escritores del municipio","Evento","0","0",159,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realizar Actividades literarias dentro de la Librería del Fondo de Cultura Económica","Actividad","0","0",159,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Elaborar stickers ilustrativos con contenido  literario","Publicación","0","0",159,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe de visitas a instituciones educativas","Informe","0","0",160,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe de servicios realizados a escuelas por la brigada de mantenimiento.","Informe","0","0",161,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Impartir talleres artístico culturales en las cinco casas de cultura","Taller","0","0",162,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realizar Exposiciones en Casas de Cultura","Exposicion","0","0",162,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Realizar Eventos Artístico Culturales en Casas de Cultura","Evento","0","0",162,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realizar Conferencias culrales e históricas","Conferencia","0","0",163,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realizar la publicsación de artículos físicos o dijitales para promover la história y tradición del Municipio.","Publicación","0","0",163,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Realizar recorridos que muestren el patrimonio histórico del Municipio","Reporte","0","0",163,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Realizar Exposiciones en el Museo del Barro","Exposicion","0","0",164,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realizar Visitas Guiadas en el Museo del Barro","Actividad","0","0",164,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Realizar eventos artisticos en el Museo del","Evento","0","0",164,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Seguimiento de las actividades de los departamentos.","Informe","0","0",165,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe de asesoria de software y hardware de los equipos de computo","informe ","0","0",166,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe de evaluación de los Programas  de la Dirección de Educación.","Informe","4","4",167,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Promocionar los servicios de alfabetización, rezago educativo, preparatoria abierta y Univesidad Digital del Estado de México UDEMEX, a través de diferentes medios a la población en general.","Promoción","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Visitas de supervisión a asesorados o educandos en círculos de estudio y plazas comunitarias.","Visita","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Personas certificadas por el programa de Alfabetización y Rezago Educativo.","Certificado","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Informe mensual de asesorías brindadas a la población interesada en concluir sus estudios de nivel básico.","Informe","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Usuarios certificados en Preparatoria Abierta.","Certificado","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Trámites realizados de preparatoria abierta","Trámite","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Infrme de alumnos inscritos en la Universidad Digital del Estado de México UDEMEX","Informe","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Usuarios certificados a través de la Univesidad Digital del Estado de México UDEMEX","Certificado","12","12",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Informe  de actividades de fomento a la lectura y talleres","Informe","12","12",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Informe de usuarios atendidos en las bibliotecas.","Informe","12","12",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Informe de promoción de las actividades realizadas en las bibliotecas a tráves de diferentes medios.","Informe","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Informe de visitas de supervisión a bibliotecas.","Informe","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Cartas de Aceptación de  prestadores para realizar Servicio Social o Prácticas Profesionales.","Carta de aceptación","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("14","Cartas de Liberación a prestadores que concluyen su Servicio Social o Prácticas Profesionales.","Carta de liberación","0","0",168,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de población adulta alfabetizada","Reporte","0","0",169,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de poblacion adulta anlafabetas inscritas en INEA","Reporte","0","0",169,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Cursos de alfabetización de INEA","Curso","0","0",169,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Reporte de platicas de invitación a los cursos de INEA","Reporte","0","0",169,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte de asesorias a alumnos de nivel medio superior en la modalidad no escolarizada","Reporte","0","0",170,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de difusión y platicas informativas","Reporte","0","0",170,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Supervisar las actividades  Culturales Itinerantes","Supervisar","0","0",171,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Realizar Celebraciones Conmemorativas","Celebracion","0","0",171,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Realizar exposicioines artísticas Itinerantes","Exposicion","0","0",171,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Realizar Festivales Culturales ","Festival","0","0",171,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Realizar Concursos Culturales en el Municipio","Concurso","0","0",171,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Supervisar todas las actividades culturales que realicen las subdirecciones","Reporte","2","2",172,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Desarrollar el programa cultural anual","Programa","2","2",172,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Autorizar el uso de las instalaciones culturales del Municipio","Autorización","0","0",172,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Establecer la ubicación de la telefonia para las oficinas de la Dirección.","Informe","0","0",173,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Establecer los servicios de internet asignados para las oficinas de la Dirección","Informe","0","0",173,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Realizar  y Establecer el servicio de acceso a interner de la Dirección y del Centro de Mando Municipal.","Informe","0","0",173,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Asignar la lona institucional para ceremonias oficiales","Informe","0","0",173,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Coordinar los eventos Institucionales de la Dirección (Día del Policia, y Eventos de la Unidad de Proximidad)","Informe","0","0",173,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Llevar a cabo la Implementación del Modelo de Justicia Civica de acuerdo a lo establecido por el SESNSP  y la Implementación del Modelo de Policia de Proximidad","Informe","0","0",173,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Reporte del Estado de Fuerza Efectiva de la Coporporacion","Reporte","4","4",174,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Establecer el programa para realizar el examen toxicologico denominado antidoping para personal operativo","Informe","0","0",174,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Gestionar el suministro de servicios (luz, agua, recarga de extintores, internet, etc.) para desempeñar las actividades de la Dirección de seguridad pública.","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Gestión para la adquisición de uniformes para personal operativo.","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Gestion del servicio de reparacion y/o mantenimiento de instalaciones y/o inmubles.","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Gestion de certificacion CALEA","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Revisión, registro y programación de consumo de combustible y de servicios/cambios de aceite proporcionado a unidades adscritas a Seguridad Pública.","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Supervisión y registro de cambio de neumáticos, acorde a existencia y rendimiento de unidades","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Revisión y Mantenimiento de a los dispositivos GPS instalados en las unidades adscritas a Seguridad Pública ","Informe","1","1",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Registro de cambios de refacciones y servicios  mayores a unidades adscritas a Seguridad Pública ","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Programación de verificaciones y pagos de tenencia a unidades administrativas acorde a calendario ","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Supervisión e Informe del estado de uso en que se encuentra el equipo de radiocomunicación ","Informe","0","0",175,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Llevar a cabo Operativos Policia K9","Operativo","0","0",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Apoyo con Medidas de Protección a personas que han sido Victimas en Materia de Género","Reporte","850","850",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Consultas Psicologicas a la población en materia de salud mental","Reporte","80","192",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Busqueda/Localización de personas ausentes y/o desaparecidas en seguimiento al boletin de persona desaperecidas/Alerta Amber","Reporte","0","0",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Equipar al personal operativo de protectores auditivos para practica de tiro.","Reporte","0","0",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Equipar al personal operativo de municiones para el ejercicio de sus funciones","Reporte","0","0",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Asignarles a los cuadrantes casetas moviles de vigilancia para la prevencióndel delito","Reporte","0","0",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Entrega de Incentivos a elementos operativos por sus acciones extraordinarias ","Reporte","0","0",176,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Generación de Informe Policial Homologado de la Plataforma México","Folios","5600","5600",177,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Implementar nuevos puntos de videovigilancia dentro del municipio para temas de prevención del delito","Gestión","0","0",177,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Generar la calendarización para el mantenimiento preventivo y correctivo de las cámaras que presenten alguna falla en funcionamiento","Reporte","12","12",177,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Generar recorridos aéreos con equipos tecnológicos de videovigilancia (drones), para temas de prevención del delito","Recorrido","0","0",177,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elementos operativos capacitados en el taller que corresponda completar el esquema considerado en el marco de justicia penal","Elemento","135","135",178,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Evalución de elementos operativos ante el Centro de Control y Confianza","Evaluación ","92","92",178,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Llenado del Formato Unico de Evaluación ante el sistema nacional de seguridad publica","Ceritificado","75","75",178,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Elementos policiales capacitados ","Elemento","130","135",178,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Capacitar al personal de nuevo ingreso y en activo para el ejercicio de la funcion policial ","Capacitación ","30","30",178,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reclutamiento, selección y certificación  de personal de nuevo ingreso con formación policial vigente.","Aspirante","0","0",178,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Operativo Conduce Sin Alcohol","Reporte","4","0",179,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Infracciónes por faltas al Reglamento de Tránsito por parte de los cuidadanos","Reporte","22000","24246",179,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Mantenimiento preventivo y correctivo de los semáforos que pertenecen al Municipio","Reporte","4","240",179,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Asesorar a la Administración municipal en las acreditaciones públicas, privadas y sociales.","Asesoría","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Orientar y coordinar al personal enlace de cada una de las acreditaciones de la gestión pública municipal.","Asesoría","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Supervisar el cumplimiento de cada una de las bases de las diversas convocatorias a nivel municipal, estatal, federal e internacional.","Informe","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Elaborar el proyecto de presupuesto, de las distintas áreas de la Dirección de Gobierno por Resultados.","Presupuesto","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Participar como enlace con la Tesoreria Municipal y la Dirección de Administración.","Asesoría","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Coordinar a los enlaces de la Dirección de Gobierno por Resultados  para cumplir en tiempo y forma IPOMEX y SAIMEX","Asesoría","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Generar un catálogo de premios","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Actualización del catálogo de premios","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Generar un catálogo de reconocimientos","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Actualización del catálogo de reconocimientos","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Generar un catálogo de distintivos","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Actualizar el catálogo de distintivos","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Generar un catálogo de prácticas exitosas","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("14","Acuralizar el catálogo de prácticas exitosas","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("15","Generar un catálogo de calificaciones","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("16","Actualizar el catálogo de calificaciones","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("17","Generar un catálogo de certificaciones","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("18","Actualizar el catálogo de certificaciones","Catálogo","0","0",180,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Integración del PbRM 2022.","Documento","1","1",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Integración del Programa Anual de Evaluación (PAE) 2022.","Documento","1","1",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Integración de los Términos de Referencia 2022.","Documento","1","1",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Integración del Modelo de Convenio para la Mejora del Desempeño y Resultados Gubernamentales.","Documento","1","1",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Participar en la integración del Plan de Desarrollo Municipal 2022-2024 (PDM)","Participación","0","0",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Reporte del Formato PbRM-08c","Archivo digital","4","4",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Reporte  del Formato PbRM-08b","Archivo digital","4","4",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Participar en la integración del Informe de Gobierno 2022","Apoyo","0","0",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Asesorías en materia de planeación-evaluación a servidores públicos.","Asesoría","40","40",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Apoyar en la organización de las esiones del COPLADEMUN","Sesión","4","4",181,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Diseño del Tablero de control y seguimiento de acciones de gobierno","Plantilla","0","0",182,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Seguimiento y monitoreo mensual de metas y actividades por dirección, subdirección, coordinación y departamento a través del Tablero de control y seguimiento de acciones de gobierno","Informe","0","0",182,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Capacitación a enlaces de las unidades administrativas en el uso y manejo del Tablero de control y seguimiento de acciones de gobierno","Capacitación","0","0",182,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Seguimiento mensual al cumplimiento de lineas de acción del Plan de Desarrollo Municipal","Informe","0","0",182,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Impartir cursos en materia de la guia consultiva de desempeño municipal","Curso","1","1",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Encuesta de clima laboral","Encuesta","0","0",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Brindar Asesorias  de la Guia Consultiva de Desempeño Municipal (GDM)","Asesoría","30","30",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Verificaciones internas a las dependencias de la administracion publica municipal en materia de la GDM","Verificación","2","2",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Informe de atención de asuntos sociopolíticos","Verificacion","1","1",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Impartir Cursos para la Actuaslizacion de Manuales de Organización y Procedimientos","Curso","2","2",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Asesorias en Materia de Manuales de Organización y Procedimientos","Asesoria","30","30",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Actualizar y Validar los Organigramas de la Administracion Pública Municipal","Organigrama","25","25",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Actualizar y Gestionar la Publicacion del Manual General de Organización de la Administracion Municipal","Manual","1","1",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Actualizar y Gestionar la Publicación de los Manuales Administrativos","Manual","25","25",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Elaboracion de proyectos de innovación","Proyecto","3","3",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Auditoría interna a la Norma Mexicana NMX-R-025-SCFI-2015 en materia de Igualdad Laboral y NO Discriminación.","Auditoría","1","1",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Asesorías y capacitación de los Lineamientos de la Norma Mexicana NMX-R-025-SCFI-2015 en materia de Igualdad Laboral y NO Discriminación.","Asesoría","0","0",183,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Vigilar la implementación de la Guía Consultiva de Desempeño Municipal.","Informe","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Verificar que las dependencias actualicen sus manuales de organización y manuales de procedimientos.","Reporte","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Vigilar la instalación y operación del Sistema de Protesta Ciudadana.","Publicación","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Vigilar la publicación del Programa Anual de Mejora Regularotia en la página web del municipio.","Publicación","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Coordinar y supervisar las acciones refrentes a acreditaciones, premios, certificaciones, reconocimientos y practicas exitosas.","Reporte","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Implantar en la administración pública municipal el tablero de control y seguimiento de acciones de gobierno.","Propuesta","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Supervisar la implementación de los sistemas de gestión, de calidad y antisoborno.","Reporte","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Verificar la integración del Presupuesto basado en Resiultados Municipal 2022 (PbRM).","Reporte","0","0",184,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Programa Anual de Mejora Regulatoria Municipal ","Programa","1","1",185,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Actualización del Catálogo de Trámites y Servicios","Trámite y/o Servicio","80","80",185,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Integración y Aprobación de propuestas al marco regulatorio municipal","Propuesta","20","20",185,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Programa Anual de Mejora Regulatoria Municipal publicado","Publicación","1","1",185,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Sesiones de la Comisión Municipal de Mejora Regulatoria","Sesión","4","4",185,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Cursos de Capacitación a los Integrantes del Sistema Integral de Gestión (SIG)","Curso","8","8",186,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Asesorías a los dueños de procesos del SIG","Asesoría","40","40",186,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Auditorías internas al SIG","Auditoría","2","2",186,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Informe de revisión por la alta dirección del SIG","Informe","2","2",186,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Auditoría externa de mantenimiento al Sistema de Gestión de Calidad","Auditoría","1","1",186,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Auditoría externa de mantenimiento al Sistema de Gestión Anti Soborn","Auditoría","1","1",186,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informe de  seguimiento de trámites en ventanilla","Informe","0","0",187,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de supervisión de verificadores en campo","Reporte","0","0",187,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Cursos de profesionalización del desempeño del personal administrativo de la Coordinación","Curso","0","0",188,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Impartición de cursos de actualización del desempeño del personal operativo de la Coordinación","Curso","0","0",188,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Elaborar planes específicos de protección civil por factores de vulnerabilidad.","Plan","7","7",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Verificar medidas de seguridad en establecimientos.","Informe","0","0",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Revisar el cumplimiento del programa de protección civil escolar.","Programa","10","10",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Promover la cultura de calles limpias.","Difusión","6","6",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("5","Impartir cursos de inducción a la protección civil.","Curso","40","40",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("6","Impartir cursos de primeros auxilios.","Curso","20","20",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("7","Impartir cursos para evitar un niño quemado.","Curso","12","12",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("8","Impartir cursos de prevención de accidentes en la escuela y el hogar.","Curso","14","14",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("9","Población capacitada en materia de protección civil.","Informe","0","0",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("10","Realizar analíticos estadísticos de las contingencias por factores de riesgo.","Estadística","2","2",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("11","Brindar la atención de emergencias prehospitalarias de manera oportuna.","Informe","0","0",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("12","Población atendida en materia de protección civil.","Informe","0","0",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("13","Valorar riesgos por factores de vulnerabilidad.","Valoración de riesgo","60","60",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("14","Actualizar factores de riesgos.","Actualización","31","31",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("15","Formato de seguimiento a acuerdos del Consejo Municipal de Protección Civil.","Formato ","2","2",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("16","Minuta de verificación del cumplimiento de los acuerdos del Consejo Municipal de Protección Civil.","Minuta ","2","2",189,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Informes de  operativos de revisión de medidas de seguridad a establecimientos comerciales y prestadores de servicio.","Informe","0","0",190,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Reporte de revisión y preaprobación de Constancia de Visto Bueno.","Reporte","0","0",190,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("1","Impartir cursos de prevención y combate de incendios.","Curso","37","37",191,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("2","Población capacitada en cursos de prevención y combate de incendios.","Informe","0","0",191,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("3","Monitorear los fenómenos perturbadores que afecten a la ciudadanía.","Revisión","342","342",191,1,1);
INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado) VALUES ("4","Brindar la atención de emergencias urbanas de manera oportuna.","Informe","0","0",191,1,1);


DROP TABLE IF EXISTS programaciones;
CREATE TABLE programaciones(
    id_programacion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    enero INT,
    febrero INT,
    marzo INT,
    abril INT,
    mayo INT,
    junio INT,
    julio INT,
    agosto INT,
    septiembre INT,
    octubre INT,
    noviembre INT,
    diciembre INT,
    id_atividad INT,
    CONSTRAINT FK_programacion_actividad FOREIGN KEY (id_atividad) REFERENCES actividades (id_actividad) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",1);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",2);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",3);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",4);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",5);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",6);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",7);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",8);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","1","0","0","1","0","1","0","0",9);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","1","0","0",10);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","1","0","0","0","0",11);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",12);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",13);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",14);
INSERT INTO programaciones VALUES (NULL, "0","0","0","350","0","0","0","0","0","0","0","0",15);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",16);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","1","0",17);
INSERT INTO programaciones VALUES (NULL, "4","4","4","4","4","4","4","4","4","4","4","4",18);
INSERT INTO programaciones VALUES (NULL, "4","4","4","4","4","4","4","4","4","4","4","4",19);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",20);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",21);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",22);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",23);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",24);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",25);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",26);
INSERT INTO programaciones VALUES (NULL, "0","1","1","0","1","1","1","0","1","1","0","1",27);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","1","0","0","1","0","1","0",28);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","0","0","1","0","0","1","0",29);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",30);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",31);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","1","0","1","0","1","0","1",32);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",33);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",34);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",35);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",36);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",37);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",38);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","1","0","0",39);
INSERT INTO programaciones VALUES (NULL, "4","4","5","3","5","4","3","5","4","4","5","2",40);
INSERT INTO programaciones VALUES (NULL, "4","4","5","3","5","4","3","5","4","4","5","2",41);
INSERT INTO programaciones VALUES (NULL, "1","1","0","0","1","1","1","1","1","1","1","1",42);
INSERT INTO programaciones VALUES (NULL, "1","1","0","0","1","1","1","1","1","1","1","1",43);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",44);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",45);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",46);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",47);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",48);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","1","1",49);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",50);
INSERT INTO programaciones VALUES (NULL, "20","0","0","5","20","20","15","20","20","30","20","10",51);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",52);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",53);
INSERT INTO programaciones VALUES (NULL, "8","8","9","8","14","14","8","10","17","14","14","8",54);
INSERT INTO programaciones VALUES (NULL, "4","4","5","4","4","4","4","4","4","3","3","2",55);
INSERT INTO programaciones VALUES (NULL, "2","2","2","4","5","6","3","3","8","6","6","3",56);
INSERT INTO programaciones VALUES (NULL, "2","2","2","1","2","2","1","2","2","2","2","0",57);
INSERT INTO programaciones VALUES (NULL, "3","3","3","2","3","2","2","2","3","3","3","1",58);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","1","0","0",59);
INSERT INTO programaciones VALUES (NULL, "0","1","2","0","1","1","1","0","1","0","0","0",60);
INSERT INTO programaciones VALUES (NULL, "15","15","15","15","15","15","15","15","15","15","15","15",61);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","0","0","1","0","0","1","0",62);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","1","0","0","1","0","1",63);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",64);
INSERT INTO programaciones VALUES (NULL, "4","4","4","5","4","4","5","4","4","4","4","4",65);
INSERT INTO programaciones VALUES (NULL, "3","3","3","3","3","3","4","3","3","4","4","4",66);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",67);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","1","0","0","1","0","0",68);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","1","0",69);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",70);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",71);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","1","0","0","0",72);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",73);
INSERT INTO programaciones VALUES (NULL, "7","4","4","4","4","4","4","4","4","4","4","4",74);
INSERT INTO programaciones VALUES (NULL, "6","4","4","6","4","4","4","4","4","4","4","4",75);
INSERT INTO programaciones VALUES (NULL, "7","4","5","4","4","5","4","4","5","4","4","4",76);
INSERT INTO programaciones VALUES (NULL, "7","4","4","4","4","4","4","4","4","4","4","4",77);
INSERT INTO programaciones VALUES (NULL, "6","4","4","6","4","4","4","4","4","4","4","4",78);
INSERT INTO programaciones VALUES (NULL, "7","4","4","4","4","4","4","4","4","4","4","4",79);
INSERT INTO programaciones VALUES (NULL, "5","5","5","4","4","4","4","4","4","4","4","4",80);
INSERT INTO programaciones VALUES (NULL, "7","4","4","4","4","4","4","4","4","4","4","4",81);
INSERT INTO programaciones VALUES (NULL, "5","5","5","4","4","4","4","4","4","4","4","4",82);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",83);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","1","0","0","1","0","0","1","0",84);
INSERT INTO programaciones VALUES (NULL, "5","4","4","4","5","4","4","5","4","4","4","4",85);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","1","0","0","3",86);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",87);
INSERT INTO programaciones VALUES (NULL, "8","10","8","8","8","10","8","10","8","8","8","10",88);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",89);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","1","0",90);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",91);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",92);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",93);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",94);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",95);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",96);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",97);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",98);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",99);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",100);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",101);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","1","0","1",102);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",103);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",104);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",105);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",106);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",107);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",108);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",109);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",110);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",111);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",112);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",113);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",114);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",115);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",116);
INSERT INTO programaciones VALUES (NULL, "0","50","50","50","50","50","50","50","50","50","50","0",117);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",118);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",119);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",120);
INSERT INTO programaciones VALUES (NULL, "291","292","292","291","292","292","291","292","292","291","292","292",121);
INSERT INTO programaciones VALUES (NULL, "50","50","50","50","50","50","50","50","50","50","50","50",122);
INSERT INTO programaciones VALUES (NULL, "20","6","8","11","4","3","5","3","1","1","0","0",123);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","1","1",124);
INSERT INTO programaciones VALUES (NULL, "14","39","41","39","43","44","40","41","41","40","38","30",125);
INSERT INTO programaciones VALUES (NULL, "0","0","2","1","1","3","1","1","3","2","3","3",126);
INSERT INTO programaciones VALUES (NULL, "0","0","3","0","0","3","1","1","1","1","2","3",127);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",128);
INSERT INTO programaciones VALUES (NULL, "0","3","2","1","1","1","1","1","1","1","1","1",129);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",130);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",131);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",132);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","1","0","0","1","0","0","1","0",133);
INSERT INTO programaciones VALUES (NULL, "1","2","2","3","3","3","3","3","3","3","3","3",134);
INSERT INTO programaciones VALUES (NULL, "3","3","3","4","5","5","5","4","5","5","4","4",135);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",136);
INSERT INTO programaciones VALUES (NULL, "38","60","60","30","40","55","70","55","60","65","70","30",137);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",138);
INSERT INTO programaciones VALUES (NULL, "0","2","4","4","4","4","0","0","0","0","0","0",139);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",140);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",141);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",142);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",143);
INSERT INTO programaciones VALUES (NULL, "3","0","1","2","1","1","1","1","1","1","1","2",144);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",145);
INSERT INTO programaciones VALUES (NULL, "10","20","20","20","20","20","20","20","20","20","20","20",146);
INSERT INTO programaciones VALUES (NULL, "1","89","3","2","2","2","2","2","2","1","1","1",147);
INSERT INTO programaciones VALUES (NULL, "10","25","25","25","25","25","25","25","25","25","25","25",148);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",149);
INSERT INTO programaciones VALUES (NULL, "60","40","40","40","40","40","40","40","40","40","40","40",150);
INSERT INTO programaciones VALUES (NULL, "30","20","20","20","20","20","20","20","20","20","20","20",151);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",152);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",153);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","1","0","0","1","0","0","1","0",154);
INSERT INTO programaciones VALUES (NULL, "0","2","2","2","2","2","2","2","2","2","2","2",155);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",156);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",157);
INSERT INTO programaciones VALUES (NULL, "0","1","2","2","2","2","3","2","3","3","3","2",158);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",159);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","0","1","0","1","0","1","0",160);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","1","1","1","1","1","1","1","1",161);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",162);
INSERT INTO programaciones VALUES (NULL, "1","0","0","1","0","0","1","0","0","1","0","0",163);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",164);
INSERT INTO programaciones VALUES (NULL, "0","0","2","1","3","1","3","2","2","2","0","0",165);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","2","2","0","0","0",166);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","3","3","0","0","0",167);
INSERT INTO programaciones VALUES (NULL, "0","15","20","10","10","10","10","10","10","10","10","10",168);
INSERT INTO programaciones VALUES (NULL, "10","15","23","28","25","25","25","24","27","28","23","22",169);
INSERT INTO programaciones VALUES (NULL, "0","3","3","2","1","1","1","1","2","2","0","0",170);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","1","1","1","1","1","1","1","1",171);
INSERT INTO programaciones VALUES (NULL, "33","33","34","33","33","34","33","33","34","33","33","34",172);
INSERT INTO programaciones VALUES (NULL, "25","80","150","180","100","90","90","80","70","50","40","25",173);
INSERT INTO programaciones VALUES (NULL, "80","80","50","70","60","110","100","100","100","100","100","100",174);
INSERT INTO programaciones VALUES (NULL, "25","20","15","15","15","15","15","15","15","15","15","15",175);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",176);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",177);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",178);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",179);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",180);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",181);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",182);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",183);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",184);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",185);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",186);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",187);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",188);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",189);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",190);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",191);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",192);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",193);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",194);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",195);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",196);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",197);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",198);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",199);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","52",200);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","22",201);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","58",202);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",203);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",204);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",205);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",206);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",207);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",208);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",209);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",210);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","102",211);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",212);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",213);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",214);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",215);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",216);
INSERT INTO programaciones VALUES (NULL, "834","834","834","834","834","834","834","834","834","834","834","834",217);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",218);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",219);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",220);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",221);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",222);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",223);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",224);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","1","0",225);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","1","0","0","0","0","0",226);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",227);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","0","0","1","0","1","0","0",228);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",229);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","1","0","0",230);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",231);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",232);
INSERT INTO programaciones VALUES (NULL, "1","1","1","0","0","0","0","0","0","0","0","0",233);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",234);
INSERT INTO programaciones VALUES (NULL, "1","1","1","0","0","0","0","0","0","0","0","0",235);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","1","0","0","0","1","0","0",236);
INSERT INTO programaciones VALUES (NULL, "1","2","4","0","0","0","0","0","0","0","0","0",237);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",238);
INSERT INTO programaciones VALUES (NULL, "0","5","9","7","9","9","7","9","9","9","9","7",239);
INSERT INTO programaciones VALUES (NULL, "30","30","30","100","100","100","100","100","100","100","100","100",240);
INSERT INTO programaciones VALUES (NULL, "0","5","10","5","10","10","5","10","10","10","10","5",241);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",242);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","1","0","0",243);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",244);
INSERT INTO programaciones VALUES (NULL, "0","1","1","0","1","1","0","1","0","0","1","0",245);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",246);
INSERT INTO programaciones VALUES (NULL, "0","1","3","3","4","4","3","4","4","4","4","1",247);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","1","1","1","1","1","1","1","1",248);
INSERT INTO programaciones VALUES (NULL, "0","2","4","3","4","4","3","4","4","4","4","2",249);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",250);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",251);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","1","0","1","1","1","1","0",252);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","1","0","1","1","1","1","0",253);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",254);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",255);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","3","3","2","3","3","3","3","1",256);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","1","0","1","1","1","1","0",257);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","1","0",258);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","1","0",259);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",260);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","1","0","1","0",261);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",262);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","1","0","1","0","1","0","1",263);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","1","0","1","0","1","0","1",264);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","1","0","1","0","1","0","1",265);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",266);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",267);
INSERT INTO programaciones VALUES (NULL, "70","0","0","0","0","0","0","0","0","0","0","0",268);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",269);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",270);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","0","1","0","2","0","2","0","0",271);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",272);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",273);
INSERT INTO programaciones VALUES (NULL, "0","4","4","4","4","4","4","4","4","4","4","4",274);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",275);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",276);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",277);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",278);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",279);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","1","0","1","0","0",280);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","1","0","1","0","1","0",281);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","8000","0","8000","0","8000","0","8000","0",282);
INSERT INTO programaciones VALUES (NULL, "2","6","11","5","11","11","6","6","11","11","11","5",283);
INSERT INTO programaciones VALUES (NULL, "1","0","1","0","1","0","0","0","1","0","1","0",284);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","1","1","0","0","1","1","1","1",285);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",286);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","1","0",287);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","1","0","0",288);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",289);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",290);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","0",291);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","0",292);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","0",293);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","0",294);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","0",295);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","0",296);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","0",297);
INSERT INTO programaciones VALUES (NULL, "2","6","11","5","11","11","6","6","11","11","11","5",298);
INSERT INTO programaciones VALUES (NULL, "1","0","1","0","1","0","0","0","1","0","1","0",299);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","1","0","0","0","0",300);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","1","1","0","0","1","1","1","1",301);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",302);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",303);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",304);
INSERT INTO programaciones VALUES (NULL, "0","0","2","2","2","2","2","2","2","2","2","2",305);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",306);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","1","0","0","0","1","0","1","0",307);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",308);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",309);
INSERT INTO programaciones VALUES (NULL, "70","0","0","0","0","0","0","0","0","0","0","0",310);
INSERT INTO programaciones VALUES (NULL, "0","4","5","0","0","0","0","0","0","0","0","0",311);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",312);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",313);
INSERT INTO programaciones VALUES (NULL, "1","0","0","2","0","1","0","3","0","2","0","0",314);
INSERT INTO programaciones VALUES (NULL, "6","0","10","0","10","10","10","10","10","10","10","10",315);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","2","0","2","0","1",316);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","1","1","1","1","1","1","1",317);
INSERT INTO programaciones VALUES (NULL, "2","2","4","3","4","4","3","3","4","4","4","1",318);
INSERT INTO programaciones VALUES (NULL, "0","8","8","8","8","8","8","8","8","8","8","8",319);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",320);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","0","0","1","0","0","1","0","0",321);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","1","0",322);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","1","0","0",323);
INSERT INTO programaciones VALUES (NULL, "3","2","1","0","0","1","0","0","0","0","0","0",324);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","1","0","1","0","1","0","1",325);
INSERT INTO programaciones VALUES (NULL, "0","2","2","0","0","2","0","0","1","0","1","0",326);
INSERT INTO programaciones VALUES (NULL, "0","1","1","2","0","0","1","0","0","0","1","0",327);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",328);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","1","0","0",329);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","0","0","0","0","0","0","0",330);
INSERT INTO programaciones VALUES (NULL, "0","3","3","3","3","3","3","3","0","3","3","0",331);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","1","0",332);
INSERT INTO programaciones VALUES (NULL, "0","1","1","0","1","1","1","0","1","1","1","0",333);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","1","0",334);
INSERT INTO programaciones VALUES (NULL, "1","1","0","0","0","1","0","0","1","0","0","0",335);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","1","0",336);
INSERT INTO programaciones VALUES (NULL, "0","0","3","0","0","0","0","0","0","0","0","0",337);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",338);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","0","0","0","0","0","0","0",339);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","4","3","3","3","3","4","2","0",340);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","4","3","3","3","3","3","3","0",341);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","1","0","1","0","0",342);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","4","3","3","3","3","3","3","0",343);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","4","3","3","3","3","3","3","0",344);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","5","3","4","3","4","3","4","0",345);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","5","3","3","3","3","3","3","0",346);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","1","0","1","0","1","0",347);
INSERT INTO programaciones VALUES (NULL, "3","0","2","1","1","4","2","1","3","2","2","1",348);
INSERT INTO programaciones VALUES (NULL, "0","1","1","2","1","2","1","1","2","1","1","1",349);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",350);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","1","0","1","2","0",351);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","0","0","0","0","0","0","0",352);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",353);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",354);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","1","0","0","0","0",355);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","1","0",356);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",357);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","1","0",358);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",359);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",360);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","2","1","1","1","1","2","0","0",361);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","2","1","1","1","1","2","0","0",362);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","2","1","1","1","1","1","1","0",363);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","2","1","1","1","1","1","1","0",364);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","2","1","1","1","1","1","1","0",365);
INSERT INTO programaciones VALUES (NULL, "0","0","0","2","2","1","1","1","1","1","1","0",366);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","3","1","1","1","1","1","1","0",367);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",368);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","0","0","0","1","0","0","1",369);
INSERT INTO programaciones VALUES (NULL, "0","1","1","0","0","1","0","0","0","0","0","0",370);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",371);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",372);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",373);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",374);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",375);
INSERT INTO programaciones VALUES (NULL, "0","2","1","1","1","1","1","1","1","1","1","1",376);
INSERT INTO programaciones VALUES (NULL, "0","2","1","1","1","1","1","1","1","1","1","1",377);
INSERT INTO programaciones VALUES (NULL, "0","2","1","1","1","1","1","1","1","1","1","1",378);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",379);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",380);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",381);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","2","0","0","0","1","1","1","1",382);
INSERT INTO programaciones VALUES (NULL, "8","8","8","8","8","8","8","8","8","8","8","8",383);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",384);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",385);
INSERT INTO programaciones VALUES (NULL, "1","1","1","0","0","0","0","0","0","0","0","0",386);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","1","1","1","1","1","1","1","1",387);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",388);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",389);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",390);
INSERT INTO programaciones VALUES (NULL, "1","3","2","1","3","2","1","3","2","1","3","2",391);
INSERT INTO programaciones VALUES (NULL, "1","3","2","1","3","2","1","3","2","1","3","2",392);
INSERT INTO programaciones VALUES (NULL, "1","3","2","1","3","2","1","3","2","1","3","2",393);
INSERT INTO programaciones VALUES (NULL, "0","3","3","1","3","2","1","3","2","1","3","2",394);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",395);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",396);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",397);
INSERT INTO programaciones VALUES (NULL, "0","2","1","1","1","1","1","1","1","1","1","1",398);
INSERT INTO programaciones VALUES (NULL, "0","2","1","1","1","1","1","1","1","1","1","1",399);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",400);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",401);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",402);
INSERT INTO programaciones VALUES (NULL, "0","2","1","1","1","1","1","1","1","1","1","1",403);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",404);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","1","0","0","2","0","0","1",405);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",406);
INSERT INTO programaciones VALUES (NULL, "0","0","3","1","1","1","1","1","1","1","1","1",407);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","5","10","5",408);
INSERT INTO programaciones VALUES (NULL, "0","0","10","10","5","5","15","15","10","0","0","0",409);
INSERT INTO programaciones VALUES (NULL, "23","2","0","10","10","10","10","10","10","5","5","5",410);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",411);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","1","1","1","0","1","0","0",412);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","1","0","0","1","0",413);
INSERT INTO programaciones VALUES (NULL, "3","3","9","9","9","9","9","9","9","9","9","9",414);
INSERT INTO programaciones VALUES (NULL, "0","0","8","8","8","8","8","8","8","8","8","8",415);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","5","0","0","5","0","0","5",416);
INSERT INTO programaciones VALUES (NULL, "5","5","5","5","5","5","5","5","5","5","5","5",417);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",418);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","1","0","0","2","0","0","1",419);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",420);
INSERT INTO programaciones VALUES (NULL, "0","0","3","1","1","1","1","1","1","1","1","1",421);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","5","10","5",422);
INSERT INTO programaciones VALUES (NULL, "0","0","10","10","5","5","15","15","10","0","0","0",423);
INSERT INTO programaciones VALUES (NULL, "23","2","0","10","10","10","10","10","10","5","5","5",424);
INSERT INTO programaciones VALUES (NULL, "1","1","0","1","0","0","1","0","0","1","0","0",425);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","2","2","2","2","2","2","2","2",426);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","1","0","0","0",427);
INSERT INTO programaciones VALUES (NULL, "216","20","20","10","14","10","10","10","10","10","10","10",428);
INSERT INTO programaciones VALUES (NULL, "10","1","1","2","2","2","2","2","2","2","2","2",429);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","0","0","0","0",430);
INSERT INTO programaciones VALUES (NULL, "0","3","0","4","3","4","0","0","5","0","0","0",431);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","1","0","0","0","0",432);
INSERT INTO programaciones VALUES (NULL, "296","74","50","50","50","50","50","50","50","50","50","50",433);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",434);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",435);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",436);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",437);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",438);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","1","0",439);
INSERT INTO programaciones VALUES (NULL, "2","0","0","1","0","0","0","0","0","0","1","0",440);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",441);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","1","0",442);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",443);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","0","0","1","0","0","1","0",444);
INSERT INTO programaciones VALUES (NULL, "0","0","5","15","15","15","10","15","15","15","15","10",445);
INSERT INTO programaciones VALUES (NULL, "0","0","5","20","20","20","10","15","15","15","15","10",446);
INSERT INTO programaciones VALUES (NULL, "0","0","0","5","20","20","20","10","15","15","15","15",447);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","5","20","20","20","10","15","15",448);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","5","20","20","20","10","15","15",449);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","5","20","20","20","10",450);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","1","0","0","1","0","0","1","0",451);
INSERT INTO programaciones VALUES (NULL, "0","2","0","0","1","0","0","1","0","0","1","0",452);
INSERT INTO programaciones VALUES (NULL, "0","0","15","15","15","15","15","15","15","15","15","15",453);
INSERT INTO programaciones VALUES (NULL, "0","0","5","15","15","15","10","15","15","15","15","10",454);
INSERT INTO programaciones VALUES (NULL, "0","0","5","15","15","15","10","15","15","15","15","10",455);
INSERT INTO programaciones VALUES (NULL, "0","0","5","5","5","5","5","5","5","5","0","0",456);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","5","0","5","0","5","0","5","0",457);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","1","0","1","1","1","0","1","0",458);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","1","0","1","1","1",459);
INSERT INTO programaciones VALUES (NULL, "0","0","4","4","4","4","4","4","4","4","4","0",460);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","1","0","0","0",461);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",462);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",463);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",464);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",465);
INSERT INTO programaciones VALUES (NULL, "100","100","70","100","100","100","100","100","90","100","100","40",466);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","10","10","10","10","10","0",467);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","10","10","10","10","10","0",468);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","1","0",469);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",470);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",471);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",472);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",473);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",474);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","0","0","0","0","0","0","0",475);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","1","0","0","1","0","1","1","0",476);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",477);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",478);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",479);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","1","1","1","2","1","1","1","1",480);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","1","2","1","1","1","1","1","1",481);
INSERT INTO programaciones VALUES (NULL, "1","0","1","0","0","1","0","0","1","0","0","1",482);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",483);
INSERT INTO programaciones VALUES (NULL, "0","0","3","0","0","3","0","0","3","0","0","3",484);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",485);
INSERT INTO programaciones VALUES (NULL, "0","0","3","0","0","3","0","0","3","0","0","3",486);
INSERT INTO programaciones VALUES (NULL, "327","767","542","555","473","498","473","534","489","454","622","222",487);
INSERT INTO programaciones VALUES (NULL, "327","767","542","555","473","498","473","534","489","454","622","222",488);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",489);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",490);
INSERT INTO programaciones VALUES (NULL, "0","0","10","0","0","10","0","0","10","0","0","10",491);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","0","0","0","0","0","0","0",492);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",493);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",494);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",495);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",496);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",497);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",498);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",499);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",500);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",501);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",502);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",503);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",504);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",505);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",506);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",507);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",508);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",509);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",510);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",511);
INSERT INTO programaciones VALUES (NULL, "1","1","0","0","0","0","0","0","0","0","0","0",512);
INSERT INTO programaciones VALUES (NULL, "1","0","1","0","0","0","0","0","0","0","0","0",513);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",514);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",515);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",516);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",517);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",518);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",519);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",520);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",521);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",522);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",523);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",524);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",525);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",526);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",527);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",528);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",529);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",530);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",531);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",532);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",533);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",534);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",535);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",536);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",537);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",538);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",539);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",540);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",541);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",542);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",543);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",544);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",545);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",546);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",547);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",548);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",549);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",550);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",551);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",552);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",553);
INSERT INTO programaciones VALUES (NULL, "15","13","20","25","27","20","15","20","25","20","25","20",554);
INSERT INTO programaciones VALUES (NULL, "9","12","15","15","18","11","8","15","20","15","19","18",555);
INSERT INTO programaciones VALUES (NULL, "5","13","20","25","28","20","15","20","25","20","25","20",556);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",557);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",558);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",559);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","1","0","0","1","1","0","1",560);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",561);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",562);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",563);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","1","0","0","0","0","1","0","0",564);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","1","0","0","0","0",565);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","1","0","0",566);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",567);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",568);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",569);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",570);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",571);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",572);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",573);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",574);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",575);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",576);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",577);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",578);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",579);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","0",580);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",581);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","0",582);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",583);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",584);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",585);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",586);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","21",587);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",588);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",589);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",590);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",591);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",592);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",593);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",594);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",595);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",596);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","0","0","0","0",597);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","1","1","1",598);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","0",599);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","1","0","0","0",600);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","66",601);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",602);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",603);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","1","1","0","1","1","0","0",604);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","1","1","1","0","1",605);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",606);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",607);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",608);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",609);
INSERT INTO programaciones VALUES (NULL, "1","4","4","3","4","4","3","4","4","4","4","2",610);
INSERT INTO programaciones VALUES (NULL, "25","25","50","25","25","50","50","50","50","50","25","25",611);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",612);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",613);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",614);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","1","1","0","1","1","0","1","1",615);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",616);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",617);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",618);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",619);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",620);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","1","0","0",621);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","1","0","0","0",622);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",623);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",624);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","1","0","0","0","0","0",625);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","1","0",626);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","1","0","0",627);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","1","0","0",628);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",629);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","1","0","0","0","1","1","1",630);
INSERT INTO programaciones VALUES (NULL, "0","0","0","100","0","0","0","0","0","100","0","100",631);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","1","0","0","0",632);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",633);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",634);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",635);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",636);
INSERT INTO programaciones VALUES (NULL, "0","0","5","0","0","5","0","0","5","0","0","5",637);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",638);
INSERT INTO programaciones VALUES (NULL, "0","2","1","1","1","1","1","1","1","1","1","1",639);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",640);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","2","0","0","2","0","0","0",641);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",642);
INSERT INTO programaciones VALUES (NULL, "0","1","2","1","1","1","1","1","1","1","1","1",643);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",644);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",645);
INSERT INTO programaciones VALUES (NULL, "5","14","7","6","9","8","9","9","10","0","8","0",646);
INSERT INTO programaciones VALUES (NULL, "2","2","2","2","2","2","2","2","2","0","2","0",647);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","1","1","1","1","1","1","1","1",648);
INSERT INTO programaciones VALUES (NULL, "0","4","0","0","4","4","4","4","10","30","4","4",649);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","1","0","0","0",650);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","1","0","0",651);
INSERT INTO programaciones VALUES (NULL, "0","2","0","0","2","2","2","2","2","2","2","2",652);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","1","0","0","0",653);
INSERT INTO programaciones VALUES (NULL, "0","2","1","0","1","0","0","0","2","0","1","0",654);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",655);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","1","0","0","0",656);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",657);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","1","0",658);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","1","0","1","1","0","1","0",659);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","1","0","1","1","0","0","1",660);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","1","1","0","0","1",661);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",662);
INSERT INTO programaciones VALUES (NULL, "0","0","0","3","3","3","3","3","3","0","0","0",663);
INSERT INTO programaciones VALUES (NULL, "0","2","0","0","0","0","0","0","0","2","1","0",664);
INSERT INTO programaciones VALUES (NULL, "0","2","2","2","2","2","2","2","2","4","2","1",665);
INSERT INTO programaciones VALUES (NULL, "0","2","2","2","2","2","2","2","2","4","2","1",666);
INSERT INTO programaciones VALUES (NULL, "0","0","4","0","0","4","0","0","4","0","4","0",667);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",668);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",669);
INSERT INTO programaciones VALUES (NULL, "0","10","10","10","10","10","10","20","10","10","10","0",670);
INSERT INTO programaciones VALUES (NULL, "0","2","2","2","2","2","2","2","2","4","2","2",671);
INSERT INTO programaciones VALUES (NULL, "0","3","4","4","4","4","4","4","4","11","4","4",672);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","1","1","1","1","1","3","1","1",673);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",674);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","1","1","1","1","1","3","1","1",675);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","1","1","1","1","2","0","1",676);
INSERT INTO programaciones VALUES (NULL, "3","3","4","1","1","1","1","1","1","1","1","1",677);
INSERT INTO programaciones VALUES (NULL, "0","2","2","2","2","2","2","2","2","6","2","1",678);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",679);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",680);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",681);
INSERT INTO programaciones VALUES (NULL, "1","2","2","2","2","2","2","2","2","2","2","2",682);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","2","1","2","2","2","1",683);
INSERT INTO programaciones VALUES (NULL, "29","6","5","4","4","4","4","4","7","7","7","4",684);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",685);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","1","2","0","1","1","2","1","0",686);
INSERT INTO programaciones VALUES (NULL, "3","4","4","2","4","4","1","2","4","4","4","0",687);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","1","0","0","1","0","0",688);
INSERT INTO programaciones VALUES (NULL, "2","2","2","2","2","2","2","2","2","2","2","2",689);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",690);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",691);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",692);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",693);
INSERT INTO programaciones VALUES (NULL, "16","20","14","12","10","7","7","8","15","10","8","8",694);
INSERT INTO programaciones VALUES (NULL, "16","8","8","3","2","3","8","8","5","3","3","3",695);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",696);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",697);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",698);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",699);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",700);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",701);
INSERT INTO programaciones VALUES (NULL, "7","16","9","8","11","10","11","11","12","0","10","0",702);
INSERT INTO programaciones VALUES (NULL, "1","1","0","1","1","0","0","0","1","0","1","0",703);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","0","1","0","0","0",704);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","1","0","1",705);
INSERT INTO programaciones VALUES (NULL, "0","1","1","0","0","1","0","0","0","0","0","0",706);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",707);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",708);
INSERT INTO programaciones VALUES (NULL, "0","3","3","3","3","3","3","3","3","3","3","0",709);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",710);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",711);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",712);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",713);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",714);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",715);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",716);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",717);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",718);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",719);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",720);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",721);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","1","0","0","1","0",722);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","1","0","0","1",723);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","1","0",724);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","1","0","0",725);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",726);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",727);
INSERT INTO programaciones VALUES (NULL, "0","0","30","0","0","30","0","0","30","0","0","30",728);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","1","0","0","1",729);
INSERT INTO programaciones VALUES (NULL, "0","0","1","20","20","20","20","16","16","16","16","16",730);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",731);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",732);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",733);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","1",734);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","1","0","0","0","0","1",735);
INSERT INTO programaciones VALUES (NULL, "467","467","467","467","467","467","467","467","467","467","467","467",736);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","5","5","5","5",737);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",738);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","3","3","4","3","3","4",739);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","120","121","0","100","15",740);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","71","0","0","92","0","0","92",741);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","75",742);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","76","0","0","0","0","0",743);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","5","0","0","0",744);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","40","0","0","0","0","0","0","0",745);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",746);
INSERT INTO programaciones VALUES (NULL, "2000","2000","2000","2000","2000","2000","2000","2000","2000","2000","2000","2000",747);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",748);
INSERT INTO programaciones VALUES (NULL, "0","1","1","1","2","0","0","2","1","2","1","0",749);
INSERT INTO programaciones VALUES (NULL, "0","1","1","0","1","1","1","2","2","2","1","0",750);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",751);
INSERT INTO programaciones VALUES (NULL, "7","0","0","0","0","0","0","0","0","0","0","0",752);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","1","0","0","1","0","0","1","0",753);
INSERT INTO programaciones VALUES (NULL, "1","0","0","1","0","0","1","0","0","1","0","0",754);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",755);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",756);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",757);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",758);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",759);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",760);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",761);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",762);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",763);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",764);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",765);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",766);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",767);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",768);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",769);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",770);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",771);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",772);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",773);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",774);
INSERT INTO programaciones VALUES (NULL, "0","0","20","0","0","10","0","0","10","0","0","10",775);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",776);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","1","0","0","0",777);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",778);
INSERT INTO programaciones VALUES (NULL, "0","0","1","1","0","1","0","0","0","0","0","0",779);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",780);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",781);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","0","0","0","0","0","0","0",782);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","30","0","0","0","0","0","0","0",783);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","0","0","0","0","0",784);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","1","0","0","0",785);
INSERT INTO programaciones VALUES (NULL, "0","0","2","0","0","0","0","0","0","0","0","0",786);
INSERT INTO programaciones VALUES (NULL, "0","0","10","0","0","10","0","0","10","0","0","0",787);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","25",788);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","1","0","0","0",789);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","25",790);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","3",791);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","1","0","0","0",792);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","1","0","0","0","0","0",793);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","0","0","0","0","0","0","0",794);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",795);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","0","0","0","0","0",796);
INSERT INTO programaciones VALUES (NULL, "1","0","0","0","0","0","0","0","0","0","0","0",797);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",798);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","1","0","0","0",799);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",800);
INSERT INTO programaciones VALUES (NULL, "0","1","0","0","0","0","0","0","0","0","0","0",801);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","1",802);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","0","0","156",803);
INSERT INTO programaciones VALUES (NULL, "0","0","23","0","0","0","0","0","0","0","0","0",804);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","0",805);
INSERT INTO programaciones VALUES (NULL, "0","0","1","0","0","1","0","0","1","0","0","1",806);
INSERT INTO programaciones VALUES (NULL, "0","1","1","0","0","0","0","0","0","0","0","0",807);
INSERT INTO programaciones VALUES (NULL, "2","8","8","6","8","8","8","8","8","8","8","4",808);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","1","0","0","0","0",809);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","0","0","1","0","0","0","0",810);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","0","0","0","1","0","0",811);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","0",812);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",813);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",814);
INSERT INTO programaciones VALUES (NULL, "0","0","0","1","0","1","0","1","0","1","0","1",815);
INSERT INTO programaciones VALUES (NULL, "0","1","0","1","0","1","0","1","0","1","0","0",816);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","3","0","0","1","0","0","3",817);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",818);
INSERT INTO programaciones VALUES (NULL, "0","5","7","5","5","7","0","0","2","5","5","2",819);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","1","1","1","1","1","1","0","0",820);
INSERT INTO programaciones VALUES (NULL, "3","5","3","3","4","3","3","3","4","3","3","3",821);
INSERT INTO programaciones VALUES (NULL, "3","4","2","1","2","2","1","2","2","2","3","1",822);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",823);
INSERT INTO programaciones VALUES (NULL, "1","2","1","1","2","1","1","1","1","1","1","1",824);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",825);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","0","1",826);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",827);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",828);
INSERT INTO programaciones VALUES (NULL, "8","8","5","5","5","5","5","5","5","5","5","5",829);
INSERT INTO programaciones VALUES (NULL, "0","5","5","2","2","3","3","3","2","3","3","0",830);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","1","0","0","0","0","1","0",831);
INSERT INTO programaciones VALUES (NULL, "0","0","0","0","0","0","1","0","0","0","0","1",832);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",833);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",834);
INSERT INTO programaciones VALUES (NULL, "3","4","3","3","4","3","3","3","3","3","3","2",835);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",836);
INSERT INTO programaciones VALUES (NULL, "20","25","25","30","30","31","31","30","30","30","30","30",837);
INSERT INTO programaciones VALUES (NULL, "1","1","1","1","1","1","1","1","1","1","1","1",838);


DROP TABLE IF EXISTS avances;
CREATE TABLE avances(
    id_avance INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mes VARCHAR(2),
    avance VARCHAR(25),
    justificacion TEXT,
    path_evidenia VARCHAR(255),
    path_evidenia_evidencia VARCHAR(255),
    id_actividad INT,
    id_usuario_avance INT,
    validado INT,
    id_usuario_validador INT,
    fecha_avance TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_validador TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_avane_actividad FOREIGN KEY (id_actividad) REFERENCES actividades (id_actividad) ON DELETE CASCADE,
    CONSTRAINT FK_user_captura FOREIGN KEY (id_usuario_avance) REFERENCES usuarios (id_usuario) ON DELETE CASCADE,
    CONSTRAINT FK_user_valida FOREIGN KEY (id_usuario_validador) REFERENCES usuarios (id_usuario) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS indicadores;
CREATE TABLE indicadores(
    id_indicador INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    variable_a TEXT,
    variable_b TEXT,
    variable_c TEXT,
    nivel_indicador ENUM('NF', 'NP', 'NC', 'NA'),
    sub_nivel VARCHAR(3),
    resumen VARCHAR(255),
    nombre VARCHAR(255),
    formula TEXT,
    frecuencia VARCHAR(10),
    tipo VARCHAR(50),
    medios_verificacion VARCHAR(255),
    supuestos VARCHAR(255),
    id_programa_presupuestario INT,
    CONSTRAINT FK_indicador_programa FOREIGN KEY (id_programa_presupuestario) REFERENCES programas_presupuestarios(id_programa) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS indicadores_uso;
CREATE TABLE indicadores_uso(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_dep_general INT,
    id_dep_aux INT,
    id_proyecto INT,
    nombre_indicador TEXT,
    variable_a VARCHAR(255),
    variable_b VARCHAR(255),
    variable_c VARCHAR(255),
    interpretacion TEXT,
    tipo VARCHAR(255),
    formula VARCHAR(50),
    periodicidad VARCHAR(20), -- mensual, trimestral, semetral y anual
    t1 VARCHAR(10),
    t2 VARCHAR(10),
    t3 VARCHAR(10),
    t4 VARCHAR(10),
    id_dependencia INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS avances_indicadores;
CREATE TABLE avances_indicadores(
    id_avance INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    trimestre VARCHAR(1),
    avance_a VARCHAR(25),
    avance_b VARCHAR(25),
    avance_c VARCHAR(25),
    porentaje_avance VARCHAR(6),
    justificacion TEXT,
    path_evidenia VARCHAR(255),
    path_evidenia_evidencia VARCHAR(255),
    id_indicador INT,
    id_usuario_reporta INT,
    reportado INT,
    validado INT,
    id_usuario_valida INT,
    fecha_reporta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_valida TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS descripcion_programas; 
CREATE TABLE descripcion_programas(
    id_descripcion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    foda_fortalezas TEXT,
    foda_oportunidades TEXT,
    foda_debilidades TEXT,
    foda_amenazas TEXT,
    estrategia_programa TEXT,
    objetivo_pdm TEXT,
    estrategia_pdm TEXT,
    linea_pdm TEXT,
    objetivos_ods TEXT,
    metas_ods TEXT,
    id_area INT,
    CONSTRAINT FK_descripcion_programa_area FOREIGN KEY (id_area) REFERENCES areas(id_area) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS comments; 
CREATE TABLE comments( 
    id_comment INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    comment TEXT,
    id_actividad INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS reconducciones_atividades; 
CREATE TABLE reconducciones_atividades(
    id_reconduccion_actividades INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    no_oficio VARCHAR(15),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP(),
    dep_general VARCHAR(5),
    dep_aux VARCHAR(20),
    proyecto VARCHAR(12),
    no_actividad VARCHAR(2),
    desc_actividad VARCHAR(255),
    u_medida VARCHAR(255),
    meta_anual VARCHAR(255),
    act_realizadas_sofar VARCHAR(255),
    crea_incrementa VARCHAR(255),
    cancela_reduce VARCHAR(255),
    meta_modificada VARCHAR(255),
    cal1 VARCHAR(255),
    cal2 VARCHAR(255),
    cal3 VARCHAR(255),
    cal4 VARCHAR(255),
    justificacion TEXT,
    txt_creacion TEXT,
    txt_cancelacion TEXT 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS reconducciones_indicadores; 
CREATE TABLE reconducciones_indicadores(
    id_reconduccion_indicadores INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    no_oficio VARCHAR(15),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP(),
    tipo_movimiento ENUM("Cancelación-Reconducción","Creación-Incremento"),
    dep_general VARCHAR(10),
    dep_aux VARCHAR(10),
    programa_p VARCHAR(6),
    objetivo TEXT,
    proyecto VARCHAR(12),
    proyecto_name VARCHAR(255),
    niv_mir VARCHAR(10),
    nombre_indicador TEXT,
    variables_indicador TEXT,
    unidad_medida VARCHAR(255),
    tipos_operacion VARCHAR(255),
    programacion_inicial VARCHAR(255),
    avance VARCHAR(255),
    programacion_modificada VARCHAR(255),
    calendario_trimestral TEXT,
    justificacion_impacto TEXT,
    id_dependencia INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
