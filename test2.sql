

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



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

INSERT INTO `products` (`id`, `Products_name`, `products_desc`, `products_quality`, `products_rating`, `products_image`) VALUES(1,'Lakna','Lakna te bardha per sallat','i mire',10,'')

COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `emri` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `is_admin` varchar(255) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`emri`, `username`, `email`, `password`, `confirm_password`, `is_admin`) VALUES
('trimi', 'trimi12', 'trimi@gmail.com', '$2y$10$IxZvan1zeC9ylyB/HhCsS.uM7Vw5/TRc7lyWYDmzqGUjJLPMDEaPa', '$2y$10$guYNHdMuy9kHjuNCLY3W2u/xh1BE9H7uKOggOncT/ITMpfEuIpLJq', ''),
('trim', 'trimi', 'trimmerovci10@gmail.com', '$2y$10$XDvXXROmBFyPnQixGdF.hukx/wy3szn/.mz49qYpP4YyAOGNfkeJi', '$2y$10$aJ9d0GXUCYyjmY1cIqJTkeiFwMGA.Jh5LNQehPrNpqe.TcwiQl1X2', ''),
('trimi', 'trimi12', 'trimi@gmail.com', '$2y$10$IxZvan1zeC9ylyB/HhCsS.uM7Vw5/TRc7lyWYDmzqGUjJLPMDEaPa', '$2y$10$guYNHdMuy9kHjuNCLY3W2u/xh1BE9H7uKOggOncT/ITMpfEuIpLJq', ''),
('trim', 'trimi', 'trimmerovci10@gmail.com', '$2y$10$XDvXXROmBFyPnQixGdF.hukx/wy3szn/.mz49qYpP4YyAOGNfkeJi', '$2y$10$aJ9d0GXUCYyjmY1cIqJTkeiFwMGA.Jh5LNQehPrNpqe.TcwiQl1X2', ''),
('trimi', 'pro_1231233', 'trimmerovci10@gmail.com', '$2y$10$aN6Dk0m9XHxkUm8TSRQEv.o1AsLVhrIzJ6c7T03aRFx8dwiCmAN9.', '$2y$10$LT5r4VcDD2B.R1HMkWRv9uiiVKHUGS3KhV5mEmWmp5pQDCBoo5nWW', ''),
('trimi', 'trimi12', 'trimi@gmail.com', '$2y$10$IxZvan1zeC9ylyB/HhCsS.uM7Vw5/TRc7lyWYDmzqGUjJLPMDEaPa', '$2y$10$guYNHdMuy9kHjuNCLY3W2u/xh1BE9H7uKOggOncT/ITMpfEuIpLJq', ''),
('trim', 'trimi', 'trimmerovci10@gmail.com', '$2y$10$XDvXXROmBFyPnQixGdF.hukx/wy3szn/.mz49qYpP4YyAOGNfkeJi', '$2y$10$aJ9d0GXUCYyjmY1cIqJTkeiFwMGA.Jh5LNQehPrNpqe.TcwiQl1X2', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;