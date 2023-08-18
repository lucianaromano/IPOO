CREATE DATABASE bdigresante; 

CREATE TABLE actividad(
    id_actividad bigint AUTO_INCREMENT,
    desc_corta varchar(150),
    desc_larga varchar(150),
    PRIMARY KEY (id_actividad)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE modulo (
    id_modulo bigint AUTO_INCREMENT,
    id_actividad bigint(11),
    descripcion varchar (100),
    tope int,
    costo float,
    hora_inicio varchar (5),
    hora_cierre varchar (5),
    fecha date,
    PRIMARY KEY (id_modulo),
    FOREIGN KEY (id_actividad) REFERENCES actividad (id_actividad)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE enLinea (
    id_modulo bigint(11),
    link_reunion varchar (150),
    bonificacion int,
    PRIMARY KEY (id_modulo),
    FOREIGN KEY (id_modulo) REFERENCES modulo (id_modulo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ingresante (
    mail varchar (200),
    legajo int,
	dni varchar (15),
    nombre varchar(150), 
    apellido  varchar(150),
    id_inscripcion bigint(11), 
    PRIMARY KEY (dni)
    FOREIGN KEY (id_inscripcion) REFERENCES inscripcion (id_inscripcion)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE inscripcion (
    id_inscripcion bigint AUTO_INCREMENT,
    fecha date,
    costo_final int,
    id_modulo bigint (11), 
    dni bigint (11),
    PRIMARY KEY (id_inscripcion)
    FOREIGN KEY (id_modulo) REFERENCES modulo (id_modulo)
    FOREIGN KEY (dni) REFERENCES ingresante (dni)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT =1;