-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 09:39 AM
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
-- Database: `crimedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'admin', 7226951966, 'admin@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '2024-03-29 12:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CatDes` mediumtext DEFAULT NULL,
  `AddDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CatDes`, `AddDate`) VALUES
(1, 'Personal Crimes', 'Personal Crimes – “Offenses against the Person”: These are crimes that result in physical or mental harm to another person. Personal crimes include\r\nAssault \r\nBattery\r\nFalse Imprisonment\r\nKidnapping\r\nHomicide – crimes such as first and second degree murder, involuntary manslaughter, and vehicular homicide\r\nRape, statutory rape, sexual assault, and other offenses of a sexual nature', '2024-03-29 06:34:00'),
(2, 'Property Crimes', 'Property Crimes – “Offenses against Property”: These are crimes that do not necessarily involve harm to another person. Instead, they involve an interference with another person’s right to use or enjoy their property. Property crimes include:\r\nLarceny (theft)\r\nRobbery (theft by force) – Note: this is also considered a personal crime since it results in physical and mental harm.\r\nBurglary (penalties for burglary)\r\nArson\r\nEmbezzlement\r\nForgery\r\nFalse pretenses\r\nReceipt of stolen goods.', '2024-03-28 19:39:00'),
(3, 'Inchoate Crimes ', 'Inchoate Crimes – “Inchoate” translates into “incomplete”, meaning crimes that were begun, but not completed. This requires that a person take a substantial step to complete a crime, as opposed to just “intend” to commit a crime. Inchoate crimes include:\r\nAttempt – any crime that is attempted like “attempted robbery”\r\nSolicitation\r\nConspiracy', '2024-03-29 06:35:08'),
(4, 'Statutory Crimes ', 'Statutory Crimes – A violation of a specific state or federal statute and can involve either property offenses or personal offense. Statutory crimes include:\r\nAlcohol-related crimes such as drunk driving (DUI)\r\nSelling alcohol to a minor.', '2024-03-30 08:30:06'),
(5, 'sexual assault', 'illegal sexual contact that usually involves force upon a person without consent or is inflicted upon a person who is incapable of giving consent (as because of age or physical or mental incapacity) or who places the assailant (such as a doctor) in a position of trust or authority', '2024-03-30 06:47:42'),
(9, 'Robbery', 'Robbery is the crime of stealing money or property from a bank, shop, or vehicle, often by using force or threats.', '2024-03-31 18:49:16'),
(10, 'Murder', 'The killing of one person by another that is not legally justified or excusable, usually distinguished from the crime of manslaughter by the element of malice aforethought. The term homicide is a general term used to describe the killing of one human being by another.', '2024-04-01 01:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(8) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `message` text NOT NULL,
  `sub_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `name`, `email`, `phone`, `message`, `sub_time`) VALUES
(8, 'test', 'test1@test.com', 123456789, 'Test', '2024-04-10 08:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblcriminal`
--

CREATE TABLE `tblcriminal` (
  `ID` int(10) NOT NULL,
  `CriminalID` varchar(50) DEFAULT NULL,
  `PoliceID` int(10) DEFAULT NULL,
  `PoliceStationId` int(11) DEFAULT NULL,
  `PoliceStation` varchar(200) DEFAULT NULL,
  `CatName` varchar(100) DEFAULT NULL,
  `CrimeDate` varchar(200) DEFAULT NULL,
  `CrimeTime` varchar(200) DEFAULT NULL,
  `Prison` varchar(200) DEFAULT NULL,
  `Court` varchar(200) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Height` varchar(50) DEFAULT NULL,
  `Weight` varchar(50) DEFAULT NULL,
  `DateofBirth` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `Country` varchar(200) DEFAULT NULL,
  `Zipcode` int(10) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `RecordDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblfir`
--

CREATE TABLE `tblfir` (
  `ID` int(10) NOT NULL,
  `FIRNo` varchar(120) DEFAULT NULL,
  `UserID` int(50) DEFAULT NULL,
  `PoliceStationId` int(11) DEFAULT NULL,
  `PoliceStation` varchar(200) DEFAULT NULL,
  `CrimeType` varchar(200) DEFAULT NULL,
  `NameAccused` varchar(200) DEFAULT NULL,
  `NameApplicants` varchar(200) DEFAULT NULL,
  `ParentageApplicant` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `RelationAccused` varchar(200) DEFAULT NULL,
  `PurposeofFIR` varchar(200) DEFAULT NULL,
  `DateofFIR` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `SectionofLaw` varchar(200) NOT NULL,
  `InvestigationOfficer` varchar(200) NOT NULL,
  `InvestigationDetail` mediumtext NOT NULL,
  `ChargesheetDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfir`
--

INSERT INTO `tblfir` (`ID`, `FIRNo`, `UserID`, `PoliceStationId`, `PoliceStation`, `CrimeType`, `NameAccused`, `NameApplicants`, `ParentageApplicant`, `ContactNumber`, `Address`, `RelationAccused`, `PurposeofFIR`, `DateofFIR`, `Remark`, `Status`, `RemarkDate`, `SectionofLaw`, `InvestigationOfficer`, `InvestigationDetail`, `ChargesheetDate`) VALUES
(14, '511813409', 3, 5, 'Ankleshwar', 'Personal Crimes', 'ABC', 'Self', 'NA', 1234567890, 'XYZ', 'Brother', 'Case', '2024-03-31 18:41:34', 'Charge sheet Complete', 'Charge Sheet Completed', '2024-03-31 18:44:53', '301', 'Self', 'INVESTIGATE DETAIL', '2024-03-31 18:44:53'),
(15, '195055953', 3, 6, 'Bharuch City Main', 'Murder', 'Sohel', 'AHmed', 'NA', 1234568790, 'XYZ', 'Brother', 'Case', '2024-04-01 01:37:11', 'Charge Complete', 'Charge Sheet Completed', '2024-04-01 01:41:30', '10001', 'Chalu Pande', 'Investigation Detail', '2024-04-01 01:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolice`
--

CREATE TABLE `tblpolice` (
  `ID` int(10) NOT NULL,
  `PoliceStationId` int(11) DEFAULT NULL,
  `PoliceStationName` varchar(200) DEFAULT NULL,
  `PID` varchar(20) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `JoiningDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpolice`
--

INSERT INTO `tblpolice` (`ID`, `PoliceStationId`, `PoliceStationName`, `PID`, `Name`, `MobileNumber`, `Email`, `Address`, `Password`, `JoiningDate`) VALUES
(4, 5, 'Ankleshwar', 'PATIL', 'DSP PATIL ', 1234567890, 'patil01@gmail.com', 'XYZ', '202cb962ac59075b964b07152d234b70', '2024-03-31 18:39:42'),
(5, 6, 'Bharuch City Main', 'CHALUPANDE', 'DSP Chalu Pande', 1234567890, 'pande@gmail.com', 'XYZ', '202cb962ac59075b964b07152d234b70', '2024-04-01 01:38:33'),
(7, 5, 'Ankleshwar', 'RAZA', 'MRAZA', 7226951966, 'mr@police.com', 'XYZ', '2156b48f12e2f5a0ef60bf926069ee67', '2024-04-10 02:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicestation`
--

CREATE TABLE `tblpolicestation` (
  `id` int(11) NOT NULL,
  `PoliceStationName` varchar(255) DEFAULT NULL,
  `PoliceStationCode` varchar(200) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpolicestation`
--

INSERT INTO `tblpolicestation` (`id`, `PoliceStationName`, `PoliceStationCode`, `PostingDate`) VALUES
(5, 'Ankleshwar', 'ANKL001', '2024-03-31 18:38:15'),
(6, 'Bharuch City Main', 'BH001', '2024-04-01 01:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(3, 'm raza', 7226951966, 'mr@sid.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-31 18:31:34'),
(4, 'test', 123456789, 'test@test.com', 'f925916e2754e5e03f75dd58a5733251', '2024-04-09 18:55:01'),
(5, 'MRAZA', 123456789, 'mr@user.com', '2b7532bd85721a954091b00c1c3d8d57', '2024-04-10 00:52:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcriminal`
--
ALTER TABLE `tblcriminal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfir`
--
ALTER TABLE `tblfir`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolice`
--
ALTER TABLE `tblpolice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolicestation`
--
ALTER TABLE `tblpolicestation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcriminal`
--
ALTER TABLE `tblcriminal`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblfir`
--
ALTER TABLE `tblfir`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblpolice`
--
ALTER TABLE `tblpolice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpolicestation`
--
ALTER TABLE `tblpolicestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
