-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2016 at 10:40 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(50) NOT NULL,
  `banner_url` varchar(100) NOT NULL,
  `statues` varchar(20) NOT NULL,
  `banner_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_name`, `banner_url`, `statues`, `banner_date`, `username`, `type`) VALUES
(119, '8872person-sunglasses-woman-smartphone-large.jpg', 'resources/upload/main_slider/8872person-sunglasses-woman-smartphone-large.jpg', '1', '2016-03-11 16:33:16', 'mosa', 'slider'),
(120, '5413slid2.jpg', 'resources/upload/main_slider/5413slid2.jpg', '1', '2016-03-11 16:36:21', 'mosa', 'slider'),
(121, '8579slid3.jpg', 'resources/upload/main_slider/8579slid3.jpg', '1', '2016-03-11 16:36:33', 'mosa', 'slider'),
(122, '6389slid4.jpg', 'resources/upload/main_slider/6389slid4.jpg', '1', '2016-03-11 16:36:44', 'mosa', 'slider'),
(123, '5062slid8.jpeg', 'resources/upload/main_slider/5062slid8.jpeg', '1', '2016-03-11 16:36:53', 'mosa', 'slider'),
(124, '932slid9.jpg', 'resources/upload/main_slider/932slid9.jpg', '1', '2016-03-11 16:37:05', 'mosa', 'slider'),
(125, '1795slid10.jpg', 'resources/upload/main_slider/1795slid10.jpg', '1', '2016-03-11 16:37:14', 'mosa', 'slider');

-- --------------------------------------------------------

--
-- Table structure for table `categorey`
--

CREATE TABLE IF NOT EXISTS `categorey` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(150) NOT NULL,
  `cat_img` varchar(250) NOT NULL,
  `cat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categorey`
--

INSERT INTO `categorey` (`cat_id`, `cat_name`, `cat_img`, `cat_date`, `username`) VALUES
(1, 'Mobiles', 'resources/upload/cats/71741197best-mobiles-phone-2015.jpg', '2016-04-21 11:55:14', 'mosa'),
(2, 'Computers', 'resources/upload/cats/2782computers.png', '2016-04-21 11:55:14', 'kappoo'),
(3, 'Tablets', 'resources/upload/cats/2646besttablets2013.jpg', '2016-04-21 11:55:14', 'kappoo'),
(5, 'camera', 'resources/upload/cats/6226uk_EV-NX2000BFWGB_010_Back_black_10029614079597.png', '2016-06-17 07:03:44', 'mohe');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `saying` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `username`, `admin`, `saying`, `date`) VALUES
(3, 'to chrome', 'solom', 'solom', 'user', '2016-07-09 11:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `client_say`
--

CREATE TABLE IF NOT EXISTS `client_say` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(200) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `client_say`
--

INSERT INTO `client_say` (`id`, `username`, `comment`, `date`, `active`) VALUES
(9, 'mosa', 'good website              ', '2016-05-25 03:04:40am', 1),
(12, 'mosa', '                    thank you for chat is very good service in the site', '2016-06-19 08:32:am', 1),
(13, 'slam', '                    NICE WEBSITE', '2016-06-23 08:25:am', 1),
(14, 'slam', '                    dqwdwqdwqdc 32r32r32\r\nr32r32r32r 3\r\n2r\r\n23r23r23r23r23', '2016-07-09 06:13:am', 0),
(15, 'slam', '                    dqwdwqdwqdc 32r32r32\r\nr32r32r32r 3\r\n2r\r\n23r23r23r23r23', '2016-07-09 06:20:am', 0),
(16, 'slam', '                    dqwdwqdwqdc 32r32r32\r\nr32r32r32r 3\r\n2r\r\n23r23r23r23r23', '2016-07-09 06:21:am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`date`, `id`, `phone_id`, `username`, `comment`) VALUES
('2016-03-30 17:21:15', 50, 19, 'slam', ' mosa'),
('2016-06-19 05:36:41', 53, 14, 'eslam', ' help'),
('2016-05-27 16:27:13', 54, 11, 'ahmed', ' hello'),
('2016-05-27 16:27:13', 57, 47, 'ahmed', ' nice laptop'),
('2016-06-19 05:36:42', 58, 15, 'eslam', ' good phone'),
('2016-06-19 05:36:42', 59, 13, 'eslam', ' nice phone\r\n'),
('2016-05-27 16:27:14', 60, 13, 'ahmed', ' nice phone'),
('2016-07-03 04:17:26', 62, 54, 'mosa', ' nice phone'),
('2016-07-05 05:39:49', 63, 55, 'mosa', ' English only\r\n Please no foul language, be polite and use common sense\r\n No expressions of hatred based on race/ethnicity, sex, sexual orientation, disability, and religion\r\n No SPAM, no commercial advertising, no referal programs of any kind\r\n Posting your contact info such as phone number or email is not a good idea. We won&#39;t be responsible for any unwanted consequences.\r\n If you don&#39;t follow the above rules, your post will be probably deleted.'),
('2016-07-05 06:08:10', 64, 55, 'mosa', '  no commercial advertising, no referal programs of any kind\r\n Posting your contact info such as phone number or email is not a good idea. We won&#39;t be responsible for any unwanted consequences.\r\n If you don&#39;t follow the above rules, your po'),
('2016-07-05 07:57:24', 65, 13, 'mosa', ' cwcwqcwqc'),
('2016-07-12 02:27:44', 66, 50, 'mosa', ' nice laptop'),
('2016-07-12 02:44:21', 67, 15, 'mosa', 'mohamed '),
('2016-07-12 05:03:25', 68, 20, 'mosa', ' good web site'),
('2016-07-12 06:45:52', 69, 64, 'mosa', ' o SPAM, no commercial advertising, no referal programs of any kind\r\n Posting your contact info such as phone number or email is not a good idea. We won&#39;t be responsible for any unwanted consequences.\r\n If you don&#39;t follow the above rules, your post will be probably deleted'),
('2016-07-12 07:49:41', 70, 50, 'mosa', ' good lap with specification');

-- --------------------------------------------------------

--
-- Table structure for table `company_slides`
--

CREATE TABLE IF NOT EXISTS `company_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmpany_name` varchar(50) NOT NULL,
  `slide_name` varchar(100) NOT NULL,
  `banner_url` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `company_slides`
--

INSERT INTO `company_slides` (`id`, `cmpany_name`, `slide_name`, `banner_url`, `username`) VALUES
(6, 'sony', '541sony.jpg', 'resources/upload/company slide/541sony.jpg', 'mosa'),
(8, 'tecno', '4614tecno.jpg', 'resources/upload/company slide/4614tecno.jpg', 'mosa'),
(9, 'lenovo', '8691lenovo.jpg', 'resources/upload/company slide/8691lenovo.jpg', 'mosa'),
(10, 'asus', '1130asus.jpg', 'resources/upload/company slide/1130asus.jpg', 'mosa'),
(11, 'nokia', '4354nokia.png', 'resources/upload/company slide/4354nokia.png', 'mosa'),
(12, 'toshiba', '942toshiba.jpg', 'resources/upload/company slide/942toshiba.jpg', 'mosa'),
(13, 'samsung', '19samsung.png', 'resources/upload/company slide/19samsung.png', 'mosa'),
(16, 'infinix', '9918infinix-712logo.jpg', 'resources/upload/company slide/9918infinix-712logo.jpg', 'mosa'),
(19, 'apple', '3428apple-logo-2.jpeg', 'resources/upload/company slide/3428apple-logo-2.jpeg', 'mosa'),
(20, 'Huawei', '5055huawei-logo.gif', 'resources/upload/company slide/5055huawei-logo.gif', 'mosa'),
(21, 'lg', '942lg-logo.jpg', 'resources/upload/company slide/942lg-logo.jpg', 'mosa'),
(24, 'htc', '9524SP_banner_HTC.jpg', 'resources/upload/company slide/9524SP_banner_HTC.jpg', 'mohe');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_mail` varchar(150) NOT NULL,
  `msg_subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `user_mail`, `msg_subject`, `message`, `date`) VALUES
(3, 'eslamslam113@yahoo.com', 'nice', 'nice web ', '2016-07-03 05:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `main_settings`
--

CREATE TABLE IF NOT EXISTS `main_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(50) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `site_email` varchar(100) NOT NULL,
  `site_desc` text NOT NULL,
  `site_tags` varchar(50) NOT NULL,
  `site_homepanal` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `yt` varchar(100) NOT NULL,
  `rss` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `main_settings`
--

INSERT INTO `main_settings` (`id`, `site_name`, `site_url`, `site_email`, `site_desc`, `site_tags`, `site_homepanal`, `fb`, `tw`, `yt`, `rss`, `username`) VALUES
(1, 'test', 'test', 'te@yahoo.com', 'test', 'test', 'test', 'test', 'test', 'test', 'test', ' mosa '),
(2, 'test', 'test', 'te@yahoo.com', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'eslam'),
(3, 'eslam mosa.com', 'test', 'mosa@yahoo.com', 'test', 'test', 'test', 'facebook.com', 'twitter.com', 'youtube.com', 'rss.com', 'mosa'),
(4, 'eslam mosa.com', 'test', 'mosae35@yahoo.com', 'test', 'test', 'test', 'facebook.com', 'twitter.com', 'youtube.com', 'rss.com', 'mosa'),
(5, 'eslam mosa.', 'test', 'mosae35@yahoo.com', 'test', 'test', 'test', 'facebook.com', 'twitter.com', 'youtube.com', 'rss.com', 'mosa'),
(6, 'eslam mosa ali', 'test', 'mosae35@yahoo.com', 'test', 'test', 'test', 'facebook.com', 'twitter.com', 'youtube.com', 'rss.com', 'mosa');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) NOT NULL,
  `page_image` varchar(100) NOT NULL,
  `page_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_image`, `page_date`, `username`) VALUES
(1, 'nokia', 'resources/upload/company/20446352Nokia-100x40.gif', '2016-05-06 09:58:15', 'mosa'),
(2, 'samsung', 'resources/upload/company/4422samsung.png', '2016-03-11 22:56:02', 'mosa'),
(3, 'sony', 'resources/upload/company/4444Sony-100x40.gif', '2016-03-11 22:57:10', 'mosa'),
(4, 'htc', 'resources/upload/company/9821HTC-100x40.gif', '2016-03-11 22:57:44', 'mosa'),
(5, 'tecno', 'resources/upload/company/3414tecno.png', '2016-03-11 22:58:36', 'mosa'),
(6, 'apple', 'resources/upload/company/3337Apple-100x40.gif', '2016-03-11 22:59:06', 'mosa'),
(7, 'asus', 'resources/upload/company/2667Asus-logo.png', '2016-03-11 22:59:25', 'mosa'),
(8, 'infinix', 'resources/upload/company/4422infinix.jpg', '2016-03-11 23:00:36', 'mosa'),
(9, 'lenovo', 'resources/upload/company/4666Lenovo-100x40.gif', '2016-03-14 00:05:27', 'mosa'),
(10, 'toshiba', 'resources/upload/company/1474Toshiba-100x40.gif', '2016-03-11 23:03:02', 'mosa'),
(11, 'huawei', 'resources/upload/company/329hwauei-100x40.gif', '2016-03-11 23:05:44', 'mosa'),
(12, 'lg', 'resources/upload/company/1591LG-100x40.gif', '2016-03-11 23:07:09', 'mosa'),
(13, 'Philips', 'resources/upload/company/6679phillips-logo.jpg', '2016-04-21 13:05:39', 'mosa'),
(14, 'Hp', 'resources/upload/logo.png', '2016-07-05 08:18:30', 'mohe');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `Deliver` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `username`, `product_id`, `date`, `qty`, `trans_id`, `Deliver`) VALUES
(3, 'slam', 13, '2016-05-19 19:36:41', 1, '63d4kmlo0p791e6a14asmapho', 0),
(4, 'slam', 47, '2016-05-19 19:36:41', 1, '63d4kmlo0p791e6a14asmapho', 0),
(5, 'slam', 15, '2016-05-19 19:47:26', 1, 'ma3h4ma6elo68p0so1akd4p60', 1),
(6, 'slam', 16, '2016-05-19 11:10:26pm', 1, 'dp6ameao923l2166kphm2sa4o', 0),
(7, 'eslam', 16, '2016-05-24 10:16:47pm', 1, '24hm40sko761oo11a1edap0pam', 0),
(8, 'eslam', 13, '2016-05-24 10:16:47pm', 1, '24hm40sko761oo11a1edap0pam', 0),
(9, 'eslam', 19, '2016-05-24 10:17:20pm', 1, 'amh2m1pka0p1411406oaeod4so', 0),
(10, 'mosa', 51, '2016-07-10 03:06:25am', 1, 'empa1osa68o487dok15h2pa1m', 0),
(11, 'mosa', 20, '2016-07-10 03:06:25am', 1, 'empa1osa68o487dok15h2pa1m', 0),
(12, 'ahmed', 13, '2016-07-10 05:25:48am', 1, 'p8da6h44paao12m11hde1me8ok', 0),
(13, 'mosa', 20, '2016-07-12 03:21:55am', 1, 'sm5o4dohk18a668215poaeapm', 0),
(14, 'mosa', 13, '2016-07-12 03:21:55am', 1, 'sm5o4dohk18a668215poaeapm', 0),
(15, 'mosa', 59, '2016-07-12 03:21:55am', 1, 'sm5o4dohk18a668215poaeapm', 0),
(16, 'mosa', 64, '2016-07-13 12:30:18am', 1, '2d1h831e46soaokpa66apomm8', 0),
(17, 'mosa', 13, '2016-07-13 12:30:18am', 2, '2d1h831e46soaokpa66apomm8', 0),
(18, 'slam', 55, '2016-07-15 11:33:27am', 2, '7mdh7omla8k6se05a1a42p5po', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile_img`
--

CREATE TABLE IF NOT EXISTS `profile_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `profile_img`
--

INSERT INTO `profile_img` (`id`, `username`, `img`) VALUES
(27, 'mosa', 'app1/resources/upload/profile_img/mosa/2698IMG_20160626_120750.jpg'),
(30, 'slam', 'app1/resources/upload/profile_img/slam/9773Capture.JPG'),
(32, 'ahmed', 'app1/resources/upload/profile_img/ahmed/58721Bt1Qefo_400x400.jpg'),
(33, 'eslam', 'app1/resources/upload/profile_img/eslam/9773Capture.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `vote` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `phone_id`, `username`, `vote`) VALUES
(172, 47, 'eslam', 4),
(173, 20, 'eslam', 3),
(174, 13, 'eslam', 4),
(175, 19, 'eslam', 3),
(176, 46, 'eslam', 3),
(177, 16, 'eslam', 3),
(178, 14, 'eslam', 5),
(179, 11, 'ahmed', 1),
(180, 11, 'eslam', 5),
(181, 40, 'eslam', 5),
(182, 15, 'eslam', 2),
(183, 20, 'ahmed', 3),
(184, 13, 'ahmed', 3),
(185, 47, 'ahmed', 3),
(186, 17, 'ahmed', 3),
(187, 20, 'slam', 3),
(188, 19, 'slam', 4),
(189, 46, 'slam', 3),
(190, 11, 'slam', 3),
(191, 30, 'slam', 3),
(192, 52, 'slam', 3),
(193, 59, 'ahmed', 3),
(194, 53, 'eslam', 3),
(195, 15, 'slam', 3),
(196, 14, 'slam', 5),
(197, 50, 'slam', 3),
(198, 54, 'eslam', 3),
(199, 55, 'eslam', 4),
(200, 50, 'eslam', 1),
(201, 20, 'mosa', 2),
(202, 11, 'mosa', 2),
(203, 14, 'mosa', 2),
(204, 55, 'mosa', 2),
(205, 18, 'mosa', 2),
(206, 47, 'mosa', 2),
(207, 55, 'slam', 3),
(208, 53, 'mosa', 3),
(209, 13, 'mosa', 4),
(210, 54, 'mosa', 1),
(211, 60, 'slam', 2),
(212, 58, 'SLAM', 3),
(213, 52, 'ahmed', 2),
(214, 54, 'ahmed3', 2),
(215, 64, 'mosa', 2),
(216, 50, 'mosa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(50) NOT NULL,
  `section_statues` varchar(30) NOT NULL,
  `section_location` varchar(100) NOT NULL,
  `section_desc` text NOT NULL,
  `section_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `section_statues`, `section_location`, `section_desc`, `section_date`, `username`) VALUES
(1, 'projects', 'disactive', 'body', 'help to ask11', '2015-10-25 21:55:32', 'mosa'),
(4, 'productions', 'disactive', 'side', 'show our projects', '2015-10-25 21:55:01', 'mosa');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE IF NOT EXISTS `specifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int(100) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `network` varchar(1000) NOT NULL,
  `launch` varchar(500) NOT NULL,
  `body` varchar(700) NOT NULL,
  `display` varchar(700) NOT NULL,
  `platform` varchar(700) NOT NULL,
  `memory` varchar(700) NOT NULL,
  `camera` varchar(700) NOT NULL,
  `sound` varchar(700) NOT NULL,
  `comms` varchar(700) NOT NULL,
  `features` varchar(700) NOT NULL,
  `battery` varchar(700) NOT NULL,
  `cat_id` int(100) NOT NULL DEFAULT '1',
  `descrip` text NOT NULL,
  `tags` varchar(250) NOT NULL,
  `sale` int(3) NOT NULL DEFAULT '0',
  `video_memory` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `name`, `type`, `price`, `product_quantity`, `image`, `video`, `network`, `launch`, `body`, `display`, `platform`, `memory`, `camera`, `sound`, `comms`, `features`, `battery`, `cat_id`, `descrip`, `tags`, `sale`, `video_memory`) VALUES
(11, 'Huawei Mate S', 'huawei', 5500, 2, 'resources/upload/products_img/7136267312547.jpg', 'https://www.youtube.com/embed/CzAtyT0BfQs', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (optional)_\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 / TD-SCDMA - CRR-UL00\r\n 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - CRR-L09_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 17(700), 20(800), 38(2600), 39(1900), 40(2300), 41(2500) - CRR-UL00\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 2526, 28(700), 40(2300) - CRR-L09_\r\nHSPA, LTE_\r\nYes_\r\nYes', '2015, September_\r\nAvailable. Released 2015, October', '149.8 x 75.3 x 7.2 mm (5.90 x 2.96 x 0.28 in)_\r\n156 g (5.50 oz)_\r\nOptional Dual SIM (Nano-SIM, dual stand-by)', 'AMOLED capacitive touchscreen, 16M colors_\n5.5 inches (~73.9% screen-to-body ratio)_\n1080 x 1920 p', 'Android OS, v5.1.1 (Lollipop), planned upgrade to v6.0 (Marshmallow)_\r\nHiSilicon Kirin 935_\r\nQuad-co', ' up to 128 GB (uses SIM 2 slot)_\r\n32/64/128 GB, 3 GB RAM', '13 MP, OIS, _autofocus, dual-LED (dual tone) flash_\nGeo-tagging, touch focus, face _\ndetection, HD', 'Vibration; MP3, WAV ringtones_\r\nYes_\r\nYes_\r\n\r\n\r\n', 'Wi-Fi 802.11 b/g/n, hotspot_\r\nv4.0, A2DP_\r\nYes,_ with A-GPS, GLONASS/ BDS (market dependant)_\r\nYes\r\n', 'Fingerprint, accelerometer, gyro, proximity, compass_\r\nSMS(threaded view), MMS, Email, Push Email_\r\nHTML5 _\r\nJava	No \r\n', 'Non-removable 2700 mAh battery_', 1, '', 'Huawei Mate S mobile', 0, ''),
(13, 'Samsung Galaxy S6 Edge plus', 'samsung', 5999, -2, 'resources/upload/products_img/7205samsung-galaxy-s6-edge-plus-5.jpg', 'https://www.youtube.com/embed/_Q-p-zkydLQ', 'GSM 850 / 900 / 1800 / 1900_\r\nHSDPA 850 / 1700(AWS) / 1900 / 2100 - G928T, G928A\r\n 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - G928I_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 20(800) - G928T\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 12(700), 17(700), 20(800) - G928A\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 26(850), 28(700), 40(2300) - G928I_\r\nHSPA 42.2/5.76 Mbps, LTE Cat6 300/50 Mbps/ LTE Cat9 450/50 Mbps_\r\nYes_\r\nYes', '2015, August_\r\nAvailable. Released 2015, August', '154.4 x 75.8 x 6.9 mm (6.08 x 2.98 x 0.27 in)_\r\n153 g (5.40 oz)', 'Super AMOLED capacitive touchscreen, 16M colors_\r\n5.7 inches (~75.6% screen-to-body ratio)_\r\n1440 x 2560 pixels (~518 ppi pixel density)', 'Android OS, v5.1.1 (Lollipop)_\r\nExynos 7420_\r\nCPU	Quad-core 1.5 GHz Cortex-A53 & Quad-core 2.1 GHz Cortex-A57', 'No_\r\n32/64 GB, 4 GB RAM', '16 MP, f/1.9, 28mm, OIS, autofocus, LED flash, check quality_\r\n1/2.6" sensor size, 1.12 Âµm pixel size, geo-tagging, touch focus, face detection, Auto HDR, panorama_\r\n2160p@30fps, 1080p@60fps, 720p@120fps, HDR, dual-video rec., check quality_\r\n5 MP, f/1.9, 22mm, 1440p@30fps, dual video call, Auto HDR', 'Vibration; MP3, WAV ringtones_\r\nYes_\r\nYes', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot_\r\nv4.2, A2DP, LE, apt-X_\r\nYes, with A-GPS, GLONASS, BDS_\r\nNo_\r\nmicroUSB v2.0, USB Host', 'Fingerprint, accelerometer, gyro, proximity, compass, barometer, heart rate, SpO2_\r\nSMS(threaded view), MMS, Email, Push Mail, IM_\r\nHTML5_\r\nNo', 'Non-removable Li-Ion 3000 mAh battery_', 1, '', 'Samsung Galaxy S6 Edge plus mobile', 15, ''),
(14, 'Apple iPhone 6 Plus', 'apple', 6450, 3, 'resources/upload/products_img/68593639apple-iphone-6-plus-1.jpg', 'https://www.youtube.com/embed/Nr0_byEB3bo', 'GSM 850 / 900 / 1800 / 1900 - A1522 (GSM), A1522 (CDMA), A1524\r\n 	CDMA 800 / 1700 / 1900 / 2100 - A1522 (CDMA), A1524_\r\nHSDPA 850 / 900 / 1700 / 1900 / 2100 - A1522 (GSM), A1522 (CDMA), A1524\r\n 	CDMA2000 1xEV-DO - A1522 (CDMA), A1524\r\n 	TD-SCDMA 1900 / 2000 - A1524_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 13(700), 17(700), 18(800), 19(800), 20(800), 25(1900), 26(850), 28(700), 29(700) - A1522 GSM, A1522 CDMA\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 13(700), 17(700), 18(800), 19(800), 20(800), 25(1900), 26(850), 28(700), 29(700), 38(2600), 39(1900), 40(2300), 41(2500) - A1524_\r\nHSPA 42.2/5.76 Mbps, LTE Cat4 150/50 Mbps, EV-DO Rev.A 3.1 Mbps_\r\nYes_\r\nYes', '2014, September_\r\nAvailable. Released 2014, Septembe', '158.1 x 77.8 x 7.1 mm (6.22 x 3.06 x 0.28 in)_\r\n172 g (6.07 oz)', 'LED-backlit IPS LCD, capacitive touchscreen, 16M colors_\r\n5.5 inches (~67.8% screen-to-body ratio)_\r\n1080 x 1920 pixels (~401 ppi pixel density)', 'iOS 8, upgradable to iOS 9.2_\r\nApple A8_\r\nDual-core 1.4 GHz Typhoon (ARM v8-based)', 'No_\r\n16/64/128 GB, 1 GB RAM DDR3', '8 MP, f/2.2, 29mm, OIS, phase detection autofocus, dual-LED (dual tone) flash, _\r\n1/3" sensor size, 1.5 Âµm pixel size, touch focus, geo-tagging, face/smile detection, HDR (photo/panorama)_\r\n1080p@60fps, 720p@240fps, optical stabilization, check quality_\r\n1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', 'Vibration, proprietary ringtones_\r\nYes_\r\nYes', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot_\r\nv4.0, A2DP, LE_\r\nYes, with A-GPS, GLONASS_\r\nNo_\r\nv2.0, reversible connector', 'Fingerprint, accelerometer, gyro, proximity, compass, barometer_\r\nMessage, SMS (threaded view), MMS, Email, Push Email_\r\nHTML5 (Safari)_\r\nNo', 'Up to 384 h (3G)_\r\nUp to 24 h (3G)', 1, '', '', 0, ''),
(15, 'Samsung Galaxy Note 4 LTE N910C', 'samsung', 4499, 9, 'resources/upload/products_img/832912537.jpg', 'https://www.youtube.com/embed/30Q_3w-GxOk', 'GSM 850 / 900 / 1800 / 1900_\r\nHSDPA 850 / 900 / 1900 / 2100\r\n 	HSDPA 850 / 1700 / 1900 / 2100 - N910W8_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 17(700), 20(800) - N910F, N910C\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 28(700), 38(2600), 40(2300) - N910G\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700) - N910W8\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 28(700) - N910U_\r\nHSPA 42.2/5.76 Mbps, LTE Cat4 150/50 Mbps (Exynos 5433)\r\nHSPA 42.2/5.76 Mbps, LTE Cat6 300/50 Mbps (Snapdragon 805)_\r\nYes_\r\nYes', '2014, September_\r\nAvailable. Released 2014, October', '153.5 x 78.6 x 8.5 mm (6.04 x 3.09 x 0.33 in)_\r\n176 g (6.21 oz)', 'Super AMOLED capacitive touchscreen, 16M colors_\r\n5.7 inches (~74.2% screen-to-body ratio)_\r\n1440 x 2560 pixels (~515 ppi pixel density)', 'Android OS, v4.4.4 (KitKat), v5.0.1 (Lollipop), upgradable to v5.1.1 (Lollipop)_\r\nQualcomm Snapdragon 805_\r\nExynos 5433_\r\nQuad-core 2.7 GHz Krait 450 (Snapdragon 805)_\r\nQuad-core 1.3 GHz Cortex-A53 & Quad-core 1.9 GHz Cortex-A57 (Exynos 5433)', 'microSD, up to 128 GB_\r\n32 GB, 3 GB RAM', '16 MP, f/2.2, 31mm, OIS, autofocus, LED flash, check quality_\r\n1/2.6" sensor size, 1.12 Âµm pixel size, geo-tagging, touch focus, face/smile detection, panorama, HDR_\r\n2160p@30fps, 1080p@60fps, dual-video rec., check quality_\r\n3.7 MP, f/1.9, 22mm, 1440p@30fps, 1080p (HDR)', 'Vibration; MP3, WAV ringtones_\r\nYes_\r\nYes', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot_\r\nv4.1, A2DP, EDR, LE_\r\nYes, with A-GPS, GLONASS, BDS_\r\nYes_\r\nYes_\r\nNo_\r\nmicroUSB v2.0 (MHL 3 TV-out), USB Host', 'Fingerprint, accelerometer, gyro, proximity, compass, barometer, gesture, UV, heart rate, SpO2_\r\nSMS(threaded view), MMS, Email, Push Mail, IM_\r\nHTML5_\r\nNo', 'Li-Ion 3220 mAh battery_	\r\nUp to 20 h (3G)_', 1, '', '', 0, ''),
(16, 'Sony Xperia M2 Dual Sim', 'sony', 1750, 0, 'resources/upload/products_img/68927847286.jpg', 'https://www.youtube.com/embed/Hgm7sPbXeVk', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (optional)_\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 / TD-SCDMA - CRR-UL00\r\n 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - CRR-L09_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 17(700), 20(800), 38(2600), 39(1900), 40(2300), 41(2500) - CRR-UL00\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 2526, 28(700), 40(2300) - CRR-L09_\r\nHSPA, LTE_\r\nYes_\r\nYes', '2015, September_\r\nAvailable. Released 2015, October', '149.8 x 75.3 x 7.2 mm (5.90 x 2.96 x 0.28 in)_\r\n156 g (5.50 oz)_\r\nOptional Dual SIM (Nano-SIM, dual stand-by)', 'AMOLED capacitive touchscreen, 16M colors_\r\n5.5 inches (~73.9% screen-to-body ratio)_\r\n1080 x 1920 p', 'Android OS, v5.1.1 (Lollipop), planned upgrade to v6.0 (Marshmallow)_\r\nHiSilicon Kirin 935_\r\nQuad-co', ' up to 128 GB (uses SIM 2 slot)_\r\n32/64/128 GB, 3 GB RAM', '13 MP, OIS, _autofocus, dual-LED (dual tone) flash_\r\nGeo-tagging, touch focus, face _\r\ndetection, HD', 'Vibration; MP3, WAV ringtones_\r\nYes_\r\nYes_\r\n', 'Wi-Fi 802.11 b/g/n, hotspot_\r\nv4.0, A2DP_\r\nYes,_ with A-GPS, GLONASS/ BDS (market dependant)_\r\nYes\r\n', 'Fingerprint, accelerometer, gyro, proximity, compass_\r\nSMS(threaded view), MMS, Email, Push Email_\r\nHTML5 _\r\nJava	No \r\n', 'Non-removable 2700 mAh battery_', 1, '', '', 0, ''),
(17, 'Sony Xperia C3 Dual international warranty', 'sony', 1999, 4, 'resources/upload/products_img/133252753411.jpg', 'https://www.youtube.com/embed/YToio7g6hAw', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2_\r\nHSDPA 850 / 900 / 1900 / 2100_\r\nNo_\r\nHSPA 42.2/5.76 Mbps_\r\nUp to 107 kbps_\r\nUp to 296 kbps', '2014, July_\r\nAvailable. Released 2014, August', '156.2 x 78.7 x 7.6 mm (6.15 x 3.10 x 0.30 in)_\r\n149.7 g (5.29 oz)', 'IPS LCD capacitive touchscreen, 16M colors_\r\n5.5 inches (~67.8% screen-to-body ratio)\r\n_720 x 1280 pixels (~267 ppi pixel density)', 'Android OS, v4.4.2 (KitKat), v5.0.2 (Lollipop), planned upgrade to v5.1 (Lollipop)\r\n_Qualcomm MSM8926 Snapdragon 400\r\n_Quad-core 1.2 GHz Cortex-A7', 'microSD, up to 32 GB_\r\n8 GB, 1 GB RAM', '8 MP, f/2.3, autofocus, LED flash, check quality_\r\nGeo-tagging, touch focus, face/smile detection, panorama, HDR\r\n_1080p, HDR_', 'Vibration; MP3, WAV ringtones\r\n_Yes\r\n_Yes', 'Wi-Fi 802.11 b/g/n, Wi-Fi Direct, DLNA, hotspot\r\n_v4.0, A2DP\r\n_Yes, with A-GPS, GLONASS\r\n_Yes\r\n_FM radio with RDS\r\n_microUSB v2.0', 'Accelerometer, proximity, compass\r\n_SMS (threaded view), MMS, Email, IM, Push Email\r\n_HTML5\r\n_No', 'Up to 1040 h (2G) / Up to 960 h (3G)\r\n_Up to 11 h (2G) / Up to 25 h (3G)', 1, '', '', 0, ''),
(18, 'Sony Xperia Z2 international warranty', 'sony', 3375, 5, 'resources/upload/products_img/89691407287.jpg', 'https://www.youtube.com/embed/1sl02KinSr8', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (optional)_\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 / TD-SCDMA - CRR-UL00\r\n 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - CRR-L09_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 17(700), 20(800), 38(2600), 39(1900), 40(2300), 41(2500) - CRR-UL00\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 2526, 28(700), 40(2300) - CRR-L09_\r\nHSPA, LTE_\r\nYes_\r\nYes', '2015, September_\r\nAvailable. Released 2015, October', '149.8 x 75.3 x 7.2 mm (5.90 x 2.96 x 0.28 in)_\r\n156 g (5.50 oz)_\r\nOptional Dual SIM (Nano-SIM, dual stand-by)', 'AMOLED capacitive touchscreen, 16M colors_\r\n5.5 inches (~73.9% screen-to-body ratio)_\r\n1080 x 1920 p', 'Android OS, v5.1.1 (Lollipop), planned upgrade to v6.0 (Marshmallow)_\r\nHiSilicon Kirin 935_\r\nQuad-co', ' up to 128 GB (uses SIM 2 slot)_\r\n32/64/128 GB, 3 GB RAM', '13 MP, OIS, _autofocus, dual-LED (dual tone) flash_\r\nGeo-tagging, touch focus, face _\r\ndetection, HD', 'Vibration; MP3, WAV ringtones_\r\nYes_\r\nYes_\r\n', 'Wi-Fi 802.11 b/g/n, hotspot_\r\nv4.0, A2DP_\r\nYes,_ with A-GPS, GLONASS/ BDS (market dependant)_\r\nYes\r\n', 'Fingerprint, accelerometer, gyro, proximity, compass_\r\nSMS(threaded view), MMS, Email, Push Email_\r\nHTML5 _\r\nNo \r\n', 'Non-removable 2700 mAh battery_', 1, '', '', 0, ''),
(19, 'Sony Xperia Z3 Dual', 'sony', 4750, 7, 'resources/upload/products_img/399360633413.jpg', 'https://www.youtube.com/embed/A3mtqL0Gt7I', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (optional)_\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 / TD-SCDMA - CRR-UL00\r\n 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - CRR-L09_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 17(700), 20(800), 38(2600), 39(1900), 40(2300), 41(2500) - CRR-UL00\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 2526, 28(700), 40(2300) - CRR-L09_\r\nHSPA, LTE_\r\nYes_\r\nYes', '2015, September_\r\nAvailable. Released 2015, October', '149.8 x 75.3 x 7.2 mm (5.90 x 2.96 x 0.28 in)_\r\n156 g (5.50 oz)_\r\nOptional Dual SIM (Nano-SIM, dual stand-by)', 'AMOLED capacitive touchscreen, 16M colors_\r\n5.5 inches (~73.9% screen-to-body ratio)_\r\n1080 x 1920 p', 'Android OS, v5.1.1 (Lollipop), planned upgrade to v6.0 (Marshmallow)_\r\nHiSilicon Kirin 935_\r\nQuad-co', ' up to 128 GB (uses SIM 2 slot)_\r\n32/64/128 GB, 3 GB RAM', '13 MP, OIS, _autofocus, dual-LED (dual tone) flash_\r\nGeo-tagging, touch focus, face _\r\ndetection, HD', 'Vibration; MP3, WAV ringtones_\r\nYes_\r\nYes_\r\n', 'Wi-Fi 802.11 b/g/n, hotspot_\r\nv4.0, A2DP_\r\nYes,_ with A-GPS, GLONASS/ BDS (market dependant)_\r\nYes\r\n', 'Fingerprint, accelerometer, gyro, proximity, compass_\r\nSMS(threaded view), MMS, Email, Push Email_\r\nHTML5 _\r\nNo \r\n', 'Non-removable 2700 mAh battery_', 1, '', '', 20, ''),
(20, 'Sony Xperia Z5 Compact', 'sony', 5700, 1, 'resources/upload/products_img/1638205912531.jpg', 'https://www.youtube.com/embed/OGqfFQdSbIw', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (optional)_\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 / TD-SCDMA - CRR-UL00\r\n 	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - CRR-L09_\r\nLTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 17(700), 20(800), 38(2600), 39(1900), 40(2300), 41(2500) - CRR-UL00\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 2526, 28(700), 40(2300) - CRR-L09_\r\nHSPA, LTE_\r\nYes_\r\nYes', '2015, September_\r\nAvailable. Released 2015, October', '149.8 x 75.3 x 7.2 mm (5.90 x 2.96 x 0.28 in)_\r\n156 g (5.50 oz)_\r\nOptional Dual SIM (Nano-SIM, dual stand-by)', 'AMOLED capacitive touchscreen, 16M colors_\r\n5.5 inches (~73.9% screen-to-body ratio)_\r\n1080 x 1920 p', 'Android OS, v5.1.1 (Lollipop), planned upgrade to v6.0 (Marshmallow)_\r\nHiSilicon Kirin 935_\r\nQuad-co', ' up to 128 GB (uses SIM 2 slot)_\r\n32/64/128 GB, 3 GB RAM', '13 MP, OIS, _autofocus, dual-LED (dual tone) flash_\r\nGeo-tagging, touch focus, face _\r\ndetection, HD', 'Vibration; MP3, WAV ringtones_\r\nYes_\r\nYes_\r\n', 'Wi-Fi 802.11 b/g/n, hotspot_\r\nv4.0, A2DP_\r\nYes,_ with A-GPS, GLONASS/ BDS (market dependant)_\r\nYes\r\n', 'Fingerprint, accelerometer, gyro, proximity, compass_\r\nSMS(threaded view), MMS, Email, Push Email_\r\nHTML5 _\r\nNo \r\n', 'Non-removable 2700 mAh battery_', 1, '', '', 0, ''),
(47, 'HP Probook 450 g2 i7-8G-1tb', 'Hp', 6149, 3, 'resources/upload/products_img/88556094laptop.png', '', '', '', '', '', '', '', '', '', '', '', '', 2, '<p>&lt;p&gt;&lt;label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; color: #134f5c; float: left; width: 200px; text-transform: uppercase; font-family: Arial; border-radius: 0px !important;"&gt;CONNECTOR TYPE:&lt;/label&gt;&lt;/p&gt;</p>\n<p>&lt;div class="feature-value" style="border: 0px; font-size: 13px; margin: 0px 40px 0px 220px; padding: 12px 0px; font-family: Arial; color: #134f5c; border-radius: 0px !important;"&gt;</p>\n<p>&lt;ul class="no-markers no-margin" style="border: 0px; margin: 5px 0px 5px 40px; padding: 0px; list-style-type: none; border-radius: 0px !important;"&gt;</p>\n<p>&lt;li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0', '', 0, ''),
(50, 'ACER-ASPIRE-E1-570 I3 / 4GB / 750GB / WIN 8.1', 'asus', 5300, 3, 'resources/upload/products_img/4357AcerAspireE5-573__1__03_h89z-s3.png', 'ewqeq', ' Intel Core i3-3217U Processor (3M Cache, 1.80 GHz)', ' Intel HD Graphics', ' 4 GB', '750', '15.6', '2 x USB 2.0 1 x USB 3.0 1 x HDMI 1 x VGA 1 x Headphone/Microphone 1 x Ethernet 1 x DC-in 1 x SD Card Reader', ' Microsoft Windows 8', 'Bluetooth Webcam Wireless', 'Bluetooth Webcam Wireless', 'black', '1 year', 2, '', '', 30, ''),
(52, 'ASUS Transformer Book T100TA-DK048H', 'asus', 2299, 2, 'resources/upload/products_img/4239874419s.PNG', '', ' IntelÂ® Atomâ„¢ Processor Z3735E (2M Cache, up to 1.83 GHz)', ' IntelÂ® HD Graphics', ' 2 GB', ' 32GB SSD', ' HD 1366x768', '1 x USB 3.0 1 x HDMI 1 x Headphone/Microphone 1 x Ethernet 1 x DC-in 1 x SD Card Reader', 'Microsoft Windows 8.1', 'Bluetooth Webcam Wireless', 'Bluetooth Webcam Wireless', 'Silver', ' One Year', 2, '', '', 20, ''),
(54, 'Huawei Mate 8', 'huawei', 4199, 2, 'resources/upload/products_img/9823huaweimate8silver.png', 'https://www.youtube.com/embed/kxL7Xdmnq0Y', '2G bands :	GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (optional)\r\n3G bands: 	HSDPA 800 / 850 / 900 / 1700(AWS) / 1900 / 2100 - NXT-L29, NXT-L09\r\n4G bands: 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 6(900), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 26(850), 38(2600), 39(1900), 40(2300) - NXT-L29\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 6(900), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 26(850), 28(700), 38(2600), 39(1900), 40(2300) - NXT-L09\r\nSpeed:	HSPA 42.2/5.76 Mbps, LTE Cat6 300/50 Mbps\r\nGPRS:	Yes\r\nEDGE:	Yes', '2015, November\r\nStatus:	Available. Released 2015, November', 'Dimensions:	157.1 x 80.6 x 7.9 mm (6.19 x 3.17 x 0.31 in)\r\nWeight:    	185 g (6.53 oz)\r\nSIM	Nano-SIM - NXT-L09\r\nDual SIM (Nano-SIM, dual stand-by) - NXT-L29\r\n', 'Type	:      IPS-NEO LCD capacitive touchscreen, 16M colors\r\nSize: 	6.0 inches (~78.0% screen-to-body ratio)\r\nResolution: 	1080 x 1920 pixels (~368 ppi pixel density)\r\nMultitouch:	Yes\r\nProtection:       	Corning Gorilla Glass 4\r\n 	- Emotion UI 4.0', 'OS:   	Android OS, v6.0 (Marshmallow)\r\nChipset:  	HiSilicon Kirin 950\r\nCPU: 	Quad-core 2.3 GHz Cortex-A72 + quad-core 1.8 GHz Cortex A53\r\nGPU: 	Mali-T880 MP4', 'Card slot:	       microSD, up to 256 GB (uses SIM 2 slot)\r\nInternal:   	32 GB, 3 GB RAM - NXT-L09, NXT-L29\r\n64 GB, 4 GB RAM - NXT-L29', 'Primary:    	16 MP, f/2.0, 27mm, OIS, phase detection autofocus, dual-LED (dual tone) flash, check quality\r\nFeatures:  	1/2.8" sensor size, geo-tagging, touch focus, face/smile detection, panorama, HDR\r\nVideo:	1080p@60fps, 1080p@30fps, 720p@120fps, check quality\r\nSecondary:     	8 MP, f/2.4, 26mm, 1080p', 'Card slot: 	microSD, up to 256 GB (uses SIM 2 slot)\r\nInternal:   	32 GB, 3 GB RAM - NXT-L09, NXT-L29\r\n64 GB, 4 GB RAM - NXT-L29', 'WLAN:	  Wi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, WiFi Direct, hotspot\r\nBluetooth	v4.2, A2DP, EDR, LE\r\nGPS: 	Yes, with A-GPS, GLONASS, BDS\r\nNFC: 	Yes\r\nRadio: 	FM radio\r\nUSB: 	microUSB v2.0, USB Host', 'Sensors:   	Fingerprint, accelerometer, gyro, proximity, barometer, compass\r\nMessaging:	SMS (threaded view), MMS, Email, Push Email\r\nBrowser:   	HTML5\r\nJava	:              No\r\n 	- Fast battery charging: 37% in 30 min\r\n- DivX/XviD/MP4/H.265/WMV player\r\n- MP3/eAAC+/WMA/WAV/Flac player\r\n- Document editor\r\n- Photo/video editor', ' 	Non-removable Li-Po 4000 mAh battery\r\nStand-by: 	Up to 528 h (3G)\r\nMusic play:	Up to 98 h', 1, '', 'Huawei Mate 8 mobile phone', 10, '');
INSERT INTO `specifications` (`id`, `name`, `type`, `price`, `product_quantity`, `image`, `video`, `network`, `launch`, `body`, `display`, `platform`, `memory`, `camera`, `sound`, `comms`, `features`, `battery`, `cat_id`, `descrip`, `tags`, `sale`, `video_memory`) VALUES
(55, 'Samsung NX2000 digital camera', 'samsung', 399, 1, 'resources/upload/products_img/51048937ZURFLASH.png', 'https://www.youtube.com/embed/W6vSAJZbY64', '', '', '', '', '', '', '', '', '', '', '', 5, '<div class="a-column a-span6" style="box-sizing: border-box; margin-right: 26.25px; float: left; min-height: 1px; overflow: visible; width: 642.672px; color: #111111; font-family: Arial, sans-serif; font-size: 13px; line-height: 19px;">\r\n<table class="a-keyvalue" style="box-sizing: border-box; margin-bottom: 22px; border-collapse: collapse; width: 642px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #e7e7e7;">\r\n<tbody style="box-sizing: border-box;">\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Auto Focus Technology</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">\r\n<ul class="a-nostyle a-vertical" style="box-sizing: border-box; padding: 0px; margin: 0px 0px 0px !important 0px;">\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Contrast Detect (sensor)</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Multi-area</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Selective single-point</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Single</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Continuous</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Face Detection</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Live View</span></li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Autofocus Points</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">21</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Battery Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Lithium Ion</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Color</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Black</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Compatible Mountings</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Samsung NX</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Continuous Shooting Speed</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">10 fps</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Display</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">TFT LCD</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Display Fixture Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Fixed</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Display Resolution Maximum</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">1152000</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Display Size</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">3.7 inches</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Effective Still Resolution</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">20.3 MP</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Expanded ISO Maximum</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">25,600</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Expanded ISO Minimum</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">100</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Exposure Control Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">\r\n<ul class="a-nostyle a-vertical" style="box-sizing: border-box; padding: 0px; margin: 0px 0px 0px !important 0px;">\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Program</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Aperture Priority</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Shutter Priority</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Manual</span></li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">External Memory Included</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">No</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">File Format</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">RAW (SRW), JPEG (EXIF 2.21), DCF, DPOF 1.1, PictBridge 1.0</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Flash Memory Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">MicroSD/ MicroSDHC/ MicroSDXC</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Flash Modes Description</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">\r\n<ul class="a-nostyle a-vertical" style="box-sizing: border-box; padding: 0px; margin: 0px 0px 0px !important 0px;">\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">auto</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">fill</span></li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Flash Sync Speed</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">1/180_sec</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Flash Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Hot-shoe, SEF8A</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Flash Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">hot shoe</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Focus Description</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Contrast Detect</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Focus Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Includes Manual Focus</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Form Factor</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Rangefinder-style mirrorless</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">GPS</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Optional</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">HDMI Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Yes</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">ISO Range</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Auto, 100, 200, 400, 800, 1600, 3200, 6400, 12800, 25600</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class="a-column a-span6 a-span-last" style="box-sizing: border-box; margin-right: 0px; float: right; min-height: 1px; overflow: visible; width: 642.672px; color: #111111; font-family: Arial, sans-serif; font-size: 13px; line-height: 19px;">\r\n<table class="a-keyvalue" style="box-sizing: border-box; margin-bottom: 22px; border-collapse: collapse; width: 642px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #e7e7e7;">\r\n<tbody style="box-sizing: border-box;">\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Image Aspect Ratio</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">1:1, 3:2, 16:9</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Image Stabilization</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Unknown</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Image types</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">\r\n<ul class="a-nostyle a-vertical" style="box-sizing: border-box; padding: 0px; margin: 0px 0px 0px !important 0px;">\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">JPEG</span></li>\r\n<li style="box-sizing: border-box; list-style: none; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">RAW</span></li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Item Dimensions</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">2.56 x 1.42 x 4.69 inches</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Item Weight</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">0.5 pounds</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Lens Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Interchangeable</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Lithium Battery Energy Content</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">8.58 Watt Hours</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Lithium Battery Voltage</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">7.6 Volts</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Lithium Battery Weight</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">46 grams</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Manufacturer Warranty Description</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">1 year parts &amp; labor</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Maximum Shutter Speed</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">30 seconds</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Maximum horizontal resolution</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">5,472</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Metering</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Multi, Center-weighted, Spot</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Model Year</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">2014</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Optical Sensor Resolution</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">20.3 MP</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Optical Sensor Technology</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">CMOS</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Optical Zoom</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">50x</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Photo Filter Thread Size</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">40.5 mm</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Photo Sensor Technology</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">CMOS</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Removable Memory</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">microSDXC</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Shipping Weight</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">1.81 pounds</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Style Name</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">with 20-50mm Lens</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Supported Battery Types</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Lithium-Ion BP1130 battery &amp; charger</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Touch Screen Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Yes</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">USB 2.0</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">1</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Video Capture Format</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">mpeg-4;h.264</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Video Capture Resolution</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">1080p_hd</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Viewfinder Type</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">None</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<th class="a-nowrap" style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; white-space: nowrap; font-weight: 400; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7; background-color: #f3f3f3;">Water Resistance Level</th>\r\n<td style="box-sizing: border-box; vertical-align: top; padding: 7px 14px 6px; border-top-width: 1px; border-top-style: solid; border-top-color: #e7e7e7;">Not Water Resistant</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', 'Samsung NX2000 digital camera', 0, ''),
(59, 'HP 255 G4 E1-6015', 'Hp', 2799, 2, 'resources/upload/products_img/6375hp00_255g4.png', '', ' AMD Dual-Core E1-6015 (1.4 GHz, 1 MB cache)', ' 512MB UP TO 2G', '4 GB', ' 500 GB', ' HD 1366x768', '2 x USB 2.0 1 x USB 3.0 1 x HDMI 1 x VGA 1 x Headphone/Microphone 1 x Ethernet 1 x DC-in 1 x SD Card Reader', ' DOS', 'Bluetooth Webcam Wireless', 'Bluetooth Webcam Wireless', 'Black', ' One Year', 2, '', 'computer  HP 255 G4 E1-6015 / 4G / 500G laptop', 0, ''),
(60, 'Lenovo Yoga Tablet 2-830L', 'lenovo', 2299, 1, 'resources/upload/products_img/2113yoga_2-1.png', '', '', '', '', '', '', '', '', '', '', '', '', 5, '<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">SIM:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">micro sim</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">NETWORK:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">\r\n<ul class="no-markers no-margin" style="border: 0px; margin: 5px 0px 5px 40px; padding: 0px; list-style-type: none; border-radius: 0px !important;">\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">3G</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">OPERATING SYSTEM:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">Android 4.4 (KitKat)</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">CHIPSET:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">Intel Atom Z3745</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">CPU:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">Quad-core 1.3 GHz</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">GPU:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">Intel Gen 7 (Ivy Bridge)</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">SCREEN TYPE:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">IPS</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">SCREEN SIZE:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">8 inch</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">SCREEN RESOLUTION:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">1200 x 1920 pixels</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">RAM:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">2 GB</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">STORAGE:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">16 GB</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">CAMERA:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">8 megapixels, Primary</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">CAMERA:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">1.6 megapixels, Secondary</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">SENSORS:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">\r\n<ul class="no-markers no-margin" style="border: 0px; margin: 5px 0px 5px 40px; padding: 0px; list-style-type: none; border-radius: 0px !important;">\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">Accelerometer</li>\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">compass</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">FEATURES:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">\r\n<ul class="no-markers no-margin" style="border: 0px; margin: 5px 0px 5px 40px; padding: 0px; list-style-type: none; border-radius: 0px !important;">\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">Bluetooth</li>\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">Card slot</li>\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">GPS</li>\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">Java</li>\r\n<li style="border: 0px; margin: 0px 0px 5px; padding: 0px 0px 0px 18px; text-align: left; list-style-type: none; position: relative; vertical-align: top; border-radius: 0px !important; background-image: none;">WLAN</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">BATTERY:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">6400 mAh</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important; background-color: #eeeeef;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">DIMENSIONS:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">210 x 149 x 7 mm</div>\r\n</div>\r\n<div class="control-group" style="border: 0px; font-size: 13px; margin: 0px; padding: 0px; font-family: Arial; color: #134f5c; vertical-align: middle; overflow: hidden; border-radius: 0px !important;"><label style="border: 0px; font-size: 12px; margin: 0px; padding: 12px 10px; display: block; float: left; width: 200px; text-transform: uppercase; border-radius: 0px !important;">WEIGHT:</label>\r\n<div class="feature-value" style="border: 0px; margin: 0px 40px 0px 220px; padding: 12px 0px; border-radius: 0px !important;">419 G</div>\r\n</div>', ' tablet Lenovo Yoga Tablet 2-830L ', 0, ''),
(62, 'Huawei P8', 'huawei', 3700, 2, 'resources/upload/products_img/5565TLSPHUA00014CE_1.png', 'https://www.youtube.com/embed/TdTjv-t1xi4', '2G bands	GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2\r\n3G bands	HSDPA 850 / 900 / 1700 / 1900 / 2100 - UL00\r\n 	HSDPA 800 / 850 / 900 / 1700 / 1800 / 1900 / 2100 - L09\r\n4G bands	LTE band 1(2100), 3(1800), 4(1700/2100), 7(2600), 38(2600), 39(1900), 40(2300), 41(2500) - UL00\r\n 	LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 17(700), 18(800), 19(800), 20(800), 25(1900), 26(850), 28(700), 40(2300) - L09\r\nSpeed	HSPA 42.2/5.76 Mbps, LTE Cat6 300/50 Mbps\r\nGPRS	Yes\r\nEDGE	Yes', 'Announced	2015, April\r\nStatus	Available. Released 2015, April', 'Dimensions	144.9 x 72.1 x 6.4 mm (5.70 x 2.84 x 0.25 in)\r\nWeight	144 g (5.08 oz)\r\nBuild	Corning Gorilla Glass 3 back panel\r\nSIM	Dual SIM (Nano-SIM, dual stand-by)', 'Type	IPS-NEO LCD capacitive touchscreen, 16M colors\r\nSize	5.2 inches (~71.4% screen-to-body ratio)\r\nResolution	1080 x 1920 pixels (~424 ppi pixel density)\r\nMultitouch	Yes\r\nProtection	Corning Gorilla Glass 3\r\n 	- Emotion 3.1 UI', 'OS	Android OS, v4.4.2 (KitKat), v5.0.2 (Lollipop), planned upgrade to v6.0 (Marshmallow)\r\nChipset	HiSilicon Kirin 930/935\r\nCPU	Quad-core 2.0 GHz Cortex-A53 & quad-core 1.5 GHz Cortex-A53\r\nGPU	Mali-T628 MP4', 'Card slot	microSD, up to 256 GB (uses SIM 2 slot)\r\nInternal	16/64 GB, 3 GB RAM', '	Primary	13 MP, f/2.0, 28mm, autofocus, OIS, dual-LED (dual tone) flash, check quality\r\nFeatures	1.12 Âµm pixel size, geo-tagging, touch focus, face/smile detection, panorama, HDR\r\nVideo	1080p@30fps, check quality\r\nSecondary	8 MP, f/2.4, 26mm, 1080p', '	Alert types	Vibration; MP3, WAV ringtones\r\nLoudspeaker	Yes\r\n3.5mm jack	Yes\r\n 	- 24-bit/192kHz audio\r\n- Active noise cancellation with dedicated mic', 'WLAN	Wi-Fi 802.11 a/b/g/n, Wi-Fi Direct, DLNA, hotspot\r\nBluetooth	v4.1, A2DP, LE\r\nGPS	Yes, with A-GPS, GLONASS/ BDS (market dependant)\r\nNFC	Yes\r\nRadio	FM radio\r\nUSB	microUSB v2.0, USB Host', 'Sensors	Accelerometer, gyro, proximity, compass\r\nMessaging	SMS(threaded view), MMS, Email, Push Mail, IM\r\nBrowser	HTML5\r\nJava	No', 'Non-removable Li-Po 2680 mAh battery', 1, '', 'Huawei P8 mobile phone', 0, ''),
(63, 'Sony Xperia M4 Aqua', 'sony', 3566, 1, 'resources/upload/products_img/2646-sony-xperia-m4-aqua-1.jpg', 'https://www.youtube.com/embed/KLcyMMXhK1g', '2G bands	GSM 850 / 900 / 1800 / 1900\r\n3G bands	HSDPA 850 / 900 / 1900 / 2100 - E2303, E2353\r\n 	HSDPA 850 / 900 / 1700 / 1900 / 2100 - E2306\r\n4G bands	LTE band 1(2100), 2(1900), 3(1800), 5(850), 7(2600), 8(900), 20(800) - E2303\r\n 	LTE band 2(1900), 4(1700/2100), 5(850), 7(2600), 12(700), 13(700), 17(700), 28(700) - E2306\r\n 	LTE band 1(2100), 3(1800), 5(850), 7(2600), 8(900), 28(700), 40(2300) - E2353\r\nSpeed	HSPA 42.2/5.76 Mbps, LTE Cat4 150/50 Mbps\r\nGPRS	Up to 107 kbps\r\nEDGE	Up to 296 kbps', 'Announced	2015, March\r\nStatus	Available. Released 2015, June', 'Dimensions	145.5 x 72.6 x 7.3 mm (5.73 x 2.86 x 0.29 in)\r\nWeight	136 g (4.80 oz)\r\nSIM	Nano-SIM\r\n 	- IP68 certified - dust and water proof up to 1.5 meter and 30 minutes', 'Type	IPS LCD capacitive touchscreen, 16M colors\r\nSize	5.0 inches (~65.2% screen-to-body ratio)\r\nResolution	720 x 1280 pixels (~294 ppi pixel density)\r\nMultitouch	Yes, up to 4 fingers\r\nProtection	Scratch-resistant glass', 'OS	Android OS, v5.0 (Lollipop), planned upgrade to v6.0 (Marshmallow)\r\nChipset	Qualcomm MSM8939 Snapdragon 615\r\nCPU	Quad-core 1.5 GHz Cortex-A53 & quad-core 1.0 GHz Cortex-A53\r\nGPU	Adreno 405', 'Card slot	microSD, up to 256 GB (dedicated slot)\r\nInternal	8 GB, 2 GB RAM/ 16 GB (E2306)', 'Primary	13 MP, f/2.0, autofocus, LED flash, check quality\r\nFeatures	Geo-tagging, touch focus, face/smile detection, HDR, panorama\r\nVideo	1080p@30fps, check quality\r\nSecondary	5 MP, 720p', 'Alert types	Vibration; MP3, WAV ringtones\r\nLoudspeaker	Yes\r\n3.5mm jack	Yes\r\n 	- Active noise cancellation with dedicated mic', 'WLAN	Wi-Fi 802.11 a/b/g/n, dual-band, Wi-Fi Direct, DLNA, hotspot\r\nBluetooth	v4.1, A2DP\r\nGPS	Yes, with A-GPS, GLONASS\r\nNFC	Yes\r\nRadio	FM radio, RDS\r\nUSB	microUSB v2.0', 'Sensors	Accelerometer, proximity, compass\r\nMessaging	SMS (threaded view), MMS, Email, IM, Push Email\r\nBrowser	HTML5\r\nJava	No', '	Non-removable Li-Ion 2400 mAh battery\r\nStand-by	Up to 681 h (2G) / Up to 685 h (3G)\r\nTalk time	Up to 12 h 40 min (2G) / Up to 13 h 20 min (3G)\r\nMusic play	Up to 64 h 40 min', 1, '', 'Sony Xperia M4 Aqua mobile phone ', 0, '');
INSERT INTO `specifications` (`id`, `name`, `type`, `price`, `product_quantity`, `image`, `video`, `network`, `launch`, `body`, `display`, `platform`, `memory`, `camera`, `sound`, `comms`, `features`, `battery`, `cat_id`, `descrip`, `tags`, `sale`, `video_memory`) VALUES
(64, 'Sony Xperia Z4 Tablet WiFi', 'sony', 3125, 0, 'resources/upload/products_img/4956-sony-xperia-z4-tablet-2.jpg', 'https://www.youtube.com/embed/bClEoTBqyyk', '2G bands	N/A\r\nGPRS	No\r\nEDGE	No', 'Announced	2015, March\r\nStatus	Available. Released 2015, June', 'Dimensions	254 x 167 x 6.1 mm (10.0 x 6.57 x 0.24 in)\r\nWeight	389 g (Wi-FI) (13.72 oz)\r\nSIM	No\r\n 	- IP68 certified - dust and water proof up to 1.5 meter and 30 minutes', 'Type	IPS LCD capacitive touchscreen, 16M colors\r\nSize	10.1 inches (~69.7% screen-to-body ratio)\r\nResolution	2560 x 1600 pixels (~299 ppi pixel density)\r\nMultitouch	Yes, up to 10 fingers\r\nProtection	Scratch-resistant glass, oleophobic coating\r\n 	- Triluminos display\r\n- X-Reality Engine', 'OS	Android OS, v5.0 (Lollipop), planned upgrade to v6.0 (Marshmallow)\r\nChipset	Qualcomm MSM8994 Snapdragon 810\r\nCPU	Quad-core 1.5 GHz Cortex-A53 & Quad-core 2.0 GHz Cortex-A57\r\nGPU	Adreno 430', 'Card slot	microSD, up to 256 GB (dedicated slot)\r\nInternal	32 GB, 3 GB RAM', 'Primary	8.1 MP, autofocus\r\nFeatures	Geo-tagging, touch focus, face/smile detection, HDR\r\nVideo	1080p@30fps, HDR\r\nSecondary	5.1 MP', 'Alert types	Vibration; MP3, WAV ringtones\r\nLoudspeaker	Yes, with stereo speakers\r\n3.5mm jack	Yes', 'WLAN	Wi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, WiFi Direct\r\nBluetooth	v4.1, A2DP, LE, aptX\r\nGPS	Yes, with GLONASS, BDS\r\nNFC	Yes\r\nRadio	FM radio, RDS\r\nUSB	microUSB v2.0 (MHL 3.0 TV-out)', 'Sensors	Accelerometer, gyro, compass\r\nMessaging	Email, Push Mail, IM\r\nBrowser	HTML5\r\nJava	No', '	Non-removable Li-Po 6000 mAh battery\r\nTalk time	Up to 17 h (multimedia)', 3, '', 'Sony Xperia Z4 Tablet WiFi', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `onlin` int(10) NOT NULL,
  `use_chat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `state`, `onlin`, `use_chat`) VALUES
(3, 'eslam', 'mosa', 'eslamslam113@yahoo.com', '12345', 1, 0, 1),
(15, 'slam', 'solom', 'mosa@yahoo.com', '987', 1, 0, 0),
(17, 'mosaaaa', 'moheee', 'mosaali@yahoo.com', '987654385', 0, 0, 0),
(18, 'mosaaaa', 'mohe', 'mosaali@yahoo.com', '12', 1, 1, 1),
(19, 'mosaaaa', 'mohee', 'mosaali@yahoo.com', '10935', 0, 0, 0),
(20, 'mosaaaa', 'moheeee', 'eslamslam113@yahoo.com', '123789', 0, 0, 0),
(21, 'slam', 'mosa1', 'mosaali@yahoo.com', '1298', 0, 0, 0),
(22, 'eslam', 'mosa2', 'eslamslam113@yahoo.com9357147369', '12987', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE IF NOT EXISTS `user_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `storage` varchar(10) NOT NULL,
  `company` varchar(10) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(14) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `phone_id`, `username`, `date`, `status`, `color`, `storage`, `company`, `product_image`, `product_name`, `product_price`, `quantity`) VALUES
(70, 55, 'eslam', '2016-06-17 07:16:42', 'new', 'black', '', 'samsung', 'resources/upload/products_img/6224ZURFLASH.png', 'Samsung NX2000 digital camera', 3999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_in_site`
--

CREATE TABLE IF NOT EXISTS `user_in_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fristname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `telephone` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user_in_site`
--

INSERT INTO `user_in_site` (`id`, `fristname`, `birthday`, `telephone`, `username`, `email`, `password`, `city`, `address`) VALUES
(29, 'mosa', '2016-01-15', 1093507929, 'mosa', 'mosae35@yahoo.com', '12345', 'cairo', 'banisuef'),
(30, 'mosa', '2016-01-05', 212, 'slam', 'hee113@yahoo.com', '12', 'cairo', 'banisuef'),
(31, 'eslam mosa ali', '2016-01-06', 1093507928, 'ahmed', 'mosae35@yahoo.com', '123', 'nasr', 'el morgan streat 123'),
(32, 'slam', '2016-04-06', 1093507928, 'eslam mosa', 'mosae35@yahoo.com', 'slam12345', 'mosa', 'mosa'),
(33, 'ahmed', '2016-07-13', 1093507928, 'ahmed3', 'mosae35@yahoo.com', '123456', 'nasr', 'cairo');

-- --------------------------------------------------------

--
-- Table structure for table `us_ad_chat1`
--

CREATE TABLE IF NOT EXISTS `us_ad_chat1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `us_ad_chat2`
--

CREATE TABLE IF NOT EXISTS `us_ad_chat2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `phone_id`, `username`) VALUES
(106, 13, 'ahmed'),
(107, 20, 'mosa'),
(108, 17, 'mosa'),
(110, 64, 'mosa'),
(111, 50, 'mosa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
