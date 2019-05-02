-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2019 at 09:51 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votting`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_vote`
--

CREATE TABLE `acc_vote` (
  `v_id` int(11) NOT NULL,
  `n_id` int(40) NOT NULL,
  `s_regno` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_vote`
--

INSERT INTO `acc_vote` (`v_id`, `n_id`, `s_regno`) VALUES
(1, 8, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `time`) VALUES
(1, 'user', 'admin', '2019-03-15 17:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `count_id` int(11) NOT NULL,
  `n_id` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominate`
--

CREATE TABLE `nominate` (
  `n_id` int(11) NOT NULL,
  `n_regno` varchar(40) NOT NULL,
  `n_name` varchar(40) NOT NULL,
  `n_dept_no` varchar(40) NOT NULL,
  `n_dept_name` varchar(40) NOT NULL,
  `black_mark` varchar(40) NOT NULL,
  `posting` varchar(40) NOT NULL,
  `dp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominate`
--

INSERT INTO `nominate` (`n_id`, `n_regno`, `n_name`, `n_dept_no`, `n_dept_name`, `black_mark`, `posting`, `dp`) VALUES
(6, '123456', 'gowtham', '123', 'mca', 'no', 'precedent', 'Chrysanthemum.jpg'),
(7, '123457', 'pandi', '144', 'cse', 'no', 'vice precedent', 'Hydrangeas.jpg'),
(8, '123458', 'naveen', '143', 'eee', 'no', 'Accedamy', 'Koala.jpg'),
(9, '123459', 'mani', '100', 'BE', 'no', 'sports', 'Tulips.jpg'),
(10, '9095169428', 'karthi', '100', 'MCA', 'no', 'precedent', 'IMG_20170112_111752526.jpg'),
(11, '9875461230', 'ari', '200', 'asdasd', 'no', 'precedent', 'IMG_20161029_101837713.jpg'),
(12, '9875461231', 'aasdasd', '200', 'asdasd', 'no', 'vice precedent', 'IMG_20161024_100954466.jpg'),
(13, '9875461232', 'asdxcx', '200', 'asdasd', 'no', 'vice precedent', 'IMG_20161115_171856417.jpg'),
(14, '9875461234', 'zxcxzc', '200', 'asdasd', 'no', 'Accedamy', 'IMG_20170112_110055587.jpg'),
(15, '9875461235', 'zxcxzc', '200', 'asdasd', 'no', 'sports', 'IMG_20170112_110802792_HDR.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ps_vote`
--

CREATE TABLE `ps_vote` (
  `v_id` int(11) NOT NULL,
  `n_id` int(40) NOT NULL,
  `s_regno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_vote`
--

INSERT INTO `ps_vote` (`v_id`, `n_id`, `s_regno`) VALUES
(1, 6, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `sports_vote`
--

CREATE TABLE `sports_vote` (
  `id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL,
  `s_regno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports_vote`
--

INSERT INTO `sports_vote` (`id`, `v_id`, `n_id`, `s_regno`) VALUES
(1, 0, 9, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `dept_no` int(20) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `otp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `reg_no`, `name`, `dept_no`, `dept_name`, `email`, `password`, `phone`, `otp`) VALUES
(5, '123456', 'gowtham', 123, 'mca', 'gowthamvnb92@gmail.com', '1144', '9789445528', '7345'),
(6, '123457', 'pandi', 144, 'cse', 'pandi@fabhost.in', 'pandi', '', ''),
(7, '123458', 'naveen', 143, 'eee', 'naveen@fabhost.in', 'naveen', '', ''),
(8, '123459', 'mani', 100, 'BE', 'mani@fabhost.in', 'mani', '', ''),
(14, '9095169428', 'karthi', 100, 'MCA', 'karthisg.sg@gmail.com', 'sgk97sgk', '9095169428', ''),
(15, '9875461230', 'ari', 200, 'asdsa', 'ari02@gmai.com', '123456', '9875461230', ''),
(16, '9875461231', 'ajith', 200, 'asdsa', 'asdsa', '123456', '9875461231', ''),
(17, '9875461232', 'mahesh', 200, 'asdsa', 'asdsa', '123456', '9875461232', ''),
(18, '9875461234', 'mahesh', 200, 'asdsa', 'asdsa', '123456', '9875461233', ''),
(19, '9875461235', 'tppp', 200, 'asdsa', 'asdsa', '123456', '9875461234', '');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `t_id` int(11) NOT NULL,
  `n_id` text NOT NULL,
  `total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`t_id`, `n_id`, `total`) VALUES
(1, '6', '2'),
(2, '7', '2'),
(3, '9', '1'),
(4, '8', '1');

-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE `voted` (
  `v_no` int(11) NOT NULL,
  `reg_no` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voted`
--

INSERT INTO `voted` (`v_no`, `reg_no`) VALUES
(21, '123456'),
(22, '123456'),
(23, '123456'),
(24, '123456'),
(25, '123456'),
(26, '123456'),
(27, '123456'),
(28, '123456'),
(29, '123456'),
(30, '123456'),
(31, '123456'),
(32, '123456'),
(33, '123456'),
(34, '123456'),
(35, '123457'),
(36, '123457'),
(37, '123458'),
(38, '123458'),
(39, '123459'),
(40, '123459'),
(41, '123459'),
(42, '123459'),
(43, '123459'),
(44, '123459'),
(45, '123459'),
(46, '123459'),
(47, '123459'),
(48, '123459'),
(49, '123459'),
(50, '123459'),
(51, '123456'),
(52, '123456'),
(53, '123456'),
(54, '123456'),
(55, '123456'),
(56, '123456'),
(57, '123456'),
(58, '123456'),
(59, '123456'),
(60, '123456'),
(61, '123456'),
(62, '123456'),
(63, '123456'),
(64, '123456'),
(65, '123456'),
(66, '123456'),
(67, '123456'),
(68, '123456'),
(69, '123456'),
(70, '123456'),
(71, '123456'),
(72, '123456'),
(73, '123456'),
(74, '123456'),
(75, '123456'),
(76, '2147483647'),
(77, '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `vp`
--

CREATE TABLE `vp` (
  `v_id` int(11) NOT NULL,
  `n_id` int(40) NOT NULL,
  `s_regno` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vp`
--

INSERT INTO `vp` (`v_id`, `n_id`, `s_regno`) VALUES
(10, 1, 1),
(11, 1, 2),
(12, 7, 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_vote`
--
ALTER TABLE `acc_vote`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`count_id`);

--
-- Indexes for table `nominate`
--
ALTER TABLE `nominate`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `ps_vote`
--
ALTER TABLE `ps_vote`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `sports_vote`
--
ALTER TABLE `sports_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`v_no`);

--
-- Indexes for table `vp`
--
ALTER TABLE `vp`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_vote`
--
ALTER TABLE `acc_vote`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `count`
--
ALTER TABLE `count`
  MODIFY `count_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominate`
--
ALTER TABLE `nominate`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ps_vote`
--
ALTER TABLE `ps_vote`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sports_vote`
--
ALTER TABLE `sports_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voted`
--
ALTER TABLE `voted`
  MODIFY `v_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `vp`
--
ALTER TABLE `vp`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
