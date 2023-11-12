-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2023 lúc 08:32 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tour_travel_agency`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `account_ID` char(11) NOT NULL,
  `account_username` varchar(255) NOT NULL,
  `account_password` varchar(50) NOT NULL,
  `account_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`account_ID`, `account_username`, `account_password`, `account_role`) VALUES
('1', 'user1', 'password1', 0),
('10', 'user10', '123456', 4),
('11', 'user11', '123456', 4),
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
('9', 'user9', '123456', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
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
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_ID`, `customer_first_name`, `customer_last_name`, `customer_gender`, `customer_birthday`, `customer_phone`, `customer_email`, `customer_address`, `account_ID`) VALUES
('1', 'John', 'Doe', 'Male', '1990-01-15', '1234567890', 'john.doe@email.com', 'Address 1', '10'),
('2', 'Jane', 'Smith', 'Female', '1985-06-20', '9876543210', 'jane.smith@email.com', 'Address 2', '11'),
('3', 'Michael', 'Johnson', 'Male', '1982-03-10', '5555555555', 'michael.johnson@email.com', 'Address 3', '12'),
('4', 'Emily', 'Brown', 'Female', '1995-12-05', '7777777777', 'emily.brown@email.com', 'Address 4', '13'),
('5', 'David', 'Wilson', 'Male', '1988-07-25', '9999999999', 'david.wilson@email.com', 'Address 5', '14'),
('6', '6', '6', '6', '2023-11-01', '6', '6', '6', '16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
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
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`invoice_ID`, `invoice_status`, `invoice_method`, `invoice_note`, `invoice_img_check`, `invoice_img_receive`, `order_ID`) VALUES
('1', 'Paid', 'Banking', 'Banking payment 12', '91425_5e3ce4436b84e-1699487597.jpg', '', '1'),
('2', 'Unpaid', 'Banking', 'Banking payment 2', '', '', '2'),
('3', 'Paid', 'Banking', 'Banking payment', '', '', '3'),
('4', 'Paid', 'Banking', 'Banking payment', '', '', '4'),
('5', 'Unpaid', 'Cash', 'Cash payment', '', '', '5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
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
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_ID`, `order_number`, `order_time`, `order_phone`, `order_email`, `order_note`, `tour_ID`, `customer_ID`) VALUES
('1', 2, '0000-00-00 00:00:00', '1234567890', 'john.doe@email.com', 'Order Note 1', '1', '1'),
('2', 2, '2023-02-10 11:30:00', '9876543210', 'jane.smith@email.com', 'Order Note 2', '2', '2'),
('3', 2, '2023-11-10 09:42:17', '1118882777', 'michael.johnson@email.com', 'Order 3', '3', '3'),
('4', 4, '2023-04-20 09:45:00', '7777777777', 'emily.brown@email.com', 'Order Note 4', '4', '4'),
('5', 5, '2023-05-25 08:30:00', '9999999999', 'david.wilson@email.com', 'Order Note 5', '5', '5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `staff_ID` char(11) NOT NULL,
  `staff_first_name` varchar(225) NOT NULL,
  `staff_last_name` varchar(255) NOT NULL,
  `staff_age` int(11) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_phone` char(12) NOT NULL,
  `account_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`staff_ID`, `staff_first_name`, `staff_last_name`, `staff_age`, `staff_email`, `staff_phone`, `account_ID`) VALUES
('1', 'Staff 1', 'Lastname 1', 30, 'staff1@email.com', '1234567890', '1'),
('2', 'Staff 2', 'Lastname 2', 28, 'staff2@email.com', '9876543210', '2'),
('3', 'Staff 3', 'Lastname 3', 35, 'staff3@email.com', '5555555555', '3'),
('4', 'Staff 4', 'Lastname 4', 29, 'staff4@email.com', '7777777777', '4'),
('5', 'Staff 5', 'Lastname 5', 32, 'staff5@email.com', '9999999999', '5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
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
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`supplier_ID`, `supplier_name`, `supplier_address`, `supplier_email`, `supplier_phone`, `supplier_note`, `supplier_file`, `account_ID`) VALUES
('1', 'Supplier 1', 'Address 1', 'supplier1@email.com', '1234567891', '1231', 'RÈN-LUYỆN-NĂM-HỌC-21-22-K555657SD06.10.22-final.pdf', '17'),
('2', 'Supplier 2', 'Address 2', 'supplier2@email.com', '1234567892', '', '', '15'),
('3', 'Supplier 3', 'Address 3', 'supplier3@email.com', '1234567893', '', '', '9'),
('4', 'Supplier 4', 'Address 4', 'supplier4@email.com', '1234567894', '', '', '8'),
('5', 'Supplier 5', 'Address 5', 'supplier5@email.com', '1234567895', '', '', '7'),
('6', '6', '6', '6', '6', '6', '6', '6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
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
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`tour_ID`, `tour_name`, `tour_price`, `tour_transport`, `tour_start`, `tour_end`, `tour_length`, `tour_number`, `tour_from`, `tour_to`, `tour_itinerary`, `supplier_ID`) VALUES
('1', 'Tour 01', 100, 'Bus', '2023-01-10', '2023-01-20', '10 days', 0, 'Hanoi', 'Ho Chi Minh City', '0', '1'),
('2', 'Tour 2', 150, 'Train', '2023-02-15', '2023-02-25', '10 days', 0, 'Ho Chi Minh City', 'Da Nang', 'Itinerary 2', '2'),
('3', 'Tour 3', 120, 'Car', '2023-03-20', '2023-03-30', '10 days', 0, 'Da Nang', 'Ha Noi', 'Itinerary 3', '3'),
('4', 'Tour 4', 200, 'Flight', '2023-04-25', '2023-05-05', '10 days', 0, 'Ho Chi Minh City', 'Hanoi', 'Itinerary 4', '4'),
('5', 'Tour 5', 180, 'Boat', '2023-05-30', '2023-06-09', '10 days', 0, 'Ho Chi Minh City', 'Hanoi', 'Itinerary 5', '5'),
('7', '7', 7, '7', '2023-11-10', '2023-11-19', '7', 7, '87', '8', '7', '3'),
('8', '81', 8, '8', '2023-11-15', '2023-11-25', '8', 8, '81', '8', '8', '1'),
('9', '9', 9, '9', '2023-11-14', '2023-11-24', '9', 9, '9', '9', '9', '6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_image`
--

CREATE TABLE `tour_image` (
  `image_ID` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `tour_ID` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_image`
--

INSERT INTO `tour_image` (`image_ID`, `image_name`, `tour_ID`) VALUES
(30, 'switzerland.jpg', '7'),
(31, 'US.jpg', '7'),
(32, 'Vietnam.jpg', '7'),
(33, 'Italy.jpeg', '8'),
(34, 'user-img.png', '8');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_ID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `tour_ID` (`tour_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_ID`),
  ADD KEY `supplier_ID` (`supplier_ID`);

--
-- Chỉ mục cho bảng `tour_image`
--
ALTER TABLE `tour_image`
  ADD PRIMARY KEY (`image_ID`),
  ADD KEY `tour_ID` (`tour_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tour_image`
--
ALTER TABLE `tour_image`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`tour_ID`) REFERENCES `tour` (`tour_ID`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Các ràng buộc cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`supplier_ID`) REFERENCES `supplier` (`supplier_ID`);

--
-- Các ràng buộc cho bảng `tour_image`
--
ALTER TABLE `tour_image`
  ADD CONSTRAINT `tour_image_ibfk_1` FOREIGN KEY (`tour_ID`) REFERENCES `tour` (`tour_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
