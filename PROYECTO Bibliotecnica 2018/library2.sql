-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2018 a las 01:02:41
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `library2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`id`, `name`, `lastname`) VALUES
(1, 'Alejandro', 'Cristofori'),
(2, 'Carolina', 'Garcia'),
(3, 'Leonor', 'Corradi'),
(4, 'Carlos', 'Mora'),
(5, 'Monica', 'Churi'),
(6, 'Eduardo', 'Averbuj'),
(7, 'Patricia', 'Kisbye'),
(8, 'Jorge', 'Rubinstein'),
(9, 'Alicia', 'Candas'),
(10, 'Karina', 'Abellian'),
(11, 'Jose maria', 'Rivas Arias'),
(12, 'Julio', 'Cortazar'),
(13, 'Jonathan', 'Swift'),
(14, 'Anonimo', 'Anonimo'),
(15, 'Silvina', 'Ocampo'),
(16, 'Mary', 'Shelley'),
(17, 'Henry', 'James'),
(18, 'Benito Perez', 'Galdos'),
(19, 'H.P', 'Lovecraft'),
(20, 'Galiano', 'Eduardo'),
(21, 'Dashiel', 'Jhamett'),
(22, 'Rudyar', 'Kipling'),
(23, 'Robert Louis', 'Stevenson'),
(24, 'Homero', 'Autor'),
(25, 'A', 'Huxley'),
(26, 'Juan RamÃ³n', 'Jimenez'),
(27, 'Hernan', 'Eze'),
(28, 'Eduardo', 'Galeano'),
(29, 'Enrique Sanmiguel', 'Rojas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(100) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(1000) NOT NULL,
  `institucion` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `n_pag` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `editorial_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `keywords` varchar(255) NOT NULL,
  `locationShelf` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `editorial_id` (`editorial_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `subtitle`, `institucion`, `description`, `file`, `image`, `year`, `n_pag`, `author_id`, `editorial_id`, `category_id`, `keywords`, `locationShelf`) VALUES
(1, '', 'Los viajes de gulliver', '', 'E.E.S.T N3', '', NULL, NULL, 2010, 192, 13, 1, 13, 'Novela,Literatura', ''),
(2, '', 'Cuentos completos /2', '', 'E.E.S.T N3', '', NULL, NULL, 2010, 520, 12, 2, 13, 'Cortazar,Literatura narrativa', ''),
(3, '', 'Higiene y seguridad en el trabajo', 'Separatas de legislacion', 'E.E.S.T N3', '', NULL, NULL, 2017, 208, 14, 11, 3, 'Derecho,Higiene y seguridad', ''),
(4, '', 'Soldadura elÃ©ctrica', 'y sistemas T.I.G y M.A.G', 'E.E.S.T N3', '', NULL, NULL, 2008, 346, 11, 3, 12, 'Soldadura', ''),
(5, '', 'Ciencias naturales ES1', '', 'E.E.S.T N3', '', NULL, NULL, 2010, 256, 10, 4, 11, 'Ciencias naturales', ''),
(6, '', 'Quimica', 'Estructura, propiedades y transformaciones de la materia', 'E.E.S.T N3', '', NULL, NULL, 2005, 251, 9, 5, 10, 'Quimica', ''),
(7, '', 'Fisica 1', 'La energia en los fenomenos fisicos', 'E.E.S.T N3', '', NULL, NULL, 2005, 335, 8, 5, 9, 'Fisica', ''),
(8, '', 'Matematica financiera', 'Todo lo que ustedes quiere saber sobre matematica financiera pero no se anima a preguntar', 'E.E.S.T N3', '', NULL, NULL, 2010, 188, 7, 6, 8, 'Matematica', ''),
(9, '', 'Tecnologia 1', 'DiseÃ±o y analisis de productos. Sistemas: Automatismo y control. Sistema de produccion', 'E.E.S.T N3', '', NULL, NULL, 2005, 191, 6, 7, 4, 'Informatica,diseÃ±o,Analisis', ''),
(11, '', 'Historia', '2 continentes (Siglos XIV-XIX)', 'E.E.S.T N3', '', NULL, NULL, 2015, 336, 4, 9, 6, 'Historia', ''),
(12, '', 'For teens 1', 'Student book + Workbook', 'E.E.S.T N3', '', NULL, NULL, 2004, 96, 3, 10, 5, 'Ingles', ''),
(13, '', 'Geografia 4 ES', 'Sociedad y economia en el mundo actual', 'E.E.S.T N3', '', NULL, NULL, 2015, 224, 2, 5, 2, 'Geografia', ''),
(14, '', 'Ciencias Sociales 1', 'Desde los comienzos de la historia y la geografia humana hasta el fin de la edad media', 'E.E.S.T N3', '', NULL, NULL, 2015, 272, 1, 12, 2, 'Geografia,Edad media', ''),
(15, '', 'Un mundo feliz', '-', 'E.E.S.T N3', '', NULL, NULL, 1985, 218, 25, 15, 13, 'Literatura', ''),
(16, '', 'Demian', 'Historia de la juventud de Emil Sinclair', 'E.E.S.T N3', '', NULL, NULL, 1986, 175, 27, 1, 13, 'Literatura', ''),
(17, '', 'Las fuerzas extraÃ±as', '-', 'E.E.S.T N3', '', NULL, NULL, 2010, 136, 3, 12, 13, 'Literatura', ''),
(18, '', 'Platero y yo', '-', 'E.E.S.T N3', '', NULL, NULL, 2007, 286, 26, 13, 13, 'Literatura', ''),
(19, '', 'El libro de la selva', '-', 'E.E.S.T N3', '', NULL, NULL, 2007, 206, 22, 18, 13, 'Literatura', ''),
(20, '', 'El halcÃ³n maltÃ©s', '-', 'E.E.S.T N3', '', NULL, NULL, 1993, 265, 21, 1, 13, 'Literatura', ''),
(21, '', 'Trafalgar', '-', 'E.E.S.T N3', '', NULL, NULL, 2007, 241, 18, 16, 13, 'Literatura', ''),
(22, '', 'Los mitos de Cthulhu', '-', 'E.E.S.T N3', '', NULL, NULL, 2015, 158, 19, 19, 13, 'Literatura', ''),
(23, '', 'Otra vuelta de tuerca', '-', 'E.E.S.T N3', '', NULL, NULL, 2004, 201, 17, 12, 13, 'Literatura', ''),
(24, '', 'Frankenstein', '-', 'E.E.S.T N3', '', NULL, NULL, 2010, 317, 16, 13, 13, 'Literatura', ''),
(25, '', 'Los hijos de los dÃ­as', '-', 'E.E.S.T N3', '', NULL, NULL, 2015, 431, 28, 20, 13, 'Lieratura', ''),
(26, '', 'Odisea', '-', 'E.E.S.T N3', '', NULL, NULL, 2010, 414, 24, 14, 13, 'Literatura', ''),
(27, '', 'La isla del tesoro', '-', 'E.E.S.T N3', '', NULL, NULL, 2007, 254, 23, 23, 13, 'Literatura', ''),
(28, '', 'AnÃ¡lisis de mecanismos', '-', 'E.E.S.T N3', '', NULL, NULL, 2017, 274, 29, 24, 14, 'mecÃ¡nica,cinemÃ¡tica,dinÃ¡mica', ''),
(29, '987-20032-9-7', 'Tecnologia de Gestion', '*', 'E.E.S.T N3', 'organizaciÃ³n de empresas; gestion de RRHH; gestion de compras', NULL, NULL, 2004, 300, 5, 25, 7, 'gestion y administracion ', ''),
(30, '84-481-4645-x', 'Programacion en C++', '*', 'E.E.S.T N3', '', NULL, NULL, 2015, 840, 8, 15, 4, 'c++', ''),
(31, '970-26-0254-8', 'Como programar en C++', 'iniciaciÃ³n ', '', '', NULL, NULL, 2003, 1376, 16, 15, 4, 'c++', ''),
(32, '8448198441', 'Programacion en C', '-', 'E.E.S.T N3', '', NULL, NULL, 2006, 720, 18, 6, 4, 'programacion en c', ''),
(33, '', 'Programacion en turbo/boarland Pascal 7 3er edicion', 'programacion', 'E.E.S.T N3', '', NULL, NULL, 2004, 272, 1, 18, 4, 'pascal', ''),
(34, '8497324854', 'Programacion en c++ Para ingenieros', 'programacion ingenieros', 'E.E.S.T N3', '', NULL, '5-001.jpg', 2006, 300, 12, 9, 4, 'programacion ingenieros', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Ciencias Sociales'),
(2, 'Geografia'),
(3, 'Higiene y seguridad'),
(4, 'Informatica'),
(5, 'InglÃ©s'),
(6, 'Historia'),
(7, 'Gestion'),
(8, 'Matematica'),
(9, 'Fisica'),
(10, 'Quimica'),
(11, 'Ciencias Naturales'),
(12, 'Soldadura'),
(13, 'Literatura'),
(14, 'mecÃ¡nica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `lastname`, `email`, `address`, `phone`, `is_active`, `created_at`) VALUES
(1, 'Elizabeth', 'Valesi', '', '', '', 1, '2018-06-04 21:08:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `name`) VALUES
(1, 'Alianza Editorial'),
(2, 'Alfaguara'),
(3, 'Paraninfo'),
(4, 'Tinta Fresca'),
(5, 'Estrada'),
(6, 'INET'),
(7, 'Santillana'),
(8, 'Cuspide'),
(9, 'A-Z Editora'),
(10, 'Pearson Longman'),
(11, 'ERREPAR'),
(12, 'Aique'),
(13, 'Longseller'),
(14, 'Grupo Planeta'),
(15, 'Editores Mexicanos Unidos'),
(16, 'Losada'),
(17, 'Grafica Pinter'),
(18, 'Alfagrama'),
(19, 'Grontes'),
(20, 'Siglo 21'),
(21, 'Cubicor Wor Pilar'),
(22, 'Producciones Mawis'),
(23, 'S.M'),
(24, 'Jerez'),
(25, 'Interamericana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `code`, `status_id`, `book_id`) VALUES
(2, '23242424', 1, 1),
(3, '3333', 1, 2),
(4, '3333', 1, 2),
(5, '01', 1, 3),
(6, '02', 2, 3),
(7, '1', 1, 4),
(8, '1', 1, 5),
(9, '01', 1, 28),
(10, '02', 1, 28),
(11, '03', 1, 28),
(12, '04', 2, 28),
(13, '05', 1, 28),
(14, '3892', 1, 29),
(15, '3895', 1, 29),
(16, '3896', 1, 29),
(17, '3894', 1, 29),
(18, '3891', 1, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `start_at` date NOT NULL,
  `finish_at` date NOT NULL,
  `returned_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `receptor_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `user_id` (`user_id`),
  KEY `receptor_id` (`receptor_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Disponible'),
(2, 'Ocupado'),
(3, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_operation`
--

CREATE TABLE IF NOT EXISTS `status_operation` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status_operation`
--

INSERT INTO `status_operation` (`id`, `name`) VALUES
(1, 'prestamos'),
(3, 'devoluciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `email`, `password`, `is_active`, `is_admin`, `created_at`) VALUES
(1, 'Administrador', '', 'admin', '', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1, 1, '2018-05-07 20:41:47'),
(2, 'edwin', 'limachi', 'elimachi', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1, 0, '2018-05-07 22:00:35');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`editorial_id`) REFERENCES `editorial` (`id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Filtros para la tabla `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`receptor_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `operation_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
