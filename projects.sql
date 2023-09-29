-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 08:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_adv`
--

CREATE TABLE `assign_adv` (
  `ass_id` int(200) NOT NULL,
  `ass_name` varchar(500) NOT NULL,
  `ass_ques` text NOT NULL,
  `ass_doc` int(100) NOT NULL,
  `ass_dl` int(50) NOT NULL,
  `ass_sub` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_adv`
--

INSERT INTO `assign_adv` (`ass_id`, `ass_name`, `ass_ques`, `ass_doc`, `ass_dl`, `ass_sub`, `file_path`) VALUES
(1, 'C# Assignment', 'Swap two numbers using C#', 0, 2023, '', ''),
(2, 'Basic programming', 'Write a java program to define a binary search tree', 0, 2023, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `assign_beg`
--

CREATE TABLE `assign_beg` (
  `ass_id` int(11) NOT NULL,
  `ass_name` varchar(200) NOT NULL,
  `ass_ques` text NOT NULL,
  `ass_doc` varchar(50) NOT NULL,
  `ass_dl` date NOT NULL,
  `ass_sub` varchar(200) NOT NULL,
  `file_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_beg`
--

INSERT INTO `assign_beg` (`ass_id`, `ass_name`, `ass_ques`, `ass_doc`, `ass_dl`, `ass_sub`, `file_path`) VALUES
(1, 'Html assignment', 'Design a  landing page of lms', '', '2023-09-30', '', '0'),
(7, 'Assignment 1', 'write a program', '', '2023-09-30', '', ''),
(10, 'Basic programming', 'Write a program to print fibanocci series', 'problem.1 Gwe.pdf', '2023-09-30', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_int`
--

CREATE TABLE `ass_int` (
  `ass_id` int(200) NOT NULL,
  `ass_name` varchar(50) NOT NULL,
  `ass_ques` varchar(50) NOT NULL,
  `ass_doc` varchar(100) NOT NULL,
  `ass_dl` date NOT NULL,
  `ass_sub` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ass_int`
--

INSERT INTO `ass_int` (`ass_id`, `ass_name`, `ass_ques`, `ass_doc`, `ass_dl`, `ass_sub`, `file_path`) VALUES
(1, 'Java Programming', 'Write a java program for right rotation of 2D arra', 'unit-5. AWM.pdf', '2023-10-02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_sub`
--

CREATE TABLE `ass_sub` (
  `ass_id` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `EmailAddress` varchar(200) NOT NULL,
  `ass_name` varchar(200) NOT NULL,
  `ass_doc` varchar(200) NOT NULL,
  `ass_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ass_sub`
--

INSERT INTO `ass_sub` (`ass_id`, `student_name`, `EmailAddress`, `ass_name`, `ass_doc`, `ass_date`) VALUES
('', '', 'jananik.20ag@rathinam.in', 'Html assignment', 'uploads1/Gwe problem.pdf', '2023-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `ass_sub_adv`
--

CREATE TABLE `ass_sub_adv` (
  `ass_id` int(200) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `ass_name` varchar(50) NOT NULL,
  `ass_doc` varchar(100) NOT NULL,
  `ass_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ass_sub_adv`
--

INSERT INTO `ass_sub_adv` (`ass_id`, `EmailAddress`, `ass_name`, `ass_doc`, `ass_date`) VALUES
(1, 'nithya123@gmail.com', 'Java Programming', 'uploads1/hmt 2.pdf', '2023-09-26'),
(2, 'iniya123@gmail.com', 'Java Programming', 'uploads1/Gwe problem.pdf', '2023-09-27'),
(3, 'iniya123@gmail.com', 'Basic programming', 'uploads1/cad-for-agricultural-engineering-laboratory-manual.pdf', '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `ass_sub_int`
--

CREATE TABLE `ass_sub_int` (
  `ass_id` int(200) NOT NULL,
  `EmailAddress` varchar(500) NOT NULL,
  `ass_name` varchar(55) NOT NULL,
  `ass_doc` varchar(100) NOT NULL,
  `ass_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ass_sub_int`
--

INSERT INTO `ass_sub_int` (`ass_id`, `EmailAddress`, `ass_name`, `ass_doc`, `ass_date`) VALUES
(1, 'kaviya123@gmail.com', 'Java Programming', 'uploads1/TCS NQT.pdf', '2023-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `course_name` varchar(200) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  `course_document` varchar(50) NOT NULL,
  `course_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_name`, `course_type`, `course_document`, `course_link`) VALUES
('JavaScript', 'beginner', '6512df4e00fc13.34593891.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `help_id` int(200) NOT NULL,
  `Queries` text NOT NULL,
  `CourseLevel` varchar(50) NOT NULL,
  `response` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`help_id`, `Queries`, `CourseLevel`, `response`) VALUES
(1, 'Need unit notes of js', 'Intermediate', 'WILL LET YOU KNOW'),
(2, 'A clear explanation of binary tree is needed', 'Beginner', 'A binary tree is a tree-type non-linear data structure with a maximum of two children for each parent. ');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `submission_id` int(200) NOT NULL,
  `ass_name` varchar(200) NOT NULL,
  `EmailAddress` varchar(200) NOT NULL,
  `score` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`submission_id`, `ass_name`, `EmailAddress`, `score`) VALUES
(1, 'Java Programming', 'iniya123@gmail.com', 8),
(2, 'Basic programming', 'iniya123@gmail.com', 6),
(3, 'Html assignment', 'jananik.20ag@rathinam.in', 7),
(4, 'Java Programming', 'kaviya123@gmail.com', 5),
(5, 'Basic programming', 'iniya123@gmail.com', 6),
(6, 'Basic programming', 'iniya123@gmail.com', 6),
(7, 'Java Programming', 'nithya123@gmail.com', 8);

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `Staff_Name` varchar(200) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `AreaOfInterest` varchar(50) NOT NULL,
  `IdNumber` varchar(100) NOT NULL,
  `Staff_email` varchar(50) NOT NULL,
  `Staff_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`Staff_Name`, `PhoneNumber`, `AreaOfInterest`, `IdNumber`, `Staff_email`, `Staff_Password`) VALUES
('Dinesh', '8521479630', 'Backend', 'RTC20248004', 'dinesh123@gmail.com', 'Dinesh@987'),
('Vasanth', '8825832980', 'Fullstack', 'RTC20248306', 'vasanth1121@gmail.com', 'Vasanth@1121');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `Student_Name` varchar(200) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `CourseLevel` varchar(50) NOT NULL,
  `RegisterNumber` varchar(100) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Student_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`Student_Name`, `PhoneNumber`, `CourseLevel`, `RegisterNumber`, `EmailAddress`, `Student_Password`) VALUES
('Iniya', '9632145870', 'Advanced', '721820104002', 'iniya123@gmail.com', 'Iniya@987'),
('Janani', '7538831121', 'Beginner', '72120108306', 'jananik.20ag@rathinam.in', 'Admin@123'),
('Kaviya', '7894561230', 'Intermediate', '72120107006', 'kaviya123@gmail.com', 'Kavi@987'),
('Vasanth', '8825832980', 'Intermediate', '721820114306', 'vasanth1121@gmail.com', 'Vasanth@1121');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_adv`
--
ALTER TABLE `assign_adv`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `assign_beg`
--
ALTER TABLE `assign_beg`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `ass_int`
--
ALTER TABLE `ass_int`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `ass_sub`
--
ALTER TABLE `ass_sub`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `ass_sub_adv`
--
ALTER TABLE `ass_sub_adv`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `ass_sub_int`
--
ALTER TABLE `ass_sub_int`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`course_type`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`Staff_email`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`EmailAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_adv`
--
ALTER TABLE `assign_adv`
  MODIFY `ass_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_beg`
--
ALTER TABLE `assign_beg`
  MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ass_int`
--
ALTER TABLE `ass_int`
  MODIFY `ass_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ass_sub_adv`
--
ALTER TABLE `ass_sub_adv`
  MODIFY `ass_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ass_sub_int`
--
ALTER TABLE `ass_sub_int`
  MODIFY `ass_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `help_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `submission_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ass_sub`
--
ALTER TABLE `ass_sub`
  ADD CONSTRAINT `fk_student_email` FOREIGN KEY (`EmailAddress`) REFERENCES `student_login` (`EmailAddress`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
