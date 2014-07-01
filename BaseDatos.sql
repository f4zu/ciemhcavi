#USUARIOS

CREATE DATABASE CIMHCAVI DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

Use CIMHCAVI;

# Creacion de la tabla que contendra los usuarios
CREATE TABLE tbl_usuario(
	Usuario_Cedula VARCHAR(20), 
	Usuario_Clave VARCHAR(16), 
	Usuario_Tipo VARCHAR(15),
	Usuario_State INT(1) NOT NULL);
#llave primaria
alter table tbl_usuario
add primary key (Usuario_Cedula);
#fin llave primaria

#definir un dominio de genero
alter table tbl_usuario add 
(constraint ck_usuario_tipo
check (Usuario_Tipo in ('Admin','Director','SubDirector','Admin1','Admin2','Doc') ) );
#fin del dominio genero

#definir un dominio del estado
alter table tbl_usuario add
(constraint ck_usuario_state
check (Usuario_State in(1,0)));
#fin del dominio del estado

CREATE INDEX indice_usuario ON tbl_usuario (
    Usuario_Cedula, 
	Usuario_Clave, 
	Usuario_Tipo,
	Usuario_State);
#fin del indice



# Creacion de la tabla que contendra los administrativos
CREATE TABLE tbl_administrativo(
	Admin_Cedula varchar(20) NOT NULL, 
	Admin_Nombre varchar(45) NOT NULL,
	Admin_Ape1 varchar(45) NOT NULL,
	Admin_Ap2 varchar(45) default NULL,
	Admin_Nac varchar(45) default NULL,
	Admin_Tel varchar(45) default NULL,
	Admin_Dir varchar(255) default NULL,
	Admin_Email varchar(45) default NULL,
	Admin_FechaNac DATE default NULL,
	Admin_Genero varchar(9) default NULL,
	Admin_Foto varchar(100) default NULL,
	Admin_Puesto varchar(45) NOT NULL
	);
#llave primaria
alter table tbl_administrativo
add primary key (Admin_Cedula);
#fin llave primaria

#llave foranea
  alter table tbl_administrativo
  add constraint FK_administrativo_usuario
  foreign key (Admin_Cedula)
  references tbl_usuario(Usuario_Cedula);
#fin llave foranea

#definir un dominio de genero
alter table tbl_administrativo add 
(constraint ck_admin_genero 
check (Admin_Genero in ('Masculino','Femenino') ) );
#fin del dominio genero

CREATE INDEX indice_administrativo ON tbl_administrativo (
    Admin_Cedula, 
	Admin_Nombre,
	Admin_Ape1,
	Admin_Ap2,
	Admin_Nac,
	Admin_Tel,
	Admin_Dir,
	Admin_Email,
	Admin_FechaNac,	
	Admin_Genero,
	Admin_Foto);
#fin del indice


# Creacion de la tabla que contendra los docentes

CREATE TABLE tbl_docente(
	Docente_Cedula varchar(20) NOT NULL, 
	Docente_Nombre varchar(45) NOT NULL,
	Docente_Ape1 varchar(45) NOT NULL,
	Docente_Ap2 varchar(45) default NULL,
	Docente_Nac varchar(45) default NULL,
	Docente_Tel varchar(45) default NULL,
	Docente_Dir varchar(255) default NULL,
	Docente_Email varchar(45) default NULL,
	Docente_FechaNac DATE default NULL,
	Docente_Genero varchar(9) default NULL,
	Docente_Foto varchar(100) default NULL
	);
#llave primaria
alter table tbl_docente
add primary key (Docente_Cedula);
#fin llave primaria

#llave foranea
  alter table tbl_docente
  add constraint FK_docente_cedula_usuario
  foreign key (Docente_Cedula)
  references tbl_usuario(Usuario_Cedula);
#fin llave foranea

#definir un dominio de genero
alter table tbl_docente add 
(constraint ck_docente_genero 
check (Docente_Genero in ('Masculino','Femenino') ) );
#fin del dominio genero

CREATE INDEX indice_docente ON tbl_docente (
    Docente_Cedula, 
	Docente_Nombre,
	Docente_Ape1,
	Docente_Ap2,
	Docente_Nac,
	Docente_Tel,
	Docente_Dir,
	Docente_Email,
	Docente_FechaNac,	
	Docente_Genero,
	Docente_Foto);
#fin del indice


# Creacion de la tabla que contendra los estudiantes
CREATE TABLE tbl_estudiante(
	Estudiante_Cedula varchar(20) NOT NULL, 
	Estudiante_Nombre varchar(45) NOT NULL,
	Estudiante_Ape1 varchar(45) NOT NULL,
	Estudiante_Ap2 varchar(45) default NULL,
	Estudiante_Nac varchar(45) default NULL,
	Estudiante_Email varchar(45) default NULL,
	Estudiante_FechaNac DATE default NULL,
	Estudiante_AnioIngreso INT default NULL,
	Estudiante_TipoSangre varchar(8) default NULL,
	Estudiante_Foto varchar(100) default NULL,
	Estudiante_Genero varchar(9) default NULL,
	Estudiante_Carnet varchar(45) default NULL,
	Estudiante_LugarTrabajo varchar(100) default NULL
	);
#llave primaria
alter table tbl_estudiante
add primary key (Estudiante_Cedula);
#fin llave primaria

#definir un dominio de genero
alter table tbl_estudiante add 
(constraint ck_estudiante_genero 
check (Estudiante_Genero in ('Masculino','Femenino') ) );
#fin del dominio genero


CREATE INDEX indice_estudiante ON tbl_estudiante (
    Estudiante_Cedula, 
	Estudiante_Nombre,
	Estudiante_Ape1,
	Estudiante_Ap2,
	Estudiante_Nac,
	Estudiante_Email,
	Estudiante_FechaNac,
	Estudiante_TipoSangre ,
	Estudiante_Foto,
	Estudiante_Genero,
	Estudiante_Carnet,
	Estudiante_LugarTrabajo);
#fin del indice


# Creacion de la tabla que contendra las lesiones de los estudiantes
CREATE TABLE tbl_lesion(
	Estudiante_Ced varchar(20) NOT NULL,
    Lesion_Nombre varchar(200) default NULL);

#llave primaria
alter table tbl_lesion
add primary key (Estudiante_Ced,Lesion_Nombre);
#fin llave primaria	
	
#llave foranea
  alter table tbl_lesion
  add constraint FK_lesion_cedula_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_lesion ON tbl_lesion (
    Estudiante_Ced,
    Lesion_Nombre);
#fin del indice

# Creacion de la tabla que contendra los medicamentos de los estudiantes
CREATE TABLE tbl_medicamento(
	Estudiante_Ced varchar(20) NOT NULL,
    Medicamento_Nombre varchar(100) NOT NULL);

#llave primaria
alter table tbl_medicamento
add primary key (Estudiante_Ced,Medicamento_Nombre);
#fin llave primaria	
	
#llave foranea
  alter table tbl_medicamento
  add constraint FK_medicamento_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea


CREATE INDEX indice_medicamento ON tbl_medicamento (
    Estudiante_Ced,
    Medicamento_Nombre);
#fin del indice


# Creacion de la tabla que contendra las necesidades especiales de los estudiantes
CREATE TABLE tbl_necespeciales(
	Estudiante_Ced varchar(20) NOT NULL,
    Necespeciales_Detalle varchar(200) default NULL);

#llave primaria
alter table tbl_necespeciales
add primary key (Estudiante_Ced,Necespeciales_Detalle);
#fin llave primaria	
	
#llave foranea
  alter table tbl_necespeciales
  add constraint FK_necespeciales_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_necespeciales ON tbl_necespeciales (
    Estudiante_Ced,
    Necespeciales_Detalle);
#fin del indice


# Creacion de la tabla que contendra los telefonos de los estudiantes
CREATE TABLE tbl_telefono(
	Estudiante_Ced varchar(20) NOT NULL,
    Telefono_Tipo varchar(45) default NULL,
    Telefono_numero varchar(45) default NULL);

#llave primaria
alter table tbl_telefono
add primary key (Estudiante_Ced,Telefono_Tipo);
#fin llave primaria	
	
#llave foranea
  alter table tbl_telefono
  add constraint FK_telefono_cedula_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_telefono ON tbl_telefono (
    Estudiante_Ced,
    Telefono_Tipo,
    Telefono_numero);
#fin del indice

# Creacion de la tabla que contendra las emergencias de los estudiantes
CREATE TABLE tbl_emergencia(
	Estudiante_Ced varchar(20) NOT NULL,
    Emergencia_numero varchar(45) default NULL,
    Emergencia_contacto varchar(100) default NULL);

#llave primaria
alter table tbl_emergencia
add primary key (Estudiante_Ced,Emergencia_numero);
#fin llave primaria	
	
#llave foranea
  alter table tbl_emergencia
  add constraint FK_emergencia_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_emergencia ON tbl_emergencia (
    Estudiante_Ced,
    Emergencia_numero,
    Emergencia_contacto);
#fin del indice

# Creacion de la tabla que contendra las enfermedades de los estudiantes
CREATE TABLE tbl_enfermedad(
	Estudiante_Ced varchar(20) NOT NULL,
    Enfermedad_Nombre varchar(200) default NULL,
    Enfermedad_Detalle varchar(255) default NULL);

#llave primaria
alter table tbl_enfermedad
add primary key (Estudiante_Ced,Enfermedad_Nombre);
#fin llave primaria	
	
#llave foranea
  alter table tbl_enfermedad
  add constraint FK_enfermedad_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_enfermedad ON tbl_enfermedad (
    Estudiante_Ced,
    Enfermedad_Nombre,
    Enfermedad_Detalle);
#fin del indice

# Creacion de la tabla que contendra las direcciones de los estudiantes
CREATE TABLE tbl_direccion(
	Estudiante_Ced varchar(20) NOT NULL,
    Direccion_Tipo varchar(45) default NULL,
    Direccion_Provincia varchar(75) default NULL,
    Direccion_Canton varchar(75) default NULL,
    Direccion_Distrito varchar(75) default NULL,
    Direccion_otras varchar(200) default NULL);

#llave primaria
alter table tbl_direccion
add primary key (Estudiante_Ced,Direccion_Tipo);
#fin llave primaria	

#llave foranea
  alter table tbl_direccion
  add constraint FK_direccion_cedula_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_direccion ON tbl_direccion (
    Estudiante_Ced,
    Direccion_Tipo,
    Direccion_Provincia,
    Direccion_Canton,
    Direccion_Distrito,
    Direccion_otras);
#fin del indice

# Creacion de la tabla que contendra las alergias de los estudiantes
CREATE TABLE tbl_alergia(
	Estudiante_Ced varchar(20) NOT NULL,
    Alergia_Nombre varchar(100) default NULL);

#llave primaria
alter table tbl_alergia
add primary key (Estudiante_Ced,Alergia_Nombre);
#fin llave primaria	
	
#llave foranea
  alter table tbl_alergia
  add constraint FK_alergia_cedula_estudiante
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_alergia ON tbl_alergia (
    Estudiante_Ced,
    Alergia_Nombre) ;
#fin del indice

# Creacion de la tabla que contendra los comentarios de los estudiantes
CREATE TABLE  tbl_comentarios (
  Estudiante_Ced varchar(20) NOT NULL,
  Usuario_Ced varchar(20)  NOT NULL,
  Comentario_Fecha datetime NOT NULL,
  Comentario_Detalle varchar(255) NOT NULL);
  
#llave primaria
alter table tbl_comentarios
add primary key (Estudiante_Ced,Usuario_Ced,Comentario_Fecha);
#fin llave primaria

#llave foranea
  alter table tbl_comentarios
  add constraint FK_comentarios_est_ced
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

#llave foranea
  alter table tbl_comentarios
  add constraint FK_comentarios_usuario_ced
  foreign key (Usuario_Ced)
  references tbl_usuario(Usuario_Cedula);
#fin llave foranea
  


CREATE INDEX indice_comentarios ON tbl_comentarios (
	Estudiante_Ced,
	Usuario_Ced,
    Comentario_Fecha,
    Comentario_Detalle);
#fin del indice

# Creacion de la tabla que contendra las carreras
CREATE TABLE tbl_carrera(
	Carrera_Nombre varchar(100) NOT NULL,
    Carrera_Codigo varchar(45) default NULL);
#llave primaria
alter table tbl_carrera
add primary key (Carrera_Nombre);
#fin llave primaria


CREATE INDEX indice_carrera ON tbl_carrera (
    Carrera_Nombre,
    Carrera_Codigo);
#fin del indice

# Creacion de la tabla que contendra los cursos
CREATE TABLE tbl_curso(
	Curso_Codigo varchar(45) NOT NULL,
    Curso_Creditos int default NULL,
    Curso_Tipo varchar(45) default NULL,
    Curso_Nombre varchar(100) default NULL,
	Curso_Ciclo varchar(25) default NULL,
    Carrera_Nombre varchar(100) NOT NULL);
#llave primaria
alter table tbl_curso
add primary key (Curso_Codigo);
#fin llave primaria

#llave foranea
  alter table tbl_curso
  add constraint FK_curso_nombre_carrera
  foreign key (Carrera_Nombre)
  references tbl_carrera(Carrera_Nombre);
#fin llave foranea

CREATE INDEX indice_curso ON tbl_curso (
    Curso_Codigo ,
    Curso_Creditos,
    Curso_Tipo,
    Curso_Nombre,
    Carrera_Nombre);
#fin del indice



# Creacion de la tabla que contendra la relacion de carrera y estudiante
CREATE TABLE carrera_estudiante(
	Carrera_Nombre varchar(100) NOT NULL,
    Estudiante_Ced varchar(20) NOT NULL);
	
#llave primaria
alter table carrera_estudiante
add primary key (Carrera_Nombre,Estudiante_Ced);
#fin llave primaria	

#llave foranea
  alter table carrera_estudiante
  add constraint FK_carrera_nombre
  foreign key (Carrera_Nombre)
  references tbl_carrera(Carrera_Nombre);
#fin llave foranea

#llave foranea
  alter table carrera_estudiante
  add constraint FK_carrera_est_ced
  foreign key (Estudiante_Ced)
  references tbl_estudiante(Estudiante_Cedula);
#fin llave foranea

CREATE INDEX indice_carrera_estudiante ON carrera_estudiante (
    Carrera_Nombre,
    Estudiante_Ced);
#fin del indice
