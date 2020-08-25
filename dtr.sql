-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 05:06 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtr`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `child_no` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `age` int(3) NOT NULL,
  `sid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`child_no`, `name`, `age`, `sid`) VALUES
(8, 'Janeka', 18, '20130974'),
(10, 'Japthet', 13, '20154567'),
(12, 'Jason Jr.', 6, '20130974');

-- --------------------------------------------------------

--
-- Table structure for table `dept_info`
--

CREATE TABLE `dept_info` (
  `dept_no` int(99) NOT NULL,
  `dept_name` text NOT NULL,
  `dept_budget` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_info`
--

INSERT INTO `dept_info` (`dept_no`, `dept_name`, `dept_budget`) VALUES
(1, 'Finance', 30000),
(2, 'Information Technology', 30000),
(3, 'Marketing', 30000),
(6, 'Human Resource', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `sid` varchar(10) NOT NULL,
  `name` text,
  `salary` int(20) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `dept_no` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`sid`, `name`, `salary`, `phone`, `dept_no`) VALUES
('123456789', 'Kathleen', 15000, 2147483647, 6),
('201101454', 'Jeon Jungkook', 35000, 920202020, 2),
('20130974', 'Jason', 18000, 2147483647, 1),
('2013097443', 'Jerry Terry', 35000, 0, 2),
('20130987', 'Lovely ', 18000, 2147483647, 3),
('20154567', 'Marlon', 20000, 2147483647, 2),
('201545674', 'Charity', 18000, 0, 6),
('357896412', 'Jimin Ki', 35000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_log`
--

CREATE TABLE `time_log` (
  `log_no` int(11) NOT NULL,
  `sid` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_log`
--

INSERT INTO `time_log` (`log_no`, `sid`, `timestamp`) VALUES
(1, '20130974', '2020-08-25 07:47:25'),
(2, '20130974', '2020-08-25 07:47:48'),
(3, '0123456789', '2020-08-25 07:49:22'),
(4, '20130987', '2020-08-25 08:19:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_no`),
  ADD UNIQUE KEY `child_no` (`child_no`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `dept_info`
--
ALTER TABLE `dept_info`
  ADD PRIMARY KEY (`dept_no`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `dept_no` (`dept_no`);

--
-- Indexes for table `time_log`
--
ALTER TABLE `time_log`
  ADD PRIMARY KEY (`log_no`),
  ADD KEY `sid` (`sid`),
  ADD KEY `sid_2` (`sid`),
  ADD KEY `sid_3` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `child_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dept_info`
--
ALTER TABLE `dept_info`
  MODIFY `dept_no` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `time_log`
--
ALTER TABLE `time_log`
  MODIFY `log_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `employees` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`dept_no`) REFERENCES `dept_info` (`dept_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
