-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2025 at 07:18 PM
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
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `Products_name` varchar(255) NOT NULL,
  `products_desc` varchar(255) NOT NULL,
  `products_quality` varchar(255) NOT NULL,
  `products_rating` int(255) NOT NULL,
  `products_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `is_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `username`, `email`, `password`, `confirm_password`, `is_admin`) VALUES
(0, 'trimi', 'trimi12', 'trimi@gmail.com', '$2y$10$IxZvan1zeC9ylyB/HhCsS.uM7Vw5/TRc7lyWYDmzqGUjJLPMDEaPa', '$2y$10$guYNHdMuy9kHjuNCLY3W2u/xh1BE9H7uKOggOncT/ITMpfEuIpLJq', ''),
(0, 'trim', 'trimi', 'trimmerovci10@gmail.com', '$2y$10$XDvXXROmBFyPnQixGdF.hukx/wy3szn/.mz49qYpP4YyAOGNfkeJi', '$2y$10$aJ9d0GXUCYyjmY1cIqJTkeiFwMGA.Jh5LNQehPrNpqe.TcwiQl1X2', ''),
(0, 'trimi', 'trimi12', 'trimi@gmail.com', '$2y$10$IxZvan1zeC9ylyB/HhCsS.uM7Vw5/TRc7lyWYDmzqGUjJLPMDEaPa', '$2y$10$guYNHdMuy9kHjuNCLY3W2u/xh1BE9H7uKOggOncT/ITMpfEuIpLJq', ''),
(0, 'trim', 'trimi', 'trimmerovci10@gmail.com', '$2y$10$XDvXXROmBFyPnQixGdF.hukx/wy3szn/.mz49qYpP4YyAOGNfkeJi', '$2y$10$aJ9d0GXUCYyjmY1cIqJTkeiFwMGA.Jh5LNQehPrNpqe.TcwiQl1X2', ''),
(0, 'trimi', 'pro_1231233', 'trimmerovci10@gmail.com', '$2y$10$aN6Dk0m9XHxkUm8TSRQEv.o1AsLVhrIzJ6c7T03aRFx8dwiCmAN9.', '$2y$10$LT5r4VcDD2B.R1HMkWRv9uiiVKHUGS3KhV5mEmWmp5pQDCBoo5nWW', ''),
(0, 'trimi', 'trimi12', 'trimi@gmail.com', '$2y$10$IxZvan1zeC9ylyB/HhCsS.uM7Vw5/TRc7lyWYDmzqGUjJLPMDEaPa', '$2y$10$guYNHdMuy9kHjuNCLY3W2u/xh1BE9H7uKOggOncT/ITMpfEuIpLJq', ''),
(0, 'trim', 'trimi', 'trimmerovci10@gmail.com', '$2y$10$XDvXXROmBFyPnQixGdF.hukx/wy3szn/.mz49qYpP4YyAOGNfkeJi', '$2y$10$aJ9d0GXUCYyjmY1cIqJTkeiFwMGA.Jh5LNQehPrNpqe.TcwiQl1X2', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
