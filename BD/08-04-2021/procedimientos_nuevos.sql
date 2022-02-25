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
DELIMITER $$
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
        matricula = _MATRICULA,
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

CREATE PROCEDURE `sp_delete_materia` (IN `_ID_MATERIA` INT(255))  BEGIN

    DELETE FROM materias WHERE id_materia = _ID_MATERIA;

END$$
DELIMITER $$
CREATE PROCEDURE `sp_select_materia_id` (IN `_ID_MATERIA` INT(255))  BEGIN
    SELECT
        id_materia,
        nombre_materia,
        siglas,
        horas
    FROM materias
    WHERE id_materia = _ID_MATERIA;
END$$
DELIMITER $$
CREATE PROCEDURE `sp_update_materia` (IN `_ID_MATERIA` INT(255),IN `_NOMBRE_MATERIA` VARCHAR(255), IN `_SIGLAS` VARCHAR(255), IN `_HORAS` INT(255))  BEGIN
    UPDATE materias
    SET nombre_materia = _NOMBRE_MATERIA,
        siglas = _SIGLAS,
        horas =_HORAS
    WHERE id_materia = _ID_MATERIA;
END$$
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_carreras`()
BEGIN
    SELECT
        id_carrera,
        nombre,
        abreviatura
    FROM carreras;
END$$
DELIMITER ;
DELIMITER $$
CREATE PROCEDURE `sp_agregar_carreras` (IN `_NOMBRE_CARRERA` VARCHAR(255), IN `_ABRIEVATURA` VARCHAR(255))  BEGIN
    INSERT INTO materias(
        nombre,
        abreviatura,
    ) 
    VALUES (
        _NOMBRE_CARRERA,
        _ABRIEVATURA,
    );
END$$
DELIMITER $$
CREATE PROCEDURE `sp_delete_carrera` (IN `_ID_CARRERA` INT(255))  BEGIN

    DELETE FROM carreras WHERE id_carrera = _ID_CARRERA;

END$$

-- --------------------------------------------------------