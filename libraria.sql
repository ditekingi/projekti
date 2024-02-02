-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraria`
--

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `Libri` varchar(100) NOT NULL,
  `Cmimi` varchar(10) NOT NULL,
  `Autori` varchar(50) NOT NULL,
  `ImagePath` varchar(255) NOT NULL,
  `AddedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`Libri`, `Cmimi`, `Autori`, `ImagePath`, `AddedBy`) VALUES
('1984', '8.74', 'George Orwell', 'book1.jpg', ''),
('A Game of Thrones', '13.00', 'George R.R.Martin', 'book19.jpg', ''),
('A Little Life', '15.00', 'Hanya Yanagihara', 'book13.jpg', ''),
('All The Bright Places', '12.50', 'Jennifer Niven', 'book89.jpg', ''),
('Demons', '3.50', 'Fyodor Dostoevski', 'book14.jpg', ''),
('Harry Potter', '12.40', 'J.K.Rowling', 'book10.jpg', ''),
('It Ends With Us', '12.50', 'Colleen Hoover', 'book88.jpg', ''),
('Kafka on the Shore', '13.20', 'Haruki Murakami', 'book12.jpg', ''),
('Little Women', '12.20', 'Lisa May Alcott', 'book5.jpg', ''),
('Lord of the Rings', '14.00', 'John R.R.Tolkien', 'book3.jpg', ''),
('Mostly Dead Things', '13.50', 'Kristen Arnett', 'book9.jpg', ''),
('No Longer Human', '14.50', 'Osamu Dazai', 'book15.jpg', ''),
('Norwegian Wood', '10.00', 'Haruki Murakami', 'book86.jpg', ''),
('The Book Thief', '12.30', 'Markus Zusak', 'book16.jpg', ''),
('The Catcher in the Rye', '10.00', 'J.D. Salinger', 'book17.jpg', ''),
('The Great Gatsby', '9.00', 'F. Scott Fitzgerald', 'book18.jpg', ''),
('The Handmaids Tail', '12.00', 'Margaret Atwood', 'book20.jpg', ''),
('The Kite Runner', '12.15', 'Khaled Hosseini', 'book7.jpg', ''),
('The Siege', '12.30', 'Ismail Kadare', 'book84.jpg', ''),
('Things Fall Apart', '13.09', 'Chinua Achebe', 'book6.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `libribooks`
--

CREATE TABLE `libribooks` (
  `Libri` varchar(100) NOT NULL,
  `Cmimi` varchar(30) NOT NULL,
  `Autori` varchar(100) NOT NULL,
  `ImagePath` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `AddedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Emri` varchar(30) NOT NULL,
  `Mbiemri` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Pass` varchar(12) NOT NULL,
  `Roli` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Emri`, `Mbiemri`, `Email`, `Username`, `Pass`, `Roli`) VALUES
('Arba', 'Maxhuni', 'am@gmail.com', 'arbam', '12345678', 'admin'),
('Dea', 'Gegollaj', 'dg@gmail.com', 'deag', '12345678', 'user'),
('Dite', 'Qela', 'dq@gmail.com', 'diteq', '12345678', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`Libri`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
