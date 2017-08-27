-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2017 at 11:00 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopigenik`
--

-- --------------------------------------------------------

--
-- Table structure for table `msaddress`
--

CREATE TABLE `msaddress` (
  `address_id` char(16) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `province` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `district` varchar(25) DEFAULT NULL,
  `subdistrict` varchar(25) DEFAULT NULL,
  `zipcode` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msaddress`
--

INSERT INTO `msaddress` (`address_id`, `address`, `province`, `city`, `district`, `subdistrict`, `zipcode`) VALUES
('AD00000000000001', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU'),
('AD00000000000002', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU'),
('AD00000000000003', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU'),
('AD00000000000004', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU'),
('AD00000000000005', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU', 'TBU');

-- --------------------------------------------------------

--
-- Table structure for table `msadmin`
--

CREATE TABLE `msadmin` (
  `admin_id` char(16) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msadmin`
--

INSERT INTO `msadmin` (`admin_id`, `name`, `email`, `pass`) VALUES
('AM00000000000001', 'Adam', 'adam@kopigenik.com', 'asdfasdf'),
('AM00000000000002', 'Kent', 'kent@kopigenik.com', 'asdfasdf'),
('AM00000000000003', 'Shelly', 'shelly.sinaga@kopigenik.com', 'asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `mscoffee`
--

CREATE TABLE `mscoffee` (
  `coffee_id` char(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `price_in_kg` float NOT NULL,
  `flavor` varchar(100) DEFAULT NULL,
  `varietal` varchar(100) DEFAULT NULL,
  `process` varchar(100) DEFAULT NULL,
  `elevation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscoffee`
--

INSERT INTO `mscoffee` (`coffee_id`, `name`, `origin`, `price_in_kg`, `flavor`, `varietal`, `process`, `elevation`) VALUES
('CF00000000000001', 'Aceh Gayo', 'Aceh, NAD', 500000, 'TBU', 'TBU', 'TBU', 'TBU'),
('CF00000000000002', 'Papua Wamena', 'Wamena, Papua', 250000, 'TBU', 'TBU', 'TBU', 'TBU'),
('CF00000000000003', 'Robusta Lampung', 'Bandar Lampung, Lampung', 300000, 'TBU', 'TBU', 'TBU', 'TBU');

-- --------------------------------------------------------

--
-- Table structure for table `mscustomer`
--

CREATE TABLE `mscustomer` (
  `customer_id` char(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscustomer`
--

INSERT INTO `mscustomer` (`customer_id`, `name`, `email`, `pass`, `phone`, `dob`, `gender`) VALUES
('CS00000000000001', 'John Doe', 'johndoe@mail.com', 'asdfasdf', 'TBU', '1996-01-30', 'Male'),
('CS00000000000002', 'Jane Doe', 'janedoe@mail.com', 'asdfasdf', 'TBU', '1996-01-30', 'Female'),
('CS00000000000003', 'Kent', 'kentkent2797@gmail.com', 'asdfasdf', '081288477837', '0000-00-00', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `mscustomeraddress`
--

CREATE TABLE `mscustomeraddress` (
  `address_id` char(16) NOT NULL,
  `customer_id` char(16) NOT NULL,
  `description` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscustomeraddress`
--

INSERT INTO `mscustomeraddress` (`address_id`, `customer_id`, `description`) VALUES
('AD00000000000001', 'CS00000000000001', 'Home'),
('AD00000000000002', 'CS00000000000001', 'Work'),
('AD00000000000003', 'CS00000000000002', 'Home'),
('AD00000000000004', 'CS00000000000002', 'Work'),
('AD00000000000005', 'CS00000000000003', 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `mspayment`
--

CREATE TABLE `mspayment` (
  `payment_id` char(16) NOT NULL,
  `name_on_bank_account` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `bank_name` varchar(25) NOT NULL,
  `date_of_transfer` date NOT NULL,
  `proof_of_transfer` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mspayment`
--

INSERT INTO `mspayment` (`payment_id`, `name_on_bank_account`, `amount`, `bank_name`, `date_of_transfer`, `proof_of_transfer`) VALUES
('PM00000000000001', 'John Doe', 250000, 'BCA', '2017-06-17', 'payment.png'),
('PM00000000000002', 'Jane Doe', 500000, 'BCA', '2017-07-17', 'payment.png');

-- --------------------------------------------------------

--
-- Table structure for table `mspaymentsubscription`
--

CREATE TABLE `mspaymentsubscription` (
  `subscription_id` char(16) NOT NULL,
  `payment_id` char(16) NOT NULL,
  `payment_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mspaymentsubscription`
--

INSERT INTO `mspaymentsubscription` (`subscription_id`, `payment_id`, `payment_status`) VALUES
('SB00000000000001', 'PM00000000000001', 'Paid'),
('SB00000000000002', 'PM00000000000002', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `msproviderservice`
--

CREATE TABLE `msproviderservice` (
  `service_id` char(16) NOT NULL,
  `provider_id` char(16) NOT NULL,
  `service_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msproviderservice`
--

INSERT INTO `msproviderservice` (`service_id`, `provider_id`, `service_name`) VALUES
('PS00000000000001', 'SP00000000000001', 'Regular'),
('PS00000000000002', 'SP00000000000002', 'GoSend'),
('PS00000000000003', 'SP00000000000002', 'Instant Courrier'),
('PS00000000000004', 'SP00000000000003', 'Regular'),
('PS00000000000005', 'SP00000000000003', 'YES'),
('PS00000000000006', 'SP00000000000004', 'Regular'),
('PS00000000000007', 'SP00000000000004', 'Over Night Service'),
('PS00000000000008', 'SP00000000000005', 'Regular'),
('PS00000000000009', 'SP00000000000006', 'Regular'),
('PS00000000000010', 'SP00000000000007', 'Parcel'),
('PS00000000000011', 'SP00000000000008', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `msroaster`
--

CREATE TABLE `msroaster` (
  `roaster_id` char(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `web` varchar(50) DEFAULT NULL,
  `ig` varchar(50) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `tw` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msroaster`
--

INSERT INTO `msroaster` (`roaster_id`, `name`, `email`, `phone`, `web`, `ig`, `fb`, `tw`) VALUES
('RS00000000000001', 'Tobis', 'johndoe@mail.com', '08121122987', 'www.tobis.com', 'TBU', 'TBU', 'TBU'),
('RS00000000000002', 'Worcas', 'janedoe@mail.com', '08121122987', 'www.worcas.com', 'TBU', 'TBU', 'TBU');

-- --------------------------------------------------------

--
-- Table structure for table `msroasteraddress`
--

CREATE TABLE `msroasteraddress` (
  `address_id` char(16) NOT NULL,
  `roaster_id` char(16) NOT NULL,
  `description` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msroastercoffee`
--

CREATE TABLE `msroastercoffee` (
  `roaster_id` char(16) NOT NULL,
  `coffee_id` char(16) NOT NULL,
  `roast_date` date NOT NULL,
  `amount_in_kg` float NOT NULL,
  `roast_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msroastercoffee`
--

INSERT INTO `msroastercoffee` (`roaster_id`, `coffee_id`, `roast_date`, `amount_in_kg`, `roast_status`) VALUES
('RS00000000000001', 'CF00000000000001', '2017-07-15', 3, 'TBD'),
('RS00000000000001', 'CF00000000000002', '2017-07-01', 5, 'TBD'),
('RS00000000000002', 'CF00000000000003', '2017-06-17', 4, 'TBD');

-- --------------------------------------------------------

--
-- Table structure for table `msshipmentprovider`
--

CREATE TABLE `msshipmentprovider` (
  `provider_id` char(16) NOT NULL,
  `provider_name` varchar(25) NOT NULL,
  `customer_service` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msshipmentprovider`
--

INSERT INTO `msshipmentprovider` (`provider_id`, `provider_name`, `customer_service`) VALUES
('SP00000000000001', 'PorterID', 'TBU'),
('SP00000000000002', 'Gojek', 'TBU'),
('SP00000000000003', 'JNE', 'TBU'),
('SP00000000000004', 'TIKI', 'TBU'),
('SP00000000000005', 'Ninja Xpress', 'TBU'),
('SP00000000000006', 'SiCepat', 'TBU'),
('SP00000000000007', 'Grab', 'TBU'),
('SP00000000000008', 'J&T Express', 'TBU');

-- --------------------------------------------------------

--
-- Table structure for table `msshipmentsubs`
--

CREATE TABLE `msshipmentsubs` (
  `shipment_id` char(16) NOT NULL,
  `roaster_id` char(16) NOT NULL,
  `coffee_id` char(16) NOT NULL,
  `shipment_date` date NOT NULL,
  `shipment_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msshipmentsubs`
--

INSERT INTO `msshipmentsubs` (`shipment_id`, `roaster_id`, `coffee_id`, `shipment_date`, `shipment_status`) VALUES
('SH00000000000001', 'RS00000000000001', 'CF00000000000001', '2017-06-18', 'Closed'),
('SH00000000000002', 'RS00000000000001', 'CF00000000000002', '2017-07-02', 'TBO'),
('SH00000000000003', 'RS00000000000001', 'CF00000000000001', '2017-07-16', 'TBO');

-- --------------------------------------------------------

--
-- Table structure for table `trlogin`
--

CREATE TABLE `trlogin` (
  `user_id` char(16) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trlogin`
--

INSERT INTO `trlogin` (`user_id`, `login_datetime`, `logout_datetime`) VALUES
('AM00000000000001', '2017-07-15 01:01:01', '2017-07-15 00:00:00'),
('AM00000000000002', '2017-07-15 01:01:01', '2017-07-15 00:00:00'),
('AM00000000000003', '2017-07-15 01:01:01', '2017-07-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trsubscriptiondetail`
--

CREATE TABLE `trsubscriptiondetail` (
  `subscription_id` char(16) NOT NULL,
  `shipment_id` char(16) NOT NULL,
  `service_id` char(16) NOT NULL,
  `refinement` varchar(25) NOT NULL,
  `receipt_number` varchar(100) NOT NULL,
  `shipment_tracking` varchar(100) NOT NULL,
  `shipping_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trsubscriptiondetail`
--

INSERT INTO `trsubscriptiondetail` (`subscription_id`, `shipment_id`, `service_id`, `refinement`, `receipt_number`, `shipment_tracking`, `shipping_cost`) VALUES
('SB00000000000001', 'SH00000000000001', 'PS00000000000001', 'Well Done', 'TBU', 'TBU', 0),
('SB00000000000001', 'SH00000000000002', 'PS00000000000001', 'Well Done', 'TBU', 'TBU', 0),
('SB00000000000002', 'SH00000000000001', 'PS00000000000002', 'Well Done', 'TBU', 'TBU', 0),
('SB00000000000002', 'SH00000000000002', 'PS00000000000002', 'Well Done', 'TBU', 'TBU', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trsubscriptionheader`
--

CREATE TABLE `trsubscriptionheader` (
  `subscription_id` char(16) NOT NULL,
  `customer_id` char(16) NOT NULL,
  `subscription_date` date NOT NULL,
  `qty_in_kg` float NOT NULL,
  `freq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trsubscriptionheader`
--

INSERT INTO `trsubscriptionheader` (`subscription_id`, `customer_id`, `subscription_date`, `qty_in_kg`, `freq`) VALUES
('SB00000000000001', 'CS00000000000001', '2017-06-15', 0.25, 2),
('SB00000000000002', 'CS00000000000002', '2017-06-18', 0.5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msaddress`
--
ALTER TABLE `msaddress`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `msadmin`
--
ALTER TABLE `msadmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `mscoffee`
--
ALTER TABLE `mscoffee`
  ADD PRIMARY KEY (`coffee_id`);

--
-- Indexes for table `mscustomer`
--
ALTER TABLE `mscustomer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mscustomeraddress`
--
ALTER TABLE `mscustomeraddress`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `mspayment`
--
ALTER TABLE `mspayment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `mspaymentsubscription`
--
ALTER TABLE `mspaymentsubscription`
  ADD PRIMARY KEY (`subscription_id`,`payment_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `msproviderservice`
--
ALTER TABLE `msproviderservice`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Indexes for table `msroaster`
--
ALTER TABLE `msroaster`
  ADD PRIMARY KEY (`roaster_id`);

--
-- Indexes for table `msroasteraddress`
--
ALTER TABLE `msroasteraddress`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `roaster_id` (`roaster_id`);

--
-- Indexes for table `msroastercoffee`
--
ALTER TABLE `msroastercoffee`
  ADD PRIMARY KEY (`roaster_id`,`coffee_id`),
  ADD KEY `coffee_id` (`coffee_id`);

--
-- Indexes for table `msshipmentprovider`
--
ALTER TABLE `msshipmentprovider`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `msshipmentsubs`
--
ALTER TABLE `msshipmentsubs`
  ADD PRIMARY KEY (`shipment_id`),
  ADD KEY `roaster_id` (`roaster_id`),
  ADD KEY `coffee_id` (`coffee_id`);

--
-- Indexes for table `trlogin`
--
ALTER TABLE `trlogin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `trsubscriptiondetail`
--
ALTER TABLE `trsubscriptiondetail`
  ADD KEY `subscription_id` (`subscription_id`),
  ADD KEY `shipment_id` (`shipment_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `trsubscriptionheader`
--
ALTER TABLE `trsubscriptionheader`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mscustomeraddress`
--
ALTER TABLE `mscustomeraddress`
  ADD CONSTRAINT `mscustomeraddress_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `msaddress` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mscustomeraddress_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `mscustomer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mspaymentsubscription`
--
ALTER TABLE `mspaymentsubscription`
  ADD CONSTRAINT `mspaymentsubscription_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `trsubscriptionheader` (`subscription_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mspaymentsubscription_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `mspayment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `msproviderservice`
--
ALTER TABLE `msproviderservice`
  ADD CONSTRAINT `msproviderservice_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `msshipmentprovider` (`provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msroasteraddress`
--
ALTER TABLE `msroasteraddress`
  ADD CONSTRAINT `msroasteraddress_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `msaddress` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `msroasteraddress_ibfk_2` FOREIGN KEY (`roaster_id`) REFERENCES `msroaster` (`roaster_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msroastercoffee`
--
ALTER TABLE `msroastercoffee`
  ADD CONSTRAINT `msroastercoffee_ibfk_1` FOREIGN KEY (`roaster_id`) REFERENCES `msroaster` (`roaster_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `msroastercoffee_ibfk_2` FOREIGN KEY (`coffee_id`) REFERENCES `mscoffee` (`coffee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msshipmentsubs`
--
ALTER TABLE `msshipmentsubs`
  ADD CONSTRAINT `msshipmentsubs_ibfk_1` FOREIGN KEY (`roaster_id`) REFERENCES `msroaster` (`roaster_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `msshipmentsubs_ibfk_2` FOREIGN KEY (`coffee_id`) REFERENCES `mscoffee` (`coffee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trsubscriptiondetail`
--
ALTER TABLE `trsubscriptiondetail`
  ADD CONSTRAINT `trsubscriptiondetail_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `trsubscriptionheader` (`subscription_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trsubscriptiondetail_ibfk_2` FOREIGN KEY (`shipment_id`) REFERENCES `msshipmentsubs` (`shipment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trsubscriptiondetail_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `msproviderservice` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trsubscriptionheader`
--
ALTER TABLE `trsubscriptionheader`
  ADD CONSTRAINT `trsubscriptionheader_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `mscustomer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
