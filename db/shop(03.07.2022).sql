-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 04:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `email`, `contact`, `password`, `role_id`, `image`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(0, 'kamal', 'kamal@yahoo.com', '06564545', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '', 1, '2022-06-27 02:57:01', 1, '0000-00-00 00:00:00', NULL),
(0, 'biplab uddin', 'biplabuddin990@gmail.com', '01762726907', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '', 1, '2022-06-29 12:01:07', 1, '0000-00-00 00:00:00', NULL);

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
(2, 'walton'),
(3, 'Hp'),
(4, 'Huawei'),
(5, 'well-food'),
(6, 'Lenovo'),
(7, 'Bata'),
(8, 'Apacer'),
(9, 'Casio'),
(10, 'Aarong'),
(11, 'R15');

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
(4, 'Food'),
(5, 'Books'),
(6, 'Home & Kitchen'),
(7, 'Baby & Toddler'),
(8, 'Health & Beauty'),
(9, 'Bike');

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
(3, 'Rabib Ahmed', 'rabib@gmail.com', '01762726907'),
(4, 'Ashab Uddin', 'ashab@gmail.com', '01745612345'),
(5, 'Ariful Islam', 'arif@gmail.com', '01522114477'),
(6, 'Zalal Uddun', 'zalal@gmail.com', '01689745897'),
(7, 'Jahid Alam', 'jahid@gmail.com', '01623235487');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `pay_amount` decimal(8,2) NOT NULL,
  `pay_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`id`, `customer_id`, `sales_id`, `pay_amount`, `pay_date`) VALUES
(0, 3, 5, '100000.00', '2022-07-04');

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
(4, 2, 3, 'Laptop', 'This is the best laptop .', '50000.00', '500.00', 1),
(5, 1, 4, 'Mobile', 'Huawei is the second-biggest smartphone maker in the world.', '21500.00', '500.00', 1),
(6, 4, 5, 'Morning Fresh Fruit', 'Well Food is one of the most prominent bakeries in Bangladesh.', '72.00', '0.00', 1),
(7, 4, 5, 'Laccha Semai', 'Laccha Semai  is a renowned Asian Food.', '55.00', '0.00', 1),
(8, 1, 8, 'Pen Drive', 'Unique streamlined look.', '1400.00', '200.00', 1),
(9, 3, 10, 'Polo Shirts', 'a casual short-sleeved cotton shirt with a collar and several buttons at the neck', '1100.00', '0.00', 1),
(10, 1, 2, 'Casing Fan', 'An electric fan that blows hot air out of a computer case, A/V equipment case or other electronic equipment.', '2500.00', '300.00', 1),
(11, 1, 9, 'watch', 'A watch is a portable timepiece intended to be carried or worn by a person.', '2900.00', '100.00', 1),
(12, 6, 1, 'cabinet shelf', 'The Organized Living Medium Cabinet Shelf puts extra storage in all the right places.', '4500.00', '0.00', 1),
(13, 4, 5, 'Chocolate Chips Biscuit', 'A chocolate chip cookie is a sweet baked treat that is recognized by its butter flavor and the inclusion of chocolate chips.', '95.00', '0.00', 1),
(14, 4, 5, 'Coffee', 'The variety of discernable tastes.', '20.00', '0.00', 1),
(15, 7, 10, 'RFL Playtime Toys', 'Playtime Soft Toys Brand', '360.00', '10.00', 1),
(16, 9, 11, 'Motor bikes ', 'Motorcycle design varies greatly to suit a range of different purpose.', '295000.00', '500.00', 1),
(17, 7, 1, 'RFL Playtime Toys', 'Playtime Soft Toys Brand: Playtime Toys Item code: 875103. Soft Sound creating path.', '250.00', '0.00', 1),
(18, 7, 1, 'RFL Playtime Toys Double Colored Plastic Kids Ball', 'Double Colored Plastic Kids Ball 50 pcs now available .', '340.00', '0.00', 1),
(19, 1, 2, 'Mouse', 'A mouse is a small device that a computer user pushes.', '250.00', '0.00', 1),
(20, 1, 3, 'Keyboard', 'User to input text into a computer or any other electronic machinery', '650.00', '0.00', 1),
(21, 1, 8, 'SSD', 'A solid-state drive (SSD) is a solid-state storage device.', '3100.00', '0.00', 1),
(22, 1, 6, 'Batteries', 'An electric battery is a source of electric power consisting of one or more electrochemical.', '4500.00', '0.00', 1),
(23, 6, 2, 'Magazine Chair', 'Contemporary furniture and Modern classics.', '6500.00', '0.00', 1);

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
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(8,2) NOT NULL,
  `payment` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchese`
--

INSERT INTO `purchese` (`id`, `supplier_id`, `note`, `purchese_date`, `sub_amount`, `tax`, `discount`, `total_amount`, `payment`) VALUES
(5, 3, 'Thanks.', '2022-07-04', '100000.00', '10.00', '200.00', '109800.00', '100000.00');

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
(7, 5, 4, '50000.00', '2.00');

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
  `payment` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `note`, `sale_date`, `sub_amount`, `tax`, `discount`, `total_amount`, `payment`) VALUES
(5, 3, 'Thank You.', '2022-07-04', '100000.00', '10.00', '200.00', '109800.00', '100000.00');

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
(4, 5, 4, '50000.00', '2.00');

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
  `sales_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `pin`, `pout`, `price`, `purchase_id`, `sales_id`) VALUES
(10, 4, 0, 2, '50000.00', NULL, 5),
(11, 4, 2, 0, '50000.00', 5, NULL);

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
(3, 'Harun', '017112221234', 'harun@gmail.com');

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
(4, 3, 5, '100000.00', '2022-07-04');

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
  ADD PRIMARY KEY (`customer_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchese`
--
ALTER TABLE `purchese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchese_details`
--
ALTER TABLE `purchese_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
