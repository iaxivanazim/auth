-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 02:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bodhamitest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `contact`, `password`, `create_date`) VALUES
('Ivan', 'Azim', 'azimivan020@gmail.com', '+002134657809', '$2y$10$D/Eo2BjQ7hAluOiPBRoyDudDrT8Hoe7wZg9xZmezDpu6T9sE1fTIy', '2023-08-30 19:05:17'),
('John', 'Doe', 'johndoe@gmail.com', '+002134657809', '$2y$10$C38JJk3xrZjjxdQ33xgCyunlRZSk0094r5/JfZAEP7W2m9oLZb3v2', '2023-08-30 20:28:34'),
('Ramesh', 'Kumar', 'ramesh@gmail.com', '+009823543533', 'e31b21c463afb3f6f4dda760da8ac959', '2023-05-23 14:48:48'),
('Vadiraj', 'Inamdar', 'vadiraj@gmail.com', '+002134657756', '$2y$10$ooOK0dl4MqrVrcGQN/kSve0ygXAfnI3ArlJDjOxc12Pze7Ius9fMe', '2023-08-31 11:18:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
