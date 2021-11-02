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

CREATE TABLE reserves(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_resource INT UNSIGNED NOT NULL,
    id_user INT UNSIGNED NOT NULL,
    id_timeslot INT UNSIGNED NOT NULL,
    note VARCHAR(5000),
    FOREIGN KEY (id_resource) REFERENCES resource(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_timeslot) REFERENCES timeslot(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO resource VALUES 
(1, 'Impresora HP', 'Impresora laser', 'Departamento Informática', 'impresorahp.jpg'),
(2, 'Portátil HP', 'Portatil HP  Negro', 'Aula Tic', 'portatilhp.jpg'), 
(3, 'Portatil Acer', 'Portatil Acer Gris', 'Aula 8', 'portatilacer.jpg'),
(4, 'TV Samsung', 'TV Samsung', 'Aula 7', 'tv.jpg'),
(5, 'Proyector laser xiaomi', 'Proyector Laser xiaomi', 'Aula 8', 'proyectorlaserxiaomi.jpg');

INSERT INTO user VALUES 
(1, 'antonio', 'antonio1234', 'Antonio'), 
(2, 'paco', 'paco1234', 'Paco'), 
(3, 'jose', 'jose1234', 'Jose'), 
(4, 'user', 'admin', 'Admin');

INSERT INTO timeslot VALUES 
(1, '2021-11-02', '13:05', '14:35'), 
(2, '2021-11-04', '9:05', '10:05'), 
(3, '2021-11-09', '10:05', '11:00'),
(4, '2021-11-01', '11:25', '11:55'),
(5, '2021-11-19', '09:35', '11:00'),
(6, '2021-11-29', '08:55', '11:00'),
(7, '2021-11-28', '08:05', '11:00'),
(8, '2021-11-30', '10:45', '11:00'),
(9, '2021-11-04', '10:25', '11:35'),
(10, '2021-11-05', '10:15', '11:00');

INSERT INTO reserves VALUES 
(1, 2, 4, 1, 'Dar clase'),
(2, 3, 3, 2, 'Tiempo de estudio libre en biblioteca'),
(3, 1, 1, 3, 'Imprimir actividades');