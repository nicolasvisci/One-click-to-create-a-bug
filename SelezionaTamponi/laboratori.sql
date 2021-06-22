CREATE TABLE `laboratori` (
  `nome_lab` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero_telefono` varchar(10) NOT NULL,
  `tamp_1` tinyint(4) NOT NULL,
  `tamp_2` tinyint(1) NOT NULL,
  `tamp_3` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;