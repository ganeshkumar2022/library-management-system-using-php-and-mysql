-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 09:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin_ganesh', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `create_time`, `update_time`) VALUES
(1, 'Riya kumari', '14-05-2023 06:45:26pm Sunday', '14-05-2023 07:05:47pm Sunday'),
(2, 'nishitha ganesh', '14-05-2023 06:59:25pm Sunday', '14-05-2023 06:59:25pm Sunday'),
(3, 'ramya s', '14-05-2023 06:59:40pm Sunday', '14-05-2023 07:04:35pm Sunday'),
(6, 'scarlett', '14-05-2023 06:59:54pm Sunday', '14-05-2023 06:59:54pm Sunday'),
(7, 'michael johanson', '14-05-2023 07:00:01pm Sunday', '14-05-2023 07:00:01pm Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `author_id` varchar(30) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `myimage` varchar(30) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `category_id`, `author_id`, `isbn`, `price`, `myimage`, `create_time`, `update_time`) VALUES
(6, 'cyber security', '19', '1', '9868676', '970', 'uploads/hacking.jfif', '23-05-2023 12:39:25am Tuesday', '23-05-2023 12:39:25am Tuesday'),
(7, 'Learn English', '20', '3', '751231', '30', 'uploads/cartoon.jfif', '23-05-2023 12:41:52am Tuesday', '26-05-2023 02:08:01am Friday'),
(8, 'java', '17', '7', '223424', '350', 'uploads/java.jfif', '23-05-2023 12:50:29am Tuesday', '23-05-2023 12:50:29am Tuesday'),
(9, 'Love hypothesis', '5', '2', '7896534', '200', 'uploads/love.jfif', '30-05-2023 01:42:43pm Tuesday', '30-05-2023 01:42:43pm Tuesday'),
(10, 'Black hat python', '6', '7', '8757645', '300', 'uploads/black hat python.jfif', '30-05-2023 01:52:45pm Tuesday', '30-05-2023 01:52:45pm Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `create_time`, `update_time`) VALUES
(5, 'Romantics', 'active', '12-05-2023 12:24:17pm Friday', '14-05-2023 06:37:41pm Sunday'),
(6, 'Technology', 'active', '12-05-2023 12:24:28pm Friday', '12-05-2023 12:24:28pm Friday'),
(7, 'Science', 'inactive', '12-05-2023 12:24:35pm Friday', '14-05-2023 06:37:34pm Sunday'),
(16, 'Engineering', 'active', '14-05-2023 06:37:58pm Sunday', '14-05-2023 06:37:58pm Sunday'),
(17, 'Computer science', 'active', '15-05-2023 12:22:07pm Monday', '15-05-2023 12:22:07pm Monday'),
(18, 'Robotics', 'active', '15-05-2023 12:22:18pm Monday', '15-05-2023 12:22:18pm Monday'),
(19, 'Hacking', 'inactive', '15-05-2023 12:22:29pm Monday', '15-05-2023 12:22:29pm Monday'),
(20, 'children', 'active', '23-05-2023 12:40:43am Tuesday', '23-05-2023 12:40:43am Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` varchar(30) NOT NULL,
  `returned_date` varchar(30) NOT NULL DEFAULT 'Not returned yet',
  `fine` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `user_id`, `book_id`, `issue_date`, `returned_date`, `fine`) VALUES
(1, 1001, 9, '01-06-2023 01:03:38am Thursday', 'Not returned yet', 0),
(2, 1000, 10, '01-06-2023 01:54:53pm Thursday', '02-06-2023 12:25:01pm Friday', 5),
(3, 1000, 7, '02-06-2023 01:04:42am Friday', 'Not returned yet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `email`, `password`, `reg_time`) VALUES
(1000, 'ganesh', '87532454646', 'ganesh@gmail.com', '123', '2023-06-01 08:25:58'),
(1001, 'ramya', '86765713313', 'ramya@gmail.com', 'ramyakutty008', '2023-05-25 21:35:25'),
(1002, 'madhu', '98658684231', 'madhu@gmail.com', '1234', '2023-05-28 08:41:43'),
(1003, 'priya', '8694726481', 'priya@gmail.com', '123', '2023-05-31 08:23:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
