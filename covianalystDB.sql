-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 10:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covianalyst`
--

-- --------------------------------------------------------

--
-- Table structure for table `datos_personales`
--

CREATE TABLE `datos_personales` (
  `ID_Usuario` int(255) NOT NULL,
  `Edad` varchar(2) NOT NULL,
  `Nivel_Socioeconomico` varchar(30) NOT NULL,
  `Estudios` varchar(12) NOT NULL,
  `Localidad` varchar(44) NOT NULL,
  `Estado_Civil` varchar(10) NOT NULL,
  `Sexo` varchar(3) NOT NULL,
  `Salud` varchar(30) NOT NULL,
  `Confiabilidad` bit(1) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `SO` varchar(30) NOT NULL,
  `Dispositivo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `encuesta`
--

CREATE TABLE `encuesta` (
  `ID_Usuario` int(255) NOT NULL,
  `ID_Preguntas` int(255) NOT NULL,
  `Respuesta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE `preguntas` (
  `ID_Preguntas` int(99) NOT NULL,
  `Descripcion` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(255) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Password_Hashed` varchar(100) NOT NULL,
  `Rights` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Correo`, `Password_Hashed`, `Rights`) VALUES
(0, 'javierlizarraga.b@hotmail.com', '$2y$10$LbPvgpsC23g62Qs4MTSSF.JURYSnfWe.H9YF7Uh1psRl4o6gWQ4kW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD KEY `ID_Correo` (`ID_Usuario`);

--
-- Indexes for table `encuesta`
--
ALTER TABLE `encuesta`
  ADD KEY `ID_Preguntas` (`ID_Preguntas`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID_Preguntas`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`ID_Preguntas`) REFERENCES `preguntas` (`ID_Preguntas`),
  ADD CONSTRAINT `encuesta_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
