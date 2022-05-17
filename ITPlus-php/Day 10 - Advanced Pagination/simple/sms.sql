-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 02:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `last_name`, `email`, `dob`) VALUES
(3, '170104005', 'nguyen', 'huu', 'cam', '2020-11-25'),
(4, '170104005', 'nguyen', 'huu', 'cam', '2020-11-25'),
(5, '192317231', 'Nguyen', 'Cam Huu', 'camnh@hanu.edu.vn', '2020-11-26'),
(6, '12831283', 'nguyen van', 'cong', 'congnv@hanu.edu.vn', '2020-11-28'),
(7, '0127312937', 'nguyen', 'xuan thang', 'thangnx@hanu.edu.vn', '2020-11-30'),
(8, '19231239', 'nguyen cam', 'huu cam', 'nguyenhuucam91@gmail.com', '2020-11-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
