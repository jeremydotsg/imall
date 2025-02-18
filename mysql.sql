-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 15, 2007 at 08:08 AM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `imall`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `imall_cart`
-- 

DROP TABLE IF EXISTS `imall_cart`;
CREATE TABLE IF NOT EXISTS `imall_cart` (
  `cart_id` text collate latin1_general_ci NOT NULL,
  `cart_item` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `imall_cart`
-- 

INSERT INTO `imall_cart` (`cart_id`, `cart_item`) VALUES 
('4b5f6b389f5ee1cdd0764ce1ce2fa396', 3),
('4b5f6b389f5ee1cdd0764ce1ce2fa396', 2),
('4b5f6b389f5ee1cdd0764ce1ce2fa396', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `imall_category`
-- 

DROP TABLE IF EXISTS `imall_category`;
CREATE TABLE IF NOT EXISTS `imall_category` (
  `category_id` int(255) NOT NULL,
  `category_name` text collate latin1_general_ci NOT NULL,
  `category_desc` text collate latin1_general_ci NOT NULL,
  `category_item_limit` int(255) NOT NULL,
  `category_icon` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `imall_category`
-- 

INSERT INTO `imall_category` (`category_id`, `category_name`, `category_desc`, `category_item_limit`, `category_icon`) VALUES 
(0, 'Default', 'The default category for all items.', -1, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `imall_items`
-- 

DROP TABLE IF EXISTS `imall_items`;
CREATE TABLE IF NOT EXISTS `imall_items` (
  `items_id` int(255) NOT NULL auto_increment,
  `items_name` text collate latin1_general_ci NOT NULL,
  `items_desc` text collate latin1_general_ci NOT NULL,
  `items_cat_id` int(255) NOT NULL,
  `items_qty` int(255) NOT NULL,
  `items_unitprice` varchar(255) collate latin1_general_ci NOT NULL,
  `items_thumbnail` text collate latin1_general_ci NOT NULL,
  `items_published` int(255) NOT NULL,
  PRIMARY KEY  (`items_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `imall_items`
-- 

INSERT INTO `imall_items` (`items_id`, `items_name`, `items_desc`, `items_cat_id`, `items_qty`, `items_unitprice`, `items_thumbnail`, `items_published`) VALUES 
(1, 'default item', 'test item(may delete or remove)', 0, 1000, '00.00', 'pic.png', 1),
(2, 'test', 'test', 0, 1, '11.00', 'LShit.png', 1),
(3, 'unnamed item', '899243234534', 0, 1, '15.15', 'LShit.png', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `imall_particulars`
-- 

DROP TABLE IF EXISTS `imall_particulars`;
CREATE TABLE IF NOT EXISTS `imall_particulars` (
  `p_id` int(255) NOT NULL auto_increment,
  `p_name` text collate latin1_general_ci NOT NULL,
  `p_address` text collate latin1_general_ci NOT NULL,
  `p_cart_id` text collate latin1_general_ci NOT NULL,
  `p_contact_no` varchar(255) collate latin1_general_ci NOT NULL,
  `p_email` varchar(255) collate latin1_general_ci NOT NULL,
  `p_total` varchar(255) collate latin1_general_ci NOT NULL,
  `p_order` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `imall_particulars`
-- 

INSERT INTO `imall_particulars` (`p_id`, `p_name`, `p_address`, `p_cart_id`, `p_contact_no`, `p_email`, `p_total`, `p_order`) VALUES 
(1, 'test', 'test', '249', 'test', '@test', '', '1'),
(2, 'test', 'test', '4b5f6b389f5ee1cdd0764ce1ce2fa396', '12936463', 'test@test', '', '1');

-- --------------------------------------------------------

-- 
-- Table structure for table `imall_users`
-- 

DROP TABLE IF EXISTS `imall_users`;
CREATE TABLE IF NOT EXISTS `imall_users` (
  `user_id` int(255) NOT NULL auto_increment,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_active` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `imall_users`
-- 

INSERT INTO `imall_users` (`user_id`, `user_username`, `user_password`, `user_active`) VALUES 
(1, 'test', '', '1');
