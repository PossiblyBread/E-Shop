-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 09:03 AM
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
-- Database: `web_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `Serial_Num` int(8) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `h_password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `Serial_Num`, `last_name`, `first_name`, `email`, `phone_num`, `h_password`, `role`, `date_time`) VALUES
(8, 58008, 'adrian', 'adona@gmail.com', 'adrian@gmail.com', '09184025526', '$2y$10$HSX/YG8k.cys4t7Ej5TR3erzc3HR8zLp8nOmdtlsvsbXWQ00MPZpW', '', '2024-08-21 13:33:25'),
(16, 10000001, 'bing', 'bong', 'bingbong@gmail.com', '12312312312', '$2y$10$zPXO2vZkPjqQYvVE3rnDM.FrzQ0MMio4LSsOjQ/.Yy36RxBtbQPn.', '', '2024-08-21 13:33:25'),
(17, 10000001, 'waw', 'wew', 'wew@gmail.com', '12345678910', '$2y$10$ZfHOjTfmcz40JXl7lO/JEeg.a.hMBAn1.DPIAols73wn2elaiBeBW', '', '2024-08-21 13:33:25'),
(21, 0, 'adona', 'adrian', 'adona@gmail.com', '09091212123', '$2y$10$lzRPBTZhncq/4XZrM31UJ.2eb5c4zjb8fSyXnZ6UK4uyP6ICK3ZGu', '', '2024-08-21 13:33:53'),
(22, 0, 'bread', 'bnread', 'bread@gmail.comn', '09121231234', '$2y$10$reDP.yPur2bu5zWgATvHheRCDrtyCD/u.Nql9tOgxNRj3TAzV7Ud.', '', '2024-08-21 13:41:05'),
(23, 0, 'man', 'boy', 'manboy@gmail.com', '123123', '$2y$10$pW/ql43GQH2qcEFdr0g2neCx/ZsPBH3kIBMlLPAJLonhOp7WlgEJi', 'user', '2024-08-21 13:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `id` int(255) NOT NULL,
  `reg_id` int(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_brand` text NOT NULL,
  `p_model` text NOT NULL,
  `p_year` text NOT NULL,
  `p_type` text NOT NULL,
  `p_frame_size` text NOT NULL,
  `p_wheel_size` text NOT NULL,
  `p_weight` text NOT NULL,
  `p_motor_type` text NOT NULL,
  `p_motor_power` text NOT NULL,
  `p_top_speed` text NOT NULL,
  `p_pedal_assist_levels` text NOT NULL,
  `p_throttle` text NOT NULL,
  `p_battery_type` text NOT NULL,
  `p_battery_capacity` text NOT NULL,
  `p_range` text NOT NULL,
  `p_charge_time` text NOT NULL,
  `p_gears` text NOT NULL,
  `p_brakes` text NOT NULL,
  `p_suspension` text NOT NULL,
  `p_tires` text NOT NULL,
  `p_frame_material` text NOT NULL,
  `p_fork` text NOT NULL,
  `p_handlebars` text NOT NULL,
  `p_display` text NOT NULL,
  `p_lighting` text NOT NULL,
  `p_connectivity` text NOT NULL,
  `p_fenders` text NOT NULL,
  `p_rack` text NOT NULL,
  `p_kickstand` text NOT NULL,
  `p_lock` text NOT NULL,
  `p_accessories` text NOT NULL,
  `p_warranty` text NOT NULL,
  `p_torque` text NOT NULL,
  `p_max_rider_weight` text NOT NULL,
  `p_water_resistance` text NOT NULL,
  `p_base_price` text NOT NULL,
  `p_optional_features` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(255) NOT NULL,
  `Serial_Num` int(8) NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `t_status` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `Serial_Num`, `type`, `description`, `t_status`, `date_time`) VALUES
(1, 0, 'Mech_Issue', 'bike broke', 'Pending', '0000-00-00 00:00:00'),
(2, 0, 'Mech_Issue', '', 'Pending', '0000-00-00 00:00:00'),
(3, 0, 'Mech_Issue', '', 'Pending', '0000-00-00 00:00:00'),
(4, 0, 'Mech_Issue', '', 'Pending', '0000-00-00 00:00:00'),
(5, 0, 'Assist_Req', 'bread', 'Pending', '2024-08-19 11:56:22'),
(6, 0, 'Mech_Issue', 'cheese', 'Pending', '2024-08-19 12:21:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
