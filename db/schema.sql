-- Script de creación de Base de Datos y Tabla Personas
-- Base de Datos
CREATE DATABASE IF NOT EXISTS arq_2026;
USE arq_2026;

-- Tabla Personas
CREATE TABLE IF NOT EXISTS personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    edad INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de ejemplo (opcional)
INSERT INTO personas (nombre, email, edad) VALUES
('Juan García', 'juan@example.com', 28),
('María López', 'maria@example.com', 25),
('Carlos Pérez', 'carlos@example.com', 32),
('Carlos Paez', 'carlospaez@example.com', 58);


-- Tabla Bicicletas
CREATE TABLE IF NOT EXISTS bicicletas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    rodado INT NOT NULL,
    cantidadCambios INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de ejemplo (opcional)
INSERT INTO bicicletas (marca, modelo, rodado, cantidadCambios, color, precio) VALUES
('Trek', 'Marlin 5', 29, 21, 'Rojo', 850000.00),
('Venzo', 'Thorn', 26, 18, 'Negro', 420000.50),
('Specialized', 'Rockhopper', 27, 24, 'Azul', 1250000.00);
