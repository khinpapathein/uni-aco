-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Mar 24, 2023 at 03:36 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosteldb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agentname` (IN `id` INT)  NO SQL
SELECT * from agent where agent_id=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `agent_status` varchar(10) NOT NULL,
  `photo` mediumblob NOT NULL,
  `phone` varchar(11) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `name`, `email`, `password`, `address`, `agent_status`, `photo`, `phone`, `description`) VALUES
(11, 'Hsu Myat Wai Wai Khin', 'hsumyat@gmail.com', '1111', 'Warso Road, Pathein', 'Active', 0x6873756d7961742e6a706567, '09784354312', 'Accurate and fast understanding for those who want to rent. In addition, real estate ownership contracts, leases, and tax related matters can also be discussed.'),
(20, 'May Moe', 'maymoe@gmail.com', '123123', 'Min Gyi Road, Pathein', 'Active', 0x6d61796d6f652e6a706567, '09878435434', 'I have posted the accommodation with price on this website to make it easier for students to find accommodation.\r\nMore complete rental listings. You can also contact us for renting.'),
(21, 'Su Shwe Zin', 'sushwe@gmail.com', '2211', 'Main Road, Pathein', 'Active', 0x632e6a706567, '09665342356', 'I have posted the accommodation with price on this website to make it easier for students to find accommodation.'),
(23, 'Su Myat Thiri', 'sumyat@gmail.com', '1020', 'Kanar Road, Pathein', 'Active', 0x73756d7961742e6a7067, '09776778900', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(24, 'Aye Chan Moe', 'ayemoe@gmail.com', '3434', 'main Road, Pathein', 'Active', 0x6179656d6f652e6a706567, '09645567781', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(25, 'Su Wai Hlaing', 'suwai@gmail.com', '2020', 'Shwe Wutt Hmone Road, Pathein', 'Active', 0x73757761692e6a706567, '09776543211', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(26, 'Chu Eain Si', 'chu@gmail.com', '1001', 'Main Road, Pathein', 'Active', 0x6368752e6a7067, '09667554564', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(27, 'papa', 'papa@gmail.com', '123', 'fghgj', 'Delete', 0x612e6a7067, '09123456789', 'gfhjg'),
(28, 'aa', 'aa@gmail.com', '111', 'sdsf', 'Delete', 0x612e6a7067, '09778765435', 'khffhsg'),
(29, 'cc', 'papa@gmail.com', '111111', 'bjhj', 'Delete', 0x612e6a7067, '09876543211', 'jkjk'),
(30, 'Hein Arkar', 'maymoe@gmail.com', '2222', 'aaaa', 'Delete', 0x612e6a7067, '09234567890', 'ssssssss'),
(31, 'Ei Phyu Khaing', 'aa@gmail.com', '222', 'fsfa', 'Delete', 0x612e6a7067, '09876543211', 'dsdgsdf'),
(32, 'Ei Phyu Khaing', 'eiphyu@gmail.com', '222', 'Pathein', 'Active', 0x6569706879752e6a706567, '09876543211', 'Accurate and fast understanding for those who want to rent. In addition, real estate ownership contracts, leases, and tax related matters can also be discussed.'),
(33, 'Aye Aye', 'aye@gmail.com', '120120', 'main Road, Pathein', 'Active', 0x612e6a7067, '09665626464', 'I have posted the accommodation with price on this website to make it easier for students to find accommodation.\r\nMore complete rental listings. You can also contact us for renting.');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `location` varchar(300) NOT NULL,
  `status` varchar(30) NOT NULL,
  `area` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `floor` varchar(30) NOT NULL,
  `photo` mediumblob NOT NULL,
  `property_status` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `title`, `location`, `status`, `area`, `price`, `agent_id`, `floor`, `photo`, `property_status`, `description`) VALUES
(23, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 35000, 11, '2', 0x312e6a7067, 'R', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pathein Computer University.\r\nSo, it is most convenient for Computer University Student.\r\nWe have also provided services to make the price convenient for you.'),
(24, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 35000, 11, '2', 0x31332e6a7067, 'R', 'It is also close to Pathein Computer University.\r\nSO, it is most convenient for Computer University Student.\r\nIt\'s right in front of the university, so you can go about ten miniutes before class and the price are convenient for you.\r\n\r\n'),
(25, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 35000, 11, '3', 0x31332e6a7067, 'R', 'It is also close to Pathein Computer University.\r\nSO, it is most convenient for Computer University Student.\r\nIt\'s right in front of the university, so you can go about ten miniutes before class and the price are convenient for you.'),
(26, 'MIn Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 35000, 11, '3', 0x31332e6a7067, 'R', 'It is also close to Pathein Computer University.\r\nSO, it is most convenient for Computer University Student.\r\nIt\'s right in front of the university, so you can go about ten miniutes before class and the price are convenient for you.'),
(28, 'CM1', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 35000, 13, '2', 0x372e6a7067, 'D', 'fsjdasd'),
(29, 'Myint Myat Thu', 'KanNi Village, Ngwe Saung Street, Pathein', 'Girl', '10x10', 40000, 20, '3', 0x31302e6a7067, 'R', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pyay University.\r\nSO, it is most convenient for Pyay uni Student.\r\nWe have also provided services to make the price convenient for you.'),
(30, 'Khit Thit', 'KanNi Village, Chaung Thar Street, Pathein', 'Girl', '10x10', 35000, 21, '2', 0x322e77656270, 'R', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pyay University.\r\nSO, it is most convenient for Pyay uni Student.\r\nWe have also provided services to make the price convenient for you.'),
(31, 'Pann ThaKhin', 'KanNi Village, Chaung Thar Street, Pathein', 'Boy', '10x10', 40000, 21, '2', 0x31302e6a7067, 'A', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pyay University.\r\nSO, it is most convenient for Pyay uni Student.\r\nWe have also provided services to make the price convenient for you.'),
(32, 'Myint Myat Thu', 'KanNi Village, Chaung Thar Street, Pathein', 'Girl', '10x10', 35000, 21, '3', 0x322e77656270, 'R', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pyay University.\r\nSO, it is most convenient for Pyay uni Student.\r\nWe have also provided services to make the price convenient for you.'),
(33, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 40000, 11, '4', 0x31332e6a7067, 'R', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pyay University.\r\nSO, it is most convenient for Pyay uni Student.\r\nWe have also provided services to make the price convenient for you.'),
(34, 'Myint Myat Thu', 'KanNi Village, Chaung Thar Street, Pathein', 'Girl', '10x10', 40000, 20, '2', 0x322e77656270, 'A', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pyay University.\r\nSO, it is most convenient for Pyay uni Student.\r\nWe have also provided services to make the price convenient for you.'),
(35, 'Khit Thit', 'KanNi Village, Chaung Thar Street, Pathein', 'Girl', '10x10', 350000, 20, '4', 0x382e6a7067, 'R', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pyay University.\r\nSO, it is most convenient for Pyay uni Student.\r\nWe have also provided services to make the price convenient for you.'),
(36, 'SU', 'main road, Pathein', 'Girl', '10x10', 40000, 22, '2', 0x352e6a7067, 'D', 'We work hard to ensure that our website is easy to navigate, and we provide you with all the information you need to make an informed decision about your accommodation.'),
(37, 'Akari', 'Chaung Thar Street, Pathein', 'Girl', '12x12', 50000, 23, '2', 0x31352e77656270, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(38, 'Ninty Nine', 'mountain Road, Pathein', 'Girl', '10x10', 60000, 24, '3', 0x352e6a7067, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(39, 'Ingyin Myaing', 'Shwe Wutt Hmone Road, Pathein', 'Girl', '12x12', 60000, 25, '2', 0x312e6a7067, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(40, 'Ninty Nine', 'mountain Road, Pathein', 'Girl', '10x10', 60000, 25, '3', 0x352e6a7067, 'D', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(41, 'Akari', 'Chaung Thar Street, Pathein', 'Girl', '10x10', 40000, 23, '1', 0x31352e77656270, 'A', 'Accurate and fast understanding for those who want to rent. In addition, real estate ownership contracts, leases, and tax related matters can also be discussed.'),
(42, 'Ninty Nine', 'mountain Road, Pathein', 'Girl', '12x12', 60000, 24, '3', 0x352e6a7067, 'A', 'Accurate and fast understanding for those who want to rent. In addition, real estate ownership contracts, leases, and tax related matters can also be discussed.'),
(43, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 40000, 11, '2', 0x31332e6a7067, 'R', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(44, 'Nyarna', 'main road, Pathein', 'Boy', '10x10', 50000, 26, '2', 0x31322e6a7067, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(45, 'Ingyin Myaing', 'Shwe Wutt Hmone Road, Pathein', 'Girl', '10x10', 60000, 25, '2', 0x312e6a7067, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation for your next trip'),
(46, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '8x8', 40000, 11, '1', 0x372e6a7067, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation for your next trip'),
(47, 'Nyarna', 'main road, Pathein', 'Boy', '8x8', 50000, 26, '2', 0x31322e6a7067, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(48, 'Pann Thakhin', 'KanNi Village, Chaung Thar Street, Pathein', 'Boy', '10x10', 40000, 21, '1', 0x31302e6a7067, 'A', 'Welcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodation'),
(49, 'Myint Myat Thu', 'KanNi Village, Chaung Thar Street, Pathein', 'Girl', '10x10', 40000, 20, '3', 0x322e77656270, 'A', 'mmodation for your next trip! We have created a user-friendly platform that enables you to search for and book the perfect accomm'),
(50, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '12x12', 40000, 11, '2', 0x372e6a7067, 'A', 'mmodation for your next trip! We have created a user-friendly platform that enables you to search for and book the perfect accomm'),
(51, 'Akari', 'Chaung Thar Street, Pathein', 'Girl', '10x10', 40000, 23, '1', 0x31352e77656270, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(52, 'Ingyin Myaing', 'Shwe Wutt Hmone Road, Pathein', 'Girl', '12x12', 60000, 25, '2', 0x312e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(53, 'Pann Thakhin', 'KanNi Village, Chaung Thar Street, Pathein', 'Boy', '10x10', 40000, 21, '1', 0x31302e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(54, 'Nyarna', 'main road, Pathein', 'Boy', '10x10', 50000, 26, '1', 0x31322e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(55, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 40000, 11, '3', 0x31332e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(56, 'Ninty Nine', 'mountain Road, Pathein', 'Girl', '12x12', 60000, 24, '2', 0x352e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(57, 'Ninty Nine', 'mountain Road, Pathein', 'Girl', '12x12', 60000, 24, '2', 0x332e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(58, 'Nyarna', 'main road, Pathein', 'Boy', '10x10', 50000, 26, '2', 0x31322e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(59, 'Pann ThaKhin', 'KanNi Village, Chaung Thar Street, Pathein', 'Boy', '10x10', 40000, 21, '2', 0x31302e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(60, 'Ingyin Myaing', 'Shwe Wutt Hmone Road, Pathein', 'Girl', '12x12', 60000, 25, '3', 0x382e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(61, 'Ingyin Myaing', 'Shwe Wutt Hmone Road, Pathein', 'Girl', '10x10', 60000, 25, '2', 0x312e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(62, 'Akari', 'Chaung Thar Street, Pathein', 'Girl', '12x12', 40000, 23, '2', 0x31352e77656270, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(63, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '12x12', 40000, 11, '4', 0x372e6a7067, 'R', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(64, 'Ninty Nine', 'mountain Road, Pathein', 'Girl', '10x10', 60000, 24, '1', 0x352e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(65, 'Nyarna', 'main road, Pathein', 'Boy', '10x10', 50000, 26, '1', 0x31322e6a7067, 'P', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(66, 'Pann ThaKhin', 'KanNi Village, Chaung Thar Street, Pathein', 'Boy', '10x10', 40000, 21, '1', 0x31302e6a7067, 'A', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(67, 'p1', 'Pathein', 'Boy', '10x10', 50000, 27, '2', 0x31312e6a7067, 'D', 'vhvbjnj'),
(68, 'aa', 'Yangon', 'Boy', '12x12', 35000, 11, '2', 0x4c6170746f702053656c6c696e672053797374656d2e70707478, 'D', 'asas'),
(69, 'aa', 'Pathein', 'Boy', '11x12', 232, 11, '3', 0x47726f7570352e70707478, 'D', '35000'),
(70, 'aa', 'Pathein', 'Boy', '10x10', 4545, 11, '2', 0x7175697a7a332e706466, 'D', 'fgdf'),
(71, 'cc', 'Pathein', 'Boy', '12x12', 35000, 11, '3', 0x37663732353764612d73656c6c2d6d792d6c6170746f702d72656d6f766562672d707265766965772e706e67, 'D', 'ssds'),
(72, 'aaqq', 'Yangon', 'Girl', '12x12', 34444, 11, '2', 0x617375732d7a656e626f6f6b2d72656d6f766562672d707265766965772e706e67, 'D', 'wfasd'),
(73, 'aaa', 'ffsg', 'Boy', 'dsfsf', 20000, 11, '4', 0x31322e6a7067, 'D', 'sadfisougi'),
(74, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '10x10', 70000, 11, '2', 0x31312e6a7067, 'P', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(75, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '12x12', 45000, 11, '2', 0x31332e6a7067, 'P', 'elcome to our Searching Accommodation System, where we make it easy and convenient for you to find the perfect accommodatio'),
(76, 'aa', 'Pathein', 'Boy', '10x10', 222, 11, '4', 0x31342e6a7067, 'R', 'sdfasa'),
(77, 'aa', 'main road, Pathein', 'Boy', '10x10', 2333, 30, '3', 0x612e6a7067, 'D', 'ssss'),
(78, 'aa', 'Pathein', 'Boy', '10x10', 35000, 31, '2', 0x352e6a7067, 'D', 'sfadsf'),
(79, 'AAA', 'main road, Pathein', 'Girl', '12x12', 50000, 32, '3', 0x352e6a7067, 'P', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pathein Computer University.\r\nSo, it is most convenient for Computer University Student.\r\nWe have also provided services to make the price convenient for you.'),
(80, 'Min Than Lwin', 'KanNi Village, Ngwe Saung Street, Pathein', 'Boy', '12x12', 40000, 11, '2', 0x31332e6a7067, 'P', 'The room in the dormitory is large and you can enjoy the beauty of nature. It is also close to Pathein Computer University.\r\nSo, it is most convenient for Computer University Student.\r\nWe have also provided services to make the price convenient for you.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
