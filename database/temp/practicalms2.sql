-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 04:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practicalms`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiment`
--

CREATE TABLE `experiment` (
  `Expid` int(11) NOT NULL,
  `Expno` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Subid` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiment`
--

INSERT INTO `experiment` (`Expid`, `Expno`, `Title`, `Subid`, `Tid`, `Start_date`, `End_date`) VALUES
(1, 1, 'Database schema', 1, 1, '2017-07-01', '2017-07-11'),
(2, 2, 'ER diagram', 1, 1, '2017-07-11', '2017-07-16'),
(3, 3, 'Select query', 1, 1, '2017-07-14', '2017-07-20'),
(4, 4, 'update query', 1, 1, '2017-07-17', '2017-07-22'),
(5, 1, 'Normalization', 2, 1, '2017-07-01', '2017-07-11'),
(6, 2, 'Database security', 2, 1, '2017-07-10', '2017-07-16'),
(7, 3, 'experiment 3', 2, 1, '2017-07-14', '2017-07-16'),
(8, 4, 'experiment 4', 2, 1, '2017-07-17', '2017-07-22'),
(9, 1, 'input/output', 3, 2, '2017-07-01', '2017-07-11'),
(10, 2, 'Operators', 3, 2, '2017-07-11', '2017-07-16'),
(11, 3, 'functions', 3, 2, '2017-07-14', '2017-07-16'),
(12, 4, 'Experiment 4', 3, 2, '2017-07-17', '2017-07-22'),
(13, 1, 'Operator Overloading', 4, 2, '2017-07-01', '2017-07-11'),
(14, 2, 'File manipulation', 4, 2, '2017-07-14', '2017-07-16'),
(15, 3, 'Experiment 3', 4, 2, '2017-07-17', '2017-07-22'),
(16, 4, 'Experiment 4', 4, 2, '2017-07-17', '2017-07-22'),
(17, 1, 'Arrays', 5, 3, '2017-07-01', '2017-07-11'),
(18, 2, 'Strings', 5, 3, '2017-02-11', '2017-02-16'),
(19, 3, 'Linked List', 5, 3, '2017-07-14', '2017-07-16'),
(20, 4, 'Queue', 5, 3, '2017-07-17', '2017-07-20'),
(21, 1, 'kernel', 6, 3, '2017-07-01', '2017-07-11'),
(22, 2, 'Job s Algo', 6, 3, '2017-07-10', '2017-07-16'),
(23, 3, 'Deadlock', 6, 3, '2017-07-14', '2017-07-16'),
(24, 4, 'Experiment 4', 6, 3, '2017-07-17', '2017-07-22'),
(25, 1, 'HTTP protocols', 7, 4, '2017-07-01', '2017-07-16'),
(26, 1, 'Experiment 1', 8, 4, '2017-07-10', '2017-07-16'),
(27, 4, 'test', 3, 2, '2017-08-07', '2017-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Sid` int(11) NOT NULL,
  `Rollno` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Batch` varchar(3) NOT NULL,
  `Class` varchar(3) NOT NULL DEFAULT 'S.E'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Sid`, `Rollno`, `Name`, `Batch`, `Class`) VALUES
(3, 151105003, 'BAPU SANJAY MORAYE', 'A', 'S.E'),
(4, 151105005, 'BIST LAXMAN', 'A', 'S.E'),
(5, 151105006, ' BORKAR SAISH RAMESH', 'A', 'S.E'),
(6, 151105007, ' BORKAR SNEHA SURESH', 'A', 'S.E'),
(7, 151105008, ' CHAUHAN SOHAMKUMAR ', 'A', 'S.E'),
(8, 151105009, ' DAMLE OMKAR VINAYAK', 'A', 'S.E'),
(9, 151105010, ' DEVAPRIYA DEB', 'A', 'S.E'),
(10, 151105011, ' DIAS JANICE BELARINA', 'A', 'S.E'),
(11, 151105012, ' FERNANDES BLESSY', 'A', 'S.E'),
(12, 151105013, 'FERNANDES MACBETH ALOYSIUS', 'A', 'S.E'),
(13, 151105014, ' FERNANDES ROFERN LOURDES', 'A', 'S.E'),
(14, 151105015, ' GADEKAR ARPESH ARJUN', 'A', 'S.E'),
(15, 151105016, ' GAONKAR ABHIJIT ARJUN', 'B', 'S.E'),
(16, 151105017, 'GAONKAR CHANDU ANAND', 'B', 'S.E'),
(17, 151105018, ' GAONKAR NEEDHI UMESH', 'B', 'S.E'),
(18, 151105019, ' GAUDE KAMLESH  CHANDRAKANT', 'B', 'S.E'),
(19, 151105020, ' GAUNKAR KISHA KAVI', 'B', 'S.E'),
(20, 151105021, 'GOVEKAR MANJUSHA ANANT', 'B', 'S.E'),
(21, 151105022, ' HARMALKAR DIVYA SANJAY', 'B', 'S.E'),
(22, 151105023, ' HULLI RAHUL RAVI', 'B', 'S.E'),
(23, 151105024, ' KALPITA KRISHNA RAUL', 'B', 'S.E'),
(24, 151105026, ' KHANDALEKAR ANAND SHAILESH', 'B', 'S.E'),
(25, 151105027, ' KHATAVKAR MUGDHA ', 'B', 'S.E'),
(26, 151105029, 'KINLEKAR ANOOP MOHAN', 'B', 'S.E'),
(27, 151105030, ' KULKARNI SHIVANI HARISH', 'B', 'S.E'),
(28, 151105031, 'KUNKOLKAR MUKESH RAMA', 'B', 'S.E'),
(29, 151105032, ' KURTARKAR SHIVAM RATNADEEP', 'B', 'S.E'),
(30, 151105033, ' MALVIKA BHASIN', 'C', 'S.E'),
(32, 151105035, 'MANERIKAR SHRAVAN RAVINDRA', 'C', 'S.E'),
(33, 151105036, 'NADKARNI SHIVANI VIJAY', 'C', 'S.E'),
(34, 151105037, 'NAIK ANAY DILIP', 'C', 'S.E'),
(35, 151105038, 'NAIK GAUNEKAR ANAG VALLABH', 'C', 'S.E'),
(36, 151105039, ' NAIK NEHAL RAJENDRA', 'C', 'S.E'),
(37, 151105040, 'NAIK RUDRESH MAHADEV', 'C', 'S.E'),
(38, 151105041, ' NAYAK RAKSHA MANJUNATH', 'C', 'S.E'),
(39, 151105042, 'NEHA', 'C', 'S.E'),
(40, 151105043, ' NIKITA SALKAR', 'C', 'S.E'),
(41, 151105044, 'PARAB NIKHIL NISHIKANT', 'C', 'S.E'),
(42, 151105047, 'PRABHUDESAI NANDAN NITIN', 'C', 'S.E'),
(43, 151105048, 'PRABHUDESAI RUSHIKESH NITIN', 'C', 'S.E'),
(44, 151105049, 'RAIKAR KARAN SURENDRA', 'C', 'S.E'),
(45, 151105050, ' SAKHARDANDE SANKET SANDIP', 'D', 'S.E'),
(46, 151105051, ' SALELKAR SHWETA', 'D', 'S.E'),
(47, 151105052, ' SAWANT RUDRA ARUN', 'D', 'S.E'),
(48, 151105054, 'SHETYE VAISHNAVI PRASAD', 'D', 'S.E'),
(49, 151105056, ' SINAI TALAULIKAR MAYURI ', 'D', 'S.E'),
(50, 151105057, 'SINARI NAVINA NANDAN', 'D', 'S.E'),
(51, 151105058, ' SINGHAN PRATIK BAJIRAO', 'D', 'S.E'),
(52, 151105059, 'TANMAY KEDAR NAIK', 'D', 'S.E'),
(53, 151105060, 'TARI VAIBHAVI VINOD', 'D', 'S.E'),
(54, 151105061, 'THALI MOHIT NILKANT', 'D', 'S.E'),
(55, 151105062, ' TIVREKAR SHAILENDRA ', 'D', 'S.E'),
(56, 151105063, 'VARPEKAR  ROSHANI RAMESH', 'D', 'S.E'),
(57, 151105064, 'VIENNA ADORA D\'SA', 'D', 'S.E'),
(58, 151105065, 'WADKAR PRASAD KALIDAS', 'D', 'S.E'),
(59, 151105066, 'JOSEPH ANDREA', 'D', 'S.E'),
(60, 151105067, 'PURANIK RAJIV RAMAKRISHNA', 'D', 'S.E'),
(61, 257, 'ANTAO RSENIO', 'A', 'T.E'),
(62, 258, 'BAPAT VAISHNAVEE', 'A', 'T.E'),
(63, 259, 'BHANDIYE REEYA', 'A', 'T.E'),
(64, 260, 'BHANDIYE VAISHNAVI', 'A', 'T.E'),
(65, 261, 'BHATT GEETANJALI', 'A', 'T.E'),
(66, 262, 'CARBOTKAR LEENA', 'A', 'T.E'),
(67, 263, 'CHARI LAUKIKA', 'A', 'T.E'),
(68, 264, 'DABHOLKER SWETA', 'A', 'T.E'),
(69, 265, 'DALVI SALONEE', 'A', 'T.E'),
(70, 266, 'DALVI SHIVANI', 'A', 'T.E'),
(71, 267, 'DARPAN KUMAR SHARMA', 'A', 'T.E'),
(72, 268, 'DESAI KEERTI', 'A', 'T.E'),
(73, 269, 'DIAS JOSITA', 'B', 'T.E'),
(74, 270, 'DMELLO SHELDON', 'B', 'T.E'),
(75, 271, 'ESTROCIO CRESSIDA', 'B', 'T.E'),
(76, 272, 'FATERPEKAR NAVIN', 'B', 'T.E'),
(77, 273, 'FERREIRA STACEY', 'B', 'T.E'),
(78, 274, 'GOANKAR DIVYA', 'B', 'T.E'),
(79, 275, 'GAONAKR KAUSHAL', 'B', 'T.E'),
(80, 276, 'GAUDE NACHITA', 'B', 'T.E'),
(81, 277, 'GAONKAR KAMLESH', 'B', 'T.E'),
(82, 278, 'GAWDE SUKHADA', 'B', 'T.E'),
(83, 279, 'GOMES RAINA', 'B', 'T.E'),
(84, 280, 'GOVEKAR RESHMI', 'B', 'T.E'),
(85, 281, 'HONAVAR PRASAD', 'C', 'T.E'),
(86, 282, 'INGOLE POONAM', 'C', 'T.E'),
(87, 283, 'JOSHI SHRUTI', 'C', 'T.E'),
(88, 284, 'KAMBLI SWETA', 'C', 'T.E'),
(89, 285, 'KELKAR PRASANNA', 'C', 'T.E'),
(90, 286, 'KENALDEKAR JAYESH', 'C', 'T.E'),
(91, 287, 'KENY SAYULI', 'C', 'T.E'),
(92, 288, 'KUNKOLKAR SAGAR', 'C', 'T.E'),
(93, 289, 'MAERKAR KARUNA', 'C', 'T.E'),
(94, 290, 'MERRY QUEEN MARKHAP', 'C', 'T.E'),
(95, 291, 'MOGUDA ARJUN', 'C', 'T.E'),
(96, 292, 'MOTA JOANNA SHARON', 'C', 'T.E'),
(97, 293, 'MUTTUKUNDU MAHESH', 'D', 'T.E'),
(98, 294, 'NAIK ANKITA', 'D', 'T.E'),
(99, 295, 'NAIK ANKITA SHEKHAR', 'D', 'T.E'),
(100, 296, 'NAIK ANKUSH', 'D', 'T.E'),
(101, 297, 'NAIK KAMLESH', 'D', 'T.E'),
(102, 298, 'NAIK MAHESH', 'D', 'T.E'),
(103, 299, 'NAIK PRANALI', 'D', 'T.E'),
(104, 300, 'NAIK PRANJALI', 'D', 'T.E'),
(105, 301, 'NAIK SUNIL', 'D', 'T.E'),
(106, 302, 'NEUSI SHLOKA NARAYAN', 'D', 'T.E'),
(107, 303, 'RELIZA GOMES', 'D', 'T.E'),
(108, 304, 'REVANKAR VARSHA', 'D', 'T.E');

-- --------------------------------------------------------

--
-- Table structure for table `student-exp`
--

CREATE TABLE `student-exp` (
  `SEid` int(11) NOT NULL,
  `Expid` int(11) NOT NULL,
  `Sid` int(11) NOT NULL,
  `Sub_date` date NOT NULL,
  `Marks` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student-exp`
--

INSERT INTO `student-exp` (`SEid`, `Expid`, `Sid`, `Sub_date`, `Marks`, `status`) VALUES
(1, 1, 3, '2017-07-10', 5, 1),
(2, 2, 4, '2017-07-10', 5, 1),
(3, 3, 4, '2017-07-10', 5, 1),
(4, 1, 4, '2017-07-10', 5, 1),
(5, 4, 4, '2017-07-10', 5, 1),
(6, 2, 7, '2017-07-10', 5, 1),
(7, 3, 7, '2017-07-10', 5, 1),
(8, 1, 8, '2017-07-10', 5, 1),
(9, 2, 6, '2017-07-10', 5, 1),
(10, 1, 5, '2017-07-10', 5, 1),
(11, 1, 7, '2017-07-10', 5, 1),
(12, 1, 6, '2017-07-10', 5, 1),
(13, 1, 9, '2017-07-10', 5, 1),
(14, 1, 10, '2017-07-10', 5, 1),
(15, 2, 10, '2017-07-10', 5, 1),
(16, 2, 12, '2017-07-10', 5, 1),
(17, 1, 13, '2017-07-10', 5, 1),
(18, 2, 14, '2017-07-10', 5, 1),
(19, 6, 62, '2017-07-10', 5, 1),
(20, 5, 64, '2017-07-10', 5, 1),
(21, 7, 61, '2017-07-10', 5, 1),
(22, 7, 64, '2017-07-10', 5, 1),
(23, 5, 62, '2017-07-10', 5, 1),
(24, 6, 64, '2017-07-10', 5, 1),
(25, 6, 65, '2017-07-10', 5, 1),
(26, 6, 61, '2017-07-10', 5, 1),
(27, 6, 63, '2017-07-10', 5, 1),
(28, 5, 63, '2017-07-10', 5, 1),
(29, 5, 61, '2017-07-10', 5, 1),
(30, 5, 65, '2017-07-10', 5, 1),
(31, 5, 66, '2017-07-10', 5, 1),
(32, 5, 67, '2017-07-10', 5, 1),
(33, 5, 68, '2017-07-10', 5, 1),
(34, 5, 69, '2017-07-10', 5, 1),
(35, 5, 70, '2017-07-10', 5, 1),
(36, 5, 71, '2017-07-10', 5, 1),
(37, 5, 72, '2017-07-10', 5, 1),
(41, 18, 3, '2017-07-11', 5, 0),
(42, 9, 3, '2017-08-08', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Class` varchar(3) NOT NULL DEFAULT 'S.E',
  `Tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subid`, `Name`, `Class`, `Tid`) VALUES
(1, 'SAD', 'S.E', 1),
(2, 'DBMS', 'T.E', 1),
(3, 'Basics of C++', 'S.E', 2),
(4, 'OOPD', 'T.E', 2),
(5, 'DS', 'S.E', 3),
(6, 'OS', 'T.E', 3),
(8, 'AI', 'T.E', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Tid` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Tid`, `Username`, `Password`, `Name`) VALUES
(1, 'Sweta', '12345', 'Shweta Morajkar'),
(2, 'Kavita', '12345', 'Kavita Asnani'),
(3, 'HOD', '12345', 'J.A Laxminarayan'),
(5, 'temp', '12345', 'Temp teacher');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `expid` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `experiment`
--
ALTER TABLE `experiment`
  ADD PRIMARY KEY (`Expid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `student-exp`
--
ALTER TABLE `student-exp`
  ADD PRIMARY KEY (`SEid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Tid`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experiment`
--
ALTER TABLE `experiment`
  MODIFY `Expid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `student-exp`
--
ALTER TABLE `student-exp`
  MODIFY `SEid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
