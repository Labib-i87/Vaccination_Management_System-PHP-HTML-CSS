-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 05:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse471_vaccination_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(1) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'hasin123', 'admin1'),
(2, 'Labib', 'asdf'),
(3, 'Nisharga', 'Streamer');

-- --------------------------------------------------------

--
-- Table structure for table `external_db`
--

CREATE TABLE `external_db` (
  `nid` varchar(10) NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `external_db`
--

INSERT INTO `external_db` (`nid`, `phone_number`) VALUES
('0987654321', '01775464232'),
('1234567890', '01775464231'),
('4664778315', '01775464233'),
('8014532769', '01723456897');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_id`, `name`, `address`) VALUES
(100, 'Square Hospital', '18/F, Bir Uttam Qazi Nuruzzaman  Sarak, West Panthapath'),
(201, 'Evercare Hospital', 'Plot: 81, Block: E, Bashundhara R/A, Dhaka 1229, Bangladesh'),
(303, 'United Hospital Limited', 'Plot: 15, Road: 71, Gulshan, Dhaka-1212, Bangladesh'),
(467, 'Labaid Specialized Hospital', 'House: 06, Road: 04, Dhanmondi, Dhaka- 1205, Bangladesh'),
(499, 'BIRDEM General Hospital', 'Shahbag Square, 122 Kazi Nazrul Islam Ave, Dhaka- 1000');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `comb_id` int(4) NOT NULL,
  `h_id` int(4) NOT NULL,
  `vac_name` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`comb_id`, `h_id`, `vac_name`, `date`, `quantity`) VALUES
(2, 100, 'AstraZeneca(COVID)', '2022-08-30', 99),
(3, 100, 'AstraZeneca(COVID)', '2022-08-31', 99),
(4, 100, 'Influvax(Influenza)', '2022-08-29', 100),
(5, 100, 'Influvax(Influenza)', '2022-08-30', 100),
(6, 100, 'Influvax(Influenza)', '2022-08-31', 100),
(17, 201, 'Hepavax B(Hepatitis B)', '2022-08-29', 500),
(18, 201, 'Hepavax B(Hepatitis B)', '2022-08-30', 498),
(19, 201, 'Hepavax B(Hepatitis B)', '2022-08-31', 500),
(20, 201, 'Varilrix(Chicken Pox)', '2022-08-29', 98),
(21, 201, 'Varilrix(Chicken Pox)', '2022-08-30', 100),
(22, 201, 'Varilrix(Chicken Pox)', '2022-08-31', 100),
(23, 303, 'Vaxphoid(Typhoid)', '2022-08-29', 499),
(24, 303, 'Vaxphoid(Typhoid)', '2022-08-30', 500),
(25, 303, 'Vaxphoid(Typhoid)', '2022-08-31', 500),
(26, 303, 'Vaxitet(Tetanus)', '2022-08-29', 499),
(27, 303, 'Vaxitet(Tetanus)', '2022-08-30', 500),
(28, 303, 'Vaxitet(Tetanus)', '2022-08-31', 499),
(29, 467, 'AstraZeneca(COVID)', '2022-08-29', 100),
(30, 467, 'AstraZeneca(COVID)', '2022-08-30', 99),
(31, 467, 'AstraZeneca(COVID)', '2022-08-31', 100),
(32, 467, 'Influvax(Influenza)', '2022-08-29', 100),
(33, 467, 'Influvax(Influenza)', '2022-08-30', 100),
(34, 467, 'Influvax(Influenza)', '2022-08-31', 100),
(35, 467, 'Vaxphoid(Typhoid)', '2022-08-29', 500),
(36, 467, 'Vaxphoid(Typhoid)', '2022-08-30', 500),
(37, 467, 'Vaxphoid(Typhoid)', '2022-08-31', 500),
(38, 499, 'AstraZeneca(COVID)', '2022-08-29', 99),
(39, 499, 'AstraZeneca(COVID)', '2022-08-30', 100),
(40, 499, 'AstraZeneca(COVID)', '2022-08-31', 100),
(41, 499, 'Hepavax B(Hepatitis B)', '2022-08-29', 500),
(42, 499, 'Hepavax B(Hepatitis B)', '2022-08-30', 500),
(43, 499, 'Hepavax B(Hepatitis B)', '2022-08-31', 499),
(44, 499, 'Influvax(Influenza)', '2022-08-29', 100),
(45, 499, 'Influvax(Influenza)', '2022-08-30', 100),
(46, 499, 'Influvax(Influenza)', '2022-08-31', 100),
(47, 499, 'Varilrix(Chicken Pox)', '2022-08-29', 100),
(48, 499, 'Varilrix(Chicken Pox)', '2022-08-30', 100),
(49, 499, 'Varilrix(Chicken Pox)', '2022-08-31', 100),
(50, 499, 'Vaxitet(Tetanus)', '2022-08-29', 500),
(51, 499, 'Vaxitet(Tetanus)', '2022-08-30', 500),
(52, 499, 'Vaxitet(Tetanus)', '2022-08-31', 500),
(53, 499, 'Vaxphoid(Typhoid)', '2022-08-29', 500),
(54, 499, 'Vaxphoid(Typhoid)', '2022-08-30', 500),
(55, 499, 'Vaxphoid(Typhoid)', '2022-08-31', 499);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `email` varchar(100) NOT NULL,
  `otp` int(6) NOT NULL,
  `nid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `nid` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `address` varchar(60) NOT NULL,
  `verified` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nid`, `email`, `password`, `fname`, `lname`, `address`, `verified`) VALUES
(12, '1234567890', 'liushen6713@gmail.com', '$2y$10$SDKY5DgiG3VuYN4eMuBWceD/gCKyo21HznmlK.ZO40gxOo53aingW', 'Hasin', '', 'Not BRAC', 'true'),
(29, '0987654321', 'hasin.sarwar.ifty@g.bracu.ac.bd', '$2y$10$IujrQODrOP9.TAizerg4neV2DIwlm6578EeCPxY0p2zmXMbfd6WNS', 'White', 'Cifer', 'BRAC', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_history`
--

CREATE TABLE `vaccine_history` (
  `id` int(5) NOT NULL,
  `comb_id` int(4) NOT NULL,
  `fpayment` varchar(10) NOT NULL,
  `fvaccine` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_history`
--

INSERT INTO `vaccine_history` (`id`, `comb_id`, `fpayment`, `fvaccine`) VALUES
(12, 20, 'Paid', 'Vaccinated'),
(12, 28, 'Paid', 'Vaccinated'),
(12, 55, 'Paid', 'Vaccinated'),
(29, 18, 'Paid', 'Vaccinated'),
(29, 23, 'Paid', 'Vaccinated'),
(29, 30, 'Not Paid', 'Not Vaccinated');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_price`
--

CREATE TABLE `vaccine_price` (
  `vac_name` varchar(40) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_price`
--

INSERT INTO `vaccine_price` (`vac_name`, `price`) VALUES
('AstraZeneca(COVID)', 112),
('Hepavax B(Hepatitis B)', 700),
('Influvax(Influenza)', 900),
('Varilrix(Chicken Pox)', 8300),
('Vaxitet(Tetanus)', 300),
('Vaxphoid(Typhoid)', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `external_db`
--
ALTER TABLE `external_db`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`comb_id`),
  ADD KEY `h_id` (`h_id`),
  ADD KEY `vac_name` (`vac_name`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`email`,`otp`,`nid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vaccine_history`
--
ALTER TABLE `vaccine_history`
  ADD PRIMARY KEY (`id`,`comb_id`),
  ADD KEY `vaccine_history_ibfk_2` (`comb_id`);

--
-- Indexes for table `vaccine_price`
--
ALTER TABLE `vaccine_price`
  ADD PRIMARY KEY (`vac_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `comb_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_h_id_to_hospital_h_id` FOREIGN KEY (`h_id`) REFERENCES `hospital` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_vac_name_to_vaccine_price_vac_name` FOREIGN KEY (`vac_name`) REFERENCES `vaccine_price` (`vac_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_nid_to_external_db_nid` FOREIGN KEY (`nid`) REFERENCES `external_db` (`nid`);

--
-- Constraints for table `vaccine_history`
--
ALTER TABLE `vaccine_history`
  ADD CONSTRAINT `vaccine_history_ibfk_2` FOREIGN KEY (`comb_id`) REFERENCES `inventory` (`comb_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccine_history_ibfk_3` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
