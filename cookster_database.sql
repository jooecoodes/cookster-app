-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 11:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookster_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `video` text NOT NULL,
  `content` text NOT NULL,
  `difficulty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `video`, `content`, `difficulty`) VALUES
(5, 'Abra ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/svebHG7qEXc?si=SCrOpBJAtMY_Pg6X\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'asdasdasdasasd123123123', 'easy'),
(7, 'Chocolate factory - KUNG IKAY AKIN', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Akdr8klkgl4?si=a7ne6nx-hGEm9r7G\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'sdasdasdasdasdasdasdasd', 'easy');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choices` varchar(255) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `choices`, `answer`) VALUES
(9, 'asdasd', 'asdasdasd', 'asdasd'),
(10, 'asadas', 'dasdasdasd', 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `token` varchar(255) NOT NULL,
  `id` int(12) NOT NULL,
  `badges` varchar(255) NOT NULL,
  `userprofile` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `points` int(255) NOT NULL,
  `achievements` varchar(255) DEFAULT NULL,
  `dateregistration` date DEFAULT NULL,
  `flagptindicator` tinyint(1) DEFAULT NULL,
  `usercategory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`token`, `id`, `badges`, `userprofile`, `useremail`, `gender`, `fname`, `lname`, `username`, `userpassword`, `points`, `achievements`, `dateregistration`, `flagptindicator`, `usercategory`) VALUES
('', 1, '', NULL, 'dmsad@gmail.com', NULL, '', '', 'okay\r\n', 'ssample', 12, '', NULL, 1, 'user'),
('9409b587374c6fc6309487cef95c645c', 2, '', NULL, 'try@gmail.com', NULL, '', '', 'okayokay', 'charlie123123', 7, NULL, NULL, NULL, 'user'),
('', 3, '', NULL, 'okkaayo@gmail.com', NULL, '', '', 'omaewamou', 'asidasdadsadasd', 4, NULL, NULL, NULL, 'user'),
('a355bacc1243940985adc7e429957a38', 4, 'beta-tester-badge,verified-badge', 'user=4.jpg', 'clarito@gmail.com', NULL, 'nick', 'clarito', 'clarito123', 'clarito@123', 13, NULL, NULL, NULL, 'admin'),
('', 15, '', NULL, 'asd2@gmail.com', NULL, '', '', '', 'jefeljoe@', 0, NULL, '2023-11-20', 1, 'user'),
('', 16, '', NULL, 'asd@yahoo.com', NULL, 'ff', 'as', '', 'asd@yahoo.com', 0, NULL, '2023-11-20', 1, 'user'),
('', 17, '', NULL, 'jefeljoevillacorta@gmail.com', NULL, 'Albert', 'Swift', '', 'hoho@12345', 0, NULL, '2023-11-24', 1, 'user'),
('93761e3d0e5083ca850428a39aa970d8', 18, '', NULL, 'lol@gmail.com', 'female', 'Taylor', 'Swift', '', 'lol@gmail.com', 0, NULL, '2023-11-24', 1, 'user'),
('', 19, '', NULL, 'janedoe@gmail.com', NULL, 'Jane', 'Doe', '', 'janedoe123@', 0, NULL, '2023-11-24', 1, 'user'),
('78d070de00f37d04a5ee035289237fc8', 20, '', 'user=20.jpeg', 'jameswayne@gmail.com', '', 'Mike', 'Swift', '', 'jameswayne@gmail.com', 0, NULL, '2023-11-24', 1, 'user'),
('', 21, '', NULL, 'jameswhite@gmail.com', '', 'James', 'White', '', 'arnoldswift@', 0, NULL, '2023-11-29', 1, 'user'),
('', 22, '', NULL, 'johnnybravo@gmail.com', 'lol', 'johnny', 'bravo', '', 'johnnybravo@', 0, NULL, '2023-11-29', 1, 'user'),
('', 23, '', NULL, 'johnnyuts@gmail.com', '', 'johnny', 'uts', '', 'johnnyuts@', 0, NULL, '2023-11-29', 1, 'user'),
('', 24, '', NULL, 'mariarosario@gmail.com', '', 'maria', 'rosario', '', 'mariarosario@', 0, NULL, '2023-11-29', 1, 'user'),
('', 25, '', NULL, 'yeyey@gmail.com', '', 'yeyey', 'yeyey', '', 'yeyey@123', 0, NULL, '2023-11-29', 1, 'user'),
('', 26, '', NULL, 'asdasd@gmail.com', '', 'asd', 'asd', '', 'asdasd@123', 0, NULL, '2023-11-29', 1, 'user'),
('', 27, '', NULL, 'okok@gmail.com', 'lol', 'ok', 'ok', '', 'asdasd@123', 0, NULL, '2023-11-29', 1, 'user'),
('', 28, '', NULL, 'soso@gmail.com', 'lol', 'soso', 'soso', '', 'soso@123', 0, NULL, '2023-11-29', 1, 'user'),
('', 29, '', NULL, 'asdasdasdasd@gmail.com', 'lol', 'asdasd', 'asdasd', '', 'asdasdasdasd@', 0, NULL, '2023-11-29', 1, 'user'),
('', 30, '', NULL, 'helloworld@gmail.com', 'male', 'hello', 'world', '', 'helloworld@', 0, NULL, '2023-11-29', 1, 'user'),
('e92f7db0b837a91ee5c2ecefb2036d22', 31, '', NULL, 'jefjoe@gmail.com', 'lol', 'Jefel', 'Joe', '', 'Jefeljoe@villacorta', 0, NULL, '2023-12-28', 1, 'user'),
('', 32, '', NULL, 'helloworld2@gmail.com', 'male', 'Hello2', 'World2', '', 'hello@world', 0, NULL, '2023-12-28', 1, 'user'),
('922a9ab5168cbe2135a425d841f4901d', 33, '', NULL, 'mikeytyson@gmail.com', NULL, 'mikey', 'tyson', '', 'mikey@tyson', 0, NULL, '2023-12-28', 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
