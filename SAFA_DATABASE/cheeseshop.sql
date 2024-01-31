-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2024 at 01:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheeseshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int NOT NULL,
  `ClassName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `ClassDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `ClassName`, `Price`, `ClassDate`) VALUES
(1, 'How to Be a Great Grater', 109.99, '2022-10-18 16:00:00'),
(2, 'Brilliant Breads', 89.99, '2022-10-18 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int NOT NULL,
  `OrderDate` datetime NOT NULL,
  `UserID` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `UserID`) VALUES
(3, '2022-10-08 13:27:05', 1),
(4, '2022-10-08 13:28:16', 3),
(5, '2022-10-08 13:28:41', 1),
(6, '2022-10-08 13:33:20', 3),
(7, '2022-10-08 14:56:03', 3),
(8, '2022-10-08 14:56:25', 1),
(9, '2022-10-08 14:56:28', 1),
(10, '2022-10-08 15:56:28', 7),
(11, '2022-10-08 15:56:30', 1),
(12, '2022-10-08 15:56:31', 7),
(13, '2022-10-08 15:56:34', 7),
(14, '2022-10-08 20:59:36', 7),
(15, '2022-10-09 14:18:16', 3),
(16, '2022-10-10 15:13:31', 1),
(17, '2022-10-10 15:19:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int NOT NULL,
  `ProductName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `Cost` float NOT NULL DEFAULT '0',
  `ImageURL` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Cost`, `ImageURL`) VALUES
(1, 'Cheddar', 6.99, 'https://cheese-etc.co.uk/wp-content/uploads/2020/02/goulds-farmhouse-cheddar-cheese.jpeg'),
(2, 'Red Leicester', 7.99, 'https://ichef.bbci.co.uk/food/ic/food_16x9_320/foods/r/red_leicester_cheese_16x9.jpg'),
(3, 'Cheddar', 6.99, 'https://cheese-etc.co.uk/wp-content/uploads/2020/02/goulds-farmhouse-cheddar-cheese.jpeg'),
(4, 'Red Leicester', 7.99, 'https://ichef.bbci.co.uk/food/ic/food_16x9_320/foods/r/red_leicester_cheese_16x9.jpg'),
(5, 'Dairylea', 1.99, 'https://images.ctfassets.net/6jpeaipefazr/5KA1IjIopASZfOWpHGHBV5/459fd56faf28683d1579e26bb268fe54/P13-7622210317629.jpg'),
(6, 'Stilton', 10.99, 'https://www.finefoodspecialist.co.uk/media/catalog/product/cache/2eeda6139faec14ae6564fa681987f23/c/r/cropwell_half.jpg'),
(7, 'Cheese Knife', 109.99, 'https://imageengine.victorinox.com/mediahub/31375/1280Wx1120H/CUT_6_7863_13B__S1.jpg'),
(9, 'Burger Cheese', 10.99, 'https://complex-res.cloudinary.com/image/upload/a8elykw0n4brqafpbqux.gif');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `ProductID` int NOT NULL,
  `OrderID` int NOT NULL,
  `Quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`ProductID`, `OrderID`, `Quantity`) VALUES
(1, 3, 5),
(1, 6, 8),
(1, 13, 4),
(1, 15, 4),
(2, 4, 7),
(2, 7, 3),
(2, 8, 1),
(2, 10, 1),
(3, 9, 3),
(3, 11, 1),
(4, 5, 4),
(4, 12, 1),
(6, 14, 8),
(7, 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `Address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Address`) VALUES
(1, 'Ben', 'popleb@btc.ac.uk', 'UCS'),
(3, 'ben', 'ben@outlook.com', 'Bridgwater'),
(7, 'Admin', 'admin@SAFA.org', 'Somerset'),
(8, 'Hannah', 'hannahtucker203@gmail.com', 'Some address'),
(20, 'HannahTest', 'asdasd@email.com', 'asdasdasdasdasd aa'),
(21, 'HannahTest', 'asdasd@email.com', 'asdasdasdasdasd aa'),
(22, 'HannahTest', 'asdasd@email.com', 'asdasdasdasdasd aa');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int NOT NULL,
  `code` int NOT NULL,
  `expires` int NOT NULL,
  `email` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `code`, `expires`, `email`) VALUES
(2, 109475, 1705940902, 'asdasd@email.com'),
(20, 272840, 1706536973, 'hannahtucker203@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_orders_users` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`ProductID`,`OrderID`),
  ADD KEY `FK_product_orders_orders` (`OrderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expires` (`expires`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_users` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `FK_product_orders_orders` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `FK_product_orders_products` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
