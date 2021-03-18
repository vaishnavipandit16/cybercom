-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 05:29 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` bigint(20) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`) VALUES
(1, 'Vaishnavi', 'vaishnavi123', 1, '2021-03-18 07:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` bigint(20) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `name` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(20) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'product', 'color', 'color', 'select multiple', 'text', 1, ''),
(2, 'product', 'brand', 'brand', 'radio', 'varchar(256)', 2, ''),
(3, 'product', 'size', 'size', 'select multiple', 'text', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `attributeId` bigint(20) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(1, 'White', 1, 3),
(2, 'Blue', 1, 2),
(3, 'Black', 1, 1),
(4, 'Levis', 2, 2),
(5, 'ZARA', 2, 1),
(6, 'S', 3, 4),
(7, 'XL', 3, 3),
(8, 'L', 3, 2),
(9, 'M', 3, 1),
(10, 'Sony', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` bigint(20) NOT NULL,
  `parentId` bigint(200) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `pathId` text DEFAULT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `categoryName`, `status`, `featured`, `description`, `pathId`, `createdDate`) VALUES
(1, 0, 'Bedroom', 1, 1, '', NULL, '2021-03-18 14:08:37'),
(2, 0, 'Living Room', 1, 1, '', '2', '2021-03-18 07:03:26'),
(3, 2, 'Sofa', 1, 1, '', '2=3', '2021-03-18 07:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(1, 'Contact Us', 'ContactUs', '<p>This is <a href=\"http://google.com\"><strong>Contact Us</strong></a> Page.</p>', 1, '2021-03-18 08:30:30.000000');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` bigint(20) NOT NULL,
  `customerGroup` bigint(20) DEFAULT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerGroup`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 2, 'Khushi', 'Pandit', 'khushipandit000@gmail.com', 9106660279, '34a67f58ddcc6e38714dc0ec1cc0d5b9', 1, '2021-03-18 08:59:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` bigint(20) NOT NULL,
  `customerId` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipCode` bigint(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `addressType` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipCode`, `country`, `addressType`) VALUES
(1, 1, 'Niti Nagar', 'Surat', 'Gujarat', 395007, 'India', 1),
(2, 1, 'Sentosa', 'surat', 'Gujarat', 395007, 'India', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'Wholesaler', 1, '2021-03-18 08:31:19.000000'),
(2, 'Retailor', 1, '2021-03-18 08:31:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'COD', '_bf__ce_d_', 'Cash On Delivery', 1, '2021-03-18 08:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` bigint(20) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `sku` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `brand` varchar(256) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `color`, `price`, `discount`, `sku`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `brand`, `size`) VALUES
(1, 'Jeans', 'Blue,Black', 800, 0, 'bhjiyuty67skjk', 10, 'Comfortable Jeans', 1, '2021-03-18 08:39:26', '0000-00-00 00:00:00', 'Black', 'XL,M'),
(2, 'T.V', 'Black', 50000, 0, 'sxghhvjl899yhj', 1, 'LED T.V.', 1, '2021-03-18 08:40:17', '0000-00-00 00:00:00', 'Black', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` bigint(20) NOT NULL,
  `productId` bigint(20) NOT NULL,
  `customerGroupId` bigint(20) NOT NULL,
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 1, 1, 600.00),
(2, 1, 2, 800.00),
(3, 2, 1, 40000.00),
(4, 2, 2, 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `imageId` bigint(20) NOT NULL,
  `productId` bigint(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `label` varchar(50) NOT NULL,
  `thumb` tinyint(1) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `gallery` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`imageId`, `productId`, `image`, `label`, `thumb`, `small`, `base`, `gallery`) VALUES
(1, 1, 'Screenshot (3).png', 'image1', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `methodId` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(1, 'Regular', 'e__eca____', 50, 'Success', 1, '2021-03-18 08:21:56'),
(2, 'Primium', '____ab___d', 150, 'Success', 1, '2021-03-18 08:22:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `index_identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `Customer_group` (`customerGroup`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `FK_Customer_Id` (`customerId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `FK_product` (`productId`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `imageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `methodId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `Customer_group` FOREIGN KEY (`customerGroup`) REFERENCES `customer_group` (`groupId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `FK_Customer_Id` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
