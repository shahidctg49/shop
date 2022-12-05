-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 09:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `email`, `contact`, `password`, `role_id`, `image`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(0, 'admin', 'admin@gmail.com', '0146544', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '', 1, '2022-07-23 02:19:38', 1, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(1, 'Vision - RFL'),
(2, 'Aarong'),
(3, 'Cats Eye'),
(4, ' Richman'),
(5, 'NogorPolli '),
(6, 'Yellow '),
(7, 'Freeland '),
(8, 'Samsung'),
(9, 'Value Top'),
(10, 'RFL'),
(11, 'Sofy'),
(12, 'Well-Food');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Electronics'),
(2, 'Computer'),
(3, 'Clothing & Shoes'),
(4, 'Baby & Toddler'),
(5, 'Entertainment & Arts'),
(6, 'Food & Gifts'),
(7, 'Health & Beauty');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `email`, `contact`) VALUES
(1, 'Shahidul Islam', 'shahiduli555@gmail.com', '018876219412'),
(2, 'md rabib', 'mdarman7163@gmail.com', '01839876581'),
(3, 'emon', 'emon@gmail.com', '7654398765'),
(4, 'Shanto', 'shanto@gmail.com', '01820987654'),
(5, 'naqib', 'noqib3434n@gmail.com', '01820987654'),
(6, 'saiful', 'saiful@yahoo.com', '01710123423');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `pay_amount` decimal(8,2) NOT NULL,
  `pay_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`id`, `customer_id`, `sales_id`, `pay_amount`, `pay_date`) VALUES
(1, 1, 1, '500.00', '2022-07-04 00:00:00'),
(2, 2, 3, '4000.00', '0000-00-00 00:00:00'),
(3, 4, 5, '233513.20', '2022-07-05 00:00:00'),
(4, 5, 1, '500.00', '2022-07-03 13:36:00'),
(5, 6, 4, '42050.00', '2022-07-05 00:00:00'),
(6, 2, 6, '2000.00', '2022-07-23 00:00:00'),
(7, 2, 6, '2000.00', '2022-07-23 00:00:00'),
(8, 1, 1, '1000.00', '2022-07-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `product_name`, `description`, `price`, `discount`, `status`) VALUES
(1, 2, 1, 'Laptop', 'lksjdf', '55000.00', '0.00', 1),
(2, 2, 1, 'Keyboard', '', '500.00', '0.00', 1),
(3, 3, 4, 'Boot', '', '2000.00', '150.00', 1),
(4, 3, 4, 'shoes', '', '2500.00', '100.00', 1),
(5, 3, 4, 'Men T-Shirts', '', '800.00', '20.00', 1),
(6, 3, 3, 'Polo Shirts', '', '800.00', '0.00', 1),
(7, 3, 2, '', '', '700.00', '0.00', 0),
(8, 1, 8, 'Samsung Mobile Phones', '', '17000.00', '300.00', 1),
(9, 1, 8, 'galaxy a13 6gb/128gb', '', '21500.00', '200.00', 1),
(10, 1, 8, 'samsung galaxy a52 (8/128 gb)', '', '37000.00', '500.00', 1),
(11, 2, 9, 'Casing Fan VT-1256 120mm X 120mm X 25mm ', '', '240.00', '0.00', 1),
(12, 2, 9, 'Value-Top VT-S200B 200W ATX Power Supply', '', '1230.00', '0.00', 1),
(13, 2, 9, 'Value-Top VT-AX500 Real 500W Power Supply', '', '2930.00', '0.00', 1),
(14, 4, 10, 'RFL Star Jhun jhuni 881241', '', '46.00', '0.00', 1),
(15, 3, 10, 'RFL Playtime Toys Double Colored Plastic Kids Ball 10 Pcs 852855', '', '92.00', '0.00', 1),
(16, 4, 10, 'RFL Playtime Toys Snowflake 852290', '', '184.00', '0.00', 1),
(17, 4, 10, 'Winner Motor bikes Horse For Kids - Red', '', '1550.00', '0.00', 1),
(18, 4, 10, 'RFL Playtime Toys Elegant Building Block 852294', '', '460.00', '0.00', 1),
(19, 7, 11, 'Sofy Anti Bacteria Extra Long 15 pads', '', '184.00', '0.00', 1),
(20, 7, 11, 'Sofy Anti Bacteria-Extra Long 7 pads', '', '90.00', '0.00', 1),
(21, 7, 11, 'Sofy Body Fit Overnight 3 Sanitary Pads', '', '70.00', '0.00', 1),
(22, 6, 12, 'Well Food Premium Lachcha Semai 400gm', '', '310.00', '0.00', 1),
(23, 6, 12, 'Well Food Laccha Semai 400gm', '', '135.00', '0.00', 1),
(24, 6, 12, 'Rio Coffee Butter Toast 250 gm', '', '90.00', '0.00', 1),
(25, 6, 12, 'Riocoffee Horli+ Chocolate Chips Biscuit 300 gm', '', '220.00', '0.00', 1),
(26, 6, 12, 'Well Food Morning Fresh Fruit & Nut Cookies 150 g', '', '45.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchese`
--

CREATE TABLE `purchese` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `purchese_date` date NOT NULL,
  `sub_amount` decimal(8,2) NOT NULL,
  `tax` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(8,2) NOT NULL,
  `payment` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchese`
--

INSERT INTO `purchese` (`id`, `supplier_id`, `note`, `purchese_date`, `sub_amount`, `tax`, `discount`, `total_amount`, `payment`) VALUES
(1, 1, 'This is first commit', '2022-06-29', '56000.00', '4.00', '500.00', '57740.00', '0.00'),
(2, 1, '', '2022-06-29', '111500.00', '4.00', '500.00', '115460.00', '0.00'),
(3, 1, '', '2022-06-29', '55000.00', '4.00', '0.00', '57200.00', '50000.00'),
(4, 0, '', '0000-00-00', '2400.00', '5.00', '300.00', '2220.00', '1000.00'),
(5, 4, '', '2022-07-05', '275000.00', '5.00', '500.00', '288250.00', '288250.00'),
(6, 3, '', '2022-07-05', '25000.00', '5.00', '0.00', '26250.00', '2000.00'),
(7, 5, '', '0000-00-00', '550000.00', '5.00', '0.00', '577500.00', '577500.00'),
(8, 2, '', '0000-00-00', '10000.00', '5.00', '200.00', '10300.00', '10300.00'),
(9, 5, '', '0000-00-00', '2500.00', '5.00', '50.00', '2575.00', '2500.00'),
(10, 3, 'thanks', '0000-00-00', '3100.00', '5.00', '50.00', '3205.00', '1500.00'),
(11, 3, '', '0000-00-00', '10850.00', '5.00', '0.00', '11392.50', '11392.00'),
(12, 4, '', '2022-07-05', '2250.00', '15.00', '50.00', '2537.50', '2500.00'),
(13, 3, '', '2022-07-19', '204000.00', '15.00', '500.00', '234100.00', '234100.00'),
(14, 0, 'thanks\r\n', '0000-00-00', '427463.00', '15.00', '1000.00', '490582.45', '490582.45'),
(15, 3, 'you are so good.', '2022-07-19', '6500.00', '5.00', '50.00', '6775.00', '6775.00'),
(16, 5, '', '0000-00-00', '56500.00', '15.00', '500.00', '64475.00', '64475.00'),
(17, 4, '', '0000-00-00', '24000.00', '5.00', '500.00', '24700.00', '24700.00'),
(18, 3, 'Thank you', '2022-07-28', '680000.00', '15.00', '1000.00', '781000.00', '781000.00'),
(19, 2, 'Thanks', '2022-07-05', '380000.00', '10.00', '10000.00', '408000.00', '408000.00'),
(20, 2, '', '0000-00-00', '5060.00', '10.00', '500.00', '5066.00', '2500.00');

-- --------------------------------------------------------

--
-- Table structure for table `purchese_details`
--

CREATE TABLE `purchese_details` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchese_details`
--

INSERT INTO `purchese_details` (`id`, `purchase_id`, `product_id`, `price`, `qty`) VALUES
(1, 1, 1, '55000.00', '1.00'),
(2, 1, 2, '500.00', '2.00'),
(3, 2, 1, '55000.00', '2.00'),
(4, 2, 2, '500.00', '3.00'),
(5, 3, 1, '55000.00', '1.00'),
(6, 4, 5, '800.00', '3.00'),
(7, 5, 1, '55000.00', '5.00'),
(8, 6, 4, '2500.00', '10.00'),
(9, 7, 1, '55000.00', '10.00'),
(10, 8, 3, '2000.00', '5.00'),
(11, 9, 8, '17000.00', '0.00'),
(12, 10, 22, '310.00', '10.00'),
(13, 11, 17, '1550.00', '7.00'),
(14, 12, 26, '45.00', '50.00'),
(15, 13, 8, '17000.00', '12.00'),
(16, 14, 1, '55000.00', '5.00'),
(17, 14, 14, '46.00', '10.00'),
(18, 14, 9, '21500.00', '7.00'),
(19, 14, 14, '46.00', '3.00'),
(20, 14, 11, '240.00', '4.00'),
(21, 14, 23, '135.00', '3.00'),
(22, 15, 5, '800.00', '5.00'),
(23, 15, 4, '2500.00', '1.00'),
(24, 16, 2, '500.00', '3.00'),
(25, 16, 1, '55000.00', '1.00'),
(26, 17, 6, '800.00', '10.00'),
(27, 17, 5, '800.00', '20.00'),
(28, 18, 4, '2500.00', '20.00'),
(29, 18, 3, '2000.00', '15.00'),
(30, 18, 8, '17000.00', '10.00'),
(31, 18, 9, '21500.00', '20.00'),
(32, 19, 10, '37000.00', '10.00'),
(33, 19, 2, '500.00', '20.00'),
(34, 20, 14, '46.00', '50.00'),
(35, 20, 15, '92.00', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `status`) VALUES
(1, 'superadmin', 1),
(2, 'admin', 1),
(3, 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `sale_date` date NOT NULL,
  `sub_amount` decimal(8,2) NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `last_pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `note`, `sale_date`, `sub_amount`, `tax`, `discount`, `total_amount`, `payment`, `last_pay_date`) VALUES
(1, 1, '  thank you', '2022-07-05', '275000.00', '15.00', '5000.00', '311250.00', '301250.00', '2022-07-23'),
(2, 1, '  pleasure to you', '2022-07-04', '4000.00', '0.00', '0.00', '4000.00', '2000.00', '2022-07-05'),
(3, 2, '  thanks', '0000-00-00', '4100.00', '15.00', '200.00', '4515.00', '4000.00', '0000-00-00'),
(4, 6, 'thanks.....', '2022-07-05', '37000.00', '15.00', '500.00', '42050.00', '42050.00', '0000-00-00'),
(5, 4, 'welcome to come here...', '2022-07-05', '222584.00', '5.00', '200.00', '233513.20', '233513.20', '0000-00-00'),
(6, 2, '', '2022-07-23', '4000.00', '0.00', '0.00', '4000.00', '4000.00', '2022-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `sales_id`, `product_id`, `price`, `qty`) VALUES
(1, 1, 1, '55000.00', '5.00'),
(2, 2, 6, '800.00', '5.00'),
(3, 3, 5, '800.00', '2.00'),
(4, 3, 4, '2500.00', '1.00'),
(5, 4, 10, '37000.00', '1.00'),
(6, 5, 15, '92.00', '2.00'),
(7, 5, 5, '800.00', '3.00'),
(8, 5, 1, '55000.00', '4.00'),
(9, 6, 2, '500.00', '8.00');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `pout` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `pin`, `pout`, `price`, `purchase_id`, `sale_id`) VALUES
(1, 1, 1, 0, '55000.00', 1, NULL),
(2, 2, 2, 0, '500.00', 1, NULL),
(3, 1, 2, 0, '55000.00', 2, NULL),
(4, 2, 3, 0, '500.00', 2, NULL),
(5, 1, 1, 0, '55000.00', 3, NULL),
(6, 5, 3, 0, '800.00', 4, NULL),
(7, 1, 5, 0, '55000.00', 5, NULL),
(8, 4, 10, 0, '2500.00', 6, NULL),
(9, 1, 10, 0, '55000.00', 7, NULL),
(10, 3, 5, 0, '2000.00', 8, NULL),
(11, 8, 0, 0, '17000.00', 9, NULL),
(12, 22, 10, 0, '310.00', 10, NULL),
(13, 17, 7, 0, '1550.00', 11, NULL),
(14, 26, 50, 0, '45.00', 12, NULL),
(15, 8, 12, 0, '17000.00', 13, NULL),
(16, 1, 5, 0, '55000.00', 14, NULL),
(17, 14, 10, 0, '46.00', 14, NULL),
(18, 9, 7, 0, '21500.00', 14, NULL),
(19, 14, 3, 0, '46.00', 14, NULL),
(20, 11, 4, 0, '240.00', 14, NULL),
(21, 23, 3, 0, '135.00', 14, NULL),
(22, 5, 5, 0, '800.00', 15, NULL),
(23, 4, 1, 0, '2500.00', 15, NULL),
(24, 2, 3, 0, '500.00', 16, NULL),
(25, 1, 1, 0, '55000.00', 16, NULL),
(26, 6, 10, 0, '800.00', 17, NULL),
(27, 5, 20, 0, '800.00', 17, NULL),
(28, 4, 20, 0, '2500.00', 18, NULL),
(29, 3, 15, 0, '2000.00', 18, NULL),
(30, 8, 10, 0, '17000.00', 18, NULL),
(31, 9, 20, 0, '21500.00', 18, NULL),
(32, 10, 10, 0, '37000.00', 19, NULL),
(33, 2, 20, 0, '500.00', 19, NULL),
(34, 14, 50, 0, '46.00', 20, NULL),
(35, 15, 30, 0, '92.00', 20, NULL),
(36, 1, 0, 5, '55000.00', NULL, 1),
(37, 6, 0, 5, '800.00', NULL, 2),
(38, 5, 0, 2, '800.00', NULL, 3),
(39, 4, 0, 1, '2500.00', NULL, 3),
(40, 10, 0, 1, '37000.00', NULL, 4),
(41, 15, 0, 2, '92.00', NULL, 5),
(42, 5, 0, 3, '800.00', NULL, 5),
(43, 1, 0, 4, '55000.00', NULL, 5),
(44, 2, 0, 8, '500.00', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `sup_name` varchar(255) NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `sup_name`, `contact`, `email`) VALUES
(1, 'Kamal', '065656512', 'kamal@yahoo.com'),
(2, 'RFL', '02587964512', 'harunurrashid97.ctg@gmail.com'),
(3, 'Intel', '01839876581', 'kamal@yahoo.com'),
(4, 'Unuliber', '01895873654', 'unuliber@gmail.con'),
(5, 'startact', '012589876581', 'starttack@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `pay_amount` decimal(8,2) NOT NULL,
  `pay_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_payment`
--

INSERT INTO `supplier_payment` (`id`, `supplier_id`, `purchase_id`, `pay_amount`, `pay_date`) VALUES
(1, 1, 3, '50000.00', '2022-06-29'),
(2, 1, 1, '500.00', '2022-07-04'),
(3, 1, 1, '500.00', '2022-07-04'),
(4, 1, 1, '500.00', '2022-07-04'),
(5, 1, 1, '500.00', '2022-07-04'),
(6, 1, 1, '500.00', '2022-07-04'),
(7, 2, 2, '200.00', '2022-07-04'),
(8, 2, 2, '200.00', '2022-07-04'),
(9, 0, 4, '1000.00', '0000-00-00'),
(10, 4, 5, '288250.00', '2022-07-05'),
(11, 3, 6, '2000.00', '2022-07-05'),
(12, 5, 7, '577500.00', '0000-00-00'),
(13, 2, 8, '10300.00', '0000-00-00'),
(14, 5, 9, '2500.00', '0000-00-00'),
(15, 3, 10, '1500.00', '0000-00-00'),
(16, 3, 11, '11392.00', '0000-00-00'),
(17, 4, 12, '2500.00', '2022-07-05'),
(18, 3, 13, '234100.00', '2022-07-19'),
(19, 0, 14, '490582.45', '0000-00-00'),
(20, 3, 15, '6775.00', '2022-07-19'),
(21, 5, 16, '64475.00', '0000-00-00'),
(22, 4, 17, '24700.00', '0000-00-00'),
(23, 3, 18, '781000.00', '2022-07-28'),
(24, 2, 19, '408000.00', '2022-07-05'),
(25, 2, 20, '2500.00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchese`
--
ALTER TABLE `purchese`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchese_details`
--
ALTER TABLE `purchese_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchese`
--
ALTER TABLE `purchese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchese_details`
--
ALTER TABLE `purchese_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
