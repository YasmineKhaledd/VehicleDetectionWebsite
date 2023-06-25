-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 05:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicledetection`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `user_id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NationalID` varchar(14) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `PlateNumber` varchar(10) NOT NULL,
  `HashedPassword` varchar(255) NOT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL,
  `Violation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`user_id`, `Email`, `NationalID`, `UserName`, `Password`, `PlateNumber`, `HashedPassword`, `ProfilePicture`, `Violation`) VALUES
(11, 'rawanehab124@gmail.com', '30107102100429', 'RowanEhab', '30107102100429', 'ERN77', '$2y$10$TtX3oEat7vlD22OTgTFZiepouagUBFwN6haJo4l5hhI3qYApXUNbq', 'uploads/64948b5b212a29.42436764.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trafficviolation`
--

CREATE TABLE `trafficviolation` (
  `PlateNumber` varchar(10) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `PlatNumber` varchar(10) NOT NULL,
  `Violation` text DEFAULT NULL,
  `ID` varchar(14) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`PlatNumber`, `Violation`, `ID`, `Price`) VALUES
('ABCD123', 'change in color from black to red', '30107102100429', 500);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `counter` int(11) NOT NULL,
  `vehicletype` varchar(40) NOT NULL,
  `location` varchar(50) NOT NULL,
  `video` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`counter`, `vehicletype`, `location`, `video`) VALUES
(23, 'Car', 'ElHaram St.', 0x76656869636c652d636f756e74696e672e6d7034),
(24, '', '', 0x74657374312e6d7034),
(25, '', '', 0x766964656f332e6d7034),
(26, 'yhthy', 'dokki', 0x4175746f6d617469632056656869636c6520446574656374696f6e5f322e6d7034);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`NationalID`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `PlateNumber` (`PlateNumber`);

--
-- Indexes for table `trafficviolation`
--
ALTER TABLE `trafficviolation`
  ADD KEY `PlateNumber` (`PlateNumber`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD UNIQUE KEY `PlatNumber` (`PlatNumber`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`counter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trafficviolation`
--
ALTER TABLE `trafficviolation`
  ADD CONSTRAINT `trafficviolation_ibfk_1` FOREIGN KEY (`PlateNumber`) REFERENCES `driver` (`PlateNumber`);
COMMIT;

ALTER TABLE video ADD COLUMN date_added DATE;
ALTER TABLE video ADD COLUMN time_added TIME;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
