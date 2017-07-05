-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jun-2017 às 01:23
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `nomeAgendamento` varchar(80) NOT NULL,
  `dataAgendamento` varchar(12) NOT NULL,
  `horaAgendamento` time NOT NULL,
  `nomeMedico` varchar(50) NOT NULL,
  `tipoAgendamento` varchar(20) NOT NULL,
  `descricaoAgendamento` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `nomeAgendamento`, `dataAgendamento`, `horaAgendamento`, `nomeMedico`, `tipoAgendamento`, `descricaoAgendamento`) VALUES
(15, 'Rafael', '04/06/2017', '10:20:00', 'Dr Paula', 'RemarcaÃ§Ã£o', 'fsadfasdfasd'),
(16, 'Gabriel', '19/02/1999', '15:20:00', 'Dr Carlos', 'RemarcaÃ§Ã£o', 'lambda lambda'),
(17, 'Marcos', '12/12/2012', '09:20:00', 'Dr Layla', 'RemarcaÃ§Ã£o', 'lasmds'),
(18, 'Maria Joaquina', '30/12/2000', '15:20:00', 'Dr Geraldo', 'RemarcaÃ§Ã£o', 'gdsafdsa'),
(19, 'Jefferson', '21/22/3222', '15:20:00', 'Dr Paula', 'RemarcaÃ§Ã£o', 'dasfdasa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `sobrenomeUsuario` varchar(50) NOT NULL,
  `cpfUsuario` varchar(14) NOT NULL,
  `emailUsuario` varchar(70) NOT NULL,
  `cepUsuario` varchar(9) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(70) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `senhaUsuario` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario`, `idUsuario`, `nomeUsuario`, `sobrenomeUsuario`, `cpfUsuario`, `emailUsuario`, `cepUsuario`, `rua`, `bairro`, `cidade`, `uf`, `senhaUsuario`) VALUES
('root', 4, 'root', 'root', '000.000.000-09', 'root@root', '72405-560', 'Quadra 56', 'Setor Central (Gama)', 'BrasÃ­lia', 'DF', '63a9f0ea7bb98050796b649e85481845'),
('gabriel.limaa', 6, 'Gabriel Nascimento Lima', 'Lima', '123.456.789-88', 'gabriel@gabriel', '72405-560', 'Quadra 56', 'Setor Central (Gama)', 'BrasÃ­lia', 'DF', '81dc9bdb52d04dc20036dbd8313ed055'),
('Alexandre', 7, 'Alexandre ', 'FranÃ§a', '444.444.444-23', 'alexandre@alexandre', '72405-560', 'Quadra 56', 'Setor Central (Gama)', 'BrasÃ­lia', 'DF', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
