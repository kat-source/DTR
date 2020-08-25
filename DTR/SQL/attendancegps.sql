-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 04:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendancegps`
--
CREATE DATABASE IF NOT EXISTS `attendancegps` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `attendancegps`;

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `GetAcronym` (`str` TEXT) RETURNS TEXT CHARSET utf8 READS SQL DATA
    SQL SECURITY INVOKER
BEGIN
    declare result text default '';
    set result = GetInitials( str, '[[:alnum:]]' );
    return result;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `GetInitials` (`str` TEXT, `expr` TEXT) RETURNS TEXT CHARSET utf8 READS SQL DATA
    SQL SECURITY INVOKER
BEGIN
    declare result text default '';
    declare buffer text default '';
    declare i int default 1;
    if(str is null) then
        return null;
    end if;
    set buffer = trim(str);
    while i <= length(buffer) do
        if substr(buffer, i, 1) regexp expr then
            set result = concat( result, substr( buffer, i, 1 ));
            set i = i + 1;
            while i <= length( buffer ) and substr(buffer, i, 1) regexp expr do
                set i = i + 1;
            end while;
            while i <= length( buffer ) and substr(buffer, i, 1) not regexp expr do
                set i = i + 1;
            end while;
        else
            set i = i + 1;
        end if;
    end while;
    return result;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event_attendance`
--

CREATE TABLE `event_attendance` (
  `EA_ID` int(10) NOT NULL,
  `Event_ID` int(12) NOT NULL,
  `Student_ID` varchar(9) NOT NULL,
  `P_Status` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_attendance`
--

INSERT INTO `event_attendance` (`EA_ID`, `Event_ID`, `Student_ID`, `P_Status`, `TimeStamp`, `Remarks`) VALUES
(4, 20, '20110141', 1, '2019-05-17 02:17:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `Event_ID` int(12) NOT NULL,
  `Event_Name` text NOT NULL,
  `Venue_ID` int(8) DEFAULT NULL,
  `TimeStart` time NOT NULL,
  `Event_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`Event_ID`, `Event_Name`, `Venue_ID`, `TimeStart`, `Event_Date`) VALUES
(20, 'Marcie\'s Birthday Bazaar', 1, '14:30:00', '2019-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `Officer_ID` int(12) NOT NULL,
  `Student_ID` varchar(9) NOT NULL,
  `Position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`Officer_ID`, `Student_ID`, `Position`) VALUES
(3, '20110141', '');

-- --------------------------------------------------------

--
-- Table structure for table `participantstatus`
--

CREATE TABLE `participantstatus` (
  `P_Status` int(2) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participantstatus`
--

INSERT INTO `participantstatus` (`P_Status`, `Status`) VALUES
(1, 'Present'),
(2, 'Absent'),
(3, 'Late');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Student_ID` varchar(9) NOT NULL,
  `Student_LName` varchar(30) NOT NULL,
  `Student_FName` varchar(30) NOT NULL,
  `Student_MName` varchar(30) NOT NULL,
  `Student_YearLevel` int(2) DEFAULT NULL,
  `MacAddress` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Student_ID`, `Student_LName`, `Student_FName`, `Student_MName`, `Student_YearLevel`, `MacAddress`) VALUES
('20110141', 'Millan', 'Kathleen Karlotte', 'Santiago', 4, '58A2B5B60E00'),
('20130001', 'Marcera', 'Marl Christian', 'Monzon', 2, 'c8:2C:F8:2C');

-- --------------------------------------------------------

--
-- Table structure for table `venue_info`
--

CREATE TABLE `venue_info` (
  `Venue_ID` int(8) NOT NULL,
  `GEOM` multipolygon NOT NULL,
  `Venue_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue_info`
--

INSERT INTO `venue_info` (`Venue_ID`, `GEOM`, `Venue_Name`) VALUES
(1, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0¡3UiH_@‹@qE@R¿◊RH_@eÈìÑÖE@¶à(H_@<v}7ÜE@¸¸>H_@}jÛqE@¡3UiH_@‹@qE@', 'CL2'),
(2, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0¯∑„H_@–Á}‘rG@ò≤SbH_@àÅ∑—sG@\0ï(ÇH_@SRû“˘F@óÉH_@\'7Õ)˘F@¯∑„H_@–Á}‘rG@', 'ITC'),
(3, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0¯SXH_@ÅI∞F@∞¸sπH_@ﬂVr…F@G±d@H_@”DO¢F@DÆ–KH_@˙ƒaâëF@¯SXH_@ÅI∞F@', 'Science Building');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_attendance`
--
ALTER TABLE `event_attendance`
  ADD PRIMARY KEY (`EA_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `P_Status` (`P_Status`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `Venue_ID` (`Venue_ID`),
  ADD KEY `Venue_ID_2` (`Venue_ID`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`Officer_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `participantstatus`
--
ALTER TABLE `participantstatus`
  ADD PRIMARY KEY (`P_Status`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `venue_info`
--
ALTER TABLE `venue_info`
  ADD PRIMARY KEY (`Venue_ID`),
  ADD KEY `Venue_ID` (`Venue_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_attendance`
--
ALTER TABLE `event_attendance`
  MODIFY `EA_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `Event_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `Officer_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participantstatus`
--
ALTER TABLE `participantstatus`
  MODIFY `P_Status` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue_info`
--
ALTER TABLE `venue_info`
  MODIFY `Venue_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_attendance`
--
ALTER TABLE `event_attendance`
  ADD CONSTRAINT `event_attendance_ibfk_1` FOREIGN KEY (`P_Status`) REFERENCES `participantstatus` (`P_Status`),
  ADD CONSTRAINT `event_attendance_ibfk_2` FOREIGN KEY (`Event_ID`) REFERENCES `event_info` (`Event_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `event_attendance_ibfk_3` FOREIGN KEY (`Student_ID`) REFERENCES `student_info` (`Student_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `event_info`
--
ALTER TABLE `event_info`
  ADD CONSTRAINT `event_info_ibfk_1` FOREIGN KEY (`Venue_ID`) REFERENCES `venue_info` (`Venue_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student_info` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
