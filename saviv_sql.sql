-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2020 a las 17:58:35
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saviv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `NOMBRE_DEPARTAMENTO` varchar(100) DEFAULT NULL,
  `ID_GERENTE` int(11) DEFAULT NULL,
  `ID_UBICACION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`ID_DEPARTAMENTO`, `NOMBRE_DEPARTAMENTO`, `ID_GERENTE`, `ID_UBICACION`) VALUES
(1, 'Desarrollo', 1, 1),
(2, 'SEO', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_vendedores`
--

CREATE TABLE `dt_vendedores` (
  `id` int(11) NOT NULL,
  `vendedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dt_vendedores`
--

INSERT INTO `dt_vendedores` (`id`, `vendedor`) VALUES
(1, 'Luz'),
(2, 'Gina'),
(3, 'Jorge'),
(4, 'Macarena'),
(5, 'Marian'),
(6, 'Wendy'),
(7, 'Eliana'),
(8, 'Gloria'),
(9, 'Leidy'),
(10, 'Diana'),
(11, 'Ingrid'),
(12, 'Lissette'),
(13, 'Jessica'),
(14, 'Jhon'),
(15, 'Daniel'),
(16, 'German'),
(17, 'Angela'),
(18, 'Jonathan'),
(19, 'Johanna'),
(20, 'Yurley'),
(21, 'Eulalia'),
(22, 'Carolina'),
(23, 'Jaime'),
(24, 'Janeth'),
(25, 'Isis'),
(26, 'Paola'),
(27, 'Cristian'),
(28, 'Leidi'),
(29, 'Yolanda'),
(30, 'Ivonne'),
(31, 'Eder'),
(32, 'Pepe'),
(33, 'Cesar'),
(34, 'Andres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `TELEFONO` varchar(10) DEFAULT NULL,
  `FECHA_CONTRATACION` date DEFAULT NULL,
  `ID_TRABAJO` int(11) DEFAULT NULL,
  `SALARIO` varchar(10) DEFAULT NULL,
  `PORC_COMISION` int(11) DEFAULT NULL,
  `ID_GERENTE` int(11) DEFAULT NULL,
  `ID_DEPARTAMENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID_EMPLEADO`, `NOMBRE`, `APELLIDO`, `EMAIL`, `TELEFONO`, `FECHA_CONTRATACION`, `ID_TRABAJO`, `SALARIO`, `PORC_COMISION`, `ID_GERENTE`, `ID_DEPARTAMENTO`) VALUES
(1, 'Eliecer', 'Vasquez', 'eliecervasquez94@hotmail.com', '3105421158', '2020-02-25', 1, '2300000', 10, 1, 1),
(2, 'David', 'Rodriguez', 'david@hotmail.com', '3100000000', '2020-02-25', 1, '1500000', 10, 1, 2),
(3, 'Kevin', 'Simanca', 'kevin@gmail.com', '3000000000', '2020-02-25', 1, '2000000', 45, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `dt_vendedores`
--
ALTER TABLE `dt_vendedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_EMPLEADO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `ID_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dt_vendedores`
--
ALTER TABLE `dt_vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
