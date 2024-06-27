-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 03:32 AM
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
-- Database: `jg_salon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

CREATE TABLE `delivery_status` (
  `status_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitem`
--

CREATE TABLE `inventoryitem` (
  `product_ID` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `supplier_ID` int(11) DEFAULT NULL,
  `productClass_ID` int(11) NOT NULL,
  `quantity` int(9) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventoryitem`
--

INSERT INTO `inventoryitem` (`product_ID`, `product_name`, `supplier_ID`, `productClass_ID`, `quantity`, `price`, `description`) VALUES
(1, 'Shampoo', 1, 1, 50, 200.00, 'A nourishing shampoo for all hair types.'),
(2, 'Conditioner', 1, 1, 30, 250.00, 'A hydrating conditioner for smooth, shiny hair.'),
(3, 'Nail Polish', 2, 2, 100, 150.00, 'A vibrant nail polish available in various colors.'),
(4, 'Cuticle Oil', 2, 2, 75, 120.00, 'A nourishing oil for healthy cuticles.'),
(5, 'Facial Cleanser', 3, 3, 60, 300.00, 'A gentle cleanser for all skin types.'),
(6, 'Moisturizer', 3, 3, 40, 400.00, 'A hydrating moisturizer for radiant skin.'),
(7, 'Foundation', 4, 4, 20, 500.00, 'A full-coverage foundation for a flawless finish.'),
(8, 'Lipstick', 4, 4, 50, 250.00, 'A long-lasting lipstick available in various shades.'),
(9, 'Body Scrub', 5, 5, 30, 350.00, 'An exfoliating body scrub for smooth skin.'),
(10, 'Massage Oil', 5, 5, 25, 450.00, 'A soothing massage oil for relaxation.'),
(11, 'Hair Gel', 1, 1, 40, 150.00, 'A strong-hold gel for styling hair.'),
(12, 'Hair Spray', 1, 1, 35, 180.00, 'A finishing spray for lasting hold.'),
(13, 'Nail Clipper', 2, 2, 60, 80.00, 'A durable nail clipper for precise trimming.'),
(14, 'Nail File', 2, 2, 70, 50.00, 'A professional-grade nail file for smooth nails.'),
(15, 'Facial Toner', 3, 3, 45, 220.00, 'A refreshing toner for balanced skin.'),
(16, 'Face Mask', 3, 3, 50, 180.00, 'A hydrating mask for a radiant complexion.'),
(17, 'Blush', 4, 4, 25, 300.00, 'A powder blush for a natural flush of color.'),
(18, 'Eyeshadow Palette', 4, 4, 15, 750.00, 'A versatile eyeshadow palette with multiple shades.'),
(19, 'Body Lotion', 5, 5, 55, 250.00, 'A moisturizing lotion for soft skin.'),
(20, 'Essential Oils', 5, 5, 20, 350.00, 'A set of essential oils for aromatherapy.'),
(21, 'Hair Serum', 1, 1, 30, 220.00, 'A serum for frizz-free, shiny hair.'),
(22, 'Hair Mousse', 1, 1, 20, 200.00, 'A volumizing mousse for fuller hair.'),
(23, 'Nail Art Kit', 2, 2, 40, 300.00, 'A complete kit for creative nail art.'),
(24, 'Cuticle Pusher', 2, 2, 65, 100.00, 'A stainless steel tool for pushing cuticles.'),
(25, 'Facial Serum', 3, 3, 35, 450.00, 'A serum for radiant and youthful skin.'),
(26, 'Night Cream', 3, 3, 25, 500.00, 'A rich night cream for deep hydration.'),
(27, 'Mascara', 4, 4, 30, 350.00, 'A lengthening mascara for dramatic lashes.'),
(28, 'Eyeliner', 4, 4, 40, 200.00, 'A waterproof eyeliner for precise lines.'),
(29, 'Bath Salts', 5, 5, 45, 150.00, 'Relaxing bath salts for a soothing bath.'),
(30, 'Foot Cream', 5, 5, 35, 180.00, 'A nourishing cream for soft, smooth feet.'),
(31, 'Hair Color', 1, 1, 20, 400.00, 'A long-lasting hair color available in various shades.'),
(32, 'Hair Brush', 1, 1, 50, 180.00, 'A detangling hair brush for smooth hair.'),
(33, 'Nail Strengthener', 2, 2, 45, 200.00, 'A strengthening formula for healthier nails.'),
(34, 'Nail Buffer', 2, 2, 55, 70.00, 'A buffer for shiny, smooth nails.'),
(35, 'Sunscreen', 3, 3, 60, 300.00, 'A broad-spectrum sunscreen for UV protection.'),
(36, 'Eye Cream', 3, 3, 25, 400.00, 'A cream for reducing dark circles and puffiness.'),
(37, 'Lip Gloss', 4, 4, 35, 250.00, 'A high-shine lip gloss in various shades.'),
(38, 'Concealer', 4, 4, 30, 300.00, 'A full-coverage concealer for blemishes.'),
(39, 'Hand Cream', 5, 5, 50, 150.00, 'A rich hand cream for soft, smooth hands.'),
(40, 'Body Wash', 5, 5, 45, 200.00, 'A hydrating body wash for clean, soft skin.'),
(41, 'Hair Mask', 1, 1, 30, 250.00, 'A deep conditioning mask for damaged hair.'),
(42, 'Hair Clips', 1, 1, 60, 100.00, 'A set of hair clips for styling and sectioning.'),
(43, 'Nail Dryer', 2, 2, 20, 500.00, 'A portable nail dryer for quick drying.'),
(44, 'Nail Primer', 2, 2, 50, 150.00, 'A primer for longer-lasting nail polish.'),
(45, 'Face Scrub', 3, 3, 35, 200.00, 'An exfoliating scrub for smooth, clear skin.'),
(46, 'Hydrating Mist', 3, 3, 30, 180.00, 'A refreshing mist for instant hydration.'),
(47, 'Contour Kit', 4, 4, 20, 600.00, 'A kit for contouring and highlighting.'),
(48, 'Brow Pencil', 4, 4, 50, 180.00, 'A precision pencil for perfect brows.'),
(49, 'Bath Bombs', 5, 5, 40, 300.00, 'Fizzy bath bombs for a luxurious bath.'),
(50, 'Foot Scrub', 5, 5, 30, 200.00, 'An exfoliating scrub for soft, smooth feet.');

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitemlog`
--

CREATE TABLE `inventoryitemlog` (
  `log_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `product_ID` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_ID` int(11) NOT NULL,
  `staff_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(100) NOT NULL,
  `products_required` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productclass`
--

CREATE TABLE `productclass` (
  `class_ID` int(11) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productclass`
--

INSERT INTO `productclass` (`class_ID`, `name`) VALUES
(1, 'Haircare'),
(2, 'Nailcare'),
(3, 'Skin Care'),
(4, 'Makeup'),
(5, 'Spa supplementaries');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_ID` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specialization_ID`, `specialization`) VALUES
(1, 'hair_treatment'),
(2, 'nail_treatment'),
(3, 'body_treatment'),
(4, 'face_treatment'),
(5, 'foot_treatment');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `position` varchar(50) NOT NULL DEFAULT 'staff',
  `employment_status` varchar(25) NOT NULL DEFAULT 'employed',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `first_name`, `last_name`, `position`, `employment_status`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'employed', 'admin'),
(12, 'walter', 'caballero', 'staff', 'employed', 'admin'),
(13, 'emu', 'otori', 'staff', 'employed', 'wandahoy');

-- --------------------------------------------------------

--
-- Table structure for table `staffspecialization`
--

CREATE TABLE `staffspecialization` (
  `staff_specialization_ID` int(11) NOT NULL,
  `staff_ID` int(11) NOT NULL,
  `specialization_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffspecialization`
--

INSERT INTO `staffspecialization` (`staff_specialization_ID`, `staff_ID`, `specialization_ID`) VALUES
(4, 12, 1),
(5, 12, 3),
(6, 13, 1),
(7, 13, 3),
(8, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_ID`, `name`, `contact`) VALUES
(1, 'Beauty Supplies PH', '0917-123-4567'),
(2, 'Salon Essentials', '0939-345-6789'),
(3, 'Glamour Products', '0939-345-6789'),
(4, 'Elegance Inc.', '0947-456-7890'),
(5, 'Luxury Beauty', '0958-567-8901');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`status_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `supplier_ID` (`supplier_ID`),
  ADD KEY `product_class` (`productClass_ID`);

--
-- Indexes for table `inventoryitemlog`
--
ALTER TABLE `inventoryitemlog`
  ADD PRIMARY KEY (`log_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `customer_ID` (`customer_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_ID`),
  ADD KEY `staff_ID` (`staff_ID`);

--
-- Indexes for table `productclass`
--
ALTER TABLE `productclass`
  ADD PRIMARY KEY (`class_ID`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `staffspecialization`
--
ALTER TABLE `staffspecialization`
  ADD PRIMARY KEY (`staff_specialization_ID`),
  ADD KEY `staff_ID` (`staff_ID`),
  ADD KEY `specialization_ID` (`specialization_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_status`
--
ALTER TABLE `delivery_status`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `inventoryitemlog`
--
ALTER TABLE `inventoryitemlog`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productclass`
--
ALTER TABLE `productclass`
  MODIFY `class_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staffspecialization`
--
ALTER TABLE `staffspecialization`
  MODIFY `staff_specialization_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`);

--
-- Constraints for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD CONSTRAINT `delivery_status_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  ADD CONSTRAINT `inventoryitem_ibfk_1` FOREIGN KEY (`supplier_ID`) REFERENCES `supplier` (`supplier_ID`),
  ADD CONSTRAINT `inventoryitem_ibfk_2` FOREIGN KEY (`productClass_ID`) REFERENCES `productclass` (`class_ID`);

--
-- Constraints for table `inventoryitemlog`
--
ALTER TABLE `inventoryitemlog`
  ADD CONSTRAINT `inventoryitemlog_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `inventoryitem` (`product_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `inventoryitem` (`product_ID`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`staff_ID`) REFERENCES `staff` (`Staff_ID`);

--
-- Constraints for table `staffspecialization`
--
ALTER TABLE `staffspecialization`
  ADD CONSTRAINT `staffspecialization_ibfk_1` FOREIGN KEY (`staff_ID`) REFERENCES `staff` (`Staff_ID`),
  ADD CONSTRAINT `staffspecialization_ibfk_2` FOREIGN KEY (`specialization_ID`) REFERENCES `specialization` (`specialization_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
