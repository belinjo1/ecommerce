-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 10:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbushecanten`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `country` varchar(20) NOT NULL,
  `subjecti` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `firstname`, `lastname`, `country`, `subjecti`) VALUES
(1, 'Lionel', 'Messi', 'gjilan', 'A keni nevoje per rreklamim, 10 poste ne story 1 parfum, 20 poste nje ore, \r\noferte serioze, me lajmroni ne 044111222');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `orderedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `title`, `price`, `name`, `lastname`, `address`, `street`, `zip`, `country`, `orderedat`) VALUES
(2, 'Polo', '95$', 'Bajram ', 'Latifaj', 'Hogosht', 'Isa Kastrati', 62050, 'Prishtine', '2021-02-10 21:30:05'),
(3, 'Polo', '95$', 'Blerim', 'Morina', 'Topanice', 'Ngusht', 62000, 'Gjilan', '2021-02-10 21:33:22'),
(4, 'Polo', '95$', 'Riad', 'Spahiu', 'Riadi123', 'Kaqanik', 5555, 'Gjilan', '2021-02-10 21:39:48'),
(5, 'Polo', '95$', 'Diamant', 'Latifaj', 'Hogosht', 'Isa Kastrati', 62050, 'Gjilan', '2021-02-10 22:32:43'),
(6, 'Polo', '95$', 'Ismail', 'Qemali', 'Vlore', 'Kosova', 52000, 'Gjilan', '2021-02-10 22:34:07'),
(14, 'Polo', '95$', 'sadasdsa', 'asdasdsad', 'sad', 'asdasddsa', 23, 'Gjilan', '2021-02-10 23:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `productname`, `price`) VALUES
(1, '../Products/Images/BlackHugo.jpg', 'Black Hugo', '125$'),
(2, '../Products/Images/CK.jpg', 'Calvin Klein', '134$'),
(14, '../Products/Images/Polo.jpg', 'Polo', '95$'),
(20, '../Products/Images/BleuDeChanel.jpg', 'Channel', '150$'),
(21, '../Products/Images/Diesel.jpg', 'Diesel', '100$'),
(22, '../Products/Images/DiorSauvage.jpg', 'Sauvage', '130$'),
(23, '../Products/Images/GucciGuilty.jpg', 'Gucci Guilty', '135$'),
(24, '../Products/Images/HugoBoss.jpg', 'Boss', '120$'),
(25, '../Products/Images/Invictus.jpg', 'Invictus', '100$'),
(26, '../Products/Images/JeanPaul.jpg', 'J.Paul', '115$'),
(28, '../Products/Images/Joop.jpg', 'Joop', '140$'),
(29, '../Products/Images/Lacoste.jpg', 'Lacoste', '90$'),
(30, '../Products/Images/OneMillion.jpg', '1 Million', '130$');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdat` timestamp NULL DEFAULT current_timestamp(),
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pwd`, `email`, `createdat`, `role`) VALUES
(1, 'bajram2000', 'latifaj2000', 'latifajj@gmail.com', '2021-01-18 15:50:41', 1),
(2, 'blerim2000', 'morina2000', 'belinjo1@gmail.com', '2021-01-18 15:56:36', 1),
(3, 'kosova123', 'kosova123', 'kosova123@gmail.com', '2021-01-18 21:22:18', 0),
(4, 'juventus123', 'juventus123', 'juventus@gmail.com', '2021-01-18 22:12:43', 0),
(5, 'blerimabababa', 'kosova321', 'blerimbabaj@gmail.com', '2021-01-22 19:55:58', 0),
(7, 'cristiano07', 'juventus123', 'cristironaldo@gmail.com', '2021-01-24 17:22:36', 0),
(8, 'leomessi10', 'messi2021', 'leomessi10@gmail.com', '2021-01-24 17:23:57', 0),
(9, 'kosova333', 'kosova333', 'kosova333@gmx.ch', '2021-01-24 17:28:16', 0),
(11, 'bajramlat', 'kosovaa123', 'latifaj@gmail.com', '2021-02-11 21:24:33', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
