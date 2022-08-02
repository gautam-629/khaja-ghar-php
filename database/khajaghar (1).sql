-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 07:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khajaghar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(240) DEFAULT NULL,
  `admin_email` varchar(240) DEFAULT NULL,
  `admin_pass` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Binod Gautam', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` varchar(240) DEFAULT NULL,
  `stu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(6, 'Best place to order food item', 7),
(7, 'I like khajaghar good keep it up', 8);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(240) DEFAULT NULL,
  `item_price` int(100) DEFAULT NULL,
  `item_duration` varchar(240) DEFAULT NULL,
  `item_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_duration`, `item_img`) VALUES
(4, 'samosa', 40, '10 days', '../image/item_img/samosa.jfif'),
(5, 'Momo', 110, '10 days', '../image/item_img/momo.webp'),
(6, 'Roti', 60, '10 days', '../image/item_img/roti.jfif'),
(7, 'Fry Rice', 70, '10 days', '../image/item_img/fryrice.jpg'),
(8, 'PaniPuri', 30, '10 days', '../image/item_img/panipuri.jfif'),
(9, 'Egg', 60, '10 days', '../image/item_img/Egg.jpg'),
(10, 'Chana', 60, '10 days', '../image/item_img/chana.jfif'),
(11, 'Chicken Momo', 120, '10 days', '../image/item_img/momo.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_id` int(11) NOT NULL,
  `stu_email` varchar(100) DEFAULT NULL,
  `pnumber` int(100) DEFAULT NULL,
  `pay_mode` varchar(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `order_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`order_id`, `stu_email`, `pnumber`, `pay_mode`, `amount`, `order_date`) VALUES
(7, 'elon@gmail.com', 2147483647, 'COD', 90, '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(240) DEFAULT NULL,
  `stu_email` varchar(240) DEFAULT NULL,
  `stu_pass` varchar(240) DEFAULT NULL,
  `stu_occ` varchar(240) DEFAULT NULL,
  `stu_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(7, 'Binod Gautam', 'gautambinod629@gmail.com', '$2y$10$AlrrQyPOpBtU4GSlwTBMDu6pB9RkptUbQKrlscQhBr96GaXHO5Fv2', '  student', '../image/stu_img/binod.jpg'),
(8, 'Elon Musk', 'elon@gmail.com', '$2y$10$odoOXiuigokXr4MWUOQxJeBxe67Ng9q9b6V2YMiyb2pQYV9liteUe', ' Twitter owner', '../image/stu_img/download.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `student_orders`
--

CREATE TABLE `student_orders` (
  `order_id` int(11) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_price` int(100) DEFAULT NULL,
  `Qunatity` int(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_orders`
--

INSERT INTO `student_orders` (`order_id`, `item_name`, `item_price`, `Qunatity`, `item_id`) VALUES
(7, 'PaniPuri', 30, 1, 8),
(7, 'Chana', 60, 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
