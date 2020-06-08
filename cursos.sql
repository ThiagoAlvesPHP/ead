-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jun-2020 às 03:20
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cursos`
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
  `status` int(11) NOT NULL DEFAULT 1,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `foto`, `email`, `senha`, `status`, `dt_registro`) VALUES
(4, 'Thiago Alves', '2650f8158767d4a078550e907bae6fe1.jpeg', 'thiagoalves@albicod.com', '202cb962ac59075b964b07152d234b70', 1, '2020-06-07 22:41:18'),
(5, 'Leidizane Brito', '46955b99e182456229d732b0818c7a43.jpeg', 'leidizane_alves@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, '2020-06-07 22:41:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso`
--

CREATE TABLE `aluno_curso` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno_curso`
--

INSERT INTO `aluno_curso` (`id`, `id_aluno`, `id_curso`, `status`, `dt_registro`) VALUES
(1, 5, 3, 3, '2020-06-08 00:45:39');

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
  `status` int(11) NOT NULL DEFAULT 1,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `id_modulo`, `titulo`, `video`, `pdf`, `ordem`, `status`, `dt_registro`) VALUES
(2, 1, 'Conhecendo um pouco da historia', '425861668', '61a2a0e99630d2990096094f28aeb23e.pdf', 1, 1, '2020-06-04 14:59:21'),
(3, 1, 'Conhecendo um pouco da historia - 2ª parte', '425862135', 'f4c5b477d9ed73ea1d9fe7a7067c4e0b.pdf', 2, 1, '2020-06-04 15:00:07'),
(4, 4, 'Teste de Aula', '425862039', '61c31868c3ddff182aeabb6e681caac8.pdf', 1, 1, '2020-06-04 21:49:35'),
(5, 1, 'Outra aula', '425862039', '01948fac130c46296947708211af65e4.pdf', 1.2, 1, '2020-06-04 23:03:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp()
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
  `status` int(11) NOT NULL DEFAULT 1,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `id_curso`, `modulo`, `ordem`, `status`, `dt_registro`) VALUES
(1, 3, 'Modulo 1', 1, 1, '2020-06-01 20:53:23'),
(3, 3, 'Modulo 3', 2, 1, '2020-06-01 21:10:59'),
(4, 3, 'Modulo 2', 1.1, 1, '2020-06-02 11:51:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `nivel`, `status`, `dt_registro`) VALUES
(1, 'System', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1, '2020-06-01 11:28:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aluno_curso`
--
ALTER TABLE `aluno_curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `aluno_curso`
--
ALTER TABLE `aluno_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
