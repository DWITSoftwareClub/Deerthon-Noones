-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2016 at 03:29 अपराह्न
-- Server version: 10.1.11-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deerthon2`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_info`
--

CREATE TABLE `child_info` (
  `id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` char(1) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `bmi` float NOT NULL,
  `muac` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `nutrition_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child_nutrition`
--

CREATE TABLE `child_nutrition` (
  `id` int(11) NOT NULL,
  `nutrition_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `nutrition_status` (
  `id` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `severe_malnutrition` float NOT NULL,
  `mild_malnutrition` float NOT NULL,
  `moderate_malnutrition` float NOT NULL,
  `well_nourished` float NOT NULL,
  `over_weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `malnutrition_percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id`, `district`, `malnutrition_percent`) VALUES
(1, 1, 20),
(2, 2, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_info`
--
ALTER TABLE `child_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district` (`district`),
  ADD KEY `district_2` (`district`),
  ADD KEY `district_3` (`district`),
  ADD KEY `nutrition_status` (`nutrition_status`);

--
-- Indexes for table `child_nutrition`
--
ALTER TABLE `child_nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition_status`
--
ALTER TABLE `nutrition_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district` (`district`),
  ADD KEY `district_2` (`district`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district` (`district`),
  ADD KEY `district_2` (`district`),
  ADD KEY `district_3` (`district`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_info`
--
ALTER TABLE `child_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `child_nutrition`
--
ALTER TABLE `child_nutrition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `nutrition_status`
--
ALTER TABLE `nutrition_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_info`
--
ALTER TABLE `child_info`
  ADD CONSTRAINT `child_info_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `child_info_ibfk_2` FOREIGN KEY (`nutrition_status`) REFERENCES `child_nutrition` (`id`);

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
