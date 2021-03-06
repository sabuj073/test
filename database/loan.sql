-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 03:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dir`
--

CREATE TABLE `dir` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dir`
--

INSERT INTO `dir` (`id`) VALUES
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80);

-- --------------------------------------------------------

--
-- Table structure for table `loan_amount`
--

CREATE TABLE `loan_amount` (
  `id` int(11) NOT NULL,
  `tb_1000000` text NOT NULL,
  `tb_2000000` text NOT NULL,
  `tb_3000000` text NOT NULL,
  `tb_4000000` text NOT NULL,
  `tb_5000000` text NOT NULL,
  `tb_6000000` text NOT NULL,
  `tb_7000000` text NOT NULL,
  `tb_8000000` text NOT NULL,
  `tb_9000000` text NOT NULL,
  `tb_10000000` text NOT NULL,
  `tb_11000000` text NOT NULL,
  `tb_12000000` text NOT NULL,
  `tb_13000000` text NOT NULL,
  `tb_14000000` text NOT NULL,
  `tb_15000000` text NOT NULL,
  `tb_16000000` text NOT NULL,
  `tb_17000000` text NOT NULL,
  `tb_18000000` text NOT NULL,
  `tb_19000000` text NOT NULL,
  `tb_20000000` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_amount`
--

INSERT INTO `loan_amount` (`id`, `tb_1000000`, `tb_2000000`, `tb_3000000`, `tb_4000000`, `tb_5000000`, `tb_6000000`, `tb_7000000`, `tb_8000000`, `tb_9000000`, `tb_10000000`, `tb_11000000`, `tb_12000000`, `tb_13000000`, `tb_14000000`, `tb_15000000`, `tb_16000000`, `tb_17000000`, `tb_18000000`, `tb_19000000`, `tb_20000000`) VALUES
(1, '1020000', '2040000', '3060000', '4080000', '5100000', '6120000', '7140000', '8160000', '9180000', '10200000', '11220000', '12240000', '13260000', '14280000', '15300000', '16320000', '17340000', '18360000', '19380000', '20400000'),
(2, '516000', '1031000', '1546000', '2061000', '2576000', '3091000', '3606000', '4121000', '4636000', '5150000', '5666000', '6181000', '6696000', '7211000', '7726000', '8241000', '8756000', '9271000', '9786000', '10301000'),
(3, '347000', '694000', '1041000', '1388000', '1734000', '2081000', '2428000', '1775000', '3121000', '3468000', '3815000', '4126000', '4508000', '4855000', '5202000', '5549000', '5895000', '6242000', '6589000', '6936000');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `password`) VALUES
(4, 'Mehedi Hasan Sabuj', 'mhsabuj1@gmail.com', '71cddeb59a13295492f59c490edba72de828ee1b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dir`
--
ALTER TABLE `dir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_amount`
--
ALTER TABLE `loan_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dir`
--
ALTER TABLE `dir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `loan_amount`
--
ALTER TABLE `loan_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
