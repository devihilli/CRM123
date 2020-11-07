-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 10:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `caddress` varchar(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `cuser_id` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dateofbirth` date NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `taluq_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `firstname`, `lastname`, `caddress`, `mobile`, `cuser_id`, `city`, `email`, `dateofbirth`, `state_id`, `district_id`, `taluq_id`) VALUES
(3, 'rutuja', 'huddar', 'jawali bazar ml', '0987654321', 78, 'belgaum', 'huddarhunny@gmail.com', '2020-10-15', 2, 4, 7),
(6, 'sagar', 'awati', 'bijapur', '805489765', 88, 'banglore', 'sagar1232gmail.com', '2020-10-20', 1, 1, 1),
(7, 'hunny', 'huddar', 'mlp', '9876054321', 90, 'mlp', 'huddarhunny234@gmail.com', '2020-10-02', 1, 2, 4),
(8, 'bunny', 'Awati', 'mudhol', '8765432109', 91, 'bagalkot', 'bunny12346@gmail.com', '2020-10-10', 2, 4, 7),
(9, 'raju', 'ambi', 'vita', '7411048255', 92, 'goa', 'raju@123.gmail.com', '2020-07-10', 1, 2, 3),
(10, 'santosh', 'huddar', 'gadad galli', '9916058193', 93, 'bagalkot', 'santu456@gmail.com', '2020-10-04', 2, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `name`, `state_id`) VALUES
(1, 'Bijapur', 1),
(2, 'Belgaum', 1),
(3, 'chennai', 2),
(4, 'coimbatore', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `pname`, `category`, `price`) VALUES
(1, 'Lipstick', 'A', 2000),
(3, 'Jeans', 'B', 5000),
(4, 'top', 'A', 2000),
(5, 'kurta', 'B', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL,
  `item-code` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_of_purchase` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `userole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `userole`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `id` int(11) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`id`, `quantity`, `product_id`, `product_name`) VALUES
(1, '10', '#123', 'Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL,
  `staffname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateofbirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `staffname`, `email`, `mobile`, `userid`, `dateofbirth`) VALUES
(1, 'adi', 'guruhilli3@gamil.com', '998025825', 2, '2020-10-01'),
(2, 'Adi', 'huddarsrutuja@gmail.com', '9876543234', 2, '0000-00-00'),
(5, 'hunny', 'huddarhunny@gmail.com', '9876543230', 2, '0000-00-00'),
(7, 'Bunny', 'bunny123@gmail.com', '0987654321', 2, '0000-00-00'),
(8, 'Bunny', 'bunny123@gmail.com', '0987654321', 2, '0000-00-00'),
(9, 'Bunny', 'bunny123@gmail.com', '0987654321', 2, '0000-00-00'),
(10, 'Bunny', 'bunny123@gmail.com', '0987654321', 2, '0000-00-00'),
(11, 'Bunny', 'bunny123@gmail.com', '0987654321', 2, '0000-00-00'),
(12, 'Sagar', 'sagar1232gmail.com', '09876543', 2, '0000-00-00'),
(23, '$staff_name', '$staff_email', '$smobile', 2, '2020-10-20'),
(24, 'nithin', 'nithin@gmail.com', '9686211052', 2, '2020-10-01'),
(25, 'siddu', 'siddu@gmail.com', '9876543234', 3, '2020-10-01'),
(26, 'shashikala', 'shashi@gmail.com', '9876543234', 4, '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `name`) VALUES
(1, 'Karnataka'),
(2, 'Tamilnadu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taluq`
--

CREATE TABLE `tbl_taluq` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_taluq`
--

INSERT INTO `tbl_taluq` (`id`, `name`, `district_id`) VALUES
(1, 'Sindagi', 1),
(2, 'Indi', 1),
(3, 'Gokak', 2),
(4, 'Raibag', 2),
(5, 'Ambatturu', 3),
(6, 'Alandur', 3),
(7, 'Annur', 4),
(8, 'Perur', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tpassword` varchar(15) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `tpassword`, `role_id`) VALUES
(1, 'Admin', 'admin', 'admin', 1),
(2, 'nithin@gmail.com', 'nithin@gmail.com', 'd41d8cd98f00b20', 0),
(3, 'siddu@gmail.com', 'siddu@gmail.com', 'd41d8cd98f00b20', 0),
(4, 'shashi@gmail.com', 'shashi@gmail.com', 'd41d8cd98f00b20', 2),
(76, '9876543230', 'abc@gmail.com', 'd41d8cd98f00b20', 3),
(77, '9876543234', 'huddarsrutuja@gmail.com', 'd41d8cd98f00b20', 3),
(78, '0987654321', 'huddarhunny@gmail.com', 'd41d8cd98f00b20', 3),
(87, '9535098456', 'bunny123@gmail.com', 'd41d8cd98f00b20', 3),
(88, '805489765', 'sagar1232gmail.com', 'd41d8cd98f00b20', 3),
(90, '9876054321', 'huddarhunny234@gmail.com', 'd41d8cd98f00b20', 3),
(91, '8765432109', 'bunny12346@gmail.com', 'd41d8cd98f00b20', 3),
(92, '7411048255', 'raju@123.gmail.com', 'd41d8cd98f00b20', 3),
(93, '9916058193', 'santu456@gmail.com', 'd41d8cd98f00b20', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_taluq`
--
ALTER TABLE `tbl_taluq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_taluq`
--
ALTER TABLE `tbl_taluq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
