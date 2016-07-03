-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2016 at 01:59 PM
-- Server version: 10.1.14-MariaDB-1~trusty
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nutrifinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_info`
--

CREATE TABLE IF NOT EXISTS `child_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) NOT NULL,
  `sex` char(1) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `bmi` float NOT NULL,
  `muac` int(11) DEFAULT NULL,
  `district` int(11) NOT NULL,
  `nutrition_status` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `insert_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `district` (`district`),
  KEY `district_2` (`district`),
  KEY `district_3` (`district`),
  KEY `nutrition_status` (`nutrition_status`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `child_info`
--

INSERT INTO `child_info` (`id`, `age`, `sex`, `weight`, `height`, `bmi`, `muac`, `district`, `nutrition_status`, `uid`, `insert_date`) VALUES
(1, 2, 'F', 10, 75, 17.7778, 120, 1, 3, NULL, NULL),
(2, 4, 'M', 11, 75, 19.5556, 136, 1, 4, NULL, NULL),
(3, 5, 'M', 25, 100, 25, 136, 1, 4, NULL, NULL),
(4, 5, 'M', 25, 100, 25, 136, 1, 4, NULL, NULL),
(5, 2, 'M', 8, 75, 14.2222, 125, 2, 1, NULL, NULL),
(6, 6, 'F', 20, 120, 13.8889, 0, 16, 1, 1, '2016-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `child_nutrition`
--

CREATE TABLE IF NOT EXISTS `child_nutrition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nutrition_status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `child_nutrition`
--

INSERT INTO `child_nutrition` (`id`, `nutrition_status`) VALUES
(1, 'Severely Malnutritioned'),
(2, 'Mildly Malnutritioned'),
(3, 'Moderately Malnutritioned'),
(4, 'Well Nutritioned'),
(5, 'Over Weight');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Achham'),
(2, 'Arghakhanchi'),
(3, 'Baglung'),
(4, 'Baitadi'),
(5, 'Bajhang'),
(6, 'Bajura'),
(7, 'Banke'),
(8, 'Bara'),
(9, 'Bardiya'),
(10, 'Bhaktapur'),
(11, 'Bhojpur'),
(12, 'Chitwan'),
(13, 'Dadeldhura'),
(14, 'Dailekh'),
(15, 'Dang'),
(16, 'Darchula'),
(17, 'Dhading'),
(18, 'Dhankuta'),
(19, 'Dhanusa'),
(20, 'Dholkha'),
(21, 'Dolpa'),
(22, 'Doti'),
(23, 'Gorkha'),
(24, 'Gulmi'),
(25, 'Humla'),
(26, 'Ilam'),
(27, 'Jajarkot'),
(28, 'Jhapa'),
(29, 'Jumla'),
(30, 'Kailali'),
(31, 'Kalikot'),
(32, 'Kanchanpur'),
(33, 'Kapilvastu'),
(34, 'Kaski'),
(35, 'Kathmandu'),
(36, 'Kavrepalanchok'),
(37, 'Khotang'),
(38, 'Lalitpur'),
(39, 'Lamjung'),
(40, 'Mahottari'),
(41, 'Makwanpur'),
(42, 'Manang'),
(43, 'Morang'),
(44, 'Mugu'),
(45, 'Mustang'),
(46, 'Myagdi'),
(47, 'Nawalparasi'),
(48, 'Nuwakot'),
(49, 'Okhaldhunga'),
(50, 'Palpa'),
(51, 'Panchthar'),
(52, 'Parbat'),
(53, 'Parsa'),
(54, 'Pyuthan'),
(55, 'Ramechhap'),
(56, 'Rasuwa'),
(57, 'Rautahat'),
(58, 'Rolpa'),
(59, 'Rukum'),
(60, 'Rupandehi'),
(61, 'Salyan'),
(62, 'Sankhuwasabha'),
(63, 'Saptari'),
(64, 'Sarlahi'),
(65, 'Sindhuli'),
(66, 'Sindhupalchok'),
(67, 'Siraha'),
(68, 'Solukhumbu'),
(69, 'Sunsari'),
(70, 'Surkhet'),
(71, 'Syangja'),
(72, 'Tanahu'),
(73, 'Taplejung'),
(74, 'Terhathum'),
(75, 'Udayapur');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_status`
--

CREATE TABLE IF NOT EXISTS `nutrition_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` int(11) NOT NULL,
  `severe_malnutrition` float NOT NULL,
  `mild_malnutrition` float NOT NULL,
  `moderate_malnutrition` float NOT NULL,
  `well_nourished` float NOT NULL,
  `over_weight` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `district_3` (`district`),
  KEY `district` (`district`),
  KEY `district_2` (`district`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nutrition_status`
--

INSERT INTO `nutrition_status` (`id`, `district`, `severe_malnutrition`, `mild_malnutrition`, `moderate_malnutrition`, `well_nourished`, `over_weight`) VALUES
(1, 1, 0, 0, 1, 3, 0),
(2, 2, 1, 0, 0, 0, 0),
(3, 16, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` int(11) NOT NULL,
  `malnutrition_percent` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `district_4` (`district`),
  KEY `district` (`district`),
  KEY `district_2` (`district`),
  KEY `district_3` (`district`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id`, `district`, `malnutrition_percent`) VALUES
(1, 1, 25),
(2, 2, 100),
(3, 16, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `password` varchar(512) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fname`, `lname`) VALUES
(1, 'firojghimire@gmail.com', 'c190235d9baebf0963d9e0e0dbe4c02bf488f519cab2a1e9943a27c013d1adbe', 'Firoj', 'Ghimire');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_info`
--
ALTER TABLE `child_info`
  ADD CONSTRAINT `child_info_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `child_info_ibfk_2` FOREIGN KEY (`nutrition_status`) REFERENCES `child_nutrition` (`id`),
  ADD CONSTRAINT `child_info_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `nutrition_status`
--
ALTER TABLE `nutrition_status`
  ADD CONSTRAINT `nutrition_status_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`id`);

--
-- Constraints for table `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
