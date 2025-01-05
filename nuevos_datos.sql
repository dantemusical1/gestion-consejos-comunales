-- Tabla de login
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(20) NOT NULL,
  `segundo_nombre` varchar(20) NOT NULL,
  `primer_apellido` varchar(20) NOT NULL,
  `segundo_apellido` varchar(20) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `usu` varchar(12) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `pass_plain` varchar(255) NOT NULL,
  `rol` varchar(12) NOT NULL,
  `id_red` INT,  -- Nueva columna para el consejo comunal
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_red`) REFERENCES redes(`id_redes`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
    `id_red` INT,  -- Nueva columna para el consejo comunal
    FOREIGN KEY (`id_red`) REFERENCES redes(`id_redes`) ON DELETE SET NULL
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


--Tipo de Cilindro de gas
CREATE TABLE tipo_cilindro (
    id_cilindro INT AUTO_INCREMENT PRIMARY KEY,
    tipo_cilindro VARCHAR(50) NOT NULL,  -- Aumenté el tamaño para permitir nombres más largos
    peso_cilindro DECIMAL(5,2) NOT NULL  -- Asegúrate de que el peso tenga sentido en este formato
);

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