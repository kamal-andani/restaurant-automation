-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 05:44 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `booktable`
--

CREATE TABLE `booktable` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `tid` varchar(20) NOT NULL,
  `maxperson` int(1) DEFAULT NULL,
  `booking_date` varchar(20) DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `starttime_long` bigint(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `endtime_long` bigint(20) DEFAULT NULL,
  `mobile_no` bigint(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktable`
--

INSERT INTO `booktable` (`id`, `name`, `tid`, `maxperson`, `booking_date`, `start_time`, `starttime_long`, `end_time`, `endtime_long`, `mobile_no`) VALUES
(10, '@kamal', '4A', NULL, '2017-04-11', '12:26', 1491913560, '15:30', 1491924600, 9876543210),
(11, '@Bansi', '4D', NULL, '2017-04-11', '12:57', 1491915420, '14:57', 1491922620, 9876543210),
(9, '@Jack', '6B', NULL, '2017-04-11', '11:21', 1491909660, '13:21', 1491916860, 9876543210),
(5, '@Bansi', '4A', NULL, '2017-04-11', '09:15', 1491815700, '11:30', 1491823800, 9876543210),
(6, '@Bansi', '4A', NULL, '2017-04-11', '05:30', 1491802200, '09:10', 1491815400, 9876543210),
(7, '@Bansi', '4A', NULL, '2017-04-11', '00:41', 1491784860, '02:41', 1491792060, 9876543210),
(8, '@Bansi', '2D', NULL, '2017-04-11', '00:41', 1491784860, '02:41', 1491792060, 9876543210);

-- --------------------------------------------------------

--
-- Table structure for table `itmorder`
--

CREATE TABLE `itmorder` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `itemid` int(6) NOT NULL,
  `qty` int(6) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `price` int(6) NOT NULL,
  `category` varchar(15) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`id`, `title`, `discription`, `price`, `category`, `image`) VALUES
(1, 'Idli Sambhar', 'Baked rice cakes with chetinna', 70, 'Breakfast', 'oetscLibbgidf_bigger.jpg'),
(2, 'Panner Pakora', 'Cottage cheese(Panner)  fritte', 70, 'Breakfast', 'maxresdefault.jpg'),
(3, 'Dahi Papdi Chaat', 'Home made pastry crisps topped', 70, 'Breakfast', 'papdi-chaat.jpg'),
(4, 'Veg. Samosa', 'Turn overs filed with lightly ', 70, 'Breakfast', 'vegetarian-samosa.jpg'),
(5, 'Aloo Tikki Chaat', 'Grilled fried potatoes patties', 70, 'Breakfast', 'tikki-2.jpg'),
(6, 'Aloo Paratha', 'flattened bread with a filling', 60, 'Breakfast', 'images (8).jpg'),
(7, 'Spring Rolls', 'Chinese deliquites of herbs an', 70, 'Breakfast', 'Mini_Vegetable_Spring_Rolls_Soc.jpg'),
(8, 'Gulab Jamun', 'Milk Dumpling in warm sweet cardamom syrup', 120, 'dessert', 'images (1).jpg'),
(9, 'Kheer', 'Fragrant rice with milk and cashewnuts', 120, 'dessert', 'images (2).jpg'),
(10, 'Pista Kulfi', 'Traditional Indian pistachio icecraem', 120, 'dessert', 'images (3).jpg'),
(11, 'Ras Malai', 'Patties of fresh homemade cottage cheese in sweetened ', 120, 'dessert', 'images (6).jpg'),
(12, 'lemonade', 'Sweetened lime water with a zest of fresh mint ', 60, 'bevereges', 'download.jpg'),
(13, 'oreo shake', 'Blended ice cream, milk, and chocolate oreo cookies ', 120, 'bevereges', 'images (15).jpg'),
(14, 'Kit-Kat Shake', 'A blend o ice cream, Kit Kat bar, milk, and vanilla extract ', 120, 'bevereges', 'images (16).jpg'),
(15, 'Cold Coffee', 'Cold brussied coffee with delicies of fresh wipped cream', 120, 'bevereges', '53842591.jpg'),
(16, 'Cheese Frankie', 'aloo filling wraped in mayonnaise coleslaw', 70, 'Fastfood', 'hufj.jpg'),
(17, 'Thai wraps', 'thai styled chineese deliqiuites in flour tortilla', 120, 'Fastfood', 'spring-roll-wraps_04-27-14_1_ca.jpg'),
(18, 'Red sauce Pasta', 'italian romano tomatoes sauce with penne pasta with a blend ', 200, 'Dinner', 'images (9).jpg'),
(19, 'Mexican Burrito', 'Mexican style kidney beans and guacamole sauce in maize tort', 200, 'Dinner', 'images (11).jpg'),
(20, 'eNCHILADAS', 'ITAlian wraps with italian romano red sauce', 200, 'Dinner', 'images (12).jpg'),
(21, 'Italian rAVIOLI', 'boiled and filled pasta in white sauce', 200, 'Dinner', 'images (18).jpg'),
(22, 'Lasagna', 'italian rice deliquity', 200, 'Dinner', 'images (13).jpg'),
(25, 'Pizza', 'Yummy Pizzas', 70, 'Fastfood', '36181024-food-wallpapers.jpg'),
(26, 'Pizzas', 'akjhsckas', 70, 'Fastfood', '36181024-food-wallpapers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(6) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `itemid` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` int(6) DEFAULT NULL,
  `total` int(6) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `username`, `itemid`, `quantity`, `price`, `total`, `OrderDate`) VALUES
(1, '@Bansi', 2, 1, 70, 70, '2017-04-09 13:26:54'),
(2, '@Bansi', 1, 1, 70, 70, '2017-04-09 13:26:54'),
(3, '@Bansi', 3, 4, 70, 280, '2017-04-09 13:26:54'),
(4, '@Bansi', 2, 1, 70, 70, '2017-04-09 13:52:58'),
(5, '@Bansi', 1, 1, 70, 70, '2017-04-09 13:52:58'),
(6, '@Bansi', 2, 1, 70, 70, '2017-04-09 13:59:24'),
(7, '@Bansi', 1, 1, 70, 70, '2017-04-09 13:59:24'),
(8, '$niket', 14, 1, 120, 120, '2017-04-09 15:33:34'),
(9, '$niket', 19, 1, 200, 200, '2017-04-09 15:33:34'),
(10, '$niket', 12, 1, 60, 60, '2017-04-09 15:33:34'),
(11, '@Denish_rana', 12, 1, 60, 60, '2017-04-09 16:04:11'),
(12, '@Bansi', 1, 1, 70, 70, '2017-04-10 12:08:49'),
(13, '@Bansi', 2, 1, 70, 70, '2017-04-10 12:08:49'),
(14, '@Bansi', 1, 1, 70, 70, '2017-04-10 20:13:39'),
(15, '@Bansi', 1, 1, 70, 70, '2017-04-10 20:13:39'),
(16, '@kamal', 5, 5, 70, 350, '2017-04-11 10:26:19'),
(17, '@kamal', 3, 4, 70, 280, '2017-04-11 10:26:19'),
(18, '@Bansi', 1, 3, 70, 210, '2017-04-11 10:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `tablebook`
--

CREATE TABLE `tablebook` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `tid` varchar(20) NOT NULL,
  `maxperson` int(1) NOT NULL,
  `booking_date` varchar(20) DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `mobile_no` bigint(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablebook`
--

INSERT INTO `tablebook` (`id`, `name`, `tid`, `maxperson`, `booking_date`, `start_time`, `end_time`, `mobile_no`) VALUES
(1, NULL, '2A', 2, NULL, NULL, NULL, NULL),
(2, NULL, '2B', 2, NULL, NULL, NULL, NULL),
(3, NULL, '2C', 2, NULL, NULL, NULL, NULL),
(4, NULL, '11@b', 8, NULL, NULL, NULL, NULL),
(5, NULL, '2D', 2, NULL, NULL, NULL, NULL),
(6, NULL, 'asiuy', 3, NULL, NULL, NULL, NULL),
(7, NULL, '4A', 4, NULL, NULL, NULL, NULL),
(8, NULL, '4B', 4, NULL, NULL, NULL, NULL),
(9, NULL, '4C', 4, NULL, NULL, NULL, NULL),
(10, NULL, '4D', 4, NULL, NULL, NULL, NULL),
(11, NULL, '4E', 4, NULL, NULL, NULL, NULL),
(12, NULL, '6A', 6, NULL, NULL, NULL, NULL),
(13, NULL, '6B', 6, NULL, NULL, NULL, NULL),
(14, NULL, '8A', 8, NULL, NULL, NULL, NULL),
(15, NULL, '8B', 8, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tableinfo`
--

CREATE TABLE `tableinfo` (
  `id` int(6) UNSIGNED NOT NULL,
  `tid` varchar(30) NOT NULL,
  `maxperson` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableinfo`
--

INSERT INTO `tableinfo` (`id`, `tid`, `maxperson`) VALUES
(1, '2A', 2),
(2, '2B', 2),
(3, '2C', 2),
(5, '2D', 2),
(7, '4A', 4),
(8, '4B', 4),
(9, '4C', 4),
(10, '4D', 4),
(11, '4E', 4),
(12, '6A', 6),
(13, '6B', 6),
(15, '8B', 8);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `PersonID` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `question` text,
  `answer` text,
  `address` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`PersonID`, `name`, `pwd`, `email`, `phone`, `question`, `answer`, `address`) VALUES
(1, '@Bansi', 'nN1!hello', 'bansikasundra4452@gmail.com', 8141744452, 'What was your favorite place to visit as a child?', 'Home', 'Vaniyavad Circle'),
(2, '$niket', 'Niket5!!', 'nk@fd', 9427318170, 'Which is the Most memorable trip you ever had?', 'nadiad', '8,new swastik society,\r\nhell'),
(3, '@denish_rana', 'aA1!hello', 'rdx@gmail.com', 9724510655, 'What was your favorite place to visit as a child?', 'Home', 'Hell'),
(4, '@Jack', 'jJ1!hello', 'jack@gmail.com', 8141744552, 'What is your Family Pet Name?', 'jacky', NULL),
(5, '@kamal', 'Kamal@1234', 'kamal@gmail.com', 9999999999, 'Which is the Most memorable trip you ever had?', 'HP', 'Pij Road,\r\nNadiad-387002\r\n'),
(6, '$Max', 'mM1!hello', 'max@gmail.com', 9876541230, 'What was your favorite place to visit as a child?', 'Home', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userreview`
--

CREATE TABLE `userreview` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comments` text,
  `ratingser` int(6) DEFAULT NULL,
  `ratingfood` int(6) DEFAULT NULL,
  `apply` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userreview`
--

INSERT INTO `userreview` (`id`, `name`, `email`, `comments`, `ratingser`, `ratingfood`, `apply`) VALUES
(1, '@Bansi', 'bansikasundra4452@gmail.com', 'It was wonderful experience!!', 5, 5, 1),
(4, '@Bansi', 'bansikasundra4452@gmail.com', 'hellsjkjdsc', 4, 3, 1),
(3, '@Jack', 'jack@gmail.com', 'Had a great time having bday party !!\r\nLoved the food and services provided.', 4, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booktable`
--
ALTER TABLE `booktable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itmorder`
--
ALTER TABLE `itmorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `tablebook`
--
ALTER TABLE `tablebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tableinfo`
--
ALTER TABLE `tableinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`PersonID`);

--
-- Indexes for table `userreview`
--
ALTER TABLE `userreview`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booktable`
--
ALTER TABLE `booktable`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `itmorder`
--
ALTER TABLE `itmorder`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tablebook`
--
ALTER TABLE `tablebook`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tableinfo`
--
ALTER TABLE `tableinfo`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `PersonID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userreview`
--
ALTER TABLE `userreview`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
