-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 11:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kasarani_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(50) COLLATE utf8_bin NOT NULL,
  `regular` int(11) NOT NULL,
  `vip` int(10) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `tickets` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventname`, `regular`, `vip`, `startdate`, `enddate`, `tickets`) VALUES
(1, 'Safari 7''s', 500, 1000, '2017-02-25', '2017-02-26', 10000),
(2, 'Safaricom Jazz', 2500, 5000, '2017-03-02', '2017-03-06', 7500),
(3, 'Groove Awards 2017', 1000, 2000, '2017-03-11', '2017-02-05', 8000),
(6, 'Leavers Bash', 500, 1000, '2017-03-10', '0000-00-00', 3000),
(7, 'New year kasarani party', 0, 0, '2017-12-31', '2018-01-01', 0),
(8, 'Gor Mahia vs Afc Leopards', 300, 1000, '2017-02-01', '0000-00-00', 60000),
(9, 'Moi''s 100 years', 400, 800, '2017-03-23', '2017-03-23', 700);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(50) COLLATE utf8_bin NOT NULL,
  `category` varchar(12) COLLATE utf8_bin NOT NULL,
  `price` int(5) NOT NULL,
  `startdate` date NOT NULL,
  `code` varchar(12) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `eventname`, `category`, `price`, `startdate`, `code`) VALUES
(6, 'Leavers Bash', 'VIP', 1000, '2017-03-10', 'NJMQ2OX4L'),
(7, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'CH9FJDQM6'),
(8, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', '497GWZ0HC'),
(9, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'V4SJDHR7Q'),
(10, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'LQGJH9X0P'),
(11, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'X9FNTQRKC'),
(12, 'Leavers Bash', 'Regular', 500, '2017-03-10', '3KX8DYF5W'),
(13, 'Leavers Bash', 'Regular', 500, '2017-03-10', '13IGHTERC'),
(14, 'Leavers Bash', 'Regular', 500, '2017-03-10', 'WHGQTLVU7'),
(15, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'C4RSWLAFG'),
(16, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'ROP0I9FHX'),
(17, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'ONY23DWF4'),
(18, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'QRGLW9C60'),
(19, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'D3BYJA876'),
(20, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'KRVBIDP2E'),
(21, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'OV8GB4U0F'),
(22, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'PJTNKBZQR'),
(23, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'QNC84GHVU'),
(24, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'C6R2Y9WFJ'),
(25, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'K79J5XI8H'),
(26, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'CW920THFO'),
(27, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'YED94V8FU'),
(28, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'QLY4960KV'),
(29, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'JTQOS2R36'),
(30, 'Leavers Bash', 'Regular', 500, '2017-03-10', 'L69X7STP2'),
(31, 'Leavers Bash', 'Regular', 500, '2017-03-10', 'AWKJE2NVC'),
(32, 'Groove Awards 2017', 'Regular', 1000, '2017-03-11', 'CBN7UL2X6'),
(33, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'Z1W58M36V'),
(34, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'LKVT83D27'),
(35, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'MLJEFXIWD'),
(36, 'New year kasarani party', 'Regular', 0, '2017-12-31', '63NKE2BVX'),
(37, 'New year kasarani party', 'Regular', 0, '2017-12-31', '8YC6MG47L'),
(38, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'JE5LOAZ08'),
(39, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'WOHBTA93U'),
(40, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'SJGZU7MVO'),
(41, 'Leavers Bash', 'Regular', 500, '2017-03-10', 'VFR5O4UCL'),
(42, 'Leavers Bash', 'Regular', 500, '2017-03-10', '590KJC8IY'),
(43, 'New year kasarani party', 'Regular', 0, '2017-12-31', '9XPFA7WQ8'),
(44, 'New year kasarani party', 'Regular', 0, '2017-12-31', '9O01F3WKV'),
(45, 'New year kasarani party', 'Regular', 0, '2017-12-31', '6B8JSPMVH'),
(46, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'U14GMC0VL'),
(47, 'New year kasarani party', 'Regular', 0, '2017-12-31', '9B1Z5DJLI'),
(48, 'New year kasarani party', 'Regular', 0, '2017-12-31', '84BGXM5LZ'),
(49, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'MI6Y4JXGL'),
(50, 'Leavers Bash', 'Regular', 500, '2017-03-10', '7HGFMLZ13'),
(51, 'Leavers Bash', 'Regular', 500, '2017-03-10', '86L5PW1XR'),
(52, 'Leavers Bash', 'Regular', 500, '2017-03-10', 'UOJ8TR7PA'),
(53, 'Leavers Bash', 'Regular', 500, '2017-03-10', 'GEK7VQ35S'),
(54, 'Leavers Bash', 'Regular', 500, '2017-03-10', '2S8VB5CHA'),
(55, 'Safaricom Jazz', 'Regular', 2500, '2017-03-02', '1WSPEG75O'),
(56, 'Safaricom Jazz', 'Regular', 2500, '2017-03-02', 'YZCNG3J16'),
(57, 'Safaricom Jazz', 'Regular', 2500, '2017-03-02', 'IFLWHOMQC'),
(58, 'Safaricom Jazz', 'Regular', 2500, '2017-03-02', 'UORFG9ZNM'),
(59, 'Gor Mahia vs Afc Leopards', 'Regular', 300, '2017-02-01', '3EFCJLIQ8'),
(60, 'Gor Mahia vs Afc Leopards', 'Regular', 300, '2017-02-01', '4PKEA3T91'),
(61, 'Gor Mahia vs Afc Leopards', 'Regular', 300, '2017-02-01', 'BO57UETJM'),
(62, 'Gor Mahia vs Afc Leopards', 'Regular', 300, '2017-02-01', 'IQ8B720JG'),
(63, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'WBS5L3EPM'),
(64, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'LCXAIYSOM'),
(65, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'J6GABZP42'),
(66, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'BUZT5J1CG'),
(67, 'New year kasarani party', 'Regular', 0, '2017-12-31', 'Q3M0GI62E');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(1000) COLLATE utf8_bin NOT NULL,
  `ticketid` int(5) NOT NULL,
  `ticketcode` varchar(37) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `ticketid`, `ticketcode`) VALUES
(2, 'evanswanjau@gmail.com', 'evanswanjau', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(3, 'josephkanyirimuchiri@gmail.com', 'joekanyiri', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 0, ''),
(4, 'rosemarymurugi@gmail.com', 'rosemary', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 0, ''),
(5, 'kevin@gmail.com', 'kevin', 'eb74f2cb1a9d6a502e420f61c204e2c2cb3ec8a8', 0, ''),
(6, 'kevinwanjau@gmail.com', 'kevinwanjau', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(7, 'victor@gmail.com', 'victor', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 0, ''),
(8, 'frank@gmail.com', 'frank', '12', 0, ''),
(9, 'george@gmail.com', 'george', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0, ''),
(10, 'jane@gmail.com', 'jane', '2aa60a8ff7fcd473d321e0146afd9e26df395147', 0, ''),
(11, 'codydevelopers@gmail.com', 'cody', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(12, 'wanjau@gmail.com', 'wanjau', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0, ''),
(13, 'was@gmail.com', 'was', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0, ''),
(14, 'peter@gmail.com', 'peter', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(15, 'robert@gmail.com', 'rebert', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0, ''),
(16, 'linus@gmail.com', 'linus', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0, ''),
(17, 'admin@gmail.com', 'admin', 'admin123', 0, ''),
(19, 'admin@gmail.com', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 0, ''),
(20, 'logan@gmail.com', 'logan', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
