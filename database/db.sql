

CREATE TABLE usuarios (
  id_usuarios  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombres      VARCHAR (255) NOT NULL,
  apellidos    VARCHAR (255) NOT NULL,
  cargo        VARCHAR (255) NOT NULL,
  email        VARCHAR (255) NOT NULL UNIQUE KEY,
  password     TEXT NOT NULL,

  fyh_create   DATETIME  NULL,
  fyh_update   DATETIME NULL,
  estado       VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO usuarios (nombres,apellidos,cargo ,email,password,fyh_create,fyh_update,estado)
VALUES ('Juan Carlos','Villa Godoy','ADMIN','admin@email.com','pppp','2025-30-03 18:38','1');