-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2020 a las 22:09:05
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vinix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(64) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Perro'),
(18, 'Pato'),
(19, 'Gato'),
(20, 'Buo'),
(21, 'Ardilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet`
--

CREATE TABLE `pet` (
  `id` int(64) NOT NULL,
  `category` int(64) NOT NULL,
  `name` varchar(200) NOT NULL,
  `photoUrls` varchar(250) NOT NULL,
  `tags` int(64) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pet`
--

INSERT INTO `pet` (`id`, `category`, `name`, `photoUrls`, `tags`, `status`) VALUES
(1, 1, 'Chocolate', 'https://static.diariofemenino.com/media/14100/nombres-perro-marron-cafe.jpg', 1, 'pending'),
(2, 18, 'David', 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Anas_platyrhynchos_qtl1.jpg', 1, 'pending'),
(3, 19, 'Luci', 'https://www.duna.cl/media/2020/10/gatos-900x506.jpg', 2, 'pending'),
(24, 1, 'Jena Margarita', 'https://www.redaccionmedica.com/images/destacados/coronavirus-perros-no-necesitan-mascarillas-porque-no-se-contagian--5615.jpg', 2, 'sold'),
(26, 20, 'Pedro', 'https://thumbs.dreamstime.com/b/profile-real-buo-golden-profile-real-buo-golden-dark-feathers-big-yellow-eyes-great-carnivorous-bird-125012055.jpg', 1, 'available'),
(27, 21, 'Laura', 'https://cdnmundo3.img.sputniknews.com/img/109091/74/1090917492_0:71:1921:1109_1000x541_80_0_0_d58fa5ba43f08c8756462b9d24bbeac1.jpg', 2, 'available'),
(28, 18, 'Federico Bernas', 'https://i.pinimg.com/originals/fd/f1/94/fdf194e1b4de521229d1d4c23689e908.jpg', 1, 'sold'),
(29, 21, 'Laura Marcela', 'https://thumbs.dreamstime.com/b/profile-real-buo-golden-profile-real-buo-golden-dark-feathers-big-yellow-eyes-great-carnivorous-bird-125012055.jpg', 2, 'available'),
(30, 20, 'Fabio', 'https://thumbs.dreamstime.com/b/profile-real-buo-golden-profile-real-buo-golden-dark-feathers-big-yellow-eyes-great-carnivorous-bird-125012055.jpg', 1, 'pending');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'Bello'),
(2, 'Bella');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
