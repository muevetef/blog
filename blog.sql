CREATE TABLE `blog`.`posts` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    varchar MEDIUMTEXT NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO
    `blog`.`posts` (`title`, `body`)
VALUES (
        'Tercer Post',
        'El cuerpo del tercer post'
    );