--

--correcto/insertado
INSERT INTO competencia values(1,'Gestión de proyectos', 'Habilidad para llevar a cabo un proyecto'),
								(2, 'Lealtad','Lealtad del candidato por la empersa');

--correcto/insertado
insert into factor values 
	(1,'Gestion del alcance','Capacidad de evaluar el alcance total del proyecto',false,1,null ),
	(2,'Gestion del tiempo','Capacidad de evaluar cuanto llevará el proyecto,',false,1,null),
	(3,'Credibilidad','Actitud por la cual otros confiarian en el candidato',false,2, null),
	(4,'Compromiso','Compromiso frente a logros y fracasos del equipo',false,2,null);

--correcto/insertado
insert into pregunta values (1,'identificacion','Con cual de las siguientes frases te identificas mas en tu vida profesional',false,null,null,3),
							  (2,'Importancia objetivos','Para mí el logro de objetivos colectivos es imoprtante porque:',false,null,null,4),
							  (3, 'Trabajo (WBS)','¿La descomposición de estructura de trabajo (WBS) forma parte de la definición de alcance?',false, null,null,1),
							   (4, 'Definición de alcance','¿Cuándo se define un alcance, debe definirse una línea de los requerimientos?',false, null,null,1),
							   (5,'Fin del comienzo','En el cronograma de un proyecto, ¿Qué significa que una actividad sea de ltipo "fin a comienzo"',false,null,null,2),
							   (6,'Valor ganado','¿La metodología de "valor ganado" permite predecir cuánto dinero se gastará en un proyecto segun los avances que el mismo tenga a la fecha?',false,null,null,2);

--correcto/insertado
insert into empresa values (1,'Musimundo','S.R.L.',3000, 'San Martin 2600'),
(2,'Compumundo','S.R.L.',3000, '9 de julio 3200'),
(3,'Salgueiro','Importanciones',5000, 'San Martin 2600'),
(4,'Hibernate','S.A,',3000, 'San Martin 2600'),
(5,'Gobierno SF','Gubernamental',3000, '9 de julio 3200'),
(6,'Fravega','Importanciones',5000, 'San Martin 2600'),
(7,'El once','Venta insumos',3000, 'San Martin 2600'),
(8,'U.T.N Santa Fe','Unviersidad',3000, '9 de julio 3200'),
(9,'U.N.L','Unviersidad',5000, 'San Martin 2600'),
(10,'Remax','Inmobiliaria',3000, 'San Martin 2600');


--correcto/insertado
insert into puesto (nombre, descripcion, elimiando, id_empresa,id_registroAuditoria) values ('Gerente General','Gesion de proyecto y dirrecion de persnoal',false,1,null),
('Programador Senior PHP','Programador con conocimiento aplicaciones web en PHP',false, 1,null),
('Programador Junior PHP','Programador con conocimiento aplicaciones web en PHP',false, 2,null),
('Gerente General','Gesion de proyecto y dirrecion de persnoal',false, 3,null),
('Programador Senior Java','Programador con conocimiento aplicaciones de escritorio en Java',false, 3,null),
('Programador Senior Java','Programador con conocimiento aplicaciones de escritorio en Java',false,4,null),
('Director de proyecto','Dreccion de proyectos',false, 5,null),
('Director de proyecto','direccion de proyectos',false,5,null),
('Administrador Base de datos','Creacion y mantenimiento de datos',false, 6,null),
('Gerente General','Gesion de proyecto y dirrecion de persnoal',false, 7,null),
('Programador Senior PHP','Programador con conocimiento aplicaciones web en PHP',false, 8,null),
('Programador Senior Java','Programador con conocimiento aplicaciones de escritorio en Java',false, 9,null),
('Administrador Base de datos','Creacion y mantenimiento de datos',false, 10,null);