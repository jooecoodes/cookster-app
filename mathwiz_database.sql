-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 09:01 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mathwiz_database`
--

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
  `flagptindicator` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`token`, `id`, `badges`, `userprofile`, `useremail`, `gender`, `fname`, `lname`, `username`, `userpassword`, `points`, `achievements`, `dateregistration`, `flagptindicator`) VALUES
('', 1, '', NULL, 'dmsad@gmail.com', NULL, '', '', 'okay\r\n', 'ssample', 12, '', NULL, 1),
('9409b587374c6fc6309487cef95c645c', 2, '', NULL, 'try@gmail.com', NULL, '', '', 'okayokay', 'charlie123123', 7, NULL, NULL, NULL),
('', 3, '', NULL, 'okkaayo@gmail.com', NULL, '', '', 'omaewamou', 'asidasdadsadasd', 4, NULL, NULL, NULL),
('30ca26b51f6c6d1ec5ec26f0b06471f6', 4, 'beta-tester-badge,verified-badge', 'user=4.jpg', 'clarito@gmail.com', NULL, '', '', 'clarito123', 'clarito@123', 13, NULL, NULL, NULL),
('', 15, '', NULL, 'asd2@gmail.com', NULL, '', '', '', 'jefeljoe@', 0, NULL, '2023-11-20', 1),
('', 16, '', NULL, 'asd@yahoo.com', NULL, 'ff', 'as', '', 'asd@yahoo.com', 0, NULL, '2023-11-20', 1),
('', 17, '', NULL, 'jefeljoevillacorta@gmail.com', NULL, 'Albert', 'Swift', '', 'hoho@12345', 0, NULL, '2023-11-24', 1),
('', 18, '', NULL, 'lol@gmail.com', NULL, 'Arnold', 'Swift', '', 'lol@gmail.com', 0, NULL, '2023-11-24', 1),
('', 19, '', NULL, 'janedoe@gmail.com', NULL, 'Jane', 'Doe', '', 'janedoe123@', 0, NULL, '2023-11-24', 1),
('2aeb1eae0fc751c4dd42ad50de78a0d2', 20, '', 'user=20.jpg', 'jameswayne@gmail.com', '', 'James', 'Wayne', '', 'jameswayne@gmail.com', 0, NULL, '2023-11-24', 1),
('', 21, '', NULL, 'jameswhite@gmail.com', '', 'James', 'White', '', 'arnoldswift@', 0, NULL, '2023-11-29', 1),
('', 22, '', NULL, 'johnnybravo@gmail.com', 'lol', 'johnny', 'bravo', '', 'johnnybravo@', 0, NULL, '2023-11-29', 1),
('', 23, '', NULL, 'johnnyuts@gmail.com', '', 'johnny', 'uts', '', 'johnnyuts@', 0, NULL, '2023-11-29', 1),
('', 24, '', NULL, 'mariarosario@gmail.com', '', 'maria', 'rosario', '', 'mariarosario@', 0, NULL, '2023-11-29', 1),
('', 25, '', NULL, 'yeyey@gmail.com', '', 'yeyey', 'yeyey', '', 'yeyey@123', 0, NULL, '2023-11-29', 1),
('', 26, '', NULL, 'asdasd@gmail.com', '', 'asd', 'asd', '', 'asdasd@123', 0, NULL, '2023-11-29', 1),
('', 27, '', NULL, 'okok@gmail.com', 'lol', 'ok', 'ok', '', 'asdasd@123', 0, NULL, '2023-11-29', 1),
('', 28, '', NULL, 'soso@gmail.com', 'lol', 'soso', 'soso', '', 'soso@123', 0, NULL, '2023-11-29', 1),
('', 29, '', NULL, 'asdasdasdasd@gmail.com', 'lol', 'asdasd', 'asdasd', '', 'asdasdasdasd@', 0, NULL, '2023-11-29', 1),
('', 30, '', NULL, 'helloworld@gmail.com', 'male', 'hello', 'world', '', 'helloworld@', 0, NULL, '2023-11-29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
