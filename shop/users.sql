-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2023 at 05:58 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first-name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last-name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `postion` varchar(191) NOT NULL,
  `rank` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first-name`, `last-name`, `email`, `password`, `postion`, `rank`) VALUES
(1, 'adminaa', 'admin', 'adminsolution@gmail.com', '$2y$10$/pY4yXDSlPJl3AyDq99it.DRyi1qMGiavEWvkklOeEBACksUz9AbW', 'admin', 1),
(2, 'ziad', 'salamaaaaaa', 'ziadsalama767@gmail.com', '$2y$10$DRsU5MKZD/SYOJnG3N18meKDftGeJqq0tWTTJfMKawt0TNgb2t1BC', 'developer', 0),
(3, 'ali', 'sharara', 'ali@gmail.com', '', 'hr', 0),
(4, 'nasser', 'shata', 'nasser@gmial.com', '', 'employee', 0),
(5, 'farg', 'salama', 'farg@gmail.com', '', 'employee', 0),
(11, 'sara', 'ali', 'sara@gmail.com', '$2y$10$DltMG2y5sAhBrZdkcqtjL.L2G3F7osqh8/jGxQCYgkmNUfG/QKi8G', 'employee', 0),
(12, 'tamer', 'salama', 'tamer@gmail.com', '$2y$10$fTaH1yUIkMh1WuSCi8ahO.9C4.1QRwHNS8KF4gIvS3fINjbUNpcQq', 'developer', 0),
(13, 'mohamed', 'medht', 'medht@gmail.com', '$2y$10$hxOsVCxOdRIsRSlhEGhYlOSFi42gGdmQqUb6ZdV5XTM53MnVyJ4Uu', 'employee', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
