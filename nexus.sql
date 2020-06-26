-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 04:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexus`
--
CREATE DATABASE IF NOT EXISTS `nexus` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nexus`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`username`, `email`, `password`) VALUES
('admin', 'adminnexus@gmail.com', 'Admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `customer_username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `admin_username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `total_price` float NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_username`, `admin_username`, `total_price`, `date`, `address`, `status`) VALUES
(1, 'khoi', 'admin', 480, '2020-06-26', 'Binh Chanh, TP HCM', 1),
(2, 'khoa', 'admin', 520, '2020-06-26', 'Nha Be, TP HCM', 1),
(3, 'tri', 'admin', 1790, '2020-06-26', 'Quan 4, TP HCM', 1),
(4, 'huy', 'admin', 300, '2020-06-26', 'Quan 3, TP HCM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size` int(10) NOT NULL,
  `price` float NOT NULL,
  `amount` int(10) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `product_id`, `size`, `price`, `amount`, `total_price`) VALUES
(1, 5, 9, 120, 2, 240),
(1, 9, 7, 140, 1, 140),
(1, 12, 5, 100, 1, 100),
(2, 3, 6, 100, 2, 200),
(2, 3, 7, 100, 2, 200),
(2, 4, 5, 120, 1, 120),
(3, 1, 8, 130, 5, 650),
(3, 2, 7, 100, 4, 400),
(3, 3, 7, 100, 3, 300),
(3, 8, 8, 100, 3, 300),
(3, 9, 10, 140, 1, 140),
(4, 12, 8, 100, 3, 300);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Men'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE `customer_account` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`username`, `email`, `password`) VALUES
('duy', 'NPD@gmail.com', 'Duy123'),
('huy', 'BQH@gmail.com', 'Huy1234'),
('khoa', 'NDK@gmail.com', 'Khoa1234'),
('khoi', 'HMK@gmail.com', 'Khoi1234'),
('tri', 'HTVT@gmail.com', 'Tri1234'),
('william', 'afff@gmail.com', 'alter');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(10) NOT NULL,
  `customer_username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `total_price` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_username`, `email`, `fullname`, `date`, `total_price`, `address`, `phone`, `status`) VALUES
(1, 'khoi', 'HMK@gmail.com', 'Ha Minh Khoi', '2020-06-26', 480, 'Binh Chanh, TP HCM', 123456789, 2),
(2, 'khoa', 'NDK@gmail.com', 'Nguyen Dang Khoa', '2020-06-26', 520, 'Nha Be, TP HCM', 123456789, 2),
(3, 'khoa', 'NDK@gmail.com', 'Nguyen Dang Khoa', '2020-06-26', 260, 'Nha Be, TP HCM', 123456789, 3),
(4, 'huy', 'BQH@gmail.com', 'Bui Quang Huy', '2020-06-26', 1180, 'Quan 3, TP HCM', 77270767, 1),
(5, 'duy', 'NPD@gmail.com', 'Nguyen Phuoc Duy', '2020-06-26', 860, 'Quan 5, TP HCM', 98765321, 3),
(6, 'tri', 'HTVT@gmail.com', 'Hang Tran Vy Tri', '2020-06-26', 1790, 'Quan 4, TP HCM', 987654322, 2),
(7, 'huy', 'buiquanghuy.10122000.10@gmail.com', 'total_price', '2020-06-26', 300, 'Quan 3, TP HCM', 123456789, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `size`, `quantity`, `price`, `total_price`) VALUES
(1, 5, 9, 2, 120, 240),
(1, 9, 7, 1, 140, 140),
(1, 12, 5, 1, 100, 100),
(2, 3, 6, 2, 100, 200),
(2, 3, 7, 2, 100, 200),
(2, 4, 5, 1, 120, 120),
(3, 6, 5, 1, 130, 130),
(3, 6, 10, 1, 130, 130),
(4, 2, 6, 1, 100, 100),
(4, 5, 8, 3, 120, 360),
(4, 12, 7, 1, 100, 100),
(4, 14, 10, 2, 90, 180),
(4, 15, 9, 4, 110, 440),
(5, 8, 7, 3, 100, 300),
(5, 11, 9, 1, 100, 100),
(5, 13, 6, 3, 80, 240),
(5, 15, 7, 2, 110, 220),
(6, 1, 8, 5, 130, 650),
(6, 2, 7, 4, 100, 400),
(6, 3, 7, 3, 100, 300),
(6, 8, 8, 3, 100, 300),
(6, 9, 10, 1, 140, 140),
(7, 12, 8, 3, 100, 300);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `brand_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sale_price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `brand_id`, `cat_id`, `sale_price`, `quantity`, `description`) VALUES
(1, 'Adidas Ultra Boost 20', 'product/adidas/1.png', 1, 1, 130, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(2, 'Adidas Originals Superstar White', 'product/adidas/2.png', 1, 2, 100, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(3, 'Adidas Originals Superstar Black', 'product/adidas/3.png', 1, 1, 100, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(4, 'Jordan 1 Retro High Court Purple', 'product/jordan/1.png', 2, 1, 120, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(5, 'Jordan XXXI Black Red', 'product/jordan/2.png', 2, 1, 120, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(6, 'Nike Air Zoom Streak 7', 'product/nike/1.png', 3, 2, 130, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(7, 'Nike Zoom Fly Flyknit', 'product/nike/2.png', 3, 1, 100, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(8, 'Nike Air Max 90 Red', 'product/nike/3.png', 3, 2, 100, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(9, 'Nike Air Max 270', 'product/nike/4.png', 3, 1, 140, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(10, 'Nike Air Zoom Pegasus 33 Shield', 'product/nike/5.png', 3, 1, 130, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(11, 'Reebok Crossfit Nano 7', 'product/reebok/1.png', 4, 2, 100, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(12, 'Reebok Zig Kinetica Concept', 'product/reebok/2.png', 4, 1, 100, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(13, 'Reebok Aztrek 96', 'product/reebok/3.png', 4, 2, 80, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(14, 'Vans Flame Old Skool', 'product/vans/1.png', 5, 1, 90, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(15, 'Vans Authentic Lite Canvas Black White', 'product/vans/2.png', 5, 2, 110, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `product_sku` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_size_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`product_sku`, `product_id`, `product_size_id`) VALUES
(1, 3, 3),
(2, 5, 5),
(3, 6, 5),
(4, 11, 7),
(5, 15, 2),
(6, 14, 6),
(7, 11, 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `name`) VALUES
(1, 'Adidas'),
(2, 'Jordan'),
(3, 'Nike'),
(4, 'Reebok'),
(5, 'Vans');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(10) NOT NULL,
  `size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `size`) VALUES
(1, 4),
(2, 4.5),
(3, 5),
(4, 5.5),
(5, 6),
(6, 6.5),
(7, 7),
(8, 7.5),
(9, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `uc_admin_account2` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart1` (`customer_username`),
  ADD KEY `fk_cart2` (`admin_username`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD KEY `fk_cart_details1` (`cart_id`),
  ADD KEY `fk_cart_details2` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `uc_customer_account2` (`email`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_order1` (`customer_username`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`,`product_id`,`size`),
  ADD KEY `fk_order_details2` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product1` (`brand_id`),
  ADD KEY `fk_product2` (`cat_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`product_sku`),
  ADD KEY `fk_product_attributes1` (`product_id`),
  ADD KEY `fk_product_attributes2` (`product_size_id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `product_sku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `fk_customer_order1` FOREIGN KEY (`customer_username`) REFERENCES `customer_account` (`username`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details1` FOREIGN KEY (`id`) REFERENCES `customer_order` (`id`),
  ADD CONSTRAINT `fk_order_details2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product1` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`),
  ADD CONSTRAINT `fk_product2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `fk_product_attributes1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_product_attributes2` FOREIGN KEY (`product_size_id`) REFERENCES `product_size` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
