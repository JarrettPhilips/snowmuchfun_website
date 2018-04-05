-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb18.awardspace.net
-- Generation Time: Apr 05, 2018 at 10:22 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2685963_snowmuchfun`
--

-- --------------------------------------------------------

--
-- Table structure for table `Locations`
--

CREATE TABLE `Locations` (
  `LocationName` varchar(16) NOT NULL,
  `Hiking` int(11) NOT NULL,
  `Biking` int(11) NOT NULL,
  `Skiing` int(11) NOT NULL,
  `Climbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Locations`
--

INSERT INTO `Locations` (`LocationName`, `Hiking`, `Biking`, `Skiing`, `Climbing`) VALUES
('Arapahoe Basin', 0, 0, 0, 0),
('Boulder', 0, 0, 0, 0),
('Breckenridge', 0, 0, 0, 0),
('Greeley', 0, 0, 0, 0),
('Shelf Road', 0, 0, 0, 0),
('Telluride', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Submissions`
--

CREATE TABLE `Submissions` (
  `LocationName` varchar(16) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Comment` varchar(280) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Submissions`
--

INSERT INTO `Submissions` (`LocationName`, `Username`, `Comment`, `Date`) VALUES
('Arapahoe Basin', 'Jarrett', 'Place is sendy. No snow, bring the rock skis.', '2018-04-01'),
('Boulder', 'Sijan', 'Fun Hike', '2018-04-04'),
('Breckenridge', 'Sijan', 'Ski Fun', '2018-03-18'),
('Greeley', 'Jarrett', '2/10, smells here', '2018-04-05'),
('Telluride', 'Jarrett', 'Pretty cool I guess, I mean, if you like mountains and stuff', '2017-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Username` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Location` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Username`, `Password`, `Location`) VALUES
('Colin', 'password', 'Boulder'),
('Hunter', 'password', 'Boulder'),
('Jarrett', 'password', 'Boulder'),
('Matthew', 'password', 'Boulder'),
('Robert', 'password', 'Boulder'),
('Sijan', 'password', 'Boulder');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Locations`
--
ALTER TABLE `Locations`
  ADD PRIMARY KEY (`LocationName`),
  ADD UNIQUE KEY `LocationName` (`LocationName`);

--
-- Indexes for table `Submissions`
--
ALTER TABLE `Submissions`
  ADD PRIMARY KEY (`LocationName`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Submissions`
--
ALTER TABLE `Submissions`
  ADD CONSTRAINT `Submissions_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Users` (`Username`),
  ADD CONSTRAINT `Submissions_ibfk_2` FOREIGN KEY (`LocationName`) REFERENCES `Locations` (`LocationName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
