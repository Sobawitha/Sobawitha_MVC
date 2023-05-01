-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 09:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sobawitha`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_flag` int(11) NOT NULL,
  `nic_no` varchar(12) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `profile_picture` text NOT NULL,
  `address_line_one` varchar(255) NOT NULL,
  `address_line_two` varchar(255) NOT NULL,
  `address_line_three` varchar(255) NOT NULL,
  `address_line_four` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `bank_account_no` varchar(100) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `bank_account_name` varchar(255) NOT NULL,
  `qualifications` text DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL,
  `verify_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_flag`, `nic_no`, `contact_no`, `email`, `dob`, `profile_picture`, `address_line_one`, `address_line_two`, `address_line_three`, `address_line_four`, `password`, `gender`, `bank_account_no`, `bank`, `branch`, `bank_account_name`, `qualifications`, `active_status`, `verify_token`) VALUES
(17, 'Ruwandi', 'Mayunika', 5, '20001458763', '0715842631', 'ruwandi@gmail.com', NULL, 'Men_Default_Avatar.png', '', '', '', '', '$2y$10$wnhSq.AdQUqalq.4T048QuAOqiirnJyECEUyPg98DZR', 'f', '', '', '', '', 'Diploma in Agriculture', 0, ''),
(18, 'Kavisha', 'Abeynayake', 3, '994528765', '0711234568', 'kavisha@ucsc.lk', '2022-11-18', 'Men_Default_Avatar.png', '', '', '', '', '$2y$10$nUlkDjDN2Mn2AdLlowdSAODkAy4SEJwHKvhBftaypnu', 'm', '', '', '', '', NULL, 0, ''),
(19, 'Sihina', 'Dilneth', 5, '200151001259', '0777777777', 'thilina@gmail.com', '1992-11-10', 'Men_Default_Avatar.png', '', '', '', '', '$2y$10$wnhSq.AdQUqalq.4T048QuAOqiirnJyECEUyPg98DZR', 'm', '', '', '', '', 'Bsc.hons of agri-culture', 0, ''),
(34, 'ddc', 'dvdfd', 1, '8458488v', '5215515', 'dffdff@gmail.com', '2023-02-03', 'ddc dvdfd_Same2.jpg', 'scscsc', 'vvvvdvd', 'vdvdv', 'cdcdc', '$2y$10$5LesLrMpHTBmfc1rPTKjWuHsp7CkslOe/e36Jo5c.FI', 'M', 'zxxzxxxsx', 'cscscc', 'cscsc', 'cscsc', '', 0, ''),
(35, 'dsdsd', 'dsdsd', 1, '15552115sxsx', '4151516115', 'sdsds@gmail.com', '2023-02-13', 'dsdsd dsdsd_lambo2.jpg', 'sxsxsx', 'xsxsxsxsx', 'sxsxsxsxscdc', 'cdcdcdcdccd', '$2y$10$xdG5y7ZpO0bJmfY1R7UzWeYIQcukebFCPl4Ncto48hY', 'M', 'dcdcdc', 'cdcdcd', 'cdcdcd', 'cdcdcd', '', 1, ''),
(36, 'Naveendra', 'jold', 4, '15552115xsxs', '0715856243', 'dsds@gmail.com', '2023-02-14', 'jloll jold_White Lambo.jpg', '251', 'njnhnhhh', 'dcdcd', 'dcdcddv', '$2y$10$dIjgwhqKeAJNClMWFM9miu8SV3Ab3hBrivvWJ.AVoix', 'M', '505050505050', 'xcjhshcnhj', 'cmmdcd', 'csccscscscs', '', 1, ''),
(37, 'Punsara', 'cdcdcm', 3, '992142251155', '0715856243', 'ssdsd@gmnail.com', '2023-02-07', 'hhjjkkj cdcdcm_Same2.jpg', '52', 'xsxskk', 'dcjjjjd', 'ksjndjsj', '$2y$10$wnhSq.AdQUqalq.4T048QuAOqiirnJyECEUyPg98DZR', 'M', '15515626ds', 'Commercial', 'Matara', 'DPD Yapa', '', 1, ''),
(39, 'Devin', 'Yapa', 1, '992142200V', '071 927373', 'devin@sobawitha.lk', '1999-08-01', 'Men_Default_Avatar.png', '58/B', 'Yehiya Road', 'Issadeen Town', 'Matara', '$2y$10$LVEJ0PWH0hdsshipmDRAzO5TZ..bXQde7QIDMt9pBHs1bYiyqIlQ2', 'M', '84056742', 'Commercial', 'Matara', 'DPD Yapa', '', 1, ''),
(41, 'Supun', 'Dilshan', 2, '993145580V', '0714586974', 'supun@sobawitha.lk', '1998-08-01', 'Supun Dilshan_lambo4.jpg', '47', 'Galle Road', 'Karapitiya', 'Galle', '$2y$10$iJ2yJz8uy.G/rUCnQF2Vae0gw95YMVtbcuAG0n85WKNj4xF4/bYzG', 'M', '123789456', 'Sampath', 'Galle', 'SD Gunarathna', '', 1, ''),
(43, 'Ruwandi', 'Mayunika', 5, '200001301216', '0711234567', 'ruwandi@sobawitha.lk', '2001-01-08', 'Ruwandi Mayunika_profile.jpg', '78', 'Welipitiya Road', 'Weligama', 'Matara', '$2y$10$rPbWdeaPuUlJc5IxiSg4yOP3ZVXL.kqMoJT0iGHfgp6TM3pKPsZoK', 'F', '', '', '', '', 'Ruwandi Mayunika_UI structure.txt', 1, '50218a2bb129a3189b6c62505108c013'),
(44, 'Supun', 'Dilshan', 3, '992187200V', '0719273789', 'yapadevin@gmail.com', '1999-08-01', 'Supun Dilshan_White Lambo Eve.jpg', '47', 'Galle Road', 'Nupe', 'Matara', '$2y$10$JnnAGBc8B5x0NfKzrcxH..OFJhp4wq.Zpj8QEJFprOWjgW7g/Ttf.', 'M', '84056742', 'Commercial', 'Matara', 'SD Gunarathna', '', 1, '3caafacfdf1e3e036d16ccb73abc88a0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nic_no` (`nic_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
