-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/01/2021 às 17:45
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pdphp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_device`
--

CREATE TABLE `tb_device` (
  `dev_id` int(11) NOT NULL,
  `dev_item` varchar(20) NOT NULL,
  `dev_ip` varchar(15) NOT NULL,
  `dev_critico` varchar(7) NOT NULL,
  `dev_status` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`dev_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_device`
--
ALTER TABLE `tb_device`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
