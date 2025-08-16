
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

