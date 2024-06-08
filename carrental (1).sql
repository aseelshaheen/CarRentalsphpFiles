-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 09:56 PM
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
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `email`) VALUES
(1, 'admin1', '123', 'admin1@example.com'),
(2, 'admin2', '234', 'admin2@example.com'),
(3, 'admin3', '345', 'admin3@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` int(11) NOT NULL,
  `carBrand` varchar(255) DEFAULT NULL,
  `carModel` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `carBrand`, `carModel`, `price`, `color`, `status`, `image`) VALUES
(1, 'Toyota', 'Corolla', 50, 'Red', 'Available', 'car1.jpg'),
(2, 'Honda', 'Civic', 55, 'Blue', 'Unavailable', 'car2.jpg'),
(3, 'Ford', 'Focus', 45, 'Green', 'Available', 'car3.jpg'),
(4, 'BMW', '320i', 70, 'Black', 'Available', 'car4i.jpg'),
(5, 'Audi', 'A4', 75, 'White', 'Unavailable', 'car5.jpg'),
(6, 'Tesla', 'Model S', 100, 'Silver', 'Available', 'car6.jpg'),
(7, 'Chevrolet', 'Malibu', 60, 'Black', 'Available', 'car7.jpg'),
(8, 'Hyundai', 'Elantra', 50, 'Blue', 'Available', 'car8.jpg'),
(9, 'Nissan', 'Sentra', 45, 'Red', 'Available', 'car9.jpg'),
(10, 'Kia', 'Optima', 55, 'Green', 'Available', 'car10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idNumber` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `licenseImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idNumber`, `firstName`, `lastName`, `email`, `phoneNumber`, `password`, `licenseImage`) VALUES
(1000000001, 'John', 'Doe', 'john.doe@example.com', '1234567890', '123', 'lic1.jpg'),
(1000000002, 'Jane', 'Smith', 'jane.smith@example.com', '0987654321', '234', 'lic2.jpg'),
(1000000003, 'Robert', 'Brown', 'robert.brown@example.com', '2345678901', '345', 'lic3.jpg'),
(1000000004, 'Emily', 'Johnson', 'emily.johnson@example.com', '3456789012', '456', 'lic4.jpg'),
(1000000005, 'Michael', 'Williams', 'michael.williams@example.com', '4567890123', '567', 'lic5.jpg'),
(1000000006, 'Jessica', 'Jones', 'jessica.jones@example.com', '5678901234', '678', 'lic6.jpg'),
(1000000007, 'David', 'Garcia', 'david.garcia@example.com', '6789012345', '789', 'lic7.jpg'),
(1000000008, 'Sarah', 'Martinez', 'sarah.martinez@example.com', '7890123456', '890', 'lic8.jpg'),
(1000000009, 'Daniel', 'Miller', 'daniel.miller@example.com', '8901234567', '901', 'lic9.jpg'),
(1000000010, 'Laura', 'Davis', 'laura.davis@example.com', '9012345678', '012', 'lic10.jpg'),
(1000000011, 'James', 'Lopez', 'james.lopez@example.com', '1234509876', '111', 'lic11.jpg'),
(1000000012, 'Patricia', 'Wilson', 'patricia.wilson@example.com', '2345610987', '222', 'lic12.jpg'),
(1000000013, 'William', 'Anderson', 'william.anderson@example.com', '3456721098', '333', 'lic13.jpg'),
(1000000014, 'Linda', 'Thomas', 'linda.thomas@example.com', '4567832109', '444', 'lic14.jpg'),
(1000000015, 'Richard', 'Jackson', 'richard.jackson@example.com', '5678943210', '555', 'lic15.jpg'),
(1000000016, 'Barbara', 'White', 'barbara.white@example.com', '6789054321', '666', 'lic16.jpg'),
(1000000017, 'Joseph', 'Harris', 'joseph.harris@example.com', '7890165432', '777', 'lic17.jpg'),
(1000000018, 'Susan', 'Martin', 'susan.martin@example.com', '8901276543', '888', 'lic18.jpg'),
(1000000019, 'Charles', 'Thompson', 'charles.thompson@example.com', '9012387654', '999', 'lic19.jpg'),
(1000000020, 'Karen', 'Martinez', 'karen.martinez@example.com', '0123498765', '000', 'lic20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rentalID` int(11) NOT NULL,
  `idNumber` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rentalID`, `idNumber`, `carID`, `startDate`, `endDate`, `totalPrice`, `status`) VALUES
(1, 1000000001, 1, '2024-06-01', '2024-06-07', 350.00, 'Pending'),
(2, 1000000006, 5, '2024-06-02', '2024-06-08', 385.00, 'Confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idNumber`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rentalID`),
  ADD KEY `idNumber` (`idNumber`),
  ADD KEY `carID` (`carID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rentalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`idNumber`) REFERENCES `customer` (`idNumber`),
  ADD CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`carID`) REFERENCES `car` (`carID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
