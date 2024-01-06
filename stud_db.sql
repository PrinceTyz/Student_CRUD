-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 03:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stud_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `middle_initial` varchar(10) NOT NULL,
  `year_section` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `address_loc` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `surname`, `given_name`, `middle_initial`, `year_section`, `course`, `address_loc`, `contact`, `age`, `photo`) VALUES
(7, 'Purisima', 'Diana Jean', 'P', '3B', 'BSIT', 'salangan, san miguel, bulacan', 2147483647, 21, '1697977211.png'),
(8, 'cruz', 'mark', 'A', '3B', 'BSIT                                          ', 'salangan san miguel bulacan                ', 93232321, 22, '1698147392.jpg'),
(9, 'dela cruz', 'juan', 'S', '2B', 'BSABEN', 'salangan, san miguel, bulacan', 2147483647, 20, '1698065651.png'),
(10, 'Leonardo', 'Miguel', 'V', '3B', 'BSIT', 'salangan, san miguel, bulacan', 987654321, 20, '1698065841.png'),
(11, 'Mekus', 'Insan', 'Y', '1B', 'BSGE', 'San ildefonso bulacan', 97717723, 31, '1698066149.jpg'),
(12, 'Rivera', 'Park jihyo', 'H', '1A', 'BSFT', 'San rafael bulacan', 987875434, 21, '1698066290.png'),
(13, 'Viola', 'John Louie', 'V', '3C', 'BSIT                                                                        ', 'salangan san miguel bulacan', 984342343, 21, '1698113463.jpg'),
(14, 'Nayeon', 'Angel', 'L', '3C', 'BSABEN', 'San ildefonso bulacan', 93544332, 24, '1698066653.jpg'),
(15, 'Labao', 'Justine', 'M', '3A', 'BSFT', 'salangan, san miguel, bulacan', 932343454, 24, '1698066751.jpg'),
(16, 'Bonifacio', 'John paul', 'S', '4A', 'BSFT', 'San rafael bulacan', 944545323, 26, '1698066855.png'),
(17, 'labao', 'Prince', 'Z.', '3B', 'BSIT', 'salangan, san miguel, bulacan', 2147483647, 21, '1698149061.png'),
(18, 'Angeles', 'Louisa', 'M.', '3A', 'BSFT', 'salangan, san miguel, bulacan', 2147483647, 23, '1698241475.png'),
(19, 'bachiller', 'Yuri', 'C', 'BSGE', 'BSGE', 'salangan, san miguel, bulacan', 2147483647, 20, '1698290765.jpg'),
(26, 'prince', 'louie', 'asdasd', 'bsit', 'BSIT', 'salangan', 932321321, 31, '1701355114.jpg'),
(27, 'prince', 'sdasdas', 'dasd', 'bsit', 'BSIT', 'salangan', 323213213, 32, '1701355213.jpeg'),
(28, 'prince', 'dasdas', 'asdasd', 'bsit', 'BSIT', 'salangan', 932321321, 31, '1701357502.jpg'),
(29, 'prince', 'dasdas', 'asdasd', 'asasd', 'BSIT', 'sadasdsa', 23123, 33, '1701357816.jpg'),
(30, 'asdasdas', 'louie', 'dasd', 'bsit', 'BSIT', 'salangan', 23123, 21, '1701358021.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`id`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
