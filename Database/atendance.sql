-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 08:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_code` int(11) NOT NULL,
  `start_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_code`, `start_year`, `end_year`) VALUES
(1, 15, 16),
(3, 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
(1, 'ICT'),
(3, 'BST');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `editor_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`editor_id`, `full_name`, `address`, `phone_number`, `email`, `gender`, `password`, `username`) VALUES
(5, '', '', 0, '', '', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lecture_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lec_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lecture_id`, `full_name`, `address`, `phone_number`, `email`, `gender`, `password`, `lec_username`) VALUES
(11, 'Rifai Kariapper', 'Kalmunai, Sri Lanka', 718080883, 'rifaikariapper@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'rifai'),
(12, 'Ahamad Sabani', 'Akkareipaththu, Sri Lanka', 783293949, 'sabani@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'sabani'),
(13, 'Abdul Haleem', 'Karthiv, Kalmunai', 772248250, 'haleem123@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'haleem'),
(14, 'Wasanthapriyan', 'Colombo, Sri Lanka', 772598634, 'wasantha@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'wasantha'),
(15, 'Naja Musthafa', 'Akkareipaththu, Sri Lanka', 712548789, 'naja@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'naja'),
(16, 'Prof. Ismail', 'Akkareipaththu, Sri Lanka', 714578963, 'ismail@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'ismail');

-- --------------------------------------------------------

--
-- Table structure for table `lec_attend`
--

CREATE TABLE `lec_attend` (
  `lec_id` int(11) NOT NULL,
  `reg_number` varchar(50) NOT NULL,
  `cal_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lec_attend`
--

INSERT INTO `lec_attend` (`lec_id`, `reg_number`, `cal_date`) VALUES
(44, 'SEU/IS/15/ICT/045', '2019/02/13_CIS22012'),
(46, 'SEU/IS/15/ICT/045', '2019/02/13_CIS22022'),
(57, 'SEU/IS/15/ICT/018', '2019/02/14_SWT22022'),
(58, 'SEU/IS/15/ICT/018', '2018/02/14_CIS12012'),
(59, 'SEU/IS/15/ICT/018', '2019/02/14_CIS22032'),
(60, 'SEU/IS/15/ICT/012', '2019/02/14_SWT22022'),
(61, 'SEU/IS/15/ICT/012', '2019/02/14_CIS22012'),
(62, 'SEU/IS/15/ICT/012', '2019/02/13_CIS22012'),
(63, 'SEU/IS/15/ICT/034', '2019/02/19_CIS22032'),
(64, 'SEU/IS/15/ICT/045', '2019/02/19_CIS22032'),
(65, 'SEU/IS/15/ICT/018', '2019/02/19_CIS22032'),
(66, 'SEU/IS/15/ICT/034', '2019/02/20_SWT22022'),
(67, 'SEU/IS/15/ICT/045', '2019/02/20_SWT22022'),
(68, 'SEU/IS/15/ICT/018', '2019/02/20_SWT22022'),
(69, 'SEU/IS/16/ICT/034', '2019/02/20_CIS12012'),
(70, 'SEU/IS/16/ICT/031', '2019/02/20_CIS12012'),
(71, 'SEU/IS/16/ICT/034', '2019/02/20_SWT12012'),
(72, 'SEU/IS/16/ICT/031', '2019/02/19_CIS22032');

-- --------------------------------------------------------

--
-- Table structure for table `lec_calander`
--

CREATE TABLE `lec_calander` (
  `cal_date` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `batch_code` int(50) NOT NULL,
  `lec_time` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lec_calander`
--

INSERT INTO `lec_calander` (`cal_date`, `date`, `subject_code`, `batch_code`, `lec_time`) VALUES
('2019/02/19_CIS22032', '2019-02-19', 'CIS22032', 15, 4),
('2019/02/20_SWT22022', '2019-02-20', 'SWT22022', 15, 3),
('2019/02/20_SWT12012', '2019-02-20', 'SWT12012', 15, 4),
('2019/02/20_CIS12012', '2019-02-20', 'CIS12012', 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE `sem` (
  `id` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`id`, `semester`) VALUES
(1, '1st Year 1st Sem'),
(2, '1st Year 2nd Sem'),
(3, '2nd Year 1st Sem'),
(4, '2nd Year 2nd Sem'),
(5, '3rd Year 1st Sem'),
(6, '3rd Year 2nd Sem'),
(7, '4th Year 1st Sem'),
(8, '4th Year 2nd Sem');

-- --------------------------------------------------------

--
-- Table structure for table `shedule`
--

CREATE TABLE `shedule` (
  `subject_code` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `lec_name` varchar(50) NOT NULL,
  `department` varchar(10) NOT NULL,
  `shedul_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shedule`
--

INSERT INTO `shedule` (`subject_code`, `semester`, `lec_name`, `department`, `shedul_code`) VALUES
('CIS12012', '1st Year 2nd Sem', 'Naja Musthafa', 'ICT', 13),
('CIS22012', '2nd Year 2nd Sem', 'Abdul Haleem', 'ICT', 14),
('CIS22022', '2nd Year 2nd Sem', 'Ahamad Sabani', 'ICT', 15),
('CIS22032', '2nd Year 2nd Sem', 'Rifai Kariapper', 'ICT', 16),
('CIS22042', '2nd Year 2nd Sem', 'Abdul Haleem', 'ICT', 17),
('CMS12013', '1st Year 2nd Sem', 'Naja Musthafa', 'ICT', 18),
('CMS22012', '2nd Year 2nd Sem', 'Prof. Ismail', 'ICT', 19),
('MGT12021', '1st Year 2nd Sem', 'Rifai Kariapper', 'ICT', 20),
('MGT1211', '1st Year 2nd Sem', 'Rifai Kariapper', 'ICT', 21),
('NST1202', '1st Year 2nd Sem', 'Ahamad Sabani', 'ICT', 22),
('SWT12012', '1st Year 2nd Sem', 'Abdul Haleem', 'ICT', 23),
('SWT12032', '1st Year 2nd Sem', 'Abdul Haleem', 'ICT', 24),
('SWT12041', '1st Year 2nd Sem', 'Naja Musthafa', 'ICT', 25),
('SWT12041', '1st Year 2nd Sem', 'Naja Musthafa', 'ICT', 26),
('SWT1221', '1st Year 2nd Sem', 'Naja Musthafa', 'ICT', 27),
('SWT22012', '2nd Year 2nd Sem', 'Wasanthapriyan', 'ICT', 28),
('SWT22022', '2nd Year 2nd Sem', 'Wasanthapriyan', 'ICT', 29),
('UTC22011', '2nd Year 2nd Sem', 'Abdul Haleem', 'ICT', 30),
('UTC22022', '2nd Year 2nd Sem', 'Abdul Haleem', 'ICT', 31);

-- --------------------------------------------------------

--
-- Table structure for table `std_pass`
--

CREATE TABLE `std_pass` (
  `id` int(11) NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_pass`
--

INSERT INTO `std_pass` (`id`, `reg_number`, `password`) VALUES
(3, 'SEU/IS/15/ICT/034', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `full_name`, `address`, `phone_number`, `email`, `gender`) VALUES
(54, 'Kanishka Dew Sandaruwan', 'Banvalgodalla, Kosmulla', 713664071, 'kanishkadewsandaruwan@gmail.com', 'Male'),
(55, 'Daksthitha Disanataka', 'Anuradhapura, Sri Lanka', 713664071, 'dakshithadissanayaka96@gmail.com', 'Male'),
(56, 'Tharindu Tharaka', 'Polonnaruwa, Sri Lanka', 711995141, 'tharindu@gmail.com', 'Male'),
(57, 'Dananji Widanarachchi', 'Avissawella, Sri Lanka', 719485011, 'dana@gmail.com', 'Male'),
(58, 'Madara Maduvanthi', 'Horana, Sri Lanka', 716802519, 'madara@gmail.com', 'Male'),
(59, 'Shashini Uthpala Kumari', 'Madamahanuwara, Theldeniya', 715878456, 'shashi@gmail.com', 'Male'),
(60, 'Hariths Udana', 'Colombo, Sri Lanka', 716578485, 'hari@gmail.com', 'Male'),
(61, 'Udara Dimuthu', 'Galle', 774578547, 'udara@gmail.com', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `reg_number` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `batch` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`reg_number`, `sid`, `department`, `batch`, `date`) VALUES
('SEU/IS/15/ICT/034', 54, 'ICT', 15, '2019-02-20 20:30:25'),
('SEU/IS/15/ICT/045', 55, 'ICT', 15, '2019-02-20 20:31:49'),
('SEU/IS/15/ICT/018', 56, 'ICT', 15, '2019-02-20 20:32:59'),
('SEU/IS/15/bsT/034', 57, 'BST', 15, '2019-02-20 20:34:34'),
('SEU/IS/15/bst/035', 58, 'BST', 15, '2019-02-20 20:35:58'),
('SEU/IS/15/bst/036', 59, 'BST', 15, '2019-02-20 20:37:18'),
('SEU/IS/16/ICT/031', 60, 'ICT', 16, '2019-02-20 20:39:05'),
('SEU/IS/16/ICT/034', 61, 'ICT', 16, '2019-02-20 20:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_code` varchar(50) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `credits` int(10) NOT NULL,
  `lec_hours` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_code`, `sub_name`, `credits`, `lec_hours`) VALUES
('CIS12012', 'Social Computing', 2, 30),
('CIS22012', 'Distributed and Cloud Computing', 2, 30),
('CIS22022', 'Information Assuarance and Forensics', 2, 60),
('CIS22032', 'E-Commers Strategies and Architecher', 2, 30),
('CIS22042', 'Practical for Distributed and Cloud Computing', 2, 60),
('CMS12013', 'Mathamatics', 2, 30),
('CMS22012', 'Leadership and Communication Skils', 2, 60),
('MGT12021', 'Practical for Multimedia & Computer Graphics', 2, 60),
('MGT1211', 'Multimedia & Computer Graphics', 2, 30),
('NST1202', 'Computer Network & Data Communication', 2, 30),
('SWT12012', 'Object Oriented Programming', 2, 30),
('SWT12032', 'Practical for Object Oriented Programming', 2, 60),
('SWT12041', 'Practical for Web System And Technology', 2, 60),
('SWT1221', 'Web System & Technology', 2, 30),
('SWT22012', 'Internet Application Devolopment', 2, 30),
('SWT22022', 'Practical for Internet Application Devolopment', 2, 60),
('UTC22011', 'Microcontroller System Programming', 2, 30),
('UTC22022', 'Practical for Microcontroller System Programming', 2, 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`editor_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `lec_attend`
--
ALTER TABLE `lec_attend`
  ADD PRIMARY KEY (`lec_id`);

--
-- Indexes for table `sem`
--
ALTER TABLE `sem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`shedul_code`);

--
-- Indexes for table `std_pass`
--
ALTER TABLE `std_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `editor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lec_attend`
--
ALTER TABLE `lec_attend`
  MODIFY `lec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shedule`
--
ALTER TABLE `shedule`
  MODIFY `shedul_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `std_pass`
--
ALTER TABLE `std_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
