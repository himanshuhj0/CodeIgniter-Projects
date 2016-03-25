-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2016 at 04:18 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `podobrisebesi.bg`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `basic_description` varchar(500) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `time_update` int(10) unsigned NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `basic_description`, `title`, `thumb`, `image`, `description`, `url`, `category`, `time`, `time_update`, `visibility`) VALUES
(12, '<p>Последния оцелял е игра измислена от сървайварът Станислав Илиев - Финдо, Тя е съставена от игри които са взети от реалният сървайвър.</p>\r\n', 'Последния оцелял', 'posledniq-ocelql.jpg', 'posledniq-ocelql.jpg', '', 'Последния_оцелял_12', 'articles_bottom', 0, 0, 1),
(13, '<p>Това е тренировка в аеробен режим продължаваща един час с тежест на гирите според възможностите на трениращия.</p>\r\n', 'Power Aerobic', 'power-aerobic.jpg', 'power-aerobic.jpg', '', 'Power_Aerobic_13', 'articles_bottom', 0, 0, 1),
(14, '<p>Панинските походи са невероятно изживяване с група от позитивни хора в търсене на нови върхове.</p>\r\n', 'Планински походи', 'pohodi.jpg', 'pohodi.jpg', '', 'Планински_походи_14', 'articles_bottom', 0, 0, 1),
(15, '<p>&rdquo;Подобри себе си&rdquo; е здравословна програма създадена от Станислав Илиев - Финдо.Треньор по кану-каяк, фитнес инструктор, професионалист с дългогодишен опит в работата си с хора. В програмата са съчетани спорт, здравословно хранене, релакс терапии, разходки в планината,отборни игри със състезателен характер и много добро настроение.</p>\r\n', 'Подобри себе си със Станислав Илиев - Финдо', '', '', '', 'Подобри_себе_си_със_Станислав_Илиев_Финдо_15', 'header_info', 0, 0, 1),
(16, '', 'Събития', '', '', '<p>рбррбр</p>\r\n', 'Събития_16', 'navigation', 0, 0, 1),
(18, '<p>Организираните от нас тийм билдинги са най-атрактивните в България, игрите които предлагаме са невероятно разнообразни и в тях е съчетана съвкупност от различен вид физическа активност. Идеата за тяхното осъществяване е от сървайвърът <a href="https://www.facebook.com/StanislavIlievFindo" target="_blank">Станислав Илиев - Финдо</a></p>\r\n', 'Тийм Билдинг програми', '', '', '<p>pove4e</p>\r\n', 'Тийм_Билдинг_програми_18', 'slider', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'articles_bottom'),
(3, 'header_info'),
(4, 'navigation'),
(5, 'slider'),
(6, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
