-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

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
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `sexo` char(1) NOT NULL,
  `morada` varchar(250) DEFAULT NULL,
  `contacto` varchar(250) NOT NULL,
  `estado_civil` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_users` (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome`, `data_nascimento`, `email`, `password`, `sexo`, `morada`, `contacto`, `estado_civil`) VALUES
(1, 'João Filipe Pacheco Pinto', '1994-08-02', 'epilif81_@hotmail.com', '123', 'M', 'Rua das Couves', '918273633', 'Solteiro'),
(2, 'Rui', '2014-04-07', 'rui_moreira25@outlook.com', '1', 'M', 'Portugal', '', 'Solteiro'),
(3, 'Rui2', '2010-05-11', 'rui_moreira252@outlook.com', '1', 'F', 'Portugal', '', 'Numa Relacao');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
