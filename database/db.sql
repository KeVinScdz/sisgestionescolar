
CREATE TABLE roles (

  id_rol        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_rol    VARCHAR (255) NOT NULL UNIQUE KEY,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('ADMINISTRADOR','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('DIRECTOR ACADÉMICO','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('DIRECTOR ADMINISTRATIVO','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('CONTADOR','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('SECRETARIA','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('DOCENTE','2024-01-03 16:20:20','1');


CREATE TABLE usuarios (

  id_usuario    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  rol_id        INT (11) NOT NULL,
  email         VARCHAR (255) NOT NULL UNIQUE KEY,
  password      TEXT NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO usuarios (rol_id,email,password,fyh_creacion,estado)
VALUES ('1','kevin@gmail.com','$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2','2023-12-28 20:29:10','1');

CREATE TABLE personas (

  id_persona       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id              INT (11) NOT NULL,
  nombres                 VARCHAR (50) NOT NULL,
  apellidos               VARCHAR (50) NOT NULL,
  ci                      VARCHAR (20) NOT NULL,
  fecha_nacimiento        VARCHAR (20) NOT NULL,
  profesion               VARCHAR (50) NOT NULL,
  direccion               VARCHAR (255) NOT NULL,
  celular                 VARCHAR (20) NOT NULL,


  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO personas (usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,estado)
VALUES ('1','Kevin Santiago','Cordoba','12345678','07/03/2001','LICENCIADO EN EDUCACION','CRA 91A #51-24','3213698752','27/09/2024','1');


CREATE TABLE administrativos (

  id_administrativo       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id              INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;


CREATE TABLE docentes (

  id_docente              INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id              INT (11) NOT NULL,
  especialidad            VARCHAR(255) NOT NULL,
  antiguedad              VARCHAR(255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE estudiantes (

  id_estudiante            INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id               INT (11) NOT NULL,
  nivel_id                 INT (11) NOT NULL,
  grado_id                 INT (11) NOT NULL,
  rude                     VARCHAR(50) NOT NULL,




  fyh_creacion                DATETIME NULL,
  fyh_actualizacion           DATETIME NULL,
  estado                      VARCHAR (11),

FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade,
FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE ppffs (

  id_ppff                   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  estudiante_id             INT (11) NOT NULL,
  nombres_apellidos_ppff    VARCHAR(50) NOT NULL,
  ci_ppf                    VARCHAR(20) NOT NULL,
  celular_ppff              VARCHAR(20) NOT NULL,
  ocupacion_ppff            VARCHAR(50) NOT NULL,
  ref_nombre                VARCHAR(50) NOT NULL,
  ref_parentezco            VARCHAR(50) NOT NULL,
  ref_celular               VARCHAR(50) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE configuracion_instituciones (

  id_config_institucion    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_institucion       VARCHAR (255) NOT NULL,
  logo                     VARCHAR (255) NULL,
  direccion                VARCHAR (255) NOT NULL,
  telefono                 VARCHAR (100) NULL,
  celular                  VARCHAR (100) NULL,
  correo                   VARCHAR (100) NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO configuracion_instituciones (nombre_institucion,logo,direccion,telefono,celular,correo,fyh_creacion,estado)
VALUES ('Colegio','logo.jpg','Zona Los Olivos Calle Max Toledo Av. 6 nro 100','2228837','59175657007','info@colegio.com','2023-12-28 20:29:10','1');


CREATE TABLE gestiones (

  id_gestion      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  gestion         VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO gestiones (gestion,fyh_creacion,estado)
VALUES ('GESTIÓN 2024','2023-12-28 20:29:10','1');

CREATE TABLE niveles (

  id_nivel       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  gestion_id     INT (11) NOT NULL,
  nivel          VARCHAR (255) NOT NULL,
  turno          VARCHAR (255) NOT NULL,

  fyh_creacion      DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado            VARCHAR (11),

  FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO niveles (gestion_id,nivel,turno,fyh_creacion,estado)
VALUES ('1','INICIAL','MAÑANA','2023-12-28 20:29:10','1');


CREATE TABLE grados (

  id_grado     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel_id     INT (11) NOT NULL,
  curso        VARCHAR (255) NOT NULL,
  paralelo     VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO grados (nivel_id,curso,paralelo,fyh_creacion,estado)
VALUES ('1','INICIAL - 1','A','2024-09-26 20:29:10','1');

CREATE TABLE materias (

  id_materia      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_materia         VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO materias (nombre_materia,fyh_creacion,estado)
VALUES ('MATEMATICA','2024-09-26 20:29:10','1');

CREATE TABLE pagos (

  id_pago         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  estudiante_id   INT (11) NOT NULL,
  mes_pagado      VARCHAR (50) NOT NULL,
  monto_pagado    VARCHAR (10) NOT NULL,
  fecha_pagado    VARCHAR (20) NOT NULL,


  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE asignaciones (

  id_asignacion   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  docente_id      INT (11) NOT NULL,
  nivel_id        INT (11) NOT NULL,
  grado_id        INT (11) NOT NULL,
  materia_id        INT (11) NOT NULL,



  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
  FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
  FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE calificaciones (

  id_calificacion   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  docente_id        INT (11) NOT NULL,
  estudiante_id     INT (11) NOT NULL,
  materia_id        INT (11) NOT NULL,

  nota1          VARCHAR (10) NOT NULL,
  nota2          VARCHAR (10) NOT NULL,
  nota3          VARCHAR (10) NOT NULL,



  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
  FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
  FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE kardexs (

  id_kardex         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  docente_id        INT (11) NOT NULL,
  estudiante_id     INT (11) NOT NULL,
  materia_id        INT (11) NOT NULL,

  fecha          VARCHAR (50) NOT NULL,
  observacion    VARCHAR (255) NOT NULL,
  nota           TEXT NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
  FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
  FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;




--nueva base de datos completa 


--usuario admin
--usuario:kevin@gmail.com
--contraseña:123456789

--usuario docente
--usuario:cesar@gmail.com
--contraseña:112233

--usuario estudiante
--usuario:camila@gmail.com
--contraseña:0412



-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-04-2025 a las 18:58:48
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
(7, 2, 2, 2, 1, '2025-04-10 16:37:20', NULL, '1');

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
(1, 2, 2, 3, '85', '100', '85', '2025-04-09 03:15:17', '2025-04-10 13:01:49', '1'),
(2, 2, 1, 3, '100', '100', '100', '2025-04-09 03:15:17', '2025-04-10 13:01:49', '1'),
(3, 2, 3, 3, '95', '90', '100', '2025-04-09 03:15:17', '2025-04-10 13:01:49', '1'),
(4, 2, 2, 2, '87', '', '', '2025-04-10 15:09:42', '2025-04-10 15:10:09', '1'),
(5, 2, 3, 2, '100', '', '', '2025-04-10 15:09:42', '2025-04-10 15:10:09', '1'),
(6, 2, 1, 2, '100', '', '', '2025-04-10 15:09:42', '2025-04-10 15:10:09', '1');

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
(2, 3, 'FILOSOFIA', '11', '2025-04-08 02:29:47', '2025-04-12 03:18:01', '1'),
(3, 8, 'CIENCIA SOCIASLES ', '6', '2025-04-11 12:52:37', NULL, '1');

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
(4, 7, 2, 2, '1234566', '2025-04-11 05:03:52', NULL, '1');

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
(5, 2, 3, 3, '2025-04-14', 'RENDIMIENTO ACADÉMICO', 'no ha presentado ningún quiz, dirigirse al salón lo antes posible.', NULL, NULL, NULL);

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
(2, 1, 'PRIMARIA', 'TARDE', '2025-04-08 02:25:04', NULL, '1');

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
(3, 4, 'CESAR', 'LOPEZ', '112233', '2025-04-03', 'LICENCIADO EN LA CIENCIAS DE LA EDUCACION', 'crra 9 #11 a59', '32146688', '2025-04-08 02:29:47', '2025-04-12 03:18:01', '1'),
(4, 5, 'MARIANA', 'LOPEZ ', '111111', '2025-04-04', 'ESTUDIANTE', 'crra 9 #11 a9', '451212544562', '2025-04-08 02:31:34', '2025-04-08 02:42:54', '1'),
(5, 6, 'Daniel', 'Rodríguez ', '1111111', '2025-04-16', 'ESTUDIANTE', 'crra 7 #66 F21', '30154452145', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1'),
(6, 7, 'CAMILA', 'GALVEZ', '0412', '2025-04-26', 'ESTUDIANTE', 'CLL5 #88 D-21', '321456987', '2025-04-09 02:29:15', NULL, '1'),
(7, 8, 'juana', 'ortegon', '123456789', '2025-04-11', 'ESTUDIANTE', 'crra 9 #11 a21', '123456789', '2025-04-11 05:03:52', NULL, '1'),
(8, 9, 'PABLO', 'MOYA', '456321', '1982-11-08', 'DOCENTE', 'CRRA 7 #66 F21', '321456987', '2025-04-11 12:52:37', NULL, '1'),
(9, 6, 'Daniel', 'Rodríguez ', '1111111', '2025-04-16', 'ESTUDIANTE', 'crra 7 #66 F21', '30154452145', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1');

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
(4, 4, 'pedro ortegon', '0000001234', '123456789', 'peluquero', 'pedro ortegon', 'padre ', '321456977', '2025-04-11 05:03:52', NULL, '1');

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
(1, 'ADMINISTRADOR', '2024-01-03 16:20:20', NULL, '1'),
(2, 'DIRECTOR ACADÉMICO', '2024-01-03 16:20:20', NULL, '1'),
(3, 'DIRECTOR ADMINISTRATIVO', '2024-01-03 16:20:20', NULL, '1'),
(4, 'CONTADOR', '2024-01-03 16:20:20', NULL, '1'),
(5, 'SECRETARIA', '2024-01-03 16:20:20', NULL, '1'),
(6, 'DOCENTE', '2024-01-03 16:20:20', NULL, '1'),
(7, 'ESTUDIANTE ', '2025-04-11 13:48:48', NULL, '1');

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
-- Volcado de datos para la tabla `usuarios`vv
--

INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `email`, `password`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'kevin@gmail.com', '$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2', '2023-12-28 20:29:10', NULL, '1'),
(3, 6, 'luna@gmail.com', '$2y$10$YydMV8VW.k04U6L1F0mNmevSqEBV2T88Mwvi/Kv.KOGcSnBkiCwtG', '2025-04-08 02:26:57', NULL, '1'),
(4, 6, 'cesar@gmail.com', '$2y$10$UeMzGW09cE/PmiWB3eBw7.IqOuVgxiJcSBO/sKKi4ZwOwcON.KyRS', '2025-04-08 02:29:47', '2025-04-12 03:18:01', '1'),
(5, 7, 'mariana@gmail.com', '$2y$10$U6k7RGuK0UlwHPM0cySre.Xk94KwlVkQABH4NhsAh9tdaENiZhByq', '2025-04-08 02:31:34', '2025-04-08 03:59:12', '1'),
(6, 7, 'daniel@gmail.com', '$2y$10$3kTIxyeWEy6TexwVEsxNwe20EDDL8jYv4O0qA8YUTcu3dBoYefIqi', '2025-04-08 02:34:35', '2025-04-09 02:26:11', '1'),
(7, 7, 'camila@gmail.com', '$2y$10$c84miIhhBBHKvFlyMwc4x.hIZXcm.FT0fg6qVv.pNB4DTA5uRjrMO', '2025-04-09 02:29:15', NULL, '1'),
(8, 7, 'juana@gmail.com', '$2y$10$0aOaCY5HFE9j6dYvW07nyOYhpGT5axG.lmAVT.AsDC3j3HlAsM1sq', '2025-04-11 05:03:52', NULL, '1'),
(9, 6, 'pablo@gmail.com', '$2y$10$k.0dvIsV/u0PBgGnX6JyMeZcqki1kptwDFHsBsZTz/eGq3.I0MaIW', '2025-04-11 12:52:37', NULL, '1'),
(11, 6, 'ana@gmail.com', '$2y$10$Sn4PTfa8XRPRHSab5Y.SZuyGRff9Xq66Llk7Nai3rT.mhO.UYl.Pa', '2025-04-11 19:19:40', NULL, '1');

--
-- 
CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCRTEMENT PRIMARY KEY,
  `rol_id` int(11) NOT NULL,

  `nombre_url` varchar(100) NOT NULL,
  `url` text NOT NULL,

  `fyh_creacion` datetime  NULL,
  `fyh_actualizacion` datetime  NULL,
  `estado` varchar(11),

  FOREIGN KEY (rol_id)  REFERENCES roles (id_rol) on delete no action on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id_administrativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_kardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ppffs`
--
ALTER TABLE `ppffs`
  MODIFY `id_ppff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
