-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 06:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(50) NOT NULL,
  `book_no` varchar(500) NOT NULL,
  `isbn` int(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edition` varchar(60) DEFAULT NULL,
  `publisher` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_no`, `isbn`, `title`, `category`, `author`, `edition`, `publisher`, `year`, `status`) VALUES
(1, '', 1111, 'Software Engineeing', 'Software Engineering', 'Sommer Ville', '8', '', 1981, 'Yes'),
(2, '', 1112, 'Fundamental Algorithm', '', 'Donald E.Knuth', '2', '', 1974, 'No'),
(3, '', 1116, 'Advanced Calculus', 'Basics', 'Robert C.Wrede Murray Spiegel', '2', '', 0000, ''),
(4, '', 1119, 'Concepts of programming language', 'Programming Languages', 'Robert W.Sebesta', '8', '', 0000, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `issue_status`
--

CREATE TABLE `issue_status` (
  `issue_id` int(10) NOT NULL,
  `enroll_no` varchar(50) NOT NULL,
  `mem_name` varchar(50) NOT NULL,
  `mem_contact` varchar(50) NOT NULL,
  `mem_email` varchar(50) NOT NULL,
  `mem_username` varchar(50) NOT NULL,
  `issued_book_name` varchar(50) NOT NULL,
  `issued_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_status`
--

INSERT INTO `issue_status` (`issue_id`, `enroll_no`, `mem_name`, `mem_contact`, `mem_email`, `mem_username`, `issued_book_name`, `issued_date`, `return_date`) VALUES
(32, '2011/sp/155', 'Jack', '0212224444', 'j@gmail.com', 'jksp', 'Software Engineeing', '21-Mar-2018', '21-Mar-2018'),
(33, '2011/sp/155', 'Jack', '0212224444', 'j@gmail.com', 'jksp', 'Software Engineeing', '21-Mar-2018', '21-Mar-2018'),
(34, '2011/sp/155', 'Jack', '0212224444', 'j@gmail.com', 'jksp', 'Software Engineeing', '21-Mar-2018', '21-Mar-2018'),
(35, '2011/sp/155', 'Jack', '0212224444', 'j@gmail.com', 'jksp', 'Software Engineeing', '21-Mar-2018', '21-Mar-2018'),
(36, 'EI/1111', 'Jane', '0112345678', 'j@gmail.com', 'jane', 'Software Engineeing', '22-Mar-2018', '22-Mar-2018');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `user_type`) VALUES
(5, 'librarian', '21232f297a57a5a743894a0e4a801f', 'libsys@gmail.com', 'user'),
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'a@gmail.com', 'admin'),
(8, 'user1', 'ee11cbb19052e40b07aac0ca060c23ee', 'u@gmail.com', 'user'),
(9, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user@gmail.com', 'admin'),
(10, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `enroll_no` varchar(100) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_contact` varchar(100) NOT NULL,
  `mem_address` varchar(100) NOT NULL,
  `mem_username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mem_email` varchar(255) NOT NULL,
  `mem_type` varchar(100) NOT NULL,
  `mem_image` varchar(500) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `enroll_no`, `mem_name`, `mem_contact`, `mem_address`, `mem_username`, `password`, `mem_email`, `mem_type`, `mem_image`, `reg_date`) VALUES
(4, 'EI/1111', 'Jane', '0112345678', 'Colombo', 'jane', '5844a15e76563fedd11840fd6f40ea7b', 'j@gmail.com', '', '', '0000-00-00'),
(5, '2011/sp/155', 'Raja', 'o121212234', 'kandy', 'raja', '526e34d04735124f05a090181f3e6e8a', 'r@gmail.com', '', '', '0000-00-00'),
(6, '2015/sp/001', 'Ravi', '0776543234', 'Jaffna', 'ravi', '63dd3e154ca6d948fc380fa576343ba6', 'ravi@gmail.com', '', '', '0000-00-00'),
(7, '2000/sp/155', 'Jack', '0721212134', 'Matara', 'jack', '', 'jack@gmail.com', '', 'images/user_images/fdad7a20405e5c56313fc513834ad03euser.jpg', '0000-00-00'),
(8, 'EI/3434', 'Peter', '0771111112', 'Jaffna', 'peter', '51dc30ddc473d43a6011e9ebba6ca770', 'peter@gmail.com', '', 'images/user_images/d2b8c6b24d6f9e517be31ded629648afuser.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `logs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `request_id`, `message`, `logs`) VALUES
(1, 1, 'software engineeing', '2018-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `return_status`
--

CREATE TABLE `return_status` (
  `return_id` int(10) NOT NULL,
  `return_mem` int(10) NOT NULL,
  `return_book_name` varchar(50) NOT NULL,
  `return_date` date NOT NULL,
  `id_book2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `issue_status`
--
ALTER TABLE `issue_status`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `issued_mem` (`enroll_no`),
  ADD KEY `issued_mem_2` (`enroll_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `return_status`
--
ALTER TABLE `return_status`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `id_book2` (`id_book2`),
  ADD KEY `return_mem` (`return_mem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `issue_status`
--
ALTER TABLE `issue_status`
  MODIFY `issue_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `return_status`
--
ALTER TABLE `return_status`
  MODIFY `return_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
