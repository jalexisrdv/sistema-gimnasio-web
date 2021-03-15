-- -----------------------------------------------------
-- Schema gimnasio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gimnasio` DEFAULT CHARACTER SET utf8 ;
USE `gimnasio` ;


-- -----------------------------------------------------
-- Table `gimnasio`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`usuarios` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nick` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `status` TINYINT NOT NULL,
  CONSTRAINT `ct_pk_id_usuarios` PRIMARY KEY (`ID`),
  CONSTRAINT `ct_nick_usuarios` CHECK(REGEXP_LIKE(`nick`, '[A-Za-z0-9]{45}')),
  CONSTRAINT `ct_password_usuarios` CHECK(REGEXP_LIKE(`password`, '[:alnum:]{45}')),
  CONSTRAINT `ct_tipo_usuarios` CHECK(REGEXP_LIKE(`tipo`, '[A-Za-z]{45}')),
  CONSTRAINT `ct_status_usuarios` CHECK(`status` IN ('0', '1'))
);


-- -----------------------------------------------------
-- Table `gimnasio`.`sucursales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`sucursales` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(200) NOT NULL,
  `codigo_postal` VARCHAR(10) NOT NULL,
  `horarios` VARCHAR(100) NOT NULL,
  `status` TINYINT NOT NULL,
  `fk_id_usuarios` INT NOT NULL,
  INDEX `idx_fk_sucursales_usuarios` (`fk_id_usuarios` ASC),
  CONSTRAINT `ct_pk_id_sucursales` PRIMARY KEY (`ID`),
  CONSTRAINT `ct_nombre_sucursales` CHECK(REGEXP_LIKE(`nombre`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_cp_sucursales` CHECK(REGEXP_LIKE(`codigo_postal`, '[0-9]{5}')),
  CONSTRAINT `ct_horarios_sucursales` CHECK(REGEXP_LIKE(`horarios`, '[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{600}')),
  CONSTRAINT `ct_status_sucursales` CHECK(`status` IN ('0', '1')),
  CONSTRAINT `ct_fk_sucursales_usuarios`
    FOREIGN KEY (`fk_id_usuarios`)
    REFERENCES `gimnasio`.`usuarios` (`ID`)
);


-- -----------------------------------------------------
-- Table `gimnasio`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`clientes` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `fecha_ingreso` DATE NOT NULL,
  `nivel_cliente` VARCHAR(100) NOT NULL,
  `estatura` DECIMAL(10, 2) NOT NULL,
  `peso_inicial` DECIMAL(10, 2) NOT NULL,
  `peso_progreso` DECIMAL(10, 2) NOT NULL,
  `url_foto` TEXT NOT NULL,
  `fk_id_usuarios` INT NOT NULL,
  `fk_id_sucursales` INT NOT NULL,
  INDEX `idx_fk_clientes_usuarios` (`fk_id_usuarios` ASC),
  INDEX `idx_fk_id_clientes_sucursales` (`fk_id_sucursales` ASC),
  CONSTRAINT `ct_pk_id_clientes` PRIMARY KEY (`ID`),
  CONSTRAINT `ct_nombre_clientes` CHECK(REGEXP_LIKE(`nombre`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_apellidos_clientes` CHECK(REGEXP_LIKE(`apellidos`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_email_clientes` CHECK(REGEXP_LIKE(`email`, '[A-Za-zÁÉÍÓÚáéíóúÑñ0-9_\.\-]+\@[A-Za-zÁÉÍÓÚáéíóúÑñ0-9_\.\-]\.[A-Za-z]')),
  CONSTRAINT `ct_nivel_cliente_clientes` CHECK(REGEXP_LIKE(`nivel_cliente`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_fk_id_clientes_sucursales`
    FOREIGN KEY (`fk_id_sucursales`)
    REFERENCES `gimnasio`.`sucursales` (`ID`),
  CONSTRAINT `ct_fk_clientes_usuarios`
    FOREIGN KEY (`fk_id_usuarios`)
    REFERENCES `gimnasio`.`usuarios` (`ID`)
);



-- -----------------------------------------------------
-- Table `gimnasio`.`entrenadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`entrenadores` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `fecha_ingreso` DATE NOT NULL,
  `nivel_entrenador` VARCHAR(100) NOT NULL,
  `estatura` DECIMAL(10, 2) NOT NULL,
  `peso` DECIMAL(10, 2) NOT NULL,
  `url_foto` TEXT NOT NULL,
  `horario` VARCHAR(100) NOT NULL,
  `fk_id_usuarios` INT NOT NULL,
  `fk_id_sucursales` INT NOT NULL,
  INDEX `idx_fk_entrenadores_usuarios` (`fk_id_usuarios` ASC),
  INDEX `idx_fk_id_entrenadores_sucursales` (`fk_id_sucursales` ASC),
  CONSTRAINT `ct_pk_id_entrenadores` PRIMARY KEY (`ID`),
  CONSTRAINT `ct_nombre_entrenadores` CHECK(REGEXP_LIKE(`nombre`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_apellidos_entrenadores` CHECK(REGEXP_LIKE(`apellidos`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_nivel_entrenador_entrenadores` CHECK(REGEXP_LIKE(`nivel_entrenador`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_horario_sucursales` CHECK(REGEXP_LIKE(`horario`, '[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{600}')),
  CONSTRAINT `ct_fk_id_entrenadores_sucursales`
    FOREIGN KEY (`fk_id_sucursales`)
    REFERENCES `gimnasio`.`sucursales` (`ID`),
  CONSTRAINT `ct_fk_entrenadores_usuarios`
    FOREIGN KEY (`fk_id_usuarios`)
    REFERENCES `gimnasio`.`usuarios` (`ID`)
);


-- -----------------------------------------------------
-- Table `gimnasio`.`pagos_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`pagos_clientes` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `fecha_pago_realizado` DATETIME NOT NULL,
  `fecha_corte_pago` DATETIME NOT NULL,
  `fk_id_clientes` INT NOT NULL,
  `fk_id_sucursales` INT NOT NULL,
  CONSTRAINT `ct_pk_id_pagos_clientes` PRIMARY KEY (`ID`),
  INDEX `idx_fk_pagos_clientes_clientes` (`fk_id_clientes` ASC),
  INDEX `idx_fk_pagos_clientes_sucursales` (`fk_id_sucursales` ASC),
  CONSTRAINT `fk_pagos_clientes_clientes`
    FOREIGN KEY (`fk_id_clientes`)
    REFERENCES `gimnasio`.`clientes` (`ID`),
  CONSTRAINT `fk_pagos_clientes_sucursales`
    FOREIGN KEY (`fk_id_sucursales`)
    REFERENCES `gimnasio`.`sucursales` (`ID`)
);

-- -----------------------------------------------------
-- Table `gimnasio`.`fechas_importantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`fechas_importantes` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(600) NOT NULL,
  CONSTRAINT `ct_pk_id_fechas_importantes` PRIMARY KEY (`ID`),
  CONSTRAINT `ct_descripcion_fechas_importantes` CHECK(REGEXP_LIKE(`descripcion`, '[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{600}'))
);


-- -----------------------------------------------------
-- Table `gimnasio`.`rutinas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`rutinas` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(100) NOT NULL,
  `ejercicios` VARCHAR(100) NOT NULL,
  `duracion` VARCHAR(100) NOT NULL,
  `dia` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(600) NOT NULL,
  `fk_id_entrenadores` INT NOT NULL,
  CONSTRAINT `ct_pk_id_rutinas` PRIMARY KEY (`ID`),
  INDEX `idx_fk_rutinas_entrenadores` (`fk_id_entrenadores` ASC),
  CONSTRAINT `ct_tipo_rutinas` CHECK(REGEXP_LIKE(`tipo`, '[A-Za-zÁÉÍÓÚáéíóúÑñ ]{45}')),
  CONSTRAINT `ct_duracion_rutinas` CHECK(REGEXP_LIKE(`duracion`, '[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9]{45}')),
  CONSTRAINT `ct_dia_rutinas` CHECK(REGEXP_LIKE(`dia`, '[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{45}')),
  CONSTRAINT `ct_ejercicios_rutinas` CHECK(REGEXP_LIKE(`ejercicios`, '[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{600}')),
  CONSTRAINT `ct_descripcion_rutinas` CHECK(REGEXP_LIKE(`descripcion`, '[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{600}')),
  CONSTRAINT `ct_fk_rutinas_entrenadores`
    FOREIGN KEY (`fk_id_entrenadores`)
    REFERENCES `gimnasio`.`entrenadores` (`ID`)
);

-- -----------------------------------------------------
-- Table `gimnasio`.`fechas_importantes_sucursales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`fechas_importantes_sucursales` (
  `fk_id_fechas_importantes` INT NOT NULL,
  `fk_id_sucursales` INT NOT NULL,
  INDEX `idx_fk_fechas_importantes_sucursales_sucurcales` (`fk_id_sucursales` ASC),
  INDEX `idx_fk_fechas_importantes_sucursales_fechas_importantes` (`fk_id_fechas_importantes` ASC),
  CONSTRAINT `ct_fk_fechas_importantes_sucursales_fechas_importantes`
    FOREIGN KEY (`fk_id_fechas_importantes`)
    REFERENCES `gimnasio`.`fechas_importantes` (`ID`),
  CONSTRAINT `ct_fk_fechas_importantes_sucursales_sucursales`
    FOREIGN KEY (`fk_id_sucursales`)
    REFERENCES `gimnasio`.`sucursales` (`ID`)
);

-- -----------------------------------------------------
-- Table `gimnasio`.`clientes_rutinas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gimnasio`.`clientes_rutinas` (
  `fk_id_clientes` INT NOT NULL,
  `fk_id_rutinas` INT NOT NULL,
  INDEX `idx_fk_clientes_rutinas_rutinas` (`fk_id_rutinas` ASC),
  INDEX `idx_fk_clientes_rutinas_clientes` (`fk_id_clientes` ASC),
  CONSTRAINT `fk_clientes_rutinas_clientes`
    FOREIGN KEY (`fk_id_clientes`)
    REFERENCES `gimnasio`.`clientes` (`ID`),
  CONSTRAINT `fk_clientes_rutinas_rutinas`
    FOREIGN KEY (`fk_id_rutinas`)
    REFERENCES `gimnasio`.`rutinas` (`ID`)
);