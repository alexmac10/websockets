-- MySQL Script generated by MySQL Workbench
-- 08/14/15 18:17:33
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema socket
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema socket
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `socket` DEFAULT CHARACTER SET latin1 ;
USE `socket` ;

-- -----------------------------------------------------
-- Table `socket`.`notificaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socket`.`notificaciones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `autor` VARCHAR(45) NULL DEFAULT NULL,
  `usuario` VARCHAR(45) NULL DEFAULT NULL,
  `revisada` VARCHAR(45) NULL DEFAULT NULL,
  `confirmacion` VARCHAR(45) NULL DEFAULT NULL,
  `detalle` VARCHAR(45) NULL DEFAULT NULL,
  `URL` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `socket`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socket`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL DEFAULT NULL,
  `contraseña` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
