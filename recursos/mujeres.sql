-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 08-02-2025 a las 19:02:24
-- Versión del servidor: 8.1.0
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `skills_mujeres`
--
CREATE DATABASE IF NOT EXISTS `skills_mujeres` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `skills_mujeres`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Filosofía'),
(2, 'Matemáticas'),
(3, 'Astronomía'),
(4, 'Física'),
(5, 'Literatura'),
(6, 'Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mujeres`
--

CREATE TABLE `mujeres` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nacimiento` int NOT NULL,
  `defuncion` int DEFAULT NULL,
  `nacionalidad` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `area` int NOT NULL,
  `enlace` text COLLATE utf8mb4_spanish_ci,
  `fotografia` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mujeres`
--

INSERT INTO `mujeres` (`id`, `nombre`, `apellidos`, `nacimiento`, `defuncion`, `nacionalidad`, `area`, `enlace`, `fotografia`, `descripcion`) VALUES
(1, 'Hipatia', 'de Alejandría', 370, 415, 'Egipcia', 3, 'https://es.wikipedia.org/wiki/Hipatia', 'Hipatia67.jpg', 'Filósofa, astrónoma y matemática de la antigüedad clásica.'),
(2, 'Ada', 'Lovelace', 1815, 1852, 'Británica', 6, 'https://es.wikipedia.org/wiki/Ada_Lovelace', 'Ada_Lovelace_portrait.jpg', 'Considerada la primera programadora de la historia.'),
(3, 'Marie', 'Curie', 1867, 1934, 'Polaca', 4, 'https://es.wikipedia.org/wiki/Marie_Curie', 'Marie_Curie_c1920.jpg', 'Pionera en el estudio de la radiactividad y primera persona en recibir dos premios Nobel en distintas especialidades.'),
(4, 'Rosalind', 'Franklin', 1920, 1958, 'Británica', 4, 'https://es.wikipedia.org/wiki/Rosalind_Franklin', 'Rosalind_Franklin.jpg', 'Científica cuya labor fue clave para el descubrimiento de la estructura del ADN.'),
(5, 'Emmy', 'Noether', 1882, 1935, 'Alemana', 2, 'https://es.wikipedia.org/wiki/Emmy_Noether', 'Noether.jpg', 'Matemática conocida por su trabajo en álgebra abstracta y física teórica.'),
(6, 'Sofía', 'Kovalevskaya', 1850, 1891, 'Rusa', 2, 'https://es.wikipedia.org/wiki/Sof%C3%ADa_Kovalevskaya', 'Sofja_Wassiljewna_Kowalewskaja_1.jpg', 'Primera mujer en obtener una cátedra de matemáticas en una universidad moderna.'),
(7, 'Jane', 'Goodall', 1934, NULL, 'Británica', 5, 'https://es.wikipedia.org/wiki/Jane_Goodall', 'JaneGoodallOct10_(cropped).jpg', 'Primatóloga y etóloga reconocida por su estudio de los chimpancés.'),
(8, 'Margaret', 'Hamilton', 1936, NULL, 'Estadounidense', 6, 'https://es.wikipedia.org/wiki/Margaret_Hamilton', 'Margaret_Hamilton_1995.jpg', 'Científica de la computación que lideró el desarrollo del software de vuelo del Apolo 11.'),
(9, 'Katherine', 'Johnson', 1918, 2020, 'Estadounidense', 2, 'https://es.wikipedia.org/wiki/Katherine_Johnson', '960px-Katherine_Johnson_1983.jpg', 'Matemática y física crucial en la NASA para la carrera espacial.'),
(10, 'Dorothy', 'Vaughan', 1910, 2008, 'Estadounidense', 6, 'https://es.wikipedia.org/wiki/Dorothy_Vaughan', 'Dorothy_Vaughan.jpg', 'Matemática pionera en el uso de computadoras en la NASA.'),
(11, 'Hedy', 'Lamarr', 1914, 2000, 'Austriaca', 6, 'https://es.wikipedia.org/wiki/Hedy_Lamarr', 'Hedy_Lamarr_Publicity_Photo_for_The_Heavenly_Body_1944.jpg', 'Inventora y actriz que desarrolló tecnología precursora del WiFi y Bluetooth.'),
(12, 'Annie', 'Easley', 1933, 2011, 'Estadounidense', 6, 'https://es.wikipedia.org/wiki/Annie_Easley', 'Annie_Easley_in_NASA.jpg', 'Científica informática y matemática en la NASA, pionera en la programación de cohetes.'),
(13, 'Radia', 'Perlman', 1951, NULL, 'Estadounidense', 6, 'https://es.wikipedia.org/wiki/Radia_Perlman', 'Radia_Perlman_2009.jpg', 'Científica informática, conocida como la \"madre de Internet\" por su trabajo en protocolos de red.'),
(14, 'Frances', 'Allen', 1932, 2020, 'Estadounidense', 6, 'https://es.wikipedia.org/wiki/Frances_Allen', 'Allen_mg_2528-3750K-b.jpg', 'Pionera en la optimización de compiladores y primera mujer en recibir el premio Turing.'),
(15, 'Barbara', 'Liskov', 1939, NULL, 'Estadounidense', 6, 'https://es.wikipedia.org/wiki/Barbara_Liskov', 'Barbara_Liskov_MIT_computer_scientist_2010.jpg', 'Informática que contribuyó a la programación orientada a objetos con el principio de sustitución de Liskov.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', 'b0f20c40b516be74bcb5bfc29f54887fada89e9100a1a6e6b7118f61d995f53deb4bebcec8af8f790f09da8cb174ea9c1273257be8af1343dac0825494bad488');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mujeres`
--
ALTER TABLE `mujeres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area` (`area`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mujeres`
--
ALTER TABLE `mujeres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mujeres`
--
ALTER TABLE `mujeres`
  ADD CONSTRAINT `mujeres_ibfk_1` FOREIGN KEY (`area`) REFERENCES `areas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
