-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 03, 2023 at 05:35 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `user_name`, `admin_password`) VALUES
(1, 'admin', '$2y$10$D74Zy1qMkATvmGRoVeq7hed4ajWof2aqDGnEaD3yPHABA.p.e7f4u');

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

DROP TABLE IF EXISTS `employee_data`;
CREATE TABLE IF NOT EXISTS `employee_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `hired_date` date DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`id`, `employee_name`, `email`, `phone`, `hired_date`, `department`, `profile`) VALUES
(1, 'Jayesh Murthy', 'jayeshm@mail.com', '7894561230', '2012-04-05', 'IT', 'profile4.png'),
(2, 'Shiv Kumar', 'shivk@mail.com', '9578463210', '2021-01-15', 'Finance', 'profile1.png'),
(3, 'Riddhi Pawar', 'riddhip@mail.com', '9784565465', '2018-07-07', 'HR', 'profile2.png'),
(4, 'Ganesh Joshi', 'ganeshj@mail.com', '8945671237', '2017-09-01', 'RD', 'profile7.png'),
(5, 'Sonali Patra', 'sonalip@mail.com', '7894563127', '2023-02-02', 'IT', 'profile5.png'),
(6, 'Ramesh Nandan', 'rameshn@mail.com', '9217304865', '2016-03-01', 'HR', 'profile8.png'),
(7, 'Siddhi Vinayak', 'siddhiv@mail.com', '9567821036', '2017-09-20', 'Finance', 'profile5.png'),
(8, 'Kartik Dave', 'kartikd@mail.com', '8675831242', '2019-12-01', 'Finance', 'profile3.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
