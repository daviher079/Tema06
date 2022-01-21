create database mvc;
use mvc;


create table usuarios (
	codUsuario char(20) primary key,
	nombre varchar(75) not null,
	pass varchar(75) not null,
	perfil varchar(15) not null,
	fechaUltConexion date
) engine=innodb;



insert into usuarios (codUsuario, nombre, pass, perfil) values ('u1', 'Alfredo Ginés Areces', '356a192b7913b04c54574d18c28d46e6395428ab','ADM01');
insert into usuarios (codUsuario, nombre, pass, perfil) values ('u2', 'Javier Gracia Cubo', 'da4b9237bacccdf19c0760cab7aec4a8359010b0','P0001');
insert into usuarios (codUsuario, nombre, pass, perfil) values ('u3', 'Lucia Romera Ganso', '77de68daecd823babbb58edb1c8e14d7106e83bb','P0002');
insert into usuarios (codUsuario, nombre, pass, perfil) values ('u4', 'Marina Soler Leal', '1b6453892473a467d07372d45eb05abc2031647a','P0003');




