-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3380
-- Tiempo de generación: 27-01-2021 a las 01:44:10
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `nivel_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estatura` decimal(10,2) NOT NULL,
  `peso_inicial` decimal(10,2) NOT NULL,
  `peso_progreso` decimal(10,2) NOT NULL,
  `url_foto` text COLLATE utf8_unicode_ci NOT NULL,
  `fk_id_usuarios` int(11) NOT NULL,
  `fk_id_sucursales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `nombre`, `apellidos`, `fecha_nacimiento`, `email`, `fecha_ingreso`, `nivel_cliente`, `estatura`, `peso_inicial`, `peso_progreso`, `url_foto`, `fk_id_usuarios`, `fk_id_sucursales`) VALUES
(1, 'Kelsey', 'Youngman', '1988-11-17', 'kyoungman0@bloglovin.com', '2020-04-20', 'principiante', '1.70', '49.00', '4.00', 'http://dummyimage.com/201x199.png/dddddd/000000', 6, 1),
(2, 'Bogart', 'Storek', '1999-12-22', 'bstorek1@businessinsider.com', '2020-03-17', 'nec dui luctus rutrum nulla', '1.60', '79.00', '5.00', 'http://dummyimage.com/111x217.png/dddddd/000000', 7, 1),
(3, 'Roarke', 'Bowker', '1983-10-21', 'rbowker2@tmall.com', '2020-02-29', 'tincidunt ante vel ipsum', '1.70', '80.00', '2.00', 'http://dummyimage.com/137x154.png/cc0000/ffffff', 8, 1),
(4, 'Robbie', 'Malenoir', '1980-12-14', 'rmalenoir3@theglobeandmail.com', '2019-03-26', 'etiam pretium iaculis justo', '1.80', '61.00', '4.00', 'http://dummyimage.com/195x185.png/ff4444/ffffff', 9, 1),
(10, 'jose', 'ramirez', '1998-07-11', 'alexisr@outlook.com', '2021-01-26', 'avanzado', '1.80', '70.00', '0.00', '/', 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_rutinas`
--

CREATE TABLE `clientes_rutinas` (
  `fk_id_clientes` int(11) NOT NULL,
  `fk_id_rutinas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes_rutinas`
--

INSERT INTO `clientes_rutinas` (`fk_id_clientes`, `fk_id_rutinas`) VALUES
(1, 1),
(2, 2),
(4, 4),
(1, 5),
(2, 6),
(4, 1),
(1, 1),
(2, 2),
(2, 2),
(2, 6),
(3, 7),
(3, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `nivel_entrenador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estatura` decimal(10,2) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `url_foto` text COLLATE utf8_unicode_ci NOT NULL,
  `horario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fk_id_usuarios` int(11) NOT NULL,
  `fk_id_sucursales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`ID`, `nombre`, `apellidos`, `fecha_nacimiento`, `fecha_ingreso`, `nivel_entrenador`, `estatura`, `peso`, `url_foto`, `horario`, `fk_id_usuarios`, `fk_id_sucursales`) VALUES
(1, 'Chrissy', 'Cole', '1985-04-20', '2020-08-16', 'sollicitudin mi sit', '1.80', '95.00', 'http://dummyimage.com/186x196.png/ff4444/ffffff', 'ultrices posuere cubilia curae duis faucibus', 2, 1),
(2, 'Ryon', 'Rudledge', '1988-11-17', '2019-02-23', 'sollicitudin vitae consectetuer', '1.80', '59.00', 'http://dummyimage.com/248x126.bmp/5fa2dd/ffffff', 'molestie lorem quisque ut erat curabitur', 3, 1),
(3, 'Mellisent', 'Ferrige', '1981-07-25', '2020-11-23', 'ridiculus mus etiam', '1.50', '84.00', 'http://dummyimage.com/210x149.bmp/5fa2dd/ffffff', 'in lectus pellentesque', 4, 1),
(4, 'Malinda', 'Luke', '1993-12-28', '2020-10-02', 'eget massa tempor', '1.40', '85.00', 'http://dummyimage.com/173x136.jpg/dddddd/000000', 'platea dictumst maecenas ut massa quis', 5, 1),
(5, 'Bernard', 'Shew', '1994-03-03', '2020-03-12', 'cubilia curae nulla dapibus dolor', '1.70', '62.00', 'http://dummyimage.com/121x233.bmp/cc0000/ffffff', 'adipiscing elit proin risus', 10, 1),
(6, 'brandon', 'mendoza', '1997-09-09', '2021-01-21', 'avanzado', '1.69', '75.00', '/', 'Lunes, jueves, sabado, de 8 a 16 horas', 29, 1),
(7, 'asasa', 'ramirez', '2021-01-12', '2021-01-17', 'principiante', '1.69', '75.00', '/', 'Lunes, jueves, sabado, de 8 a 16 horas', 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas_importantes`
--

CREATE TABLE `fechas_importantes` (
  `ID` int(11) NOT NULL,
  `start` date NOT NULL,
  `title` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fechas_importantes`
--

INSERT INTO `fechas_importantes` (`ID`, `start`, `title`, `descripcion`, `color`) VALUES
(1, '2021-01-15', 'Primera Quincena', 'Primer pago del 2021', '#B600FF'),
(2, '2021-01-06', 'Reyes Magos', 'Suspencion por reyes magos', '#FF0000'),
(3, '2021-01-19', 'Sanitizacion del gimnasio', 'El dia 19 de enero se realizara una sanitizacion de los aparatos', '#0027FF'),
(4, '2021-01-31', 'Segunda Quincena', 'Segundo pago del 2021', '#B600FF'),
(5, '2021-02-02', 'Dia de la Candelaria', 'Convivio dentro del gimnasio', '#0027FF'),
(6, '2021-09-16', 'Dia de la independencia', 'Suspencion de labores por Dia de la independencia', '#0027FF'),
(7, '2021-11-20', 'Dia de la Revolucion', 'Suspencion de labores por Dia de la Revolucion', '#0027FF'),
(8, '2021-05-10', 'Dia de las Madres', 'Suspencion por dia de las madres', '#0027FF'),
(9, '2021-04-17', 'Aniversario del Gimnasio', 'Dia del aniversario del gimnasio', '#B600FF'),
(10, '2021-02-14', 'Dia de san valentin', 'Convivio del dia de san valentin', '#B600FF'),
(11, '2021-03-02', 'Natalicio de Benito Juarez', 'Fecha importante', '#FF0000'),
(12, '2021-01-22', 'hola mundo', 'cierre de gimnasio por evento importante', 'B600FF'),
(13, '2021-01-31', 'suspencion interna, por cuestiones de mantenimiento', 'cierre de gimnasio por evento importante', '0027FF'),
(14, '2021-02-28', 'sssss', 'cierre de gimnasio por evento importante', 'FF0000'),
(15, '2021-01-30', 'ddd', 'ddddd', 'FF0000'),
(16, '2021-01-28', 'd', 's', 'FF0000'),
(17, '2021-03-01', 'dx', 'otro registro', 'FF0000'),
(18, '2021-03-26', 'dssdsd', 'probando ', 'FF0000'),
(19, '2021-04-11', 'j', 'lllll', 'FF0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas_importantes_sucursales`
--

CREATE TABLE `fechas_importantes_sucursales` (
  `fk_id_fechas_importantes` int(11) NOT NULL,
  `fk_id_sucursales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fechas_importantes_sucursales`
--

INSERT INTO `fechas_importantes_sucursales` (`fk_id_fechas_importantes`, `fk_id_sucursales`) VALUES
(10, 1),
(5, 1),
(5, 1),
(3, 1),
(4, 1),
(10, 1),
(5, 1),
(5, 1),
(3, 1),
(4, 1),
(3, 1),
(3, 1),
(2, 1),
(8, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_clientes`
--

CREATE TABLE `pagos_clientes` (
  `ID` int(11) NOT NULL,
  `fecha_pago_realizado` datetime NOT NULL,
  `fecha_corte_pago` datetime NOT NULL,
  `fk_id_clientes` int(11) NOT NULL,
  `fk_id_sucursales` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos_clientes`
--

INSERT INTO `pagos_clientes` (`ID`, `fecha_pago_realizado`, `fecha_corte_pago`, `fk_id_clientes`, `fk_id_sucursales`, `status`) VALUES
(2, '2020-04-27 00:00:00', '2020-02-12 00:00:00', 1, 1, 1),
(4, '2020-06-12 00:00:00', '2020-06-04 00:00:00', 4, 1, 0),
(8, '2020-05-01 00:00:00', '2021-02-16 00:00:00', 2, 1, 1),
(9, '2020-07-27 00:00:00', '2020-08-23 00:00:00', 3, 1, 1),
(11, '2020-12-18 00:00:00', '2021-01-18 00:00:00', 3, 1, 1),
(12, '2020-12-18 00:00:00', '2021-01-18 00:00:00', 1, 1, 0),
(13, '2020-12-18 00:00:00', '2021-01-18 00:00:00', 2, 1, 0),
(14, '2020-12-19 00:00:00', '2021-01-19 00:00:00', 3, 1, 0),
(15, '2020-12-19 00:00:00', '2021-01-19 00:00:00', 3, 1, 0),
(16, '2020-12-19 00:00:00', '2021-01-19 00:00:00', 3, 1, 0),
(17, '2021-01-24 00:00:00', '2021-02-24 00:00:00', 2, 1, 0),
(18, '2021-01-24 00:00:00', '2021-02-24 00:00:00', 4, 1, 0),
(20, '2021-01-25 00:00:00', '2021-06-25 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `ID` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ejercicios` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duracion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `fk_id_entrenadores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`ID`, `tipo`, `ejercicios`, `duracion`, `dia`, `descripcion`, `fk_id_entrenadores`) VALUES
(1, 'sem duis aliquam convallis', 'sed ante vivamus', 'orci pede venenatis non', 'condimentum', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 3),
(2, 'vivamus tortor duis mattis', 'et ultrices posuere', 'nec condimentum neque', 'nec', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\r\n\r\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 2),
(3, 'viverra diam vitae quam', '                                actualizando ejercicios                            ', 'lectus suspendisse potenti', 'volutpat', 'modificada', 4),
(4, 'sed interdum venenatis turpis', 'odio justo sollicitudin', 'ac nulla sed', 'nulla', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 1),
(5, 'vulputate vitae nisl aenean', 'eu interdum eu tincidunt in', 'suspendisse potenti nullam porttitor lacus', 'maecenas', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r\n\r\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 5),
(6, 'cum sociis natoque penatibus', 'molestie nibh in lectus', 'turpis enim blandit mi', 'elit', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r\n\r\nFusce consequat. Nulla nisl. Nunc nisl.', 1),
(7, 'fullbody', 'dominadas, sentadilla normal, peso muerto, zancadas', '1 hora', 'lunes, miercoles, viernes', 'rutina de cuerpo completo', 4),
(8, 'gluteo', '                                sentadilla profunda, puentes, zancadas                              ', '1 hora', 'marte', '                                para tener un gluteo fuerte y firme                                                                                        ', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_postal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `horarios` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `fk_id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`ID`, `nombre`, `direccion`, `codigo_postal`, `horarios`, `status`, `fk_id_usuarios`) VALUES
(1, 'Aba', '0679 Melody Parkway', '60090', 'sed magna at', 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nick` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nick`, `password`, `tipo`, `status`) VALUES
(1, 'kvirgin0', 'tincidunt', 'administrador', 1),
(2, 'fsapson1', 'vestibulum', 'entrenador', 1),
(3, 'etrussman2', 'lacus', 'entrenador', 1),
(4, 'lstobbe3', 'vitae', 'entrenador', 1),
(5, 'jprester4', 'pede', 'entrenador', 1),
(6, 'awinkle5', 'leo', 'cliente', 1),
(7, 'iberlin6', 'dictumst', 'cliente', 1),
(8, 'ahandrek7', 'duis', 'cliente', 1),
(9, 'dmardell8', 'duis', 'cliente', 1),
(10, 'mcofax9', 'at', 'entrenador', 1),
(11, 'admin', 'admin', 'administrador', 1),
(25, 'alex9898', '123456', 'cliente', 1),
(29, 'brandon97', '1234567', 'entrenador', 1),
(30, 'alex98', '123456', 'entrenador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_fk_clientes_usuarios` (`fk_id_usuarios`),
  ADD KEY `idx_fk_id_clientes_sucursales` (`fk_id_sucursales`);

--
-- Indices de la tabla `clientes_rutinas`
--
ALTER TABLE `clientes_rutinas`
  ADD KEY `idx_fk_clientes_rutinas_rutinas` (`fk_id_rutinas`),
  ADD KEY `idx_fk_clientes_rutinas_clientes` (`fk_id_clientes`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_fk_entrenadores_usuarios` (`fk_id_usuarios`),
  ADD KEY `idx_fk_id_entrenadores_sucursales` (`fk_id_sucursales`);

--
-- Indices de la tabla `fechas_importantes`
--
ALTER TABLE `fechas_importantes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `fechas_importantes_sucursales`
--
ALTER TABLE `fechas_importantes_sucursales`
  ADD KEY `idx_fk_fechas_importantes_sucursales_sucurcales` (`fk_id_sucursales`),
  ADD KEY `idx_fk_fechas_importantes_sucursales_fechas_importantes` (`fk_id_fechas_importantes`);

--
-- Indices de la tabla `pagos_clientes`
--
ALTER TABLE `pagos_clientes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_fk_pagos_clientes_clientes` (`fk_id_clientes`),
  ADD KEY `idx_fk_pagos_clientes_sucursales` (`fk_id_sucursales`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_fk_rutinas_entrenadores` (`fk_id_entrenadores`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_fk_sucursales_usuarios` (`fk_id_usuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fechas_importantes`
--
ALTER TABLE `fechas_importantes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pagos_clientes`
--
ALTER TABLE `pagos_clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `ct_fk_clientes_usuarios` FOREIGN KEY (`fk_id_usuarios`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `ct_fk_id_clientes_sucursales` FOREIGN KEY (`fk_id_sucursales`) REFERENCES `sucursales` (`ID`);

--
-- Filtros para la tabla `clientes_rutinas`
--
ALTER TABLE `clientes_rutinas`
  ADD CONSTRAINT `fk_clientes_rutinas_clientes` FOREIGN KEY (`fk_id_clientes`) REFERENCES `clientes` (`ID`),
  ADD CONSTRAINT `fk_clientes_rutinas_rutinas` FOREIGN KEY (`fk_id_rutinas`) REFERENCES `rutinas` (`ID`);

--
-- Filtros para la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD CONSTRAINT `ct_fk_entrenadores_usuarios` FOREIGN KEY (`fk_id_usuarios`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `ct_fk_id_entrenadores_sucursales` FOREIGN KEY (`fk_id_sucursales`) REFERENCES `sucursales` (`ID`);

--
-- Filtros para la tabla `fechas_importantes_sucursales`
--
ALTER TABLE `fechas_importantes_sucursales`
  ADD CONSTRAINT `ct_fk_fechas_importantes_sucursales_fechas_importantes` FOREIGN KEY (`fk_id_fechas_importantes`) REFERENCES `fechas_importantes` (`ID`),
  ADD CONSTRAINT `ct_fk_fechas_importantes_sucursales_sucursales` FOREIGN KEY (`fk_id_sucursales`) REFERENCES `sucursales` (`ID`);

--
-- Filtros para la tabla `pagos_clientes`
--
ALTER TABLE `pagos_clientes`
  ADD CONSTRAINT `fk_pagos_clientes_clientes` FOREIGN KEY (`fk_id_clientes`) REFERENCES `clientes` (`ID`),
  ADD CONSTRAINT `fk_pagos_clientes_sucursales` FOREIGN KEY (`fk_id_sucursales`) REFERENCES `sucursales` (`ID`);

--
-- Filtros para la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD CONSTRAINT `ct_fk_rutinas_entrenadores` FOREIGN KEY (`fk_id_entrenadores`) REFERENCES `entrenadores` (`ID`);

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `ct_fk_sucursales_usuarios` FOREIGN KEY (`fk_id_usuarios`) REFERENCES `usuarios` (`ID`);
