-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2021 a las 21:06:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comanda`
--
CREATE DATABASE IF NOT EXISTS `comanda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `comanda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `changelogs`
--

CREATE TABLE `changelogs` (
  `id` int(11) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `idTabla` varchar(10) NOT NULL,
  `nombreUsr` varchar(50) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `changelogs`
--

INSERT INTO `changelogs` (`id`, `tabla`, `idTabla`, `nombreUsr`, `accion`, `fecha`, `descripcion`) VALUES
(1, 'productos', '0', '0', 'Obtener datos', '0000-00-00', 'Datos de todos los productos'),
(2, 'productos', '0', '0', 'Obtener datos', '0000-00-00', 'Datos de todos los productos'),
(3, 'pedidos', '0', '0', 'Obtener datos', '0000-00-00', 'Datos de todos los pedidos'),
(4, 'pedidos', '1k86p', 'Pagado', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(5, 'pedidos', '1k86p', 'Pagado', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(6, 'pedidos', '2u6q1', 'Pagado', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(7, 'pedidos', '2u6q1', 'Pagado', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(8, 'pedidos', '2u6q1', 'Listo para servir', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(9, 'pedidos', '2u6q1', 'Listo para servir', 'Actualizar datos', '0000-00-00', '(Entregado tarde)'),
(10, 'usuarios', '0', '1', 'Guardar Archivo', '0000-00-00', 'Se descargaron los datos'),
(11, 'usuarios', '0', '1', 'Guardar Archivo', '0000-00-00', 'Se descargaron los datos'),
(12, 'usuarios', '0', '1', 'Guardar Archivo', '0000-00-00', 'Se descargaron los datos'),
(13, 'csv', '0', '0', 'Guardar Encuesta', '0000-00-00', 'Se descargaron datos de encuestas en csv'),
(14, 'csv', '0', '0', 'Guardar Encuesta', '0000-00-00', 'Se descargaron datos de encuestas en csv'),
(15, 'usuarios', 'Matias', 'Socio', 'Login', '0000-00-00', 'Login de un usuario'),
(16, 'usuarios', 'Matias', 'Socio', 'Login', '0000-00-00', 'Login de un usuario'),
(17, 'mesas', 'fsedz', 'Julia', 'Cargar datos', '0000-00-00', 'Datos de una mesa'),
(18, 'mesas', '10', 'Esperando', 'Actualizar datos', '0000-00-00', 'Actualizacion de una mesa'),
(19, 'pedidos', 'rapju', 'Lucia', 'Cargar datos', '0000-00-00', 'Datos de un pedido'),
(20, 'pedidos', 'rapju', 'Daikiri', 'Cargar datos', '0000-00-00', 'Datos de un pedido'),
(21, 'pedidos', 'taer', '0', 'Obtener datos', '0000-00-00', 'Datos de un pedido'),
(22, 'pedidos', '0', '0', 'Obtener datos', '0000-00-00', 'Datos de todos los pedidos'),
(23, 'pedidos', 'rapju', 'En preparacion', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(24, 'pedidos', 'rapju', 'En preparacion', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(25, 'pedidos', 'rapju', 'En preparacion', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(26, 'pedidos', 'rapju', 'En preparacion', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(27, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(28, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', '(Entregado tarde)'),
(29, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(30, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', '(Entregado tarde)'),
(31, 'pedidos', 'rapju', 'Servido', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(32, 'pedidos', 'rapju', 'Servido', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(33, 'pedidos', 'rapju', 'Servido', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(34, 'pedidos', 'rapju', 'Servido', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(35, 'usuarios', 'Julia', 'Mozo', 'Login', '0000-00-00', 'Login de un usuario'),
(36, 'mesas', 'fsedz', 'Comiendo', 'Actualizar datos', '0000-00-00', 'Actualizacion de una mesa'),
(37, 'mesas', '10', 'rapju', 'Obtener cuenta', '0000-00-00', 'Cuenta de una mesa'),
(38, 'mesas', 'fsedz', 'Pagando', 'Actualizar datos', '0000-00-00', 'Actualizacion de una mesa'),
(39, 'pedidos', 'rapju', 'Pagado', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(40, 'pedidos', 'rapju', 'Pagado', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(41, 'pedidos', 'rapju', 'Pagado', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(42, 'pedidos', 'rapju', 'Pagado', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(43, 'mesas', 'fsedz', 'Cerrada', 'Actualizar datos', '0000-00-00', 'Actualizacion de una mesa'),
(44, 'usuarios', 'Matias', 'Socio', 'Login', '0000-00-00', 'Login de un usuario'),
(45, 'pdf', '0', '0', 'Guardar Encuestas', '0000-00-00', 'Se descargaron datos de encuestas en pdf'),
(46, 'mesas', 'nevuo', 'Julia', 'Cargar datos', '0000-00-00', 'Datos de una mesa'),
(47, 'pedidos', 'rapju', '0', 'Sacar Foto', '0000-00-00', 'Foto de un pedido'),
(48, 'pedidos', '0', '0', 'Pendientes', '0000-00-00', 'Obtener pedidos pendientes'),
(49, 'pdf', '0', '0', 'Guardar Productos', '0000-00-00', 'Se descargaron datos de productos en pdf'),
(50, 'csv', '0', '0', 'Guardar Encuesta', '0000-00-00', 'Se descargaron datos de encuestas en csv'),
(51, 'csv', '0', '0', 'Guardar Encuesta', '0000-00-00', 'Se descargaron datos de encuestas en csv'),
(52, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(53, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(54, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(55, 'pedidos', 'rapju', 'Listo para servir', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)'),
(56, 'pedidos', 'rapju', 'Pagado', 'Actualizar datos', '0000-00-00', 'Actualizacion de un pedido'),
(57, 'pedidos', 'rapju', 'Pagado', 'Actualizar datos', '0000-00-00', '(Entregado a tiempo)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `mesa` int(11) NOT NULL,
  `restaurante` int(11) NOT NULL,
  `mozo` int(11) NOT NULL,
  `cocinero` int(11) NOT NULL,
  `experiencia` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `codigo`, `mesa`, `restaurante`, `mozo`, `cocinero`, `experiencia`) VALUES
(1, '0qudm', 8, 9, 10, 8, 'Se comio rico'),
(2, 'cswom', 10, 10, 9, 10, 'Excelente'),
(3, '0qudm', 9, 10, 8, 0, '8'),
(4, 'cswom', 10, 9, 10, 0, '10'),
(5, '0qudm', 8, 9, 10, 8, 'Se comio rico}'),
(6, 'cswom', 10, 10, 9, 10, 'Excelente}'),
(8, 'fsedz', 10, 9, 9, 10, 'Todo salio bien'),
(9, 'fsedz', 10, 9, 9, 10, 'Todo salio bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `estadoMesa` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`estadoMesa`, `nombre`, `id`, `numero`, `cuenta`) VALUES
('Esperando', 'Carla', 3, '', NULL),
('Esperando', 'Carla', 4, '', NULL),
('Esperando', 'Carla', 5, '', NULL),
('Esperando', 'Carla', 6, '', NULL),
('Esperando', 'Carla', 7, '', NULL),
('Pagando', 'Carla', 8, '0qudm', 816),
('Cerrada', 'Lucas', 9, 'cswom', NULL),
('Cerrada', 'Julia', 10, 'fsedz', 1164),
('Esperando', 'Julia', 11, 'nevuo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idMesa` int(11) NOT NULL,
  `datosProducto` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `tipoProducto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idMesa`, `datosProducto`, `usuario`, `estado`, `total`, `cantidad`, `tiempo`, `puesto`, `fecha`, `foto`, `codigo`, `idPedido`, `tipoProducto`) VALUES
(8, 'Daikiri', 'Ricardo', 'Servido', 294, 2, 0, 'Bartender', '2021-12-07', 'FotosMesas/1k86p - 8_png', '1k86p', 30, 'Trago'),
(8, 'Papas fritas', 'Susana', 'Servido', 192, 1, 0, 'Cocinero', 'Bartender', 'FotosMesas/1k86p - 8_png', '1k86p', 31, 'Comida'),
(8, 'Rabas', 'Lucia', 'Servido', 210, 1, 0, 'Cocinero', 'Bartender', 'FotosMesas/1k86p - 8_png', '1k86p', 32, 'Comida'),
(8, 'Quilmes', 'Nicolas', 'Pagado', 120, 1, 0, 'Cervecero', '2021-12-07', 'FotosMesas/1k86p - 8_png', '1k86p', 34, 'Cerveza'),
(9, 'Black russian', 'Ricardo', 'Listo para servir', 526, 2, 6, 'Bartender', '2021-12-07', 'FotosMesas/2u6q1 - 9_png', '2u6q1', 35, 'Trago'),
(10, 'Pollo al disco', 'Lucia', 'Pagado', 870, 2, 0, 'Cocinero', '2021-12-07', 'FotosMesas/rapju - 10_png', 'rapju', 36, 'Comida'),
(10, 'Daikiri', 'Ricardo', 'Listo para servir', 294, 2, 0, 'Bartender', '2021-12-07', 'FotosMesas/rapju - 10_png', 'rapju', 37, 'Trago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProduc` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `perfilEmpleado` varchar(50) NOT NULL,
  `idPuesto` int(11) NOT NULL,
  `puesto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProduc`, `nombre`, `precio`, `tipo`, `perfilEmpleado`, `idPuesto`, `puesto`) VALUES
(1, 'Milanesa a caballo', 320, 'Comida', '8', 3, 'Cocinero'),
(2, 'Fideos con salsa de tomate', 640, 'Comida', '8', 3, 'Cocinero'),
(3, 'Hamburguesa completa', 435, 'Comida', '8', 3, 'Cocinero'),
(4, 'Quilmes', 120, 'Cerveza', '10', 2, 'Cervecero'),
(5, 'Patagonia', 160, 'Cerveza', '10', 2, 'Cervecero'),
(6, 'Corona', 140, 'Cerveza', '10', 2, 'Cervecero'),
(7, 'Andes', 140, 'Cerveza', '10', 2, 'Cervecero'),
(8, 'Brahama', 130, 'Cerveza', '9', 2, 'Cervecero'),
(9, 'Stella Artois', 180, 'Cerveza', '10', 2, 'Cervecero'),
(10, 'Escalope de merluza', 270, 'Comida', '7', 3, 'Cocinero'),
(11, 'Milanesa a la napolitana', 310, 'Comida', '7', 3, 'Cocinero'),
(12, 'Pollo al disco', 435, 'Comida', '7', 3, 'Cocinero'),
(13, 'Sorrentinos con crema', 740, 'Comida', '7', 3, 'Cocinero'),
(14, 'Hamburguesa de garbanzos', 290, 'Comida', '8', 3, 'Cocinero'),
(15, 'Ensalada cesar', 235, 'Comida', '7', 3, 'Cocinero'),
(16, 'Papas fritas', 192, 'Comida', '7', 3, 'Cocinero'),
(17, 'Rabas', 210, 'Comida', '7', 3, 'Cocinero'),
(18, 'Revuelto de gramajo', 298, 'Comida', '8', 3, 'Cocinero'),
(19, 'Daikiri', 147, 'Trago', '12', 1, 'Bartender'),
(20, 'Margarita', 134, 'Trago', '11', 1, 'Bartender'),
(21, 'Mojito', 148, 'Trago', '12', 1, 'Bartender'),
(22, 'Gintonic', 168, 'Trago', '11', 1, 'Bartender'),
(23, 'Black Russian', 263, 'Trago', '11', 1, 'Bartender'),
(24, 'Martini', 134, 'Trago', '12', 1, 'Bartender'),
(25, 'Negroni', 215, 'Trago', '11', 1, 'Bartender'),
(26, 'Budweiser', 140, 'Cerveza', '10', 2, 'Cervecero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idPuesto` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `nombre`, `apellido`, `mail`, `clave`, `puesto`, `estado`, `idPuesto`, `idEstado`) VALUES
(1, 'Matias', 'Gonzalez', 'gonzalezmatias@mail.com', '$2y$10$p0OV8le4ZYFFR5hYf5Tjl.PoB1VJEsOjwZJSwVF.l27xwIL7uK/Wm', 'Socio', 'Disponible', 5, 6),
(2, 'Esteban', 'Sanchez', 'sanchezesteban@mail.com', '$2y$10$2BjgSQSugeGMe/bYLmXA4uCwxcZ4vyhSXZsfO5UQ2KmjkovULTU6K', 'Socio', 'Disponible', 5, 6),
(3, 'Malena', 'Rodriguez', 'rodriguezmalena@mail.com', '$2y$10$VKkEvU3YZjsd8BhHHIEzc.oEaYiL4xLnKMlsnHSSHLmYJormfLVE6', 'Socio', 'Disponible', 5, 6),
(4, 'Carla', 'Lopez', 'lopezcarla@mail.com', '$2y$10$rBb0zlf9t93fhVDGRHOJpuO3g4uRP8RzgWMz25ZpZlK85cRNt4UNq', 'Mozo', 'Disponible', 4, 6),
(5, 'Julia', 'Acosta', 'acostajulia@mail.com', '$2y$10$QhUGe2tkrh81sX4lY6LubuFVC6Hm9k61nhNzUssc/PXBWX.EmmKMq', 'Mozo', 'Disponible', 4, 6),
(6, 'Lucas', 'Ruiz', 'ruizlucas@mail.com', '$2y$10$uog3bM7b75dGJl0L1fER0uvj4LSLI/N8A7GklpytudQONgFE9JQTO', 'Mozo', 'Disponible', 4, 6),
(7, 'Lucia', 'Perez', 'perezlucia@mail.com', '$2y$10$.iGJkH7L.8Ol1NpgYTJfN.hcWqoyn2lA3rh571yUOtUjtCXT384ZW', 'Cocinero', 'Disponible', 3, 6),
(8, 'Susana', 'Martinez', 'martinezsusana@mail.com', '$2y$10$prHfe3MMTP3ZsAP5uDeiTed1zdY1T2IL9sCW3XX5lL6pw9D5xqZpa', 'Cocinero', 'Disponible', 3, 6),
(9, 'Bruno', 'Diaz', 'diazbruno@mail.com', '$2y$10$wQ5J18H8IE4tdc7h5LNeYOrAGm7bZNcsREdFhHJx.EN0vz4De7Jie', 'Cervecero', 'Disponible', 2, 6),
(10, 'Nicolas', 'Rojas', 'rojasnicolas@mail.com', '$2y$10$52jM9.bDnFBl.FW8j9CTOOBVG7qyA8tsFP6bvvl3HAxCtyEheJzYG', 'Cervecero', 'Disponible', 2, 6),
(11, 'Sara', 'Garcia', 'garciasara@mail.com', '$2y$10$JWsZW3bn2pGOduYWekwf3.f5SBMel2iiJ8aYvqOxnL2XID7lV0.ny', 'Bartender', 'Disponible', 1, 6),
(12, 'Ricardo', 'Flores', 'floresricardo@mail.com', '$2y$10$S7ZWNepRmSzP54fDDuaIm.1argK4KAslYNwXc1KDKFfeUue.v.qTa', 'Bartender', 'Disponible', 1, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `changelogs`
--
ALTER TABLE `changelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProduc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `changelogs`
--
ALTER TABLE `changelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProduc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
