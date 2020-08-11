-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Ago-2020 às 16:06
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oncar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `veiculo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `ano` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `vendido` enum('vendido','estoque') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`veiculo`, `marca`, `ano`, `descricao`, `vendido`, `created`, `updated`) VALUES
('Saveiro Cross', 'VW', 2013, 'Mais Tecnologia com Sistema de Infotainment e Volante Multifuncional. Conforto e Segurança que só uma Saveiro pode Oferecer. Park pilot. Tecnologia que move você. Sistema de som Beats.', 'estoque', '2020-08-11 10:25:00', '2020-08-11 10:25:00'),
('Up', 'VW', 2015, 'olkswagen up! Você achava que carro compacto não era sinônimo de potência e tecnologia. Equipado de série com sistemas ISOFIX® . Mais segurança para você e sua família.', 'vendido', '2020-08-11 10:38:00', '2020-08-11 10:38:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`veiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
