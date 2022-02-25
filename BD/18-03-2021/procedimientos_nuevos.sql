DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_alumnos`()
BEGIN
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
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_alumno`(IN `_ID_ALUMNO` INT(255),IN `_NOMBRE` VARCHAR(255), IN `_PATERNO` VARCHAR(255), IN `_MATERNO` VARCHAR(255), IN `_CORREO` VARCHAR(255), IN `_FEC_NAC` DATE, IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18),IN `_SEXO` VARCHAR(255), IN `_TEL_CELULAR` VARCHAR(10), IN `_TEL_CASA` VARCHAR(10),IN `_DIRECCION` VARCHAR(255))
BEGIN
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
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_alumno`(IN `_ID_ALUMNO` INT(255))
BEGIN

DELETE FROM alumnos WHERE id_alumno = _ID_ALUMNO;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_alumno_id`(IN `_ID_ALUMNO` INT(255))
BEGIN
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
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_login_alumno`(IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18))
BEGIN
	SELECT
	id_alumno
    FROM alumnos
    WHERE Matricula = _MATRICULA
        AND CURP = _CURP;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_datos_alumno`(IN `_ID_USUARIO` INT(255))
BEGIN
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
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_login`(IN `_MATRICULA` VARCHAR(8), IN `_CURP` VARCHAR(18))
BEGIN
	SELECT
		id_usuario,
    	privilegio
    FROM usuarios
    WHERE matricula = _MATRICULA
        AND curp = _CURP
        AND estado = 1;
END$$
DELIMITER ;
