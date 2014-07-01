#USUARIOS
INSERT INTO tbl_usuario(Usuario_Cedula,Usuario_Clave,Usuario_Tipo,Usuario_State)VALUES('Director','director','Director',0);
INSERT INTO tbl_usuario(Usuario_Cedula,Usuario_Clave,Usuario_Tipo,Usuario_State)VALUES('SubDirector','subdirector','SubDirector',0);
INSERT INTO tbl_usuario(Usuario_Cedula,Usuario_Clave,Usuario_Tipo,Usuario_State)VALUES('Admin1','admin1','Admin1',0);
INSERT INTO tbl_usuario(Usuario_Cedula,Usuario_Clave,Usuario_Tipo,Usuario_State)VALUES('Admin2','admin2','Admin2',0);

#ADMINS
INSERT INTO tbl_administrativo(Admin_Cedula,Admin_Nombre,Admin_Ape1,Admin_Ap2,Admin_Nac,Admin_Tel,Admin_Dir,Admin_Email,Admin_FechaNac,Admin_Genero,Admin_Foto)
VALUES('Director','Puesto','Director','','Costa Rica','','***','','2014-28-04','masculino','default-user-picture.png');
INSERT INTO tbl_administrativo(Admin_Cedula,Admin_Nombre,Admin_Ape1,Admin_Ap2,Admin_Nac,Admin_Tel,Admin_Dir,Admin_Email,Admin_FechaNac,Admin_Genero,Admin_Foto)
VALUES('SubDirector','Puesto','SubDirector','','Costa Rica','','***','','2014-28-04','masculino','default-user-picture.png');
INSERT INTO tbl_administrativo(Admin_Cedula,Admin_Nombre,Admin_Ape1,Admin_Ap2,Admin_Nac,Admin_Tel,Admin_Dir,Admin_Email,Admin_FechaNac,Admin_Genero,Admin_Foto)
VALUES('Admin1','Puesto','Admin1','','Costa Rica','','***','','2014-28-04','masculino','default-user-picture.png');
INSERT INTO tbl_administrativo(Admin_Cedula,Admin_Nombre,Admin_Ape1,Admin_Ap2,Admin_Nac,Admin_Tel,Admin_Dir,Admin_Email,Admin_FechaNac,Admin_Genero,Admin_Foto)
VALUES('Admin2','Puesto','Admin2','','Costa Rica','','***','','2014-28-04','masculino','default-user-picture.png');
COMMIT;

ALTER TABLE tbl_usuario CHANGE Usuario_Tipo Usuario_Tipo VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL;



#CARRERAS
INSERT INTO tbl_carrera(Carrera_Nombre,Carrera_Codigo)VALUES('Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo','080217');
INSERT INTO tbl_carrera(Carrera_Nombre,Carrera_Codigo)VALUES('Bachillerato en Promoción de la Salud Física','080219');
INSERT INTO tbl_carrera(Carrera_Nombre,Carrera_Codigo)VALUES('Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación','080216');
INSERT INTO tbl_carrera(Carrera_Nombre,Carrera_Codigo)VALUES('Maestría en Salud Integral y Movimiento Humano','080220');
INSERT INTO tbl_carrera(Carrera_Nombre,Carrera_Codigo)VALUES('Doctorado en Ciencias del Movimiento Humano','080224');


#CURSOS

#BACHILLERATO EN PROMOCIÓN DE LA SALUD FISICA

INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK200',4,'Teorico','Anatomía del Movimiento Humano','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK201',4,'Practico','Psico-Sociología para la Promoción de la Salud Física','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK202',3,'Practico','Introducción a la Danza Aeróbica','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK204',3,'Teorico','Técnicas y Estrategias para la Promoción de la Salud Física','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK203',3,'Teorico','Introducción al Entrenamiento Contrarresistencia','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK205',4,'Teorico','Fisiología del Ejercicio','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK415',3,'Teorico','Actividades Físicas Contemporáneas','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK207',3,'Teorico','Introducción a la preparación física deportiva','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK210',4,'Teorico','Kinesiología y Biomecánica Básica','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK213',3,'Teorico','Procedimientos de emergencia y primeros auxilios','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK208',4,'Teorico','Planificación y metedología del entrenamiento físico','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK404',3,'Teorico','Fisiopatologías de Enfermedades Hipocinéticas','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK212',3,'Teorico','Evakuación de la Aptitud Física','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK214',4,'Teorico','Metodología, Planificación, Métodos Avanzados del Entrenamiento Contrarresistencia','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK232',4,'Teorico','Metodología, Métrica Musical y Coreografía de la Danza Aeróbica','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK215',3,'Teorico','Nutrición Básica','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK233',4,'Práctico','Instrucción y Promoción de la Salud Física en Centros de Acondicionamiento Físico','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK401',2,'Teorico','Lesiones musculo-Esqueléticas','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK206',3,'Teorico','Administración y Organización de la Promoción de la Salud','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK402',2,'Teorico','Fundamentos del Masaje','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK403',3,'Teorico','Bases Conceptuales para el Desarrollo Integral del Ser Humano','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK211',3,'Teorico','Prescripción de la Actividad Física para la Salud','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK405',3,'Teorico','Calidad de Vida para el Adulto Mayor','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK406',3,'Teorico','Fundamentos de Epidermología e Investigación','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK407',2,'Teorico','Vida al Aire Libre','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK408',2,'Teorico','Modificación de Conductas Relacionadas con la Salud','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK409',3,'Teorico','Promoción de la Salud en Poblaciones Especiales','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK410',4,'Teorico','Rehabilitación Cardíaca Básica','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK400',2,'Teorico','Gestión de Pequeña y Mediana Empresa','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK412',3,'Teorico','Administración del Tiempo Libre y Eventos Recreativos','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK413',3,'Teorico','La Recreación como Forma de Terapía','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK414',4,'Teorico','Patologías Psicosomáticas y Adicciones','Bachillerato en Promoción de la Salud Física');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDK411',5,'Teorico','Promoción y Rehabilitación de la Salud Física','Bachillerato en Promoción de la Salud Física');


#BACHILLERATO ENSEÑANZA EDUCACIÓN FÍSICA

INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI401',3,'Teorico','Aprendizaje y Enseñanza Deportiva 1(Natación)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI402',3,'Teorico','Fundamentos Anatomobiológicos','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEX320',3,'Teorico','Introducción a los Procesos Educativos','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEX322',3,'Teorico','Desarrollo Costarricense y Modelos Educativos','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI404',3,'Teorico','Dimensiones del Movimiento Humano','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI405',3,'Teorico','Fisiología del Ejercicio','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEX323',3,'Teorico','Desarrollo Humano y Teorías del Aprendizaje','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('EDC400',3,'Teorico','Educación Física Adaptada para la Diversidad','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI400',3,'Teorico','Fundamentos de Investigación y Estadistica','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI406',4,'Teorico','Aprendizaje y Enseñanza Deportes de Conjunto 1(Fútbol y Baloncesto)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI407',4,'Teorico','Aprendizaje y Enseñanza Deportes de Conjunto II(Béisbol-Softbol y Voleibol)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI408',3,'Teorico','Destrezas Básicas Perceptual-Motor en Edad Preescolar y I Ciclo','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEY443',4,'Teorico','Curriculo y Planeamiento Didáctico para la Enseñanza de la Educación Física','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI403',3,'Teorico','Aprendizaje y Enseñanza Deportiva II(Gimnasia y Gimnasia Ritmica)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI409',4,'Teorico','Aprendizaje y Enseñanza Deportes de Conjunto III(Atletismo y Balonmano)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI410',4,'Teorico','Fundamentos Médico Deportivos, Lesiones y Primeros Auxilios','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEY425',4,'Teorico','Didáctica para el Aprendizaje de la Enseñanza de la Educación Física','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI413',3,'Teorico','Desarrollo Motor','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI411',3,'Teorico','Introducción a la Recreación','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI415',2,'Teorico','Táctica y Estrategía Deportiva I(Natación)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEY444',4,'Teorico','Evaluación de los Aprendizajes para la Enseñanza de la Educación Física','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEY426',6,'Teorico','Desafios Didácticos en la Práctica Docente para la Educación Física','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI414',2,'Teorico','Acondicionamiento Físico','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI412',3,'Teorico','Táctica y Estrategia Deportiva II(Gimnasia y Gimnasia Ritmica)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI416',4,'Teorico','Táctica y Estrategia Deporte de Conjunto I(Fútbol y Baloncesto)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI417',3,'Teorico','Aprendizaje Motor y Fundamentos Psicosociológicos','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI418',4,'Teorico','Táctica y Estrategia Deporte de Conjunto II(Beisbol-Softbol y Voleibol)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('DEY427',4,'Teorico','Seminario de Investigación Educativa','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI419',4,'Teorico','Táctica y Estrategia Deporte de Conjunto III(Atletismo-Balonmano)','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI420',3,'Teorico','Administración Deportiva','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI421',3,'Teorico','Gestión de Pequeña y Mediana Empresa','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI422',3,'Teorico','Introducción al Entrenamiento Contrarresistencia','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('EDC401',3,'Teorico','Seminario de Innovación y Producción Educativa en Educación Física','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDI423',3,'Teorico','Actividad Física para Personas con Discapacidad','Bachillerato en la Enseñanza de la Educación Física, Deporte y Recreación');

#Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo

INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ500',5,'Teorico','Teoría y sistemas de entrenamiento','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ501',4,'Teorico','Psicosociología del rendimiento deportivo','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ502',5,'Teorico','Nutrición del deportista de rendimiento','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ503',4,'Teorico','Seminario de Investigación I','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ504',4,'Teorico','Planificación, programación y periodización del entrenamiento deportivo','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ505',4,'Teorico','Estrategia y táctica aplicada al rendimiento deportivo','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ506',6,'Teorico','Práctica deportiva aplicada al rendimiento deportivo(escoger un deporte)','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
INSERT INTO tbl_curso(Curso_Codigo,Curso_Creditos,Curso_Tipo,Curso_Nombre,Carrera_Nombre)
VALUES('CDJ507',4,'Teorico','Seminario de Investigación II','Licenciatura en Ciencias del Deporte con Énfasis en Rendimiento Deportivo');
