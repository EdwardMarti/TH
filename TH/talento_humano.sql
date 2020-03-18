-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2020 a las 18:01:05
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `talento_humano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_empresa`
--

CREATE TABLE `area_empresa` (
  `idarea_emp` int(11) NOT NULL,
  `nom_area` varchar(100) CHARACTER SET latin1 NOT NULL,
  `empresa_idempresa` int(11) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area_empresa`
--

INSERT INTO `area_empresa` (`idarea_emp`, `nom_area`, `empresa_idempresa`, `estado`) VALUES
(1, 'ADMINISTRATIVA', 1, 1),
(2, 'OPERATIVA', 1, 1),
(3, 'OPERATIVA', 2, 1),
(4, 'OPERATIVA', 3, 1),
(5, 'OPERATIVA', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `idbanco` int(11) NOT NULL,
  `banco_nombre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `numero_cuenta` varchar(45) CHARACTER SET latin1 NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`idbanco`, `banco_nombre`, `numero_cuenta`, `persona_id`) VALUES
(1, '1', '601092448', 1),
(2, '1', '', 3),
(3, '1', '601197585', 4),
(4, '-1', '', 5),
(5, '1', '601174295', 6),
(6, '7', '323489104', 7),
(7, '1', '210261764', 8),
(8, '1', '210229324', 9),
(9, '1', '601123607', 10),
(10, '1', '614116457', 11),
(11, '1', '260143797', 12),
(12, '1', '601199953', 13),
(13, '-1', '306433681', 14),
(14, '21', '130002963', 15),
(15, '1', '210400917', 16),
(16, '1', '210400966', 17),
(17, '1', '210401550', 18),
(18, '1', '210400909', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date DEFAULT '0000-00-00',
  `empresa_idempresa` int(11) NOT NULL,
  `area_empresa_idarea_emp` int(11) NOT NULL,
  `cargo_empreso_idcargo` int(11) NOT NULL,
  `puesto_idpuesto` int(11) DEFAULT '-1',
  `Empresa_p_idEmpresa_p` int(11) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `observacion` varchar(300) NOT NULL,
  `stado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `fecha_ingreso`, `fecha_salida`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`, `puesto_idpuesto`, `Empresa_p_idEmpresa_p`, `persona_id`, `observacion`, `stado`) VALUES
(1, '2010-08-18', '0000-00-00', 1, 1, 3, 2, 1, 1, '', 0),
(2, '2013-02-01', '0000-00-00', 1, 1, 22, 2, 1, 3, '', 0),
(3, '0000-00-00', '0000-00-00', 1, 1, 23, 1, 1, 4, '', 0),
(4, '0000-00-00', '0000-00-00', 1, 1, 17, 1, 1, 5, '', 0),
(5, '0000-00-00', '0000-00-00', 1, 1, 13, 1, 1, 6, '', 0),
(6, '0000-00-00', '0000-00-00', 1, 1, 4, 1, 1, 7, '', 0),
(7, '0000-00-00', '0000-00-00', 1, 1, 6, 1, 1, 8, '', 0),
(8, '0000-00-00', '0000-00-00', 1, 1, 5, 1, 1, 9, '', 0),
(9, '0000-00-00', '0000-00-00', 1, 2, 20, -1, 1, 10, '', 0),
(10, '2016-03-01', '0000-00-00', 1, 2, 20, 5, 1, 11, '', 0),
(11, '2017-02-10', '0000-00-00', 1, 2, 20, 19, 1, 12, '', 0),
(12, '2015-11-01', '0000-00-00', 1, 2, 19, 5, 1, 13, '', 0),
(13, '2008-07-01', '0000-00-00', 1, 2, 19, 5, 1, 14, '', 0),
(14, '2018-01-06', '0000-00-00', 1, 2, 19, 5, 1, 15, '', 0),
(15, '2019-05-08', '0000-00-00', 1, 2, 18, -1, 1, 16, '', 0),
(16, '2019-05-08', '0000-00-00', 1, 2, 18, 30, 1, 17, '', 0),
(17, '2019-05-08', '0000-00-00', 1, 2, 18, 30, 1, 18, '', 0),
(18, '2019-05-08', '0000-00-00', 1, 2, 18, 30, 1, 19, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_empreso`
--

CREATE TABLE `cargo_empreso` (
  `idcargo` int(11) NOT NULL,
  `nom_cargo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `area_empresa_idarea_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo_empreso`
--

INSERT INTO `cargo_empreso` (`idcargo`, `nom_cargo`, `area_empresa_idarea_emp`) VALUES
(3, 'COORDINADORA DE GESTION DE TALENTO HUMANO', 1),
(4, 'COORDINADORA COMERCIAL', 1),
(5, 'AUXILIAR CONTABLE', 1),
(6, 'TESORERIA', 1),
(11, 'GUARDA DE SEGURIDAD', 5),
(12, 'GUARDA DE SEGURIDAD', 5),
(13, 'AUXILIAR DE NOMINA', 1),
(15, 'TESORERO', 1),
(17, 'GERENTE', 1),
(18, 'GUARDA DE SEGURIDAD', 2),
(19, 'SUPERVISOR', 2),
(20, 'RADIO OPERADOR', 2),
(21, 'ESCOLTA', 2),
(22, 'COORDINADORA DE COMPRAS', 1),
(23, 'LIDER DE OPERACIONES', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carnet_supervigilancia`
--

CREATE TABLE `carnet_supervigilancia` (
  `idcarne` int(11) NOT NULL,
  `carnet_nombre` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carnet_supervigilancia`
--

INSERT INTO `carnet_supervigilancia` (`idcarne`, `carnet_nombre`) VALUES
(-1, 'SELECCIONE'),
(1, 'NO APLICA'),
(3, 'VIGILANTE'),
(5, 'SUPERVISOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celular`
--

CREATE TABLE `celular` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `celular`
--

INSERT INTO `celular` (`id`, `numero`) VALUES
(1, '2147483647'),
(2, '2147483647'),
(3, '3114608425'),
(4, '2147483647'),
(5, '2147483647'),
(6, '5714557'),
(7, '3124333193'),
(8, '2147483647'),
(9, '2147483647'),
(10, '2147483647'),
(11, '3112341332'),
(12, '2147483647'),
(13, '2147483647'),
(14, '3163056668'),
(15, '2147483647'),
(16, '2147483647'),
(17, '2147483647'),
(18, '3043275428'),
(19, '3174154682'),
(20, '2147483647'),
(21, '5498950'),
(22, '2147483647'),
(23, '3107805515'),
(24, '2147483647'),
(25, '2147483647'),
(26, '2147483647'),
(27, '3103020007'),
(28, '4234'),
(29, '3155898023'),
(30, '3184738018'),
(31, '3165268657'),
(32, '3187421949'),
(33, '3144641446'),
(34, '3153709263'),
(35, '3118056380'),
(36, '3222239160'),
(37, '3208027582'),
(38, '3208006656'),
(39, '3176867032'),
(40, '3123223847'),
(41, '3138463289'),
(42, '3152570999'),
(43, '3007488366'),
(44, '3113325627'),
(45, '3123470757'),
(46, '3223305259'),
(47, '3202313874'),
(48, '3105735022'),
(49, ''),
(50, ''),
(51, ''),
(52, '3143412170'),
(53, '3163323367'),
(54, '3173737370'),
(55, '3008535314'),
(56, '3174968061');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cooperativismo`
--

CREATE TABLE `cooperativismo` (
  `idcooperativismo` int(10) UNSIGNED NOT NULL,
  `coop_nombre` varchar(10) DEFAULT NULL,
  `coop_fecha` date DEFAULT NULL,
  `coop_nit` varchar(45) DEFAULT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cooperativismo`
--

INSERT INTO `cooperativismo` (`idcooperativismo`, `coop_nombre`, `coop_fecha`, `coop_nit`, `persona_id`) VALUES
(1, 'FUNDACION ', '2011-01-09', '8040112509', 1),
(2, 'FUNDACION ', '2007-04-17', '8040112509', 3),
(3, 'COONFECCOP', '2015-06-30', '', 4),
(4, 'FUNDACION ', '2007-04-17', '', 5),
(5, 'CONFECOOP ', '2011-01-19', '8040112509', 6),
(6, '', '0000-00-00', '', 7),
(7, '', '2009-06-16', '', 8),
(8, 'FUNDACION ', '2010-02-19', '', 9),
(9, 'CONFECOOP ', '2016-01-16', '8905057320', 10),
(10, 'FUNDACION ', '2015-06-30', '8040112509', 11),
(11, 'FUNDACION ', '2014-03-14', '8040112509', 12),
(12, '', '0000-00-00', '', 13),
(13, 'FUNDACION ', '2010-02-10', '8040112509', 14),
(14, 'CORPORACIO', '2018-04-25', '8300534398', 15),
(15, 'FUNDACION ', '2018-04-08', '8040112509', 16),
(16, '', '0000-00-00', '', 17),
(17, '', '0000-00-00', '', 18),
(18, '', '0000-00-00', '', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id` int(11) NOT NULL,
  `direccion` text CHARACTER SET latin1 NOT NULL,
  `barrio` varchar(200) CHARACTER SET latin1 NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id`, `direccion`, `barrio`, `persona_id`) VALUES
(1, 'calle 30 #10-45 ', 'GALAN', 1),
(2, 'Calle 18A Nº 13-63', 'LA LIBERTAD  (CUCUTA)', 3),
(3, 'CALLE 4A #17-50', 'ANIVERSARIO II  (CUCUTA)', 4),
(4, 'MZ G3 LOTE 19', 'LA CONCORDIA  (CUCUTA)', 5),
(5, 'MZ G3 LOTE 19', 'LA CONCORDIA  (CUCUTA)', 6),
(6, 'MZ G CASA 6', 'URBANIZACION SAN FERNANDO (LOS PATIOS)', 7),
(7, 'Av. Libertadores Bloque E Apto 102', 'ZULIMA I,II,III Y IV ETAPA  (CUCUTA)', 8),
(8, 'CALLE 16 #2-48', 'OSPINA PEREZ  (CUCUTA)', 9),
(9, 'CALLE 33 #0-118', 'BARRIO DOCE DE OCTUBRE (LOS PATIOS)', 10),
(10, 'CARRERA 12 #19N-56', 'LA ESPERANZA (VILLA DEL ROSARIO)', 11),
(11, 'CALLE 18 No. 24-32', 'GAITAN  (CUCUTA)', 12),
(12, 'KDX 15 ', 'MARIA GRACIA', 13),
(13, 'MZ A3 LOTE 32-1', 'TUCUNARE  (CUCUTA)', 14),
(14, 'AVENIDA 8 #2-35', 'PANAMERICANO  (CUCUTA)', 15),
(15, 'AVENIDA 16 #20-50', 'ALONSITO  (CUCUTA)', 16),
(16, 'MZ 19 LOTE 12', 'PALMERAS  (CUCUTA)', 17),
(17, 'CONJUNTO LOS ARRAYANES', 'EL RODEO  (CUCUTA)', 18),
(18, 'AVENIDA 16 #20-50', 'ALONSITO  (CUCUTA)', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `nombre_empresa` varchar(400) CHARACTER SET latin1 NOT NULL,
  `nit_empresa` varchar(45) CHARACTER SET latin1 NOT NULL,
  `direccion_empresa` varchar(400) CHARACTER SET latin1 NOT NULL,
  `Empresa_p_idEmpresa_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `nombre_empresa`, `nit_empresa`, `direccion_empresa`, `Empresa_p_idEmpresa_p`) VALUES
(1, 'CUCUTA', '5836473', 'CALLE 8A #0-99 B. LATINO', 1),
(2, 'PAMPLONA', '3176991487', 'CARRERA 13 #11-156', 1),
(3, 'OCA', '3174236823', 'CARRERA 27 C #12-25 ', 1),
(4, 'TIB', '3183517914', 'CALLE 17 No. 15-10 B. ESPERANZA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_p`
--

CREATE TABLE `empresa_p` (
  `idEmpresa_p` int(11) NOT NULL,
  `Empresa_p_nombre` varchar(400) CHARACTER SET latin1 NOT NULL,
  `nit_empresa_p` int(20) NOT NULL,
  `Empresa_p_direccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Empresa_p_tel` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa_p`
--

INSERT INTO `empresa_p` (`idEmpresa_p`, `Empresa_p_nombre`, `nit_empresa_p`, `Empresa_p_direccion`, `Empresa_p_tel`) VALUES
(1, 'COOPVIGSAN', 890210914, 'CALLE 8A NO. 0 99, NORTE DE SANTANDER', '58123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio`
--

CREATE TABLE `estudio` (
  `nivel_academico` int(11) NOT NULL,
  `nivel_vigilancia` int(11) NOT NULL,
  `fecha_curso` date NOT NULL,
  `nit_escuela` varchar(45) NOT NULL DEFAULT '0000',
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudio`
--

INSERT INTO `estudio` (`nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `nit_escuela`, `id`, `persona_id`) VALUES
(-1, -1, '0000-00-00', '0', 1, 1),
(-1, -1, '0000-00-00', '0', 2, 3),
(4, 2, '2018-05-04', '0', 3, 4),
(4, -1, '0000-00-00', '0', 4, 5),
(4, -1, '0000-00-00', '0', 5, 6),
(3, 1, '2018-11-30', '0', 6, 7),
(3, -1, '0000-00-00', '0', 7, 8),
(4, -1, '0000-00-00', '0', 8, 9),
(3, 3, '2018-10-18', '0000', 9, 10),
(3, 2, '2018-11-08', '8301073924', 10, 11),
(3, 3, '2019-03-18', '0000', 11, 12),
(3, 2, '2019-03-08', '0000', 12, 13),
(3, 3, '2019-03-08', '0000', 13, 14),
(3, 3, '2019-01-08', '0000', 14, 15),
(3, 4, '2019-01-28', '0000', 15, 16),
(3, 4, '2019-01-28', '0000', 16, 17),
(3, 4, '2019-01-28', '0000', 17, 18),
(3, 4, '2019-01-28', '0000', 18, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `parentesco` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familiar`
--

INSERT INTO `familiar` (`id`, `nombre`, `apellido`, `parentesco`, `persona_id`) VALUES
(1, 'PEDRO LOPEZ RODRIGUEZ', 'PEDRO LOPEZ RODRIGUEZ', 1, 1),
(2, 'ROSA EVA FIGUEROA DE LOPEZ', 'ROSA EVA FIGUEROA DE LOPEZ', 2, 1),
(3, 'SANDRA MILENA SUAREZ BARRERA', 'SANDRA MILENA SUAREZ BARRERA', 1, 3),
(4, 'YUDEIL KARINA SUAREZ', 'YUDEIL KARINA SUAREZ', 2, 3),
(5, 'LUIS MARTIN BARRERA ORTIZ', 'LUIS MARTIN BARRERA ORTIZ', 3, 3),
(6, 'NANCY AMPARO ORTEGA', 'NANCY AMPARO ORTEGA', 1, 4),
(7, 'JOSE CARVAJAL SEPULVEDA', 'JOSE CARVAJAL SEPULVEDA', 2, 4),
(8, 'JOHANNA CARVAJAL ORTEGA', 'JOHANNA CARVAJAL ORTEGA', 3, 4),
(9, 'NUBIA YANETH CASADIEGOS VEGA', 'NUBIA YANETH CASADIEGOS VEGA', 1, 5),
(10, 'YINETH LUCIA CASADIEGOS VEGA', 'YINETH LUCIA CASADIEGOS VEGA', 2, 5),
(11, 'NUBIA YANETH CASADIEGOS VEGA', 'NUBIA YANETH CASADIEGOS VEGA', 1, 6),
(12, 'ANA LUCIA VEGA', 'ANA LUCIA VEGA', 2, 6),
(13, 'YISETH ALEXANDRA CASTAÑO', 'YISETH ALEXANDRA CASTAÑO', 3, 6),
(14, 'GILMA ROJAS MARTINEZ', 'GILMA ROJAS MARTINEZ', 1, 8),
(15, 'TERESA SALMANCA', 'TERESA SALMANCA', 2, 8),
(16, 'ALBITA GAMBOA', 'ALBITA GAMBOA', 3, 8),
(17, 'JAIME ALBERTO GARCIA', 'JAIME ALBERTO GARCIA', 1, 9),
(18, 'ELSA LOPEZ ', 'ELSA LOPEZ ', 2, 9),
(19, 'YAN CARLOS GARCIA', 'YAN CARLOS GARCIA', 3, 9),
(20, 'RODOLFO CORZO ACEVEDO', '', 10, 10),
(21, 'JHON JAIRO PICO RODRIGUEZ', '', 17, 10),
(22, 'OLGA LEONOR VARGAS DE RAMON', '', 3, 10),
(23, 'ZORAIDA GARCIA', 'ZORAIDA GARCIA', 2, 11),
(24, 'AURA ALICIA OROZCO', 'AURA ALICIA OROZCO', 17, 11),
(25, 'LUIS ARLEY MOSQUERA GARCIA', 'LUIS ARLEY MOSQUERA GARCIA', 10, 11),
(26, 'RODOLFO JESUS CONTRERAS MENDOZA', '', 10, 12),
(27, 'BLANCA MENDOZA LAGUADO', '', 15, 12),
(28, 'LUTI OVIEDO', '', 17, 12),
(29, 'WILLIAM JAVIER CELIS BOTELLO', '', 11, 13),
(30, 'NELSON OMAR CELIS BOTELLO', '', 11, 13),
(31, 'ALBEIRO CELIS BOTELLO', '', 11, 13),
(32, 'BERENICE BASTOS DE GARCIA', '', 2, 14),
(33, 'OSCAR HUMBERTO GRACIA TRUJILLO', '', 1, 14),
(34, 'YESMY TORCOROMA GARCIA', '', 10, 14),
(35, 'LINA ROSA MELANO', '', 2, 15),
(36, 'JERITZA WILCHES', '', 10, 15),
(37, 'JORMAN JAVIER RODRIGUEZ', '', 10, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar_has_celular`
--

CREATE TABLE `familiar_has_celular` (
  `familiar_id` int(11) NOT NULL,
  `celular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familiar_has_celular`
--

INSERT INTO `familiar_has_celular` (`familiar_id`, `celular_id`) VALUES
(1, 1),
(2, 2),
(3, 4),
(4, 5),
(5, 6),
(6, 8),
(7, 9),
(8, 10),
(9, 12),
(10, 13),
(11, 15),
(12, 16),
(13, 17),
(14, 20),
(15, 21),
(16, 22),
(17, 24),
(18, 25),
(19, 26),
(20, 29),
(21, 30),
(22, 31),
(23, 33),
(24, 34),
(25, 35),
(26, 37),
(27, 38),
(28, 39),
(29, 41),
(30, 42),
(31, 43),
(32, 45),
(33, 46),
(34, 47),
(35, 49),
(36, 50),
(37, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas_particulares`
--

CREATE TABLE `fechas_particulares` (
  `estudio_seguridad` date NOT NULL,
  `examen_medico` date NOT NULL,
  `prueba_psicotecnica` date NOT NULL,
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fechas_particulares`
--

INSERT INTO `fechas_particulares` (`estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `id`, `persona_id`) VALUES
('2017-02-06', '2017-11-16', '2014-05-21', 1, 1),
('2017-02-24', '2017-11-16', '2013-02-15', 2, 3),
('2017-01-20', '2017-11-16', '2016-12-26', 3, 4),
('2017-02-27', '2017-12-04', '2017-02-21', 4, 5),
('2018-08-11', '2018-08-11', '2018-08-11', 5, 6),
('2018-11-29', '2018-11-30', '2018-11-29', 6, 7),
('2017-02-12', '2017-11-16', '2008-07-08', 7, 8),
('2017-02-06', '2017-11-16', '2009-02-16', 8, 9),
('0000-00-00', '2018-10-31', '2018-10-30', 9, 10),
('2018-11-20', '2017-10-17', '2014-10-22', 10, 11),
('2019-04-20', '2017-10-13', '0000-00-00', 11, 12),
('2018-11-21', '2019-01-19', '2015-03-26', 12, 13),
('2017-03-07', '2019-01-19', '2016-08-24', 13, 14),
('2018-01-05', '2019-01-09', '2018-01-05', 14, 15),
('0000-00-00', '2019-05-07', '2019-05-07', 15, 16),
('0000-00-00', '2019-05-07', '2019-05-06', 16, 17),
('0000-00-00', '2019-05-07', '2019-05-06', 17, 18),
('0000-00-00', '2019-05-09', '2019-05-06', 18, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_vigilancia`
--

CREATE TABLE `nivel_vigilancia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_vigilancia`
--

INSERT INTO `nivel_vigilancia` (`id`, `nombre`) VALUES
(-1, 'SELECCIONE'),
(1, 'NO APLICA'),
(2, 'FUNDAMENTACION'),
(3, 'REENTRENAMIENTO'),
(4, 'ESPECIALIZACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nacionalidad` int(11) NOT NULL,
  `cedula_lugar_expedicion` varchar(200) DEFAULT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(200) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `grupo_sanguineo` int(11) DEFAULT NULL,
  `estado_civil` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `nivel_vigilancia_id_p` int(11) DEFAULT NULL,
  `tipo_vigilancia_id` int(11) DEFAULT NULL,
  `libreta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `estado`, `cargo_id`, `nivel_vigilancia_id_p`, `tipo_vigilancia_id`, `libreta`) VALUES
(1, '37276572', 1, 'CUCUTA', 'MARIA ELSA', 'LOPEZ FIGUEROA', '1980-08-10', 'CUCUTA', 2, 2, 1, 'mariaelsa.lopez@hotmail.com', 1, 1, 1, 1, 1),
(3, '60402070', 1, 'VILLA ROSARIO', 'FANNY MERCEDES', 'BARRERA ORTIZ', '1963-10-08', 'ENCISO', 2, 2, 3, 'compras@coopvigsan.com.co', 1, 2, 1, 1, 1),
(4, '1090443205', 1, 'CUCUTA', 'JESSICA', 'CARVAJAL ORTEGA', '1991-12-03', 'CUCUTA', 2, 2, 1, 'operaciones@coopvigsan.com.co', 1, 3, 1, 1, 1),
(5, '60384046', 1, 'CUCUTA', 'SANDRA MILENA', 'CASADIEGOS VEGA', '1977-12-26', 'CUCUTA', 2, 2, 1, 'gerente@coopvigsan.com.co', 1, 4, 1, 1, 1),
(6, '1090462814', 1, 'CUCUTA', 'YINETH LUCIA', 'CASADIEGOS VEGA', '1993-03-03', 'CUCUTA', 2, 2, 3, 'nomina@coopvigsan.com.co', 1, 5, 1, 1, 1),
(7, '1082972071', 1, 'SANTA MARTA', 'YISETH ALEXANDRA', 'CASTAÑO CASADIEGOS', '1993-08-09', 'VALLEDUPAR', 2, 4, 3, 'comercial@coopvigsan.com.co', 1, 6, 1, 1, 1),
(8, '60286978', 1, 'CUCUTA', 'EMPERATRIZ', 'ROJAS MARTINEZ', '1960-02-23', 'SANTIAGO', 2, 4, 2, 'conta1@coopvigsan.com.co', 1, 7, -1, 1, 1),
(9, '1090962700', 1, 'BUCARASICA', 'GLORIA AMPARO', 'GARCIA BOTELLO ', '1990-10-27', 'BUCARASICA', 2, 6, 3, 'conta2@coopvigsan.com.co', 1, 8, -1, 1, 1),
(10, '60389812', 1, 'CUCUTA', 'SANDRA MILENA', 'CALDERON ACEVEDO', '1978-10-26', 'BUCARAMANGA', 2, 4, 2, '', 1, 9, 3, 3, 1),
(11, '1090412183', 1, 'CUCUTA', 'DEIVY YESID', 'MOSQUERA GARCIA ', '1990-01-10', 'CUCUTA', 1, 2, 3, '', 1, 10, 2, 2, 3),
(12, '37272238', 1, 'CUCUTA', 'YUDDY ZULAY', 'CONTRERAS MENDOZA', '1980-10-22', 'CUCUTA', 2, 2, 3, '', 1, 11, 3, 2, 1),
(13, '1090473034', 1, 'CUCUTA', 'JESUS ALVEIRO', 'CARVAJAL BOTELLO', '1992-12-20', 'CUCUTA', 1, 2, 1, '', 1, 12, 2, 5, 2),
(14, '1090366280', 1, 'CUCUTA', 'ROGER ESNEIDER', 'GARCIA BASTOS', '1986-04-09', 'CUCUTA', 1, 4, 1, '', 1, 13, 3, 5, 3),
(15, '1090472735', 1, 'CUCUTA', 'JEFFERSON FERNANDO', 'WILCHES MELANO', '1994-02-03', 'CUCUTA', 1, 2, 1, '', 1, 14, 3, 5, 2),
(16, '13412651', 1, 'ARBOLEDAS', 'JOSE PATROCINIO', 'CARDENAS CONTRERAS', '1980-01-10', 'ARBOLEDAS', 1, 4, 3, '', 1, 15, 4, 6, 2),
(17, '1090412304', 1, 'CUCUTA', 'NELSON ENRIQUE ', 'CARDENAS GARZON', '1989-11-09', 'CUCUTA', 1, 2, 3, 'cardenas_nelson@hotmail.com', 1, 16, 4, 3, 2),
(18, '88208024', 1, 'CUCUTA', 'JAVIER EDUARDO', 'MOROS HERNANDEZ', '1973-08-16', 'CUCUTA', 1, 2, 3, '', 1, 17, 4, 3, 3),
(19, '6613598', 1, 'TIPACOQUE', 'FREDY ALBERTO', 'REINA GALLO', '1983-01-14', 'TIPACOQUE', 1, 4, 3, '', 1, 18, 4, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_celular`
--

CREATE TABLE `persona_has_celular` (
  `persona_id` int(11) NOT NULL,
  `celular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_has_celular`
--

INSERT INTO `persona_has_celular` (`persona_id`, `celular_id`) VALUES
(1, 3),
(3, 7),
(4, 11),
(5, 14),
(6, 18),
(7, 19),
(8, 23),
(9, 27),
(10, 32),
(11, 36),
(12, 40),
(13, 44),
(14, 48),
(15, 52),
(16, 53),
(17, 54),
(18, 55),
(19, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `idpuesto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `empresa_idempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idpuesto`, `nombre`, `empresa_idempresa`) VALUES
(-1, 'SELECCIONE', 1),
(1, 'ALIADOS EN SALUD', 1),
(2, 'ADMINISTRACION CVS', 1),
(3, 'RELEVOS', 1),
(4, 'CONJUNTO PORTAL DE BOCONO', 1),
(5, 'OPERACIONES CVS', 1),
(6, 'CONDOMINIO VALLES DEL ESTE', 1),
(7, 'CANAPRONORT', 1),
(8, 'CONDOMINIO CONJUNTO CERRADO EL RESUMEN', 1),
(9, 'COLEGIO COMFANORTE', 1),
(10, 'ORGANIZACION LA ESPERANZA', 1),
(11, 'PUBLICIDAD RINCON', 1),
(12, 'CENTRO DE ESPECIALISTAS JERICO', 1),
(13, 'INMOBILIARIA TONCHALA', 1),
(14, 'CONDOMINIO SAN ISIDRO', 1),
(15, 'COMFANORTE GUAYABALES', 1),
(16, 'COMFANORTE JARDIN SOCIAL TRIGAL ', 1),
(17, 'ESCUELA BIBLICA YESHUA', 1),
(18, 'CENTRO MEDICO ESPECIALISTA DEL SENO', 1),
(19, 'EXCALIBUR', 1),
(20, 'COMFANORTE CDI ESPERANZA AMOR Y PAZ', 1),
(21, 'EDIFICIO ALCAZABA', 1),
(22, 'COOPETROL', 4),
(23, 'CANAPRONORT', 2),
(24, 'COMFANORTE GUAYABALES', 2),
(25, 'FUNDACION MEDICO PREVENTIVA', 3),
(26, 'COMFANORTE OFICINA ADMINISTRATIVA', 3),
(27, 'CANAPRONORT', 2),
(28, 'FUNDACION MEDICO PREVENTIVA', 3),
(29, 'COOPETROL', 4),
(30, 'COTRASUR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roll`
--

CREATE TABLE `roll` (
  `idroll` int(11) NOT NULL,
  `roll_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roll`
--

INSERT INTO `roll` (`idroll`, `roll_nombre`) VALUES
(1, 'administrador'),
(2, 'invitado'),
(3, 'vip');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud_pension`
--

CREATE TABLE `salud_pension` (
  `id` int(11) NOT NULL,
  `salud` int(11) NOT NULL,
  `pension` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salud_pension`
--

INSERT INTO `salud_pension` (`id`, `salud`, `pension`, `persona_id`) VALUES
(1, 22, 1, 1),
(2, 22, -1, 3),
(3, 17, -1, 4),
(4, 4, -1, 5),
(5, 22, 2, 6),
(6, 18, 2, 7),
(7, 12, 5, 8),
(8, 22, 2, 9),
(9, 18, 5, 10),
(10, 22, 1, 11),
(11, 22, 1, 12),
(12, 22, 2, 13),
(13, 22, 2, 14),
(14, 18, 2, 15),
(15, 4, 5, 16),
(16, 4, 5, 17),
(17, 22, 5, 18),
(18, 22, 5, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vigilancia`
--

CREATE TABLE `tipo_vigilancia` (
  `id` int(11) NOT NULL,
  `tipo_vigilancia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_vigilancia`
--

INSERT INTO `tipo_vigilancia` (`id`, `tipo_vigilancia`) VALUES
(-1, 'SELECCIONE'),
(1, 'NO APLICA'),
(2, 'MEDIOS TECNOLOGICOS'),
(3, 'VIGILANCIA'),
(4, 'ESCOLTA'),
(5, 'SUPERVISOR'),
(6, 'COMERCIAL');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `todo_view2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `todo_view2` (
`id` int(11)
,`cedula` varchar(15)
,`nacionalidad` int(11)
,`cedula_lugar_expedicion` varchar(200)
,`nombres` varchar(100)
,`apellidos` varchar(100)
,`fechaNacimiento` date
,`lugar_nacimiento` varchar(200)
,`sexo` int(11)
,`grupo_sanguineo` int(11)
,`estado_civil` int(11)
,`correo` varchar(100)
,`estado` int(11)
,`cargo_id` int(11)
,`nivel_vigilancia_id_p` int(11)
,`tipo_vigilancia_id` int(11)
,`libreta` int(11)
,`direccion` text
,`barrio` varchar(200)
,`estudio_seguridad` date
,`examen_medico` date
,`prueba_psicotecnica` date
,`nivel_academico` int(11)
,`nivel_vigilancia` int(11)
,`fecha_curso` date
,`nit_escuela` varchar(45)
,`cnsc` varchar(45)
,`fecha_acre_super` date
,`acta_consejo` varchar(100)
,`fecha_aceptacion` date
,`psicofisico` varchar(45)
,`fecha_examen_psicofisico` date
,`carnet_supervigilancia_idcarne` int(11)
,`salud` int(11)
,`pension` int(11)
,`idbanco` int(11)
,`banco_nombre` varchar(45)
,`numero_cuenta` varchar(45)
,`coop_nombre` varchar(10)
,`coop_fecha` date
,`coop_nit` varchar(45)
,`fecha_ingreso` date
,`id_cargo` int(11)
,`empresa_idempresa` int(11)
,`nombre_empresa` varchar(400)
,`area_empresa_idarea_emp` int(11)
,`nom_area` varchar(100)
,`cargo_empreso_idcargo` int(11)
,`nom_cargo` varchar(100)
,`puesto_idpuesto` int(11)
,`puesto_nombre` varchar(45)
,`Empresa_p_idEmpresa_p` int(11)
,`Empresa_p_nombre` varchar(400)
,`edad` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `usuario_nombre` varchar(250) DEFAULT NULL,
  `usuario_correo` varchar(250) DEFAULT NULL,
  `usuario_pass` varchar(400) DEFAULT NULL,
  `cargo_empreso_idcargo` int(11) DEFAULT NULL,
  `user_activation_code` varchar(400) DEFAULT NULL,
  `user_email_status` enum('NO VERIFICADO','VERIFICADO') DEFAULT NULL,
  `roll_idroll` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `cedula`, `usuario_nombre`, `usuario_correo`, `usuario_pass`, `cargo_empreso_idcargo`, `user_activation_code`, `user_email_status`, `roll_idroll`, `estado`) VALUES
(1, '', 'GLORIA AMPARO  GARCIA BOTELLO', 'conta2@coopvigsan.com.co', 'f94623c1fde037346acfd664f32a1c7d', 5, '9a3108b574ff8e8164e53909bfd4b597', 'NO VERIFICADO', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `varios_empresa`
--

CREATE TABLE `varios_empresa` (
  `idvarios_empresa` int(11) NOT NULL,
  `cnsc` varchar(45) DEFAULT 'NO REGISTRA',
  `fecha_acre_super` date DEFAULT NULL,
  `acta_consejo` varchar(100) DEFAULT '0000',
  `fecha_aceptacion` date DEFAULT NULL,
  `psicofisico` varchar(45) DEFAULT NULL,
  `fecha_examen_psicofisico` date DEFAULT NULL,
  `carnet_supervigilancia_idcarne` int(11) DEFAULT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `varios_empresa`
--

INSERT INTO `varios_empresa` (`idvarios_empresa`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`) VALUES
(1, 'NO REGISTRA', '0000-00-00', '904', '2010-10-07', '0000-00-00', '0000-00-00', 1, 1),
(2, 'NO REGISTRA', '0000-00-00', '1060', '2013-04-20', '0000-00-00', '0000-00-00', 1, 3),
(3, 'ECSP1223-D562368', '2018-05-04', '1162', '2017-01-21', '0000-00-00', '2019-02-08', 1, 4),
(4, 'NO REGISTRA', '0000-00-00', '348', '1999-02-19', '0000-00-00', '0000-00-00', 1, 5),
(5, 'NO REGISTRA', '0000-00-00', '1198', '2018-09-15', '0000-00-00', '0000-00-00', 1, 6),
(6, 'ECSP1223-F217993', '0000-00-00', '0000', '0000-00-00', '0000-00-00', '0000-00-00', 1, 7),
(7, 'NO REGISTRA', '0000-00-00', '825', '2008-07-28', '0000-00-00', '0000-00-00', 1, 8),
(8, 'NO REGISTRA', '0000-00-00', '0000', '0000-00-00', '0000-00-00', '0000-00-00', 1, 9),
(9, 'ECSP2189-C308917', '0000-00-00', '1204', '2018-11-24', 'SI', '2018-12-10', -1, 10),
(10, 'ECSP1223-F216809', '2019-12-26', '1117', '2015-02-17', 'SI', '2018-12-18', -1, 11),
(11, 'ECSP1223-F225320', '2020-06-05', '1166', '2017-03-18', '', '0000-00-00', 1, 12),
(12, 'ECSP1223-F225319', '2020-06-05', '1128', '2015-06-20', 'SI', '2019-04-10', 5, 13),
(13, 'ECSP1223-F225324', '2019-06-19', '', '0000-00-00', '19/02/2018', '2018-02-19', 5, 14),
(14, 'ECSP1223-F225337', '2019-02-26', '1184', '2018-01-20', 'SI', '2019-02-26', 5, 15),
(15, 'ECSP2196-F274691', '0000-00-00', '1225', '2019-05-17', 'SI', '0000-00-00', -1, 16),
(16, '', '0000-00-00', '1225', '2019-05-17', '', '0000-00-00', -1, 17),
(17, 'ECSP2196-F274690', '0000-00-00', '1225', '2019-05-17', '', '0000-00-00', -1, 18),
(18, 'ECSP2196-F274689', '0000-00-00', '1225', '2019-05-17', '', '0000-00-00', -1, 19);

-- --------------------------------------------------------

--
-- Estructura para la vista `todo_view2`
--
DROP TABLE IF EXISTS `todo_view2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `todo_view2`  AS  select `per`.`id` AS `id`,`per`.`cedula` AS `cedula`,`per`.`nacionalidad` AS `nacionalidad`,`per`.`cedula_lugar_expedicion` AS `cedula_lugar_expedicion`,`per`.`nombres` AS `nombres`,`per`.`apellidos` AS `apellidos`,`per`.`fechaNacimiento` AS `fechaNacimiento`,`per`.`lugar_nacimiento` AS `lugar_nacimiento`,`per`.`sexo` AS `sexo`,`per`.`grupo_sanguineo` AS `grupo_sanguineo`,`per`.`estado_civil` AS `estado_civil`,`per`.`correo` AS `correo`,`per`.`estado` AS `estado`,`per`.`cargo_id` AS `cargo_id`,`per`.`nivel_vigilancia_id_p` AS `nivel_vigilancia_id_p`,`per`.`tipo_vigilancia_id` AS `tipo_vigilancia_id`,`per`.`libreta` AS `libreta`,`dom`.`direccion` AS `direccion`,`dom`.`barrio` AS `barrio`,`fp`.`estudio_seguridad` AS `estudio_seguridad`,`fp`.`examen_medico` AS `examen_medico`,`fp`.`prueba_psicotecnica` AS `prueba_psicotecnica`,`es`.`nivel_academico` AS `nivel_academico`,`es`.`nivel_vigilancia` AS `nivel_vigilancia`,`es`.`fecha_curso` AS `fecha_curso`,`es`.`nit_escuela` AS `nit_escuela`,`ve`.`cnsc` AS `cnsc`,`ve`.`fecha_acre_super` AS `fecha_acre_super`,`ve`.`acta_consejo` AS `acta_consejo`,`ve`.`fecha_aceptacion` AS `fecha_aceptacion`,`ve`.`psicofisico` AS `psicofisico`,`ve`.`fecha_examen_psicofisico` AS `fecha_examen_psicofisico`,`ve`.`carnet_supervigilancia_idcarne` AS `carnet_supervigilancia_idcarne`,`sp`.`salud` AS `salud`,`sp`.`pension` AS `pension`,`ban`.`idbanco` AS `idbanco`,`ban`.`banco_nombre` AS `banco_nombre`,`ban`.`numero_cuenta` AS `numero_cuenta`,`cop`.`coop_nombre` AS `coop_nombre`,`cop`.`coop_fecha` AS `coop_fecha`,`cop`.`coop_nit` AS `coop_nit`,`carg`.`fecha_ingreso` AS `fecha_ingreso`,`carg`.`id` AS `id_cargo`,`carg`.`empresa_idempresa` AS `empresa_idempresa`,`emp`.`nombre_empresa` AS `nombre_empresa`,`carg`.`area_empresa_idarea_emp` AS `area_empresa_idarea_emp`,`areaemp`.`nom_area` AS `nom_area`,`carg`.`cargo_empreso_idcargo` AS `cargo_empreso_idcargo`,`cargemp`.`nom_cargo` AS `nom_cargo`,`carg`.`puesto_idpuesto` AS `puesto_idpuesto`,`puesto_p`.`nombre` AS `puesto_nombre`,`carg`.`Empresa_p_idEmpresa_p` AS `Empresa_p_idEmpresa_p`,`emp_p`.`Empresa_p_nombre` AS `Empresa_p_nombre`,timestampdiff(YEAR,`per`.`fechaNacimiento`,curdate()) AS `edad` from (((((((((((((`persona` `per` join `domicilio` `dom` on((`per`.`id` = `dom`.`persona_id`))) join `fechas_particulares` `fp` on((`per`.`id` = `fp`.`persona_id`))) join `estudio` `es` on((`per`.`id` = `es`.`persona_id`))) join `varios_empresa` `ve` on((`per`.`id` = `ve`.`persona_id`))) join `salud_pension` `sp` on((`per`.`id` = `sp`.`persona_id`))) join `banco` `ban` on((`per`.`id` = `ban`.`persona_id`))) join `cooperativismo` `cop` on((`per`.`id` = `cop`.`persona_id`))) join `cargo` `carg` on((`per`.`cargo_id` = `carg`.`id`))) join `empresa` `emp` on((`carg`.`empresa_idempresa` = `emp`.`idempresa`))) join `area_empresa` `areaemp` on((`carg`.`area_empresa_idarea_emp` = `areaemp`.`idarea_emp`))) join `cargo_empreso` `cargemp` on((`carg`.`cargo_empreso_idcargo` = `cargemp`.`idcargo`))) join `puesto` `puesto_p` on((`carg`.`puesto_idpuesto` = `puesto_p`.`idpuesto`))) join `empresa_p` `emp_p` on((`carg`.`Empresa_p_idEmpresa_p` = `emp_p`.`idEmpresa_p`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_empresa`
--
ALTER TABLE `area_empresa`
  ADD PRIMARY KEY (`idarea_emp`),
  ADD KEY `fk_area_empresa_empresa1_idx` (`empresa_idempresa`);

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`idbanco`),
  ADD KEY `fk_banco_persona_idx` (`persona_id`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cargo_empresa1_idx` (`empresa_idempresa`),
  ADD KEY `fk_cargo_area_empresa1_idx` (`area_empresa_idarea_emp`),
  ADD KEY `fk_cargo_cargo_empreso1_idx` (`cargo_empreso_idcargo`),
  ADD KEY `fk_cargo_puesto1_idx` (`puesto_idpuesto`),
  ADD KEY `fk_cargo_Empresa_p1_idx` (`Empresa_p_idEmpresa_p`),
  ADD KEY `fk_cargo_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `cargo_empreso`
--
ALTER TABLE `cargo_empreso`
  ADD PRIMARY KEY (`idcargo`),
  ADD KEY `fk_cargo_empreso_area_empresa1_idx` (`area_empresa_idarea_emp`);

--
-- Indices de la tabla `carnet_supervigilancia`
--
ALTER TABLE `carnet_supervigilancia`
  ADD PRIMARY KEY (`idcarne`);

--
-- Indices de la tabla `celular`
--
ALTER TABLE `celular`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cooperativismo`
--
ALTER TABLE `cooperativismo`
  ADD PRIMARY KEY (`idcooperativismo`),
  ADD KEY `fk_cooperativismo_persona_idx` (`persona_id`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_domicilio_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`),
  ADD KEY `fk_empresa_Empresa_p1_idx` (`Empresa_p_idEmpresa_p`);

--
-- Indices de la tabla `empresa_p`
--
ALTER TABLE `empresa_p`
  ADD PRIMARY KEY (`idEmpresa_p`);

--
-- Indices de la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estudio_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_familiar_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `familiar_has_celular`
--
ALTER TABLE `familiar_has_celular`
  ADD PRIMARY KEY (`familiar_id`,`celular_id`),
  ADD KEY `fk_familiar_has_celular_celular1_idx` (`celular_id`),
  ADD KEY `fk_familiar_has_celular_familiar1_idx` (`familiar_id`);

--
-- Indices de la tabla `fechas_particulares`
--
ALTER TABLE `fechas_particulares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fechas_particulares_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `nivel_vigilancia`
--
ALTER TABLE `nivel_vigilancia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona_cargo1_idx` (`cargo_id`),
  ADD KEY `fk_persona_nivel_vigilancia1_idx` (`nivel_vigilancia_id_p`),
  ADD KEY `fk_persona_tipo_vigilancia1_idx` (`tipo_vigilancia_id`);

--
-- Indices de la tabla `persona_has_celular`
--
ALTER TABLE `persona_has_celular`
  ADD PRIMARY KEY (`persona_id`,`celular_id`),
  ADD KEY `fk_persona_has_celular_celular1_idx` (`celular_id`),
  ADD KEY `fk_persona_has_celular_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idpuesto`),
  ADD KEY `fk_puesto_empresa1_idx` (`empresa_idempresa`);

--
-- Indices de la tabla `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`idroll`);

--
-- Indices de la tabla `salud_pension`
--
ALTER TABLE `salud_pension`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salud_pension_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `tipo_vigilancia`
--
ALTER TABLE `tipo_vigilancia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_roll1_idx` (`roll_idroll`),
  ADD KEY `fk_usuario_cargo_empreso1_idx` (`cargo_empreso_idcargo`);

--
-- Indices de la tabla `varios_empresa`
--
ALTER TABLE `varios_empresa`
  ADD PRIMARY KEY (`idvarios_empresa`),
  ADD KEY `fk_varios_empresa_carnet_supervigilancia1_idx` (`carnet_supervigilancia_idcarne`),
  ADD KEY `fk_varios_empresa_persona1_idx` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_empresa`
--
ALTER TABLE `area_empresa`
  MODIFY `idarea_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `idbanco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cargo_empreso`
--
ALTER TABLE `cargo_empreso`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `carnet_supervigilancia`
--
ALTER TABLE `carnet_supervigilancia`
  MODIFY `idcarne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `celular`
--
ALTER TABLE `celular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `cooperativismo`
--
ALTER TABLE `cooperativismo`
  MODIFY `idcooperativismo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa_p`
--
ALTER TABLE `empresa_p`
  MODIFY `idEmpresa_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudio`
--
ALTER TABLE `estudio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `fechas_particulares`
--
ALTER TABLE `fechas_particulares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `nivel_vigilancia`
--
ALTER TABLE `nivel_vigilancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `idpuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `roll`
--
ALTER TABLE `roll`
  MODIFY `idroll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salud_pension`
--
ALTER TABLE `salud_pension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipo_vigilancia`
--
ALTER TABLE `tipo_vigilancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `varios_empresa`
--
ALTER TABLE `varios_empresa`
  MODIFY `idvarios_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area_empresa`
--
ALTER TABLE `area_empresa`
  ADD CONSTRAINT `fk_area_empresa_empresa1` FOREIGN KEY (`empresa_idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `banco`
--
ALTER TABLE `banco`
  ADD CONSTRAINT `fk_banco_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`puesto_idpuesto`) REFERENCES `puesto` (`idpuesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cargo_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo_empreso`
--
ALTER TABLE `cargo_empreso`
  ADD CONSTRAINT `fk_cargo_empreso_area_empresa1` FOREIGN KEY (`area_empresa_idarea_emp`) REFERENCES `area_empresa` (`idarea_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cooperativismo`
--
ALTER TABLE `cooperativismo`
  ADD CONSTRAINT `fk_cooperativismo_persona_idx` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_Empresa_p1_idx` FOREIGN KEY (`Empresa_p_idEmpresa_p`) REFERENCES `empresa_p` (`idEmpresa_p`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD CONSTRAINT `estudio_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD CONSTRAINT `familiar_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `familiar_has_celular`
--
ALTER TABLE `familiar_has_celular`
  ADD CONSTRAINT `familiar_has_celular_ibfk_1` FOREIGN KEY (`celular_id`) REFERENCES `celular` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `familiar_has_celular_ibfk_2` FOREIGN KEY (`familiar_id`) REFERENCES `familiar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fechas_particulares`
--
ALTER TABLE `fechas_particulares`
  ADD CONSTRAINT `fechas_particulares_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`nivel_vigilancia_id_p`) REFERENCES `nivel_vigilancia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`tipo_vigilancia_id`) REFERENCES `tipo_vigilancia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`);

--
-- Filtros para la tabla `persona_has_celular`
--
ALTER TABLE `persona_has_celular`
  ADD CONSTRAINT `persona_has_celular_ibfk_1` FOREIGN KEY (`celular_id`) REFERENCES `celular` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_has_celular_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `fk_puesto_empresa1` FOREIGN KEY (`empresa_idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salud_pension`
--
ALTER TABLE `salud_pension`
  ADD CONSTRAINT `salud_pension_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`roll_idroll`) REFERENCES `roll` (`idroll`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cargo_empreso_idcargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `varios_empresa`
--
ALTER TABLE `varios_empresa`
  ADD CONSTRAINT `varios_empresa_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `varios_empresa_ibfk_2` FOREIGN KEY (`carnet_supervigilancia_idcarne`) REFERENCES `carnet_supervigilancia` (`idcarne`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
