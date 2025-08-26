
CREATE TABLE roles (
    id_roles      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol    VARCHAR (255) NOT NULL UNIQUE KEY,
  
    fyh_create   DATETIME  NULL,
    fyh_update   DATETIME NULL,
    estado       VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO roles (nombre_rol, fyh_create,estado)
VALUES ('ADMINISTRADOR','NOW.()','1');
INSERT INTO roles (nombre_rol, fyh_create,estado)
VALUES ('DIRECTOR','NOW.()','1');
INSERT INTO roles (nombre_rol, fyh_create,estado)
VALUES ('SUB-DIRECTOR ACADEMICO','NOW.()','1');
INSERT INTO roles (nombre_rol, fyh_create,estado)
VALUES ('SUB-DIRECTOR ADMINISTRATIVO','NOW.()','1');
INSERT INTO roles (nombre_rol, fyh_create,estado)
VALUES ('SECRETARIA','NOW.()','1');

CREATE TABLE usuarios (
  id_usuarios  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombres      VARCHAR (255) NOT NULL,
  apellidos    VARCHAR (255) NOT NULL,
  rol_id       INT (11) NOT NULL,
  email        VARCHAR (255) NOT NULL UNIQUE KEY,
  password     TEXT NOT NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (rol_id) REFERENCES roles (id_roles) on delete no action on update cascade

)ENGINE=InnoDB;

INSERT INTO usuarios (nombres,apellidos,rol_id,email,password,fyh_create,estado)
VALUES ('Juan Carlos','Villa Godoy','1','admin@email.com','$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2','2025-30-03 18:38','1');

CREATE TABLE configuracion_instituciones (
  id_config_institucion  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_institucion     VARCHAR (255) NOT NULL,
  logo                   VARCHAR (255) NULL,
  direccion              TEXT NOT NULL,
  tipo_institucion       VARCHAR (100) NULL,
  email                  VARCHAR (255) NOT NULL UNIQUE KEY,
  telefono               VARCHAR (100) NULL,
  rif                    INT (11) NOT NULL UNIQUE KEY,
  cog_dea                VARCHAR (255) NOT NULL UNIQUE KEY,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO configuracion_instituciones (nombre_institución,logo,direccion,tipo_institucion,email,telefono,rif,cog_dea,fyh_create,estado)
VALUES ('U.E Los Santos','logo.jpg','Zona La Guneta Calle N°13','PUBLICA','uelossantos@gmail.com','4269857801','128956789','0001298570','2025-21-08 11:58','1');