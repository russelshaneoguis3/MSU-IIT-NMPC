-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(90) NOT NULL DEFAULT 'none',
  `tel_no` varchar(90) NOT NULL DEFAULT 'none',
  `hr_assigned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `area`, `branch_name`, `location`, `mobile_no`, `tel_no`, `hr_assigned`) VALUES
(1000, 1, 'Tibanga-Main', 'A. Bonifacio Ave.,Tibanga, Iligan City', 'n/a', '(063) 221-4063; 221-4064; 492-0611', 2),
(1001, 2, 'Pala-o Branch', 'Gregorio T. Lluch Sr. Ave., Pala-o Iligan City', 'n/a', '(063) 223-2779; (063) 228-5607', 3),
(1002, 3, 'Butuan Branch', 'CJU Bldg. Langihan Road, Limaha, Butuan City', 'n/a', '(085) 818-7261', 4),
(1032, 1, 'Bulua Branch', 'Lower Zone 2, National Highway, Bulua, Cagayan de Oro City', '(063) 09171451396', 'none', 3),
(1033, 1, 'Carmen Branch', 'Door#1 CYK Bldg. Vamenta Blvd., Carmen, Cagayan de Oro City', '(063) 9171622044', '', 2),
(1034, 1, 'Cogon Branch', 'BMG Bldg. Quirino-Yacapin St., Cogon, Cagayan de Oro City', '(063) 9171584127', '', 2),
(1035, 1, 'Laguindingan Branch', 'Zone 2 Poblacion, Laguindingan, Misamis Oriental', '', '(088) 555-0392', 2),
(1036, 1, 'Manticao Branch', 'Prk 4., Poblacio, Manticao, Misamis Oriental', '021939123', '(088) 567-7594', 2),
(1040, 2, 'Buru-un Branch', 'Prk. 3, Buru-un, Highway, Iligan City', 'none', '(063) 228-7200', 3),
(1041, 2, 'Kiwalan Branch', 'Prk. 3, Kiwalan Highway, Iligan City', 'none', '(063) 225-2701', 3),
(1042, 2, 'Poblacion Branch', 'Prk. 8,Sabayle St. Poblacion, Iligan City', 'none', '(063) 221-0262', 3),
(1043, 2, 'Suarez-Tominobo Branch', '0310 Tominobo Highway, Iligan City', 'none', '(063) 225-9830', 3),
(1045, 2, 'Tubod Iligan Branch', 'Lanao Builders Bldg. Macapagal Ave., Tubod, Iligan City', 'none', ' (063) 225-4875; 302-0585', 3),
(1046, 3, 'Davao Branch', 'Door 14&15 Ground Floor, Plaza De Tavera Bldg., Camus Ext., Barangay 9-A, Davao City', '(063) 9171625004', 'none', 3),
(1047, 3, 'General Santos Branch', 'Door 4 Du Bldg. , Jose Catolico Sr. Avenue Lagao, General Santos City', 'none', '(083) 552-1354', 3),
(1048, 3, 'Bacolod LDN Branch', 'Purok 1 Poblacion, Bacolod, Lanao del Norte', '(063) 9171609257', 'none', 3),
(1049, 3, 'Maranding Branch', 'Venue Suite Bldg. Purok Nilo, Maranding, Lala, Lanao del Norte', 'none', '(063) 229-8420', 3),
(1050, 3, 'Pagadian Branch', 'Prk. Bougainvilla, P.L. Urro St., San Jose District, Pagadian', 'none', '(063) 945-2856', 3),
(1051, 3, 'Tubod LDN Branch', 'Prk. 6A, Quezon Ave., Poblacion, Tubod, Lanao del Norte, Pagadian', 'none', '(063) 227-6723', 4);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `branch_loc` int(11) DEFAULT NULL,
  `date_pos` date DEFAULT curdate(),
  `position` varchar(100) DEFAULT NULL,
  `job_des1` varchar(100) NOT NULL,
  `job_des2` varchar(100) NOT NULL,
  `job_des3` varchar(100) NOT NULL,
  `job_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `branch_loc`, `date_pos`, `position`, `job_des1`, `job_des2`, `job_des3`, `job_img`) VALUES
(85, 1000, '2023-12-05', 'Security Guard', 'Must be a graduate of Masters Degree', 'Must be Handsome', 'Talk, Dark, and handsome', '../img/uploads/wtf.jpg'),
(86, 1033, '2023-12-05', 'General Managers', 'Must a graduate of Senior Highschool', 'Isog and Kamao mangasaba', 'Kusog mo bokas', '../img/uploads/blue.png'),
(87, 1042, '2023-12-05', 'Singer sa National Anthem every Flag Raising', 'Must be a male', 'Over 10+ recorded song online', 'Talk, Dark, and handsome', '../img/uploads/dddddddddddd.jpg'),
(90, 1034, '2023-12-05', 'asdasd', 'asdsad', 'asdasd', 'asdasd', '../img/uploads/ahawd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `applicant_id` int(11) NOT NULL,
  `job_applied` int(11) DEFAULT NULL,
  `app_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `app_letter` varchar(255) DEFAULT NULL,
  `app_resume` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `app_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applicants`
--

INSERT INTO `job_applicants` (`applicant_id`, `job_applied`, `app_name`, `address`, `degree`, `contact_no`, `email`, `app_letter`, `app_resume`, `other`, `app_date`) VALUES
(8, 85, 'Pab Pablo Jab', 'Tubord, IC', 'BS Pogi', '0932131', 'Pogi@gmail.com', '../files/ENT101-Mod7-Building-Brand.pdf', '../files/ENT101-Mod6-Marketing-and-Selling-a-Brand.pdf', '../files/', '2023-12-05'),
(9, 85, 'Ohara ', 'Camague', 'High school ra oy', '092313', 'aidh@gmail.com', '../files/Information Assurance and Security - Oguis,Adam.pdf', '../files/Assignment2-ITE185-IT4D.1_Oguis.pdf', '../files/', '2023-12-05'),
(11, 86, 'Johnny Sings Along', 'Suarez', 'BS Maesto', '0921314', 'johnny@gmail.com', '../files/Case-Study-1_Oguis,Adam.pdf', '../files/EDA-New_dataset.pdf', '../files/', '2023-12-07'),
(15, 87, 'Adam G.', 'Taga Camague rako dol', 'BSIT', '092313123', 'akuangemail@gmail.com', '../files/ReportNakoSaAI.pdf', '../files/TEAM NAMO - ITE153 AI Project Proposal.pdf', '../files/', '2023-12-07'),
(16, 86, 'Brenda Mage', 'Mahayahay', 'BSCrim', '0923121', 'bren@gmail.com', '../files/ITD112-Lab-Exercise_2-Oguis.pdf', '../files/ITD112-Lab-Exercise_3-Oguis.pdf', '../files/', '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin', 'administrator'),
(2, 'Adam Russel', 'adam1234', 'adam1234', 'HR'),
(3, 'Russel Adam', 'russel1234', 'russel1234', 'HR'),
(4, 'Pablo Job', 'shane1234', 'shane1234', 'HR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `hr_assigned` (`hr_assigned`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `branch_loc` (`branch_loc`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `job_applied` (`job_applied`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1089;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`hr_assigned`) REFERENCES `user` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`branch_loc`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD CONSTRAINT `job_applicants_ibfk_1` FOREIGN KEY (`job_applied`) REFERENCES `job` (`job_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
