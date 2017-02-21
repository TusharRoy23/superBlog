-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 03:53 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(100) NOT NULL,
  `threadID` int(100) NOT NULL,
  `commentContent` varchar(255) NOT NULL,
  `userID` int(100) NOT NULL,
  `commentDate` varchar(100) NOT NULL,
  `commentTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `threadID`, `commentContent`, `userID`, `commentDate`, `commentTime`) VALUES
(1, 1, 'Good For Us. Thank you', 2, '2017/02/21', '08:33 pm'),
(2, 1, 'I don''t Think So.', 2, '2017/02/21', '08:33 pm');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `userID` int(100) NOT NULL,
  `threadID` int(100) NOT NULL,
  `commentID` int(100) NOT NULL,
  `replyID` int(100) NOT NULL,
  `replyContent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threadID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `uploadDate` varchar(10) NOT NULL,
  `uploadTime` varchar(10) NOT NULL,
  `threadTitle` varchar(100) NOT NULL,
  `threadContent` varchar(255) NOT NULL,
  `updateDate` varchar(100) NOT NULL,
  `updateTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threadID`, `userID`, `uploadDate`, `uploadTime`, `threadTitle`, `threadContent`, `updateDate`, `updateTime`) VALUES
(1, 1, '2017/02/21', '08:22 pm', 'How to develop a digital plan to make change', 'Rosa Parks just some kid who decided to defy white authority and ', '2017/02/21', '08:22 pm'),
(2, 1, '2017/02/21', '08:31 pm', 'March for Science', 'The problem is that science is inextricably a political endeavor, always has been and always will be. That does not, however, mean it should ideological, these â€œapoliticalâ€ critics just fail to understand or express that ideology is the real problem. ', '2017/02/21', '08:31 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'userNumOne', 'af6551d4521f652bc09a59ebb6767f55', 'userNumOne', 'userNumOne@gmail.com'),
(2, 'userNumTwo', 'af6551d4521f652bc09a59ebb6767f55', 'userNumTwo', 'userNumTwo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threadID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threadID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
