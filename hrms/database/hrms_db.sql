-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 11:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(30) NOT NULL,
  `department` varchar(200) NOT NULL,
  `section` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `department`, `section`, `description`) VALUES
(1, 'HR', 'HR', 'Human Resource '),
(2, 'In House Project', 'Admin', 'Administrator'),
(3, 'In House Project', 'Batching Plant', 'Batching Plant'),
(4, 'In House Project', 'Building Inspection', 'Building Inspection'),
(5, 'In House Project', 'CAIC Exteral Work', 'CAIC Exteral Work'),
(6, 'In House Project', 'Claim Management', 'Claim Management'),
(7, 'In House Project', 'Dredging Plant', 'Dredging Plant'),
(8, 'In House Project', 'General Construction & Infrastructure', 'General Construction & Infrastructure'),
(9, 'In House Project', 'Lake Sand', 'Lake Sand'),
(10, 'In House Project', 'Land Dispute Resolution', 'Land Dispute Resolution'),
(11, 'In House Project', 'Landside', 'Landside'),
(12, 'In House Project', 'Machinery', 'Machinery'),
(13, 'In House Project', 'Quantity Surveyor', 'Quantity Surveyor'),
(14, 'In House Project', 'Safety', 'Safety'),
(15, 'In House Project', 'Security', 'Security'),
(16, 'In House Project', 'Site Formation', 'Site Formation'),
(17, 'In House Project', 'Worker Wage', 'Worker Wage'),
(18, 'Payroll Office', 'Payroll', 'Payroll Office'),
(19, 'Ground Handling', 'Project Manager', 'Project Manager'),
(20, 'Procurement', 'N/A', 'Procurement'),
(21, 'ICT', 'N/A', 'ICT'),
(22, 'Finance', 'N/A', 'Finance'),
(23, 'Pre_Operation Phase', 'N/A', 'Pre_Operation Phase');

-- --------------------------------------------------------

--
-- Table structure for table `edu`
--

CREATE TABLE `edu` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname_english` varchar(100) NOT NULL,
  `had` text DEFAULT NULL,
  `major` text DEFAULT NULL,
  `uni_ins` text DEFAULT NULL,
  `edut` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergencys`
--

CREATE TABLE `emergencys` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname_english` varchar(100) NOT NULL,
  `ecp_khmer` varchar(100) DEFAULT NULL,
  `ecp_english` varchar(100) DEFAULT NULL,
  `ec_line1` int(15) DEFAULT NULL,
  `ec_line2` int(15) DEFAULT NULL,
  `relationship` varchar(30) DEFAULT NULL,
  `ecp_ca` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_list`
--

CREATE TABLE `employee_list` (
  `id` int(30) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `fkhmer` varchar(200) NOT NULL,
  `fenglish` varchar(200) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `job_grad` varchar(3) NOT NULL,
  `corporate_rank` varchar(30) NOT NULL,
  `avatar` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `job_grade_level` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `seniority` text NOT NULL,
  `work_location` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `pro_period` varchar(50) NOT NULL,
  `converted_from` varchar(50) NOT NULL,
  `department_id` int(30) NOT NULL,
  `personal_id` int(30) NOT NULL,
  `emergencys_id` int(30) NOT NULL,
  `edu_id` int(30) NOT NULL,
  `health_id` int(30) NOT NULL,
  `family_id` int(30) NOT NULL,
  `perfor_id` int(30) NOT NULL,
  `resignation_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname_english` varchar(100) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `sp_khmer` varchar(100) DEFAULT NULL,
  `sp_english` varchar(100) DEFAULT NULL,
  `dob_spouse` date DEFAULT NULL,
  `sp_nation` varchar(30) DEFAULT NULL,
  `soccup` text DEFAULT NULL,
  `noc` int(10) DEFAULT NULL,
  `cfull_khmer1` varchar(100) DEFAULT NULL,
  `cfull_english1` varchar(100) DEFAULT NULL,
  `dob_c1` date DEFAULT NULL,
  `coccup1` text DEFAULT NULL,
  `cfull_khmer2` varchar(100) DEFAULT NULL,
  `cfull_english2` varchar(100) DEFAULT NULL,
  `dob_c2` date DEFAULT NULL,
  `coccup2` text DEFAULT NULL,
  `cfull_khmer3` varchar(100) DEFAULT NULL,
  `cfull_english3` varchar(100) DEFAULT NULL,
  `dob_c3` date DEFAULT NULL,
  `coccup3` text DEFAULT NULL,
  `cfull_khmer4` varchar(100) DEFAULT NULL,
  `cfull_english4` varchar(100) DEFAULT NULL,
  `dob_c4` date DEFAULT NULL,
  `coccup4` text DEFAULT NULL,
  `cfull_khmer5` varchar(100) DEFAULT NULL,
  `cfull_english5` varchar(100) DEFAULT NULL,
  `dob_c5` date DEFAULT NULL,
  `coccup5` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hardship_list`
--

CREATE TABLE `hardship_list` (
  `id` int(30) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `position` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `hard_type` varchar(50) NOT NULL,
  `hs_full` date DEFAULT NULL,
  `app_date` date NOT NULL,
  `eff_date` date DEFAULT NULL,
  `now` varchar(15) NOT NULL,
  `accommodate` varchar(5) NOT NULL,
  `ed_full` date DEFAULT NULL,
  `zone` varchar(30) DEFAULT NULL,
  `room` text NOT NULL,
  `personal_con` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hardship_list`
--

INSERT INTO `hardship_list` (`id`, `staff_id`, `fullname`, `position`, `section`, `department`, `hard_type`, `hs_full`, `app_date`, `eff_date`, `now`, `accommodate`, `ed_full`, `zone`, `room`, `personal_con`) VALUES
(1, 'CAIC-00694', 'Bora Somaly', 'HRIS Officer', 'HR', 'HR', 'Full Hardship', '2024-06-12', '2024-04-01', '2024-06-12', 'Non-Engineer', 'Half', '2024-06-12', NULL, 'C-01', '092429178'),
(5, 'CAIC-00065', 'Sok Panha', 'Site Supervisor', 'Building Inspection', 'In House Project', 'Full Hardship', '2024-06-12', '2021-01-02', '2024-06-12', 'Engineer', 'Full', '2024-06-12', 'CAIC', 'C-01', '0886826866');

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname_english` varchar(100) NOT NULL,
  `nssf` text DEFAULT NULL,
  `vcard` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_list`
--

CREATE TABLE `leave_list` (
  `id` int(30) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days_requested` int(2) NOT NULL,
  `balance_due` int(2) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `doc_att` text DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `employee_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_list`
--

INSERT INTO `leave_list` (`id`, `staff_id`, `fullname`, `position`, `section`, `department`, `leave_type`, `start_date`, `end_date`, `days_requested`, `balance_due`, `reason`, `doc_att`, `date_created`, `employee_id`) VALUES
(6, 'CAIC-00065', 'Sok Panha', 'Site Supervisor', 'Building Inspection', 'In House Project', 'Annual Leave', '2024-06-13', '2024-06-13', 1, 17, '', '', '2024-06-13', 0),
(8, 'CAIC-00694', 'Bora Somaly', 'HRIS Officer', 'HR', 'HR', 'Annual Leave', '2024-06-13', '2024-06-13', 0, 16, '', '', '2024-06-13', 0),
(9, 'CAIC-00694', 'Bora Somaly', 'HRIS Officer', 'HR', 'HR', 'Annual Leave', '2024-06-13', '2024-06-13', 1, 17, '', NULL, '2024-06-13', 0),
(10, 'CAIC-00065', 'Sok Panha', 'Site Supervisor', 'Building Inspection', 'In House Project', 'Sick Leave', '2024-06-13', '2024-06-13', 1, 6, '', NULL, '2024-06-13', 0),
(11, 'CAIC-00694', 'Bora Somaly', 'HRIS Officer', 'HR', 'HR', 'Annual Leave', '2024-06-13', '2024-06-13', 1, 17, '', NULL, '2024-06-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `leave_type` varchar(50) NOT NULL,
  `no_of_day` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`leave_type`, `no_of_day`) VALUES
('Annual Leave', 18),
('Compassionate Leave', 3),
('Educational Leave', 7),
('Marriage', 5),
('Maternity', 90),
('Paternity Leave', 5),
('Sick Leave', 7),
('Unpaid Leave', 7);

-- --------------------------------------------------------

--
-- Table structure for table `perfor`
--

CREATE TABLE `perfor` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname_english` varchar(100) NOT NULL,
  `pbonus` text DEFAULT NULL,
  `band` text DEFAULT NULL,
  `modifi` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `contract_type` varchar(3) DEFAULT NULL,
  `cd_date` date DEFAULT NULL,
  `cmovement` text DEFAULT NULL,
  `drecord` varchar(3) DEFAULT NULL,
  `pp_month` text DEFAULT NULL,
  `cpro_date` date DEFAULT NULL,
  `lstartiong_date` date DEFAULT NULL,
  `lseniority` date DEFAULT NULL,
  `s_period` varchar(100) DEFAULT NULL,
  `working_day` date DEFAULT NULL,
  `ror` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname_english` varchar(50) NOT NULL,
  `pob_khmer` text DEFAULT NULL,
  `pob_english` text DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `cnn` text DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `cnb` text DEFAULT NULL,
  `ca_khmer` text DEFAULT NULL,
  `ca_english` text DEFAULT NULL,
  `pc_line1` text DEFAULT NULL,
  `pc_line2` text NOT NULL,
  `tel_con` text NOT NULL,
  `pemail` text NOT NULL,
  `pemail_bank` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resign_list`
--

CREATE TABLE `resign_list` (
  `id` int(30) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `fenglish` varchar(100) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `personal_contact` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `working_period` text NOT NULL,
  `tob` varchar(15) NOT NULL,
  `reason` text NOT NULL,
  `date_r` date NOT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `employee_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resign_list`
--

INSERT INTO `resign_list` (`id`, `staff_id`, `fenglish`, `gender`, `position`, `department`, `section`, `personal_contact`, `start_date`, `end_date`, `working_period`, `tob`, `reason`, `date_r`, `date_create`, `employee_id`) VALUES
(1, 'CAIC-00043', 'Pich Vanto', 'Male', 'Senior Site', 'In House Project', 'Building Inspection', '00000000000', '2020-01-10', '2024-06-29', '', 'Resign', 'Urgent', '2024-06-20', '2024-06-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Super Role'),
(3, 'Leave User'),
(4, 'Hardship User'),
(5, 'Onboarding User');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Human Resource Management System', 'bora.somaly@caic.com.kh', '+855 92 429 178', 'Phnom Penh, Cambodia.', '1607135822_avatar'),
(2, 'Human Resource Management System', 'heng.bote@caic.com.kh', '', 'Phnom Penh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL COMMENT '0=Super Role\r\n1=Leave User\r\n2=Admin\r\n3=Onboarding User\r\n4=Hardship User',
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `permissions` varchar(200) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `firstname`, `lastname`, `role`, `email`, `password`, `permissions`, `avatar`, `date_create`) VALUES
(2, 'CAIC-00593', 'Bote', 'Heng', 'Super Role', 'heng.bote@caic.com.kh', '42688ff752b6e5d527c75594e4a6851b', NULL, 'no-image-available.png', '2024-05-29 11:11:43'),
(3, 'CAIC-00694', 'Somaly', 'Bora', 'Admin', 'bora.somaly@caic.com.kh', '3b66af4d56c59b994f84624e9adc28fb', NULL, '1716956400_1607156880_avatar.jpg', '2024-05-29 11:20:38'),
(4, 'CAIC-00123', 'Lin', 'Suy', 'Super Role', 'suy.lin@caic.com.kh', '6711c2ba742bd44f85de639fa5bcd605', NULL, '1716964320_1607134500_avatar.jpg', '2024-05-29 13:32:32'),
(5, 'CAIC-00377', 'Khunnary', 'Khiev', 'Onboarding User', 'khiev.khunnary@caic.com.kh', '2761bd9863976e97e6190a98597a045a', NULL, '1716969720_1607135820_avatar.jpg', '2024-05-29 15:02:04'),
(8, '', 'Eneang', 'Chey', 'Hardship User', 'chey.eneang@caic.com.kh', 'a3f9462f25245d38472c0115215bd03b', NULL, 'no-image-available.png', '2024-05-30 10:34:14'),
(19, '', 'Chantheth', 'Sea', 'Leave User', 'sea.chantheth@caic.com.kh', 'f928e2583fe270d11a2a80b34056f79d', NULL, 'no-image-available.png', '2024-06-03 09:43:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu`
--
ALTER TABLE `edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `emergencys`
--
ALTER TABLE `emergencys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_list`
--
ALTER TABLE `employee_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resignation_id` (`resignation_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `personal_id` (`personal_id`),
  ADD KEY `edu_id` (`edu_id`),
  ADD KEY `health_id` (`health_id`),
  ADD KEY `family_id` (`family_id`),
  ADD KEY `perfor_id` (`perfor_id`),
  ADD KEY `emergencys_id` (`emergencys_id`) USING BTREE;

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hardship_list`
--
ALTER TABLE `hardship_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `leave_list`
--
ALTER TABLE `leave_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`leave_type`);

--
-- Indexes for table `perfor`
--
ALTER TABLE `perfor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `resign_list`
--
ALTER TABLE `resign_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `edu`
--
ALTER TABLE `edu`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergencys`
--
ALTER TABLE `emergencys`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_list`
--
ALTER TABLE `employee_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hardship_list`
--
ALTER TABLE `hardship_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_list`
--
ALTER TABLE `leave_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perfor`
--
ALTER TABLE `perfor`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resign_list`
--
ALTER TABLE `resign_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `edu`
--
ALTER TABLE `edu`
  ADD CONSTRAINT `Constraints_FK_Employee_ID` FOREIGN KEY (`employee_id`) REFERENCES `employee_list` (`id`);

--
-- Constraints for table `employee_list`
--
ALTER TABLE `employee_list`
  ADD CONSTRAINT `Constraints_FK_Department_ID` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`),
  ADD CONSTRAINT `Constraints_FK_Edu_ID` FOREIGN KEY (`edu_id`) REFERENCES `edu` (`id`),
  ADD CONSTRAINT `Constraints_FK_Emergency_ID` FOREIGN KEY (`emergencys_id`) REFERENCES `emergencys` (`id`),
  ADD CONSTRAINT `Constraints_FK_Family_ID` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`),
  ADD CONSTRAINT `Constraints_FK_Health_ID` FOREIGN KEY (`health_id`) REFERENCES `health` (`id`),
  ADD CONSTRAINT `Constraints_FK_Perfor_ID` FOREIGN KEY (`perfor_id`) REFERENCES `perfor` (`id`),
  ADD CONSTRAINT `Constraints_FK_Personal_ID` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `Constraints_FK_Resignation_ID` FOREIGN KEY (`resignation_id`) REFERENCES `resign_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
