-- MySQL Workbench Synchronization
-- Generated: 2018-10-11 10:57
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: toshiba gamer

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `beca_juventud_1.1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`academico` (
  `id_academico` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_solicitante` INT(11) NOT NULL COMMENT '',
  `id_centro_estudio` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_carrera` INT(11) NULL DEFAULT NULL COMMENT '',
  `anio` YEAR NOT NULL COMMENT '',
  `n_cuenta` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `anio_academic` INT(11) NULL DEFAULT NULL COMMENT '',
  `periodo` INT(11) NULL DEFAULT NULL COMMENT '',
  `indice_periodo` FLOAT(11) NULL DEFAULT NULL COMMENT '',
  `indice_global` FLOAT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_academico`)  COMMENT '',
  INDEX `fk_centrotoacadem` (`id_centro_estudio` ASC)  COMMENT '',
  INDEX `fk_carreratoacadem` (`id_carrera` ASC)  COMMENT '',
  INDEX `fk_solicitotoacadem` (`id_solicitante` ASC)  COMMENT '',
  INDEX `periodo` (`periodo` ASC)  COMMENT '',
  INDEX `anio_academic` (`anio_academic` ASC)  COMMENT '',
  CONSTRAINT `academico_ibfk_1`
    FOREIGN KEY (`id_centro_estudio`)
    REFERENCES `beca_juventud_1.1`.`centro_universitario` (`id_centro`)
    ON UPDATE CASCADE,
  CONSTRAINT `academico_ibfk_2`
    FOREIGN KEY (`id_solicitante`)
    REFERENCES `beca_juventud_1.1`.`datos_personales` (`id_datos_personales`)
    ON UPDATE CASCADE,
  CONSTRAINT `academico_ibfk_3`
    FOREIGN KEY (`id_carrera`)
    REFERENCES `beca_juventud_1.1`.`carrera` (`id_carrera`)
    ON UPDATE CASCADE,
  CONSTRAINT `academico_ibfk_4`
    FOREIGN KEY (`anio_academic`)
    REFERENCES `beca_juventud_1.1`.`anio_academico` (`id_anio`)
    ON UPDATE CASCADE,
  CONSTRAINT `academico_ibfk_5`
    FOREIGN KEY (`periodo`)
    REFERENCES `beca_juventud_1.1`.`periodo_academic` (`id_periodo`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`anio_academico` (
  `id_anio` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `anio_academico` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`id_anio`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`area` (
  `id_area` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `area` VARCHAR(200) NOT NULL COMMENT '',
  `id_departamento` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_area`)  COMMENT '',
  INDEX `fk_depto_area` (`id_departamento` ASC)  COMMENT '',
  CONSTRAINT `area_ibfk_1`
    FOREIGN KEY (`id_departamento`)
    REFERENCES `beca_juventud_1.1`.`deptos` (`id_departamento`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`calendario_anual` (
  `id_calendario` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `anio` YEAR NOT NULL COMMENT '',
  `id_universidad` INT(11) NOT NULL COMMENT '',
  `fecha_ini_ip` DATE NOT NULL COMMENT '',
  `fecha_fin_ip` DATE NOT NULL COMMENT '',
  `fecha_ini_act_ip` DATE NOT NULL COMMENT '',
  `fecha_fin_act_ip` DATE NOT NULL COMMENT '',
  `fecha_ini_iip` DATE NOT NULL COMMENT '',
  `fecha_fin_iip` DATE NOT NULL COMMENT '',
  `fecha_ini_act_iip` DATE NOT NULL COMMENT '',
  `fecha_fin_act_iip` DATE NOT NULL COMMENT '',
  `fecha_ini_iiip` DATE NOT NULL COMMENT '',
  `fecha_fin_iiip` DATE NOT NULL COMMENT '',
  `fecha_ini_act_iiip` DATE NOT NULL COMMENT '',
  `fecha_fin_act_iiip` DATE NOT NULL COMMENT '',
  `fecha_ini_ivp` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_ivp` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_act_ivp` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_act_ivp` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_is` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_is` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_act_is` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_act_is` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_iis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_iis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_act_iis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_act_iis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_iiis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_iiis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_act_iiis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_act_iiis` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_ivs` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_ivs` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ini_act_ivs` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_fin_act_ivs` DATE NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_calendario`)  COMMENT '',
  INDEX `fk_calend_univ` (`id_universidad` ASC)  COMMENT '',
  CONSTRAINT `calendario_anual_ibfk_1`
    FOREIGN KEY (`id_universidad`)
    REFERENCES `beca_juventud_1.1`.`universidad` (`id_universidad`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`cargo` (
  `id_cargo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `cargo` VARCHAR(200) NOT NULL COMMENT '',
  PRIMARY KEY (`id_cargo`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`carrera` (
  `id_carrera` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `carrera` VARCHAR(150) NOT NULL COMMENT '',
  `valor` FLOAT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_carrera`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 122
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`centro_universitario` (
  `id_centro` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `centro` VARCHAR(250) NOT NULL COMMENT '',
  `id_universidad` INT(11) NULL DEFAULT NULL COMMENT '',
  `departamento` INT(11) NOT NULL COMMENT '',
  `municipio` INT(11) NOT NULL COMMENT '',
  `id_estado_act` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_centro`)  COMMENT '',
  INDEX `fk_deptotocentro` (`departamento` ASC)  COMMENT '',
  INDEX `fk_munitocentro` (`municipio` ASC)  COMMENT '',
  INDEX `fk_centro_esta` (`id_estado_act` ASC)  COMMENT '',
  INDEX `fk_unive_centro` (`id_universidad` ASC)  COMMENT '',
  CONSTRAINT `centro_universitario_ibfk_1`
    FOREIGN KEY (`departamento`)
    REFERENCES `beca_juventud_1.1`.`departamento` (`id_depto`)
    ON UPDATE CASCADE,
  CONSTRAINT `centro_universitario_ibfk_2`
    FOREIGN KEY (`municipio`)
    REFERENCES `beca_juventud_1.1`.`municipio` (`id_municipio`)
    ON UPDATE CASCADE,
  CONSTRAINT `centro_universitario_ibfk_3`
    FOREIGN KEY (`id_estado_act`)
    REFERENCES `beca_juventud_1.1`.`estado_actualizar` (`id_estado_ac`)
    ON UPDATE CASCADE,
  CONSTRAINT `centro_universitario_ibfk_4`
    FOREIGN KEY (`id_universidad`)
    REFERENCES `beca_juventud_1.1`.`universidad` (`id_universidad`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 71
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`convocatoria` (
  `id_convocatoria` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `periodo` YEAR NOT NULL COMMENT '',
  `fecha_inicio` DATE NOT NULL COMMENT '',
  `fecha_final` DATE NOT NULL COMMENT '',
  `duracion` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_convocatoria`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`datos_laboral` (
  `id_laboral` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `entidad` VARCHAR(300) NULL DEFAULT NULL COMMENT '',
  `cargo` VARCHAR(300) NULL DEFAULT NULL COMMENT '',
  `fecha_inicio` DATE NULL DEFAULT NULL COMMENT '',
  `jefe_inmediato` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `telefono_referencia` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `tipo_ingreso` INT(11) NULL DEFAULT NULL COMMENT '',
  `ingreso` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_solicitante` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_laboral`)  COMMENT '',
  INDEX `fk_tip_ingres` (`tipo_ingreso` ASC)  COMMENT '',
  INDEX `fk_ingreso` (`ingreso` ASC)  COMMENT '',
  CONSTRAINT `datos_laboral_ibfk_1`
    FOREIGN KEY (`tipo_ingreso`)
    REFERENCES `beca_juventud_1.1`.`tipo_ingreso` (`id_tipo_ingreso`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_laboral_ibfk_2`
    FOREIGN KEY (`ingreso`)
    REFERENCES `beca_juventud_1.1`.`ingreso` (`id_ingreso`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`datos_madre` (
  `id_madre` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `identidad` VARCHAR(13) NULL DEFAULT NULL COMMENT '',
  `p_nombre` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `s_nombre` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `p_apellido` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `s_apellido` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  `telefono` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `celular` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `id_solicitante` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_madre`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`datos_padre` (
  `id_padre` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `identidad` VARCHAR(13) NULL DEFAULT NULL COMMENT '',
  `p_nombre` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `s_nombre` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `p_apellido` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `s_apellido` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  `telefono` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `celular` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `id_solicitante` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_padre`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`datos_personales` (
  `id_datos_personales` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_estado_estudios` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_cargo` INT(11) NULL DEFAULT NULL COMMENT '',
  `identidad` VARCHAR(13) NOT NULL COMMENT '',
  `p_nombre` VARCHAR(100) NOT NULL COMMENT '',
  `s_nombre` VARCHAR(100) NULL DEFAULT NULL COMMENT '',
  `p_apellido` VARCHAR(100) NOT NULL COMMENT '',
  `s_apellido` VARCHAR(100) NULL DEFAULT NULL COMMENT '',
  `fecha_nac` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_egreso` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_ingreso_beca` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_inicio_practica` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_final_practica` DATE NULL DEFAULT NULL COMMENT '',
  `duracion_practica` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `edad` TINYINT(4) NULL DEFAULT NULL COMMENT '',
  `genero` INT(11) NULL DEFAULT NULL COMMENT '',
  `estado_civil` INT(11) NULL DEFAULT NULL COMMENT '',
  `discapacidad` VARCHAR(2) NULL DEFAULT NULL COMMENT '',
  `departamento` INT(11) NOT NULL COMMENT '',
  `municipio` INT(11) NOT NULL COMMENT '',
  `ciudad` VARCHAR(200) NOT NULL COMMENT '',
  `departamento_res` INT(11) NULL DEFAULT NULL COMMENT '',
  `municipio_res` INT(11) NULL DEFAULT NULL COMMENT '',
  `ciudad_res` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `direccion` VARCHAR(400) NULL DEFAULT NULL COMMENT '',
  `colonia` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `bloque` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `casa` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `referenciaDir` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `cod_postal` SMALLINT(6) NULL DEFAULT NULL COMMENT '',
  `telefono` VARCHAR(11) NULL DEFAULT NULL COMMENT '',
  `celular` VARCHAR(11) NULL DEFAULT NULL COMMENT '',
  `num_whatsapp` VARCHAR(11) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(250) NOT NULL COMMENT '',
  `passw` VARCHAR(250) NOT NULL COMMENT '',
  `id_padre` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_madre` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_laboral` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_extracurr` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_datos_personales`)  COMMENT '',
  INDEX `fk_personaltogener` (`genero` ASC)  COMMENT '',
  INDEX `fk_estacivtopersonal` (`estado_civil` ASC)  COMMENT '',
  INDEX `fk_deptotopersonal` (`departamento` ASC)  COMMENT '',
  INDEX `fk_municiotopersonal` (`municipio` ASC)  COMMENT '',
  INDEX `fk_deptorestoperson` (`departamento_res` ASC)  COMMENT '',
  INDEX `fk_municprestoperson` (`municipio_res` ASC)  COMMENT '',
  INDEX `fk_padre_to_soli` (`id_padre` ASC)  COMMENT '',
  INDEX `fk_madre_to sol` (`id_madre` ASC)  COMMENT '',
  INDEX `id_laboral` (`id_laboral` ASC)  COMMENT '',
  INDEX `id_extracurr` (`id_extracurr` ASC)  COMMENT '',
  INDEX `id_cargo` (`id_cargo` ASC)  COMMENT '',
  INDEX `id_estado_estudios` (`id_estado_estudios` ASC)  COMMENT '',
  CONSTRAINT `datos_personales_ibfk_1`
    FOREIGN KEY (`genero`)
    REFERENCES `beca_juventud_1.1`.`genero` (`id_genero`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_10`
    FOREIGN KEY (`id_extracurr`)
    REFERENCES `beca_juventud_1.1`.`extra_curricular` (`id_extracurr`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_11`
    FOREIGN KEY (`id_cargo`)
    REFERENCES `beca_juventud_1.1`.`tipo_cargo` (`id_cargo`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_12`
    FOREIGN KEY (`id_estado_estudios`)
    REFERENCES `beca_juventud_1.1`.`estado_estudios` (`id_estado_estudios`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_2`
    FOREIGN KEY (`estado_civil`)
    REFERENCES `beca_juventud_1.1`.`estado_civil` (`id_estado_civil`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_3`
    FOREIGN KEY (`departamento`)
    REFERENCES `beca_juventud_1.1`.`departamento` (`id_depto`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_4`
    FOREIGN KEY (`municipio`)
    REFERENCES `beca_juventud_1.1`.`municipio` (`id_municipio`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_5`
    FOREIGN KEY (`departamento_res`)
    REFERENCES `beca_juventud_1.1`.`departamento` (`id_depto`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_6`
    FOREIGN KEY (`municipio_res`)
    REFERENCES `beca_juventud_1.1`.`municipio` (`id_municipio`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_7`
    FOREIGN KEY (`id_padre`)
    REFERENCES `beca_juventud_1.1`.`datos_padre` (`id_padre`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_8`
    FOREIGN KEY (`id_madre`)
    REFERENCES `beca_juventud_1.1`.`datos_madre` (`id_madre`)
    ON UPDATE CASCADE,
  CONSTRAINT `datos_personales_ibfk_9`
    FOREIGN KEY (`id_laboral`)
    REFERENCES `beca_juventud_1.1`.`datos_laboral` (`id_laboral`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`departamento` (
  `id_depto` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `departamento` VARCHAR(250) NOT NULL COMMENT '',
  `estado_convocatoria` INT(11) NULL DEFAULT NULL COMMENT '',
  `fecha_inicio` DATE NULL DEFAULT NULL COMMENT '',
  `fecha_final` DATE NULL DEFAULT NULL COMMENT '',
  `hora_inicio` TIME NULL DEFAULT NULL COMMENT '',
  `hora_final` TIME NULL DEFAULT NULL COMMENT '',
  `cantidad_beca` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_depto`)  COMMENT '',
  INDEX `estado_convocatoria` (`estado_convocatoria` ASC)  COMMENT '',
  CONSTRAINT `departamento_ibfk_1`
    FOREIGN KEY (`estado_convocatoria`)
    REFERENCES `beca_juventud_1.1`.`estado_convocatoria` (`id_estado_conv`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`depto_gest` (
  `id_depto_gest` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_usuario` INT(11) NOT NULL COMMENT '',
  `atlantida` INT(11) NULL DEFAULT NULL COMMENT '',
  `colon` INT(11) NULL DEFAULT NULL COMMENT '',
  `comayagua` INT(11) NULL DEFAULT NULL COMMENT '',
  `copan` INT(11) NULL DEFAULT NULL COMMENT '',
  `cortes` INT(11) NULL DEFAULT NULL COMMENT '',
  `choluteca` INT(11) NULL DEFAULT NULL COMMENT '',
  `paraiso` INT(11) NULL DEFAULT NULL COMMENT '',
  `fmorazan` INT(11) NULL DEFAULT NULL COMMENT '',
  `graciasd` INT(11) NULL DEFAULT NULL COMMENT '',
  `intibuca` INT(11) NULL DEFAULT NULL COMMENT '',
  `islas` INT(11) NULL DEFAULT NULL COMMENT '',
  `lapaz` INT(11) NULL DEFAULT NULL COMMENT '',
  `lempira` INT(11) NULL DEFAULT NULL COMMENT '',
  `ocotepeque` INT(11) NULL DEFAULT NULL COMMENT '',
  `olancho` INT(11) NULL DEFAULT NULL COMMENT '',
  `stabarbara` INT(11) NULL DEFAULT NULL COMMENT '',
  `valle` INT(11) NULL DEFAULT NULL COMMENT '',
  `yoro` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_depto_gest`)  COMMENT '',
  INDEX `fk_gest_user` (`id_usuario` ASC)  COMMENT '',
  CONSTRAINT `depto_gest_ibfk_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `beca_juventud_1.1`.`usuarios` (`id_usuario`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`deptos` (
  `id_departamento` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `departamento` VARCHAR(150) NOT NULL COMMENT '',
  PRIMARY KEY (`id_departamento`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`detalle_academic` (
  `id_detalle_aca` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_academico` INT(11) NOT NULL COMMENT '',
  `anio` YEAR NOT NULL COMMENT '',
  `id_calendario` INT(11) NOT NULL COMMENT '',
  `periodo` INT(11) NOT NULL COMMENT '',
  `indice` FLOAT(11) NOT NULL COMMENT '',
  `fecha_actualizacion` DATE NOT NULL COMMENT '',
  `id_estado_periodo` INT(11) NOT NULL COMMENT '',
  `id_actualizacion` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_detalle_aca`)  COMMENT '',
  INDEX `fk_detall_acade` (`id_academico` ASC)  COMMENT '',
  INDEX `fk_detall_calend` (`id_calendario` ASC)  COMMENT '',
  INDEX `id_actualizacion` (`id_actualizacion` ASC)  COMMENT '',
  INDEX `id_estado_periodo` (`id_estado_periodo` ASC)  COMMENT '',
  CONSTRAINT `detalle_academic_ibfk_1`
    FOREIGN KEY (`id_academico`)
    REFERENCES `beca_juventud_1.1`.`academico` (`id_academico`)
    ON UPDATE CASCADE,
  CONSTRAINT `detalle_academic_ibfk_2`
    FOREIGN KEY (`id_calendario`)
    REFERENCES `beca_juventud_1.1`.`calendario_anual` (`id_calendario`)
    ON UPDATE CASCADE,
  CONSTRAINT `detalle_academic_ibfk_3`
    FOREIGN KEY (`id_actualizacion`)
    REFERENCES `beca_juventud_1.1`.`estado_actualiz` (`id_estado_actualiz`)
    ON UPDATE CASCADE,
  CONSTRAINT `detalle_academic_ibfk_4`
    FOREIGN KEY (`id_estado_periodo`)
    REFERENCES `beca_juventud_1.1`.`estado_periodo` (`id_estado_periodo`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`documento` (
  `id_documento` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_solicitante` INT(11) NOT NULL COMMENT '',
  `id_tipo_document` INT(11) NULL DEFAULT NULL COMMENT '',
  `tamanio` MEDIUMINT(9) NULL DEFAULT NULL COMMENT '',
  `nombre_archivo` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  `titulo` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  `url_img` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  `id_solicitud` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_documento`)  COMMENT '',
  INDEX `fk_solitanttodocum` (`id_solicitante` ASC)  COMMENT '',
  INDEX `fk_solictodocume` (`id_solicitud` ASC)  COMMENT '',
  INDEX `fk_tipodoctosolici` (`id_tipo_document` ASC)  COMMENT '',
  CONSTRAINT `documento_ibfk_1`
    FOREIGN KEY (`id_solicitante`)
    REFERENCES `beca_juventud_1.1`.`datos_personales` (`id_datos_personales`)
    ON UPDATE CASCADE,
  CONSTRAINT `documento_ibfk_2`
    FOREIGN KEY (`id_solicitud`)
    REFERENCES `beca_juventud_1.1`.`solicitud` (`id_solicitud`)
    ON UPDATE CASCADE,
  CONSTRAINT `documento_ibfk_3`
    FOREIGN KEY (`id_tipo_document`)
    REFERENCES `beca_juventud_1.1`.`tipo_documento` (`id_tipo`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 34
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`estado_actualiz` (
  `id_estado_actualiz` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `estado_actualiz` VARCHAR(50) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estado_actualiz`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`estado_actualizar` (
  `id_estado_ac` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `estado_actualizar` VARCHAR(50) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estado_ac`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`estado_civil` (
  `id_estado_civil` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `estado_civil` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estado_civil`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`estado_convocatoria` (
  `id_estado_conv` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `estado_convocatoria` VARCHAR(25) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estado_conv`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`estado_estudios` (
  `id_estado_estudios` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `fecha` DATE NOT NULL COMMENT '',
  `descripcion` VARCHAR(300) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estado_estudios`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`estado_periodo` (
  `id_estado_periodo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `estado` VARCHAR(50) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estado_periodo`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`estado_solicitud` (
  `id_estado_solici` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `estado_solicitud` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estado_solici`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`extra_curricular` (
  `id_extracurr` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `extracurricular` VARCHAR(300) NULL DEFAULT NULL COMMENT '',
  `id_solicitante` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_extracurr`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`fotografia` (
  `id_foto` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `url_foto` VARCHAR(100) NOT NULL COMMENT '',
  `id_datos_personales` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_foto`)  COMMENT '',
  INDEX `id_datos_personales` (`id_datos_personales` ASC)  COMMENT '',
  CONSTRAINT `fotografia_ibfk_1`
    FOREIGN KEY (`id_datos_personales`)
    REFERENCES `beca_juventud_1.1`.`datos_personales` (`id_datos_personales`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`genero` (
  `id_genero` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `genero` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id_genero`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`ingreso` (
  `id_ingreso` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `ingreso` VARCHAR(150) NOT NULL COMMENT '',
  PRIMARY KEY (`id_ingreso`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`modulo` (
  `id_modulo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_taller` INT(11) NOT NULL COMMENT '',
  `id_modulo_padre` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_modulo`)  COMMENT '',
  INDEX `id_modulo-padre` (`id_modulo_padre` ASC)  COMMENT '',
  INDEX `id_taller` (`id_taller` ASC)  COMMENT '',
  CONSTRAINT `modulo_ibfk_1`
    FOREIGN KEY (`id_modulo_padre`)
    REFERENCES `beca_juventud_1.1`.`modulo` (`id_modulo`)
    ON UPDATE CASCADE,
  CONSTRAINT `modulo_ibfk_2`
    FOREIGN KEY (`id_taller`)
    REFERENCES `beca_juventud_1.1`.`taller` (`id_taller`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`municipio` (
  `id_municipio` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `municipio` VARCHAR(200) NOT NULL COMMENT '',
  `id_depto` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_municipio`)  COMMENT '',
  INDEX `id_departamento` (`id_depto` ASC)  COMMENT '',
  CONSTRAINT `municipio_ibfk_1`
    FOREIGN KEY (`id_depto`)
    REFERENCES `beca_juventud_1.1`.`departamento` (`id_depto`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 299
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`per_mod` (
  `id_datos_personales` INT(11) NOT NULL COMMENT '',
  `id_modulo` INT(11) NOT NULL COMMENT '',
  `nota` INT(11) NOT NULL COMMENT '',
  `observacion` VARCHAR(300) NOT NULL COMMENT '',
  INDEX `id_datos_personales` (`id_datos_personales` ASC)  COMMENT '',
  INDEX `id_modulo` (`id_modulo` ASC)  COMMENT '',
  CONSTRAINT `per_mod_ibfk_1`
    FOREIGN KEY (`id_datos_personales`)
    REFERENCES `beca_juventud_1.1`.`datos_personales` (`id_datos_personales`)
    ON UPDATE CASCADE,
  CONSTRAINT `per_mod_ibfk_2`
    FOREIGN KEY (`id_modulo`)
    REFERENCES `beca_juventud_1.1`.`modulo` (`id_modulo`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`perfiles` (
  `id_perfil` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `perfil` VARCHAR(200) NOT NULL COMMENT '',
  PRIMARY KEY (`id_perfil`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`periodo_academic` (
  `id_periodo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `periodo_academic` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id_periodo`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`retenido` (
  `id_retenido` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_datos_personales` INT(11) NOT NULL COMMENT '',
  `nombre` VARCHAR(200) NOT NULL COMMENT '',
  `descripcion` VARCHAR(300) NOT NULL COMMENT '',
  `fecha` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id_retenido`)  COMMENT '',
  INDEX `id_datos_personales` (`id_datos_personales` ASC)  COMMENT '',
  CONSTRAINT `retenido_ibfk_1`
    FOREIGN KEY (`id_datos_personales`)
    REFERENCES `beca_juventud_1.1`.`datos_personales` (`id_datos_personales`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`solicitud` (
  `id_solicitud` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_convocatoria` INT(11) NOT NULL COMMENT '',
  `fecha_solicitud` DATE NOT NULL COMMENT '',
  `id_solicitante` INT(11) NOT NULL COMMENT '',
  `id_academica` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_tipo_solicitud` INT(11) NOT NULL COMMENT '',
  `id_estado_solicitud` INT(11) NOT NULL COMMENT '',
  `id_estado_actualiz` INT(11) NOT NULL COMMENT '',
  `progreso` INT(11) NULL DEFAULT NULL COMMENT '',
  `recomendado` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `gestionado_por` INT(11) NULL DEFAULT NULL COMMENT '',
  `observacion` VARCHAR(400) NULL DEFAULT NULL COMMENT '',
  `fecha_modificacion` DATE NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_solicitud`)  COMMENT '',
  INDEX `fk_solictosolicit` (`id_solicitante` ASC)  COMMENT '',
  INDEX `fk_tipotosolicit` (`id_tipo_solicitud` ASC)  COMMENT '',
  INDEX `fk_estadotosolicitud` (`id_estado_solicitud` ASC)  COMMENT '',
  INDEX `fk_acadetosolicit` (`id_academica` ASC)  COMMENT '',
  INDEX `id_convocatoria` (`id_convocatoria` ASC)  COMMENT '',
  INDEX `solici_acualiz` (`id_estado_actualiz` ASC)  COMMENT '',
  CONSTRAINT `solicitud_ibfk_1`
    FOREIGN KEY (`id_solicitante`)
    REFERENCES `beca_juventud_1.1`.`datos_personales` (`id_datos_personales`)
    ON UPDATE CASCADE,
  CONSTRAINT `solicitud_ibfk_2`
    FOREIGN KEY (`id_academica`)
    REFERENCES `beca_juventud_1.1`.`academico` (`id_academico`)
    ON UPDATE CASCADE,
  CONSTRAINT `solicitud_ibfk_3`
    FOREIGN KEY (`id_tipo_solicitud`)
    REFERENCES `beca_juventud_1.1`.`tipo_solicitud` (`id_tipo_solicitud`)
    ON UPDATE CASCADE,
  CONSTRAINT `solicitud_ibfk_4`
    FOREIGN KEY (`id_estado_solicitud`)
    REFERENCES `beca_juventud_1.1`.`estado_solicitud` (`id_estado_solici`)
    ON UPDATE CASCADE,
  CONSTRAINT `solicitud_ibfk_5`
    FOREIGN KEY (`id_convocatoria`)
    REFERENCES `beca_juventud_1.1`.`convocatoria` (`id_convocatoria`)
    ON UPDATE CASCADE,
  CONSTRAINT `solicitud_ibfk_6`
    FOREIGN KEY (`id_estado_actualiz`)
    REFERENCES `beca_juventud_1.1`.`estado_actualiz` (`id_estado_actualiz`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`solicitudes_puntuales` (
  `id_solicitud_p` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `identidad` VARCHAR(13) NOT NULL COMMENT '',
  `recomendado` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_solicitud_p`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 54
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`taller` (
  `id_taller` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_modulo` INT(11) NOT NULL COMMENT '',
  `nombre` VARCHAR(300) NOT NULL COMMENT '',
  `organizacion` VARCHAR(300) NOT NULL COMMENT '',
  PRIMARY KEY (`id_taller`)  COMMENT '',
  INDEX `id_modulo` (`id_modulo` ASC)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`tipo-cargo` (
  `id_cargo` INT(11) NOT NULL COMMENT '',
  `nombre_cargo` VARCHAR(100) NOT NULL COMMENT '',
  `monto` INT(11) NOT NULL COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`tipo_admin` (
  `id_tipo_admin` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `tipo_admin` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id_tipo_admin`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`tipo_cargo` (
  `id_cargo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_cargo` VARCHAR(200) NOT NULL COMMENT '',
  `monto` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY USING BTREE (`id_cargo`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`tipo_documento` (
  `id_tipo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `tipo_doc` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id_tipo`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`tipo_ingreso` (
  `id_tipo_ingreso` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `tipo_ingreso` VARCHAR(150) NOT NULL COMMENT '',
  PRIMARY KEY (`id_tipo_ingreso`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`tipo_solicitud` (
  `id_tipo_solicitud` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `tipo_solicitud` VARCHAR(150) NOT NULL COMMENT '',
  PRIMARY KEY (`id_tipo_solicitud`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`universidad` (
  `id_universidad` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `universidad` VARCHAR(250) NOT NULL COMMENT '',
  `nombre` VARCHAR(200) NOT NULL COMMENT '',
  PRIMARY KEY (`id_universidad`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `identidad` VARCHAR(13) NOT NULL COMMENT '',
  `fecha_creacion` DATE NULL DEFAULT NULL COMMENT '',
  `p_nombre` VARCHAR(50) NOT NULL COMMENT '',
  `s_nombre` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `p_apellido` VARCHAR(50) NOT NULL COMMENT '',
  `s_apellido` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `telefono` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `celular` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `id_departamento` INT(11) NOT NULL COMMENT '',
  `id_area` INT(11) NOT NULL COMMENT '',
  `id_cargo` INT(11) NOT NULL COMMENT '',
  `id_perfil` INT(11) NOT NULL COMMENT '',
  `passw` VARCHAR(50) NOT NULL COMMENT '',
  `id_tipo_admin` INT(11) NOT NULL COMMENT '',
  `creador` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_usuario`)  COMMENT '',
  INDEX `fk_tipo_admin` (`id_tipo_admin` ASC)  COMMENT '',
  INDEX `fk_depto_to_admin` (`id_departamento` ASC)  COMMENT '',
  INDEX `fk_area_to_admin` (`id_area` ASC)  COMMENT '',
  INDEX `fk_cargo_to_admin` (`id_cargo` ASC)  COMMENT '',
  INDEX `fk_perfil_to_admin` (`id_perfil` ASC)  COMMENT '',
  CONSTRAINT `usuarios_ibfk_1`
    FOREIGN KEY (`id_tipo_admin`)
    REFERENCES `beca_juventud_1.1`.`tipo_admin` (`id_tipo_admin`)
    ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_2`
    FOREIGN KEY (`id_area`)
    REFERENCES `beca_juventud_1.1`.`area` (`id_area`)
    ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_3`
    FOREIGN KEY (`id_departamento`)
    REFERENCES `beca_juventud_1.1`.`deptos` (`id_departamento`)
    ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_4`
    FOREIGN KEY (`id_cargo`)
    REFERENCES `beca_juventud_1.1`.`cargo` (`id_cargo`)
    ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_5`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `beca_juventud_1.1`.`perfiles` (`id_perfil`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`actividades` (
  `id_actividades` INT(11) NOT NULL COMMENT '',
  `nombre` VARCHAR(90) NULL DEFAULT NULL COMMENT '',
  `logistica` VARCHAR(95) NULL DEFAULT NULL COMMENT '',
  `objetivo` VARCHAR(200) NULL DEFAULT NULL COMMENT '',
  `alcance` VARCHAR(150) NULL DEFAULT NULL COMMENT '',
  `horas` INT(11) NULL DEFAULT NULL COMMENT '',
  `inicio` DATE NULL DEFAULT NULL COMMENT '',
  `final` DATE NULL DEFAULT NULL COMMENT '',
  `estado` ENUM('Activo', 'Desactivo') NULL DEFAULT 'Activo' COMMENT '',
  `usuario_LaCreo` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_actividades`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`per_act` (
  `id` INT(11) NOT NULL COMMENT '',
  `Fecha` DATE NULL DEFAULT NULL COMMENT '',
  `actividades_id_actividades` INT(11) NOT NULL COMMENT '',
  `datos_personales_id_datos_personales` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_per_act_actividades1_idx` (`actividades_id_actividades` ASC)  COMMENT '',
  INDEX `fk_per_act_datos_personales1_idx` (`datos_personales_id_datos_personales` ASC)  COMMENT '',
  CONSTRAINT `fk_per_act_actividades1`
    FOREIGN KEY (`actividades_id_actividades`)
    REFERENCES `beca_juventud_1.1`.`actividades` (`id_actividades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`compromiso_social_horas` (
  `id` INT(11) NOT NULL COMMENT '',
  `nombre` VARCHAR(95) NOT NULL COMMENT '',
  `fecha` DATE NOT NULL COMMENT '',
  `horas` INT(11) NOT NULL COMMENT '',
  `datos_personales_id_datos_personales` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_compromiso_social_horas_datos_personales1_idx` (`datos_personales_id_datos_personales` ASC)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `beca_juventud_1.1`.`grupo_becarios` (
  `id` INT(11) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `` INT(11) NULL DEFAULT NULL COMMENT '',
  `id_embajador` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_grupo_becarios_datos_personales1_idx` (`id_embajador` ASC)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
