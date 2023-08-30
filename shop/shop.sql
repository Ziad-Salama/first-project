-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2023 at 05:23 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first-name`, `last-name`, `email`, `password`, `postion`, `rank`) VALUES
(1, 'admin', 'admin', 'adminsolution@gmail.com', '$2y$10$/pY4yXDSlPJl3AyDq99it.DRyi1qMGiavEWvkklOeEBACksUz9AbW', 'manager', 1),
(2, 'ziad', 'salama', 'ziadsalama767@gmail.com', '$2y$10$DRsU5MKZD/SYOJnG3N18meKDftGeJqq0tWTTJfMKawt0TNgb2t1BC', 'developer', 0),
(19, 'nasser', 'shata', 'nasser@gmail.com', '$2y$10$jeideWtmQqsCrRCbPJrXQuEfMdeQv1jDecfOnYFAc/s729HP5h/9q', 'hr', 0),
(11, 'sara', 'ali', 'sara@gmail.com', '', 'designer', 0),
(18, 'sharara', 'mohamed', 'sharara@gmail.com', '$2y$10$HDXDSZ4heCqOpp.usdnONu5wePwfsxFXYWsbDdLwxH7iGkNmWEhnO', 'hr', 0),
(15, 'ahmed', 'fathy', 'ahmed@gmail.com', '$2y$10$S8XBLEY6Gd71VF2iGMJzQue6Mb1Xi1amLpk7yWxZW7/eCR.Mw5zO6', 'developer', 0),
(17, 'ali', 'shara', 'ali@gmail.com', '$2y$10$caWP5iSVfUFcdeXPppsPsO33D/Xftpm2QuF17mQ7m7FBMEXjMFPcK', 'developer', 0),
(13, 'mohamed', 'medht', 'medht@gmail.com', '$2y$10$hxOsVCxOdRIsRSlhEGhYlOSFi42gGdmQqUb6ZdV5XTM53MnVyJ4Uu', 'employee', 0),
(14, 'farg', 'salamaa', 'farg@gmail.com', '$2y$10$dGOdEUeHhe7i7etzlBnRUOhusCpjkffbLfSUY2laP.zDKHgZ1Y61y', 'designer', 0),
(20, 'shata', 'nasser', 'shata@gmail.com', '$2y$10$mZcWIG2tSdp3DsOqPSmjV.c.XSjiDdOEfCXi7iQwnb5o6HhMnck1C', 'accounting', 0),
(21, 'fathy', 'ahmed', 'fathy@gmail.com', '$2y$10$0xKxUCsYliGjndZ2bPSXC.YIWFNdbRyDb4QByloR9/QiFeKAIDnje', 'developer', 0),
(22, 'samer', 'taha', 'samer@gmail.com', '$2y$10$g7igMN9e2.xkdGeyfGwZfuImtMAFh2YhP3KOrPYHkk2ahiVE4S7Za', 'accounting', 0),
(23, 'tata', 'tata', 'tata@gmail.com', 'Tata@123', '', 0),
(24, 'fofa', 'fofa', 'fofa@gmail.com', 'Fofa@123', '', 0),
(25, 'adel', 'adel', 'adel@gmail.com', 'Adel@123', '', 0),
(26, 'fady', 'fady', 'fady@gmail.com', 'Fady@123', '', 0),
(27, 'dasdas', 'das', 'dasd', 'Admin@1234', '', 0),
(28, 'ali', 'ali', 'adminsolution@gmail.com', 'Admin@1234', 'manager', 1),
(29, 'sara', 'sharara', 'ziadsalama767@gmail.com', 'Admin@1234', 'developer', 0),
(31, 'ziad ', 'ziad', 'ziadsalama767@gmail.com', 'Admin@1234', 'manager', 1),
(32, 'sara', 'shata', 'adminsolution@gmail.com', 'Admin@1234', 'designer', 1),
(33, 'sara', 'ali', 'adminsolution@gmail.com', 'Admin@1234', 'manager', 0),
(34, 'dasd', 'das', 'ali@gmail.com', 'Admin@1234', 'designer', 0),
(35, 'sara', 'shata', 'elzeoo9@gmail.com', 'Admin@1234', 'developer', 0),
(36, 'ali', 'shata', 'elzeoo9@gmail.com', 'Admin@1234', 'developer', 0),
(37, 'sara', 'ali', 'adminsolution@gmail.com', 'adsdasd', 'developer', 0),
(38, 'sara', 'shata', 'adminsolution@gmail.com', 'Admin@1234', 'developer', 0),
(39, 'nasser', 'sharara', 'adminsolution@gmail.com', 'Admin@1234', 'developer', 0),
(40, 'sasa', 'sasa', 'sasa@gmail.com', 'sasas12312', 'developer', 0),
(42, 'qqqqqqq', 'qqqqqqqqq', 'qqqqqq@qqq.com', 'qqqqqq', 'manager', 0),
(43, 'wwwwwww', 'wwwwwww', 'wwww@www.com', 'wwwwwwwwww', 'manager', 0),
(44, 'ali', 'sharara', 'ziadsalama767@gmail.com', 'Admin@1234', 'manager', 0),
(45, 'nasser', 'salama', 'elzeoo9@gmail.com', 'Admin@1234', 'developer', 0),
(46, 'fahmy', 'fahmy', 'fahmy@gmail.com', 'Admin@1234', 'accounting', 0),
(47, 'qwqw', 'qwqw', 'sara@gmail.com', 'Admin@1234', 'developer', 0),
(48, 'q', 'q', 'sara@gmail.com', 'Admin@1234', 'developer', 0),
(49, 'r', 'r', 'adminsolution@gmail.com', 'Admin@1234', 'developer', 0),
(50, 't', 't', 'ali@gmail.com', 'Admin@1234', 'developer', 0),
(51, 'yy', 'yy', 'adminsolution@gmail.com', 'Admin@1234', 'manager', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
