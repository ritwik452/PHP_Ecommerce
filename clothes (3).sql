-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 07:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `apwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `aemail`, `apwd`) VALUES
(5, 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `br_id` int(11) NOT NULL,
  `br_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`br_id`, `br_name`, `status`) VALUES
(1, 'polo', '0'),
(2, 'xolo1', '0'),
(3, 'gucchi', '0'),
(4, 'adidus', '0'),
(5, 'polo', '0'),
(6, 'adidus', '0'),
(7, 'marco', '0'),
(8, 'Apple', '0'),
(9, 'Nike', '1'),
(10, 'Adidas', '1'),
(11, 'Puma', '1'),
(12, 'Skechers', '1'),
(13, 'Deckers Brands', '1'),
(14, 'VF Corporation', '1'),
(15, 'Crocs', '1'),
(16, 'ABC-Mart', '1'),
(17, 'Apple', '1'),
(18, 'Samsung', '1'),
(19, 'OnePlus', '1'),
(20, 'Vivo', '1'),
(21, 'Oppo', '1'),
(22, 'Realme', '1'),
(23, 'LENOVO', '1'),
(24, 'NOKIA', '1'),
(25, 'MOTOROLA', '1'),
(26, 'Sarita Green Georgette Saree', '1'),
(27, 'Pratibha Sarees', '1'),
(28, 'Libas', '1'),
(29, 'Titan', '1'),
(30, 'Fastrack', '1'),
(31, 'sonata', '1'),
(32, 'sonata', '1'),
(33, 'Fossil', '1'),
(34, 'Richlook', '1'),
(35, 'Richlook', '1'),
(36, 'Red Tape', '1'),
(37, ' Peter England', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `c_img` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `c_img`, `status`) VALUES
(24, 'Men Shirt', 'cat_img/1733636909.2134_shirt1.webp', '0'),
(25, 'Women Shoes', 'cat_img/1733589928.1366_images.jpg', '0'),
(26, 'women Sharee', 'cat_img/1733589952.911_sharee3.jpg', '0'),
(27, 'mens shoes', 'cat_img/1733589991.5879_OFFICE.jpg', '0'),
(28, ' Watch', 'cat_img/1733590031.953_watch.jpg', '0'),
(29, 'Shws', 'cat_img/1733596938.8346_download.jpg', '0'),
(30, 'phones', 'cat_img/1734246006.1877_apple 1.jpg', '0'),
(31, 'Shoes', 'cat_img/1734936028.3281_shoes_c.jpg', '1'),
(32, 'Smart Phones', 'cat_img/1734936271.2991_phones_c.jpg', '1'),
(33, 'Sharee', 'cat_img/1735403190.0354_sharee_c.jpg', '1'),
(34, 'Watch', 'cat_img/1735406458.9948_watch_c.jpg', '1'),
(35, 'Shirt', 'cat_img/1735407656.4201_sht_c.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `c_fname` varchar(255) NOT NULL,
  `c_lname` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_pwd` varchar(255) NOT NULL,
  `c_mobile` varchar(15) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `c_fname`, `c_lname`, `c_email`, `c_pwd`, `c_mobile`, `status`) VALUES
(1, 'RITWIK', 'MANDAL', 'name@gmail.com', 'r@1234', '9775674623', '1'),
(3, 'Nila', 'das', 'nil@gmail.com', '123456', '8972236674', '1');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_id` int(11) NOT NULL,
  `i_title` varchar(255) NOT NULL,
  `i_price` varchar(255) NOT NULL,
  `i_s_desc` varchar(255) NOT NULL,
  `i_desc` tinytext NOT NULL,
  `i_img` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `i_title`, `i_price`, `i_s_desc`, `i_desc`, `i_img`, `cat_id`, `br_id`, `status`) VALUES
(1, 'shirt', '400', 'agsgshjdjdkdeggfhjekjke', 'shrt', 'item_img/1730640332.0515_shirt3.webp', 1, 3, '1'),
(2, 'shirt', '400', 'gjgjjtddd', 'fyfyfyuf', 'item_img/1733059689.8334_shirt1.webp', 2, 2, '1'),
(3, 'pant', '879', 'hfyjkggkukgusesrsgr', 'srrdtdyyyyyyyyyyyyyyyyyy', 'item_img/1733059740.6591_Shirt.webp', 1, 1, '1'),
(4, 'shirt', '400', 'vgvvvvvvvvvv', 'fxfxxfx', 'item_img/1733158775.448_Shirt.webp', 7, 2, '1'),
(5, 'vd', '879', 'hhhhhhhhhhhhhklhlk', 'dsafsafsdfsfdfsd', 'item_img/1733159164.6874_photo.jpg', 10, 7, '1'),
(6, 'pant', '577', 'fsgdggdgdg', 'fdsrggggggggggggg', 'item_img/1733159203.9604_shirt2.webp', 13, 7, '1'),
(7, 'shirt', '400', 'gffffffh', 'hggggggf', 'item_img/1733162864.2978_shirt2.webp', 15, 7, '1'),
(14, 'iPhone 16 Pro Max', '144900', 'Overall, the iPhone 16 Pro combines advanced hardware and software features, making it a compelling choice for users seeking a high-performance smartphone with cutting-edge capabilities.', 'The iPhone 16 Pro, launched in September 2024, features a 6.3-inch Super Retina XDR OLED display, the powerful A18 Pro chip, and an upgraded camera system with a 48MP main sensor and 5x optical zoom. It offers Wi-Fi 7, enhanced durability with a titanium ', 'item_img/1734937538.6455_iphone 16 pro_c.jpg', 32, 17, '1'),
(17, 'Vivo T2 Pro 5g', '25000', 'If you had a different model in mind or require more detailed information, please provide additional details or clarify your request.', 'Launched in September 2020. This phones  is good photos and smooth wark.', 'item_img/1734963224.4002_vivo_img.jpg', 32, 20, '1'),
(18, 'Samsung Galaxy S24 Ultra', '131999', 'The Samsung Galaxy S24 Ultra, released in January 2024, is a flagship smartphone that combines cutting-edge technology with advanced AI capabilities. ', 'Overall, the Samsung Galaxy S24 Ultra stands out as a premium smartphone, offering a blend of powerful hardware, innovative features, and AI-driven enhancements.', 'item_img/1734967222.9399_samsung_c.jpg', 32, 18, '1'),
(19, 'OnePlus 12 Pro', '62743', 'OnePlus, founded in December 2013 by Pete Lau and Carl Pei, is a Chinese consumer electronics manufacturer headquartered in Shenzhen, Guangdong. The company is renowned for producing high-performance smartphones, audio devices, and accessories that offer ', 'OnePlus continues to expand its product lineup, maintaining its commitment to delivering flagship experiences with smooth performance, quality software, and expert craftsmanship.', 'item_img/1734968046.1322_oneplus_c.jpg', 32, 19, '1'),
(20, 'Nike G.T Jump Shoes', '6000', 'Built for speed and distance, the Nike Pegasus Turbo Next offers a lightweight, energy return and a upper for snug support', ' while the dual-density foam sole enhances cushioning.', 'item_img/1735315472.2853_sh_c1.png', 31, 9, '1'),
(21, 'Nike SB Dunk Low', '4000', 'A streetwear icon, the Nike SB Dunk Low blends skate-ready performance with bold style. Its padded tongue and Zoom Air unit provide cushioning', ' A versatile choice for skate parks or everyday outfits', 'item_img/1735315967.6541_sh_c.png', 31, 9, '1'),
(22, 'Libas', '7000', 'Libas Sarees is a prominent name among saree brands in India, known for its fashionable and affordable collections', 'Libas Sarees combines stylish designs with quality fabrics, ensuring that their sarees are both comfortable and elegant', 'item_img/1735403439.8102_sharee4.jpg', 33, 28, '1'),
(23, 'Fabindia', '4000', 'Fabindia Sarees are known for their elegant ', 'Fabindia elegant sarees are a favourite among', 'item_img/1735404604.0166_sharee2.jpg', 33, 27, '1'),
(24, 'Sonata', '4000', ' With its sophisticated style and comfortable fit, this watch is a fantastic accessory for everyday wear.', 'This Sonata watch features a brass embellished dial paired with genuine leather straps', 'item_img/1735406544.778_watch.jpg', 34, 31, '1'),
(25, 'Titan', '9000', 'This watch features a brass embellished dial that adds an elegant flair', 'making it a perfect choice for evening events. The stainless steel straps provide durability and a polished look', 'item_img/1735406973.6405_watch1.jpg', 34, 29, '1'),
(26, ' Peter England Shirt', '7000', 'Back in the era of the Boer war, Peter England was born in 1889, in Londonderry, Ireland. It provided fine khaki trousers', 'soldiers of Great Britain. After serving so many British soldiers, Peter England paved its way in Indian markets around a century later that is in ', 'item_img/1735407862.7815_shirt3.webp', 35, 37, '1'),
(27, 'Richlook Shirts', '5500', 'Richlook has a great variety and specialization of men apparel and blends elegance with current trends', 'they don not have time to rest so they need most of the comfort to be served in their clothes. And for this Richlook is known', 'item_img/1735408131.4337_shirt2.webp', 35, 34, '1');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `o_price` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
