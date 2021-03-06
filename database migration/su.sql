-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema su
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema su
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `su` DEFAULT CHARACTER SET utf8 ;
USE `su` ;

-- -----------------------------------------------------
-- Table `su`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(255) NOT NULL,
  `lastname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(320) NOT NULL,
  `password` CHAR(255) NOT NULL,
  `role` ENUM('admin', 'editor') NOT NULL DEFAULT 'editor',
  `status` ENUM('active', 'banned') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `email` (`email` ASC),
  INDEX `index3` (`firstname` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`event` (
  `event_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `highlight` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `image_alt` VARCHAR(255) NULL DEFAULT NULL,
  `date` DATE NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `status` ENUM('published', 'unpublished') NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  INDEX `fk_events_1_idx` (`user_id` ASC),
  INDEX `fk_events_2_idx` (`updated_by` ASC),
  INDEX `index4` (`status` ASC),
  CONSTRAINT `fk_events_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`hero_slider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`hero_slider` (
  `hero_slider_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `text` VARCHAR(255) NOT NULL,
  `image_alt` VARCHAR(255) NULL DEFAULT NULL,
  `slider_order` TINYINT(4) NULL DEFAULT NULL,
  `status` ENUM('published', 'unpublished') NOT NULL DEFAULT 'published',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NOT NULL,
  PRIMARY KEY (`hero_slider_id`),
  INDEX `fk_hero_slider_1_idx` (`user_id` ASC),
  INDEX `fk_hero_slider_2_idx` (`updated_by` ASC),
  CONSTRAINT `fk_hero_slider_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_hero_slider_2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`media` (
  `media_id` INT(11) NOT NULL AUTO_INCREMENT,
  `model_name` VARCHAR(255) NOT NULL,
  `record_id` INT(11) NOT NULL,
  `file_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`media_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 51
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`message` (
  `message_id` INT(10) NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(320) NOT NULL,
  `phone` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `status` ENUM('read', 'unread') NOT NULL DEFAULT 'unread',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`meta_content`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`meta_content` (
  `meta_content_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `content` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NOT NULL,
  PRIMARY KEY (`meta_content_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_meta_content_1_idx` (`updated_by` ASC),
  INDEX `fk_meta_content_2_idx` (`user_id` ASC),
  CONSTRAINT `fk_meta_content_1`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_meta_content_2`
    FOREIGN KEY (`user_id`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`nav_link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`nav_link` (
  `nav_link_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `type` ENUM('header', 'footer') NOT NULL,
  `parent` VARCHAR(255) NULL DEFAULT NULL,
  `status` ENUM('published', 'unpublished') NOT NULL DEFAULT 'published',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NOT NULL,
  PRIMARY KEY (`nav_link_id`),
  INDEX `fk_nav_links_1_idx` (`user_id` ASC),
  INDEX `fk_nav_links_2_idx` (`updated_by` ASC),
  CONSTRAINT `fk_nav_links_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nav_links_2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`nav_sublink`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`nav_sublink` (
  `nav_sublink_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `nav_link_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NOT NULL,
  PRIMARY KEY (`nav_sublink_id`),
  INDEX `fk_footer_sublinks_1_idx` (`user_id` ASC),
  INDEX `fk_footer_sublinks_2_idx` (`updated_by` ASC),
  INDEX `fk_footer_sublinks_3_idx` (`nav_link_id` ASC),
  CONSTRAINT `fk_footer_sublinks_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_footer_sublinks_2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_footer_sublinks_3`
    FOREIGN KEY (`nav_link_id`)
    REFERENCES `su`.`nav_link` (`nav_link_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`news`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`news` (
  `news_id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `highlight` VARCHAR(255) NULL DEFAULT NULL,
  `body` TEXT NOT NULL,
  `status` ENUM('published', 'unpublished') NOT NULL DEFAULT 'published',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  INDEX `fk_news_1_idx` (`user_id` ASC),
  INDEX `fk_news_2_idx` (`updated_by` ASC),
  INDEX `index4` (`status` ASC),
  CONSTRAINT `fk_news_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 45
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`social_link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`social_link` (
  `social_link_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `status` ENUM('published', 'unpublished') NOT NULL DEFAULT 'published',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NOT NULL,
  PRIMARY KEY (`social_link_id`),
  INDEX `fk_social_links_1_idx` (`user_id` ASC),
  INDEX `fk_social_links_2_idx` (`updated_by` ASC),
  CONSTRAINT `fk_social_links_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_social_links_2`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `su`.`statistic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `su`.`statistic` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `number` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_statistics_1_idx` (`updated_by` ASC),
  CONSTRAINT `fk_statistics_1`
    FOREIGN KEY (`updated_by`)
    REFERENCES `su`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
