-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 01:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bursary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `session` text NOT NULL,
  `term` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `session`, `term`) VALUES
(1, 'PMS', '8f96e4f5fcff936298f13a4b8db8a242', '2021/2022', '2nd Term');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `fee` text NOT NULL,
  `amt` text NOT NULL,
  `term` text NOT NULL,
  `ses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feercrd`
--

CREATE TABLE `feercrd` (
  `id` int(11) NOT NULL,
  `feeid` text NOT NULL,
  `stid` text NOT NULL,
  `adid` text NOT NULL,
  `amount` text NOT NULL,
  `descr` text NOT NULL,
  `moredecr` text NOT NULL,
  `name` text NOT NULL,
  `fname` text NOT NULL,
  `class` text NOT NULL,
  `session` text NOT NULL,
  `term` text NOT NULL,
  `mode` text NOT NULL,
  `datepaid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ses`
--

CREATE TABLE `ses` (
  `id` int(11) NOT NULL,
  `ses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ses`
--

INSERT INTO `ses` (`id`, `ses`) VALUES
(1, '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `spillover`
--

CREATE TABLE `spillover` (
  `id` int(11) NOT NULL,
  `spillid` text NOT NULL,
  `adid` text NOT NULL,
  `amount` text NOT NULL,
  `name` text NOT NULL,
  `class` text NOT NULL,
  `session` text NOT NULL,
  `term` text NOT NULL,
  `datespill` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stid` text NOT NULL,
  `adid` text NOT NULL,
  `name` text NOT NULL,
  `fname` text NOT NULL,
  `class` text NOT NULL,
  `fst` text NOT NULL,
  `snd` text NOT NULL,
  `trd` text NOT NULL,
  `session` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `id` int(11) NOT NULL,
  `trackid` text NOT NULL,
  `name` text NOT NULL,
  `date` datetime NOT NULL,
  `session` text NOT NULL,
  `term` text NOT NULL,
  `descrip` text NOT NULL,
  `amount` text NOT NULL,
  `mode` text NOT NULL,
  `type` text NOT NULL,
  `qty` text NOT NULL,
  `total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feercrd`
--
ALTER TABLE `feercrd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ses`
--
ALTER TABLE `ses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spillover`
--
ALTER TABLE `spillover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feercrd`
--
ALTER TABLE `feercrd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `ses`
--
ALTER TABLE `ses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spillover`
--
ALTER TABLE `spillover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tracker`
--
ALTER TABLE `tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
