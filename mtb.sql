-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2020 às 13:52
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mtb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `chassi` varchar(17) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `renavam` varchar(11) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `procedencia` char(2) NOT NULL,
  `data_de_compra` date NOT NULL,
  `ipva` float NOT NULL,
  `dpvat` float NOT NULL,
  `multa` float NOT NULL,
  `valor_compra` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cars`
--

INSERT INTO `cars` (`car_id`, `user_id`, `chassi`, `placa`, `renavam`, `marca`, `modelo`, `procedencia`, `data_de_compra`, `ipva`, `dpvat`, `multa`, `valor_compra`) VALUES
(7, 1, '00000000000000001', '00000001', 'A', 'audi', 'a1sportback', 'AC', '2003-01-23', 1.1, 1.1, 11, 222);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `login`, `passwd`, `first_name`, `last_name`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Marcelo', 'Boavista'),
(2, 'mtb', 'a49713366eadcd8391b6de1b0be69936', 'Marcelo', 'Teixeira'),
(3, '3220323', '3ef815416f775098fe977004015c6193', 'Marcelo', 'Boavista'),
(4, 'admim', '47bce5c74f589f4867dbd57e9ca9f808', 'Marcelo', 'Boavista');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
