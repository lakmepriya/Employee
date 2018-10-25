-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 08:43 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeig_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Emp_id` int(11) NOT NULL,
  `Emp_name` varchar(250) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `Phone_no` bigint(50) NOT NULL,
  `Dob` date NOT NULL,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Emp_id`, `Emp_name`, `Email_id`, `Phone_no`, `Dob`, `Created_at`, `Updated_at`) VALUES
(1, 'Satme', 'sat@gmail.com', 678865443, '2017-10-11', '2018-10-24 00:00:00', '0000-00-00 00:00:00'),
(4, 'mahasathish', 'lakme@gmail.com', 454354242, '2018-04-08', '2018-10-24 20:41:26', '0000-00-00 00:00:00'),
(5, 'mahalakshmi', 'mahapaulsamy17@gmail.com', 4454354355, '2014-06-09', '2018-10-25 20:05:35', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
