-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2020 às 13:43
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
(5, 1, 'sadadsa', 'a', 'A', 'audi', 'a1sportback', 'AC', '2101-03-02', 2000, 2000, 200, 2000),
(6, 1, '00000000000000001', '000001', '00000000001', 'bentley', 'bentaygadiesel', 'AC', '2003-01-23', 1.1, 1.1, 11, 222);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
