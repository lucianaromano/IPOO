CREATE DATABASE bdigresante; 

CREATE TABLE actividad(
    id_actividad bigint AUTO_INCREMENT,
    d_corta varchar(150),
    d_larga varchar(150),
    PRIMARY KEY (id_actividad)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE modulo (
    id_modulo bigint AUTO_INCREMENT,
    id_actividad bigint(11),
    descripcion varchar (100),
    tope_inscrip int,
    costo float,
    hora_inicio varchar (5),
    hora_cierre varchar (5),
    fecha_inicio date,
    fecha_fin date,
    PRIMARY KEY (id_modulo),
    FOREIGN KEY (id_actividad) REFERENCES actividades (id_actividad)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE enLinea (
    id_modulo bigint(11),
    link_reunion varchar (150),
    bonificacion int,
    PRIMARY KEY (id_modulo),
    FOREIGN KEY (id_modulo) REFERENCES modulos (id_modulo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ingresante (
    correo varchar (200),
    legajo int,
	documento varchar (15),
    nombre varchar(150), 
    apellido  varchar(150), 
    PRIMARY KEY (correo)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE inscripcion (
    id_inscripcion bigint AUTO_INCREMENT,
    fecha date,
    costo_final int,
    PRIMARY KEY (id_inscripcion)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT =1;