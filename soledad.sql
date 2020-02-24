\c postgres
DROP DATABASE IF EXISTS soledadescomiana;
create database soledadescomiana;
\c soledadescomiana
CREATE USER soledad WITH PASSWORD 'n0m3l0';
ALTER ROLE soledad WITH SUPERUSER;
create table materia(
idmateria SERIAL primary key,
nombre varchar(70));

create table juego(
idjuego SERIAL primary key,
nombre varchar(70),
fecha_lanzamiento date,
descripcion varchar(90));

create table privilegio(
idprivilegio SERIAL primary key,
nombre varchar(60)
);

create table lugar(
idlugar SERIAL primary key,
nombre varchar(50));


create table usuario(
idusuario SERIAL primary key,nombre varchar(50),
nombre_facebook varchar(80),
contrasenia varchar(15),
correo varchar(80),
idprivilegio int references privilegio(idprivilegio) ON DELETE CASCADE ON UPDATE CASCADE
);

create table catalogo_actividad(
idcatalogo SERIAL primary key,
nombre varchar(30)
);

create table actividad(
idactividad SERIAL primary key,fec_actividad date,hora_i time,hora_f time,
idusuario int references usuario(idusuario) on delete cascade, idlugar int references lugar(idlugar)
);

create table actividad_materias(
idactividad int references actividad(idactividad) on delete cascade,
idmateria int references materia(idmateria) ON DELETE CASCADE ON UPDATE CASCADE,
primary key(idactividad,idmateria));

create table actividad_juegos(
idjuego int references juego(idjuego),
idactividad int references actividad(idactividad) on delete cascade,
primary key (idactividad,idjuego));

create table actividad_catalogoactividad(
idactividad int references actividad(idactividad) on delete cascade,
idcatalogo int references catalogo_actividad(idcatalogo) ON DELETE CASCADE ON UPDATE CASCADE,
primary key(idactividad,idcatalogo)
);

CREATE TABLE descripcio_lugar(
  idlugar int references lugar(idlugar),idactividad int references actividad(idactividad) ON DELETE CASCADE ON UPDATE CASCADE,
  descripcion text
);

CREATE TABLE participantes(idusuario int REFERENCES usuario(idusuario) ON DELETE CASCADE ON UPDATE CASCADE,
	idactividad int REFERENCES actividad(idactividad) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO privilegio (nombre) VALUES ('Usuario Mortal');
INSERT INTO privilegio (nombre) VALUES ('Admin');

CREATE VIEW tus_eventos AS SELECT u.idusuario,a.idactividad,ca.nombre,l.nombre AS lugar, a.fec_actividad, a.hora_i,a.hora_f FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_catalogoactividad aca ON aca.idactividad=
a.idactividad INNER JOIN catalogo_actividad ca ON aca.idcatalogo=ca.idcatalogo INNER JOIN lugar l ON l.idlugar
=a.idlugar UNION SELECT u.idusuario,a.idactividad,j.nombre,l.nombre AS lugar, a.fec_actividad, a.hora_i,a.hora_f FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_juegos acj ON acj.idactividad=
a.idactividad INNER JOIN juego j ON j.idjuego=acj.idjuego INNER JOIN lugar l ON l.idlugar
=a.idlugar UNION SELECT u.idusuario,a.idactividad,m.nombre,l.nombre AS lugar, a.fec_actividad, a.hora_i,a.hora_f FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_materias acm ON acm.idactividad=
a.idactividad INNER JOIN materia m ON m.idmateria=acm.idmateria INNER JOIN lugar l ON l.idlugar
=a.idlugar ORDER BY hora_i;

CREATE VIEW match_social AS SELECT u.idusuario,u.nombre, a.fec_actividad,a.hora_i,a.hora_f,ca.idcatalogo,a.idactividad,caa.nombre AS n_a, l.nombre AS lugar FROM usuario u
INNER JOIN actividad a ON a.idusuario=u.idusuario INNER JOIN actividad_catalogoactividad ca ON ca.idactividad=a.idactividad
INNER JOIN catalogo_actividad caa ON caa.idcatalogo=ca.idcatalogo INNER JOIN lugar l ON l.idlugar=a.idlugar;

CREATE VIEW match_geek AS SELECT u.idusuario,u.nombre, a.fec_actividad,a.hora_i,a.hora_f,aj.idjuego,a.idactividad,j.nombre AS juego, l.nombre AS lugar FROM usuario u
INNER JOIN actividad a ON a.idusuario=u.idusuario INNER JOIN actividad_juegos aj ON aj.idactividad=a.idactividad
INNER JOIN juego j ON j.idjuego=aj.idjuego INNER JOIN lugar l ON l.idlugar=a.idlugar;

CREATE VIEW match_asesoria AS SELECT u.idusuario,u.nombre, a.fec_actividad,a.hora_i,a.hora_f,am.idmateria,a.idactividad,m.nombre AS materia, l.nombre AS lugar FROM usuario u
INNER JOIN actividad a ON a.idusuario=u.idusuario INNER JOIN actividad_materias am ON am.idactividad=a.idactividad
INNER JOIN materia m ON m.idmateria=am.idmateria INNER JOIN lugar l ON l.idlugar=a.idlugar;

create view busqueda_actividades as SELECT a.idactividad,u.nombre as anfitrion,ca.nombre,l.nombre AS lugar, a.fec_actividad, a.hora_i,u.nombre||' '||ca.nombre||' '||l.nombre||' '||a.fec_actividad||' '||a.hora_i as con FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_catalogoactividad aca ON aca.idactividad=
a.idactividad INNER JOIN catalogo_actividad ca ON aca.idcatalogo=ca.idcatalogo INNER JOIN lugar l ON l.idlugar
=a.idlugar UNION SELECT a.idactividad,u.nombre as anfitrion,j.nombre,l.nombre AS lugar, a.fec_actividad, a.hora_i, u.nombre||' '||j.nombre||' '||l.nombre||' '||a.fec_actividad||' '||a.hora_i as con FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_juegos acj ON acj.idactividad=
a.idactividad INNER JOIN juego j ON j.idjuego=acj.idjuego INNER JOIN lugar l ON l.idlugar
=a.idlugar UNION SELECT a.idactividad,u.nombre as anfitrion, m.nombre,l.nombre AS lugar, a.fec_actividad, a.hora_i,u.nombre||' '||m.nombre||' '||l.nombre||' '||a.fec_actividad||' '||a.hora_i as con FROM usuario u
INNER JOIN actividad a ON u.idusuario=a.idusuario INNER JOIN actividad_materias acm ON acm.idactividad=
a.idactividad INNER JOIN materia m ON m.idmateria=acm.idmateria INNER JOIN lugar l ON l.idlugar
=a.idlugar;

INSERT INTO catalogo_actividad VALUES(1,'Platicar');
INSERT INTO catalogo_actividad VALUES(2,'Comer');

INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Halo CE','2019-12-03','El primer halo');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Halo Reach','2010-10-14','El mejor halo');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Death Stranding','2019-11-08','Uber eats simulator');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Cuphead','2018-10-18','Le gusta al Sami');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Left 4 dead','2015-05-18','Juego de zombies');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('GTA V','2016-10-17','Gta');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Street fighter','2010-02-17','Juego de peleas');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('The king of fighters','2003-10-17','Sak la reta');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Gears of war 3','2014-02-10','disparos');
INSERT INTO juego (nombre,fecha_lanzamiento,descripcion) VALUES('Smash bros ultimate','2014-03-12','disparos');

INSERT INTO materia (nombre) VALUES('Matematicas Avanzadas'),('Ecuaciones Diferenciales'),('Bases de datos'),('Probabilidad y estadistica'),('Programacion orientada a objetos'),('Electronica analogica'),('Teoria computacional'),('Analisis Fundamental de circuitos'),('Estructura de datos'),('Compiladores');

INSERT INTO lugar (nombre) VALUES('Explanada'),('Cafeteria'),('Astas'),('Cafeteria'),('Barra de cafes'),('1106'),('1107'),('1108'),('1109'),('1206');


INSERT INTO usuario (nombre,nombre_facebook,contrasenia,correo,idprivilegio) VALUES ('Pedro Hernandez','Pedrito Navajas','abcd','sad@sadf.d',1),
																					('Pedro Paramo','Pedro paramo','abcd','hola@hola.com',1),
																					('Antonio Raya','Sami Raya','abcd','hola@correo.com',1),
																					('Alan Rodriguez','Alan Rodriguez','1234','correo@correo.com',1),
																					('Arturo Briones','Arturo Briones','1234','correo1@correo.com',1),
																					('Mario Fernandez','','1234','correo3@correo.com',2);


INSERT INTO actividad (fec_actividad,hora_i,hora_f,idusuario,idlugar) VALUES ('2019-11-25','13:00:00','14:00:00',1,2),
																			 ('2019-11-22','12:00:00','13:30:00',3,5),
																			 ('2019-10-12','10:30:00','12:00:00',2,2),
																			 ('2019-09-25','16:30:00','18:00:00',1,2),
																			 ('2019-09-22','07:00:00','08:30:00',3,5),
																			 ('2019-10-12','10:30:00','12:00:00',5,7),
																			 ('2019-05-12','10:30:00','12:00:00',2,2),
																			 ('2019-06-25','13:30:00','15:00:00',1,2),
																			 ('2019-02-22','08:30:00','10:00:00',3,5),
																			 ('2019-01-12','10:30:00','12:00:00',5,7);

INSERT INTO actividad_catalogoactividad VALUES(1,1);
INSERT INTO actividad_catalogoactividad VALUES(2,1);
INSERT INTO actividad_juegos VALUES(1,3);
INSERT INTO actividad_juegos VALUES(1,4);
INSERT INTO actividad_juegos VALUES(1,7);
INSERT INTO actividad_juegos VALUES(1,8);
INSERT INTO actividad_materias VALUES(5,4);
INSERT INTO actividad_materias VALUES(6,4);
INSERT INTO actividad_materias VALUES(9,4);
INSERT INTO actividad_materias VALUES(10,4);
