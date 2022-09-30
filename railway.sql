-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 29, 2022 at 02:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `from_city` varchar(50) NOT NULL,
  `destination_city` varchar(50) NOT NULL,
  `book_date` date NOT NULL,
  `booking_status` varchar(30) NOT NULL,
  `quantity` int(3) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `from_city`, `destination_city`, `book_date`, `booking_status`, `quantity`, `amount`, `user_id`) VALUES
(1, 'Karachi', 'Islamabad', '2022-09-24', 'confirmed', 2, 14000, 1),
(2, 'Lahore', 'Islamabad', '2022-09-24', 'confirmed', 4, 12000, 1),
(3, 'Karachi', 'Peshawar', '2022-10-27', 'confirmed', 5, 47500, 1),
(6, 'Karachi', 'Lahore', '2022-09-16', 'pending', 4, 22000, 4),
(7, 'Karachi', 'Lahore', '2022-10-01', 'pending', 2, 11000, 4),
(8, 'Lahore', 'Islamabad', '2022-09-24', 'pending', 3, 9000, 4),
(9, 'Lahore', 'Islamabad', '2022-09-24', 'pending', 4, 12000, 4),
(10, 'Karachi', 'Islamabad', '2022-09-30', 'pending', 2, 14000, 4),
(11, 'Karachi', 'Islamabad', '2022-09-30', 'pending', 2, 14000, 4),
(12, 'Karachi', 'Lahore', '2022-09-24', 'pending', 1, 5500, 4),
(13, 'Karachi', 'Lahore', '2022-09-24', 'pending', 1, 5500, 4),
(14, 'Karachi', 'Islamabad', '2022-09-23', 'pending', 2, 14000, 4),
(15, 'Karachi', 'Islamabad', '2022-09-29', 'pending', 3, 21000, 4),
(16, 'Karachi', 'Islamabad', '2022-09-30', 'pending', 1, 7000, 4),
(17, 'Karachi', 'Islamabad', '2022-09-30', 'confirmed', 1, 7000, 4),
(18, 'Karachi', 'Islamabad', '2022-09-30', 'confirmed', 2, 14000, 4),
(19, 'Lahore', 'Islamabad', '2022-09-30', 'pending', 1, 3000, 4),
(20, 'Peshawar', 'Lahore', '2022-10-08', 'pending', 4, 24000, 4),
(21, 'Karachi', 'Islamabad', '2022-09-30', 'pending', 1, 7000, 4),
(22, 'Karachi', 'Peshawar', '2022-10-27', 'confirmed', 2, 19000, 4),
(23, 'Lahore', 'Islamabad', '2022-10-08', 'pending', 3, 9000, 4),
(24, 'Lahore', 'Islamabad', '2022-10-07', 'confirmed', 5, 15000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `card_date` varchar(50) NOT NULL,
  `card_cvv` varchar(50) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `booking_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `card_number`, `card_date`, `card_cvv`, `card_name`, `payment_date`, `payment_status`, `booking_id`) VALUES
(1, '5032049549594', '03/23', '020', 'Hamza Sheikh', '2022-09-29', 'confirmed', 22),
(2, '5032049549592', '03/25', '123', 'Hamza Sheikh', '2022-09-29', 'confirmed', 23),
(3, '5032049549592', '03/25', '123', 'Hamza Sheikh', '2022-09-29', 'confirmed', 23),
(4, '5043436767', '04/23', '903', 'Hamza Sheikh', '2022-09-29', 'confirmed', 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `date`) VALUES
(1, 'Hamza Shaikh', 'hello@gmail.com', 'okay123', '2022-09-22'),
(2, 'Hamza', 'hello2@gmail.com', 'qwerty', '2022-09-22'),
(4, 'Hamza sheikh', 'hs2@gmail.com', 'q', '2022-09-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_ibfk_1` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_ibfk_1` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
