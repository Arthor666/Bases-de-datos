\c postgres
DROP DATABASE IF EXISTS soledadescomiana;
create database soledadescomiana;
\c soledadescomiana
CREATE USER soledad WITH PASSWORD 'n0m3l0';
ALTER ROLE soledad WITH SUPERUSER; 

create table materia(
	idmateria int primary key,
	nombre varchar(70)
);

create table juego(
	idjuego int primary key,
	nombre varchar(70),
	fecha_lanzamiento date,
	descripcion varchar(90)
);

create table privilegio(
	idprivilegio SERIAL primary key,
	nombre varchar(60)
);

create table lugar(
	idlugar int primary key,
	nombre varchar(50),
	descripcion varchar(100)
);

create table calendario(
	idcalendario int primary key,hora_i time,hora_f time,
	fecha_creacion date
);

create table usuario(
	idusuario SERIAL primary key,nombre varchar(50),
	nombre_facebook varchar(80),
	contrasenia varchar(15),
	correo varchar(80),
	idprivilegio int references privilegio(idprivilegio)
);

create table catalogo_actividad(
	idcatalogo int primary key,
	nombre varchar(30)
);

create table actividad(
	idactividad int primary key,fec_actividad date,
	idcalendario int references calendario(idcalendario),
	idusuario int references usuario(idusuario), idlugar int references lugar(idlugar)
);

create table actividad_materias(
	idactividad int references actividad(idactividad),
	idmateria int references materia(idmateria),
	primary key(idactividad,idmateria)
);

create table actividad_juegos(
	idjuego int references juego(idjuego),
	idactividad int references actividad(idactividad),
	primary key (idactividad,idjuego)
);

create table actividad_catalogoactividad(
	idactividad int references actividad(idactividad),
	idcatalogo int references catalogo_actividad(idcatalogo),
	primary key(idactividad,idcatalogo)
);

CREATE TABLE descripcio_lugar(
  idlugar int references lugar(idlugar),
  descripcion text
);

CREATE TABLE participantes(
	idusuario int REFERENCES usuario(idusuario) ,
	idactividad int REFERENCES actividad(idactividad)
);

INSERT INTO privilegio (nombre) VALUES ('Usuario Mortal');
INSERT INTO privilegio (nombre) VALUES ('Admin');

CREATE VIEW tus_eventos AS SELECT u.idusuario,a.idactividad,ca.nombre,l.nombre AS lugar, a.fec_actividad, c.hora_i,c.hora_f FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_catalogoactividad aca ON aca.idactividad=
a.idactividad INNER JOIN catalogo_actividad ca ON aca.idcatalogo=ca.idcatalogo INNER JOIN lugar l ON l.idlugar
=a.idlugar INNER JOIN calendario c ON a.idcalendario=c.idcalendario UNION
SELECT u.idusuario,a.idactividad,j.nombre,l.nombre AS lugar, a.fec_actividad, c.hora_i,c.hora_f FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_juegos acj ON acj.idactividad=
a.idactividad INNER JOIN juego j ON j.idjuego=acj.idjuego INNER JOIN lugar l ON l.idlugar
=a.idlugar INNER JOIN calendario c ON a.idcalendario=c.idcalendario UNION
SELECT u.idusuario,a.idactividad,m.nombre,l.nombre AS lugar, a.fec_actividad, c.hora_i,c.hora_f FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_materias acm ON acm.idactividad=
a.idactividad INNER JOIN materia m ON m.idmateria=acm.idmateria INNER JOIN lugar l ON l.idlugar
=a.idlugar INNER JOIN calendario c ON a.idcalendario=c.idcalendario ORDER BY hora_i;

INSERT INTO catalogo_actividad VALUES(1,'Platicar');
INSERT INTO catalogo_actividad VALUES(2,'Comer');
INSERT INTO juego VALUES(1,'Halo CE','2019-12-03');
INSERT INTO juego VALUES(2,'Halo Reach','2010-10-14');
INSERT INTO materia VALUES(1,'Matematicas Avanzadas');
INSERT INTO materia VALUES(2,'Ecuaciones Diferenciales');
INSERT INTO calendario VALUES (1,'13:00','14:30','2019-11-21');
INSERT INTO calendario VALUES (2,'09:00','10:30','2019-11-21');
INSERT INTO calendario VALUES (3,'11:00','12:30','2019-11-21');
INSERT INTO calendario VALUES (4,'12:00','14:30','2019-11-21');
INSERT INTO calendario VALUES (5,'12:00','14:30','2019-11-21');
INSERT INTO calendario VALUES (6,'18:00','19:00','2019-11-21');
INSERT INTO lugar VALUES(1,'Explanada');
INSERT INTO lugar VALUES(2,'Cafeteria');
INSERT INTO usuario VALUES (1,'Pedro Navajas','Pedrito Navajas','abcd','sad@sadf.d',1);
INSERT INTO usuario VALUES (2,'Dash','Difrazh','abcd','hola@hola.com',1);
INSERT INTO usuario VALUES (3,'Halk','Jogan','abcd','Halk@jogan.com',1);
INSERT INTO actividad VALUES (1,'2019-11-25',1,1,1);
INSERT INTO actividad VALUES (2,'2019-11-25',2,1,2);
INSERT INTO actividad VALUES (3,'2019-11-25',3,2,2);
INSERT INTO actividad VALUES (4,'2019-11-25',4,2,1);
INSERT INTO actividad VALUES (5,'2019-11-25',5,3,2);
INSERT INTO actividad VALUES (6,'2019-11-25',6,3,1);
INSERT INTO actividad_catalogoactividad VALUES(1,1);
INSERT INTO actividad_catalogoactividad VALUES(2,2);
INSERT INTO actividad_juegos VALUES(1,3);
INSERT INTO actividad_juegos VALUES(2,4);
INSERT INTO actividad_materias VALUES(5,1);
INSERT INTO actividad_materias VALUES(6,2);