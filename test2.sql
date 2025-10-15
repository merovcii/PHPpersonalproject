-- Database: `test2`

-- --------------------------------------------------------
-- Table structure for table `products`
-- --------------------------------------------------------
CREATE TABLE `products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `products_name` VARCHAR(255) NOT NULL,
  `products_desc` VARCHAR(255) NOT NULL,
  `products_quality` VARCHAR(255) NOT NULL,
  `products_rating` INT NOT NULL,
  `products_image` VARCHAR(255) NOT NULL,
  `products_price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `products` 
(`id`, `products_name`, `products_desc`, `products_quality`, `products_rating`, `products_image`, `products_price`) 
VALUES 
(1, 't-shirt', 'For daily occasions', 'Great', 10, '', 7.99);


-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `emri` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `confirm_password` VARCHAR(255) NOT NULL,
  `is_admin` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`emri`, `username`, `email`, `password`, `confirm_password`, `is_admin`) VALUES
('trimi', 'trimi12', 'trimi@gmail.com', '$2y$10$IxZvan1zeC9ylyB/HhCsS.uM7Vw5/TRc7lyWYDmzqGUjJLPMDEaPa', '$2y$10$guYNHdMuy9kHjuNCLY3W2u/xh1BE9H7uKOggOncT/ITMpfEuIpLJq', ''),
('trim', 'trimi', 'trimmerovci10@gmail.com', '$2y$10$XDvXXROmBFyPnQixGdF.hukx/wy3szn/.mz49qYpP4YyAOGNfkeJi', '$2y$10$aJ9d0GXUCYyjmY1cIqJTkeiFwMGA.Jh5LNQehPrNpqe.TcwiQl1X2', ''),
('trimi', 'pro_1231233', 'trimmerovci10@gmail.com', '$2y$10$aN6Dk0m9XHxkUm8TSRQEv.o1AsLVhrIzJ6c7T03aRFx8dwiCmAN9.', '$2y$10$LT5r4VcDD2B.R1HMkWRv9uiiVKHUGS3KhV5mEmWmp5pQDCBoo5nWW', '');
