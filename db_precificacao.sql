-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 21-Jun-2023 às 05:23
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_precificacao`
--
CREATE DATABASE IF NOT EXISTS `db_precificacao` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_precificacao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro`
--

CREATE TABLE IF NOT EXISTS `tb_cadastro` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_cadastro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id_cadastro`, `nome`, `cpf_cnpj`, `email`, `senha`) VALUES
(26, 'kauan', '48942824880', 'mlk_kauan10@hotmail.com', '123456'),
(27, 'Kauan Carlos', '48942824885', 'mlk_kauan15@hotmail.com', '1234567890'),
(28, 'Kauan Carlos', '48942824889', 'mlk_kauan33@hotmail.com', '1234567891'),
(29, 'Kauan Carlos', '12345678910', 'tcc03@hotmail.com', '123456789'),
(30, 'Kauan Carlos', '12345678999', 'tcc04@hotmail.com', '123456789'),
(31, 'Kauan', '12312312300', 'tcc01@hotmail.com', '123456789k'),
(32, 'Kauan Carlos', '12345678922', 'tcc@hotmail.com', '123456789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ingredientes`
--

CREATE TABLE IF NOT EXISTS `tb_ingredientes` (
  `id_ingredientes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `custo_total` decimal(10,2) NOT NULL,
  `qtd_comprada` float NOT NULL,
  `qtd_usada` float NOT NULL,
  `id_medida` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ingredientes`),
  KEY `nome_medida` (`id_medida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Extraindo dados da tabela `tb_ingredientes`
--

INSERT INTO `tb_ingredientes` (`id_ingredientes`, `nome`, `custo_total`, `qtd_comprada`, `qtd_usada`, `id_medida`) VALUES
(66, 'Cenoura', '3.50', 5, 3, 66),
(67, 'Óleo', '4.99', 900, 125, 67),
(69, 'Farinha de trigo', '5.99', 1, 210, 69),
(70, 'Fermento em pó', '3.90', 100, 8, 70),
(71, 'Açucar', '3.59', 1, 190, 71),
(72, 'Amido de milho', '22.28', 1, 60, 72),
(73, 'Ovos', '18.00', 12, 3, 73);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_medida`
--

CREATE TABLE IF NOT EXISTS `tb_medida` (
  `id_medida` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_comprada_medida` varchar(8) NOT NULL,
  `qtd_usada_medida` varchar(8) NOT NULL,
  PRIMARY KEY (`id_medida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Extraindo dados da tabela `tb_medida`
--

INSERT INTO `tb_medida` (`id_medida`, `qtd_comprada_medida`, `qtd_usada_medida`) VALUES
(66, 'Unidade', 'Unidade'),
(67, 'mL', 'mL'),
(69, 'Kg', 'g'),
(70, 'g', 'g'),
(71, 'Kg', 'g'),
(72, 'Kg', 'g'),
(73, 'Unidade', 'Unidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_receita`
--

CREATE TABLE IF NOT EXISTS `tb_receita` (
  `id_receita` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `rendimento` int(11) NOT NULL,
  `porcentagem` int(11) NOT NULL,
  `custo_receita` float(10,2) NOT NULL,
  `valor_cobrado` float(10,2) NOT NULL,
  PRIMARY KEY (`id_receita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_ingredientes`
--
ALTER TABLE `tb_ingredientes`
  ADD CONSTRAINT `tb_ingredientes_ibfk_1` FOREIGN KEY (`id_medida`) REFERENCES `tb_medida` (`id_medida`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
