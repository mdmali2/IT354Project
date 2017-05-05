-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 05:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoptme`
--

-- --------------------------------------------------------

--
-- Table structure for table `catdb`
--

CREATE TABLE `catdb` (
  `name` varchar(16) NOT NULL,
  `id` int(110) NOT NULL,
  `image` varchar(200) NOT NULL,
  `shelter` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `declawed` varchar(3) NOT NULL,
  `fee` int(5) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catdb`
--

INSERT INTO `catdb` (`name`, `id`, `image`, `shelter`, `description`, `declawed`, `fee`, `age`, `gender`) VALUES
('Mittens', 1, '1493741711.jpeg', 'Malamute Resuce', 'Fun, Playful', 'yes', 120, 8, 'female'),
('Lady', 6, '1493742629.jpg', 'Malamute Resuce', 'Quiet, Mysterious', 'yes', 120, 6, 'female'),
('Hermes', 3, '1493741773.jpg', 'Malamute Resuce', 'Fun, Rowdy', 'no', 300, 4, 'male'),
('Rowdy', 7, '1493746836.jpg', 'Malamute Resuce', 'Good', 'yes', 500, 21, 'female'),
('Orange', 5, '1493741878.jpg', 'Malamute Resuce', 'Calm, Resourceful', 'yes', 150, 8, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `dogdb`
--

CREATE TABLE `dogdb` (
  `name` varchar(16) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `shelter` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `size` varchar(20) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `fee` int(5) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dogdb`
--

INSERT INTO `dogdb` (`name`, `image`, `id`, `shelter`, `description`, `size`, `breed`, `fee`, `age`, `gender`) VALUES
('Frankie', '1493741943.jpg', 1, 'Hospice for Hearts', 'Strong, vigilient', 'X-Large', 'Alaskan Malamute', 230, 7, 'male'),
('Chuck', '1493742171.jpg', 5, 'Hospice for Hearts', 'Emotional', 'Large', 'Afghan Hound', 120, 4, 'male'),
('Rancho', '1493742047.jpg', 3, 'Hospice for Hearts', 'Playful', 'Medium', 'Border Collie', 120, 4, 'female'),
('Genghis Khan', '1493742119.jpg', 4, 'Hospice for Hearts', 'Fast, Hunting', 'Large', 'German Shepherd', 120, 2, 'male'),
('Skype', '1493742239.jpg', 6, 'Hospice for Hearts', 'Fun', 'Small', 'Skye Terrier', 120, 9, 'female'),
('Duke', '1493742355.jpg', 7, 'Hospice for Hearts', 'Fun', 'Large', 'Mix', 120, 3, 'male'),
('Cotton', '1493743498.jpg', 12, 'Malamute Resuce', 'Fun, Boisterous ', 'Medium', 'Border Collie', 190, 1, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `favoritedb`
--

CREATE TABLE `favoritedb` (
  `userID` varchar(30) NOT NULL,
  `petID` int(255) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favoritedb`
--

INSERT INTO `favoritedb` (`userID`, `petID`, `type`) VALUES
('user', 1, 'cat'),
('user', 4, 'dog'),
('user', 3, 'dog');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user`, `pass`, `admin`) VALUES
('user', 'test', 0),
('user1', 'test', 1),
('admin1', 'test', 1),
('admin2', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shelters`
--

CREATE TABLE `shelters` (
  `shelter` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelters`
--

INSERT INTO `shelters` (`shelter`, `phone`, `email`) VALUES
('Malamute Resuce', '217-274-2200', 'malamute95@gmail.com'),
('Hospice for Hearts', '217-256-9090', 'hospice123@gmail.com'),
('Ashley Email Test Adoption', '217-274-0478', 'kocandaashley@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `shelter` varchar(30) NOT NULL,
  `user` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`shelter`, `user`) VALUES
('Malamute Resuce', 'admin1'),
('Hospice for Hearts', 'admin2'),
('Malamute Resuce', 'user1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catdb`
--
ALTER TABLE `catdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogdb`
--
ALTER TABLE `dogdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `user` (`user`(6));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catdb`
--
ALTER TABLE `catdb`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dogdb`
--
ALTER TABLE `dogdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
