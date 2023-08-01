-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 04:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `quote` varchar(125) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `title`, `author`, `content`, `quote`, `image`, `dateTime`) VALUES
(1, '', '', '', '', '', '2023-07-30 07:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `dateTime`) VALUES
(1, '', '2023-07-30 07:12:09'),
(2, 'Casual Shirts', '2023-07-30 12:54:16'),
(3, 'Formal Shirts', '2023-07-30 12:54:23'),
(4, 'T-Shirts', '2023-07-30 12:54:28'),
(5, 'Cotton Jeans', '2023-07-30 12:54:34'),
(6, 'Denim Jeans', '2023-07-30 12:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `b_id`, `name`, `email`, `phone`, `comment`, `dateTime`) VALUES
(1, 1, '', '', '', '', '2023-07-30 07:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `message`, `dateTime`) VALUES
(1, '', '', '', '2023-07-30 07:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `nearBy` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `code` varchar(25) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `phone`, `address`, `nearBy`, `city`, `state`, `code`, `dateTime`) VALUES
(1, '', '', '', '', '', '', '', '2023-07-30 07:12:58'),
(2, 'Shees', '03332577930', 'Area 5D, 81/10, Landhi No 06', '', 'Karachi', 'Karachi', '75120', '2023-07-30 12:56:47'),
(3, 'Syed Owais Noor', '03332577930', 'Area 5D, 81/10, Landhi No 06', 'Standard Biryani', 'Karachi', 'Sindh', '75120', '2023-07-30 13:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail`
--

CREATE TABLE `tbl_detail` (
  `id` int(11) NOT NULL,
  `authID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `nearBy` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `code` varchar(25) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail`
--

INSERT INTO `tbl_detail` (`id`, `authID`, `name`, `phone`, `address`, `nearBy`, `city`, `state`, `code`, `dateTime`) VALUES
(1, 1, '', '', '', '', '', '', '', '2023-07-30 07:10:51'),
(2, 2, 'Muzammil Siddiq', '03150271712', 'SHOP No U2-222, MILLINIUM MALL', 'Askari IV', 'Karachi', 'Sindh', '75260', '2023-07-30 11:42:31'),
(3, 3, 'Shees', '03332577930', 'Area 5D, 81/10, Landhi No 06', '', 'Karachi', 'Karachi', '75120', '2023-07-30 12:43:10'),
(4, 4, 'Syed Owais Noor', '03332577930', 'Area 5D, 81/10, Landhi No 06', 'Standard Biryani', 'Karachi', 'Sindh', '75120', '2023-07-30 13:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cus_id`, `item`, `amount`, `status`, `dateTime`) VALUES
(1, 1, 0, 0, '', '2023-06-30 07:13:16'),
(2, 2, 1, 180, 'complete', '2023-07-30 13:05:02'),
(3, 3, 1, 180, 'pending', '2023-07-30 13:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `o_id`, `p_id`, `qty`, `total`, `dateTime`) VALUES
(1, 1, 1, 0, 0, '2023-07-30 07:13:47'),
(2, 2, 2, 1, 180, '2023-07-30 12:56:47'),
(3, 3, 2, 1, 180, '2023-07-30 13:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `c_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `distributor` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `purchasePrice` int(11) NOT NULL,
  `salePrice` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `newArrival` varchar(10) NOT NULL,
  `hotSale` varchar(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `c_id`, `brand`, `distributor`, `description`, `image`, `purchasePrice`, `salePrice`, `stock`, `discount`, `rating`, `newArrival`, `hotSale`, `dateTime`) VALUES
(1, '', 1, '', '', '', '', 0, 0, 0, 0, 0, '', '', '2023-07-30 07:12:33'),
(2, 'ABC', 2, 'XYZ', '123', 'Good quality', 'p1.jpg', 150, 200, 3, 10, 3, 'Yes', 'Yes', '2023-07-30 13:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `role`, `dateTime`) VALUES
(1, '', '', '', '2023-07-30 07:09:44'),
(2, 'mtsgroup47@gmail.com', '$2y$10$Z/vrcC50jbYgN1Jr/Q0P3.3hPJCxvsGkOgn8/wFTRVTblUYqnoKk2', 'admin', '2023-07-30 12:44:13'),
(3, 'nabeel28051999@gmail.com', '$2y$10$0654FQmze9sXtmTqAprY0uSkO1qgCcNttYayv0FJRpFzeXiZ4nAAe', 'user', '2023-07-30 12:43:10'),
(4, 'owaisnoorsyef@gmail.com', '$2y$10$rEkyjRy8qJ2.DALUh.gMKuR1XYPg76Zw/dlyUnYn7W4vb.mlWWw2W', 'user', '2023-07-30 13:03:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_r` (`b_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_r` (`authID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_r` (`cus_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_r` (`o_id`),
  ADD KEY `product_r` (`p_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_r` (`c_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `blog_r` FOREIGN KEY (`b_id`) REFERENCES `tbl_blog` (`id`);

--
-- Constraints for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD CONSTRAINT `detail_r` FOREIGN KEY (`authID`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `customer_r` FOREIGN KEY (`cus_id`) REFERENCES `tbl_customer` (`id`);

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `order_r` FOREIGN KEY (`o_id`) REFERENCES `tbl_order` (`id`),
  ADD CONSTRAINT `product_r` FOREIGN KEY (`p_id`) REFERENCES `tbl_product` (`id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `category_r` FOREIGN KEY (`c_id`) REFERENCES `tbl_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
