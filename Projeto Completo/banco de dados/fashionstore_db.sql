-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jan-2019 às 11:24
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionstore_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `email`, `senha`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(255) NOT NULL,
  `cod_user` varchar(255) NOT NULL,
  `id_produto` varchar(500) NOT NULL,
  `id_status` varchar(255) NOT NULL,
  `valor_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `cod_user`, `id_produto`, `id_status`, `valor_total`) VALUES
(670, '@Fabricio7474', '<hr>Código produto: (@teste) <br><br>Quantidade: (1) <br><br>SubTotal: 25,00<hr>', 'Retirado', '25,00'),
(671, '@Fabricio7474', '<hr>Código produto: (@teste) <br><br>Quantidade: (1) <br><br>SubTotal: 25,00<hr>', 'Retirado', '25,00'),
(674, '@Fabricio74', '<hr>Código produto: (@Minnie Disney Cl�ssicos) <br><br>Quantidade: (1) <br><br>SubTotal: 39,99<hr>', 'Retirado', '39,99'),
(676, '@Fabricio74', '<hr>Código produto: (@camiseta Malha Os Simpsons ) <br><br>Quantidade: (1) <br><br>SubTotal: 47,99<hr>', 'Retirado', '47,99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `cod`, `nome`, `sobrenome`, `slide`, `cpf`, `telefone`, `email`, `senha`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `numero`) VALUES
(8, '@vendedor01', 'Fabricio', 'Oliveira', '[1]WALLPAPERS (2).jpg', '555.555.555-55', '55-5555-55555', 'fabricio@gmail.com', 'fabricio74', '04945-015', 'Estrada da Baronesa', 'Parque do Lago', 'São Paulo', 'SP', '255');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `desconto` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `imagem_01` varchar(255) NOT NULL,
  `imagem_02` varchar(255) NOT NULL,
  `imagem_03` varchar(255) NOT NULL,
  `imagem_04` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `cod`, `nome`, `modelo`, `tipo`, `categoria`, `preco`, `desconto`, `total`, `descricao`, `imagem_01`, `imagem_02`, `imagem_03`, `imagem_04`) VALUES
(95, '@Mickey Mouse', 'Camiseta Mickey Mouse', 'Feminino', 'Adulto', 'Camiseta', '59.99', '10', '53.991', 'Divertida e confortável, a peça em modelagem clássica é ideal para o dia a dia. Com decote careca e mangas curtas, a camiseta apresenta estampa do Mickey. Aposte!', 'Camiseta Mickey Mouse 01.jpg', 'Camiseta Mickey Mouse 02.jpg', 'Camiseta Mickey Mouse 03.jpg', 'Camiseta Mickey Mouse 04.jpg'),
(98, '@Minnie Disney Clássicos', 'Regata Minnie Disney', 'Feminino', 'Infantil', 'Camiseta regata', '49.99', '10', '44.991', 'A regata é confeccionada inteiramente em algodão. Possui modelagem solta, decote redondo, costas tipo nadador e estampa frontal da personagem Minnie Mouse com detalhe em glitter. Fresh e delicada, é ideal para os dias de verão da sua pequena!             ', 'Regata Minnie Disney Clássicos 01.jpg', 'Regata Minnie Disney Clássicos 02.jpg', 'Regata Minnie Disney Clássicos 03.jpg', 'Regata Minnie Disney Clássicos 04.jpg'),
(99, '@regata Telada Future', 'Regata Telada Future ', 'Feminino', 'Teen', 'Camiseta regata', '59.99', '20', '47.992', 'Confeccionado em tecido telado com modelagem ampla esportiva, a regata com acabamento em ribana com fios de lurex é puro estilo. Seu forro top é fixo e tem print \"Future princess\". Atitude na certa. Aposte!', 'Regata Telada Future Princess 01.jpg', 'Regata Telada Future Princess 02.jpg', 'Regata Telada Future Princess 03.jpg', 'Regata Telada Future Princess 04.jpg'),
(100, '@camiseta Tropical', 'Camiseta tropical', 'Masculino', 'Adulto', 'camiseta', '39.99', '10', '35.991', 'Peça confeccionada em modelagem clássica que possui decote careca e mangas curtas. Com estampa charmosa por toda a peça, a camiseta é ideal para passar o dia na praia. Aposte!', 'Camiseta Tropical 01.jpg', 'Camiseta Tropical 02.jpg', 'Camiseta Tropical 03.jpg', 'Camiseta Tropical 04.jpg'),
(102, '@camiseta Malha', 'Camiseta Malha Skate', 'Masculino', 'Infantil', 'Camiseta', '39.99', '10', '35.991', 'Camiseta confeccionada em malha de algodão com decote careca e mangas curtas. Com mini estampas em toda peça, a t-shirt estilosa completa o look street com conforto.                            ', 'Camiseta Malha Skate 01.jpg', 'Camiseta Malha Skate 02.jpg', 'Camiseta Malha Skate 03.jpg', 'Camiseta Malha Skate 04.jpg'),
(104, '@camiseta Malha Os Simpsons ', 'Camiseta Malha Os Simpsons ', 'Masculino', 'Teen', 'camiseta', '59.99', '20', '47.992', 'Confeccionada em malha, a camiseta apresenta modelagem reta com mangas curtas e estampa temática do seriado animado Os Simpsons. Ideal para compor looks despojados, confortáveis e com um toque fun.                            ', 'Camiseta Malha Os Simpsons 01.jpg', 'Camiseta Malha Os Simpsons 02.jpg', 'Camiseta Malha Os Simpsons 03.jpg', 'Camiseta Malha Os Simpsons 04.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cod`, `nome`, `sobrenome`, `slide`, `cpf`, `telefone`, `email`, `senha`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `numero`) VALUES
(97, '@Fabricio74', 'Fabricio', 'Oliveira', '[10]Captura de Tela (1).png', '555.555.555-55', '11-9856-56856', 'fabricio@gmail.com', 'fabricio74', '04945-015', 'Estrada da Baronesa', 'Parque do Lago', 'São Paulo', 'SP', '128');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=677;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
