-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jun-2020 às 20:21
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cursos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso`
--

CREATE TABLE `aluno_curso` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `ordem` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `dt_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `id_modulo`, `titulo`, `video`, `pdf`, `ordem`, `status`, `dt_registro`) VALUES
(2, 1, 'Conhecendo um pouco da historia', 'https://vimeo.com/425861668', '0beb7bbdb950894f7f57149892a3ad36.pdf', 1, 1, '2020-06-04 14:59:21'),
(3, 1, 'Conhecendo um pouco da historia - 2ª parte', 'https://vimeo.com/425862135', '6ea924bc9cee16bb2232003f52726e97.pdf', 2, 1, '2020-06-04 15:00:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `dt_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `curso`, `imagem`, `valor`, `status`, `dt_registro`) VALUES
(3, 'CURSO DE VIOLÃO', 'c5f783c60fd334b62d2251bc65ab5396.png', 120, 1, '2020-06-01 15:50:19'),
(4, 'CURSO DE TECLADO', '349d33dfac7dabde3d0a0cebb5768a9c.png', 130, 1, '2020-06-01 15:50:30'),
(5, 'CURSO DE CONTRA-BAIXO', 'acaef840ba5a1e24a31d157fe771b2c3.png', 99.9, 1, '2020-06-01 15:51:20'),
(6, 'CURSO DE PHP', '13c821095631069fc7ee416b846ea371.png', 159.9, 1, '2020-06-01 19:19:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `ordem` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `dt_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `id_curso`, `modulo`, `ordem`, `status`, `dt_registro`) VALUES
(1, 3, 'Historia da Música', 1, 1, '2020-06-01 20:53:23'),
(3, 3, 'Primeiros Passos Teoricos', 2, 1, '2020-06-01 21:10:59'),
(4, 3, 'Introdução a Música', 1.1, 1, '2020-06-02 11:51:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `nivel`, `status`, `dt_registro`) VALUES
(1, 'System', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1, '2020-06-01 11:28:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aluno_curso`
--
ALTER TABLE `aluno_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aluno_curso`
--
ALTER TABLE `aluno_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
