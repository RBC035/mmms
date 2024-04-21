-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 02:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cr`
--

CREATE TABLE `cr` (
  `RegNo` varchar(50) NOT NULL,
  `CrStatus` varchar(50) NOT NULL,
  `SelectedYear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr`
--

INSERT INTO `cr` (`RegNo`, `CrStatus`, `SelectedYear`) VALUES
('cr', 'Assistance', '2020/2021'),
('MNMA/BDZ.EHE/0021/17', 'Former CR', '2017/2018'),
('MNMA/C.BA/0002/19', 'Former Assistance', '2018/2019'),
('MNMA/C.ED/0001/18', 'CR', '2018/2019'),
('MNMA/C.LIM/0001/19', 'Former CR', '2018/2019'),
('MNMA/ODZ..GI/0003/18', 'Assistance', '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `SaffID` varchar(45) NOT NULL,
  `RegNo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`SaffID`, `RegNo`) VALUES
('68790jhi', 'MMMS/ZNZ.DEAN/0046/21'),
('ffyt99086', 'MMMS/ZNZ.DEAN/0070/21'),
('g,n,n', 'MMMS/ZNZ.DEAN/0063/21'),
('MNMA/STAFF/0089/ZNZ', 'MMMS/ZNZ.DEAN/0067/21');

-- --------------------------------------------------------

--
-- Table structure for table `depertment`
--

CREATE TABLE `depertment` (
  `RegNo` varchar(50) NOT NULL,
  `DepertmentName` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depertment`
--

INSERT INTO `depertment` (`RegNo`, `DepertmentName`, `Location`) VALUES
('cr', 'ICT', 'SecondFloor'),
('dsr', 'Socialstudy', 'SecondFloor'),
('MNMA/BDZ.EGH/0036/17', 'Education', 'Gfloor '),
('MNMA/BDZ.EHE/0018/17', 'Education', 'Gfloor '),
('MNMA/BDZ.EHE/0021/17', 'Education', 'Gfloor'),
('MNMA/BDZ.EKH/0054/17', 'Education', 'Gfloor'),
('MNMA/C.BA/0002/19', 'Economics', 'SecondFloor'),
('MNMA/C.BA/0002/21', 'Economics', 'SecondFloor'),
('MNMA/C.ED/0001/18', 'Economics', 'SecondFloor'),
('MNMA/C.ED/0001/19', 'Economics', 'SecondFloor'),
('MNMA/C.ED/0001/20', 'Economics', 'SecondFloor'),
('MNMA/C.ED/0001/21', 'Economics', 'SecondFloor'),
('MNMA/C.HRM/0004/19', 'Socialstudy', 'SecondFloor'),
('MNMA/C.LIM/0001/19', 'Socialstudy', 'SecondFloor'),
('MNMA/C.PRO/0001/19', 'Economics', 'SecondFloor'),
('MNMA/C.PRO/0001/21', 'Economics', 'SecondFloor'),
('MNMA/C.REC/0005/19', 'Socialstudy', 'SecondFloor'),
('MNMA/ODZ..GI/0003/18', 'Gender', 'SecondFloor'),
('MNMA/ODZ..GI/0008/18', 'Gender', 'SecondFloor '),
('MNMA/ODZ..GI/0011/18', 'Gender', 'SecondFloor '),
('MNMA/ODZ.AC/0011/19', 'Economics', 'SecondFloor'),
('MNMA/ODZ.BA/0001/19', 'Economics', 'SecondFloor'),
('MNMA/ODZ.COD/0025/19', 'Gender', 'SecondFloor'),
('MNMA/ODZ.ED/0001/18', 'Economics', 'SecondFloor'),
('MNMA/ODZ.ED/0005/19', 'Economics', 'SecondFloor'),
('MNMA/ODZ.ICT/0002/19', 'ICT', 'SecondFloor'),
('MNMA/ODZ.ICT/0011/19', 'ICT', 'SecondFloor'),
('MNMA/ODZ.ICT/0012/21', 'ICT', 'SecondFloor '),
('MNMA/ODZ.ICT/0014/21', 'ICT', 'SecondFloor'),
('MNMA/ODZ.ICT/0114/18', 'ICT', 'SecondFloor'),
('president', 'Economics', 'SecondFloor'),
('prime', 'Socialstudy', 'SecondFloor'),
('salum12s', 'ICT', 'SecondFloor '),
('vice', 'Gender', 'SecondFloor');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `DurationID` int(11) NOT NULL,
  `LeaderID` varchar(50) NOT NULL,
  `ElectedYear` varchar(45) NOT NULL,
  `StartDate` date NOT NULL,
  `EnDate` date NOT NULL,
  `Reason` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`DurationID`, `LeaderID`, `ElectedYear`, `StartDate`, `EnDate`, `Reason`) VALUES
(2, 'MNMA/C.ED/0001/18', '2018/2019', '2018-04-12', '2018-04-12', 'Continue'),
(4, 'MNMA/C.BA/0002/19', '2018/2019', '2018-04-10', '2021-10-12', 'Discontinued'),
(7, 'cr', '2020/2021', '2020-03-05', '2020-03-05', 'Continue'),
(8, 'MNMA/C.LIM/0001/19', '2018/2019', '2019-01-29', '2021-10-12', 'Postponed'),
(9, '38', '2020/2021', '2021-09-22', '2021-09-22', 'Continue'),
(10, '9', '2019/2020', '2019-04-02', '2019-04-02', 'Continue'),
(11, '11', '2019/2020', '2019-06-18', '2019-06-18', 'Continue'),
(12, '18', '2019/2020', '2019-03-02', '2019-03-02', 'Continue'),
(13, '20', '2019/2020', '2019-04-24', '2019-04-24', 'Continue'),
(14, '23', '2019/2020', '2019-10-02', '2019-10-02', 'Continue'),
(15, '10', '2019/2020', '2019-01-10', '2019-01-10', 'Continue'),
(16, '15', '2019/2020', '2019-08-26', '2019-08-26', 'Continue'),
(17, '19', '2019/2020', '2019-09-17', '2019-09-17', 'Continue'),
(18, '22', '2019/2020', '2019-05-21', '2019-05-21', 'Continue'),
(19, '25', '2019/2020', '2020-01-28', '2020-01-28', 'Continue'),
(20, '26', '2019/2020', '2019-10-16', '2019-10-16', 'Continue'),
(21, '37', '2020/2021', '2020-07-15', '2020-07-15', 'Continue'),
(41, 'AMSU182542', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(42, 'SAMU410572', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(43, 'ABKH927461', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(44, 'RASU654914', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(45, 'JUJU638128', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(46, 'JAOM623574', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(47, 'ABJU564298', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(48, 'AMMA409839', '2019/2020', '2021-09-26', '2021-09-26', 'Continue'),
(66, '42', '2017/2018', '2016-02-18', '2021-09-30', 'Absconded'),
(67, 'MNMA/BDZ.EHE/0021/17', '2017/2018', '2017-03-22', '2021-10-12', 'Absconded'),
(68, '43', '2017/2018', '2021-09-26', '2021-09-26', 'Continue'),
(69, 'MNMA/ODZ..GI/0003/18', '2018/2019', '2021-09-26', '2021-09-26', 'Continue'),
(70, '44', '2017/2018', '2021-09-26', '2021-09-26', 'Continue'),
(71, '45', '2017/2018', '2021-09-26', '2021-09-26', 'Continue'),
(72, '46', '2018/2019', '2019-01-15', '2019-12-07', 'Terminated'),
(73, 'MOVU893458', '2018/2019', '2019-01-15', '2019-12-07', 'Terminated'),
(74, 'FAHA439840', '2017/2018', '2017-04-30', '2018-06-17', 'Absconded'),
(75, '47', '2019/2020', '2021-10-23', '2021-10-23', 'Continue'),
(76, '48', '2019/2020', '2021-10-23', '2021-10-23', 'Continue');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `MinisterID` varchar(50) NOT NULL,
  `EventName` varchar(150) NOT NULL,
  `EventDate` datetime NOT NULL,
  `Estatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `MinisterID`, `EventName`, `EventDate`, `Estatus`) VALUES
(1, 'AMSU182542', 'Seminer ya mikopo ya elimu ya juu bodi ya mikopo Zanzibar', '2021-09-26 18:07:50', 'RELEASED'),
(2, 'ABKH927461', 'Upandaji mikoko pwani za mawimbini', '2021-09-26 18:12:00', 'RELEASED'),
(6, 'FAHA439840', 'Seminer ya mikopo ya elimu ya juu bodi ya mikopo Zanzibar', '2021-09-30 22:49:37', 'BLOCK');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanID` int(11) NOT NULL,
  `RegNo` varchar(50) NOT NULL,
  `LoanCategory` varchar(50) DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanID`, `RegNo`, `LoanCategory`, `Date`) VALUES
(4, 'cr', 'ZHESLB', '2021-07-31 04:48:21'),
(5, 'dsr', 'HESLB', '2021-07-31 04:48:27'),
(6, 'MNMA/ODZ.ICT/0012/21', 'ZHESLB', '2021-07-31 04:48:57'),
(8, 'salum12s', 'HESLB', '2021-07-31 04:49:25'),
(9, 'MNMA/BDZ.EGH/0036/17', 'ZHESLB', '2021-10-08 12:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `message_in_ID` varchar(255) NOT NULL,
  `message_out_ID` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `minister`
--

CREATE TABLE `minister` (
  `LeaderID` int(11) NOT NULL,
  `MinisterID` varchar(50) NOT NULL,
  `MinisterPossition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minister`
--

INSERT INTO `minister` (`LeaderID`, `MinisterID`, `MinisterPossition`) VALUES
(10, 'AMSU182542', 'Minister of Loan'),
(11, 'SAMU410572', 'Prime minister'),
(18, 'ABKH927461', 'Minister of Health'),
(19, 'JAOM623574', 'Minister of Security'),
(20, 'RASU654914', 'Minister of Education'),
(22, 'JUJU638128', 'Minister of Information'),
(25, 'ABJU564298', 'Minister of Finance'),
(26, 'AMMA409839', 'Minister of Women'),
(45, 'FAHA439840', 'Former Minister of Loan'),
(46, 'MOVU893458', 'Former Prime minister');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `Pid` int(11) NOT NULL,
  `RegNo` varchar(50) NOT NULL,
  `ProgramName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Pid`, `RegNo`, `ProgramName`) VALUES
(23, 'president', 'Business Administration'),
(24, 'prime', 'Management of Social Development'),
(26, 'dsr', 'Human Resource'),
(27, 'cr', 'ICT'),
(40, 'MNMA/ODZ.AC/0011/19', 'Accountancy'),
(41, 'MNMA/ODZ.BA/0001/19', 'Business Administration'),
(42, 'MNMA/ODZ.ED/0001/18', 'Economic Development'),
(43, 'MNMA/ODZ.ED/0005/19', 'Economic Development'),
(45, 'MNMA/ODZ.ICT/0002/19', 'ICT'),
(46, 'vice', 'Community Development'),
(47, 'MNMA/C.BA/0002/19', 'Business Administration'),
(48, 'MNMA/C.BA/0002/21', 'Business Administration'),
(49, 'MNMA/C.ED/0001/18', 'Economic Development'),
(50, 'MNMA/C.ED/0001/19', 'Economic Development'),
(51, 'MNMA/C.ED/0001/20', 'Economic Development'),
(52, 'MNMA/C.ED/0001/21', 'Economic Development'),
(53, 'MNMA/C.HRM/0004/19', 'Human Resource'),
(54, 'MNMA/C.LIM/0001/19', 'Library Management'),
(56, 'MNMA/C.PRO/0001/19', 'Procurement and Supply'),
(57, 'MNMA/C.PRO/0001/21', 'Procurement and Supply'),
(58, 'MNMA/C.REC/0005/19', 'Record Management'),
(59, 'salum12s', 'ICT'),
(60, 'MNMA/ODZ.ICT/0012/21', 'ICT'),
(64, 'MNMA/ODZ.ICT/0014/21', 'ICT'),
(65, 'MNMA/ODZ.ICT/0011/19', 'ICT'),
(66, 'MNMA/ODZ.ICT/0114/18', 'ICT'),
(80, 'MNMA/BDZ.EKH/0054/17', 'Education'),
(81, 'MNMA/BDZ.EHE/0021/17', 'Education'),
(82, 'MNMA/BDZ.EHE/0018/17', 'Education'),
(83, 'MNMA/BDZ.EGH/0036/17', 'Education'),
(84, 'MNMA/ODZ..GI/0003/18', 'Gender Issues Development'),
(85, 'MNMA/ODZ..GI/0011/18', 'Gender Issues Development'),
(86, 'MNMA/ODZ..GI/0008/18', 'Gender Issues Development'),
(87, 'MNMA/ODZ.COD/0025/19', 'Community Development');

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `Rid` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `Rname` varchar(150) NOT NULL,
  `Rcost` varchar(45) NOT NULL,
  `Ramount` varchar(45) NOT NULL,
  `Rstatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`Rid`, `EventID`, `Rname`, `Rcost`, `Ramount`, `Rstatus`) VALUES
(1, 1, 'Maji', '700', '12', 'RELEASED'),
(2, 1, 'Chakula', '1450', '34', 'BLOCK'),
(3, 2, 'Mkoko', '799', '300', 'RELEASED'),
(6, 6, 'majji', '970000', '65', 'BLOCK');

-- --------------------------------------------------------

--
-- Table structure for table `selectedleader`
--

CREATE TABLE `selectedleader` (
  `LeaderID` int(11) NOT NULL,
  `RegNo` varchar(50) NOT NULL,
  `Possition` varchar(50) DEFAULT NULL,
  `ElectedYear` varchar(50) NOT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selectedleader`
--

INSERT INTO `selectedleader` (`LeaderID`, `RegNo`, `Possition`, `ElectedYear`, `Status`) VALUES
(9, 'president', 'President', '2019/2020', 'Elected'),
(10, 'dsr', 'DSR', '2019/2020', 'Selected'),
(11, 'prime', 'DSR', '2019/2020', 'Selected'),
(15, 'vice', 'Vice President', '2019/2020', 'Elected'),
(18, 'MNMA/ODZ.ED/0005/19', 'DSR', '2019/2020', 'Selected'),
(19, 'MNMA/C.ED/0001/21', 'DSR', '2019/2020', 'Selected'),
(20, 'MNMA/C.REC/0005/19', 'DSR', '2019/2020', 'Selected'),
(22, 'salum12s', 'DSR', '2019/2020', 'Selected'),
(23, 'MNMA/C.BA/0002/21', 'DSR', '2019/2020', 'Elected'),
(25, 'MNMA/ODZ.BA/0001/19', 'DSR', '2019/2020', 'Selected'),
(26, 'MNMA/ODZ.AC/0011/19', 'DSR', '2019/2020', 'Selected'),
(38, 'MNMA/C.HRM/0004/19', 'DSR', '2020/2021', 'Selected'),
(42, 'MNMA/BDZ.EKH/0054/17', 'Former President', '2017/2018', 'Elected'),
(43, 'MNMA/BDZ.EGH/0036/17', 'DSR', '2017/2018', 'Selected'),
(44, 'MNMA/ODZ..GI/0008/18', 'DSR', '2017/2018', 'Selected'),
(45, 'MNMA/ODZ.ICT/0011/19', 'DSR', '2017/2018', 'Selected'),
(46, 'MNMA/ODZ.COD/0025/19', 'Former DSR', '2018/2019', 'Elected');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `RegNo` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` char(8) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `AcademicYear` varchar(50) NOT NULL,
  `Semister` varchar(50) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `HealthInfo` varchar(50) DEFAULT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `StudentStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RegNo`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `PhoneNumber`, `AcademicYear`, `Semister`, `Level`, `HealthInfo`, `ProfilePicture`, `StudentStatus`) VALUES
('cr', 'Ahmed', 'Mussa', 'Seleiman', 'Male', '+255 777 098 765', '2020/2021', 'SemisterTwo', 'Degree', 'Has', 'picha2.jpg', 'Enable'),
('dsr', 'amery', 'Issa', 'Suleimn', 'Male', '+255 777 098 765', '2017/2018', 'SemisterTwo', 'Degree', 'Has', 'picha3.jpg', 'Enable'),
('MNMA/BDZ.EGH/0036/17', 'Feisal', 'T', 'Issa', 'Male', '+255 745 657 321', '2016/2017', 'SemisterOne', 'Degree', 'HealthInfo', 'picha2.jpg', 'Enable'),
('MNMA/BDZ.EHE/0018/17', 'Yuridi', 'Shaib', 'Hamad', 'Male', '+255 678 543 213', '2016/2017', 'SemisterOne', 'Degree', 'HealthInfo', 'picha2.jpg', 'Enable'),
('MNMA/BDZ.EHE/0021/17', 'Arafa', 'M', 'Omar', 'Female', '+255 777 789 012', '2016/2017', 'SemisterOne', 'Degree', 'HealthInfo', 'picha3.jpg', 'Enable'),
('MNMA/BDZ.EKH/0054/17', 'Abdillah', 'Ibrahim', 'Khamis', 'Male', '+255 776 876 908', '2016/2017', 'SemisterOne', 'Degree', 'HealthInfo', 'picha3.jpg', 'Enable'),
('MNMA/C.BA/0002/19', 'Amina', 'Khamis', 'Ame', 'Female', '+255 776 123 456', '2018/2019', 'SemisterTwo', 'Certificate', 'HANA', 'picha1.jpg', 'Enable'),
('MNMA/C.BA/0002/21', 'Yussuph', 'Said', 'Yussuph', 'Male', '25567834128', '2020/2021', 'SemisterOne', 'Certificate', 'HealthInfo', 'picha4.jpg', 'Enable'),
('MNMA/C.ED/0001/18', 'Amour', 'Suleiman', 'Amour', 'Male', '+255 777 980 234', '2017/2018', 'SemisterTwo', 'Certificate', 'HealthInfo', 'picha5.jpg', 'Enable'),
('MNMA/C.ED/0001/19', 'Ibrahim', 'Yahya', 'Ibrahim', 'Male', '+255 781 234 560', '2018/2019', 'SemisterTwo', 'Certificate', 'HealthInfo', 'picha6.jpg', 'Enable'),
('MNMA/C.ED/0001/20', 'Arafah', 'Mussa', 'Said', 'Female', '+255 743 215 785', '2019/2020', 'SemisterTwo', 'Certificate', 'Has', 'picha7.jpg', 'Enable'),
('MNMA/C.ED/0001/21', 'Jamila', 'Juma', 'Omar', 'Female', '+255 789 804 221', '2020/2021', 'SemisterTwo', 'Certificate', 'Has', 'picha8.jpg', 'Enable'),
('MNMA/C.HRM/0004/19', 'Abdulwahi', 'Juma', 'Ali', 'Male', '+255 777 452 345', '2018/2019', 'SemisterTwo', 'Certificate', 'HealthInfo', 'picha9.jpg', 'Enable'),
('MNMA/C.LIM/0001/19', 'Aziza', 'Zahran', 'Mohammed', 'Female', '+255 621 098 732', '2018/2019', 'SemisterTwo', 'Certificate', 'HealthInfo', 'picha10.jpg', 'Enable'),
('MNMA/C.PRO/0001/19', 'Mahmood', 'Hassan', 'Ussi', 'Male', '+255 786 545 321', '2018/2019', 'SemisterTwo', 'Certificate', 'HealthInfo', 'picha11.jpg', 'Enable'),
('MNMA/C.PRO/0001/21', 'Fatma', 'Mcha', 'Ussi', 'Female', '+255 777 657 865', '2020/2021', 'SemisterTwo', 'Certificate', 'HealthInfo', 'picha12.jpg', 'Enable'),
('MNMA/C.REC/0005/19', 'Rawaha', 'Abdallah', 'Suleiman', 'Female', '+255 742 312 080', '2018/2019', 'SemisterTwo', 'Certificate', 'HealthInfo', 'picha13.jpg', 'Enable'),
('MNMA/ODZ..GI/0003/18', 'Maryam', 'Foum', 'Kheir', 'Female', '+255 765 876 546', '2017/2018', 'SemisterOne', 'Diploma', 'HealthInfo', 'picha3.jpg', 'Enable'),
('MNMA/ODZ..GI/0008/18', 'Nadya', 'Amour', 'Ali', 'Female', '+255 744 786 543', '2017/2018', 'SemisterOne', 'Diploma', 'HealthInfo', 'picha2.jpg', 'Enable'),
('MNMA/ODZ..GI/0011/18', 'Haji', 'W', 'Haji', 'Male', '+255 655 233 987', '2017/2018', 'SemisterOne', 'Diploma', 'HealthInfo', 'picha2.jpg', 'Enable'),
('MNMA/ODZ.AC/0011/19', 'Amina', 'Ali', 'Makame', 'Female', '+255 783 456 178', '2018/2019', 'SemisterTwo', 'Diploma', 'HealthInfo', 'picha14.jpg', 'Enable'),
('MNMA/ODZ.BA/0001/19', 'Abdul', 'Makame', 'Juma', 'Male', '+255 776 123 458', '2018/2019', 'SemisterOne', 'Diploma', 'HealthInfo', 'picha15.jpg', 'Enable'),
('MNMA/ODZ.COD/0025/19', 'Mohammed', 'Ali', 'Vuai', 'Male', '+255 623 345 345', '2018/2019', 'SemisterOne', 'Diploma', 'HealthInfo', 'picha3.jpg', 'Enable'),
('MNMA/ODZ.ED/0001/18', 'Ali', 'Ameir', 'Khamis', 'Male', '+255 762 345 678', '2017/2018', 'SemisterTwo', 'Diploma', 'HealthInfo', 'picha16.jpg', 'Enable'),
('MNMA/ODZ.ED/0005/19', 'Abdulsharuku', 'Amour', 'Khamis', 'Male', '+255 777 098 985', '2018/2019', 'SemisterTwo', 'Diploma', 'HealthInfo', 'picha17.jpg', 'Enable'),
('MNMA/ODZ.ICT/0002/19', 'Ummy', 'Ally', 'Ibrahim', 'Female', '7770998124', '2018/2019', 'SemisterTwo', 'Diploma', 'HealthInfo', 'picha18.jpg', 'Enable'),
('MNMA/ODZ.ICT/0011/19', 'fat-hiya', 'Salum', 'hafidh', 'Female', '+255 789 112 876', '2018/2019', 'SemisterTwo', 'Degree', 'HealthInfo', 'picha4.jpg', 'Enable'),
('MNMA/ODZ.ICT/0012/21', 'Salma', 'Rashid', 'Musfatah', 'Female', '+255 655 233 456', '2020/2021', 'SemisterTwo', 'Degree', 'HANA', 'picha19.jpg', 'Enable'),
('MNMA/ODZ.ICT/0014/21', 'Jamila', 'Salum', 'hafidh', 'Female', '+255 789 112 014', '2020/2021', 'SemisterTwo', 'Degree', 'Has', 'picha4.jpg', 'Enable'),
('MNMA/ODZ.ICT/0114/18', 'pandu', 'Salum', 'hafidh', 'Male', '+255 758 911 214', '2017/2018', 'SemisterTwo', 'Degree', 'HealthInfo', 'picha4.jpg', 'Enable'),
('president', 'mussa', 'salum', 'Mussa', 'Male', '+255 789 032 124', '2018/2019', 'SemisterTwo', 'Degree', 'Has', 'picha20.jpg', 'Enable'),
('prime', 'Salama', 'shabaan', 'mustafa', 'Female', '+255 761 245 678', '2017/2018', 'SemisterOne', 'Diploma', 'Has', 'picha21.jpg', 'Enable'),
('salum12s', 'Juma', 'salum', 'juma', 'Male', '+255 776 554 556', '2020/2021', 'SemisterTwo', 'Degree', 'Has', 'picha2.jpg', 'Enable'),
('vice', 'Salama', 'Mussa', 'Shabaan', 'Female', '+255 678 905 415', '2017/2018', 'SemisterOne', 'Degree', 'Has', 'picha7.jpg', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `userole`
--

CREATE TABLE `userole` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userole`
--

INSERT INTO `userole` (`ID`, `UserName`, `Password`, `Role`) VALUES
(1, '------', '4a7d1ed414474e4033ac29ccb8653d9b', 'Admin'),
(2, 'cr', 'fa246d0262c3925617b0c72bb20eeb1d', 'CR'),
(5, 'MNMA/C.BA/0002/19', 'fa246d0262c3925617b0c72bb20eeb1d', 'Former CR'),
(6, 'MNMA/C.BA/0002/21', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'DSR'),
(8, 'MNMA/C.LIM/0001/19', 'fa246d0262c3925617b0c72bb20eeb1d', 'Former CR'),
(13, 'president', 'b59c67bf196a4758191e42f76670ceba', 'President'),
(16, 'vice', '2be9bd7a3434f7038ca27d1918de58bd', 'Vice President'),
(26, 'MMMS/ZNZ.DEAN/0067/21', '81dc9bdb52d04dc20036dbd8313ed055', 'Dean of student'),
(29, 'MNMA/C.ED/0001/18', 'fa246d0262c3925617b0c72bb20eeb1d', 'CR'),
(32, 'MNMA/C.HRM/0004/19', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'DSR'),
(44, 'dsr', '81dc9bdb52d04dc20036dbd8313ed055', 'Minister of Loan'),
(45, 'prime', '934b535800b1cba8f96a5d72f72f1611', 'Prime minister'),
(46, 'MNMA/ODZ.ED/0005/19', '81dc9bdb52d04dc20036dbd8313ed055', 'Minister of Health'),
(47, 'MNMA/C.REC/0005/19', '81dc9bdb52d04dc20036dbd8313ed055', 'Minister of Education'),
(48, 'salum12s', '81dc9bdb52d04dc20036dbd8313ed055', 'Minister of Information'),
(49, 'MNMA/C.ED/0001/21', '81dc9bdb52d04dc20036dbd8313ed055', 'Minister of Security'),
(50, 'MNMA/ODZ.BA/0001/19', '81dc9bdb52d04dc20036dbd8313ed055', 'Minister of Finance'),
(51, 'MNMA/ODZ.AC/0011/19', '81dc9bdb52d04dc20036dbd8313ed055', 'Minister of Women'),
(56, 'MNMA/BDZ.EKH/0054/17', 'b59c67bf196a4758191e42f76670ceba', 'Former President'),
(57, 'MNMA/BDZ.EHE/0021/17', 'fa246d0262c3925617b0c72bb20eeb1d', 'Former CR'),
(58, 'MNMA/BDZ.EGH/0036/17', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'DSR'),
(59, 'MNMA/ODZ..GI/0003/18', 'fa246d0262c3925617b0c72bb20eeb1d', 'CR'),
(60, 'MNMA/ODZ..GI/0008/18', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'DSR'),
(61, 'MNMA/ODZ.ICT/0011/19', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'DSR'),
(62, 'MNMA/ODZ.COD/0025/19', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'Former DSR'),
(63, 'MNMA/ODZ.COD/0025/19', '934b535800b1cba8f96a5d72f72f1611', 'Former Prime minister'),
(64, 'MNMA/ODZ.ICT/0011/19', '81dc9bdb52d04dc20036dbd8313ed055', 'Former Minister of Loan'),
(69, 'MMMS/ZNZ.DEAN/0063/21', '81dc9bdb52d04dc20036dbd8313ed055', 'Dean of student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cr`
--
ALTER TABLE `cr`
  ADD PRIMARY KEY (`RegNo`,`SelectedYear`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`SaffID`,`RegNo`);

--
-- Indexes for table `depertment`
--
ALTER TABLE `depertment`
  ADD PRIMARY KEY (`RegNo`,`DepertmentName`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`DurationID`,`LeaderID`,`ElectedYear`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`,`MinisterID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanID`,`RegNo`),
  ADD KEY `loan_ibfk_1` (`RegNo`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `minister`
--
ALTER TABLE `minister`
  ADD PRIMARY KEY (`LeaderID`,`MinisterID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Pid`,`RegNo`),
  ADD KEY `RegNo` (`RegNo`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`Rid`,`EventID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `selectedleader`
--
ALTER TABLE `selectedleader`
  ADD PRIMARY KEY (`LeaderID`,`RegNo`,`ElectedYear`),
  ADD KEY `RegNo` (`RegNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`RegNo`);

--
-- Indexes for table `userole`
--
ALTER TABLE `userole`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `DurationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `selectedleader`
--
ALTER TABLE `selectedleader`
  MODIFY `LeaderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `userole`
--
ALTER TABLE `userole`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cr`
--
ALTER TABLE `cr`
  ADD CONSTRAINT `cr_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `depertment`
--
ALTER TABLE `depertment`
  ADD CONSTRAINT `depertment_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `minister`
--
ALTER TABLE `minister`
  ADD CONSTRAINT `minister_ibfk_1` FOREIGN KEY (`LeaderID`) REFERENCES `selectedleader` (`LeaderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `requirement_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `selectedleader`
--
ALTER TABLE `selectedleader`
  ADD CONSTRAINT `selectedleader_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
