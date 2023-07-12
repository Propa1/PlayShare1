-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2023 às 19:47
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `social`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `idcomments` int(11) NOT NULL,
  `pub_id` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `recipient_uid` varchar(45) NOT NULL,
  `sender_uid` varchar(45) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `messages`
--

INSERT INTO `messages` (`msg_id`, `recipient_uid`, `sender_uid`, `msg`) VALUES
(131, '781080771', '673379307', 'OLA'),
(132, '781080771', '673379307', 'TUDO BEM'),
(133, '673379307', '781080771', 'sim e ctg'),
(134, '781080771', '673379307', 'ola'),
(135, '673379307', '673379307', 'ola'),
(136, '673379307', '781080771', 'ola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publications`
--

CREATE TABLE `publications` (
  `pub_id` int(11) NOT NULL,
  `user_uid` varchar(45) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `media` varchar(200) DEFAULT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `publications`
--

INSERT INTO `publications` (`pub_id`, `user_uid`, `title`, `description`, `media`, `timestamp`) VALUES
(34, '781080771', 'PAP', 'Publicação para demonstração na defesa da PAP', '1689147335LEMINE2_GGGamesClip#376.mp4', '2023-07-12 09:35:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publications_likes`
--

CREATE TABLE `publications_likes` (
  `like_giver` varchar(45) DEFAULT NULL,
  `publication_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `uid` varchar(45) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `bio` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(400) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `last_activity` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`uid`, `firstname`, `lastname`, `bio`, `email`, `password`, `img`, `status`, `last_activity`) VALUES
('1228549043', 'fabio', 'twate', 'jkhads', 'fabiocasalao20@gmail.com', '202cb962ac59075b964b07152d234b70', '1689159796computer.png', 'Online now', '12:03:54'),
('1515733854', 'Carla', 'Cascais', 'Sou programadora', 'Carlacasacai@gmail.com', '202cb962ac59075b964b07152d234b70', '1689158079star.png', 'Offline now', '11:34:45'),
('673379307', 'fabio', 'PAP', 'Defesa da PAP', 'fabiocasalao@gmail.com', 'a6f928546b5c2d43c5a26e5cbf132309', '64aeac892f0488.88034847.png', 'Online now', '18:45:46'),
('781080771', 'Projeto', 'PAP', 'Defesa da PAP', 'DefesadaPAP@gmail.com', 'a6f928546b5c2d43c5a26e5cbf132309', '1689147278gamer.png', 'Offline now', '14:42:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_followers`
--

CREATE TABLE `user_followers` (
  `follow_id` int(11) NOT NULL,
  `follower_uid` varchar(45) NOT NULL,
  `followed_uid` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user_followers`
--

INSERT INTO `user_followers` (`follow_id`, `follower_uid`, `followed_uid`) VALUES
(80, '781080771', '673379307'),
(82, '673379307', '781080771');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idcomments`);

--
-- Índices para tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `messages_FK` (`recipient_uid`),
  ADD KEY `messages_FK_1` (`sender_uid`);

--
-- Índices para tabela `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`pub_id`),
  ADD KEY `publications_FK` (`user_uid`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Índices para tabela `user_followers`
--
ALTER TABLE `user_followers`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `user_followers_FK` (`follower_uid`),
  ADD KEY `user_followers_FK_1` (`followed_uid`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `idcomments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de tabela `publications`
--
ALTER TABLE `publications`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `user_followers`
--
ALTER TABLE `user_followers`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_FK` FOREIGN KEY (`recipient_uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `messages_FK_1` FOREIGN KEY (`sender_uid`) REFERENCES `users` (`uid`);

--
-- Limitadores para a tabela `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_FK` FOREIGN KEY (`user_uid`) REFERENCES `users` (`uid`);

--
-- Limitadores para a tabela `user_followers`
--
ALTER TABLE `user_followers`
  ADD CONSTRAINT `user_followers_FK` FOREIGN KEY (`follower_uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `user_followers_FK_1` FOREIGN KEY (`followed_uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
