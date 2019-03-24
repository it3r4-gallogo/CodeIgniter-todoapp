-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 03:22 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_t`
--

CREATE TABLE `todo_t` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_t`
--

INSERT INTO `todo_t` (`id`, `title`, `description`, `email`) VALUES
(1, 'DBMS 2', 'Database Management System 2', 'richelyn.gallogo@ustp.edu.ph'),
(2, 'MIS', 'Management Information System', 'richelyn.gallogo@ustp.edu.ph'),
(3, 'OOP 1', 'Object Oriented Programming 1', 'richegals4@yahoo.com'),
(4, 'Math36', 'Probability & Statistics', 'richegals4@yahoo.com'),
(5, 'DBMS 1', 'Database Management System 1', 'richegals4@yahoo.com'),
(6, 'ETM 30', 'Electromechanical Construction2', 'ugenereygallogo@yahoo.com'),
(7, 'CADD10b', 'Basic CADD', 'ugenereygallogo@yahoo.com'),
(8, 'ETM 31', 'Electrical Machines and Drive Elements', 'ugenereygallogo@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_t`
--

CREATE TABLE `users_t` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_t`
--

INSERT INTO `users_t` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'richelyn', 'gallogo', 'richegals4@yahoo.com', '$2y$10$LmzV9zdnrnZQadC4d4vuyuzqI.xELmxEKduTHDN3R1zFNN0ZTDbeO'),
(2, 'ugene rey', 'gallogo', 'ugenereygallogo@yahoo.com', '$2y$10$doi4acQUs1Mc.F0AQmBtred7H8FaDBwEizBgapc0YuEvz0KMr5nfq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_t`
--
ALTER TABLE `todo_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_t`
--
ALTER TABLE `users_t`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_t`
--
ALTER TABLE `todo_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users_t`
--
ALTER TABLE `users_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
