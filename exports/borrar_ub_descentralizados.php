<?php
require_once '../models/conection.php';

$dif = array(
    array("0","100","B00","300","02","06","08","04","01","01","1","Realizar reuniones de trabajo con directores","Reunión","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","B00","300","02","06","08","04","01","01","2","Supervisar y evaluar el desempeño de las áreas","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","300","02","06","08","04","01","01","3","Alianzas estratégicas con diversas instancias","Convenio","3.00","0.00","0.00","0.00","0.00","3.00","100.00","0.00","0.00"),
    array("0","100","B00","300","02","06","08","04","01","01","4","Entrega de apoyos a la ciudadanía","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B00","300","02","06","08","04","01","01","5","Gestionar la correspondencia del SMDIF","Oficio","981.00","200.00","20.39","165.00","16.82","371.00","37.82","245.00","24.97"),
    array("0","100","B00","300","02","06","08","04","01","01","6","Organización de eventos en materia de desarrollo social","Evento","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","300","02","06","08","04","01","01","7","Acciones de integración con empleados","Acción","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B00","300","02","06","08","04","01","01","8","Elaborar la agenda de la Presidencia del DIF","Agenda","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B00","302","01","08","03","01","01","03","1","Elaborar el plan de medios","Plan","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","302","01","08","03","01","01","03","2","Realizar sintesis informativas","Resumen","122.00","22.00","18.03","10.00","8.20","20.00","16.39","70.00","57.38"),
    array("0","100","B00","302","01","08","03","01","01","03","3","Publicar y administrar redes sociales","Publicación","1,651.00","350.00","21.20","201.00","12.17","500.00","30.28","600.00","36.34"),
    array("0","100","B00","302","01","08","03","01","01","03","4","Publicar boletines informativos","Publicación","85.00","20.00","23.53","7.00","8.24","8.00","9.41","50.00","58.82"),
    array("0","100","B00","302","01","08","03","01","01","03","5","Crear y difundir videos y publicaciones informativas","Audiovisual","231.00","75.00","32.47","20.00","8.66","78.00","33.77","58.00","25.11"),
    array("0","100","B00","302","01","08","03","01","01","03","6","Cubrir giras de la Presidenta","Bitacora","224.00","67.00","29.91","10.00","4.46","80.00","35.71","67.00","29.91"),
    array("0","100","B00","302","01","08","03","01","01","03","7","Elaborar diseños para la promoción de la imagen institucional","Diseño","1,694.00","648.00","38.25","241.00","14.23","237.00","13.99","568.00","33.53"),
    array("0","100","B00","302","01","08","03","01","01","03","8","Dar difusión a los informes de resultados, campañas y acciones de gobierno","Promoción","727.00","207.00","28.47","20.00","2.75","200.00","27.51","300.00","41.27"),
    array("0","100","B00","304","01","05","02","05","01","07","1","Elaborar el Programa Operativo Anual DIFEM 2024","Plan","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","05","01","07","2","Elaborar el Presupuesto Basado en Resultados Municipal 2024","Presupuesto","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","05","01","07","3","Realizar el Seguimiento al Programa Operativo AnualPOA","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B00","304","01","05","02","05","01","07","4","Realizar el Seguimiento al Presupuesto Basado en Resultados MunicipalPbRM","Acción","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","304","01","05","02","05","01","07","5","Publicación delPAE","Documento","1.00","0.00","0.00","1.00","100.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","05","01","07","6","Integrar la cuenta pública anual","Instrumento","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","05","01","07","7","Realizar Evaluaciones de seguimiento al PbRM","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","304","01","05","02","05","01","07","8","Realizar Evaluaciones de seguimiento al POA","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B00","304","01","05","02","05","01","07","9","Otorgar asesorías en matería de planeación","Asesoría","140.00","45.00","32.14","25.00","17.86","45.00","32.14","25.00","17.86"),
    array("0","100","B00","304","01","05","02","05","01","07","10","Realizar capacitaciones en materia de Planeación","Curso","2.00","1.00","50.00","0.00","0.00","1.00","50.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","05","01","07","11","Publicación del Informe de Resultados del PAE 2023","Documento","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","B00","304","01","05","02","05","01","07","12","Modelo de Terminos de Referencia del PAE 2024","Documento","1.00","0.00","0.00","1.00","100.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","05","01","07","13","Publicacion del Modelo de Convenio para la Mejora del Desempeño y Resultados Gubernamentales PAE 2024","Documento","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","05","01","07","14","Integrar el Anteproyecto y Proyecto de Presupuesto 2025","Accion","2.00","0.00","0.00","0.00","0.00","0.00","0.00","2.00","100.00"),
    array("0","100","B00","304","01","05","02","05","01","07","15","Realizar llenado de formato del informe de ejecuci�n al PDM","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","304","01","05","02","06","04","02","1","Apoyo para el diseño de programas de desarrollo social","Asesoría","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","100","B00","304","01","05","02","06","04","02","2","Realizar capacitaciones en materia de calidad y mejora regulatoria","Curso","3.00","1.00","33.33","1.00","33.33","1.00","33.33","0.00","0.00"),
    array("0","100","B00","304","01","05","02","06","04","02","3","Coordinar trabajos de integración de carpetas de las Cartas Compromiso con el Ciudadano","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","304","01","05","02","06","04","02","4","Elaborar evaluaci�n de resultados de seguimiento a Cartas Compromiso","Acción","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","304","01","05","02","06","04","02","5","Seguimiento al Programa Anual de Mejora Regulatoria","Programa","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","B00","305","01","08","04","01","01","01","1","Realizar capacitaci�n en materia de transparencia y acceso a la informaci�n","Curso","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","305","01","08","04","01","01","01","2","Difundir informaci�n sobre transparencia y acceso a la informaci�n","Publicación","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","305","01","08","04","01","01","01","3","Realizar el seguimiento a la actualizaci�n de las fracciones del sistema IPOMEX","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","305","01","08","04","01","01","01","4","Dar respuesta a solicitudes de transparencia","Solicitud","230.00","20.00","8.70","180.00","78.26","20.00","8.70","10.00","4.35"),
    array("0","100","B00","305","01","08","04","01","01","01","5","Resolver recursos de revisi�n","Acta","20.00","5.00","25.00","5.00","25.00","5.00","25.00","5.00","25.00"),
    array("0","100","B00","305","01","08","04","01","01","01","6","Actualizaci�n de c�dulas de bases de datos","C�dula","8.00","0.00","0.00","8.00","100.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","305","01","08","04","01","01","01","7","Elaborar el informe de respuestas de las áreas administrativas en sus obligaciones de transparencia","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B00","305","01","08","04","01","01","01","8","Realizar sesi�n del comit� de transparencia","Sesi�n","8.00","2.00","25.00","2.00","25.00","2.00","25.00","2.00","25.00"),
    array("0","100","B00","305","01","08","04","01","01","01","9","Vigilar que se garantice la protecci�n de datos personales en la atenci�n de solicitudes","Acta","8.00","2.00","25.00","2.00","25.00","2.00","25.00","2.00","25.00"),
    array("0","100","B00","305","01","08","04","01","01","01","10","Coordinar y orientar a los servidores p�blicos en lo referente a sus funciones en materia de transparencia","Asesoría","80.00","20.00","25.00","20.00","25.00","20.00","25.00","20.00","25.00"),
    array("0","100","B00","308","02","06","08","04","01","01","1","Elaborar Plan de Trabajo Anual","Plan","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","308","02","06","08","04","01","01","2","Elaborar y Actualizar Agenda de Procuraci�n de Fondos","Agenda","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B00","308","02","06","08","04","01","01","3","Realizar gesti�n de recursos en empresas, gobierno e instituciones","Gesti�n","120.00","30.00","25.00","30.00","25.00","30.00","25.00","30.00","25.00"),
    array("0","100","B00","308","02","06","08","04","01","01","4","Realizar actividades y eventos con causa","Actividad","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","B00","308","02","06","08","04","01","01","5","Realizar convenios para construir alianzas estratégicas con diversas organizaciones","Convenio","2.00","0.00","0.00","0.00","0.00","2.00","100.00","0.00","0.00"),
    array("0","100","D00","306","01","05","02","02","04","01","1","Elaborar el reporte de corte de caja","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","02","04","01","2","Realizar informe de conciliaci�n de los depositos realizados","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","02","04","01","3","Realizar arqueos de caja","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","02","04","01","4","Elaborar el diario general de ingresos","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","02","04","01","5","Realizar la conciliaci�n de los ingresos","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","02","04","01","6","Elaborar informe del registro y control de formas valoradas","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","05","02","03","1","Integrar el presupuesto","Presupuesto","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","D00","306","01","05","02","05","02","03","2","Elaborar el informe mensual","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","05","02","03","3","Elaborar analisis financieros para la toma de decisiones","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","306","01","05","02","05","02","03","4","Integrar la Cuenta Pública Municipal","Informe","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","D00","306","01","05","02","05","02","03","5","Integrar anteproyecto y proyecto de Presupuesto","Presupuesto","2.00","0.00","0.00","0.00","0.00","1.00","50.00","1.00","50.00"),
    array("0","100","D00","306","01","05","02","05","02","03","6","Contratar la fianza de fidelidad","Documento","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","D00","306","01","05","02","05","02","03","7","Elaborar el informe trimestral","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","D00","307","01","05","02","06","01","01","1","Entrega de apoyos al personal","Apoyo","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","D00","307","01","05","02","06","01","01","2","Integrar expedientes de personal de nuevo ingreso","Expediente","15.00","4.00","26.67","5.00","33.33","3.00","20.00","3.00","20.00"),
    array("0","100","D00","307","01","05","02","06","01","01","3","Elaborar el informe de incidencias de ausencia y retardo del personal","Informe","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","D00","307","01","05","02","06","01","01","4","Actualizar expedientes de personal","Expediente","12.00","10.00","83.33","2.00","16.67","0.00","0.00","0.00","0.00"),
    array("0","100","D00","307","01","05","02","06","01","01","5","Elaborar la nom�na para el pago del personal","Nomina","28.00","6.00","21.43","8.00","28.57","6.00","21.43","8.00","28.57"),
    array("0","100","D00","307","01","05","02","06","01","01","6","Elaborar informe de movimientos de bajas y altas","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","307","01","05","02","06","01","02","1","Elaborar Plan de Detecci�n de Necesidades de Capacitaci�n","Plan","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","D00","307","01","05","02","06","01","02","2","Aplicaci�n entrevistas, encuestas, tests para evaluar las competencias","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","D00","307","01","05","02","06","01","02","3","Otorgar cursos de capacitaci�n al personal","Curso","8.00","2.00","25.00","2.00","25.00","2.00","25.00","2.00","25.00"),
    array("0","100","D00","307","01","05","02","06","01","02","4","Impartir talleressobre diversos temas de desarrollo de personal","Taller","8.00","2.00","25.00","2.00","25.00","2.00","25.00","2.00","25.00"),
    array("0","100","D00","307","01","05","02","06","01","02","5","Realizar actividades de integración para el personal","Evento","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","D00","307","01","05","02","06","02","01","1","Elaborar programa anual de adquisiciones","Documento","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","D00","307","01","05","02","06","02","01","2","Sesiones del comit� de adquisiciones","Sesi�n","11.00","3.00","27.27","2.00","18.18","6.00","54.55","0.00","0.00"),
    array("0","100","D00","307","01","05","02","06","02","01","3","Procedimientos de adquisiciones","Informe","6.00","1.00","16.67","1.00","16.67","3.00","50.00","1.00","16.67"),
    array("0","100","D00","307","01","05","02","06","02","01","4","Actualizaci�n del catalogo de proveedores","Catalogo","2.00","1.00","50.00","0.00","0.00","0.00","0.00","1.00","50.00"),
    array("0","100","D00","307","01","05","02","06","03","01","1","Apoyar en la realizaci�n del inventario f�sico de bienes muebles","Inventario","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","D00","307","01","05","02","06","03","01","2","Contabilizar los movimientos de altas y bajas del inventario","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","307","01","05","02","06","03","01","3","Formular informes sobre control patrimonial de los bienes as� como del tr�mite de altas y bajas de bienes contables","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","307","01","05","02","06","03","01","4","Gestionar los documentos fiscales respecto de los bienes muebles","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E00","310","02","03","01","01","01","01","1","Otorgar consultas m�dicas en consultorio fijo a la poblaci�n de escasos recursos del municipioPOA","Consulta","19,340.00","3,598.00","18.60","4,309.00","22.28","7,327.00","37.89","4,106.00","21.23"),
    array("0","100","E00","310","02","03","01","01","01","01","2","Realizar revisi�n de signos y s�ntomas COVID 19 al personal de las diferentes dependencias del municipio","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E00","310","02","03","01","01","01","01","3","Aplicar dosis de biol�gico del programa de vacunaci�n universal a personas en riesgoPOA","Dosis","1,577.00","815.00","51.68","333.00","21.12","182.00","11.54","247.00","15.66"),
    array("0","100","E00","310","02","03","01","01","01","01","4","Expedir certificados m�dicosPOA","Certificado","5,789.00","1,348.00","23.29","569.00","9.83","3,180.00","54.93","692.00","11.95"),
    array("0","100","E00","310","02","03","01","01","01","01","5","Realizar detecciones oportunas de c�ncer mamarioexploracionesPOA","Examen","252.00","73.00","28.97","39.00","15.48","45.00","17.86","95.00","37.70"),
    array("0","100","E00","310","02","03","01","01","01","01","6","Realizar ex�menes para detecci�n de c�ncer cervicouterinocitolog�asPOA","Examen","81.00","18.00","22.22","43.00","53.09","0.00","0.00","20.00","24.69"),
    array("0","100","E00","310","02","03","01","01","01","01","7","Traslados de pacientes","Traslado","121.00","32.00","26.45","31.00","25.62","30.00","24.79","28.00","23.14"),
    array("0","100","E00","310","02","03","01","01","01","01","8","Otorgar pl�ticas de salud sexual y reproductiva","Pl�tica","66.00","15.00","22.73","21.00","31.82","15.00","22.73","15.00","22.73"),
    array("0","100","E00","310","02","03","01","01","01","01","9","Organización de la Jornada Municipal de Salud","Jornada","93.00","21.00","22.58","35.00","37.63","22.00","23.66","15.00","16.13"),
    array("0","100","E00","310","02","03","01","01","02","01","1","Capacitar a madres de familia en la atenci�n de enfermedades diarreicas agudasPOA","Pl�tica","296.00","81.00","27.36","67.00","22.64","85.00","28.72","63.00","21.28"),
    array("0","100","E00","310","02","03","01","01","02","01","2","Capacitar a madres de familia en la atenci�n de infecciones respiratorias agudasPOA","Pl�tica","327.00","85.00","25.99","62.00","18.96","117.00","35.78","63.00","19.27"),
    array("0","100","E00","310","02","03","01","01","02","01","3","Impartir asesoría de vacunaci�n a padres de familiaPOA","Asesoría","188.00","39.00","20.74","50.00","26.60","38.00","20.21","61.00","32.45"),
    array("0","100","E00","310","02","03","01","01","02","01","4","Impartir asesorías de odontolog�a preventiva, tanto a p�blico cautivoescuelas y padres de familia , como a poblaci�n abiertaPOA","Asesoría","2,523.00","666.00","26.40","786.00","31.15","539.00","21.36","532.00","21.09"),
    array("0","100","E00","310","02","03","01","01","02","01","5","Aplicaci�n de fluor a ni�as, ni�os y adolescentes en escuelas primarias del municipio de acuerdo al programa educativo preventivo.","Dosis","5,913.00","544.00","9.20","249.00","4.21","1,775.00","30.02","3,345.00","56.57"),
    array("0","100","E00","310","02","03","01","01","02","01","6","Otorgar consultas odontol�gicas a la poblaci�n de escasos recursos del municipioPOA","Consulta","5,982.00","1,167.00","19.51","1,550.00","25.91","1,840.00","30.76","1,425.00","23.82"),
    array("0","100","E00","310","02","03","01","01","02","01","7","Otorgar tratamientos en consultorio fijo a poblaci�n abierta al municipioPOA","Tratamiento","11,702.00","2,384.00","20.37","2,965.00","25.34","3,582.00","30.61","2,771.00","23.68"),
    array("0","100","E00","310","02","03","01","01","02","01","8","Otorgar consultas odontol�gicas a la poblaci�n de escasos recursos del municipio en unidad m�vil otorgada en comodato por DIFEM o propia","Consulta","1,082.00","551.00","50.92","160.00","14.79","167.00","15.43","204.00","18.85"),
    array("0","100","E00","310","02","03","01","01","02","01","9","Proporcionar orientaciones individuales a los pacientes odontol�gicos","Asesoría","4,110.00","219.00","5.33","848.00","20.63","1,368.00","33.28","1,675.00","40.75"),
    array("0","100","E00","310","02","03","01","01","02","01","10","Otorgar tratamientos en unidad m�vilotorgada en comodato por DIFEM o propiaa la poblaci�n de escasos recursos del municipio","Tratamiento","1,964.00","354.00","18.02","254.00","12.93","331.00","16.85","1,025.00","52.19"),
    array("0","100","E00","310","02","03","01","01","02","02","1","Prevenir las adiccionestabaquismo, alcoholismo y farmacodependenciaen escuelas y entre la poblaci�n en general, a trav�s de pl�ticas, con enfoque","Pl�tica","114.00","22.00","19.30","32.00","28.07","32.00","28.07","28.00","24.56"),
    array("0","100","E00","310","02","03","01","01","02","02","2","Atenci�n psicol�gica a personas con alguna adicci�n o trastornos derivados de las adiccionesPOA .","Asesoría","93.00","25.00","26.88","21.00","22.58","24.00","25.81","23.00","24.73"),
    array("0","100","E00","310","02","03","01","01","02","02","3","Impartir talleres preventivos de las adicciones a escuelas y poblaci�n abierta","Taller","8.00","0.00","0.00","2.00","25.00","1.00","12.50","5.00","62.50"),
    array("0","100","E00","310","02","03","01","01","02","02","4","Atender a personas con alguna adicci�n o trastorno","Consulta","491.00","134.00","27.29","127.00","25.87","130.00","26.48","100.00","20.37"),
    array("0","100","E00","310","02","03","01","01","02","02","5","Realizar eventos especiales en torno a la prevenci�n de las adiccionesPOA","Jornada","18.00","5.00","27.78","3.00","16.67","5.00","27.78","5.00","27.78"),
    array("0","100","E00","310","02","03","01","01","02","02","6","Elaborar y distribuir material impreso para la difusión de la prevenci�n de adicciones","Triptico","1,900.00","600.00","31.58","500.00","26.32","500.00","26.32","300.00","15.79"),
    array("0","100","E00","310","02","03","01","01","02","02","7","Realizar talleres psicoeducativos de CONADICPOA","Taller","11.00","2.00","18.18","3.00","27.27","3.00","27.27","3.00","27.27"),
    array("0","100","E00","310","02","03","01","01","02","02","8","Realizar jornadas de salud mental del ProgramaSMA","Jornada","12.00","6.00","50.00","0.00","0.00","4.00","33.33","2.00","16.67"),
    array("0","100","E00","310","02","03","01","01","02","02","9","Otorgar consultas psicol�gicas a trav�s del ProgramaSMA","Consultas","89.00","20.00","22.47","20.00","22.47","20.00","22.47","29.00","32.58"),
    array("0","100","E00","310","02","06","08","01","01","05","1","Participar en foros de los derechos de las ni�as, ni�os y adolescentes, a trav�s de difusores infantiles municipalesPOA","Foro","16.00","4.00","25.00","5.00","31.25","3.00","18.75","4.00","25.00"),
    array("0","100","E00","310","02","06","08","01","01","05","2","Integrar grupos para impartir el taller de participaci�n infantil para la promoción de los derechos de la ni�ezPOA","Grupo","24.00","12.00","50.00","6.00","25.00","6.00","25.00","0.00","0.00"),
    array("0","100","E00","310","02","06","08","01","01","05","3","Otorgar pl�ticas sobre la convenci�n de los derechos de la ni�ez a madres, padres y/o tutores, maestros y p�blico en generalPOA","Pl�tica","27.00","5.00","18.52","9.00","33.33","3.00","11.11","10.00","37.04"),
    array("0","100","E00","310","02","06","08","01","01","05","4","Llevar a cabo eventos dirigidos al cumplimiento de los derechos de la ni�ez dirigidos a la poblaci�n en generalPOA","Evento","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","E00","310","02","06","08","01","01","05","5","Elaborar material para promoción sobre los derechos de las ni�as y los ni�osPOA","Publicación","9.00","1.00","11.11","3.00","33.33","3.00","33.33","2.00","22.22"),
    array("0","100","E00","310","02","06","08","01","01","05","6","Realizar evento de la elecci�n de difusores infantilesPOA","Evento","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","E00","310","02","06","08","04","01","06","1","Atender a pacientes subsecuentes y clasificarlos por tipo de trastorno","Consulta","1,887.00","477.00","25.28","508.00","26.92","483.00","25.60","419.00","22.20"),
    array("0","100","E00","310","02","06","08","04","01","06","2","Atender a pacientes de primera vez y clasificarlos por tipo de trastornoCorresponde a la meta 01 de POA","Consulta","681.00","153.00","22.47","177.00","25.99","156.00","22.91","195.00","28.63"),
    array("0","100","E00","310","02","06","08","04","01","06","3","Impartir temas en materia de salud mental, presencial o v�a remota, dirigido al p�blico en general, para la prevenci�n de trastornos emocionales y pro","Capacitaci�n","19.00","8.00","42.11","4.00","21.05","2.00","10.53","5.00","26.32"),
    array("0","100","E00","310","02","06","08","04","01","06","4","Realizar jornadas de salud mental destinadas a la prevenci�n de trastornos emocionales y conductualesCorresponde a la meta 03 del POA","Jornada","7.00","2.00","28.57","1.00","14.29","3.00","42.86","1.00","14.29"),
    array("0","100","E00","310","02","06","08","04","01","06","5","Impartir pl�ticas con temas de prevenci�n de conductas de riesgo en la poblaci�n adolescente y joven, dirigida a madres, padres, tutores y personal do","Pl�tica","34.00","8.00","23.53","6.00","17.65","9.00","26.47","11.00","32.35"),
    array("0","100","E00","310","02","06","08","04","01","06","6","Impartir cursos de escuela de orientaci�n para madres, padres y desarrollo de habilidades para la formaci�n de la pareja y la familia a poblaci�n abie","Sesi�n","55.00","12.00","21.82","17.00","30.91","10.00","18.18","16.00","29.09"),
    array("0","100","E00","310","02","06","08","04","01","06","7","Canalizar a adolescentes que as� lo requieran a servicios m�dicos, nutricionales, psicol�gicos y jur�dicos","Adolescente","16.00","3.00","18.75","5.00","31.25","3.00","18.75","5.00","31.25"),
    array("0","100","E00","310","02","06","08","04","01","06","8","Promover el servicio de orientaci�n psicol�gicaSOSentre la poblaci�n en generalPOA .","Persona","22,896.00","5,395.00","23.56","6,543.00","28.58","5,961.00","26.04","4,997.00","21.82"),
    array("0","100","E00","310","02","06","08","05","01","02","1","Impartir talleres de capacitaci�n para el trabajoAutoempleo y autoconsumoPOA","Taller","50.00","10.00","20.00","20.00","40.00","10.00","20.00","10.00","20.00"),
    array("0","100","E00","310","02","06","08","05","01","02","2","Impartir jornadas de dignificaci�n de la mujerPOA","Jornada","3.00","1.00","33.33","0.00","0.00","0.00","0.00","2.00","66.67"),
    array("0","100","E00","310","02","06","08","05","01","02","3","Impartir taller de g�nero masculinoPOA","Taller","3.00","0.00","0.00","2.00","66.67","0.00","0.00","1.00","33.33"),
    array("0","100","E00","310","02","06","08","05","01","02","4","Impartir pl�ticas de prevenci�n de trastornos emocionalesPOA","Pl�tica","68.00","18.00","26.47","16.00","23.53","17.00","25.00","17.00","25.00"),
    array("0","100","E00","310","02","06","08","05","01","02","5","Impartir talleres preventivos de depresi�nPOA","Taller","10.00","3.00","30.00","3.00","30.00","2.00","20.00","2.00","20.00"),
    array("0","100","E00","310","02","06","08","06","01","04","1","Realizar jornadas de prevenci�n del embarazo en adolescentesPOA","Jornada","3.00","1.00","33.33","1.00","33.33","1.00","33.33","0.00","0.00"),
    array("0","100","E00","310","02","06","08","06","01","04","2","Implementar la estrategia de beb�s virtualesPOA","Adolescente","300.00","100.00","33.33","100.00","33.33","100.00","33.33","0.00","0.00"),
    array("0","100","E00","310","02","06","08","06","01","04","3","Implementaci�n de tallerprevenci�n del embarazo adolescente POA","Taller","3.00","1.00","33.33","1.00","33.33","1.00","33.33","0.00","0.00"),
    array("0","100","E00","310","02","06","08","06","01","04","4","Actividades culturales enfocadas en la prevenci�n del embarazoferias de salud, desfiles, foros, torneos deportivosPOA","Actividad","3.00","1.00","33.33","0.00","0.00","1.00","33.33","1.00","33.33"),
    array("0","100","E00","310","02","06","08","06","01","04","5","Difusión masiva de informaci�n preventiva sobre el embarazo en la adolescenciav�a electr�nica, m�dulos informativos, internet y/o redes sociales, te","Publicación","30.00","5.00","16.67","10.00","33.33","5.00","16.67","10.00","33.33"),
    array("0","100","E00","310","02","06","08","06","01","05","1","Impartir el curso taller para la atenci�n de adolescentes embarazadas y madres adolescentesPOA","Sesi�n","20.00","5.00","25.00","6.00","30.00","4.00","20.00","5.00","25.00"),
    array("0","100","E00","310","02","06","08","06","01","05","2","Canalizar a adolescentes embarazadas y madres adolescentes, de 12 a 18 a�os a la atenci�n integralmedicina general, psicolog�a, nutricional, jur�dic","Mujer A","50.00","15.00","30.00","15.00","30.00","15.00","30.00","5.00","10.00"),
    array("0","100","E00","310","02","06","08","06","01","05","3","Sensibilizar a la pareja, familiares y acompa�antes de las adolescentes embarazadas y madres adolescentes, sobre esta problem�tica.POA","Persona","40.00","12.00","30.00","12.00","30.00","12.00","30.00","4.00","10.00"),
    array("0","100","E00","310","02","06","08","06","01","05","4","Gestionar talleres laborales que capaciten para el autoconsumo y el autoempleo a madres adolescentes y adolescentes embarazadasPOA","Taller","5.00","1.00","20.00","2.00","40.00","1.00","20.00","1.00","20.00"),
    array("0","100","E00","310","02","06","08","06","01","05","5","Gestionar la implementaci�n de pl�ticas para el cuidado prenatal y postnatal para madres adolescentes y adolescentes embarazadasPOA","Taller","3.00","0.00","0.00","1.00","33.33","1.00","33.33","1.00","33.33"),
    array("0","100","E00","310","02","06","08","06","01","05","6","Sensibilizar a madres adolescentes de 12 a 18 a�os reincidentes de embarazoPOA","Mujer A","3.00","0.00","0.00","1.00","33.33","1.00","33.33","1.00","33.33"),
    array("0","100","F00","301","02","06","08","03","01","02","1","Brindar asesorías jur�dicas a los adultos mayoresPOA","Asesoría","162.00","3.00","1.85","9.00","5.56","95.00","58.64","55.00","33.95"),
    array("0","100","F00","301","02","06","08","03","01","02","2","Entrega de apoyos funcionales a los adultos mayores","Aparato","120.00","30.00","25.00","30.00","25.00","39.00","32.50","21.00","17.50"),
    array("0","100","F00","301","02","06","08","03","01","02","3","Otorgar atenci�n psicologica y gerontologica a los adultos mayores","Consulta","124.00","25.00","20.16","33.00","26.61","33.00","26.61","33.00","26.61"),
    array("0","100","F00","301","02","06","08","03","01","02","4","Realizar visitas de trabajo social a los adultos mayores en situaci�n de probable vulneraci�n de derechos","Visita","37.00","14.00","37.84","9.00","24.32","8.00","21.62","6.00","16.22"),
    array("0","100","F00","301","02","06","08","03","02","01","1","Operar grupos o casas de d�a para personas adultas mayores en diversas comunidades del municipio","Grupo","60.00","0.00","0.00","0.00","0.00","0.00","0.00","60.00","100.00"),
    array("0","100","F00","301","02","06","08","03","02","01","2","Desarrollar actividades educativas, sociales, deportivas y manuales, dirigidas a las personas adultas mayoresen grupos o casas de d�a","Actividad","600.00","150.00","25.00","150.00","25.00","150.00","25.00","150.00","25.00"),
    array("0","100","F00","301","02","06","08","03","02","01","3","Impartir pl�ticas sobre derechos de las personas adultas mayores, cuidados de la salud f�sica y mental en las personas adultas mayores.","Pl�tica","84.00","21.00","25.00","21.00","25.00","21.00","25.00","21.00","25.00"),
    array("0","100","F00","301","02","06","08","03","02","01","4","Realizar eventos dirigidos a las personas adultas mayores","Evento","12.00","6.00","50.00","0.00","0.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","301","02","06","08","03","02","01","5","Realizar paseos recreativos","Paseo","23.00","4.00","17.39","6.00","26.09","7.00","30.43","6.00","26.09"),
    array("0","100","F00","301","02","06","08","03","02","01","6","Realizar visitas a los grupos de los adultos mayores","Visita","249.00","60.00","24.10","63.00","25.30","63.00","25.30","63.00","25.30"),
    array("0","100","F00","301","02","06","08","03","02","01","7","Atenci�n por parte del grupo multidisciplinario al adulto mayor en probable estado de vulnerabilidad","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","301","02","06","08","03","02","01","8","Gesti�n de apoyos a los adultos mayores","Gesti�n","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","301","02","06","08","03","02","01","9","Acciones enfocadas al mejoramiento de las casas de d�a del adulto mayor","Acción","16.00","3.00","18.75","3.00","18.75","6.00","37.50","4.00","25.00"),
    array("0","100","F00","309","02","06","08","05","01","03","1","Otorgamiento del servicio educativo asistenciaen estancias infantiles a hijos de de los SMDIFPOA","Atencion educativa","1,425.00","365.00","25.61","390.00","27.37","310.00","21.75","360.00","25.26"),
    array("0","100","F00","309","02","06","08","05","01","03","2","Atenci�n educativa a ni�as y ni�os en educaci�n preescolar","Atencion educativa","2,676.00","669.00","25.00","669.00","25.00","669.00","25.00","669.00","25.00"),
    array("0","100","F00","309","02","06","08","05","01","03","3","Taller de escuela para padres en estancias infantiles","Taller","33.00","9.00","27.27","9.00","27.27","6.00","18.18","9.00","27.27"),
    array("0","100","F00","309","02","06","08","05","01","03","4","Capacitaci�n y entrenamiento al personal de las estancias","Acción","36.00","9.00","25.00","9.00","25.00","12.00","33.33","6.00","16.67"),
    array("0","100","F00","309","02","06","08","05","01","03","5","Realizaci�n de eventos c�vicos en estancias y jard�n de ni�os","Evento","75.00","27.00","36.00","18.00","24.00","12.00","16.00","18.00","24.00"),
    array("0","100","F00","311","02","05","06","03","01","01","1","Distribuir desayunos escolares fr�os a las escuelas beneficiadas","Desayuno","854,916.00","223,800.00","26.18","246,180.00","28.80","156,660.00","18.32","228,276.00","26.70"),
    array("0","100","F00","311","02","05","06","03","01","01","2","Capacitar a padres de familia y maestros beneficiados con los desayunos, sobre las reglas de operaci�n","Acta","35.00","35.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","F00","311","02","05","06","03","01","01","3","Realizar el levantamiento de peso y talla para la conformaci�n del padr�n de beneficiarios","Ni�o","400.00","200.00","50.00","0.00","0.00","200.00","50.00","0.00","0.00"),
    array("0","100","F00","311","02","05","06","03","01","01","4","Supervisar los planteles escolares beneficiados con desayunos fr�os a trav�s de visitas peri�dicas","Supervisi�n","596.00","146.00","24.50","150.00","25.17","150.00","25.17","150.00","25.17"),
    array("0","100","F00","311","02","05","06","03","01","02","1","Fortalecer la supervisi�n en los desayunadores escolares","Supervisi�n","155.00","38.00","24.52","39.00","25.16","39.00","25.16","39.00","25.16"),
    array("0","100","F00","311","02","05","06","03","01","02","2","Fomentar la orientaci�n alimentaria a poblaci�n abierta mediante pl�ticas y/o talleres","Pl�tica","105.00","25.00","23.81","30.00","28.57","25.00","23.81","25.00","23.81"),
    array("0","100","F00","311","02","05","06","03","01","02","3","Impartir talleres o pl�ticas para apoyar procesos formativo educativos de la comunidad","Pl�tica","105.00","25.00","23.81","30.00","28.57","25.00","23.81","25.00","23.81"),
    array("0","100","F00","311","02","06","05","01","01","02","1","Realizar supervisi�n a los espacios de alimentaci�n","Supervisi�n","88.00","16.00","18.18","24.00","27.27","24.00","27.27","24.00","27.27"),
    array("0","100","F00","311","02","06","05","01","01","02","2","Proporcionar el servicio de alimentaci�n a los adultos mayores","Persona","3,254.00","754.00","23.17","900.00","27.66","800.00","24.59","800.00","24.59"),
    array("0","100","F00","311","02","06","05","01","01","02","3","Proporcionar el servicio de alimentaci�n a la poblaci�n en general","Persona","1,850.00","150.00","8.11","600.00","32.43","550.00","29.73","550.00","29.73"),
    array("0","100","F00","311","02","06","05","01","01","03","1","Reportar beneficiarios que recibieron orientaciones nutricionales","Persona","730.00","180.00","24.66","0.00","0.00","300.00","41.10","250.00","34.25"),
    array("0","100","F00","311","02","06","05","01","01","03","2","Pl�tica de lonchera saludable","Pl�tica","20.00","6.00","30.00","0.00","0.00","8.00","40.00","6.00","30.00"),
    array("0","100","F00","311","02","06","05","01","01","03","3","Otorgar consulta de nutrici�n","Consulta","588.00","138.00","23.47","150.00","25.51","150.00","25.51","150.00","25.51"),
    array("0","100","F00","311","02","06","05","01","01","05","1","Entregar paquete de huerto familiar","Paquete","274.00","0.00","0.00","0.00","0.00","165.00","60.22","109.00","39.78"),
    array("0","100","F00","311","02","06","05","01","01","05","2","Impartir talleres de germinado para la poblaci�n","Taller","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","311","02","06","05","01","01","05","3","Supervisar la operatividad de huertos familiares","Supervisi�n","48.00","12.00","25.00","12.00","25.00","12.00","25.00","12.00","25.00"),
    array("0","100","F00","311","02","06","05","01","01","05","4","Supervisar la operatividad de huertos escolares","Supervisi�n","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","F00","311","02","06","05","01","01","05","5","Realizar la cosecha de huertos","Huerto","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","311","02","06","05","01","01","05","6","Otorgar taller de siembra","Taller","48.00","12.00","25.00","12.00","25.00","12.00","25.00","12.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","02","1","Pl�ticas para la prevenci�n de la violencia y derechos humanos","Pl�tica","30.00","10.00","33.33","0.00","0.00","10.00","33.33","10.00","33.33"),
    array("0","100","F00","312","02","06","08","04","01","02","2","Asesoría jur�dica para los casos de posibles maltratos de violencia de adultos mayores","Asesoría","72.00","18.00","25.00","18.00","25.00","18.00","25.00","18.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","02","3","Presentaci�n de informe a los reportes de violencia","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","02","4","Atenci�n a personas en situaci�n de callle","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","03","1","Celebraci�n de convenios de colaboraci�n y contratos de comodato y prestaci�n de servicios","Documento","6.00","2.00","33.33","2.00","33.33","2.00","33.33","0.00","0.00"),
    array("0","100","F00","312","02","06","08","04","01","03","2","Revisi�n actualizaci�n y adecuaci�n de la normativa interna del DIF","Informe","2.00","1.00","50.00","1.00","50.00","0.00","0.00","0.00","0.00"),
    array("0","100","F00","312","02","06","08","04","01","03","3","Conciliaciones en materia laboral con los servidores p�blicos","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","03","4","Informe de juicios concluidos en materia laboral","Informe","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","F00","312","02","06","08","04","01","03","5","Otorgar asesoría jur�dica a la poblaci�n en materia familiar para garantizar la preservaci�n de sus derechos","Asesoría","1,620.00","390.00","24.07","450.00","27.78","390.00","24.07","390.00","24.07"),
    array("0","100","F00","312","02","06","08","04","01","03","6","Patrocinio de juicios","Juicio","144.00","36.00","25.00","36.00","25.00","36.00","25.00","36.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","03","7","Elaboraci�n de convenios en material familiar","Convenio","96.00","24.00","25.00","24.00","25.00","24.00","25.00","24.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","03","8","Reportar la conclusi�n de los juicios patrocinados a la poblaci�n de escasos recursos en juicios de derecho familiar","Juicio","144.00","36.00","25.00","36.00","25.00","36.00","25.00","36.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","03","9","Celebraci�n de audiencias en materia familiar","Audiencia","180.00","45.00","25.00","45.00","25.00","45.00","25.00","45.00","25.00"),
    array("0","100","F00","312","02","06","08","04","01","03","10","Conciliaci�n en materia familiar","Conciliaci�n","96.00","24.00","25.00","24.00","25.00","26.00","27.08","22.00","22.92"),
    array("0","100","F00","313","02","06","08","01","01","03","1","Dar seguimiento a ni�as, ni�os y adolescentes en situaci�n de calle o trabajo infantil, detectados en zonas receptoras","Menor","240.00","30.00","12.50","101.00","42.08","25.00","10.42","84.00","35.00"),
    array("0","100","F00","313","02","06","08","01","01","03","2","Realizar visitas de trabajo social a zonas receptoras de NNA para detectar situaci�n de calle, trabajo infantil, migrantes repatriados y/o no acompa�a","Visita","534.00","134.00","25.09","125.00","23.41","150.00","28.09","125.00","23.41"),
    array("0","100","F00","313","02","06","08","01","01","03","3","Gestionar becas educativas para ni�as, ni�os y adolescentes","Gesti�n","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","100","F00","313","02","06","08","01","01","03","4","Realizar diagn�stico municipal sobre NNA en situaci�n de calle y/o trabajo infantil","Diagn�stico","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","F00","313","02","06","08","01","01","03","5","Desarrollar actividades academicas, ludico recreativas, culturales, deportivas, artisticas, entre otras.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","313","02","06","08","01","01","03","6","Colaboraci�n internstitucional y organizacional pública y privada","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","313","02","06","08","01","01","04","1","Realizar pl�ticas, talleres y/o campañas para la prevenci�n de NNA en situaci�n de calle, trabajo infantil, migrantes repatriados y/o no acompa�ados y","Pl�tica","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","313","02","06","08","04","01","02","1","Difundir el modelo de atenci�n en materia de protecci�n de derechos de las ni�as, ni�os y adolescentes a trav�s de pl�ticas en escuelas, padres de fam","Pl�tica","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","F00","313","02","06","08","04","01","02","2","Atender a ni�as, ni�os y adolescentes en donde se hayan detectado y comprobado actos u omisiones que vulneren sus derechos en la procuradur�a de prote","Reporte","140.00","28.00","20.00","42.00","30.00","36.00","25.71","34.00","24.29"),
    array("0","100","F00","313","02","06","08","04","01","02","3","Detectar si existe una probable vulneraci�n o restricci�n derechos de las ni�as, ni�os y adolescente, a trav�s de un reporte de manera telef�nica o de","Reporte","240.00","60.00","25.00","60.00","25.00","60.00","25.00","60.00","25.00"),
    array("0","100","F00","313","02","06","08","04","01","02","4","Representaci�n jur�dica en instancia ministerial federal o localPOA","Representaci�n","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","313","02","06","08","04","01","02","5","Asesorías jur�dicas","Asesoría","130.00","30.00","23.08","40.00","30.77","30.00","23.08","30.00","23.08"),
    array("0","100","F00","313","02","06","08","04","01","02","6","Otorgar consulta psicol�gica a ninos, ni�as, adolescentes, padres, tutores y familiares","Consulta","960.00","230.00","23.96","250.00","26.04","250.00","26.04","230.00","23.96"),
    array("0","100","F00","313","02","06","08","04","01","02","7","Visitas domiciliarias de primera vez y seguimiento","Documento","420.00","105.00","25.00","105.00","25.00","105.00","25.00","105.00","25.00"),
    array("0","100","F00","313","02","06","08","04","01","02","8","Elaboraci�n de convenios","Convenio","26.00","8.00","30.77","6.00","23.08","6.00","23.08","6.00","23.08"),
    array("0","100","F00","313","02","06","08","04","01","02","9","Reporte sobre el ingreso de ni�as, ni�os y adolescentes al Centro de Asistencia Social","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","313","02","06","08","04","01","02","10","Reporte de registro de ni�as, ni�os y adolescentes","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","F00","313","02","06","08","04","01","02","11","Mediaci�n de casos con persectiva de infanciaPOA","Mediaci�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","F00","314","02","06","08","02","01","02","1","Impartir pl�ticas de prevenci�n de la discapacidad en escuelas, a padres de familia y a la poblaci�n en general","Pl�tica","82.00","14.00","17.07","15.00","18.29","30.00","36.59","23.00","28.05"),
    array("0","100","F00","314","02","06","08","02","01","02","2","Impartir talleres de prevenci�n de la discapacidad en escuelas, a padres de familia y a la poblaci�n en general","Taller","8.00","2.00","25.00","1.00","12.50","4.00","50.00","1.00","12.50"),
    array("0","100","F00","314","02","06","08","02","01","02","3","Orientar e informar sobre la prevenci�n de la discapacidad, a trav�s de asesorías individuales.","Asesoría","1,284.00","209.00","16.28","240.00","18.69","439.00","34.19","396.00","30.84"),
    array("0","100","F00","314","02","06","08","02","01","02","4","Detectar factores de riesgo que causen discapacidad en la poblaci�n en general","Persona","498.00","46.00","9.24","75.00","15.06","200.00","40.16","177.00","35.54"),
    array("0","100","F00","314","02","06","08","02","01","02","5","Elaborar material de difusión de los programas de PREVIDIF entre la poblaci�ntr�pticos, carteles, peri�dicos murales y rotafolios","Públicaci�n","25.00","6.00","24.00","6.00","24.00","6.00","24.00","7.00","28.00"),
    array("0","100","F00","314","02","06","08","02","02","01","1","Impartir platicas de sensibilizaci�n en inclusi�n social de personas con discapacidad a diversos sectores de la poblaci�nPOA","Pl�tica","17.00","2.00","11.76","3.00","17.65","4.00","23.53","8.00","47.06"),
    array("0","100","F00","314","02","06","08","02","02","01","2","Incluir a personas con discapacidad a educaci�n especialPOA","Persona","4.00","2.00","50.00","0.00","0.00","2.00","50.00","0.00","0.00"),
    array("0","100","F00","314","02","06","08","02","02","01","3","Incluira personas con discapacidad a educaci�n regularPOA","Persona","3.00","0.00","0.00","0.00","0.00","2.00","66.67","1.00","33.33"),
    array("0","100","F00","314","02","06","08","02","02","01","4","Incluirlaboralmente a personas con discapacidadPOA","Persona","12.00","7.00","58.33","2.00","16.67","1.00","8.33","2.00","16.67"),
    array("0","100","F00","314","02","06","08","02","02","01","5","Incluira personas con discapacidad a la capacitaci�n y adiestramiento productivo POA .","Persona","31.00","4.00","12.90","9.00","29.03","13.00","41.94","5.00","16.13"),
    array("0","100","F00","314","02","06","08","02","02","01","6","Incluira personas con discapacidad a las actividades recreativas o culturalesPOA .","Persona","10.00","2.00","20.00","1.00","10.00","4.00","40.00","3.00","30.00"),
    array("0","100","F00","314","02","06","08","02","02","01","7","Incluira personas con discapacidad o familiares a grupos de autoayudaPOA","Persona","11.00","2.00","18.18","2.00","18.18","3.00","27.27","4.00","36.36"),
    array("0","100","F00","314","02","06","08","02","03","01","1","Otorgar consultas m�dicas de rehabilitaci�n a personas con discapacidad en CRIS, URIS o UBRISPOA","Consulta","1,140.00","310.00","27.19","270.00","23.68","312.00","27.37","248.00","21.75"),
    array("0","100","F00","314","02","06","08","02","03","01","2","Otorgar consultas de psicolog�a a personas con discapacidad en CRIS, URIS o UBRISPOA","Consulta","1,624.00","354.00","21.80","565.00","34.79","359.00","22.11","346.00","21.31"),
    array("0","100","F00","314","02","06","08","02","03","01","3","Otorgar consultas de trabajo social a personas con discapacidad en CRIS, URIS o UBRISPOA","Consulta","961.00","227.00","23.62","254.00","26.43","262.00","27.26","218.00","22.68"),
    array("0","100","F00","314","02","06","08","02","03","01","4","Otorgar pl�ticas sobre rehabilitaci�n a personas con discapacidad y a sus familiaresPOA","Pl�tica","7.00","2.00","28.57","1.00","14.29","3.00","42.86","1.00","14.29"),
    array("0","100","F00","314","02","06","08","02","03","01","5","Detecci�n de personas con discapacidad permanentePOA","Detecci�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","F00","314","02","06","08","02","03","01","6","Otorgar alta a personas con discapacidadPOA","Alta","60.00","12.00","20.00","23.00","38.33","11.00","18.33","14.00","23.33"),
    array("0","100","F00","314","02","06","08","02","03","01","7","Referir a personas con discapacidad a otras instituciones para su atenci�nPOA .","Persona","23.00","4.00","17.39","8.00","34.78","8.00","34.78","3.00","13.04"),
    array("0","100","F00","314","02","06","08","02","03","02","1","Aplicar terapias f�sicas, a personas con discapacidaden CRIS, URIS o UBRISPOA","Terap�a","18,067.00","3,862.00","21.38","4,891.00","27.07","4,849.00","26.84","4,465.00","24.71"),
    array("0","100","F00","314","02","06","08","02","03","02","2","Aplicar terapias ocupacionales a personas con discapacidad en CRIS, URIS o UBRISPOA","Terap�a","7,420.00","1,580.00","21.29","1,698.00","22.88","1,648.00","22.21","2,494.00","33.61"),
    array("0","100","F00","314","02","06","08","02","03","02","3","Aplicar terapias en programa de estimulaci�n temprana a ni�os con discapacidad en CRIS, URIS o UBRISPOA","Terap�a","636.00","119.00","18.71","233.00","36.64","134.00","21.07","150.00","23.58"),
    array("0","100","F00","314","02","06","08","02","03","02","4","Aplicar terapias de lenguaje a personas con discapacidad en CRIS, URIS o UBRISPOA","Terap�a","2,431.00","567.00","23.32","711.00","29.25","603.00","24.80","550.00","22.62"),
    array("0","100","F00","314","02","06","08","02","03","02","5","Solicitar el equipamiento de CRIS, URIS o UBRISPOA","Gesti�n","1.00","0.00","0.00","1.00","100.00","0.00","0.00","0.00","0.00"),
    array("0","100","F00","314","02","06","08","02","03","02","6","Otorgar donativos a personas con discapacidadPOA","Donativo","37.00","5.00","13.51","10.00","27.03","22.00","59.46","0.00","0.00"),
    array("0","100","F00","314","02","06","08","02","03","02","7","Integrar expedientes para la donaci�n de ayudas funcionales a trav�s del DIFEM. POA","Expediente","14.00","10.00","71.43","0.00","0.00","4.00","28.57","0.00","0.00"),
    array("0","100","F00","314","02","06","08","02","03","02","8","Rehabiltaci�n y mantenimiento del URIS","Acción","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","G00","303","01","03","04","01","01","01","1","Elaborar Programa Anual de Auditor�a.","Programa","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","G00","303","01","03","04","01","01","01","2","Auditor�as.","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","3","Inspecciones.","Inspecci�n","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","100","G00","303","01","03","04","01","01","01","4","Supervisiones.","Supervisi�n","1.00","0.00","0.00","1.00","100.00","0.00","0.00","0.00","0.00"),
    array("0","100","G00","303","01","03","04","01","01","01","5","Realizar el seguimiento a las observaciones y recomendaciones del OSFEM.","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","6","Supervisar la permanencia de los servidores p�blicos en su lugar de trabajo.","Supervisi�n","96.00","24.00","25.00","24.00","25.00","24.00","25.00","24.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","7","Testificaci�n de eventos de distinta naturaleza.","Reporte","3.00","1.00","33.33","0.00","0.00","2.00","66.67","0.00","0.00"),
    array("0","100","G00","303","01","03","04","01","01","01","8","Participaci�n en levantamiento f�sico de inventarios.","Inventario","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","G00","303","01","03","04","01","01","01","9","Testificar la constituci�n de Comit�s Ciudadanos de Control y VigilanciaCOCICOVIS .","Acta","63.00","63.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","G00","303","01","03","04","01","01","01","10","Participar en los procesos de entrega-recepci�n.","Acta","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","11","Supervisar el cumplimiento de obligaciones peri�dicas a cargo del Sistema Municipal DIF Metepec.","Supervisi�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","12","Arqueos de caja.","Arqueo","96.00","24.00","25.00","24.00","25.00","24.00","25.00","24.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","13","Capacitar a los servidores p�blicos.","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","14","Monitoreo en el Sistema BackOffice Declaranet para la presentaci�n de las Declaraciones Patrimoniales en sus modalidades de: Inicial, Conclusi�n y Anu","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","G00","303","01","03","04","01","01","01","15","Participaci�n en Inventarios de Almac�n.","Inventario","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","G00","303","01","03","04","02","02","01","1","Iniciar los Procedimientos de Responsabilidad Admnistrativa","Acuerdo","100.00","20.00","20.00","30.00","30.00","25.00","25.00","25.00","25.00"),
    array("0","100","G00","303","01","03","04","02","02","01","2","Emplazar al Presunto Responsable en los Procedimientos de Responsabilidad Admnistrativa.","Oficio","100.00","20.00","20.00","30.00","30.00","25.00","25.00","25.00","25.00"),
    array("0","100","G00","303","01","03","04","02","02","01","3","Citar a la autoridada investigadora y en su caso a los denunciantes a la Audiencia Inicial dentro del Procedimiento de Responsabilidad Adminitrativa.","Citatorio","103.00","20.00","19.42","31.00","30.10","26.00","25.24","26.00","25.24"),
    array("0","100","G00","303","01","03","04","02","02","01","4","Celebrar la Audiencia Inicial dentro de los Procedimientos de Responsabilidad Admnistrativa.","Acta","100.00","20.00","20.00","30.00","30.00","25.00","25.00","25.00","25.00"),
    array("0","100","G00","303","01","03","04","02","02","01","5","Emitir acuerdo de admisi�n de pruebasdentro delProcedimiento de Responsabilidad Admnistrativa.","Acuerdo","100.00","20.00","20.00","30.00","30.00","25.00","25.00","25.00","25.00"),
    array("0","100","G00","303","01","03","04","02","02","01","6","Emitir acuerdo que declara abierto el periodo de alegatosdelProcedimiento de Responsabilidad Admnistrativa.","Acuerdo","100.00","20.00","20.00","30.00","30.00","25.00","25.00","25.00","25.00"),
    array("0","100","G00","303","01","03","04","02","02","01","7","Turnar a la autoridad resolutora del �rgano Interno de Control del SMDIF de Metepec, los autos originales de los expedientes para que emita la resoluc","Oficio","97.00","20.00","20.62","30.00","30.93","23.00","23.71","24.00","24.74"),
    array("0","100","G00","303","01","03","04","02","02","01","8","Enviar al Tribunal de Justicia Administrativa del Estado de M�xico, los autos originales de los expedientes para que contin�e con los procedimientos d","Oficio","3.00","0.00","0.00","0.00","0.00","2.00","66.67","1.00","33.33"),
    array("0","100","G00","303","01","03","04","02","02","04","1","Investigar hechos relacionados con presuntas faltas administrativas.","Expediente","125.00","26.00","20.80","33.00","26.40","33.00","26.40","33.00","26.40"),
    array("0","100","G00","303","01","03","04","02","02","04","2","Elaborar informes de presunta responsabilidad administrativa.","Informe","100.00","25.00","25.00","25.00","25.00","25.00","25.00","25.00","25.00"),
    array("0","100","G00","303","01","03","04","02","02","04","3","Elaborar actas administrativas y/o circunstanciadas.","Acta","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","G00","303","01","03","04","02","02","04","4","Supervisar los buzones de denuncias","Supervisi�n","40.00","8.00","20.00","12.00","30.00","12.00","30.00","8.00","20.00"),
    array("0","100","G00","303","01","03","04","02","02","04","5","Monitorear el Sistema de Atenci�n MexiquenseSAM .","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
);


$opdapas = array(
    array("0","100","A00","A00","01","05","02","06","04","02","1","Convocar a sesiones de Consejo Directivo, as� como ejecutar los acuerdos y disposiciones.","Acta","6.00","1.00","16.67","2.00","33.33","1.00","16.67","2.00","33.33"),
    array("0","100","A00","A00","01","05","02","06","04","02","2","Dirigir y supervisar la integraci�n del trabajo en equipo en el ejercicio de las funciones de las �reas del Organismo","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","A00","A00","01","05","02","06","04","02","3","Verificar la capacitaci�n y el desempe�o del personal y establecer una comunicaci�n estrecha con las �reas para su adecuado funcionamiento.","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","A00","A00","01","05","02","06","04","02","4","Supervisar y coordinar la elaboraci�n del programa anual operativo de todas las dependencias del Organismo","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","A04","231","01","05","02","06","04","01","1","Seguimiento al Programa de Mejora Regulatoria","Acta","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","A04","231","01","05","02","06","04","01","2","Actualizaci�n de c�dulas de tramites y servicios del Organismo","Reporte","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","A04","231","01","05","02","06","04","01","3","Programa Anual de Mejora Regulatoria 2024","Documento","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","A04","231","01","08","04","01","01","01","1","Seguimiento a la Plataforma IPOMEX","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","A04","231","01","08","04","01","01","01","2","Tr�mite, seguimiento y respuesta a las solicitudes de informacion de la plataforma SAIMEX","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","A04","231","01","08","04","01","01","01","3","Convocar a sesiones de Transparencia","Convocatorias","11.00","2.00","18.18","3.00","27.27","3.00","27.27","3.00","27.27"),
    array("0","100","A04","A04","01","05","02","05","01","07","1","Recabar la informaci�n mensual de las Dependencias del Organismo para seguimiento y evaluaci�n.","Documento","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","A04","A04","01","05","02","05","01","07","2","Recabar y procesar la informaci�n para el llenadode los formatosPbRM","Documento","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","A04","A04","01","05","02","05","01","07","3","Coordinar el desempe�o de Gesti�n de Calidad","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","A04","A04","01","05","02","05","01","07","4","Realizar asesorias en Materia de Sistema de Evaluacion y Desempe�o","Registro de asistenc","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","A05","201","01","08","05","01","01","03","1","Efectuar mantenimientos preventivos a los equipos de c�mputo con los que cuenta el Organismo.","Programa de mantenim","360.00","90.00","25.00","90.00","25.00","90.00","25.00","90.00","25.00"),
    array("0","100","A05","201","01","08","05","01","01","03","2","Asesor�a y soporte t�cnico a personal administrativo en funci�n de satisfacer necesidades tecnol�gicas","Lista de registro","600.00","190.00","31.67","140.00","23.33","135.00","22.50","135.00","22.50"),
    array("0","100","A05","201","01","08","05","01","01","03","3","Actualizaci�n y mantenimiento de la pagina web del Organismo","Reporte de mantenimi","6.00","1.00","16.67","2.00","33.33","1.00","16.67","2.00","33.33"),
    array("0","100","A05","201","01","08","05","01","01","03","4","Administrar y mantener actualizada la lista de red de interconexionesIP�sde los equipos internos del OPDAPAS","Informe","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","A05","201","01","08","05","01","01","03","5","Impartir capacitaciones sobre TICS a Servidores P�blicos","Lista de asistencia","8.00","2.00","25.00","2.00","25.00","2.00","25.00","2.00","25.00"),
    array("0","100","A05","201","01","08","05","01","01","03","6","Realizar mantenimientos a circuito cerrado CCTV","Bit�cora","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B00","B00","01","05","02","02","04","01","1","Supervisar la integraci�n del Presupuesto de Egresos definitivo 2024","Informe","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","B00","01","05","02","02","04","01","2","Supervisar la integraci�n de los Informes Trimestrales.","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B00","B00","01","05","02","02","04","01","3","Supervisar la integraci�n de la Cuenta Publica para su env�o al OSFEM","Informe","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B00","B00","01","05","02","02","04","01","4","Supervisar la integraci�n del Anteproyecto del presupuesto de Egresos 2025","Informe","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","B01","203","01","05","02","03","01","04","1","Avance fisico-financiero al Programa Anual de Obra","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B01","203","01","05","02","03","01","04","2","Avance fisico-financiero al Programa Anual de Reparaci�n y Mantenimiento","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B01","203","01","05","02","03","01","04","3","Revisi�n de expedientes de pago de adquisici�n de bienes, servicios y arrendamientos","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","203","01","05","02","03","01","04","4","Avance fisico-financiero a Programas Federales","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B01","205","01","05","02","02","04","01","1","Registro y Control de Caja y Tesorer�a","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","205","01","05","02","02","04","01","2","Apertura y designaci�n de cajas externas","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","205","01","05","02","02","04","01","3","Ingresos por tipos de toma con medidor y sin medidor","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","205","01","05","02","02","04","01","4","Control de ingresos de cajas internas e IUSA","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","206","01","05","02","05","01","09","1","Integrar el Proyecto de Presupuesto de Ingreso y Egresos Definitivo para el Ejercicio Fiscal 2024","Reporte","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B01","206","01","05","02","05","01","09","2","Seguimiento del ejercicio del presupuesto de Egresos correspondiente al Ejercicio Fiscal 2024","Reporte de avance","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","206","01","05","02","05","01","09","3","Integrar los Traspasos Internos y Externos correspondientes al Ejercicio Fiscal 2024","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B01","206","01","05","02","05","01","09","4","Integrar el Anteproyecto de Presupuesto de Egresos para el Ejercicio Fiscal 2025","Anteproyecto","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","B01","207","01","05","02","05","02","03","1","Integrar el Informe Trimestral","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B01","207","01","05","02","05","02","03","2","Integrar la Cuenta P�blica Anual","Reporte","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B01","211","01","05","02","02","01","01","1","Supervisar la apertura y designaci�n de cajas","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","211","01","05","02","02","01","01","2","Vigilar las estrategias de captaci�n de ingresos","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B01","211","01","05","02","02","01","01","3","Coordinar y supervisar la integraci�n y entrega de la cuenta publica","Informe","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B01","211","01","05","02","02","01","01","4","Coordinar y supervisar la integraci�n y entrega de los informes trimestrales","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B01","211","01","05","02","02","01","01","5","Coordinar y supervisar la integraci�n y entrega del Proyecto de Presupuesto de Ingresos y Egresos Definitivo para el ejercicio fiscal 2024","Informe","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B01","211","01","05","02","02","01","01","6","Coordinar y supervisar la integraci�n y entrega del Anteproyecto de Presupuestos de Ingresos y Egresos para el ejercicio fiscal 2025","Informe","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","B02","209","01","05","02","06","01","01","1","Gestionar la capacitaci�n de acuerdo a las necesidades del personal adscrito a Organismo","Convocatoria/Registr","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","B02","209","01","05","02","06","01","01","2","Coordinar y verificar el comit� de Seguridad e Higiene","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B02","209","01","05","02","06","01","01","3","Control y aplicaci�n de descuentos","Informe","23.00","6.00","26.09","6.00","26.09","6.00","26.09","5.00","21.74"),
    array("0","100","B02","209","01","05","02","06","01","01","4","Realizar el pago de las remuneraciones quincenales y de las prestaciones laborales al personal del Organismo","Registros de n�mina","26.00","7.00","26.92","6.00","23.08","6.00","23.08","7.00","26.92"),
    array("0","100","B02","209","01","05","02","06","01","01","5","Seguimiento de pagos correspondientes del convenio de prestaciones SUTEyM","Reporte","10.00","1.00","10.00","3.00","30.00","1.00","10.00","5.00","50.00"),
    array("0","100","B02","210","01","05","02","06","02","01","1","Atenci�n de los servicios b�sicos","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","210","01","05","02","06","02","01","2","Reparaci�n y mantenimiento de inmuebles","Solicitud","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B02","210","01","05","02","06","02","01","3","Reparaci�n y mantenimiento de muebles","Solicitud","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B02","210","01","05","02","06","02","01","4","Servicio y mantenimiento a maquinaria.","Solicitud","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B02","210","01","05","02","06","02","01","5","Servicio y mantenimiento a veh�culos del Organismo","Bit�cora","6.00","1.00","16.67","2.00","33.33","1.00","16.67","2.00","33.33"),
    array("0","100","B02","210","01","05","02","06","02","01","6","Aseguramiento del parque vehicular","Reporte","2.00","1.00","50.00","0.00","0.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","210","01","05","02","06","02","01","7","Contrataci�n de servicios generales externos","Solicitud","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","210","01","05","02","06","02","01","8","Suministro y distribuci�n de gasolina","Bit�cora","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","212","01","05","02","06","03","01","1","Integraci�n y elaboraci�n del Programa Anual de Desarrollo Archivistico del OPDAPAS 2024.","Programa Anual","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B02","212","01","05","02","06","03","01","2","Sesiones del Grupo Interdisciplinario.","Actas","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","212","01","05","02","06","03","01","3","Sesiones del Sistema Institucional de Archivo.","Actas","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B02","212","01","05","02","06","03","01","4","Capacitaci�n a los enlaces de archivo en referencia a la integraci�n de los expedientes.","Lista de asistencia","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","212","01","05","02","06","03","01","5","Elaboraci�n de fichas t�cnicas de valoraci�n documental.","Documento","3.00","2.00","66.67","1.00","33.33","0.00","0.00","0.00","0.00"),
    array("0","100","B02","212","01","05","02","06","03","01","6","Elaboraci�n del cat�logo de disposici�n documental.","Documento","2.00","2.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B02","212","01","05","02","06","03","01","7","Capacitaci�n a los enlaces de archivo en referencia a la guia simple de archivo.","Lista de asistencia","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","B02","212","01","05","02","06","03","01","8","Seguimiento a los procesos de archivo y su implementaci�n de cada Unidad Administrativa.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","213","01","05","02","06","02","01","1","Actualizaci�n del cat�logo de proveedores","Cat�logo","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","213","01","05","02","06","02","01","2","Recepci�n de solicitudes de compra","Informe de solicitud","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","213","01","05","02","06","02","01","3","Emisi�n de contratos pedidos","Informe de pedidos","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","213","01","05","02","06","02","01","4","Entrada de materiales al almac�n","Informe de entradas","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","213","01","05","02","06","02","01","5","Actualizaci�n del procedimiento de adquisiciones","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B02","214","01","05","02","06","03","01","1","Registro de adquisiciones en el CREG.","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B02","214","01","05","02","06","03","01","2","Informe de bienes muebles, inmuebles y de bajo costo.","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","214","01","05","02","06","03","01","3","Levantamiento fisico del inventario","Informe","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","214","01","05","02","06","03","01","4","Conciliaci�n fisico contable de bienes muebles, inmuebles y de bajo costo.","Conciliaci�n","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","214","01","05","02","06","03","01","5","Informe de depresiaci�n.","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","214","01","05","02","06","03","01","6","Creaci�n y actualizaci�n de expedientes.","Bitacora","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","214","01","05","02","06","03","01","7","Actualizaci�n de plataforma CREG.","Registro","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","214","01","05","02","06","03","01","8","Integraci�n de la cuenta p�blica.","Informe","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","B02","214","01","05","02","06","03","01","9","Seguimiento a procesos de baja para bienes muebles, inmuebles y de bajo costo.","Informe","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","1","Supervisar el sistema integral del personal instaurado, as� como el pago de las remuneraciones quincenales y de las prestaciones laborales al personal","Reporte","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","2","Supervisar movimientos de altas y bajas.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","3","Supervisar y coordinar todas las compras internas y externas de Organismo","Listados","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","4","Supervisar todos los servicios solicitados internos o externos del Organismo","Listados","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","5","Coordinar el Comit� de Adquisiciones y Servicios","Acta de sesiones","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","6","Supervisar los movimientos de Control Patrimonial","Reporte de movimient","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","7","Supervisar coordinar y ejecutar el levantamiento f�sico del almac�n general","Acta del levantamien","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","8","Coordinar Inventario de Bienes Muebles e Inmuebles","Reporte semestral","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","B02","B02","01","05","02","06","03","01","9","Coordinar el Comit� de Arrendamiento, Adquisiciones de inmuebles y enajenaciones","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B03","202","01","05","02","02","01","01","1","Incorporaci�n de tomas de padr�n y regularizaci�n de tomas clandestinas","Reporte de altas","774.00","130.00","16.80","164.00","21.19","238.00","30.75","242.00","31.27"),
    array("0","100","B03","202","01","05","02","02","01","01","2","Elaboraci�n del an�lisis gr�fico de la evaluaci�n de los servicios","Reporte de encuestas","774.00","130.00","16.80","164.00","21.19","238.00","30.75","242.00","31.27"),
    array("0","100","B03","202","01","05","02","02","01","01","3","Realizar visitas de campo para comprobar la distancia de redes para proporcionar el servicio de agua a nuevos usuarios y actualizar el padr�n mediante","Reporte de verificac","5,531.00","1,665.00","30.10","1,186.00","21.44","1,625.00","29.38","1,055.00","19.07"),
    array("0","100","B03","202","01","05","02","02","01","01","4","Expedici�n de constancias no adeudo","Constancias","1,724.00","419.00","24.30","509.00","29.52","436.00","25.29","360.00","20.88"),
    array("0","100","B03","202","01","05","02","02","01","01","5","Implementaci�n de est�mulo f�scal a grupos vulnerables","Est�mulos","2.00","1.00","50.00","0.00","0.00","0.00","0.00","1.00","50.00"),
    array("0","100","B03","202","01","05","02","02","01","01","6","Registro y actualizaci�n de usuarios en el padr�n","Padr�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B03","202","01","05","02","02","01","01","7","Coordinaci�n en la integraci�n de pol�ticas fiscales","Documento","2.00","1.00","50.00","0.00","0.00","0.00","0.00","1.00","50.00"),
    array("0","100","B03","208","01","05","02","02","01","01","1","Entrega de cartas de invitaci�n","Cartas invitaci�n","24,926.00","5,126.00","20.56","3,600.00","14.44","7,200.00","28.89","9,000.00","36.11"),
    array("0","100","B03","208","01","05","02","02","01","01","2","Entrega de notificaciones de adeudo","Notificaciones","1,200.00","120.00","10.00","120.00","10.00","480.00","40.00","480.00","40.00"),
    array("0","100","B03","208","01","05","02","02","01","01","3","Elaborac�n de convenio de pago en parcialidades","Convenio","20.00","4.00","20.00","6.00","30.00","6.00","30.00","4.00","20.00"),
    array("0","100","B03","208","01","05","02","02","01","01","4","Ejecuci�n de restricciones","Restricciones","70.00","10.00","14.29","24.00","34.29","24.00","34.29","12.00","17.14"),
    array("0","100","B03","208","01","05","02","02","01","01","5","Supervici�n de actividades en campo","Supervici�n","36.00","9.00","25.00","9.00","25.00","9.00","25.00","9.00","25.00"),
    array("0","100","B03","208","01","05","02","02","01","01","6","Orden de reconexi�n de tomas","Ordenes","60.00","10.00","16.67","19.00","31.67","19.00","31.67","12.00","20.00"),
    array("0","100","B03","208","01","05","02","02","01","01","7","Levantamiento de ordenes de trabajo y/o c�dulas de informaci�n de campo para geolocalizaci�n","Ordenes","300.00","85.00","28.33","85.00","28.33","80.00","26.67","50.00","16.67"),
    array("0","100","B03","208","01","05","02","02","01","01","8","Levantamiento de infracciones y en su caso, entrega de resoluciones administrativas","Infracciones","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","B03","208","01","05","02","02","01","01","9","Informes de recaudaci�n de ingresos por concepto de pago","Informes","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","216","01","05","02","02","01","01","1","Emitir campa�as para la difusi�n masiva de los apoyos, subsidios fiscales y exhortaci�n al pago puntual","Campa�a","4.00","3.00","75.00","0.00","0.00","0.00","0.00","1.00","25.00"),
    array("0","100","B03","216","01","05","02","02","01","01","2","Supervici�n de actividades de seguimiento a actualizaci�n del padr�n de usuarios, servicio medido y estatus de rezago","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","216","01","05","02","02","01","01","3","Integrar las Pol�ticas F�scales para la recaudaci�n","Documento","2.00","1.00","50.00","0.00","0.00","0.00","0.00","1.00","50.00"),
    array("0","100","B03","223","02","02","03","01","02","03","1","Entrega de avisos de pago de agua","Informe","81,216.00","13,536.00","16.67","27,072.00","33.33","13,536.00","16.67","27,072.00","33.33"),
    array("0","100","B03","223","02","02","03","01","02","03","2","Toma de lecturas a medidores de agua","Reporte","108,528.00","36,176.00","33.33","18,088.00","16.67","36,176.00","33.33","18,088.00","16.67"),
    array("0","100","B03","223","02","02","03","01","02","03","3","Instalar f�sicamente los aparatos medidores de agua","Reporte de solicitud","456.00","114.00","25.00","114.00","25.00","114.00","25.00","114.00","25.00"),
    array("0","100","B03","223","02","02","03","01","02","03","4","Seguimiento a solicitudes de mantenimiento de medidores de agua","Reporte de solicitud","5,379.00","1,350.00","25.10","1,329.00","24.71","1,350.00","25.10","1,350.00","25.10"),
    array("0","100","B03","223","02","02","03","01","02","03","5","Recopilaci�n de encuestas de satisfacci�n","Reporte de encuesta","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","234","02","02","03","01","02","04","1","Publicar informaci�n del OPDAPAS en redes sociales","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","234","02","02","03","01","02","04","2","Dise�os con informaci�n sobre el cuidado del agua.","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","234","02","02","03","01","02","04","3","Realizar reforestaci�n en escuelas y comunidades del municipio","Campa�a","4.00","0.00","0.00","1.00","25.00","3.00","75.00","0.00","0.00"),
    array("0","100","B03","234","02","02","03","01","02","04","4","Distribuir folletos y/o tr�pticos de cultura del agua y captaci�n de agua pluvial","Informe de distribuc","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","B03","234","02","02","03","01","02","04","5","Participar y/o realizar concursos, eventos, foros, congresos y cursos relacionados con la cultura del agua y captaci�n de agua pluvialincluyendo dia","Evento/Constancia","8.00","2.00","25.00","2.00","25.00","2.00","25.00","2.00","25.00"),
    array("0","100","B03","234","02","02","03","01","02","04","6","Realizar platicas escolares y comunitarias sobre el cuidado del agua y captaci�n de agua pluvial","Pl�tica","64.00","21.00","32.81","21.00","32.81","6.00","9.38","16.00","25.00"),
    array("0","100","B03","234","02","02","03","01","02","04","7","Realizar pl�ticas para lavado y desinfecci�n de tinacos y cisternas en escuelas y comunidades.","Pl�tica","72.00","21.00","29.17","21.00","29.17","14.00","19.44","16.00","22.22"),
    array("0","100","B03","234","02","02","03","01","02","04","8","Realizar la semana de actividades de Verano por el Agua","Bit�cora","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","100","B03","234","02","02","03","01","02","04","9","Planeaci�n de Semana de Actividades de Verano por el Agua.","Informe","2.00","0.00","0.00","1.00","50.00","1.00","50.00","0.00","0.00"),
    array("0","100","B03","234","02","02","03","01","02","04","10","Informe de actividades relacionadas con el cuidado del Agua del ECA Metepec, a CONAGUA y CAEM","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","B03","01","05","02","02","01","01","1","Supervici�n y dirigir la ejecuci�n de las acciones tendientes a fortalecer la recaudaci�n por los derechos de suministro de agua potable y drenaje","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","B03","01","05","02","02","01","01","2","Supervisar y coordinar las acciones relacionadas con la Subdirecci�n de Comercializaci�n y la Subdirecci�n de Cultura del Agua","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","B03","B03","01","05","02","02","01","01","3","Supevisar e integrar las pol�ticas f�scales","Informe","2.00","1.00","50.00","0.00","0.00","0.00","0.00","1.00","50.00"),
    array("0","100","C00","218","02","02","01","01","05","02","1","Supervisar, ejecutar y dar seguimiento a f�sico-financiero a las obras por administraci�n, con apego a la Ley.","Supervisi�n","2.00","0.00","0.00","0.00","0.00","0.00","0.00","2.00","100.00"),
    array("0","100","C00","218","02","02","01","01","05","02","2","Gestionar, supervisar y dar seguimiento a las obras por convenio de factibilidad, con apego a la Ley.","Solicitud de usuario","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","C00","218","02","02","01","01","05","02","3","Gestionar, supervisar, ejecutar y dar seguimiento a las obras por convenio de participaci�n con apego a la Ley.","Solicitud de usuario","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","C00","C00","02","02","03","01","02","05","1","Convocar a sesiones de comit� de Obra que garanticen la aplicaci�n del presupuesto de acuerdo a la legislaci�n vigente","Acta de sesi�n","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C00","C00","02","02","03","01","02","05","2","Supervisar el avance Fisico-Financiero del Programa Anual de Obra.","Informe de avance","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","C00","C00","02","02","03","01","02","05","3","Integraci�n del Programa Anual de ObraReparaci�n y Mantenimiento","Programa Anual","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C00","C01","02","01","03","01","01","01","1","Coordinar, verificar y dar seguimiento a las actividades relacionadas con ejecuci�n de la obra p�blica","Informe de obra","4.00","0.00","0.00","0.00","0.00","0.00","0.00","4.00","100.00"),
    array("0","100","C00","C01","02","01","03","01","01","01","2","Supervisar la ejecuci�n de la obra y de los servicios relacionados con las mismas por contrato, con apego a la Ley.","Informe de obra","4.00","0.00","0.00","0.00","0.00","0.00","0.00","4.00","100.00"),
    array("0","100","C00","C01","02","01","03","01","01","01","3","Supervisa las obras por administraci�n, convenio de participaci�n y convenio de factibilidad","Informe de obra","2.00","0.00","0.00","0.00","0.00","0.00","0.00","2.00","100.00"),
    array("0","100","C00","C01","02","02","01","01","05","02","1","Coordinar, verificar y dar seguimiento a las actividades relacionadas con ejecuci�n de la obra p�blica","Informe de obra","9.00","0.00","0.00","0.00","0.00","0.00","0.00","9.00","100.00"),
    array("0","100","C00","C01","02","02","01","01","05","02","2","Supervisar la ejecuci�n de la obra y de los servicios relacionados con las mismas por contrato, con apego a la Ley.","Informe de obra","9.00","0.00","0.00","0.00","0.00","0.00","0.00","9.00","100.00"),
    array("0","100","C00","C01","02","02","01","01","05","02","3","Supervisa las obras por administraci�n, convenio de participaci�n y convenio de factibilidad","Informe de obra","2.00","0.00","0.00","0.00","0.00","0.00","0.00","2.00","100.00"),
    array("0","100","C00","C01","02","02","03","01","02","01","1","Coordinar, verificar y dar seguimiento a las actividades relacionadas con ejecuci�n de la obra p�blica","Informe de obra","5.00","0.00","0.00","0.00","0.00","0.00","0.00","5.00","100.00"),
    array("0","100","C00","C01","02","02","03","01","02","01","2","Supervisar la ejecuci�n de la obra y de los servicios relacionados con las mismas por contrato, con apego a la Ley.","Informe de obra","5.00","0.00","0.00","0.00","0.00","0.00","0.00","5.00","100.00"),
    array("0","100","C00","C01","02","02","03","01","02","01","3","Supervisa las obras por administraci�n, convenio de participaci�n y convenio de factibilidad","Informe de obra","2.00","0.00","0.00","0.00","0.00","0.00","0.00","2.00","100.00"),
    array("0","100","C01","218","02","02","01","01","05","03","1","Supervisar la ejecuci�n de las obras y los servicios relacionados con las mismas por contrato, con apego a la Ley.","Supervisi�n","9.00","1.00","11.11","2.00","22.22","3.00","33.33","3.00","33.33"),
    array("0","100","C01","218","02","02","01","01","05","03","2","Llevar un control f�sico- financiero trimestral de las obras por contrato","Informe","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","C01","218","02","02","01","01","05","03","3","Cumplir con la bit�cora de obra actualizada durante el proceso de cada obra","Bit�cora","9.00","1.00","11.11","2.00","22.22","3.00","33.33","3.00","33.33"),
    array("0","100","C01","220","02","02","01","01","05","02","1","Ejecutar las licitaciones conforme al programa e integrar sus expedientes con la documentaci�n del procedimiento de adjudicaci�n, con apego a la Ley.","Acta de fallo","9.00","1.00","11.11","2.00","22.22","3.00","33.33","3.00","33.33"),
    array("0","100","C01","220","02","02","01","01","05","02","2","Llevar un control del procedimiento de adjudicaci�n de licitaciones","Licitaci�n","9.00","1.00","11.11","2.00","22.22","3.00","33.33","3.00","33.33"),
    array("0","100","C01","220","02","02","01","01","05","02","3","Elaborar presupuestos base para las obras por administraci�n, convenio y/o servicios relacionados con la obra p�blica","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C01","220","02","02","01","01","05","02","4","Revisar y conciliar los precios unitarios de contratos de Obra Publica","Reporte","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","C01","220","02","02","01","01","05","02","5","Elaborar el cat�logo general de Precios Unitarios","Cat�logo","2.00","1.00","50.00","0.00","0.00","0.00","0.00","1.00","50.00"),
    array("0","100","C03","219","02","02","03","01","02","03","1","Reparaci�n de fugas de agua potable","Fugas reparadas","2,600.00","620.00","23.85","660.00","25.38","690.00","26.54","630.00","24.23"),
    array("0","100","C03","219","02","02","03","01","02","03","2","Viajes de agua en pipa","Solicitud","2,400.00","600.00","25.00","600.00","25.00","600.00","25.00","600.00","25.00"),
    array("0","100","C03","219","02","02","03","01","02","03","3","Mantenimiento y/o cambio de caja de v�lvulas","Mantenimiento","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C03","219","02","02","03","01","02","03","4","Liberaci�n de tomas de agua potable obstruidas","Solicitud","120.00","30.00","25.00","30.00","25.00","30.00","25.00","30.00","25.00"),
    array("0","100","C03","219","02","02","03","01","02","03","5","Reparaci�n de banquetas por fuga","Reporte ciudadano","100.00","25.00","25.00","25.00","25.00","25.00","25.00","25.00","25.00"),
    array("0","100","C03","219","02","02","03","01","02","03","6","Reposici�n de mezcla asf�ltica","Reporte ciudadano","100.00","25.00","25.00","25.00","25.00","25.00","25.00","25.00","25.00"),
    array("0","100","C03","222","02","01","03","01","01","02","1","Limpieza de rejillas pluviales y bocas de tormenta","Reporte de solicitud","1,062.00","403.00","37.95","236.00","22.22","188.00","17.70","235.00","22.13"),
    array("0","100","C03","222","02","01","03","01","01","02","2","Desazolve de redes de drenajem�","Metros lineales","101,538.00","21,007.00","20.69","21,400.00","21.08","29,261.00","28.82","29,870.00","29.42"),
    array("0","100","C03","222","02","01","03","01","01","02","3","Colocaci�n de brocales de polietileno y tapas de registro","Reporte de solicitud","97.00","18.00","18.56","26.00","26.80","24.00","24.74","29.00","29.90"),
    array("0","100","C03","222","02","01","03","01","01","02","4","Limpieza de pozos de visita","Reporte de solicitud","1,682.00","571.00","33.95","354.00","21.05","416.00","24.73","341.00","20.27"),
    array("0","100","C03","222","02","01","03","01","01","02","5","Programa de limpieza de caudales y canales a cielo abiertom�","Metros lineales","15,000.00","3,000.00","20.00","5,000.00","33.33","3,900.00","26.00","3,100.00","20.67"),
    array("0","100","C03","222","02","01","03","01","01","02","6","Retiro de material producto de desazolve a canales a cielo abierto","Reporte de solicitud","84.00","23.00","27.38","18.00","21.43","26.00","30.95","17.00","20.24"),
    array("0","100","C03","222","02","01","03","01","01","02","7","Limpieza de descargas domiciliarias tapadas","Reporte de solicitud","122.00","50.00","40.98","25.00","20.49","23.00","18.85","24.00","19.67"),
    array("0","100","C03","222","02","01","03","01","01","02","8","Reposici�n de rejillas y bocas de tormenta","Reporte de solicitud","80.00","18.00","22.50","21.00","26.25","21.00","26.25","20.00","25.00"),
    array("0","100","C03","222","02","01","03","01","01","02","9","Instalaci�n de tomas de agua y descargas domiciliarias","Reporte de servicio","84.00","35.00","41.67","16.00","19.05","16.00","19.05","17.00","20.24"),
    array("0","100","C03","222","02","01","03","01","01","02","10","Limpieza de fosas s�pticas","Reporte de servicio","92.00","27.00","29.35","24.00","26.09","19.00","20.65","22.00","23.91"),
    array("0","100","C03","222","02","01","03","01","01","02","11","Implementaci�n del grupo tlanchana, para �pocas de lluvia","Informe","10.00","1.00","10.00","3.00","30.00","3.00","30.00","3.00","30.00"),
    array("0","100","C03","222","02","01","03","01","01","02","12","Implementaci�n del programa nocturno de desazolve","Reporte","5.00","2.00","40.00","3.00","60.00","0.00","0.00","0.00","0.00"),
    array("0","100","C03","227","02","02","03","01","02","05","1","Ejecutar el programa de mantenimiento mayor a las fuentes de abastecimiento.","IMROM","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","C03","227","02","02","03","01","02","05","2","Ejecutar el programa de mantenimiento menor a las fuentes de abastecimiento.","Reporte de Mantenimi","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C03","227","02","02","03","01","02","05","3","Realizar la macro medici�n de los vol�menes extra�dos de las fuentes de abastecimiento.","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C03","227","02","02","03","01","02","05","4","Realizar los an�lisis microbiol�gicos, determinaci�n de cloro residual, pH y fisicoqu�micos","Analisis realizados","6,600.00","1,650.00","25.00","1,650.00","25.00","1,650.00","25.00","1,650.00","25.00"),
    array("0","100","C03","227","02","02","03","01","02","05","5","Supervisi�n de la cloraci�n de agua y comportamiento de las fuentes de abastecimiento","Informe de supervici","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C03","227","02","02","03","01","02","05","6","Reporte Mensual de energ�a el�ctrica de los pozos.","Reporte de consumo","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C03","227","02","02","03","01","02","05","7","Reporte y supervisi�n de planta tratadora","Reporte de operaci�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","100","C03","C03","02","02","03","01","02","05","1","Coordinar y supervisar los mantenimientos de infraestructura hidr�ulica","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C03","C03","02","02","03","01","02","05","2","Coordinar las l�neas de conducci�n y distribuci�n de Agua Potable","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","C03","C03","02","02","03","01","02","05","3","Coordinar las l�neas de conducci�n y distribuci�n de Drenaje y Alcantarillado","Informe","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","228","01","03","05","01","01","05","1","Elaboraci�n de instrumentos jur�dicos relacionados con los derechos, funciones y obligaciones del Organismo","Contrato/Convenios y","15.00","5.00","33.33","3.00","20.00","3.00","20.00","4.00","26.67"),
    array("0","100","D00","228","01","03","05","01","01","05","2","Representar al Organismo ante cualquier autoridad de car�cter Federal, Estatal o Municipal, personas f�sicas o jur�dicas colectivas.","Juicios, demandas, c","25.00","7.00","28.00","6.00","24.00","6.00","24.00","6.00","24.00"),
    array("0","100","D00","228","01","03","05","01","01","05","3","Asesor�as de car�cter jur�dico a las diferentes �reas del Organismo","Asesor�as","65.00","15.00","23.08","17.00","26.15","17.00","26.15","16.00","24.62"),
    array("0","100","D00","228","01","03","05","01","01","05","4","Revisar la base legal que regula el funcionamiento del Organismo, por conducto de la Comisi�n Revisora de la Reglamentaci�n","Ordenamiento","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","100","D00","228","01","03","05","01","01","05","5","Procedimientos administrativos comunes sancionatoriosSe imponen multas e infracciones a la Ley del Agua","Resoluciones","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","228","01","03","05","01","01","05","6","Regularizaci�n de inmuebles para la incorporaci�n al Organismo","Escrituras P�blicas","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","D00","228","01","03","05","01","01","05","7","Programa para la coordinaci�n institucional para la igualdad de g�nero","Reporte de actividad","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","D00","228","01","03","05","01","01","05","8","Programa de cultura de igualdad y prevenci�n de la violencia de g�nero","Reporte de actividad","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","224","01","05","02","03","01","04","1","Emitir las factibilidades de servicios de agua potable, alcantarillado y saneamiento en apego a las disposiciones oficiales.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","224","01","05","02","03","01","04","2","Revisar los proyectos hidraulico-sanitarios y pluviales para que cumplan con la normatividad vigente.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","224","01","05","02","03","01","04","3","Otorgar informaci�n clara y oportuna sobre el tr�mite de factibilidad.","Lista de registro","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","224","01","05","02","03","01","04","4","Revisar con apego a la normatividad las solicitudes de los usuarios para otorgar el dictamen de factibilidad.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","224","01","05","02","03","01","04","5","Efectuar las visitas de inspecci�n para verificar la infraestructura hidr�ulica en las nuevas incorporaciones y desarrollos.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","230","01","05","02","03","01","04","1","Atender las demandas de la poblaci�n para proporcionar los servicios de agua potable, drenaje sanitario, drenaje pluvial y tratamiento de aguas residu","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","230","01","05","02","03","01","04","2","Integraci�n y seguimiento al programa anual de acciones y modificaciones","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","230","01","05","02","03","01","04","3","Elaborar convenios para la ampliaci�n de infraestructura hidr�ulico-sanitaria en el Municipio","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","230","01","05","02","03","01","04","4","Gesti�n de recursos de los Programas Federales","Informe","4.00","2.00","50.00","1.00","25.00","0.00","0.00","1.00","25.00"),
    array("0","100","E01","230","01","05","02","03","01","04","5","Dar seguimiento a la ejecuci�n del Plan Hidr�ulico de Metepec","Reporte","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","E01","230","01","05","02","03","01","04","6","Elaborar el an�lisis estad�stico y grafico del consumo de energ�a el�ctrica de las fuentes de abastecimiento y oficinas administrativas del OPDAPAS de","Reporte","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","E01","230","01","05","02","03","01","04","7","Elaborar el an�lisis estad�stico y gr�fico y darle seguimiento al volumen Concesionado de las Fuentes de Abastecimiento del OPDAPAS del Municipio de M","Reporte","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","E01","233","01","05","02","03","01","04","1","Realizar proyectos ejecutivos de Agua Potable","Proyecto","7.00","1.00","14.29","2.00","28.57","2.00","28.57","2.00","28.57"),
    array("0","100","E01","233","01","05","02","03","01","04","2","Realizar proyectos ejecutivos de Drenaje Sanitario y Drenaje Pluvial","Proyecto","7.00","1.00","14.29","2.00","28.57","2.00","28.57","2.00","28.57"),
    array("0","100","E01","233","01","05","02","03","01","04","3","Levantamientos Topograficos","Levantamiento","7.00","1.00","14.29","2.00","28.57","2.00","28.57","2.00","28.57"),
    array("0","100","E01","233","01","05","02","03","01","04","4","Seguimiento a la integracion del Balance Hidraulico Municipal","Reporte de avance","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","100","E01","E01","01","05","02","03","01","04","1","Supervisar los Proyectos de infraestructura Social Municipal elaborados.","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","100","E01","E01","01","05","02","03","01","04","2","Seguimiento a la integraci�n del Balance Hidraulico Municipal.","Reporte","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","1","Elaboraci�n de Plan Anual de Auditorias.","Plan anual de Audito","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","2","Auditorias.","Informe de Auditoria","4.00","2.00","50.00","2.00","50.00","0.00","0.00","0.00","0.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","3","Observaciones derivadas de auditor�as.","Informe de Auditoria","4.00","0.00","0.00","0.00","0.00","2.00","50.00","2.00","50.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","4","Capacitaci�n de Personal de �rgano Interno de Control.","Convocatorias","8.00","3.00","37.50","1.00","12.50","2.00","25.00","2.00","25.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","5","Servidores P�blicos asistentes a las capacitaciones.","Lista de asistencia","8.00","3.00","37.50","1.00","12.50","2.00","25.00","2.00","25.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","6","Campa�as de informaci�n de las obligaciones de los servidores p�blicos.","Programas de difusi�","4.00","1.00","25.00","2.00","50.00","1.00","25.00","0.00","0.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","7","Carteles informativos.","Registros de cartele","4.00","1.00","25.00","2.00","50.00","1.00","25.00","0.00","0.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","8","Ejecutar inspecciones, pases de lista, arqueos de caja, fuentes de abastecimiento, brigadas, obra p�blica, buzones,CREG, entre otros.","Reporte","224.00","58.00","25.89","60.00","26.79","60.00","26.79","46.00","20.54"),
    array("0","100","G00","G00","01","03","04","01","01","01","9","Participaci�n en Testificaciones.","Actas","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","100","G00","G00","01","03","04","01","01","01","10","Instaurar Procedimientos de Responsabilidad Administrativa.","Acuerdos","23.00","6.00","26.09","7.00","30.43","5.00","21.74","5.00","21.74"),
    array("0","100","G00","G00","01","03","04","01","01","01","11","Resoluci�n de Procedimientos de Responsabilidad Administrativas.","Determinaci�n","23.00","6.00","26.09","7.00","30.43","5.00","21.74","5.00","21.74"),
);


$imcufidem = array(
    array("0","60","A00","401","02","04","01","01","01","01","1","Celebrar Conveniosy Contratos en diversas materias","Convenio","28.00","25.00","89.29","0.00","0.00","3.00","10.71","0.00","0.00"),
    array("0","10","A00","401","02","04","01","01","01","01","2","Entregar material y art�culos deportivos","Apoyo","20.00","8.00","40.00","0.00","0.00","6.00","30.00","6.00","30.00"),
    array("0","40","A00","401","02","04","01","01","01","01","3","Gestionar recursos para fomentar actividades f�sicas","Gesti�n","13.00","9.00","69.23","0.00","0.00","2.00","15.38","2.00","15.38"),
    array("0","60","A00","401","02","04","01","01","01","01","4","Cubrireventos deportivos","Eventos","36.00","10.00","27.78","8.00","22.22","10.00","27.78","8.00","22.22"),
    array("0","75","A00","401","02","04","01","01","01","01","5","Realizar la toma de fotograf�as en eventos deportivos","Fotografias","480.00","120.00","25.00","120.00","25.00","120.00","25.00","120.00","25.00"),
    array("0","75","A00","401","02","04","01","01","01","01","6","Crear contenidos digitales en redes sociales del deporte","Publicaciones","190.00","45.00","23.68","45.00","23.68","50.00","26.32","50.00","26.32"),
    array("0","60","A00","401","02","04","01","01","01","01","7","Redactar boletines informativos en materia deportiva","Boletines","18.00","6.00","33.33","0.00","0.00","6.00","33.33","6.00","33.33"),
    array("0","60","A00","401","02","04","01","01","01","01","8","Realizar conferencias de prensa para eventos deportivos","Conferencias","12.00","4.00","33.33","0.00","0.00","4.00","33.33","4.00","33.33"),
    array("0","90","A00","401","02","04","01","01","01","01","9","Hacer dise�os para publicaci�n de redes sociales de eventos deportivos","Dise�os","70.00","20.00","28.57","10.00","14.29","20.00","28.57","20.00","28.57"),
    array("0","90","A00","401","02","04","01","01","01","01","10","Elaborar dise�os para impresiones de eventos deportivos","Dise�os","90.00","25.00","27.78","15.00","16.67","25.00","27.78","25.00","27.78"),
    array("0","80","A00","401","02","04","01","01","01","01","11","Realizar el programa operativo anual del IMCUFIDEM","Programa","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","40","A00","401","02","04","01","01","01","01","12","Realizar las evaluaciones trimestrales de las �reas del IMCUFIDEM","Evaluaciones","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","70","A00","401","02","04","01","01","01","01","13","Realizar el autodiagn�stico de la Gu�a de Desempe�o para el Desarrollo Municipal en el rubro deportivo","Autodiagn�stico","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","90","A00","401","02","04","01","01","01","01","14","Actualizar la informaci�n del sistema Ipomex del IMCUFIDEM","Actualizaciones","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","40","A00","401","02","04","01","01","01","01","15","Atender solicitudes de informaci�n del IMCUFIDEM a trav�s de SAIMEX","Solicitudes","16.00","4.00","25.00","4.00","25.00","4.00","25.00","4.00","25.00"),
    array("0","80","A00","401","02","04","01","01","01","01","16","Integrar el Programa Anual de Evaluaci�nPAEdel IMCUFIDEM","Programa","1.00","0.00","0.00","1.00","100.00","0.00","0.00","0.00","0.00"),
    array("0","60","A00","401","02","06","08","05","01","02","1","Implementar el programa Ponte Fitness con perspectiva de g�nero","Beneficiarios","38,000.00","9,278.00","24.42","9,890.00","26.03","9,890.00","26.03","8,942.00","23.53"),
    array("0","72","A00","401","02","06","08","05","01","02","2","Realizar sesiones de defensa personal para mujeres","Evento","36.00","3.00","8.33","12.00","33.33","11.00","30.56","10.00","27.78"),
    array("0","5","B00","402","01","05","02","06","01","01","1","Hacer la verificaci�n de los servidores publicos inscritos en el instituto","Verificaci�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","5","B00","402","01","05","02","06","01","01","2","Supervisar la asistenciay puntualidadde servidores p�blicos del instituto","Supervisi�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","5","B00","402","01","05","02","06","01","01","3","Realizar la actualizaci�n de informacion de movimientos de altas y bajas de los servidores p�blicos","Actualizaci�n","24.00","6.00","25.00","6.00","25.00","6.00","25.00","6.00","25.00"),
    array("0","60","B00","402","01","05","02","06","01","01","4","Implementar acciones de Mejora Regulatoria","Acciones","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","60","B00","402","01","05","02","06","01","01","5","Integrar y/o actualizar del Cat�logo de Tr�mites y Servicios","Actualizaci�n","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","60","B00","402","01","05","02","06","01","01","6","Integrar propuestas al marco regulatorio municipal","Propuestas","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","60","B00","402","01","05","02","06","01","01","7","Elaborar el programa Anual de Mejora Regulatoria","Documento","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","100.00"),
    array("0","60","B00","402","01","05","02","06","01","01","8","Realizar Sesiones de la Comisi�n Municipal de Mejora Regulatoria","Sesiones","5.00","1.00","20.00","1.00","20.00","1.00","20.00","2.00","40.00"),
    array("0","5","B00","402","01","05","02","06","02","01","1","Realizar sessiones del comit� de adquisiciones y servicios","Sesi�n","6.00","2.00","33.33","1.00","16.67","1.00","16.67","2.00","33.33"),
    array("0","5","B00","402","01","05","02","06","02","01","2","Actualizar el padr�n de proveedores","Actualizaci�n","4.00","1.00","25.00","1.00","25.00","1.00","25.00","1.00","25.00"),
    array("0","5","B00","402","01","05","02","06","02","01","3","Ejecutar el Programa Anual de Adquisiciones","Programa","1.00","1.00","100.00","0.00","0.00","0.00","0.00","0.00","0.00"),
    array("0","5","B00","402","01","05","02","06","02","01","4","Elaborar reportes de vales de salida de bienes y servicios","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","40","B00","402","01","05","02","06","03","01","1","Actualizar el inventario de los bienes del instituto sistema CREG PATRIMONIAL","Actualizaci�n","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","40","B00","402","01","05","02","06","03","01","2","Realizar la conciliaci�n f�sico contable de los bienes muebles e inmuebles del instituto","Conciliaci�n","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","40","B00","402","01","05","02","06","03","01","3","Efectuar el levantamiento f�sico de bienes muebles e inmuebles","Levantamiento","2.00","0.00","0.00","1.00","50.00","0.00","0.00","1.00","50.00"),
    array("0","80","B00","402","02","04","01","01","01","01","1","Mantener, remodelar y rehabilitar los espacios deportivos","Reporte","12.00","3.00","25.00","3.00","25.00","3.00","25.00","3.00","25.00"),
    array("0","60","C00","403","02","04","01","01","01","01","1","Realizar eventos masivos de activaci�n f�sica","Evento","4.00","2.00","50.00","1.00","25.00","1.00","25.00","0.00","0.00"),
    array("0","30","C00","403","02","04","01","01","01","01","2","Pr�stamo o renta de instalaciones deportivas municipales para la promoci�n de la cultura f�sica","Pr�stamo","46.00","12.00","26.09","12.00","26.09","12.00","26.09","10.00","21.74"),
    array("0","10","C00","403","02","04","01","01","01","01","3","Oganizar eventos deportivos para la administraci�n municipal","Evento","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","40","C00","403","02","04","01","01","01","01","4","Realizar orientaciones para el fomento de la cultura f�sica","Actividad","16.00","4.00","25.00","4.00","25.00","4.00","25.00","4.00","25.00"),
    array("0","60","C00","404","02","04","01","01","01","02","1","Realizar torneos y/o carreras atl�ticas delegaciones para ni�os, ni�as y j�venes","Actividad","7.00","1.00","14.29","2.00","28.57","3.00","42.86","1.00","14.29"),
    array("0","45","C00","404","02","04","01","01","01","02","2","Organizar, apoyar y/o asesorar la realizaci�n de eventos deportivos","Evento","15.00","4.00","26.67","2.00","13.33","5.00","33.33","4.00","26.67"),
    array("0","30","C00","404","02","04","01","01","01","02","3","Organizar torneos rel�mpagos de futbol 3x3","Torneo","3.00","0.00","0.00","1.00","33.33","1.00","33.33","1.00","33.33"),
    array("0","25","C00","404","02","04","01","01","01","02","4","Realizar una rodada ciclista","Evento","1.00","0.00","0.00","1.00","100.00","0.00","0.00","0.00","0.00"),
    array("0","30","C00","404","02","04","01","01","01","02","5","Organizar eventos del programaDeporte en tu Colonia","Evento","14.00","3.00","21.43","4.00","28.57","4.00","28.57","3.00","21.43"),
    array("0","25","C00","404","02","04","01","01","01","02","6","Realizar carreras atl�ticas delegacionales para adultos","Actividad","3.00","0.00","0.00","2.00","66.67","1.00","33.33","0.00","0.00"),
    array("0","30","C00","404","02","04","01","01","01","02","7","Registrar a deportistas en el Registro Municipal del Deporte","Registro","3,650.00","2,500.00","68.49","500.00","13.70","400.00","10.96","250.00","6.85"),
    array("0","25","C00","405","02","04","01","01","02","01","1","Crear y consolidar Centros de Iniciaci�n, Formaci�n y Desarrollo Deportivo","Centro","17.00","5.00","29.41","4.00","23.53","4.00","23.53","4.00","23.53"),
    array("0","65","C00","405","02","04","01","01","02","01","2","Organizar eventos deportivos, formativos y competitivos para personas con discapacidad","Evento","3.00","2.00","66.67","0.00","0.00","0.00","0.00","1.00","33.33"),
    array("0","60","C00","405","02","04","01","01","02","01","3","Organizar eventos deportivos, formativos y competitivos","Evento","10.00","6.00","60.00","1.00","10.00","1.00","10.00","2.00","20.00"),
    array("0","5","C00","405","02","04","01","01","02","01","4","Realizar capacitaciones y certificaciones a entrenadores deportivos","Capacitaciones","4.00","0.00","0.00","1.00","25.00","2.00","50.00","1.00","25.00"),
    array("0","55","C00","405","02","04","01","01","02","01","5","Realizar curso de verano","Evento","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","60","C00","405","02","04","01","01","02","01","6","Realizar Talleres Deportivos","Talleres","4.00","1.00","25.00","2.00","50.00","1.00","25.00","0.00","0.00"),
    array("0","10","C00","405","02","04","01","01","02","01","7","Capacitar y actualizar entrenadores deportivos, personal t�cnico en materia deportiva y deporte adaptado","Capacitaciones","1.00","0.00","0.00","0.00","0.00","1.00","100.00","0.00","0.00"),
    array("0","5","C00","405","02","04","01","01","02","01","8","Realizar entrenamientos deportivos de Para-Atletismo a personas con discapacidad","Sesiones","480.00","120.00","25.00","120.00","25.00","120.00","25.00","120.00","25.00"),
    array("0","5","C00","405","02","04","01","01","02","01","9","Realizar entrenamientos deportivos de Para-Nataci�n a personas con discapacidad","Sesiones","44.00","11.00","25.00","11.00","25.00","11.00","25.00","11.00","25.00"),
    array("0","5","C00","405","02","04","01","01","02","01","10","Realizar entrenamientos deportivos de Para-B�dminton a personas con discapacidad","Sesiones","40.00","10.00","25.00","10.00","25.00","10.00","25.00","10.00","25.00"),
    array("0","5","C00","405","02","04","01","01","02","01","11","Realizar entrenamientos deportivos a personas con discapacidad en la disciplina de Activaci�n F�sica en los Centros de Inclusi�n y Desarrollo del Muni","Sesiones","92.00","23.00","25.00","23.00","25.00","23.00","25.00","23.00","25.00"),
    array("0","5","C00","405","02","04","01","01","02","01","12","Asignar y entregar est�mulos econ�micos a deportistas, entrenadores, activadores f�sicos, jueces, �rbitros en el �mbito deportivo","Beca","168.00","42.00","25.00","42.00","25.00","42.00","25.00","42.00","25.00")
);






// 2 es DIF 
// 3 es agua
// 4 es deporte
// 5 es juventud

function areaTestDif($con, $dif)
{
    $sentencia = "SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.tipo = 2 AND dp.anio = '2024'
    GROUP BY ar.id_area
    ";
    $stm = $con->query($sentencia);
    $areas_dif = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm = $con->query("SELECT * FROM dependencias_generales WHERE tipo = 'Sistemas Municipales DIF' AND anio = '2024'");
    $generales = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM dependencias_auxiliares WHERE tipo = 'Sistemas Municipales DIF' AND anio = '2024'");
    $auxiliares = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM proyectos WHERE anio = '2024'");
    $proyectos = $stm->fetchAll(PDO::FETCH_ASSOC);


    //Primero vamos a actualizar las areas
    foreach($areas_dif as $ar){
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
        $supgen = 0;
        $supaux = 0;
        $supproy = 0;
        foreach($generales as $g1){
            if($ar['clave_dependencia'] == $g1['clave_dependencia']){
                $supgen = $g1['id_dependencia'];
            }
        }
        foreach($auxiliares as $a1){
            if($ar['clave_dependencia_auxiliar'] == $a1['clave_dependencia_auxiliar']){
                $supaux = $a1['id_dependencia_auxiliar'];
            }
        }
        foreach($proyectos as $p1){
            if($ar['codigo_proyecto'] == $p1['codigo_proyecto']){
                $supproy = $p1['id_proyecto'];
            }
        }

        if($supgen != 0 && $supaux != 0 && $supproy != 0){
            
        }
    }
    print "<br><br><br>";
    foreach($areas_dif as $ar){
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
    }
    die();


    // verifica si falta una del TXT en la base del simonts
    foreach ($areas_dif as $d) {
        $area = $d['clave_dependencia'] . $d['clave_dependencia_auxiliar'] . $d['codigo_proyecto'];
        $enc1 = 0;
        foreach ($dif as $t) {
            $areatxt = $t[2] . $t[3] . $t[4] . $t[5] . $t[6] . $t[7] . $t[8] . $t[9];
            if ($area == $areatxt) {
                $enc1 = $t;
            }
        }
        if ($enc1 == 0) {
            print "El simonts tiene la " . $d['id_area'] . " pero no esta en el TXT <br>";
        }
    }

    // Verifica si faltan del simonts en la del txt
    foreach ($dif as $t) {
        $gen = $t[2];
        $aux = $t[3];
        $proy = $t[4] . $t[5] . $t[6] . $t[7] . $t[8] . $t[9];
        $supergen = 0;
        $superaux = 0;
        $superproy = 0;
        $areatxt = $gen . $aux . $proy;
        $enc2 = 0;

        foreach ($areas_dif as $d) {
            $area = $d['clave_dependencia'] . $d['clave_dependencia_auxiliar'] . $d['codigo_proyecto'];
            if ($area == $areatxt) {
                $enc2 = $d;
            }
        }
        
        if ($enc2 == 0) {
            foreach ($generales as $g) {
                $genc_clv = $g['clave_dependencia'];
                if ($genc_clv == $gen) {
                    $supergen = $g['id_dependencia'];
                }
            }
            foreach ($auxiliares as $a) {
                $aux_clv = $a['clave_dependencia_auxiliar'];
                if ($aux_clv == $aux) {
                    $superaux = $a['id_dependencia_auxiliar'];
                }
            }
            foreach ($proyectos as $p) {
                $proy_clv = $p['codigo_proyecto'];
                if ($proy_clv == $proy) {
                    $superproy = $p['id_proyecto'];
                }
            }

            if ($supergen != 0 && $superaux != 0 && $superproy != 0) {
                $sql_areas = "INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, anio)
                VALUES (?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                $agrega_areas->execute(array($areatxt, 85, $supergen, $superaux, $superproy, '2024'));
                print "Se agregó una area<br>";
            }
        }
    }

    print "Ahora agregaremos las actividades de DIF";


    $contador = 0;
    foreach ($dif as $di) {
        $insert = 0;
        $gen = $di[2];
        $aux = $di[3];
        $proy = $di[4] . $di[5] . $di[6] . $di[7] . $di[8] . $di[9];
        $areatxt = $gen . $aux . $proy;
        foreach ($areas_dif as $d) {
            $area = $d['clave_dependencia'] . $d['clave_dependencia_auxiliar'] . $d['codigo_proyecto'];
            if ($area == $areatxt && $insert == 0) {
                $sql_areas = "INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado, id_creacion, anio, id_actividad_seguimiento)
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                $agrega_areas->execute(array($di[10], $di[11], $di[12], "0","0", $d['id_area'], 1, 1, 1, 2024, 0));

                $id = $con->lastInsertId();

                $sql_areas = "INSERT INTO programaciones (id_actividad, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                $agrega_areas->execute(array($id, 0, 0, $di[14], 0, 0, $di[16], 0, 0, $di[18], 0, 0, $di[20]));
                $insert = 1;
            }
        }
        if ($insert != 0) {
            $contador += 1;
        }
    }
    print "<br>";
    print "Se agregaron " . $contador . " de un total de: " . count($dif);
}



areaTestDif($con, $dif);
