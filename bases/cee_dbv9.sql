-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2024 a las 22:31:53
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
-- Base de datos: `cee_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`) VALUES
(1, 'tiempoip'),
(2, 'actividad'),
(3, 'examen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acti_tipes`
--

CREATE TABLE `acti_tipes` (
  `idacti_tipes` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `acti_tipes`
--

INSERT INTO `acti_tipes` (`idacti_tipes`, `tipo`) VALUES
(1, 'Tema'),
(2, 'PDF'),
(3, 'Link'),
(4, 'Video YouTube'),
(5, 'Archivo de Audio'),
(6, 'Archivo de Video'),
(7, 'Embed'),
(8, 'Examen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `name`, `apellidos`, `admin_user`, `admin_pass`, `role_id`) VALUES
(1, 'admin', 'el admin', 'admin@gmail.com', '1234', 1),
(11, 'Leonardo', 'Lima P.', 'leolima611201@gmail.com', 'hola123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `course_tbl`
--

INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `cou_created`) VALUES
(25, 'BSHRM', '2019-11-27 09:26:08'),
(26, 'BSIT', '2019-11-25 13:22:42'),
(67, 'INFORMATICA 2', '2024-10-03 06:33:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) NOT NULL,
  `exmne_fullname` varchar(1000) NOT NULL,
  `exmne_course` varchar(1000) NOT NULL,
  `exmne_gender` varchar(1000) NOT NULL,
  `exmne_birthdate` varchar(1000) NOT NULL,
  `exmne_year_level` varchar(1000) NOT NULL,
  `exmne_email` varchar(1000) NOT NULL,
  `exmne_password` varchar(1000) NOT NULL,
  `exmne_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `examinee_tbl`
--

INSERT INTO `examinee_tbl` (`exmne_id`, `exmne_fullname`, `exmne_course`, `exmne_gender`, `exmne_birthdate`, `exmne_year_level`, `exmne_email`, `exmne_password`, `exmne_status`) VALUES
(4, 'Rogz Nunezsss', '26', 'male', '2019-11-15', 'third year', 'rogz.nunez2013@gmail.com', 'rogz', 'active'),
(10, 'Kevin Vite', '67', 'Masculino', '2024-09-20', 'Primer Año', 'kevin@gmail.com', '1234', 'active'),
(11, 'LEONARDO LIMA POMPOSO', '67', 'Masculino', '2024-09-29', 'Primer Año', 'leonardo_lp@tesch.edu.mx', 'hOLA123', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `tipea` varchar(2) DEFAULT NULL,
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `tipea`, `exans_created`) VALUES
(1, 10, 12, 9, '1', 'new', 'no', '2024-11-28 02:11:22'),
(2, 10, 12, 10, '8', 'new', 'no', '2024-11-28 02:11:22'),
(3, 10, 12, 14, '11', 'new', 'no', '2024-11-28 02:11:22'),
(4, 10, 12, 15, '14', 'new', 'no', '2024-11-28 02:11:22'),
(5, 10, 12, 16, '17', 'new', 'si', '2024-11-28 02:11:22'),
(6, 10, 12, 17, '24', 'new', 'no', '2024-11-28 02:11:22'),
(7, 10, 12, 18, '25', 'new', 'si', '2024-11-28 02:11:22'),
(8, 10, 12, 19, '31', 'new', 'no', '2024-11-28 02:11:22'),
(9, 10, 12, 20, '35', 'new', 'no', '2024-11-28 02:11:22'),
(10, 10, 12, 21, '39', 'new', 'no', '2024-11-28 02:11:22'),
(11, 10, 12, 22, '44', 'new', 'no', '2024-11-28 02:11:22'),
(12, 10, 12, 24, '48', 'new', 'no', '2024-11-28 02:11:22'),
(13, 10, 12, 25, '52', 'new', 'no', '2024-11-28 02:11:22'),
(14, 10, 12, 38, 'dsa', 'new', 'no', '2024-11-28 21:29:30'),
(15, 10, 12, 40, 'ksadhlksadjalskd', 'new', 'si', '2024-11-28 21:29:30'),
(16, 10, 12, 41, '75', 'new', 'si', '2024-11-28 02:11:22'),
(17, 10, 12, 52, '106', 'new', 'si', '2024-11-28 02:11:22'),
(18, 10, 12, 52, '108', 'new', 'si', '2024-11-28 02:11:22'),
(19, 10, 12, 52, '111', 'new', 'si', '2024-11-28 02:11:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
(1, 10, 12, 'used');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `Titulo` varchar(1000) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `Imagen` varchar(1000) NOT NULL,
  `Video` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active',
  `id_tipeq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `Titulo`, `Descripcion`, `Imagen`, `Video`, `exam_status`, `id_tipeq`) VALUES
(9, 12, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', '', '', '', '', 'active', 1),
(10, 12, 'What is part of a database that holds only one type of information?', '', '', '', '', 'active', 1),
(14, 12, 'OS computer abbreviation usually means ?', '', '', '', '', 'active', 1),
(15, 12, 'Who developed Yahoo?', '', '', '', '', 'active', 1),
(16, 12, 'DB computer abbreviation usually means ?', '', '', '', '', 'active', 1),
(17, 12, '.INI extension refers usually to what kind of file?', '', '', '', '', 'active', 1),
(18, 12, 'What does the term PLC stand for?', '', '', '', '', 'active', 1),
(19, 12, 'What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.', '', '', '', '', 'active', 1),
(20, 12, 'After the first photons of light are produced, which process is responsible for amplification of the light?', '', '', '', '', 'active', 1),
(21, 12, '.TMP extension refers usually to what kind of file?', '', '', '', '', 'active', 1),
(22, 12, 'What do we call a collection of two or more computers that are located within a limited distance of each other and that are connected to each other directly or indirectly?', '', '', '', '', 'active', 1),
(24, 12, '	 In what year was the \"@\" chosen for its use in e-mail addresses?', '', '', '', '', 'active', 1),
(25, 12, 'What are three types of lasers?', '', '', '', '', 'active', 1),
(38, 12, 'hola?', '', '', '', '', 'active', 2),
(40, 12, 'adios?', '', '', '', '', 'active', 3),
(41, 12, 'gestor sql gratis', '', '', '', '', 'active', 4),
(52, 12, 'gestores', '', '', '', '', 'active', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_tipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_description`, `ex_created`, `id_tipe`) VALUES
(12, 67, 'BASE DE DATOS', '100', 'Responder las preguntas con los conocimientos aprendidos', '2024-10-29 21:05:49', 3),
(24, 67, 'ATAQUES DE PHISING', '10', 'Demostrar los conocimientos aprendidos en la unidad 1 de seguridad informática', '2024-10-03 23:36:44', 2),
(25, 67, 'Diagnostico', '60', 'Primer examen de revision ', '2024-10-03 23:02:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_tipe`
--

CREATE TABLE `exam_tipe` (
  `id_tipe` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `exam_tipe`
--

INSERT INTO `exam_tipe` (`id_tipe`, `tipo`) VALUES
(1, 'Diagnostico'),
(2, 'Topic'),
(3, 'Final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `exmne_id`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
(4, 6, 'Glenn Duerme', 'Gwapa kay Miss Pam', 'December 05, 2019'),
(5, 6, 'Anonymous', 'Lageh, idol na nako!', 'December 05, 2019'),
(6, 4, 'Rogz Nunezsss', 'Yes', 'December 08, 2019'),
(9, 8, 'Anonymous', 'dfsdf', 'January 05, 2020'),
(10, 10, 'Kevin Vite', 'hola', 'September 25, 2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_answers`
--

CREATE TABLE `question_answers` (
  `id_qAns` int(11) NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `tipe` varchar(2) DEFAULT NULL,
  `eqt_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `question_answers`
--

INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES
(1, '1990s', 'no', 9),
(2, '1789s', 'si', 9),
(3, '1872s', 'no', 9),
(4, '1999s', 'no', 9),
(5, 'Report', 'si', 10),
(6, 'Field', 'no', 10),
(7, 'Record', 'no', 10),
(8, 'File', 'no', 10),
(9, 'Order of Significanse', 'si', 14),
(10, 'Open Software', 'no', 14),
(11, 'Operating System', 'no', 14),
(12, 'Optical Sensor', 'no', 14),
(13, 'Report', 'si', 15),
(14, 'Field', 'no', 15),
(15, 'Record', 'no', 15),
(16, 'File', 'no', 15),
(17, 'Report', 'si', 16),
(18, 'Field', 'no', 16),
(19, 'Record', 'no', 16),
(20, 'File', 'no', 16),
(21, 'Report', 'si', 17),
(22, 'Field', 'no', 17),
(23, 'Record', 'no', 17),
(24, 'File', 'no', 17),
(25, 'Report', 'si', 18),
(26, 'Field', 'no', 18),
(27, 'Record', 'no', 18),
(28, 'File', 'no', 18),
(29, 'Report', 'si', 19),
(30, 'Field', 'no', 19),
(31, 'Record', 'no', 19),
(32, 'File', 'no', 19),
(33, 'Report', 'si', 20),
(34, 'Field', 'no', 20),
(35, 'Record', 'no', 20),
(36, 'File', 'no', 20),
(37, 'Report', 'si', 21),
(38, 'Field', 'no', 21),
(39, 'Record', 'no', 21),
(40, 'File', 'no', 21),
(41, 'Report', 'si', 22),
(42, 'Field', 'no', 22),
(43, 'Record', 'no', 22),
(44, 'File', 'no', 22),
(45, 'Report', 'si', 24),
(46, 'Field', 'no', 24),
(47, 'Record', 'no', 24),
(48, 'File', 'no', 24),
(49, 'Report', 'si', 25),
(50, 'Field', 'no', 25),
(51, 'Record', 'no', 25),
(52, 'File', 'no', 25),
(69, 'holass', 'si', 38),
(71, 'hasta luego, holaaaaaaaaaaaaaaaaa', 'si', 40),
(72, 'mysql linux', 'no', 41),
(73, 'ORACLE sql', 'no', 41),
(74, 'mongodb', 'no', 41),
(75, 'MARIADB linux', 'si', 41),
(106, 'mysql', 'si', 52),
(107, 'mario', 'no', 52),
(108, 'MongoDB', 'si', 52),
(109, 'ibm', 'no', 52),
(110, 'hp', 'no', 52),
(111, 'Oracle sql', 'si', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_topic`
--

CREATE TABLE `rel_topic` (
  `idrel_topic` int(11) NOT NULL,
  `idtopic` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `rel_topic`
--

INSERT INTO `rel_topic` (`idrel_topic`, `idtopic`, `exmne_id`, `cou_id`, `fecha`) VALUES
(4, 20, 10, 67, '2024-10-10 01:41:49'),
(7, 24, 10, 67, '2024-10-17 20:18:19'),
(13, 29, 10, 67, '2024-10-27 19:56:40'),
(15, 49, 10, 67, '2024-10-29 20:06:58'),
(21, 41, 4, 26, '2024-10-30 21:11:00'),
(22, 42, 4, 26, '2024-10-30 21:11:10'),
(23, 47, 10, 67, '2024-11-27 02:20:11'),
(27, 50, 10, 67, '2024-11-28 02:11:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `description`) VALUES
(1, 'Administrador', 'Puede administrar los datos de los usuarios y secciones de la plataforma.'),
(2, 'Experto', 'Puede administrar grupos y alumnos, exámenes y prácticas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip`
--

CREATE TABLE `tip` (
  `id` int(11) NOT NULL,
  `actividad_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `tiempo_total` int(11) NOT NULL,
  `ultima_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `tip`
--

INSERT INTO `tip` (`id`, `actividad_id`, `exmne_id`, `tiempo_total`, `ultima_entrada`) VALUES
(35, 1, 10, 2, '2024-09-28 21:45:48'),
(36, 1, 10, 0, '2024-09-28 21:47:53'),
(37, 3, 10, 2, '2024-09-28 21:50:14'),
(38, 1, 10, 1, '2024-09-29 19:21:30'),
(39, 3, 10, 2, '2024-09-29 19:23:23'),
(40, 1, 10, 3, '2024-09-29 19:26:49'),
(41, 1, 10, 1, '2024-10-03 22:17:50'),
(42, 1, 10, 57, '2024-10-06 22:08:18'),
(43, 1, 10, 1, '2024-10-06 22:09:12'),
(44, 1, 10, 5, '2024-10-06 22:13:46'),
(45, 1, 10, 7, '2024-10-06 22:20:17'),
(46, 1, 10, 197, '2024-10-07 01:43:45'),
(47, 1, 10, 14, '2024-10-07 01:57:34'),
(48, 1, 10, 1, '2024-10-07 01:58:11'),
(49, 1, 10, 1, '2024-10-07 01:59:49'),
(50, 1, 10, 10, '2024-10-07 02:09:58'),
(51, 1, 10, 1, '2024-10-07 02:11:10'),
(52, 1, 10, 1, '2024-10-07 02:12:38'),
(53, 1, 10, 2, '2024-10-07 02:14:32'),
(54, 1, 10, 3, '2024-10-07 02:18:54'),
(55, 1, 10, 1, '2024-10-07 02:20:00'),
(56, 1, 10, 13, '2024-10-07 02:37:38'),
(57, 1, 10, 81, '2024-10-07 06:12:36'),
(58, 2, 10, 1, '2024-10-07 06:20:51'),
(59, 2, 10, 1, '2024-10-07 06:21:33'),
(60, 2, 10, 1, '2024-10-07 06:22:33'),
(61, 2, 10, 2, '2024-10-07 06:25:42'),
(62, 2, 10, 1, '2024-10-07 06:26:25'),
(63, 2, 10, 1, '2024-10-07 06:27:20'),
(64, 2, 10, 1, '2024-10-07 06:28:31'),
(65, 2, 10, 2, '2024-10-07 06:30:45'),
(66, 2, 10, 3, '2024-10-07 06:33:59'),
(67, 2, 10, 3, '2024-10-07 06:36:41'),
(68, 2, 10, 1, '2024-10-07 06:37:18'),
(69, 2, 10, 2, '2024-10-07 06:39:52'),
(70, 2, 10, 1, '2024-10-07 06:40:31'),
(71, 2, 10, 2, '2024-10-07 06:42:48'),
(72, 2, 10, 2, '2024-10-07 06:45:25'),
(73, 2, 10, 1, '2024-10-07 06:46:19'),
(74, 2, 10, 1, '2024-10-07 06:47:12'),
(75, 1, 10, 2, '2024-10-09 19:30:45'),
(76, 2, 10, 6, '2024-10-09 19:36:47'),
(77, 2, 10, 1, '2024-10-09 19:37:39'),
(78, 2, 10, 6, '2024-10-09 19:43:14'),
(79, 2, 10, 1, '2024-10-09 19:44:52'),
(80, 2, 10, 3, '2024-10-09 19:47:40'),
(81, 2, 10, 2, '2024-10-09 19:49:27'),
(82, 2, 10, 1, '2024-10-09 19:50:40'),
(83, 2, 10, 1, '2024-10-09 19:52:54'),
(84, 2, 10, 4, '2024-10-09 19:57:22'),
(85, 2, 10, 3, '2024-10-09 20:00:00'),
(86, 2, 10, 4, '2024-10-09 20:04:22'),
(87, 2, 10, 2, '2024-10-09 20:05:53'),
(88, 2, 10, 71, '2024-10-09 21:17:32'),
(89, 2, 10, 14, '2024-10-09 21:32:04'),
(90, 2, 10, 1, '2024-10-09 21:32:56'),
(91, 1, 10, 2, '2024-10-09 21:35:26'),
(92, 2, 10, 2, '2024-10-09 21:37:49'),
(93, 2, 10, 1, '2024-10-09 21:38:27'),
(94, 2, 10, 1, '2024-10-09 21:39:02'),
(95, 2, 10, 1, '2024-10-09 21:40:08'),
(96, 1, 10, 77, '2024-10-09 22:57:42'),
(97, 2, 10, 1, '2024-10-09 22:59:26'),
(98, 2, 10, 3, '2024-10-09 23:02:09'),
(99, 2, 10, 1, '2024-10-09 23:03:16'),
(100, 2, 10, 1, '2024-10-09 23:04:53'),
(101, 2, 10, 1, '2024-10-09 23:06:33'),
(102, 2, 10, 2, '2024-10-09 23:09:53'),
(103, 2, 10, 1, '2024-10-09 23:10:24'),
(104, 2, 10, 11, '2024-10-09 23:21:14'),
(105, 2, 10, 1, '2024-10-09 23:22:43'),
(106, 2, 10, 2, '2024-10-09 23:24:55'),
(107, 2, 10, 50, '2024-10-10 00:14:37'),
(108, 2, 10, 82, '2024-10-10 01:37:19'),
(109, 2, 10, 2, '2024-10-10 01:39:39'),
(110, 2, 10, 1, '2024-10-10 01:40:12'),
(111, 2, 10, 1, '2024-10-10 01:41:44'),
(112, 2, 10, 1, '2024-10-10 01:42:54'),
(113, 2, 10, 1, '2024-10-10 01:44:24'),
(114, 3, 10, 27, '2024-10-12 22:57:29'),
(115, 1, 10, 1, '2024-10-12 23:01:01'),
(116, 1, 4, 3, '2024-10-12 23:03:57'),
(117, 2, 4, 1, '2024-10-17 20:22:50'),
(118, 2, 4, 1, '2024-10-17 20:24:22'),
(119, 1, 10, 1, '2024-10-17 20:32:01'),
(120, 2, 10, 17, '2024-10-19 23:53:30'),
(121, 2, 10, 1, '2024-10-19 23:54:16'),
(122, 2, 10, 1, '2024-10-19 23:56:27'),
(123, 2, 10, 2, '2024-10-21 22:33:55'),
(124, 1, 10, 1, '2024-10-22 21:13:33'),
(125, 1, 10, 6, '2024-10-23 21:20:55'),
(126, 2, 10, 249, '2024-10-24 01:29:35'),
(127, 1, 10, 3, '2024-10-26 16:51:21'),
(128, 1, 10, 269, '2024-10-26 21:20:13'),
(129, 1, 10, 19, '2024-10-26 21:39:48'),
(130, 1, 10, 3, '2024-10-26 21:43:16'),
(131, 2, 10, 1, '2024-10-26 21:44:13'),
(132, 2, 10, 280, '2024-10-27 02:23:54'),
(133, 1, 10, 2, '2024-10-27 02:26:19'),
(134, 2, 10, 1, '2024-10-27 02:26:55'),
(135, 2, 10, 1, '2024-10-27 02:27:44'),
(136, 1, 10, 2, '2024-10-27 02:33:55'),
(137, 1, 10, 20, '2024-10-27 02:53:57'),
(138, 2, 10, 6, '2024-10-27 02:59:53'),
(139, 2, 10, 1, '2024-10-27 03:01:48'),
(140, 2, 10, 12, '2024-10-27 03:14:15'),
(141, 2, 10, 3, '2024-10-27 03:17:29'),
(142, 2, 10, 4, '2024-10-27 03:21:34'),
(143, 1, 10, 2, '2024-10-27 03:23:05'),
(144, 1, 10, 2, '2024-10-27 03:25:32'),
(145, 2, 10, 2, '2024-10-27 03:27:49'),
(146, 1, 10, 12, '2024-10-27 03:41:37'),
(147, 2, 10, 2, '2024-10-27 03:43:26'),
(148, 2, 10, 3, '2024-10-27 03:46:38'),
(149, 2, 10, 1, '2024-10-27 03:47:24'),
(150, 2, 10, 1, '2024-10-27 03:48:54'),
(151, 2, 10, 1, '2024-10-27 03:50:28'),
(152, 2, 10, 2, '2024-10-27 03:52:05'),
(153, 2, 10, 4, '2024-10-27 03:56:14'),
(154, 2, 10, 4, '2024-10-27 04:00:08'),
(155, 2, 10, 3, '2024-10-27 04:03:09'),
(156, 2, 10, 2, '2024-10-27 04:04:58'),
(157, 2, 10, 1, '2024-10-27 04:05:33'),
(158, 2, 10, 1, '2024-10-27 04:06:48'),
(159, 2, 10, 1, '2024-10-27 04:07:38'),
(160, 2, 10, 1, '2024-10-27 04:08:49'),
(161, 1, 10, 6, '2024-10-27 19:56:36'),
(162, 1, 10, 3, '2024-10-27 19:59:30'),
(163, 1, 10, 2, '2024-10-27 20:04:34'),
(164, 1, 10, 1, '2024-10-27 20:06:01'),
(165, 1, 10, 6, '2024-10-27 20:12:07'),
(166, 1, 10, 2, '2024-10-27 20:13:39'),
(167, 1, 10, 3, '2024-10-27 20:17:11'),
(168, 1, 10, 10, '2024-10-27 20:27:00'),
(169, 1, 10, 4, '2024-10-27 20:31:07'),
(170, 1, 10, 4, '2024-10-27 20:35:13'),
(171, 1, 10, 62, '2024-10-27 21:36:52'),
(172, 1, 10, 2, '2024-10-27 21:39:27'),
(173, 1, 10, 3, '2024-10-27 21:42:14'),
(174, 1, 10, 1, '2024-10-27 21:42:51'),
(175, 1, 10, 1, '2024-10-27 21:44:19'),
(176, 1, 10, 1, '2024-10-27 21:45:13'),
(177, 1, 10, 2, '2024-10-27 21:49:19'),
(178, 1, 10, 7, '2024-10-27 21:55:56'),
(179, 1, 10, 19, '2024-10-27 22:15:17'),
(180, 1, 10, 3, '2024-10-27 22:20:28'),
(181, 1, 10, 237, '2024-10-28 02:17:30'),
(182, 1, 10, 1, '2024-10-29 19:36:20'),
(183, 1, 10, 5, '2024-10-29 19:40:58'),
(184, 1, 10, 1, '2024-10-29 19:42:22'),
(185, 1, 10, 1, '2024-10-29 19:43:35'),
(186, 1, 10, 3, '2024-10-29 19:47:03'),
(187, 2, 10, 2, '2024-10-29 19:49:14'),
(188, 1, 10, 8, '2024-10-29 19:57:42'),
(189, 2, 10, 5, '2024-10-29 20:03:15'),
(190, 2, 10, 19, '2024-10-29 20:27:01'),
(191, 2, 10, 21, '2024-10-29 20:48:31'),
(192, 1, 10, 6, '2024-10-29 20:57:00'),
(193, 3, 10, 1, '2024-10-29 20:58:04'),
(194, 1, 10, 7, '2024-10-29 21:05:14'),
(195, 1, 10, 5, '2024-10-29 21:10:03'),
(196, 2, 10, 3, '2024-10-29 21:13:15'),
(197, 1, 10, 21, '2024-10-29 21:34:23'),
(198, 3, 10, 8, '2024-10-29 21:43:01'),
(199, 3, 10, 7, '2024-10-29 21:49:57'),
(200, 3, 10, 1, '2024-10-29 21:51:14'),
(201, 3, 10, 1, '2024-10-29 21:51:54'),
(202, 3, 10, 1, '2024-10-29 21:52:58'),
(203, 3, 10, 1, '2024-10-29 21:54:02'),
(204, 3, 10, 1, '2024-10-29 21:55:23'),
(205, 3, 10, 1, '2024-10-29 21:56:31'),
(206, 3, 10, 102, '2024-10-29 23:38:29'),
(207, 2, 10, 1, '2024-10-29 23:49:13'),
(208, 2, 10, 3, '2024-10-29 23:51:54'),
(209, 2, 10, 4, '2024-10-29 23:56:03'),
(210, 2, 10, 1, '2024-10-29 23:58:09'),
(211, 2, 10, 2, '2024-10-30 00:00:09'),
(212, 2, 10, 5, '2024-10-30 00:05:34'),
(213, 2, 10, 21, '2024-10-30 00:27:01'),
(214, 1, 10, 3, '2024-10-30 00:30:19'),
(215, 1, 10, 24, '2024-10-30 00:54:38'),
(216, 3, 10, 2, '2024-10-30 00:57:50'),
(217, 3, 10, 2, '2024-10-30 00:59:36'),
(218, 3, 10, 3, '2024-10-30 01:02:51'),
(219, 3, 10, 1, '2024-10-30 01:04:15'),
(220, 3, 10, 1, '2024-10-30 01:04:59'),
(221, 3, 10, 2, '2024-10-30 01:07:12'),
(222, 3, 10, 2, '2024-10-30 01:09:39'),
(223, 3, 10, 4, '2024-10-30 01:13:48'),
(224, 3, 10, 1, '2024-10-30 01:14:33'),
(225, 3, 10, 1, '2024-10-30 01:15:45'),
(226, 3, 10, 49, '2024-10-30 02:04:46'),
(227, 2, 4, 3, '2024-10-30 21:14:28'),
(228, 2, 4, 1, '2024-10-30 21:15:46'),
(229, 2, 4, 1, '2024-10-30 21:16:51'),
(230, 2, 4, 6, '2024-10-30 21:22:50'),
(231, 2, 4, 1, '2024-10-30 21:24:31'),
(232, 2, 4, 1, '2024-10-30 21:25:46'),
(233, 3, 10, 5, '2024-10-30 21:34:06'),
(234, 3, 10, 2, '2024-10-30 21:36:21'),
(235, 3, 10, 7, '2024-10-30 21:43:04'),
(236, 3, 10, 1, '2024-10-30 21:44:06'),
(237, 3, 10, 1, '2024-10-30 21:44:52'),
(238, 3, 10, 3, '2024-10-30 21:48:52'),
(239, 3, 10, 3, '2024-10-30 21:51:34'),
(240, 3, 10, 11, '2024-10-30 22:03:27'),
(241, 3, 10, 6, '2024-10-30 22:10:04'),
(242, 3, 10, 6, '2024-10-30 22:16:06'),
(243, 3, 10, 3, '2024-10-30 22:19:41'),
(244, 3, 10, 10, '2024-10-30 22:29:31'),
(245, 3, 10, 1, '2024-10-30 22:30:46'),
(246, 1, 10, 40, '2024-10-30 23:31:45'),
(247, 3, 10, 1, '2024-10-30 23:33:26'),
(248, 3, 10, 180, '2024-10-31 02:33:25'),
(249, 1, 10, 19, '2024-11-03 04:10:05'),
(250, 3, 10, 18, '2024-11-03 04:28:19'),
(251, 3, 10, 1, '2024-11-03 04:31:00'),
(252, 3, 10, 18, '2024-11-03 04:48:39'),
(253, 3, 10, 1, '2024-11-03 04:49:37'),
(254, 1, 10, 24, '2024-11-24 20:51:33'),
(255, 1, 10, 1, '2024-11-24 20:53:08'),
(256, 1, 10, 3, '2024-11-24 20:56:39'),
(257, 1, 10, 4, '2024-11-24 21:21:28'),
(258, 1, 10, 5, '2024-11-27 01:16:17'),
(259, 3, 10, 3, '2024-11-27 01:19:42'),
(260, 1, 10, 24, '2024-11-27 01:43:57'),
(261, 3, 10, 1, '2024-11-27 01:44:53'),
(262, 1, 10, 2, '2024-11-27 01:46:36'),
(263, 3, 10, 1, '2024-11-27 01:47:35'),
(264, 1, 10, 6, '2024-11-27 01:53:24'),
(265, 3, 10, 1, '2024-11-27 01:54:23'),
(266, 3, 10, 11, '2024-11-27 02:05:48'),
(267, 1, 10, 1, '2024-11-27 02:07:04'),
(268, 1, 10, 6, '2024-11-27 02:26:06'),
(269, 2, 10, 13, '2024-11-27 02:38:39'),
(270, 2, 10, 2, '2024-11-27 02:41:09'),
(271, 3, 10, 9, '2024-11-27 02:50:34'),
(272, 3, 10, 8, '2024-11-27 02:58:10'),
(273, 3, 10, 1, '2024-11-27 02:58:44'),
(274, 1, 10, 2, '2024-11-28 00:56:31'),
(275, 1, 10, 4, '2024-11-28 01:00:53'),
(276, 1, 10, 6, '2024-11-28 01:07:22'),
(277, 1, 10, 50, '2024-11-28 01:57:36'),
(278, 1, 10, 1, '2024-11-28 01:58:29'),
(279, 2, 10, 12, '2024-11-28 02:10:29'),
(280, 3, 10, 1, '2024-11-28 02:11:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipe_question`
--

CREATE TABLE `tipe_question` (
  `id_tipeq` int(11) NOT NULL,
  `tipo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `tipe_question`
--

INSERT INTO `tipe_question` (`id_tipeq`, `tipo`) VALUES
(1, 'Opción Multiple'),
(2, 'Respuesta Corta'),
(3, 'Respuesta larga'),
(4, 'Desplegable'),
(5, 'Varias Opciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topic_cou`
--

CREATE TABLE `topic_cou` (
  `idtopic_cou` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `activity_num` int(11) DEFAULT NULL,
  `valor` text DEFAULT NULL,
  `config` text DEFAULT NULL,
  `acti_tipes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `topic_cou`
--

INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES
(20, 67, 'noches', 2, 'examen.pdf', NULL, 2),
(24, 67, 'LEONARDO LIMA POMPOSO', 3, 'https://github.com/leolima611/cee', NULL, 3),
(29, 67, 'prueba', 4, 'https://www.youtube.com/embed/a1MmgC8GxpY?si=Mz-gTLndN6ESQpOO', NULL, 4),
(41, 26, 'bienvenidos', 1, NULL, NULL, 1),
(42, 26, 'jhdksf', 2, 'https://www.youtube.com/embed/lNw2E5MQ0Ws?si=HAjfODkyqCmYWcte', NULL, 4),
(47, 67, 'bienvenida', 1, 'sddsada', NULL, 1),
(49, 67, 'prueba embed', 5, 'http://localhost/kev/pdf/examen.pdf', 'width=\"100%\" height=\"400\" type=\"application/pdf\"', 7),
(50, 67, 'final', 6, '12', NULL, 8),
(51, 26, 'audio prueba', 3, '20805024_1416107455111745_5256222281545285632_n.mp3', NULL, 5),
(52, 26, 'audio prueba 2', 4, 'AJR_-_Weak_OFFICIAL_MUSIC_VIDEO_txCCYBMKdB0.mp3', NULL, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `acti_tipes`
--
ALTER TABLE `acti_tipes`
  ADD PRIMARY KEY (`idacti_tipes`);

--
-- Indices de la tabla `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indices de la tabla `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  ADD PRIMARY KEY (`exmne_id`);

--
-- Indices de la tabla `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indices de la tabla `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indices de la tabla `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`),
  ADD KEY `FK_id_tipeq` (`id_tipeq`);

--
-- Indices de la tabla `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`),
  ADD KEY `fk_exam_tipe` (`id_tipe`);

--
-- Indices de la tabla `exam_tipe`
--
ALTER TABLE `exam_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indices de la tabla `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indices de la tabla `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id_qAns`),
  ADD KEY `eqt_id` (`eqt_id`);

--
-- Indices de la tabla `rel_topic`
--
ALTER TABLE `rel_topic`
  ADD PRIMARY KEY (`idrel_topic`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indices de la tabla `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actividad` (`actividad_id`);

--
-- Indices de la tabla `tipe_question`
--
ALTER TABLE `tipe_question`
  ADD PRIMARY KEY (`id_tipeq`);

--
-- Indices de la tabla `topic_cou`
--
ALTER TABLE `topic_cou`
  ADD PRIMARY KEY (`idtopic_cou`),
  ADD KEY `fk_topic_cou_acti_tipes_idx` (`acti_tipes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `acti_tipes`
--
ALTER TABLE `acti_tipes`
  MODIFY `idacti_tipes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `exam_tipe`
--
ALTER TABLE `exam_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id_qAns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `rel_topic`
--
ALTER TABLE `rel_topic`
  MODIFY `idrel_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tip`
--
ALTER TABLE `tip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT de la tabla `tipe_question`
--
ALTER TABLE `tipe_question`
  MODIFY `id_tipeq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `topic_cou`
--
ALTER TABLE `topic_cou`
  MODIFY `idtopic_cou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD CONSTRAINT `admin_acc_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Filtros para la tabla `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD CONSTRAINT `FK_id_tipeq` FOREIGN KEY (`id_tipeq`) REFERENCES `tipe_question` (`id_tipeq`);

--
-- Filtros para la tabla `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD CONSTRAINT `fk_exam_tipe` FOREIGN KEY (`id_tipe`) REFERENCES `exam_tipe` (`id_tipe`);

--
-- Filtros para la tabla `question_answers`
--
ALTER TABLE `question_answers`
  ADD CONSTRAINT `question_answers_ibfk_1` FOREIGN KEY (`eqt_id`) REFERENCES `exam_question_tbl` (`eqt_id`);

--
-- Filtros para la tabla `tip`
--
ALTER TABLE `tip`
  ADD CONSTRAINT `fk_actividad` FOREIGN KEY (`actividad_id`) REFERENCES `actividad` (`id`);

--
-- Filtros para la tabla `topic_cou`
--
ALTER TABLE `topic_cou`
  ADD CONSTRAINT `fk_topic_cou_acti_tipes` FOREIGN KEY (`acti_tipes`) REFERENCES `acti_tipes` (`idacti_tipes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
