CREATE SCHEMA `php-prj` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE `php-prj`.`users` (
  `id` INT NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `description` VARCHAR(200) NULL,
  `first_name` VARCHAR(50) NULL,
  `last_name` VARCHAR(50) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `php-prj`.`acconts` (
  `id` INT NOT NULL,
  `acc_num` INT NOT NULL,
  `description` VARCHAR(200) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id_idx` (`user_id` ASC),
  UNIQUE INDEX `acc_num_UNIQUE` (`acc_num` ASC),
  CONSTRAINT `acconts_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `php-prj`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `php-prj`.`payments` (
  `id` INT NOT NULL,
  `from_acc` INT NOT NULL,
  `to_acc` INT NOT NULL,
  `payment_time` DATETIME NOT NULL,
  `amount` INT NOT NULL,
  `description` VARCHAR(200) NULL,
  `status` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `from_idx` (`from_acc` ASC),
  INDEX `to_idx` (`to_acc` ASC),
  CONSTRAINT `payments_accounts_to`
    FOREIGN KEY (`from_acc`)
    REFERENCES `php-prj`.`acconts` (`acc_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `payments_accounts_from`
    FOREIGN KEY (`to_acc`)
    REFERENCES `php-prj`.`acconts` (`acc_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `php-prj`.`roles` (
  `id` INT NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `description` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `php-prj`.`authorities` (
  `user_id` INT NOT NULL,
  `role_id` INT NOT NULL,
  INDEX `user_id_idx` (`user_id` ASC),
  INDEX `role_id_idx` (`role_id` ASC),
  UNIQUE INDEX `user_id_role_UNIQUE` (`user_id` ASC, `role_id` ASC),
  CONSTRAINT `authorities_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `php-prj`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `authorities_roles`
    FOREIGN KEY (`role_id`)
    REFERENCES `php-prj`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);