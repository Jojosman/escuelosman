-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2021 a las 05:15:19
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `utnc_universidad`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `sp_agregar_alumno` (IN `_NOMBRE` VARCHAR(255), IN `_PATERNO` VARCHAR(255), IN `_MATERNO` VARCHAR(255), IN `_CORREO` VARCHAR(255), IN `_FEC_NAC` DATE, IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18), IN `_SEXO` VARCHAR(255), IN `_TEL_CELULAR` VARCHAR(10), IN `_TEL_CASA` VARCHAR(10), IN `_DIRECCION` VARCHAR(255))  BEGIN
	INSERT INTO alumnos(
		nombre,
		apellido_paterno,
		apellido_materno,
		correo,
		fecha_nacimiento,
		matricula,
		curp,
		sexo,
		telefono_celular,
		telefono_casa,
		direccion,
		id_carrera,
		id_grupo
	) 
	VALUES (
		_NOMBRE,
		_PATERNO,
		_MATERNO,
		_CORREO,
		_FEC_NAC,
		_MATRICULA,
		_CURP,
		_SEXO,
		_TEL_CELULAR,
		_TEL_CASA,
		_DIRECCION,
		1,
		1
	);
END$$

CREATE PROCEDURE `sp_agregar_maestro` (IN `_NOMBRE` VARCHAR(255), IN `_PATERNO` VARCHAR(255), IN `_MATERNO` VARCHAR(255), IN `_CORREO` VARCHAR(255), IN `_FEC_NAC` DATE, IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18), IN `_TEL_CELULAR` VARCHAR(10), IN `_TEL_CASA` VARCHAR(10), IN `_DIRECCION` VARCHAR(255), IN `_GRADO` VARCHAR(255))  BEGIN
    INSERT INTO maestros(
        nombre_maestro,
        apellido_paterno,
        apellido_materno,
        correo,
        fecha_nacimiento,
        matricula,
        curp,
        telefono_celular,
        telefono_casa,
        direccion,
        grado_academico
    ) 
    VALUES (
        _NOMBRE,
        _PATERNO,
        _MATERNO,
        _CORREO,
        _FEC_NAC,
        _MATRICULA,
        _CURP,
        _TEL_CELULAR,
        _TEL_CASA,
        _DIRECCION,
        _GRADO
    );
END$$

CREATE PROCEDURE `sp_agregar_materias` (IN `_NOMBRE_MATERIA` VARCHAR(255), IN `_SIGLAS` VARCHAR(255), IN `_HORAS` INT(255))  BEGIN
    INSERT INTO materias(
        nombre_materia,
        siglas,
        horas
    ) 
    VALUES (
        _NOMBRE_MATERIA,
        _SIGLAS,
        _HORAS
    );
END$$

CREATE PROCEDURE `sp_delete_alumno` (IN `_ID_ALUMNO` INT(255))  BEGIN

DELETE FROM alumnos WHERE id_alumno = _ID_ALUMNO;

END$$

CREATE PROCEDURE `sp_delete_maestro` (IN `_ID_MAESTRO` INT(255))  BEGIN

DELETE FROM maestros WHERE id_maestro = _ID_MAESTRO;

END$$

CREATE PROCEDURE `sp_select_alumnos` ()  BEGIN
	SELECT
		id_alumno,
    	nombre,
    	apellido_paterno,
    	apellido_materno,
    	sexo,
    	fecha_nacimiento,
    	correo,
    	telefono_celular,
    	telefono_casa,
    	direccion,
    	curp,
    	matricula,
    	id_grupo,
    	id_carrera
    FROM alumnos;
END$$

CREATE PROCEDURE `sp_select_alumno_id` (IN `_ID_ALUMNO` INT(255))  BEGIN
SELECT
		id_alumno,
    	nombre,
    	apellido_paterno,
    	apellido_materno,
    	sexo,
    	fecha_nacimiento,
    	correo,
    	telefono_celular,
    	telefono_casa,
    	direccion,
    	curp,
    	matricula,
    	id_grupo,
    	id_carrera
    FROM alumnos 
    WHERE id_alumno = _ID_ALUMNO;
END$$

CREATE PROCEDURE `sp_select_datos_alumno` (IN `_ID_USUARIO` INT(255))  BEGIN
	SELECT
		id_alumno,
    	nombre,
    	apellido_paterno,
    	apellido_materno,
    	correo,
    	fecha_nacimiento,
    	curp,
    	matricula,
    	telefono_celular,
    	telefono_casa,
    	direccion
    FROM alumnos
    WHERE id_usuario = _ID_USUARIO;
END$$

CREATE PROCEDURE `sp_select_login` (IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18))  BEGIN
	SELECT
		id_usuario,
    	privilegio
    FROM usuarios
    WHERE matricula = _MATRICULA
        AND curp = _CURP
        AND estado = 1;
END$$

CREATE PROCEDURE `sp_select_login_alumno` (IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18))  BEGIN
	SELECT
	id_alumno
    FROM alumnos
    WHERE Matricula = _MATRICULA
        AND CURP = _CURP;
END$$

CREATE PROCEDURE `sp_select_maestros` ()  BEGIN
    SELECT 
        id_maestro,
        nombre_maestro,
        apellido_paterno,
        apellido_materno,
        correo,
        fecha_nacimiento,
        grado_academico,
        matricula,
        telefono_celular,
        telefono_casa,
        direccion,
        id_estado,
        curp
    FROM maestros;
END$$

CREATE PROCEDURE `sp_select_maestro_id` (IN `_ID_MAESTRO` INT(255))  BEGIN
    SELECT 
        id_maestro,
        nombre_maestro,
        apellido_paterno,
        apellido_materno,
        correo,
        fecha_nacimiento,
        grado_academico,
        matricula,
        telefono_celular,
        telefono_casa,
        direccion,
        id_estado,
        curp 
    FROM maestros
    WHERE id_maestro = _ID_MAESTRO;
END$$

CREATE PROCEDURE `sp_select_materias` ()  BEGIN
    SELECT
        id_materia,
        nombre_materia,
        siglas,
        horas
    FROM materias;
END$$

CREATE PROCEDURE `sp_select_search_alumno` (IN `_PATERNO` VARCHAR(255))  BEGIN
SELECT
		id_alumno,
    	nombre,
    	apellido_paterno,
    	apellido_materno,
    	sexo,
    	fecha_nacimiento,
    	correo,
    	telefono_celular,
    	telefono_casa,
    	direccion,
    	curp,
    	matricula,
    	id_grupo,
    	id_carrera
    FROM alumnos
    WHERE apellido_paterno LIKE CONCAT('%',_PATERNO,'%');
END$$

CREATE PROCEDURE `sp_update_alumno` (IN `_ID_ALUMNO` INT(255), IN `_NOMBRE` VARCHAR(255), IN `_PATERNO` VARCHAR(255), IN `_MATERNO` VARCHAR(255), IN `_CORREO` VARCHAR(255), IN `_FEC_NAC` DATE, IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18), IN `_SEXO` VARCHAR(255), IN `_TEL_CELULAR` VARCHAR(10), IN `_TEL_CASA` VARCHAR(10), IN `_DIRECCION` VARCHAR(255))  BEGIN
	UPDATE alumnos
	SET nombre = _NOMBRE,
		apellido_paterno =_PATERNO,
		apellido_materno =_MATERNO,
		correo = _CORREO,
		fecha_nacimiento =_FEC_NAC,
		matricula =	_MATRICULA,
		curp = _CURP,
		sexo = _SEXO,
		telefono_celular =_TEL_CELULAR,
		telefono_casa = _TEL_CASA,
		direccion = _DIRECCION,
		id_carrera =1,
		id_grupo =1
	WHERE id_alumno = _ID_ALUMNO;
END$$

CREATE PROCEDURE `sp_update_maestro` (IN `_ID_MAESTRO` INT(255), IN `_NOMBRE` VARCHAR(255), IN `_PATERNO` VARCHAR(255), IN `_MATERNO` VARCHAR(255), IN `_CORREO` VARCHAR(255), IN `_FEC_NAC` DATE, IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18), IN `_TEL_CELULAR` VARCHAR(10), IN `_TEL_CASA` VARCHAR(10), IN `_DIRECCION` VARCHAR(255), IN `_GRADO` VARCHAR(255))  BEGIN
    UPDATE maestros
    SET nombre_maestro = _NOMBRE,
        apellido_paterno =_PATERNO,
        apellido_materno =_MATERNO,
        correo = _CORREO,
        fecha_nacimiento =_FEC_NAC,
        matricula = _MATRICULA,
        curp = _CURP,
        telefono_celular =_TEL_CELULAR,
        telefono_casa = _TEL_CASA,
        direccion = _DIRECCION,
        grado_academico = _GRADO
    WHERE id_maestro = _ID_MAESTRO;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(255) NOT NULL,
  `id_usuario` int(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `curp` varchar(18) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `id_carrera` int(255) NOT NULL,
  `id_grupo` int(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `telefono_celular` varchar(10) NOT NULL,
  `telefono_casa` varchar(10) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo`, `fecha_nacimiento`, `curp`, `matricula`, `id_carrera`, `id_grupo`, `sexo`, `telefono_celular`, `telefono_casa`, `direccion`) VALUES
(3, NULL, 'Diego', 'Landaverde', 'Briones', 'diego@gmail.com', '2000-06-21', 'LABD000621HCLNRGA5', '18005433', 1, 1, 'masculino', '8781547118', '8781547118', 'Colinas 3 Azucena 502 Piedras Negras Coahuil'),
(4, NULL, 'Hosman Elian', 'Lozano', 'Cruz', 'elian51xd@gmail.com', '2000-04-19', 'LOCH000419HCLZRSA0', '18005056', 1, 1, 'masculino', '8787018115', '8787018115', 'Azucena 501 Colinas 2'),
(7, NULL, 'Diego', 'Landaverde', 'Briones', 'diego@gmail.com', '2000-06-21', 'LABD000621HCLNRGA5', '18005433', 1, 1, 'femenino', '8781547118', '8781547118', 'Colinas 3 Azucena 502 Piedras Negras Coahuil'),
(10, NULL, 'Hosman Elian', 'Lozano', 'Cruz', 'elian16dx@gmail.com', '2000-04-19', 'LOCH000419HCLZRSA0', '18005057', 1, 1, 'masculino', '8787018115', '8787028217', 'Azucena 501 Colinas 2'),
(11, NULL, 'Elian Hosman', 'Cruz', 'Lozano', 'elian15dx@gmail.com', '2000-04-19', 'LOCH000419HCLZRSA0', '18005421', 1, 1, 'masculino', '8787018115', '8787018115', 'Mar Adriatico 557 Villas del Carmen'),
(12, NULL, 'Hosman Elian', 'Lozano', 'Cruz', 'elian@gmail.com', '2000-04-19', 'LOCH000419HCLZRSA0', '18005421', 1, 1, 'Selecciona un sexo', '8787018115', '8787018115', 'Mar Adriatico 557 Villas del Carmen'),
(13, NULL, 'Diego', 'Landaverde', 'Briones', 'diego21@gmail.com', '0000-00-00', 'LABD000621HCLNRGA5', '12345677', 1, 1, '', '8781547118', '7839001', 'Colinas 3 Azucena 502 Piedras Negras Coahuil'),
(14, NULL, 'Diego', 'Landaverde', 'Briones', 'diego21@gmail.com', '2021-03-31', 'LABD000621HCLNRGA5', '12007856', 1, 1, '', '8781453421', '7832021', 'Mar Adriatico 557 Villas del Carmen'),
(15, NULL, 'Diego', 'Landaverde', 'Briones', 'diego@gmail.com', '2021-03-31', 'LABD000621HCLNRGA5', '12345687', 1, 1, '', '87814532', '7834523', 'Azucena 501 Colinas 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `abrebiatura` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(255) NOT NULL,
  `cuatri` varchar(255) NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `id_carrera` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id_maestro` int(255) NOT NULL,
  `nombre_maestro` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `grado_academico` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `telefono_celular` varchar(10) NOT NULL,
  `telefono_casa` varchar(10) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `id_estado` varchar(255) NOT NULL,
  `curp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id_maestro`, `nombre_maestro`, `apellido_paterno`, `apellido_materno`, `correo`, `fecha_nacimiento`, `grado_academico`, `matricula`, `telefono_celular`, `telefono_casa`, `direccion`, `id_estado`, `curp`) VALUES
(2, 'Diego', 'Landaverde', 'Briones', '\'soporte@borderbytes.mx', '0000-00-00', 'Licenciatura', '18005056', '8781547118', '7839401', '192 Calle Dr. Santiago Veve, Bayamón, 00961, Puerto Rico', '', 'LOCH000419HCLZRSA0'),
(3, 'Diego', 'Landaverde', 'Cruz', 'diego@gmail.com', '2021-03-31', 'Ingenieria', '12007867', '8781452321', '781234521', 'Azucena 501 Colinas 2', '', 'LABD000621HCLNRGA5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(255) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `siglas` varchar(255) NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `siglas`, `horas`) VALUES
(1, 'Planeacion y organizacion del trabajo', 'POT', 3),
(2, 'base de datos', 'BD', 4),
(3, 'Diseño Web', 'DW', 8),
(4, 'Diseño Web', 'DW', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(255) NOT NULL,
  `nombre_periodo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `privilegio` int(11) NOT NULL DEFAULT 3,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `matricula`, `curp`, `privilegio`, `estado`) VALUES
(1, '18005056', 'LOCH000419HCLZRSA0', 3, 1),
(2, '20210318', 'ABCabc123*', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id_maestro` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
