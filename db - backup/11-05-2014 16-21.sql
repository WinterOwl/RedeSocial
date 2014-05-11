-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 11/05/2014 às 17h20min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `rede_social`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `albuns`
--

CREATE TABLE IF NOT EXISTS `albuns` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `albuns`
--

INSERT INTO `albuns` (`id_album`, `nome`, `id_user`) VALUES
(1, 'FÃ©rias', 1),
(3, 'FÃ¡bio Jorge', 1),
(4, 'Admin', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `foto_perfil` char(1) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id_foto`, `foto`, `id_user`, `id_album`, `foto_perfil`) VALUES
(1, 'Jellyfish.jpg', 1, 1, '1'),
(2, 'Koala.jpg', 1, 1, '0'),
(3, '1399818576.jpg', 1, 1, '0'),
(4, '1399818604.jpg', 1, 3, '0'),
(5, '1399818889.jpg', 2, 4, '0'),
(6, '1399818893.jpg', 2, 4, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `sexo` char(1) NOT NULL,
  `morada` varchar(250) NOT NULL,
  `contacto` varchar(250) NOT NULL,
  `estado_civil` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_users` (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome`, `data_nascimento`, `email`, `password`, `sexo`, `morada`, `contacto`, `estado_civil`) VALUES
(1, 'JoÃ£o Filipe Pacheco Pinto', '1994-08-01', 'epilif81_@hotmail.com', '123', 'M', 'Rua das Couve', '918273637', 'Solteiro'),
(2, 'admin', '2014-05-04', 'admin@admin.com', '123', 'F', 'Rua das Couves', '910264544', 'Casado');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
