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
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    rol_id INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    estado_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (estado_id) REFERENCES estados(id) ON DELETE CASCADE
);

INSERT INTO roles (nombre) VALUES 
('Administrador'),
('Supervisor'),
('Monitor');

INSERT INTO estados (nombre) VALUES 
('activo'),
('inactivo');

INSERT INTO usuarios (nombre, apellido, rol_id, password, estado_id) VALUES 
('Admin', 'Admin', 1, 'admin123', 1),
('Supervisor', 'Admin', 2, 'supervisor123', 1),
('Monitor', 'Admin', 3, 'monitor123', 1);