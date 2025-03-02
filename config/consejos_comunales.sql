-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-03-2025 a las 16:47:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consejos_comunales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aldeas`
--

CREATE TABLE `aldeas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `municipio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargas_familiares`
--

CREATE TABLE `cargas_familiares` (
  `id` int(11) NOT NULL,
  `id_jefe_familia` int(11) DEFAULT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consejos_comunales`
--

CREATE TABLE `consejos_comunales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `comuna_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Merida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_entregas_cilindros`
--

CREATE TABLE `historial_entregas_cilindros` (
  `id_entrega` int(11) NOT NULL,
  `id_miembro` int(11) DEFAULT NULL,
  `id_jefe_familia` int(11) DEFAULT NULL,
  `fecha_entrega` date NOT NULL,
  `nro_casa` varchar(10) NOT NULL,
  `detalles` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_cilindro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_entregas_cilindros`
--

INSERT INTO `historial_entregas_cilindros` (`id_entrega`, `id_miembro`, `id_jefe_familia`, `fecha_entrega`, `nro_casa`, `detalles`, `precio`, `id_cilindro`) VALUES
(98, 2, 2, '2025-02-13', '1234', 'detalles', 12.00, 2),
(99, 4, 5, '2025-02-25', '3456', 'entrega ', 44.00, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_entregas_clap`
--

CREATE TABLE `historial_entregas_clap` (
  `id_entrega` int(11) NOT NULL,
  `id_miembro` int(11) DEFAULT NULL,
  `id_jefe_familia` int(11) DEFAULT NULL,
  `fecha_entrega` date NOT NULL,
  `nro_casa` varchar(10) NOT NULL,
  `detalles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_entregas_clap`
--

INSERT INTO `historial_entregas_clap` (`id_entrega`, `id_miembro`, `id_jefe_familia`, `fecha_entrega`, `nro_casa`, `detalles`) VALUES
(12, 2, 1, '2025-02-01', 'A1', 'Entrega de CLAP Febrero'),
(13, 3, 1, '2025-03-01', 'A1', 'Entrega de CLAP Marzo'),
(14, 4, 1, '2025-04-01', 'A1', 'Entrega de CLAP Abril'),
(15, 5, 1, '2025-05-01', 'A1', 'Entrega de CLAP Mayo'),
(16, 6, 1, '2025-06-01', 'A1', 'Entrega de CLAP Junio'),
(17, 7, 2, '2025-01-01', 'B2', 'Entrega de CLAP Enero'),
(18, 8, 2, '2025-02-01', 'B2', 'Entrega de CLAP Febrero'),
(19, 9, 2, '2025-03-01', 'B2', 'Entrega de CLAP Marzo'),
(20, 10, 2, '2025-04-01', 'B2', 'Entrega de CLAP Abril'),
(21, 4, 3, '2025-02-25', 'C3', 'bolsa'),
(22, 3, 1, '2025-02-24', 'A1', 'bolsa'),
(23, 3, 1, '2025-02-24', 'A1', 'bolsa'),
(24, 3, 1, '2025-02-24', 'A1', 'bolsa'),
(25, 3, 1, '2025-02-24', 'A1', 'bolsa'),
(26, 3, 1, '2025-02-24', 'A1', 'bolsa'),
(27, 3, 1, '2025-02-24', 'A1', 'bolsa'),
(28, 2, 1, '2025-02-25', 'A1', 'bolsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes_familia`
--

CREATE TABLE `jefes_familia` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `nacionalidad` enum('V','E') NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `genero` tinytext NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `nro_casa` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `estado_de_discapacidad` tinytext NOT NULL,
  `id_red` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jefes_familia`
--

INSERT INTO `jefes_familia` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `nacionalidad`, `cedula`, `genero`, `direccion`, `nro_casa`, `email`, `telefono`, `estado_de_discapacidad`, `id_red`) VALUES
(1, 'Ana', 'Maria', 'Perez', 'Gomez', 'V', '12345678', '', 'Calle 1', 'A1', 'ana.perez@mail.com', '04121234567', '', NULL),
(2, 'Luis', 'Fernando', 'Lopez', 'Diaz', 'V', '87654321', '', 'Calle 2', 'B2', 'luis.lopez@mail.com', '04129876543', '', 2),
(3, 'Carla', 'Isabel', 'Martinez', 'Ruiz', 'V', '23456789', '', 'Calle 3', 'C3', 'carla.martinez@mail.com', '04122345678', '', 3),
(4, 'Jorge', 'Andres', 'Rodriguez', 'Torres', 'V', '98765432', '', 'Calle 4', 'D4', 'jorge.rodriguez@mail.com', '04129876544', '', NULL),
(5, 'Mariana', 'Victoria', 'Sanchez', 'Ramirez', 'V', '34567890', '', 'Calle 5', 'E5', 'mariana.sanchez@mail.com', '04123456789', '', 2),
(6, 'Pedro', 'Alberto', 'Mendoza', 'Garcia', 'V', '45678901', '', 'Calle 6', 'F6', 'pedro.mendoza@mail.com', '04124567890', '', 3),
(8, 'Sedric', 'Digori', 'Poter', 'Harry', 'V', '123456789', 'M', 'Mirabel', '1234', 'prueva@gmail.com', '123456789', 'NO', 2),
(9, 'Beyond', 'Birday', 'Guillermo', 'Carmen', 'V', '2899325', 'M', 'Casa frente al consejo comunal', '321-123', 'deltoro@gmail.com', '02749997325', 'NO', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(20) NOT NULL,
  `segundo_nombre` varchar(20) DEFAULT NULL,
  `primer_apellido` varchar(20) NOT NULL,
  `segundo_apellido` varchar(20) DEFAULT NULL,
  `correo` varchar(25) NOT NULL,
  `usu` varchar(12) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `pass_plain` varchar(255) NOT NULL,
  `rol` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `correo`, `usu`, `pass`, `pass_plain`, `rol`) VALUES
(21, 'Jesus', 'Medina', 'Medina', 'Ruz', 'jesuz@gmail.com', '30244875', '$2y$10$3Mdn8wgjUqp.40vOuZLKdO5ziJkrvLbQ0DZzeF3Tu3LTKLF79rzpq', '30244875', 'admin'),
(22, 'Jesus', 'Carmen', 'Medina ', 'Ruz', 'jesusdelcmedina@gmail.com', '26198748', '$2y$10$U0DQNahdv35xYLUfJqE04.D6hR34BaCBtKThPDjnmIFYm1jc2uU9.', 'medina', 'admin'),
(23, 'Victor', 'Adrian', 'Guillen', 'Ramirez', 'dantemusical1@gmail.com', '27905225', '$2y$10$uqH812.Vck3eIL1y9V7EremE4NpTBKWAhzZ3CQeNpySG0aUp.bhn.', 'dragones1', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros_familia`
--

CREATE TABLE `miembros_familia` (
  `id` int(11) NOT NULL,
  `id_jefe_familia` int(11) DEFAULT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `cedula` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembros_familia`
--

INSERT INTO `miembros_familia` (`id`, `id_jefe_familia`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cedula`) VALUES
(1, 1, 'Ana', 'Maria', 'Perez', 'Gomez', '22345678'),
(2, 1, 'Luis', 'Fernando', 'Perez', 'Gomez', '32345678'),
(3, 1, 'Carlos', 'Eduardo', 'Perez', 'Gomez', '42345678'),
(4, 1, 'Sofia', 'Gabriela', 'Perez', 'Gomez', '52345678'),
(5, 1, 'Diego', 'Alejandro', 'Perez', 'Gomez', '62345678'),
(6, 1, 'Laura', 'Camila', 'Perez', 'Gomez', '72345678'),
(7, 2, 'Luis', 'Fernando', 'Lopez', 'Diaz', '27345678'),
(8, 2, 'Carla', 'Isabel', 'Lopez', 'Diaz', '37345678'),
(9, 2, 'Jorge', 'Andres', 'Lopez', 'Diaz', '47345678'),
(10, 2, 'Mariana', 'Victoria', 'Lopez', 'Diaz', '57345678'),
(11, 2, 'Pedro', 'Alberto', 'Lopez', 'Diaz', '67345678'),
(12, 2, 'Sofia', 'Gabriela', 'Lopez', 'Diaz', '77345678'),
(13, 3, 'Carla', 'Isabel', 'Martinez', 'Ruiz', '28345678'),
(14, 3, 'Jorge', 'Andres', 'Martinez', 'Ruiz', '38345678'),
(15, 3, 'Mariana', 'Victoria', 'Martinez', 'Ruiz', '48345678'),
(16, 3, 'Pedro', 'Alberto', 'Martinez', 'Ruiz', '58345678'),
(17, 3, 'Sofia', 'Gabriela', 'Martinez', 'Ruiz', '68345678'),
(18, 3, 'Diego', 'Alejandro', 'Martinez', 'Ruiz', '78345678'),
(19, 4, 'Jorge', 'Andres', 'Rodriguez', 'Torres', '29345678'),
(20, 4, 'Mariana', 'Victoria', 'Rodriguez', 'Torres', '39345678'),
(21, 4, 'Pedro', 'Alberto', 'Rodriguez', 'Torres', '49345678'),
(22, 4, 'Sofia', 'Gabriela', 'Rodriguez', 'Torres', '59345678'),
(23, 4, 'Diego', 'Alejandro', 'Rodriguez', 'Torres', '69345678'),
(24, 4, 'Laura', 'Camila', 'Rodriguez', 'Torres', '79345678'),
(25, 5, 'Mariana', 'Victoria', 'Sanchez', 'Ramirez', '30345678'),
(26, 5, 'Pedro', 'Alberto', 'Sanchez', 'Ramirez', '40345678'),
(27, 5, 'Sofia', 'Gabriela', 'Sanchez', 'Ramirez', '50345678'),
(28, 5, 'Diego', 'Alejandro', 'Sanchez', 'Ramirez', '60345678'),
(29, 5, 'Laura', 'Camila', 'Sanchez', 'Ramirez', '70345678'),
(30, 5, 'Luis', 'Fernando', 'Sanchez', 'Ramirez', '80345678'),
(31, 6, 'Pedro', 'Alberto', 'Mendoza', 'Garcia', '31345678'),
(32, 6, 'Sofia', 'Gabriela', 'Mendoza', 'Garcia', '41345678'),
(33, 6, 'Diego', 'Alejandro', 'Mendoza', 'Garcia', '51345678'),
(34, 6, 'Laura', 'Camila', 'Mendoza', 'Garcia', '61345678'),
(35, 6, 'Luis', 'Fernando', 'Mendoza', 'Garcia', '71345678'),
(36, 6, 'Ana', 'Maria', 'Mendoza', 'Garcia', '81345678'),
(37, 2, 'luis ', 'lalo', 'lopex', 'lopez', '123456789'),
(38, 2, 'luis ', 'lalo', 'lopex', 'lopez', '123456798');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro_consejo_comunal`
--

CREATE TABLE `miembro_consejo_comunal` (
  `id_miembro` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `cedula` varchar(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `nro_casa` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `cargo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembro_consejo_comunal`
--

INSERT INTO `miembro_consejo_comunal` (`id_miembro`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cedula`, `direccion`, `nro_casa`, `email`, `telefono`, `cargo`) VALUES
(2, 'Luis', 'Fernando', 'Lopez', 'Diaz', '87654321', 'Calle 2', 'B2', 'luis.lopez@mail.com', '04129876543', ''),
(3, 'Carly', 'Isabel', 'Martinez', 'Ruiz', '23456789', 'Calle 3', 'C3', 'carla.martinez@mail.com', '04122345678', 'Vocal'),
(4, 'Jorge', 'Andres', 'Rodriguez', 'Torres', '98765432', 'Calle 4', 'D4', 'jorge.rodriguez@mail.com', '04129876544', ''),
(5, 'Mariana', 'Victoria', 'Sanchez', 'Ramirez', '34567890', 'Calle 5', 'E5', 'mariana.sanchez@mail.com', '04123456789', ''),
(6, 'Pedro', 'Alberto', 'Mendoza', 'Garcia', '45678901', 'Calle 6', 'F6', 'pedro.mendoza@mail.com', '04124567890', ''),
(7, 'Ana', 'Maria', 'Perez', 'Gomez', '22345678', 'Calle 1', 'A1', 'ana.perez2@mail.com', '04121234568', ''),
(8, 'Luis', 'Fernando', 'Lopez', 'Diaz', '27345678', 'Calle 2', 'B2', 'luis.lopez2@mail.com', '04129876545', ''),
(9, 'Carla', 'Isabel', 'Martinez', 'Ruiz', '28345678', 'Calle 3', 'C3', 'carla.martinez2@mail.com', '04122345679', ''),
(10, 'Jorge', 'Andres', 'Rodriguez', 'Torres', '8234567', 'Calle 4', 'D4', 'jorge.rodriguez2@mail.com', '04129876546', 'Vocal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`, `estado_id`) VALUES
(1, 'Mérida', 1),
(2, 'Alberto Adriani', 1),
(3, 'Andrés Bello', 1),
(4, 'Antonio Pinto Salinas', 1),
(5, 'Campo Elías Delgado', 1),
(6, 'Cardenal Quintero', 1),
(7, 'Chiguará', 1),
(8, 'El Morro', 1),
(9, 'El Vigía', 1),
(10, 'José Ramón Yépez', 1),
(11, 'La Fría', 1),
(12, 'Mucuchíes', 1),
(13, 'Mucurubá', 1),
(14, 'Pueblo Llano', 1),
(15, 'Rangel', 1),
(16, 'Santo Domingo', 1),
(17, 'Tovar', 1),
(18, 'Zea', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE `redes` (
  `id_redes` int(11) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Municipio` varchar(100) NOT NULL,
  `aldea` varchar(100) NOT NULL,
  `consejo_comunal` varchar(100) NOT NULL,
  `pag_web` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `redes`
--

INSERT INTO `redes` (`id_redes`, `Estado`, `Municipio`, `aldea`, `consejo_comunal`, `pag_web`, `facebook`, `whatsapp`) VALUES
(2, 'Merida', 'Andres Bello', 'Mirabel', 'Consejo Comunal de Mirabel', 'http://web2.com', 'facebook.com/cc2', '04129876543'),
(3, 'Monagas', 'Maturín', 'Aldea 3', 'Consejo Comunal 3', 'http://web3.com', 'facebook.com/cc3', '04122345678'),
(4, 'Monagas', 'Maturín', 'Aldea 4', 'Consejo Comunal 4', 'http://web4.com', 'facebook.com/cc4', '04129876544'),
(5, 'Monagas', 'Maturín', 'Aldea 5', 'Consejo Comunal 5', 'http://web5.com', 'facebook.com/cc5', '04123456789'),
(6, 'Monagas', 'Maturín', 'Aldea 6', 'Consejo Comunal 6', 'http://web6.com', 'facebook.com/cc6', '04124567890'),
(7, 'Monagas', 'Maturín', 'Aldea 7', 'Consejo Comunal 7', 'http://web7.com', 'facebook.com/cc7', '04125678901'),
(8, 'Monagas', 'Maturín', 'Aldea 8', 'Consejo Comunal 8', 'http://web8.com', 'facebook.com/cc8', '04126789012'),
(9, 'Monagas', 'Maturín', 'Aldea 9', 'Consejo Comunal 9', 'http://web9.com', 'facebook.com/cc9', '04127890123'),
(11, 'MERIDA', 'ANDRES BELLO', 'MIRABEL', 'BELLA VISTA', '', '', '581234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cilindro`
--

CREATE TABLE `tipo_cilindro` (
  `id_cilindro` int(11) NOT NULL,
  `tipo_cilindro` varchar(50) NOT NULL,
  `peso_cilindro` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_cilindro`
--

INSERT INTO `tipo_cilindro` (`id_cilindro`, `tipo_cilindro`, `peso_cilindro`) VALUES
(1, 'Gas Propano 10Kg', 10.00),
(2, 'Gas Propano 18Kg', 18.00),
(3, 'Gas Propano 27Kg', 27.00),
(4, 'Gas Propano 43Kg', 43.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aldeas`
--
ALTER TABLE `aldeas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `cargas_familiares`
--
ALTER TABLE `cargas_familiares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jefe_familia` (`id_jefe_familia`);

--
-- Indices de la tabla `consejos_comunales`
--
ALTER TABLE `consejos_comunales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comuna_id` (`comuna_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_entregas_cilindros`
--
ALTER TABLE `historial_entregas_cilindros`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `id_miembro` (`id_miembro`),
  ADD KEY `id_jefe_familia` (`id_jefe_familia`),
  ADD KEY `id_cilindro` (`id_cilindro`);

--
-- Indices de la tabla `historial_entregas_clap`
--
ALTER TABLE `historial_entregas_clap`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `id_miembro` (`id_miembro`),
  ADD KEY `id_jefe_familia` (`id_jefe_familia`);

--
-- Indices de la tabla `jefes_familia`
--
ALTER TABLE `jefes_familia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_red` (`id_red`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `miembros_familia`
--
ALTER TABLE `miembros_familia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_jefe_familia` (`id_jefe_familia`);

--
-- Indices de la tabla `miembro_consejo_comunal`
--
ALTER TABLE `miembro_consejo_comunal`
  ADD PRIMARY KEY (`id_miembro`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`id_redes`);

--
-- Indices de la tabla `tipo_cilindro`
--
ALTER TABLE `tipo_cilindro`
  ADD PRIMARY KEY (`id_cilindro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aldeas`
--
ALTER TABLE `aldeas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargas_familiares`
--
ALTER TABLE `cargas_familiares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consejos_comunales`
--
ALTER TABLE `consejos_comunales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historial_entregas_cilindros`
--
ALTER TABLE `historial_entregas_cilindros`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `historial_entregas_clap`
--
ALTER TABLE `historial_entregas_clap`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `jefes_familia`
--
ALTER TABLE `jefes_familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `miembros_familia`
--
ALTER TABLE `miembros_familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `miembro_consejo_comunal`
--
ALTER TABLE `miembro_consejo_comunal`
  MODIFY `id_miembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `redes`
--
ALTER TABLE `redes`
  MODIFY `id_redes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_cilindro`
--
ALTER TABLE `tipo_cilindro`
  MODIFY `id_cilindro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aldeas`
--
ALTER TABLE `aldeas`
  ADD CONSTRAINT `aldeas_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cargas_familiares`
--
ALTER TABLE `cargas_familiares`
  ADD CONSTRAINT `cargas_familiares_ibfk_1` FOREIGN KEY (`id_jefe_familia`) REFERENCES `jefes_familia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `consejos_comunales`
--
ALTER TABLE `consejos_comunales`
  ADD CONSTRAINT `consejos_comunales_ibfk_1` FOREIGN KEY (`comuna_id`) REFERENCES `aldeas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_entregas_cilindros`
--
ALTER TABLE `historial_entregas_cilindros`
  ADD CONSTRAINT `historial_entregas_cilindros_ibfk_1` FOREIGN KEY (`id_miembro`) REFERENCES `miembro_consejo_comunal` (`id_miembro`) ON DELETE CASCADE,
  ADD CONSTRAINT `historial_entregas_cilindros_ibfk_2` FOREIGN KEY (`id_jefe_familia`) REFERENCES `jefes_familia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historial_entregas_cilindros_ibfk_3` FOREIGN KEY (`id_cilindro`) REFERENCES `tipo_cilindro` (`id_cilindro`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_entregas_clap`
--
ALTER TABLE `historial_entregas_clap`
  ADD CONSTRAINT `historial_entregas_clap_ibfk_1` FOREIGN KEY (`id_miembro`) REFERENCES `miembro_consejo_comunal` (`id_miembro`) ON DELETE CASCADE,
  ADD CONSTRAINT `historial_entregas_clap_ibfk_2` FOREIGN KEY (`id_jefe_familia`) REFERENCES `jefes_familia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `miembros_familia`
--
ALTER TABLE `miembros_familia`
  ADD CONSTRAINT `miembros_familia_ibfk_1` FOREIGN KEY (`id_jefe_familia`) REFERENCES `jefes_familia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
