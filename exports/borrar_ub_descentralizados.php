<?php
require_once '../models/conection.php';

$dif = array(
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "1", "Realizar reuniones de trabajo con directores", "Reunión", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "2", "Supervisar y evaluar el desempeño de las áreas", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "3", "Alianzas estratégicas con diversas instancias", "Convenio", "3.00", "0.00", "0.00", "0.00", "0.00", "3.00", "100.00", "0.00", "0.00"),
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "4", "Entrega de apoyos a la ciudadanía", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "5", "Gestionar la correspondencia del SMDIF", "Oficio", "981.00", "200.00", "20.39", "165.00", "16.82", "371.00", "37.82", "245.00", "24.97"),
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "6", "Organización de eventos en materia de desarrollo social", "Evento", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "7", "Acciones de integración con empleados", "Acción", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B00", "300", "02", "06", "08", "04", "01", "01", "8", "Elaborar la agenda de la Presidencia del DIF", "Agenda", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "1", "Elaborar el plan de medios", "Plan", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "2", "Realizar sintesis informativas", "Resumen", "122.00", "22.00", "18.03", "10.00", "8.20", "20.00", "16.39", "70.00", "57.38"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "3", "Publicar y administrar redes sociales", "Publicación", "1,651.00", "350.00", "21.20", "201.00", "12.17", "500.00", "30.28", "600.00", "36.34"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "4", "Publicar boletines informativos", "Publicación", "85.00", "20.00", "23.53", "7.00", "8.24", "8.00", "9.41", "50.00", "58.82"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "5", "Crear y difundir videos y publicaciones informativas", "Audiovisual", "231.00", "75.00", "32.47", "20.00", "8.66", "78.00", "33.77", "58.00", "25.11"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "6", "Cubrir giras de la Presidenta", "Bitacora", "224.00", "67.00", "29.91", "10.00", "4.46", "80.00", "35.71", "67.00", "29.91"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "7", "Elaborar diseños para la promoción de la imagen institucional", "Diseño", "1,694.00", "648.00", "38.25", "241.00", "14.23", "237.00", "13.99", "568.00", "33.53"),
    array("0", "100", "B00", "302", "01", "08", "03", "01", "01", "03", "8", "Dar difusión a los informes de resultados, campañas y acciones de gobierno", "Promoción", "727.00", "207.00", "28.47", "20.00", "2.75", "200.00", "27.51", "300.00", "41.27"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "1", "Elaborar el Programa Operativo Anual DIFEM 2024", "Plan", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "2", "Elaborar el Presupuesto Basado en Resultados Municipal 2024", "Presupuesto", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "3", "Realizar el Seguimiento al Programa Operativo Anual POA", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "4", "Realizar el Seguimiento al Presupuesto Basado en Resultados Municipal PbRM", "Acción", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "5", "Publicación del PAE", "Documento", "1.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "6", "Integrar la cuenta pública anual", "Instrumento", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "7", "Realizar Evaluaciones de seguimiento al PbRM", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "8", "Realizar Evaluaciones de seguimiento al POA", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "9", "Otorgar asesorías en matería de planeación", "Asesoría", "140.00", "45.00", "32.14", "25.00", "17.86", "45.00", "32.14", "25.00", "17.86"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "10", "Realizar capacitaciones en materia de Planeación", "Curso", "2.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "11", "Publicación del Informe de Resultados del PAE 2023", "Documento", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "12", "Modelo de Terminos de Referencia del PAE 2024", "Documento", "1.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "13", "Publicacion del Modelo de Convenio para la Mejora del Desempeño y Resultados Gubernamentales PAE 2024", "Documento", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "14", "Integrar el Anteproyecto y Proyecto de Presupuesto 2025", "Accion", "2.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "2.00", "100.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "05", "01", "07", "15", "Realizar llenado de formato del informe de ejecución al PDM", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "06", "04", "02", "1", "Apoyo para el diseño de programas de desarrollo social", "Asesoría", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "06", "04", "02", "2", "Realizar capacitaciones en materia de calidad y mejora regulatoria", "Curso", "3.00", "1.00", "33.33", "1.00", "33.33", "1.00", "33.33", "0.00", "0.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "06", "04", "02", "3", "Coordinar trabajos de integración de carpetas de las Cartas Compromiso con el Ciudadano", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "06", "04", "02", "4", "Elaborar evaluación de resultados de seguimiento a Cartas Compromiso", "Acción", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "304", "01", "05", "02", "06", "04", "02", "5", "Seguimiento al Programa Anual de Mejora Regulatoria", "Programa", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "1", "Realizar capacitación en materia de transparencia y acceso a la información", "Curso", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "2", "Difundir información sobre transparencia y acceso a la información", "Publicación", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "3", "Realizar el seguimiento a la actualización de las fracciones del sistema IPOMEX", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "4", "Dar respuesta a solicitudes de transparencia", "Solicitud", "230.00", "20.00", "8.70", "180.00", "78.26", "20.00", "8.70", "10.00", "4.35"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "5", "Resolver recursos de revisión", "Acta", "20.00", "5.00", "25.00", "5.00", "25.00", "5.00", "25.00", "5.00", "25.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "6", "Actualización de cédulas de bases de datos", "Cédula", "8.00", "0.00", "0.00", "8.00", "100.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "7", "Elaborar el informe de respuestas de las áreas administrativas en sus obligaciones de transparencia", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "8", "Realizar sesión del comité de transparencia", "Sesión", "8.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "9", "Vigilar que se garantice la protección de datos personales en la atención de solicitudes", "Acta", "8.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "B00", "305", "01", "08", "04", "01", "01", "01", "10", "Coordinar y orientar a los servidores públicos en lo referente a sus funciones en materia de transparencia", "Asesoría", "80.00", "20.00", "25.00", "20.00", "25.00", "20.00", "25.00", "20.00", "25.00"),
    array("0", "100", "B00", "308", "02", "06", "08", "04", "01", "01", "1", "Elaborar Plan de Trabajo Anual", "Plan", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "308", "02", "06", "08", "04", "01", "01", "2", "Elaborar y Actualizar Agenda de Procuración de Fondos", "Agenda", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B00", "308", "02", "06", "08", "04", "01", "01", "3", "Realizar gestión de recursos en empresas, gobierno e instituciones", "Gestión", "120.00", "30.00", "25.00", "30.00", "25.00", "30.00", "25.00", "30.00", "25.00"),
    array("0", "100", "B00", "308", "02", "06", "08", "04", "01", "01", "4", "Realizar actividades y eventos con causa", "Actividad", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "B00", "308", "02", "06", "08", "04", "01", "01", "5", "Realizar convenios para construir alianzas estratégicas con diversas organizaciones", "Convenio", "2.00", "0.00", "0.00", "0.00", "0.00", "2.00", "100.00", "0.00", "0.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "02", "04", "01", "1", "Elaborar el reporte de corte de caja", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "02", "04", "01", "2", "Realizar informe de conciliación de los depositos realizados", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "02", "04", "01", "3", "Realizar arqueos de caja", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "02", "04", "01", "4", "Elaborar el diario general de ingresos", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "02", "04", "01", "5", "Realizar la conciliación de los ingresos", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "02", "04", "01", "6", "Elaborar informe del registro y control de formas valoradas", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "05", "02", "03", "1", "Integrar el presupuesto", "Presupuesto", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "05", "02", "03", "2", "Elaborar el informe mensual", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "05", "02", "03", "3", "Elaborar analisis financieros para la toma de decisiones", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "05", "02", "03", "4", "Integrar la Cuenta Pública Municipal", "Informe", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "05", "02", "03", "5", "Integrar anteproyecto y proyecto de Presupuesto", "Presupuesto", "2.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00", "1.00", "50.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "05", "02", "03", "6", "Contratar la fianza de fidelidad", "Documento", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "D00", "306", "01", "05", "02", "05", "02", "03", "7", "Elaborar el informe trimestral", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "01", "1", "Entrega de apoyos al personal", "Apoyo", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "01", "2", "Integrar expedientes de personal de nuevo ingreso", "Expediente", "15.00", "4.00", "26.67", "5.00", "33.33", "3.00", "20.00", "3.00", "20.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "01", "3", "Elaborar el informe de incidencias de ausencia y retardo del personal", "Informe", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "01", "4", "Actualizar expedientes de personal", "Expediente", "12.00", "10.00", "83.33", "2.00", "16.67", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "01", "5", "Elaborar la nomína para el pago del personal", "Nomina", "28.00", "6.00", "21.43", "8.00", "28.57", "6.00", "21.43", "8.00", "28.57"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "01", "6", "Elaborar informe de movimientos de bajas y altas", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "02", "1", "Elaborar Plan de Detección de Necesidades de Capacitación", "Plan", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "02", "2", "Aplicación entrevistas, encuestas, tests para evaluar las competencias", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "02", "3", "Otorgar cursos de capacitación al personal", "Curso", "8.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "02", "4", "Impartir talleres sobre diversos temas de desarrollo de personal", "Taller", "8.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "01", "02", "5", "Realizar actividades de integración para el personal", "Evento", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "02", "01", "1", "Elaborar programa anual de adquisiciones", "Documento", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "02", "01", "2", "Sesiones del comité de adquisiciones", "Sesión", "11.00", "3.00", "27.27", "2.00", "18.18", "6.00", "54.55", "0.00", "0.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "02", "01", "3", "Procedimientos de adquisiciones", "Informe", "6.00", "1.00", "16.67", "1.00", "16.67", "3.00", "50.00", "1.00", "16.67"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "02", "01", "4", "Actualización del catalogo de proveedores", "Catalogo", "2.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "03", "01", "1", "Apoyar en la realización del inventario físico de bienes muebles", "Inventario", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "03", "01", "2", "Contabilizar los movimientos de altas y bajas del inventario", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "03", "01", "3", "Formular informes sobre control patrimonial de los bienes así como del trámite de altas y bajas de bienes contables", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "307", "01", "05", "02", "06", "03", "01", "4", "Gestionar los documentos fiscales respecto de los bienes muebles", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "1", "Otorgar consultas médicas en consultorio fijo a la población de escasos recursos del municipio POA", "Consulta", "19,340.00", "3,598.00", "18.60", "4,309.00", "22.28", "7,327.00", "37.89", "4,106.00", "21.23"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "2", "Realizar revisión de signos y síntomas COVID 19 al personal de las diferentes dependencias del municipio", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "3", "Aplicar dosis de biológico del programa de vacunación universal a personas en riesgo POA", "Dosis", "1,577.00", "815.00", "51.68", "333.00", "21.12", "182.00", "11.54", "247.00", "15.66"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "4", "Expedir certificados médicos POA", "Certificado", "5,789.00", "1,348.00", "23.29", "569.00", "9.83", "3,180.00", "54.93", "692.00", "11.95"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "5", "Realizar detecciones oportunas de cáncer mamario exploraciones POA", "Examen", "252.00", "73.00", "28.97", "39.00", "15.48", "45.00", "17.86", "95.00", "37.70"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "6", "Realizar exámenes para detección de cáncer cervicouterino citologías POA", "Examen", "81.00", "18.00", "22.22", "43.00", "53.09", "0.00", "0.00", "20.00", "24.69"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "7", "Traslados de pacientes", "Traslado", "121.00", "32.00", "26.45", "31.00", "25.62", "30.00", "24.79", "28.00", "23.14"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "8", "Otorgar plàticas de salud sexual y reproductiva", "Plática", "66.00", "15.00", "22.73", "21.00", "31.82", "15.00", "22.73", "15.00", "22.73"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "01", "01", "9", "Organización de la Jornada Municipal de Salud", "Jornada", "93.00", "21.00", "22.58", "35.00", "37.63", "22.00", "23.66", "15.00", "16.13"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "1", "Capacitar a madres de familia en la atención de enfermedades diarreicas agudas POA", "Plática", "296.00", "81.00", "27.36", "67.00", "22.64", "85.00", "28.72", "63.00", "21.28"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "2", "Capacitar a madres de familia en la atención de infecciones respiratorias agudas POA", "Plática", "327.00", "85.00", "25.99", "62.00", "18.96", "117.00", "35.78", "63.00", "19.27"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "3", "Impartir asesoría de vacunación a padres de familia POA", "Asesoría", "188.00", "39.00", "20.74", "50.00", "26.60", "38.00", "20.21", "61.00", "32.45"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "4", "Impartir asesorías de odontología preventiva, tanto a público cautivo escuelas y padres de familia , como a población abierta POA", "Asesoría", "2,523.00", "666.00", "26.40", "786.00", "31.15", "539.00", "21.36", "532.00", "21.09"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "5", "Aplicación de fluor a niñas, niños y adolescentes en escuelas primarias del municipio de acuerdo al programa educativo preventivo.", "Dosis", "5,913.00", "544.00", "9.20", "249.00", "4.21", "1,775.00", "30.02", "3,345.00", "56.57"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "6", "Otorgar consultas odontológicas a la población de escasos recursos del municipio POA", "Consulta", "5,982.00", "1,167.00", "19.51", "1,550.00", "25.91", "1,840.00", "30.76", "1,425.00", "23.82"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "7", "Otorgar tratamientos en consultorio fijo a población abierta al municipio POA", "Tratamiento", "11,702.00", "2,384.00", "20.37", "2,965.00", "25.34", "3,582.00", "30.61", "2,771.00", "23.68"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "8", "Otorgar consultas odontológicas a la población de escasos recursos del municipio en unidad móvil otorgada en comodato por DIFEM o propia", "Consulta", "1,082.00", "551.00", "50.92", "160.00", "14.79", "167.00", "15.43", "204.00", "18.85"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "9", "Proporcionar orientaciones individuales a los pacientes odontológicos", "Asesoría", "4,110.00", "219.00", "5.33", "848.00", "20.63", "1,368.00", "33.28", "1,675.00", "40.75"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "01", "10", "Otorgar tratamientos en unidad móvil otorgada en comodato por DIFEM o propia a la población de escasos recursos del municipio", "Tratamiento", "1,964.00", "354.00", "18.02", "254.00", "12.93", "331.00", "16.85", "1,025.00", "52.19"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "1", "Prevenir las adicciones tabaquismo, alcoholismo y farmacodependencia en escuelas y entre la población en general, a través de pláticas, con enfoque", "Plática", "114.00", "22.00", "19.30", "32.00", "28.07", "32.00", "28.07", "28.00", "24.56"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "2", "Atención psicológica a personas con alguna adicción o trastornos derivados de las adicciones POA .", "Asesoría", "93.00", "25.00", "26.88", "21.00", "22.58", "24.00", "25.81", "23.00", "24.73"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "3", "Impartir talleres preventivos de las adicciones a escuelas y población abierta", "Taller", "8.00", "0.00", "0.00", "2.00", "25.00", "1.00", "12.50", "5.00", "62.50"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "4", "Atender a personas con alguna adicción o trastorno", "Consulta", "491.00", "134.00", "27.29", "127.00", "25.87", "130.00", "26.48", "100.00", "20.37"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "5", "Realizar eventos especiales en torno a la prevención de las adicciones POA", "Jornada", "18.00", "5.00", "27.78", "3.00", "16.67", "5.00", "27.78", "5.00", "27.78"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "6", "Elaborar y distribuir material impreso para la difusión de la prevención de adicciones", "Triptico", "1,900.00", "600.00", "31.58", "500.00", "26.32", "500.00", "26.32", "300.00", "15.79"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "7", "Realizar talleres psicoeducativos de CONADIC POA", "Taller", "11.00", "2.00", "18.18", "3.00", "27.27", "3.00", "27.27", "3.00", "27.27"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "8", "Realizar jornadas de salud mental del Programa SMA", "Jornada", "12.00", "6.00", "50.00", "0.00", "0.00", "4.00", "33.33", "2.00", "16.67"),
    array("0", "100", "E00", "310", "02", "03", "01", "01", "02", "02", "9", "Otorgar consultas psicológicas a través del Programa SMA", "Consultas", "89.00", "20.00", "22.47", "20.00", "22.47", "20.00", "22.47", "29.00", "32.58"),
    array("0", "100", "E00", "310", "02", "06", "08", "01", "01", "05", "1", "Participar en foros de los derechos de las niñas, niños y adolescentes, a través de difusores infantiles municipales POA", "Foro", "16.00", "4.00", "25.00", "5.00", "31.25", "3.00", "18.75", "4.00", "25.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "01", "01", "05", "2", "Integrar grupos para impartir el taller de participación infantil para la promoción de los derechos de la niñez POA", "Grupo", "24.00", "12.00", "50.00", "6.00", "25.00", "6.00", "25.00", "0.00", "0.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "01", "01", "05", "3", "Otorgar pláticas sobre la convención de los derechos de la niñez a madres, padres y/o tutores, maestros y público en general POA", "Plática", "27.00", "5.00", "18.52", "9.00", "33.33", "3.00", "11.11", "10.00", "37.04"),
    array("0", "100", "E00", "310", "02", "06", "08", "01", "01", "05", "4", "Llevar a cabo eventos dirigidos al cumplimiento de los derechos de la niñez dirigidos a la población en general POA", "Evento", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "01", "01", "05", "5", "Elaborar material para promoción sobre los derechos de las niñas y los niños POA", "Publicación", "9.00", "1.00", "11.11", "3.00", "33.33", "3.00", "33.33", "2.00", "22.22"),
    array("0", "100", "E00", "310", "02", "06", "08", "01", "01", "05", "6", "Realizar evento de la elección de difusores infantiles POA", "Evento", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "1", "Atender a pacientes subsecuentes y clasificarlos por tipo de trastorno", "Consulta", "1,887.00", "477.00", "25.28", "508.00", "26.92", "483.00", "25.60", "419.00", "22.20"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "2", "Atender a pacientes de primera vez y clasificarlos por tipo de trastorno Corresponde a la meta 01 de POA", "Consulta", "681.00", "153.00", "22.47", "177.00", "25.99", "156.00", "22.91", "195.00", "28.63"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "3", "Impartir temas en materia de salud mental, presencial o vía remota, dirigido al público en general, para la prevención de trastornos emocionales y pro", "Capacitación", "19.00", "8.00", "42.11", "4.00", "21.05", "2.00", "10.53", "5.00", "26.32"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "4", "Realizar jornadas de salud mental destinadas a la prevención de trastornos emocionales y conductuales Corresponde a la meta 03 del POA", "Jornada", "7.00", "2.00", "28.57", "1.00", "14.29", "3.00", "42.86", "1.00", "14.29"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "5", "Impartir pláticas con temas de prevención de conductas de riesgo en la población adolescente y joven, dirigida a madres, padres, tutores y personal do", "Plática", "34.00", "8.00", "23.53", "6.00", "17.65", "9.00", "26.47", "11.00", "32.35"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "6", "Impartir cursos de escuela de orientación para madres, padres y desarrollo de habilidades para la formación de la pareja y la familia a población abie", "Sesión", "55.00", "12.00", "21.82", "17.00", "30.91", "10.00", "18.18", "16.00", "29.09"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "7", "Canalizar a adolescentes que así lo requieran a servicios médicos, nutricionales, psicológicos y jurídicos", "Adolescente", "16.00", "3.00", "18.75", "5.00", "31.25", "3.00", "18.75", "5.00", "31.25"),
    array("0", "100", "E00", "310", "02", "06", "08", "04", "01", "06", "8", "Promover el servicio de orientación psicológica SOS entre la población en general POA .", "Persona", "22,896.00", "5,395.00", "23.56", "6,543.00", "28.58", "5,961.00", "26.04", "4,997.00", "21.82"),
    array("0", "100", "E00", "310", "02", "06", "08", "05", "01", "02", "1", "Impartir talleres de capacitación para el trabajo Autoempleo y autoconsumo POA", "Taller", "50.00", "10.00", "20.00", "20.00", "40.00", "10.00", "20.00", "10.00", "20.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "05", "01", "02", "2", "Impartir jornadas de dignificación de la mujer POA", "Jornada", "3.00", "1.00", "33.33", "0.00", "0.00", "0.00", "0.00", "2.00", "66.67"),
    array("0", "100", "E00", "310", "02", "06", "08", "05", "01", "02", "3", "Impartir taller de género masculino POA", "Taller", "3.00", "0.00", "0.00", "2.00", "66.67", "0.00", "0.00", "1.00", "33.33"),
    array("0", "100", "E00", "310", "02", "06", "08", "05", "01", "02", "4", "Impartir pláticas de prevención de trastornos emocionales POA", "Plática", "68.00", "18.00", "26.47", "16.00", "23.53", "17.00", "25.00", "17.00", "25.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "05", "01", "02", "5", "Impartir talleres preventivos de depresión POA", "Taller", "10.00", "3.00", "30.00", "3.00", "30.00", "2.00", "20.00", "2.00", "20.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "04", "1", "Realizar jornadas de prevención del embarazo en adolescentes POA", "Jornada", "3.00", "1.00", "33.33", "1.00", "33.33", "1.00", "33.33", "0.00", "0.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "04", "2", "Implementar la estrategia de bebés virtuales POA", "Adolescente", "300.00", "100.00", "33.33", "100.00", "33.33", "100.00", "33.33", "0.00", "0.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "04", "3", "Implementación de taller prevención del embarazo adolescente POA", "Taller", "3.00", "1.00", "33.33", "1.00", "33.33", "1.00", "33.33", "0.00", "0.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "04", "4", "Actividades culturales enfocadas en la prevención del embarazo ferias de salud, desfiles, foros, torneos deportivos POA", "Actividad", "3.00", "1.00", "33.33", "0.00", "0.00", "1.00", "33.33", "1.00", "33.33"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "04", "5", "Difusión masiva de información preventiva sobre el embarazo en la adolescencia vía electrónica, módulos informativos, internet y/o redes sociales, te", "Publicación", "30.00", "5.00", "16.67", "10.00", "33.33", "5.00", "16.67", "10.00", "33.33"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "05", "1", "Impartir el curso taller para la atención de adolescentes embarazadas y madres adolescentes POA", "Sesión", "20.00", "5.00", "25.00", "6.00", "30.00", "4.00", "20.00", "5.00", "25.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "05", "2", "Canalizar a adolescentes embarazadas y madres adolescentes, de 12 a 18 años a la atención integral medicina general, psicología, nutricional, jurídic", "Mujer A", "50.00", "15.00", "30.00", "15.00", "30.00", "15.00", "30.00", "5.00", "10.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "05", "3", "Sensibilizar a la pareja, familiares y acompañantes de las adolescentes embarazadas y madres adolescentes, sobre esta problemática. POA", "Persona", "40.00", "12.00", "30.00", "12.00", "30.00", "12.00", "30.00", "4.00", "10.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "05", "4", "Gestionar talleres laborales que capaciten para el autoconsumo y el autoempleo a madres adolescentes y adolescentes embarazadas POA", "Taller", "5.00", "1.00", "20.00", "2.00", "40.00", "1.00", "20.00", "1.00", "20.00"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "05", "5", "Gestionar la implementación de pláticas para el cuidado prenatal y postnatal para madres adolescentes y adolescentes embarazadas POA", "Taller", "3.00", "0.00", "0.00", "1.00", "33.33", "1.00", "33.33", "1.00", "33.33"),
    array("0", "100", "E00", "310", "02", "06", "08", "06", "01", "05", "6", "Sensibilizar a madres adolescentes de 12 a 18 años reincidentes de embarazo POA", "Mujer A", "3.00", "0.00", "0.00", "1.00", "33.33", "1.00", "33.33", "1.00", "33.33"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "01", "02", "1", "Brindar asesorías jurídicas a los adultos mayores POA", "Asesoría", "162.00", "3.00", "1.85", "9.00", "5.56", "95.00", "58.64", "55.00", "33.95"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "01", "02", "2", "Entrega de apoyos funcionales a los adultos mayores", "Aparato", "120.00", "30.00", "25.00", "30.00", "25.00", "39.00", "32.50", "21.00", "17.50"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "01", "02", "3", "Otorgar atención psicologica y gerontologica a los adultos mayores", "Consulta", "124.00", "25.00", "20.16", "33.00", "26.61", "33.00", "26.61", "33.00", "26.61"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "01", "02", "4", "Realizar visitas de trabajo social a los adultos mayores en situación de probable vulneración de derechos", "Visita", "37.00", "14.00", "37.84", "9.00", "24.32", "8.00", "21.62", "6.00", "16.22"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "1", "Operar grupos o casas de día para personas adultas mayores en diversas comunidades del municipio", "Grupo", "60.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "60.00", "100.00"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "2", "Desarrollar actividades educativas, sociales, deportivas y manuales, dirigidas a las personas adultas mayores en grupos o casas de día", "Actividad", "600.00", "150.00", "25.00", "150.00", "25.00", "150.00", "25.00", "150.00", "25.00"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "3", "Impartir pláticas sobre derechos de las personas adultas mayores, cuidados de la salud física y mental en las personas adultas mayores.", "Plàtica", "84.00", "21.00", "25.00", "21.00", "25.00", "21.00", "25.00", "21.00", "25.00"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "4", "Realizar eventos dirigidos a las personas adultas mayores", "Evento", "12.00", "6.00", "50.00", "0.00", "0.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "5", "Realizar paseos recreativos", "Paseo", "23.00", "4.00", "17.39", "6.00", "26.09", "7.00", "30.43", "6.00", "26.09"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "6", "Realizar visitas a los grupos de los adultos mayores", "Visita", "249.00", "60.00", "24.10", "63.00", "25.30", "63.00", "25.30", "63.00", "25.30"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "7", "Atención por parte del grupo multidisciplinario al adulto mayor en probable estado de vulnerabilidad", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "8", "Gestión de apoyos a los adultos mayores", "Gestión", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "301", "02", "06", "08", "03", "02", "01", "9", "Acciones enfocadas al mejoramiento de las casas de día del adulto mayor", "Acción", "16.00", "3.00", "18.75", "3.00", "18.75", "6.00", "37.50", "4.00", "25.00"),
    array("0", "100", "F00", "309", "02", "06", "08", "05", "01", "03", "1", "Otorgamiento del servicio educativo asistencia en estancias infantiles a hijos de de los SMDIF POA", "Atencion educativa", "1,425.00", "365.00", "25.61", "390.00", "27.37", "310.00", "21.75", "360.00", "25.26"),
    array("0", "100", "F00", "309", "02", "06", "08", "05", "01", "03", "2", "Atención educativa a niñas y niños en educación preescolar", "Atencion educativa", "2,676.00", "669.00", "25.00", "669.00", "25.00", "669.00", "25.00", "669.00", "25.00"),
    array("0", "100", "F00", "309", "02", "06", "08", "05", "01", "03", "3", "Taller de escuela para padres en estancias infantiles", "Taller", "33.00", "9.00", "27.27", "9.00", "27.27", "6.00", "18.18", "9.00", "27.27"),
    array("0", "100", "F00", "309", "02", "06", "08", "05", "01", "03", "4", "Capacitación y entrenamiento al personal de las estancias", "Acción", "36.00", "9.00", "25.00", "9.00", "25.00", "12.00", "33.33", "6.00", "16.67"),
    array("0", "100", "F00", "309", "02", "06", "08", "05", "01", "03", "5", "Realización de eventos cívicos en estancias y jardín de niños", "Evento", "75.00", "27.00", "36.00", "18.00", "24.00", "12.00", "16.00", "18.00", "24.00"),
    array("0", "100", "F00", "311", "02", "05", "06", "03", "01", "01", "1", "Distribuir desayunos escolares fríos a las escuelas beneficiadas", "Desayuno", "854,916.00", "223,800.00", "26.18", "246,180.00", "28.80", "156,660.00", "18.32", "228,276.00", "26.70"),
    array("0", "100", "F00", "311", "02", "05", "06", "03", "01", "01", "2", "Capacitar a padres de familia y maestros beneficiados con los desayunos, sobre las reglas de operación", "Acta", "35.00", "35.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "F00", "311", "02", "05", "06", "03", "01", "01", "3", "Realizar el levantamiento de peso y talla para la conformación del padrón de beneficiarios", "Niño", "400.00", "200.00", "50.00", "0.00", "0.00", "200.00", "50.00", "0.00", "0.00"),
    array("0", "100", "F00", "311", "02", "05", "06", "03", "01", "01", "4", "Supervisar los planteles escolares beneficiados con desayunos fríos a través de visitas periódicas", "Supervisión", "596.00", "146.00", "24.50", "150.00", "25.17", "150.00", "25.17", "150.00", "25.17"),
    array("0", "100", "F00", "311", "02", "05", "06", "03", "01", "02", "1", "Fortalecer la supervisión en los desayunadores escolares", "Supervisión", "155.00", "38.00", "24.52", "39.00", "25.16", "39.00", "25.16", "39.00", "25.16"),
    array("0", "100", "F00", "311", "02", "05", "06", "03", "01", "02", "2", "Fomentar la orientación alimentaria a población abierta mediante pláticas y/o talleres", "Plática", "105.00", "25.00", "23.81", "30.00", "28.57", "25.00", "23.81", "25.00", "23.81"),
    array("0", "100", "F00", "311", "02", "05", "06", "03", "01", "02", "3", "Impartir talleres o pláticas para apoyar procesos formativo educativos de la comunidad", "Plática", "105.00", "25.00", "23.81", "30.00", "28.57", "25.00", "23.81", "25.00", "23.81"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "02", "1", "Realizar supervisión a los espacios de alimentación", "Supervisión", "88.00", "16.00", "18.18", "24.00", "27.27", "24.00", "27.27", "24.00", "27.27"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "02", "2", "Proporcionar el servicio de alimentación a los adultos mayores", "Persona", "3,254.00", "754.00", "23.17", "900.00", "27.66", "800.00", "24.59", "800.00", "24.59"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "02", "3", "Proporcionar el servicio de alimentación a la población en general", "Persona", "1,850.00", "150.00", "8.11", "600.00", "32.43", "550.00", "29.73", "550.00", "29.73"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "03", "1", "Reportar beneficiarios que recibieron orientaciones nutricionales", "Persona", "730.00", "180.00", "24.66", "0.00", "0.00", "300.00", "41.10", "250.00", "34.25"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "03", "2", "Plática de lonchera saludable", "Plática", "20.00", "6.00", "30.00", "0.00", "0.00", "8.00", "40.00", "6.00", "30.00"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "03", "3", "Otorgar consulta de nutrición", "Consulta", "588.00", "138.00", "23.47", "150.00", "25.51", "150.00", "25.51", "150.00", "25.51"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "05", "1", "Entregar paquete de huerto familiar", "Paquete", "274.00", "0.00", "0.00", "0.00", "0.00", "165.00", "60.22", "109.00", "39.78"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "05", "2", "Impartir talleres de germinado para la población", "Taller", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "05", "3", "Supervisar la operatividad de huertos familiares", "Supervisión", "48.00", "12.00", "25.00", "12.00", "25.00", "12.00", "25.00", "12.00", "25.00"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "05", "4", "Supervisar la operatividad de huertos escolares", "Supervisión", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "05", "5", "Realizar la cosecha de huertos", "Huerto", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "311", "02", "06", "05", "01", "01", "05", "6", "Otorgar taller de siembra", "Taller", "48.00", "12.00", "25.00", "12.00", "25.00", "12.00", "25.00", "12.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "02", "1", "Pláticas para la prevención de la violencia y derechos humanos", "Plática", "30.00", "10.00", "33.33", "0.00", "0.00", "10.00", "33.33", "10.00", "33.33"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "02", "2", "Asesoría jurídica para los casos de posibles maltratos de violencia de adultos mayores", "Asesoría", "72.00", "18.00", "25.00", "18.00", "25.00", "18.00", "25.00", "18.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "02", "3", "Presentación de informe a los reportes de violencia", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "02", "4", "Atención a personas en situación de callle", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "1", "Celebración de convenios de colaboración y contratos de comodato y prestación de servicios", "Documento", "6.00", "2.00", "33.33", "2.00", "33.33", "2.00", "33.33", "0.00", "0.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "2", "Revisión actualización y adecuación de la normativa interna del DIF", "Informe", "2.00", "1.00", "50.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "3", "Conciliaciones en materia laboral con los servidores públicos", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "4", "Informe de juicios concluidos en materia laboral", "Informe", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "5", "Otorgar asesoría jurídica a la población en materia familiar para garantizar la preservación de sus derechos", "Asesoría", "1,620.00", "390.00", "24.07", "450.00", "27.78", "390.00", "24.07", "390.00", "24.07"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "6", "Patrocinio de juicios", "Juicio", "144.00", "36.00", "25.00", "36.00", "25.00", "36.00", "25.00", "36.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "7", "Elaboración de convenios en material familiar", "Convenio", "96.00", "24.00", "25.00", "24.00", "25.00", "24.00", "25.00", "24.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "8", "Reportar la conclusión de los juicios patrocinados a la población de escasos recursos en juicios de derecho familiar", "Juicio", "144.00", "36.00", "25.00", "36.00", "25.00", "36.00", "25.00", "36.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "9", "Celebración de audiencias en materia familiar", "Audiencia", "180.00", "45.00", "25.00", "45.00", "25.00", "45.00", "25.00", "45.00", "25.00"),
    array("0", "100", "F00", "312", "02", "06", "08", "04", "01", "03", "10", "Conciliación en materia familiar", "Conciliación", "96.00", "24.00", "25.00", "24.00", "25.00", "26.00", "27.08", "22.00", "22.92"),
    array("0", "100", "F00", "313", "02", "06", "08", "01", "01", "03", "1", "Dar seguimiento a niñas, niños y adolescentes en situación de calle o trabajo infantil, detectados en zonas receptoras", "Menor", "240.00", "30.00", "12.50", "101.00", "42.08", "25.00", "10.42", "84.00", "35.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "01", "01", "03", "2", "Realizar visitas de trabajo social a zonas receptoras de NNA para detectar situación de calle, trabajo infantil, migrantes repatriados y/o no acompaña", "Visita", "534.00", "134.00", "25.09", "125.00", "23.41", "150.00", "28.09", "125.00", "23.41"),
    array("0", "100", "F00", "313", "02", "06", "08", "01", "01", "03", "3", "Gestionar becas educativas para niñas, niños y adolescentes", "Gestión", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "01", "01", "03", "4", "Realizar diagnóstico municipal sobre NNA en situación de calle y/o trabajo infantil", "Diagnóstico", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "01", "01", "03", "5", "Desarrollar actividades academicas, ludico recreativas, culturales, deportivas, artisticas, entre otras.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "01", "01", "03", "6", "Colaboración internstitucional y organizacional pública y privada", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "01", "01", "04", "1", "Realizar pláticas, talleres y/o campañas para la prevención de NNA en situación de calle, trabajo infantil, migrantes repatriados y/o no acompañados y", "Plática", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "1", "Difundir el modelo de atención en materia de protección de derechos de las niñas, niños y adolescentes a través de pláticas en escuelas, padres de fam", "Plática", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "2", "Atender a niñas, niños y adolescentes en donde se hayan detectado y comprobado actos u omisiones que vulneren sus derechos en la procuraduría de prote", "Reporte", "140.00", "28.00", "20.00", "42.00", "30.00", "36.00", "25.71", "34.00", "24.29"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "3", "Detectar si existe una probable vulneración o restricción derechos de las niñas, niños y adolescente, a través de un reporte de manera telefónica o de", "Reporte", "240.00", "60.00", "25.00", "60.00", "25.00", "60.00", "25.00", "60.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "4", "Representación jurídica en instancia ministerial federal o local POA", "Representación", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "5", "Asesorías jurídicas", "Asesoría", "130.00", "30.00", "23.08", "40.00", "30.77", "30.00", "23.08", "30.00", "23.08"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "6", "Otorgar consulta psicológica a ninos, niñas, adolescentes, padres, tutores y familiares", "Consulta", "960.00", "230.00", "23.96", "250.00", "26.04", "250.00", "26.04", "230.00", "23.96"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "7", "Visitas domiciliarias de primera vez y seguimiento", "Documento", "420.00", "105.00", "25.00", "105.00", "25.00", "105.00", "25.00", "105.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "8", "Elaboración de convenios", "Convenio", "26.00", "8.00", "30.77", "6.00", "23.08", "6.00", "23.08", "6.00", "23.08"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "9", "Reporte sobre el ingreso de niñas, niños y adolescentes al Centro de Asistencia Social", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "10", "Reporte de registro de niñas, niños y adolescentes", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "F00", "313", "02", "06", "08", "04", "01", "02", "11", "Mediación de casos con persectiva de infancia POA", "Mediación", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "01", "02", "1", "Impartir pláticas de prevención de la discapacidad en escuelas, a padres de familia y a la población en general", "Plàtica", "82.00", "14.00", "17.07", "15.00", "18.29", "30.00", "36.59", "23.00", "28.05"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "01", "02", "2", "Impartir talleres de prevención de la discapacidad en escuelas, a padres de familia y a la población en general", "Taller", "8.00", "2.00", "25.00", "1.00", "12.50", "4.00", "50.00", "1.00", "12.50"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "01", "02", "3", "Orientar e informar sobre la prevención de la discapacidad, a través de asesorías individuales.", "Asesoría", "1,284.00", "209.00", "16.28", "240.00", "18.69", "439.00", "34.19", "396.00", "30.84"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "01", "02", "4", "Detectar factores de riesgo que causen discapacidad en la población en general", "Persona", "498.00", "46.00", "9.24", "75.00", "15.06", "200.00", "40.16", "177.00", "35.54"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "01", "02", "5", "Elaborar material de difusión de los programas de PREVIDIF entre la población trípticos, carteles, periódicos murales y rotafolios", "Públicación", "25.00", "6.00", "24.00", "6.00", "24.00", "6.00", "24.00", "7.00", "28.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "02", "01", "1", "Impartir platicas de sensibilización en inclusión social de personas con discapacidad a diversos sectores de la población POA", "Plática", "17.00", "2.00", "11.76", "3.00", "17.65", "4.00", "23.53", "8.00", "47.06"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "02", "01", "2", "Incluir a personas con discapacidad a educación especial POA", "Persona", "4.00", "2.00", "50.00", "0.00", "0.00", "2.00", "50.00", "0.00", "0.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "02", "01", "3", "Incluir a personas con discapacidad a educación regular POA", "Persona", "3.00", "0.00", "0.00", "0.00", "0.00", "2.00", "66.67", "1.00", "33.33"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "02", "01", "4", "Incluir laboralmente a personas con discapacidad POA", "Persona", "12.00", "7.00", "58.33", "2.00", "16.67", "1.00", "8.33", "2.00", "16.67"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "02", "01", "5", "Incluir a personas con discapacidad a la capacitación y adiestramiento productivo POA .", "Persona", "31.00", "4.00", "12.90", "9.00", "29.03", "13.00", "41.94", "5.00", "16.13"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "02", "01", "6", "Incluir a personas con discapacidad a las actividades recreativas o culturales POA .", "Persona", "10.00", "2.00", "20.00", "1.00", "10.00", "4.00", "40.00", "3.00", "30.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "02", "01", "7", "Incluir a personas con discapacidad o familiares a grupos de autoayuda POA", "Persona", "11.00", "2.00", "18.18", "2.00", "18.18", "3.00", "27.27", "4.00", "36.36"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "01", "1", "Otorgar consultas médicas de rehabilitación a personas con discapacidad en CRIS, URIS o UBRIS POA", "Consulta", "1,140.00", "310.00", "27.19", "270.00", "23.68", "312.00", "27.37", "248.00", "21.75"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "01", "2", "Otorgar consultas de psicología a personas con discapacidad en CRIS, URIS o UBRIS POA", "Consulta", "1,624.00", "354.00", "21.80", "565.00", "34.79", "359.00", "22.11", "346.00", "21.31"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "01", "3", "Otorgar consultas de trabajo social a personas con discapacidad en CRIS, URIS o UBRIS POA", "Consulta", "961.00", "227.00", "23.62", "254.00", "26.43", "262.00", "27.26", "218.00", "22.68"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "01", "4", "Otorgar pláticas sobre rehabilitación a personas con discapacidad y a sus familiares POA", "Plática", "7.00", "2.00", "28.57", "1.00", "14.29", "3.00", "42.86", "1.00", "14.29"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "01", "5", "Detección de personas con discapacidad permanente POA", "Detección", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "01", "6", "Otorgar alta a personas con discapacidad POA", "Alta", "60.00", "12.00", "20.00", "23.00", "38.33", "11.00", "18.33", "14.00", "23.33"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "01", "7", "Referir a personas con discapacidad a otras instituciones para su atención POA .", "Persona", "23.00", "4.00", "17.39", "8.00", "34.78", "8.00", "34.78", "3.00", "13.04"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "1", "Aplicar terapias físicas, a personas con discapacidad en CRIS, URIS o UBRIS POA", "Terapía", "18,067.00", "3,862.00", "21.38", "4,891.00", "27.07", "4,849.00", "26.84", "4,465.00", "24.71"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "2", "Aplicar terapias ocupacionales a personas con discapacidad en CRIS, URIS o UBRIS POA", "Terapía", "7,420.00", "1,580.00", "21.29", "1,698.00", "22.88", "1,648.00", "22.21", "2,494.00", "33.61"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "3", "Aplicar terapias en programa de estimulación temprana a niños con discapacidad en CRIS, URIS o UBRIS POA", "Terapía", "636.00", "119.00", "18.71", "233.00", "36.64", "134.00", "21.07", "150.00", "23.58"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "4", "Aplicar terapias de lenguaje a personas con discapacidad en CRIS, URIS o UBRIS POA", "Terapía", "2,431.00", "567.00", "23.32", "711.00", "29.25", "603.00", "24.80", "550.00", "22.62"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "5", "Solicitar el equipamiento de CRIS, URIS o UBRIS POA", "Gestiòn", "1.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "6", "Otorgar donativos a personas con discapacidad POA", "Donativo", "37.00", "5.00", "13.51", "10.00", "27.03", "22.00", "59.46", "0.00", "0.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "7", "Integrar expedientes para la donación de ayudas funcionales a través del DIFEM. POA", "Expediente", "14.00", "10.00", "71.43", "0.00", "0.00", "4.00", "28.57", "0.00", "0.00"),
    array("0", "100", "F00", "314", "02", "06", "08", "02", "03", "02", "8", "Rehabiltación y mantenimiento del URIS", "Acción", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "1", "Elaborar Programa Anual de Auditoría.", "Programa", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "2", "Auditorías.", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "3", "Inspecciones.", "Inspección", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "4", "Supervisiones.", "Supervisión", "1.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "5", "Realizar el seguimiento a las observaciones y recomendaciones del OSFEM.", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "6", "Supervisar la permanencia de los servidores públicos en su lugar de trabajo.", "Supervisión", "96.00", "24.00", "25.00", "24.00", "25.00", "24.00", "25.00", "24.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "7", "Testificación de eventos de distinta naturaleza.", "Reporte", "3.00", "1.00", "33.33", "0.00", "0.00", "2.00", "66.67", "0.00", "0.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "8", "Participación en levantamiento físico de inventarios.", "Inventario", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "9", "Testificar la constitución de Comités Ciudadanos de Control y Vigilancia COCICOVIS .", "Acta", "63.00", "63.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "10", "Participar en los procesos de entrega-recepción.", "Acta", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "11", "Supervisar el cumplimiento de obligaciones periódicas a cargo del Sistema Municipal DIF Metepec.", "Supervisión", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "12", "Arqueos de caja.", "Arqueo", "96.00", "24.00", "25.00", "24.00", "25.00", "24.00", "25.00", "24.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "13", "Capacitar a los servidores públicos.", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "14", "Monitoreo en el Sistema BackOffice Declaranet para la presentación de las Declaraciones Patrimoniales en sus modalidades de: Inicial, Conclusión y Anu", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "01", "01", "01", "15", "Participación en Inventarios de Almacén.", "Inventario", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "1", "Iniciar los Procedimientos de Responsabilidad Admnistrativa", "Acuerdo", "100.00", "20.00", "20.00", "30.00", "30.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "2", "Emplazar al Presunto Responsable en los Procedimientos de Responsabilidad Admnistrativa.", "Oficio", "100.00", "20.00", "20.00", "30.00", "30.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "3", "Citar a la autoridada investigadora y en su caso a los denunciantes a la Audiencia Inicial dentro del Procedimiento de Responsabilidad Adminitrativa.", "Citatorio", "103.00", "20.00", "19.42", "31.00", "30.10", "26.00", "25.24", "26.00", "25.24"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "4", "Celebrar la Audiencia Inicial dentro de los Procedimientos de Responsabilidad Admnistrativa.", "Acta", "100.00", "20.00", "20.00", "30.00", "30.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "5", "Emitir acuerdo de admisión de pruebas dentro del Procedimiento de Responsabilidad Admnistrativa.", "Acuerdo", "100.00", "20.00", "20.00", "30.00", "30.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "6", "Emitir acuerdo que declara abierto el periodo de alegatos del Procedimiento de Responsabilidad Admnistrativa.", "Acuerdo", "100.00", "20.00", "20.00", "30.00", "30.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "7", "Turnar a la autoridad resolutora del Órgano Interno de Control del SMDIF de Metepec, los autos originales de los expedientes para que emita la resoluc", "Oficio", "97.00", "20.00", "20.62", "30.00", "30.93", "23.00", "23.71", "24.00", "24.74"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "01", "8", "Enviar al Tribunal de Justicia Administrativa del Estado de México, los autos originales de los expedientes para que continúe con los procedimientos d", "Oficio", "3.00", "0.00", "0.00", "0.00", "0.00", "2.00", "66.67", "1.00", "33.33"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "04", "1", "Investigar hechos relacionados con presuntas faltas administrativas.", "Expediente", "125.00", "26.00", "20.80", "33.00", "26.40", "33.00", "26.40", "33.00", "26.40"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "04", "2", "Elaborar informes de presunta responsabilidad administrativa.", "Informe", "100.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "04", "3", "Elaborar actas administrativas y/o circunstanciadas.", "Acta", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "04", "4", "Supervisar los buzones de denuncias", "Supervisión", "40.00", "8.00", "20.00", "12.00", "30.00", "12.00", "30.00", "8.00", "20.00"),
    array("0", "100", "G00", "303", "01", "03", "04", "02", "02", "04", "5", "Monitorear el Sistema de Atención Mexiquense SAM .", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
);


$opdapas = array(
    array("0", "100", "A00", "A00", "01", "05", "02", "06", "04", "02", "1", "Convocar a sesiones de Consejo Directivo, así como ejecutar los acuerdos y disposiciones.", "Acta", "6.00", "1.00", "16.67", "2.00", "33.33", "1.00", "16.67", "2.00", "33.33"),
    array("0", "100", "A00", "A00", "01", "05", "02", "06", "04", "02", "2", "Dirigir y supervisar la integración del trabajo en equipo en el ejercicio de las funciones de las áreas del Organismo", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "A00", "A00", "01", "05", "02", "06", "04", "02", "3", "Verificar la capacitación y el desempeño del personal y establecer una comunicación estrecha con las áreas para su adecuado funcionamiento.", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "A00", "A00", "01", "05", "02", "06", "04", "02", "4", "Supervisar y coordinar la elaboración del programa anual operativo de todas las dependencias del Organismo", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "A04", "231", "01", "05", "02", "06", "04", "01", "1", "Seguimiento al Programa de Mejora Regulatoria", "Acta", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "A04", "231", "01", "05", "02", "06", "04", "01", "2", "Actualización de cédulas de tramites y servicios del Organismo", "Reporte", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "A04", "231", "01", "05", "02", "06", "04", "01", "3", "Programa Anual de Mejora Regulatoria 2024", "Documento", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "A04", "231", "01", "08", "04", "01", "01", "01", "1", "Seguimiento a la Plataforma IPOMEX", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "A04", "231", "01", "08", "04", "01", "01", "01", "2", "Trámite, seguimiento y respuesta a las solicitudes de informacion de la plataforma SAIMEX", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "A04", "231", "01", "08", "04", "01", "01", "01", "3", "Convocar a sesiones de Transparencia", "Convocatorias", "11.00", "2.00", "18.18", "3.00", "27.27", "3.00", "27.27", "3.00", "27.27"),
    array("0", "100", "A04", "A04", "01", "05", "02", "05", "01", "07", "1", "Recabar la información mensual de las Dependencias del Organismo para seguimiento y evaluación.", "Documento", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "A04", "A04", "01", "05", "02", "05", "01", "07", "2", "Recabar y procesar la información para el llenadode los formatosPbRM", "Documento", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "A04", "A04", "01", "05", "02", "05", "01", "07", "3", "Coordinar el desempeño de Gestión de Calidad", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "A04", "A04", "01", "05", "02", "05", "01", "07", "4", "Realizar asesorias en Materia de Sistema de Evaluacion y Desempeño", "Registro de asistenc", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "A05", "201", "01", "08", "05", "01", "01", "03", "1", "Efectuar mantenimientos preventivos a los equipos de cómputo con los que cuenta el Organismo.", "Programa de mantenim", "360.00", "90.00", "25.00", "90.00", "25.00", "90.00", "25.00", "90.00", "25.00"),
    array("0", "100", "A05", "201", "01", "08", "05", "01", "01", "03", "2", "Asesoría y soporte técnico a personal administrativo en función de satisfacer necesidades tecnológicas", "Lista de registro", "600.00", "190.00", "31.67", "140.00", "23.33", "135.00", "22.50", "135.00", "22.50"),
    array("0", "100", "A05", "201", "01", "08", "05", "01", "01", "03", "3", "Actualización y mantenimiento de la pagina web del Organismo", "Reporte de mantenimi", "6.00", "1.00", "16.67", "2.00", "33.33", "1.00", "16.67", "2.00", "33.33"),
    array("0", "100", "A05", "201", "01", "08", "05", "01", "01", "03", "4", "Administrar y mantener actualizada la lista de red de interconexionesIPsde los equipos internos del OPDAPAS", "Informe", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "A05", "201", "01", "08", "05", "01", "01", "03", "5", "Impartir capacitaciones sobre TICS a Servidores Públicos", "Lista de asistencia", "8.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "A05", "201", "01", "08", "05", "01", "01", "03", "6", "Realizar mantenimientos a circuito cerrado CCTV", "Bitácora", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B00", "B00", "01", "05", "02", "02", "04", "01", "1", "Supervisar la integración del Presupuesto de Egresos definitivo 2024", "Informe", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "B00", "01", "05", "02", "02", "04", "01", "2", "Supervisar la integración de los Informes Trimestrales.", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B00", "B00", "01", "05", "02", "02", "04", "01", "3", "Supervisar la integración de la Cuenta Publica para su envío al OSFEM", "Informe", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B00", "B00", "01", "05", "02", "02", "04", "01", "4", "Supervisar la integración del Anteproyecto del presupuesto de Egresos 2025", "Informe", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "B01", "203", "01", "05", "02", "03", "01", "04", "1", "Avance fisico-financiero al Programa Anual de Obra", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B01", "203", "01", "05", "02", "03", "01", "04", "2", "Avance fisico-financiero al Programa Anual de Reparación y Mantenimiento", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B01", "203", "01", "05", "02", "03", "01", "04", "3", "Revisión de expedientes de pago de adquisición de bienes, servicios y arrendamientos", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "203", "01", "05", "02", "03", "01", "04", "4", "Avance fisico-financiero a Programas Federales", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B01", "205", "01", "05", "02", "02", "04", "01", "1", "Registro y Control de Caja y Tesorería", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "205", "01", "05", "02", "02", "04", "01", "2", "Apertura y designación de cajas externas", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "205", "01", "05", "02", "02", "04", "01", "3", "Ingresos por tipos de toma con medidor y sin medidor", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "205", "01", "05", "02", "02", "04", "01", "4", "Control de ingresos de cajas internas e IUSA", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "206", "01", "05", "02", "05", "01", "09", "1", "Integrar el Proyecto de Presupuesto de Ingreso y Egresos Definitivo para el Ejercicio Fiscal 2024", "Reporte", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B01", "206", "01", "05", "02", "05", "01", "09", "2", "Seguimiento del ejercicio del presupuesto de Egresos correspondiente al Ejercicio Fiscal 2024", "Reporte de avance", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "206", "01", "05", "02", "05", "01", "09", "3", "Integrar los Traspasos Internos y Externos correspondientes al Ejercicio Fiscal 2024", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B01", "206", "01", "05", "02", "05", "01", "09", "4", "Integrar el Anteproyecto de Presupuesto de Egresos para el Ejercicio Fiscal 2025", "Anteproyecto", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "B01", "207", "01", "05", "02", "05", "02", "03", "1", "Integrar el Informe Trimestral", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B01", "207", "01", "05", "02", "05", "02", "03", "2", "Integrar la Cuenta Pública Anual", "Reporte", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B01", "211", "01", "05", "02", "02", "01", "01", "1", "Supervisar la apertura y designación de cajas", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "211", "01", "05", "02", "02", "01", "01", "2", "Vigilar las estrategias de captación de ingresos", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B01", "211", "01", "05", "02", "02", "01", "01", "3", "Coordinar y supervisar la integración y entrega de la cuenta publica", "Informe", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B01", "211", "01", "05", "02", "02", "01", "01", "4", "Coordinar y supervisar la integración y entrega de los informes trimestrales", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B01", "211", "01", "05", "02", "02", "01", "01", "5", "Coordinar y supervisar la integración y entrega del Proyecto de Presupuesto de Ingresos y Egresos Definitivo para el ejercicio fiscal 2024", "Informe", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B01", "211", "01", "05", "02", "02", "01", "01", "6", "Coordinar y supervisar la integración y entrega del Anteproyecto de Presupuestos de Ingresos y Egresos para el ejercicio fiscal 2025", "Informe", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "B02", "209", "01", "05", "02", "06", "01", "01", "1", "Gestionar la capacitación de acuerdo a las necesidades del personal adscrito a Organismo", "Convocatoria/Registr", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "B02", "209", "01", "05", "02", "06", "01", "01", "2", "Coordinar y verificar el comité de Seguridad e Higiene", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B02", "209", "01", "05", "02", "06", "01", "01", "3", "Control y aplicación de descuentos", "Informe", "23.00", "6.00", "26.09", "6.00", "26.09", "6.00", "26.09", "5.00", "21.74"),
    array("0", "100", "B02", "209", "01", "05", "02", "06", "01", "01", "4", "Realizar el pago de las remuneraciones quincenales y de las prestaciones laborales al personal del Organismo", "Registros de nómina", "26.00", "7.00", "26.92", "6.00", "23.08", "6.00", "23.08", "7.00", "26.92"),
    array("0", "100", "B02", "209", "01", "05", "02", "06", "01", "01", "5", "Seguimiento de pagos correspondientes del convenio de prestaciones SUTEyM", "Reporte", "10.00", "1.00", "10.00", "3.00", "30.00", "1.00", "10.00", "5.00", "50.00"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "1", "Atención de los servicios básicos", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "2", "Reparación y mantenimiento de inmuebles", "Solicitud", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "3", "Reparación y mantenimiento de muebles", "Solicitud", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "4", "Servicio y mantenimiento a maquinaria.", "Solicitud", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "5", "Servicio y mantenimiento a vehículos del Organismo", "Bitácora", "6.00", "1.00", "16.67", "2.00", "33.33", "1.00", "16.67", "2.00", "33.33"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "6", "Aseguramiento del parque vehicular", "Reporte", "2.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "7", "Contratación de servicios generales externos", "Solicitud", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "210", "01", "05", "02", "06", "02", "01", "8", "Suministro y distribución de gasolina", "Bitácora", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "1", "Integración y elaboración del Programa Anual de Desarrollo Archivistico del OPDAPAS 2024.", "Programa Anual", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "2", "Sesiones del Grupo Interdisciplinario.", "Actas", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "3", "Sesiones del Sistema Institucional de Archivo.", "Actas", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "4", "Capacitación a los enlaces de archivo en referencia a la integración de los expedientes.", "Lista de asistencia", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "5", "Elaboración de fichas técnicas de valoración documental.", "Documento", "3.00", "2.00", "66.67", "1.00", "33.33", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "6", "Elaboración del catálogo de disposición documental.", "Documento", "2.00", "2.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "7", "Capacitación a los enlaces de archivo en referencia a la guia simple de archivo.", "Lista de asistencia", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "B02", "212", "01", "05", "02", "06", "03", "01", "8", "Seguimiento a los procesos de archivo y su implementación de cada Unidad Administrativa.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "213", "01", "05", "02", "06", "02", "01", "1", "Actualización del catálogo de proveedores", "Catálogo", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "213", "01", "05", "02", "06", "02", "01", "2", "Recepción de solicitudes de compra", "Informe de solicitud", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "213", "01", "05", "02", "06", "02", "01", "3", "Emisión de contratos pedidos", "Informe de pedidos", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "213", "01", "05", "02", "06", "02", "01", "4", "Entrada de materiales al almacén", "Informe de entradas", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "213", "01", "05", "02", "06", "02", "01", "5", "Actualización del procedimiento de adquisiciones", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "1", "Registro de adquisiciones en el CREG.", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "2", "Informe de bienes muebles, inmuebles y de bajo costo.", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "3", "Levantamiento fisico del inventario", "Informe", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "4", "Conciliación fisico contable de bienes muebles, inmuebles y de bajo costo.", "Conciliación", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "5", "Informe de depresiación.", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "6", "Creación y actualización de expedientes.", "Bitacora", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "7", "Actualización de plataforma CREG.", "Registro", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "8", "Integración de la cuenta pública.", "Informe", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "B02", "214", "01", "05", "02", "06", "03", "01", "9", "Seguimiento a procesos de baja para bienes muebles, inmuebles y de bajo costo.", "Informe", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "1", "Supervisar el sistema integral del personal instaurado, así como el pago de las remuneraciones quincenales y de las prestaciones laborales al personal", "Reporte", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "2", "Supervisar movimientos de altas y bajas.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "3", "Supervisar y coordinar todas las compras internas y externas de Organismo", "Listados", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "4", "Supervisar todos los servicios solicitados internos o externos del Organismo", "Listados", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "5", "Coordinar el Comité de Adquisiciones y Servicios", "Acta de sesiones", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "6", "Supervisar los movimientos de Control Patrimonial", "Reporte de movimient", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "7", "Supervisar coordinar y ejecutar el levantamiento físico del almacén general", "Acta del levantamien", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "8", "Coordinar Inventario de Bienes Muebles e Inmuebles", "Reporte semestral", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B02", "B02", "01", "05", "02", "06", "03", "01", "9", "Coordinar el Comité de Arrendamiento, Adquisiciones de inmuebles y enajenaciones", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B03", "202", "01", "05", "02", "02", "01", "01", "1", "Incorporación de tomas de padrón y regularización de tomas clandestinas", "Reporte de altas", "774.00", "130.00", "16.80", "164.00", "21.19", "238.00", "30.75", "242.00", "31.27"),
    array("0", "100", "B03", "202", "01", "05", "02", "02", "01", "01", "2", "Elaboración del análisis gráfico de la evaluación de los servicios", "Reporte de encuestas", "774.00", "130.00", "16.80", "164.00", "21.19", "238.00", "30.75", "242.00", "31.27"),
    array("0", "100", "B03", "202", "01", "05", "02", "02", "01", "01", "3", "Realizar visitas de campo para comprobar la distancia de redes para proporcionar el servicio de agua a nuevos usuarios y actualizar el padrón mediante", "Reporte de verificac", "5,531.00", "1,665.00", "30.10", "1,186.00", "21.44", "1,625.00", "29.38", "1,055.00", "19.07"),
    array("0", "100", "B03", "202", "01", "05", "02", "02", "01", "01", "4", "Expedición de constancias no adeudo", "Constancias", "1,724.00", "419.00", "24.30", "509.00", "29.52", "436.00", "25.29", "360.00", "20.88"),
    array("0", "100", "B03", "202", "01", "05", "02", "02", "01", "01", "5", "Implementación de estímulo físcal a grupos vulnerables", "Estímulos", "2.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B03", "202", "01", "05", "02", "02", "01", "01", "6", "Registro y actualización de usuarios en el padrón", "Padrón", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B03", "202", "01", "05", "02", "02", "01", "01", "7", "Coordinación en la integración de políticas fiscales", "Documento", "2.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "1", "Entrega de cartas de invitación", "Cartas invitación", "24,926.00", "5,126.00", "20.56", "3,600.00", "14.44", "7,200.00", "28.89", "9,000.00", "36.11"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "2", "Entrega de notificaciones de adeudo", "Notificaciones", "1,200.00", "120.00", "10.00", "120.00", "10.00", "480.00", "40.00", "480.00", "40.00"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "3", "Elaboracón de convenio de pago en parcialidades", "Convenio", "20.00", "4.00", "20.00", "6.00", "30.00", "6.00", "30.00", "4.00", "20.00"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "4", "Ejecución de restricciones", "Restricciones", "70.00", "10.00", "14.29", "24.00", "34.29", "24.00", "34.29", "12.00", "17.14"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "5", "Supervición de actividades en campo", "Supervición", "36.00", "9.00", "25.00", "9.00", "25.00", "9.00", "25.00", "9.00", "25.00"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "6", "Orden de reconexión de tomas", "Ordenes", "60.00", "10.00", "16.67", "19.00", "31.67", "19.00", "31.67", "12.00", "20.00"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "7", "Levantamiento de ordenes de trabajo y/o cédulas de información de campo para geolocalización", "Ordenes", "300.00", "85.00", "28.33", "85.00", "28.33", "80.00", "26.67", "50.00", "16.67"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "8", "Levantamiento de infracciones y en su caso, entrega de resoluciones administrativas", "Infracciones", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "B03", "208", "01", "05", "02", "02", "01", "01", "9", "Informes de recaudación de ingresos por concepto de pago", "Informes", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "216", "01", "05", "02", "02", "01", "01", "1", "Emitir campañas para la difusión masiva de los apoyos, subsidios fiscales y exhortación al pago puntual", "Campaña", "4.00", "3.00", "75.00", "0.00", "0.00", "0.00", "0.00", "1.00", "25.00"),
    array("0", "100", "B03", "216", "01", "05", "02", "02", "01", "01", "2", "Supervición de actividades de seguimiento a actualización del padrón de usuarios, servicio medido y estatus de rezago", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "216", "01", "05", "02", "02", "01", "01", "3", "Integrar las Políticas Físcales para la recaudación", "Documento", "2.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "B03", "223", "02", "02", "03", "01", "02", "03", "1", "Entrega de avisos de pago de agua", "Informe", "81,216.00", "13,536.00", "16.67", "27,072.00", "33.33", "13,536.00", "16.67", "27,072.00", "33.33"),
    array("0", "100", "B03", "223", "02", "02", "03", "01", "02", "03", "2", "Toma de lecturas a medidores de agua", "Reporte", "108,528.00", "36,176.00", "33.33", "18,088.00", "16.67", "36,176.00", "33.33", "18,088.00", "16.67"),
    array("0", "100", "B03", "223", "02", "02", "03", "01", "02", "03", "3", "Instalar físicamente los aparatos medidores de agua", "Reporte de solicitud", "456.00", "114.00", "25.00", "114.00", "25.00", "114.00", "25.00", "114.00", "25.00"),
    array("0", "100", "B03", "223", "02", "02", "03", "01", "02", "03", "4", "Seguimiento a solicitudes de mantenimiento de medidores de agua", "Reporte de solicitud", "5,379.00", "1,350.00", "25.10", "1,329.00", "24.71", "1,350.00", "25.10", "1,350.00", "25.10"),
    array("0", "100", "B03", "223", "02", "02", "03", "01", "02", "03", "5", "Recopilación de encuestas de satisfacción", "Reporte de encuesta", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "1", "Publicar información del OPDAPAS en redes sociales", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "2", "Diseños con información sobre el cuidado del agua.", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "3", "Realizar reforestación en escuelas y comunidades del municipio", "Campaña", "4.00", "0.00", "0.00", "1.00", "25.00", "3.00", "75.00", "0.00", "0.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "4", "Distribuir folletos y/o trípticos de cultura del agua y captación de agua pluvial", "Informe de distribuc", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "5", "Participar y/o realizar concursos, eventos, foros, congresos y cursos relacionados con la cultura del agua y captación de agua pluvialincluyendo dia", "Evento/Constancia", "8.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "6", "Realizar platicas escolares y comunitarias sobre el cuidado del agua y captación de agua pluvial", "Plática", "64.00", "21.00", "32.81", "21.00", "32.81", "6.00", "9.38", "16.00", "25.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "7", "Realizar pláticas para lavado y desinfección de tinacos y cisternas en escuelas y comunidades.", "Plática", "72.00", "21.00", "29.17", "21.00", "29.17", "14.00", "19.44", "16.00", "22.22"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "8", "Realizar la semana de actividades de Verano por el Agua", "Bitácora", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "9", "Planeación de Semana de Actividades de Verano por el Agua.", "Informe", "2.00", "0.00", "0.00", "1.00", "50.00", "1.00", "50.00", "0.00", "0.00"),
    array("0", "100", "B03", "234", "02", "02", "03", "01", "02", "04", "10", "Informe de actividades relacionadas con el cuidado del Agua del ECA Metepec, a CONAGUA y CAEM", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "B03", "01", "05", "02", "02", "01", "01", "1", "Supervición y dirigir la ejecución de las acciones tendientes a fortalecer la recaudación por los derechos de suministro de agua potable y drenaje", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "B03", "01", "05", "02", "02", "01", "01", "2", "Supervisar y coordinar las acciones relacionadas con la Subdirección de Comercialización y la Subdirección de Cultura del Agua", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "B03", "B03", "01", "05", "02", "02", "01", "01", "3", "Supevisar e integrar las políticas físcales", "Informe", "2.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "C00", "218", "02", "02", "01", "01", "05", "02", "1", "Supervisar, ejecutar y dar seguimiento a físico-financiero a las obras por administración, con apego a la Ley.", "Supervisión", "2.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "2.00", "100.00"),
    array("0", "100", "C00", "218", "02", "02", "01", "01", "05", "02", "2", "Gestionar, supervisar y dar seguimiento a las obras por convenio de factibilidad, con apego a la Ley.", "Solicitud de usuario", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "C00", "218", "02", "02", "01", "01", "05", "02", "3", "Gestionar, supervisar, ejecutar y dar seguimiento a las obras por convenio de participación con apego a la Ley.", "Solicitud de usuario", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "C00", "C00", "02", "02", "03", "01", "02", "05", "1", "Convocar a sesiones de comité de Obra que garanticen la aplicación del presupuesto de acuerdo a la legislación vigente", "Acta de sesión", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C00", "C00", "02", "02", "03", "01", "02", "05", "2", "Supervisar el avance Fisico-Financiero del Programa Anual de Obra.", "Informe de avance", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "C00", "C00", "02", "02", "03", "01", "02", "05", "3", "Integración del Programa Anual de ObraReparación y Mantenimiento", "Programa Anual", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C00", "C01", "02", "01", "03", "01", "01", "01", "1", "Coordinar, verificar y dar seguimiento a las actividades relacionadas con ejecución de la obra pública", "Informe de obra", "4.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "4.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "01", "03", "01", "01", "01", "2", "Supervisar la ejecución de la obra y de los servicios relacionados con las mismas por contrato, con apego a la Ley.", "Informe de obra", "4.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "4.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "01", "03", "01", "01", "01", "3", "Supervisa las obras por administración, convenio de participación y convenio de factibilidad", "Informe de obra", "2.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "2.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "02", "01", "01", "05", "02", "1", "Coordinar, verificar y dar seguimiento a las actividades relacionadas con ejecución de la obra pública", "Informe de obra", "9.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "9.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "02", "01", "01", "05", "02", "2", "Supervisar la ejecución de la obra y de los servicios relacionados con las mismas por contrato, con apego a la Ley.", "Informe de obra", "9.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "9.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "02", "01", "01", "05", "02", "3", "Supervisa las obras por administración, convenio de participación y convenio de factibilidad", "Informe de obra", "2.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "2.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "02", "03", "01", "02", "01", "1", "Coordinar, verificar y dar seguimiento a las actividades relacionadas con ejecución de la obra pública", "Informe de obra", "5.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "5.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "02", "03", "01", "02", "01", "2", "Supervisar la ejecución de la obra y de los servicios relacionados con las mismas por contrato, con apego a la Ley.", "Informe de obra", "5.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "5.00", "100.00"),
    array("0", "100", "C00", "C01", "02", "02", "03", "01", "02", "01", "3", "Supervisa las obras por administración, convenio de participación y convenio de factibilidad", "Informe de obra", "2.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "2.00", "100.00"),
    array("0", "100", "C01", "218", "02", "02", "01", "01", "05", "03", "1", "Supervisar la ejecución de las obras y los servicios relacionados con las mismas por contrato, con apego a la Ley.", "Supervisión", "9.00", "1.00", "11.11", "2.00", "22.22", "3.00", "33.33", "3.00", "33.33"),
    array("0", "100", "C01", "218", "02", "02", "01", "01", "05", "03", "2", "Llevar un control físico- financiero trimestral de las obras por contrato", "Informe", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "C01", "218", "02", "02", "01", "01", "05", "03", "3", "Cumplir con la bitácora de obra actualizada durante el proceso de cada obra", "Bitácora", "9.00", "1.00", "11.11", "2.00", "22.22", "3.00", "33.33", "3.00", "33.33"),
    array("0", "100", "C01", "220", "02", "02", "01", "01", "05", "02", "1", "Ejecutar las licitaciones conforme al programa e integrar sus expedientes con la documentación del procedimiento de adjudicación, con apego a la Ley.", "Acta de fallo", "9.00", "1.00", "11.11", "2.00", "22.22", "3.00", "33.33", "3.00", "33.33"),
    array("0", "100", "C01", "220", "02", "02", "01", "01", "05", "02", "2", "Llevar un control del procedimiento de adjudicación de licitaciones", "Licitación", "9.00", "1.00", "11.11", "2.00", "22.22", "3.00", "33.33", "3.00", "33.33"),
    array("0", "100", "C01", "220", "02", "02", "01", "01", "05", "02", "3", "Elaborar presupuestos base para las obras por administración, convenio y/o servicios relacionados con la obra pública", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C01", "220", "02", "02", "01", "01", "05", "02", "4", "Revisar y conciliar los precios unitarios de contratos de Obra Publica", "Reporte", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "C01", "220", "02", "02", "01", "01", "05", "02", "5", "Elaborar el catálogo general de Precios Unitarios", "Catálogo", "2.00", "1.00", "50.00", "0.00", "0.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "C03", "219", "02", "02", "03", "01", "02", "03", "1", "Reparación de fugas de agua potable", "Fugas reparadas", "2,600.00", "620.00", "23.85", "660.00", "25.38", "690.00", "26.54", "630.00", "24.23"),
    array("0", "100", "C03", "219", "02", "02", "03", "01", "02", "03", "2", "Viajes de agua en pipa", "Solicitud", "2,400.00", "600.00", "25.00", "600.00", "25.00", "600.00", "25.00", "600.00", "25.00"),
    array("0", "100", "C03", "219", "02", "02", "03", "01", "02", "03", "3", "Mantenimiento y/o cambio de caja de válvulas", "Mantenimiento", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C03", "219", "02", "02", "03", "01", "02", "03", "4", "Liberación de tomas de agua potable obstruidas", "Solicitud", "120.00", "30.00", "25.00", "30.00", "25.00", "30.00", "25.00", "30.00", "25.00"),
    array("0", "100", "C03", "219", "02", "02", "03", "01", "02", "03", "5", "Reparación de banquetas por fuga", "Reporte ciudadano", "100.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "C03", "219", "02", "02", "03", "01", "02", "03", "6", "Reposición de mezcla asfáltica", "Reporte ciudadano", "100.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00", "25.00"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "1", "Limpieza de rejillas pluviales y bocas de tormenta", "Reporte de solicitud", "1,062.00", "403.00", "37.95", "236.00", "22.22", "188.00", "17.70", "235.00", "22.13"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "2", "Desazolve de redes de drenajem²", "Metros lineales", "101,538.00", "21,007.00", "20.69", "21,400.00", "21.08", "29,261.00", "28.82", "29,870.00", "29.42"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "3", "Colocación de brocales de polietileno y tapas de registro", "Reporte de solicitud", "97.00", "18.00", "18.56", "26.00", "26.80", "24.00", "24.74", "29.00", "29.90"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "4", "Limpieza de pozos de visita", "Reporte de solicitud", "1,682.00", "571.00", "33.95", "354.00", "21.05", "416.00", "24.73", "341.00", "20.27"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "5", "Programa de limpieza de caudales y canales a cielo abiertom²", "Metros lineales", "15,000.00", "3,000.00", "20.00", "5,000.00", "33.33", "3,900.00", "26.00", "3,100.00", "20.67"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "6", "Retiro de material producto de desazolve a canales a cielo abierto", "Reporte de solicitud", "84.00", "23.00", "27.38", "18.00", "21.43", "26.00", "30.95", "17.00", "20.24"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "7", "Limpieza de descargas domiciliarias tapadas", "Reporte de solicitud", "122.00", "50.00", "40.98", "25.00", "20.49", "23.00", "18.85", "24.00", "19.67"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "8", "Reposición de rejillas y bocas de tormenta", "Reporte de solicitud", "80.00", "18.00", "22.50", "21.00", "26.25", "21.00", "26.25", "20.00", "25.00"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "9", "Instalación de tomas de agua y descargas domiciliarias", "Reporte de servicio", "84.00", "35.00", "41.67", "16.00", "19.05", "16.00", "19.05", "17.00", "20.24"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "10", "Limpieza de fosas sépticas", "Reporte de servicio", "92.00", "27.00", "29.35", "24.00", "26.09", "19.00", "20.65", "22.00", "23.91"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "11", "Implementación del grupo tlanchana, para épocas de lluvia", "Informe", "10.00", "1.00", "10.00", "3.00", "30.00", "3.00", "30.00", "3.00", "30.00"),
    array("0", "100", "C03", "222", "02", "01", "03", "01", "01", "02", "12", "Implementación del programa nocturno de desazolve", "Reporte", "5.00", "2.00", "40.00", "3.00", "60.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "C03", "227", "02", "02", "03", "01", "02", "05", "1", "Ejecutar el programa de mantenimiento mayor a las fuentes de abastecimiento.", "IMROM", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "C03", "227", "02", "02", "03", "01", "02", "05", "2", "Ejecutar el programa de mantenimiento menor a las fuentes de abastecimiento.", "Reporte de Mantenimi", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C03", "227", "02", "02", "03", "01", "02", "05", "3", "Realizar la macro medición de los volúmenes extraídos de las fuentes de abastecimiento.", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C03", "227", "02", "02", "03", "01", "02", "05", "4", "Realizar los análisis microbiológicos, determinación de cloro residual, pH y fisicoquímicos", "Analisis realizados", "6,600.00", "1,650.00", "25.00", "1,650.00", "25.00", "1,650.00", "25.00", "1,650.00", "25.00"),
    array("0", "100", "C03", "227", "02", "02", "03", "01", "02", "05", "5", "Supervisión de la cloración de agua y comportamiento de las fuentes de abastecimiento", "Informe de supervici", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C03", "227", "02", "02", "03", "01", "02", "05", "6", "Reporte Mensual de energía eléctrica de los pozos.", "Reporte de consumo", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C03", "227", "02", "02", "03", "01", "02", "05", "7", "Reporte y supervisión de planta tratadora", "Reporte de operación", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "100", "C03", "C03", "02", "02", "03", "01", "02", "05", "1", "Coordinar y supervisar los mantenimientos de infraestructura hidráulica", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C03", "C03", "02", "02", "03", "01", "02", "05", "2", "Coordinar las líneas de conducción y distribución de Agua Potable", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "C03", "C03", "02", "02", "03", "01", "02", "05", "3", "Coordinar las líneas de conducción y distribución de Drenaje y Alcantarillado", "Informe", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "1", "Elaboración de instrumentos jurídicos relacionados con los derechos, funciones y obligaciones del Organismo", "Contrato/Convenios y", "15.00", "5.00", "33.33", "3.00", "20.00", "3.00", "20.00", "4.00", "26.67"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "2", "Representar al Organismo ante cualquier autoridad de carácter Federal, Estatal o Municipal, personas físicas o jurídicas colectivas.", "Juicios, demandas, c", "25.00", "7.00", "28.00", "6.00", "24.00", "6.00", "24.00", "6.00", "24.00"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "3", "Asesorías de carácter jurídico a las diferentes áreas del Organismo", "Asesorías", "65.00", "15.00", "23.08", "17.00", "26.15", "17.00", "26.15", "16.00", "24.62"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "4", "Revisar la base legal que regula el funcionamiento del Organismo, por conducto de la Comisión Revisora de la Reglamentación", "Ordenamiento", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "5", "Procedimientos administrativos comunes sancionatoriosSe imponen multas e infracciones a la Ley del Agua", "Resoluciones", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "6", "Regularización de inmuebles para la incorporación al Organismo", "Escrituras Públicas", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "7", "Programa para la coordinación institucional para la igualdad de género", "Reporte de actividad", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "D00", "228", "01", "03", "05", "01", "01", "05", "8", "Programa de cultura de igualdad y prevención de la violencia de género", "Reporte de actividad", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "224", "01", "05", "02", "03", "01", "04", "1", "Emitir las factibilidades de servicios de agua potable, alcantarillado y saneamiento en apego a las disposiciones oficiales.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "224", "01", "05", "02", "03", "01", "04", "2", "Revisar los proyectos hidraulico-sanitarios y pluviales para que cumplan con la normatividad vigente.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "224", "01", "05", "02", "03", "01", "04", "3", "Otorgar información clara y oportuna sobre el trámite de factibilidad.", "Lista de registro", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "224", "01", "05", "02", "03", "01", "04", "4", "Revisar con apego a la normatividad las solicitudes de los usuarios para otorgar el dictamen de factibilidad.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "224", "01", "05", "02", "03", "01", "04", "5", "Efectuar las visitas de inspección para verificar la infraestructura hidráulica en las nuevas incorporaciones y desarrollos.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "230", "01", "05", "02", "03", "01", "04", "1", "Atender las demandas de la población para proporcionar los servicios de agua potable, drenaje sanitario, drenaje pluvial y tratamiento de aguas residu", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "230", "01", "05", "02", "03", "01", "04", "2", "Integración y seguimiento al programa anual de acciones y modificaciones", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "230", "01", "05", "02", "03", "01", "04", "3", "Elaborar convenios para la ampliación de infraestructura hidráulico-sanitaria en el Municipio", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "230", "01", "05", "02", "03", "01", "04", "4", "Gestión de recursos de los Programas Federales", "Informe", "4.00", "2.00", "50.00", "1.00", "25.00", "0.00", "0.00", "1.00", "25.00"),
    array("0", "100", "E01", "230", "01", "05", "02", "03", "01", "04", "5", "Dar seguimiento a la ejecución del Plan Hidráulico de Metepec", "Reporte", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "E01", "230", "01", "05", "02", "03", "01", "04", "6", "Elaborar el análisis estadístico y grafico del consumo de energía eléctrica de las fuentes de abastecimiento y oficinas administrativas del OPDAPAS de", "Reporte", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "E01", "230", "01", "05", "02", "03", "01", "04", "7", "Elaborar el análisis estadístico y gráfico y darle seguimiento al volumen Concesionado de las Fuentes de Abastecimiento del OPDAPAS del Municipio de M", "Reporte", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "E01", "233", "01", "05", "02", "03", "01", "04", "1", "Realizar proyectos ejecutivos de Agua Potable", "Proyecto", "7.00", "1.00", "14.29", "2.00", "28.57", "2.00", "28.57", "2.00", "28.57"),
    array("0", "100", "E01", "233", "01", "05", "02", "03", "01", "04", "2", "Realizar proyectos ejecutivos de Drenaje Sanitario y Drenaje Pluvial", "Proyecto", "7.00", "1.00", "14.29", "2.00", "28.57", "2.00", "28.57", "2.00", "28.57"),
    array("0", "100", "E01", "233", "01", "05", "02", "03", "01", "04", "3", "Levantamientos Topograficos", "Levantamiento", "7.00", "1.00", "14.29", "2.00", "28.57", "2.00", "28.57", "2.00", "28.57"),
    array("0", "100", "E01", "233", "01", "05", "02", "03", "01", "04", "4", "Seguimiento a la integracion del Balance Hidraulico Municipal", "Reporte de avance", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "100", "E01", "E01", "01", "05", "02", "03", "01", "04", "1", "Supervisar los Proyectos de infraestructura Social Municipal elaborados.", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "100", "E01", "E01", "01", "05", "02", "03", "01", "04", "2", "Seguimiento a la integración del Balance Hidraulico Municipal.", "Reporte", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "1", "Elaboración de Plan Anual de Auditorias.", "Plan anual de Audito", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "2", "Auditorias.", "Informe de Auditoria", "4.00", "2.00", "50.00", "2.00", "50.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "3", "Observaciones derivadas de auditorías.", "Informe de Auditoria", "4.00", "0.00", "0.00", "0.00", "0.00", "2.00", "50.00", "2.00", "50.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "4", "Capacitación de Personal de Órgano Interno de Control.", "Convocatorias", "8.00", "3.00", "37.50", "1.00", "12.50", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "5", "Servidores Públicos asistentes a las capacitaciones.", "Lista de asistencia", "8.00", "3.00", "37.50", "1.00", "12.50", "2.00", "25.00", "2.00", "25.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "6", "Campañas de información de las obligaciones de los servidores públicos.", "Programas de difusió", "4.00", "1.00", "25.00", "2.00", "50.00", "1.00", "25.00", "0.00", "0.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "7", "Carteles informativos.", "Registros de cartele", "4.00", "1.00", "25.00", "2.00", "50.00", "1.00", "25.00", "0.00", "0.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "8", "Ejecutar inspecciones, pases de lista, arqueos de caja, fuentes de abastecimiento, brigadas, obra pública, buzones,CREG, entre otros.", "Reporte", "224.00", "58.00", "25.89", "60.00", "26.79", "60.00", "26.79", "46.00", "20.54"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "9", "Participación en Testificaciones.", "Actas", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "10", "Instaurar Procedimientos de Responsabilidad Administrativa.", "Acuerdos", "23.00", "6.00", "26.09", "7.00", "30.43", "5.00", "21.74", "5.00", "21.74"),
    array("0", "100", "G00", "G00", "01", "03", "04", "01", "01", "01", "11", "Resolución de Procedimientos de Responsabilidad Administrativas.", "Determinación", "23.00", "6.00", "26.09", "7.00", "30.43", "5.00", "21.74", "5.00", "21.74")

);


$imcufidem = array(
    array("0", "60", "A00", "401", "02", "04", "01", "01", "01", "01", "1", "Celebrar Convenios y Contratos en diversas materias", "Convenio", "28.00", "25.00", "89.29", "0.00", "0.00", "3.00", "10.71", "0.00", "0.00"),
    array("0", "10", "A00", "401", "02", "04", "01", "01", "01", "01", "2", "Entregar material y artículos deportivos", "Apoyo", "20.00", "8.00", "40.00", "0.00", "0.00", "6.00", "30.00", "6.00", "30.00"),
    array("0", "40", "A00", "401", "02", "04", "01", "01", "01", "01", "3", "Gestionar recursos para fomentar actividades físicas", "Gestión", "13.00", "9.00", "69.23", "0.00", "0.00", "2.00", "15.38", "2.00", "15.38"),
    array("0", "60", "A00", "401", "02", "04", "01", "01", "01", "01", "4", "Cubrir eventos deportivos", "Eventos", "36.00", "10.00", "27.78", "8.00", "22.22", "10.00", "27.78", "8.00", "22.22"),
    array("0", "75", "A00", "401", "02", "04", "01", "01", "01", "01", "5", "Realizar la toma de fotografías en eventos deportivos", "Fotografias", "480.00", "120.00", "25.00", "120.00", "25.00", "120.00", "25.00", "120.00", "25.00"),
    array("0", "75", "A00", "401", "02", "04", "01", "01", "01", "01", "6", "Crear contenidos digitales en redes sociales del deporte", "Publicaciones", "190.00", "45.00", "23.68", "45.00", "23.68", "50.00", "26.32", "50.00", "26.32"),
    array("0", "60", "A00", "401", "02", "04", "01", "01", "01", "01", "7", "Redactar boletines informativos en materia deportiva", "Boletines", "18.00", "6.00", "33.33", "0.00", "0.00", "6.00", "33.33", "6.00", "33.33"),
    array("0", "60", "A00", "401", "02", "04", "01", "01", "01", "01", "8", "Realizar conferencias de prensa para eventos deportivos", "Conferencias", "12.00", "4.00", "33.33", "0.00", "0.00", "4.00", "33.33", "4.00", "33.33"),
    array("0", "90", "A00", "401", "02", "04", "01", "01", "01", "01", "9", "Hacer diseños para publicación de redes sociales de eventos deportivos", "Diseños", "70.00", "20.00", "28.57", "10.00", "14.29", "20.00", "28.57", "20.00", "28.57"),
    array("0", "90", "A00", "401", "02", "04", "01", "01", "01", "01", "10", "Elaborar diseños para impresiones de eventos deportivos", "Diseños", "90.00", "25.00", "27.78", "15.00", "16.67", "25.00", "27.78", "25.00", "27.78"),
    array("0", "80", "A00", "401", "02", "04", "01", "01", "01", "01", "11", "Realizar el programa operativo anual del IMCUFIDEM", "Programa", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "40", "A00", "401", "02", "04", "01", "01", "01", "01", "12", "Realizar las evaluaciones trimestrales de las áreas del IMCUFIDEM", "Evaluaciones", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "70", "A00", "401", "02", "04", "01", "01", "01", "01", "13", "Realizar el autodiagnóstico de la Guía de Desempeño para el Desarrollo Municipal en el rubro deportivo", "Autodiagnóstico", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "90", "A00", "401", "02", "04", "01", "01", "01", "01", "14", "Actualizar la información del sistema Ipomex del IMCUFIDEM", "Actualizaciones", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "40", "A00", "401", "02", "04", "01", "01", "01", "01", "15", "Atender solicitudes de información del IMCUFIDEM a través de SAIMEX", "Solicitudes", "16.00", "4.00", "25.00", "4.00", "25.00", "4.00", "25.00", "4.00", "25.00"),
    array("0", "80", "A00", "401", "02", "04", "01", "01", "01", "01", "16", "Integrar el Programa Anual de Evaluación PAE del IMCUFIDEM", "Programa", "1.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "60", "A00", "401", "02", "06", "08", "05", "01", "02", "1", "Implementar el programa Ponte Fitness con perspectiva de género", "Beneficiarios", "38,000.00", "9,278.00", "24.42", "9,890.00", "26.03", "9,890.00", "26.03", "8,942.00", "23.53"),
    array("0", "72", "A00", "401", "02", "06", "08", "05", "01", "02", "2", "Realizar sesiones de defensa personal para mujeres", "Evento", "36.00", "3.00", "8.33", "12.00", "33.33", "11.00", "30.56", "10.00", "27.78"),
    array("0", "5", "B00", "402", "01", "05", "02", "06", "01", "01", "1", "Hacer la verificación de los servidores publicos inscritos en el instituto", "Verificación", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "5", "B00", "402", "01", "05", "02", "06", "01", "01", "2", "Supervisar la asistencia y puntualidad de servidores públicos del instituto", "Supervisión", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "5", "B00", "402", "01", "05", "02", "06", "01", "01", "3", "Realizar la actualización de informacion de movimientos de altas y bajas de los servidores públicos", "Actualización", "24.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00", "6.00", "25.00"),
    array("0", "60", "B00", "402", "01", "05", "02", "06", "01", "01", "4", "Implementar acciones de Mejora Regulatoria", "Acciones", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "60", "B00", "402", "01", "05", "02", "06", "01", "01", "5", "Integrar y/o actualizar del Catálogo de Trámites y Servicios", "Actualización", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "60", "B00", "402", "01", "05", "02", "06", "01", "01", "6", "Integrar propuestas al marco regulatorio municipal", "Propuestas", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "60", "B00", "402", "01", "05", "02", "06", "01", "01", "7", "Elaborar el programa Anual de Mejora Regulatoria", "Documento", "1.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00"),
    array("0", "60", "B00", "402", "01", "05", "02", "06", "01", "01", "8", "Realizar Sesiones de la Comisión Municipal de Mejora Regulatoria", "Sesiones", "5.00", "1.00", "20.00", "1.00", "20.00", "1.00", "20.00", "2.00", "40.00"),
    array("0", "5", "B00", "402", "01", "05", "02", "06", "02", "01", "1", "Realizar sessiones del comité de adquisiciones y servicios", "Sesión", "6.00", "2.00", "33.33", "1.00", "16.67", "1.00", "16.67", "2.00", "33.33"),
    array("0", "5", "B00", "402", "01", "05", "02", "06", "02", "01", "2", "Actualizar el padrón de proveedores", "Actualización", "4.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00", "1.00", "25.00"),
    array("0", "5", "B00", "402", "01", "05", "02", "06", "02", "01", "3", "Ejecutar el Programa Anual de Adquisiciones", "Programa", "1.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "5", "B00", "402", "01", "05", "02", "06", "02", "01", "4", "Elaborar reportes de vales de salida de bienes y servicios", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "40", "B00", "402", "01", "05", "02", "06", "03", "01", "1", "Actualizar el inventario de los bienes del instituto sistema CREG PATRIMONIAL", "Actualización", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "40", "B00", "402", "01", "05", "02", "06", "03", "01", "2", "Realizar la conciliación físico contable de los bienes muebles e inmuebles del instituto", "Conciliación", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "40", "B00", "402", "01", "05", "02", "06", "03", "01", "3", "Efectuar el levantamiento físico de bienes muebles e inmuebles", "Levantamiento", "2.00", "0.00", "0.00", "1.00", "50.00", "0.00", "0.00", "1.00", "50.00"),
    array("0", "80", "B00", "402", "02", "04", "01", "01", "01", "01", "1", "Mantener, remodelar y rehabilitar los espacios deportivos", "Reporte", "12.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00", "3.00", "25.00"),
    array("0", "60", "C00", "403", "02", "04", "01", "01", "01", "01", "1", "Realizar eventos masivos de activación física", "Evento", "4.00", "2.00", "50.00", "1.00", "25.00", "1.00", "25.00", "0.00", "0.00"),
    array("0", "30", "C00", "403", "02", "04", "01", "01", "01", "01", "2", "Préstamo o renta de instalaciones deportivas municipales para la promoción de la cultura física", "Préstamo", "46.00", "12.00", "26.09", "12.00", "26.09", "12.00", "26.09", "10.00", "21.74"),
    array("0", "10", "C00", "403", "02", "04", "01", "01", "01", "01", "3", "Oganizar eventos deportivos para la administración municipal", "Evento", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "40", "C00", "403", "02", "04", "01", "01", "01", "01", "4", "Realizar orientaciones para el fomento de la cultura física", "Actividad", "16.00", "4.00", "25.00", "4.00", "25.00", "4.00", "25.00", "4.00", "25.00"),
    array("0", "60", "C00", "404", "02", "04", "01", "01", "01", "02", "1", "Realizar torneos y/o carreras atléticas delegaciones para niños, niñas y jóvenes", "Actividad", "7.00", "1.00", "14.29", "2.00", "28.57", "3.00", "42.86", "1.00", "14.29"),
    array("0", "45", "C00", "404", "02", "04", "01", "01", "01", "02", "2", "Organizar, apoyar y/o asesorar la realización de eventos deportivos", "Evento", "15.00", "4.00", "26.67", "2.00", "13.33", "5.00", "33.33", "4.00", "26.67"),
    array("0", "30", "C00", "404", "02", "04", "01", "01", "01", "02", "3", "Organizar torneos relámpagos de futbol 3x3", "Torneo", "3.00", "0.00", "0.00", "1.00", "33.33", "1.00", "33.33", "1.00", "33.33"),
    array("0", "25", "C00", "404", "02", "04", "01", "01", "01", "02", "4", "Realizar una rodada ciclista", "Evento", "1.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00", "0.00", "0.00"),
    array("0", "30", "C00", "404", "02", "04", "01", "01", "01", "02", "5", "Organizar eventos del programa Deporte en tu Colonia", "Evento", "14.00", "3.00", "21.43", "4.00", "28.57", "4.00", "28.57", "3.00", "21.43"),
    array("0", "25", "C00", "404", "02", "04", "01", "01", "01", "02", "6", "Realizar carreras atléticas delegacionales para adultos", "Actividad", "3.00", "0.00", "0.00", "2.00", "66.67", "1.00", "33.33", "0.00", "0.00"),
    array("0", "30", "C00", "404", "02", "04", "01", "01", "01", "02", "7", "Registrar a deportistas en el Registro Municipal del Deporte", "Registro", "3,650.00", "2,500.00", "68.49", "500.00", "13.70", "400.00", "10.96", "250.00", "6.85"),
    array("0", "25", "C00", "405", "02", "04", "01", "01", "02", "01", "1", "Crear y consolidar Centros de Iniciación, Formación y Desarrollo Deportivo", "Centro", "17.00", "5.00", "29.41", "4.00", "23.53", "4.00", "23.53", "4.00", "23.53"),
    array("0", "65", "C00", "405", "02", "04", "01", "01", "02", "01", "2", "Organizar eventos deportivos, formativos y competitivos para personas con discapacidad", "Evento", "3.00", "2.00", "66.67", "0.00", "0.00", "0.00", "0.00", "1.00", "33.33"),
    array("0", "60", "C00", "405", "02", "04", "01", "01", "02", "01", "3", "Organizar eventos deportivos, formativos y competitivos", "Evento", "10.00", "6.00", "60.00", "1.00", "10.00", "1.00", "10.00", "2.00", "20.00"),
    array("0", "5", "C00", "405", "02", "04", "01", "01", "02", "01", "4", "Realizar capacitaciones y certificaciones a entrenadores deportivos", "Capacitaciones", "4.00", "0.00", "0.00", "1.00", "25.00", "2.00", "50.00", "1.00", "25.00"),
    array("0", "55", "C00", "405", "02", "04", "01", "01", "02", "01", "5", "Realizar curso de verano", "Evento", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "60", "C00", "405", "02", "04", "01", "01", "02", "01", "6", "Realizar Talleres Deportivos", "Talleres", "4.00", "1.00", "25.00", "2.00", "50.00", "1.00", "25.00", "0.00", "0.00"),
    array("0", "10", "C00", "405", "02", "04", "01", "01", "02", "01", "7", "Capacitar y actualizar entrenadores deportivos, personal técnico en materia deportiva y deporte adaptado", "Capacitaciones", "1.00", "0.00", "0.00", "0.00", "0.00", "1.00", "100.00", "0.00", "0.00"),
    array("0", "5", "C00", "405", "02", "04", "01", "01", "02", "01", "8", "Realizar entrenamientos deportivos de Para-Atletismo a personas con discapacidad", "Sesiones", "480.00", "120.00", "25.00", "120.00", "25.00", "120.00", "25.00", "120.00", "25.00"),
    array("0", "5", "C00", "405", "02", "04", "01", "01", "02", "01", "9", "Realizar entrenamientos deportivos de Para-Natación a personas con discapacidad", "Sesiones", "44.00", "11.00", "25.00", "11.00", "25.00", "11.00", "25.00", "11.00", "25.00"),
    array("0", "5", "C00", "405", "02", "04", "01", "01", "02", "01", "10", "Realizar entrenamientos deportivos de Para-Bádminton a personas con discapacidad", "Sesiones", "40.00", "10.00", "25.00", "10.00", "25.00", "10.00", "25.00", "10.00", "25.00"),
    array("0", "5", "C00", "405", "02", "04", "01", "01", "02", "01", "11", "Realizar entrenamientos deportivos a personas con discapacidad en la disciplina de Activación Física en los Centros de Inclusión y Desarrollo del Muni", "Sesiones", "92.00", "23.00", "25.00", "23.00", "25.00", "23.00", "25.00", "23.00", "25.00"),
    array("0", "5", "C00", "405", "02", "04", "01", "01", "02", "01", "12", "Asignar y entregar estímulos económicos a deportistas, entrenadores, activadores físicos, jueces, árbitros en el ámbito deportivo", "Beca", "168.00", "42.00", "25.00", "42.00", "25.00", "42.00", "25.00", "42.00", "25.00")
);



$vincDIF = array( // Son 32
    array("F00","313","020608010103","5","L10.1.2"),
    array("F00","301","020608030102","4","L10.3.2"),
    array("F00","301","020608030201","2","L10.3.3"),
    array("F00","301","020608030201","8","L10.3.4"),
    array("F00","314","020608020201","7","L12.1.1"),
    array("F00","314","020608020201","5","L12.1.2"),
    array("F00","314","020608020302","1","L12.3.1"),
    array("F00","314","020608020302","2","L12.3.2"),
    array("F00","314","020608020302","3","L12.3.2"),
    array("F00","314","020608020301","6","L12.3.3"),
    array("F00","314","020608020302","8","L12.4.1"),
    array("F00","313","020608010103","4","L13.1.1"),
    array("F00","313","020608010104","1","L13.1.2"),
    array("F00","313","020608010103","2","L13.2.1"),
    array("F00","313","020608010103","1","L13.2.2"),
    array("F00","301","020608030201","5","L14.5.1"),
    array("F00","311","020605010105","5","L17.1.3"),
    array("F00","311","020605010105","1","L2.1.3"),
    array("F00","311","020605010105","6","L2.1.5"),
    array("F00","311","020506030101","1","L2.2.1"),
    array("F00","311","020506030101","4","L2.2.2"),
    array("F00","311","020506030102","2","L2.3.1"),
    array("F00","311","020506030101","3","L2.4.2"),
    array("E00","310","020301010101","9","L3.1.1"),
    array("E00","310","020301010201","10","L3.1.3"),
    array("E00","310","020301010101","8","L3.2.1"),
    array("E00","310","020301010101","2","L3.2.3"),
    array("E00","310","020301010101","5","L3.2.4"),
    array("E00","310","020301010101","3","L3.2.5"),
    array("E00","310","020301010202","1","L3.3.2"),
    array("F00","314","020608020302","5","L4.1.1"),
    array("F00","309","020608050103","4","L5.2.1"),
);

$vincOPDAPAS = array( // Son 18
    array("C00","C01","020203010201","2","L38.1.1"),
    array("E01","230","010502030104","3","L38.1.2"),
    array("C03","227","020203010205","5","L38.2.1"),
    array("C00","C00","020203010205","3","L38.2.2"),
    array("C03","222","020103010102","11","L38.2.3"),
    array("C00","C01","020203010201","3","L38.3.1"),
    array("B03","234","020203010204","6","L39.1.1"),
    array("B03","234","020203010204","5","L39.1.2"),
    array("C03","222","020103010102","6","L39.1.3"),
    array("C03","222","020103010102","12","L39.1.4"),
    array("B03","234","020203010204","1","L39.2.1"),
    array("B03","234","020203010204","4","L39.2.2"),
    array("E01","230","010502030104","1","L40.1.2"),
    array("D00","228","010305010105","5","L40.1.3"),
    array("C00","C01","020201010502","1","L40.2.1"),
    array("C00","C00","020203010205","1","L41.1.1"),
    array("E01","224","010502030104","5","L41.1.3"),
    array("C03","222","020103010102","5","L41.2.3"),
);


$vincIMCUFIDEM =array( // Son 15
    array("C00","405","020401010201","2","L12.2.1"),
    array("C00","405","020401010201","1","L14.1.1"),
    array("C00","405","020401010201","11","L14.1.2"),
    array("C00","405","020401010201","4","L14.1.4"),
    array("B00","402","020401010101","1","L14.1.5"),
    array("C00","405","020401010201","12","L14.2.1"),
    array("A00","401","020401010101","3","L14.2.2"),
    array("C00","404","020401010102","5","L14.2.3"),
    array("C00","405","020401010201","7","L14.2.4"),
    array("A00","401","020401010101","1","L14.2.5"),
    array("C00","404","020401010102","7","L14.3.1"),
    array("A00","401","020401010101","12","L14.3.3"),
    array("C00","404","020401010102","1","L14.4.1"),
    array("C00","403","020401010101","1","L14.5.2"),
    array("C00","403","020401010101","4","L14.5.3"),
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
    print "Se muestran las claves dadas de alta en el SIMONTS <h1>DIF </h1><br>";
    foreach ($areas_dif as $ar) {
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
        $supgen = 0;
        $supaux = 0;
        $supproy = 0;

        foreach ($generales as $g1) {
            if ($ar['clave_dependencia'] == $g1['clave_dependencia']) {
                $supgen = $g1['id_dependencia'];
            }
        }
        foreach ($auxiliares as $a1) {
            if ($ar['clave_dependencia_auxiliar'] == $a1['clave_dependencia_auxiliar']) {
                $supaux = $a1['id_dependencia_auxiliar'];
            }
        }
        foreach ($proyectos as $p1) {
            if ($ar['codigo_proyecto'] == $p1['codigo_proyecto']) {
                $supproy = $p1['id_proyecto'];
            }
        }

        if ($supgen != 0 && $supaux != 0 && $supproy != 0) {
            print " ";
        } else {
            print "Hay claves en el TXT que no existen en el SIMONTS, revisar";
        }
    }


    print "<br><br><br>";


    // verifica si falta una del TXT en la base del simonts
    print 'verifica si falta una del TXT en la base del simonts<br>';
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


    // Recorremos el TXt y verificamos que el SIMONTS tenga todas las areas
    print 'Verifica si faltan del simonts en la del txt<br>';

    //Guardamos las areas en un array para evitar repetidos
    $uniqueKeys = [];
    $nareastxt = [];

    // Recorrer el array original
    foreach ($dif as $item) {
        // Crear una clave única a partir de los índices especificados
        $key = $item[2] . $item[3] . $item[4] . $item[5] . $item[6] . $item[7] . $item[8] . $item[9];

        // Si la clave no está en el array asociativo, añadir el elemento al array único
        if (!isset($uniqueKeys[$key])) {
            $uniqueKeys[$key] = true;
            $nareastxt[] = $item;
        }
    }


    foreach ($nareastxt as $t) {
        $contador = 0;
        $gen = $t[2];
        $aux = $t[3];
        $proy = $t[4] . $t[5] . $t[6] . $t[7] . $t[8] . $t[9];
        $supergen = 0;
        $superaux = 0;
        $superproy = 0;
        $areatxt = $gen . $aux . $proy;
        $enc2 = 0;

        foreach ($areas_dif as $d) { // Recorremos las areas del simonts hasta encontrar una coincidencia
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

            print "<br>";
            $contador += 1;
            print "Se agregaron " . $contador . " de un total de: " . count($dif);
            if ($supergen != 0 && $superaux != 0 && $superproy != 0) {
                $sql_areas = "INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, anio)
            VALUES (?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                $agrega_areas->execute(array($areatxt, 85, $supergen, $superaux, $superproy, '2024'));
                print "Se agreg? una area<br>";
            }
        }
    }


    $sentencia = "SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.tipo = 2 AND dp.anio = '2024'
    GROUP BY ar.id_area
    ";
    $stm = $con->query($sentencia);
    $areas_dif_update = $stm->fetchAll(PDO::FETCH_ASSOC);
    print '<br>';
    print '<br>';
    print 'Mostramos las areas despues del resultado <br><br>';
    foreach ($areas_dif_update as $ar) {
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
    }

    print "<br>";
    print "Ahora agregaremos las actividades<br>";

    $contadoract = 0;
    foreach ($dif as $di) {
        $insert = 0;
        $gen = $di[2];
        $aux = $di[3];
        $proy = $di[4] . $di[5] . $di[6] . $di[7] . $di[8] . $di[9];
        $areatxt = $gen . $aux . $proy;
        foreach ($areas_dif_update as $d) {
            $area = $d['clave_dependencia'] . $d['clave_dependencia_auxiliar'] . $d['codigo_proyecto'];
            if ($area == $areatxt) {
                $insert = $d;
            }
        }
        
        if ($insert != 0) {
            $sql_areas = "INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado, id_creacion, anio, id_actividad_seguimiento)
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                try {
                    $agrega_areas->execute(array($di[10], $di[11], $di[12], "0", "0", $insert['id_area'], 1, 1, 1, 2024, 0));                    
                } catch (\Throwable $th) {
                    throw $th;
                }

                $id = $con->lastInsertId();

                $sql_areas = "INSERT INTO programaciones (id_actividad, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                try {
                    $agrega_areas->execute(array($id, 0, 0, $di[14], 0, 0, $di[16], 0, 0, $di[18], 0, 0, $di[20]));
                } catch (\Throwable $th) {
                    throw $th;
                }
                $insert = 1;
            $contadoract += 1;
        }
    }
    print $contadoract . " actividades del DIF<br>";

}





function areaTestOpdapas($con, $dif)
{
    $sentencia = "SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.tipo = 3 AND dp.anio = '2024'
    GROUP BY ar.id_area
    ";
    $stm = $con->query($sentencia);
    $areas_dif = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm = $con->query("SELECT * FROM dependencias_generales WHERE tipo = 'Organismos Operadores de Agua' AND anio = '2024'");
    $generales = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM dependencias_auxiliares WHERE tipo = 'Organismos Operadores de Agua' AND anio = '2024'");
    $auxiliares = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM proyectos WHERE anio = '2024'");
    $proyectos = $stm->fetchAll(PDO::FETCH_ASSOC);


    //Primero vamos a actualizar las areas
    print "Se muestran las claves dadas de alta en el SIMONTS<h1> OPDAPAS </h1><br>";
    foreach ($areas_dif as $ar) {
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
        $supgen = 0;
        $supaux = 0;
        $supproy = 0;

        foreach ($generales as $g1) {
            if ($ar['clave_dependencia'] == $g1['clave_dependencia']) {
                $supgen = $g1['id_dependencia'];
            }
        }
        foreach ($auxiliares as $a1) {
            if ($ar['clave_dependencia_auxiliar'] == $a1['clave_dependencia_auxiliar']) {
                $supaux = $a1['id_dependencia_auxiliar'];
            }
        }
        foreach ($proyectos as $p1) {
            if ($ar['codigo_proyecto'] == $p1['codigo_proyecto']) {
                $supproy = $p1['id_proyecto'];
            }
        }

        if ($supgen != 0 && $supaux != 0 && $supproy != 0) {
            print " ";
        } else {
            print "Hay claves en el TXT que no existen en el SIMONTS, revisar";
        }
    }


    print "<br><br><br>";


    // verifica si falta una del TXT en la base del simonts
    print 'verifica si falta una del TXT en la base del simonts<br>';
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


    // Recorremos el TXt y verificamos que el SIMONTS tenga todas las areas
    print 'Verifica si faltan del simonts en la del txt<br>';

    //Guardamos las areas en un array para evitar repetidos
    $uniqueKeys = [];
    $nareastxt = [];

    // Recorrer el array original
    foreach ($dif as $item) {
        // Crear una clave única a partir de los índices especificados
        $key = $item[2] . $item[3] . $item[4] . $item[5] . $item[6] . $item[7] . $item[8] . $item[9];

        // Si la clave no está en el array asociativo, añadir el elemento al array único
        if (!isset($uniqueKeys[$key])) {
            $uniqueKeys[$key] = true;
            $nareastxt[] = $item;
        }
    }


    $contador = 0;
    foreach ($nareastxt as $t) {
        $gen = $t[2];
        $aux = $t[3];
        $proy = $t[4] . $t[5] . $t[6] . $t[7] . $t[8] . $t[9];
        $supergen = 0;
        $superaux = 0;
        $superproy = 0;
        $areatxt = $gen . $aux . $proy;
        $enc2 = 0;

        foreach ($areas_dif as $d) { // Recorremos las areas del simonts hasta encontrar una coincidencia
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
                print "<br>";
                $contador += 1;
                print "Se agregaron " . $contador . " de un total de: " . count($dif);
                $sql_areas = "INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, anio)
                VALUES (?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                $agrega_areas->execute(array($areatxt, 84, $supergen, $superaux, $superproy, '2024'));
                print "Se agregó una area<br>";
            }else{
                print 'Area no encontrada<br>';
            }
        }
    }


    $sentencia = "SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.tipo = 3 AND dp.anio = '2024'
    GROUP BY ar.id_area
    ";
    $stm = $con->query($sentencia);
    $areas_dif_update = $stm->fetchAll(PDO::FETCH_ASSOC);
    print '<br>';
    print '<br>';
    print 'Mostramos las areas despues del resultado <br><br>';
    foreach ($areas_dif_update as $ar) {
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
    }

    print "<br>";
    print "Ahora agregaremos las actividades<br>";

    $contadoract = 0;
    foreach ($dif as $di) {
        $insert = 0;
        $gen = $di[2];
        $aux = $di[3];
        $proy = $di[4] . $di[5] . $di[6] . $di[7] . $di[8] . $di[9];
        $areatxt = $gen . $aux . $proy;
        foreach ($areas_dif_update as $d) {
            $area = $d['clave_dependencia'] . $d['clave_dependencia_auxiliar'] . $d['codigo_proyecto'];
            if ($area == $areatxt) {
                $insert = $d;
            }
        }
        
        if ($insert != 0) {
            $sql_areas = "INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado, id_creacion, anio, id_actividad_seguimiento)
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                try {
                    $agrega_areas->execute(array($di[10], $di[11], $di[12], "0", "0", $insert['id_area'], 1, 1, 1, 2024, 0));                    
                } catch (\Throwable $th) {
                    throw $th;
                }

                $id = $con->lastInsertId();

                $sql_areas = "INSERT INTO programaciones (id_actividad, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                try {
                    $agrega_areas->execute(array($id, 0, 0, $di[14], 0, 0, $di[16], 0, 0, $di[18], 0, 0, $di[20]));
                } catch (\Throwable $th) {
                    throw $th;
                }
                $insert = 1;
            $contadoract += 1;
        }
    }
    print $contadoract . " actividades del OPDAPAS<br>";
}







function areaTestImcufidem($con, $dif)
{
    $sentencia = "SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.tipo = 4 AND dp.anio = '2024'
    GROUP BY ar.id_area
    ";
    $stm = $con->query($sentencia);
    $areas_dif = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm = $con->query("SELECT * FROM dependencias_generales WHERE tipo = 'Institutos Municipales de Cultura Física y Deporte' AND anio = '2024'");
    $generales = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM dependencias_auxiliares WHERE tipo = 'Institutos Municipales de Cultura Física y Deporte' AND anio = '2024'");
    $auxiliares = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm = $con->query("SELECT * FROM proyectos WHERE anio = '2024'");
    $proyectos = $stm->fetchAll(PDO::FETCH_ASSOC);


    //Primero vamos a actualizar las areas
    print "Se muestran las claves dadas de alta en el SIMONTS <h1>IMCUFIDEM </h1><br>";
    foreach ($areas_dif as $ar) {
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
        $supgen = 0;
        $supaux = 0;
        $supproy = 0;

        foreach ($generales as $g1) {
            if ($ar['clave_dependencia'] == $g1['clave_dependencia']) {
                $supgen = $g1['id_dependencia'];
            }
        }
        foreach ($auxiliares as $a1) {
            if ($ar['clave_dependencia_auxiliar'] == $a1['clave_dependencia_auxiliar']) {
                $supaux = $a1['id_dependencia_auxiliar'];
            }
        }
        foreach ($proyectos as $p1) {
            if ($ar['codigo_proyecto'] == $p1['codigo_proyecto']) {
                $supproy = $p1['id_proyecto'];
            }
        }

        if ($supgen != 0 && $supaux != 0 && $supproy != 0) {
            print " ";
        } else {
            print "Hay claves en el TXT que no existen en el SIMONTS, revisar";
        }
    }


    print "<br><br><br>";


    // verifica si falta una del TXT en la base del simonts
    print 'verifica si falta una del TXT en la base del simonts<br>';
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


    // Recorremos el TXt y verificamos que el SIMONTS tenga todas las areas
    print 'Verifica si faltan del simonts en la del txt<br>';

    //Guardamos las areas en un array para evitar repetidos
    $uniqueKeys = [];
    $nareastxt = [];

    // Recorrer el array original
    foreach ($dif as $item) {
        // Crear una clave única a partir de los índices especificados
        $key = $item[2] . $item[3] . $item[4] . $item[5] . $item[6] . $item[7] . $item[8] . $item[9];

        // Si la clave no está en el array asociativo, añadir el elemento al array único
        if (!isset($uniqueKeys[$key])) {
            $uniqueKeys[$key] = true;
            $nareastxt[] = $item;
        }
    }


    $contador = 0;
    foreach ($nareastxt as $t) {
        $gen = $t[2];
        $aux = $t[3];
        $proy = $t[4] . $t[5] . $t[6] . $t[7] . $t[8] . $t[9];
        $supergen = 0;
        $superaux = 0;
        $superproy = 0;
        $areatxt = $gen . $aux . $proy;
        $enc2 = 0;

        foreach ($areas_dif as $d) { // Recorremos las areas del simonts hasta encontrar una coincidencia
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

            print "<br>";
            $contador += 1;
            print "Se agregaron " . $contador . " de un total de: " . count($dif);
            if ($supergen != 0 && $superaux != 0 && $superproy != 0) {
                $sql_areas = "INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, anio)
            VALUES (?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                $agrega_areas->execute(array($areatxt, 86, $supergen, $superaux, $superproy, '2024'));
                print "Se agrego una area<br>";
            }else{
                print "area no encontrada";
            }
        }
    }


    $sentencia = "SELECT * FROM areas ar
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE dp.tipo = 4 AND dp.anio = '2024'
    GROUP BY ar.id_area
    ";
    $stm = $con->query($sentencia);
    $areas_dif_update = $stm->fetchAll(PDO::FETCH_ASSOC);
    print '<br>';
    print '<br>';
    print 'Mostramos las areas despues del resultado <br><br>';
    foreach ($areas_dif_update as $ar) {
        print $ar['clave_dependencia'] . $ar['clave_dependencia_auxiliar'] . $ar['codigo_proyecto'] . "<br>";
    }

    print "<br>";
    print "Ahora agregaremos las actividades<br>";

    $contadoract = 0;
    foreach ($dif as $di) {
        $insert = 0;
        $gen = $di[2];
        $aux = $di[3];
        $proy = $di[4] . $di[5] . $di[6] . $di[7] . $di[8] . $di[9];
        $areatxt = $gen . $aux . $proy;
        foreach ($areas_dif_update as $d) {
            $area = $d['clave_dependencia'] . $d['clave_dependencia_auxiliar'] . $d['codigo_proyecto'];
            if ($area == $areatxt) {
                $insert = $d;
            }
        }
        
        if ($insert != 0) {
            $sql_areas = "INSERT INTO actividades (codigo_actividad, nombre_actividad, unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado, id_creacion, anio, id_actividad_seguimiento)
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                try {
                    $agrega_areas->execute(array($di[10], $di[11], $di[12], "0", "0", $insert['id_area'], 1, 1, 1, 2024, 0));                    
                } catch (\Throwable $th) {
                    throw $th;
                }

                $id = $con->lastInsertId();

                $sql_areas = "INSERT INTO programaciones (id_actividad, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $agrega_areas = $con->prepare($sql_areas);
                try {
                    $agrega_areas->execute(array($id, 0, 0, $di[14], 0, 0, $di[16], 0, 0, $di[18], 0, 0, $di[20]));
                } catch (\Throwable $th) {
                    throw $th;
                }
                $insert = 1;
            $contadoract += 1;
        }
    }
    print $contadoract . " actividades del IMCUFIDEM<br>";
}



function vincularActividades($con, $vincDIF, $vincOPDAPAS, $vincIMCUFIDEM){
    $sentencia = "SELECT * FROM actividades ac
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto 
    WHERE dp.anio = '2024' AND dp.tipo = 4
    ";
    $stm = $con->query($sentencia);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);


    $sentencia2 = "SELECT * FROM pdm_lineas";
    $stm = $con->query($sentencia2);
    $lineas = $stm->fetchAll(PDO::FETCH_ASSOC);

    print "INSERT INTO lineasactividades (id_actividad,id_linea) VALUES" . "<br>";

    foreach($vincIMCUFIDEM as $d){
        $clavextx = $d[0] . $d[1] . $d[2]. $d[3];
        $enc = 0;
        $encl = 0;
    
        foreach($actividades as $ac){
            $claveac = $ac['clave_dependencia'] . $ac['clave_dependencia_auxiliar'] . $ac['codigo_proyecto'] . $ac['codigo_actividad'] ;
            if($clavextx == $claveac){
                $enc = $ac;
            }
        }
        foreach($lineas as $l){
            if($l['clave_linea'] == $d[4]){
                $encl = $l;
            }
        }



        if($enc != 0 && $encl !=0){
            print '(' . $enc['id_actividad'] . ',' .
            $encl['id_linea'] . '),' .
                "<br>"
            ;
        }else{
            print "No";
        }
    }



}






//areaTestDif($con, $dif);
//areaTestOpdapas($con, $opdapas);
//areaTestImcufidem($con, $imcufidem);
//vincularActividades($con, $vincDIF, $vincOPDAPAS, $vincIMCUFIDEM);

geeraavances($con);