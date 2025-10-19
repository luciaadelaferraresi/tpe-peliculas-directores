

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `cine` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cine`;


CREATE TABLE IF NOT EXISTS `directores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `directores` (`id`, `nombre`, `nacionalidad`) VALUES
(1, 'Steven Spielberg', 'Estados Unidos'),
(2, 'Christopher Nolan', 'Reino Unido'),
(3, 'Quentin Tarantino', 'Estados Unidos'),
(4, 'Martin Scorsese', 'Estados Unidos'),
(5, 'James Cameron', 'Canadá');



CREATE TABLE IF NOT EXISTS `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `id_director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `peliculas` (`id`, `titulo`, `duracion`, `anio`, `id_director`) VALUES
(1, 'Jurassic Park', 127, 1993, 1),
(2, 'Inception', 148, 2010, 2),
(3, 'Pulp Fiction', 154, 1994, 3),
(7, 'Django Unchained', 165, 2012, 3),
(8, 'The Wolf of Wall Street', 180, 2013, 4),
(9, 'Shutter Island', 138, 2010, 4),
(10, 'Titanic', 195, 1997, 5),
(11, 'Avatar', 162, 2009, 5),
(4, 'E.T.', 115, 1982, 1),
(5, 'Interstellar', 169, 2014, 2);


CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` char(60) NOT NULL,
   `rol` enum('admin','usuarios') DEFAULT 'usuarios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuarios` (`id`, `email`, `password`, `rol`) VALUES
(6, 'webadmin', '$2y$10$UZ6.iGGx5iKQ8OS7esar8u970cN7L.WN3z3rqje/O7ULqq2vg5omi', 'admin');



ALTER TABLE `directores`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_director` (`id_director`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `directores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_director` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

