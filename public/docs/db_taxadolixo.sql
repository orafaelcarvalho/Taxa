-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 24-Jun-2021 às 18:40
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_taxadolixo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_solicitacoes`
--

DROP TABLE IF EXISTS `tb_solicitacoes`;
CREATE TABLE IF NOT EXISTS `tb_solicitacoes` (
  `codsol` int(10) NOT NULL AUTO_INCREMENT,
  `datsol` date NOT NULL,
  `nomsol` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `emasol` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telsol` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cpfsol` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nrgsol` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cepsol` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `endsol` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nensol` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `censol` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `baisol` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cidsol` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estsol` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cdcsol` int(20) NOT NULL,
  `pgtsol` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `filerg` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filecpf` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filecontaagua` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `numcad` int(50) DEFAULT NULL,
  PRIMARY KEY (`codsol`),
  UNIQUE KEY `cdcsol` (`cdcsol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(25) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `tipo` int(1) NOT NULL,
  `situacao` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `cpf`, `nome`, `senha`, `tipo`, `situacao`) VALUES
(1, '33333333333', 'Rafael Souza de Carvalho', '$2y$10$xl3XIYY4doHLjVqOeyEj8uxvc4Wa5glKIHo1nrWCkSu3ZVFU7.Xky', 1, 'Z');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
