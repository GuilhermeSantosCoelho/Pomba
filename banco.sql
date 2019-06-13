CREATE DATABASE if not exists dbpomba;
USE dbpomba;

CREATE TABLE if not exists pomber (
username varchar(15) not null primary key,
senha varchar(15) not null,
email varchar(200),
nome varchar(200) not null,
foto varchar(500),
capa varchar(500)
);

CREATE TABLE if not exists pomba (
id int not null auto_increment primary key,
texto VARCHAR(141) not null,
data_hora timestamp not null default current_timestamp,
username varchar(30) not null,
foreign key (username) references pomber (username)
);

create table if not exists comentario(
id int primary key auto_increment,
pomba_id int not null, 
pomber_username varchar(15) not null,
comentario varchar(300),
foreign key(pomba_id) references pomba(id)
);

CREATE TABLE if not exists seguidor (
id int not null auto_increment primary key,
seguidor varchar(30) not null,
seguido varchar(30) not null,
foreign key (seguidor) references pomber (username),
foreign key (seguido) references pomber (username)
);
Select * from pomba;
/*
SELECT se.seguido, po.texto, po.data_hora
FROM pomba po
INNER JOIN seguidor se ON (po.username = se.seguido)
WHERE se.seguidor = 'amanda';
*/