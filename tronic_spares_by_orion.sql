-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 02:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tronic_spares_by_orion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(16, 'Optoisolator', 'Optoisolator', '2023-10-08 12:59:40'),
(18, 'MOSFET', 'Mosfet', '2023-11-28 03:35:35'),
(19, 'Resistors', 'Resistors', '2023-11-28 04:00:38'),
(20, 'Sensors', 'Sensors', '2023-11-28 04:34:26'),
(21, 'Rectifier', 'Rectifier', '2023-11-28 04:43:15'),
(22, 'Optocoupler', 'Optocoupler', '2023-11-28 05:15:46'),
(24, 'Controller', 'Step up/down Controller', '2023-11-28 05:35:08'),
(25, 'Battery Charger', 'Battery Charger', '2023-11-28 06:06:21'),
(26, 'Regulator', 'Regulator', '2023-11-28 06:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hi', 'hello'),
(2, 'hi', 'hi'),
(3, 'hello', 'hello'),
(6, 'Hello! I\'m looking for a new pair of running shoes.', 'Hi there! Sure thing, I\'d be happy to help you find the perfect pair. Do you have any specific brand or style in mind?'),
(7, 'I\'ve heard good things about XYZ brand. Do you carry their running shoes?', 'Yes, we do! We have a wide range of XYZ running shoes available. What\'s your preferred size?'),
(8, ' I\'m a size 9.', 'Great! We have several options in size 9. Are you looking for a specific color or any particular features, like extra cushioning or lightweight?'),
(9, 'I prefer something with good arch support and a breathable material. Color-wise, I\'m open to suggestions.', 'Got it! I recommend the XYZ Ultra Runners. They have excellent arch support and are made with a breathable mesh upper. They come in black, blue, and grey. Would you like to take a look at those?'),
(10, 'Yes, the Ultra Runners sound good. Can you tell me about the available colors?', 'Of course! The Ultra Runners are available in black, blue, and grey. The black ones have a sleek and versatile look, while the blue and grey options offer a bit of color variation. Which one catches your eye?'),
(11, ' I think I\'ll go with the grey pair. How much are they?', 'The grey Ultra Runners are currently on sale for $89.99. They\'re a great choice! Would you like to add them to your cart?'),
(12, 'Yes, please add them to my cart.', 'Alright! I\'ve added the grey Ultra Runners to your cart. Is there anything else you\'d like to browse or any questions you have?'),
(13, 'That\'s all for now. Thanks for your help!', 'You\'re welcome! If you have any more questions or need assistance in the future, don\'t hesitate to reach out. Enjoy your new shoes!'),
(14, 'Thank you, I will. Have a great day!', 'You too! Have a fantastic day and happy running!');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_contact_no` int(11) NOT NULL,
  `driver_vehicle_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `driver_name`, `driver_contact_no`, `driver_vehicle_no`, `address`) VALUES
(1, '652175d1706d6', 'Lahiru', 705432875, 'KN-7631', 'Wijaya osuhala,Rathna,Hangamuwa,Rathnapura'),
(3, '652175d1706d6', 'Ruwan', 705308262, 'KN-4312', 'Wijaya osuhala,Rathna,Hangamuwa,Rathnapura'),
(4, '6565c759b2e57', 'Ruwan', 705308262, 'KN-4312', '8/Egoda Uyana,Moratuwa');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `name`, `contact_no`, `vehicle_no`, `license_no`) VALUES
(2, 'Ruwan', 705308262, 'KN-4312', 'SL3234'),
(6, 'Malani Silva', 712345678, 'NB-5678', 'SL23456'),
(7, 'Suresh Fernando', 766789012, 'KD-7890', 'SL34567'),
(8, 'Anula de Silva', 705678901, 'CG-1234', 'SL45678'),
(9, 'Ranjith Kumarasinghe', 754321098, 'VY-5678', 'SL56789');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `product_name`, `product_image`, `user_name`, `feedback`, `rating`) VALUES
(9, 'MOC3021 Triac Driven Optoisolator', '65656885b09da.jpg', 'Yasith Perera', 'best', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(36) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_name`, `total`, `created_at`) VALUES
('652175d1706d6', 'ruwan', 2200.00, '2023-10-07 15:14:25'),
('652567e69e06f', 'ruwan', 56.00, '2023-10-10 15:04:06'),
('65256838955ad', 'ruwan', 256.00, '2023-10-10 15:05:28'),
('6525684be12db', 'ruwan', 56.00, '2023-10-10 15:05:47'),
('6544ff5f7fd68', 'ruwan', 2000.00, '2023-11-03 14:10:39'),
('6544ff8b43c7a', 'ruwan', 2000.00, '2023-11-03 14:11:23'),
('654500d289e5d', 'ruwan', 40000.00, '2023-11-03 14:16:50'),
('6545038553152', 'ruwan', 20000.00, '2023-11-03 14:28:21'),
('6565c759b2e57', 'Yasith Perera', 50.00, '2023-11-28 10:56:25'),
('6565c9088aa24', 'Yasith Perera', 450.00, '2023-11-28 11:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` varchar(36) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_name`, `quantity`, `subtotal`) VALUES
(5, '65256838955ad', 'ISL88731AHRZ SMBUS LEVEL 2 BATTERY CHARGER', 1, 56.00),
(6, '65256838955ad', '2-4 CELL LI+BATTERY SMBUS CHARGE CONTROLLER PACKAGE', 1, 200.00),
(7, '6525684be12db', 'ISL88731AHRZ SMBUS LEVEL 2 BATTERY CHARGER', 1, 56.00),
(9, '6544ff5f7fd68', '2-4 CELL LI+BATTERY SMBUS CHARGE CONTROLLER PACKAGE', 10, 2000.00),
(10, '6544ff8b43c7a', '2-4 CELL LI+BATTERY SMBUS CHARGE CONTROLLER PACKAGE', 10, 2000.00),
(11, '654500d289e5d', '2-4 CELL LI+BATTERY SMBUS CHARGE CONTROLLER PACKAGE', 200, 40000.00),
(12, '6545038553152', '2-4 CELL LI+BATTERY SMBUS CHARGE CONTROLLER PACKAGE', 100, 20000.00),
(13, '6565c759b2e57', 'Plastic-Encapsulate N-Channel , AO3400', 1, 50.00),
(14, '6565c9088aa24', 'Plastic-Encapsulate N-Channel , AO3400', 10, 450.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `item_no` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `datasheet` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `category`, `name`, `item_no`, `quantity`, `product_image`, `description`, `datasheet`, `price`) VALUES
(15, 0, 'MOSFET', 'Plastic-Encapsulate N-Channel , AO3400', 'I202300008', 10, '6565626ccd1db.jpg', 'Diode Type : Triode\r\nModel No : 𝐴𝑂3400 𝑆𝑂𝑇-23\r\nCurrent : 5𝐴\r\nVoltage : 30𝑉', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 45.00),
(16, 0, 'MOSFET', 'Plastic-Encapsulate N-Channel, AO3407 ', 'I202300008', 10, '65656427c6e46.jpg', 'Model No : 𝐴𝑂3407 𝑆𝑂𝑇-23\r\nDiode Type : 𝑇𝑟𝑖𝑜𝑑𝑒\r\nCurrent : 2.5~4.2𝐴\r\nVoltage : 30𝑉', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 100.00),
(17, 0, 'Resistors', '\"0402\" SMD Resistors', 'I202300010', 10, '656567eb32f8d.jpg', '10R	100R	1K	10K	100K\r\n12R	120R	1K2	12K	120K\r\n15R	150R	1K5	15K	150K\r\n20R	200R	2K	20K	200K\r\n22R	220R	2K2	22K	220K\r\n27R	270R	2K7	27K	270K\r\n30R	300R	3K	30K	300K\r\n33R	330R	3K3	33K	330K\r\n39R	390R	3K9	39K	390K\r\n47R	470R	4K7	47K	470K\r\n51R	510R	5K1	51K	510K\r\n62R	620R	6K2	62K	620K\r\n68R	680R	6K8	68K	680K\r\n75R	750R	7K5	75K	750K\r\n82R	820R	8K2	82K	820K\r\n91R	910R	9K1	91K	910K', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 10.00),
(18, 0, 'Optoisolator', 'MOC3021 Triac Driven Optoisolator', 'I202300011', 10, '65656885b09da.jpg', '𝘖𝘱𝘵𝘰-𝘪𝘴𝘰𝘭𝘢𝘵𝘰𝘳 𝘸𝘪𝘵𝘩 𝘡𝘦𝘳𝘰-𝘊𝘳𝘰𝘴𝘴𝘪𝘯𝘨 𝘛𝘳𝘪𝘢𝘤 𝘋𝘳𝘪𝘷𝘦𝘳\r\n𝘐𝘯𝘱𝘶𝘵 𝘓𝘌𝘋 𝘋𝘪𝘰𝘥𝘦 𝘍𝘰𝘳𝘸𝘢𝘳𝘥 𝘝𝘰𝘭𝘵𝘢𝘨𝘦: 1.15𝘝\r\n𝘓𝘌𝘋 𝘍𝘰𝘳𝘸𝘢𝘳𝘥 𝘓𝘢𝘵𝘤𝘩 𝘊𝘶𝘳𝘳𝘦𝘯𝘵: 15𝘮𝘈\r\n𝘛𝘙𝘐𝘈𝘊 𝘰𝘶𝘵𝘱𝘶𝘵 𝘵𝘦𝘳𝘮𝘪𝘯𝘢𝘭 𝘷𝘰𝘭𝘵𝘢𝘨𝘦: 400𝘝 (𝘮𝘢𝘹)\r\n\r\n 👉 𝘛𝘙𝘐𝘈𝘊 𝘱𝘦𝘢𝘬 𝘰𝘶𝘵𝘱𝘶𝘵 𝘤𝘶𝘳𝘳𝘦𝘯𝘵: 1𝘈\r\n\r\n 👉 𝘈𝘷𝘢𝘪𝘭𝘢𝘣𝘭𝘦 𝘢𝘴 6-𝘱𝘪𝘯 𝘗𝘋𝘐𝘗', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 98.00),
(19, 0, 'MOSFET', 'P105N3LL N-Channel MOSFET', 'I202300012', 10, '65656b38a45be.jpg', 'P105N3LL 30V 150A N-channel Power MOSFET', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 150.00),
(20, 0, 'MOSFET', 'P105N3LL N-Channel MOSFET', 'I202300013', 10, '65656bb567c68.jpg', '\r\nBT138-800E TRIAC', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 80.00),
(21, 0, 'MOSFET', 'P105N3LL N-Channel MOSFET', 'I202300014', 10, '65656c13a143b.jpg', 'LM393 Low Offset Voltage Dual Comparators SMD IC', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 80.00),
(22, 0, 'MOSFET', 'P105N3LL N-Channel MOSFET', 'I202300015', 10, '65656cb9168bf.jpg', '\r\nMIX2015/MIX2015A Audio Power OpAmp', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 600.00),
(23, 0, 'Sensors', 'AH49E Hall Effect Sensor', 'I202300015', 10, '65656e98cf020.jpg', 'AH49E SMD HALL EFFECT SENSOR', 'https://pdf1.alldatasheet.com/datasheet-pdf/view/608101/DIODES/AH49E.html', 600.00),
(24, 0, 'Rectifier', 'MB10F SMD bridge Rectifier', 'I202300017', 10, '65657176d4e6b.jpg', '\r\nMB10F SMD bridge Rectifier', 'https://pdf1.alldatasheet.com/datasheet-pdf/view/1202467/CHENDA/MB', 200.00),
(25, 0, 'MOSFET', 'UA741CN OP Amp.', 'I202300018', 10, '6565775881e88.jpg', 'UA741CN OP Amp IC', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_Obk', 50.00),
(26, 0, 'Optocoupler', 'PC817C Optocoupler', 'I202300018', 10, '65657b3fa8fcc.jpg', 'PC817C Optocoupler', 'https://pdf1.alldatasheet.com/datasheet-pdf/view/43376/SHARP/PC817C.html', 40.00),
(28, 0, 'Controller', '  2-4 Cell Li+ Battery SMBus Charge Controller Package', 'I202300020', 10, '65657ca5327e6.jpg', '𝟐-𝟒 𝐂𝐞𝐥𝐥 𝐋𝐢+ 𝐁𝐚𝐭𝐭𝐞𝐫𝐲 𝐒𝐌𝐁𝐮𝐬 𝐂𝐡𝐚𝐫𝐠𝐞 𝐂𝐨𝐧𝐭𝐫𝐨𝐥𝐥𝐞𝐫 𝐏𝐚𝐜𝐤𝐚𝐠', 'http://www.datasheetmeta.com/pdf.php?q=BQ737', 750.00),
(29, 0, 'Controller', 'Dual-Synchronous, Step-Down Controller', 'I202300020', 10, '65657cffc0153.jpg', '𝐃𝐮𝐚𝐥-𝐒𝐲𝐧𝐜𝐡𝐫𝐨𝐧𝐨𝐮𝐬, 𝐒𝐭𝐞𝐩-𝐃𝐨𝐰𝐧 𝐂𝐨𝐧𝐭𝐫𝐨𝐥𝐥𝐞𝐫', 'https://datasheetspdf.com/pdf-file/1440421/etcTI/TPS51123/1', 750.00),
(31, 0, 'Controller', 'Memory Power Solution Synchronous Buck Controller, 2-A LDO, with Buffered Reference. ', 'I202300023', 10, '656580a24b18f.jpg', 'Complete DDR2, DDR3, DDR3L, and LPDDR3 Memory Power Solution Synchronous Buck controller', 'https://pdf1.alldatasheet.com/datasheet-pdf/view/489752/TI/TPS51716.html', 750.00),
(32, 0, 'Controller', 'CPU/GPU controller', 'I202300024', 10, '65658103ac670.jpg', 'NCP6131: IMVP7 1-, 2-, 3-Phase CPU Controller + 1-Phase GPU Controller', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 800.00),
(33, 0, 'Controller', 'Multi-Output Controller', 'I202300025', 10, '656582537274d.jpg', 'Multi-Output Controller with Integrated MOSFET Drivers for AMD SVI Capable Mobile CPUs. ', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 750.00),
(34, 0, 'Controller', ' SY8206DQNC SY8206D SY8206', 'I202300026', 10, '65658323c6f2c.jpg', '\r\n(NF5LA NF4UF NF2ZZ NF3NA NF2AZ NF03A)', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 750.00),
(35, 0, 'Battery Charger', 'SMBus Level 2 Battery Charger.', 'I202300027', 10, '656583a934198.jpg', 'ISL88731AHRZ\r\n\r\n\r\nSMBus Level 2 Battery Charger', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 750.00),
(36, 0, 'Controller', '1-4 Cell Li+ Battery SMBus Charge Controller', 'I202300028', 10, '65658464584e8.jpg', 'BQ24738\r\n\r\n\r\n1-4 Cell Li+ Battery SMBus Charge Controller.\r\n', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 750.00),
(37, 0, 'Regulator', 'Synchronous Step Down Regulator', 'I202300029', 10, '656584e2ce44c.jpg', 'SY8208BQNC\r\n\r\n\r\nSynchronous Step Down Regulator', 'https://docs.google.com/spreadsheets/d/18A62KM3Lq9XHX85F-UN6TuOEss3DCH7zcB_ObkxOoSA/edit#gid=0', 750.00);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `order_id`, `status`) VALUES
(11, '652175d1706d6', 'Processing...'),
(12, '652175d1706d6', 'Processing...'),
(13, '652175d1706d6', 'Delivered'),
(14, '652175d1706d6', 'Delivered'),
(15, '652175d1706d6', 'Delivered'),
(16, '65256838955ad', 'Delivered'),
(17, '65256838955ad', 'Delivered'),
(18, '6565c759b2e57', 'Processing...'),
(19, '6565c759b2e57', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_contact_no` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_contact_no`, `user_address`, `user_email`, `user_password`) VALUES
(8, 'Chaminda Perera', 777123456, '123, Colombo Road, Colombo', 'chaminda@example.com', 'Secure123!'),
(9, 'Malani Silva', 712345678, '456, Galle Street, Galle', 'malani@example.com', 'Str0ngP@ss'),
(10, ' Suresh Fernando', 766789012, '789, Kandy Avenue, Kandy', 'suresh@example.com', 'SafePass456'),
(11, 'Anula de Silva', 705678901, '101, Matara Lane, Matara', 'anula@example.com', 'Pr0tectMe!'),
(12, ' Ranjith Kumarasinghe', 754321098, ' 202, Negombo Street, Negombo', 'ranjith@example.com', 'S3cur3Now'),
(13, 'ruwan', 705308262, 'rathn hangamuwa,rathnapura', 'ruwan@gmail.com', '1234'),
(14, 'Yasith Perera', 710333638, '8/Egoda Uyana,Moratuwa', 'yasithperera@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
