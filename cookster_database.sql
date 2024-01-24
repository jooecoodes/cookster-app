-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 07:15 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `video`, `content`, `difficulty`) VALUES
(5, 'Abra ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/svebHG7qEXc?si=SCrOpBJAtMY_Pg6X\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'asdasdasdasasd123123123', 'easy'),
(7, 'Chocolate factory - KUNG IKAY AKIN', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Akdr8klkgl4?si=a7ne6nx-hGEm9r7G\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'sdasdasdasdasdasdasdasd', 'easy'),
(8, 'Chill Song', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rsPMqGR6Yz0?si=F017iPQEfvmcp3g4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'ASDasdasdajksdad hajhdalsdhas hasldhasldha aaks;djalks dhA laksdhasdha A Recie asdj a khA ojasdl as; jda ksjDada', 'normal'),
(9, 'wasdwa', 'asdawd', 'adadasdasd', 'easy'),
(10, '11111123231', ' a   aa  a', 'asdadaadaadadsadasd', 'easy'),
(11, '1616sgdsdg', 'asda', 'asasdasdadadadadadadadasd123123123', 'hard'),
(12, 'Yeah', 'Test', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque id mollitia possimus, excepturi temporibus ipsa? Hic vero nam voluptatem. Nostrum consequatur quae rem neque ducimus ratione, corrupti alias suscipit.@\r\n  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum nesciunt facilis, perferendis aspernatur dicta veniam quam magni reiciendis velit ad consectetur repellat possimus, iste sint ipsa dignissimos? Ut culpa architecto praesentium! Veritatis, expedita aut? Pariatur exercitationem quis eaque a obcaecati? Sapiente ut, ex minus repudiandae accusantium voluptatem ducimus inventore dolor!@\r\n\r\n  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum nesciunt facilis, perferendis aspernatur dicta veniam quam magni reiciendis velit ad consectetur repellat possimus, iste sint ipsa dignissimos? Ut culpa architecto praesentium! Veritatis, expedita aut? Pariatur exercitationem quis eaque a obcaecati? Sapiente ut, ex minus.@\r\n', 'easy'),
(13, 'Yaeh2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/oH0RSuOiato?si=meLLZXbzRIhv-GGn\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque id mollitia possimus, excepturi temporibus ipsa? Hic vero nam voluptatem. Nostrum consequatur quae rem neque ducimus ratione, corrupti alias suscipit.~`~`~ Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum nesciunt facilis, perferendis aspernatur dicta veniam quam magni reiciendis velit ad consectetur repellat possimus, iste sint ipsa dignissimos? Ut culpa architecto praesentium! Veritatis, expedita aut? Pariatur exercitationem quis eaque a obcaecati? Sapiente ut, ex minus repudiandae accusantium voluptatem ducimus inventore dolor! ~`~`~ Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum nesciunt facilis, perferendis aspernatur dicta veniam quam magni reiciendis velit ad consectetur repellat possimus, iste sint ipsa dignissimos? Ut culpa architecto praesentium! Veritatis, expedita aut? Pariatur exercitationem quis eaque a obcaecati? Sapiente ut, ex minus.~`~`~ perferendis aspernatur dicta veniam quam magni reiciendis velit ad consectetur repellat possimus, iste sint ipsa dignissimos? Ut culpa architecto praesentium! Veritatis, expedita aut? Pariatur exercitationem quis eaque a obcaecati? Sapiente ut, ex minus  ~`~`~ perferendis aspernatur dicta veniam quam magni reiciendis velit ad consectetur repellat possimus, iste sint ipsa dignissimos? Ut culpa architecto praesentium! Veritatis, expedita aut? Pariatur exercitationem quis eaque a obcaecati? Sapiente ut, ex minus ~`~`~', 'easy');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choices` varchar(255) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `choices`, `answer`) VALUES
(11, 'What sdjasd as das ', 'Dog, Mice, Mouse, Cat', 'Cat'),
(12, 'Test Who is the test test test ', 'wasdw, 2323, 425, 1111', '2323'),
(13, 'Test 1 test 2 test 3 4', '1222, 3232, 67616, 52525', '52525'),
(14, 'What is the best what wag tesat est wasd lorem ', 'lorem, jha, sdo, 223', '223');

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
  `usercategory` varchar(255) DEFAULT NULL,
  `quiz_indicator` int(1) NOT NULL,
  `last_update_qi` date DEFAULT NULL,
  `expected_update_qi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`token`, `id`, `badges`, `userprofile`, `useremail`, `gender`, `fname`, `lname`, `username`, `userpassword`, `points`, `achievements`, `dateregistration`, `flagptindicator`, `usercategory`, `quiz_indicator`, `last_update_qi`, `expected_update_qi`) VALUES
('', 1, '', NULL, 'dmsad@gmail.com', NULL, '', '', 'okay\r\n', 'ssample', 12, '', NULL, 1, 'user', 1, NULL, NULL),
('9409b587374c6fc6309487cef95c645c', 2, '', NULL, 'try@gmail.com', NULL, '', '', 'okayokay', 'charlie123123', 7, NULL, NULL, NULL, 'user', 1, NULL, NULL),
('', 3, '', NULL, 'okkaayo@gmail.com', NULL, '', '', 'omaewamou', 'asidasdadsadasd', 4, NULL, NULL, NULL, 'user', 1, NULL, NULL),
('217141b6b734171131f2753bfc75ca87', 4, 'beta-tester-badge,verified-badge', 'user=4.jpg', 'clarito@gmail.com', NULL, 'nick', 'clarito', 'clarito123', 'clarito@123', 648, NULL, NULL, NULL, 'admin', 1, NULL, NULL),
('', 15, '', NULL, 'asd2@gmail.com', NULL, '', '', '', 'jefeljoe@', 0, NULL, '2023-11-20', 1, 'user', 1, NULL, NULL),
('', 16, '', NULL, 'asd@yahoo.com', NULL, 'ff', 'as', '', 'asd@yahoo.com', 0, NULL, '2023-11-20', 1, 'user', 1, NULL, NULL),
('', 17, '', NULL, 'jefeljoevillacorta@gmail.com', NULL, 'Albert', 'Swift', '', 'hoho@12345', 0, NULL, '2023-11-24', 1, 'user', 1, NULL, NULL),
('40dc020475de7f064c2c5dc70e041a65', 18, 'beta-tester-badge,verified-badge,completion-badge', 'user=18.jpg', 'lol@gmail.com', 'female', 'Taylor', 'Swift', '', 'lol@gmail.com', 42785, NULL, '2023-11-24', 1, 'user', 0, '2024-01-24', '2024-01-31'),
('', 19, '', NULL, 'janedoe@gmail.com', NULL, 'Jane', 'Doe', '', 'janedoe123@', 0, NULL, '2023-11-24', 1, 'user', 1, NULL, NULL),
('78d070de00f37d04a5ee035289237fc8', 20, '', 'user=20.jpeg', 'jameswayne@gmail.com', '', 'Mike', 'Swift', '', 'jameswayne@gmail.com', 0, NULL, '2023-11-24', 1, 'user', 1, NULL, NULL),
('', 21, '', NULL, 'jameswhite@gmail.com', '', 'James', 'White', '', 'arnoldswift@', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 22, '', NULL, 'johnnybravo@gmail.com', 'lol', 'johnny', 'bravo', '', 'johnnybravo@', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 23, '', NULL, 'johnnyuts@gmail.com', '', 'johnny', 'uts', '', 'johnnyuts@', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 24, '', NULL, 'mariarosario@gmail.com', '', 'maria', 'rosario', '', 'mariarosario@', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 25, '', NULL, 'yeyey@gmail.com', '', 'yeyey', 'yeyey', '', 'yeyey@123', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 26, '', NULL, 'asdasd@gmail.com', '', 'asd', 'asd', '', 'asdasd@123', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 27, '', NULL, 'okok@gmail.com', 'lol', 'ok', 'ok', '', 'asdasd@123', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 28, '', NULL, 'soso@gmail.com', 'lol', 'soso', 'soso', '', 'soso@123', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 29, '', NULL, 'asdasdasdasd@gmail.com', 'lol', 'asdasd', 'asdasd', '', 'asdasdasdasd@', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('', 30, '', NULL, 'helloworld@gmail.com', 'male', 'hello', 'world', '', 'helloworld@', 0, NULL, '2023-11-29', 1, 'user', 1, NULL, NULL),
('e92f7db0b837a91ee5c2ecefb2036d22', 31, '', NULL, 'jefjoe@gmail.com', 'lol', 'Jefel', 'Joe', '', 'Jefeljoe@villacorta', 0, NULL, '2023-12-28', 1, 'user', 1, NULL, NULL),
('', 32, '', NULL, 'helloworld2@gmail.com', 'male', 'Hello2', 'World2', '', 'hello@world', 0, NULL, '2023-12-28', 1, 'user', 1, NULL, NULL),
('975af8d045a7cb721d244ddf55c03526', 34, '', 'user=34.jpg', 'eef@gmail.com', 'male', 'charlie', 'fsf', '', '12345678$', 0, NULL, '2024-01-08', 1, 'user', 1, NULL, NULL),
('', 35, '', NULL, 'jamesclarito@gmail.com', 'male', 'James', 'Clarito', '', 'james@123', 0, NULL, '2024-01-17', 1, 'user', 1, NULL, NULL),
('13111e005e0f08743e72e0a1c81a7723', 36, '', NULL, 'johnnysins@gmail.com', 'male', 'Johnny', 'Sins', '', 'johnnysins@123', 0, NULL, '2024-01-17', 1, 'user', 1, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
