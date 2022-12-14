-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 10:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuevoinf_janavilla1`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `about_id` int(10) NOT NULL,
  `about_title` varchar(80) NOT NULL,
  `about_longdesc` text NOT NULL,
  `about_shortdesc` text NOT NULL,
  `about_title_arab` varchar(80) NOT NULL,
  `about_shortdesc_arab` text NOT NULL,
  `about_longdesc_arab` text NOT NULL,
  `about_pic` text NOT NULL,
  `about_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`about_id`, `about_title`, `about_longdesc`, `about_shortdesc`, `about_title_arab`, `about_shortdesc_arab`, `about_longdesc_arab`, `about_pic`, `about_date`) VALUES
(1, 'About Janavilla', 'Our technical expertise and over 30 years of experience, combined with technology &amp; workshop facilities enable us to provide complete turnkey solutions for hotels, palaces, private residences, commercial properties, public institutions and residential complexes. Founded in 1985, Janavilla is now one of the highly respected and significant names in the interiors and logistics business headquartered in Kuwait. As an organization, Our state-of-the-art fully integrated with manufacturing facilities, we embrace a totally seamless approach in providing design and supply solutions to our customers’ requirements.The facility has a capacity to plan, execute and manage large turnkey projects. Our world-class art design and engineering studio defines our expertise in handling complex and comprehensive prestigious projects. Quality has always been the motto of the Company. The Company is reckoned to provide interior decoration services comparable to the Transform the way people perceive quality. Janavilla has steadily grown and expanded throughout Middle East, Europe, Africa and Asia. Over the years, we have successfully completed over countless number of interior turnkey solutions projects in collaboration between architects, designers and high skilled technicians to ensure excellent finish and decor. The knowledge and experience developed over these years gave us the advantage to provide a unique service that is specially tailored to meet clients’ requirements and expectations.', '<p>This how the journey was<br></p>', 'arabic title', 'arabic short desc', 'arabic long description ..dfsdfdfdfsdfsdfdfsdfsfsdfsdfsdfdfsdfdsfdfsdfsdfsdfsdfsdfsdfsdfsdf', '6d5722dc9a9b77ebf20beac4f78dc9f6.docx', '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agencies_id` int(10) NOT NULL,
  `agencies_name` varchar(80) NOT NULL,
  `agencies_desc` text NOT NULL,
  `agencies_name_arab` varchar(90) NOT NULL,
  `agencies_desc_arab` text NOT NULL,
  `agencies_file` text NOT NULL,
  `agencies_logo` text NOT NULL,
  `agencies_status` int(10) NOT NULL,
  `agencies_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agencies_id`, `agencies_name`, `agencies_desc`, `agencies_name_arab`, `agencies_desc_arab`, `agencies_file`, `agencies_logo`, `agencies_status`, `agencies_date`) VALUES
(2, 'Celmo Mobiliya', '<p>test description</p>', 'asdsasd', '<p>test description arab<br></p>', 'debe2f90f20d3eff44eaf1828770771b.png', '', 1, '2020-03-31'),
(4, 'Galaxy Home Furniture', 'Since its inception, our company based on quality and trust aims to grow based on the principles of service quality and trust to grow with each passing day. Differences in the design and showing great care to be innovative Galaxy Home is moving towards becoming a wanted bi brand with quality and diversity.', '', '', '3a4963fb24724818cb3d6e65b3a31ec3.pdf', '', 1, '2020-03-17'),
(5, 'agecy new one', '<p>sdazsd</p>', 'asdsasd', '<p>zzc\\c\\zczczxcxzcxzc</p>', 'a4d59ca9f4443eebbaab26f835105297.pdf', '896f9c0d5b712b9b50e7428fa658c3c4.png', 1, '2020-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brands_id` int(10) NOT NULL,
  `brands_name` varchar(80) NOT NULL,
  `brands_userid` int(12) NOT NULL,
  `brands_pic` text NOT NULL,
  `brands_status` int(10) NOT NULL,
  `brands_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brands_id`, `brands_name`, `brands_userid`, `brands_pic`, `brands_status`, `brands_date`) VALUES
(1, 'Celmo', 0, '61fcfde8d5329b0bae1e596be101050e.jpg', 1, '2020-03-17'),
(2, 'brand3', 5, '80ee855c661277d235fb86e0a243e444.jpg', 1, '2020-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(80) NOT NULL,
  `category_submenu` varchar(80) NOT NULL,
  `category_desc` text NOT NULL,
  `category_name_arab` varchar(80) NOT NULL,
  `category_code` varchar(80) NOT NULL,
  `category_desc_arab` text NOT NULL,
  `category_status` int(10) NOT NULL,
  `category_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_submenu`, `category_desc`, `category_name_arab`, `category_code`, `category_desc_arab`, `category_status`, `category_date`) VALUES
(1, 'Chairs', '3', 'Chairs', 'chair arab', '', '', 1, '2020-03-18'),
(2, 'Tables', '3', 'Tables', 'table arab', '', '', 1, '2020-03-18'),
(5, 'Sofas', '4', 'Sofas', '', '', '', 1, '2020-03-17'),
(6, 'Sectionals', '4', 'Sectionals', '', '', '', 1, '2020-03-17'),
(7, 'Loveseats', '4', 'Loveseats', '', '', '', 1, '2020-03-17'),
(8, 'Bars', '4', 'Bars', '', '', '', 1, '2020-03-17'),
(9, 'Chaises', '4', 'Chaises', '', '', '', 1, '2020-03-17'),
(10, 'Desks', '4', 'Desks', '', '', '', 1, '2020-03-17'),
(11, 'Entertainment Centers', '4', 'Entertainment Centers', '', '', '', 1, '2020-03-17'),
(12, ' Chests and Dressers', '4', 'Chests and Dressers', '', '', '', 1, '2020-03-17'),
(13, 'Cabinets', '4', 'Cabinets', '', '', '', 1, '2020-03-17'),
(14, 'Bookcases', '4', 'Bookcases', '', '', '', 1, '2020-03-17'),
(15, 'Living Room Sets', '4', 'Living Room Sets', '', '', '', 1, '2020-03-17'),
(16, 'Mirrors', '4', 'Mirrors', '', '', '', 1, '2020-03-17'),
(17, 'Accessories', '4', 'Accessories', '', '', '', 1, '2020-03-17'),
(18, 'Settees', '4', 'Settees', '', '', '', 1, '2020-03-17'),
(19, 'Benches', '4', 'Benches', '', '', '', 1, '2020-03-17'),
(20, 'Ottomans', '4', 'Ottomans', '', '', '', 1, '2020-03-17'),
(21, 'Storage and Carts', '4', 'Storage and Carts', '', '', '', 1, '2020-03-17'),
(22, 'Stools', '4', 'Stools', '', '', '', 1, '2020-03-17'),
(23, 'Slipcovers', '4', 'Slipcovers', '', '', '', 1, '2020-03-17'),
(24, 'Sectionals', '8', 'Sectionals', '', '', '', 1, '2020-03-17'),
(25, 'Tables', '8', 'Tables', '', '', '', 1, '2020-03-17'),
(26, 'Chairs', '8', 'Chairs', '', '', '', 1, '2020-03-17'),
(27, 'Bakers Racks', '8', 'Bakers Racks', '', '', '', 1, '2020-03-17'),
(28, 'Bars', '8', 'Bars', '', '', '', 1, '2020-03-17'),
(29, 'Desks', '8', 'Desks', '', '', '', 1, '2020-03-17'),
(30, 'Entertainment Centers', '8', 'Entertainment Centers', '', '', '', 1, '2020-03-17'),
(31, 'Chests and Dressers', '8', 'Chests and Dressers', '', '', '', 1, '2020-03-17'),
(32, 'Cabinets', '8', 'Cabinets', '', '', '', 1, '2020-03-17'),
(33, 'Bookcases', '8', 'Bookcases', '', '', '', 1, '2020-03-17'),
(34, 'Benches', '8', 'Benches', '', '', '', 1, '2020-03-17'),
(35, 'Storage and Carts', '8', 'Storage and Carts', '', '', '', 1, '2020-03-17'),
(36, 'Stools', '8', 'Stools', '', '', '', 1, '2020-03-17'),
(37, 'Slipcovers', '8', 'Slipcovers', '', '', '', 1, '2020-03-17'),
(38, 'Kitchen Islands', '8', 'Kitchen Islands', '', '', '', 1, '2020-03-17'),
(39, 'Beds', '3', 'Beds', '', '', '', 1, '2020-03-18'),
(40, 'Chaises', '3', 'Chaises', '', '', '', 1, '2020-03-18'),
(41, 'Master Bedroom Sets', '3', 'Master Bedroom Sets', '', '', '', 1, '2020-03-18'),
(42, 'Youth Bedroom Sets', '3', 'Youth Bedroom Sets', '', '', '', 1, '2020-03-18'),
(43, 'Bedding', '3', 'Bedding', '', '', '', 1, '2020-03-18'),
(44, 'Desks', '3', 'Desks', '', '', '', 1, '2020-03-18'),
(45, 'Entertainment Centers', '3', 'Entertainment Centers', '', '', '', 1, '2020-03-18'),
(46, 'Chests and Dressers', '3', 'Chests and Dressers', '', '', '', 1, '2020-03-18'),
(47, 'Cabinets', '3', 'Cabinets', '', '', '', 1, '2020-03-18'),
(48, 'Bookcases', '3', 'Bookcases', '', '', '', 1, '2020-03-18'),
(49, 'Lighting', '3', 'Lighting', '', '', '', 1, '2020-03-18'),
(50, 'Mirrors', '3', 'Mirrors', '', '', '', 1, '2020-03-18'),
(51, 'Accessories', '3', 'Accessories', '', '', '', 1, '2020-03-18'),
(52, 'Benches', '3', 'Benches', '', '', '', 1, '2020-03-18'),
(53, 'Ottomans', '3', 'Ottomans', '', '', '', 1, '2020-03-18'),
(54, 'Stools', '3', 'Stools', '', '', '', 1, '2020-03-18'),
(55, 'Tables', '5', 'Tables', '', '', '', 1, '2020-03-18'),
(56, 'Chairs', '5', 'Chairs', '', '', '', 1, '2020-03-18'),
(57, 'Desks', '5', 'Desks', '', '', '', 1, '2020-03-18'),
(58, 'Entertainment Centers', '5', 'Entertainment Centers', '', '', '', 1, '2020-03-18'),
(59, 'Cabinets', '5', 'Cabinets', '', '', '', 1, '2020-03-18'),
(60, 'Bookcases', '5', 'Bookcases', '', '', '', 1, '2020-03-18'),
(61, 'Accessories', '5', 'Accessories', '', '', '', 1, '2020-03-18'),
(62, 'Benches', '5', 'Benches', '', '', '', 1, '2020-03-18'),
(63, 'Home Office Sets', '5', 'Home Office Sets', '', '', '', 1, '2020-03-18'),
(64, 'Stools', '5', 'Stools', '', '', '', 1, '2020-03-18'),
(65, 'Tables', '7', 'Tables', '', '', '', 1, '2020-03-18'),
(66, 'Upholstery Pillows', '7', 'Upholstery Pillows', '', '', '', 1, '2020-03-18'),
(67, 'Bakers Racks', '7', 'Bakers Racks', '', '', '', 1, '2020-03-18'),
(68, 'Bars', '7', 'Bars', '', '', '', 1, '2020-03-18'),
(69, 'Entertainment Centers', '7', 'Entertainment Centers', '', '', '', 1, '2020-03-18'),
(70, 'Chests and Dressers', '7', 'Chests and Dressers', '', '', '', 1, '2020-03-18'),
(71, 'Cabinets', '7', 'Cabinets', '', '', '', 1, '2020-03-18'),
(72, 'Mirrors', '7', 'Mirrors', '', '', '', 1, '2020-03-18'),
(73, 'Accessories', '7', 'Accessories', '', '', '', 1, '2020-03-18'),
(74, 'Storage and Carts', '7', 'Storage and Carts', '', '', '', 1, '2020-03-18'),
(75, 'Stools', '7', 'Stools', '', '', '', 1, '2020-03-18'),
(76, 'Tables', '9', 'Tables', '', '', '', 1, '2020-03-18'),
(77, 'Entertainment Centers', '9', 'Entertainment Centers', '', '', '', 1, '2020-03-18'),
(78, 'Cabinets', '9', 'Cabinets', '', '', '', 1, '2020-03-18'),
(79, 'Bookcases', '9', 'Bookcases', '', '', '', 1, '2020-03-18'),
(80, 'Accessories', '9', 'Accessories', '', '', '', 1, '2020-03-18'),
(81, 'Tables', '4', 'Tables', '', '', '', 1, '2020-03-18'),
(82, 'Chairs', '4', 'Chairs', '', '', '', 1, '2020-03-18'),
(83, 'test cat', '7', 'dsdfsdfsd', 'arab name', 'ac458', 'fdsfsdfd', 1, '2020-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `contact_id` int(10) NOT NULL,
  `contact_title` varchar(80) NOT NULL,
  `contact_pic` text NOT NULL,
  `contact_ph1` varchar(80) NOT NULL,
  `contact_ph2` varchar(80) NOT NULL,
  `contact_mail1` varchar(80) NOT NULL,
  `contact_mail2` varchar(80) NOT NULL,
  `contact_adrs1` text NOT NULL,
  `contact_adrs2` text NOT NULL,
  `contact_adrs_arab` text CHARACTER SET utf8 NOT NULL,
  `map` text NOT NULL,
  `contact_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`contact_id`, `contact_title`, `contact_pic`, `contact_ph1`, `contact_ph2`, `contact_mail1`, `contact_mail2`, `contact_adrs1`, `contact_adrs2`, `contact_adrs_arab`, `map`, `contact_date`) VALUES
(1, 'Contact US', '01862da78fdff5f9ede1079bf5e25a9d.JPG', '96524330353', '96560027774', 'info@janafurniture.com', 'sales@janafurniture.com', 'Wafa Complex, 2 Street, Al-Dajeej, Farwaniya, Kuwait', 'contact address 2', 'مجمع الوفاء ، شارع 2 ، الضجيج ، الفروانية ، الكويت', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13922.502858767195!2d47.9644381!3d29.2639524!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a0325dc97f7efb2!2z2KzZhtinINmB2YrZhNinINmE2YTYo9ir2KfYqyDZiNin2YTZhdmB2LHZiNi02KfYqiBKYW5hIFZpbGxh!5e0!3m2!1sar!2skw!4v1585297233345!5m2!1sar!2skw\" ', '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `homeslider_id` int(10) NOT NULL,
  `homeslider_title` varchar(80) NOT NULL,
  `homeslider_subtitle` varchar(80) NOT NULL,
  `homeslider_pic` text NOT NULL,
  `homeslider_priority` int(10) NOT NULL,
  `homeslider_status` int(10) NOT NULL,
  `homeslider_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`homeslider_id`, `homeslider_title`, `homeslider_subtitle`, `homeslider_pic`, `homeslider_priority`, `homeslider_status`, `homeslider_date`) VALUES
(1, 'JANAVILLA', 'It is an exclusive experience!', 'f3579d2ec3686ffd3e0b4de136622e07.png', 1, 1, '2020-03-18'),
(2, 'Luxury Philosophy', 'Living spaces are now more elegant and impressive', '9ea4b7f07a2c1d5407ee2b82a764948e.png', 4, 1, '2020-03-18'),
(3, 'Dining Room', 'For us, expectation is offering concept and prestigious living space ', '40d979b0300e88a8c2f3f0d9843103a0.png', 2, 1, '2020-03-18'),
(4, 'Luxury Philosophy', 'Harmony is fulfilling all expectations in the house spaces', '0850428174cc56f5788637f727f79204.jpg', 5, 1, '2020-03-18'),
(5, 'CELMO', 'Want to feel dynamism and rhythm in all of your living spaces? ', '9adca785c4d35e33f38ab65d3c8e5ebd.png', 3, 1, '2020-03-17'),
(6, 'slider 6', 'slider 6', 'pr6(1).jpg', 6, 1, '2020-04-11'),
(7, 'slider7', 'slider7', 'pr6(2).jpeg', 7, 1, '2020-04-11'),
(8, 'slider8', 'slider8', 'pr6(3).jpg', 8, 1, '2020-04-11'),
(9, 'slider9', 'slider9', 'pr6(4).jpg', 9, 1, '2020-04-11'),
(10, 'slider10', 'slider10', 'pr6(5).jpeg', 10, 1, '2020-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `index_title`
--

CREATE TABLE `index_title` (
  `indextitle_id` int(10) NOT NULL,
  `indextitle_name` varchar(80) NOT NULL,
  `indextitle_status` int(10) NOT NULL,
  `indextitle_priority` int(10) NOT NULL,
  `indextitle_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(10) NOT NULL,
  `logo_name` varchar(80) NOT NULL,
  `logo_pic` text NOT NULL,
  `logo_status` int(10) NOT NULL,
  `logo_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_name`, `logo_pic`, `logo_status`, `logo_date`) VALUES
(1, 'janavilla', '4673451d2b6c2a804bf9b5002d169de4.png', 1, '2020-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `magezin`
--

CREATE TABLE `magezin` (
  `mag_id` int(10) NOT NULL,
  `mag_title` varchar(90) NOT NULL,
  `mag_src` text NOT NULL,
  `mag_file` text NOT NULL,
  `mag_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magezin`
--

INSERT INTO `magezin` (`mag_id`, `mag_title`, `mag_src`, `mag_file`, `mag_date`) VALUES
(1, '1919 Catalogue- Client Has to provide the Catalogue', 'https://online.pubhtml5.com/pehi/bylj/', 'n/a', '2020-05-07'),
(2, '2020Catalogue-Client Has to provide the Catalogue', 'https://online.pubhtml5.com/pehi/bylj/', 'n/a', '2020-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(10) NOT NULL,
  `menu_name` varchar(80) NOT NULL,
  `menu_name_arab` varchar(80) CHARACTER SET utf8mb4 NOT NULL,
  `menu_indextitle` varchar(80) NOT NULL,
  `menu_pic` text NOT NULL,
  `menu_priority` int(10) NOT NULL,
  `menu_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_name_arab`, `menu_indextitle`, `menu_pic`, `menu_priority`, `menu_date`) VALUES
(2, 'Collection', 'مجموعة', 'indextitle2', 'd7dafd81f6819b9e47cb390975fc70c0.jpg', 1, '2020-03-31'),
(9, 'Projects', 'المشاريع', 'index title 1', 'c9e2473334e72ab28534e9f87761110a.jpg', 2, '2020-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_title` varchar(120) NOT NULL,
  `news_desc` text NOT NULL,
  `news_title_arab` varchar(120) NOT NULL,
  `news_desc_arab` text NOT NULL,
  `news_pic` text NOT NULL,
  `news_status` int(10) NOT NULL,
  `news_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_desc`, `news_title_arab`, `news_desc_arab`, `news_pic`, `news_status`, `news_date`) VALUES
(1, 'We started the Hilton Riyadh on October 1', '<p style=\"padding: 0px; box-sizing: border-box; margin-right: 0px; margin-bottom: 21px; margin-left: 0px; border: 0px; outline: 0px; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline;\">Zebrano; has added Hilton Riyadh to dozens of prestigious hotel projects completed in the Middle East.</p><p style=\"padding: 0px; box-sizing: border-box; margin-right: 0px; margin-bottom: 21px; margin-left: 0px; border: 0px; outline: 0px; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline;\">With the launch of the new project on October 1, 2017, Hilton Riyadh will combine Zebrano’s stylish and eye-catching models with the imagination of Zebrano Interior Icons to present its guests a unique experience.</p><p style=\"padding: 0px; box-sizing: border-box; margin-right: 0px; margin-bottom: 21px; margin-left: 0px; border: 0px; outline: 0px; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline;\">With its stunning glass façade, Art Deco interiors and panoramic elevators, Hilton Riyadh Hotel &amp; Residences exudes the luxurious vibe. Sky-linked to the Riyadh underground service the hotel boasts direct access from the airport. The hotel is also connected to Granada Shopping Mall with upscale restaurants and more than 120 boutiques. With views of Al Faisaliyah tower and the Kingdom Centre, the hotel is located close to the city center, business district and attractions.</p>', 'بدأنا هيلتون الرياض في 1 أكتوبر', '<span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">عندما يريد العالم أن ‪</span><span id=\"e2\" class=\"ex\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">يتكلّم</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;‬ ، فهو يتحدّث بلغة يونيكود.&nbsp;</span><span id=\"e1\" class=\"ex\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">تسجّل</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;الآن لحضور المؤتمر الدولي العاشر ليونيكود (</span><span dir=\"ltr\" class=\"embedded-latin\" lang=\"en\" style=\"unicode-bidi: isolate; color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">Unicode Conference</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">)، الذي سيعقد&nbsp;</span><span id=\"e10\" class=\"ex\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">في 10-12 آذار</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;</span><span class=\"embedded-latin\" style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">1997</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;بمدينة مَايِنْتْس، ألمانيا. و&nbsp;</span><span id=\"e7\" class=\"ex\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">سيجمع</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;</span><span id=\"e11\" class=\"ex\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">المؤتمر</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;</span><span class=\"ex\" id=\"shaping\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">بين خبراء</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;من كافة قطاعات الصناعة على الشبكة العالمية انترنيت ويونيكود، حيث ستتم،&nbsp;</span><span id=\"e8\" class=\"ex\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">على</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;الصعيدين الدولي والمحلي على حد سواء مناقشة سبل استخدام يونكود في النظم القائمة وفيما يخص التطبيقات الحاسوبية، الخطوط، تصميم النصوص والحوسبة&nbsp;</span><span id=\"e9\" class=\"ex\" style=\"color: crimson; cursor: pointer; font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">متعددة</span><span style=\"color: rgb(102, 102, 102); font-family: webfont, Scheherazade, &quot;Al Bayan&quot;, &quot;Traditional Arabic&quot;, serif; font-size: 38px; text-align: right;\">&nbsp;اللغات.</span>', '8b6090fb7326ea85d1a1e298d4befbd1.jpg', 1, '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_userid` int(12) NOT NULL,
  `product_desc` text NOT NULL,
  `product_submenu` varchar(30) NOT NULL,
  `product_category` varchar(80) NOT NULL,
  `product_brand` varchar(80) NOT NULL,
  `product_price` varchar(80) NOT NULL,
  `product_pic` text NOT NULL,
  `product_status` int(10) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_userid`, `product_desc`, `product_submenu`, `product_category`, `product_brand`, `product_price`, `product_pic`, `product_status`, `product_date`) VALUES
(1, 'kushin chaire', 0, 'best chair for sit', '3', '2', '1', '1000', '7a4a441c0a6bd633e5f2842884ffbebc.jpg', 0, '2020-03-13'),
(4, 'product4', 0, 'sdfdfsdfs', '3', '2', '1', '1000', 'deaeaa74d973ed6efe99b92b633af6cd.jpg', 0, '2020-03-18'),
(5, 'Chairs', 0, 'Chairs', '3', '1', '1', '1000', 'e5fb4cc9f2966098a8c56fe5227e3b61.jpg', 0, '2020-03-18'),
(7, 'BARCELONA DININGROOM SET ', 0, 'BARCELONA DININGROOM SET', '8', '25', '1', '1000', '2904cec6eaf110f59b323013fe05f72e.jpg', 1, '2020-03-17'),
(8, 'CARMEN DININGROOM SET ', 0, 'CARMEN DININGROOM SET (2)', '8', '25', '1', '1000', '353fdd050cacda497d33ccd099a17099.jpg', 1, '2020-03-17'),
(9, 'FLORANSA DININGROOM SET ', 0, 'FLORANSA DININGROOM SET ', '8', '25', '1', '1000', '30f2ace7bdfd31fc7d5a9e8ed15bd74c.jpg', 1, '2020-03-17'),
(10, 'MADRID DININGROOM SET ', 0, 'MADRID DININGROOM SET', '8', '25', '1', '1000', 'dcc92f50fdf9cf96306823740debdaa3.jpg', 1, '2020-03-18'),
(11, 'MARSILYA DININGROOM SET', 0, 'MARSILYA DININGROOM SET', '8', '25', '1', '1000', '7b7cc8fc7c6f1177c55e3ab7042e95d6.jpg', 1, '2020-03-17'),
(12, 'SALTANAT GUNES DININGROOM SET', 0, 'SALTANAT GUNES DININGROOM SET', '8', '25', '1', '1000', '04ccf4d803d24e40cbde57ba807e0379.jpg', 1, '2020-03-18'),
(13, 'SMART DININGROOM SET', 0, 'SMART DININGROOM SET', '8', '36', '1', '1000', 'b98e2fc9d55018c575060f5dafda97fd.jpg', 1, '2020-03-18'),
(14, 'BARCELONA DININGROOM SET', 0, 'BARCELONA DININGROOM SET', '8', '30', '1', '1000', '77a11f0d89769206dbe7e5d249515437.jpg', 1, '2020-03-17'),
(15, 'CARMEN DININGROOM SET', 0, 'CARMEN DININGROOM SET', '8', '30', '1', '1000', '0d06ef649606ccf531bcddb9602483a6.jpg', 1, '2020-03-17'),
(16, 'FLORANSA DININGROOM SET', 0, 'FLORANSA DININGROOM SET', '8', '30', '1', '1000', 'ce5a3997e2066a9ea26e450618509600.jpg', 1, '2020-03-17'),
(18, 'MARSILYA DININGROOM SET ', 0, 'MARSILYA DININGROOM SET ', '8', '30', '1', '1000', '936f64290c7c0f58184f049e9925093a.jpg', 1, '2020-03-17'),
(19, 'SALTANAT GUNES DININGROOM SET', 0, 'SALTANAT GUNES DININGROOM SET', '8', '30', '1', '1000', '81640bceb63681a5f79c013ae0af4f36.jpg', 1, '2020-03-18'),
(20, 'TOPKAPI DININGROOM SET', 0, 'TOPKAPI DININGROOM SET', '8', '30', '1', '1000', 'baee559c257b5ad2b4b13445eb52a3fe.jpg', 1, '2020-03-17'),
(21, 'TOSCANA DININGROOM SET', 0, 'TOSCANA DININGROOM SET', '8', '30', '1', '1000', '0253275a6b824b17e2c99f7aa79c25c4.jpg', 1, '2020-03-18'),
(22, 'TOPKAPI DININGROOM SET', 0, 'TOPKAPI DININGROOM SET', '8', '25', '1', '1000', 'da727c2517e8ba7cf50b2d5994fdeba7.jpg', 1, '2020-03-18'),
(23, 'TOSCANA DININGROOM SET', 0, 'TOSCANA DININGROOM SET', '8', '30', '1', '1000', 'eb86c3bfabb7d23dc285aa6a2d793047.jpg', 1, '2020-03-18'),
(24, 'ANGEL SOFA SET', 0, 'ANGEL SOFA SET', '4', '5', '1', '1000', '7d4503f6028c2337fedb91a78b273901.jpg', 1, '2020-03-18'),
(25, 'ARES SOFA SET ', 0, 'ARES SOFA SET ', '4', '5', '1', '1000', '13797d4ddce8f5fe7afbc3ed06e72704.jpg', 1, '2020-03-18'),
(26, 'ARMONI SOFA SET', 0, 'ARMONI SOFA SET', '4', '5', '1', '1000', '8d0b0d0f9d71b514356659e9ff387051.jpg', 1, '2020-03-18'),
(27, 'CAZIBE SOFA SET ', 0, 'CAZIBE SOFA SET ', '4', '5', '1', '1000', '19fce73f04876864562ecc2a24a411d2.jpg', 1, '2020-03-18'),
(28, 'ALASKA', 0, 'BED', '3', '39', '1', '1000', '0685f65b8271d3c2f9a64ca5aebc1e35.jpg', 1, '2020-03-18'),
(29, 'BAGDAT', 0, 'BED', '3', '39', '1', '1000', 'e0a3296ccfdebff5f2a1be1c20f244d0.jpg', 1, '2020-03-18'),
(30, 'BARCELONA', 0, 'BED', '3', '39', '1', '1000', '317579026180a9e4a4eabab189f33334.jpg', 1, '2020-03-18'),
(31, 'CIRAGAN', 0, 'BED', '3', '39', '1', '1000', '8c2d1c6b0fe28fc15be90616226e111c.jpg', 1, '2020-03-18'),
(32, 'DESTAN', 0, 'BED', '3', '39', '1', '1000', 'e74d25e0d8567c2504c3342c81524c0a.jpg', 1, '2020-03-18'),
(33, 'ERBIL', 0, 'BED', '3', '39', '1', '1000', '3f85502064781a51659c8c4547bfff56.jpg', 1, '2020-03-18'),
(34, 'MADRID', 0, 'BED', '3', '39', '1', '1000', '86a71ba05e439de4a8c450dd91de4d7d.jpg', 1, '2020-03-18'),
(35, 'MARSILYA', 0, 'BED', '3', '39', '1', '1000', 'cd3a20f1fc57047ae83808844dcf2e74.jpg', 1, '2020-03-18'),
(36, 'PERA', 0, 'BED', '3', '39', '1', '1000', '0808898ce5a01acb55e55255067b6f10.jpg', 1, '2020-03-18'),
(37, 'LIVING ROOM TABLES', 0, 'LIVING ROOM TABLES', '4', '81', '1', '1000', 'a79b83c4dfa18071f9ed1ad393a95ea2.JPG', 1, '2020-03-18'),
(38, 'LIVING ROOM TABLES', 0, 'LIVING ROOM TABLES', '4', '81', '1', '1000', '3161c4855affc3cafe8cbeb0b6837356.JPG', 1, '2020-03-18'),
(39, 'LIVING ROOM TABLES', 0, 'LIVING ROOM TABLES', '4', '81', '1', '1000', 'bb236b5978a4537817fb94a51224d00c.JPG', 1, '2020-03-18'),
(40, 'LIVING ROOM TABLES', 0, 'LIVING ROOM TABLES', '4', '81', '1', '1000', '7b8d66c35976cbd845080489faf353fa.JPG', 1, '2020-03-18'),
(41, 'LIVING ROOM TABLES', 0, 'LIVING ROOM TABLES', '4', '81', '1', '1000', '690df86bbfe76a31d36eb4e661f23914.JPG', 1, '2020-03-18'),
(43, 'ARES', 0, 'LIVING ROOM CHAIRS', '4', '82', '1', '1000', 'f45b2f4857a3af5e217256695d90056e.jpg', 1, '2020-03-18'),
(44, 'LARISSA', 0, 'LIVING ROOM SOFAS', '4', '5', '1', '1000', '0e80389f389c1d0366d5ce2f16f6af67.jpg', 1, '2020-03-18'),
(45, 'LARISSA', 0, 'LIVING ROOM CHAIRS', '4', '82', '1', '1000', '6ce5b1ed46d7ead0cc117d67a55b592e.jpg', 1, '2020-03-18'),
(46, 'LEGNO', 0, 'LIVING ROOM CHAIRS', '4', '82', '1', '1000', 'b70dba80601b0fd81ea5a049f37c2101.jpg', 1, '2020-03-18'),
(47, 'NATUZZ', 0, 'LIVING ROOM CHAIRS', '4', '82', '1', '1000', '645187a81343919429853b0608b6cd57.jpg', 1, '2020-03-18'),
(48, 'BEDROOM CHAIRS', 0, 'CELMO', '3', '82', '1', '1000', '411ec7f5422e5ec12bc134384ae715ba.JPG', 1, '2020-03-18'),
(49, 'BEDROOM CHAIRS', 0, 'CELMO', '3', '1', '1', '1000', '2146ba7cbe5865983b95cec059890cdc.JPG', 1, '2020-03-18'),
(50, 'BEDROOM CHAIRS', 0, 'CELMO', '3', '1', '1', '1000', '55bacb8b7c378875bd049e31d4833e57.JPG', 1, '2020-03-18'),
(51, 'BEDROOM CHAIRS', 0, 'BEDROOM CHAIRS', '3', '1', '1', '1000', 'a35ada0b581d8bbfcf1931b602d5c8c2.JPG', 1, '2020-03-18'),
(52, 'BEDROOM CHAIRS', 0, 'BEDROOM CHAIRS', '3', '1', '1', '1000', '77f4b040737789a51ff46501ecdc606c.JPG', 1, '2020-03-18'),
(53, 'BEDROOM CHAIRS', 0, 'BEDROOM CHAIRS', '3', '1', '1', '1000', '4bd143ce8f8d5daf15d3816a9b1450cb.JPG', 1, '2020-03-18'),
(54, 'BEDROOM CHAIRS', 0, 'BEDROOM CHAIRS', '3', '1', '1', '1000', 'a99127674cd735dc0821a04ec7866ecf.JPG', 1, '2020-03-18'),
(55, 'ALASKA', 0, 'BEDROOM TABLES', '3', '2', '1', '1000', '447c92612f48d5dca7625bfb46815469.jpg', 1, '2020-03-18'),
(56, 'BAGDAT', 0, 'BEDROOM TABLES', '3', '2', '1', '1000', '89d19e4aac593dc9c2854c9c7249eefa.jpg', 1, '2020-03-18'),
(57, 'CENNET', 0, 'BEDROOM TABLES', '3', '2', '1', '1000', '347002c96ec9e3f2a45c994db4148f71.jpg', 1, '2020-03-18'),
(58, 'HILTON', 0, 'BEDROOM TABLES', '3', '2', '1', '1000', '9999eac6512f44c8968a264580b111e6.jpg', 1, '2020-03-18'),
(59, 'CHAISES', 0, 'CHAISES', '3', '40', '1', '1000', '89403c2a714b558e56229d940675d41b.JPG', 1, '2020-03-18'),
(60, 'CHAISES', 0, 'CHAISES', '3', '40', '1', '1000', '132ddcc60edb1f087c79a4c6f6825327.JPG', 1, '2020-03-18'),
(61, 'CHAISES', 0, 'CHAISES', '3', '40', '1', '1000', '3e7de822df17c35981037e85569357c1.JPG', 1, '2020-03-18'),
(62, 'CHAISES', 0, 'CHAISES', '3', '40', '1', '1000', 'ffc78ea1ed7f25c61521433296da3fcb.JPG', 1, '2020-03-18'),
(63, 'VARSOVA BEDROOM SET ', 0, 'VARSOVA BEDROOM SET ', '3', '41', '1', '1000', 'cd26ae3b92ba40bdac84d5dfa022d4ae.jpg', 1, '2020-03-18'),
(64, 'MELISA BEYAZ BEDROOM SET', 0, ' YOUTH BEDROOM SET', '3', '42', '1', '1000', '773d58bf89ecefd7b9fb1d39d2ef48bd.jpg', 1, '2020-03-18'),
(65, 'BEDROOM BEDDING', 0, 'BEDDING', '3', '43', '1', '1000', '47728b321178a57bc771261b13ef43ab.jpg', 1, '2020-03-18'),
(66, 'BEDROOM BEDDING', 0, 'BEDDING', '3', '43', '1', '1000', 'cf858222fb70b87f1f87f6b81a63ca09.jpg', 1, '2020-03-18'),
(67, 'BEDROOM BEDDING', 0, 'BEDDING', '3', '43', '1', '1000', '87b7e6d60c3df2ba554ebfa4d1a2c290.jpg', 1, '2020-03-18'),
(68, 'VARSOA', 0, 'DESK', '3', '44', '1', '1000', 'f0f6d2ef184ee54d4e54c60b67cbb86d.jpg', 1, '2020-03-18'),
(69, 'TOPRAK', 0, 'DESK', '3', '44', '1', '1000', '2386b8a6be9ab67b6caeb6a9b9bd6d5c.jpg', 1, '2020-03-18'),
(70, 'CENNET', 0, 'ENTERTAINMENT CENTERS', '3', '45', '1', '1000', 'bf729e68c3c6da483ef436a9020d5c33.jpg', 1, '2020-03-18'),
(71, 'ENTERTAINMENT CENTERS', 0, 'ENTERTAINMENT CENTERS', '3', '45', '1', '1000', 'e168ff8580f4c3030090b65dae8208cb.jpg', 1, '2020-03-18'),
(72, 'ALASKA', 0, 'CHESTS AND DRESSERS', '3', '46', '1', '1000', '578a931a86f31f10d583b23437792ada.jpg', 1, '2020-03-18'),
(73, 'BOOKCASES', 0, 'BOOKCASES', '3', '48', '1', '1000', 'cdde22a510ae1de3d8d29e3933179c9e.JPG', 1, '2020-03-18'),
(74, 'BOOKCASES', 0, 'BOOKCASES', '3', '48', '1', '1000', 'dbd5739ef2f08bac4bd0ac12014cc25e.JPG', 1, '2020-03-18'),
(75, 'BOOKCASES', 0, 'BOOKCASES', '3', '48', '1', '1000', 'af3d052bd2068d8c28e72a8270597cee.jpg', 1, '2020-03-18'),
(76, 'BOOKCASES', 0, 'BOOKCASES', '3', '48', '1', '1000', '756ee6a40e0ffc5f8e80fd3a0adcd609.jpg', 1, '2020-03-18'),
(77, 'LIGHTING', 0, 'LIGHTING', '3', '49', '1', '1000', '005e349344aed091e7697d2ad9615b6b.jpg', 1, '2020-03-18'),
(78, 'project1', 0, 'asdasdasd', '10', '', '1', 'dsdasdas', '20d00bf2d0949c278fec83f8f898d693.jpg', 1, '2020-03-29'),
(79, 'projct2', 0, 'dscsdfsda', '10', '', '1', '1000', '6fdbf7f3824ff145e66750e423e92d2d.jpg', 1, '2020-03-29'),
(80, 'product test123', 5, 'a sample product ', '3', '40', '1', '1000', '9beb80a824e45d8e3cf989955534f501.jpg', 1, '2020-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `reg_users`
--

CREATE TABLE `reg_users` (
  `reg_id` int(10) NOT NULL,
  `reg_name` text NOT NULL,
  `reg_type` varchar(60) NOT NULL,
  `reg_mail` text NOT NULL,
  `reg_phon` int(11) NOT NULL,
  `reg_check_stat` int(10) NOT NULL,
  `reg_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_users`
--

INSERT INTO `reg_users` (`reg_id`, `reg_name`, `reg_type`, `reg_mail`, `reg_phon`, `reg_check_stat`, `reg_datetime`) VALUES
(2, 'test company', 'Supplier', 'test@mail.com', 2147483647, 1, '2020-04-30 02:40:47'),
(3, 'testing', 'Supplier', 'anzz@mail.com', 213123144, 1, '2020-05-01 07:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(10) NOT NULL,
  `store_name` varchar(80) NOT NULL,
  `store_adress` text NOT NULL,
  `store_name_arab` varchar(90) NOT NULL,
  `store_adress_arab` text NOT NULL,
  `store_type` varchar(80) NOT NULL,
  `store_status` int(10) NOT NULL,
  `store_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_adress`, `store_name_arab`, `store_adress_arab`, `store_type`, `store_status`, `store_date`) VALUES
(1, 'store 1', 'store 1 adress', 'store 1 arab', 'store 1 address arab', 'Domestic', 1, '2020-03-26'),
(3, 'store 2', 'zdcsadasdasdsdasdas', 'store 2 arab', 'store 2 adress arab', 'Domestic', 1, '2020-03-27'),
(4, 'store 3', 'dfsdfsdfsdfsdfsdfsdfsdfsd', 'store 3 arab', 'store 3 addresss arab', 'International', 1, '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `store_map`
--

CREATE TABLE `store_map` (
  `smap_id` int(10) NOT NULL,
  `smap_url` text NOT NULL,
  `smap_type` varchar(80) NOT NULL,
  `smap_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_map`
--

INSERT INTO `store_map` (`smap_id`, `smap_url`, `smap_type`, `smap_date`) VALUES
(1, 'https://www.google.com/maps/d/embed?mid=1byg6ngO4EMK7MUekxwnajbVBC3Q', 'Domestic', '2020-03-27'),
(2, 'https://www.google.com/maps/d/embed?mid=1byg6ngO4EMK7MUekxwnajbVBC3Q', 'International', '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `submenu_id` int(10) NOT NULL,
  `submenu_name` varchar(80) NOT NULL,
  `submenu_desc` text NOT NULL,
  `submenu_name_arab` varchar(80) CHARACTER SET utf8mb4 NOT NULL,
  `submenu_desc_arab` text CHARACTER SET utf8mb4 NOT NULL,
  `submenu_pic` text NOT NULL,
  `submenu_main` int(10) NOT NULL,
  `submenu_status` int(10) NOT NULL,
  `submenu_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`submenu_id`, `submenu_name`, `submenu_desc`, `submenu_name_arab`, `submenu_desc_arab`, `submenu_pic`, `submenu_main`, `submenu_status`, `submenu_date`) VALUES
(3, 'Bedroom', 'bedroom collections', '', '', '4b9d8ba2d4d1fae5f146dae9a2adb676.jpg', 2, 1, '2020-03-13'),
(4, 'Living Room', 'living room collections', '', '', '239921c59993d6f1f05c365e55bd4d62.jpg', 2, 1, '2020-03-13'),
(5, 'Home Office', 'Home Office collections', '', '', '9f9385f89503a98305102d9bafb5af63.jpg', 2, 1, '2020-03-13'),
(6, 'Mattresses', 'Mattresses collections', '', '', '2e84b81f663b3c84da14b7458682f969.jpg', 2, 1, '2020-03-13'),
(7, 'Accessories', 'Accessories collections', '', '', '6e6f3b0e8137e31dfd83715f26dc3e54.jpg', 2, 1, '2020-03-13'),
(8, 'Dining Room', '', '', '', '741ab034656a70f93f614803c6436da8.jpg', 2, 1, '2020-03-17'),
(9, 'Entertainment', 'Shop Entertainment', '', '', '472fd6cf74ea272aa866f408b7e56775.jpg', 2, 1, '2020-03-17'),
(10, 'Furniture Project', 'xcxczxczxczx', '', '', '0b5bb5b433a41245377860f60db0f49b.jpg', 9, 1, '2020-03-29'),
(11, 'Decoration Project', 'xcxczxczxczx', '', '', '8855e3342077193d24bfd0ad340c21fc.jpg', 9, 1, '2020-03-29'),
(12, 'Ministry Project', 'xcxczxczxczx', '', '', '2da8c43b5de17efc2938ab155c44f006.jpg', 9, 1, '2020-03-29'),
(15, 'Hotel Project', 'xcxczxczxczx', '', '', '99615f2beba99fb1e7e250b4c8341f64.jpg', 9, 1, '2020-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `mailid` text NOT NULL,
  `phone` varchar(90) NOT NULL,
  `type` varchar(80) NOT NULL,
  `ustatus` int(11) NOT NULL,
  `uins_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `mailid`, `phone`, `type`, `ustatus`, `uins_date`) VALUES
(1, 'Super Admin', 'admin123', 'admin123', 'n/a', 'n/a', 'admin', 1, '0000-00-00'),
(5, 'testing', 'anzz123', 'anzz123', 'anzz@mail.com', '213123144', 'Supplier', 1, '2020-05-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agencies_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brands_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`homeslider_id`);

--
-- Indexes for table `index_title`
--
ALTER TABLE `index_title`
  ADD PRIMARY KEY (`indextitle_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `magezin`
--
ALTER TABLE `magezin`
  ADD PRIMARY KEY (`mag_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reg_users`
--
ALTER TABLE `reg_users`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_map`
--
ALTER TABLE `store_map`
  ADD PRIMARY KEY (`smap_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agencies_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brands_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `homeslider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `index_title`
--
ALTER TABLE `index_title`
  MODIFY `indextitle_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `magezin`
--
ALTER TABLE `magezin`
  MODIFY `mag_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `reg_users`
--
ALTER TABLE `reg_users`
  MODIFY `reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_map`
--
ALTER TABLE `store_map`
  MODIFY `smap_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `submenu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
