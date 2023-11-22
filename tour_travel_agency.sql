-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 02:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_ID` char(11) NOT NULL,
  `account_username` varchar(255) NOT NULL,
  `account_password` varchar(50) NOT NULL,
  `account_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_ID`, `account_username`, `account_password`, `account_role`) VALUES
('1', 'user1', 'password1', 0),
('111a', 'anhquan0327ac', 'tranquangwms', 3),
('12', 'user12', '123456', 4),
('13', 'user13', '123456', 4),
('14', 'user14', '123456', 4),
('15', 'user15', '123456', 3),
('16', 'user16', '123456', 4),
('17', 'user17', '123456', 3),
('2', 'user2', 'password2', 2),
('3', 'user3', 'password3', 1),
('4', 'user4', 'password4', 2),
('5', 'user5', 'password5', 1),
('6', 'user6', '123456', 3),
('7', 'user7', '123456', 3),
('8', 'user8', '123456', 3),
('9', 'user9', '123456', 3),
('acc18', 'nguyenAnh0202', 'anhquanAwms', 4),
('account001', 'otabe2703', 'tranquangwms1', 2),
('staff1', 'staff0001', '123456Ab', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` char(11) NOT NULL,
  `customer_first_name` varchar(255) NOT NULL,
  `customer_last_name` varchar(255) NOT NULL,
  `customer_gender` varchar(8) NOT NULL,
  `customer_birthday` date NOT NULL,
  `customer_phone` char(12) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `account_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `customer_first_name`, `customer_last_name`, `customer_gender`, `customer_birthday`, `customer_phone`, `customer_email`, `customer_address`, `account_ID`) VALUES
('3', 'Tâm', 'Johnson', 'Male', '1982-03-10', '5555555555', 'michael.johnson@email.com', 'Address 331', '12'),
('4', 'Emily', 'Brown', 'Female', '1995-12-05', '7777777777', 'emily.brown@email.com', 'Address 4', '13'),
('5', 'David', 'Wilson', 'Male', '1988-07-25', '9999999999', 'david.wilson@email.com', 'Nowhere ', '14'),
('6', '6', '6', '6', '2023-11-01', '6', '6', '6', '16'),
('cus18', 'Nguyen', 'Anh', 'Male', '2002-01-01', '0911026036', 'nguyenAnh0202@gmail.com', 'Cau giay', 'acc18');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_ID` varchar(11) NOT NULL,
  `invoice_status` varchar(255) NOT NULL,
  `invoice_method` varchar(50) NOT NULL,
  `invoice_note` text NOT NULL,
  `invoice_img_check` varchar(255) NOT NULL,
  `invoice_img_receive` varchar(255) NOT NULL,
  `order_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_ID`, `invoice_status`, `invoice_method`, `invoice_note`, `invoice_img_check`, `invoice_img_receive`, `order_ID`) VALUES
('10', 'Unpaid', 'Banking', '', '', '', '1700092694'),
('11', 'Unpaid', 'Cash', '', '', '', '1700092717'),
('12', 'Unpaid', 'Banking', '', '', '', '1700094414'),
('13', 'Unpaid', 'Banking', '', '', '', '1700094420'),
('3', 'Paid', 'Banking', 'Banking payment', '', '', '3'),
('5', 'Paid', 'Banking', 'Cash payment', '', '', '5'),
('6', 'Unpaid', 'Banking', 'Unpaid', '', '', '6'),
('7', 'Unpaid', 'Banking', '', '', '', '4'),
('8', 'Unpaid', 'Cash', '', '', '', '1700055352'),
('9', 'Unpaid', 'Cash', '', '', '', '1700058380'),
('invoice11', 'Unpaid', 'Cash', '', '', '', '1700635295'),
('invoice12', 'Unpaid', 'Cash', '', '', '', '1700635295'),
('invoice13', 'Unpaid', 'Cash', '', '', '', '1700635484');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` char(11) NOT NULL,
  `order_number` tinyint(4) NOT NULL,
  `order_time` datetime NOT NULL,
  `order_phone` char(12) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_note` text NOT NULL,
  `tour_ID` char(11) NOT NULL,
  `customer_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_ID`, `order_number`, `order_time`, `order_phone`, `order_email`, `order_note`, `tour_ID`, `customer_ID`) VALUES
('1700055352', 1, '2023-11-15 20:35:52', '0944116036', 'anhquan0327@gmail.com', '', '1', 'cus18'),
('1700058380', 1, '2023-11-15 21:26:20', '0944116036', 'anhquan0327@gmail.com', '', '9', 'cus18'),
('1700092694', 1, '2023-11-16 06:58:14', '0944116036', 'anhquan0327@gmail.com', '', '3', 'cus18'),
('1700092717', 1, '2023-11-16 06:58:37', '0944116036', 'anhquan0327@gmail.com', '', '1', 'cus18'),
('1700094414', 1, '2023-11-16 07:26:54', '0944116036', 'anhquan0327@gmail.com', '', '5', 'cus18'),
('1700094420', 1, '2023-11-16 07:27:00', '0944116036', 'anhquan0327@gmail.com', '', '1', 'cus18'),
('1700635295', 1, '2023-11-22 13:41:35', '9999999999', 'david.wilson@email.com', '', '8', '5'),
('1700635484', 1, '2023-11-22 13:44:44', '9999999999', 'david.wilson@email.com', '', '8', '5'),
('3', 2, '2023-11-10 09:42:17', '1118882777', 'michael.johnson@email.com', 'Order 3', '3', '3'),
('4', 4, '2023-04-20 09:45:00', '7777777777', 'emily.brown@email.com', 'Order Note 4', '4', '4'),
('5', 5, '2023-05-25 08:30:00', '9999999999', 'david.wilson@email.com', 'Order Note 5', '5', '5'),
('6', 2, '2023-11-13 07:34:43', '1118882777', 'example@email.com', 'nothing', '1', '6');

--
-- Triggers `order`
--
DELIMITER $$
CREATE TRIGGER `update_tour_number` AFTER INSERT ON `order` FOR EACH ROW BEGIN
  UPDATE tour 
  SET tour_number = tour_number - NEW.order_number
  WHERE tour_ID = NEW.tour_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` char(11) NOT NULL,
  `staff_first_name` varchar(225) NOT NULL,
  `staff_last_name` varchar(255) NOT NULL,
  `staff_birthday` date NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_phone` char(12) NOT NULL,
  `account_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `staff_first_name`, `staff_last_name`, `staff_birthday`, `staff_email`, `staff_phone`, `account_ID`) VALUES
('1', 'Super', 'Admin', '1989-01-12', 'staff1@email.com', '1234567890', '1'),
('2', 'Staff 2', 'Lastname 02', '1992-11-15', 'staff2@email.com', '9876543210', '2'),
('3', 'Staff 3', 'Lastname 31', '1999-09-12', 'staff3@email.com', '5555555555', '3'),
('4', 'Staff 4', 'Lastname 4', '2000-03-12', 'staff4@email.com', '7777777777', '4'),
('5', 'Staff 5', 'Lastname 5', '1997-06-15', 'staff5@email.com', '9999999999', '5'),
('6', 'Nguyen', 'Quan', '2002-03-27', 'anhquan0327@gmail.com', '0944116036', 'account001'),
('staff1', 'Nguyen', 'Quan', '2004-11-12', 'anhquan0327@gmail.com', '0944116036', 'staff1');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_ID` char(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `supplier_phone` varchar(12) NOT NULL,
  `supplier_note` text NOT NULL,
  `supplier_file` varchar(255) NOT NULL,
  `account_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_ID`, `supplier_name`, `supplier_address`, `supplier_email`, `supplier_phone`, `supplier_note`, `supplier_file`, `account_ID`) VALUES
('1', 'Supplier 1', 'Address 1', 'supplier1@email.com', '1234567891', '1231', 'RÈN-LUYỆN-NĂM-HỌC-21-22-K555657SD06.10.22-final.pdf', '17'),
('2', 'Supplier 2', 'Address 2', 'supplier2@email.com', '1234567892', '', '', '15'),
('3', 'Supplier 3', 'Address 3', 'supplier3@email.com', '1234567893', '', '', '9'),
('4', 'Supplier 4', 'Address 4', 'supplier4@email.com', '1234567894', '', '', '8'),
('5', 'Supplier 5', 'Address 5', 'supplier5@email.com', '1234567895', '', '', '7'),
('6', 'Nguyen Phuong Anh Quan', 'Cau giay', 'anhquan0327@gmail.com', '0886172886', 'Test', '1614-qd-vv-khen-thuong-sinh-vien-nam-hoc-2022-2023-0001pdf-1696600675.pdf', '6'),
('8', 'Nguyen Tuan Anh', 'Cau giay', 'tuananhexample@gmail.com', '0377391733', 'test sup', '02_Ph____ng-Anh_ATBM_456T5_V103_PB.pdf', '111a');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_ID` char(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_price` int(11) NOT NULL,
  `tour_transport` varchar(50) NOT NULL,
  `tour_start` date NOT NULL,
  `tour_end` date NOT NULL,
  `tour_length` varchar(50) NOT NULL,
  `tour_number` tinyint(4) NOT NULL,
  `tour_from` varchar(255) NOT NULL,
  `tour_to` varchar(255) NOT NULL,
  `tour_itinerary` text NOT NULL,
  `supplier_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_ID`, `tour_name`, `tour_price`, `tour_transport`, `tour_start`, `tour_end`, `tour_length`, `tour_number`, `tour_from`, `tour_to`, `tour_itinerary`, `supplier_ID`) VALUES
('1', 'Tour 1', 100, 'Car, Plane, Train', '2023-01-10', '2023-01-20', '10 days', 11, 'Hanoi', 'Ho Chi Minh City', '18115', '1'),
('2', 'Tour 2', 150, 'Train, Boat, Plane', '2023-02-15', '2023-02-25', '10 days', 20, 'Ho Chi Minh City', 'Da Nang', 'Itinerary 2', '2'),
('3', 'Tour 3', 120, 'Car, Train, Boat', '2023-03-20', '2023-03-30', '10 days', 20, 'Da Nang', 'Ha Noi', 'Itinerary 3', '3'),
('4', 'Tour 4', 200, 'Plane, Train', '2023-04-25', '2023-05-05', '10 days', 20, 'Ho Chi Minh City', 'Hanoi', 'Itinerary 4', '4'),
('5', 'Tour 5', 180, 'Boat, Plane, Car', '2023-05-30', '2023-06-09', '10 days', 20, 'Ho Chi Minh City', 'Hanoi', 'Itinerary 5', '5'),
('7', '7', 7, 'Plane, Car', '2023-11-10', '2023-11-19', '7', 7, '87', '8', '7', '3'),
('8', '81', 8, 'Plane, Boat', '2023-11-15', '2023-11-25', '8', 6, '81', '8', '81', '1'),
('9', '9', 9, 'Plane, Car', '2023-11-14', '2023-11-24', '9', 9, '9', '9', '9', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tour_image`
--

CREATE TABLE `tour_image` (
  `image_ID` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `tour_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_image`
--

INSERT INTO `tour_image` (`image_ID`, `image_name`, `tour_ID`) VALUES
(30, 'switzerland.jpg', '7'),
(31, 'US.jpg', '7'),
(32, 'Vietnam.jpg', '7'),
(57, '35765965.png', '3'),
(58, 'Taj-Mahal-Agra-India-1699949740.png', '3'),
(59, 'TAL-machu-picchu-1699949740.jpg', '3'),
(60, 'new-york.jpg', '4'),
(61, 'it-was-an-amazing-experience-1699950227.jpg', '4'),
(62, 'the-great-pyramid-1699950227.jpg', '4'),
(66, 'the-great-pyramid-1699951158.jpg', '8'),
(67, '7_wonders_christ-1699951158.jpg', '8'),
(68, '35765965-1699951158.png', '8'),
(69, 'Taj-Mahal-Agra-India-1699951158.png', '8'),
(70, 'TAL-machu-picchu-1699951158.jpg', '8'),
(71, 'everest.jpg', '9'),
(72, 'Mongolia-2109x1406.jpg', '9'),
(73, 'Ancient-Civilizations-of-Latin-America.jpg', '9'),
(74, 'thailand_phuket_phang_nga_bay.jpg', '9'),
(88, 'Mongolia-2109x1406-1700291865.jpg', '2'),
(89, 'Ancient-Civilizations-of-Latin-America-1700291865.jpg', '2'),
(90, 'thailand_phuket_phang_nga_bay-1700291865.jpg', '2'),
(91, 'new-york-1700291865.jpg', '2'),
(108, 'hoian-1700378692.jpg', '5'),
(109, 'fuji-1700378692.jpg', '5'),
(110, 'phu-quoc-1700378692.png', '5'),
(133, 'Mongolia-2109x1406-1700464937.jpg', '7'),
(134, 'Ancient-Civilizations-of-Latin-America-1700464937.jpg', '7'),
(135, 'thailand_phuket_phang_nga_bay-1700464937.jpg', '7'),
(139, 'hoian-1700467070.jpg', '1'),
(140, 'fuji-1700467070.jpg', '1'),
(141, 'phu-quoc-1700467070.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_ID`),
  ADD UNIQUE KEY `account_username` (`account_username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `tour_ID` (`tour_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_ID`),
  ADD KEY `supplier_ID` (`supplier_ID`);

--
-- Indexes for table `tour_image`
--
ALTER TABLE `tour_image`
  ADD PRIMARY KEY (`image_ID`),
  ADD KEY `tour_ID` (`tour_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tour_image`
--
ALTER TABLE `tour_image`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`tour_ID`) REFERENCES `tour` (`tour_ID`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`supplier_ID`) REFERENCES `supplier` (`supplier_ID`);

--
-- Constraints for table `tour_image`
--
ALTER TABLE `tour_image`
  ADD CONSTRAINT `tour_image_ibfk_1` FOREIGN KEY (`tour_ID`) REFERENCES `tour` (`tour_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
