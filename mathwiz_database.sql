-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 08:22 AM
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
  `useremail` varchar(255) NOT NULL,
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

INSERT INTO `user` (`token`, `id`, `badges`, `useremail`, `fname`, `lname`, `username`, `userpassword`, `points`, `achievements`, `dateregistration`, `flagptindicator`) VALUES
('', 1, '', 'dmsad@gmail.com', '', '', 'okay\r\n', 'ssample', 12, '', NULL, 1),
('9409b587374c6fc6309487cef95c645c', 2, '', 'try@gmail.com', '', '', 'okayokay', 'charlie123123', 7, NULL, NULL, NULL),
('', 3, '', 'okkaayo@gmail.com', '', '', 'omaewamou', 'asidasdadsadasd', 4, NULL, NULL, NULL),
('0782c9bb4ac241ae113c2cccdbc3564d', 4, '', 'clarito@gmail.com', '', '', 'clarito123', 'clarito@123', 13, NULL, NULL, NULL),
('', 15, '', 'asd2@gmail.com', '', '', '', 'jefeljoe@', 0, NULL, '2023-11-20', 1),
('', 16, '', 'asd@yahoo.com', 'ff', 'as', '', 'asd@yahoo.com', 0, NULL, '2023-11-20', 1);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
