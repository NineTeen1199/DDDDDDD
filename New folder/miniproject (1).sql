-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2025 at 06:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `phone`, `total`, `created_at`) VALUES
(7, 'นายทีน1199', '0987654321', 140.00, '2025-09-24 10:33:03'),
(8, 'นายทีน', '0986765611', 325.00, '2025-09-24 10:58:56'),
(9, 'aphiwat', '0808553732', 110.00, '2025-09-24 11:46:15'),
(10, 'นน', '0808553732', 50.00, '2025-09-24 11:50:21'),
(11, 'ีรน', '0808553732', 50.00, '2025-09-24 11:59:05'),
(12, 'สสส', '0808553732', 100.00, '2025-09-24 12:01:32'),
(13, 'ddd', '0808553732', 50.00, '2025-09-24 12:13:13'),
(14, 'ddd', '0808553732', 50.00, '2025-09-24 12:14:17'),
(15, 'sd', '0986765611', 50.00, '2025-09-24 12:16:56'),
(16, 'io', '0986765611', 50.00, '2025-09-24 12:17:10'),
(17, 'kml', '0986765611', 50.00, '2025-09-24 12:17:29'),
(18, 'ghtg', '0986765611', 100.00, '2025-09-24 12:19:28'),
(19, 'nkjh', '0986765611', 50.00, '2025-09-24 12:20:15'),
(20, 'kjkij', '0986765611', 50.00, '2025-09-24 12:21:03'),
(21, 'ko;', '0986765611', 300.00, '2025-09-24 12:22:14'),
(22, 'qwdsw', '0986765611', 375.00, '2025-09-24 12:34:46'),
(23, '', '', 145.00, '2025-09-24 12:44:47'),
(24, 'DD1122', '0819196096', 460.00, '2025-09-26 02:09:03'),
(25, 'ยายกออ1111', '0987456123', 640.00, '2025-09-26 02:27:09'),
(26, 'qwe', '0987456315', 180.00, '2025-09-26 02:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product`, `price`, `quantity`) VALUES
(40, 7, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(41, 7, 'มาการอง ชาไทย', 45.00, 1),
(42, 7, 'มาการอง สตอเบอร์รี่', 45.00, 1),
(43, 8, 'มาการอง ชาไทย', 45.00, 1),
(44, 8, 'มาการอง สตอเบอร์รี่', 45.00, 4),
(45, 8, 'มาการอง มิกซ์เบอร์รี่', 50.00, 2),
(46, 9, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(47, 9, 'โดนัท ช็อกโกแลต', 15.00, 1),
(48, 9, 'มาการอง ชาไทย', 45.00, 1),
(49, 10, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(50, 11, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(51, 12, 'มาการอง มิกซ์เบอร์รี่', 50.00, 2),
(52, 13, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(53, 14, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(54, 15, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(55, 16, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(56, 17, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(57, 18, 'มาการอง มิกซ์เบอร์รี่', 50.00, 2),
(58, 19, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(59, 20, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(60, 21, 'มาการอง มิกซ์เบอร์รี่', 50.00, 6),
(61, 22, 'มาการอง ชาไทย', 45.00, 1),
(62, 22, 'มาการอง สตอเบอร์รี่', 45.00, 1),
(63, 22, 'มาการอง ชาเขียวมัทฉะ', 60.00, 1),
(64, 22, 'มาการอง บลูเบอร์รี่', 50.00, 1),
(65, 22, 'โดนัท ช็อกโกแลต', 15.00, 1),
(66, 22, 'โดนัท มอคค่าโกโก้', 30.00, 1),
(67, 22, 'โดนัท สตอเบอร์รี่', 15.00, 1),
(68, 22, 'โดนัท ไอซิ่ง ', 15.00, 1),
(69, 22, 'ไอศกรีม มินต์', 50.00, 1),
(70, 22, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(71, 23, 'มาการอง มิกซ์เบอร์รี่', 50.00, 2),
(72, 23, 'มาการอง ชาไทย', 45.00, 1),
(73, 24, 'มาการอง ชาไทย', 45.00, 1),
(74, 24, 'โดนัท ไอซิ่ง ', 15.00, 1),
(75, 24, 'ไอศกรีม มินต์', 50.00, 4),
(76, 24, 'มาการอง บลูเบอร์รี่', 50.00, 4),
(77, 25, 'มาการอง มิกซ์เบอร์รี่', 50.00, 1),
(78, 25, 'มาการอง ชาไทย', 45.00, 1),
(79, 25, 'มาการอง สตอเบอร์รี่', 45.00, 1),
(80, 25, 'มาการอง ชาเขียวมัทฉะ', 60.00, 1),
(81, 25, 'มาการอง บลูเบอร์รี่', 50.00, 1),
(82, 25, 'โดนัท ช็อกโกแลต', 15.00, 1),
(83, 25, 'โดนัท มอคค่าโกโก้', 30.00, 1),
(84, 25, 'โดนัท สตอเบอร์รี่', 15.00, 1),
(85, 25, 'โดนัท ไอซิ่ง ', 15.00, 2),
(86, 25, 'ไอศกรีม มินต์', 50.00, 6),
(87, 26, 'มาการอง ชาไทย', 45.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(2, 'มาการอง ชาไทย', 45.00, 'picture/ชาไทย.png'),
(3, 'มาการอง สตอเบอร์รี่', 45.00, 'picture/สตอเบอรรี่.png'),
(4, 'มาการอง ชาเขียวมัทฉะ', 50.00, 'picture/ชาเขียว.png'),
(5, 'มาการอง บลูเบอร์รี่', 15.00, 'picture/บลูเบอรรี่.png'),
(6, 'โดนัทช็อกโกแลต', 30.00, 'picture/โดนัทช็อก.png'),
(8, 'โดนัท สตอเบอรี่', 15.00, 'picture/โดนัทสตอเบอรี่.png'),
(9, 'โดนัท ไอซิ่ง', 15.00, 'picture/โดนัมน้ำตาล.png'),
(10, 'ไอศกรีม มินต์', 100.00, 'picture/ไอกรีม.png');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin01', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'user01', 'e10adc3949ba59abbe56e057f20f883e', 2),
(4, 'TBZX1199', '$2y$10$iwhatHDFO3bDPkIl.DNVROqvniO76Z/TIvdJivx93zdsugC6QrA1e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
