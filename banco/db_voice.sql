-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Ago-2023 às 03:34
-- Versão do servidor: 8.0.31
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_voice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_messages`
--

DROP TABLE IF EXISTS `tb_messages`;
CREATE TABLE IF NOT EXISTS `tb_messages` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_messages`
--

INSERT INTO `tb_messages` (`id_message`, `message`) VALUES
(1, 'Esta mensagem foi enviada usando uma aplicação php! </br> Me identifiquei muito com a vaga, devido à combinação de fatores que a tornam uma oportunidade realmente imperdível para mim. Primeiramente, o papel de Especialista de Dados me atrai por estar alinhado aos meus interesses em programação e tecnologias de gestão de dados. O modelo de trabalho acrestenta à vaga, o que me atrai é a carga horária de 8 horas que trariam um bom equilíbrio entre trabalho e vida pessoal. A exigência de conheciment');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
