-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 02:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `billets`
--

CREATE TABLE `billets` (
  `ID` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billets`
--

INSERT INTO `billets` (`ID`, `titre`, `contenu`, `dateCreation`) VALUES
(1, 'Bienvenue sur mon blog!', 'Je vous souhaite le bienvenue à mon blog qui vous parle du PHP bien sur !! s', '2021-06-24 12:38:24'),
(2, 'Le PHP à la conquette de tout le monde!', 'PHP a révolutionné le monde aujourd\'hui. Si vous arrivez à consulter ces derniers extensions vous n\'allez pas compter le nombre de fonctionnalités que vous pouvez réaliser. Vraiment c\'est fort', '2021-06-25 12:38:24'),
(3, 'Blague PHP', 'Savez vous que PHP est un langage serveur Mdr ^^ ca veut dire que le serveur l\'utilise pour parler', '2021-06-24 13:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_billets` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billets`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'Khaled', 'Merci pour la création de ce blog je suis très heureux :)', '2021-06-24 12:43:26'),
(2, 1, 'Youness', 'Ah oui je suis très content continues Youcef ^^.', '2021-06-24 12:43:26'),
(3, 2, 'Daniel', 'Oui, c\'est tout a fait PHP est un excelant langage il m\'aide non seulement dans ma vie professionnel mais il est devenu un loisir.', '2021-06-26 12:46:05'),
(4, 1, 'Maria', 'C\'est exceptionnelle cette nouvelle, YOUuuuuceeeef, tu as bien fait de créer ce blog, il vas nous aider à comprendre ce qui PHP.', '2021-06-29 12:46:05'),
(5, 2, 'Katia', 'J\'adore PHP, c\'est mon langage préféré.', '2021-06-29 12:49:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billets`
--
ALTER TABLE `billets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
