-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2015 at 07:16 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `for_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `date`, `user`) VALUES
(21, 'How to Write a Blog Post: A Simple Formula + 5 Free Blog Post Templates', 'You''ve probably heard how paramount blogging is to the success of your marketing. Without it, your SEO will tank, you''ll have nothing to promote in social media, you''ll have no clout with your leads and customers, and you''ll have fewer pages to put those oh-so-valuable calls-to-action that generate inbound leads. Need I say more?\n\nSo why, oh why, does almost every marketer I talk to have a laundry list of excuses for why they can''t consistently blog? Maybe because, unless you''re one of the few people who actually like writing, business blogging kind of stinks. You have to find words, string them together into sentences, and ughhh where do you even start?', '2015-02-23 16:13:26', ''),
(22, 'Writing a Blog Post: A Simple Formula to Follow', 'Before you start to write, have a clear understanding of your target audience. What do they want to know about? What will resonate with them? This is where creating your buyer personas comes in handy. Consider what you know about your buyer personas and their interests while you''re coming up with a topic for your blog post.', '2015-02-23 15:50:01', 'kiro'),
(24, 'Start with a topic and working title', 'Before you even write anything, you need to pick a topic for your blog post. The topic can be pretty general to start with. For example, if you''re a plumber, you might start out thinking you want to write about leaky faucets. Then you might come up with a few different working titles -- in other words, iterations or different ways of approaching that topic to help you focus your writing.  For example, you might decide to narrow your topic to "Tools for Fixing Leaky Faucets" or "Common Causes of Leaky Faucets." A working title is specific and will guide your post so you can start writing.', '2015-02-23 15:50:30', 'kiro'),
(28, 'Organize your content', 'asdas', '2015-02-23 16:26:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `privileges` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `privileges`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin@info.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
