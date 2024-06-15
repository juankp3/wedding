ALTER TABLE guest
ADD COLUMN id_guest_parent INT AFTER id_event;

ALTER TABLE guest
RENAME COLUMN names TO name;

ALTER TABLE guest MODIFY COLUMN phone VARCHAR(30);

ALTER TABLE guest
RENAME COLUMN qr TO token;

ALTER TABLE guest MODIFY COLUMN token VARCHAR(500);

ALTER TABLE wishes
ADD COLUMN active INT(11) not null AFTER message;


-- -----------------------------------------------------
-- Table `songs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `songs` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `songs` (
  `id_songs` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `date_add`  DATETIME NULL,
  `date_upd`  DATETIME NULL,
  PRIMARY KEY (`id_songs`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `guest_songs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guest_songs` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `guest_songs` (
  `id_guest_songs` INT NOT NULL AUTO_INCREMENT,
  `id_guest`  INT NOT NULL,
  `id_songs`  INT NOT NULL,
  `id_event`  INT NOT NULL,
  `date_add`  DATETIME NULL,
  `date_upd`  DATETIME NULL,
  PRIMARY KEY (`id_guest_songs`))
ENGINE = InnoDB;
