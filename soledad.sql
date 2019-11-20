\c postgres
DROP DATABASE IF EXISTS soledadescomiana;
create database soledadescomiana;
\c soledadescomiana
CREATE USER soledad WITH PASSWORD 'n0m3l0';
ALTER ROLE soledad WITH SUPERUSER; 
create table materia(
idmateria int primary key,
nombre varchar(70));

create table juego(
idjuego int primary key,
nombre varchar(70),
fecha_lanzamiento date,
descripcion varchar(90));

create table privilegio(
idprivilegio SERIAL primary key,
nombre varchar(60)
);

create table lugar(
idlugar int primary key,
nombre varchar(50),
descripcion varchar(100));


create table calendario(
idcalendario int primary key,
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
idactividad int primary key,fec_actividad timestamp,
idcalendario int references calendario(idcalendario),
idusuario int references usuario(idusuario), idlugar int references lugar(idlugar)
);

create table actividad_materias(
idactividad int references actividad(idactividad),
idmateria int references materia(idmateria),
primary key(idactividad,idmateria));

create table actividad_juegos(
idjuego int references juego(idjuego),
idactividad int references actividad(idactividad),
primary key (idactividad,idjuego));

create table actividad_catalogoactividad(
idactividad int references actividad(idactividad),
idcatalogo int references catalogo_actividad(idcatalogo),
primary key(idactividad,idcatalogo)
);

CREATE TABLE descripcio_lugar(
  idlugar int references lugar(idlugar),
  descripcion text
);

INSERT INTO privilegio (nombre) VALUES ('Usuario Mortal');
INSERT INTO privilegio (nombre) VALUES ('Admin');