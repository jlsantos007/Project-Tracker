-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 04:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orangeapps_issue_ticketing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_module_tbl`
--

CREATE TABLE `child_module_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_module_tbl`
--

INSERT INTO `child_module_tbl` (`id`, `name`, `parent_id`) VALUES
(1, 'chidl_ng_module_1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments_tbl`
--

CREATE TABLE `departments_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments_tbl`
--

INSERT INTO `departments_tbl` (`id`, `name`) VALUES
(1, 'Management'),
(2, 'developer'),
(3, 'qa');

-- --------------------------------------------------------

--
-- Table structure for table `git_repo_tbl`
--

CREATE TABLE `git_repo_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `git_repo_tbl`
--

INSERT INTO `git_repo_tbl` (`id`, `name`) VALUES
(1, 'kt12'),
(2, 'collage'),
(3, 'kto12_int');

-- --------------------------------------------------------

--
-- Table structure for table `issue_tbl`
--

CREATE TABLE `issue_tbl` (
  `id` int(11) NOT NULL,
  `issue_title` varchar(50) NOT NULL,
  `issue_desc` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `modules_tbl_id` int(11) NOT NULL,
  `qa_type_id` int(11) NOT NULL,
  `git_repo_id` int(11) NOT NULL,
  `platform_type_id` int(11) NOT NULL,
  `track_issue_id` int(11) DEFAULT NULL,
  `issue_type_id` int(11) NOT NULL,
  `priority_level` int(11) NOT NULL,
  `issue_status` varchar(100) DEFAULT NULL,
  `issue_approved_by_id` int(11) DEFAULT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_tbl`
--

INSERT INTO `issue_tbl` (`id`, `issue_title`, `issue_desc`, `created_by`, `assigned_to`, `modules_tbl_id`, `qa_type_id`, `git_repo_id`, `platform_type_id`, `track_issue_id`, `issue_type_id`, `priority_level`, `issue_status`, `issue_approved_by_id`, `isActive`) VALUES
(1, 'Object oriented issue', 'part ng scholastic record ng student , yung alert message. “[object Object]” yung nakalagay pag nag save.', NULL, 1, 1, 1, 2, 2, NULL, 1, 2, NULL, 1, 0),
(2, 'Object oriented issue', ' levigratico@gmail.com GIT PULL GIT PULL Comments Share FileEditViewInsertFormatDataToolsAdd-onsHelpLast edit was yesterday at 11:52 PM      $%  123  Arial   10                                      tapos Forever loading animation pag nag save ng student s', NULL, 1, 1, 1, 2, 1, 1, 1, 1, NULL, 1, 0),
(3, 'Object oriented issue', 'May forever pa din.', NULL, 1, 1, 2, 2, 2, 2, 1, 1, NULL, 1, 0),
(4, 'Datepicker', 'dapat lahat yung date input nka datepicker yung may plugin. Hindi dpat yung default. Para kahit sa ibang browser nagwowork si date picker.', NULL, NULL, 1, 2, 2, 2, NULL, 1, 1, NULL, 1, 0),
(5, 'Datepicker', 'Paki lagyan ng red outside glow ang input text if walang laman yung Date of Birth field sa Personal Information ng student. Double check restrictions for both EMPLOYEE AND STUDENT PROFILE', NULL, 1, 1, 2, 2, 2, 4, 1, 2, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue_type`
--

CREATE TABLE `issue_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_type`
--

INSERT INTO `issue_type` (`id`, `name`) VALUES
(1, 'bug'),
(2, 'enhancement'),
(3, 'new feature');

-- --------------------------------------------------------

--
-- Table structure for table `modules_tbl`
--

CREATE TABLE `modules_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules_tbl`
--

INSERT INTO `modules_tbl` (`id`, `name`, `description`) VALUES
(1, 'Module1', 'una ulit hahaha'),
(2, 'Module3', 'asdasdasdsd');

-- --------------------------------------------------------

--
-- Table structure for table `platform_type`
--

CREATE TABLE `platform_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platform_type`
--

INSERT INTO `platform_type` (`id`, `name`) VALUES
(1, 'web'),
(2, 'ios'),
(3, 'android');

-- --------------------------------------------------------

--
-- Table structure for table `platform_type_accounts`
--

CREATE TABLE `platform_type_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platform_type_accounts`
--

INSERT INTO `platform_type_accounts` (`id`, `name`) VALUES
(1, 'student'),
(2, 'admin'),
(3, 'parent'),
(4, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `priority_level`
--

CREATE TABLE `priority_level` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priority_level`
--

INSERT INTO `priority_level` (`id`, `name`, `days`) VALUES
(1, 'high', 2),
(2, 'medium', 5),
(3, 'low', 7);

-- --------------------------------------------------------

--
-- Table structure for table `qa_type_tbl`
--

CREATE TABLE `qa_type_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa_type_tbl`
--

INSERT INTO `qa_type_tbl` (`id`, `name`) VALUES
(1, 'System'),
(2, 'RTD');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `git_status` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL,
  `priority_level` int(11) NOT NULL,
  `num_of_days` int(11) NOT NULL,
  `platform_type_accts_id` int(11) NOT NULL,
  `assigned_qa` int(11) NOT NULL,
  `qa_status` varchar(255) NOT NULL,
  `qa_comment` varchar(255) NOT NULL,
  `qa_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access_type` int(5) NOT NULL,
  `qa_type_id` int(5) DEFAULT NULL,
  `dept_id` int(5) NOT NULL,
  `git_repo_type` int(11) DEFAULT NULL,
  `approve_issue_access` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `firstname`, `lastname`, `username`, `password`, `access_type`, `qa_type_id`, `dept_id`, `git_repo_type`, `approve_issue_access`) VALUES
(1, 'Levi', 'Gratico', 'levigratico', 'BEVlev13', 1, NULL, 2, 1, 0),
(6, 'bentong', 'kamekamewave', 'kemekeme', 'BEVlev13', 2, 1, 3, 2, 0),
(7, 'management', 'management', 'manager', 'manager', 0, NULL, 1, NULL, 1),
(8, 'managernaqa', 'qanamanager', 'qamanager', 'qamanager', 3, 2, 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_module_tbl`
--
ALTER TABLE `child_module_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `departments_tbl`
--
ALTER TABLE `departments_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `git_repo_tbl`
--
ALTER TABLE `git_repo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_tbl`
--
ALTER TABLE `issue_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `modules_tbl_id` (`modules_tbl_id`,`qa_type_id`,`git_repo_id`,`platform_type_id`,`track_issue_id`,`issue_type_id`,`issue_status`,`issue_approved_by_id`),
  ADD KEY `qa_type_id` (`qa_type_id`),
  ADD KEY `git_repo_id` (`git_repo_id`),
  ADD KEY `platform_type_id` (`platform_type_id`),
  ADD KEY `issue_type_id` (`issue_type_id`),
  ADD KEY `issue_approved_by_id` (`issue_approved_by_id`),
  ADD KEY `priority_level` (`priority_level`);

--
-- Indexes for table `issue_type`
--
ALTER TABLE `issue_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platform_type`
--
ALTER TABLE `platform_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platform_type_accounts`
--
ALTER TABLE `platform_type_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority_level`
--
ALTER TABLE `priority_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_type_tbl`
--
ALTER TABLE `qa_type_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority_level` (`priority_level`,`platform_type_accts_id`,`assigned_qa`),
  ADD KEY `platform_type_accts_id` (`platform_type_accts_id`),
  ADD KEY `assigned_qa` (`assigned_qa`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_type_id` (`qa_type_id`,`dept_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `git_repo_type` (`git_repo_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_module_tbl`
--
ALTER TABLE `child_module_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments_tbl`
--
ALTER TABLE `departments_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `git_repo_tbl`
--
ALTER TABLE `git_repo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issue_tbl`
--
ALTER TABLE `issue_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `issue_type`
--
ALTER TABLE `issue_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `platform_type`
--
ALTER TABLE `platform_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `platform_type_accounts`
--
ALTER TABLE `platform_type_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `priority_level`
--
ALTER TABLE `priority_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qa_type_tbl`
--
ALTER TABLE `qa_type_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_module_tbl`
--
ALTER TABLE `child_module_tbl`
  ADD CONSTRAINT `child_module_tbl_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `modules_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue_tbl`
--
ALTER TABLE `issue_tbl`
  ADD CONSTRAINT `issue_tbl_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_2` FOREIGN KEY (`assigned_to`) REFERENCES `user_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_3` FOREIGN KEY (`modules_tbl_id`) REFERENCES `modules_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_4` FOREIGN KEY (`qa_type_id`) REFERENCES `qa_type_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_5` FOREIGN KEY (`git_repo_id`) REFERENCES `git_repo_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_6` FOREIGN KEY (`platform_type_id`) REFERENCES `platform_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_7` FOREIGN KEY (`issue_type_id`) REFERENCES `issue_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_8` FOREIGN KEY (`issue_approved_by_id`) REFERENCES `user_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_tbl_ibfk_9` FOREIGN KEY (`priority_level`) REFERENCES `priority_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`platform_type_accts_id`) REFERENCES `platform_type_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`priority_level`) REFERENCES `priority_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_ibfk_3` FOREIGN KEY (`assigned_qa`) REFERENCES `user_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`qa_type_id`) REFERENCES `qa_type_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tbl_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tbl_ibfk_3` FOREIGN KEY (`git_repo_type`) REFERENCES `git_repo_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
