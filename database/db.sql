
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

CREATE TABLE personas (
  id_personas      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id      INT (11) NOT NULL,
  nombres         VARCHAR (50) NOT NULL,
  apellidos       VARCHAR (50) NOT NULL,
  ci              INT (15) NOT NULL,
  fecha_nacimiento DATETIME NOT NULL,
  profesion       VARCHAR(50) NOT NULL,
  direccion       TEXT NOT NULL,
  telefono        VARCHAR(255) NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuarios) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE administrativos (
  id_administrativos INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  personas_id        INT (11) NOT NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (personas_id) REFERENCES personas (id_personas) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE docentes (
  id_docentes        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  personas_id        INT (11) NOT NULL,
  especialidad       VARCHAR (255) NOT NULL,
  antiguedad         VARCHAR (255) NOT NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (personas_id) REFERENCES personas (id_personas) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE estudiante (
  id_estudiante     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  personas_id       INT (11) NOT NULL,
  ci_escolar        INT (11) NOT NULL UNIQUE KEY,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (personas_id) REFERENCES personas (id_personas) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE representantes (
  id_representante   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  personas_id        INT (11) NOT NULL,
  estudiante_id      INT (11) NOT NULL,
  parentesco         VARCHAR(50) NOT NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (personas_id) REFERENCES personas (id_personas) on delete no action on update cascade,
  FOREIGN KEY (estudiante_id) REFERENCES estudiante (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

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

CREATE TABLE periodo_educativo (
  id_periodo  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  periodo     VARCHAR (255) NOT NULL,
  momento     VARCHAR (255) NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO periodo_educativo (periodo,momento,fyh_create,estado)
VALUES ('2024-2025','2°','2025-09-05 15:45:11','1');

CREATE TABLE niveles (
  id_nivel          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  periodo_id        INT (11) NOT NULL,
  nivel             VARCHAR (255) NOT NULL,
  turno             VARCHAR (255) NOT NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (periodo_id) REFERENCES periodo_educativo (id_periodo) on delete no action on update cascade

)ENGINE=InnoDB;


INSERT INTO niveles (periodo_id ,nivel,turno,fyh_create,estado)
VALUES ('1','INICIAL','DIURNO','2025-21-08 11:58','1');

CREATE TABLE grados (
  id_grados         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel_id          INT (11) NOT NULL,
  grado             VARCHAR (255) NOT NULL,
  seccion           VARCHAR (255) NOT NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11),

  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;


INSERT INTO grados (nivel_id ,grado,seccion,fyh_create,estado)
VALUES ('1','PREESCOLAR 1°','A','2025-09-05 15:45:11','1');

CREATE TABLE asignaturas (
  id_asignaturas      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_asignatura   VARCHAR (255) NOT NULL,
  descripcion         TEXT (255) NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO asignaturas (nombre_asignatura,descripcion,fyh_create,estado)
VALUES ('MATEMATIICAS BASICAS','Programa especialisado en en la enseñanza de las operaciones matematicas basicas','2025-09-05 15:45:11','1');

