-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2019 às 12:51
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(5) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `senha`, `img`) VALUES
(55, 'Renan', 'renan@gmail.com', '123', 'renan.png'),
(56, 'Jace', 'jace@magic.com', '12345', 'Jace.jpg'),
(57, 'Liliana', 'liliana@magic.com', '123456', 'liliana.jpg'),
(58, 'Nicol Bolas', 'nicolbolas@magic.com', '123456789', 'nicolbolas.jpg'),
(59, 'Chandra', 'chandra@magic.com', '15123', 'chandra.jpg'),
(60, 'Unknow', 'unknow@magic.com', '123', 'img-default.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE `filial` (
  `id_filial` int(5) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `ende` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`id_filial`, `nome`, `ende`) VALUES
(24, 'Borges de Medeiros', 'Borges de Medeiros, 23 - Porto Alegre'),
(25, 'Loja Sertorio', 'Av. Sertorio, 1233');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(5) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ende` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `ende`) VALUES
(19, 'Wizardss', '23 de Outubro, 234'),
(22, 'RedBurn MTG', 'Av. Assis Brasil, 123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(5) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` float NOT NULL,
  `id_filial` int(5) NOT NULL,
  `id_fornecedor` int(5) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `valor`, `id_filial`, `id_fornecedor`, `img`) VALUES
(43, 'Bundle Master25', 500, 24, 19, 'bundlemaster25.png'),
(44, 'Bundle War of Spark', 300, 24, 19, 'bundlewarofspark.jpg'),
(45, 'Bundle Guilds of Ravinica', 250, 24, 19, 'bundleguildofravinica.png'),
(46, 'Commander 2018 (Qualquer Deck)', 180, 25, 19, 'commander2018.jpg'),
(47, 'Marcado Dado D20', 5.5, 25, 22, 'dadod20.jpg'),
(48, 'Booster Wark of Spark', 15, 25, 19, 'boosterwarofspark.jpg'),
(49, 'Booster Guild of Ravinica', 12, 24, 19, 'boosterguildsofravinica.jpg'),
(50, 'Dragon Shield Black', 80, 25, 22, 'dragonshieldpreto.png'),
(51, 'Dragon Shield Petrol', 80, 24, 22, 'dragonshieldpetrol.jpg'),
(52, 'Dragon Shield Purple', 80, 24, 22, 'dragonshieldpurlple.jpg'),
(53, 'Deck Box Ultra PRO Branca', 50, 24, 22, 'deckbox.png'),
(54, 'Deck Box Ultra PRO Rosa', 50, 24, 22, 'deckboxrosa.jpg'),
(55, 'Marcador de Vida Digital', 120, 25, 22, 'prod-default.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(5) NOT NULL,
  `data` date NOT NULL,
  `id_cliente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_itens`
--

CREATE TABLE `venda_itens` (
  `id_venda` int(5) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` double NOT NULL,
  `id_venda_itens` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda_itens`
--

INSERT INTO `venda_itens` (`id_venda`, `id_produto`, `qtd`, `valor`, `id_venda_itens`) VALUES
(0, 43, 2, 1000, 5),
(0, 55, 2, 240, 6),
(0, 50, 1, 80, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id_filial`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- Indexes for table `venda_itens`
--
ALTER TABLE `venda_itens`
  ADD PRIMARY KEY (`id_venda_itens`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `filial`
--
ALTER TABLE `filial`
  MODIFY `id_filial` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venda_itens`
--
ALTER TABLE `venda_itens`
  MODIFY `id_venda_itens` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
