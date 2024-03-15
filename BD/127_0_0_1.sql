-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2023 a las 15:52:10
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pdtweb`
--
CREATE DATABASE IF NOT EXISTS `pdtweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pdtweb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NomEmpresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FecIngreso` date DEFAULT NULL,
  `Salario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salDiario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Puesto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FecBaja` date DEFAULT NULL,
  `DiasLaborales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `NomEmpresa`, `FecIngreso`, `Salario`, `salDiario`, `Area`, `Puesto`, `FecBaja`, `DiasLaborales`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Innovet', '2022-10-07', '$5000', '$250', 'Termoformado', 'Operador', NULL, '5', 1, NULL, NULL),
(4, 'Solgistika', '2022-10-13', '$5000', '$250', 'Remanufactura', 'Retrabajo', NULL, '6', NULL, NULL, NULL),
(5, 'Innovet', '2022-10-13', '$10000', '$250', 'Control', 'Auxiliar de Control', NULL, 'L-V', 4, '2022-11-07 22:24:26', '2022-11-07 22:24:26'),
(6, 'INNOVET', '2022-11-10', '$5000', '$250', 'maquinados', 'Auxiliar de Almacén', NULL, 'L-V', 6, '2022-11-10 04:55:20', '2022-11-10 04:55:20'),
(7, 'INNOVET', '2022-12-03', '$50000', '$2541', 'Monopoli', 'Auxiliar de Almacén', NULL, 'L-V', 5, '2022-11-10 04:59:34', '2022-11-10 04:59:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TecCelular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TecTelefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CEmergencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DEmergencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CelEmergencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEmergencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `TecCelular`, `TecTelefono`, `CEmergencia`, `DEmergencia`, `CelEmergencia`, `TEmergencia`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '5578963424', '5544887928', NULL, NULL, NULL, NULL, 1, '2022-10-24 21:10:33', '2022-11-09 06:39:39'),
(2, '5599862356', '2356898745', NULL, NULL, NULL, NULL, 4, '2022-10-25 22:16:24', '2022-10-25 22:16:24'),
(3, '5561145936', '5561145936', NULL, NULL, NULL, NULL, 5, '2022-11-01 00:42:15', '2022-11-01 00:42:15'),
(4, '7258962356', '7258962378', NULL, NULL, NULL, NULL, 6, '2022-11-10 00:58:00', '2022-11-10 00:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Sexo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Edad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FechaN` date DEFAULT NULL,
  `LNa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NSS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RFC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Curp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ECivil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TSangre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NBanco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tplayera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NZapatos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Uniforma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `details`
--

INSERT INTO `details` (`id`, `Sexo`, `Edad`, `FechaN`, `LNa`, `NSS`, `RFC`, `Curp`, `ECivil`, `TSangre`, `NBanco`, `Tplayera`, `NZapatos`, `Uniforma`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Femenino', '24', '1999-10-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-10-24 21:10:33', '2022-11-09 06:39:39'),
(2, 'Femenino', '26', '1996-11-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2022-10-25 22:16:24', '2022-10-25 22:16:24'),
(3, 'Masculino', '23', '1999-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2022-11-01 00:42:15', '2022-11-01 00:42:15'),
(4, 'Masculino', '25', '1997-10-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2022-11-10 00:58:00', '2022-11-10 00:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directions`
--

CREATE TABLE `directions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NExterior` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NInterior` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Localidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Municipio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `directions`
--

INSERT INTO `directions` (`id`, `calle`, `NExterior`, `NInterior`, `Localidad`, `Municipio`, `Estado`, `CP`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Aldama', '5', '26', 'Chico', 'Tlalmanalco', 'Estado de México', '57896', 1, '2022-10-24 21:10:33', '2022-10-24 21:10:33'),
(2, 'Durazno', '56', '57', 'Nahuala', 'Cholula', 'Puebla', '48798', 4, '2022-10-25 22:16:24', '2022-10-25 22:16:24'),
(3, 'Las Flores', '56', 'sn', 'Coyoacan', 'Sta. Ursula Coapa', 'Ciudad de México', '04600', 5, '2022-11-01 00:42:15', '2022-11-01 00:42:15'),
(4, 'Piedras negras', 'SN', 'SN', 'Acuco', 'Cocotema', 'Estado de México', '59862', 6, '2022-11-10 00:58:00', '2022-11-10 00:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombreFile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documents`
--

INSERT INTO `documents` (`id`, `nombreFile`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'asesoria-de-residencias-02-09-22pdf.pdf', 1, '2022-11-03 05:44:00', '2022-11-03 05:44:00'),
(2, 'plantilla-para-informe-tecnico-de-residencia-profesional-2022pdf.pdf', 4, '2022-11-09 21:43:29', '2022-11-09 21:43:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Municipio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Direccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NumCasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Referencias` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CentroTrabajo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Condominio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OcupantesReales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Capacidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactoArre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FechaIn` date DEFAULT NULL,
  `FechaTer` date DEFAULT NULL,
  `Condiciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `houses`
--

INSERT INTO `houses` (`id`, `Estado`, `Municipio`, `Colonia`, `Direccion`, `NumCasa`, `Referencias`, `Ubicacion`, `user_id`, `created_at`, `updated_at`, `CentroTrabajo`, `Condominio`, `OcupantesReales`, `Capacidad`, `ContactoArre`, `FechaIn`, `FechaTer`, `Condiciones`) VALUES
(1, 'Querétaro', 'El marques', 'La piedad', 'Circuito colinas número 1000, condominio lago Pátzcuaro', '29', 'Entre pitaya y los demás condominios', 'https://goo.gl/maps/Eea36Dyg8PUSatyk8', 2, '2022-10-25 03:23:19', '2022-10-28 21:21:36', 'INNOVET', 'Rosal', NULL, '14', '5568487895', '2022-10-05', '2022-10-04', 'jnjcnjnencejn'),
(2, 'Campeche', 'Mañ', 'San pedro', 'Av. del marqués calle, sin nombre', '56', 'Alado del Oxxo', 'https://goo.gl/maps/VCu9pKbWYLDfb65U9', 2, '2022-10-25 19:04:42', '2022-10-28 21:20:47', 'TExtl', 'Pátzcuaro', NULL, '7', '4424864889', '2022-09-29', '2022-10-05', 'chido'),
(3, 'Ciudad de México', 'Tlalmanalco', 'San pedro', 'Av, carrera dos A ver si no agrega otro registro', '56', 'Alado del Oxxo das vuelta y encuentras otro oxxo y das vuelta a la izquierda', 'https://goo.gl/maps/VCu9pKbWYLDfb65U9', 2, '2022-10-25 20:18:24', '2022-10-28 21:19:24', 'INGRAM', 'JULIETA', NULL, '4', '4424864879', '2022-10-28', '2022-10-15', 'Medio mal'),
(4, 'Chihuahua', 'Pátzcuaro', 'Lejos', 'Calle los robles num. 56', '56', 'A lado de la wallmart', 'httpesss://cbxjnjnjx', 2, '2022-10-28 04:17:15', '2022-11-08 06:10:02', 'Trebol', 'Manzana', NULL, '4', '3429348592', '2022-10-20', '2022-10-27', 'Excelente men'),
(5, 'Nuevo León', 'Marquez', 'Piedad', 'AV, Robles y refugio', '5', 'Alado del Oxxo', 'https://goo.gl/maps/89JpgAFrKjB3ouLR9', 2, '2022-10-28 20:14:53', '2022-10-28 22:49:37', 'CEVA', 'Pátzcuaro', NULL, '5', '5568487895', '2022-10-28', '2022-10-29', 'bien Excelent'),
(6, 'Nayarit', 'der', 'frfrs', 'wrdhbisdjncds', 'a787', 'sadaasd', 'https://goo.gl/maps/naXzHmwbFTvLDHSy7', 2, '2022-11-03 05:38:11', '2022-11-03 05:38:57', 'AbForti', 'mijangos', NULL, '6', '5986781421', '2022-12-02', '2022-11-24', 'Buen estado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interviews`
--

CREATE TABLE `interviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Ent1` date DEFAULT NULL,
  `Ent2` date DEFAULT NULL,
  `Hora1` time DEFAULT NULL,
  `Hora2` time DEFAULT NULL,
  `Link1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Link2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `interviews`
--

INSERT INTO `interviews` (`id`, `Ent1`, `Ent2`, `Hora1`, `Hora2`, `Link1`, `Link2`, `info`, `info2`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2022-10-25', '2022-11-03', '19:50:00', '21:53:00', 'https://www.youtube.com/c/Gantik/videos', 'https://www.youtube.com/c/Gantik/videos', 'editando', 'editado 4', 4, '2022-10-26 03:50:57', '2022-11-03 05:36:41'),
(2, '2022-10-26', '2022-11-04', '13:54:00', '15:34:00', NULL, 'https://www.youtube.com/watch?v=AUvodoVurps', 'Mejoras', 'Todos los campos deben estar llenos a ver', 5, '2022-11-01 00:53:04', '2022-11-03 03:32:54'),
(4, '2022-12-01', '2022-11-19', '17:48:00', '19:48:00', 'https://www.youtube.com/watch?v=lwFvC4dFx0o&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', 'https://www.youtube.com/watch?v=lwFvC4dFx0o&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', 'no pues nel', 'Nomas no', 6, '2022-11-10 04:48:35', '2022-11-10 04:54:24'),
(5, '2022-12-01', '2022-11-19', '17:48:00', '19:48:00', 'https://www.youtube.com/watch?v=lwFvC4dFx0o&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', 'https://www.youtube.com/watch?v=lwFvC4dFx0o&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', NULL, NULL, 2, '2022-11-10 04:49:00', '2022-11-10 04:49:00'),
(6, '2022-11-17', '2022-11-09', '16:54:00', '22:56:00', 'https://www.youtube.com/watch?v=lwFvC4dFx0o&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', 'https://www.youtube.com/watch?v=lwFvC4dFx0o&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', NULL, NULL, 1, '2022-11-10 04:51:58', '2022-11-10 04:51:58'),
(7, '2022-12-08', '2022-11-04', '17:06:00', '20:05:00', 'https://www.youtube.com/watch?v=S9hMyq-98ho&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', 'https://www.youtube.com/watch?v=S9hMyq-98ho&list=RDEMiY2_YzGwl9P8MvsPxV6u8g&index=27', NULL, NULL, 5, '2022-11-10 05:05:14', '2022-11-10 05:05:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_30_150804_create_vacants_table', 1),
(6, '2022_09_30_160613_create_details_table', 1),
(7, '2022_09_30_164843_create_schools_table', 1),
(8, '2022_09_30_174749_create_directions_table', 1),
(9, '2022_09_30_181616_create_contacts_table', 1),
(10, '2022_09_30_211246_create_projects_table', 1),
(11, '2022_09_30_212932_create_skills_table', 1),
(12, '2022_09_30_220433_create_companies_table', 1),
(13, '2022_09_30_223550_create_houses_table', 1),
(14, '2022_10_05_205314_add_username_to_users_table', 1),
(15, '2022_10_06_172114_add_ubication_to_vacants_table', 1),
(16, '2022_10_10_205147_add_interview_to_vacants_table', 1),
(17, '2022_10_17_173056_create_documents_table', 1),
(19, '2022_10_25_174125_create_interviews_table', 2),
(21, '2022_10_28_140354_add_room_to_houses_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NomProyecto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asesor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Aimplementacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FecInicio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RevUno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RevDos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RevTres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EntregaFinal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FecTermino` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `NomProyecto`, `Area`, `asesor`, `Aimplementacion`, `FecInicio`, `RevUno`, `RevDos`, `RevTres`, `EntregaFinal`, `FecTermino`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Manual De afore 2', 'Control control', 'Eloisa Villa Fuerte', 'Finanzas', '2022-11-24', '40', '40', '100', '2023-11-24', '2023-04-24', 1, '2022-10-24 21:33:01', '2022-11-03 05:44:57'),
(2, 'Lfmrftsde', 'Control', 'Joaquin Delgado Burickff', 'ABFORTI', '2022-11-23', '85', '95', '78', '2023-11-03', '2023-01-23', 4, '2022-11-07 22:38:11', '2022-11-10 22:55:11'),
(3, 'uno', 'monopli', 'Carlos', 'innovet', '2022-12-01', '51', NULL, NULL, NULL, '2022-11-22', 6, '2022-11-10 05:03:29', '2022-11-10 05:03:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NEscuela` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DireccionE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Carrera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Especialidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Semestre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `schools`
--

INSERT INTO `schools` (`id`, `NEscuela`, `DireccionE`, `Telefono`, `Carrera`, `Especialidad`, `Semestre`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Instituto Insurgentez', 'Av.Norte Camino viejo', '4547845487', 'Contabilidad', 'Empresarial', '10', 1, '2022-10-24 21:10:33', '2022-11-09 06:39:39'),
(2, 'Tecnologico De cholula', 'av, del durazno numero 3', '5698784512', 'Arquitectura', 'Mezcla Rigida', '9', 4, '2022-10-25 22:16:24', '2022-10-25 22:16:24'),
(3, 'Instituto Tecnológico de Tláhuac', 'Av. Tlahuac', '5512345678', 'Ing. en Sistemas Computacionales', 'Adom. de Servicios Web', '11', 5, '2022-11-01 00:42:15', '2022-11-01 00:42:15'),
(4, 'TECNM Campus Tláhuac', 'AV, Del marques', '5478634512', 'Sistemas Automotrices', 'Motores', '8', 6, '2022-11-10 00:58:00', '2022-11-10 00:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Habillidades` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Trabajos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `F1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `F2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `F3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `skills`
--

INSERT INTO `skills` (`id`, `Habillidades`, `Trabajos`, `F1`, `F2`, `F3`, `D1`, `D2`, `D3`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-10-24 21:11:09', '2022-11-09 06:31:12'),
(2, 'Ser interesante y proactivo', 'Si, negocio informal', 'Compañerismo', 'Resilencia', 'Responsabilidad', 'Inferioridad', 'Impaciente', 'Apatía', 4, '2022-10-25 22:17:01', '2022-10-25 22:17:01'),
(3, 'Soy programador web, se html, css, javascript, php y base de datos.', 'Por el momento no he trabajado en areas relacionadas con mi carrera.', 'Diciplina', 'Responsabilidad', 'Empatia', 'Pesimismo', 'Indeciso', 'Pereza', 5, '2022-11-01 00:45:28', '2022-11-01 00:45:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `APP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ROL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `houses_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `APP`, `APM`, `username`, `ROL`, `vacant_id`, `houses_id`) VALUES
(1, 'Paola', 'Pao@mail.com', NULL, '$2y$10$VY1ioe7qd8PD3mm8egPlMuyWlU1W0tYzBFUE9fzXf0mpPgEXhOQFi', NULL, '2022-10-24 21:07:07', '2022-10-24 21:16:14', 'Becerril', 'Velázquez', 'pao', 'Tecnologo', 1, 5),
(2, 'Mauricio', 'mau@mail.com', NULL, '$2y$10$VY1ioe7qd8PD3mm8egPlMuyWlU1W0tYzBFUE9fzXf0mpPgEXhOQFi', NULL, NULL, NULL, 'Salas', 'Tenorio', 'Maus', 'Administrador', NULL, NULL),
(3, 'Juan', 'juan@mail.com', NULL, '$2y$10$VY1ioe7qd8PD3mm8egPlMuyWlU1W0tYzBFUE9fzXf0mpPgEXhOQFi', NULL, NULL, NULL, 'Pérez', 'Barragán', 'Juans', 'Tecnologo', 1, 3),
(4, 'Ana Maria Paola', 'teo@mail.com', NULL, '$2y$10$TbG8ZyQsxcS4/wOKfckuR.eaQHUUU.TkmLDW2ESh4/KK4dz4AKHkC', NULL, '2022-10-25 22:14:27', '2022-11-07 22:24:26', 'Villa Vicencio', 'De la Condeza', 'teodora', 'Tecnologo', 1, 3),
(5, 'Luis Gustavo', 'luis@mail.com', NULL, '$2y$10$TbG8ZyQsxcS4/wOKfckuR.eaQHUUU.TkmLDW2ESh4/KK4dz4AKHkC', NULL, '2022-11-01 00:33:15', '2022-11-01 00:46:17', 'Villarreal', 'Cigarroa', 'luis', 'Candidato', 5, NULL),
(6, 'Patrick', 'patrick@mail.com', NULL, '$2y$10$Ja.bGmI.xXKVQ.5DkgNIiurYdt4h2LgzLDfTaMN9jEcMlTuWF0L6K', NULL, '2022-11-09 23:25:17', '2022-11-10 04:59:34', 'Pullosky', 'Bufoy', 'bufoy', 'Tecnologo', 5, 3),
(7, 'Jose', 'jose@mail.com', NULL, '$2y$10$ZHlPli7gsHC6z6cVzCAtP.TA9l64diaPRXfOAEbwmcWqwOOb0evue', NULL, '2022-11-10 23:42:30', '2022-11-10 23:42:30', 'Stuard', 'Quintanilla', 'yoss', 'Administrador', NULL, NULL),
(8, 'Marco', 'marco@mail.com', NULL, '$2y$10$uG2b/WGeZ4lDCFfOtrA8MuygVGBA2HbCmD1Z2W8Bb7RIXxKyKIEpu', NULL, '2022-11-11 00:24:30', '2022-11-11 00:24:30', 'Antu', 'Ubuntu', 'kass', 'Administrador', NULL, NULL),
(9, 'Consuelo', 'consuelo@mail.com', NULL, '$2y$10$Y8O1AjjVQq0KeDFs7UqSEOg2RCheMe.lk1RJJbxWo1uFfNuucZH66', NULL, '2022-11-11 00:28:49', '2022-11-11 00:28:49', 'Richards', 'Uribe', 'consuelo', 'Administrador', NULL, NULL),
(10, 'Gloria', 'gloria@mail.com', NULL, '$2y$10$uYLbbuojtX1urNvZcbemgeYRVIIAW6FFiQ/q8R2bqpyLVIebbyzNC', NULL, '2022-11-11 00:32:15', '2022-11-11 00:32:15', 'Trevi', 'Crujito', 'gloris', 'Administrador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacants`
--

CREATE TABLE `vacants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vacante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Creador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `LugarT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Salario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Carreras` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ofrecemos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Duracion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ubicacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ent1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ent2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vacants`
--

INSERT INTO `vacants` (`id`, `Empresa`, `Vacante`, `Descripcion`, `Creador`, `created_at`, `updated_at`, `LugarT`, `Salario`, `Carreras`, `Ofrecemos`, `Duracion`, `Ubicacion`, `Ent1`, `Ent2`, `info`, `info2`) VALUES
(1, 'Innovet', 'Auxiliar de Control', 'Llevar la contabilidad de la empresa  entre otras cosas', 'Mauricio', NULL, NULL, 'Querétaro El marques', '$5000', 'Ing. Contabilidad, Ing. Administración de empresas', 'Liberación de estadías, residencias profesionales, apoyo con vivienda', '6 meses', 'Plaza Omega Center, PA-228, Parque Industrial Bernardo Quintana, 76246 Qro.', NULL, NULL, NULL, NULL),
(2, 'Be ExEn', 'Vendedor', 'Vender soluciones eléctricas renovables', '2', '2022-10-27 22:17:38', '2022-11-07 23:50:39', 'Querétaro', '$5000', 'Ventas', 'Comida al 50% y Vivienda', '6 meses', 'Av. del Marqués 7, 76246 Qro.', NULL, NULL, NULL, NULL),
(3, 'Solgistika', 'Auxiliar de GCH', 'Retrabajar piezas plasticas', '2', '2022-10-27 22:19:03', '2022-10-27 23:41:38', 'Querétaro', '$5000', 'Ing. industrial', 'vivienda', '6 meses', 'Av. del Marqués 7, 76246 Qro.', NULL, NULL, NULL, NULL),
(4, 'INNOVET', 'Auxiliar de GCH', 'UbicacionUbicacion', '2', '2022-10-27 22:23:20', '2022-10-27 22:23:20', 'Querétaro', '$5000', 'Ing. Gestión empresarial, Ing, Administración de empresas, Ing, capital humano', 'UbicacionUbicacion', '6 meses', 'Av. del Marqués 7, 76246 Qro.', NULL, NULL, NULL, NULL),
(5, 'INNOVET', 'Auxiliar de Almacén', 'EFECTIVALE, empresa líder en medios de pagos electrónicos, está en búsqueda de \"Ejecutivos en ventas telefónicas\" para colocar nuestros servicios de vales de despensa, restaurante y combustible a empresas.', '2', '2022-10-27 23:29:24', '2022-11-03 05:35:47', 'Querétaro', '$5000', 'Ing. Gestión empresarial, Ing, Administración de empresas, Ing, capital humano', 'Vivienda, liberación de prácticas profesionales, más bono de productividad edicion', '7 meses', 'Av. del Marqués 7, 76246 Qro. a lado del Omega', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `details_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houses_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interviews_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_vacant_id_foreign` (`vacant_id`),
  ADD KEY `users_houses_id_foreign` (`houses_id`);

--
-- Indices de la tabla `vacants`
--
ALTER TABLE `vacants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `directions`
--
ALTER TABLE `directions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vacants`
--
ALTER TABLE `vacants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_houses_id_foreign` FOREIGN KEY (`houses_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_vacant_id_foreign` FOREIGN KEY (`vacant_id`) REFERENCES `vacants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"angular_direct\":\"angular\",\"relation_lines\":\"true\",\"full_screen\":\"on\",\"small_big_all\":\">\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'table', 'personal-computadoras', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"allrows\":\"1\",\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@TABLE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la tabla @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la tabla @TABLE@ (continúa)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenido de la tabla @TABLE@\",\"latex_data_continued_caption\":\"Contenido de la tabla @TABLE@ (continúa)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('scri', 1, 'base de datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"scri\",\"table\":\"autos\"},{\"db\":\"scri\",\"table\":\"computadora\"},{\"db\":\"scri\",\"table\":\"servicio_autos\"},{\"db\":\"scri\",\"table\":\"departamentos\"},{\"db\":\"scri\",\"table\":\"celular\"},{\"db\":\"scri\",\"table\":\"login\"},{\"db\":\"scri\",\"table\":\"dominios\"},{\"db\":\"scri\",\"table\":\"ve_equipos_asignados\"},{\"db\":\"scri\",\"table\":\"computadora_has_licencias\"},{\"db\":\"scri\",\"table\":\"kilometraje\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Volcado de datos para la tabla `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('scri', 'autos', 1, 48, 335),
('scri', 'celular', 1, 494, 3),
('scri', 'computadora', 1, 1102, 484),
('scri', 'computadora_has_licencias', 1, 1119, 6),
('scri', 'departamentos', 1, 1421, 437),
('scri', 'empresa', 1, 1418, 767),
('scri', 'kilometraje', 1, 259, 5),
('scri', 'licencias', 1, 1404, 7),
('scri', 'login', 1, 1666, 423),
('scri', 'pass', 1, 1620, 9),
('scri', 'perifericos', 1, 253, 418),
('scri', 'personal', 1, 481, 764),
('scri', 'propietarios', 1, 716, 457),
('scri', 'provedores', 1, 1412, 280),
('scri', 'rutas', 1, 37, 0),
('scri', 'servicio_autos', 1, 278, 162),
('scri', 'servicios', 1, 1620, 148),
('scri', 'stock', 1, 1178, 113),
('scri', 'usuarios', 1, 1650, 590);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('scri', 'computadora_has_licencias', 'computadora_id_compu'),
('scri', 'kilometraje', 'año'),
('scri', 'usuarios', 'nombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-01-20 14:51:45', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\",\"ThemeDefault\":\"pmahomme\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `scri`
--
CREATE DATABASE IF NOT EXISTS `scri` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `scri`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id_autos` int(11) NOT NULL,
  `id_propietario` int(11) DEFAULT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `claveVehicular` varchar(15) NOT NULL,
  `vin` varchar(25) NOT NULL,
  `factura` varchar(30) DEFAULT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(8) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `transmision` int(11) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `combustible` varchar(30) DEFAULT NULL,
  `no_motor` varchar(15) DEFAULT NULL,
  `placas` varchar(10) DEFAULT NULL,
  `poliza_seguro` varchar(30) DEFAULT NULL,
  `fin_poliza` date DEFAULT NULL,
  `tarjeta` varchar(30) DEFAULT NULL,
  `fin_tarjeta` date DEFAULT NULL,
  `estado_placa` varchar(30) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `EstatusVerificacion` int(11) DEFAULT NULL,
  `VencVerificacion` date DEFAULT NULL,
  `personal_id_personal` int(11) DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `prox_servicio` date DEFAULT NULL,
  `cons` int(4) NOT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_autos`, `id_propietario`, `codigo`, `claveVehicular`, `vin`, `factura`, `marca`, `modelo`, `tipo`, `transmision`, `color`, `combustible`, `no_motor`, `placas`, `poliza_seguro`, `fin_poliza`, `tarjeta`, `fin_tarjeta`, `estado_placa`, `estatus`, `EstatusVerificacion`, `VencVerificacion`, `personal_id_personal`, `obs`, `prox_servicio`, `cons`, `activo`) VALUES
(1, 4, 'JAJ01TRA0001', '0144331', 'WDDWF4FB6GR142521', '81', 'MERCEDES BENZ', '2016', 'C250 CGI SPORT', 1, 'GRIS TENORITA', 'GASOLINA', '27492030529269', 'UME736F', '500752688', '2022-05-11', 'B 0661074', '9999-09-09', 'QUERETARO', 1, 1, '2022-08-31', 4, 'PLACA ANTERIOR: UPK106B TARJETA DE CIRCULACION ANTERIOR: A 1942243', NULL, 1, 1),
(2, 2, 'SOL01TRA0002', '0591109', 'JM3KFAEY5K0681083', '10722 MQVN', 'MAZDA', '2019', 'CX5 SIGNATURE 2.5L 228HP', 1, 'GRIS TITANIO', 'GASOLINA', 'PY 31037979', 'UKR908G', '424483543', '2022-11-20', 'B 0227243', '9999-09-09', 'QUERETARO', 1, 1, '2023-03-30', 5, 'PLACA ANTERIOR: UNY248B TARJETA DE CIRCULACION ANTERIOR: A 1927772', '2023-03-30', 2, 1),
(3, 2, 'SOL01TRA0003', '0148410', 'W1N0G8EB6MF908713', 'NS014213', 'MERCEDES BENZ', '2021', 'GLC 300 4MATIC COMFORT', 1, 'NEGRO OBSIDIANA', 'GASOLINA', '26492030357349', 'UNT018G', '510906019', '2023-07-02', '', '9999-09-09', 'QUERETARO', 1, 1, '2023-07-10', 2, 'FACTURA EXTRAVIADA (ACTA TESTIMONIAL) - PROXIMO SERVICIO EN FEBRERO (NO TIENE COSTO)', '2023-03-08', 3, 1),
(4, 4, 'JAJ01TRA0004', '0322101', 'VF3GJN6A38J031831', '8109', 'PEUGEOT', '2008', 'GRAND RAID 1.6 STD PARTNER', 2, 'VERDE ACAIDE', 'GASOLINA', '10FX7W3301225', 'UMX637F', '14022210620 0', '2023-04-12', 'B 0197165', '9999-09-09', 'QUERETARO', 1, 1, '2023-03-31', 4, 'PLACAS ANTERIORES: ULG9827 - TARJETA DE CIRCULACION ANTERIOR: A 649203', NULL, 4, 1),
(5, 2, 'SOL01TRA0005', '0751104', '3KPA35ACXNE447175', 'UK000009008', 'KIA', '2022', 'RIO 1.6L LX A/T', 1, 'FIERY RED', 'GASOLINA', 'G4FGME049833', 'UNB667F', '533630034', '2023-12-26', 'B 0211858', '9999-09-09', 'QUERETARO', 1, 1, '2023-12-23', 16, 'PLACA ANTERIOR: UKM837D - TARJETA DE CIRCULACION ANTERIOR: A 2234599', '2023-07-09', 5, 1),
(6, 2, 'SOL01TRA0006', '0751004', '3KPA34ACXNE441628', 'UK000009007', 'KIA', '2022', 'RIO 1.6L LX A/T', 1, 'SILKY SILVER', 'GASOLINA', 'G4FGME045417', 'UPS466F', '533501441', '2023-12-26', 'B 0647455', '9999-09-09', 'QUERETARO', 1, 1, '2024-02-15', 17, 'TARJETA DE CIRCULACION ANTERIOR: A 2234598 - PLACA ANTERIOR: UKM836D', '2023-06-28', 6, 1),
(7, 2, 'SOL01TRA0007', '0751104', '3KPA35AC4NE447253', 'UK000009009', 'KIA', '2022', 'RIO 1.6L LX A/T', 1, 'SNOW WHITE PEARL', 'GASOLINA', 'G4FGME049836', 'UPS465F', '533628178', '2023-12-26', 'B 0647456', '9999-09-09', 'QUERETARO', 1, 1, '2024-02-04', 1, 'TARJETA DE CIRCULACION ANTERIOR: A 2234597 - PLACAS ANTERIORES: UKM835D', '2023-06-28', 7, 1),
(8, 2, 'SOL0TRA0008', '0751001', '3KPA24BC3NE437597', 'UK000009027', 'KIA', '2022', 'RIO 1.6L L M/T', 2, 'AURORA BLACK PEARL', 'GASOLINA', 'G4FGME041630', 'UPH469E', '535197529', '2023-01-13', 'B0195420', '9999-09-09', 'QUERETARO', 1, 1, '2023-12-28', NULL, 'TARJETA DE CIRCULACION ANTERIOR: A 2234600  - PLACA ANTERIOR: UKM839D', '2023-04-27', 8, 1),
(9, 2, 'SOL03TRA009', '0751104', '3KPA35AC9NE447426', 'UK000009072', 'KIA', '2022', 'RIO 1.6L LX A/T', 1, 'FIERY RED', 'GASOLINA', 'G4FGME050112', 'UNW371E', '535200240', '2024-01-21', 'B 0155927', '9999-09-09', 'QUERETARO', 1, 1, '2024-02-08', 14, 'PLACA ANTERIOR: UKM971D TARJETA DE CIRCULACION ANTERIOR: A 2245667', '2023-01-14', 9, 1),
(10, 2, 'SOL02TRA0010', '0751103', '3KPA35AC9NE452254', 'UK000009028', 'KIA', '2022', 'RIO 1.6L L M/T', 2, 'SMOKE BLUE', 'GASOLINA', 'G4FGME047086', 'UNT660G', '535196620', '2024-01-04', 'B 0668461', '9999-09-09', 'QUERETARO', 1, 1, '2023-12-28', 15, 'PLACAS ANTERIORES: UKM970D - TARJETA DE CIRCULACION ANTERIOR: A 2245668', '2023-06-02', 10, 1),
(11, 2, 'SOL02TRA0011', '0751103', '3KPA35AC9NE452254', 'UK000009127', 'KIA', '2022', 'RIO 1.6L LX M/T', 2, 'SMOKE BLUE', 'GASOLINA', 'G4FGNE001377', 'J10BJU', '494658115', '2023-02-17', '40455540730', '2025-02-15', 'CDMX', 1, 1, '2024-06-30', 19, '', '2023-02-24', 11, 1),
(12, 6, 'APC02TRA0012', '0044723', '3N1CN8AE1LK858312', 'VTNZAR 4498', 'NISSAN', '2020', 'VERSA SENSE MT', 2, 'BLANCO', 'GASOLINA', 'HR16101087V', 'UMG766F', '57386271', '2023-12-11', 'B 0814768', '9999-09-09', 'QUERETARO', 1, 1, '2025-01-06', 20, 'PLACA ANTERIOR: ULZ186C TARJETA DE CIRCULACION ANTERIOR: A  2053792', '2022-10-20', 12, 1),
(13, 6, 'APC01TRA0013', '0044723', '3NICN8AE9LL913986', 'VTNZAR 4497', 'NISSAN', '2020', 'VERSA SENSE MT', 2, 'BLANCO', 'GASOLINA', 'HR16106490V', 'UKS728F', '573-8628-1', '2023-12-11', 'B 0814770', '9999-09-09', 'QUERETARO', 1, 1, '2025-01-16', 6, 'PLACA ANTERIOR: ULZ187C  TARJETA DE CIRCULACION ANTERIOR: A 2053793', '2023-06-15', 13, 1),
(14, 6, 'APC0TRA0014', '0044723', '3N1CN8AE5LK855008', 'VTNZAR 4494', 'NISSAN', '2020', 'VERSA SENSE MT', 2, 'NEGRO', 'GASOLINA', 'HR16052840V', 'UPC374G', '3475033', '2022-12-11', 'B 0814375', '9999-09-09', 'QUERETARO', 1, 1, '2024-12-24', NULL, 'PLACA ANTERIOR: ULZ184C TARJETA DE CIRCULACION ANTERIOR: A 2053790', NULL, 14, 1),
(15, 6, 'APC01TRA0015', '0044610', '3N1CK3CD0LL254647', 'VTNZAR 4495', 'NISSAN', '2020', 'MARCH SENSE MT', 2, 'PLATA', 'GASOLINA', 'HR16171153V', 'UMG765F', '3474984', '2022-12-11', 'B0814769', '9999-09-09', 'QUERETARO', 1, 1, '2024-11-30', 11, 'PLACA ANTERIOR: ULZ185C TARJETA DE CIRCULACION ANTERIOR: A 2053791', NULL, 15, 1),
(16, 6, 'APC01TRA0016', '0044610', '3N1CK3CD2LL248333', 'VTNZAR 4496', 'NISSAN', '2020', 'MARCH SENSE MT', 2, 'PLATA', 'GASOLINA', 'HR16136240V', 'UMA989G', '3475000', '2022-12-11', 'A 2053794', '9999-09-09', 'QUERETARO', 1, 1, '1999-11-11', 9, 'PLACA ANTERIOR -ULZ189C', NULL, 16, 1),
(17, 1, 'INV01TRA0017', '0044617', '3N1CK3CD7JL286170', 'FL 53188', 'NISSAN', '2018', 'MARCH ACTIVE T/M AC', 2, 'BLANCO', 'GASOLINA', 'HR16872124P', 'UMG347H', '524567120', '2023-10-17', 'B 0603792', '9999-09-09', 'QUERETARO', 1, 1, '2023-02-26', 12, '', NULL, 17, 1),
(18, 1, 'INV01TRA0018', '0044617', '3N1CK3CDXJL287085', 'FAUIAP15423', 'NISSAN', '2018', 'MARCH ACTIVE T/M AC', 2, 'BLANCO', 'GASOLINA', 'HR16872114P', 'ULE450J', '524567658', '2023-10-17', 'B 0603791', '9999-09-09', 'QUERETARO', 1, 1, '2023-03-30', 10, 'PLACA ANTERIOR: NFX2778 - TARJETA DE CIRCULACIÓN ANTERIOR: AU C 6974323', NULL, 18, 1),
(19, 8, 'VWL0TRA0019', '0052704', 'MEX6G260XKT012691', 'AI 16956', 'VOLKSWAGEN', '2019', 'POLO STD 1.6', 2, 'PLATA REFLEX', 'GASOLINA', 'CLS652919', 'T14BDB', '239479', '2022-09-15', '5536722904', '2022-07-18', 'CDMX', 2, 1, '2022-10-31', NULL, '', NULL, 19, 1),
(20, 5, 'BHR0TRA0020', '1012301', 'PL83MS1B751001916', '149914', 'CHRYSLER', '2005', 'H100 BY DODGE CHASIS CABINA', 2, 'BLANCO', 'GASOLINA', 'HECHO EN MALASI', '1278CL', 'N/A', '1999-01-01', '5141175917', '9999-09-09', 'CDMX', 2, 2, '2022-04-25', NULL, 'VEHICULO DONADO A GABRIEL CHAVEZ COBARRUVIAS', NULL, 20, 1),
(22, 1, 'INV0TRA0021', '0590306', 'JM1CW2BL9C0116168', 'PMOAUF1187', 'MAZDA', '2012', '5 SPORT TA', 1, 'GRIS METROPOLITANO MICA', 'GASOLINA', 'L5 10593601', 'ULX3016', '493528996', '2023-02-09', 'A 00562030', '2014-03-31', 'QUERETARO', 2, 1, '2022-09-30', NULL, 'VENDIDA A VICTOR MANUEL CEBALLOS PEREZ', NULL, 21, 1),
(23, 1, 'INV01TRA0022', '1070307', '8A1FC1J51BL065487', 'QA169', 'RENAULT', '2011', 'KANGOO EXPRESS AC 1.6', 2, 'BLANCO', 'GASOLINA', 'Q056983', '402YCC', '493529671', '2023-02-09', '02199203', '2015-01-26', 'CDMX', 1, 1, '2022-05-31', 7, 'Alta de vehículo en Queretaro?', NULL, 22, 1),
(24, 4, 'JAJ01TRA0023', '2280112', '3HAJFAVK16L339053', 'A30U 1553', 'INTERNATIONAL', '2006', 'CF 600 ', 1, 'BLANCO', 'DIESEL', '4 5HU2Y0286295', 'KZ48806', '493529176', '2023-02-09', 'CA C 1242256', '9999-09-09', 'EDOMEX', 1, 2, '1999-01-01', 7, 'Falta alta vehicular en Queretaro (cambio de propietario).\r\nFalta verificación\r\nFalta permiso SCT\r\n', NULL, 23, 1),
(26, 9, 'EVJ01TRA0024', '00564053', '9BWAB05U4GP053768', '30515698', 'VOLKSWAGEN', '2016', 'GOL CL L4 1.6', 2, 'BLANCO', 'GASOLINA', 'CFZP47075', 'PCC2273', '440119758', '2023-02-09', 'AU C 11811958', '2026-10-28', 'EDOMEX', 1, 1, '2023-04-30', 16, 'Kilometraje: 107,467 km\r\n', NULL, 24, 1),
(27, 1, 'INV0TRA0025', '0039102', 'KL1MJ6A00DC004870', 'UMC6057', 'CHEVROLET', '2013', 'MATIZ PAQ B', 2, 'TURQUESA', 'GASOLINA', 'HECHO EN KOREA', 'UMX647F', '440119725', '2023-02-09', 'B 0197166', '9999-09-09', 'QUERETARO', 2, 1, '2022-09-30', NULL, 'VENDIDO A JIMENA ALLER Placa anterior: UMC6057 - Tarjeta de circulación anterior: A 00990206\r\nKilome', NULL, 25, 1),
(28, 9, 'EVJ02TRA0026', '0056303', '9BWDB05U4FT108013', 'ANVW00005981', 'VOLKSWAGEN', '2015', 'GOL CLPM', 2, 'GRIS CUARZO METALICO', 'GASOLINA', 'CFZN96897', 'S46AGY', '450496435', '2023-05-11', '19257023272', '2025-08-25', 'CDMX', 1, 1, '2023-02-28', 18, 'Auto a nombre de CARLOS ADRIÁN RUIZ SUAREZ, endosado para JOSE JIMENEZ', NULL, 26, 1),
(29, 1, 'INV0TRA0027', '0052056', 'VSSMK46J4CR038817', 'S/F', 'VOLKSWAGEN', '2012', 'SEAT IBIZA REFERENCE', 2, 'ROJO EMOCION', 'GASOLINA', 'CEK030452', 'UMB185A', '4401119717', '9999-09-09', 'A 1603271', '9999-09-09', 'QUERETARO', 2, 2, '9999-09-09', NULL, 'Perdida total de vehículo. (Póliza de seguro cobrada)', NULL, 27, 1),
(30, 2, 'SOL01TRA0028', '1', 'VF37S9HE9HJ502143', 'A 21082', 'PEUGEOT', '2017', 'PARTNER TEPEE OUTDOOR 1.6', 2, 'BLANCO', 'DIESEL', '10JBEB0108281', 'ULV815H', '523555035', '2023-10-07', 'B 0601111', '9999-09-09', 'QUERETARO', 1, 1, '2023-02-28', 4, '', NULL, 28, 1),
(31, 2, 'SOL01TRA0029', '001AL02', 'VF3MJAHX7PS008008', 'AESF32', 'PEUGEOT', '2023', '3008', 1, 'GRIS PLATINUM', 'DIESEL', '10DY3K4011960', 'UMF856H', 'HL 42002374', '2023-12-16', 'B 0596920', '9999-09-09', 'QUERETARO', 1, 1, '2023-08-30', 3, 'CAMBIAR POLIZA DE SEGURO A GNP', NULL, 29, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celular`
--

CREATE TABLE `celular` (
  `id_celular` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `id_propietario` int(11) DEFAULT NULL,
  `numero_tel` bigint(20) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(45) NOT NULL,
  `imei` varchar(45) NOT NULL,
  `no_serie` varchar(20) NOT NULL,
  `color` varchar(25) DEFAULT NULL,
  `no_cargador` varchar(50) DEFAULT NULL,
  `disponible` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `cons` int(11) NOT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `celular`
--

INSERT INTO `celular` (`id_celular`, `codigo`, `id_propietario`, `numero_tel`, `region`, `marca`, `modelo`, `imei`, `no_serie`, `color`, `no_cargador`, `disponible`, `observaciones`, `personal_id`, `cons`, `activo`) VALUES
(1, 'BEX03CEL0001', 3, 4423170589, '-', 'HUAWEI', 'Y9 2019', '865365048644976', '7MLNW19B08003992', 'NEGRO', '', 2, 'USUARIO ANTERIOR: MARIA DE  LOURDES  -  PANTALLA DAÑADA', 84, 1, 1),
(2, 'BEX03CEL0002', 3, 4421040693, '-', 'HUAWEI', 'G ELITE PLUS SLA', '865548032118442', 'SLA-L03C212B045', 'NEGRO', '-', 2, 'CAMBIAR RESPONSIVA\r\nEL EQUIPO LE PERTENECIA ANTERIOMENTE A HANNIA', 39, 2, 1),
(3, 'INV03CEL0003', 1, 4423863552, '-', 'HUAWEI', 'Y9 2019', '865365047823944', '7ML4C19A11001997', 'AZUL', 'HW060200UC2', 2, 'USUARIO ANTERIOR: JIMENA ALLER - VICTOR HERRERA\r\n', 37, 3, 1),
(4, 'INV01CEL0004', 1, 4423594845, '-', 'HUAWEI', 'Y9 2019', '865365042936030', '7MLNW19517001375', 'NEGRO', '-', 2, 'USUARIO ANTERIOR: MIZIEL GARCIA\r\nEQUIPO ASIGNADO POR REPOSICIÓN DE EQUIPO NUEVO EXTRAVIADO', 25, 4, 1),
(5, 'INV01CEL0005', 1, 4461390437, '-', 'NEGRO', 'Y9 2019', '865365042935305', '7MLNW19517001302', 'NEGRO', '-', 2, '\r\n', 80, 5, 1),
(6, 'INV01CEL0006', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365042928961', '7MLNW19517000668', 'NEGRO', '-', 2, 'EQUIPO VENDIDO A SILVIA BAUTISTA', 10, 6, 1),
(7, 'INV01CEL0007', 1, 5510411042, '-', 'HUAWEI', 'Y9 2019', '865365048623399', '7MLNW19B06004834', 'AZUL', '-', 2, 'EQUIPO NO ENTREGADO\r\nUSUARIO ANTERIOR : ARACELI JIMENEZ', 4, 7, 1),
(8, 'INV01CEL0008', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365042932195', '7MLNW19517000991', 'NEGRO', '-', 2, 'EQUIPO VENDIDO A ARACELI JIMENEZ', 3, 8, 1),
(9, 'INV01CEL0009', 1, 0, '-', 'HUAWEI', 'P30 LITE', '861399044774507', 'A4N4C19A09005131', 'NEGRO', '-', 2, 'EQUIPO NO ENTREGADO', 2, 9, 1),
(10, 'INV01CEL0010', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365042935206', '7MLNW19517001292', 'NEGRO', '-', 2, 'EQUIPO NO ENTREGADO', 16, 10, 1),
(11, 'INV01CEL0011', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365044930520', '7MLNW19517000824', 'NEGRO', '-', 2, 'EQUIPO VENDIDO A JENNIFER PARADA', 29, 11, 1),
(12, 'INV0CEL0012', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365047820304', '-', 'NEGRO', '-', 2, 'ASIGNADO A TICS\r\nEQUIPO EXTRAVIADO ', NULL, 12, 1),
(13, 'INV01CEL0013', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365042932013', '7MLNW19517000973', 'NEGRO', '-', 2, 'EQUIPO NO ENTREGADO', 1, 13, 1),
(14, 'INV01CEL0014', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365047820866', '7ML4C19A11001689', 'AZUL', '-', 2, 'EQUIPO VENDIDO A OSCAR ESPINOSA', 12, 14, 1),
(15, 'INV01CEL0015', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365048645379', '-', 'NEGRO', '-', 2, 'EQUIPO VENDIDO A ELOISA VILLAFUERTE', 6, 15, 1),
(16, 'INV01CEL0016', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365042928946', '-', 'NEGRO', '-', 2, 'EQUIPO VENDIDO A MIGUEL MARTINEZ', 7, 16, 1),
(17, 'INV0CEL0017', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365048653860', '7ML4C19B08004881', 'NEGRO', '-', 2, 'EQUIPO VENDIDO A PEDRO AGUILAR', NULL, 17, 1),
(18, 'BEX03CEL0018', 3, 4426096722, '-', 'HUAWEI', 'Y9 2019', '866368045403296', '7MLNW19213003976', 'NEGRO', '-', 2, 'NINGUNA', 85, 18, 1),
(19, 'INV0CEL0019', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365048653399', '', 'NEGRO', '', 2, 'USUARIO ANTERIOR: KAREN GISSEL CRUZ - LO UTILIZA GCH SOLGISTIKA\r\nNO TIENE RESPONSIVA', NULL, 19, 1),
(20, 'INV0CEL0020', 1, 0, '-', 'HUAWEI', 'Y9 2019', '-', '', 'NEGRO', '', 1, 'USUARIO ANTERIOR: CARLOS HUERTA (SOLGISTIKA) DEBERIA ESTAR EN INVENTARIO\r\nFALTA RESPONSIVA', NULL, 20, 0),
(21, 'INV0CEL0021', 1, 0, '-', 'HUAWEI', 'Y9 2019', '-', '-', '-', '-', 2, 'USUARIO ANTERIOR: MAMÁ DE SRA BETY - EQUIPO NO DEVUELTO', NULL, 21, 1),
(22, 'INV0CEL0022', 1, 0, '-', 'HUAWEI', 'Y9 2019', '866368045402777', '7MLNW19213003924', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: FERNANDO JUAREZ\r\nFALTA RESPONSIVA', NULL, 22, 1),
(23, 'INV0CEL0023', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365047820809', '-', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: JESSICA LISBETH - MERARI  CERDAN\r\nFALTA RESPONSIVA - EQUIPO CON PANTALLA ESTRELLADA', NULL, 23, 1),
(24, 'INV0CEL0024', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365042927674', '-', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: MIZIEL GARCIA - FALTA RESPONSIVA\r\nEQUIPO ESTRELLADO - DEBE ESTAR EN INVENTARIO', NULL, 24, 1),
(25, 'INV01CEL0025', 1, 0, '-', 'HUAWEI', 'Y9 2019', '-', '-', '-', '-', 1, 'EQUIPO ASIGNADO A JOSE JIMENEZ\r\n¿NO DEVUELTO O EN INVENTARIO? - FALTA RESPONSIVA', 4, 25, 1),
(26, 'INV0CEL0026', 1, 0, '-', 'ZTE', 'BLADE L8', '869243043969316', '-', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: FERNANDA ROLDAN - FALTA RESPONSIVA\r\nEQUIPO DE BAJAS CARACTERISTICAS TECNICAS - EN INVENTARIO', NULL, 26, 1),
(27, 'INV0CEL0027', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365042930231', '7MLNW19517000795', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: FRANCISCO FLORES (SOLGISTIKA) - EN INVENTARIO\r\nFALTA RESPONSIVA ', NULL, 27, 1),
(28, 'INV0CEL0028', 1, 0, '-', 'HUAWEI', 'Y9 2019', '865365048678399', '-', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: MAURICIO JIMENEZ - EQUIPO EN INVENTARIO\r\nFALTA RESPONSIVA', NULL, 28, 1),
(29, 'INV0CEL0029', 1, 0, '-', 'ZTE', 'BLADE L8', '869243043761069', '-', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: ISRAEL AVILA - DIANA MORELOS (SOLGISTIKA) - EN INVENTARIO\r\nEQUIPO DE BAJAS CARACTERISTICAS TECNICAS - FALTA RESPONSIVA', NULL, 29, 1),
(30, 'INV0CEL0030', 1, 0, '-', 'ZTE', 'BLADE L8', '869243043078944', '-', 'NEGRO', '-', 1, 'USUARIO ANTERIOR: ADRIANA GOMEZ (GCH SOLGISTIKA) - FALTA RESPONSIVA\r\nEN INVENTARIO - EQUIPO DE BAJAS CARACTERISTICAS TECNICAS', NULL, 30, 1),
(31, 'INV0CEL0031', 1, 0, '-', 'MOTOROLA', '-', '35408796258410710', 'ZE222JFMHF', 'AZUL', '-', 1, 'USUARIO ANTERIOR: ADRIAN RUIZ (CHOFER DE EVA) - FALTA RESPONSIVA\r\nEN INVENTARIO - ', NULL, 31, 1),
(32, 'SOL02CEL0032', 2, 4421903008, '-', 'REDMI', '9C', '861090057058397', '29301/61W573706', 'GRIS', '2B62106N207014C', 2, 'USUARIO ANTERIOR: ADRIANA GOMEZ - FALTA CAMBIO DE RESPONSIVA - ', 83, 32, 1),
(33, 'INV01CEL0033', 1, 4423959155, '-', 'REDMI', '9C', '861090057072398', '29301/61WS73314', 'GRIS', '2B62106P314951C', 2, '', 10, 33, 1),
(34, 'INV01CEL0034', 1, 4424074602, '-', 'REDMI', '9C', '861090057043357', '29301/61WS73530', 'GRIS', '2B62106N230122C', 2, '', 11, 34, 1),
(35, 'INV0CEL0035', 1, 4422192997, '-', 'REDMI', '9C', '861090057226655', '29301/61WT74335', 'GRIS', '2B62106L173969C', 2, 'USUARIO ANTERIOR: ALEJANDRO NIETO', NULL, 35, 1),
(36, 'INV01CEL0036', 1, 4422701036, '-', 'REDMI', '9C', '861090057052358', '29301/61WS73716', 'GRIS', '2B6206N601303C', 2, '', 3, 36, 1),
(37, 'INV01CEL0037', 1, 4423781692, '-', 'REDMI', '9C', '862652050624902', '28384/S1TU04221', 'MORADO', '2B621068443409C', 2, '', 2, 37, 1),
(38, 'INV01CEL0038', 1, 4423377127, '-', 'REDMI', '9C', '861090057241753', '29301/61WT73488', 'GRIS', '2B62106L174156C', 2, '', 1, 38, 1),
(39, 'INV01CEL0039', 1, 4422260124, '-', 'REDMI', '9C', '861090057060674', '29301/61WS73464', 'GRIS', '2B62106M339639C', 2, '', 31, 39, 1),
(40, 'INV01CEL0040', 1, 4422734709, '-', 'REDMI', '9C', '8610900570292730', '29301/61WS73727', 'GRIS', '2B62106N601241C', 2, '', 16, 40, 1),
(41, 'INV01CEL0041', 1, 4423463713, '-', 'ZTE', 'BLADE A5 2020', '863990053091441', '320314998849', 'GRIS', '-', 2, '', 26, 41, 1),
(42, 'INV01CEL0042', 1, 4425956550, '-', 'REDMI', '9C', '861090056965311', '29301/61WS73985', 'GRIS', '2B62106N601506C', 2, '', 6, 42, 1),
(43, 'INV01CEL0043', 1, 4425956551, '-', 'REDMI', '9C', '861090057057910', '29301/61WS73696', 'GRIS', '2B62106NZ07037C', 2, '', 9, 43, 1),
(44, 'INV01CEL0044', 1, 4425956549, '-', 'REDMI', '9C', '861090057050477', '29301/61WS73769', 'GRIS', '2B62106N601315C', 2, '', 12, 44, 1),
(45, 'INV01CEL0045', 1, 4421777533, '-', 'REDMI', '9C', '861090057037938', '29301/61WS73469', 'GRIS', '2B62106N230070C', 2, '', 29, 45, 1),
(46, 'INV01CEL0046', 1, 4423959156, '-', 'REDMI', '9C', '861090057018672', '29301/61WS73681', 'GRIS', '2B62106N207027C', 2, '', 7, 46, 1),
(47, 'INV01CEL0047', 1, 4423593265, '06', 'REDMI', '9C', '861090056956930', '29301/61WS73561', 'GRIS', '', 2, 'Detalles de uso visibles que no afectan su funcionamiento. ', 78, 47, 1),
(48, 'INV01CEL0048', 1, 4422192997, '-', 'REDMI', '9C', '861090057068917', '29301/61WS73041', 'GRIS', '2B62106N286145C', 2, 'Tiene daños en la pantalla causados por el usuario anterior ', 51, 48, 1),
(49, 'INV01CEL0049', 1, 4424753938, '06', 'REDMI', '9C', '861090057034653', '29301/61WS73204', 'GRIS', '2B62106N207066C', 2, '', 30, 49, 1),
(50, 'INV02CEL0050', 1, 4422813655, '-', 'REDMI', '9C', '865059053708020', '29303/617Q09811', 'AZUL', '2B62112C297585C', 2, '', 35, 50, 1),
(51, 'INV01CEL0051', 1, 5510411042, '-', 'REDMI', '9', '863927052896461', '28385/S1SA02655', 'VERDE', '2B62104J207096C', 2, '', 4, 51, 1),
(52, 'INV02CEL0052', 1, 5541925311, '-', 'REDMI', '9C', '861090057100173', '29301/61WS73090', 'GRIS', '2B62106K171617C', 2, '', 20, 52, 1),
(53, 'INV02CEL0053', 1, 5544040219, '-', 'REDMI', '9C', '861090057071879', '29301/61WS73320', 'GRIS', '2B62106P314960C', 2, '', 33, 53, 1),
(54, 'INV02CEL0054', 1, 5541925325, '-', 'ZTE', 'BLADE A5 2020', '863990053091540', '320314998859', 'VERDE', 'E501852', 2, '', 15, 54, 1),
(55, 'SOL02CEL0055', 2, 4461395748, '-', 'ZTE', 'BLADE A5 2020', '863990053084040', '320314998109', 'VERDE', 'E501852', 2, '', 74, 55, 1),
(56, 'INV0CEL0056', 1, 0, '-', 'ZTE', 'BLADE A5 2020', '863990053082754', '320314997980', 'VERDE', 'E501852', 2, 'USUARIO ANTERIOR: KAREN GISSEL CRUZ - EQUIPO EXTRAVIADO - FALTA DAR DE BAJA LA RESPONSIVA', NULL, 56, 1),
(57, 'INV01CEL0057', 1, 4422076243, '-', 'ZTE', 'BLADE A5 2020', '863990053091599', '320314998864', 'VERDE', 'STC-A51D-Z', 2, '', 79, 57, 1),
(58, 'INV02CEL0058', 1, 4424792354, '-', 'ZTE', 'BLADE A5 2020', '863990053091425', '320314998847', 'VERDE', '-', 2, '', 28, 58, 1),
(59, 'BEX01CEL0059', 3, 4421040693, '-', 'REDMI', '9C', '861090057032319', '29301/61WS73473', 'GRIS', '2B62106K329239C', 2, 'EQUIPO NUEVO ', 50, 59, 1),
(60, 'INV0CEL0060', 1, 0, '-', 'REDMI', '9C', '861090057061615', '29301/61WS73495', 'GRIS', '2B62106K170689C', 1, 'EN INVENTARIO - EQUIPO NUEVO - FALTA RESPONSIVA', NULL, 60, 1),
(61, 'INV02CEL0061', 1, 0, '-', 'ZTE', 'BLADE A5 2020', '-', '-', '-', '-', 2, 'FALTA RESPONSIVA E INFORMACIÓN - EQUIPO NUEVO', 18, 61, 1),
(62, 'BEX03CEL0062', 3, 4421712055, '', 'ZTE', 'BLADE A5', '863990053091441', '', 'AZUL', '', 2, 'REVISAR REGISTRO, BATERIA', 86, 62, 1),
(63, 'BEX03CEL0063', 3, 4423863552, '', 'HUAWEI', 'Y9 2019', '866368045391905', '7MLNW19213002837', 'NEGRO', '', 2, 'NINGUNA', 87, 63, 1),
(64, 'SOL02CEL0064', 2, 4423830469, '06', 'ZTE', 'ZTE BLADE L210', '869262051133607', '320625458540', 'NEGRO', 'SCT-A51D-Z', 2, '', 73, 64, 1),
(65, 'SOL02CEL0065', 2, 4424716962, '06', 'ZTE', 'ZTE BLADE L210', '869262051131882', '320625458368', 'NEGRO', 'SCT-A51D-Z', 1, '', 15, 65, 1),
(66, 'SOL02CEL0066', 2, 4424716577, '06', 'ZTE', 'ZTE BLADE L210', '869262051131445', '320625458324', 'NEGRO', 'SCT-A51D-Z', 2, '', 71, 66, 1),
(67, 'SOL02CEL0067', 2, 4424716961, '06', 'ZTE', 'ZTE BLADE L210', '869262051133383', '320625458518', 'NEGRO', 'SCT-A51D-Z', 1, '', 72, 67, 1),
(68, 'SOL02CEL0068', 2, 5541925701, '-', '-', '-', '-', '-', '-', '-', 2, 'No se tiene registro, Actualizar el departamento', 18, 68, 1),
(69, 'BEX03CEL0069', 3, 4423170589, '', 'HUAWEI', 'Y9 2019', '865365048644976', '', 'NEGRO', '-', 2, 'PANTALLA ESTRELLADA ESQUINA INFERIOR DERECHA, SIN CARGADOR', 84, 69, 0),
(70, 'BEX03CEL0070', 3, 4461025333, '-', 'ZTE', 'BLADE L210', '864454056162096', '', 'NEGRO', '-', 2, 'NINGUNA', 37, 70, 1),
(71, 'JAJ03CEL0071', 4, 4461026630, '', 'HUAWEI', 'FRL L123', '869062052081007', 'MRPNW20B04000133', 'MORADO', '', 2, 'SIN CARGADOR', 89, 71, 1),
(72, 'JAJ03CEL0072', 4, 4425487638, '', 'HUAWEI', 'POT-LX3', '861677045517987', 'VMM7N19508002312', 'AZUL', '', 2, 'SIN CARGADOR', 90, 72, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadora`
--

CREATE TABLE `computadora` (
  `id_compu` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `id_propietario` int(11) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `cpu` varchar(30) DEFAULT NULL,
  `ram` varchar(30) DEFAULT NULL,
  `almacenamiento` varchar(30) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `no_serie` varchar(30) DEFAULT NULL,
  `cargador` varchar(255) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `accesorios` varchar(100) DEFAULT NULL,
  `adicional` varchar(30) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `cons` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `computadora`
--

INSERT INTO `computadora` (`id_compu`, `codigo`, `id_propietario`, `tipo`, `cpu`, `ram`, `almacenamiento`, `marca`, `modelo`, `color`, `no_serie`, `cargador`, `costo`, `fecha_compra`, `estado`, `accesorios`, `adicional`, `observaciones`, `personal_id`, `cons`, `activo`) VALUES
(1, 'INV01COM0049', 1, 2, 'Intel N4000 1.1 GHz', '4 GB', '64 GB', 'Lenovo ', 'Lenovo Ideapad D330', 'Gris', 'YX01HLLZ', '8SSA10E75843', 0, '2021-10-12', 2, '', '', 'Laptop dos en uno con defectos visible que no afectan su rendimiento.', 55, 1, 1),
(2, 'SOL02COM0033', 2, 1, 'Intel I3 10-100 3.60 GHz', '8 GB', '240 GB SDD', 'DELL', 'Vostro 3681 D155', 'Negra', 'D155002', NULL, 0, '2021-11-04', 2, 'Monitor, Teclado, Mouse.', 'ASPEL', 'Se estrega en buen estado. ', 52, 2, 1),
(3, 'INV02COM0049', 1, 2, '', '4 GB', '447 GB', 'Lenovo ', 'V15 IGL 82C3', 'Gris', 'PF2J2VRE', '', 0, '2021-11-04', 1, '', 'ASPEL', 'Se entrega en buen estado.', 92, 3, 1),
(4, 'INV01COM0004', 1, 2, '', '8 GB', '124 GB + 1TB', 'Lenovo ', 'ThinkPad L15 GEN1', 'Negra', 'PF-35JQQ8', NULL, 0, '2022-01-03', 1, '', '', 'Se entrega en buen estado.', 12, 4, 1),
(5, 'INV01COM0043', 1, 2, 'Intel I5 10210U ', '8 GB', '1 TB', 'DELL', 'VOSTRO 3490', 'Negra', 'J36R173', NULL, 0, '2020-11-03', 1, 'CARGADOR:MONITOR Ben Q', '', '', 43, 5, 1),
(6, 'INV01COM0047', 1, 2, 'AMD-A9-9425', '8 GB', '256 gb', 'HP', '15DB0004LA', 'DORADA', 'CND9023L68', 'HPHSTNN-CA40', 0, '2020-03-19', 2, '\r\n', '', 'Equipo anteriormente de gerencia de calidad', 5, 6, 1),
(7, 'INV01COM0028', 1, 2, 'Intel I5-6200U', '8 GB', '1 TB', 'Acer', 'Aspire E14', 'NEGRO', 'N16Q1', NULL, 0, '2019-11-27', 2, 'CARGADOR: F2611616350204\r\nMOUSE', '', '', 41, 7, 1),
(8, 'INV01COM0048', 1, 2, 'Intel I5 10-10210U', '8 GB', '446 GB', 'DELL', 'VOSTRO', 'Negra', 'CPLTP03', '', 0, '2020-04-01', 1, 'CARGADOR, MONITOR', '', '', 80, 8, 1),
(9, 'INV01COM0049', 1, 2, 'Intel Celeron N3350', '4 GB', '111 GB', 'Acer', '', 'Rojo y Negro', 'NXGJ4AL0016420B58476000', '', 0, '2022-04-17', 2, 'LAPTOP Y CARGADOR', '', 'Desensamblada ya que sufrió un corto y se reutilizaron las piezas ', 55, 9, 1),
(10, 'INV01COM0031', 1, 1, 'Intel I5 7400 ', '16 GB', '250 GB HDD', 'EVOTEC', 'Armada', 'Rojo con negro', 'S/N', NULL, 0, '0000-00-00', 2, 'Teclado, mouse, monitor BenQ', '', '', 46, 10, 1),
(11, 'INV01COM0030', 1, 1, 'Intel I7 7700 ', '16 GB', '240 GB SDD', 'Armada', 'BenQ', 'Negra', 'ET52H033456019', NULL, 0, '0000-00-00', 2, 'TECLADO, MOUSE, MONITOR LG,REGULADOR, TARJETA GRAFICA DEDICADA\r\n', 'Solidworks', 'Cuenta con 2 TB HDD extra, daño en los puertos USB', 44, 11, 1),
(12, 'INV01COM0038', 1, 1, 'Intel I3-60100', '4 GB', '918 GB', 'DELL', 'VOSTRO 3267', 'Negra', 'GCY0WP2', NULL, 0, '0000-00-00', 2, 'TECLADO, MOUSE, MONITOR, GABINETE, REGULADOR', 'ASPEL', '', 7, 12, 1),
(13, 'INV01COM0043', 1, 2, 'AMD Ryzen 5 5500U', '16 GB', '239 GB', 'ASUS', 'M515U', 'Gris', 'M5N0CV075868196', NULL, 0, '2021-11-01', 1, '', '', '', 48, 13, 1),
(14, 'INV01COM0046', 1, 1, 'Intel I3-60100', '8 GB', '240 GB SDD', 'DELL', 'VOSTRO 3267', 'Negra', 'CTW08N2', '', 0, '0000-00-00', 2, 'TECLADO, MOUSE, MONITOR, CPU, REGULADOR', '', '', 51, 14, 1),
(15, 'INV01COM0031', 1, 2, 'Intel I3 8145U 2.10 GHz', '4 GB', '500 GB HDD', 'Lenovo ', 'IdeaPad S145', 'Gris', 'PF1PQ2R6', NULL, 0, '0000-00-00', 1, 'CARGADOR: 8SSA10M42697C1SG88114X6', 'Altair', '', 11, 15, 1),
(16, 'INV01COM0031', 1, 1, 'i7-8700 3.60GHz', '16 GB', '240 SSD GB', 'ARMADA', 'ARMADA', 'NEGRO', 'S/N', NULL, 0, '0000-00-00', 1, '1 MONITOR BENQ, 1 MONITOR LG. MOUSE Y TECLADO', 'Solidworks, mastercam', 'Cuenta con una tarjeta grafica dedicada Nvidia 1080', 45, 16, 1),
(17, 'INV01COM0047', 1, 1, 'AMD-A4-7300', '8 GB', '750 GB HDD ', 'ARMADA', 'Armada', 'Negra', 'S/N', '', 0, '0000-00-00', 2, 'Teclado. Mouse, Regulador Y MONITOR LG', '', '', 5, 17, 1),
(18, 'SOL02COM0018', 2, 2, 'Intel Celeron N3060 1 ', '4 GB', '448 GB', 'HP', '1bsS0041a', 'Gris', '5CD7462X45', NULL, 0, '0000-00-00', 1, '', '', 'sin cargador', 15, 18, 1),
(19, 'SOL02COM0019', 2, 2, 'Intel Celeron N4000 ', '4 GB', '950 GB', 'HP', 'RTL8723DE', 'Gris', '5CG8192YYC', NULL, 0, '0000-00-00', 1, 'cargador', '', '', 15, 19, 1),
(20, 'SOL0COM0039', 2, 2, 'Intel Celeron N3060 ', '4 GB', '500GB', 'HP', 'RRTL8723DE', 'Blanca', '5CD7335P23', NULL, 0, '0000-00-00', 1, 'cargador', '', '', NULL, 20, 1),
(21, 'INV01COM0025', 1, 2, 'AMD-A44-9125', '4 GB', '464 GB', 'Lenovo ', '', '', 'PF15RXPJ', NULL, 0, '0000-00-00', 1, 'cargador', '', '', 9, 21, 1),
(22, 'SOL02COM0043', 2, 0, 'intel I3-7020', '8 GB', '1 TB', 'Lenovo ', '', 'Gris', '5CG632WVM', NULL, 0, '0000-00-00', 1, 'Cargador', '', '', 20, 22, 1),
(23, 'SOL03COM0023', 2, 2, '', '4 GB', '500 GB SSD', 'DELL', 'INSPIRION 3501 P90F', '', '', NULL, 0, '0000-00-00', 1, 'Cargador', '', '', 38, 23, 1),
(24, 'SOL02COM0024', 2, 2, '', '8 GB', '256 GB', 'DELL', 'Vostro 3515', '', 'CN-0H2TG4-CMC00-22R-003E', NULL, 0, '0000-00-00', 1, 'CARGADOR', '', '', 54, 24, 1),
(25, 'INV01COM0025', 1, 2, 'AMD Ryzen 5 5500U', '16 GB', '240 GB', 'ASUS', 'QCNFA435', 'Gris', 'MSN0CV075727192', NULL, 0, '0000-00-00', 2, 'Cargador', '', '', 56, 25, 1),
(26, 'INV01COM0026', 1, 2, 'AMD Ryzen 3 5300U', '8 GB', '256 GB', 'Lenovo ', 'ThinkPad  E14 Gen3', 'Negra', 'PF-33GPYZ', NULL, 0, '0000-00-00', 1, 'Cargador tipo C', '', 'Se entrega equipo nuevo.', 13, 26, 1),
(27, 'SOL02COM0027', 2, 2, 'I3-1005G1', '8 GB', '240 GB', 'DELL', 'VOSTRO 3401', 'GRIS', 'RJ0VX A00', NULL, 0, '2022-07-05', 2, 'Cargador: LA45NM140', '', 'Conexión con el reloj checador ', 57, 27, 1),
(28, 'SOL0COM0049', 2, 2, 'AMD Ryzen 3 5300U', '8 GB', '240 GB', 'Lenovo', 'ThinkPad E14 Gen 3', 'NEGRO', 'PF33G9ZR', '8SSA10R16920L1CZ', 10, '2022-07-18', 1, '', '', '', NULL, 28, 1),
(29, 'INV01COM0029', 1, 1, 'AMD A4-400', '4 GB', '500 GB HDD', 'EVOTEC', 'Armada', 'ROJA', 'S/N', NULL, 0, '0000-00-00', 2, 'MONITOR ACER, MOUSE Y TECLADO', '', '', 41, 29, 1),
(30, 'INV01COM0049', 1, 1, 'I3-6100', '8 GB', '240 GB SDD', 'DELL', 'VOSTRO 3267', 'NEGRO', 'GJGYVP2', '', 0, '0000-00-00', 2, 'MONITOR: 6CM2121D8R\r\nMouse:CN-ODVORH-L0300-884-0UU7\r\nTeclado:0f2jv2l0300\r\n', 'ASPEL', '', 93, 30, 1),
(31, 'INV01COM0031', 1, 2, 'I3-10-110Q', '8 GB', '240 GB SDD', 'ASUS', 'ExpertBook P2451F', 'AZUL OSCURO', 'P2451FA-I38G256GWP-01', NULL, 0, '2021-08-10', 2, 'CARGADOR: ADP-65GD D', '', '', 24, 31, 1),
(32, 'INV01COM0046', 1, 1, 'Pentium G2010', '8 GB', '240 GB SDD', 'ARMADA', 'ARMADA', 'NEGRO', '2100538014321', '', 0, '0000-00-00', 2, 'Mouse, teclado y monitor acer', 'ASPEL', '', 80, 32, 1),
(33, 'INV01COM0033', 1, 2, 'I3-1005G1', '8 GB', '500 GB HDD', 'Lenovo', 'IdeaPad S145', 'PLATEADA', '29301/61WS73314', NULL, 0, '0000-00-00', 1, '', 'ASPEL', '', 10, 33, 1),
(34, 'INV01COM0034', 1, 1, 'I3-6100', '8 GB', '240 GB SDD', 'DELL', 'VOSTRO 3267', 'NEGRO', 'GCNWVP2', NULL, 0, '0000-00-00', 2, 'MOUSE, MONITOR DELL, TECLADO', 'ASPEL', '', 42, 34, 1),
(35, 'INV01COM0045', 1, 2, 'I3-1005G1', '8 GB', '240 GB SDD', 'Lenovo', 'IdeaPad S145', 'PLATEADA', 'PF208SFG', 'ADLX65CCGU2A', 0, '0000-00-00', 2, '', 'ASPEL', '', 77, 35, 1),
(36, 'INV01COM0036', 1, 1, 'Pentium N3540', '4 GB', '240 GB SDD', 'DELL', 'Inspiren 11', 'PLATEADA', 'S/N', NULL, 0, '0000-00-00', 2, '', '', 'CUENTA CON PANTALLA TOUCH PERO PRESENTA FALLAS', 13, 36, 1),
(37, 'INV01COM0037', 1, 1, 'I3-6100', '8 GB', '500 GB HDD', 'HP', 'Compac pro6305', 'NEGRO', 'MXL3351PGS', NULL, 0, '0000-00-00', 2, 'MONITOR HP, MAOUSE Y TECLADO', '', '', 32, 37, 1),
(38, 'INV01COM0038', 1, 2, 'I3-1005G1', '8 GB', '120 GB SDD', 'ACER', 'Aspire 5', 'PLATEADA', 'NXHSLL00X10321A5A7600', NULL, 0, '0000-00-00', 1, 'CARGADOR: KP0450H01304603FFBPH03', 'ASPEL', '1 TB EXTRA', 25, 38, 1),
(39, 'INV01COM0049', 1, 1, 'AMD Ryzen 3-3200g', '8 GB', '240 GB SDD', 'ARMADA', 'Ativio', 'NEGRO', '011392903010248', 'S/N', 0, '0000-00-00', 2, 'MONITOR DELL, MOUSE Y TECLADO', 'ASPEL', '', 91, 39, 1),
(40, 'INV01COM0040', 1, 2, 'I3-10110U', '8 GB', '120 GB SDD', 'Lenovo', 'ThinkPad E14 L15 Gen 1', 'NEGRO', 'PF-35KSP9', NULL, 0, '0000-00-00', 1, '', 'ASPEL', '1 TB EXTRA', 29, 40, 1),
(41, 'SOL0COM0041', 2, 2, 'AMD Ryzen 3 5300U', '8 GB', '240 GB', 'Lenovo', 'ThinkPad E14 Gen 3', 'NEGRO', 'PF-33G8ZL', NULL, 0, '2022-09-22', 1, 'CARGADOR:8SSA10R16920L1CZ', '', '', NULL, 41, 1),
(42, 'SOL02COM0045', 2, 2, 'AMD Ryzen 3 5300U', '8 GB', '240 GB SDD', 'Lenovo', 'ThinkPad E14 Gen 3', 'NEGRO', 'PF33GCT7', '8SSA10R16920L1CZ', 0, '2022-09-22', 1, '', '', '', 74, 42, 1),
(43, 'SOL0COM0043', 2, 2, 'AMD Ryzen 3 5300U', '8 GB', '240 GB SDD', 'Lenovo', 'ThinkPad E14 Gen 3', 'NEGRO', 'PF33FV62', NULL, 0, '2022-09-21', 1, 'CARGADOR: 8SSA10R16920L1CZ', '', '', NULL, 43, 1),
(44, 'INV01COM0044', 1, 2, 'Ryzen 3 5300U', '8GB', '240 SSD GB', 'Lenovo', 'ThinkPad E14 Gen 3', 'NEGRO', 'PF33F70T', '19J16TZ', 12568, '2022-10-18', 1, '', 'ASPEL', '', 6, 44, 1),
(45, 'SOL02COM0045', 2, 2, 'Intel Celeron N4020', '4GB', '240 SSD GB', 'Lenovo', 'V15-IGL', 'GRIS', 'PF2J2QN3', '11S45N0245Z1ZSH2CLM18', 0, '0000-00-00', 2, '', '', '', 75, 45, 1),
(46, 'INV01COM0046', 1, 2, 'Ryzen 5 5500U', '16 GB', '256 SDD', 'Lenovo', 'Thinkpad E14 Gen3', 'NEGRO', 'TP00118F', '19V1TZZ', 0, '0000-00-00', 1, '', '', '', 30, 46, 1),
(47, 'INV01COM0047', 1, 2, 'Ryzen 3 5300U', '8gb', '240 SSD GB', 'Lenovo', 'ThinkPad E14 Gen 3', 'NEGRO', 'PF33GPNT', '19J16V8', 11016.38, '2022-11-25', 1, '', '', '', 3, 47, 1),
(48, 'INV01COM0048', 1, 2, 'Ryzen 3 5300U', '8gb', '240 SSD GB', 'Lenovo', 'ThinkPad E14 Gen 3', 'NEGRO', 'PF33EK56', '19WN6', 17068, '2022-12-09', 1, '', 'Sistemas Aspel', '', 42, 48, 1),
(49, 'INV01COM0049', 1, 1, 'Ryzen 7 5700G', '32 GB', '1 TB SSD', 'ARMADA', 'ARMADA', 'NEGRO', 'S/N', '', 27000, '2022-11-28', 1, 'Tarjeta de video: Geforce RTX EAGLE OC 12G\r\nDos monitores: Gaming NACEB\r\nTeclado y mouse \r\nCuenta co', 'SolidWorks 2023 Premium', 'Cuenta con un control para el manejo del RGB', 46, 49, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadora_has_licencias`
--

CREATE TABLE `computadora_has_licencias` (
  `id_relacion` int(11) NOT NULL,
  `computadora_id_compu` int(11) DEFAULT NULL,
  `licencias_id_licencias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `computadora_has_licencias`
--

INSERT INTO `computadora_has_licencias` (`id_relacion`, `computadora_id_compu`, `licencias_id_licencias`) VALUES
(89, 21, 16),
(90, 21, 5),
(91, 21, 7),
(96, 26, 4),
(103, 28, 6),
(104, 28, 7),
(106, 6, 3),
(107, 6, 7),
(109, 17, 3),
(110, 17, 7),
(112, 7, 3),
(113, 7, 7),
(115, 29, 2),
(116, 29, 7),
(118, 30, 4),
(119, 30, 7),
(121, 11, 4),
(122, 11, 7),
(124, 31, 5),
(125, 31, 7),
(127, 15, 5),
(128, 15, 7),
(130, 10, 2),
(131, 10, 7),
(133, 16, 1),
(134, 16, 7),
(139, 33, 6),
(140, 33, 7),
(142, 2, 6),
(143, 2, 7),
(145, 34, 2),
(146, 34, 7),
(148, 35, 4),
(149, 35, 7),
(155, 38, 6),
(156, 38, 7),
(158, 12, 4),
(159, 12, 7),
(161, 39, 3),
(162, 39, 7),
(167, 40, 6),
(168, 40, 7),
(170, 14, 2),
(171, 14, 7),
(177, 41, 6),
(178, 41, 7),
(183, 43, 5),
(184, 43, 7),
(229, 42, 7),
(232, 32, 24),
(233, 32, 5),
(234, 32, 7),
(235, 35, 24),
(236, 1, 24),
(237, 1, 1),
(238, 1, 7),
(239, 46, 24),
(240, 46, 5),
(241, 46, 7),
(242, 14, 24),
(243, 47, 24),
(244, 47, 5),
(245, 47, 7),
(246, 6, 24),
(247, 17, 24),
(248, 48, 24),
(249, 48, 2),
(250, 48, 7),
(251, 39, 24),
(252, 8, 24),
(253, 8, 3),
(254, 8, 7),
(255, 49, 24),
(256, 49, 4),
(260, 3, 24),
(261, 3, 3),
(262, 3, 7),
(269, 30, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_depa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `empresa_id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_depa`, `nombre`, `empresa_id_empresa`) VALUES
(1, 'DIRECCIÓN', 1),
(2, 'ALMACÉN', 1),
(3, 'PROYECTOS', 1),
(4, 'PRODUCCIÓN', 1),
(5, 'GCH', 1),
(6, 'CALIDAD', 1),
(7, 'MANTENIMIENTO', 1),
(8, 'CONTROL', 1),
(9, 'ADQUISICIONES', 1),
(10, 'INFORMÁTICA Y COMUNICACIONES', 1),
(11, 'COMERCIAL', 1),
(12, 'ESR', 1),
(13, 'CVA GUADALAJARA', 2),
(15, 'PIA', 2),
(16, 'CEVA', 2),
(17, 'CEDIM', 2),
(18, 'BE EX EN', 3),
(19, 'CEDIC', 2),
(20, 'CVA TULTITLAN', 2),
(21, 'TRANSPORTE SW', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`) VALUES
(1, 'INNOVET'),
(2, 'SOLGISTIKA'),
(3, 'BE EX EN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kilometraje`
--

CREATE TABLE `kilometraje` (
  `id_km` int(11) NOT NULL,
  `año` varchar(10) NOT NULL,
  `quincena` varchar(50) NOT NULL,
  `km` int(11) NOT NULL,
  `autos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `id_licencias` int(11) NOT NULL,
  `nombre_licencias` varchar(45) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `limite_usuarios` int(11) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `provedores_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`id_licencias`, `nombre_licencias`, `fecha_inicio`, `fecha_fin`, `clave`, `limite_usuarios`, `costo`, `tipo`, `observaciones`, `provedores_id`) VALUES
(1, 'Licencia 1 de Office 365', '0000-00-00', '2022-06-30', 'innovet@termoformadosyblister.onmicrosoft.com', 10, 250, 2, 'Cuenta: innovet@termoformadosyblister.onmicrosoft.com\r\nContraseña: Termo2022$', 1),
(2, 'Licencia 2 de Office 365', '0000-00-00', '2022-06-30', 'innovet1@termoformadosyblister.onmicrosoft.com', 10, 250, 2, 'Cuenta: innovet1@termoformadosyblister.onmicrosoft.com\r\nContraseña: Blister2022.', 1),
(3, 'Licencia 3 de Office 365', '0000-00-00', '2022-06-30', 'innovet2@termoformadosyblister.onmicrosoft.com', 10, 250, 2, 'Cuenta: innovet2@termoformadosyblister.onmicrosoft.com\r\nContraseña: Blister2021.', 1),
(4, 'Licencia 4 de Office 365', '0000-00-00', '2022-06-30', 'innovet3@termoformadosyblister.onmicrosoft.com', 10, 250, 2, 'Cuenta: innovet3@termoformadosyblister.onmicrosoft\r\nContraseña: Blister2021.', 1),
(5, 'Licencia 5 de Office 365', '0000-00-00', '2022-06-30', 'innovet4@termoformadosyblister.onmicrosoft.com', 10, 250, 2, 'Cuenta: innovet4@termoformadosyblister.onmicrosoft\r\nContraseña: Blister2019.', 1),
(6, 'Licencia 6 de Office 365', '0000-00-00', '2022-06-30', 'innovet5@termoformadosyblister.onmicrosoft.com', 10, 250, 2, 'Cuenta: innovet5@termoformadosyblister.onmicrosoft\r\nContraseña: Blister2022.', 1),
(7, 'ANTIVIRUS KASPERSKY', '2022-05-06', '2023-05-06', 'Z7JEP-AMGQS-6ADTJ-U9ETD', 60, 28, 1, '', 2),
(8, 'Windows 10 Santiago Arango', '2018-07-10', 'ilimitado', 'YJVBF-M6WQ6-3HTHQ-Q2HQT-PB9FB', 1, 0, 3, 'Licencia de Windows 10 Pro ocupada por Santiago Arango', 5),
(9, 'Windows 10 Comercial Laptop', '2018-05-11', 'ilimitado', '7J8BV-DJQYK-VMWPC-HGT9H-YFY6Y', 1, 0, 3, 'Licencia de Windows 10 pro en laptop de comercial gris (yessica solis )', 5),
(10, 'Windows 10 Mantenimiento', '2018-05-11', 'ilimitado', 'C8V3C-DF7KV-CCRGR-T2R89-VHWJH', 1, 0, 3, 'Licencia de Windows 10 pro de mantenimiento ', 5),
(11, 'Windows 10 Comercial araceli', '2018-05-11', 'ilimitado', 'X4N43-T8TKK-BMTRY-VY32P-9QBP6', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(12, 'Windows 10 Aux RH', '2018-08-05', 'ilimitado', 'NDRMT-W3R7R-MD4Y9-W2G99-WTYP6', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(13, 'Windows 10 Gerente RH', '2018-05-11', 'ilimitado', 'RCGVY-GC3KB-C9KTB-Y8BFP-288QJ', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(14, 'Windows 10 Recursos Humanos', '2018-08-05', 'ilimitado', 'VK32V-NGTV4-V9FKH-6P9F9-HCFC6', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(15, 'Windows 10 Comercial laptop roja', '2018-06-27', 'ilimitado', 'WNJ92-PGTVY-TD3XQ-9HX7G-V6DGR', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(16, 'Windows 10 PEDRO', '2018-05-27', 'ilimitado', 'D3NYY-PHKRJ-QVCWY-FBD4Q-Y4G6T', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(17, 'Windows 10 Aux Proyectos', '2018-11-05', 'ilimitado', '33DYX-DMPXW-FM364-24WPX-X6VQD', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(18, 'Windows 10 Coordinador Proyectos', '2018-11-05', 'ilimitado', 'DWMR3-NFV36-2T3QQ-3V6B8-78RC4', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(19, 'Windows 10 Gerente Producción', '2018-11-05', 'ilimitado', '22434-WFJJV-MQMFQ-226P3-3JFGP', 1, 0, 3, 'Licencia de Windows 10 pro', 5),
(20, 'Windows 10 Maquinados', '2018-11-05', 'ilimitado', 'VP3GK-RW6F2-TM2GV-H4PGG-XGGTJ', 1, 0, 3, 'Licencia de Windows 10 Pro', 5),
(21, 'Windows 10 Comercial Escritorio', '2018-05-08', 'ilimitado', '72JCN-P8T2W-TKC8V-XYQBD-XHJXG', 1, 0, 3, 'Licencia de Windows 10 Pro para equipo de escritorio de Comercial', 5),
(22, 'Windows 10 Calidad Laptop', '2018-05-08', 'ilimitado', 'RQB2W-BFNHR-TPH22-JTM2M-8FG6T', 1, 0, 3, 'Licencia de Windows 10 Pro ', 5),
(23, 'Windows 10 Calidad Planta', '2018-11-05', 'ilimitado', '7M3V2-MGB3C-DPBQR-QQXG6-4YB38', 1, 0, 3, 'Licencia de Windows 10 Pro', 5),
(24, 'Windows 10', '2022-10-10', 'Permanente', '', 100, 0, 3, '', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `user`, `date`) VALUES
(1, 'Diego Camacho Martinez', '09-20-2022 12:04:53 am'),
(2, 'Diego Camacho Martinez', '09-19-2022 05:15:55 pm'),
(3, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '09-19-2022 05:41:58 pm'),
(4, 'Informática y comunicaciones', '09-19-2022 05:42:30 pm'),
(5, 'Diego Camacho Martinez', '09-20-2022 09:30:56 am'),
(6, 'Diego Camacho Martinez', '09-20-2022 10:35:42 am'),
(7, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '09-20-2022 12:32:36 pm'),
(8, 'Diego Camacho Martinez', '09-22-2022 03:35:51 pm'),
(9, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '09-23-2022 10:03:59 am'),
(10, 'Diego Camacho Martinez', '09-23-2022 03:43:58 pm'),
(11, 'Diego Camacho Martinez', '09-27-2022 08:50:11 am'),
(12, 'Diego Camacho Martinez', '09-27-2022 04:34:50 pm'),
(13, 'Diego Camacho Martinez', '09-28-2022 10:28:34 am'),
(14, 'Diego Camacho Martinez', '09-30-2022 05:44:25 pm'),
(15, 'Diego Camacho Martinez', '10-04-2022 05:04:24 pm'),
(16, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '10-04-2022 06:19:46 pm'),
(17, 'Diego Camacho Martinez', '10-05-2022 02:57:48 pm'),
(18, 'Diego Camacho Martinez', '10-06-2022 08:41:12 am'),
(19, 'Informática y comunicaciones', '10-06-2022 09:04:48 am'),
(20, 'Diego Camacho Martinez', '10-06-2022 09:56:44 am'),
(21, 'Diego Camacho Martinez', '10-06-2022 05:00:08 pm'),
(22, 'Informática y comunicaciones', '10-06-2022 05:00:49 pm'),
(23, 'Informática y comunicaciones', '10-06-2022 05:04:55 pm'),
(24, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '10-07-2022 09:37:39 am'),
(25, 'Informática y comunicaciones', '10-07-2022 09:55:22 am'),
(26, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '10-07-2022 10:21:20 am'),
(27, 'Diego Camacho Martinez', '10-07-2022 04:49:49 pm'),
(28, 'Diego Camacho Martinez', '10-07-2022 05:38:54 pm'),
(29, 'Diego Camacho Martinez', '10-09-2022 05:15:21 pm'),
(30, 'Diego Camacho Martinez', '10-10-2022 05:20:36 pm'),
(31, 'Diego Camacho Martinez', '10-11-2022 08:39:30 am'),
(32, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '10-12-2022 11:04:54 am'),
(33, 'Informática y comunicaciones', '10-12-2022 05:43:50 pm'),
(34, 'Informática y comunicaciones', '10-12-2022 06:03:27 pm'),
(35, 'Informática y comunicaciones', '10-12-2022 06:12:52 pm'),
(36, 'Diego Camacho Martinez', '10-13-2022 09:21:32 am'),
(37, 'Informática y comunicaciones', '10-13-2022 09:23:04 am'),
(38, 'Diego Camacho Martinez', '10-13-2022 10:49:52 am'),
(39, 'Informática y comunicaciones', '10-13-2022 02:01:07 pm'),
(40, 'Diego Camacho Martinez', '10-13-2022 05:11:22 pm'),
(41, 'Diego Camacho Martinez', '10-14-2022 12:28:58 pm'),
(42, 'Diego Camacho Martinez', '10-14-2022 04:05:42 pm'),
(43, 'Informática y comunicaciones', '10-14-2022 05:15:19 pm'),
(44, 'Diego Camacho Martinez', '10-14-2022 05:20:54 pm'),
(45, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '10-14-2022 05:28:54 pm'),
(46, 'Diego Camacho Martinez', '10-17-2022 08:55:31 am'),
(47, 'Diego Camacho Martinez', '10-17-2022 02:47:57 pm'),
(48, 'Diego Camacho Martinez', '10-17-2022 04:26:50 pm'),
(49, 'Diego Camacho Martinez', '10-18-2022 10:18:52 am'),
(50, 'Diego Camacho Martinez', '10-18-2022 10:18:52 am'),
(51, 'Informática y comunicaciones', '10-18-2022 11:22:21 am'),
(52, 'Diego Camacho Martinez', '10-18-2022 04:33:26 pm'),
(53, 'Diego Camacho Martinez', '10-19-2022 10:49:41 am'),
(54, 'Informática y comunicaciones', '10-19-2022 01:12:05 pm'),
(55, 'Informática y comunicaciones', '10-19-2022 04:24:56 pm'),
(56, 'Diego Camacho Martinez', '10-19-2022 05:04:06 pm'),
(57, 'Diego Camacho Martinez', '10-19-2022 05:10:44 pm'),
(58, 'Diego Camacho Martinez', '10-25-2022 09:58:34 am'),
(59, 'Diego Camacho Martinez', '10-25-2022 10:50:05 am'),
(60, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '10-26-2022 01:25:43 pm'),
(61, 'Diego Camacho Martinez', '10-26-2022 03:31:16 pm'),
(62, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '10-27-2022 08:51:55 am'),
(63, 'Diego Camacho Martinez', '10-27-2022 11:41:49 am'),
(64, 'Diego Camacho Martinez', '10-27-2022 11:41:55 am'),
(65, 'Diego Camacho Martinez', '11-01-2022 10:50:55 am'),
(66, 'Informática y comunicaciones', '11-01-2022 03:31:26 pm'),
(67, 'Diego Camacho Martinez', '11-01-2022 03:56:20 pm'),
(68, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-02-2022 06:14:00 pm'),
(69, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-03-2022 12:06:49 pm'),
(70, 'Diego Camacho Martinez', '11-03-2022 02:16:05 pm'),
(71, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-03-2022 03:16:26 pm'),
(72, 'Informática y comunicaciones', '11-04-2022 02:47:32 pm'),
(73, 'Informática y comunicaciones', '11-04-2022 04:08:17 pm'),
(74, 'Informática y comunicaciones', '11-04-2022 04:42:00 pm'),
(75, 'Informática y comunicaciones', '11-07-2022 09:17:20 am'),
(76, 'Diego Camacho Martinez', '11-07-2022 10:13:59 am'),
(77, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-07-2022 01:36:47 pm'),
(78, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-08-2022 11:34:06 am'),
(79, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-09-2022 08:37:32 am'),
(80, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-09-2022 12:42:58 pm'),
(81, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-09-2022 05:23:02 pm'),
(82, 'Informática y comunicaciones', '11-10-2022 04:17:51 pm'),
(83, 'Diego Camacho Martinez', '11-10-2022 04:24:53 pm'),
(84, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-10-2022 06:29:26 pm'),
(85, 'Diego Camacho Martinez', '11-11-2022 12:19:00 pm'),
(86, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-11-2022 12:24:03 pm'),
(87, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-11-2022 12:43:11 pm'),
(88, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-14-2022 02:21:11 pm'),
(89, 'Dirección', '11-16-2022 09:54:24 am'),
(90, 'Eloisa Villafuerte Lopez', '11-16-2022 10:03:27 am'),
(91, 'Eloisa Villafuerte Lopez', '11-16-2022 10:04:03 am'),
(92, 'Eloisa Villafuerte Lopez', '11-16-2022 10:05:50 am'),
(93, 'Diego Camacho Martinez', '11-16-2022 10:17:43 am'),
(94, 'Eloisa Villafuerte Lopez', '11-16-2022 10:18:03 am'),
(95, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-16-2022 10:39:44 am'),
(96, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-16-2022 10:50:56 am'),
(97, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-17-2022 11:28:58 am'),
(98, 'Diego Camacho Martinez', '11-17-2022 12:26:29 pm'),
(99, 'Diego Camacho Martinez', '11-18-2022 11:30:40 am'),
(100, 'Diego Camacho Martinez', '11-24-2022 08:35:36 am'),
(101, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-25-2022 08:56:52 am'),
(102, 'Diego Camacho Martinez', '11-29-2022 09:22:36 am'),
(103, 'Diego Camacho Martinez', '11-30-2022 12:11:45 pm'),
(104, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '11-30-2022 02:30:38 pm'),
(105, 'Diego Camacho Martinez', '12-01-2022 12:08:22 pm'),
(106, 'Diego Camacho Martinez', '12-02-2022 08:48:51 am'),
(107, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-02-2022 09:27:59 am'),
(108, 'Diego Camacho Martinez', '12-05-2022 10:49:49 am'),
(109, 'Diego Camacho Martinez', '12-06-2022 09:03:19 am'),
(110, 'Diego Camacho Martinez', '12-08-2022 02:20:43 pm'),
(111, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-08-2022 03:11:15 pm'),
(112, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-08-2022 05:42:56 pm'),
(113, 'Diego Camacho Martinez', '12-09-2022 11:48:08 am'),
(114, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-09-2022 02:01:56 pm'),
(115, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-09-2022 05:37:22 pm'),
(116, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-12-2022 10:23:14 am'),
(117, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-12-2022 04:19:45 pm'),
(118, 'Diego Camacho Martinez', '12-13-2022 09:16:17 am'),
(119, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-13-2022 09:19:59 am'),
(120, 'Diego Camacho Martinez', '12-13-2022 10:15:09 am'),
(121, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-13-2022 05:08:16 pm'),
(122, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-13-2022 05:25:00 pm'),
(123, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-13-2022 06:27:57 pm'),
(124, 'Diego Camacho Martinez', '12-14-2022 08:57:37 am'),
(125, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-14-2022 09:35:56 am'),
(126, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-16-2022 10:20:23 am'),
(127, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-19-2022 09:16:48 am'),
(128, 'Diego Camacho Martinez', '12-19-2022 10:20:02 am'),
(129, 'Diego Camacho Martinez', '12-20-2022 10:14:41 am'),
(130, 'Diego Camacho Martinez', '12-21-2022 08:38:13 am'),
(131, 'Diego Camacho Martinez', '12-21-2022 10:22:53 am'),
(132, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-21-2022 11:31:51 am'),
(133, 'Diego Camacho Martinez', '12-21-2022 05:52:03 pm'),
(134, 'Diego Camacho Martinez', '12-22-2022 10:33:07 am'),
(135, 'Diego Camacho Martinez', '12-26-2022 11:56:20 am'),
(136, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '12-27-2022 02:10:49 pm'),
(137, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-02-2023 11:51:56 am'),
(138, 'Informática y comunicaciones', '01-02-2023 12:00:48 pm'),
(139, 'Informática y comunicaciones', '01-03-2023 12:56:02 pm'),
(140, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-04-2023 09:19:03 am'),
(141, 'Diego Camacho Martinez', '01-04-2023 10:18:19 am'),
(142, 'Diego Camacho Martinez', '01-04-2023 03:23:57 pm'),
(143, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-04-2023 06:18:18 pm'),
(144, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-05-2023 10:47:41 am'),
(145, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-09-2023 10:51:52 am'),
(146, 'Diego Camacho Martinez', '01-09-2023 12:51:07 pm'),
(147, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-09-2023 04:35:40 pm'),
(148, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-10-2023 11:15:35 am'),
(149, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-10-2023 11:36:51 am'),
(150, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-12-2023 12:20:18 pm'),
(151, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-12-2023 01:01:43 pm'),
(152, 'Diego Camacho Martinez', '01-12-2023 05:55:16 pm'),
(153, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-12-2023 06:04:46 pm'),
(154, 'CARLOS OSWALDO GONZALEZ AGUILAR ', '01-13-2023 11:48:24 am'),
(155, 'Diego Camacho Martinez', '01-13-2023 12:18:49 pm'),
(156, 'Diego Camacho Martinez', '01-13-2023 04:10:44 pm'),
(157, 'Denise Minjarez', '01-13-2023 04:12:13 pm'),
(158, 'Diego Camacho Martinez', '01-13-2023 04:16:35 pm'),
(159, 'Diego Camacho Martinez', '01-16-2023 09:51:59 am'),
(160, 'Denise Minjarez', '01-16-2023 09:52:30 am'),
(161, 'Informática y comunicaciones', '01-16-2023 11:00:33 am'),
(162, 'Informática y comunicaciones', '01-16-2023 11:15:26 am'),
(163, 'Diego Camacho Martinez', '01-16-2023 11:30:17 am'),
(164, 'Diego Camacho Martinez', '01-17-2023 08:50:14 am'),
(165, 'Denise Minjarez', '01-17-2023 09:06:49 am'),
(166, 'Diego Camacho Martinez', '01-17-2023 02:01:15 pm'),
(167, 'Informática y comunicaciones', '01-17-2023 02:01:38 pm'),
(168, 'Diego Camacho Martinez', '01-18-2023 10:37:20 am'),
(169, 'Diego Camacho Martinez', '01-18-2023 11:03:37 am'),
(170, 'Diego Camacho Martinez', '01-18-2023 11:11:38 am'),
(171, 'Diego Camacho Martinez', '01-18-2023 11:26:47 am'),
(172, 'Denise Minjarez', '01-18-2023 11:31:06 am'),
(173, 'Diego Camacho Martinez', '01-19-2023 08:40:11 am'),
(174, 'Denise Minjarez', '01-19-2023 09:33:01 am'),
(175, 'Informática y comunicaciones', '01-19-2023 03:19:58 pm'),
(176, 'Diego Camacho Martinez', '01-20-2023 08:39:33 am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pass`
--

CREATE TABLE `pass` (
  `id_pass` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `usuario-email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pass`
--

INSERT INTO `pass` (`id_pass`, `tipo`, `descripcion`, `usuario-email`, `password`) VALUES
(3, 3, 'Wifi de sala de juntas ambas redes', 'Sala_de_juntas', 'JunT4s01'),
(6, 3, 'Contraseña de red de informática ', 'Informática INNOVET', '21163708'),
(7, 3, 'Red de telmex de comercial', 'Infinitumgdy', '1351351f51'),
(8, 1, 'Correo electrónico', 'a.hernandez@termoformadosyblister.com', 'kC59YmAK-'),
(9, 1, 'Correo electrónico de Araceli jimenez', 'a.jimenez@termoformadosyblister.com', 'Duk-T54fd'),
(10, 1, 'Correo electrónico', 'asesorcomercial@termoformadosyblister.com', 'Kmn-W77As'),
(11, 1, 'Correo electrónico', 'asistente@termoformadosyblister.com', 'FgrSL-19ba'),
(12, 1, 'Correo electrónico', 'atencionaclientes@termoformadosyblister.com', '5J3D-Ptqb'),
(13, 1, 'Correo electrónico', 'auxadmon@termoformadosyblister.com', 'Dh2B-NDC9'),
(14, 1, 'Correo electrónico', 'auxcontable@termoformadosyblister.com', 'wBV-LD5XB'),
(15, 1, 'Correo electrónico', 'auxigenieria@termoformadosyblister.com', 'Hjsn6Y-E8M'),
(16, 1, 'Correo electrónico', 'auxiliarrh@termoformadosyblister.com', 'V8sR-BySz'),
(17, 1, 'Correo electrónico', 'auxventas@termoformadosyblister.com', 'NEvJ-59a9'),
(18, 1, 'Correo electrónico', 'calidad@termoformadosyblister.com', '33WL-VqAZ'),
(19, 1, 'Correo electrónico', 'compras@termoformadosyblister.com', 'Comp-0305.'),
(20, 1, 'Correo electrónico', 'control2@termoformadosyblister.com', 'vE6E-usCQ'),
(21, 1, 'Correo electrónico', 'coordinadores@termoformadosyblister.com', 'HCSN-7XA9'),
(22, 1, 'Correo electrónico', 'd.herrera@termoformadosyblister.com', 'UPYS-CQF8'),
(23, 1, 'Correo electrónico', 'd.olivos@termoformadosyblister.com', 'Hzz9-Zkmtbou'),
(24, 1, 'Correo electrónico de Diana Santiago', 'd.santiago@termoformadosyblister.com', 'Hjsn6Y-E8M'),
(25, 1, 'Correo electrónico', 'd.hernandez@termoformadosyblister.com', 'GQv-8rnbF'),
(26, 1, 'Correo electrónico', 'e.hernandez@termoformadosyblister.com', '3aZE6-jg5'),
(27, 1, 'Correo electrónico', 'e.villafuerte@termoformadosyblister.com', 'YdAJ-ZLD2'),
(28, 1, 'Correo electrónico', 'facturacion@termoformadosyblister.com', 'YdAJ-ZLD2'),
(29, 1, 'Correo electrónico', 'g.lopez@termoformadosyblister.com', 'n9L56-DWE'),
(30, 1, 'Correo electrónico', 'g.malagon@termoformadosyblister.com', 'a9d7-G46Y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perifericos`
--

CREATE TABLE `perifericos` (
  `id_perifericos` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `no_serie` varchar(50) DEFAULT NULL,
  `caracteristicas` varchar(200) NOT NULL,
  `Estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `id_propietario` int(11) DEFAULT NULL,
  `activo` int(11) NOT NULL,
  `cons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perifericos`
--

INSERT INTO `perifericos` (`id_perifericos`, `codigo`, `no_serie`, `caracteristicas`, `Estado`, `fecha`, `costo`, `personal_id`, `id_propietario`, `activo`, `cons`) VALUES
(8967, 'INV01PER0001', 'BZRWH4ZNC03363P', 'EN BUEN ESTADO CON CARGADOR DE MONITOR A2514_RPN		', 1, '2021-04-07', 0, 12, 1, 1, 1),
(8968, 'INV01PER0002', '181115-3140773', '				NoBreak						', 1, '2019-06-18', 0, 45, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `no_empleado` int(11) DEFAULT NULL,
  `nombre` varchar(75) NOT NULL,
  `a_paterno` varchar(45) DEFAULT NULL,
  `a_materno` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `extension` varchar(5) DEFAULT NULL,
  `id_depar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `no_empleado`, `nombre`, `a_paterno`, `a_materno`, `email`, `phone`, `extension`, `id_depar`) VALUES
(1, 4, 'MARIO AUGUSTO', 'ESPINOSA', 'HERNANDEZ', '1991mex@gmail.com', 4423377127, '', 1),
(2, 7, 'BEATRIZ', 'HERNANDEZ', 'ROJAS', 'b.hernandez@termoformadosyblister.com', 4423781692, '', 1),
(3, 11, 'ARACELI', 'JIMENEZ', 'ECHEVERRIA', 'a.jimenez@termoformadosyblister.com', 4422701036, '', 11),
(4, 13, 'JOSE ANGEL', 'JIMENEZ', 'PINEDA', 'j.jimenez@termoformadosyblister.com', 5554566534, '', 1),
(5, 30, 'JEAN PAUL', 'SYLVAIN', 'BOURLOTON', 's.bourloton@termoformadosyblister.com', 4421463471, '', 4),
(6, 309, 'ELOISA', 'VILLAFUERTE', 'LOPEZ', 'e.villafuerte@termoformadosyblister.com', 4425956550, '', 8),
(7, 3280, 'MIGUEL', 'MARINEZ', 'GARCIA', 'm.martinez@termoformadosyblister.com', 4423959156, '', 2),
(8, 6060, 'RIGOBERTO', 'RAMIREZ', 'REYES', 'r.ramirez@termoformadosyblister.com', 5532200863, '', 6),
(9, 6093, 'PEDRO OSVALDO', 'AGUILAR', 'SANCHEZ', 'p.aguilar@termoformadosyblister.com', 4425956551, '', 11),
(10, 6219, 'SILVIA', 'BAUTISTA', 'CRUZ', 's.bautista@termoformadosyblister.com', 4423959155, '', 11),
(11, 6241, 'SANTIAGO', 'ARANGO', 'PALACIO', 's.arango@termoformadosyblister.com', 7724487334, '', 11),
(12, 6284, 'OSCAR ANDRÉS', 'ESPINOSA', 'ESPINOSA', 'o.espinosa@termoformadosyblister.com', 4425956549, '', 11),
(13, 6327, 'VIRIDIANA MIZIEL', 'GARCIA', 'LOPEZ', 'm.garcia@ab-forti.com', 4421817846, '', 5),
(14, 222222, 'ELISA ALEJANDRA', 'AVILA', 'REQUENA', 'comercial@be-exen.com', 4423372678, '', 18),
(15, 1968, 'ISRAEL', 'AVILA', 'ROMERO', 'i.avila@solgistika.com', 5525237596, '', 16),
(16, 6339, 'GERMAN', 'ESPINOSA', 'HERNANDEZ', 'achu-germenes@hotmail.com', 4422734709, '', 1),
(17, 8888888, 'ERENDIRA', 'ORDAZ', 'REBOLLO', 'erendira@i.com', 4423377127, '', 1),
(18, 206, 'CARLOS ADRIAN', 'RUIZ', 'SUAREZ', 'adrianruizsuarez085@gmail.com', 5526900034, '', 21),
(19, 2068, 'EVA ALEJANDRA', 'JIMENEZ', 'MURCIA', 'e.jimenez@solgistika.com', 5526900034, '', 16),
(20, 988, 'MAURICIO', 'JIMENEZ', 'ECHEVERRIA', 'm.jimenez@solgistika.com', 5541925311, '', 15),
(24, 6330, 'JUDITH JIMENA ', 'ALLER', 'MARTINEZ BACA', 'j.aller@ab-forti.com', 4423593265, '', 1),
(25, 6341, 'KAREN GISSEL', 'CRUZ', 'ALAMILLA', 'k.cruz@termoformadosyblister.com', 4423594845, '', 5),
(26, 888888888, 'MAMÁ', 'SRA', 'BETTY', 'mama@sra.bety', 4423463713, '', 1),
(28, 2150, 'CARLOS', 'HUERTA', 'MARTINEZ', 'c.huerta@solgistika.com', 4424792354, '', 13),
(29, 6299, 'JENNIFER', 'PARADA', 'HERNANDEZ', 'j.parada@termoformadosyblister.com', 4421777533, '', 9),
(30, 6337, 'FERNANDO', 'JUAREZ', 'SANCHEZ', 'f.juarez@ab-forti.com', 4424753938, '', 10),
(31, 6329, 'DANIEL', 'ROUMER', 'CASTRO', 'd.roumer@ab-forti.com', 4422260124, '', 12),
(32, 634, 'JESSICA LIZBETH', 'CORREA', 'GARCIA', 'auxiliargch@termoformadosyblister.com', 4422076243, '', 5),
(33, 476, 'JOSE FRANCISCO', 'FLORES', 'REYES', 'f.flores@solgistika.com', 5544040219, '', 17),
(34, 6309, 'MARIA FERNANDA', 'LEÓN', 'ROLDAN', 'atencionaclientes@termoformadosyblister.com', 4461390437, '', 11),
(35, 2155, 'JULIO CESAR', 'RAMIREZ', 'CARBAJAL', 'j.ramirez@solgistika.com', 4422813655, '', 15),
(36, 2000, 'MARIA DE LOURDES', 'GRANADERO', 'ALVARADO', 'proyectos@be-exen.com', 4461226824, '-', 18),
(37, 2001, 'ELIUTH', 'CHAVERO', 'JASSO', 'proyectos@be-exen.com', 4423863552, '-', 18),
(38, 2002, 'HANNIA LIZETTE', 'CAMPOS', 'ARTEAGA', 'proyectos@be-exen.com', 4421040693, '-', 18),
(39, 0, 'KAREN', 'BECERRA', 'ROSAS', '', 0, '', 18),
(40, 0, 'ANDREA ', 'PAREDES ', 'GARCIA', '', 0, '', 18),
(41, 1099, 'MAXIMILIANO', 'VEGA', 'TREJO', 'm.vega@termoformadosyblister.com', 0, '', 7),
(42, 6203, 'DIANA LAURA', 'SANTIAGO', 'NORBERTO', 'd.santiago@termoformadosyblister.com', 785, '103', 8),
(43, 6208, 'GUADALUPE SILVIA', 'LOPEZ', 'NIEVES', 'g.lopez@termoformadosyblister.com', 4423561892, '109', 3),
(44, 6211, 'FRANCISCO RAFAEL', 'RIVERA', 'ORTEGA', 'auxigenieria@termoformadosyblister.com', 0, '', 3),
(45, 6222, 'ERIK', 'RIVERA', 'DOMINGUEZ', 'maquinados@termoformadosyblister.com', 0, '', 3),
(46, 6246, 'DIANA LAURA', 'HERNANDEZ ', 'GONZALEZ', 'd.hernandez@termoformadosyblister.com', 772, '109', 3),
(47, 6316, 'YESSICA LIZETH', 'SOLIS', 'FLORES', 'servicioaclientes@termoformadosyblister.com', 271, '104', 11),
(48, 6320, 'DIEGO', 'CAMACHO', 'MARTINEZ', 'soportetics@termoformadosyblister.com', 7711594931, '', 10),
(49, 6324, 'OLGA LIDIA', 'GONZALEZ ', 'AGUSTIN', 'facturacion@termoformadosyblister.com', 446, '103', 8),
(50, 6336, 'CARLOS OSWALDO', 'GONZALEZ  ', 'AGUILAR', 'o.gonzalez@termoformadosyblister.com', 771, '', 8),
(51, 6350, 'GISELA', 'OLVERA ', 'ROSALES', 'reclutamientogch@termoformadostblister.com', 0, '', 5),
(52, 2158, 'Paola', 'Becerril', 'Velázquez', 'facturacion@solgistika.com', 5521119822, '', 15),
(53, 2096, 'LUIS ANGEL', 'SANTILLAN ', 'GARCIA', 'l.santillan@solgistika.com', 953, '', 15),
(54, 0, 'MARISOL', 'ARAGON ', 'FLORES', 'm.aragon@solgistika.com', 2215313075, '', 15),
(55, 0, 'INVENTARIO', 'AB FORTI', 'CORPORATIVO', '', 0, '', 10),
(56, 6363, 'Mauricio', 'Salas', 'Tenorio', 'soportetics@termoformadosyblister.com', 5550426812, '', 10),
(57, 10129, 'JESSICA JAQUELINE', 'ARROYO', 'MARIN', 'atenciongch@solgistika.com', 0, '', 16),
(58, 1, 'PRODUCCION', '0', '0', '', 0, '', 4),
(59, 2, 'DIRECCION', '0', '0', '', 0, '', 1),
(60, 3, 'ALMACEN', '0', '0', '', 0, '', 2),
(61, 4, 'PROYECTOS', '0', '0', '', 0, '', 3),
(62, 6, 'GCH', '0', '0', '', 0, '', 5),
(63, 7, 'CALIDAD', '0', '0', '', 0, '', 6),
(64, 8, 'MANTENIMIENTO', '0', '0', '', 0, '', 7),
(65, 9, 'CONTROL', '0', '0', '', 0, '', 8),
(66, 10, 'ADQUISICIONES', '0', '0', '', 0, '', 9),
(67, 11, 'INFORMATICA', '0', '0', '', 0, '', 10),
(68, 12, 'COMERCIAL', '0', '0', '', 0, '', 11),
(69, 13, 'ESR', '0', '0', '', 0, '', 12),
(70, 6364, 'MARINA MICHELLE', 'JIMÉNEZ', 'GALVÁN', 'auxcompras@termoformadosyblister.com', 0, '', 9),
(71, 10054, 'Jeraldi Guadalupe', 'Escamilla', 'Pérez', 'reclutamiento@solgistika.com', 0, '', 16),
(72, 10006, 'Luisa Fernanda', 'Castro', 'Rodríguez', '', 0, '', 16),
(73, 186, 'NESTOR URIEL ', 'LAUREANO', 'VENTURA', 'n.laureano@solgistika.com', 0, '', 17),
(74, 664, 'DIANA', 'HERNANDEZ ', 'MORELOS', 'd.hernandez@solgistika.com', 0, '', 16),
(75, 1111, 'PEDRO', 'RANGEL', 'GARCIA', 'p.rangel@solgistika.com', 0, '', 16),
(76, 6370, 'PAMELA DEL CARMEN', 'DOMINGUEZ', 'HERNÁNDEZ', 'atencionaclientes@innovet.com.mx', 0, '', 11),
(77, 6347, 'ARELI DE JESÚS ', 'FACUNDO', 'RAMOS', 'servicioaclientes@termoformadosyblister.com', 0, '', 11),
(78, 6371, 'SABRINA DOLORES', 'MARTINEZ', 'LOPEZ', '', 0, '', 1),
(79, 0, 'Miguel Angel', 'Escobedo', 'Contreras', '', 4422076243, '', 5),
(80, 6376, 'CESAR', 'MITRE', 'GONZÁLEZ', 'atencionaclientes@innovet.com.mx', 0, '', 11),
(81, 3679, 'MARÍA ALEJANDRA', 'BANDA', 'LÓPEZ', 'facturacion@innovet.com.mx', 0, '', 8),
(82, 2161, 'ALEXIS', 'AYALA', 'URIBE', '', 0, '', 15),
(83, 900, 'Bertha Natalia', 'Sánchez', 'López', 'nominas@solgistika.com', 4421903008, '0', 16),
(84, 0, 'FABIOLA', 'VERA', 'HERNANDEZ', 'fabi120899@hotmail.com', 7751449476, '', 18),
(85, 0, 'CRISTIAN DANIEL', 'ATANACIO', 'AVILA', 'cdaa1525002570@hotmail.com', 7751003730, '', 18),
(86, 0, 'BRENDA', 'VARGAS', 'ROSALES', 'bv5198890@gmail.com', 7751573602, '', 18),
(87, 0, 'PAULINA', 'YESCAS', 'MARTINEZ', 'myescaspaulina@gmail.com', 9512709572, '', 18),
(88, 0, 'ISMAEL ALEJANDRO', 'LUGO', 'TRIGUEROS', 'ismaellugo27@outlook.com', 7712208991, '', 18),
(89, 0, 'KEVIN ARNULFO', 'MALDONADO', 'PIEDRA', 'kevarmapi55@gmail.com', 7551717795, '', 18),
(90, 0, 'TANIA', 'ISLAS', 'OSORIO', 'tani.os246@gmail.com', 7752011629, '', 18),
(91, 6386, 'DENISE', 'MINJAREZ', 'SMITH MAC DONALD', 'administracion@ab-forti.com', 0, '', 8),
(92, 123, 'ITZEL ADRIANA', 'ANTONIO', 'GONZALEZ', 'facturacion@solgistika.com', 0, '', 15),
(93, 6392, 'ANA LAURA ', 'SANCHEZ', 'VAZQUEZ', 'a.sanchez@innovet.com.mx', 0, '', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `id_propietario` int(11) NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id_propietario`, `codigo`, `nombre`) VALUES
(1, 'INV', 'INNOVET'),
(2, 'SOL', 'SOLGISTIKA'),
(3, 'BEX', 'BE EX EN'),
(4, 'JAJ', 'JOSE ANGEL JIMENEZ PINEDA'),
(5, 'BHR', 'BEATRIZ HERNANDEZ ROJAS'),
(6, 'APC', 'ARRENDADORA PURA DEL CARIBE'),
(7, 'NRF', 'NR FINANCE (NISSAN)'),
(8, 'VWL', 'VOLKSWAGEN LEASING'),
(9, 'EVJ', 'EVA ALEJANDRA JIMENEZ MURCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `id_provedores` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`id_provedores`, `nombre`, `descripcion`, `phone`, `email`) VALUES
(1, 'Informática avanzada', 'Provee las licencias de  Microsoft Office \r\nConsultor de soporte técnico', '4428880130', 'fernando@iav.com.mx'),
(2, 'Kaspersky', 'Servicio de licencia de antiviruz', '5563943390', 'info@kaspersky.com'),
(3, 'Telmex', '					', '800 123 2222', 'telmexsoluciona@telmex.com'),
(4, 'Total Play', 'Servicio de internet por fibra óptica', '800-303-3333', ''),
(5, 'Microsoft', 'Microsoft desarrolla, fabrica, licencia y produce software y equipos electrónicos, siendo sus produc', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id_ruta` int(11) NOT NULL,
  `codigo_ruta` varchar(255) DEFAULT NULL,
  `r_imagen` varchar(255) DEFAULT NULL,
  `r_tarjeta` varchar(255) DEFAULT NULL,
  `r_factura` varchar(255) DEFAULT NULL,
  `r_identificacion` varchar(255) DEFAULT NULL,
  `r_tenencia` varchar(255) DEFAULT NULL,
  `r_verificacion` varchar(255) DEFAULT NULL,
  `r_licencia` varchar(255) DEFAULT NULL,
  `r_seguro` varchar(255) DEFAULT NULL,
  `r_servcicio` varchar(255) DEFAULT NULL,
  `r_politicas` varchar(255) DEFAULT NULL,
  `r_responsiva` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id_ruta`, `codigo_ruta`, `r_imagen`, `r_tarjeta`, `r_factura`, `r_identificacion`, `r_tenencia`, `r_verificacion`, `r_licencia`, `r_seguro`, `r_servcicio`, `r_politicas`, `r_responsiva`) VALUES
(1, 'JAJ01TRA0001', 'MERCEDES BENZ C250 CGI SPORT 2016.png', 'TARJETA DE CIRCULACIÓN MERCEDES UME736F.pdf', 'FACTURA MERCEDES 2016.pdf', 'INE JOSE ANGEL JIMENEZ PINEDA.pdf', 'PAGO DE TENENCIA 2022 MERCEDES 2016.pdf', 'VERIFICACION MERCEDES C250 JOSE JIMÉNEZ FEBRERO 2023.pdf', 'LICENCIA PARA CONDUCIR JOSE ANGEL JIMÉNEZ NOV 2026.pdf', 'POLIZA SEGURO DE AUTO MERCEDES BENZ C-250 CGI SPORT 2016 500752688.pdf', '', '', ''),
(2, 'SOL01TRA0002', 'MAZDA CX5 2019.png', 'TARJETA DE CIRCULACION MAZDA CX5 2019.pdf', 'FACTURA Mazda CX5 2019_6.pdf', 'LICENCIA DE CONDUCIR.jpg', 'PAGO TENENCIA 2022 MAZDA CX5.pdf', 'VERIFICACION MAZDA CX5 SYLVAIN MARZO 2023.pdf', 'LICENCIA DE CONDUCIR.jpg', 'POLIZA SEGURO DE AUTO MAZDA CX5 2019.pdf', 'SERVICIO 50,000 KM MAZDA CX5 SYLVAIN.pdf', '', ''),
(3, 'SOL01TRA0003', 'MERCEDES BENZ GLC 300 4 MATIC 2021.png', 'TARJETA DE CIRCULACIÓN MERCEDES BENZ 300 GLC 2021.pdf', 'FACTURA Mercedes Benz GLC 300 4Matic 2021_4.pdf', 'INE BEATRIZ HERNANDEZ ROJAS.pdf', 'PAGO DE TENENCIA 2022 MERCEDES GLC 300.pdf', 'VERIFICACIÓN MERCEDES 2021 JULIO 2023.pdf', 'LICENCIA DE CONDUCIR BEATRIZ HERNÁNDEZ NOVIEMBRE 2026.pdf', 'POLIZA SEGURO DE AUTO MERCEDES BENZ GLC 300 2021 510906019.pdf', 'SERVICIO 20,000KM GLC 300 MERCEDES 2021.pdf', '', ''),
(4, 'JAJ01TRA0004', 'PEUGEOT GRAND RAID 1.6 STD.png', 'TARJETA DE CIRCULACION PEUGEOT PARTNER 2008 B.pdf', 'Factura Peugeot 2008.pdf', 'IDENTIFICACION JOSE JIMENEZ.pdf', 'PAGO DE TENENCIA 2022 PEUGEOT 2008.pdf', 'VERIFICACIÓN PEUGEOT PARTNER 2008 MARZO 2023.pdf', 'LICENCIA PARA CONDUCIR JOSE ANGEL JIMÉNEZ NOV 2026.pdf', 'POLIZA DE SEGURO 501237069 PEUGEOT GRAND RAID STD MOD 2008.pdf', 'SERVICIO DE MANTENIMIENTO TIPO C 24-04-22.pdf', '', ''),
(5, 'SOL01TRA0005', 'KIA RIO FIERY RED HB 2022.png', 'TARJETA DE CIRCULACIÓN RIO 2022 FIERY RED UNB667F.pdf', 'FACTURA KIA RIO ROJO.pdf', 'IDENTIFICACIÓN Y LICENCIA PARA CONDUCIR GERMAN.pdf', 'PAGO DE TENENCIA 2022 UKM837D.pdf', 'VERIFICACIÓN RIO 2022 FIERY RED GERMAN ESPINOSA DICIEMBRE 2023.pdf', 'IDENTIFICACIÓN Y LICENCIA PARA CONDUCIR GERMAN.pdf', 'POLIZA SEGURO DE AUTO KIA RIO LX L4 GERMAN 533630034.pdf', 'SERVICIO DE MANTENIMIENTO RIO 2022 GERMAN ESPINOZA.pdf', '', ''),
(6, 'SOL01TRA0006', 'KIA RIO SILKY SILVER HB 2022.png', 'Tarjeta Circulación Kia Rio Plata.pdf', 'FACTURA KIA RIO PLATA.pdf', 'Licencia Erendira Ordaz Rebollo.pdf', 'PAGO DE TENENCIA 2022 UKM836D.pdf', 'Verificación Rio Plata.pdf', 'Licencia Erendira Ordaz Rebollo.pdf', 'POLIZA SEGURO DE AUTO KIA RIO LX L4 ERENDIRA 533501441.pdf', 'SERVICIO DE MANTENIMIENTO RIO 2022 ERENDIRA REBOLLO.pdf', '', ''),
(7, 'SOL01TRA0007', 'KIA RIO SNOW WHITE PEARL HB 2022.png', 'Tarjeta circulación Kia Rio Blanco.pdf', 'FACTURA KIA RIO BLANCO.pdf', 'LICENCIA PARA CONDUCIR MARIO.pdf', 'PAGO DE TENENCIA 2022 UKM835D.pdf', 'VERIFICACIÓN RIO 2022 BLANCO.pdf', 'LICENCIA PARA CONDUCIR MARIO.pdf', 'POLIZA SEGURO DE AUTO KIA RIO LX L4 MARIO.pdf', 'SERVICIO DE MANTENIMIENTO RIO 2022 MARIO AUGUSTO.pdf', '', ''),
(8, 'SOL0TRA0008', 'KIA RIO AURORA BLACK PEARL SEDAN 2022.png', 'TARJETA DE CIRCULACIÓN RIO 2022 AURORA BLACK PEARL UPH469E.pdf', 'FACTURA AURORA BLACK PEARL.pdf', NULL, 'PAGO DE TENENCIA 2022 UKM839D.pdf', 'VERIFICACION RIO 2022 UPH469E.pdf', NULL, 'POLIZA SEGURO DE AUTO KIA RIO 535197529.pdf', 'VANAUTO SA DE CV KIA QSR 45628 19,107 KM.pdf', NULL, NULL),
(9, 'SOL03TRA009', 'KIA RIO FIERY RED HB 2022.png', 'Tarjeta de circulación Kia Rio 2022 Elisa Avila.pdf', 'FACTURA FIERY RED.pdf', 'IDENTIFICACIÓN ELISA AVILA.pdf', 'PAGO DE TENENCIA 2022 UKM971D.pdf', 'VERIFICACIÓN RIO 2022 FIERY RED UNW371E.pdf', 'LICENCIA PARA CONDUCIR ELISA AVILA.pdf', 'POLIZA SEGURO DE AUTO KIA RIO LX ELISA 535200240.pdf', 'VANAUTO K SA DE CV KIAQSR 43590 8,168 KM.pdf', '', ''),
(10, 'SOL02TRA0010', 'KIA RIO SMOKE BLUE HATCHBACK 2022.png', 'TARJETA DE CIRCULACION KIA RIO 2022 ISRAEL AVILA.pdf', 'FACTURA SMOKE BLUE.pdf', 'IDENTIFICACIÓN ISRAEL AVILA.pdf', 'PDER EJECUTIVO DEL ESTADO DE QUERETARO_ TENENCIA_RIO KIA Smoke Blu.pdf', 'VERIFICACION RIO 2022 ISRAEL AVILA DICIEMBRE 2023.pdf', 'LICENCIA DE CONDUCIR ISRAEL AVILA.pdf', 'POLIZA SEGURO DE AUTO KIA RIO LX L4 ISRAEL 535196620.pdf', 'SERVICIO MANTENIMIENTO RIO 2022 ISRAEL AVILA.pdf', 'POLITICAS DE USO KIA RIO 2022 ISRAEL AVILA.pdf', 'RESPONSIVA KIA RIO 2022 ISRAEL AVILA.pdf'),
(11, 'SOL02TRA0011', 'KIA RIO SMOKE BLUE HATCHBACK 2022.png', 'TARJETA DE CIRCULACIÓN RIO 2022 SMOKE BLUE.pdf', 'FACTURA KIA RIO 2022 SMOKE BLUE UK000009127.pdf', 'LICENCIA DE CONDUCIR EVA JIMENEZ.pdf', 'PAGO DE TENENCIA Y DERECHOS.pdf', 'VERIFICACIÓN KIA RIO 2022 SMOKE BLUE EVA JIMENEZ.pdf', 'LICENCIA DE CONDUCIR EVA JIMENEZ.pdf', 'POLIZA SEGURO DE AUTO KIA RIO LX EVA ALEJANDRA 494658115.pdf', 'DALTON AUTOS DE ORIENTE DF SA DE CV FS 078855 6,785 KM.pdf', '', ''),
(12, 'APC02TRA0012', 'VERSA SENSE MT BLANCO 2020.png', 'TARJETA DE CIRCULACION  NISSAN VERSA 2020 MAURICIO JIMÉNEZ.pdf', 'FACTURA.jpg', 'IDENTIFICACION MAURICIO JIMENEZ ECHEVERRIA.pdf', 'PAGO DE TENENCIA 2022 VERSA ULZ186C.pdf', 'VERIFICACION VERSA 2023 MAURICIO ENERO 2025.pdf', 'LICENCIA DE CONDUCIR.jpg', 'POLIZA SEGURO DE AUTO MAURICIO JIMENEZ 57386271.pdf', 'SERVICIO 60,000 KM VERSA MAURICIO.pdf', 'POLITICAS DE USO VERSA MAURICIO JIMÉNEZ.pdf', ''),
(13, 'APC01TRA0013', 'VERSA SENSE MT BLANCO 2020.png', 'TARJETA DE CIRCULACION NISSAN VERSA 2020 ELOISA VILLAFUERTE.pdf', 'FACTURA.jpg', 'INE ELOISA VILLAFUERTE LOPEZ.pdf', 'PAGO DE TENENCIA 2022 VERSA ULZ187C.pdf', 'VERIFICACIÓN VERSA 2020 ELOISA ENERO 2025.pdf', 'LICENCIA PARA CONDUCIR ELOISA VILLAFUERTE MAY 2026.pdf', 'POLIZA SEGURO DE AUTO ELOISA VILLAFUERTE 57386281.pdf', 'SERVICIO 40,000 KM VERSA BLANCO ELOISA.pdf', 'POLITICAS DE USO.jpg', ''),
(14, 'APC0TRA0014', 'VERSA SENSE MT NEGRO 2020 .png', 'TARJETA DE CIRCULACION.jpg', 'FACTURA.jpg', NULL, 'CONSTANCIA DE VERIFICACIÓN VERSA 2020 NEGRO UPC374G.pdf', 'VERIFICACION.jpg', NULL, 'POLIZA SEGURO DE AUTO RIGOBERTO RAMIREZ.pdf', '', NULL, ''),
(15, 'APC01TRA0015', 'NISSAN MARCH SENSE TM 2020.png', 'TARJETA DE CIRCULACION.jpg', 'FACTURA.jpg', 'IDENTIFICACION.jpg', 'PAGO DE TENENCIA 2022 MARCH ULZ185C.pdf', 'VERIFICACION MARCH 2020 SANTIAGO NOVIEMBRE 2024.pdf', 'LICENCIA DE CONDUCIR.jpg', 'POLIZA SEGURO DE AUTO SANTIAGO ARANGO.pdf', 'SERVICIO 70,000 KM MARCH PLATA SANTIAGO ARANGO.pdf', 'POLITICAS DE USO.jpg', ''),
(16, 'APC01TRA0016', 'NISSAN MARCH SENSE TM 2020.png', 'TARJETA DE CIRCULACION.jpg', 'FACTURA.jpg', 'IDENTIFICACION.jpg', 'PAGO DE TENENCIA 2022 MARCH ULZ189C.pdf', '', 'LICENCIA DE CONDUCIR.jpg', 'POLIZA SEGURO DE AUTO PEDRO AGUILAR.pdf', 'SERVICIO 30,000 KM MARCH PLATA PEDRO AGUILAR.pdf', 'POLITICAS DE USO.jpg', ''),
(17, 'INV01TRA0017', 'NISSAN MARCH ACTIVE TM AC 2018.png', 'TARJETA DE CIRCULACION NISSAN MARCH 2018 OSCAR ESPINOSA.pdf', 'NR FINANCE MEXICO FL53188 S.pdf', 'INE OSCAR ESPINOSA.pdf', 'FACTURA TENENCIA 2023 MARCH ACTIVE HATCHBACK BLANCO 2019 SILVIA BAUTISTA.pdf', 'VERIFICACION.jpg', 'LICENCIA DE CONDUCIR.jpg', 'POLIZA SEGURO DE AUTO  NISSAN MARCH 2018 OSCAR ESPINOSA 524567120.pdf', 'AUTOCOM NOVA SRVCON 80871.pdf', 'POLITICAS DE USO.jpg', ''),
(18, 'INV01TRA0018', 'NISSAN MARCH ACTIVE TM AC 2018.png', 'TARJETA DE CIRCULACION MARCH 2018 SILVIA BAUTISTA.pdf', 'NR FINANCE MEXICO FL53189 S.pdf', 'CREDENCIAL INE SILVIA BAUTISTA.pdf', 'FACTURA TENENCIA 2023 MARCH ACTIVE HATCHBACK BLANCO 2019 SILVIA BAUTISTA.pdf', 'VERIFICACIÓN MARCH SILVIA MARZO 2023.pdf', '', 'POLIZA SEGURO DE AUTO  NISSAN MARCH 2018 SILVIA BAUTISTA 524567658.pdf', 'AUTOCOM NOVA SAPI DE CV SRVCON 71839.pdf', 'POLITICAS DE USO.jpg', ''),
(19, 'VWL0TRA0019', NULL, 'TARJETA DE CIRCULACION.jpg', '', 'IDENTIFICACION.jpg', '', 'VERIFICACION.jpg', 'LICENCIA DE CONDUCIR.jpg', 'POLIZA SEGURO DE AUTO ARACELI JIMENEZ.pdf', 'EVIDENCIA DE SERVICIO MAYO 2022 101 000 KM.pdf', 'POLITICAS DE USO.jpg', ''),
(20, 'BHR0TRA0020', NULL, '', '', '', '', '', '', '', '', '', ''),
(21, 'INV0TRA0021', NULL, '', '', '', '', '', '', '', '', '', ''),
(22, 'INV01TRA0022', 'RENAULT KANGOO EXPRESS 2011.png', 'TARJETA DE CIRCULACION.jpg', 'Factura Renault Kangoo 2011.pdf', '', 'PAGO DE TENENCIA KANGOO 2011.pdf', 'CERTIFICADO DE VERIFICACIÓN RENAULT KANGOO 2011 MAYO 2023.pdf', '', 'PÓLIZA SEGURO DE AUTOS RENAULT KANGOO 2011 493529671.pdf', 'SERVICIO 180,000 KM RENAULT KANGOO.pdf', 'POLITICAS DE USO.jpg', ''),
(23, 'JAJ01TRA0023', 'NAVISTAR INTERNATIONAL CF600 2006.png', 'International 2006 Tarjeta de circulación.pdf', 'Acta Testimonial Camión International 2006.pdf', '', 'PAGO DE TENENCIAS.jpg', '', '', 'PÓLIZA SEGURO DE AUTOS INTERNATIONAL 2006 493529176.pdf', '', 'POLITICAS DE USO.jpg', ''),
(25, 'EVJ01TRA0024', 'VOLKSWAGEN GOL CL L4 1.6 2016.png', 'TARJETA DE CIRCULACIÓN.jpeg', '', 'IDENTIFICACIÓN Y LICENCIA PARA CONDUCIR GERMAN.pdf', 'PAGO DE TENENCIA GOL 2016.pdf', 'VERIFICACIÓN GOL 2016 ABRIL 2023.pdf', 'IDENTIFICACIÓN Y LICENCIA PARA CONDUCIR GERMAN.pdf', 'PÓLIZA 493530299.pdf', '', '', ''),
(26, 'INV0TRA0025', 'CHEVROLET GMM MATIZ PAQ B 2013.png', 'TARJETA DE CIRCULACIÓN MATIZ 2013 UMX647F.pdf', 'FACTURA.jpg', '', 'PAGO DE TENENCIA 2022 MATIZ 2013.pdf', 'VERIFICACIÓN MATIZ 2013 SEPTIEMBRE 2022.pdf', '', 'POLIZA SEGURO DE AUTOS  MATIZ G2 2013 493529788.pdf', '', '', ''),
(27, 'EVJ02TRA0026', 'VOLKSWAGEN GOL CL PM 2015.png', 'TARJETA DE CIRCULACION GOL 2015 CARLOS ADRIAN RUIZ.pdf', 'FACTURA GOL 2015 CARLOS ADRIAN RUIZ.pdf', 'INE.jpeg', 'PAGO DE TENENCIA 2022 S46AGI.pdf', 'VERIFICACIÓN GOL 2015 ADRIAN RUIZ FEBRERO 2023.pdf', 'LICENCIA DE CONDUCIR.jpeg', 'POLIZA SEGURO DE AUTO VOLKSWAGEN GOL 2015 500751862.pdf', '', '', ''),
(28, 'INV0TRA0027', NULL, '', '', '', '', '', '', '', '', '', ''),
(29, 'SOL01TRA0028', 'PEUGEOT PARTNER TEPEE 2017.jpg', 'TARJETA DE CIRCULACION PEUGEOT TEPEE 2017.pdf', 'FACTURA PEUGEOT TEPEE 2017.pdf', '', 'TENENCIA 2023 PEUGEOT 2017 JOSE JIMENEZ.pdf', 'CERTIFICADO DE VERIFICACIÓN PEUGEOT TEPEE 2017 FEBRERO 2023.pdf', '', 'POLIZA SEGURO DE AUTO PEUGEOT PARTNER 2017 523555035.pdf', '', '', ''),
(30, 'SOL01TRA0029', 'PEUGEOT 3008 2023.jpg', 'TARJETA DE CIRCULACION PEUGEOT 3008 2023 ARACELI JIMÉNEZ.pdf', 'FACTURA ORIGINAL PEUGEOT 3008 2023 ARACELI JIMÉNEZ.pdf', 'ARACELI JIMÉNEZ ECHEVERRÍA PASAPORTE.pdf', 'ALTA DE VEHÍCULO PEUGEOT 3008 2023 ARACELI JIMÉNEZ.pdf', 'VERIFICACIÓN PEUGEOT 3008 ARACELI JIMÉNEZ AGOSTO 2023.pdf', 'LICENCIA PARA CONDUCIR ARACELI JIMÉNEZ.pdf', 'POLIZA SEGURO DE AUTO PEUGEOT 3008 2023 HL42002374.pdf', '', 'POLITICAS DE USO ARACELI JIMÉNEZ PEUGEOT 3008.pdf', 'RESPONSIVA ARACELI JIMÉNEZ PEUGEOT 3008.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicios` int(11) NOT NULL,
  `no_cuenta` varchar(45) DEFAULT NULL,
  `detalles` varchar(100) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_renova` varchar(50) DEFAULT NULL,
  `centro_trabajo` int(11) NOT NULL,
  `costo_renova` double NOT NULL,
  `provedores_id` int(11) DEFAULT NULL,
  `extra` int(11) DEFAULT NULL,
  `otro` varchar(50) DEFAULT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `no_cuenta`, `detalles`, `fecha_inicio`, `fecha_renova`, `centro_trabajo`, `costo_renova`, `provedores_id`, `extra`, `otro`, `activo`) VALUES
(7732, '4422215943', 'enlace principal para telefonía', '0000-00-00', '4 de cada mes ', 1, 2251, 3, 1, '', 1),
(7733, '0200108885', 'Servicio de internet para el servidor de Innovet', '0000-00-00', '9 de cada mes', 1, 2870, 4, 23, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_autos`
--

CREATE TABLE `servicio_autos` (
  `id_servicio` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `ultimo_servicio` date NOT NULL,
  `autos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio_autos`
--

INSERT INTO `servicio_autos` (`id_servicio`, `km`, `ultimo_servicio`, `autos_id`) VALUES
(1, 50000, '2022-09-30', 2),
(2, 20000, '2022-09-08', 3),
(3, 6160, '2022-07-07', 5),
(4, 7781, '2022-06-23', 7),
(7, 10000, '2022-05-21', 8),
(8, 19107, '2022-09-01', 8),
(9, 8168, '2022-07-14', 9),
(10, 10000, '2022-07-06', 10),
(11, 6785, '2022-08-24', 11),
(12, 40000, '2022-12-15', 13),
(13, 12197, '2023-01-09', 5),
(16, 17232, '2022-12-28', 7),
(17, 24526, '2022-12-02', 10),
(18, 60000, '2022-04-20', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `tipo` varchar(225) DEFAULT NULL,
  `caracteristicas` text DEFAULT NULL,
  `estado` int(2) NOT NULL,
  `cantidad` double NOT NULL,
  `almacenado` int(2) NOT NULL,
  `id_propietario` int(11) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `cons` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_stock`, `codigo`, `tipo`, `caracteristicas`, `estado`, `cantidad`, `almacenado`, `id_propietario`, `personal_id`, `cons`, `activo`) VALUES
(1, 'INV01MOB0001', 'MESA', 'GRANDE PATAS METALICAS', 1, 1, 2, 1, 5, 1, 1),
(2, 'INV01MOB0002', 'MUEBLE', 'PEQUEÑO, NEGRO, DOS PUERTAS.', 1, 1, 2, 1, 58, 2, 1),
(3, 'INV01MOB0003', 'DISPENSADOR DE AGUA', 'MABE, MODELO EMBL01S ', 1, 1, 2, 1, 58, 3, 1),
(4, 'INV01MOB0004', 'PIZARRON', 'BLANCO, MARCA ESCO', 1, 1, 2, 1, 58, 4, 1),
(5, 'INV01MOB0005', 'ESCRITORIO', 'EN ¨L¨, DE MADERA, EMPOTRABLE ', 1, 1, 2, 1, 67, 5, 1),
(6, 'INV01MOB0006', 'SILLA', 'RESPALDO DE MALLA, RECARGADERAS P/BRAZOS', 1, 2, 2, 1, 67, 6, 1),
(7, 'INV01MOB0007', 'MESA', 'MADERA, PEQUEÑA, RECTANGULAR', 1, 1, 2, 1, 68, 7, 1),
(8, 'INV01MOB0008', 'VENTILADOR', 'TORRE ¨LASKO¨', 1, 1, 2, 1, 68, 8, 1),
(9, 'INV01MOB0009', 'ESCRITORIO', 'GRANDE CON GABETAS', 1, 1, 2, 1, 3, 9, 1),
(10, 'INV01MOB0010', 'ESCRITORIO', 'PEQUEÑOS CON 1 GABETA', 1, 4, 2, 1, 68, 10, 1),
(11, 'INV01MOB0011', 'SILLA', 'RESPALDO DE MALLA, RECARGADERAS PARA BRAZOS', 1, 5, 2, 1, 68, 11, 1),
(12, 'INV01MOB0012', 'TABLERO', 'TABLERO \"ESCO\" DE CORCHO', 1, 1, 2, 1, 68, 12, 1),
(13, 'INV01MOB0013', 'PIZARRON', '¨ESCO¨ BLANCO', 1, 1, 2, 1, 68, 13, 1),
(14, 'INV01MOB0014', 'MUEBLE', 'PEQUEÑO, NEGRO, DOS PUERTAS', 1, 1, 2, 1, 68, 14, 1),
(15, 'INV01MOB0015', 'MESA', 'MADERA, PATAS METALICAS', 2, 1, 2, 1, 68, 15, 1),
(16, 'INV01MOB0016', 'SILLA', 'SIN RECARGADERA PARA BRAZOS', 2, 3, 2, 1, 68, 16, 1),
(17, 'INV01MOB0017', 'PIZARRON', 'BLANCO', 2, 1, 2, 1, 58, 17, 1),
(18, 'INV01MOB0018', 'MESA', 'DE TRABAJO, GRANDE CON LAMPARA', 3, 2, 2, 1, 61, 18, 1),
(19, 'INV01MOB0019', 'ESTANTE', ' PARA HERRAMIENTA, PEQUEÑO,NEGRO', 2, 1, 2, 1, 61, 19, 1),
(20, 'INV01MOB0020', 'ESCRITORIO', 'PEQUEÑO SIN GABETAS', 2, 2, 2, 1, 61, 20, 1),
(21, 'INV01MOB0021', 'MESA', 'DE TRABAJO, PEQUEÑA', 2, 1, 2, 1, 61, 21, 1),
(22, 'INV01MOB0022', 'MESA', 'PEQUEÑA, PARA HERRAMIENTAS', 2, 2, 2, 1, 61, 22, 1),
(23, 'INV01MOB0023', 'ESTANTE', 'PARA HERRAMIENTA, GRANDE, DOS PUERTAS', 2, 1, 2, 1, 61, 23, 1),
(24, 'INV01MOB0024', 'GABETA', 'PEQUEÑA, PARA HERRAMIENTA Y MATERIALES', 3, 1, 2, 1, 61, 24, 1),
(25, 'INV01MOB0025', 'ANAQUEL', 'PARA ACRILICOS ', 2, 1, 2, 1, 61, 25, 1),
(26, 'INV01MOB0026', 'ANAQUEL', 'BASE PARA MATERIALES', 1, 1, 2, 1, 61, 26, 1),
(27, 'INV01MOB0027', 'ASPIRADORA', 'RIDGID', 3, 1, 2, 1, 61, 27, 1),
(28, 'INV01MOB0028', 'SILLA', '', 1, 6, 2, 1, 61, 28, 1),
(29, 'INV01MOB0029', 'RAKS', 'PEQUEÑOS', 1, 4, 2, 1, 61, 29, 1),
(30, 'INV01MOB0030', 'MESA', 'DE TRABAJO, GRANDE, PARA MATERIALES', 2, 1, 2, 1, 61, 30, 1),
(31, 'INV01MOB0031', 'VENTILADOR', 'CIRCULAR MYTECK', 2, 1, 2, 1, 61, 31, 1),
(32, 'INV01MOB0032', 'SILLA', 'SILLAS CON RESPALDO Y RECARGADERAS PARA BRAZOS', 1, 2, 2, 1, 63, 32, 1),
(33, 'INV01MOB0033', 'DISPENSADOR DE AGUA', 'MABE, MODELO EMBL01S', 1, 1, 2, 1, 63, 33, 1),
(34, 'INV01MOB0034', 'ARCHIVERO', 'NEGRO, PEQUEÑO', 3, 1, 2, 1, 63, 34, 1),
(35, 'INV01MOB0035', 'ESTANTE', '4 PISOS', 1, 1, 2, 1, 63, 35, 1),
(36, 'INV01MOB0036', 'ESCRITORIO', 'EN ¨L¨, CON CAJONES', 1, 1, 2, 1, 8, 36, 1),
(37, 'INV01MOB0037', 'SILLA', 'COLOR NEGRO', 1, 3, 2, 1, 4, 37, 1),
(38, 'INV01MOB0038', 'ESCRITORIO', 'EN ¨L¨', 1, 1, 2, 1, 4, 38, 1),
(39, 'INV01MOB0039', 'MUEBLE', 'PEQUEÑO CON ESTANTES Y CAJONES', 1, 1, 2, 1, 4, 39, 1),
(40, 'INV01MOB0040', 'MESA', 'CIRCULAR DE MADERA', 1, 1, 2, 1, 2, 40, 1),
(41, 'INV01MOB0041', 'SILLA', 'DE COLCHON, NARANJAS', 1, 4, 2, 1, 2, 41, 1),
(42, 'INV01MOB0042', 'SILLA', 'CON RUEDAS', 1, 1, 2, 1, 2, 42, 1),
(43, 'INV01MOB0043', 'ESCRITORIO', 'EN ¨L¨', 1, 1, 2, 1, 2, 43, 1),
(44, 'INV01MOB0044', 'ARCHIVERO', 'PEQUEÑO', 1, 1, 2, 1, 2, 44, 1),
(45, 'INV01MOB0045', 'ESTANTE', 'CON CAJONES', 1, 1, 2, 1, 2, 45, 1),
(46, 'INV01MOB0046', 'TABLERO', '¨ESCO¨ DE CORCHO', 2, 1, 2, 1, 2, 46, 1),
(47, 'INV01MOB0047', 'ESTANTE', 'PARA CARPETAS, DE MADERA', 1, 5, 2, 1, 59, 47, 1),
(48, 'INV01MOB0048', 'DISPENSADOR DE AGUA', 'MABE (AGUA CALIENTE Y FRIA)', 1, 1, 2, 1, 59, 48, 1),
(49, 'INV01MOB0049', 'MUEBLE', 'PEQUEÑO, DE DOS PUERTAS', 1, 1, 2, 1, 59, 49, 1),
(50, 'INV01MOB0050', 'TABLERO', '¨ESCO¨ DE CORCHO PARA AVISOS', 1, 2, 2, 1, 59, 50, 1),
(51, 'INV01MOB0051', 'PIZARRON', 'BLANCO, GRANDE', 1, 1, 2, 1, 59, 51, 1),
(52, 'INV01MOB0052', 'MESA', 'CIRCULAR BLANCA GRANDE DE VIDRIO', 1, 1, 2, 1, 59, 52, 1),
(53, 'INV01MOB0053', 'SILLA', 'DE DOS PATAS, PIEL, NEGRO', 1, 4, 2, 1, 59, 53, 1),
(54, 'INV01MOB0054', 'MUEBLE', 'DE MADERA', 1, 1, 2, 1, 62, 54, 1),
(55, 'INV01MOB0055', 'ESCRITORIO', 'DE MADERA , EN ¨L¨ CON CAJONES', 1, 1, 2, 1, 25, 55, 1),
(56, 'INV01MOB0056', 'PIZARRON', 'BLANCO, PEQUEÑO', 1, 1, 2, 1, 62, 56, 1),
(57, 'INV01MOB0057', 'PIZARRON', 'BLANCO, DE CRISTAL, PARA SALA DE JUNTAS', 1, 1, 2, 1, 62, 57, 1),
(58, 'INV01MOB0058', 'SILLA', 'COLCHON CAFE PARA SALA DE JUNTAS', 1, 8, 2, 1, 62, 58, 1),
(59, 'INV01MOB0059', 'MESA', 'DE MADERA, REDONDA', 2, 1, 2, 1, 62, 59, 1),
(60, 'INV01MOB0060', 'VENTILADOR', 'DE TORRE ¨LASKO¨', 1, 1, 2, 1, 62, 60, 1),
(61, 'INV01MOB0061', 'MUEBLE', 'NEGRO DE DOS PUERTAS', 1, 1, 2, 1, 62, 61, 1),
(62, 'INV01MOB0062', 'CAFETERA', 'NEGRA', 1, 1, 2, 1, 62, 62, 1),
(63, 'INV01MOB0063', 'MESA', 'CIRCULAR, PEQUEÑA DE VIDRIO', 1, 1, 2, 1, 62, 63, 1),
(64, 'INV01MOB0064', 'SILLA', 'METALICAS DE ESPERA', 1, 3, 2, 1, 62, 64, 1),
(65, 'INV01MOB0065', 'ARCHIVERO', 'AZUL, DE CUATRO GABETAS', 1, 1, 2, 1, 7, 65, 1),
(66, 'INV01MOB0066', 'ESCRITORIO', 'SIN CAJONES', 1, 1, 2, 1, 7, 66, 1),
(67, 'INV01MOB0067', 'MUEBLE', 'GRANDE COLOR CREMA', 1, 1, 2, 1, 7, 67, 1),
(68, 'INV01MOB0068', 'MUEBLE', 'CAFE, GRANDE, PARA MATERIALES', 1, 1, 2, 1, 7, 68, 1),
(69, 'INV01MOB0069', 'SILLA', 'CON RUEDAS', 1, 1, 2, 1, 7, 69, 1),
(70, 'INV01MOB0070', 'SILLA', 'CON RUEDAS', 1, 1, 2, 1, 25, 70, 1),
(71, 'INV01MOB0071', 'SILLA', 'CON RESPALDO DE MALLA Y RECARGADERAS PARA BRAZOS', 1, 5, 2, 1, 65, 71, 1),
(72, 'INV01MOB0072', 'ESCRITORIO', 'DE DOS PIEZAS, DE MADERA', 1, 1, 2, 1, 6, 72, 1),
(73, 'INV01MOB0073', 'ESTANTE', 'COLOR GRIS, METALICO, 4 PISOS', 1, 1, 2, 1, 65, 73, 1),
(74, 'INV01MOB0074', 'MUEBLE', 'PEQUEÑO, DOS CAJONES', 1, 1, 2, 1, 65, 74, 1),
(75, 'INV01MOB0075', 'PIZARRON', 'BLANCO, GRANDE ¨ESCO¨', 1, 1, 2, 1, 65, 75, 1),
(76, 'INV01MOB0076', 'TABLERO', 'DE CORCHO ¨ESCO¨', 1, 3, 2, 1, 65, 76, 1),
(77, 'INV01MOB0077', 'ESCRITORIO', 'GRANDE, DE CUATRO DIVISIONES, AZUL ', 1, 1, 2, 1, 65, 77, 1),
(78, 'INV01MOB0078', 'CASILLERO', 'CUATRO ESPACIOS, CAFE', 1, 1, 2, 1, 65, 78, 1),
(79, 'INV01MOB0079', 'SILLA', 'CON RESPALDO DE MALLA CON RECARGADERA PARA BRAZOS', 1, 1, 2, 1, 29, 79, 1),
(80, 'INV01MOB0080', 'SILLA', 'NEGRA SIN RUEDAS ', 4, 1, 2, 1, 66, 80, 1),
(81, 'INV01MOB0081', 'ESCRITORIO', 'PEQUEÑO SIN CAJONES', 1, 2, 2, 1, 29, 81, 1),
(82, 'INV01MOB0082', 'PATINES', 'AZULES', 1, 2, 2, 1, 7, 82, 1),
(83, 'INV01MOB0083', 'BASCULA', 'BRAUKER YP200', 3, 1, 2, 1, 7, 83, 1),
(84, 'INV01MOB0084', 'INDICADOR PARA BASCULA', 'RHINO', 1, 1, 2, 1, 7, 84, 1),
(85, 'INV01MOB0085', 'ESCRITORIO', 'PEQUEÑO, DE MADERA, EN ¨L¨', 1, 1, 2, 1, 62, 85, 1),
(86, 'INV01MOB0086', 'MESA', 'PEQUEÑA, BLANCA, PLEGABLE', 1, 2, 2, 1, 62, 86, 1),
(87, 'INV01MOB0087', 'VENTILADOR', 'TORRE ¨LASKO¨', 1, 1, 2, 1, 62, 87, 1),
(88, 'INV01MOB0088', 'ARCHIVERO', 'PEQUEÑO CUATRO GABETAS', 1, 1, 2, 1, 62, 88, 1),
(89, 'INV01MOB0089', 'ESTANTE', 'GRANDE METALICO', 1, 1, 2, 1, 62, 89, 1),
(90, 'INV01MOB0090', 'MESA', 'ESCRITORIO', 1, 1, 2, 1, 62, 90, 1),
(91, 'INV01MOB0091', 'SILLA', 'SILLAS CON RUEDAS', 1, 3, 2, 1, 62, 91, 1),
(92, 'INV01MOB0092', 'SILLA', 'COLCHON NARANJA', 1, 2, 2, 1, 62, 92, 1),
(93, 'INV01MOB0093', 'TABLERO', '¨ESKO¨ DE CORCHO', 1, 1, 2, 1, 62, 93, 1),
(94, 'INV01MOB0094', 'MESA', 'GRANDE, PLEGABLE, BLANCA', 1, 1, 2, 1, 62, 94, 1),
(95, 'INV01MOB0095', 'ESTANTE', 'MOVIL, PEQUEÑO', 1, 1, 2, 1, 62, 95, 1),
(96, 'INV01MOB0096', 'DIVISOR', 'DIVISOR DE ESPACIOS AZUL, GRANDES', 2, 2, 2, 1, 62, 96, 1),
(97, 'INV01MOB0097', 'ESTANTE', 'GRANDE, DE PLASTICO, NEGRO', 1, 1, 2, 1, 62, 97, 1),
(98, 'INV01MOB0098', 'SILLA', 'PLASTICO, BLANCAS', 1, 2, 2, 1, 62, 98, 1),
(99, 'INV01MOB0099', 'SILLA', 'COLCHON AZUL Y PATAS METALICAS', 1, 4, 2, 1, 62, 99, 1),
(100, 'INV01MOB0100', 'MESA', 'PLEGABLE, BLANCA, DE COMEDOR', 2, 1, 2, 1, 62, 100, 1),
(101, 'INV01MOB0101', 'PIZARRON', 'CON TABLERO DE METAL', 2, 1, 2, 1, 62, 101, 1),
(102, 'INV01MOB0102', 'MICROONDAS', 'MICROONDAS', 1, 3, 2, 1, 62, 102, 1),
(103, 'INV01MOB0103', 'CAFETERA', 'GRIS, OSTER', 1, 1, 2, 1, 62, 103, 1),
(104, 'INV01MOB0104', 'MESA', 'PEQUEÑA, METALICA, PARA COMEDOR', 2, 1, 2, 1, 62, 104, 1),
(105, 'INV01MOB0105', 'CASILLERO', 'METALICOS, GRISES', 2, 13, 2, 1, 62, 105, 1),
(106, 'INV01MOB0106', 'PORTAGARRAFON', 'METALICO, BLANCO', 2, 1, 2, 1, 62, 106, 1),
(107, 'INV01MOB0107', 'MUEBLE', 'COLOR CREMA, PEQUEÑO, DOS PUERTAS', 2, 1, 2, 1, 62, 107, 1),
(108, 'INV01MOB0108', 'PORTAGARRAFON', 'PLASTICO, AZULES, 5 ESPACIOS', 2, 2, 2, 1, 62, 108, 1),
(109, 'INV01MOB0109', 'MESA', 'GRANDE, METALICA', 2, 2, 2, 1, 62, 109, 1),
(110, 'INV01MOB0110', 'SILLA', 'PLASTICO, BLANCAS', 1, 10, 2, 1, 62, 110, 1),
(111, 'INV01MOB0111', 'MICROONDAS', 'MICROONDAS', 1, 2, 2, 1, 62, 111, 1),
(112, 'INV01MOB0112', 'PORTAGARRAFON', 'BLANCO, METALICO', 4, 1, 2, 1, 62, 112, 1),
(113, 'INV01MOB0113', 'TARJA', 'CON CAJONES, DE MADERA', 2, 1, 2, 1, 62, 113, 1),
(114, 'INV01MOB0114', 'REFRIGERADOR', 'LG, BLANCO', 2, 1, 2, 1, 62, 114, 1),
(115, 'INV01MOB0115', 'ESTANTE', 'DE MADERA', 1, 4, 2, 1, 62, 115, 1),
(116, 'INV01MOB0116', 'ESCRITORIO', 'EN ¨L¨, DE MADERA', 1, 1, 2, 1, 62, 116, 1),
(117, 'INV01MOB0117', 'PIZARRON', 'BLANCO, GRANDE', 1, 1, 2, 1, 62, 117, 1),
(118, 'INV01MOB0118', 'VENTILADOR', 'CIRCULAR MYTECK', 1, 1, 2, 1, 65, 118, 1),
(119, 'INV01MOB0119', 'PIZARRON', 'CON SOPORTE METALICO', 2, 1, 2, 1, 62, 119, 1),
(120, 'INV01MOB0120', 'ESTANTE', 'METALICO, PARA MATERIALES', 1, 1, 2, 1, 58, 120, 1),
(121, 'INV01MOB0121', 'CONTENEDORES', 'PLASTICOS, CUADRADOS, PARA BASURA', 1, 4, 2, 1, 58, 121, 1),
(122, 'INV01MOB0122', 'MESA', 'BLANCA, PATAS DE METAL', 1, 2, 2, 1, 58, 122, 1),
(123, 'INV01MOB0123', 'MESA', 'DE TRABAJO, CON LAMPARA', 1, 1, 2, 1, 58, 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `departamento` int(11) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `email`, `departamento`, `tipo`, `password`) VALUES
(2063, 'Diego Camacho Martinez', 'camachoorlando0@gmail.com', 10, 1, 'qwerty'),
(2064, 'CARLOS OSWALDO GONZALEZ AGUILAR ', 'o.gonzalez@termoformadosyblister.com', 8, 2, 'Control2022'),
(2066, 'Eloisa Villafuerte Lopez', 'e.villafuerte@termoformadosyblister.com', 8, 4, 'c0nTr0l'),
(2067, 'Dirección', 'direc@example.com', 1, 3, 'zxcvb'),
(2068, 'Informática y comunicaciones', 'soporte@ab-forti.com', 10, 1, '2541alfa'),
(2069, 'Denise Minjarez', 'administracion@ab-forti.com', 8, 2, 'Control2023');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_autos`),
  ADD KEY `fk_autos_personal1_idx` (`personal_id_personal`),
  ADD KEY `autos_propietarios` (`id_propietario`);

--
-- Indices de la tabla `celular`
--
ALTER TABLE `celular`
  ADD PRIMARY KEY (`id_celular`),
  ADD KEY `celular_personal` (`personal_id`),
  ADD KEY `celular_propietarios` (`id_propietario`);

--
-- Indices de la tabla `computadora`
--
ALTER TABLE `computadora`
  ADD PRIMARY KEY (`id_compu`),
  ADD KEY `fk_computadora_personal1_idx` (`personal_id`),
  ADD KEY `computadoras_propietarios` (`id_propietario`);

--
-- Indices de la tabla `computadora_has_licencias`
--
ALTER TABLE `computadora_has_licencias`
  ADD PRIMARY KEY (`id_relacion`),
  ADD KEY `compi_has_licen` (`computadora_id_compu`),
  ADD KEY `licencia_has_compu` (`licencias_id_licencias`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_depa`),
  ADD KEY `empresa_departamento` (`empresa_id_empresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `kilometraje`
--
ALTER TABLE `kilometraje`
  ADD PRIMARY KEY (`id_km`),
  ADD KEY `autos_kilometraje` (`autos_id`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id_licencias`),
  ADD KEY `fk_licencias_provedores1_idx` (`provedores_id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`id_pass`);

--
-- Indices de la tabla `perifericos`
--
ALTER TABLE `perifericos`
  ADD PRIMARY KEY (`id_perifericos`),
  ADD KEY `perifericos_personal` (`personal_id`),
  ADD KEY `perifericos_propietarios` (`id_propietario`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `personal_departamentos` (`id_depar`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id_propietario`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`id_provedores`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicios`),
  ADD KEY `fk_servicios_provedores1_idx` (`provedores_id`);

--
-- Indices de la tabla `servicio_autos`
--
ALTER TABLE `servicio_autos`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `autos_servicio` (`autos_id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `stock_propietario` (`id_propietario`),
  ADD KEY `stock_personal` (`personal_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `usuarios_departamentos` (`departamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_autos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `celular`
--
ALTER TABLE `celular`
  MODIFY `id_celular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `computadora`
--
ALTER TABLE `computadora`
  MODIFY `id_compu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `computadora_has_licencias`
--
ALTER TABLE `computadora_has_licencias`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_depa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `kilometraje`
--
ALTER TABLE `kilometraje`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id_licencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT de la tabla `pass`
--
ALTER TABLE `pass`
  MODIFY `id_pass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `perifericos`
--
ALTER TABLE `perifericos`
  MODIFY `id_perifericos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8969;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id_propietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `provedores`
--
ALTER TABLE `provedores`
  MODIFY `id_provedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7734;

--
-- AUTO_INCREMENT de la tabla `servicio_autos`
--
ALTER TABLE `servicio_autos`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2070;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_propietarios` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_autos_personal1` FOREIGN KEY (`personal_id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `celular`
--
ALTER TABLE `celular`
  ADD CONSTRAINT `celular_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id_personal`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `celular_propietarios` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `computadora`
--
ALTER TABLE `computadora`
  ADD CONSTRAINT `computadoras_propietarios` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_computadora_personal1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id_personal`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `computadora_has_licencias`
--
ALTER TABLE `computadora_has_licencias`
  ADD CONSTRAINT `compu_has_licencia` FOREIGN KEY (`computadora_id_compu`) REFERENCES `computadora` (`id_compu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `licencia_has_compu` FOREIGN KEY (`licencias_id_licencias`) REFERENCES `licencias` (`id_licencias`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `empresa_departamento` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `kilometraje`
--
ALTER TABLE `kilometraje`
  ADD CONSTRAINT `autos_kilometraje` FOREIGN KEY (`autos_id`) REFERENCES `autos` (`id_autos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `fk_licencias_provedores1` FOREIGN KEY (`provedores_id`) REFERENCES `provedores` (`id_provedores`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `perifericos`
--
ALTER TABLE `perifericos`
  ADD CONSTRAINT `perifericos_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id_personal`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `perifericos_propietarios` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_departamentos` FOREIGN KEY (`id_depar`) REFERENCES `departamentos` (`id_depa`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicos_pro` FOREIGN KEY (`provedores_id`) REFERENCES `provedores` (`id_provedores`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_autos`
--
ALTER TABLE `servicio_autos`
  ADD CONSTRAINT `autos_servicio` FOREIGN KEY (`autos_id`) REFERENCES `autos` (`id_autos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id_personal`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_propietario` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_departamentos` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id_depa`) ON DELETE SET NULL ON UPDATE CASCADE;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
