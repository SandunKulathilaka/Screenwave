-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2023 at 12:16 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `screenwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingID` int NOT NULL,
  `selectedSeats` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `movieID` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `selectedSeats`, `totalPrice`, `movieID`, `date`, `time`, `user`) VALUES
(8091, 'A7,A5', '2000.00', 'movjus', '2020-06-30', '10.30', 'sandunlahiru160@gmail.com'),
(4830, 'A01, A02', '2000.00', 'movjus ', '2023-11-02', '10.30', 'sandunlahiru160@gmail.com'),
(1567, 'A04, A05, A06', '3000.00', 'Minus ', '2023-11-02', '01.30', 'sandunlahiru160@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `messageID` int NOT NULL AUTO_INCREMENT,
  `user` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `message` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`messageID`, `user`, `time`, `date`, `message`, `status`, `contact`) VALUES
(1, 'sandun@gmail.com', '10.30', '2023-11-02', 'Have a question, feedback, or just want to say hello? We\'d love to hear from you! Feel free to reach out to us using the contact details below or by filling out the form on this page. Our team is here to assist you and will get back to you as soon as possible.', 'Unread', '0772125084'),
(2, 'ritem@mailinator.com', '10.50', '2008-01-03', 'Have a question, feedback, or just want to say hello? We\'d love to hear from you! Feel free to reach out to us using the contact details below or by filling out the form on this page. Our team is here to assist you and will get back to you as soon as possible.', 'Unread', '0754298421'),
(3, 'vibinyvowu@mailinator.com', 'Ad animi modi sed i', '2003-04-19', 'Feel free to customize the text, add or remove contact methods, and adjust the address details to match your specific location. Remember to replace \"contact@example.com,\" the phone number, and the address with your actual contact information.', 'Unread', '0772554646'),
(4, 'mobyjex@mailinator.com', 'Dolor ad expedita bl', '1998-09-29', 'Feel free to customize the text, add or remove contact methods, and adjust the address details to match your specific location. Remember to replace \"contact@example.com,\" the phone number, and the address with your actual contact information.', 'Unread', '347874454'),
(5, 'rivycikyd@mailinator.com', 'Sunt et fugiat volu', '2000-03-30', 'Feel free to customize the text, add or remove contact methods, and adjust the address details to match your specific location. Remember to replace \"contact@example.com,\" the phone number, and the address with your actual contact information.', 'Unread', '78979465');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movieID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `movieName` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `median` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duration` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `releseDate` date DEFAULT NULL,
  `director` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `writer` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `movieChar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `realChar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `charImage` longblob,
  `movieImage` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rank` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `trailer` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `movieName`, `genre`, `median`, `duration`, `releseDate`, `director`, `writer`, `about`, `state`, `movieChar`, `realChar`, `charImage`, `movieImage`, `rank`, `price`, `trailer`) VALUES
('movjus', 'Justice League 2023', 'Action,Adventure,Fantacy', 'English', '120', '2023-10-12', 'Zack Snyder', 'Chris Terrio', 'Fuelled by his restored faith in humanity, and inspired by Superman\'s selfless act, Bruce Wayne enlists newfound ally Diana Prince to face an even greater threat. Together, Batman and Wonder Woman work quickly to recruit a team to stand against this newly-awakened enemy. Despite the formation of an unprecedented league of heroes in Batman, Wonder Woman, Aquaman, Cyborg and the Flash, it may be too late to save the planet from an assault of catastrophic proportions.', 'Now Showing', 'Batman,Wonder Woman,Aquaman,Superman', 'Ben Affleck,Gal Gadot,Jason Momoa,Henry Cavill', NULL, NULL, 'IMDB 6.1', 800, 'https://www.youtube.com/watch?v=u1FVEwodY84'),
('movblu', 'Blue Beetle', 'Action,Adventure,Fantacy', 'English', '130', '2023-10-16', ' Angel Manuel Soto', ' Gareth Dunnet-Alcocer', 'Blue Beetle is a 2023 American superhero film based on the DC character Jaime Reyes / Blue Beetle. Produced by DC Studios and The Safran Company, and distributed by Warner Bros. Pictures, it is the 14th installment of the DC Extended Universe. The film was directed by Ángel Manuel Soto and written by Gareth Dunnet-Alcocer, and stars Xolo Maridueña as Jaime Reyes / Blue Beetle alongside Adriana Barraza, Damián Alcázar, Raoul Max Trujillo, Susan Sarandon, and George Lopez.', 'Now Showing', 'kixxxx,dhjdhsh,fsdf,dvsv', 'Xolo Maridueña,Bruna Marquezine,Becky G,Damián Alcázar', '', '', '6.1', 1000, 'https://www.youtube.com/watch?v=u1FVEwodY84'),
('Minus', 'Bat Man 2023', 'Aperiam cumque qui a', 'English', 'Repudiandae consequu', '2023-10-28', 'Quo vero quia perfer', 'Maiores obcaecati om', 'Delectus quae neces sdh j gvf jg u ghvgwuvgiuwshgidhowqy eytyy  jhggds sdsafh b xuyifhkjhcsi kyiquy fuyqi yu', 'Now Showing', 'kixxxx,dhjdhsh,fsdf,dvsv', 'Ratione,incidunt,as,dhhj', '', '', 'IMDB 8.2', 1000, 'https://www.youtube.com/watch?v=u1FVEwodY84'),
('Ea sed sit', 'Nun II', 'Voluptatem velit dol', 'Quia earum nihil sit', 'At tempore maiores ', '2023-12-05', 'In minus ad ut conse', 'Est qui consequatur ', 'Quam quia velit volu', 'UpComming', 'Ipsa nostrum sint d', 'Cum aspernatur moles', '', '', 'Nobis ratione except', 1000, 'https://www.youtube.com/watch?v=u1FVEwodY84'),
('Voluptates', 'Spider Man 4', 'Dolorem aperiam ex c', 'Eos omnis eius ad es', 'Soluta et sit nisi ', '2024-08-01', 'Rerum asperiores rer', 'Vero qui aut invento', 'Quia esse et quos id', 'UpComming', 'Praesentium fugiat ', 'Sed sit quia quam i', '', '', 'Eius voluptate minim', 1000, 'https://www.youtube.com/watch?v=u1FVEwodY84'),
('Rerum numq', 'Ant Man 2023', 'Nulla ut et hic illu', 'Accusantium eum repu', 'Tempore repellendus', '2023-11-06', 'Sed non labore quas ', 'Velit facilis quas ', 'Odit fugiat modi inc', 'UpComming', 'Consequatur molesti', 'Nam vel est quibusda', '', '', 'Voluptates doloremqu', 650, 'https://www.youtube.com/watch?v=u1FVEwodY84'),
('Cillum', 'Fast and Furious', 'Aliquip consequatur ', 'Qui velit veniam te', 'Aliquip aut sit par', '2023-12-16', 'Facilis expedita ips', 'Vel nobis officia et', 'Exercitation ad eum ', 'UpComming', 'Eius earum dolore ve', 'Praesentium ipsum ne', '', '', 'Impedit cupidatat i', 1200, 'https://www.youtube.com/watch?v=u1FVEwodY84'),
('Ut impedi', 'Oppenheimer', 'Tempor labore non pl', 'Sint temporibus id r', 'Dolor officia iusto ', '2023-09-23', 'Laborum placeat in ', 'Irure esse ratione ', 'At maiores rerum con', 'Now Showing', 'Cupiditate velit es', 'Nobis facilis cillum', '', '', 'Ratione consectetur ', 800, 'https://www.youtube.com/watch?v=uYPbbksJxIg&pp=ygULb3BwZW5oZWltZXI%3D');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nic` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact` int DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `userType` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstName`, `lastName`, `nic`, `dob`, `address`, `city`, `contact`, `password`, `gender`, `userType`) VALUES
('sandunlahiru160@gmail.com', 'Sandun', 'Kulathilaka', '997117646V', '1999-06-25', '3A/51 National Housing Scheme', 'Kiribathgoda', 772152084, 'e10adc3949ba59abbe56e057f20f883e', 'male', 'admin'),
('himashi@gmail.com', 'Himashi', 'Fernando', '998756421V', '1999-02-23', '3A/51 National Housing Scheme', 'Kiribathgoda', 756724983, 'bef752632f676d3f9dc3824e943e8829', 'female', 'user'),
('tenipibu@mailinator.com', 'Quamar', 'Mcfadden', 'Provident tempore ', '1974-09-27', 'Officia id nobis asp', 'Voluptatum nemo cill', 58, 'b59c67bf196a4758191e42f76670ceba', 'male', 'user'),
('nipuwut@mailinator.com', 'Alexa', 'Patton', 'Quibusdam et ea nobi', '1982-08-22', 'Eius quo voluptate o', 'Modi corporis nisi q', 62, 'e10adc3949ba59abbe56e057f20f883e', 'male', 'user'),
('joxuvepe@mailinator.com', 'Hiroko', 'Roth', 'Et saepe doloribus q', '2015-04-13', 'Minima ut deserunt e', 'Minima duis architec', 35, 'e10adc3949ba59abbe56e057f20f883e', 'male', 'user'),
('vukonexez@mailinator.com', 'Shelly', 'Delacruz', 'Voluptatum saepe mol', '1984-09-24', 'Incididunt iste pari', 'Facere tempor volupt', 9, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'male', 'user'),
('setuhagygo@mailinator.com', 'Adam', 'Gonzales', 'Ad aliquip assumenda', '2016-07-02', 'Itaque sed ipsum qu', 'Reprehenderit eu ve', 75483214, '14e1b600b1fd579f47433b88e8d85291', 'male', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
