-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2025 a las 02:42:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisgestionescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `id_administrativo` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrativos`
--

INSERT INTO `administrativos` (`id_administrativo`, `persona_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 10, '2025-04-17 05:59:29', NULL, '1'),
(2, 11, '2025-04-19 11:17:00', NULL, '1'),
(3, 12, '2025-04-19 11:40:18', NULL, '1'),
(4, 13, '2025-04-19 11:41:05', NULL, '1'),
(5, 14, '2025-04-19 12:02:25', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id_asignacion` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id_asignacion`, `docente_id`, `nivel_id`, `grado_id`, `materia_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(4, 2, 1, 1, 3, '2025-04-08 02:36:16', '2025-04-08 02:46:50', '1'),
(5, 1, 1, 1, 1, '2025-04-10 15:08:25', NULL, '1'),
(6, 2, 1, 1, 2, '2025-04-10 15:08:57', NULL, '1'),
(7, 2, 2, 2, 1, '2025-04-10 16:37:20', NULL, '1'),
(8, 1, 1, 1, 2, '2025-04-21 19:00:32', NULL, '1'),
(9, 4, 1, 1, 3, '2025-04-21 20:17:38', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `nota1` varchar(10) NOT NULL,
  `nota2` varchar(10) NOT NULL,
  `nota3` varchar(10) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `docente_id`, `estudiante_id`, `materia_id`, `nota1`, `nota2`, `nota3`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 2, 2, 3, '100', '100', '100', '2025-04-09 03:15:17', '2025-04-14 21:21:29', '1'),
(2, 2, 1, 3, '100', '100', '100', '2025-04-09 03:15:17', '2025-04-14 21:21:29', '1'),
(3, 2, 3, 3, '95', '90', '100', '2025-04-09 03:15:17', '2025-04-14 21:21:29', '1'),
(4, 2, 2, 2, '87', '100', '100', '2025-04-10 15:09:42', '2025-04-14 21:22:27', '1'),
(5, 2, 3, 2, '100', '30', '80', '2025-04-10 15:09:42', '2025-04-14 21:22:27', '1'),
(6, 2, 1, 2, '100', '80', '90', '2025-04-10 15:09:42', '2025-04-14 21:22:27', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_instituciones`
--

CREATE TABLE `configuracion_instituciones` (
  `id_config_institucion` int(11) NOT NULL,
  `nombre_institucion` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion_instituciones`
--

INSERT INTO `configuracion_instituciones` (`id_config_institucion`, `nombre_institucion`, `logo`, `direccion`, `telefono`, `celular`, `correo`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'Colegio', 'logo.jpg', 'Zona Los Olivos Calle Max Toledo Av. 6 nro 100', '2228837', '59175657007', 'info@colegio.com', '2023-12-28 20:29:10', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `antiguedad` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `persona_id`, `especialidad`, `antiguedad`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 2, 'BIOLOGIA ', '7', '2025-04-08 02:26:57', NULL, '1'),
(2, 3, 'Comunicacion', '11', '2025-04-08 02:29:47', '2025-04-14 21:17:14', '1'),
(4, 18, 'no aplica', 'un año', '2025-04-21 20:17:06', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `rude` varchar(50) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `persona_id`, `nivel_id`, `grado_id`, `rude`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 4, 1, 1, '1234566', '2025-04-08 02:31:34', '2025-04-08 02:42:54', '1'),
(2, 5, 1, 1, '547954412662', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1'),
(3, 6, 1, 1, '0412', '2025-04-09 02:29:15', NULL, '1'),
(4, 7, 2, 2, '1234566', '2025-04-11 05:03:52', NULL, '1'),
(7, 17, 2, 2, '40003', '2025-04-21 00:19:52', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiones`
--

CREATE TABLE `gestiones` (
  `id_gestion` int(11) NOT NULL,
  `gestion` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gestiones`
--

INSERT INTO `gestiones` (`id_gestion`, `gestion`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'GESTIÓN 2024', '2023-12-28 20:29:10', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `paralelo` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nivel_id`, `curso`, `paralelo`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'INICIAL - 1', 'A', '2024-09-26 20:29:10', NULL, '1'),
(2, 2, 'PRIMARIA - 1', 'A', '2025-04-08 02:25:26', '2025-04-08 02:25:55', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardexs`
--

CREATE TABLE `kardexs` (
  `id_kardex` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `nota` text NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `kardexs`
--

INSERT INTO `kardexs` (`id_kardex`, `docente_id`, `estudiante_id`, `materia_id`, `fecha`, `observacion`, `nota`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 2, 1, 2, '2025-04-02', 'RENDIMIENTO ACADÉMICO', 'No me presenta notas ): COMUNICARSE CONMIGO LO ANTES POSIBLE..', NULL, '2025-04-11 14:41:55', NULL),
(2, 2, 2, 2, '2025-04-10', 'DISCIPLINA', 'El chico se peleó con uno de sus compañeros; por favor llegar lo antes posible a la institución padres de familia  ', NULL, NULL, NULL),
(4, 2, 3, 2, '2025-04-22', 'ASISTENCIA', 'No asistió)))=', NULL, '2025-04-12 05:42:58', NULL),
(5, 2, 3, 3, '2025-04-14', 'RENDIMIENTO ACADÉMICO', 'no ha presentado ningún quiz, dirigirse al salón lo antes posible.', NULL, NULL, NULL),
(6, 2, 2, 3, '2024-01-17', 'RENDIMIENTO ACADÉMICO', 'no presento informe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'MATEMATICA', '2024-09-26 20:29:10', '2025-04-08 02:45:25', '1'),
(2, 'BIOLOGIA ', '2025-04-08 02:24:30', '2025-04-08 02:45:19', '1'),
(3, 'ARTES', '2025-04-08 02:24:37', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(11) NOT NULL,
  `gestion_id` int(11) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `gestion_id`, `nivel`, `turno`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'INICIAL', 'MAÑANA', '2023-12-28 20:29:10', '2025-04-08 02:45:52', '1'),
(2, 1, 'PRIMARIA', 'TARDE', '2025-04-08 02:25:04', '2025-04-16 01:28:06', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `mes_pagado` varchar(50) NOT NULL,
  `monto_pagado` varchar(10) NOT NULL,
  `fecha_pagado` varchar(20) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre_url` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre_url`, `url`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'configuraciones-institución', '/admin/configuraciones/institucion/index.php', '2025-04-15 21:10:08', '2025-04-17 04:21:19', '1'),
(2, 'configuraciones-institución-Create', '/admin/configuraciones/institucion/create.php', '2025-04-15 21:11:41', '2025-04-17 04:21:30', '1'),
(3, 'Niveles', '/admin/niveles/index.php', '2025-04-15 21:13:45', '2025-04-17 04:23:10', '1'),
(4, 'Niveles-Create', '/admin/niveles/create.php', '2025-04-15 21:14:30', '2025-04-17 04:23:18', '1'),
(5, 'Grados', '/admin/grados/index.php', '2025-04-15 21:17:09', '2025-04-17 04:22:25', '1'),
(6, 'Grados-Create', '/admin/grados/create.php', '2025-04-15 21:19:25', '2025-04-17 04:22:35', '1'),
(7, 'Materias', '/admin/materias/index.php', '2025-04-15 21:21:08', '2025-04-17 04:22:52', '1'),
(8, 'Materias-Create', '/admin/materias/create.php', '2025-04-15 21:22:06', '2025-04-17 04:23:02', '1'),
(9, 'Roles', '/admin/roles/index.php', '2025-04-15 21:23:54', '2025-04-17 04:23:53', '1'),
(10, 'Roles-Create', '/admin/roles/create.php', '2025-04-15 21:24:40', '2025-04-17 04:24:02', '1'),
(11, 'Permisos', '/admin/roles/permisos.php', '2025-04-15 21:28:00', '2025-04-17 04:23:34', '1'),
(12, 'Permisos-Create', '/admin/roles/create_permisos.php', '2025-04-15 21:29:27', '2025-04-17 04:23:44', '1'),
(13, 'Usuarios', '/admin/usuarios/index.php', '2025-04-15 21:31:04', '2025-04-17 04:24:10', '1'),
(14, 'Usuarios-Create', '/admin/usuarios/create.php', '2025-04-15 21:32:38', '2025-04-17 04:24:19', '1'),
(15, 'administrativos', '/admin/administrativos/index.php', '2025-04-15 21:33:45', '2025-04-17 04:20:21', '1'),
(16, 'Administrativos-Create', '/admin/administrativos/create.php', '2025-04-15 21:35:13', '2025-04-17 04:21:34', '1'),
(17, 'Docentes', '/admin/docentes/index.php', '2025-04-15 21:36:15', '2025-04-17 04:21:42', '1'),
(18, 'Docentes-Create', '/admin/docentes/create.php', '2025-04-15 21:36:58', '2025-04-17 04:21:52', '1'),
(19, 'Asignacion de materias', '/admin/docentes/asignacion.php', '2025-04-15 21:38:36', '2025-04-17 04:21:00', '1'),
(20, 'Kardex del estudiante', '/admin/kardex/index.php', '2025-04-15 21:39:46', '2025-04-17 04:22:45', '1'),
(21, 'Calificaciones', '/admin/calificaciones/index.php', '2025-04-15 21:41:12', '2025-04-17 04:21:11', '1'),
(22, 'Estudiantes-Inscripción', '/admin/inscripciones/create.php', '2025-04-15 21:42:42', '2025-04-17 04:22:12', '1'),
(23, 'Estudiantes', '/admin/estudiantes/index.php', '2025-04-15 21:43:17', '2025-04-17 04:22:04', '1'),
(24, 'Pagos', '/admin/pagos/index.php', '2025-04-15 21:43:40', '2025-04-17 04:23:25', '1'),
(26, 'Principal', '/admin/index.php', '2025-04-17 06:26:11', '2025-04-17 06:28:07', '1'),
(27, 'Configuracion', '/admin/configuraciones/index.php', '2025-04-19 12:16:44', NULL, '1'),
(28, 'Configuracion - Institucion - Show', '/admin/configuraciones/institucion/show.php', '2025-04-19 12:20:53', NULL, '1'),
(29, 'Configuracion - Institucion - Update', '/admin/configuraciones/institucion/edit.php', '2025-04-19 12:24:17', NULL, '1'),
(30, 'Configuracion - Gestion Educativa', '/admin/configuraciones/gestion/index.php', '2025-04-19 12:26:43', NULL, '1'),
(31, 'Configuracion - Gestion Educativa - Create', '/admin/configuraciones/gestion/create.php', '2025-04-19 12:27:57', NULL, '1'),
(32, 'Configuracion - Gestion Educativa - Show', '/admin/configuraciones/gestion/show.php', '2025-04-19 12:29:22', NULL, '1'),
(33, 'Configuracion - Gestion Educativa - Update', '/admin/configuraciones/gestion/edit.php', '2025-04-19 12:31:15', NULL, '1'),
(34, 'Niveles - Show', '/admin/niveles/show.php', '2025-04-19 12:32:45', NULL, '1'),
(36, 'Niveles - Update', '/admin/niveles/edit.php', '2025-04-19 12:34:59', NULL, '1'),
(37, 'Grados - Show', '/admin/grados/show.php', '2025-04-19 12:36:31', NULL, '1'),
(38, 'Grados - Update', '/admin/grados/edit.php', '2025-04-19 12:37:58', NULL, '1'),
(39, 'Materias - Show', '/admin/materias/show.php', '2025-04-19 19:31:56', NULL, '1'),
(40, 'Materias - Update', '/admin/materias/edit.php', '2025-04-19 19:36:48', NULL, '1'),
(42, 'Roles - Show', '/admin/roles/show.php', '2025-04-19 19:50:34', NULL, '1'),
(43, 'Roles - Update', '/admin/roles/edit.php', '2025-04-19 19:56:09', NULL, '1'),
(44, 'Permisos - Update', '/admin/roles/edit_permiso.php', '2025-04-19 20:35:05', NULL, '1'),
(45, 'Usuarios - Show', '/admin/usuarios/show.php', '2025-04-19 20:41:52', NULL, '1'),
(46, 'Usuarios - Update', '/admin/usuarios/edit.php', '2025-04-19 20:48:31', NULL, '1'),
(48, 'Administrativos - Show', '/admin/administrativos/show.php', '2025-04-19 20:55:20', NULL, '1'),
(49, 'Administrativos - Update', '/admin/administrativos/edit.php', '2025-04-19 20:58:43', NULL, '1'),
(50, 'Docentes - Show', '/admin/docentes/show.php', '2025-04-19 21:03:58', NULL, '1'),
(51, 'Docentes - Update', '/admin/docentes/edit.php', '2025-04-19 21:07:38', NULL, '1'),
(52, 'Estudiantes - Inscripciones', '/admin/inscripciones/index.php', '2025-04-19 21:10:31', '2025-04-19 21:21:55', '1'),
(53, 'Estudiantes - Show', '/admin/estudiantes/show.php', '2025-04-19 21:26:39', NULL, '1'),
(54, 'Estudiantes - Update', '/admin/estudiantes/edit.php', '2025-04-19 21:44:09', NULL, '1'),
(55, 'Pago - Create', '/admin/pagos/create.php', '2025-04-19 21:52:10', NULL, '1'),
(56, 'Estudiantes - Inscripcion - Importar', '/admin/inscripciones/importar/index.php', '2025-04-19 22:37:26', NULL, '1'),
(57, 'Calificaciones - Create', '/admin/calificaciones/create.php', '2025-04-21 00:29:09', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `fecha_nacimiento` varchar(20) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `usuario_id`, `nombres`, `apellidos`, `ci`, `fecha_nacimiento`, `profesion`, `direccion`, `celular`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'Kevin Santiago', 'Cordoba', '12345678', '07/03/2001', 'LICENCIADO EN EDUCACION', 'CRA 91A #51-24', '3213698752', '0000-00-00 00:00:00', NULL, '1'),
(2, 3, 'LUNA ', 'GARCIA', '3334', '2025-04-01', 'DOCENTE', 'crra 9 #11 a21', '321456987', '2025-04-08 02:26:57', NULL, '1'),
(3, 4, 'CESAR', 'LOPEZ', '112233', '2025-04-03', 'LICENCIADO EN LA CIENCIAS DE LA EDUCACION', 'crra 9 #11 a59', '32146688', '2025-04-08 02:29:47', '2025-04-14 21:17:14', '1'),
(4, 5, 'MARIANA', 'LOPEZ ', '111111', '2025-04-04', 'ESTUDIANTE', 'crra 9 #11 a9', '451212544562', '2025-04-08 02:31:34', '2025-04-08 02:42:54', '1'),
(5, 6, 'Daniel', 'Rodríguez ', '1111111', '2025-04-16', 'ESTUDIANTE', 'crra 7 #66 F21', '30154452145', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1'),
(6, 7, 'CAMILA', 'GALVEZ', '0412', '2025-04-26', 'ESTUDIANTE', 'CLL5 #88 D-21', '321456987', '2025-04-09 02:29:15', NULL, '1'),
(7, 8, 'juana', 'ortegon', '123456789', '2025-04-11', 'ESTUDIANTE', 'crra 9 #11 a21', '123456789', '2025-04-11 05:03:52', NULL, '1'),
(8, 9, 'PABLO', 'MOYA', '456321', '1982-11-08', 'DOCENTE', 'CRRA 7 #66 F21', '321456987', '2025-04-11 12:52:37', NULL, '1'),
(9, 6, 'Daniel', 'Rodríguez ', '1111111', '2025-04-16', 'ESTUDIANTE', 'crra 7 #66 F21', '30154452145', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1'),
(10, 13, 'jose', 'david', '726251', '2006-02-15', 'LICENCIADO EN ARTES', 'Cl 65 Sur 90', '65734123', '2025-04-17 05:59:29', NULL, '1'),
(11, 16, 'Angelo', 'Ramos Cardenas', '15625', '2002-06-07', 'Administrador', 'cl 7 sur', '15336', '2025-04-19 11:17:00', NULL, '1'),
(12, 18, 'andres', 'Mesa Castaneda ', '12735', '2001-08-11', 'Administrador', 'cl 4 norte', '638021', '2025-04-19 11:40:18', NULL, '1'),
(13, 20, 'andres', 'Mesa Castaneda ', '12735', '2001-08-11', 'Administrador', 'cl 4 norte', '638021', '2025-04-19 11:41:05', NULL, '1'),
(14, 21, 'Jasan', 'Vidal', '173529', '2003-10-20', 'Contador', 'cl 10 sur', '236821', '2025-04-19 12:02:25', NULL, '1'),
(17, 24, 'Emiro', 'Macea', '59369', '43101', 'ESTUDIANTE', 'Av. Sin nombre', '29734698', '2025-04-21 00:19:52', NULL, '1'),
(18, 25, 'Ricardo', 'mino', '1529835', '1990-01-10', 'Licenciado en Educacion Física', 'cl 96', '39826496', '2025-04-21 20:17:06', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ppffs`
--

CREATE TABLE `ppffs` (
  `id_ppff` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `nombres_apellidos_ppff` varchar(50) NOT NULL,
  `ci_ppf` varchar(20) NOT NULL,
  `celular_ppff` varchar(20) NOT NULL,
  `ocupacion_ppff` varchar(50) NOT NULL,
  `ref_nombre` varchar(50) NOT NULL,
  `ref_parentezco` varchar(50) NOT NULL,
  `ref_celular` varchar(50) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ppffs`
--

INSERT INTO `ppffs` (`id_ppff`, `estudiante_id`, `nombres_apellidos_ppff`, `ci_ppf`, `celular_ppff`, `ocupacion_ppff`, `ref_nombre`, `ref_parentezco`, `ref_celular`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'pepe lopez ', '0000001', '321456987', 'arquitecto', 'pepe lopez ', 'padre ', '32466778', '2025-04-08 02:31:34', '2025-04-08 02:42:54', '1'),
(2, 2, 'Pablo', 'Rodríguez ', '231454665468', 'abogado', 'Pablo Rodríguez ', 'PADRE ', '325645462165', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1'),
(3, 3, 'TATIANA GALVEZ ', '123456', '321465789', 'Periodista', 'tatiana galvez', 'madre ', '7686768756560', '2025-04-09 02:29:15', NULL, '1'),
(4, 4, 'pedro ortegon', '0000001234', '123456789', 'peluquero', 'pedro ortegon', 'padre ', '321456977', '2025-04-11 05:03:52', NULL, '1'),
(5, 7, 'Jorge Macea', '78349820', '2394872', 'Empleado', 'Ninguna', 'ninguna', 'ninguno', '2025-04-21 00:19:52', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'ADMINISTRADOR', '2024-01-03 16:20:20', '2025-04-16 01:51:56', '1'),
(2, 'DIRECTOR ACADÉMICO', '2024-01-03 16:20:20', NULL, '1'),
(3, 'DIRECTOR ADMINISTRATIVO', '2024-01-03 16:20:20', NULL, '1'),
(4, 'CONTADOR', '2024-01-03 16:20:20', NULL, '1'),
(5, 'SECRETARIA', '2024-01-03 16:20:20', NULL, '1'),
(6, 'DOCENTE', '2024-01-03 16:20:20', NULL, '1'),
(7, 'ESTUDIANTE ', '2025-04-11 13:48:48', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permisos`
--

CREATE TABLE `roles_permisos` (
  `id_rol_permiso` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles_permisos`
--

INSERT INTO `roles_permisos` (`id_rol_permiso`, `rol_id`, `permiso_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 15, '2025-04-17 02:19:25', NULL, '1'),
(2, 1, 16, '2025-04-17 02:19:32', NULL, '1'),
(3, 1, 19, '2025-04-17 02:19:37', NULL, '1'),
(5, 1, 1, '2025-04-17 02:20:07', NULL, '1'),
(6, 1, 2, '2025-04-17 02:20:13', NULL, '1'),
(7, 1, 17, '2025-04-17 02:20:21', NULL, '1'),
(8, 1, 18, '2025-04-17 02:20:25', NULL, '1'),
(9, 1, 23, '2025-04-17 02:20:28', NULL, '1'),
(10, 1, 22, '2025-04-17 02:20:31', NULL, '1'),
(11, 1, 5, '2025-04-17 02:20:34', NULL, '1'),
(12, 1, 6, '2025-04-17 02:20:38', NULL, '1'),
(13, 1, 20, '2025-04-17 02:20:41', NULL, '1'),
(14, 1, 7, '2025-04-17 02:20:44', NULL, '1'),
(15, 1, 8, '2025-04-17 02:20:47', NULL, '1'),
(16, 1, 3, '2025-04-17 02:20:51', NULL, '1'),
(17, 1, 4, '2025-04-17 02:20:54', NULL, '1'),
(18, 1, 24, '2025-04-17 02:20:57', NULL, '1'),
(19, 1, 11, '2025-04-17 02:21:00', NULL, '1'),
(20, 1, 12, '2025-04-17 02:21:03', NULL, '1'),
(21, 2, 15, '2025-04-17 02:21:25', NULL, '1'),
(22, 2, 16, '2025-04-17 02:21:30', NULL, '1'),
(23, 2, 19, '2025-04-17 02:21:38', NULL, '1'),
(24, 2, 1, '2025-04-17 02:21:50', NULL, '1'),
(25, 2, 2, '2025-04-17 02:21:56', NULL, '1'),
(26, 2, 17, '2025-04-17 02:22:05', NULL, '1'),
(27, 2, 18, '2025-04-17 02:22:12', NULL, '1'),
(28, 2, 23, '2025-04-17 02:22:19', NULL, '1'),
(29, 2, 22, '2025-04-17 02:22:27', NULL, '1'),
(30, 2, 5, '2025-04-17 02:22:30', NULL, '1'),
(31, 2, 6, '2025-04-17 02:22:35', NULL, '1'),
(32, 2, 7, '2025-04-17 02:22:49', NULL, '1'),
(33, 2, 8, '2025-04-17 02:22:56', NULL, '1'),
(34, 2, 3, '2025-04-17 02:23:01', NULL, '1'),
(35, 2, 4, '2025-04-17 02:23:07', NULL, '1'),
(37, 1, 9, '2025-04-17 02:24:30', NULL, '1'),
(38, 1, 10, '2025-04-17 02:24:38', NULL, '1'),
(39, 1, 13, '2025-04-17 02:24:50', NULL, '1'),
(40, 1, 14, '2025-04-17 02:24:54', NULL, '1'),
(41, 3, 15, '2025-04-17 02:25:38', NULL, '1'),
(42, 3, 16, '2025-04-17 02:25:44', NULL, '1'),
(43, 3, 1, '2025-04-17 02:25:55', NULL, '1'),
(44, 3, 2, '2025-04-17 02:25:59', NULL, '1'),
(45, 3, 23, '2025-04-17 02:26:05', NULL, '1'),
(46, 3, 22, '2025-04-17 02:26:09', NULL, '1'),
(47, 3, 24, '2025-04-17 02:26:18', NULL, '1'),
(48, 4, 23, '2025-04-17 02:26:46', NULL, '1'),
(49, 4, 22, '2025-04-17 02:26:49', NULL, '1'),
(50, 4, 24, '2025-04-17 02:26:58', NULL, '1'),
(51, 5, 15, '2025-04-17 02:27:19', NULL, '1'),
(52, 5, 16, '2025-04-17 02:27:26', NULL, '1'),
(53, 5, 17, '2025-04-17 02:27:29', NULL, '1'),
(54, 5, 18, '2025-04-17 02:27:32', NULL, '1'),
(55, 5, 23, '2025-04-17 02:27:37', NULL, '1'),
(56, 5, 19, '2025-04-17 02:27:53', NULL, '1'),
(59, 7, 20, '2025-04-17 02:28:35', NULL, '1'),
(60, 6, 21, '2025-04-17 02:35:53', NULL, '1'),
(61, 6, 20, '2025-04-17 05:39:02', NULL, '1'),
(62, 1, 26, '2025-04-17 06:26:40', NULL, '1'),
(63, 2, 26, '2025-04-17 06:27:05', NULL, '1'),
(64, 3, 26, '2025-04-17 06:27:24', NULL, '1'),
(65, 3, 26, '2025-04-17 06:28:28', NULL, '1'),
(66, 4, 26, '2025-04-17 06:28:41', NULL, '1'),
(67, 5, 26, '2025-04-17 06:29:01', NULL, '1'),
(69, 7, 26, '2025-04-17 06:29:42', NULL, '1'),
(70, 6, 26, '2025-04-19 00:33:24', NULL, '1'),
(71, 1, 27, '2025-04-19 12:17:24', NULL, '1'),
(72, 2, 27, '2025-04-19 12:17:58', NULL, '1'),
(73, 3, 27, '2025-04-19 12:18:05', NULL, '1'),
(74, 1, 28, '2025-04-19 12:21:21', NULL, '1'),
(75, 2, 28, '2025-04-19 12:21:31', NULL, '1'),
(76, 3, 28, '2025-04-19 12:21:39', NULL, '1'),
(77, 1, 29, '2025-04-19 12:24:42', NULL, '1'),
(78, 2, 29, '2025-04-19 12:24:55', NULL, '1'),
(79, 3, 29, '2025-04-19 12:25:06', NULL, '1'),
(80, 1, 30, '2025-04-19 12:26:58', NULL, '1'),
(81, 2, 30, '2025-04-19 12:27:04', NULL, '1'),
(82, 3, 30, '2025-04-19 12:27:11', NULL, '1'),
(83, 1, 31, '2025-04-19 12:28:08', NULL, '1'),
(84, 2, 31, '2025-04-19 12:28:12', NULL, '1'),
(85, 3, 31, '2025-04-19 12:28:17', NULL, '1'),
(86, 1, 32, '2025-04-19 12:29:35', NULL, '1'),
(87, 2, 32, '2025-04-19 12:29:40', NULL, '1'),
(88, 3, 32, '2025-04-19 12:29:44', NULL, '1'),
(89, 1, 33, '2025-04-19 12:31:29', NULL, '1'),
(90, 2, 33, '2025-04-19 12:31:36', NULL, '1'),
(91, 3, 33, '2025-04-19 12:31:44', NULL, '1'),
(92, 1, 34, '2025-04-19 12:33:11', NULL, '1'),
(93, 2, 34, '2025-04-19 12:33:19', NULL, '1'),
(94, 1, 36, '2025-04-19 12:35:14', NULL, '1'),
(95, 2, 36, '2025-04-19 12:35:23', NULL, '1'),
(96, 1, 37, '2025-04-19 12:36:46', NULL, '1'),
(97, 2, 37, '2025-04-19 12:36:58', NULL, '1'),
(98, 1, 38, '2025-04-19 12:38:17', NULL, '1'),
(99, 2, 38, '2025-04-19 12:38:28', NULL, '1'),
(100, 1, 39, '2025-04-19 19:33:37', NULL, '1'),
(101, 2, 39, '2025-04-19 19:34:00', NULL, '1'),
(102, 1, 40, '2025-04-19 19:37:07', NULL, '1'),
(103, 2, 40, '2025-04-19 19:37:49', NULL, '1'),
(104, 1, 42, '2025-04-19 19:52:29', NULL, '1'),
(105, 1, 43, '2025-04-19 19:56:41', NULL, '1'),
(107, 1, 44, '2025-04-19 20:36:54', NULL, '1'),
(108, 1, 45, '2025-04-19 20:45:03', NULL, '1'),
(109, 1, 46, '2025-04-19 20:49:02', NULL, '1'),
(110, 1, 48, '2025-04-19 20:55:40', NULL, '1'),
(111, 2, 48, '2025-04-19 20:55:51', NULL, '1'),
(112, 3, 48, '2025-04-19 20:55:58', NULL, '1'),
(113, 5, 48, '2025-04-19 20:56:39', NULL, '1'),
(114, 1, 49, '2025-04-19 20:59:22', NULL, '1'),
(115, 2, 49, '2025-04-19 20:59:32', NULL, '1'),
(116, 3, 49, '2025-04-19 20:59:50', NULL, '1'),
(117, 5, 49, '2025-04-19 21:00:03', NULL, '1'),
(118, 1, 50, '2025-04-19 21:06:21', NULL, '1'),
(119, 2, 50, '2025-04-19 21:06:34', NULL, '1'),
(120, 5, 50, '2025-04-19 21:06:55', NULL, '1'),
(121, 1, 51, '2025-04-19 21:07:56', NULL, '1'),
(122, 2, 51, '2025-04-19 21:08:04', NULL, '1'),
(123, 5, 51, '2025-04-19 21:08:16', NULL, '1'),
(124, 1, 52, '2025-04-19 21:14:23', NULL, '1'),
(125, 2, 52, '2025-04-19 21:14:41', NULL, '1'),
(126, 3, 52, '2025-04-19 21:18:45', NULL, '1'),
(128, 4, 52, '2025-04-19 21:18:58', NULL, '1'),
(129, 5, 52, '2025-04-19 21:19:12', NULL, '1'),
(130, 1, 53, '2025-04-19 21:27:16', NULL, '1'),
(131, 2, 53, '2025-04-19 21:28:09', NULL, '1'),
(132, 3, 53, '2025-04-19 21:29:14', NULL, '1'),
(133, 4, 53, '2025-04-19 21:42:11', NULL, '1'),
(134, 5, 53, '2025-04-19 21:42:27', NULL, '1'),
(135, 1, 54, '2025-04-19 21:44:44', NULL, '1'),
(136, 2, 54, '2025-04-19 21:44:59', NULL, '1'),
(137, 3, 54, '2025-04-19 21:45:29', NULL, '1'),
(140, 4, 55, '2025-04-19 21:55:44', NULL, '1'),
(141, 1, 56, '2025-04-19 22:38:21', NULL, '1'),
(142, 2, 56, '2025-04-19 22:38:46', NULL, '1'),
(143, 5, 56, '2025-04-19 22:39:15', NULL, '1'),
(144, 6, 57, '2025-04-21 00:29:34', NULL, '1'),
(145, 1, 21, '2025-04-21 20:20:21', NULL, '1'),
(146, 1, 55, '2025-04-21 20:28:27', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `email`, `password`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'kevin@gmail.com', '$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2', '2023-12-28 20:29:10', NULL, '1'),
(3, 6, 'luna@gmail.com', '$2y$10$YydMV8VW.k04U6L1F0mNmevSqEBV2T88Mwvi/Kv.KOGcSnBkiCwtG', '2025-04-08 02:26:57', NULL, '1'),
(4, 6, 'cesar@gmail.com', '$2y$10$RPk9f6Pm04hstwji2D1odeedNOfJa0Evp1JLQB47e2gbSSh7kXMkG', '2025-04-08 02:29:47', '2025-04-14 21:17:14', '1'),
(5, 7, 'mariana@gmail.com', '$2y$10$U6k7RGuK0UlwHPM0cySre.Xk94KwlVkQABH4NhsAh9tdaENiZhByq', '2025-04-08 02:31:34', '2025-04-08 03:59:12', '1'),
(6, 7, 'daniel@gmail.com', '$2y$10$3kTIxyeWEy6TexwVEsxNwe20EDDL8jYv4O0qA8YUTcu3dBoYefIqi', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1'),
(7, 7, 'camila@gmail.com', '$2y$10$c84miIhhBBHKvFlyMwc4x.hIZXcm.FT0fg6qVv.pNB4DTA5uRjrMO', '2025-04-09 02:29:15', NULL, '1'),
(8, 7, 'juana@gmail.com', '$2y$10$0aOaCY5HFE9j6dYvW07nyOYhpGT5axG.lmAVT.AsDC3j3HlAsM1sq', '2025-04-11 05:03:52', NULL, '1'),
(9, 6, 'pablo@gmail.com', '$2y$10$k.0dvIsV/u0PBgGnX6JyMeZcqki1kptwDFHsBsZTz/eGq3.I0MaIW', '2025-04-11 12:52:37', NULL, '1'),
(11, 6, 'ana@gmail.com', '$2y$10$Sn4PTfa8XRPRHSab5Y.SZuyGRff9Xq66Llk7Nai3rT.mhO.UYl.Pa', '2025-04-11 19:19:40', NULL, '1'),
(12, 3, 'davidn@gmail.com', '$2y$10$KA5CXSiHaXrcb84tGgAaxupX3qi88nMLO4JaivmHeMjQ1l1Bq/t8u', '2025-04-17 04:30:19', NULL, '1'),
(13, 2, 'david@gmail.com', '$2y$10$hLbr1XySPRVCyxUBHSgh2eJSddakcSXkx.p7MtU7s44mO7DBfsox2', '2025-04-17 05:59:29', NULL, '1'),
(16, 1, 'angelo@gmail.com', '$2y$10$EFx4PYN2W7B0.FriDNvRduf5vjCqNiaHMVjCYd0G2Z3bBnO4mVpTa', '2025-04-19 11:17:00', NULL, '1'),
(18, 3, 'mesi@gmail.com', '$2y$10$vhdbpW0ql/vks6plgHefDeWw9Vwapw56qetU4rR285DQ.YOAk26TO', '2025-04-19 11:40:18', '2025-04-19 11:53:46', '1'),
(20, 3, 'mesa@gmail.com', '$2y$10$6K4l7UsM9I/4fQBPznThpevyh8yonjMaXax39x41NfXq.67hTwyi2', '2025-04-19 11:41:05', NULL, '1'),
(21, 4, 'jasan@gmail.com', '$2y$10$qdsCyVzJv0g.N30G.QQdn.u9giCy3zrtDOagI85pA8ays8Lyg40nS', '2025-04-19 12:02:25', '2025-04-19 12:04:08', '1'),
(24, 7, 'emacea@gmail.com', '$2y$10$lPfUCzsvLtaYHBBEL17rW.as7eRVdU48qzVfVXzKWEd29rLlHgzqC', '2025-04-21 00:19:52', NULL, '1'),
(25, 6, 'rdomino@gmail.com', '$2y$10$qKe/HIXbj2QBw/LRLFFWfeNMDL1ui0b58EemsMoAv4YNgBFq/T6h.', '2025-04-21 20:17:06', NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`id_administrativo`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `nivel_id` (`nivel_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `configuracion_instituciones`
--
ALTER TABLE `configuracion_instituciones`
  ADD PRIMARY KEY (`id_config_institucion`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `nivel_id` (`nivel_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `gestiones`
--
ALTER TABLE `gestiones`
  ADD PRIMARY KEY (`id_gestion`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `nivel_id` (`nivel_id`);

--
-- Indices de la tabla `kardexs`
--
ALTER TABLE `kardexs`
  ADD PRIMARY KEY (`id_kardex`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`),
  ADD KEY `gestion_id` (`gestion_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ppffs`
--
ALTER TABLE `ppffs`
  ADD PRIMARY KEY (`id_ppff`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indices de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD PRIMARY KEY (`id_rol_permiso`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `permiso_id` (`permiso_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  MODIFY `id_administrativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuracion_instituciones`
--
ALTER TABLE `configuracion_instituciones`
  MODIFY `id_config_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `gestiones`
--
ALTER TABLE `gestiones`
  MODIFY `id_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `kardexs`
--
ALTER TABLE `kardexs`
  MODIFY `id_kardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ppffs`
--
ALTER TABLE `ppffs`
  MODIFY `id_ppff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  MODIFY `id_rol_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id_nivel`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_4` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id_grado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id_nivel`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id_grado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `grados_ibfk_1` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id_nivel`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `kardexs`
--
ALTER TABLE `kardexs`
  ADD CONSTRAINT `kardexs_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kardexs_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kardexs_ibfk_3` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD CONSTRAINT `niveles_ibfk_1` FOREIGN KEY (`gestion_id`) REFERENCES `gestiones` (`id_gestion`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ppffs`
--
ALTER TABLE `ppffs`
  ADD CONSTRAINT `ppffs_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD CONSTRAINT `roles_permisos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_permisos_ibfk_2` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id_permiso`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
