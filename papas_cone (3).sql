-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 22-Ago-2018 às 06:17
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papas_cone`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(2) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `id_estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `id_estado`) VALUES
(1, 'Belo Horizonte', 15),
(2, 'Contagem', 15),
(3, 'Betim', 15),
(4, 'Ponte Nova', 15),
(5, 'Rio Doce', 15),
(6, 'Urucania', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista`
--

CREATE TABLE `entrevista` (
  `id` int(10) NOT NULL,
  `id_franqueado` int(10) NOT NULL,
  `data_entrevista` varchar(20) NOT NULL,
  `data_inclusao` date NOT NULL,
  `data_alteraca` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(2) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`) VALUES
(3, 'Acre'),
(4, 'Alagoas'),
(5, 'Amapá'),
(6, 'Amazonas'),
(7, 'Bahia'),
(8, 'Ceará'),
(9, 'Distrito Federal'),
(10, 'Espírito Santo'),
(11, 'Goiás'),
(12, 'Maranhão'),
(13, 'Mato Grosso'),
(14, 'Mato Grosso do Sul'),
(15, 'Minas Gerais'),
(16, 'Pará'),
(17, 'Paraíba'),
(18, 'Paraná'),
(19, 'Pernambuco'),
(20, 'Piauí'),
(21, 'Rio de Janeiro'),
(22, 'Rio Grande do Norte'),
(23, 'Rio Grande do Sul'),
(24, 'Rondônia'),
(25, 'Roraima'),
(26, 'Santa Catarina'),
(27, 'São Paulo'),
(28, 'Sergipe'),
(29, 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faq`
--

CREATE TABLE `faq` (
  `id` int(5) NOT NULL,
  `pergunta` varchar(255) DEFAULT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `posicao` int(10) DEFAULT NULL,
  `data_inclusao` date DEFAULT NULL,
  `data_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faq`
--

INSERT INTO `faq` (`id`, `pergunta`, `resposta`, `posicao`, `data_inclusao`, `data_alteracao`) VALUES
(1, 'O que é um FAQ e como faço um para a minha loja???', 'Montar um FAQ não é complicado – exige apenas organização e bom português. E os resultados de um conteúdo bem feito e fácil de acessar vão desde a economia do seu tempo até o melhor posicionamento da sua loja nas buscas e o aumento na taxa de conversão.', 2, '2018-08-09', NULL),
(2, 'Onde esta o wally?', 'Wally esta em Acre!', 1, '2018-08-21', NULL),
(3, 'Oi??', 'Tudo bem e vc', 3, '2018-08-21', NULL),
(4, 'asdasd', 'adsadas', 3, '2018-08-21', NULL),
(5, 'sdssdfsd', 'fsdfdsfsd', 7, '2018-08-21', NULL),
(6, 'asdsadasd', 'asdadsa', 3, '2018-08-21', NULL),
(7, 'fdfdsfds', 'fsdfdsf', 9, '2018-08-21', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `franqueado`
--

CREATE TABLE `franqueado` (
  `id` int(10) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `mensagem` varchar(2000) DEFAULT NULL,
  `id_situacao` int(2) NOT NULL,
  `data_inclusao` date DEFAULT NULL,
  `data_alteracao` date DEFAULT NULL,
  `codigo_random` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `franqueado`
--

INSERT INTO `franqueado` (`id`, `nome`, `email`, `telefone`, `mensagem`, `id_situacao`, `data_inclusao`, `data_alteracao`, `codigo_random`) VALUES
(15, 'Francisco Miguel Leão Júnior', 'miguelbh6@gmail.com', '(31) 98888-0509', 'ads', 6, '2018-08-21', NULL, 1211789794);

-- --------------------------------------------------------

--
-- Estrutura da tabela `franqueado_cidade`
--

CREATE TABLE `franqueado_cidade` (
  `id` int(10) NOT NULL,
  `id_franqueado` int(10) NOT NULL,
  `id_cidade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `franqueado_cidade`
--

INSERT INTO `franqueado_cidade` (`id`, `id_franqueado`, `id_cidade`) VALUES
(15, 15, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `franquias`
--

CREATE TABLE `franquias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `sub_titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `img_1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `franquias`
--

INSERT INTO `franquias` (`id`, `titulo`, `sub_titulo`, `descricao`, `img_1`) VALUES
(4, 'Franquias', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '20671.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `introducao`
--

CREATE TABLE `introducao` (
  `id` smallint(2) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `introducao`
--

INSERT INTO `introducao` (`id`, `titulo`, `descricao`) VALUES
(1, 'Papas Cone!', 'fsfsfsfs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `sub_titulo` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id`, `titulo`, `sub_titulo`, `descricao`) VALUES
(2, 'Lojas', 'Lojas Papas Cone em todo Brasil', 'dasdasdasdasdasdsada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas_promocao`
--

CREATE TABLE `lojas_promocao` (
  `id` int(5) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lojas_promocao`
--

INSERT INTO `lojas_promocao` (`id`, `nome`, `descricao`) VALUES
(1, 'dasdada', 'dasdasdas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametro`
--

CREATE TABLE `parametro` (
  `id` int(5) NOT NULL,
  `sigla` varchar(50) NOT NULL,
  `valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parametro`
--

INSERT INTO `parametro` (`id`, `sigla`, `valor`) VALUES
(1, 'ENVIAR_EMAIL_ADMIN', 'FALSE'),
(2, 'EMAIL_ADMIN', 'miguelbh6@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text,
  `img_1` varchar(255) NOT NULL,
  `id_categoria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `titulo`, `descricao`, `img_1`, `id_categoria`) VALUES
(16, 'Para cada tipo 1 cone', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '7724.jpg', 10),
(18, 'Franquias', NULL, '28917.jpg', 11),
(20, 'Hot Dog', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '9655.jpg', 11),
(21, 'Batata frita hot1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '355.jpg', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_categoria`
--

CREATE TABLE `produtos_categoria` (
  `id` int(2) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_categoria`
--

INSERT INTO `produtos_categoria` (`id`, `img`, `nome`, `descricao`) VALUES
(10, '18558.jpg', 'Churros', 'Churros do chaves e kiko'),
(11, '29151.jpg', 'Hambuguer', 'Hmagurgueres top '),
(13, '292.jpg', 'Batata', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_imagen`
--

CREATE TABLE `produtos_imagen` (
  `id` int(5) NOT NULL,
  `img` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `id_produto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE `promocao` (
  `id` int(5) NOT NULL,
  `descricao` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `ativo` int(1) NOT NULL DEFAULT '1',
  `id_loja` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`id`, `descricao`, `img`, `ativo`, `id_loja`) VALUES
(1, 'dfggdgdf', '26734.jpg', 1, NULL),
(2, 'asdasdasdas', '11023.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quem_somos`
--

CREATE TABLE `quem_somos` (
  `id` int(2) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sub_titulo` varchar(255) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `img_1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quem_somos`
--

INSERT INTO `quem_somos` (`id`, `titulo`, `sub_titulo`, `descricao`, `img_1`) VALUES
(3, 'Quem somos', 'Quem somos -> Subtitulo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2097.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(2) NOT NULL,
  `descricao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `descricao`) VALUES
(1, 'Interessado'),
(2, 'Aprovado'),
(3, 'Reprovado'),
(4, 'Pré aprovado'),
(5, 'Entrevista agendada'),
(6, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cidades_estado_FK` (`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `entrevista`
--
ALTER TABLE `entrevista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franqueado`
--
ALTER TABLE `franqueado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `franqueado_situacao_FK` (`id_situacao`),
  ADD KEY `id_situacao` (`id_situacao`);

--
-- Indexes for table `franqueado_cidade`
--
ALTER TABLE `franqueado_cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `franqueado_cidade_franqueado_FK` (`id_franqueado`),
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `id_franqueado` (`id_franqueado`);

--
-- Indexes for table `franquias`
--
ALTER TABLE `franquias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introducao`
--
ALTER TABLE `introducao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lojas_promocao`
--
ALTER TABLE `lojas_promocao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `produtos_categoria`
--
ALTER TABLE `produtos_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos_imagen`
--
ALTER TABLE `produtos_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loja` (`id_loja`);

--
-- Indexes for table `quem_somos`
--
ALTER TABLE `quem_somos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `entrevista`
--
ALTER TABLE `entrevista`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `franqueado`
--
ALTER TABLE `franqueado`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `franqueado_cidade`
--
ALTER TABLE `franqueado_cidade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `franquias`
--
ALTER TABLE `franquias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `introducao`
--
ALTER TABLE `introducao`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lojas_promocao`
--
ALTER TABLE `lojas_promocao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parametro`
--
ALTER TABLE `parametro`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produtos_categoria`
--
ALTER TABLE `produtos_categoria`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produtos_imagen`
--
ALTER TABLE `produtos_imagen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promocao`
--
ALTER TABLE `promocao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quem_somos`
--
ALTER TABLE `quem_somos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `franqueado`
--
ALTER TABLE `franqueado`
  ADD CONSTRAINT `franqueado_ibfk_1` FOREIGN KEY (`id_situacao`) REFERENCES `situacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `franqueado_cidade`
--
ALTER TABLE `franqueado_cidade`
  ADD CONSTRAINT `franqueado_cidade_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `franqueado_cidade_ibfk_2` FOREIGN KEY (`id_franqueado`) REFERENCES `franqueado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `produtos_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos_imagen`
--
ALTER TABLE `produtos_imagen`
  ADD CONSTRAINT `produtos_imagen_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `promocao`
--
ALTER TABLE `promocao`
  ADD CONSTRAINT `promocao_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `lojas_promocao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
