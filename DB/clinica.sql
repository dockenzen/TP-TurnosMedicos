-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 09:42 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarMedico` (IN `idd` INT)  NO SQL
DELETE FROM medico WHERE medicoid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarUsuario` (IN `id` INT)  NO SQL
DELETE FROM usuario WHERE usuarioid = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarConsulta` (IN `userid` INT, IN `medid` INT, IN `espeid` INT, IN `horacon` VARCHAR(50), IN `sint` TEXT, IN `fechaid` INT)  NO SQL
INSERT INTO `consulta`(`usuarioid`, `medicoid`, `especialidadid`, `horarioConsulta`, `sintomas`,`fechaid`) VALUES (userid,medid,espeid,horacon,sint,fechaid)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `name` VARCHAR(50), IN `mail` VARCHAR(50), IN `pass` VARCHAR(50), IN `pick` VARCHAR(100), IN `sex` CHAR(1), IN `prov` VARCHAR(50), IN `loc` VARCHAR(50), IN `dir` VARCHAR(50))  NO SQL
INSERT INTO `usuario`( `nombre`,`correo`, `clave`,`foto`,`sexo`, `provincia`, `localidad`, `direccion`) VALUES ( name , mail , pass ,pick,sex, prov , loc , dir)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarUsuario` (IN `name` VARCHAR(50), IN `mail` VARCHAR(50), IN `pass` VARCHAR(50), IN `pick` VARCHAR(100), IN `prov` VARCHAR(50), IN `loc` VARCHAR(50), IN `dir` VARCHAR(50), IN `idd` INT, IN `sex` CHAR(1))  NO SQL
UPDATE `usuario` SET `nombre`=name,`correo`=mail,`clave`=pass,`foto`=pick,`sexo`=sex,
`provincia`=prov,`localidad`=loc,`direccion`=dir WHERE usuarioid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodasLasConsultasPorUsuario` (IN `userid` INT)  NO SQL
SELECT usuario.nombre, medico.nombreMedico as medico, especialidad.nombre as especialidad, horario.hora, consulta.sintomas, fecha.dia from consulta inner join usuario on consulta.usuarioid = usuario.usuarioid inner join medico on consulta.medicoid = medico.medicoid inner join especialidad on consulta.especialidadid = especialidad.especialidadid inner join fecha on consulta.fechaid = fecha.fechaid inner join horario on consulta.horarioConsulta = horario.horaid where consulta.usuarioid = userid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodasLasEspecialidades` ()  NO SQL
SELECT * FROM especialidad$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosMedicos` ()  NO SQL
SELECT medicoid, nombreMedico,nombre,horarioEntrada,horarioSalida FROM `medico` inner join especialidad on medico.especialidadid = especialidad.especialidadid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosMedicosPorEspecialidad` (IN `idd` INT)  NO SQL
SELECT * FROM medico where especialidadid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosUsuarios` ()  NO SQL
SELECT *,roles.rolename FROM usuario INNER JOIN roles on usuario.roleid = roles.roleid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnMedico` (IN `idd` INT)  NO SQL
SELECT * FROM medico WHERE medicoid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnUsuario` (IN `idd` INT)  NO SQL
SELECT * FROM usuario where usuarioid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnUsuarioPorCorreo` (IN `mail` VARCHAR(50))  NO SQL
SELECT * FROM usuario WHERE correo = mail$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `consulta`
--

CREATE TABLE `consulta` (
  `consultaid` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `medicoid` int(11) NOT NULL,
  `especialidadid` int(11) NOT NULL,
  `horarioConsulta` varchar(50) NOT NULL,
  `sintomas` text NOT NULL,
  `fechaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `especialidadid` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `especialidad`
--

INSERT INTO `especialidad` (`especialidadid`, `nombre`) VALUES
(1, 'Traumatologia'),
(2, 'Pedriatria'),
(3, 'Kinesiologia'),
(4, 'Obstetricia'),
(5, 'Odontologia');

-- --------------------------------------------------------

--
-- Table structure for table `fecha`
--

CREATE TABLE `fecha` (
  `fechaid` int(11) NOT NULL,
  `dia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fecha`
--

INSERT INTO `fecha` (`fechaid`, `dia`) VALUES
(1, 'lunes'),
(2, 'martes'),
(3, 'miercoles'),
(4, 'jueves'),
(5, 'viernes');

-- --------------------------------------------------------

--
-- Table structure for table `fechahoramedico`
--

CREATE TABLE `fechahoramedico` (
  `fechahoramedicoid` int(11) NOT NULL,
  `medicoid` int(11) NOT NULL,
  `horarioid` int(11) NOT NULL,
  `fechaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `horaid` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`horaid`, `hora`) VALUES
(1, '01:00:00'),
(2, '02:00:00'),
(3, '03:00:00'),
(4, '04:00:00'),
(5, '05:00:00'),
(6, '06:00:00'),
(7, '07:00:00'),
(8, '08:00:00'),
(9, '09:00:00'),
(10, '10:00:00'),
(11, '11:00:00'),
(12, '12:00:00'),
(13, '13:00:00'),
(14, '14:00:00'),
(15, '15:00:00'),
(16, '16:00:00'),
(17, '17:00:00'),
(18, '18:00:00'),
(19, '19:00:00'),
(20, '20:00:00'),
(21, '21:00:00'),
(22, '22:00:00'),
(23, '23:00:00'),
(24, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE `medico` (
  `medicoid` int(11) NOT NULL,
  `nombreMedico` varchar(50) NOT NULL,
  `especialidadid` int(11) NOT NULL,
  `horarioEntrada` time NOT NULL,
  `horarioSalida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medico`
--

INSERT INTO `medico` (`medicoid`, `nombreMedico`, `especialidadid`, `horarioEntrada`, `horarioSalida`) VALUES
(47, 'Pepe, Pompin', 4, '22:00:00', '11:00:00'),
(53, 'Juan Carlos, Alonso', 2, '14:00:00', '22:00:00'),
(55, 'Ayala, Landriel', 5, '10:00:00', '18:00:00'),
(61, 'catriel miryan', 5, '12:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `tblreseteopass`
--

CREATE TABLE `tblreseteopass` (
  `id` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `token` varchar(200) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuarioid` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `roleid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuarioid`, `nombre`, `correo`, `clave`, `foto`, `sexo`, `provincia`, `localidad`, `direccion`, `roleid`) VALUES
(26, 'Leandro Baldassarre', 'lea_Eldoc@hotmail.com', '418d940643b1975d62234ee01246ad4b58904184', 'lea_Eldoc@hotmail.com.jpg', 'M', 'buenos aires', 'berazategui', 'antartida argentina 451', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`consultaid`);

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`especialidadid`);

--
-- Indexes for table `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`fechaid`);

--
-- Indexes for table `fechahoramedico`
--
ALTER TABLE `fechahoramedico`
  ADD PRIMARY KEY (`fechahoramedicoid`,`medicoid`,`horarioid`,`fechaid`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`horaid`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`medicoid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `tblreseteopass`
--
ALTER TABLE `tblreseteopass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioid`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `consultaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `especialidadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fecha`
--
ALTER TABLE `fecha`
  MODIFY `fechaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fechahoramedico`
--
ALTER TABLE `fechahoramedico`
  MODIFY `fechahoramedicoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `horaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `medicoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblreseteopass`
--
ALTER TABLE `tblreseteopass`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
