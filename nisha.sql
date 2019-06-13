-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 09:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nisha`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` varchar(10) NOT NULL,
  `event_name` char(25) NOT NULL,
  `event_vanue` char(12) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_cost` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_vanue`, `start_date`, `end_date`, `event_cost`) VALUES
('c002', ' Sagar Fiesta', 'sistec-gn', '2019-05-02', '2019-06-05', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `mobile_no` varchar(10) NOT NULL,
  `name` char(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `role` char(12) NOT NULL DEFAULT 'participants',
  `password` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`mobile_no`, `name`, `email`, `role`, `password`, `status`) VALUES
('1232423423', 'veer23', '121212@gmail.com', 'participants', '121212', 1),
('7878787', 'veer234', 'raheem@gmail.com', 'users', '565656', 2),
('831970196', 'veer', 'vishwaslodhi03@gmail', 'participants', 'veer123456', 2),
('9981015328', 'vishwas', 'vishwas@g.com', 'admin', 'veer1234', 1),
('9988776654', 'Deepak', 'deepak@gmail.com', 'users', '12345', 1),
('9988776655', 'vishwaslodhi', 'vishwas@gmail.com', 'participants', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `gender` char(1) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`mobile_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `contact_no` (`contact_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
