-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 05:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cementcraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `location` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL,
  `performance` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `location`, `status`, `performance`) VALUES
(1, 'Jasja', 'inactive', '95');

-- --------------------------------------------------------

--
-- Table structure for table `assurance`
--

CREATE TABLE `assurance` (
  `id` int(11) NOT NULL,
  `aspect` varchar(80) NOT NULL,
  `method` varchar(80) NOT NULL,
  `testing` varchar(80) NOT NULL,
  `values` varchar(80) NOT NULL,
  `deviation` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assurance`
--

INSERT INTO `assurance` (`id`, `aspect`, `method`, `testing`, `values`, `deviation`, `status`) VALUES
(1, 'Fitness', 'Blane\'s air permeability', 'Every Batch', '92%', '+2%', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `equipment` varchar(80) NOT NULL,
  `maintenance_task` varchar(80) NOT NULL,
  `frequency` varchar(80) NOT NULL,
  `first_maintenance` date NOT NULL,
  `last_maintenance` date NOT NULL,
  `status` varchar(80) NOT NULL,
  `asset_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `equipment`, `maintenance_task`, `frequency`, `first_maintenance`, `last_maintenance`, `status`, `asset_id`) VALUES
(9, 'Yale', 'Yale', 'Yale', '2024-08-15', '2024-08-20', 'In-progress', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `raw_material` varchar(80) NOT NULL,
  `current_stock` varchar(80) NOT NULL,
  `reorder_point` varchar(80) NOT NULL,
  `supplier` varchar(80) NOT NULL,
  `lead_time` varchar(80) NOT NULL,
  `safety_stock` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `raw_material`, `current_stock`, `reorder_point`, `supplier`, `lead_time`, `safety_stock`) VALUES
(2, 'Product one', '12', '12', 'Pablo', '12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `myresources`
--

CREATE TABLE `myresources` (
  `id` int(11) NOT NULL,
  `u_resources` varchar(80) NOT NULL,
  `descriptions` varchar(80) NOT NULL,
  `quantity` varchar(80) NOT NULL,
  `allocation` varchar(80) NOT NULL,
  `statuss` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `myresources`
--

INSERT INTO `myresources` (`id`, `u_resources`, `descriptions`, `quantity`, `allocation`, `statuss`) VALUES
(1, 'Yuri', 'Yuri', '124', 'Niger', 'Allocated'),
(2, 'Yuri', 'Yuri', '124', 'Niger', 'Allocated');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `raw_material` varchar(80) NOT NULL,
  `line_setup` varchar(80) NOT NULL,
  `qc_check` varchar(80) NOT NULL,
  `Batchdate` date NOT NULL,
  `inventory_update` varchar(80) NOT NULL,
  `demand` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply-chain`
--

CREATE TABLE `supply-chain` (
  `id` int(11) NOT NULL,
  `u_productname` varchar(80) NOT NULL,
  `u_quantity` varchar(80) NOT NULL,
  `u_amount` varchar(80) NOT NULL,
  `u_supplier` varchar(80) NOT NULL,
  `u_distributor` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(80) NOT NULL,
  `u_tools` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supply-chain`
--

INSERT INTO `supply-chain` (`id`, `u_productname`, `u_quantity`, `u_amount`, `u_supplier`, `u_distributor`, `date`, `status`, `u_tools`) VALUES
(2, 'Matoke', '200tons', '90', '$u_distributor', '$u_distributor', '2024-08-08', 'N/A', '$u_distributor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_email` varchar(80) NOT NULL,
  `u_password` varchar(80) NOT NULL,
  `u_profession` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_email`, `u_password`, `u_profession`) VALUES
(1, 'admin', 'admin@cementcraft.com', 'admin', 'admin'),
(4, 'Manzi', 'manzidavid111@gmail.com', '12345', 'inspector'),
(5, 'Manzi', 'm.david@alustudent.com', '9876', 'Inspector');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_id` (`asset_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myresources`
--
ALTER TABLE `myresources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply-chain`
--
ALTER TABLE `supply-chain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `myresources`
--
ALTER TABLE `myresources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supply-chain`
--
ALTER TABLE `supply-chain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
