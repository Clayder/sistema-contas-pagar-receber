-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21-Jul-2017 às 07:14
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contaPagarReceber`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `dateTime`) VALUES
(1, 'wqwqwqw', '2017-07-20 21:07:27'),
(2, 'wqwqwqw', '2017-07-20 21:07:59'),
(4, '9999999999', '2017-07-20 22:14:21'),
(5, 'wqwqwqw', '2017-07-20 21:07:13'),
(6, 'wqwqwqw', '2017-07-20 21:07:25'),
(7, 'wqwqwqw', '2017-07-20 21:07:44'),
(8, 'wqwqwqw', '2017-07-20 21:07:05'),
(9, 'wqwqwqw', '2017-07-20 21:07:16'),
(10, 'wqwqwqw', '2017-07-20 21:07:59'),
(11, 'wqwqwqw', '2017-07-20 21:07:02'),
(12, 'wqwqwqw', '2017-07-20 21:07:22'),
(13, 'wqwqwqw', '2017-07-20 21:07:33'),
(14, 'wqwqwqw', '2017-07-20 21:07:36'),
(15, 'wqwqwqw', '2017-07-20 21:07:38'),
(16, 'wqwqwqw', '2017-07-20 21:07:39'),
(17, 'wqwqwqw', '2017-07-20 21:07:46'),
(18, 'wqwqwqw', '2017-07-20 21:07:56'),
(19, 'wqwqwqw', '2017-07-20 21:07:05'),
(20, 'wqwqwqw', '2017-07-20 21:07:09'),
(21, 'wqwqwqw', '2017-07-20 21:55:23'),
(22, 'wqwqwqw', '2017-07-20 21:55:33'),
(23, 'wqwqwqw', '2017-07-20 21:55:36'),
(24, 'wqwqwqw', '2017-07-20 21:55:37'),
(25, 'wqwqwqw', '2017-07-20 21:55:38'),
(26, 'wqwqwqw', '2017-07-20 21:55:40'),
(27, 'wqwqwqw', '2017-07-20 21:55:42'),
(28, 'wqwqwqw', '2017-07-20 21:55:42'),
(29, 'wqwqwqw', '2017-07-20 21:56:35'),
(30, 'wqwqwqw', '2017-07-20 21:56:37'),
(31, 'wqwqwqw', '2017-07-20 21:56:38'),
(32, 'wqwqwqw', '2017-07-20 21:56:40'),
(33, 'wqwqwqw', '2017-07-20 21:57:35'),
(34, 'wqwqwqw', '2017-07-20 21:57:36'),
(35, 'wqwqwqw', '2017-07-20 22:00:13'),
(36, 'wqwqwqw', '0000-00-00 00:00:00'),
(37, 'wqwqwqw', '0000-00-00 00:00:00'),
(38, 'wqwqwqw', '0000-00-00 00:00:00'),
(39, 'wqwqwqw', '0000-00-00 00:00:00'),
(40, 'wqwqwqw', '0000-00-00 00:00:00'),
(41, 'wqwqwqw', '0000-00-00 00:00:00'),
(42, 'wqwqwqw', '0000-00-00 00:00:00'),
(43, 'wqwqwqw', '0000-00-00 00:00:00'),
(44, 'wqwqwqw', '0000-00-00 00:00:00'),
(45, 'wqwqwqw', '0000-00-00 00:00:00'),
(46, 'wqwqwqw', '0000-00-00 00:00:00'),
(47, 'wqwqwqw', '0000-00-00 00:00:00'),
(48, 'wqwqwqw', '0000-00-00 00:00:00'),
(49, 'wqwqwqw', '0000-00-00 00:00:00'),
(50, 'wqwqwqw', '0000-00-00 00:00:00'),
(51, 'wqwqwqw', '0000-00-00 00:00:00'),
(52, 'wqwqwqw', '0000-00-00 00:00:00'),
(53, 'wqwqwqw', '2017-07-20 22:14:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `dateTime`) VALUES
(1, 'wqwqwqw', '2017-07-20 15:07:36'),
(2, 'wqwqwqw', '2017-07-20 15:07:20'),
(4, '999999999999999', '2017-07-20 21:07:05'),
(5, 'wqwqwqw', '2017-07-20 15:07:47'),
(6, 'wqwqwqw', '2017-07-20 15:07:00'),
(7, 'wqwqwqw', '2017-07-20 15:07:55'),
(8, 'wqwqwqw', '2017-07-20 16:07:26'),
(9, 'wqwqwqw', '2017-07-20 16:07:41'),
(10, 'wqwqwqw', '2017-07-20 16:07:38'),
(11, 'wqwqwqw', '2017-07-20 16:07:01'),
(12, 'wqwqwqw', '2017-07-20 16:07:17'),
(13, 'wqwqwqw', '2017-07-20 16:07:36'),
(14, 'wqwqwqw', '2017-07-20 16:07:21'),
(15, 'wqwqwqw', '2017-07-20 16:07:41'),
(16, 'wqwqwqw', '2017-07-20 16:07:59'),
(17, 'wqwqwqw', '2017-07-20 16:07:01'),
(18, 'wqwqwqw', '2017-07-20 16:07:18'),
(19, 'wqwqwqw', '2017-07-20 16:07:39'),
(20, 'wqwqwqw', '2017-07-20 16:07:09'),
(21, 'wqwqwqw', '2017-07-20 16:07:25'),
(22, 'wqwqwqw', '2017-07-20 16:07:32'),
(23, 'wqwqwqw', '2017-07-20 16:07:04'),
(24, 'wqwqwqw', '2017-07-20 16:07:07'),
(25, 'wqwqwqw', '2017-07-20 16:07:58'),
(26, 'wqwqwqw', '2017-07-20 16:07:31'),
(27, 'wqwqwqw', '2017-07-20 16:07:47'),
(28, 'wqwqwqw', '2017-07-20 16:07:50'),
(29, 'wqwqwqw', '2017-07-20 21:07:27'),
(30, 'wqwqwqw', '2017-07-20 21:07:40'),
(31, 'wqwqwqw', '2017-07-20 21:07:30'),
(32, 'wqwqwqw', '2017-07-20 21:07:50'),
(33, 'wqwqwqw', '2017-07-20 21:07:01'),
(34, 'wqwqwqw', '2017-07-20 21:07:08'),
(35, 'wqwqwqw', '2017-07-20 21:07:57'),
(36, 'wqwqwqw', '2017-07-20 21:07:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagar`
--

CREATE TABLE `pagar` (
  `id` int(11) NOT NULL,
  `vencimento` date NOT NULL,
  `descricao` longtext,
  `valor` double NOT NULL,
  `fkCliente` int(11) NOT NULL,
  `fkCategoria` int(11) NOT NULL,
  `pago` tinyint(1) NOT NULL DEFAULT '0',
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagar`
--

INSERT INTO `pagar` (`id`, `vencimento`, `descricao`, `valor`, `fkCliente`, `fkCategoria`, `pago`, `dateTime`) VALUES
(1, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 8, 15, 0, '2017-07-20 22:28:39'),
(2, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 17, 1, 1, '2017-07-20 22:29:08'),
(3, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 19, 1, 1, '2017-07-20 22:29:29'),
(4, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 22:29:30'),
(5, '2016-09-09', '9999999', 999.999, 9, 9, 0, '2017-07-21 00:46:53'),
(6, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 14, 4, 1, '2017-07-20 22:29:31'),
(8, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 13, 5, 1, '2017-07-20 22:30:56'),
(9, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 17, 4, 1, '2017-07-20 22:31:26'),
(10, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 9, 16, 1, '2017-07-20 22:39:47'),
(11, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 22:40:14'),
(12, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 22:49:59'),
(13, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:36:26'),
(14, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:36:51'),
(15, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:37:14'),
(16, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:39:05'),
(17, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:40:45'),
(18, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:41:03'),
(19, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:42:32'),
(20, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:47:35'),
(21, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:48:02'),
(22, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:48:47'),
(23, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:49:30'),
(24, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:49:47'),
(25, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:50:00'),
(26, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:53:35'),
(27, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:57:48'),
(28, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-20 23:59:54'),
(29, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:00:15'),
(30, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:01:50'),
(31, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:24:05'),
(32, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:24:42'),
(33, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:25:04'),
(34, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:25:43'),
(35, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:27:53'),
(36, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:28:59'),
(37, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:29:17'),
(38, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:30:43'),
(39, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:32:25'),
(40, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:34:32'),
(41, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:34:55'),
(42, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:36:49'),
(43, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:37:48'),
(44, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:40:21'),
(45, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:40:53'),
(46, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:41:20'),
(47, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:42:00'),
(48, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:43:10'),
(49, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:44:46'),
(50, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:45:13'),
(51, '2016-02-01', 'asa sasa sas sas asas as', 13.4, 5, 7, 1, '2017-07-21 00:46:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receber`
--

CREATE TABLE `receber` (
  `id` int(11) NOT NULL,
  `descricao` longtext,
  `valor` double NOT NULL,
  `dataRecebimento` date NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `recebido` tinyint(1) NOT NULL DEFAULT '0',
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receber`
--

INSERT INTO `receber` (`id`, `descricao`, `valor`, `dataRecebimento`, `fk_cliente`, `recebido`, `dateTime`) VALUES
(1, 'dsdsds', 212, '2017-07-02', 13, 0, '2017-07-21 00:00:00'),
(2, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 01:58:50'),
(3, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 01:59:10'),
(4, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 01:59:11'),
(5, '99999999999999', 999999, '2016-02-01', 5, 1, '2017-07-21 02:12:46'),
(6, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 01:59:14'),
(8, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 01:59:33'),
(9, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:00:28'),
(10, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:01:04'),
(11, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:08:21'),
(12, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:08:56'),
(13, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:10:54'),
(14, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:11:22'),
(15, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:11:52'),
(16, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:12:17'),
(17, 'asa sasa sas sas asas as', 13.4, '2016-02-01', 5, 1, '2017-07-21 02:12:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagar`
--
ALTER TABLE `pagar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCategoria_idx` (`fkCategoria`),
  ADD KEY `fkCliente_idx` (`fkCliente`);

--
-- Indexes for table `receber`
--
ALTER TABLE `receber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCliente_idx` (`fk_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `pagar`
--
ALTER TABLE `pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `receber`
--
ALTER TABLE `receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pagar`
--
ALTER TABLE `pagar`
  ADD CONSTRAINT `fkCategoria` FOREIGN KEY (`fkCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkCliente` FOREIGN KEY (`fkCliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `receber`
--
ALTER TABLE `receber`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
