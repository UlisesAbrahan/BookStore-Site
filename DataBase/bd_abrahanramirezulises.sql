-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2023 a las 07:22:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_abrahanramirezulises`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera`
--

CREATE TABLE `cabecera` (
  `id_cabecera` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_edit` datetime NOT NULL,
  `estado` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cabecera`
--

INSERT INTO `cabecera` (`id_cabecera`, `id_usuario`, `total`, `fecha_alta`, `fecha_edit`, `estado`) VALUES
(86, 51, 8000.00, '2023-07-25 16:16:27', '2023-07-25 16:16:27', 0),
(87, 51, 8000.00, '2023-07-25 21:19:12', '2023-07-25 21:19:12', 0),
(88, 52, 2000.00, '2023-07-28 18:08:42', '2023-07-28 18:08:42', 0),
(89, 52, 3000.00, '2023-07-28 18:35:10', '2023-07-28 18:35:10', 0),
(90, 52, 8000.00, '2023-07-28 19:23:03', '2023-07-28 19:23:03', 0),
(91, 52, 2000.00, '2023-07-29 00:42:54', '2023-07-29 00:42:54', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaprod`
--

CREATE TABLE `categoriaprod` (
  `id_categ` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `activo` int(11) DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoriaprod`
--

INSERT INTO `categoriaprod` (`id_categ`, `descripcion`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Cuentos Infantiles 2', 1, '2023-07-29 00:34:24', '2023-07-29 03:34:24'),
(2, 'Novelas', 1, '2023-07-24 08:28:05', '2023-07-24 11:27:30'),
(3, 'Ciencia ficcion y de Terror', 1, '2023-07-28 18:41:08', '2023-07-28 21:41:08'),
(4, 'Otros', 1, '2023-07-28 18:41:22', '2023-07-28 21:41:22'),
(10, 'Filosofía', 0, '2023-07-26 23:10:54', '2023-07-27 02:10:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `fecha_alta` datetime NOT NULL,
  `fecha_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `nombre`, `apellido`, `email`, `mensaje`, `estado`, `fecha_alta`, `fecha_edit`) VALUES
(14, 'Jimena', 'Aimara Fernandez', 'jimenaAimara@gmail.com', 'hola , tendria el libro de freuds ?', 1, '2023-07-24 23:40:29', '2023-07-25 16:14:15'),
(15, 'a', 'Fernandez', 'ayelenfer879@gmail.com', 'hola', 1, '2023-07-25 01:46:04', '2023-07-25 21:29:18'),
(16, 'Jimena', 'Fernandez', 'jimena@hotmail.com', 'hola tienes el libro llamado los idiotas', 1, '2023-07-25 21:10:07', '2023-07-25 21:29:14'),
(17, 'Jimena', 'Fernandez', 'jimena@hotmail.com', 'hola', 0, '2023-07-25 21:11:43', '2023-07-25 21:11:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_cabecera` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUni` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `id_cabecera`, `id_prod`, `cantidad`, `precioUni`) VALUES
(49, 86, 45, 2, 3000.00),
(50, 86, 51, 1, 2000.00),
(51, 87, 54, 2, 4000.00),
(52, 88, 50, 1, 2000.00),
(53, 89, 49, 1, 3000.00),
(54, 90, 44, 1, 8000.00),
(55, 91, 51, 1, 2000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL DEFAULT 2,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precioUni` decimal(10,2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `stock_min` int(11) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `id_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre`, `autor`, `descripcion`, `precioUni`, `imagen`, `stock`, `stock_min`, `activo`, `id_categ`) VALUES
(44, 'Don Quijote de la mancha', 'Miguel de Cervantes Saavedra', 'El ingenioso hidalgo don Quijote de la Mancha narra las aventuras de Alonso Quijano, un hidalgo pobre que de tanto leer novelas de caballería acaba enloqueciendo y creyendo ser un caballero andante, nombrándose a sí mismo como don Quijote de la Mancha.', 8000.00, '1690251072_7ee60d934ecd277e27c2.jpg', 1, 0, 1, 1),
(45, 'El coloquio de los perros', 'Miguel de Cervantes Saavedra', 'Cervantes diseña una elaborada fábula que sirve para hablar de la corrupción humana a través de los ojos de dos perros. Así pues, aprovecha el relato para dibujar sin dulzura alguna las conductas de personajes de diversos estratos sociales detallando con talento satírico cada escena.', 3000.00, '1690252237_2aa7d3f8ad541c788cb2.jpg', 1, 0, 1, 1),
(46, 'Maria dos prazeres', 'Gabriel García Márquez', 'María dos Prazeres, escrito originalmente en 1979, es el séptimo del compendio de doce cuentos escritos y redactados por el escritor Gabriel García Márquez a lo largo de dieciocho años, que conforman el libro llamado Doce cuentos peregrinos.', 2000.00, '1690252819_8edeba6619f59020b17a.jpg', 0, 0, 1, 4),
(47, 'Fantasía', 'Emilia Pardo Bazan', 'En esta novela se defiende la igualdad de hombres y mujeres en cuestiones de moral sexual. En España el naturalismo nunca consiguió los seguidores que logró en Francia. Doña Emilia continuó desarrollando sus teorías literarias con respecto a otro movimiento literario más destacado en España: el real', 1000.00, '1690253844_6f9fa1ac0754cbf94e6f.jpg', 0, 0, 1, 2),
(48, 'Si los gatos desaparecieron del mundo', 'Genki Kawamura', 'Un joven cartero regresa a su casa después de que el médico le diagnosticara un tumor cerebral en fase avanzada. Allí se encuentra a su gato Col y a un extraño personaje, idéntico a él excepto en su actitud y en su vistosa indumentaria.', 4000.00, '1690257452_ac9aad0483569b7b465c.jpg', 3, 0, 1, 2),
(49, 'Diario de un agente de homicidios', 'Óscar Tarruella', 'Una obra valiente y de lectura apasionante que acerca al lector el trabajo —a menudo mal retratado y poco conocido— de un investigador criminal y que, por desgracia, confirma el famoso axioma de que la realidad siempre supera la ficción.', 3000.00, '1690257687_354af513fdddde0ffac3.jpg', 1, 0, 1, 3),
(50, 'Mientras escribo', ' Stephen King', 'Mientras escribo es un libro de Stephen King publicado en 2000. Es una autobiografía sobre las experiencias como escritor del prolífico autor, y también sirve como un libro-guía para aquellos que eligen dedicarse al oficio. ', 2000.00, '1690258060_220446bc6c7cc84c349e.jpg', 1, 0, 1, 3),
(51, 'Si una estrella ves brillar.', 'Elizabeth Lim', '«Estrellita, la primera que esta noche divisé…». Así comienza el deseo que lo cambia todo para Geppetto, el Hada Azul y una pequeña marioneta llamada Pinocho. El Hada Azul no puede conceder deseos en el pueblo de Pariva, pero este en concreto despierta algo en su interior. Quizá es la esperanza que ', 2000.00, '1690258578_6477bf3ebe62fc848de6.jpg', 0, 0, 1, 1),
(52, 'Las dos  vidas de Mina Indigo', 'Alaitz Leceaga', 'Mina Índigo es la médium más solicitada de Barcelona. En su palacete del céntrico pasaje de Permanyer organiza sesiones espiritistas para ricas damas de la alta sociedad, pero, en realidad, es una experta investigadora que usa sus contactos para obtener información comprometedora de sus clientes', 3000.00, '1690301306_42a7751d4b3170743c2f.jpg', 1, 0, 1, 3),
(53, 'La teoría del amor', ' Ali Hazelwood', 'En esta fantástica comedia romántica de la autora de La hipótesis del amor y La química del amor, dos físicos rivales chocan en una vorágine de disputas académicas y relaciones falsas. Las múltiples vidas de la física teórica Elsie Hannaway han acabado atrapándola. De día es profesora adjunta', 2000.00, '1690301384_4d8478371860bf26e755.jpg', 2, 0, 1, 2),
(54, 'El cocinero', 'Luis Cerezo', 'Para los fans de ', 4000.00, '1690301522_63fa305a84aca06c1d8d.jpg', 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(800) NOT NULL,
  `id_perfil` int(11) DEFAULT 2,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `id_perfil`, `activo`) VALUES
(45, 'Ulises', 'Abrahan', 'ulisesabrahan858@gmail.com', '$2y$10$VWDaLSWulYe46DPlTpLWkeeoB7U462edIOjpRXG0WhH.76uNw1K5G', 1, 1),
(51, 'Jimena', 'Fernandez', 'jimena@hotmail.com', '$2y$10$aiWKBwA6j6HBIZQSsggeN.mKL803BDEi5p7YxWD46S9PhuCTBYqeq', 2, 0),
(52, 'Aimara', 'Lopez', 'aimaLopez@gmail.com', '$2y$10$JwNaOwiiWRJwIZvF01zVCOnKeC0R0iz475CDt9OFuOWfMf.v8/j..', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabecera`
--
ALTER TABLE `cabecera`
  ADD PRIMARY KEY (`id_cabecera`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categoriaprod`
--
ALTER TABLE `categoriaprod`
  ADD PRIMARY KEY (`id_categ`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_categ` (`id_categ`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabecera`
--
ALTER TABLE `cabecera`
  MODIFY `id_cabecera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `categoriaprod`
--
ALTER TABLE `categoriaprod`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabecera`
--
ALTER TABLE `cabecera`
  ADD CONSTRAINT `FK_cabeceraUsu` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `FK_productDetalle` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_categoriaProd` FOREIGN KEY (`id_categ`) REFERENCES `categoriaprod` (`id_categ`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
