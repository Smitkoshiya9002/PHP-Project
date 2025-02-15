-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 02:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optical`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_to_cart`
--

CREATE TABLE `tbl_add_to_cart` (
  `cart_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_prize` int(11) NOT NULL,
  `product_photo` varchar(1000) NOT NULL,
  `product_company` varchar(100) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_prize` int(11) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_add_to_cart`
--

INSERT INTO `tbl_add_to_cart` (`cart_id`, `customer_name`, `product_name`, `product_prize`, `product_photo`, `product_company`, `product_size`, `product_quantity`, `total_prize`, `product_category`, `product_id`) VALUES
(19, 'smit', 'Polarized Brown Classic B-15', 10170, 'ray-ban-men_Polarized Brown Classic B-15.jpg', 'ray ban', '139 mm', 1, 10170, 'men', 8),
(20, 'smit', 'ERIKA COLOR MIX', 7823, 'ray-ban-women_ERIKA COLOR MIX.jpg', 'ray ban', '139 mm', 2, 15646, 'women', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`) VALUES
(1, 'visionshop197@gmail.com', 'Vision@1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'ray ban'),
(2, 'john jacob'),
(3, 'rio rabbit'),
(4, 'versace'),
(5, 'Gucci'),
(6, 'd&g');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'All'),
(2, 'Men'),
(3, 'Women'),
(4, 'Kids'),
(5, 'infant');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `prize` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `photo` varchar(10000) NOT NULL,
  `category` varchar(10) NOT NULL,
  `frame` varchar(100) NOT NULL,
  `glasses` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`product_id`, `product_name`, `prize`, `size`, `company`, `photo`, `category`, `frame`, `glasses`, `quantity`) VALUES
(2, 'Modern Square Sunglasses', 4699, '143 mm', 'ray ban', 'ray-ban-all_Modern Square Sunglasses.jpg', 'all  ', 'square', 'sunglasses', 0),
(3, 'UV Protection Firmed Sunglasses', 5549, '139 mm', 'ray ban', 'ray-ban-all_UV Protection Firmed Sunglasses.jpg', 'all ', 'Oval', 'sunglasses', 5),
(4, 'Classic Round Sunglasses', 3299, '137 mm', 'ray ban', 'ray-ban-all_classic_round_sunglasses.jpg', 'all', 'Aviator', 'sunglasses', 5),
(5, 'Retro Square Sunglasses', 9169, '143 mm', 'ray ban', 'ray-ban-all_retro Square Sunglasses.jpg', 'all', 'Square', 'sunglasses', 5),
(6, 'Polarized Green Classic G-15', 12490, '135 mm', 'ray ban', 'ray-ban-men_Polarized Green Classic G-15.jpg', 'men ', 'Circle', 'sunglasses', 6),
(7, 'Mirrored Round Sunglasses', 9733, '140 mm', 'ray ban', 'ray-ban-all_mirrrored_round_sunglasses.jpg', 'all', 'Circle', 'sunglasses', 5),
(8, 'Polarized Brown Classic B-15', 10170, '139 mm', 'ray ban', 'ray-ban-men_Polarized Brown Classic B-15.jpg', 'men', 'Square', 'sunglasses', 4),
(9, 'Dark green polar', 9169, '138 mm', 'ray ban', 'ray-ban-men_Dark green polar.jpg', 'men', 'Oval', 'sunglasses', 5),
(10, 'Green Non-Polarized', 6590, '143 mm', 'ray ban', 'ray-ban-men_Blue Non-Polarized.jpg', 'men', 'Square', 'sunglasses', 5),
(11, 'Leonard Square Sunglasses', 7835, '142 mm', 'ray ban', 'ray-ban-men_Leonard Square Sunglasses.jpg', 'men', 'Aviator', 'sunglasses', 5),
(12, 'Polished Light Havana', 6755, '137 mm', 'ray ban', 'ray-ban-women_Polished Light Havana.jpg', 'women', 'Oval', 'sunglasses', 5),
(13, 'ERIKA COLOR MIX', 7823, '139 mm', 'ray ban', 'ray-ban-women_ERIKA COLOR MIX.jpg', 'women', 'Oval', 'sunglasses', 2),
(14, 'Brad Matte Havana', 8734, '135 mm', 'ray ban', 'ray-ban-women_Brad Matte Havana.jpg', 'women', 'Square', 'sunglasses', 7),
(15, '0RJ9069S Junior', 4597, '133 mm', 'ray ban', 'ray-ban-kids_0RJ9069S Junior.jpg', 'kids', 'Square', 'sunglasses', 5),
(16, 'Justin Junior', 5677, '134 mm', 'ray ban', 'ray-ban-kids_Justin Junior.png', 'kids', 'Oval', 'sunglasses', 5),
(17, 'RJ9070S Light Silver', 5633, '137 mm', 'ray ban', 'ray-ban-kids_RJ9070S Light Silver.png', 'kids', 'Circle', 'sunglasses', 5),
(18, 'Selenite Grey Transparent', 4533, '137 mm', 'john jacob', 'john-jacob-all_Selenite Grey Transparent.jpg', 'all ', 'Circle', 'sunglasses', 5),
(19, 'Tribeca Black', 4222, '139 mm', 'john jacob', 'john-jacob-all_Tribeca Black.jpg', 'all', 'Square', 'sunglasses', 7),
(20, 'Carbon Black', 3444, '139 mm', 'john jacob', 'john-jacob-all_Carbon Black.jpg', 'all', 'Aviator', 'sunglasses', 10),
(21, 'Durham Tortoise Gold', 5111, '141 mm', 'john jacob', 'john-jacob-all_Durham Tortoise Gold.jpg', 'all', 'Circle', 'sunglasses', 10),
(22, 'Tourmaline Black', 3111, '137 mm', 'john jacob', 'john-jacob-all_Tourmaline Black.jpg', 'all', 'Oval', 'sunglasses', 10),
(23, 'Colosseum Black', 3888, '139 mm', 'john jacob', 'john-jacob-men_Colosseum Black.jpg', 'men', 'Square', 'sunglasses', 10),
(24, 'Jasper Tortoise', 2800, '141 mm', 'john jacob', 'john-jacob-men_Jasper Tortoise.jpg', 'men', 'Aviator', 'sunglasses', 10),
(25, 'Carnac Gunmetal', 4000, '140 mm', 'john jacob', 'john-jacob-men_Carnac Gunmetal.jpg', 'men', 'Oval', 'sunglasses', 10),
(26, 'Sinatra Tortoise Gold', 3222, '134 mm', 'john jacob', 'john-jacob-women_Sinatra Tortoise Gold.jpg', 'women', 'Circle', 'sunglasses', 8),
(27, 'Creamy White Full Rim Square', 4090, '138 mm', 'john jacob', 'john-jacob-women_Creamy White Full Rim Square.jpg', 'women', 'Aviator', 'sunglasses', 10),
(28, 'Neptune Transparent', 3100, '137 mm', 'john jacob', 'john-jacob-women_Neptune Transparent.jpg', 'women', 'Square', 'sunglasses', 10),
(29, 'Black Full Rim Wayfarer', 3900, '133 mm', 'john jacob', 'john-jacob-kids_Black Full Rim Wayfarer.jpg', 'kids', 'Aviator', 'sunglasses', 10),
(30, 'Blue Full Rim Square', 2700, '135 mm', 'john jacob', 'john-jacob-kids_Blue Full Rim Square.jpg', 'kids', 'Aviator', 'sunglasses', 8),
(31, ' JUSTIN COLLECTION ', 3000, '129 mm', 'rio rabbit', 'rio-rabbit-1.jpg', 'All', 'oval', 'eyeglasses', 8),
(32, 'INVERNESS', 3000, '133 mm', 'versace', 'versace1.jpg', 'Men', 'square', 'computerglasses', 10),
(33, ' CLUBMASTER SQUARE ', 4000, '140 mm', 'Gucci', 'Gucci1.jpg', 'Kids', 'oval', 'eyeglasses', 10),
(35, 'jdbih', 677, '677', 'rio rabbit', 'Main DOC change.doc', 'All', 'oval', 'sunglasses', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_details`
--

CREATE TABLE `tbl_customer_details` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contactno` bigint(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer_details`
--

INSERT INTO `tbl_customer_details` (`cust_id`, `name`, `email`, `contactno`, `city`, `address`) VALUES
(1, 'smit', '21bmiit002@gmail.com', 8799513866, 'surat', 'valam'),
(5, 'vasu', '21bmiit048@gmail.com', 8888888888, 'surat', 'matru sakti');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `feedback_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`name`, `email`, `number`, `message`, `feedback_id`) VALUES
('smit', '21bmiit016@gmail.com', 8799513866, 'another feedback', 2),
('hevin', '21bmiit062@gmail.com', 9999922222, 'hello good web', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `OID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_mobile` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `place_order` varchar(50) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`OID`, `amount`, `cust_name`, `cust_email`, `cust_mobile`, `status`, `place_order`, `order_date`, `order_address`) VALUES
(6, 20599, 'smit', '21bmiit002@gmail.com', 897876876778, 'complete', 'placed', '2023-11-06', 'valam,suratt,Gujrat,Bharat'),
(26, 17445, 'smit', '21bmiit002@gmail.com', 897876876778, 'complete', 'placed', '0000-00-00', 'valam,suratt,Gujrat,Bharat'),
(27, 4222, 'smit', '21bmiit002@gmail.com', 897876876778, 'incomplete', 'canceled', '2023-11-07', 'valam,suratt,Gujrat,Bharat'),
(28, 7222, 'smit', '21bmiit002@gmail.com', 897876876778, 'complete', 'placed', '2023-11-07', 'valam,suratt,Gujrat,Bharat'),
(29, 7222, 'smit', '21bmiit002@gmail.com', 8799513866, 'complete', 'placed', '2023-11-07', 'valam,suratt,Gujrat,Bharat'),
(31, 5300, 'smit', '21bmiit002@gmail.com', 8799513866, 'complete', 'placed', '2023-11-07', 'valam,suratt,Gujrat,Bharat'),
(32, 25816, 'smit', '21bmiit002@gmail.com', 8799513866, 'complete', 'placed', '2023-11-07', 'valam,suratt,Gujrat,Bharat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_id`, `product_name`, `quantity`, `price`, `size`, `company`, `photo`) VALUES
(6, 'UV Protection Round Sunglasses', 3, 5300, '141 mm', 'ray ban', 'ray-ban-all_UV Protection Round Sunglasses.jpg'),
(6, 'Brad Matte Havana', 1, 8734, '135 mm', 'ray ban', 'ray-ban-women_Brad Matte Havana.jpg'),
(26, 'Tribeca Black', 1, 4222, '139 mm', 'john jacob', 'john-jacob-all_Tribeca Black.jpg'),
(26, 'ERIKA COLOR MIX', 1, 7823, '139 mm', 'ray ban', 'ray-ban-women_ERIKA COLOR MIX.jpg'),
(26, 'Blue Full Rim Square', 2, 2700, '135 mm', 'john jacob', 'john-jacob-kids_Blue Full Rim Square.jpg'),
(28, 'Tribeca Black', 1, 4222, '139 mm', 'john jacob', 'john-jacob-all_Tribeca Black.jpg'),
(28, ' JUSTIN COLLECTION ', 1, 3000, '129 mm', 'rio rabbit', 'rio-rabbit-1.jpg'),
(29, 'Tribeca Black', 1, 4222, '139 mm', 'john jacob', 'john-jacob-all_Tribeca Black.jpg'),
(29, ' JUSTIN COLLECTION ', 1, 3000, '129 mm', 'rio rabbit', 'rio-rabbit-1.jpg'),
(31, 'UV Protection Round Sunglasses', 1, 5300, '142 mm', 'ray ban', 'ray-ban-all_UV Protection Round Sunglasses.jpg'),
(32, 'Polarized Brown Classic B-15', 1, 10170, '139 mm', 'ray ban', 'ray-ban-men_Polarized Brown Classic B-15.jpg'),
(32, 'ERIKA COLOR MIX', 2, 7823, '139 mm', 'ray ban', 'ray-ban-women_ERIKA COLOR MIX.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_contact` bigint(20) NOT NULL,
  `p_status` varchar(50) NOT NULL,
  `p_method` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `cust_name`, `cust_email`, `cust_contact`, `p_status`, `p_method`, `amount`, `order_id`) VALUES
(2, 'smit', '21bmiit002@gmail.com', 897876876778, 'complete', 'UPI', 20599, 6),
(3, 'smit', '21bmiit002@gmail.com', 897876876778, 'complete', 'UPI', 5300, 21),
(5, 'smit', '21bmiit002@gmail.com', 897876876778, 'incomplete', 'COD', 17445, 26),
(6, 'smit', '21bmiit002@gmail.com', 897876876778, 'complete', 'UPI', 7222, 28),
(7, 'smit', '21bmiit002@gmail.com', 8799513866, 'incomplete', 'COD', 7222, 29),
(8, 'smit', '21bmiit002@gmail.com', 8799513866, 'complete', 'UPI', 5300, 31),
(9, 'smit', '21bmiit002@gmail.com', 8799513866, 'complete', 'UPI', 25816, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`username`, `email`, `password`, `otp`) VALUES
('smit', '21bmiit002@gmail.com', 'Smit@1234', 9149),
('', '21bmiit048@gmail.com', 'Vasu@1234', 4248),
('', 'sdelwadkar@gmail.com', 'Sandip@121', 3132);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_add_to_cart`
--
ALTER TABLE `tbl_add_to_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_customer_details`
--
ALTER TABLE `tbl_customer_details`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_add_to_cart`
--
ALTER TABLE `tbl_add_to_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_customer_details`
--
ALTER TABLE `tbl_customer_details`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
