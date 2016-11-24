 
create table empresa (
id_empresa integer AUTO_INCREMENT,
nombre varchar(50),
tipo varchar(100),
cp integer,
direccion varchar(100),
Constraint pk_empresa primary key (id_empresa));

 
create table tipoDocumento( 
id_tipoDoc integer, 
descripcion varchar(50), 
constraint pk_tipoDoc primary key (id_tipoDoc));

 
create table consultor (
id_consultor integer AUTO_INCREMENT,
nombre varchar(20),
apellido varchar(20), 
fecha_nacimiento date, 
num_dni numeric(8),
id_tipoDoc integer, 
constraint pk_consultor primary key (id_consultor),
constraint fk_tipoDoc foreign key (id_tipoDoc) references tipoDocumento(id_tipoDoc));

 
create table registroAuditoria (
id_registroAuditoria integer AUTO_INCREMENT, 
fecha date, 
hora time, 
id_consultor integer, 
constraint pk_registroAuditoria primary key (id_registroAuditoria),
constraint fk_consultor foreign key (id_consultor) references consultor(id_consultor));

 
create table puesto (
codigo_puesto integer AUTO_INCREMENT,
nombre varchar(50),
descripcion varchar(140),
eliminado integer,
id_empresa integer,
id_registroAuditoria integer,
Constraint pk_codigo_puesto primary key (codigo_puesto),
constraint fk_registroAuditoria foreign key (id_registroAuditoria) references registroAuditoria(id_registroAuditoria),
constraint fk_empresa foreign key (id_empresa) references empresa(id_empresa));

 
create table competencia (
codigo_competencia integer,
nombre varchar(50),
descripcion varchar(140),
Constraint pk_codigo_competencia primary key (codigo_competencia));

 
create table ponderacionCompetencia (
codigo_competencia integer, 
codigo_puesto integer, 
ponderacion integer, 
constraint pk_puesto_compentencia primary key (codigo_puesto, codigo_competencia),
constraint fk_puesto foreign key (codigo_puesto) references puesto(codigo_puesto),
constraint fk_comptencia foreign key (codigo_competencia) references competencia (codigo_competencia));

 
create table factor (
codigo_factor integer,
nombre varchar(50),
descripcion varchar(200),
elimiando boolean,
codigo_competencia integer,
id_registroAuditoria integer,
Constraint pk_codigo_factor primary key (codigo_factor),
constraint fk_factor_registroAuditoria foreign key (id_registroAuditoria) references registroAuditoria(id_registroAuditoria),
constraint fk_factor_comptencia foreign key (codigo_competencia) references competencia (codigo_competencia));

 
create table opcionRespuesta (
id_opcionRespuesta integer, 
nombre varchar(50),
descripcion varchar(200), 
elimiando boolean,
id_registroAuditoria integer, 
constraint pk_opcionRespueta primary key (id_opcionRespuesta),
constraint fk_opcion_registroAuditoria foreign key (id_registroAuditoria) references registroAuditoria(id_registroAuditoria));

 
create table pregunta (
id_pregunta integer, 
nombre varchar(50),
descripcion varchar(140), 
eliminado boolean,
id_registroAuditoria integer,
id_opcionRespuesta integer,
codigo_factor integer,
constraint pk_pregunta primary key (id_pregunta),
constraint fk_pregunta_registroAuditoria foreign key (id_registroAuditoria) references registroAuditoria(id_registroAuditoria),
constraint fk_pregunta_factor foreign key (codigo_factor) references factor(codigo_factor),
constraint fk_pregunta_opcionRepuesta foreign key (id_opcionRespuesta) references opcionRespuesta(id_opcionRespuesta));

 
create table respuesta (
id_respuesta integer,
id_opcionRespuesta integer,
orden integer,
nombre varchar(50), 
descripcion varchar(200),
constraint pk_respuesta primary key (id_respuesta),
constraint fk_respuesta_opcionRepuesta foreign key (id_opcionRespuesta) references opcionRespuesta (id_opcionRespuesta));

 
create table ponderacionRespuesta (
id_pregunta integer, 
id_respuesta integer,
ponderacion integer, 
constraint pk_pregunta_respuesta primary key (id_pregunta, id_respuesta),
constraint fk_respuesta_ponderacionRespuesta foreign key (id_respuesta) references respuesta(id_respuesta),
constraint fk_pregunta_ponderacionRespuesta foreign key (id_pregunta) references pregunta (id_pregunta));


 
create table candidato (
id_candidato integer, 
nombre varchar(20), 
apellido varchar(20),
eliminado boolean,
num_dni numeric(8),
fecha_nacimiento date,
id_tipoDoc integer, 
constraint pk_candidato primary key (id_candidato),
constraint fk_candidato_tipoDoc foreign key (id_tipoDoc) references tipoDocumento(id_tipoDoc));

 
create table cuestionario (
id_cuestionario integer AUTO_INCREMENT ,
clave integer, 
fecha_inicio date,
fecha_finalizacion date,
fecha_ultimoIngreso date,
cant_ingresos integer,
tiempo_limite time, 
eliminado boolean,
id_candidato integer,
codigo_puesto integer,
id_registroAuditoria integer, 
constraint pk_cuestionario primary key (id_cuestionario),
constraint fk_cuestionario_candidato foreign key (id_candidato) references candidato(id_candidato),
constraint fk_cuestionario_puesto foreign key (codigo_puesto ) references puesto(codigo_puesto),
constraint fk_cuestionario_registroAuditoria foreign key (id_registroAuditoria) references registroAuditoria(id_registroAuditoria));

 
create table registroEjecucion (
id_registroEjecucion integer PRIMARY KEY AUTO_INCREMENT,
fecha date, 
hora time,
accion varchar(50));

