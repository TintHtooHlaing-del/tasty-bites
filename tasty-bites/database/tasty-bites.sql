-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 11:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasty-bites`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Email`, `Password`) VALUES
(31, 'Odette', 'widywez@mailinator.com', 'Pa$$w0rd!'),
(32, 'Ira Frye', 'tyxaboqi@mailinator.com', 'Pa$$w0rd!'),
(33, 'Conan Gutierrez', 'cylegyp@mailinator.com', 'Pa$$w0rd!'),
(34, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `contact_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `contact_date`) VALUES
(11, 'fasfa', 'fasfsaf@gmail.com', 'fasfasfs', '2023-11-22'),
(12, 'asfdas', 'hjfhsfh@gmail.com', 'dfasfa', '2023-11-22'),
(13, 'sfsa', 'afdafas@gmailc.com', 'dsfafsfas', '2023-11-22'),
(14, 'afafdasf', 'aafaf@gmail.com', 'fasfdasfas', '2023-11-23'),
(15, 'fadfas', 'gfdsgg@gmail.com', 'dfdsafsf', '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `dis_products`
--

CREATE TABLE `dis_products` (
  `id` int(11) NOT NULL,
  `prd_name` varchar(100) NOT NULL,
  `prd_price` varchar(100) NOT NULL,
  `dis_percentage` varchar(100) NOT NULL,
  `prd_image` varchar(500) NOT NULL,
  `dis_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dis_products`
--

INSERT INTO `dis_products` (`id`, `prd_name`, `prd_price`, `dis_percentage`, `prd_image`, `dis_price`) VALUES
(17, 'Taro-milk-tea', '1000', '15', 'discount_food_908.jpg', '850'),
(18, 'Ray Melendez', '2000', '10', 'discount_food_20.jpg', '1600'),
(19, 'Fresh', '6000', '10', 'discount_food_42.jpg', '5400');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `prd_name` varchar(100) NOT NULL,
  `prd_price` decimal(50,0) NOT NULL,
  `prd_image` varchar(50) NOT NULL,
  `order_user` varchar(100) NOT NULL,
  `order_count` int(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL,
  `total` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `prd_name`, `prd_price`, `prd_image`, `order_user`, `order_count`, `phone`, `address`, `order_date`, `total`, `status`) VALUES
(7, 'burger', '2000', '', 'afad', 1, '3414', 'gsdgsd', '2023-11-14 08:07:59', '2000', 'ordered'),
(8, 'Thai-Iced-Tea-Boba', '2500', '', 'aadfas', 3, '4321412', '4qrerfasf', '2023-11-14 08:09:52', '7500', 'ordered'),
(9, 'Barbecue', '30000', '', 'afa', 1, '41243141', 'fafa', '2023-11-14 08:10:34', '30000', 'ordered'),
(10, 'Thai-Iced-Tea-Boba', '2500', '', 'fasf', 1, '020616516', 'afa', '2023-11-14 08:11:41', '2500', 'ordered'),
(11, 'Strawberry-Fruit-Tea', '3000', '', 'afaf', 2, '4314124', 'afafsafa', '2023-11-15 02:28:00', '6000', 'ordered'),
(12, 'burger', '2000', '', 'fafa', 60, '4132421214', 'fdafasfas', '2023-11-15 02:30:13', '120000', 'ordered'),
(13, 'Strawberry-Fruit-Tea', '3000', '', 'fasfdsafa', 12, '2313', 'asfasdfad', '2023-11-15 02:31:00', '36000', 'ordered'),
(14, 'Hop Duncan', '850', '', 'today', 2, '098765432', 'Yangon', '2023-11-17 06:41:37', '1700', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prd_name` varchar(50) NOT NULL,
  `prd_price` int(10) NOT NULL,
  `prd_category` varchar(20) NOT NULL,
  `prd_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prd_name`, `prd_price`, `prd_category`, `prd_image`) VALUES
(52, 'Coconut-Milk-Tea', 2000, 'drink', 'food_631.png'),
(53, 'Barbecue', 15000, 'barbecue', 'food_242.jpg'),
(54, 'other', 23000, 'other', 'food_985.jpg'),
(55, 'Pizza', 10000, 'pizza', 'food_717.jpg'),
(56, 'Burger', 2000, 'burger', 'food_322.jpg'),
(57, 'Cheeseburger', 2500, 'burger', 'food_904.jpg'),
(58, 'Barbecue2', 20000, 'barbecue', 'food_561.jpg'),
(59, 'Brown-Sugar-Milk-Tea', 2000, 'drink', 'food_180.jpg'),
(60, 'Vegetarian-pizza', 20000, 'pizza', 'food_738.jpg'),
(61, 'sfasdfasf', 3000, 'other', 'food_169.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile`) VALUES
(1, 'Mg Mg', '1234', 'monexegoqi@mailinator.com', '0987654321'),
(2, 'defize', 'Pa$$w0rd!', 'letyren@mailinator.com', 'Sapiente molestiae e'),
(3, 'user1', '1234', 'user1@gmail.ocm', '09876865546'),
(4, 'user', 'user', 'user@gmail.com', '0911111'),
(5, 'user', 'user', 'user@gmail.com', '0911111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dis_products`
--
ALTER TABLE `dis_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dis_products`
--
ALTER TABLE `dis_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
