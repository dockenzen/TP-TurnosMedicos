-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2015 a las 14:25:13
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clinica`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarMedico`(IN `idd` INT)
    NO SQL
DELETE FROM medico WHERE medicoid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarUsuario`(IN `id` INT)
    NO SQL
DELETE FROM usuario WHERE usuarioid = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarConsulta`(IN `userid` INT, IN `medid` INT, IN `espeid` INT, IN `horacon` VARCHAR(50), IN `sint` TEXT)
    NO SQL
INSERT INTO `consulta`(`usuarioid`, `medicoid`, `especialidadid`, `horarioConsulta`, `sintomas`) VALUES (userid,medid,espeid,horacon,sint)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario`(IN `name` VARCHAR(50), IN `mail` VARCHAR(50), IN `pass` VARCHAR(50), IN `pick` VARCHAR(100), IN `sex` CHAR(1), IN `prov` VARCHAR(50), IN `loc` VARCHAR(50), IN `dir` VARCHAR(50))
    NO SQL
INSERT INTO `usuario`( `nombre`,`correo`, `clave`,`foto`,`sexo`, `provincia`, `localidad`, `direccion`) VALUES ( name , mail , pass ,pick,sex, prov , loc , dir)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarUsuario`(IN `name` VARCHAR(50), IN `mail` VARCHAR(50), IN `pass` VARCHAR(50), IN `pick` VARCHAR(100), IN `prov` VARCHAR(50), IN `loc` VARCHAR(50), IN `dir` VARCHAR(50), IN `idd` INT, IN `sex` CHAR(1))
    NO SQL
UPDATE `usuario` SET `nombre`=name,`correo`=mail,`clave`=pass,`foto`=pick,`sexo`=sex,
`provincia`=prov,`localidad`=loc,`direccion`=dir WHERE usuarioid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodasLasConsultasPorUsuario`(IN `userid` INT)
    NO SQL
SELECT usuario.nombre, medico.nombreMedico as medico, especialidad.nombre as especialidad, consulta.horarioConsulta, consulta.sintomas 
from consulta inner join usuario on consulta.usuarioid = usuario.usuarioid
			  inner join medico on consulta.medicoid = medico.medicoid
              inner join especialidad on consulta.especialidadid = especialidad.especialidadid              
where consulta.usuarioid = userid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodasLasEspecialidades`()
    NO SQL
SELECT * FROM especialidad$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosMedicos`()
    NO SQL
SELECT medicoid, nombreMedico,nombre,horarioEntrada,horarioSalida FROM `medico` inner join especialidad on medico.especialidadid = especialidad.especialidadid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosMedicosPorEspecialidad`(IN `idd` INT)
    NO SQL
SELECT * FROM medico where especialidadid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosUsuarios`()
    NO SQL
SELECT * FROM usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnMedico`(IN `idd` INT)
    NO SQL
SELECT * FROM medico WHERE medicoid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnUsuario`(IN `idd` INT)
    NO SQL
SELECT * FROM usuario where usuarioid = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnUsuarioPorCorreo`(IN `mail` VARCHAR(50))
    NO SQL
SELECT * FROM usuario WHERE correo = mail$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
`consultaid` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `medicoid` int(11) NOT NULL,
  `especialidadid` int(11) NOT NULL,
  `horarioConsulta` varchar(50) NOT NULL,
  `sintomas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
`especialidadid` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`especialidadid`, `nombre`) VALUES
(1, 'Traumatologia'),
(2, 'Pedriatria'),
(3, 'Kinesiologia'),
(4, 'Obstetricia'),
(5, 'Odontologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
`medicoid` int(11) NOT NULL,
  `nombreMedico` varchar(50) NOT NULL,
  `especialidadid` int(11) NOT NULL,
  `horarioEntrada` time NOT NULL,
  `horarioSalida` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`medicoid`, `nombreMedico`, `especialidadid`, `horarioEntrada`, `horarioSalida`) VALUES
(47, 'Pepe, Pompin', 4, '22:00:00', '11:00:00'),
(53, 'Juan Carlos, Alonso', 2, '14:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`roleid` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreseteopass`
--

CREATE TABLE IF NOT EXISTS `tblreseteopass` (
`id` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `username` varchar(15) NOT NULL,
  `token` varchar(200) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuarioid`, `nombre`, `correo`, `clave`, `foto`, `sexo`, `provincia`, `localidad`, `direccion`, `roleid`) VALUES
(26, 'Leandro Baldassarre', 'lea_Eldoc@hotmail.com', '418d940643b1975d62234ee01246ad4b58904184', 'lea_Eldoc@hotmail.com.jpg', 'M', 'buenos aires', 'berazategui', 'antartida argentina 451', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
 ADD PRIMARY KEY (`consultaid`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
 ADD PRIMARY KEY (`especialidadid`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
 ADD PRIMARY KEY (`medicoid`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`roleid`);

--
-- Indices de la tabla `tblreseteopass`
--
ALTER TABLE `tblreseteopass`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usuarioid`), ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
MODIFY `consultaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
MODIFY `especialidadid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
MODIFY `medicoid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tblreseteopass`
--
ALTER TABLE `tblreseteopass`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usuarioid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
