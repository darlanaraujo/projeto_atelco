-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2020 às 23:49
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `codigo` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `rua` varchar(40) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fixo` int(10) DEFAULT NULL,
  `celular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codigo`, `cpf`, `nome`, `sexo`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `email`, `fixo`, `celular`) VALUES
(6, 1670307522, 'Darlan Peixoto Araujo', 'Masculino', 'Rua Primulas', 0, 'Quadra 19 - Lote 15', 'Jardim dos Girassóis', 'Aparecida de Goiânia', 'GO', 74941767, 'darlanbonfim@live.com', 0, 2147483647),
(7, 509624, 'Vilma Satis Araujo', 'Feminino', '', 0, '', 'Centro', 'Goiânia', 'GO', 74984570, 'vilma@teste.com', 0, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `codigo` int(11) NOT NULL,
  `cnpj` int(14) NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `fantasia` varchar(40) NOT NULL,
  `rua` varchar(40) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `cep` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fixo` int(10) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`codigo`, `cnpj`, `empresa`, `fantasia`, `rua`, `numero`, `complemento`, `cep`, `email`, `fixo`, `celular`, `nome`) VALUES
(29, 2147483647, 'Darlan Peixoto de Araujo - ME', 'Visual Além Paraíba', 'Rua Dr. Sobral Pinto', 114, 'Loja A', 36660000, 'contato@visualalemparaiba.com', 2147483647, 2147483647, 'Darlan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `usuario`, `senha`, `email`, `nome`) VALUES
(1, 'darlanbonfim', 'Carol1419', 'darlanbonfim@gmail.com', 'Darlan P. Araujo'),
(3, 'admin', 'admin', 'admin@teste.com', 'administrador'),
(4, 'carolaraujo', '1234', 'carol@gmail.com', 'Carol Araujo'),
(9, 'daviaraujo', '123', 'davi@teste.com', 'Davi Araujo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
