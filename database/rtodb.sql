-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 02:29 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `coID` bigint(20) NOT NULL,
  `coTitle` text NOT NULL,
  `coCompany` text NOT NULL,
  `coHOAddress` text NOT NULL,
  `coTelephone` text NOT NULL,
  `coContactPerson` text NOT NULL,
  `coFax` text NOT NULL,
  `coEmail` text NOT NULL,
  `coRemarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`coID`, `coTitle`, `coCompany`, `coHOAddress`, `coTelephone`, `coContactPerson`, `coFax`, `coEmail`, `coRemarks`) VALUES
(1, 'M/s', 'MOONGIPA ROADAWAYS PVT. LTD.', '116,KESHVJI NAIK ROAD CHICHBUNDER ,MUMBAI 40009', '02223728884', 'KALANJI', '9323248036', 'moongipand@vsi.net', ''),
(2, 'M/s', 'Shree Nasik Goods Transport Co. Pvt. Ltd', '311,Narshi Natha,Street,Kharek bazar,Masjid Bunder(W),Mumbai - 400009', '0222381051', 'Rajubhai Katira', '09321028851', 'sngt@ymail.com', ''),
(3, 'M/s', 'Nutan Rajumani Transport pvt. ltd.', '403,Raheja XIon, Jetha Compound,Dr. B. Ambedkar Road, Opp. Nirmal Park, Behind HP Petrol Pump, Byculla (E),Mumbai- 400 027', '02223720870', 'Amul', '09768618907', 'logistics@nrtpl.com', ''),
(4, 'M/s', 'SHREE BHAIRVNATH TRANSPOT', 'Shop No. 1 Balaji Bhavan, Shivaji Udyog Nagar, Manpada Road, Dombivali (E).', '0222872612', 'SHINDE K V', '9920311433', 'himath@2012.com', ''),
(5, 'M/s', 'MAHA GUJRAT ROADLINKS', '63/67.WINNERSCO-OP PREMISES SOC. LTD. CHAKLA STREET MUMBAI 400003', '02223428922', 'PARKASH VORA ', '9820050828', 'himath@2012.com', ''),
(6, 'M/s', 'SHAN TRADIRS ', 'MANGAL NAGR A/18 OF YARI ROAD, OPP. ISLAMI  HIGH SCHWL  VARSAWA  ANDIHERI (W) 400061', '02226336569', 'NAUSHD BHAI BHAYANI', '9820075189', 'himath@2012.com', ''),
(7, 'M/s', 'PARESH M. THAKKAR', 'B/203 GAJ LAXMI APRT.,NEAR SHRI RAM IND. EST., NEAR KOLSA WALA COMPUNDA , PUPP HOUSE BRIDGE ANDHERI (E)  69', '9320073300', 'PARESH ', '9320073300', 'himath@2012.com', ''),
(8, 'M/s', 'Umesh Transport company', 'SAPUD TAL WADA BHIWANDI THANE', '09970527808', 'Santosh Shetty', '9892235708', 'santosh@billtee.com', ''),
(9, 'M/s', 'Ubiquity Trantech', 'SAPUDA TAL WADA BHIWANDI THANI', '09970527808', 'Nikhil', '9967020242', 'nikhil@billtee.com', ''),
(10, 'M/s', 'ANILBHAI JATHBHI MOMAYA', 'MULUNDIW)  400080', '09323030721', 'ANILBHAI', '09323030721', 'himath@2012.com', ''),
(11, 'M/s', 'ANIRUDHA RAMJEET CHAVAN', 'AMRA NAGAR RAGAT DARE FORM, DURGA ROAD MULUND KOLNI MULUND (W) 81', '9869432879', 'ANIRUDHA ', '9987189891', 'himath@2012.com', ''),
(12, 'M/s', 'RAMPADARATH BHAGWATIDIN YADAV', 'ANDIRI', '09967955365', 'RAMPDARTH ', '09967955365', 'himathbhai2012@gmail.com', ''),
(13, 'M/s', 'ASHIQUE HUSSAIN SHEIKH', '310/B SANA APARTMENT, ALMAS COLONY , KAUSA, MUMBRA-400162 ,THANE', '09324058091', 'Aashiq Hussain', '09324058091', 'khursheedahmed1@yahoo.com', ''),
(14, 'M/s', 'GAURAV ROADLINES', 'NEAR ROAYAL CHALNG LUSAWADI THANE', '0222540590', 'MHASH', '09323031425', 'himathbhai2012@gmail.com', ''),
(15, 'M/s', 'GIRISH VIRAAJI DAGA', 'DOMBIVALI THANI', '0932467980', 'GIRES BHAI', '0932467980', 'himathbhai2012@gmail.com', ''),
(16, 'M/s', 'JAGISH SINGA  RUPSING RAJPUROHIT', 'MANPAD  THANI ', '9422392006', 'MANGU SING', '09004243530', 'himathbhai2012@gmail.com', ''),
(17, 'M/s', 'JAY  LOGISTICS', 'THANE', '09322403796', 'MANGAL BHAI', '09322403796', 'himathbhai2012@gmail.com', ''),
(18, 'M/s', 'MAHESH CARGO MOVERS', '33/34 ABOV LACO BON ,CORNER KHAR NAGAR, NEAR, P.F.OFFICE BANDRA (E) 51 ', '09820022176', 'GIRISH BIYANI', '09820022176', 'himathbhai2012@gmail.com', ''),
(19, 'M/s', 'MANGUSING ROOP SING  RAJPUROHIT', 'MANPAD  THANI ', '9967560570', 'MANGUSING ', '09422392006', 'himathbhai2012@gmail.com', ''),
(20, 'M/s', 'MOHD  ARSAD  ANSARI', '303,SAIFPALACE AMRUT NAGAR MUMBAR THANE 400612 ', '9324374978', 'ARSAD', '09892523645', 'himathbhai2012@gmail.com', ''),
(21, 'M/s', 'VIJAY GANPAT UNDE', 'THANE', '9820755585', 'VIJAY', '9820755585', 'himathbhai2012@gmail.com', ''),
(22, 'M/s', 'NEW JANTA TRS. CO.', 'MASJID BANDAR ', '09223313608', 'PARNJIVANBHAI', '09223313608', 'himathbhai2012@gmail.com', ''),
(23, 'M/s', 'P.R. PAPER AGENCY', 'THANI', '09869231041', 'PATIL', '9930222617', 'himathbhai2012@gmail.com', ''),
(24, 'M/s', 'Pankaj Prakash Dawani', 'ULHASNAGAR', '07387384777', 'PANKAJ', '07387384777', 'himathbhai2012@gmail.com', ''),
(25, 'M/s', 'SHANKAR NAMDEV  KALE', 'THANI', '9869231041', 'KALE', '9930222617', 'himathbhai2012@gmail.com', ''),
(26, 'M/s', 'SHREE KRISHNA TRADING CO.', 'SHAPUR ', '9869231041', 'SRI', '9930222617', 'himathbhai2012@gmail.com', ''),
(27, 'M/s', 'SHREE RADHESHYAM SINGH', 'THANE', '09920499121', 'RADHESHYAM', '09920499121', 'himathbhai2012@gmail.com', ''),
(28, 'M/s', 'SIDDHIVINAYAK TRANSPORT', 'MUMBAI', '07045584899', 'SANJI', '07045584899', 'himathbhai2012@gmail.com', ''),
(29, 'M/s', 'SOLAPUR SIDDHESHWAR TRANSPORT', 'MUMBAI', '09869231041', 'SHREE', '9930222617', 'himathbhai2012@gmail.com', ''),
(30, 'M/s', 'SWARUP CARRIER', 'MASJID BANDAR ', '09323792795', 'CHAJURAM', '09323792795', 'himathbhai2012@gmail.com', ''),
(31, 'M/s', 'LALASAHEB EKNATH MANE', 'SHIVAJI NAGAR, THANE', '09820136553', 'L MANE', '09820136553', 'himathbhai2012@gmail.com', ''),
(32, 'M/s', 'MAHENDRA KALANJI THAKKAR.', 'MULUND(W)  400080', '09323511115', 'MAHENDRABHAI', '09833844866', 'himathbhai2012@gmail.com', ''),
(33, 'M/s', 'VEENA ROADLINES ', 'MULUND (W)  400080', '08898589019', 'HIREN ', '09322048990', 'himathbhai2012@gmail.com', ''),
(34, 'M/s', 'PARAS CLEANING &  FOR.', 'MULUND (W)  400080', '02225686820', 'PAUL', '09320508861', 'himathbhai2012@gmail.com', ''),
(35, 'M/s', 'SHIVAJI RAMCHANDAR MANE', 'SHIVAJI NAGAR THANI', '09004351418', 'SHIVAJI MANE', '09004351418', 'himathbhai2012@gmail.com', ''),
(36, 'M/s', 'SHRIRAM S. YADAV', 'MANAPADA THANE ', '09594392718', 'YADAV', '09594392718', 'himathbhai2012@gmail.com', ''),
(37, 'M/s', 'KESHAV DAYANU MATEKAR', 'MUMBAI', '09819159610', 'MATEKAR', '09819159610', 'himathbhai2012@gmail.com', ''),
(38, 'M/s', 'PURSHOTTAM GOPALJI BHANUSHALI', 'MULUND (W)  400080', '9820635451', 'PURSHOTTAMBHAI', '09820635451', 'himathbhai2012@gmail.com', ''),
(39, 'M/s', 'DHIREN C PALAN', 'GALA NO.1/A KHANDAGAKE ESTATE, PURNA VILLAGE,  KALHER BHIVANDI THANE 421302                       ', '9869059625', 'DHIREN', '9869059625', 'dhiren@gmail.com', ''),
(40, 'M/S', 'CHHAJURAM  N. MAWANDIA', 'SAWROOP CARRIER, GALA NO,8 D"SOUZ COMP,  PURNA VILAGE, BHIWANDI THANE 421302', '9869059625', 'CHAJURAM', '', '', ''),
(41, 'M/S', 'MAHENDRA KALYANJI THAKKAR', 'MULUND (W) 80', '9323511115', 'MAHENDARABHAI', '', '', ''),
(42, 'M/s', 'SATISH R THAKUR', 'SHYAM VAITY CHAWL R 1 KAMGAR HOSP, RD RAMCHANDRA NGR 3 VAITIWADI WE ,THANE BS-III-400604', '0000000000', 'SATISH', '', '', ''),
(43, 'M/s', 'SHREERAM. BABULAL YADAV', 'MUMBAI', '8080473545', 'SHREERAM YADAV', '', '', ''),
(44, 'M/s', 'HARENDRA . H . PANCHAL', 'A/4 JAY MALHAAR, PADWAL NAGAR,WAGLE ESTATE, THANE', '9821754747', 'HARENDRA PANCHAL', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `greentax`
--

CREATE TABLE `greentax` (
  `gID` bigint(20) NOT NULL,
  `receiptNo` text NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `receiptDate` date NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  `gRenewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insuID` bigint(20) NOT NULL,
  `insuPolicyNo` text NOT NULL,
  `insuFromDate` date NOT NULL,
  `insuToDate` date NOT NULL,
  `insID` bigint(20) NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `insuRenewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insuranceco`
--

CREATE TABLE `insuranceco` (
  `insID` bigint(20) NOT NULL,
  `insInsuranceCo` text NOT NULL,
  `insContactPerson` text NOT NULL,
  `insTelephone` text NOT NULL,
  `insMobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insuranceco`
--

INSERT INTO `insuranceco` (`insID`, `insInsuranceCo`, `insContactPerson`, `insTelephone`, `insMobile`) VALUES
(1, 'THE NEW INDA ASSURANCE CO. LTD.', '', '', ''),
(2, 'BAJAJ ALLIANZ GENERAL INSURANCE COM.LTD', '', '', ''),
(3, 'ROYAL SUNDARAM GENERAL INSURANCE COMPANY LIMITED', '', '', ''),
(4, 'THE ORIENTAL INSURANCE COMPANY LIMITED', '', '', ''),
(5, 'SBI GENERAL INSURANCE ', '', '', ''),
(6, 'ICICI LOMBARD GENERAL INSURANCE COM.LTD', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`) VALUES
(1, 'himathbhi', 'admin@test.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `nocdetails`
--

CREATE TABLE `nocdetails` (
  `nocID` bigint(20) NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `vehVehicleNo` text NOT NULL,
  `vehChassisNo` text NOT NULL,
  `vehEngineNo` text NOT NULL,
  `vehModel` text NOT NULL,
  `vehMake` text NOT NULL,
  `vehRegistrationDate` date NOT NULL,
  `vehRMADate` date NOT NULL,
  `vehHypothecation` text NOT NULL,
  `vehRLW` bigint(20) NOT NULL,
  `vehUW` bigint(20) NOT NULL,
  `vehPL` bigint(20) NOT NULL,
  `vehRemarks` text NOT NULL,
  `coID` bigint(20) NOT NULL,
  `rcID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `npdetails`
--

CREATE TABLE `npdetails` (
  `npdID` bigint(20) NOT NULL,
  `stID` bigint(20) NOT NULL,
  `npdAmount` bigint(20) NOT NULL,
  `npdBankDraftNo` text NOT NULL,
  `npdBankDraftDate` date NOT NULL,
  `npdBankName` text NOT NULL,
  `npdFromDate` date NOT NULL,
  `npdToDate` date NOT NULL,
  `nphID` bigint(20) NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `npdRenewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `npheader`
--

CREATE TABLE `npheader` (
  `nphID` bigint(20) NOT NULL,
  `nphPermitNo` text NOT NULL,
  `nphPermitDate` text NOT NULL,
  `nphExpiryDate` date NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `nphRenewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passing`
--

CREATE TABLE `passing` (
  `pasID` bigint(20) NOT NULL,
  `pasFromDate` date NOT NULL,
  `pasToDate` date NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `pasRenewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `perID` bigint(20) NOT NULL,
  `perPermitNo` text NOT NULL,
  `perFromDate` date NOT NULL,
  `perToDate` date NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `perRenewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rcholder`
--

CREATE TABLE `rcholder` (
  `rcID` bigint(20) NOT NULL,
  `rcTitle` text NOT NULL,
  `rcName` text NOT NULL,
  `rcRCAddress` text NOT NULL,
  `rcTelephone` text NOT NULL,
  `rcResiAddress` text NOT NULL,
  `rcResiTelephone` text NOT NULL,
  `rcMobile` text NOT NULL,
  `rcFax` text NOT NULL,
  `rcEmailID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rcholder`
--

INSERT INTO `rcholder` (`rcID`, `rcTitle`, `rcName`, `rcRCAddress`, `rcTelephone`, `rcResiAddress`, `rcResiTelephone`, `rcMobile`, `rcFax`, `rcEmailID`) VALUES
(1, 'MR.', 'MOONGIPA ROADAWAYS PVT. LTD.', 'KASHALI VILAGE BHIWANDI THANE', '', '', '', '', '', ''),
(2, 'MR.', 'PARESH M. THAKKAR', 'GUJARI BILDIG SHAPUR THANE .', '', '', '', '', '', ''),
(3, 'MR.', 'RAMPADARTH    BHAGWATIDIN YADAV', 'OPP. R.T.C. PET. PUMP JAGRM MOTOR GARJCOMPUND PURAN BHIWAND  THANE.', '', '', '', '', '', ''),
(4, 'MR.', 'RAJESH NARANJI  KATIRA', 'M/S  SHREE NASHIK GD. TRANSPOT P. LTD.13,JALARAM COMP KHANDAGLE EST. PURAN VILAG  BHIWANDI THANE', '', '', '', '09821028851', '', ''),
(5, 'MR.', 'MAYUR GIRISH BIYANI', 'AC RAJLAXMI COMM. COMPLEX  KALER BHIWANDI THANE', '', '', '', '09820022176', '', ''),
(6, 'M/s', 'UMESH TRADING COMPANY', '310/311,TARLA FARM VILLAGE SUPUNDE POST KANCHAD BRAMAN GAON RD.TALWADA DIST. THANE', '', '', '', '9892235708', '', 'santosh@billtee.com'),
(7, 'MR.', 'PRAKASH NANJI VORA', 'ZILL COMP. RAJ RAJESHWARI COMP SONALE VILL TAL BHIWANDI THANE', '', '', '', '', '', ''),
(8, 'MR.', 'ZUBIN PRAKASH VORA', 'ZILL COMP. RAJ RAJESHWARI COMP SONALE VILL TAL BHIWANDI THANE', '', '', '', '', '', ''),
(9, 'MR.', 'JAYESH     PRANJIEEVAN   SHAH', 'BLDG GALA 6 JAY BHAGWAN COMPLEX, PURANA VILL TAL. BHIWANDI THANE 421302', '', '', '', '', '', ''),
(10, 'MR.', 'RAJEET CHUNILAL MOHITE', 'H211 ZIDKA ,AT AMBADI POST DIGHASHI NR. AMBADI AUTO SERVICES, BIWANDI THANE  -421303', '', '', '', '', '', ''),
(11, 'MR.', 'SANTOSH  BABU SHETTY', 'AT POST SUPONDE TAL BHIWANDI THANE421302', '', '', '', '', '', ''),
(12, 'MR.', 'AMAR APPASAHEB CHAKOTE', 'GALA NO. 3 SAI DARSHAN BUILDING  PURAN VILLAGE BHIWANDI THANE 421308', '', '', '', '', '', ''),
(13, 'M/S', 'SAIDEEP ENTERPEISES', 'SURVEY NO.4826/A SAVARRI VILLGE TAL SHAHPUR DIST THANE 421601', '', '', '', '', '', ''),
(14, 'MR.', 'ASHIQ MAKSUD HUSAIN', '2ND,FLLOR GALA NO 206,  DAPODA, SIDDHINATH COMPLEX, BHIWANDI THANE 421302', '', '', '', '', '', ''),
(15, 'Mrs ', 'BEENA GIRISH BIYANI', '205,2ND. FLOOR,,PARASNATH COMPLEX,DAPODA ROAD ANJUR, BHIWANDI THANE 421302', '', '', '', '', '', ''),
(16, 'MR.', 'PANKAJ PRAKASH DAWANI', '2ND,FLLOR GALA NO 206,  DAPODA, SIDDHINATH COMPLEX, BHIWANDI THANE 421302', '', '', '', '', '', ''),
(17, 'MR.', 'DHIREN CHHAGANLAL PALAN', 'GALA NO.1/A KHANDAGAKE ESTATE, PURNA VILLAGE,  KALHER BHIVANDI THANE 421302                       ', '', '', '', '', '', ''),
(18, 'MR.', 'CHHAJURAM  N. MAWANDIA', 'SAWROOP CARRIER, GALA NO,8 D"SOUZ COMP,  PURNA VILAGE, BHIWANDI THANE 421302', '', '', '', '', '', ''),
(19, 'MR.', 'VIJAY GANPAT UNDE', 'FAL NO. 203 C/WING, SAIKRUP  BLDIG, KALHER VILLAGE, TALBHIWANDI THANE .', '', '', '', '', '', ''),
(20, 'M/S', 'AMAR ENTERPRIES', 'S.NO.48/26 A-14SARAWALIVILLAGE TAL.SHAHAPUR, THANE 421601', '', '', '', '9869432879', '', ''),
(21, 'MR.', 'MOHD ARSAD ANSARI ', '303,SAIF PALACIE AMRUTI NAGAR MUMBAR THANE 40612', '', '', '', '9324374978', '', ''),
(23, 'MR.', 'CHHAJURAM  N. MAWANDIA', 'SAWROOP CARRIER, GALA NO,8 D"SOUZ COMP,  PURNA VILAGE, BHIWANDI THANE 421302', '', '', '', '', '', ''),
(24, 'M/s', 'Ubiquity Trantech', 'THANE', '', '', '', '', '', ''),
(25, 'MR.', 'MAHENDRA KALYANJI THAKKAR', 'MULUND (W) 80', '', '', '', '9323511115', '', ''),
(26, 'Mr.', 'JAY LOGISTICS', 'BHIWANDI ,THANE', '', '', '', '', '', ''),
(27, 'Mr.', 'SATISH R THAKUR', 'SHYAM VAITY CHAWL R 1 KAMGAR HOSP, RD RAMCHANDRA NGR 3 VAITIWADI WE ,THANE BS-III-400604', '', '', '', '', '', ''),
(28, 'Mr.', 'Kashyap Kalyanji Thakkar', 'Bhagwan compund, Godown no. 6 , Building no.12 ,purna Village, Bhiwandi .Thane.', '', '', '', '9323511115', '', ''),
(29, 'M/s', 'SIDDHIVINAYAK TRANSPORT', 'SHOPNO.1 ,GALA NO.2, OPP. BHATRA PETROL PUMP, VANMALA COMPUND ,RENAL VILLAGE, BHIWANDI ,THANE.', '', '', '', '07045584899', '', ''),
(30, 'Mr.', 'CHIRAG RAJESH KATIRA', 'SHREE NASIK GOODS TRANSPORT PVT. LTD, 13,JALARAM COMPOUND ,KANDAGALE ESTATE, PURNA VILLAGE ,BHIWANDI.', '', '', '', '9821028851', '', ''),
(31, 'Mr.', 'GIRISH VIRJI DAGA', 'JK CARGO MOVERS,GALA NO.3, KHANDAGALE ESTATE, BHIWANDI , THANE.', '', '', '', '9324679820', '', ''),
(32, 'Mr.', 'SHREERAM. BABULAL YADAV', '1882,GALA NO.88 ,VALPADA,ANJUR PHATA,B/S NARON MOTORS,BHIWANDI, THANE', '', '', '', '08286034531', '', ''),
(33, 'Mr.', 'ANIL JETHABHAI MOMAYA', '142/3S131/ NET DARA MARKET RAKED DEV, REHNAL VILLAGE, BHIWANDI , THANE.', '', '', '', '09323030721', '', ''),
(34, 'Mr.', 'SHAIKH YUNUS MEHBOOB', 'SHREE NASIK GOODS TRANSPORT PVT. LTD, 13,JALARAM COMPOUND ,KANDAGALE ESTATE, PURNA VILLAGE ,BHIWANDI.', '', '', '', '9821028851', '', ''),
(35, 'Mr.', 'khursheed Ahmed H. Khan', '310/B SANA APARTMENT ALMAS COLONY,KAUSA , MUMBRA, THANE.', '', '', '', '7718058091', '', 'khursheedahmed1@yahoo.com'),
(36, 'M/s', 'SUWARNA SUNIL SHIRKE', '67, SHIVSHAKTI NAGAR, WAGLE ESTATE, PAIPALAIN RD NO 16 ,THANE', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `remID` bigint(20) NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `taxToDate` date NOT NULL,
  `insuToDate` date NOT NULL,
  `pasToDate` date NOT NULL,
  `perToDate` date NOT NULL,
  `nphToDate` date NOT NULL,
  `npdToDate` date NOT NULL,
  `gToDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`remID`, `vehID`, `taxToDate`, `insuToDate`, `pasToDate`, `perToDate`, `nphToDate`, `npdToDate`, `gToDate`) VALUES
(1, 1, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 2, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 3, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 4, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(5, 5, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(6, 6, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(7, 7, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(8, 8, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(9, 9, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(10, 10, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(11, 11, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(12, 12, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(13, 13, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(14, 14, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(15, 15, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(16, 16, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(17, 17, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(18, 18, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(19, 19, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(20, 20, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(21, 21, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(22, 22, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(23, 23, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(24, 24, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(25, 25, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(26, 26, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(27, 27, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(28, 28, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(29, 29, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(30, 30, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(31, 31, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(32, 32, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(33, 33, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(34, 34, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(35, 35, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(36, 36, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(37, 37, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(38, 38, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(39, 39, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(40, 40, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(41, 41, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(42, 42, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(43, 43, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(44, 44, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(45, 45, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(46, 46, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(47, 47, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(48, 48, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(49, 49, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(50, 50, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(51, 51, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(52, 52, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(53, 53, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(54, 54, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(55, 55, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(56, 56, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(57, 57, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(58, 58, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(59, 59, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(60, 60, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(61, 61, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(62, 62, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(63, 63, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(64, 64, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(65, 65, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(66, 66, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(67, 67, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(68, 68, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(69, 69, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(70, 70, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(71, 71, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(72, 72, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(73, 73, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(74, 74, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(75, 75, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(76, 76, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(77, 77, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(78, 78, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(79, 79, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(80, 80, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(81, 81, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(82, 82, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(83, 83, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(84, 84, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(85, 85, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(86, 86, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stID` bigint(20) NOT NULL,
  `stAbbrivate` text NOT NULL,
  `stState` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stID`, `stAbbrivate`, `stState`) VALUES
(7, 'GJ', 'Gujarat'),
(8, 'DL', 'Delhi'),
(9, 'MH', 'Maharashtra'),
(10, 'AP', 'Andhra Pradish'),
(11, 'KA', 'Karnataka'),
(12, 'TN ', 'Tamilnadu'),
(13, 'KE', 'Kerala'),
(14, 'MP', 'Madhya Pradesh'),
(15, 'UP', 'Uttar Pradesh'),
(16, 'PO', 'Pondichery'),
(17, 'HA', 'Haryana'),
(19, 'HI', 'Himachal Pradesh'),
(20, 'OR', 'Orissa'),
(21, 'WB', 'West Bengal'),
(22, 'BH', 'Bihar'),
(23, 'JK', 'Jammu&kashmir'),
(24, 'AS', 'Assam'),
(25, 'GO', 'Goa'),
(26, 'CHG', 'Chattisgarh'),
(27, 'UTC', 'Uttaranchal'),
(28, 'ZA   ', 'Zarhkand'),
(29, 'DD', 'Daman - Deev'),
(30, 'DNH', 'Dadara- Nagar- Haweli'),
(31, 'CH', 'Chandigarh'),
(33, 'PA', 'Panjab'),
(34, 'RA ', 'Rajasthan'),
(35, 'A IND', 'ALL TERRITORY OF INDIA'),
(36, 'ARP', 'Arunachal Pradesh'),
(37, 'AN NI', 'Andaman Nicobar'),
(38, 'JH', 'Jharkhand'),
(39, 'LAK', 'Lakshwdep'),
(40, 'MAN', 'Anipur'),
(41, 'MED', 'Medhalaya'),
(42, 'MIZ', 'Mizoram'),
(43, 'NAG', 'Nagaland'),
(44, 'SIK', 'Sikkim'),
(45, 'All_State', 'All State Of India');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `taxID` bigint(20) NOT NULL,
  `taxReceiptNo` text NOT NULL,
  `taxReceiptDate` date NOT NULL,
  `taxAmount` bigint(20) NOT NULL,
  `taxFromDate` date NOT NULL,
  `taxToDate` date NOT NULL,
  `taxPenalty` bigint(20) NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `taxRenewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `todetails`
--

CREATE TABLE `todetails` (
  `toID` bigint(20) NOT NULL,
  `vehID` bigint(20) NOT NULL,
  `vehVehicleNo` text NOT NULL,
  `vehChassisNo` text NOT NULL,
  `vehEngineNo` text NOT NULL,
  `vehModel` text NOT NULL,
  `vehMake` text NOT NULL,
  `vehRegistrationDate` date NOT NULL,
  `vehRMADate` date NOT NULL,
  `vehHypothecation` text NOT NULL,
  `vehRLW` bigint(20) NOT NULL,
  `vehUW` bigint(20) NOT NULL,
  `vehPL` bigint(20) NOT NULL,
  `vehRemarks` text NOT NULL,
  `coID` bigint(20) NOT NULL,
  `rcID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehID` bigint(20) NOT NULL,
  `vehVehicleNo` text NOT NULL,
  `vehChassisNo` text NOT NULL,
  `vehEngineNo` text NOT NULL,
  `vehModel` text NOT NULL,
  `vehMake` text NOT NULL,
  `vehRegistrationDate` date NOT NULL,
  `vehRMADate` date NOT NULL,
  `vehHypothecation` text NOT NULL,
  `vehRLW` bigint(20) NOT NULL,
  `vehUW` bigint(20) NOT NULL,
  `vehPL` bigint(20) NOT NULL,
  `vehRemarks` text NOT NULL,
  `coID` bigint(20) NOT NULL,
  `rcID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coID`, `rcID`) VALUES
(1, 'MH04 CG 5149', '373361CUZ109614', '697TC45CUZ108224', '2005', 'TATA/1613LPT.', '2005-05-01', '0000-00-00', 'ICICI BANK', 16200, 6430, 9770, '', 1, 1),
(2, 'MH04 FP 2578', 'MAT373348C7D17112', '697TC69DXY 108668', '2012', 'TATA/1613LPT.', '2012-06-01', '0000-00-00', 'NIL', 16200, 6230, 9970, '', 7, 2),
(3, 'MH04 DK 1593', '444026KSZ742962', '697TC57KSZ146307', '2007', 'TATA LPT 2510', '2007-12-05', '0000-00-00', 'NIL', 25000, 8575, 16425, '', 12, 3),
(4, 'MH04 GC 7851', 'MEC0563AGDP001422', '400921P0001550', '07-2013', 'BHART BENZAR 1214RBS3', '2013-08-01', '0000-00-00', 'NIL', 12800, 12800, 8030, '', 2, 4),
(5, 'MH04 FD 2707', 'MAT457403B7E24430', '497TC92EYY829854', '2011', 'TATA 1109LPT  ', '2030-11-01', '0000-00-00', 'NIL', 12990, 4975, 8015, '', 18, 5),
(6, 'MH04 DK 7073', 'BPAO7586', 'BPH454585', '2008', 'ASHOK LEYLND 2214', '2008-01-01', '0000-00-00', 'HDFC BANK', 25000, 7880, 17120, '', 8, 6),
(7, 'MH04 EY 3199', 'MB1COMDWC6APLA2495', 'LAP100941', '2010', 'ASHOK LEYLND 2214', '2010-10-01', '0000-00-00', 'HDFC BANK', 25000, 7880, 17120, '', 8, 6),
(8, 'MH04 HD 3998', '808502', 'C03980', '2016', 'ASHOK LEYLND 990', '2016-04-12', '0000-00-00', 'HDFC BANK', 12990, 5440, 7550, '', 8, 6),
(9, 'MH04 HY 1006', 'MAT457111H7C04462', '497TC44CSY808653', '03 2017', 'TATA LPT1109', '2017-04-01', '0000-00-00', 'TATA MOTORS FINANCE LIMITED COMPANY', 12990, 3875, 9115, 'REFRIGIRATOR VAN', 18, 15),
(10, 'MH04 HY 1132', 'MAT457111H7C03679', '497TC44CSY807332', '03 2017', 'TATA LPT1109', '2017-04-01', '0000-00-00', 'HDFC BANK', 12990, 7520, 5470, 'REFRIGIRATOR VAN', 18, 15),
(11, 'MH04 HY 1231', 'MAT457111H7C04166', '497TC44CSY808177', '03 2017', 'TATA LPT1109', '2030-11-01', '0000-00-00', 'HDFC BANK', 12990, 7510, 5480, 'REFRIGIRATOR VAN', 18, 15),
(13, 'MH04 GF 4399', 'MAT373170D2P13742', '697TC69PWY117831', '12.2013', 'TATA 1612/36 TIPPER', '2014-01-13', '0000-00-00', 'NIL', 16200, 6120, 10080, 'WHEEL BASE 3625 M.TIPPER', 11, 20),
(14, 'MH04 HY 0366', 'MAT395024G0N10516', '61L84347802', '03 2017', 'TATA LPT1615', '2017-03-23', '0000-00-00', 'HDFC BANK', 16200, 16200, 7522, 'TRUCK CLOSE BODY', 20, 21),
(15, 'MH04 HY 0727', 'MAT457111H7B02394', '497TC44BSY804770', '03 2017', 'TATA LPT1109', '2030-11-01', '0000-00-00', 'HDFC BANK', 12990, 12990, 5035, 'REFRIGIRATOR VAN', 18, 15),
(16, 'MH04 HY 0207', 'MAT395024G0N10848', '61K84346747', '03 2017', 'TATA LPT1615', '2017-03-02', '0000-00-00', 'YES BANK', 16200, 7520, 8680, 'CLOSED BODY', 24, 16),
(17, 'MH04 HY 1119', 'MC2F8HRC0H8125178', 'E413CDHB125530', '03 2017', 'TATA', '2017-03-24', '0000-00-00', 'SATARA BANK', 12976, 3875, 9101, 'TRUCK OPEN BODY', 39, 22),
(18, 'MH04 HY 0709', 'MAT457111H7B02266', '497TC44BSY804905', '03 2017', 'TATA LPT1109', '2030-11-01', '0000-00-00', 'ICICI BANK', 12990, 12990, 5050, 'REFRIGIRATOR VAN', 18, 15),
(19, 'MH04 HY 0601', 'MAT457111H7B02265', '497TC44BSY804943', '03 2017', 'TATA LPT1109', '2017-03-26', '0000-00-00', 'ICICI BANK', 12990, 12990, 5390, 'REFRIGIRATOR VAN', 18, 15),
(20, 'MH04 HY 0772', 'MAT457111H7B02399', '497TC44BSY804771', '03 2017', 'TATA LPT1109', '2030-11-01', '0000-00-00', 'HDFC BANK', 12990, 7945, 5045, 'REFRIGIRATOR VAN', 18, 15),
(21, 'MH04 HY 0916', 'MAT457111H7C0458', '497TC44CSY808693', '03 2017', 'TATA LPT1109', '2017-04-01', '0000-00-00', 'TATA MOTORS FINANCE LIMITED COMPANY', 12990, 7490, 5500, 'REFRIGIRATOR VAN', 18, 15),
(22, 'MH04 FP 0252', 'MAT448050C7B084489', '91803121B84043708', '2012', 'TATA LPT2515', '2012-04-04', '0000-00-00', 'DECCAN MERCHANT CO-OP BANK', 25000, 8805, 16195, 'TRUCK OPEN BODY', 21, 19),
(23, 'MH04 FU 3197', 'WEA062503', 'XFH388511', '2006', 'ASHOK LEYLAND', '2017-09-15', '0000-00-00', 'NIL', 25000, 8000, 17000, 'TRUCK FULL BODY', 40, 23),
(24, 'MH04 CG 5156', '373361CUZ110137', '697TC45CUZ108805', '2005', 'TATA', '2030-11-01', '0000-00-00', 'SBI', 16200, 6130, 10070, '', 1, 1),
(25, 'MH04 HY 0131', 'MAT395024G0N10760', '61L84347190', '2016', 'TATA LPT1615', '2016-11-01', '0000-00-00', 'HDFC BANK', 16200, 16200, 7230, 'TRUCK CLOSE BODY', 13, 14),
(26, 'MH10 Z 3589', '12954', '817472', '2012', 'TATA LPT1109', '2012-01-01', '0000-00-00', 'NIL', 0, 0, 0, '', 9, 24),
(27, 'MH04 HY 1222', 'MAT457111H7C04315', '497TC44CSY808328', '03/2017', 'TATA LPT1109', '2030-11-01', '0000-00-00', 'HDFC BANK', 12990, 7950, 5040, '', 18, 15),
(28, 'MH04 HY 1186', 'MAT457111H7C04012', '497TC44CSY807903', '03 2017', 'TATA LPT1109', '2017-04-01', '0000-00-00', 'HDFC BANK', 12990, 7500, 5490, '', 18, 15),
(29, 'MH50 0155', 'MAT45740B7P5CC81', '497TC92PYY871934', '2012', 'TATA LPT1109', '2012-02-02', '0000-00-00', 'NIL', 12990, 4975, 8015, '', 32, 25),
(30, 'MH04 AL 8101', '426010HYZ718609', 'B-5,914510H62199805', '2001', 'TATA LPT2515', '2001-10-10', '0000-00-00', 'NIL', 25000, 25000, 16595, '', 8, 11),
(31, 'MH04 DS 1729', '373363DRZ116509', '697TC55DRZ121762', '4/2008', 'TATALPT/1613/48', '2008-08-29', '0000-00-00', 'ICICI BANK LTD', 16200, 16200, 9050, '', 1, 1),
(32, 'MH04 DS 3819', '357514HRZ825649', '497SPTC35HRZ628086', '8/2008', 'TATASFC 407/31/TURBO', '2008-10-24', '0000-00-00', 'NIL', 5700, 2448, 3252, '', 1, 1),
(33, 'MH04 HY 0565', 'MAT457111H7B02218', '497TC44BSY804786', '03 2017', 'TATA LPT 1109', '2017-03-26', '0000-00-00', 'ICICI BANK', 12990, 7950, 5040, 'REFRIGERATOR VAN', 18, 15),
(34, 'MH04 HY 0556', 'MAT457111H7B02397', '497TC44BSY805055', '03 2017', 'TATA LPT 1109', '2017-03-26', '0000-00-00', 'HDFC BANK', 12990, 7935, 5055, 'REFRIGERATOR VAN', 18, 15),
(35, 'MH04 HY 1555', 'MAT457111H7C04356', '497TC44CSY808459', '04 2017', 'TATA LPT 1109', '2017-04-01', '0000-00-00', 'HDFC BANK', 12990, 7940, 5050, 'REFRIGERATOR VAN', 18, 15),
(36, 'MH04 HY 0925', 'MAT457111H7C04446', '497TC44CSY808602', '04 2017', 'TATA LPT 1109', '2017-04-01', '0000-00-00', 'TATA MOTORS FINANCE LTD ', 12990, 7935, 5055, 'REFRIGERATOR VAN', 18, 15),
(37, 'MH04 GF 8671', 'MC2F8HRC0ED093625', 'E483CDED644726', '06 2014', 'VECOMM VE COMMERCIAL VEHICLE', '2014-06-12', '0000-00-00', 'NIL', 12976, 4825, 8151, 'TRUCK OPEN BODY', 17, 26),
(38, 'MH04 HS 1701', 'MAT541021G3N25149', 'B591803261K63552862', '02 2017', 'TATA LPT 3718', '2017-02-15', '0000-00-00', 'INDIA INFOLINE FINANCE LTD', 37000, 6800, 30200, 'TRUCK OPEN BODY', 42, 27),
(39, 'MH04 HD 4001', 'MAT457110G7C05669', '497TC92CTY811799', '04 2016', 'TATA LPT 1109', '2016-04-13', '0000-00-00', 'HDFC BANK', 12990, 3875, 9115, 'DELIVERY VAN', 9, 24),
(40, 'MH04 CG 2801', 'DWA046371', '286624', '2005', 'ASHOK LEYLAND', '2005-02-02', '0000-00-00', 'NIL', 25000, 8100, 16900, 'HEAVY GOODS VEHICLE', 8, 11),
(41, 'MH04 EL 0731', 'MC230MRC0AB016284', '025124', '2010', 'EICHER', '2010-03-18', '0000-00-00', 'HDFC BANK', 16200, 6130, 10070, 'HEAVY GOODS VEHICLE', 8, 11),
(42, 'MH12 CH 5921', 'DWH090461', 'DWH293031', '02 2005', 'ASHOK LEYLAND', '2005-02-11', '0000-00-00', 'NIL', 25000, 8250, 16750, 'HEAVY GOODS VEHICLE', 8, 11),
(43, ' MH04 DK 6821', 'MNA089043', 'MNH519967', '03 2008', 'ASHOK LEYLAND', '2008-03-27', '0000-00-00', 'HDFC BANK', 25000, 7540, 17460, 'HEAVY GOODS VEHICLE', 8, 11),
(44, 'MH04 BU 1151', '374417EWZ913066', '497SP28EWZ78021', '2003', 'TATA', '2003-12-15', '0000-00-00', 'NIL', 2820, 1690, 1130, 'LIGHT MOTOR VEHICLE', 1, 1),
(45, 'MH13 R 4691', 'MAT457403B7H38081', '497TC92HYY848225', '09 2011', 'TATA LPT 1109', '2011-09-08', '0000-00-00', 'NIL', 12990, 4925, 8065, '', 32, 28),
(46, 'MH04 GF 8573', 'MCC229FRCOEE2934', 'E483CDEE845235', '05 2014', 'VECOMM VE COMMERCIAL VEHICLE EICHER 10.95', '2014-06-06', '0000-00-00', 'SUNDRAM FIN LTD', 9500, 2960, 6540, '', 28, 29),
(47, 'MH04 GC 6951', 'MEC0563AGDP001461', '400921P0001766', '07 2013', 'BHARAT BENZ 12-2014', '2013-08-01', '0000-00-00', 'NIL', 12800, 4770, 8030, '', 2, 30),
(48, 'MH04 FP 0151', 'MAT448050C7B09567', 'B591803121B84045064', '2012', 'TATA LPT 2518', '2012-04-04', '0000-00-00', 'NIL', 25000, 7480, 17520, '', 15, 31),
(49, 'MH04 FP 1341', 'MAT388391C0B03349', '21B63232954', '02 2012', 'TATA LPT 1613', '2012-05-02', '0000-00-00', 'NIL', 16200, 6120, 10080, '', 43, 32),
(50, 'MH04 EY 8501', 'MAT466375B5C04656', '11B62999106', '03 2011', 'TATA LPT 3118', '2011-03-29', '0000-00-00', 'SUNDRAM FIN LTD', 31000, 7980, 23020, '', 5, 8),
(51, 'MH04 FP 0621', 'MAT448050C7B10319', 'B591803121B84045872', '02 2012', 'TATA LPT 2518', '2012-04-16', '0000-00-00', 'NIL', 25000, 8380, 16620, '', 10, 33),
(52, 'MH04 DS 9321', 'MAT37334497B07481', '697TC55DQZ812685', '04 2009', 'TATA LPT 1613', '2009-07-01', '0000-00-00', 'ICICI BANK', 16200, 6540, 9660, '', 2, 34),
(53, 'MH04 FP 0890', 'MAT388391C0B03331', '21B65231586', '02 2012', 'TATA LPT 1613-6200 BS III', '2012-05-02', '0000-00-00', 'NIL', 16200, 6120, 10080, '', 13, 14),
(54, 'MH04 BG 4932', 'MH04/3-2006/0-2078', '497TC87EWZ876512', '07 2003', 'TATA LPT 709', '2003-07-09', '0000-00-00', 'ICICI BANK', 7300, 4010, 3290, '', 1, 1),
(55, 'MH04 BG 9543', '373341JWZ728970', '697TCT45JWZ910232', '11 2003', 'TATA /TC/42', '2003-11-04', '0000-00-00', 'ICICI BANK', 16200, 16200, 9320, '', 1, 1),
(56, 'MH04 CA 4436', '373361FVZ120903', '697TC45FVZ115073', '2004', 'TATA LPT 1613', '2004-08-03', '0000-00-00', 'ICICI BANK', 16200, 6130, 10070, '', 1, 1),
(57, 'MH04 CA 3789', '373361FVZ120973', '697TC45FVZ115159', '07 2004', 'TATA LPT 1613', '2004-07-19', '0000-00-00', 'NIL', 16200, 6140, 10060, '', 1, 1),
(58, 'MH04 BU 4368', '378341AVZ100555', '30M62306475', '02 2004', 'TATA LPT 1613', '2004-02-13', '0000-00-00', 'ICICI BANK', 16200, 6130, 10070, '', 1, 1),
(59, 'MH04 DD 5277', '444030ESZ723420', '697TC57ESZ126038', '07 2007', 'TATA', '2007-07-09', '0000-00-00', 'ICICI BANK', 25000, 12850, 12150, '', 1, 1),
(60, 'MH04 DD 5279', '444030ESZ723399', '697TC57ESZ125907', '07 2007', 'TATA LPT 2515', '2007-07-09', '0000-00-00', 'ICICI BANK', 25000, 12830, 12170, '', 1, 1),
(61, 'MH04 CU 4175', '444026JTZ748950', '697TC57JTZ896314', '11 2006', 'TATA', '2006-09-08', '0000-00-00', 'ICICI BANK', 25000, 8700, 16300, '', 1, 1),
(62, 'MH04 DS 1428', '373363DRZ118723', '897TC55DRZ121913', '08 2008', 'TATA LPT 1613', '2008-08-21', '0000-00-00', 'ICICI BANK', 16200, 7125, 9075, '', 1, 1),
(63, 'MH04 FD 0721', 'MBX000WBND293090', 'W1D3212173', '05 2011', 'PIAGGIO VEHICLE', '2011-05-07', '0000-00-00', 'VIJAYA BANK', 975, 975, 560, '', 44, 36),
(64, 'MH04 CG 5183', '373361MVZ146244', '697TC45MVZ134034', '12/2004', 'TATA LPT 1613/48', '2005-04-19', '0000-00-00', 'ICICI BANK', 16200, 5765, 10435, '', 1, 1),
(65, 'MH04 DS2216', '373363ERZ118606', '697TC55ERZ125071', '5/2008', 'TATA LPT 1613/48', '2008-09-11', '0000-00-00', 'ICICI BANK', 16200, 7115, 9085, '', 1, 1),
(66, 'MH04 DS 2225', '373363ERZ118608', '697TC55ERZ125072', '5/2008', 'TATA/LPT/1613/48', '2008-09-11', '0000-00-00', 'ICICI BANK', 16200, 7180, 9020, '', 1, 1),
(67, 'MH04 EL 6480', 'MAT426023A7F25217', 'B59145201F62889211', '06/2010', 'TATA/LPT/2515TC/4880', '2010-08-30', '0000-00-00', 'KOTAK MAHINDRA BANK LTD', 25000, 9500, 15500, '', 1, 1),
(68, 'H04 GC 5022', 'MB1AWJFC9DRYH4976', 'DYHZ105174', '05/2013', 'ASHOKLYLAND/1212HSD/4200 BS 111', '2013-07-01', '0000-00-00', 'ICICI BANK', 12900, 8300, 4600, '', 1, 1),
(69, 'MH04 EL 6481', 'MAT426023A7F26161', 'B59145201F62891936', '6/2010', 'TATA LPT 2515/TC', '2010-08-30', '0000-00-00', 'KOTAK MAHINDRA BANK LTD', 25000, 9430, 15570, '', 1, 1),
(70, 'MH04 EL 6153', 'MAT426023A7F26510', 'B59145201F62893983', '06/2010', 'TATA/2515/TC/4880', '2010-08-20', '0000-00-00', 'KOTAK MAHINDRA BANK LTD', 25000, 9260, 15740, '', 1, 1),
(71, 'MH04 GF 3518', 'MC262HRCOEA089748', 'E483CDDM632251', '01/2014', 'EINCHRA/11.14/', '2014-01-17', '0000-00-00', 'NIL', 14500, 6860, 7640, '', 1, 1),
(72, 'MH04 GF 3527', 'MC262HRCOEA89106', 'E483CDDM631857', '01/2014', 'EINCHRA/11.14/', '2010-01-01', '0000-00-00', 'NIL', 14500, 6850, 7650, '', 1, 1),
(73, 'MH04 GF 3534', 'MC262HRCOEA089742', 'E4893CDDM632244', '01/2014', 'EINCHRA/11.14/', '2014-01-17', '0000-00-00', 'NIL', 14500, 6840, 7660, '', 1, 1),
(74, 'MH04 GF 3545', 'MC262HRC0EA089749', 'E483CDDM632245', '01/2014', 'VECOMM VE COMMERCIAL VEHICLE', '2014-01-17', '0000-00-00', 'ICICI BANK', 14500, 6830, 7670, '', 1, 1),
(75, 'MH04 EB 3734', 'MAT42610190B14540', '90H62783211', '11-2009', 'TATA', '2009-11-03', '0000-00-00', 'KOTAK MAHINDRA BANK LTD', 25000, 10085, 14915, '', 1, 1),
(76, 'MH04 EB 3723', 'MAT42610190H14625', '90H62783285', '11-2009', 'TATA', '2009-11-03', '0000-00-00', 'KOTAK MAHINDRA BANK LTD', 25000, 10035, 14965, '', 1, 1),
(77, 'MH04 DS 1734', '373363DRZ116720', '697TC55DRZ122019', '2008', 'TATA LPT 1613', '2008-08-26', '0000-00-00', 'ICICI BANK', 16200, 7110, 9090, '', 1, 1),
(78, 'MH04 GF 3549', 'MC262HRC0EA089747', 'E483CDM632249', '01-2014', 'VECOMM VE COMMERCIAL VEHICLE', '2014-01-17', '0000-00-00', 'ICICI BANK', 14500, 6870, 7630, '', 1, 1),
(79, 'MH04 CU 4115', '444026JTZ748838', '697TC57JTZ896058', '11-2006', 'TATA LPT 2515', '2006-11-07', '0000-00-00', 'ICICI BANK', 25000, 8810, 16190, '', 1, 1),
(80, 'MH04 CA 3149', '373361EVZ116599', '697TC45EVZ111387', '07-2004', 'TATA LPT 1613', '2004-07-06', '0000-00-00', 'ICICI BANK', 16200, 6130, 10070, '', 1, 1),
(81, 'MH04 DD 6915', '357551DSZ814921', '497SPTTC36DSZ850754', '08-2007', 'TATA LPT 275005', '2007-08-30', '0000-00-00', 'ICICI BANK', 6250, 3190, 3060, '', 1, 1),
(82, 'MH04 GC 5019', 'MB1AWJFC6DRYH5860', 'DYHZ106239', '05-2013', 'ASHOK LEYLAND', '2013-07-01', '0000-00-00', 'ICICI BANK', 12900, 8300, 4600, '', 1, 1),
(83, 'MH04 CG 5198', '373361CUZ110204', '697TC45CUZ108569', '04-2005', 'TATA', '2005-04-19', '0000-00-00', 'ICICI BANK', 16200, 6130, 10070, '', 1, 1),
(84, 'MH04 CG 0919', '416343MVZ143695', '497TC87MVZ132012', '01-2005', 'TATA LPT 1109', '2005-01-03', '0000-00-00', 'ICICI BANK', 10500, 4020, 6480, '', 1, 1),
(85, 'MH04 CA 1628', '374437BVZ909368', '4997SP28BV7867031', '06-2004', 'TATA', '2010-01-01', '0000-00-00', 'ICICI BANK', 2820, 1690, 1130, '', 1, 1),
(86, 'MH04 CA 2478', '374437CVZ910436', '4997SP28CVZ869806', '06-2004', 'TATA', '2004-06-21', '0000-00-00', 'ICICI BANK', 2820, 1690, 1130, '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`coID`);

--
-- Indexes for table `greentax`
--
ALTER TABLE `greentax`
  ADD PRIMARY KEY (`gID`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insuID`);

--
-- Indexes for table `insuranceco`
--
ALTER TABLE `insuranceco`
  ADD PRIMARY KEY (`insID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nocdetails`
--
ALTER TABLE `nocdetails`
  ADD PRIMARY KEY (`nocID`);

--
-- Indexes for table `npdetails`
--
ALTER TABLE `npdetails`
  ADD PRIMARY KEY (`npdID`);

--
-- Indexes for table `npheader`
--
ALTER TABLE `npheader`
  ADD PRIMARY KEY (`nphID`);

--
-- Indexes for table `passing`
--
ALTER TABLE `passing`
  ADD PRIMARY KEY (`pasID`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`perID`);

--
-- Indexes for table `rcholder`
--
ALTER TABLE `rcholder`
  ADD PRIMARY KEY (`rcID`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`remID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stID`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`taxID`);

--
-- Indexes for table `todetails`
--
ALTER TABLE `todetails`
  ADD PRIMARY KEY (`toID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `coID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `greentax`
--
ALTER TABLE `greentax`
  MODIFY `gID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insuID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `insuranceco`
--
ALTER TABLE `insuranceco`
  MODIFY `insID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nocdetails`
--
ALTER TABLE `nocdetails`
  MODIFY `nocID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `npdetails`
--
ALTER TABLE `npdetails`
  MODIFY `npdID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `npheader`
--
ALTER TABLE `npheader`
  MODIFY `nphID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `passing`
--
ALTER TABLE `passing`
  MODIFY `pasID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permit`
--
ALTER TABLE `permit`
  MODIFY `perID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rcholder`
--
ALTER TABLE `rcholder`
  MODIFY `rcID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `remID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `taxID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `todetails`
--
ALTER TABLE `todetails`
  MODIFY `toID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
