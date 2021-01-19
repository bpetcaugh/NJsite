-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2021 at 09:38 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `njuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `volume_num` varchar(10) NOT NULL,
  `volume_name` varchar(100) NOT NULL,
  `chapter_num` varchar(5) NOT NULL,
  `chapter_name` varchar(100) NOT NULL,
  `subch_num` int(11) NOT NULL,
  `subch_name` varchar(100) NOT NULL,
  `policy_num` varchar(50) NOT NULL,
  `policy_name` varchar(250) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `visible` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `policychanges`
--

CREATE TABLE `policychanges` (
  `change_id` int(11) NOT NULL,
  `policy_name` varchar(1000) NOT NULL,
  `version_num` int(255) NOT NULL,
  `date` varchar(15) NOT NULL,
  `reasoning` varchar(9999) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `policyupdates`
--

CREATE TABLE `policyupdates` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `policyid` varchar(50) NOT NULL,
  `typeofupdate` varchar(100) NOT NULL,
  `changestatus` varchar(100) NOT NULL,
  `approvedby` varchar(50) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedate` date DEFAULT NULL,
  `comments` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `office` varchar(50) NOT NULL DEFAULT 'DCF',
  `costCode` varchar(50) NOT NULL DEFAULT '000',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accessLevel` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policychanges`
--
ALTER TABLE `policychanges`
  ADD PRIMARY KEY (`change_id`);

--
-- Indexes for table `policyupdates`
--
ALTER TABLE `policyupdates`
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
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057;
--
-- AUTO_INCREMENT for table `policychanges`
--
ALTER TABLE `policychanges`
  MODIFY `change_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `policyupdates`
--
ALTER TABLE `policyupdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;