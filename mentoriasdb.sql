-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2023 at 04:59 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentoriasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `AlumnoID` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  `Institucion` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`AlumnoID`, `Nombre`, `Correo`, `Contrasena`, `Ubicacion`, `Institucion`) VALUES
(2, 'Alonso Rodriguez', 'joserodriguez@gmail.com', '12345678', 'Lince', 'UTEC');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `CursoID` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `CantidadMentores` int DEFAULT NULL,
  `HorasSemana` float DEFAULT NULL,
  `Modalidad` varchar(255) DEFAULT NULL,
  `Tipo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`CursoID`, `Nombre`, `Costo`, `CantidadMentores`, `HorasSemana`, `Modalidad`, `Tipo`) VALUES
(2, 'DBP', 500, 2, 6, 'Presencial', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `cursodominadopormentor`
--

DROP TABLE IF EXISTS `cursodominadopormentor`;
CREATE TABLE IF NOT EXISTS `cursodominadopormentor` (
  `DominadoID` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Calificacion` float DEFAULT NULL,
  `Reconocimiento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cursodominadopormentor`
--

INSERT INTO `cursodominadopormentor` (`DominadoID`, `Nombre`, `Calificacion`, `Reconocimiento`) VALUES
(1, 'DBP', 18.5, 'UTEC');

-- --------------------------------------------------------

--
-- Table structure for table `informaciondecursoporinstitucion`
--

DROP TABLE IF EXISTS `informaciondecursoporinstitucion`;
CREATE TABLE IF NOT EXISTS `informaciondecursoporinstitucion` (
  `ID` int DEFAULT NULL,
  `Facultad` varchar(255) DEFAULT NULL,
  `Carrera` varchar(255) DEFAULT NULL,
  `CicloDeCurso` int DEFAULT NULL,
  `Modalidad` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `informaciondecursoporinstitucion`
--

INSERT INTO `informaciondecursoporinstitucion` (`ID`, `Facultad`, `Carrera`, `CicloDeCurso`, `Modalidad`) VALUES
(1, 'Ciencias', 'CS', 3, 'Presencial');

-- --------------------------------------------------------

--
-- Table structure for table `informaciondementor`
--

DROP TABLE IF EXISTS `informaciondementor`;
CREATE TABLE IF NOT EXISTS `informaciondementor` (
  `ID` int DEFAULT NULL,
  `VideoDePresentacion` varchar(255) DEFAULT NULL,
  `NotasDeCurso` float DEFAULT NULL,
  `HorasDisponible` float DEFAULT NULL,
  `CalificacionServicio` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `informaciondementor`
--

INSERT INTO `informaciondementor` (`ID`, `VideoDePresentacion`, `NotasDeCurso`, `HorasDisponible`, `CalificacionServicio`) VALUES
(1, 'url', 18.7, 7.5, 4.5),
(2, 'url2', 19.5, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `insteducativa`
--

DROP TABLE IF EXISTS `insteducativa`;
CREATE TABLE IF NOT EXISTS `insteducativa` (
  `InstEducativaID` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `insteducativa`
--

INSERT INTO `insteducativa` (`InstEducativaID`, `Nombre`, `Ubicacion`) VALUES
(1, 'UTEC', 'Jr. UTEC');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
CREATE TABLE IF NOT EXISTS `mentor` (
  `MentorID` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  `Institucion` varchar(255) DEFAULT NULL,
  `CursoPorEnsenar` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`MentorID`, `Nombre`, `Contrasena`, `Ubicacion`, `Institucion`, `CursoPorEnsenar`) VALUES
(1, 'Alonso Rodriguez', '87654321', 'Lince', 'UTEC', 'DBP');

-- --------------------------------------------------------

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE IF NOT EXISTS `ubicacion` (
  `UbicacionID` int DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Ubicacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ubicacion`
--

INSERT INTO `ubicacion` (`UbicacionID`, `Nombre`, `Ubicacion`) VALUES
(1, 'UTEC', 'Jr. UTEC, Barranco');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
