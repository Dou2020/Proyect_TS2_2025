-- Active: 1742184625557@@127.0.0.1@3306@db_pmt
-- Active: 1742184625557@@127.0.0.1@3306

CREATE DATABASE IF NOT EXISTS `db_pmt`;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE estados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE usuarios (
    id VARCHAR(12) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    rol_id INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    estado_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (estado_id) REFERENCES estados(id) ON DELETE CASCADE
);

DROP Table usuarios;

INSERT INTO roles (nombre) VALUES 
('Administrador'),
('Supervisor'),
('Monitor');

INSERT INTO estados (nombre) VALUES 
('activo'),
('inactivo');

INSERT INTO usuarios (id, nombre, rol_id, password, estado_id) VALUES 
('user1', 'Admin', 1, '$2y$10$PsWOpPouv4xO883CXlej2Ov4/t3kTRlmi4XRonZlENHMSoFE35rUe', 1),
('user2', 'Admin', 2, '$2y$10$PsWOpPouv4xO883CXlej2Ov4/t3kTRlmi4XRonZlENHMSoFE35rUe', 1),
('user3', 'Admin', 3, '$2y$10$PsWOpPouv4xO883CXlej2Ov4/t3kTRlmi4XRonZlENHMSoFE35rUe', 1);


SELECT * FROM usuarios;
SELECT id FROM usuarios WHERE id = 'user1';
SELECT * FROM usuarios WHERE id = 'user1' AND password = '1234';

SELECT a.id AS id ,a.nombre AS nombre, b.nombre AS rol_id FROM usuarios a JOIN roles b ON a.rol_id = b.id

CREATE TABLE Sentido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    direccion VARCHAR(12) NOT NULL,
    UNIQUE(direccion)
);

INSERT INTO Sentido (direccion) VALUES 
('Norte'),
('Sur'),
('Este'),
('Oeste');

CREATE TABLE Calle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    sentido VARCHAR(12) NOT NULL,
    UNIQUE(nombre),
    FOREIGN KEY (sentido) REFERENCES Sentido(direccion) ON DELETE CASCADE
);

INSERT INTO `Calle` (`id`, `nombre`, `sentido`) VALUES
(1, 'Calle 1', 'Norte'),
(2, 'Calle 2', 'Sur'),
(3, 'Calle 3', 'Este'),
(4, 'Calle 4', 'Oeste');

CREATE TABLE Avenida (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    sentido VARCHAR(12) NOT NULL,
    UNIQUE(nombre),
    FOREIGN KEY (sentido) REFERENCES Sentido(direccion) ON DELETE CASCADE
);
INSERT INTO `Avenida` (`id`, `nombre`, `sentido`) VALUES
(1, 'Avenida 1', 'Norte'),
(2, 'Avenida 2', 'Sur'),
(3, 'Avenida 3', 'Este'),
(4, 'Avenida 4', 'Oeste');

CREATE TABLE Interseccion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    calle_id INT NOT NULL,
    avenida_id INT NOT NULL,
    latitud DECIMAL(9,6),
    longitud DECIMAL(9,6),
    FOREIGN KEY (calle_id) REFERENCES Calle(id) ON DELETE CASCADE,
    FOREIGN KEY (avenida_id) REFERENCES Avenida(id) ON DELETE CASCADE,
    UNIQUE(calle_id, avenida_id)
);

INSERT INTO `Interseccion`(calle_id, avenida_id, latitud, longitud) VALUES
(1, 1, 19.432608, -99.133209),
(2, 2, 19.427025, -99.167665),
(3, 3, 19.428470, -99.127662),
(4, 4, 19.426726, -99.135346)


CREATE TABLE Semaforo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    calle_id INT,
    avenida_id INT,
    direccion ENUM('Norte', 'Sur', 'Este', 'Oeste') NOT NULL,
    estado ENUM('Rojo', 'Amarillo', 'Verde') NOT NULL DEFAULT 'Rojo',
    FOREIGN KEY (calle_id) REFERENCES Calle(id) ON DELETE CASCADE,
    FOREIGN KEY (avenida_id) REFERENCES Avenida(id) ON DELETE CASCADE
);
