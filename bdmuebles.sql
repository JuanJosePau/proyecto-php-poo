-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-02-2019 a las 17:15:02
-- Versión del servidor: 5.7.22-0ubuntu0.17.10.1
-- Versión de PHP: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmuebles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `direccion` varchar(35) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `nombres`, `dni`, `email`, `telefono`, `direccion`, `password`) VALUES
(2, 'lucero', '75542653', 'lu@hotmail.com', '054895456', 'arequipa', 'unanue'),
(3, 'fabiola', '45542653', 'fa@hotmail.com', '054894523', 'arequipa', 'unanue'),
(4, 'melamina', '46982346', 'me@hotmail.com', '054874613', 'arequipa', 'hipolito'),
(5, 'mat', '8888888', 'nose@hotmail.com', '111111', 'nose', '3333333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `idArea` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`idArea`, `descripcion`) VALUES
(2, 'metal'),
(3, 'plastico'),
(4, 'carton'),
(5, 'galletas'),
(6, 'carton'),
(7, 'carton'),
(8, 'melamina'),
(9, 'carton'),
(10, 'pintura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `denominacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `denominacion`) VALUES
(1, 'metales'),
(2, 'carton'),
(3, 'metales'),
(4, 'metales'),
(6, 'pintura'),
(7, 'Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombres`, `dni`, `email`, `telefono`, `direccion`) VALUES
(1, 'carolina', '46982346', 'caro@hotmail.com', '054874613', 'arequipa'),
(2, 'noe', '111111', 'nose@hotmail.com', '222222', '22222222'),
(3, 'melamina', '46982346', 'me@hotmail.com', '054874613', 'arequipa'),
(4, 'suly', '74444812', 'suli@hotmail.com', '054450480', 'arequipa'),
(5, 'mat', '6666666', 'nose@hotmail.com', '4444444444', 'socabaya');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `idDetalle` int(11) NOT NULL,
  `idVenta` varchar(50) NOT NULL,
  `idProducto` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`idDetalle`, `idVenta`, `idProducto`, `cantidad`, `precio`) VALUES
(1, '1', '1', '50', 100),
(2, '1', '3', '50', 100),
(3, '1', '4', '50', 100),
(4, '2', '2', '100', 50),
(5, '2', '5', '50', 40),
(6, '2', '3', '20', 80),
(7, '3', '3', '50', 100),
(8, '3', '2', '20', 40),
(9, '3', '5', '30', 30),
(10, '4', '1', '50', 100),
(11, '4', '3', '20', 100),
(12, '4', '5', '30', 30),
(16, '6', '2', '50', 100),
(17, '6', '3', '20', 40),
(18, '6', '5', '20', 30),
(19, '7', '2', '50', 50),
(20, '7', '4', '50', 40),
(21, '7', '5', '20', 30),
(22, '8', '2', '50', 100),
(23, '8', '5', '50', 100),
(24, '8', '3', '20', 30),
(25, '9', '2', '50', 100),
(26, '9', '3', '50', 80),
(27, '9', '5', '20', 30),
(28, '10', '5', '50', 100),
(29, '10', '2', '50', 40),
(30, '2', '2', '10', 10),
(32, '12', '1', '100', 100),
(33, '12', '3', '100', 100),
(34, '12', '5', '100', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perventas`
--

CREATE TABLE `perventas` (
  `idVen` int(11) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `direccion` varchar(35) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perventas`
--

INSERT INTO `perventas` (`idVen`, `nombres`, `dni`, `email`, `telefono`, `direccion`, `password`) VALUES
(1, 'david', '75559812', 'david@hotmail.com', '054455489', 'M.melgar', 'hipolito'),
(2, 'juan', '75542653', 'ria@hotmail.com', '054895456', 'arequipa', 'hipolito'),
(3, 'margarita', '45542653', 'mara@hotmail.com', '054894523', 'arequipa', 'hipolito'),
(4, 'luz', '74559812', 'luz@hotmail.com', '054450480', 'M.melgar', 'luz'),
(5, 'carina', '46982346', 'cari@hotmail.com', '054874624', 'M.melgar', 'hipolito'),
(6, 'kevin', '46982346', 'ke@hotmail.com', '054874613', 'M.melgar', 'hipolito'),
(7, 'camila', '75559812', 'cami@hotmail.com', '054455489', 'M.melgar', 'camila'),
(8, 'maria', '46982346', 'ma@hotmail.com', '054874613', 'M.melgar', 'hipolito'),
(9, 'camila', '75559812', 'cami@hotmail.com', '054455489', 'M.melgar', 'hipolito'),
(10, 'fabiola', '76982346', 'fa@hotmail.com', '054874624', 'M.melgar', 'hipolito'),
(11, 'mateo', '48617776', 'uniko@hotmai.com', '654', 'cayma', '5555555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `denominacion` varchar(20) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecVen` date DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `denominacion`, `precio`, `cantidad`, `fecVen`, `idCategoria`, `idProveedor`) VALUES
(1, 'metales', 10, 2, '2018-05-23', 1, 1),
(2, 'metales', 20, 5, '2018-05-09', 2, 2),
(3, 'carton', 10, 1, '2018-05-09', 3, 1),
(4, 'carton', 4, 5, '2018-05-03', 4, 4),
(5, 'madera', 90, 6, '2018-06-20', 5, 5),
(6, 'as', 50, 50, '2018-06-14', 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `denominacion` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `denominacion`, `direccion`, `telefono`) VALUES
(2, 'chocolates', 'arequipa', '054481623'),
(3, 'chocolates', 'cayma', '777'),
(4, 'golosinas', 'nazareno', '55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `fecVenta` date DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idVen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `fecVenta`, `idCliente`, `idVen`) VALUES
(1, '2018-10-03', 1, 1),
(2, '2018-10-03', 2, 4),
(3, '2018-10-03', 5, 7),
(4, '2018-10-03', 4, 5),
(6, '2018-10-03', 2, 4),
(7, '2018-10-03', 4, 8),
(8, '2018-10-03', 3, 4),
(9, '2018-10-03', 3, 10),
(10, '2018-10-03', 4, 4),
(12, '2019-02-24', 4, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`idArea`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`idDetalle`);

--
-- Indices de la tabla `perventas`
--
ALTER TABLE `perventas`
  ADD PRIMARY KEY (`idVen`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `perventas`
--
ALTER TABLE `perventas`
  MODIFY `idVen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
