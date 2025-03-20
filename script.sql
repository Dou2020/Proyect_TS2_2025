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
SELECT * FROM Avenida;

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
    estado_id INT NOT NULL,
    FOREIGN KEY (calle_id) REFERENCES Calle(id) ON DELETE CASCADE,
    FOREIGN KEY (avenida_id) REFERENCES Avenida(id) ON DELETE CASCADE,
    FOREIGN KEY (estado_id) REFERENCES estados(id) ON DELETE CASCADE,
    UNIQUE(calle_id, avenida_id)
);
DROP TABLE IF EXISTS Interseccion;

SELECT i.id, a.nombre AS avenida, c.nombre AS calle, latitud, longitud FROM Interseccion i JOIN `Avenida` a ON i.avenida_id = a.id
JOIN `Calle` c ON i.calle_id = c.id;

INSERT INTO `Interseccion`(calle_id, avenida_id, latitud, longitud,estado_id) VALUES
(1, 1, 19.432608, -99.133209,1),
(2, 2, 19.427025, -99.167665,1),
(3, 3, 19.428470, -99.127662,1),
(4, 4, 19.426726, -99.135346,1),
(1, 2, 19.430000, -99.140000,1),
(2, 3, 19.431000, -99.145000,1),
(3, 4, 19.432000, -99.150000,1),
(4, 1, 19.433000, -99.155000,1);


CREATE TABLE Semaforo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    calle_id INT,
    avenida_id INT,
    direccion ENUM('Norte', 'Sur', 'Este', 'Oeste') NOT NULL,
    estado ENUM('Rojo', 'Amarillo', 'Verde') NOT NULL DEFAULT 'Rojo',
    FOREIGN KEY (calle_id) REFERENCES Calle(id) ON DELETE CASCADE,
    FOREIGN KEY (avenida_id) REFERENCES Avenida(id) ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS direcciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    direccion VARCHAR(255) NOT NULL UNIQUE
);

INSERT INTO direcciones (direccion) VALUES 
('Norte-Sur'),
('Sur-Norte'),
('Oeste-Este'),
('Este-Oeste');

SELECT * FROM direcciones;

-- Crear tabla para Semáforos
CREATE TABLE IF NOT EXISTS semaforos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    direccion_id INT,
    interseccion_id INT,
    FOREIGN KEY (direccion_id) REFERENCES direcciones(id),
    FOREIGN KEY (interseccion_id) REFERENCES Interseccion(id)
);

CREATE TABLE IF NOT EXISTS interaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    semaforo_id INT,
    interseccion_id INT,
    FOREIGN KEY (semaforo_id) REFERENCES semaforos(id),
    FOREIGN KEY (interseccion_id) REFERENCES Interseccion(id)
);


-- Crear tabla para Vehículos
CREATE TABLE IF NOT EXISTS vehiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_vehiculo VARCHAR(255) NOT NULL UNIQUE,  -- "autos", "camiones", "motos", "bicicletas"
    marca VARCHAR(255),
    modelo VARCHAR(255),
    descripcion TEXT
);

-- Crear tabla para Flujos (relacionada con los vehículos)
CREATE TABLE IF NOT EXISTS flujos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    semaforo_id INT,
    vehiculo_id INT,
    flujo_1 INT,
    flujo_2 INT,
    flujo_3 INT,
    flujo_4 INT,
    FOREIGN KEY (semaforo_id) REFERENCES semaforos(id),
    FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
);

-- Crear tabla para Tiempos de Semáforo
CREATE TABLE IF NOT EXISTS tiempos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    semaforo_id INT,
    verde INT,
    amarillo INT,
    rojo INT,
    FOREIGN KEY (semaforo_id) REFERENCES semaforos(id)
);