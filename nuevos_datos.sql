-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS consejos_comunales;
USE consejos_comunales;

-- Tabla de estados
CREATE TABLE estados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla de municipios
CREATE TABLE municipios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    estado_id INT,
    FOREIGN KEY (estado_id) REFERENCES estados(id) ON DELETE CASCADE
);

-- Tabla de comunas
CREATE TABLE comunas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    municipio_id INT,
    FOREIGN KEY (municipio_id) REFERENCES municipios(id) ON DELETE CASCADE
);

-- Tabla de consejos comunales
CREATE TABLE consejos_comunales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    comuna_id INT,
    FOREIGN KEY (comuna_id) REFERENCES comunas(id) ON DELETE CASCADE
);

-- Tabla de redes
CREATE TABLE redes (
    id_redes INT AUTO_INCREMENT PRIMARY KEY,
    Estado VARCHAR(100) NOT NULL, 
    Municipio VARCHAR(100) NOT NULL,
    aldea VARCHAR(100) NOT NULL,
    consejo_comunal VARCHAR(100) NOT NULL,
    pag_web VARCHAR(255),
    facebook VARCHAR(255),
    whatsapp VARCHAR(50)
);

-- Tabla de login
CREATE TABLE login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    primer_nombre VARCHAR(20) NOT NULL,
    segundo_nombre VARCHAR(20),
    primer_apellido VARCHAR(20) NOT NULL,
    segundo_apellido VARCHAR(20),
    correo VARCHAR(25) NOT NULL,
    usu VARCHAR(12) NOT NULL,
    pass VARCHAR(225) NOT NULL,
    pass_plain VARCHAR(255) NOT NULL,
    rol VARCHAR(12) NOT NULL,
    id_red INT,
    FOREIGN KEY (id_red) REFERENCES redes(id_redes) ON DELETE SET NULL
);

-- Tabla de jefes de familia
CREATE TABLE jefes_familia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    primer_nombre VARCHAR(50) NOT NULL,
    segundo_nombre VARCHAR(50),
    primer_apellido VARCHAR(50) NOT NULL,
    segundo_apellido VARCHAR(50),
    nacionalidad ENUM('V', 'E') NOT NULL,
    cedula VARCHAR(11) UNIQUE NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    nro_casa VARCHAR(10) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(15),
    id_red INT,
    FOREIGN KEY (id_red) REFERENCES redes(id_redes) ON DELETE SET NULL
);

-- Tabla de miembros de la familia
CREATE TABLE miembros_familia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_jefe_familia INT,
    primer_nombre VARCHAR(50) NOT NULL,
    segundo_nombre VARCHAR(50),
    primer_apellido VARCHAR(50) NOT NULL,
    segundo_apellido VARCHAR(50),
    cedula VARCHAR(11) UNIQUE NOT NULL,
    FOREIGN KEY (id_jefe_familia) REFERENCES jefes_familia(id) ON DELETE CASCADE
);

-- Tabla de cargas familiares
CREATE TABLE cargas_familiares (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_jefe_familia INT,
    primer_nombre VARCHAR(50) NOT NULL,
    segundo_nombre VARCHAR(50),
    primer_apellido VARCHAR(50) NOT NULL,
    segundo_apellido VARCHAR(50),
    FOREIGN KEY (id_jefe_familia) REFERENCES jefes_familia(id) ON DELETE CASCADE
);

-- Tabla de miembros del consejo comunal
CREATE TABLE miembro_consejo_comunal (
    id_miembro INT AUTO_INCREMENT PRIMARY KEY,
    primer_nombre VARCHAR(50) NOT NULL,
    segundo_nombre VARCHAR(50),
    primer_apellido VARCHAR(50) NOT NULL,
    segundo_apellido VARCHAR(50),
    cedula VARCHAR(11) UNIQUE NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    nro_casa VARCHAR(10) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(15),
    tipo ENUM('jefe_familia', 'miembro_familia') NOT NULL
);

-- Tabla de historial de entregas de CLAP
CREATE TABLE historial_entregas_clap (
    id_entrega INT AUTO_INCREMENT PRIMARY KEY,
    id_miembro INT,
    id_jefe_familia INT,
    fecha_entrega DATE NOT NULL,
    nro_casa VARCHAR(10) NOT NULL,
    detalles VARCHAR(255),
    FOREIGN KEY (id_miembro) REFERENCES miembro_consejo_comunal(id_miembro) ON DELETE CASCADE,
    FOREIGN KEY (id_jefe_familia) REFERENCES jefes_familia(id) ON DELETE CASCADE
);

-- Tabla de tipo de cilindro de gas
CREATE TABLE tipo_cilindro (
    id_cilindro INT AUTO_INCREMENT PRIMARY KEY,
    tipo_cilindro VARCHAR(50) NOT NULL,
    peso_cilindro DECIMAL(5,2) NOT NULL
);

-- Tabla de historial de entregas de cilindros
CREATE TABLE historial_entregas_cilindros (
    id_entrega INT AUTO_INCREMENT PRIMARY KEY,
    id_miembro INT,
    id_jefe_familia INT,
    fecha_entrega DATE NOT NULL,
    nro_casa VARCHAR(10) NOT NULL,
    detalles VARCHAR(255),
    id_cilindro INT,  -- Referencia al tipo de cilindro
    FOREIGN KEY (id_miembro) REFERENCES miembro_consejo_comunal(id_miembro) ON DELETE CASCADE,
    FOREIGN KEY (id_jefe_familia) REFERENCES jefes_familia(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cilindro) REFERENCES tipo_cilindro(id_cilindro) ON DELETE CASCADE  -- Relación con tipo_cilindro
);