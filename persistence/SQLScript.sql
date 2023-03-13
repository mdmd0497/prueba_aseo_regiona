CREATE TABLE Administrador (
	idAdministrador int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	foto varchar(45) DEFAULT NULL,
	telefono varchar(45) DEFAULT NULL,
	celular varchar(45) DEFAULT NULL,
	estado tinyint DEFAULT NULL,
	PRIMARY KEY (idAdministrador)
);

INSERT INTO Administrador(idAdministrador, nombre, apellido, correo, clave, telefono, celular, estado) VALUES 
	('1', 'Admin', 'Admin', 'admin@udistrital.edu.co', md5('123'), '123', '123', '1'); 

CREATE TABLE LogAdministrador (
	idLogAdministrador int(11) NOT NULL AUTO_INCREMENT,
	accion varchar(45) NOT NULL,
	informacion text NOT NULL,
	fecha date NOT NULL,
	hora time NOT NULL,
	ip varchar(45) NOT NULL,
	so varchar(45) NOT NULL,
	explorador varchar(45) NOT NULL,
	administrador_idAdministrador int(11) NOT NULL,
	PRIMARY KEY (idLogAdministrador)
);

CREATE TABLE Rutas (
	idRutas int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(200) NOT NULL,
	codigo int NOT NULL,
	PRIMARY KEY (idRutas)
);

CREATE TABLE LogClientes (
	idLogClientes int(11) NOT NULL AUTO_INCREMENT,
	accion varchar(45) NOT NULL,
	informacion text NOT NULL,
	fecha date NOT NULL,
	hora time NOT NULL,
	ip varchar(45) NOT NULL,
	so varchar(45) NOT NULL,
	explorador varchar(45) NOT NULL,
	clientes_idClientes int(11) NOT NULL,
	PRIMARY KEY (idLogClientes)
);

CREATE TABLE Clientes (
	idClientes int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	foto varchar(45) DEFAULT NULL,
	documento varchar(45) DEFAULT NULL,
	telefono varchar(200) DEFAULT NULL,
	latitud varchar(200) DEFAULT NULL,
	longitud varchar(200) DEFAULT NULL,
	dblp varchar(200) DEFAULT NULL,
	linkedIn varchar(200) DEFAULT NULL,
	twitter varchar(200) DEFAULT NULL,
	state tinyint NOT NULL,
	rutas_idRutas int(11) NOT NULL,
	PRIMARY KEY (idClientes)
);

ALTER TABLE LogAdministrador
 	ADD FOREIGN KEY (administrador_idAdministrador) REFERENCES Administrador (idAdministrador); 

ALTER TABLE LogClientes
 	ADD FOREIGN KEY (clientes_idClientes) REFERENCES Clientes (idClientes); 

ALTER TABLE Clientes
 	ADD FOREIGN KEY (rutas_idRutas) REFERENCES Rutas (idRutas); 

