-- MySQL Script generated by MySQL Workbench
-- Tue Nov  8 23:06:30 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_sale
-- -----------------------------------------------------
SHOW WARNINGS;
-- -----------------------------------------------------
-- Schema web
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `web` ;

-- -----------------------------------------------------
-- Schema web
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `web` DEFAULT CHARACTER SET latin1 ;
SHOW WARNINGS;
USE `web` ;

-- -----------------------------------------------------
-- Table `wishes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wishes`;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `wishes` (
  `id_wishes` INT NOT NULL AUTO_INCREMENT,
  `id_guest`  INT NOT NULL,
  `message`   TEXT NULL,
  `deleted`   INT NOT NULL,
  `date_add`  DATETIME NULL,
  `date_upd`  DATETIME NULL,
  PRIMARY KEY (`id_wishes`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tables`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tables`;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `tables` (
  `id_tables` INT NOT NULL AUTO_INCREMENT,
  `id_event`  INT NOT NULL,
  `id_guest`  INT NOT NULL,
  `table_number` INT NOT NULL,
  `qyt_tickets`  INT NULL,
  `deleted`   INT NOT NULL,
  `date_add`  DATETIME NULL,
  `date_upd`  DATETIME NULL,
  PRIMARY KEY (`id_tables`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `guest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guest` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `guest` (
  `id_guest`  INT NOT NULL AUTO_INCREMENT,
  `id_event`  INT NOT NULL,
  `id_guest_parent`  INT NULL,
  `name`     VARCHAR(200) NULL,
  `qyt_tickets`   INT NULL,
  `confirmation` ENUM('pending', 'cancelled', 'confirmed') NULL DEFAULT 'pending',
  `phone`     VARCHAR(30) NULL,
  `token`        VARCHAR(500) NULL,
  `wsp_calltoaction` INT NULL,
  `openinvitation_calltoaction` INT NULL,
  `openinvitation_lastdate` DATETIME NULL,
  `deleted`   INT NOT NULL,
  `date_add`  DATETIME NULL,
  `date_upd`  DATETIME NULL,
  PRIMARY KEY (`id_guest`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event`;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event`  INT NOT NULL AUTO_INCREMENT,
  `id_user`  INT NOT NULL,
  `name`      VARCHAR(200) NULL,
  `description`   TEXT NOT NULL,
  `category`  ENUM('boda', 'cumpleaños', 'quinceañero', 'entierro') NULL,
  `template`  VARCHAR(200) NULL,
  `msj_template`  VARCHAR(500) NULL,
  `uri`       VARCHAR(200) NULL,
  `json`      JSON NULL,
  `qty_table` INT NOT NULL,
  `active`    INT NULL,
  `deleted`   INT NOT NULL,
  `date_add`  DATETIME NULL,
  `date_upd`  DATETIME NULL,
  PRIMARY KEY (`id_event`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `customer` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` INT NOT NULL AUTO_INCREMENT,
  `id_user`   INT NULL,
  `firstname` VARCHAR(100) NULL,
  `lastname` VARCHAR(100) NULL,
  `phone`     VARCHAR(10) NULL,
  `active`    INT NULL,
  `deleted`   INT NOT NULL,
  `date_add`  DATETIME NULL,
  `date_upd`  DATETIME NULL,
  PRIMARY KEY (`id_customer`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `passwd` VARCHAR(200) NULL,
  `type` ENUM('superadmin', 'admin') NULL DEFAULT 'admin',
  `active` INT NULL,
  `deleted` INT NOT NULL,
  `date_add` DATETIME NULL,
  `date_upd` DATETIME NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
