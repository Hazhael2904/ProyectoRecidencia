-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2021 a las 08:33:30
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `constructora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `apellido1` varchar(100) DEFAULT NULL,
  `apellido2` varchar(100) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido1`, `apellido2`, `correo`, `password`, `telefono`, `direccion`, `FechaRegistro`, `Estatus`) VALUES
(1, 'Rodrigo', 'Garcia', 'Perez', 'rodrigo@hotmail.com', '12345', 317102123, 'Luis Echeverria 23', '2021-05-10', 'Activo'),
(2, 'Jesus', 'Pelayo', 'Martinez', 'jesus12@hotmail.com', '1234', 317386789, 'Pedro Moreno 12', '2021-06-23', 'Activo'),
(3, 'Pedro', 'Tovar', 'Perez', 'pedro@hotmail.com', '12345', 2147483647, 'Luis Avila 23', '2021-07-15', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_eventos` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `usuarios` varchar(200) NOT NULL,
  `color` varchar(255) NOT NULL,
  `personal` varchar(200) NOT NULL,
  `servicio` varchar(200) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_eventos`, `title`, `descripcion`, `usuarios`, `color`, `personal`, `servicio`, `textColor`, `start`, `end`) VALUES
(15, 'Medicion Terreno', 'Medir predio ', 'Carlos Brambila Pelayo', '#ff0000', 'Juan Ramon Covarrubias Rodriguez', 'Topografia', '#FFFFFF', '2021-07-01 12:30:00', '2021-07-01 12:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias`
--

CREATE TABLE `evidencias` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evidencias`
--

INSERT INTO `evidencias` (`id`, `image_path`) VALUES
(1, 'evidencia/1.jpg'),
(2, 'evidencia/img2.jpeg'),
(3, 'evidencia/img3.jpeg'),
(4, 'evidencia/img7.jpeg'),
(5, 'evidencia/img6.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias_proyeto`
--

CREATE TABLE `evidencias_proyeto` (
  `id_evidencia` int(11) NOT NULL,
  `id_seguimiento` int(11) NOT NULL,
  `etapa` varchar(255) NOT NULL,
  `Imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idimagen` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idimagen`, `image_path`) VALUES
(4, 'evidencia2/img1.jpeg'),
(5, 'evidencia2/img4.jpeg'),
(6, 'evidencia2/img5.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `idinformacion` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `feacharegistro` date NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `fechaterminacion` date NOT NULL,
  `estatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidopat` varchar(45) DEFAULT NULL,
  `apellidomat` varchar(45) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `fechareg` date DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `nombre`, `apellidopat`, `apellidomat`, `domicilio`, `telefono`, `correo`, `puesto`, `fechareg`, `estatus`) VALUES
(1, 'Juan Ramon', 'Covarrubias', 'Rodriguez', 'Abasolo 159', '3171077092', 'juanramon@hotmail.com', 'Propietario Socio', '2014-04-15', 'Activo'),
(2, 'Daniel Abisai', 'Pelayo', 'Rodriguez', 'Porfirio Diaz 247', '3173881545', 'pelayo_stoner@hotmail.com', 'Co-propietario', '2014-04-15', 'Activo'),
(3, 'Mayra', 'Covarrubias', 'Rodriguez', 'Lopez Mateos 105', '3173837364', 'c-projuridico@hotmail.com', 'Juridico', '2014-04-15', 'Activo'),
(4, 'Maura', 'Castellon', 'Rodriguez', '15 de Enero 123', '3171073955', 'c-procontadora@hotmail.com', 'Contadora', '2020-04-15', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `idproyectos` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `idusuarios` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `fecharegistro` date DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idproyectos`, `nombre`, `descripcion`, `idusuarios`, `idservicio`, `idpersonal`, `fecharegistro`, `estatus`) VALUES
(1, 'Topografia', 'Medicion', 0, 0, 0, '2021-07-09', 'En_Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectoss`
--

CREATE TABLE `proyectoss` (
  `id_proyectos` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(450) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `fecharegistro` date NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectoss`
--

INSERT INTO `proyectoss` (`id_proyectos`, `nombre`, `descripcion`, `idusuarios`, `idservicio`, `idpersonal`, `fecharegistro`, `estatus`) VALUES
(1, 'Remodelacion Casa Habitacion', 'Remodelacion de los baÃ±os y habitaciones', 2, 2, 1, '2021-07-23', 'Face Inicial'),
(2, 'Construccion Casa Habitacion', 'Construcion de Casa en Villa PurificaciÃ³n', 3, 4, 2, '2021-07-25', 'Face Inicial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_solicitud`
--

CREATE TABLE `respuesta_solicitud` (
  `id_respuesta` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `respuesta` varchar(450) NOT NULL,
  `fechactualizacion` date NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta_solicitud`
--

INSERT INTO `respuesta_solicitud` (`id_respuesta`, `id_solicitud`, `respuesta`, `fechactualizacion`, `idusuarios`, `estatus`) VALUES
(1, 1, 'Ya evaluamos la construccion se requiere siertos documentos para iniciar presupuesto', '2021-07-29', 1, 'Contestado'),
(2, 2, 'No cuenta con los documentos necesarios que acrediten que el terreno es de su propiedad', '2021-07-29', 1, 'Rechazada'),
(3, 7, 'Solicitamos evaluar la estructura', '2021-07-29', 4, 'Contestado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `descripcion`) VALUES
(1, 'Adiministrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_proyecto`
--

CREATE TABLE `seguimiento_proyecto` (
  `id_seguimiento` int(11) NOT NULL,
  `id_proyectos` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `fechactualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seguimiento_proyecto`
--

INSERT INTO `seguimiento_proyecto` (`id_seguimiento`, `id_proyectos`, `descripcion`, `idusuarios`, `idpersonal`, `fechactualizacion`) VALUES
(1, 1, 'DemoliciÃ³n de las paredes del baÃ±o', 2, 1, '2021-07-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `nombre`, `descripcion`) VALUES
(1, 'Topografia', 'Levantamienos Topograficos-Mediciones'),
(2, 'Remodelaciones', 'Reodelaciones de casa o cualquier construccion'),
(3, 'Disenos 3D', 'Diseños en 3D'),
(4, 'Construccion', 'Construccion de casas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `nombre`, `apellidos`, `idservicio`, `descripcion`, `telefono`, `correo`, `fecharegistro`) VALUES
(1, 'Luis Donaldo', 'Arroyo Sanchez', 2, 'Solicitud para presupuesto para una remodelacion de una casa', '3171005317', 'luisdonaldo@hotmail.com', '2021-07-25'),
(2, 'Gerardo', 'Tovar Perez', 1, 'Requisitos para un levantamiento topografico', '3171112789', 'gera@hotmail.com', '2021-07-25'),
(7, 'Aguistin ', 'Medina Butista', 2, 'Solicitud de remodelacion de baÃ±os', '3245652341', 'agustin@hotmail.com', '2021-07-29'),
(8, 'Pepe', 'galarza', 3, 'Solicitud para un diseÃ±o de una casa ', '3214567899', 'pepe@hotmail.com', '2021-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` int(5) NOT NULL,
  `fecharegistro` date NOT NULL,
  `estatus` varchar(50) NOT NULL,
  `id_rol` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `apellidos`, `email`, `usuario`, `password`, `fecharegistro`, `estatus`, `id_rol`) VALUES
(1, 'Juan Ramon', 'Covarrubias Rodriguez', 'juanramon@hotmail.com', 'juan001', 3627909, '2021-07-15', 'Activo', 1),
(2, 'Pedro', 'Tovar Perez', 'pedro@hotmail.com', 'pedro002', 3627909, '2021-07-15', 'Activo', 2),
(3, 'Carlos', 'Brambila Pelayo', 'carlos@hotmail.com', 'carlos006', 3627909, '2021-07-19', 'Activo', 2),
(4, 'Daniel Abisai', 'Pelayo Rodriguez', 'pelayo_stoner@hotmail.com', 'daniel002', 12345, '2014-02-14', 'Activo', 1),
(5, 'Pablo', 'Cardenaz Gonzales', 'pablo@hotmail.com', 'pablo003', 12345, '2021-07-23', 'Activo', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_eventos`);

--
-- Indices de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evidencias_proyeto`
--
ALTER TABLE `evidencias_proyeto`
  ADD PRIMARY KEY (`id_evidencia`),
  ADD KEY `fk_seguimiento_proyecto_evidencias_proyecto` (`id_seguimiento`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idimagen`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`idinformacion`),
  ADD KEY `fk_usuarios_informacion` (`idusuarios`),
  ADD KEY `fk_servicio_informacion` (`idservicio`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idproyectos`);

--
-- Indices de la tabla `proyectoss`
--
ALTER TABLE `proyectoss`
  ADD PRIMARY KEY (`id_proyectos`),
  ADD KEY `fk_usuarios_proyectoss` (`idusuarios`),
  ADD KEY `fk_servicio_proyectoss` (`idservicio`),
  ADD KEY `fk_personal_proyectoss` (`idpersonal`);

--
-- Indices de la tabla `respuesta_solicitud`
--
ALTER TABLE `respuesta_solicitud`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_usuarios_respuesta_solicitud` (`idusuarios`),
  ADD KEY `fk_solicitud_respuesta_solicitud` (`id_solicitud`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `seguimiento_proyecto`
--
ALTER TABLE `seguimiento_proyecto`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `fk_proyectoss_seguimiento_proyecto` (`id_proyectos`),
  ADD KEY `fk_usuarios_seguimiento_proyecto` (`idusuarios`),
  ADD KEY `fk_personal_seguimiento_proyecto` (`idpersonal`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_servicio_solicitud` (`idservicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `fk_roles_usuario` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_eventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `evidencias_proyeto`
--
ALTER TABLE `evidencias_proyeto`
  MODIFY `id_evidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idimagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `idinformacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `idproyectos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proyectoss`
--
ALTER TABLE `proyectoss`
  MODIFY `id_proyectos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuesta_solicitud`
--
ALTER TABLE `respuesta_solicitud`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimiento_proyecto`
--
ALTER TABLE `seguimiento_proyecto`
  MODIFY `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evidencias_proyeto`
--
ALTER TABLE `evidencias_proyeto`
  ADD CONSTRAINT `fk_seguimiento_proyecto_evidencias_proyecto` FOREIGN KEY (`id_seguimiento`) REFERENCES `seguimiento_proyecto` (`id_seguimiento`);

--
-- Filtros para la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD CONSTRAINT `fk_servicio_informacion` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`),
  ADD CONSTRAINT `fk_usuarios_informacion` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `proyectoss`
--
ALTER TABLE `proyectoss`
  ADD CONSTRAINT `fk_personal_proyectoss` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`),
  ADD CONSTRAINT `fk_servicio_proyectoss` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`),
  ADD CONSTRAINT `fk_usuarios_proyectoss` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `respuesta_solicitud`
--
ALTER TABLE `respuesta_solicitud`
  ADD CONSTRAINT `fk_solicitud_respuesta_solicitud` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`),
  ADD CONSTRAINT `fk_usuarios_respuesta_solicitud` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `seguimiento_proyecto`
--
ALTER TABLE `seguimiento_proyecto`
  ADD CONSTRAINT `fk_personal_seguimiento_proyecto` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`),
  ADD CONSTRAINT `fk_proyectoss_seguimiento_proyecto` FOREIGN KEY (`id_proyectos`) REFERENCES `proyectoss` (`id_proyectos`),
  ADD CONSTRAINT `fk_usuarios_seguimiento_proyecto` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_servicio_solicitud` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_roles_usuario` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
