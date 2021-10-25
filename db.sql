DROP DATABASE IF EXISTS db_resources;
CREATE DATABASE db_resources;
USE db_resources;

CREATE TABLE resource (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    description VARCHAR(2500) NOT NULL,
    location VARCHAR(200) NOT NULL,
    img VARCHAR(500) NOT NULL
);

CREATE TABLE user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    realname VARCHAR(100) NOT NULL
);

CREATE TABLE timeslot (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(10) NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL
);

CREATE TABLE reservation (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_resource INT UNSIGNED NOT NULL,
    id_user INT UNSIGNED NOT NULL,
    id_timeslot INT UNSIGNED NOT NULL,
    date DATE NOT NULL,
    remark VARCHAR(5000),
    FOREIGN KEY (id_resource) REFERENCES resource(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_timeslot) REFERENCES timeslot(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO resource VALUES 
(1, 'Impresora HP', 'Impresora laser', 'Departamento Informática', 'ImpresoraHP.jpg'),
(2, 'Portátil HP', 'Portatil HP  Negro', 'Aula Tic', 'PortatilHP.jpg'), 
(3, 'Portatil Acer', 'Portatil Acer Gris', 'Aula 8', 'PortatilAcer.jpg');

INSERT INTO user VALUES 
(1, 'antonio', 'antonio1234', 'Antonio'), 
(2, 'paco', 'paco1234', 'Paco'), 
(3, 'jose', 'jose1234', 'Jose'), 
(4, 'user', 'admin', 'Admin');

INSERT INTO timeslot VALUES 
(1, 'Lunes', '13:05:00', '14:35:00'), 
(2, 'Miercoles', '9:05:00', '10:05:00'), 
(3, 'Viernes', '10:05:00', '11:00:00');

INSERT INTO reservation VALUES 
(1, 2, 4, 1, '15-10-2021', 'Dar clase'),
(2, 3, 3, 2, '14-10-2021', 'Tiempo de estudio libre en biblioteca'),
(3, 1, 1, 3, '15-10-2021', 'Imprimir actividades');