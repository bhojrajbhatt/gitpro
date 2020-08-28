-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2013 at 11:48 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aura`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE IF NOT EXISTS `adds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  `adcode` text NOT NULL,
  `indexing` int(3) NOT NULL,
  `position` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `onDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `adds`
--


-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE IF NOT EXISTS `donate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `dtype` varchar(250) NOT NULL,
  `onDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `donate`
--


-- --------------------------------------------------------

--
-- Table structure for table `enewsletter`
--

CREATE TABLE IF NOT EXISTS `enewsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `zipCode` varchar(7) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` varchar(5) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `onDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `enewsletter`
--

INSERT INTO `enewsletter` (`id`, `firstname`, `lastname`, `email`, `zipCode`, `country`, `gender`, `age`, `profession`, `onDate`) VALUES
(54, '', '', 'yubraj_me@hotmail.coml', '', '', '', '', '', '2012-12-17 16:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `comment` text,
  `onDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `address`, `phone`, `email`, `country`, `comment`, `onDate`) VALUES
(15, 'dfd', 'dfd', NULL, 'kh6ganesh@yahoo.com', 'nepal', 'dd', '2013-02-23 17:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `urlname` varchar(250) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT '',
  `parentId` int(11) NOT NULL DEFAULT '0',
  `shortcontents` text NOT NULL,
  `contents` longtext NOT NULL,
  `linkType` varchar(255) NOT NULL DEFAULT '',
  `weight` int(11) NOT NULL DEFAULT '50',
  `hide` varchar(3) NOT NULL DEFAULT 'no',
  `onDate` date NOT NULL DEFAULT '0000-00-00',
  `image` varchar(250) NOT NULL DEFAULT '',
  `display` varchar(10) NOT NULL,
  `featured` varchar(3) NOT NULL DEFAULT '',
  `code` varchar(15) NOT NULL,
  `price` varchar(10) NOT NULL DEFAULT '',
  `pageTitle` text NOT NULL,
  `pageKeyword` text NOT NULL,
  `duration` int(10) NOT NULL,
  `altitude` varchar(25) NOT NULL,
  `grade` int(1) NOT NULL,
  `groupsize` varchar(250) NOT NULL DEFAULT '',
  `regionId` int(10) NOT NULL,
  `categoryId` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `urlname` (`urlname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=405 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `urlname`, `type`, `parentId`, `shortcontents`, `contents`, `linkType`, `weight`, `hide`, `onDate`, `image`, `display`, `featured`, `code`, `price`, `pageTitle`, `pageKeyword`, `duration`, `altitude`, `grade`, `groupsize`, `regionId`, `categoryId`) VALUES
(1, 'About Us', 'about-us', 'Header', 0, '<br />', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, e&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, e&nbsp;<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, e<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, e<br type="_moz" />', 'Normal Group', 11, 'no', '2012-12-11', '2-1.jpg', 'normal', 'No', '', '', 'about-us', '', 0, '', 0, '', 0, 0),
(404, 'Slider 3', 'slider-3', 'Other', 295, 'lorem ipsum lorem ipsum lorem<br />', '<br />', 'Contents Page', 30, 'no', '2013-07-16', 'aura slider 3.png', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(67, 'Contact Us', 'contact-us', 'Header', 0, '<strong>Arc Aura International Pvt. Ltd.</strong><br />\r\nPutalisadak-33, Kathmandu, Nepal<br />\r\nPh: +977-1-4012528<br />\r\nFax: ---------------<br />\r\nE-mail:&nbsp;&nbsp;&nbsp; <a href="mailto:info@aura.edu.np"><span style="color: rgb(255, 204, 0);">info@aura.edu.np</span></a><br />\r\nWebsite:&nbsp;<a href="http://www.aura.edu.np/"><span style="color: rgb(255, 204, 0);">www.aura.edu.np</span></a><br />', '<strong>Arc Aura International Pvt. Ltd.</strong><br />\r\nPutalisadak-33, Kathmandu, Nepal<br />\r\nPh: +977-1-4012528<br />\r\nFax: ---------------<br />\r\nE-mail:&nbsp;&nbsp;&nbsp; <a href="mailto:info@aura.edu.np"><span style="color: rgb(255, 204, 0);">info@aura.edu.np</span></a><br />\r\nWebsite:&nbsp;<a href="http://www.aura.edu.np/"><span style="color: rgb(255, 204, 0);">www.aura.edu.np</span></a><br />', 'Contents Page', 70, 'no', '2013-02-19', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(401, 'lorem lorem', 'lorem-lorem', 'Other', 398, 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Contents Page', 30, 'no', '2013-07-15', 'man.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(295, 'Slider', 'slider', 'Other', 0, '<br />', '<br />', 'Normal Group', 10, 'no', '2013-05-20', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(168, 'News', 'news', 'Latest News', 0, '', '', 'List', 10, 'no', '2013-05-05', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(71, 'Welcome', 'welcome', 'Other', 0, 'New Y Bright Future Consultancy is a publicly-funded teriary institution dedicated to  the advancement of teaching and learning, through a diverse offering of  academic and research programmers on teacher education and complementary  social sciences and humanities disciplines. <br />\r\n<br />\r\nWe nurture educators and  social leaders who are intellectually active, socially caring, and  globally aware, to become agents of change in the communities that they  serve. We place great emphasis on research capability--- our research  will contribute to the advancement of knowledge. <br />\r\n<br />\r\nscolarship and  innovation, with sustanable inpact on social progress and human  betterment . The institute aims to be a leading institute on education  and vocational training, creating an impact and defining the education  landscape.<br />', 'New Y Bright Future Consultancy is a publicly-funded teriary institution dedicated to the advancement of teaching and learning, through a diverse offering of academic and research programmers on teacher education and complementary social sciences and humanities disciplines. We nurture educators and social leaders who are intellectually active, socially caring, and globally aware, to become agents of change in the communities that they serve. We place great emphasis on research capability--- our research will contribute to the advancement of knowledge. scolarship and innovation, with sustanable inpact on social progress and human betterment . The institute aims to be a leading institute on education and vocational training, creating an impact and defining the education landscape.<br />', 'Contents Page', 40, 'no', '2013-02-20', 'templatemo_image_04.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(264, 'Message From MD', 'message-from-md', 'Other', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor.<br />', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor.&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla quam ac dolor.', 'Contents Page', 70, 'no', '2013-05-13', '2-1.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(56, 'Home', 'home', 'Header', 0, '', 'home', 'Link', 10, 'no', '2012-12-13', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(208, 'Our Services', 'our-services', 'Header', 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo     ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et    magnis  dis parturient montes, nascetur ridiculus mus. Donec quam felis,     ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat    massa  quis enim. Donec pede justo, fringilla vel, aliquet nec,    vulputate  eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis    vitae,  justo. Nullam dictum felis eu pede mollis pretium. Integer    tincidunt.  Cras dapibus. Vivamus elementum semper nisi. Aenean    vulputate eleifend  tell', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et   magnis  dis parturient montes, nascetur ridiculus mus. Donec quam felis,    ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat   massa  quis enim. Donec pede justo, fringilla vel, aliquet nec,   vulputate  eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis   vitae,  justo. Nullam dictum felis eu pede mollis pretium. Integer   tincidunt.  Cras dapibus. Vivamus elementum semper nisi. Aenean   vulputate eleifend  tell<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo     ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et    magnis  dis parturient montes, nascetur ridiculus mus. Donec quam felis,     ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat    massa  quis enim. Donec pede justo, fringilla vel, aliquet nec,    vulputate  eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis    vitae,  justo. Nullam dictum felis eu pede mollis pretium. Integer    tincidunt.  Cras dapibus. Vivamus elementum semper nisi. Aenean    vulputate eleifend  tell<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo     ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et    magnis  dis parturient montes, nascetur ridiculus mus. Donec quam felis,     ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat    massa  quis enim. Donec pede justo, fringilla vel, aliquet nec,    vulputate  eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis    vitae,  justo. Nullam dictum felis eu pede mollis pretium. Integer    tincidunt.  Cras dapibus. Vivamus elementum semper nisi. Aenean    vulputate eleifend  tell', 'Normal Group', 20, 'no', '2013-05-10', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(307, 'News/Events', 'newsevents', 'Header', 0, '', '', 'List', 50, 'no', '2013-05-21', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(308, 'Abroad Study Counselling', 'abroad-study-counselling', '', 307, 'We offer various abroad study counselling services and recently we are giving counselling about the study in Australia, USA, Norway and various other countries. We have professional and specialized person regarding to these fields. ', 'We offer various abroad study counselling services and recently we are giving counselling about the study in Australia, USA, Norway and various other countries. We have professional and specialized person regarding to these fields. <br />', 'ListSub', 10, 'no', '2013-05-21', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(309, 'Career Counselling', 'career-counselling', '', 307, 'We have started a new Career counselling classes for all those people who needs guidance and support to select a good and favorable career for them. We suggest and advice as per the qualification and ability the person can deal with. ', 'We have started a new Career counselling classes for all those people who needs guidance and support to select a good and favorable career for them. We suggest and advice as per the qualification and ability the person can deal with. <br />', 'ListSub', 20, 'no', '2013-05-21', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(310, 'lorem ipsum lorem ipsum lorem', 'lorem-ipsum-lorem-ipsum-lorem', '', 307, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auct', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auct', 'ListSub', 30, 'no', '2013-05-21', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(311, 'lorem ipsum lorem ipsum', 'lorem-ipsum-lorem-ipsum', '', 307, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auct', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auct Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auct', 'ListSub', 40, 'no', '2013-05-21', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(376, 'Study Abroad', 'study-abroad', 'Header', 0, '<br />', '<br />', 'Normal Group', 30, 'no', '2013-07-14', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(377, 'Study in USA', 'study-in-usa', 'Header', 376, '<br />', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor, arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim convallis nulla q Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem  rhoncus felis, dignissim  convallis nulla q Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem  rhoncus felis, dignissim  convallis nulla q Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem  rhoncus felis, dignissim  convallis nulla q Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem  rhoncus felis, dignissim  convallis nulla q Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem rhoncus felis, dignissim  convallis nulla quam ac dolor. Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Cras auctor,  arcu sit amet auctor luctus, lectus sem  rhoncus felis, dignissim  convallis nulla q', 'Contents Page', 10, 'no', '2013-07-14', 'usa.png', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(378, 'Study in UK', 'study-in-uk', 'Header', 376, '<br />', 'study in uk<br />', 'Contents Page', 20, 'no', '2013-07-14', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(379, 'Study In France', 'study-in-france', 'Header', 376, '<br />', '<br />', 'Contents Page', 30, 'no', '2013-07-14', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(380, 'Study in Australia', 'study-in-australia', 'Header', 376, '<br />', 'study in singapore<br />', 'Contents Page', 40, 'no', '2013-07-14', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(398, 'Testimonials', 'testimonials', 'Other', 0, '<br />', '<br />', 'Normal Group', 80, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(399, 'lorem ipsum', 'lorem-ipsum', 'Other', 398, 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Contents Page', 10, 'no', '2013-07-15', 'man.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(400, 'lorem ipsum lorem', 'lorem-ipsum-lorem', 'Other', 398, 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Contents Page', 20, 'no', '2013-07-15', 'man.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(296, 'Slider 1', 'slider-1', 'Other', 295, 'lorem ipsum dollor lorem ipsum dollor<br />', '<br />', 'Contents Page', 10, 'no', '2013-05-20', 'aura slider1.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(297, 'Slider 2', 'slider-2', 'Other', 295, 'lorem ipsum lorem<br />', '<br />', 'Contents Page', 20, 'no', '2013-05-20', 'aura slider2.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(341, 'Test Preparation', 'test-preparation', 'Header', 208, '&nbsp;', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Normal Group', 20, 'no', '2013-06-16', 'test.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(342, 'IELTS', 'ielts', 'Header', 341, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 10, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(343, 'TOEFL', 'toefl', 'Header', 341, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 20, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(344, 'GRE', 'gre', 'Header', 341, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 30, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(345, 'GMAT', 'gmat', 'Header', 341, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 40, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(346, 'SAT', 'sat', 'Header', 341, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 50, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(347, 'Language Classes', 'language-classes', 'Header', 208, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Normal Group', 30, 'no', '2013-06-16', 'language.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(348, 'Korean Language', 'korean-language', 'Header', 347, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 10, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(350, 'English Language', 'english-language', 'Header', 347, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 1, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(351, 'Herbrew Language', 'herbrew-language', 'Header', 347, '&nbsp;', '&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&nbsp;', 'Contents Page', 40, 'no', '2013-06-16', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(382, 'SLC', 'slc', 'Header', 381, '<br />', '<br />', 'Contents Page', 10, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(383, '+2 Level', '2-level', 'Header', 381, '<br />', '<br />', 'Contents Page', 20, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(384, 'Bachelors', 'bachelors', 'Header', 381, '<br />', '<br />', 'Contents Page', 30, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(385, 'Masters', 'masters', 'Header', 381, '<br />', '<br />', 'Contents Page', 40, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(388, 'Staff Nurse', 'staff-nurse', 'Header', 386, '<br />', '<br />', 'Contents Page', 20, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(389, 'Public Commission', 'public-commission', 'Header', 386, '<br />', '<br />', 'Contents Page', 30, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(390, 'Study in Japan', 'study-in-japan', 'Header', 376, '<br />', '<br />', 'Contents Page', 50, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(391, 'Study in Cyprus', 'study-in-cyprus', 'Header', 376, '<br />', '<br />', 'Contents Page', 60, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(392, 'lorem ipsum lorem lorem lorem lorem', 'lorem-ipsum-lorem-lorem-lorem-lorem', '', 307, '', '<br />', 'ListSub', 50, 'no', '2013-07-15', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(393, 'lorem iposu doller lorem ispum lorem', 'lorem-iposu-doller-lorem-ispum-lorem', '', 307, '', '<br />', 'ListSub', 60, 'no', '2013-07-15', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(394, 'lorem ipsum lorem lorem ipsum', 'lorem-ipsum-lorem-lorem-ipsum', '', 307, '', '<br />', 'ListSub', 70, 'no', '2013-07-15', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(395, 'loerm ipsum lorem lorem lorem lorem', 'loerm-ipsum-lorem-lorem-lorem-lorem', '', 307, '', '<br />', 'ListSub', 80, 'no', '2013-07-15', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(396, 'lorem lorem lorem lorem lorem', 'lorem-lorem-lorem-lorem-lorem', '', 307, '', '<br />', 'ListSub', 90, 'no', '2013-07-15', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(397, 'lorem lorem ipsum lorem lorem ipsu', 'lorem-lorem-ipsum-lorem-lorem-ipsu', '', 307, '', '<br />', 'ListSub', 100, 'no', '2013-07-15', '', '', 'no', '', '', '', '', 0, '', 0, '', 0, 0),
(402, 'ipsum ipsum', 'ipsum-ipsum', 'Other', 398, 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Contents Page', 40, 'no', '2013-07-15', 'man.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(403, 'dollor ipsum', 'dollor-ipsum', 'Other', 398, 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsumLorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit  amet,  consectetuer Lorem ipsum dolor sit amet,it amet, consectetuer Lorem  ipsum<br />', 'Contents Page', 50, 'no', '2013-07-15', 'man.jpg', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(381, 'Tuition Classes', 'tuition-classes', 'Header', 208, '<br />', '<br />', 'Normal Group', 40, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(386, 'Other Preparation Classes', 'other-preparation-classes', 'Header', 208, '<br />', '<br />', 'Normal Group', 50, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(387, 'HA', 'ha', 'Header', 386, '<br />', '<br />', 'Contents Page', 10, 'no', '2013-07-15', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0),
(369, 'Germany', 'germany', 'Header', 347, '<br />', '<br />', 'Contents Page', 4, 'no', '2013-06-18', '', 'normal', 'No', '', '', '', '', 0, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `listingfiles`
--

CREATE TABLE IF NOT EXISTS `listingfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` text NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `listingId` int(11) NOT NULL DEFAULT '0',
  `onDate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `listingfiles`
--

INSERT INTO `listingfiles` (`id`, `caption`, `filename`, `listingId`, `onDate`) VALUES
(1, '', 'aaa.jpg', 130, 2013),
(2, '', 'WEB_Sample_Cover_Letters.pdf', 263, 2013);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL DEFAULT '',
  `name` varchar(250) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL,
  `comments` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `onDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `address`, `comments`, `status`, `onDate`) VALUES
(7, '13691657482-1.jpg', 'ganesh', 'ktm', 'lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem', 1, '2013-05-21'),
(8, '1369165863bhutan.jpg', 'ramesh', 'ktm', 'lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem \r\n\r\nlorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem lorem ipsum lorem ipsum lorem', 1, '2013-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `power` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`id`, `name`, `power`) VALUES
(1, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastLogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loginTimes` int(10) unsigned NOT NULL DEFAULT '0',
  `status` enum('A','D') NOT NULL DEFAULT 'D',
  `userGroupId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `lastLogin`, `loginTimes`, `status`, `userGroupId`) VALUES
(1, 'admin', 'aura', '2013-07-16 09:58:38', 191, 'A', 1);
