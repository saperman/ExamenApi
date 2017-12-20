
 -- array(
 --        0 => '001_Users',
 --        1 => '002_Niveles',
 --        2 => '003_Fotos',
 --        3 => '004_Enemigos',
 --        4 => '005_Comentarios',
 --        5 => '006_UsuariosSuperanNivel',
 --        6 => '007_EnemigosPertenecenNivel'
 --      ),

CREATE TABLE IF NOT EXISTS `usuarios`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `contraseña` VARCHAR(50) NOT NULL,
    `puntuacion` INT(13) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8; CREATE TABLE IF NOT EXISTS `niveles`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8; CREATE TABLE IF NOT EXISTS `fotos`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `url` VARCHAR(50) NOT NULL,
    `id_nivel` INT(11) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8; CREATE TABLE IF NOT EXISTS `enemigos`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `descripcion` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8; CREATE TABLE IF NOT EXISTS `comentarios`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `descripcion` VARCHAR(50) NOT NULL,
    `id_respuesta` INT(11),
    `id_usuario` INT(11) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8; CREATE TABLE IF NOT EXISTS `enemigosEnNivel`(
    `id_enemigo` INT(11) NOT NULL,
    `id_nivel` INT(11) NOT NULL,
    PRIMARY KEY(`id_enemigo`, `id_nivel`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8; CREATE TABLE IF NOT EXISTS `usuariosSuperanNivel`(
    `id_usuario` INT(11) NOT NULL,
    `id_nivel` INT(11) NOT NULL,
    PRIMARY KEY(`id_usuario`, `id_nivel`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8; ALTER TABLE
    `fotos` ADD CONSTRAINT `claveAjenaFotosANiveles` FOREIGN KEY(`id_nivel`) REFERENCES `niveles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE
    `comentarios` ADD CONSTRAINT `claveAjenaComentariosAUsuarios` FOREIGN KEY(`id_usuario`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE
    `enemigosEnNivel` ADD CONSTRAINT `claveAjenaEnemigosEnNivelAEnemigos` FOREIGN KEY(`id_enemigo`) REFERENCES `enemigos`(`id`),
    ADD CONSTRAINT `claveAjenaEnemigosEnNivelANivel` FOREIGN KEY(`id_nivel`) REFERENCES `niveles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE
    `usuariosSuperanNivel` ADD CONSTRAINT `claveAjenausuariosSuperanNivelAUsuarios` FOREIGN KEY(`id_usuario`) REFERENCES `usuarios`(`id`),
    ADD CONSTRAINT `claveAjenausuariosSuperanNivelNivel` FOREIGN KEY(`id_nivel`) REFERENCES `niveles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;