-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 08:34 AM
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
-- Database: `petcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_request`
--

CREATE TABLE `adoption_request` (
  `userSno` int(255) NOT NULL,
  `rescuedId` int(11) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_approve` int(1) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL,
  `imagePath_fk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_request`
--

INSERT INTO `adoption_request` (`userSno`, `rescuedId`, `requested_at`, `admin_approve`, `id`, `imagePath_fk`) VALUES
(13, 27, '2023-12-11 06:26:36', 1, 12, NULL),
(13, 29, '2023-12-11 06:31:34', 2, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_owner_name` varchar(255) NOT NULL,
  `phone_number` int(14) NOT NULL,
  `appointment_type` varchar(255) NOT NULL,
  `preferred_date` datetime NOT NULL DEFAULT current_timestamp(),
  `approved` tinyint(1) DEFAULT 0,
  `sno` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `pet_name`, `pet_owner_name`, `phone_number`, `appointment_type`, `preferred_date`, `approved`, `sno`) VALUES
(46, 'cat', 'Raha', 1797611989, 'Grooming', '2023-12-11 19:26:00', 1, 13),
(48, 'billi', 'Raha', 1797611989, 'Neuter/Spay', '2023-12-12 14:30:00', 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `credentials` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `field`, `credentials`, `description`, `contact`, `photo`) VALUES
(1, 'Dr. Karim Ahmed\r\n\r\n', 'Exotic Animal Medicine', 'DVM, Exotic Animal Medicine Certification', 'Dr. Ahmed has a keen interest in exotic pets and their unique medical needs. He provides specialized care and treatment for various exotic species, including reptiles, birds, and small mammals, emphasizing their specific dietary and environmental requirem', 'Email: drkarim@pawcare.com | Phone: +880-345-678901', 'doctor2.jpg'),
(2, 'Dr. Ayesha Rahman\r\n\r\n', 'Veterinary Surgery', 'DVM, PhD in Veterinary Medicine', 'Dr. Rahman specializes in advanced surgical procedures for animals, with a focus on orthopedic and soft tissue surgeries. She has extensive experience in both clinical practice and research, contributing significantly to innovative surgical techniques for', 'Email: drayesha@pawcare.com | Phone: +880-123-456789', 'doctor5.jpg'),
(4, 'Dr. Riaz Khan', 'Small Animal Dentistry', 'DVM, Advanced Certification in Veterinary Dentistry', 'Dr. Khan specializes in small animal dentistry, promoting oral health in pets through preventive care and advanced dental procedures. He is committed to educating pet owners about the importance of dental hygiene for their furry friends.', 'Email: drriaz@pawcare.com | Phone: +880-789-012345', 'doctor4.jpg'),
(5, 'Dr. Sabrina Islam\r\n\r\n', 'Animal Behavior and Psychology', 'DVM, Certified Animal Behaviorist', 'Dr. Islam specializes in understanding and modifying animal behavior, helping pet owners address behavioral issues in their pets through positive reinforcement and behavioral therapy. She conducts seminars and workshops to promote a deeper understanding o', 'Email: drsabrina@pawcare.com | Phone: +880-234-567890', 'doctor1.jpg'),
(7, 'Dr. Farhan Khan\r\n\r\n', 'Veterinary Cardiology', 'DVM, MS in Veterinary Cardiology', 'Dr. Khan is a dedicated veterinary cardiologist known for his expertise in diagnosing and treating heart conditions in animals. He has a passion for educating pet owners about heart health and preventive measures for their furry companions.', 'Email: drfarhan@pawcare.com | Phone: +880-987-654321', 'doctor6.jpg'),
(8, 'Dr. Imran Ahmed\r\n\r\n', 'Wildlife Medicine', 'DVM, MSc in Wildlife Conservation', 'Dr. Ahmed is a passionate wildlife veterinarian dedicated to the health and conservation of wild animals. He actively participates in field research and rescue missions, focusing on the intersection of veterinary medicine and wildlife conservation efforts', 'Email: drimran@pawcare.com | Phone: +880-567-890123', 'doctor3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rescue`
--

CREATE TABLE `rescue` (
  `id` int(11) NOT NULL,
  `rescuer_name` varchar(255) NOT NULL,
  `animal_type` varchar(50) NOT NULL,
  `found_area` varchar(100) NOT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagePath` varchar(255) DEFAULT NULL,
  `admin_ver` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rescue`
--

INSERT INTO `rescue` (`id`, `rescuer_name`, `animal_type`, `found_area`, `additional_info`, `created_at`, `imagePath`, `admin_ver`) VALUES
(27, 'Doggy', 'Dog', 'Sylhet', 'Hello', '2023-12-10 14:05:20', 'uploads/6575c5a02ab10.jpg', 1),
(29, 'Tamzid', 'Cat', 'Rangpur', 'Found it on the road side', '2023-12-11 06:25:37', 'uploads/6576ab61bbab5.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `email`, `password`, `role`) VALUES
(13, 'hell@gmail.com', '$2y$10$XYyBecNA9bmkHFAlm3Gb5ODrdXfmsj77RR31qnJR2tIIqnu/NsR02', 'user'),
(14, 'admin@gmail.com', '$2y$10$5nd5MHPnxLCl8YV/MVDDiOTw5NiCAz83SRISwVdPQlZUtnrFQG6dW', 'admin'),
(15, 'name@gmail.com', '$2y$10$2vobR/x7oC8uiICq79UhQeXbaQYBeaxAg5iM35Dj2rFMV8r95K5cS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_request`
--
ALTER TABLE `adoption_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adoption_request_users` (`userSno`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_appointments_users` (`sno`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rescue`
--
ALTER TABLE `rescue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_request`
--
ALTER TABLE `adoption_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rescue`
--
ALTER TABLE `rescue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_request`
--
ALTER TABLE `adoption_request`
  ADD CONSTRAINT `fk_adoption_request_users` FOREIGN KEY (`userSno`) REFERENCES `users` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_appointments_users` FOREIGN KEY (`sno`) REFERENCES `users` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
