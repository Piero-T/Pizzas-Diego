-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:33065
-- Tiempo de generación: 12-07-2023 a las 22:59:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puka_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `type`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'admin'),
(2, 'Keyla', 'e544b9137ad00241cac94ce1c4800abcc74e9add', 'admin'),
(3, 'Ariana', 'a0e34bccafe9e1974cec90464664a2b33f10af3c', 'admin'),
(5, 'Alexia', '8b0370be2f41ca19d8247628612cb3a803137ead', 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(5, 25, 8, 'Filete de Atún Florida', 6, 2, 'atunFlorida.jpg'),
(31, 28, 8, 'Filete de Atún Florida', 6, 1, 'atunFlorida.jpg'),
(35, 29, 60, 'Arroz Extra COSTEÑO Bolsa 5Kg', 23, 1, 'arroz_costeño_5kg.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(11) NOT NULL,
  `placed_on` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `method`, `address`, `reference`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 25, 'keyla', '931452371', 'cash on delivery', 'flat no.surco, surcooo - ', '', 'Filete de Atún Florida ( 6 x 3 ) - ', 18, '2023-05-10 19:54:43', 'completed'),
(3, 26, 'Victor', '931452371', 'cash on delivery', 'flat no.Calle Los Conquistadores Mz A Lt 10 ', 'Frente a Parque Sagrado Corazon ', 'Galleta Oreo x6 ( 4 x 1 ) - Inka Chips Sabor Jalapeño ( 8 x 1 ) - ', 12, '2023-05-23 01:50:40', 'pending'),
(8, 26, 'Victor', '931452371', 'yape', 'flat no.Calle Los Conquistadores Mz A Lt 10, Frente a Parque Sagrado Corazon', '', 'Galleta Oreo x6 ( 4 x 1 ) - Inka Chips Sabor Jalapeño ( 8 x 1 ) - ', 12, '2023-05-25 14:36:52', 'pending'),
(9, 26, 'Victor', '931452371', 'cash on delivery', 'flat no.Calle Los Conquistadores Mz A Lt 10 ', 'Frente a Parque Sagrado Corazon ', 'Filete de Atún Florida ( 6 x 1 ) - ', 6, '2023-06-02 01:43:26', 'pending'),
(10, 26, 'Victor', '931452371', 'cash on delivery', 'flat no.Calle Los Conquistadores Mz A Lt 10 ', 'Frente a Parque Sagrado Corazon ', 'Papel Higienico Suave  x2 ( 3 x 2 ) - ', 6, '2023-06-02 01:46:04', 'completed'),
(11, 29, 'Sebastian', '931426987', 'cash on delivery', 'Av.Proceres Mz A Lt11', 'Frente a Plaza Vea', 'Fideo Linguini Grosso Don Vittorio ( 7 x 1 ) - Doritos ( 7 x 1 ) - ', 14, '2023-06-02 02:02:31', 'pending');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `cantidad` int(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `categoria`, `price`, `image`, `cantidad`) VALUES
(8, 'Filete de Atún Florida', 'Viveres', 6, 'atunFlorida.jpg', 21),
(9, 'Fideo Linguini Grosso Don Vittorio', 'Viveres', 7, 'fideoDV.png', 20),
(10, 'Papel Higienico Suave  x2', 'Higiene y Limpieza', 3, 'papelHigienicoSuave.jpeg', 24),
(11, 'Detergente Patito x140gr', 'Higiene y Limpieza', 2, 'detergentePatito.jpg', 30),
(12, 'Galleta Oreo x6', 'Dulces', 4, 'oreo.png', 25),
(13, 'Helado Sublime 516gr', 'Dulces', 18, 'heladoSublime.jpg', 45),
(14, 'Papas Lays', 'Snacks', 2, 'papasLays.png', 19),
(15, 'Inka Chips Sabor Jalapeño', 'Snacks', 8, 'inkaChips.png', 24),
(16, 'Frugos Valle 1L', 'Bebidas', 4, 'frugosValle.jpg', 23),
(17, 'Gaseosa Coca Cola 3L', 'Bebidas', 12, 'cocaCola3.jpg', 30),
(18, 'Galleta Glacitas Toffee', 'Dulces', 5, 'galleta-glacitas-toffee.jpg', 19),
(19, 'Gaseosa Pepsi 3L', 'Bebidas', 8, 'pepsi3l.jpg', 25),
(20, 'Jabon Liquido Aval', 'Higiene y Limpieza', 5, 'jabon-antibac-aval.jpg', 23),
(21, 'Agua San Mateo 2.5 L', 'Bebidas', 3, 'agua_san_mateo.jpg', 20),
(22, 'Cerveza Cusqueña 6pack', 'Bebidas', 22, 'cerveza_cusqueña_botella_6pack.jpg', 20),
(23, 'Cerveza Cristal 12pack', 'Bebidas', 38, 'cerveza_cristal_lata_12pack.jpg', 25),
(24, 'Cerveza Corona 6pack', 'Bebidas', 29, 'cerveza_corona__botella_6pack.jpg', 20),
(25, 'Cerveza Pilse 6pack', 'Bebidas', 21, 'cerveza_pilsen__botella_6pack.jpg', 45),
(26, 'Cerveza Pilsen lata 6pack', 'Bebidas', 23, 'cerveza_pilsen__lata_6pack.jpg', 45),
(27, 'INKA KOLA 2.5L ', 'Bebidas', 9, 'gaseola_inka_2.5L.jpg', 23),
(28, 'Fanta 6pack', 'Bebidas', 12, 'gaseosa_fanta_6pack.jpg', 25),
(29, 'Agua San Carlos 3L', 'Bebidas', 3, 'agua_san_carlos_3L.jpg', 28),
(30, 'Agua San Mateo 7L', 'Bebidas', 8, 'agua_san_mateo_7L.jpg', 20),
(31, 'Doritos', 'Snacks', 7, 'Doritos_210g.jpg', 45),
(32, 'Tortees Picante 71g', 'Snacks', 3, 'tortees_picante_71g.jpg', 23),
(33, 'Cheetos', 'Snacks', 8, 'cheetos_200g.jpg', 45),
(35, 'Tortees Salado 71g', 'Snacks', 3, 'tortees_salado_71g.jpg', 25),
(36, 'Habas saladas 150g', 'Snacks', 6, 'habas_saladas_150g.jpg', 20),
(37, 'Papas Pringles 124g', 'Snacks', 14, 'Papas_pringles_124g.jpg', 28),
(38, 'Papas Lay&#39;s Picante ', 'Snacks', 6, 'Papas_lays_picante.jpg', 28),
(39, 'Frutos Secos 150g', 'Snacks', 9, 'frutos_secos.jpg', 23),
(40, 'CHIZITOS 190g', 'Snacks', 7, 'chizitos.jpg', 25),
(41, 'Papas al Hilo 500g', 'Snacks', 19, 'papas_hilo_500g.jpg', 45),
(42, 'Gomas sabor Ecualipto 125g', 'Dulces', 10, 'gomas_ecualipto_125g.jpg', 28),
(43, 'Olé Olé bolsa 50 unidades', 'Dulces', 9, 'ole_ole.jpg', 20),
(44, 'Camping Bolsa 250g', 'Dulces', 13, 'camping_bolsa.jpg', 28),
(45, 'Galle Vainilla 6 unidades', 'Dulces', 5, 'galleta_vainilla.jpg', 23),
(46, 'Galletas Morochas 6 unidades', 'Dulces', 5, 'galletas_morochas_6u.jpg', 25),
(47, 'Galletas PICARAS 6 unidades', 'Dulces', 5, 'galletas_picaras_6u.jpg', 19),
(48, 'Galletas GLACITAS Sabor a Toffe Bolsa 8un', 'Dulces', 5, 'galletas_glacitas_8u.jpg', 28),
(49, 'Galletas CASINO Sabor a Menta Paquete 8un', 'Dulces', 5, 'galleta_casino_8u.jpg', 45),
(50, 'Galletas FIELD Coronita Sixpack Paquete 216g', 'Dulces', 5, 'galleta_coronita_6u.jpg', 28),
(51, 'Lavavajillas Líquido AYUDÍN Limón y Sábila Botella 1.2L', 'Higiene y Limpieza', 18, 'ayudin_1.2L.jpg', 45),
(52, 'Lavavajillas SAPOLIO Limón Pote 800g', 'Higiene y Limpieza', 6, 'sapolio_pote_800g.jpg', 20),
(53, 'Esponja SCOTCH BRITE Cocina y Baño Paquete 2un', 'Higiene y Limpieza', 10, 'esponja_3u.jpg', 28),
(54, 'Lejía Mr. Brillo 1 galón', 'Higiene y Limpieza', 12, 'lejia_galon.jpg', 45),
(55, 'Lejía SAPOLIO Galonera 5L', 'Higiene y Limpieza', 12, 'lejia_galon_sapolio.jpg', 23),
(56, 'Limpiador POETT Frescura de Lavanda Botella 3.8L', 'Higiene y Limpieza', 14, 'poett_3.8L.jpg', 25),
(57, 'Aceite Vegetal PRIMOR Premium Botella 900ml', 'Viveres', 12, 'aceite_vegetal_primor.jpg', 28),
(58, 'Aceite Vegetal BELL&#39;S Galonera 5L', 'Viveres', 45, 'aceite_vegetal_bells_5l.jpg', 20),
(59, 'Aceite de Oliva BELL&#39;S Extra Virgen Botella 1L', 'Viveres', 30, 'aceite_oliva_1L.jpg', 28),
(60, 'Arroz Extra COSTEÑO Bolsa 5Kg', 'Viveres', 23, 'arroz_costeño_5kg.jpg', 28),
(61, 'Arroz Superior COSTEÑO Bolsa 750g', 'Viveres', 4, 'arroz_costeño_750g.jpg', 23),
(62, 'Arroz Integral BELL&#39;S Bolsa 750g', 'Viveres', 4, 'arroz_integral_bells_760g.jpg', 28),
(63, 'Azúcar Rubia DULFINA Bolsa 5Kg', 'Viveres', 22, 'azucar_rubia_dulfina_5kg.jpg', 28),
(64, 'Azúcar Blanca BELL&#39;S Bolsa 650g', 'Viveres', 3, 'azucar_blanca_bells_650g.jpg', 28),
(65, 'Mostaza ALPESA Doypack 80g', 'Viveres', 2, 'mostaza_alpesa_80g.jpg', 25),
(66, 'Mayonesa ALACENA Doypack 475g', 'Viveres', 12, 'mayonesa_alacena_475g.jpg', 20),
(67, 'Sillao AJI-NO-SILLAO Botella 500ml', 'Viveres', 5, 'sillao_500ml.jpg', 23),
(68, 'Caldo de Gallina DOÑA GUSTA Concentrado en Polvo Caja 42g', 'Viveres', 2, 'doña_gusta_42g.jpg', 28),
(69, 'Detergente en Polvo ACE Regular Bolsa 4Kg', 'Higiene y Limpieza', 48, 'detergente_ace_4kg.jpg', 25),
(70, 'Jabón en Barra BOLÍVAR Floral Paquete 190g 2un', 'Higiene y Limpieza', 6, 'jabon_bolivar_2u.jpg', 28),
(71, 'Suavizante Concentrado de Telas DOWNY Floral Botella 4.8L', 'Higiene y Limpieza', 38, 'suavizante_downy_4.8L.jpg', 28),
(72, 'Lavavajilla en Pasta BOREAL Limón Pote 800g', 'Higiene y Limpieza', 5, 'lavavajilla_boreal_800g.jpg', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(25, 'Keyla', 'keyla@gmail.com', 'e544b9137ad00241cac94ce1c4800abcc74e9add'),
(26, 'Victor', 'victor@gmail.com', '33bb55ba1f9b2a1a5affa278cf2d486f29062066'),
(27, 'Karen', 'karen@gmail.com', '5cbfe74dabe62625eba8284b7ff7f30284786b8e'),
(29, 'Sebastian', 'sebastian@gmail.com', '1398893edf5aaeae890ec09379f88e8e3b20ffe0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
