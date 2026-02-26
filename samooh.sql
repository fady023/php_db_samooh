-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2026 at 10:45 PM
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
-- Database: `samooh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'fed', 'fady.msoliman3@gmail.com', '$2y$10$EW5fDb9XtZkiH18cCV4jR.49ktFUDoKmjI5nWwuXjlvHraHZHbd4u');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `c_name`, `description`) VALUES
(1, 'PHP', 'Web'),
(2, 'Python', 'Data Analysis'),
(3, 'flutter', 'mobile dev'),
(6, 'java', 'web'),
(7, 'c_sharp', 'MICROSOFT'),
(8, 'c_sharp', 'MICROSOFT');

-- --------------------------------------------------------

--
-- Table structure for table `courses_images`
--

CREATE TABLE `courses_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'https://placehold.co/400',
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses_images`
--

INSERT INTO `courses_images` (`id`, `image`, `course_id`, `created_at`, `updated_at`) VALUES
(3, 'uploads/courses/ger.jpeg', 6, '2026-02-25 22:42:38', '2026-02-25 22:42:38'),
(4, 'uploads/courses/pex (2).jpg', 6, '2026-02-25 22:42:38', '2026-02-25 22:42:38'),
(5, 'uploads/courses/pro1.jpeg', 7, '2026-02-25 22:49:58', '2026-02-25 22:49:58'),
(6, 'uploads/courses/pro2.jpg', 7, '2026-02-25 22:49:58', '2026-02-25 22:49:58'),
(7, 'uploads/courses/pro1.jpeg', 8, '2026-02-25 23:11:15', '2026-02-25 23:11:15'),
(8, 'uploads/courses/pro2.jpg', 8, '2026-02-25 23:11:15', '2026-02-25 23:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'https://placehold.co/400'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `course_id`, `image`) VALUES
(5, 'fedz', 'fady.msoliman3@gmail.com', 1, 'https://placehold.co/400'),
(6, 'sheddd', 'shedxxx@gmail.com', 2, 'https://placehold.co/400'),
(7, 'ddd', 'ddd@gmail.com', 3, 'https://placehold.co/400'),
(8, 'durrah', 'durrah@gmail.com', 1, 'https://placehold.co/400'),
(9, 'pepsi', 'pepsi@gmail.com', 1, 'https://placehold.co/400'),
(10, 'xx', 'xx2@gmail.com', 1, 'https://placehold.co/400'),
(11, 'cc', 'cc@gmail.com', 1, 'https://placehold.co/400'),
(12, 'last', 'last@gmail.com', 3, 'https://placehold.co/400'),
(13, 'last2', 'last2@gmail.com', 3, 'https://placehold.co/400'),
(15, '', '', 1, 'https://placehold.co/400'),
(16, 'xx', 'xxx@gmail.com', 2, 'https://placehold.co/400'),
(17, 'fedz', 'fady33.msoliman3@gmail.com', 2, 'uploads/ger.jpeg'),
(18, 'up', 'up@gmail.com', 3, 'uploads/pro1.jpeg'),
(19, 'add', 'add@gmail.com', 1, 'uploads/pex (2).jpg'),
(20, 'xx', 'xx244@gmail.com', 1, 'image'),
(21, 'rerer', 'rerer@gmail.com', 1, 'https://placehold.co/400'),
(22, 'kkk', 'kkk@gmail.com', 1, 'https://placehold.co/400');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_images`
--
ALTER TABLE `courses_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses_images`
--
ALTER TABLE `courses_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses_images`
--
ALTER TABLE `courses_images`
  ADD CONSTRAINT `courses_images_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
