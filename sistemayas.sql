-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Dez-2020 às 00:18
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemayas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginsystem`
--

CREATE TABLE `loginsystem` (
  `id` int(11) NOT NULL,
  `nameUsers` varchar(128) NOT NULL,
  `emailUsers` varchar(128) NOT NULL,
  `pwdUsers` varchar(64) NOT NULL,
  `levelUsers` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loginsystem`
--

INSERT INTO `loginsystem` (`id`, `nameUsers`, `emailUsers`, `pwdUsers`, `levelUsers`) VALUES
(1, 'Yasmim', 'yasmeclins@gmail.com', '$2y$10$wOaxLEquJlMaqqAKxLgeCucjEsMSq5s0hO5VzS9dg3TUNK/Bi5886', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prodsystem`
--

CREATE TABLE `prodsystem` (
  `id` int(11) NOT NULL,
  `imageProds` varchar(256) NOT NULL,
  `nameProds` varchar(128) NOT NULL,
  `descProds` varchar(256) NOT NULL,
  `priceProds` varchar(64) NOT NULL,
  `timesProds` varchar(24) NOT NULL,
  `pricetimesProds` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prodsystem`
--

INSERT INTO `prodsystem` (`id`, `imageProds`, `nameProds`, `descProds`, `priceProds`, `timesProds`, `pricetimesProds`) VALUES
(1, '5fbfe8b5731f9.jpg', 'Alce', 'Uma simples tatuagem de alce.', '99,90', '3', '35,90'),
(3, '5fc06d9079900.jpg', 'Money man', 'Uma simples tatuagem.', '99,90', '3', '35,90'),
(4, '5fc1e500839ab.jpg', 'Astronaut', 'Uma simples tatuagem de astronauta', '99,90', '3', '35,90'),
(5, '5fc55ab042731.jpg', 'PreguiÃ§a', 'Uma simples preguiÃ§a', '89,90', '5', '19,90'),
(6, '5fc5709767e3e.jpg', 'Maori', 'Uma simples tatuagem de maori', '99,90', '3', '35,90'),
(10, '5fd6f86459799.jpg', 'Bolsonaro careca', 'Uma simples tatuagem do bolsonaro careca (olha que fofo)', '129,90', '3', '44,90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginsystem`
--
ALTER TABLE `loginsystem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodsystem`
--
ALTER TABLE `prodsystem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginsystem`
--
ALTER TABLE `loginsystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `prodsystem`
--
ALTER TABLE `prodsystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
