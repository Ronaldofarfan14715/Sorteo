-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2018 a las 22:00:22
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supervisionfim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agrupaciones`
--

CREATE TABLE `agrupaciones` (
  `idCursoSeccion` int(11) NOT NULL,
  `codCursofk` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `seccion` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agrupaciones`
--

INSERT INTO `agrupaciones` (`idCursoSeccion`, `codCursofk`, `seccion`) VALUES
(1, 'MB220', 'A'),
(2, 'MB220', 'B'),
(3, 'ML250', 'A'),
(4, 'ML250', 'B'),
(5, 'ML140', 'A-B'),
(6, 'ML140', 'C-D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `codAula` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `capacidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`codAula`, `capacidad`) VALUES
('A2-159', 50),
('A2-160', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `codCurso` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`codCurso`, `nombre`) VALUES
('MB220', 'ANALISIS DE SISTEMAS'),
('MB226', 'VECTORES I'),
('ML140', 'MAQUINARIA PESADA'),
('ML250', 'ELECTRONICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoexamen`
--

CREATE TABLE `cursoexamen` (
  `idExamen` int(11) NOT NULL,
  `idAgrupacionfk` int(11) NOT NULL,
  `idTurnofk` int(11) NOT NULL,
  `codAulafk` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoexamen` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cursoexamen`
--

INSERT INTO `cursoexamen` (`idExamen`, `idAgrupacionfk`, `idTurnofk`, `codAulafk`, `tipoexamen`) VALUES
(1, 1, 38, 'A2-159', 'PARCIAL'),
(2, 2, 38, 'A2-160', 'PARCIAL'),
(3, 5, 38, 'A2-159', 'PARCIAL'),
(4, 3, 18, 'A2-160', 'PARCIAL'),
(5, 4, 38, 'A2-159', 'PARCIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `CODIGO` char(30) DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(31) DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(16) DEFAULT NULL,
  `NOMBRE` varchar(19) DEFAULT NULL,
  `DPTO` varchar(5) DEFAULT NULL,
  `CONDICION` varchar(21) DEFAULT NULL,
  `TELEFONO` varchar(27) DEFAULT NULL,
  `CELULAR` varchar(31) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(70) DEFAULT NULL,
  `OBSERVACION` varchar(11) DEFAULT NULL,
  `DNI` int(8) NOT NULL,
  `PASS` char(4) NOT NULL,
  `DEDIC` varchar(7) DEFAULT NULL,
  `ESTADO` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`CODIGO`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `NOMBRE`, `DPTO`, `CONDICION`, `TELEFONO`, `CELULAR`, `CORREO_ELECTRONICO`, `OBSERVACION`, `DNI`, `PASS`, `DEDIC`, `ESTADO`) VALUES
('20068061J', 'BORJA ', 'BORJA', 'MARIO GAST?N;IA', '', '4984355', '910470997', 'mborjaB@uni.edu.pe', 'ok', '44437165', 0, '0', 'SI', NULL),
('', 'CABALLERO ', 'GALLEGOS', 'ALEX', '', '', '', '', '', '', 1, '1', '', 'NO'),
('', 'CABALLERO ', 'GALLEGOS', 'CHETT', '', '', '', '', '', '', 2, '2', '', 'NO'),
('', 'COLLANTES', ' DIAZ', 'MANUEL', '', '', '', '', '', '', 3, '3', '', 'NO'),
('', 'CORTEZ ', 'REYES', 'GREGORIO', '', '', '', '', '', '', 4, '4', '', 'NO'),
('', 'JIMENEZ ', 'LOPEZ', 'ROCEM', '', '', '', '', '', '', 5, '5', '', 'NO'),
('', 'LLOSA ', 'DEMARTINI ', 'MELCHOR NICOLAS', '', '', '', '', '', '', 6, '6', '', 'SI'),
('', 'ORTIZ ', 'ALVAREZ', 'VICTOR', '', '', '', '', '', '', 7, '7', '', 'NO'),
('', 'PAREDES ', 'CARLOS', 'ANGEL', '', '', '', '', '', '', 8, '8', '', 'NO'),
('', 'PAUCARCHUCO ', 'MUZURRIETA', 'CARLOS', '', '', '', '', '', '', 9, '9', '', 'NO'),
('', 'SAAVEDRA ', 'FARFAN', 'ENRIQUE', '', '', '', '', '', '', 10, '10', '', 'NO'),
('', 'SANTIBA?EZ ', 'GUERRA', 'JOSE', '', '', '', '', '', '', 11, '11', '', 'NO'),
('', 'USCATA ', 'BARRIENTOS', 'JOSUE', '', '', '', '', '', '', 14, '14', '', 'NO'),
('', 'CARRILLO ', 'VILLENA', 'AMADEO', '', '', '', '', '', '', 18, '18', '', 'NO'),
('', 'CUADROS BLAS ', 'JORGE', 'OSCAR', '', '', '', '', '', '', 22, '22', '', 'NO'),
('', 'DE LA CRUZ  ', 'CASA?O', 'CELSO', '', '', '', ' ', '', '', 23, '23', '', 'NO'),
('', 'DEL CARPIO ', 'SALINAS', 'JORGE', '', '', '', '', '', '', 24, '24', '', 'NO'),
('', 'FARRO ', 'RODRIGUEZ', 'JUAN CAMILO', '', '', '', '', '', '', 27, '27', '', 'NO'),
('', 'FERNANDEZ ', 'QUIROZ', 'BORIS EDUARDO', '', '', '', '', '', '', 28, '28', '', 'NO'),
('', 'FIESTAS ', 'SALAZAR', 'CARLOS EDMUNDO', '', '', '', '', '', '', 29, '29', '', 'NO'),
('', 'FIGUEROA ', 'VELAZCO', 'RICHARD', '', '', '', '', '', '', 30, '30', '', 'NO'),
('', 'FLORES ', 'ESCALANTE', 'TORIBIO PERCY', '', '', '', '', '', '', 32, '32', '', 'NO'),
('', 'GAMARRA ', 'CHINCHAY', 'ARTURO PERCY', '', '', '', '', '', '', 33, '33', '', 'NO'),
('', 'GARCIA ', 'TAPIA', 'AZUCENA', '', '', '', '', '', '', 34, '34', '', 'NO'),
('', 'LAZO ', 'RAMOS', 'JONY OLIVER', '', '', '', '', '', '', 37, '37', '', 'NO'),
('', 'MALPICA ', 'RODRIGUEZ', 'NELLY', '', '', '', '', '', '', 40, '40', '', 'NO'),
('', 'MARAVI ', 'PINTO', 'RONALD', '', '', '', '', '', '', 41, '41', '', 'NO'),
('', 'MAS ', 'MONTOYA ', 'LUIS ALBERTO', '', '', '', '', '', '', 43, '43', '', 'NO'),
('', 'MEDINA PROF. FIEE.', '', '', '', '', '', '', '', '', 44, '44', '', 'NO'),
('', 'MEDINA ', 'TEJADA', 'ROLANDO', '', '', '', '', '', '', 45, '45', '', 'NO'),
('', 'MORAN ', 'CARDENAS', 'ANTONIO MANUEL', '', '', '', '', '', '', 46, '46', '', 'NO'),
('', 'N.N.', '', '', '', '', '', '', '', '', 48, '48', '', 'SI'),
('', 'NEYRA ', 'MOREYRA', 'RUBEN PELAYO', '', '', '', '', '', '', 52, '52', '', 'NO'),
('', 'PALMA ', 'GARCIA', 'MODESTO TOMAS', '', '', '', '', '', '', 59, '59', '', 'NO'),
('', 'PAREDES ', 'MACEDO', 'LUIS', '', '', '', '', '', '', 60, '60', '', 'NO'),
('', 'PARRA ', 'OSORIO', 'HERNAN', '', '', '', '', '', '', 61, '61', '', 'NO'),
('', 'PIMENTEL ', 'HERRERA', 'LUZ MARIA', '', '', '', '', '', '', 64, '64', '', 'NO'),
('', 'PIZARRO ', 'PEREYRA ', 'LUIS LORENZO', '', '', '', '', '', '', 65, '65', '', 'NO'),
('', 'PROF. FIEE.', '', '', '', '', '', '', '', '', 68, '68', '', 'NO'),
('', 'PROF. FIEE CARLOS DIAZ', '', '', '', '', '', '', '', '', 70, '70', '', 'NO'),
('', 'PROF. FIEE DOMINGUEZ FIGUEROA', '', '', '', '', '', '', '', '', 71, '71', '', 'NO'),
('', 'MEDINA ', 'RAMIREZ', 'JOSE', '', '', '', '', '', '', 73, '73', '', 'NO'),
('', 'PUYCAN ', 'VERA', 'MIGUEL', '', '', '', '', '', '', 74, '74', '', 'NO'),
('', '?AUPARI ', 'HUATUCO', 'DIONICIO', '', '', '', '', '', '', 75, '75', '', 'NO'),
('', 'PROF. FIEE./ DOMINGUEZ / MEDINA', '', '', '', '', '', '', '', '', 81, '81', '', 'NO'),
('', 'PROF. FIEE./ DOMINGUEZ / PINEDO', '', '', '', '', '', '', '', '', 82, '82', '', 'NO'),
('', 'PROF. FIEE./ FIGUEROA / PUYCAN', '', '', '', '', '', '', '', '', 84, '84', '', 'NO'),
('', 'RAMOS ', 'RODRIGUEZ', 'LEONIDAS DUILIO', '', '', '', '', '', '', 88, '88', '', 'NO'),
('', 'RAMOS ', 'RODRIGUEZ', 'LEONIDAS', '', '', '', '', '', '', 89, '89', '', 'NO'),
('', 'RODRIGUEZ ', 'MACEDO', 'MARIO', '', '', '', '', '', '', 90, '90', '', 'NO'),
('', 'RODRIGUEZ ', 'VALDEZ', 'CARLOS', '', '', '', '', '', '', 92, '92', '', 'NO'),
('', 'ROJAS ', 'SALINAS', 'ARQUIMEDES LORENZO', '', '', '', '', '', '', 93, '93', '', 'NO'),
('', 'ROJAS ', 'TRISTAN', 'LUIS ALBERTO', '', '', '', '', '', '', 94, '94', '', 'NO'),
('', 'ROSEL ', 'GALLEGOS', 'TEODORO', '', '', '', '', '', '', 95, '95', '', 'NO'),
('', 'SAMSONOV ', 'VASSILI', '', '', '', '', '', '', '', 98, '98', '', 'NO'),
('', 'SOLIS ', 'VILLANUEVA', 'REINER ABSALON', '', '', '', '', '', '', 101, '101', '', 'NO'),
('', 'SORIA ', 'PIZARRO', 'ROBERTO PAUL', '', '', '', '', '', '', 102, '102', '', 'NO'),
('', 'SOTELO ', 'NEYRA', 'VICTOR', '', '', '', '', '', '', 103, '103', '', 'NO'),
('', 'SOTO ', 'LOCK', 'ALBERTO', '', '', '', '', '', '', 104, '104', '', 'NO'),
('', 'SOTO ', 'TORRES', 'ERNESTO HUBERT', '', '', '', '', '', '', 105, '105', '', 'NO'),
('', 'SUSLOV ', '', 'ALEXANDER', '', '', '', '', '', '', 106, '106', '', 'NO'),
('', 'TAMASHIRO ', 'HIGA', 'JAVIER', '', '', '', '', '', '', 107, '107', '', 'NO'),
('', 'TEODOSIO ', 'CASTILLO', 'JENNY MERCEDES', '', '', '', '', '', '', 108, '108', '', 'NO'),
('', 'VALDERRAMA ', 'ROMERO', 'ANDRES', '', '', '', '', '', '', 109, '109', '', 'NO'),
('', 'VARGAS ', 'TAMANI', 'BRUNO ELIO', '', '', '', '', '', '', 113, '113', '', 'NO'),
('', 'VEGA SCHMIDT ', 'CHARLES', 'JULIO RODRIGO', '', '', '', '', '', '', 114, '114', '', 'NO'),
('', 'VELASCO ', 'STOLL', 'HERNAN RAMON', '', '', '', '', '', '', 115, '115', '', 'NO'),
('', 'VENTURA ', 'HUAYANCA', 'LUIS', '', '', '', '', '', '', 116, '116', '', 'NO'),
('', 'ZARATE ', 'TAIPE', 'CESAR', '', '', '', '', '', '', 123, '123', '', 'NO'),
('', 'ACCHANCARAY', 'DIAZ', '', '', '', '', '', '', '', 124, '124', '', 'NO'),
('', 'VARGAS ', 'GRANILLA', 'JUSTO REYNALDO', '', '', '', '', '', '', 112444, '1124', '', 'NO'),
('', 'TOVAR ', 'LANDEO', 'RENATO', '', '', '', '', '', '', 113221, '1132', '', 'NO'),
('20168119J', 'CUTY ', 'CLEMENTE', 'EDDY ROBERTO', 'CI', 'No dicta este P.A', '4597213', '993492601', 'eccl@consultant.com; eccl@scientist.com', '', 4597213, '4597', 'PP', 'SI'),
('19958273G', 'FRANCO ', 'GONZALES', 'ELMAR JAVIER', 'IA', '', '4344135', '998672248', 'jfranco@javfrank.com', 'ok', 4641264, '4641', 'TC', 'SI'),
('19978762C', 'TELLO ', 'GODOY', 'EDWIN', 'CB', '', '', '967840859', 'etello@uni.edu.pe ', 'ok', 6012665, '6012', 'TC', 'SI'),
('', 'AGUINAGA ', 'MORENO', 'JORGE ALBERTO', '', '', '', '', '', '', 6055659, '6055', 'TP', 'NO'),
('', 'PAZ ', 'LOPEZ', 'HECTOR ALBERTO', '', '', '', '', '', '', 6074021, '6074', 'TP', 'NO'),
('19988252H', 'ESTRADA', ' PITA ', 'JULIO CESAR', 'CI', '', '', '995668265', 'julioestrada0509@yahoo.es', 'ok', 6082289, '6082', 'TP', 'SI'),
('19858136H', 'CABALLERO ', 'TORRES', 'EDUARDO GUMERCINDO', 'CB', '', '3366466', '990193280', 'ecaballero54@gmail.com', 'ok', 6098327, '6098', 'TC', 'SI'),
('19788666C', 'RIOS ', 'GALDO', 'RUBEN DARIO', 'CI', '', '3309438', '971125679', 'rudarglima172@yahoo.es', 'ok', 6101723, '6101', 'DE', 'SI'),
('19858011K', 'ABREGU ', 'LEANDRO', 'EDWIN ASENCION', 'CI', '', '', '998733567', 'edwin.abregu@gmail.com', 'ok', 6102751, '6102', 'DE', 'SI'),
('19788441A', 'LIRA ', 'CACHO', 'JUAN GUILLERMO', 'CI', '', '4825796', '993244169, 992331589', 'glira@uni.edu.pe', 'ok', 6128412, '6128', 'DE', 'SI'),
('19788355H', 'HUAPAYA ', 'BAUTISTA', ' ALEJANDRO ORLANDO', 'CI-IA', '', '', '955332453', '10aahuaba@gmail.com', 'ok', 6217811, '6217', 'TC', 'SI'),
('19778713I', 'SALAZAR ', 'BELLIDO', 'ISRAEL AMERICO', 'CI', '', '4855298', '996777113, 990355868', 'isalazar@osinerg.gob.pe', '', 6219412, '6219', 'TP', 'SI'),
('19978303- I', 'GARCIA ', 'RODAS', 'WILFREDO', 'CB', '', '5671860', '989884593', 'wgarcia@uni.edu.pe', 'ok', 6236525, '6236', 'TC', 'SI'),
('', 'LUYO ', 'CAYCHO', 'CLEMENTE', '', '', ' ', '', '', '', 6270770, '6270', '', 'NO'),
('', 'SIERRA ', 'ACOSTA', 'JULIO CESAR', '', '', '', '', '', '', 6272569, '6272', 'TP', 'NO'),
('19988762F', 'TARAZONA ', 'BERMUDEZ', 'BERNABE ALBERTO', 'CI/IA', '', '5231353', '945288078', 'btarazona@uni.edu.pe; btarazona@ciplima.org.pe', 'ok', 6294611, '6294', 'TC', 'SI'),
('19828715J', 'SINCHI ', 'YUPANQUI', 'FRANCISCO EDILBERTO', 'CI', '', '4520177', '996356950', 'fsinchi@uni.edu.pe', 'ok', 6417352, '6417', 'TC', 'SI'),
('', 'RETAMOSO ', 'ROJAS', 'MANUEL AMADOR', '', '', '', '', '                 ', '', 6426191, '6426', 'TP', 'SI'),
('19978002I', 'ACOSTA ', 'PASTOR', 'VICTOR NILO', 'IA', 'Licencia', '4217707', '999771904', 'vacosta@uni.edu.pe; ', 'ok', 6428986, '6428', 'TC', 'SI'),
('', 'ACOSTA ', 'SOLORZANO', 'WILLIAMS', '', '', '', '', '', '', 6434186, '6434', 'TP', 'NO'),
('20008604G', 'PRADA', 'VEGA', 'SOLON PEDRO LUIS', 'CB', '', '4362892', '961216187', 'pprada42@gmail.com', 'ok', 6598773, '6598', 'TC', 'SI'),
('', 'TELLO ', 'GALVEZ', 'JULIO CESAR', '', '', '', '', '', '', 6723748, '6723', 'TP', 'NO'),
('19798003G', 'AREVALO ', 'DUE?AS', 'ANTONIO', 'CI', '', '', '993321446', 'toniarev@hotmail.com', 'ok', 6725737, '6725', 'TC', 'SI'),
('19938136D', 'CASTRO ', 'SALGUERO', 'ROBERT GERARDO', 'CB', 'se jubilo ', '', '995070831', 'robcas@uni.edu.pe; robcas12002@yahoo.com', 'ok', 6756101, '6756', 'TC', 'SI'),
('19978125C', 'CORTEZ ', 'GALINDO', 'CANCIO NICOLAS', 'IA', 'No dicta este P.A', '', '949837179', 'cancio@uni.edu.pe; waracon@yahoo.es', 'ok', 6805109, '6805', 'TC', 'SI'),
('19878351A', 'HUAMAN ', 'LADERA', 'FLOREN ACEL', 'IA-CI', '', '4586987', '995536940', 'huaman1942@gmail.com', 'ok', 6828263, '6828', 'TC', 'SI'),
('19858308C', 'GONZALES ', 'CHAVEZ', 'SALOME', 'CI-IA', '', '4469490', '999749357', 'salome@uni.edu.pe', 'ok', 6926519, '6926', 'TC', 'SI'),
('19928665D', 'ROSAS ', 'MARTINEZ', 'NESTOR', 'CB', '', '5255226', '999156125', 'nrosas@urp.edu.pe; nrosas@uni.edu.pe; nmartinez_34@hotmail.com', '', 6931603, '6931', 'TP 20 h', 'SI'),
('19778064K', 'BEJARANO ', 'LINARES', 'EDWIN RUBEN', 'CI', 'Licencia', '', '948237946', 'transportesfaro@hotmail.com', 'ok', 7008160, '7008', 'TC', 'SI'),
('FALTA', 'PINEDA ', 'LEON', 'ROBERTO', '', '', '', '', '', '', 7119662, '7119', 'TP', 'SI'),
('', 'TICONA ', 'MULLICASACA', 'MARIO', '', '', '', '', '', '', 7126187, '7126', '', 'NO'),
('19898304I', 'GODOFREDO ', 'VALDIVIA', 'FAUSTO ISRAEL', 'CI', '', '4606520', '997639165', 'faustogodo@hotmail.com , fgodofredo@uni.edu.pe', 'ok', 7160486, '7160', 'TC', 'SI'),
('19858313G', 'GUADALUPE ', 'GO?AS', 'EDGARD', 'IA', '', '5260982', '996759138', 'edgardguadalupe@yahoo.com', 'ok', 7175080, '7175', 'TC', 'SI'),
('', 'PADILLA ', 'RIOS', 'AURELIO MARCELO', '', '', '', '', '', '', 7188676, '7188', 'TC', 'NO'),
('19838561E', '?IQUE ', 'ALVAREZ', 'ROSA INES', 'CB', '', '2740974 ,044232081', '997745082', 'rosanique@hotmail.com rnique@uni.edu.pe', 'ok', 7196900, '7196', 'TC', 'SI'),
('', 'MURILLO ', 'MANRIQUE', 'JESUS HUBER', '', '', '', '', '', '', 7206585, '7206', '', 'NO'),
('19758129J', 'CUEVA ', 'PACHECO', 'RONALD', 'CI', '', '3320111', '', 'NO TIENE', '', 7220688, '7220', 'TC', 'NO'),
('19858825H', 'VASQUEZ ', 'ALVA', 'DARIO', 'CB', '', '', '990410957', 'dvasquez@uni.edu.pe', 'ok', 7223627, '7223', 'TC', 'SI'),
('19898677J', 'RAVELO ', 'CHUMIOQUE', 'JOSE JAIME', 'CI-IA', '', '3326632', '997890837', 'jaimer77@yahoo.com', 'ok', 7226544, '7226', 'TC', 'SI'),
('19798716C', 'SIFUENTES ', 'SANCHO', 'JORGE FAVIO', 'CI', '', '6547295', '987359387', 'jorge5042@gmail.com', 'ok', 7228604, '7228', 'TC', 'SI'),
('', 'MERZTHAL ', 'TORANZO', 'JORGE BALTAZAR', '', '', '', '', '', '', 7233865, '7233', 'TP', 'NO'),
('19688581F', 'OLIVEROS ', 'DONOHUE', 'ALFREDO ALCIDES', 'IA', '', '4638426', '997978045', 'edevialf2@yahoo.es', '', 7238879, '7238', 'TP', 'SI'),
('19868132E', 'CHAU ', 'CHAU', 'JORGE SANTIAGO', 'IA', '', '', '933081278', 'jorgeschau@gmail.com', 'ok', 7305855, '7305', 'TC', 'SI'),
('20138825C', 'VILLALOBOS ', 'SAAVEDRA', ' ORLANDO', 'CB', 'no dicta este periodo', '3921625', '994785831', 'mavipa11999@hotmail.com', 'ok', 7360099, '7360', 'TP 06', 'SI'),
('20138420C', 'KUROKAWA ', 'GUERREROS', 'MANUEL', 'CB', '', '2658209', '994728982', 'mankuro@hotmail.com', 'ok', 7360926, '7360', 'TC', 'SI'),
('19988581A', 'OSORIO ', 'MALDONADO', 'DANIEL', 'CB', '', '3240076', '999265649, 956721459', 'daosma@gmail.com', 'ok', 7372295, '7372', 'TC', 'SI'),
('', 'MASIAS ', 'GUILLEN', 'JOSE', '', '', '', '', '', '', 7462359, '7462', 'TP', 'NO'),
('20018663F', 'RODRIGUEZ ', 'BUSTINZA', 'RICARDO RAUL', 'IA', '', '3462054', '989730215', 'robust@uni.edu.pe', 'ok', 7543266, '7543', 'TC', 'SI'),
('19738214A', 'DORREGARAY ', 'SEGURA', 'FERNANDO', '', '', '', '', '', '', 7561470, '7561', 'TP', 'SI'),
('19748309E', 'GOMEZ SANCHEZ ', 'SOTO', 'RUBEN', 'IA', '', '4406732- 4219645', '99803110', 'rubengom01@hotmail.com;rgomezsanchez@gmail.com', 'ok', 7575995, '7575', 'TP', 'SI'),
('19848717H', 'SILVA ', 'TORRES', 'JOSE', 'CI', '', '3495344', '995049520', 'jsilvatorres@uni.edu.pe', 'ok', 7612906, '7612', 'TC', 'SI'),
('19888015D', 'AVILA ', 'TOVAR', 'JORGE TEODORO', 'CI', '', '4230431', '9942732330, 9589182062', 'javilatovar@yahoo.es', 'ok', 7629970, '7629', 'TC', 'SI'),
('20168212J', 'DEL CARPIO ', 'DAMIAN', 'CHRISTIAN CARLOS', 'IA', '', '', '997936110', 'cdelcarpiod@gmail.com', 'ok', 7642946, '7642', 'TP', 'SI'),
('', 'ONOFRE ', 'CHAVEZ', 'SALVADOR FELIX', '', '', '', '', '', '', 7666535, '7666', 'TP', 'NO'),
('19998823H', 'VIDAL ', 'BARRENA', 'VICTOR BEDER', 'CB', '', '2262682', '998951017', 'bedervidal@yahoo.es; victor.beder@gmail.com', '', 7699794, '7699', 'TP 20 h', 'SI'),
('', 'BERROCAL ', 'CURIEL', 'OSWALDO', '', '', '', '', '', '', 7718464, '7718', '', 'NO'),
('19878305J', 'GARRIDO ', 'JUAREZ', 'ROSA MERCEDES', 'CB-IA', '', '2637931', '998672130, 962224368', 'rgarrido@uni.edu.pe; mercedes3973@gmail.com', 'ok', 7719743, '7719', 'TC', 'SI'),
('19878669A', 'RIVERA ', 'CASTILLA', 'SAMUEL VLADIMIR', 'CB-IA', '', '2257212', '993544041', 'samrivcas@yahoo.com', 'ok', 7722877, '7722', 'TP 12h', 'SI'),
('19898802I', 'UGARTE ', 'LOPEZ', 'CESAR BAYARDO', 'CI', '', '4617668', '984984087', 'cbugartelgmail.com', 'ok', 7726303, '7726', 'TC', 'SI'),
('20008827F', 'VILLANUEVA ', 'DULUDE', 'CARLOS ROBERTO', 'IA-CI', '', '2630941 , 4131138', '988381964', 'cvilladul@hotmail.com', 'ok', 7729089, '7729', 'TP', 'SI'),
('19888013A', 'AGUILAR ', 'ROBLES', 'GREGORIO', 'IA', '', '5370138 - 2256789 ', '999436349, 4215379', 'gaguilar@osinerg.gob.pe ; gaguilar@uni.edu.pe', 'ok', 7734016, '7734', 'TC', 'SI'),
('', 'REYES ', 'CAMPANA', 'VICTOR MANUEL', '', '', '', '', '', '', 7755012, '7755', 'TC', 'NO'),
('19848353F', 'HUAMAN DEL PINO', 'DE ROSSI', 'LILIANA  CONCEPCION', 'CB', '', '5644266', '995797079', 'lilihp2001@yahoo.es', 'ok', 7764962, '7764', 'TC', 'SI'),
('', 'ALMENARA ', 'MEREL', 'CLAUDIO ARTURO', '', '', '', '', '', '', 7771651, '7771', 'TC', 'NO'),
('', 'VIDAL ', 'DOMINGUEZ', 'EMILIO DAVID', '', '', '', '', '', '', 7802928, '7802', 'TC', 'NO'),
('19878441K', 'LASTRA ', 'ESPINOZA', 'LUIS ANTONIO', 'CI', 'Decano Fim', '4376724,- 2500379', '993044589, 942753010', 'llastra@uni.edu.pe', '', 7826166, '7826', 'TP', 'NO'),
('19798125E', 'CHAVEZ ', 'LIZAMA', 'FEDERICO FRANCISCO', 'CI', '', '4662721', '999454366', 'fechali25@hotmail.com', 'ok', 7833732, '7833', 'TC', 'SI'),
('', 'PINEDO ', 'SAAVEDRA', 'GUIDO ALFREDO', '', '', '', '', '', '', 7834010, '7834', 'TC', 'NO'),
('19978003E', 'ARZAPALO ', 'GUERE', 'JONATAN JONAS', 'CI', '', '', '939102137', 'jarzapalo@uni.edu.pe; arzapalo_jmotor@hotmail.com', 'ok', 7855333, '7855', 'TC', 'SI'),
('19978442I', 'LUQUE ', 'BRAZAN', 'EMILIO PIERO', 'CB', '', '', '947213028', 'pieroluqueb@hotmail.com', 'ok', 7899479, '7899', 'TC', 'SI'),
('19788804G', 'VILLANUEVA ', 'URE', 'JUSTO REYNALDO', 'IA', '', '4627178', '947480639', 'rvillanuevaure@yahoo.es', 'ok', 7910491, '7910', 'TC', 'SI'),
('', 'MORAN ', 'MORAN', 'SANTIAGO ENRIQUE', '', '', '', '', '', '', 7933703, '7933', '', 'NO'),
('19768007D', 'AGUILAR ', 'VIZCARRA', 'DUILIO LEONCIO', 'CI-IA', '', '2743632, 462-4092, 433-5191', '999090191, 992272650', 'daguilar@uni.edu.pe; aguilav15@gmail.com', 'ok', 7942586, '7942', 'TC', 'SI'),
('19728260K', 'ESPINOZA', ' PAREDES', 'RAFAEL LEONARDO', 'IA', '', '4618008', '954812662', '; respinoza@uni.edu.pe;', 'ok', 7944763, '7944', 'TC', 'SI'),
('19858720A', 'SANCHEZ ', 'TARNAWIECKI', 'LUIS ENRIQUE', 'CI', '', '3654721, 5232461', '999682349 (esposa Violeta)', 'lsanchez1956tar@yahoo.es', 'ok', 7951899, '7951', 'TC', 'SI'),
('19778127B', 'CASAS ', 'MARTINEZ', 'MOISES ELIAS', 'CI', '', '4712680', '999950345', 'moisescasas7@yahoo.com.pe', 'ok', 7953147, '7953', 'TP', 'SI'),
('19908508K', 'MU?OZ ', 'MEDINA', 'CARLOS ALBERTO', 'IA', '', '4647690', '987962063', 'coviems@terra.com.pe; carlos55mm@yahoo.es', '', 7959316, '7959', 'TP', 'SI'),
('', 'RUIZ ', 'LIZAMA', 'EDGAR', '', '', '', '', '', '', 8004558, '8004', 'TP', 'NO'),
('', 'ZENTENO', 'CLEMENTE', 'VICTOR POMPEYO', '', '', '', '', '', '', 8046470, '8046', 'TP', 'NO'),
('19978128B', 'CASADO ', 'MARQUEZ', 'JOSE MARTIN', 'CB-IA', '', '5269260', '990545534', ' jocasadom@yahoo.es', 'ok', 8056189, '8056', 'TC', 'SI'),
('19788601I', 'PINTO ', 'ESPINOZA', 'HERNAN JOSUE', 'CI', '', '4822066', '991360422', 'hpintoe@yahoo.es', 'ok', 8064124, '8064', 'TC', 'SI'),
('19808311K', 'GUTIERREZ ', 'JAVE', 'EDMUNDO ESMARD', 'CI', '', '5251968', '', 'eegj100@hotmail.com', 'ok', 8064808, '8064', 'DE', 'SI'),
('19778727J', 'SALAZAR ', 'BOBADILLA', 'ALEJANDRO', 'CI', '', '', '', 'asalazar@uni.edu.pe', '', 8071456, '8071', 'TC', 'SI'),
('19808825D', 'VERA ', 'ERMITA?O', 'JORGE', 'CI', '', '3814220', '993173427', 'jvera1@uni.edu.pe; jvera2005@gmail.com', 'ok', 8072950, '8072', 'TC', 'SI'),
('19808961E', 'ZAVALETA ', 'CALDERON', 'JORGE EDGAR', 'CI', '', '4621396', '999414769', 'jzavaleta@uni.edu.pe', 'ok', 8081850, '8081', 'TC', 'SI'),
('19928129E', 'CASQUERO ', 'ZAIDMAN', 'JULIO CESAR', 'IA', '', '', '995990280 ok', 'jcasqueroz@hotmail.com', 'ok', 8092141, '8092', 'TC', 'SI'),
('', 'SANTOS ', 'ROMERO ', 'ALBERTO', '', '', '', '', '', '', 8099920, '8099', 'TP', 'NO'),
('20068661G', 'REYNA ', 'MEDINA', 'JEXY ARTURO', 'CB', '', '', '934547332', 'jexy9978@gmail.com', 'ok', 8131583, '8131', 'TP 09h', 'SI'),
('', 'ATOCHE ', 'DIAZ', 'WILMER JHONNY', '', '', '', '', '', '', 8134370, '8134', 'TC', 'NO'),
('20008582C', 'OBREGON ', 'RAMOS', 'MAXIMO', 'CB', '', '5310396', '951629294', 'maximo@uni.edu.pe; maxobregon@gmail.com', 'ok', 8161078, '8161', 'TC', 'SI'),
('19988125F', 'CHAVEZ', ' VIVAR', 'JAVIER', 'CB-CI', '', '5361624, 6359348 ', '996715880', 'jvchv100@hotmail.com', 'ok', 8162952, '8162', 'TC', 'SI'),
('20168562K', 'NU?EZ ', 'BARDALES', 'KATHERYNE LIZBETH', 'IA', '', '7856516', '988400368, 999028431', 'katheryne.nb@gmail.com; katheryne@usp.br', 'ok', 8168531, '8168', 'TP', 'SI'),
('', 'GOYZUETA ', 'MEIGGS', 'TELMO HERMILIO', '', '', '', '', '', '', 8187409, '8187', 'TC', 'NO'),
('19898675G', 'REYES ', 'ALVA', 'JOSE CARLOS', 'IA', '', '2244813', '999091497', 'josecreyes@uni.edu.pe; ', 'ok', 8189250, '8189', 'TP', 'SI'),
('19778148J', 'VILLAVICENCIO ', 'CHAVEZ', 'MANUEL AUGUSTO', 'CI IA', '', '', '999006284', 'htmnu@yahoo.com', 'ok', 8197523, '8197', 'TC', 'SI'),
('19898726K', 'SILVA ', 'VASQUEZ', 'WILSON JOSE', 'IA-CI', '', '', '993863564', 'wsilvavasquez@yahoo.es', 'ok', 8204349, '8204', 'TC', 'SI'),
('19898441F', 'LUQUE ', 'CASANAVE', 'MANUEL HUMBERTO', 'IA', '', '2755926', '997718782', 'verman@terra.com.pe', 'ok', 8225423, '8225', 'TP', 'SI'),
('', 'NU?ES ', 'CARRILLO', 'RICARDO HUMBERTO', '', '', '', '', '', '', 8227844, '8227', '', 'NO'),
('', 'HUAMAN ', 'SAAVEDRA', 'CARLOS ALBERTO', '', '', '', '', '', '', 8249563, '8249', 'TP', 'NO'),
('20038351J', 'HUACCHA ', 'QUIROZ', 'EDUARDO', 'CB', '', '3801688', '998074002', 'edumajun@hotmail.com', 'ok', 8287153, '8287', 'TP 20h', 'SI'),
('19978801I', 'UGARTE ', 'PALACIN', 'FRANCISCO MANUEL', 'CB/IA', '', '2571165', '988783736', 'fugarte2006@yahoo.com', 'ok', 8405381, '8405', 'TC', 'SI'),
('19878445F', 'LOPEZ ', 'ARROYO', 'JORGE EDMUNDO', 'CI', '', '4663086', '995199539, 997137959', 'jlopeza@uni.edu.pe jlopeza7@yhaoo.es', 'ok', 8409759, '8409', 'TC', 'SI'),
('19838714F', 'SAMPEN ', 'ALQUIZAR', 'LUIS ALBERTO', 'CI', '', '7347041', '993493909, 987132871', 'lsampen@uni.edu.pe; luissamp@hotmail.com', '', 8453540, '8453', 'TC', 'SI'),
('19808664K', 'ROJAS', 'SERNA', 'CARLOS ALFONSO', 'CB', '', '', '990087244, 975284798', 'crojas@uni.edu.pe; pcrojas66@gmail.com', 'ok', 8458962, '8458', 'TC', 'SI'),
('20008064B', 'BERNABE ', 'SANCHEZ', 'OSCAR RAUL', 'IA', '', '5232805', '999416047', 'obernabes@yahoo.es; obernabes@hotmail.com', 'ok', 8468613, '8468', 'TP', 'NO'),
('', 'MATEO', ' MESIAS', 'ELSA GLADYS', '', '', '', '', '', '', 8483116, '8483', '', 'NO'),
('19978004A', 'AREVALO ', 'MACEDO', 'ROBINSON DOILING', 'CI-IA', '', '4236695', '', 'rarevalo.uni@gmail.com', 'ok', 8487117, '8487', 'TC', 'SI'),
('19848372K', 'INGA ', 'RENGIFO', 'ALBERTO', 'IA-CI', '', '5314909 , 5172326', '996594069', 'alberto_inga@praxair.com; albertoinga@hotmail.com', 'ok', 8491001, '8491', 'TP', 'SI'),
('19858009F', 'APOLAYA ', 'ARNAO', 'MARY ESTELA', 'CB', '', '5678742', '987273177', 'apolayamary@yahoo.es ', 'ok', 8499154, '8499', 'TC', 'SI'),
('19808962A', 'ZEGARRA ', 'RAMIREZ', 'LEONOR MARIA', 'CI', '', '4825098', '998783644', 'leonor@uni.edu.pe', 'ok', 8519377, '8519', 'TC', 'SI'),
('19898251B', 'ESCUDERO ', 'VEGA', 'PEDRO FILIMON', 'IA', '', '', '913189158', 'pescudero@ipen.gob.pe; pescudero@uni.edu.pe; pescuderovega@gmail.com', 'ok', 8520907, '8520', 'TP', 'SI'),
('19958505E', 'MALDONADO ', 'ALATA', 'RUTH ELENA', 'CB', '', '5343220', '965425679', 'remaldonado@uni.edu.pe', 'ok', 8526682, '8526', 'TC', 'SI'),
('19868508E', 'MARCELO ', 'BARRETO', 'EMILIO ASUNCION', 'IA', '', '5672454', '992442711', 'emar86@hotmail.com', 'ok', 8538259, '8538', 'TC', 'SI'),
('19888308A', 'GALARZA ', 'SOTO', 'WALTER HERBERT', 'CI', 'Licencia', '5685360', '980355906, 995342974, 963695619', 'wgalarza@uni.edu.pe; galarza.w@gmail.com', '', 8539335, '8539', 'TC', 'NO'),
('', 'VALVERDE ', 'SANDOVAL', 'OSCAR GUILLERMO', '', '', '', '', '', '', 8550492, '8550', 'TP', 'NO'),
('19808353E', 'HUAMANI ', 'HUAMANI', 'EDILBERTO', 'IA', '', '2850906', '990324190', 'edilberto2011hh@hotmail.com', 'ok', 8557399, '8557', 'TP', 'SI'),
('19838006A', 'ALVA ', 'DAVILA', 'FORTUNATO', 'IA', '', '5673663', '996408899', ' falva10@hotmail.com', 'ok', 8558627, '8558', 'TC', 'SI'),
('19828831J', 'VASQUEZ ', 'PARAGULLA', 'JUAN JULIO', 'CB', '', '4816645', '999000127', 'jvasquez@parainformaticos.com', '', 8579391, '8579', 'TP 09h', 'SI'),
('', 'ZAMORA ', 'RAMOS', 'LUCIANO', '', '', '', '', '', '', 8587492, '8587', 'DE', 'NO'),
('19918761K', 'TURRIATE ', 'MANRIQUE', 'CLARA MARINA', 'CB', '', '3812018', '945857691, 953252957', 'claraturriate@yahoo.es', 'ok', 8602115, '8602', 'DE', 'SI'),
('19878067A', 'BECERRA ', 'AREVALO', 'GILBERTO', 'falta', 'Vicerector', '5750498', '997609478', 'gbecerra87@yahoo.es', 'ok', 8616038, '8616', 'TC', 'NO'),
('20008126H', 'CORTEZ ', 'GALINDO', 'HERNAN', 'CI', '', '5676913', '991607515', 'hecor56@latinmail.com; inghecor4_@hotmail.com', 'ok', 8624897, '8624', 'TC', 'SI'),
('19778153C', 'CORDOVA ', 'HERNANDEZ', 'ZOILA LUISA', 'CB-CI', '', '', '993777547', 'zoila_ch1@hotmail.com', 'ok', 8697688, '8697', 'TC', 'SI'),
('19788004K', 'ACEIJAS ', 'PAJARES', 'WINSTON NAPOLEON', 'CI', '', '', '947951950', 'waceijas@hotmail.com', 'ok', 8722810, '8722', 'DE', 'SI'),
('', 'VALVERDE ', 'RAMIREZ', 'MANUEL', '', '', '', '', '', '', 8734640, '8734', 'TP', 'NO'),
('19828825J', 'VILCHEZ ', 'VILCHEZ', 'TITO ROBERTO', 'CI', '', '', '958542784', 'titovilchez@hotmail.com', 'ok', 8761632, '8761', 'TC', 'SI'),
('19918306A', 'GAMARRA ', 'CHINCHAY', 'HUGO ELISEO', 'CB-CI', '', '3824345', '995012345', 'hugogamarrach@gmail.com', 'ok', 8787197, '8787', 'TC', 'SI'),
('19848131C', 'CASTA?EDA ', 'DE LA ROSA', 'RICARDO ANTONIO', 'CB-IA', '', '', '980813896', 'ricardocdlr@uni.edu.pe', 'ok', 8820850, '8820', 'TC', 'SI'),
('19808617B', 'PAREDES ', 'JARAMILLO', 'SANTIAGO VICTOR', 'CI', '', '4210945 ,, 4825934', '967694953', 'sparedesj@yahoo.com', 'ok', 8828924, '8828', 'TC', 'SI'),
('19988514B', 'MESONES ', 'MALAGA', 'GUSTAVO OMAR', 'IA', '', '3450334', '987571691', 'jupiter_gmn_@gmail.com', 'ok', 8871611, '8871', 'TP', 'SI'),
('19968064A', 'BEDON ', 'MONZON', 'HECTOR MANUEL', 'CB', '', '6024577', '947383319', 'hbedon@uni.edu.pe; hbedonm@gmail.com', 'ok', 8882996, '8882', 'TP 15h', 'SI'),
('', 'BAUTISTA ', 'TIPULA', ' NESTOR', '', '', '', '', '', '', 8989400, '8989', 'TP', 'NO'),
('', 'AZAHUANCHE ', 'ASMAT', 'MANUEL', '', '', '', '', '', '', 8989401, '8989', 'TP', 'NO'),
('19808003D', 'ARREDONDO ', 'MEDINA', 'MARIO JESUS', 'CI', '', '4961538', '939102137', 'marredondo@uni.edu.pe', 'ok', 9002779, '9002', 'DE', 'SI'),
('', 'VALENZUELA  ', 'DE LA CRUZ', 'VASILIO', '', '', '', '', '', '', 9066063, '9066', 'TP', 'NO'),
('19958504I', 'MEDINA ', 'PERALTA', 'CARLOMAN', 'IA', '', '4580155', '993284710, 996893758', 'carlomedipe@hotmail.com', 'ok', 9218077, '9218', 'TC', 'SI'),
('19828449H', 'LUIS ', 'SOSA', 'JOSE', 'CI', '', '', '945106403', 'jluis@uni.edu.pe; jluis@conida.gob.pe', 'ok', 9240503, '9240', 'TP', 'SI'),
('19798443G', 'LAZO ', 'OCHOA', 'SEBASTIAN MAURO', 'CI', '', '', '996166613', 'laboratorio_4@outlook.com', 'ok', 9247665, '9247', 'DE', 'SI'),
('', 'BONILLA ', 'ANDRADE', 'ERICK', '', '', '', '', '', '', 9326434, '9326', 'TP', 'NO'),
('', 'ORTEGA ', 'MALCA', 'ARTURO JESUS', '', '', '', '', '', '', 9589965, '9589', 'PP', 'NO'),
('19988606D', 'PANTOJA ', 'CARHUAVILCA', 'HERMES YESSER', 'CB', '', '3711213', '995744700', 'hermpc@yahoo.com , yesser22@gmail.com', 'ok', 9656026, '9656', 'TP 20h', 'SI'),
('20038130C', 'CORONADO ', 'MATUTTI', 'ALBERTO', 'IA', '', '5610952', '980949110', 'am.coronado@gmail.com', 'ok', 9852228, '9852', 'TP', 'SI'),
('19798304G', 'GARCIA ', 'VALLEJO', 'MILDER FREDDY', 'CI', '', '4647690', '980365050', 'fregatork72@yahoo.com', 'ok', 9903988, '9903', 'TC', 'SI'),
('20088007K', 'AMAYA ', 'FUERTES', 'DAVID NICANOR', 'IA', '', '5947090', '998049305', 'perunavy@hotmail.com; guestdiali003@marina.mil.pe', 'ok', 9927977, '9927', 'TP', 'SI'),
('NUEVO 2016-1', 'VINCES ', 'RAMOS', 'LEONARDO NIKOLAI', 'IA', '', '5644913', '989593621', 'nikolai.vinces@gmail.com', 'ok', 9956998, '9956', 'TP', 'SI'),
('20018662J', 'RAMIREZ ', 'ROSAS', 'JORGE LUIS', 'CI-CB', '', '', '975121586', 'ramir024@hotmail.com; jramirezr@uni.edu.pe', 'ok', 9974561, '9974', 'TP', 'SI'),
('20148181A', 'CHURAMPI ', 'ROMAN', 'DANIEL FRANCISCO', 'IA', '', '43312243', '943161112, 981953772', 'fdaniel73@hotmail.com; danielfrancisco@gmail.com', 'ok', 9974715, '9974', 'TP', 'SI'),
('19798603D', 'PERALDO ', 'RAMOS', 'ANITA ETELVINA', 'CI', '', '3831033', '996667440', 'aperaldo@hotmail.com', 'ok', 10040129, '1004', 'TC', 'SI'),
('', 'SALAS ', 'PAJUELO', 'EDWIN', '', '', '', '', '', '', 10056548, '1005', 'TP', 'NO'),
('', 'OLARTE ', 'CHAVEZ', 'PERCY RENAN', ' ', '', '', '', '', '', 10123869, '1012', 'TP', 'NO'),
('19898761K', 'TOLEDO ', 'PAREDES', 'MANUEL SEBES', 'CI', '', '5034125', '999724808', 'manueltoledo6@gmail.com', 'ok', 10215238, '1021', 'DE', 'SI'),
('', 'MECHAN ', 'ROJAS', 'DANTE FERNANDO', '', '', '', '', '', '', 10321018, '1032', 'TP', 'NO'),
('19758251J', 'ENCISO ', 'ALVARADO', 'JORGE HUGO', 'CI', 'se jubilo ', '3813836', '998995440', 'j.enciso@hotmail.com', '', 10321892, '1032', 'DE', 'NO'),
('19878512E', 'MUNARES ', 'TAPIA', 'CARLOS C?SAR', 'IA', '', '5610852', '995141619', 'cmunares@invermet.gob.pe; carloscmt@terra.es; carlos.munares@gmail.com', '', 10373742, '1037', 'TP', 'SI'),
('', 'CUADRADO ', 'MERCADO', 'NANCY', '', '', '', '', '', '', 10381563, '1038', 'TP', 'NO'),
('19958606F', 'PONCE ', 'GALIANO', 'JORGE', 'CI', '', '', '990336622', 'jponce@uni.edu.pe; jpgponce@gmail.com', 'ok', 10387101, '1038', 'DE', 'SI'),
('19868509A', 'MORALES ', 'TAQUIRI', 'OSWALDO MORLA', 'CI', '', '4951545', '952643136', 'omorales@uni.edu.pe , omorales0711@gmail.com ', 'ok', 10415040, '1041', 'TC', 'SI'),
('', 'ALVAREZ ', 'LAMBERTO', 'JUAN CARLOS', '', '', '', ' ', '', '', 10421353, '1042', '', 'NO'),
('20018581J', 'OLIDEN ', 'MARTINEZ', 'JOSE FORTUNATO', 'IA', '', '', '986651608', 'joliden@inictel-uni.edu.pe', 'ok', 10432917, '1043', 'TP', 'SI'),
('', 'DIAZ ', 'CHAVEZ', 'RAMIRO GERMAN', '', '', '', '', '', '', 10457787, '1045', '', 'NO'),
('19798253C', 'ESPINOZA ', 'ESCRIBA', 'JUAN', 'CI', '', '3272348', '996209976, 957957166', 'jespinozaee@gmail.com', 'ok', 10462989, '1046', 'TP', 'SI'),
('19748725I', 'SARMIENTO ', 'SARMIENTO', 'ENRIQUE', 'IA', '', '', '970970245', 'esarsar@gmail.com', 'ok', 10471872, '1047', 'TC', 'SI'),
('19988062D', 'BOCANEGRA ', 'ORTIZ', 'LUIS CLEMENTE', 'IA', '', '5210636', '934017486', 'luiseli2@yahoo.es; luiseli2@hotmail.com; ', 'ok', 10535460, '1053', 'TP', 'SI'),
('', 'MACHUCA ', 'MINES', 'JOSE', '', '', '', '', '', '', 10617156, '1061', 'TP', 'NO'),
('20168666K', 'ROGGERO ', 'ROGGERO', 'JOSE LUIS', 'CI', '', '5344924', '982335993', 'jl_roggero@hotmail.com,jroggeror@uni.edu.pe', 'ok', 10625436, '1062', 'TP', 'SI'),
('20138184H', 'CHAUCA ', 'GIRON', 'EVELYN EVA', 'CB', '', '', '997876990', 'chgirone@hotmail.com', 'ok', 10663986, '1066', 'TC', 'SI'),
('', 'MONTA?O ', 'GAMBOA', 'WENDELL', '', '', '', '', '', 'ok', 10683153, '1068', 'TP', 'NO'),
('', 'VILLOTA ', 'CERNA', 'ELIZABETH', '', '', '', '', '', '', 10686413, '1068', 'TP', 'NO'),
('20128305G', 'GARIBAY ', 'CALDERON', 'JUAN JOS? CARLOS', 'IA', 'No dicta este P.A', '4378243', '994550594', 'jgaribay@ferreyros.com.pe', '', 10747116, '1074', 'TP', 'NO'),
('19868829F', 'VENEGAS ', 'ROMERO', 'JOSE GINO', 'CB', '', '5945062', '960115423', 'venegas_99@yahoo.com', 'ok', 10830020, '1083', 'TC', 'SI'),
('', 'CORDOVA ', 'ZAPATA', 'ELMER', '', '', '', '', '', '', 10860516, '1086', 'TP', 'NO'),
('19858067F', 'BALDEON', ' ICOCHEA', 'ROBERTO ANTENOR', 'CI', '', '2244068', '999716368(esposa)-982142272', 'r_baldeon@yahoo.es; rbaldeon@uni.edu.pe', 'ok', 15281352, '1528', 'TP', 'SI'),
('', 'OBREGON ', 'PIZARRO', 'VICTOR ELENO', '', '', '', '', '', '', 15581859, '1558', '', 'NO'),
('20168003A', 'AVILA ', 'ESPINOZA', ' EDGAR JOSE', 'CB', '', '', '921869465', 'eavila25@gmail.com', 'ok', 15841881, '1584', 'TP 19h', 'SI'),
('19798123B', 'CASTA?EDA ', 'SANCHEZ', 'JORGE PORFIRIO', 'IA', '', '3450354', '999253074', 'jcastanedas@uni.edu.pe', 'ok', 16128043, '1612', 'TP', 'SI'),
('', 'RODRIGUEZ ', 'SALVATIERRA', 'DANIEL', '', '', '', '', '', '', 17897358, '1789', 'TP', 'NO'),
('', 'KEMPER ', 'VASQUEZ', 'GUILLERMO', '', '', '', '', '', '', 18120240, '1812', '', 'NO'),
('', 'GALINDO ', 'HUAMAN', ' FRANCISCO', '', '', '', '', '', '', 19806429, '1980', 'TP', 'SI'),
('20008605C', 'PEREZ ', '?AUPA ', 'ROLANDO MELQUIADES', 'IA', '', '', '949599933', 'roperezn@uni.edu.pe;roperezn@gmail.com', 'ok', 19812331, '1981', 'TC', 'SI'),
('19778603I', 'PAEZ ', 'APOLINARIO', 'ELISEO', 'CI/IA', '', '2760888', '988.115.213.999.997.000', 'epuniunacufv@hotmail.com; ', 'ok', 19948335, '1994', 'TC', 'SI'),
('19878607F', 'PACHAS ', 'SALHUANA', 'JOSE TEODORO', 'CB', '', '', '992551842', 'jtpachas22@gmail.com', 'ok', 21805931, '2180', 'TC', 'SI'),
('19978716A', 'SARAVIA ', 'POICON', 'FREDY ALBERTO', 'IA', '', '2227069', '999958271', 'f.saravia@kievasociados.com', '', 21887416, '2188', 'TP', 'SI'),
('20008507A', 'MALDONADO ', 'RIVERA', 'ARTURO', 'CI', '', '', '951773412', 'amaldonado@pucp.edu.pe', 'ok', 22702423, '2270', 'TC', 'SI'),
('19998131I', 'COGORNO ', 'OVALLE', 'CARLOS LUIS', 'CB', '', '', '947274596', 'carloscogornoo@uni.edu.com; cogornocarlos@gmail.com', 'ok', 25450675, '2545', 'TP 15h', 'SI'),
('20098302E', 'GOMEZ ', 'ESPINOZA ', 'LUISA VIVIANA', 'CB', '', '3934925', '987851917', 'viviananoticia@gmail.com', 'ok', 25485979, '2548', 'TP', 'SI'),
('19998002D', 'ALVAREZ ', 'SANCHEZ', 'HELARD HENRY', 'IA', '', '6237181', '977155481', ' ahelard@gmail.com', 'ok', 25564293, '2556', 'TP', 'SI'),
('20148114B', 'CAPCHA ', 'BUIZA', 'PEDRO CRISPIN', 'CI', '', '', '990114661', 'capchita_2012@hotmail.com', 'ok', 25663488, '2566', 'TP', 'SI'),
('19958714C', 'SOTELO ', 'VALER', 'FREEDY', 'IA', '', '', '', 'fresov@hotmail.com; fresov@uni.edu.pe', 'ok', 25804755, '2580', 'TP', 'SI'),
('', 'MANUICO ', 'VIVANCO', 'JERVER ELIO', '', '', '', '', '', '', 40191785, '4019', 'TP', 'NO'),
('', 'SANCHEZ ', 'RODAS', 'LUIS ALBERTO', '', '', '', '', '', '', 40210142, '4021', 'TP', 'NO'),
('20138825C', 'VILLEGAS ', 'PAZ', 'MAGALI CLEOFE', 'CB', '', '5377044', '984128015', 'mavipa1999@gmail.com', 'ok', 40291601, '4029', 'TP 18 h', 'SI'),
('', 'PAEZ ', 'AVENDA?O', 'GERMAN', '', '', '', '', '', '', 40406827, '4040', 'TP', 'NO'),
('20168582A', 'ORTIZ ', 'PORRAS', 'JORGE ENRIQUE', 'IA', '', '', '947115086', 'jortizporras@yahoo.com.mx', 'ok', 40523944, '4052', 'TP', 'SI'),
('nuevo-docente 2017-II', 'ENCINAS ', 'ORMACHEA', 'RAUL EDISON', 'TP', 'no dicta este periodo', '', '997414127', 'raulencias.mba@gmail.com', 'ok', 40613048, '4061', 'TP', 'SI'),
('falta', 'CARDENAS ', 'LIZANA', 'PAUL', 'falta', '', '', '', '', '', 40803000, '4080', 'TP', 'SI'),
('20148181A', 'CASAS ', 'URRUNAGA', 'EDILBERTO JESUS', 'IA', 'No dicta este P.A', '5318651', '985275871', 'ecasasu@uni.edu.pe; ecasas@esan.edu.pe', 'ok', 40866714, '4086', 'TP', 'NO'),
('', 'MOSQUERA ', 'MOLINA', 'MIGUEL ANGEL', '', '', '', '', '', '', 41029100, '4102', 'TP', 'NO'),
('20088214F', 'DE LA TORRE ', 'CORTEZ', 'DENNYS DUNKER', 'CI', '', '', '985158241', 'dennysdltc@yahoo.com', 'ok', 41218894, '4121', 'TP', 'SI'),
('20138602D', 'PERALTA ', 'TORIBIO', 'JESUS', 'IA', '', '', '946170292', 'jesusperaltatoribio@yahoo.es; jesus_m6@hotmail.com', 'ok', 41378980, '4137', 'TP', 'SI'),
('', 'CERNADES ', 'GOMEZ', 'JESUS', '', '', '', '', '', '', 41585247, '4158', 'TP', 'NO'),
('NUEVO 2016-2', 'SALCEDO ', 'COLONIA', 'WILLIAM JESUS', 'IA', '', '4218873', '989268483', 'wsalcol@hotmail.com', '', 41750930, '4175', 'TP', 'SI'),
('20168273I', 'FURUKAWA ', 'FUKUDA', 'ROBERTO SUMIYOSHI', 'IA', '', '', '956351495', 'rfurukawa@pucp.pe', 'ok', 41787019, '4178', 'TP', 'SI'),
('20148504E', 'MANTARI ', 'LAUREANO', 'JOSE LUIS', 'CI', 'No dicta este P.A', '', '950943532', 'josemantari@gmail.com', '', 41857494, '4185', '', 'NO'),
('20118442A', 'LOZA ', 'HERRERA', 'JAVIER DAVID', 'IA', '', '4820675', '991009753', 'javier.loza.h@alumni-upch.edu.pe', '', 42209814, '4220', 'TP', 'SI'),
('  20138010J', 'ACEVEDO ', 'ROJAS', 'ELBA SISSI', 'CB', '', '', '976223058', 'esar_3005@hotmail.com; elba.acevedo@pucp.pe', 'ok', 42716364, '4271', 'TP 09h', 'SI'),
(' 20178822E', 'VARGAS MACHUCA', 'BUENO', 'JUAN PABLO', 'IA', '', '', '982233971', '', '', 42878011, '4287', 'TP', 'SI'),
('20128114G', 'CALLE ', 'FLORES', ' IVAN ARTURO', 'IA', '', '', '993096917', 'icallef@uni.edu.pe', 'ok', 42971211, '4297', 'TC', 'SI'),
('nuevo 2017', 'CARBAJAL ', 'PENADILLO', 'JAIME', 'CI', '', '', '980862567 ,980077000', 'jcarbajal@uni.edu.pe', 'ok', 43188713, '4318', 'TP', 'SI'),
('', 'ANCHAYHUA ', 'ARESTEGUI', ' NILTON', '', '', '', '', '', '', 44052294, '4405', 'TP', 'NO'),
('', 'ROMERO ', 'MORANTE', 'JULIO', '', '', '', '', '', '', 44680476, '4468', 'TP', 'SI'),
('20138062J', 'BARRERA ', 'ESPARTA', ' DANIEL LEONARDO', 'IA', '', '2706842', '990876455', 'danielunim6@gmail.com', 'ok', 44759650, '4475', 'TP', 'SI'),
('20168353B', 'HUAMAN ', 'ORTIZ', 'RONALD RICHARD', 'IA', '', '', '940211378', 'rhuaman4@gmail.com', 'ok', 44766600, '4476', 'TP', 'NO'),
('NUEVO 2016-2', 'CABELLO ', 'LOPEZ', 'AUGUSTO ELMER', 'IA', '', '6476420', '991828832', 'aryox2801@gmail.com', 'ok', 45544970, '4554', 'TP', 'SI'),
('nuevo 2017-II', 'QUISPE ', 'RODRIGUEZ ', 'SERGIO', 'CB', '', '5365131', '994292739', 'SERGIOURQR@METALSUR.COM.PE', 'ok', 45780535, '4578', 'TP', 'SI'),
('FALTA', 'TAM ', 'TAPIA', 'AUGUSTO ', '', '', '44617192', '949361927', 'aujtt.06@hotmil.com', '', 46267997, '4626', '', 'SI'),
('FALTA', 'MOLINA ', 'SAQUI', 'ANDONI ROYER', 'CI', '', '3383955', '989427980', 'andoni.molina.s@gmail.com', 'ok', 46632755, '4663', 'TP', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_docentes`
--

CREATE TABLE `registro_docentes` (
  `id` int(11) NOT NULL,
  `id_sup_doc` int(1) DEFAULT NULL,
  `id_turno` int(11) DEFAULT NULL,
  `tipoexamen` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'parciales',
  `asistencia` char(1) COLLATE utf8_spanish_ci DEFAULT '0',
  `fecha_asistencia` datetime DEFAULT '0000-00-00 00:00:00',
  `ciclo` char(3) COLLATE utf8_spanish_ci DEFAULT '181',
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_docentes`
--

INSERT INTO `registro_docentes` (`id`, `id_sup_doc`, `id_turno`, `tipoexamen`, `asistencia`, `fecha_asistencia`, `ciclo`, `fecha_registro`) VALUES
(105, 5, 38, 'PARCIAL', '1', '2018-06-02 10:03:10', '181', '2018-05-16 13:52:59'),
(106, 5, 410, 'PARCIAL', '1', '2018-05-16 13:54:08', '181', '2018-05-16 13:52:59'),
(107, 5, 314, 'PARCIAL', '1', '2018-06-02 10:05:36', '181', '2018-05-16 13:53:00'),
(108, 3, 18, 'PARCIAL', '1', '2018-06-02 11:10:02', '181', '2018-06-02 11:09:30'),
(109, 3, 38, 'PARCIAL', '1', '2018-06-02 11:10:21', '181', '2018-06-02 11:09:31'),
(110, 3, 212, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 11:09:31'),
(111, 6, 38, 'PARCIAL', '1', '2018-06-02 11:25:52', '181', '2018-06-02 11:22:19'),
(112, 6, 210, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 11:22:19'),
(113, 6, 312, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 11:22:19'),
(114, 7, 38, 'PARCIAL', '1', '2018-06-02 11:25:51', '181', '2018-06-02 11:22:47'),
(115, 7, 210, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 11:22:47'),
(116, 7, 214, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 11:22:47'),
(117, 8, 28, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 11:23:14'),
(118, 8, 38, 'PARCIAL', '1', '2018-06-02 11:25:52', '181', '2018-06-02 11:23:14'),
(119, 8, 312, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 11:23:14'),
(120, 11, 18, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 14:56:37'),
(121, 11, 38, 'PARCIAL', '1', '2018-06-02 14:57:06', '181', '2018-06-02 14:56:37'),
(122, 11, 210, 'PARCIAL', '0', '0000-00-00 00:00:00', '181', '2018-06-02 14:56:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sorteo`
--

CREATE TABLE `sorteo` (
  `idSorteo` int(11) NOT NULL,
  `idSupervisorfk` int(11) NOT NULL,
  `idExamenfk` int(11) NOT NULL,
  `idTurnofk` int(11) NOT NULL,
  `nSorteo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervision_docente`
--

CREATE TABLE `supervision_docente` (
  `id_sup_doc` int(11) NOT NULL,
  `DNI` int(8) DEFAULT NULL,
  `contrasena` varchar(45) COLLATE utf8_spanish_ci DEFAULT '',
  `turno_parcial` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `turno_final` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `turno_susti` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` int(1) DEFAULT '0',
  `registro` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `supervision_docente`
--

INSERT INTO `supervision_docente` (`id_sup_doc`, `DNI`, `contrasena`, `turno_parcial`, `turno_final`, `turno_susti`, `tipo`, `registro`) VALUES
(3, 8989401, '8989', '3', '3', '3', 0, '1'),
(5, 44052294, '4405', '3', '3', '3', 1, '1'),
(6, 9956998, '9956', '3', '3', '3', 0, '1'),
(7, 42971211, '4297', '3', '2', '3', 0, '1'),
(8, 40803000, '4080', '3', '3', '3', 0, '1'),
(11, 9974715, '9974', '3', '3', '3', 0, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `dia` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `doce_min` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `doce_max` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `adicional` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_examen` date DEFAULT NULL,
  `contador` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciclo` char(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `dia`, `hora`, `doce_min`, `doce_max`, `adicional`, `observacion`, `fecha_examen`, `contador`, `ciclo`, `fecha_registro`) VALUES
(18, 'lunes', '8 - 10', '9', '11', '2', NULL, NULL, '7', '181', '2018-04-21 09:26:06'),
(28, 'martes', '8-10', '11', '13', '1', NULL, NULL, '3', '181', '2018-04-21 09:32:17'),
(38, 'miercoles', '8-10', '8', '10', '1', NULL, NULL, '9', '181', '2018-04-21 09:32:17'),
(48, 'jueves', '8-10', '10', '12', '1', NULL, NULL, '0', '181', '2018-04-21 09:32:17'),
(58, 'viernes', '8-10', '14', '16', '2', NULL, NULL, '0', '181', '2018-04-21 09:32:17'),
(110, 'lunes', '10-12', '10', '12', '1', NULL, NULL, '0', '181', '2018-04-21 09:34:04'),
(112, 'lunes', '12-2', '5', '7', '9', NULL, NULL, '2', '181', '2018-04-21 09:34:39'),
(114, 'lunes', '2-4', '9', '11', '1', NULL, NULL, '3', '181', '2018-04-21 09:35:21'),
(210, 'martes', '10-12', '12', '14', '1', NULL, NULL, '3', '181', '2018-04-21 09:34:05'),
(212, 'martes', '2-12', '8', '10', '2', NULL, NULL, '2', '181', '2018-04-21 09:34:39'),
(214, 'martes', '2-4', '9', '11', '1', NULL, NULL, '3', '181', '2018-04-21 09:35:22'),
(310, 'miercoles', '10-12', '8', '10', '1', NULL, NULL, '0', '181', '2018-04-21 09:34:05'),
(312, 'miercoles', '12-2', '14', '16', '2', NULL, NULL, '2', '181', '2018-04-21 09:34:39'),
(314, 'miercoles', '2 -4', '11', '13', '1', NULL, NULL, '1', '181', '2018-04-21 09:35:22'),
(410, 'jueves', '10-12', '4', '6', '1', NULL, NULL, '2', '181', '2018-04-21 09:34:05'),
(412, 'jueves', '12-2', '12', '14', '2', NULL, NULL, '0', '181', '2018-04-21 09:34:39'),
(414, 'jueves', '2-4', '8', '10', '1', NULL, NULL, '0', '181', '2018-04-21 09:35:22'),
(510, 'viernes', '10-12', '8', '10', '', NULL, NULL, '0', '181', '2018-04-21 09:34:05'),
(512, 'viernes', '12-2', '10', '12', '2', NULL, NULL, '0', '181', '2018-04-21 09:34:39'),
(514, 'viernes', '2-4', '6', '8', '', NULL, NULL, '0', '181', '2018-04-21 09:35:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agrupaciones`
--
ALTER TABLE `agrupaciones`
  ADD PRIMARY KEY (`idCursoSeccion`),
  ADD KEY `seccion->curso` (`codCursofk`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`codAula`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codCurso`);

--
-- Indices de la tabla `cursoexamen`
--
ALTER TABLE `cursoexamen`
  ADD PRIMARY KEY (`idExamen`),
  ADD KEY `examen ->seccion` (`idAgrupacionfk`),
  ADD KEY `examen->turno` (`idTurnofk`),
  ADD KEY `examen->aula` (`codAulafk`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `registro_docentes`
--
ALTER TABLE `registro_docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docentes_registro_docente` (`id_sup_doc`),
  ADD KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `sorteo`
--
ALTER TABLE `sorteo`
  ADD PRIMARY KEY (`idSorteo`),
  ADD KEY `Supervisor->Sorteo` (`idSupervisorfk`),
  ADD KEY `Turno->Sorteo` (`idTurnofk`),
  ADD KEY `Examen->Sorteo` (`idExamenfk`);

--
-- Indices de la tabla `supervision_docente`
--
ALTER TABLE `supervision_docente`
  ADD PRIMARY KEY (`id_sup_doc`),
  ADD KEY `fk_docentes_supervision_docente` (`DNI`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agrupaciones`
--
ALTER TABLE `agrupaciones`
  MODIFY `idCursoSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cursoexamen`
--
ALTER TABLE `cursoexamen`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_docentes`
--
ALTER TABLE `registro_docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `sorteo`
--
ALTER TABLE `sorteo`
  MODIFY `idSorteo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `supervision_docente`
--
ALTER TABLE `supervision_docente`
  MODIFY `id_sup_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agrupaciones`
--
ALTER TABLE `agrupaciones`
  ADD CONSTRAINT `seccion->curso` FOREIGN KEY (`codCursofk`) REFERENCES `curso` (`codCurso`);

--
-- Filtros para la tabla `cursoexamen`
--
ALTER TABLE `cursoexamen`
  ADD CONSTRAINT `examen ->seccion` FOREIGN KEY (`idAgrupacionfk`) REFERENCES `agrupaciones` (`idCursoSeccion`),
  ADD CONSTRAINT `examen->aula` FOREIGN KEY (`codAulafk`) REFERENCES `aula` (`codAula`),
  ADD CONSTRAINT `examen->turno` FOREIGN KEY (`idTurnofk`) REFERENCES `turnos` (`id_turno`);

--
-- Filtros para la tabla `registro_docentes`
--
ALTER TABLE `registro_docentes`
  ADD CONSTRAINT `registro_docentes_ibfk_1` FOREIGN KEY (`id_sup_doc`) REFERENCES `supervision_docente` (`id_sup_doc`),
  ADD CONSTRAINT `registro_docentes_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`);

--
-- Filtros para la tabla `sorteo`
--
ALTER TABLE `sorteo`
  ADD CONSTRAINT `Examen->Sorteo` FOREIGN KEY (`idExamenfk`) REFERENCES `cursoexamen` (`idExamen`),
  ADD CONSTRAINT `Supervisor->Sorteo` FOREIGN KEY (`idSupervisorfk`) REFERENCES `supervision_docente` (`id_sup_doc`),
  ADD CONSTRAINT `Turno->Sorteo` FOREIGN KEY (`idTurnofk`) REFERENCES `turnos` (`id_turno`);

--
-- Filtros para la tabla `supervision_docente`
--
ALTER TABLE `supervision_docente`
  ADD CONSTRAINT `supervision_docente_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `docentes` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
