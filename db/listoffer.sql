-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 08:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listoffer`
--

-- --------------------------------------------------------

--
-- Table structure for table `lo_admins`
--

CREATE TABLE `lo_admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL COMMENT 'first name',
  `last_name` varchar(30) NOT NULL COMMENT 'last name',
  `email` varchar(100) NOT NULL COMMENT 'email id',
  `contact_email` varchar(100) NOT NULL,
  `mail_email` varchar(255) NOT NULL COMMENT 'Email from which all the mails will be sent to the users',
  `password` varchar(255) NOT NULL COMMENT 'cakephp hashed password',
  `type` varchar(2) DEFAULT 'A' COMMENT 'SA=>Super Admin, A=>Sub Admin',
  `last_login_date` datetime NOT NULL COMMENT 'last login time',
  `forget_password_string` varchar(255) NOT NULL COMMENT 'forget password string require to verify account owner',
  `signup_string` varchar(255) NOT NULL COMMENT 'signup string to verify account owner',
  `modified` datetime NOT NULL COMMENT 'update time',
  `created` datetime NOT NULL COMMENT 'insert time',
  `status` varchar(2) NOT NULL COMMENT 'A=>Active,I=>Inactive,V=>Verified,NV=>not-verified,D=>deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_admins`
--

INSERT INTO `lo_admins` (`id`, `first_name`, `last_name`, `email`, `contact_email`, `mail_email`, `password`, `type`, `last_login_date`, `forget_password_string`, `signup_string`, `modified`, `created`, `status`) VALUES
(1, 'Sukanta', ' Sarkar ', 'administrator@listoffer.com', 'administrator@listoffer.com', 'no-reply@listoffer.com', '$2y$10$raU/4ebGf1ayQblLyJ.gne6xZ6ul.NHKbrk3UiobGKq312ag2PF8W', 'SA', '2018-02-21 00:00:00', '', '', '2018-02-21 00:00:00', '2018-02-21 00:00:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `lo_admin_menus`
--

CREATE TABLE `lo_admin_menus` (
  `id` int(11) NOT NULL,
  `main_menu_name` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_name_modified` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `method_name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `is_display` enum('Y','N') NOT NULL,
  `status` enum('A','I') NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_admin_menus`
--

INSERT INTO `lo_admin_menus` (`id`, `main_menu_name`, `menu_name`, `menu_name_modified`, `parent_id`, `controller_name`, `method_name`, `sort_order`, `is_display`, `status`, `modified`, `created`) VALUES
(1, 'Manage Sub Admin', 'Manage Sub Admin', 'Manage Sub Admin', 0, 'AdminDetails', '', 1, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Manage Admin', 'View', 'View', 1, 'AdminDetails', 'list-sub-admin', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Manage Admin', 'Add', 'Add', 1, 'AdminDetails', 'add-sub-admin', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Manage Admin', 'Edit', 'Edit', 1, 'AdminDetails', 'edit-sub-admin', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Manage Admin', 'Status', 'Status', 1, 'AdminDetails', 'change-status-subadmin', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Manage Admin', 'Delete', 'Delete', 1, 'AdminDetails', 'delete-sub-admin', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Manage Admin', 'ChangePassword', 'Change Password', 1, 'AdminDetails', 'sub-admin-change-password', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'User Management', 'User Management', 'User Management', 0, 'Users', '', 2, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'User Management', 'View', 'View', 8, 'Users', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'User Management', 'Add', 'Add', 8, 'Users', 'add-user', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'User Management', 'Edit', 'Edit', 8, 'Users', 'edit-user', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'User Management', 'Status', 'Status', 8, 'Users', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'User Management', 'Delete', 'Delete', 8, 'Users', 'delete-user', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'User Management', 'AccountSetting', 'Account Setting', 8, 'Users', 'user-account-setting', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'User Management', 'ChangePassword', 'Change Password', 8, 'Users', 'user-change-password', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'User Management', 'SubmittedDetails', 'Submitted Details', 8, 'Users', 'user-submitted-details', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Tags Management', 'Tags Management', 'Tags Management', 0, 'Tags', '', 3, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Tags Management', 'View', 'View', 17, 'Tags', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Tags Management', 'Add', 'Add', 17, 'Tags', 'add-tag', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Tags Management', 'Edit', 'Edit', 17, 'Tags', 'edit-tag', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Tags Management', 'Status', 'Status', 17, 'Tags', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Tags Management', 'Delete', 'Delete', 17, 'Tags', 'delete-tag', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Question Categories', 'Question Categories', 'Question Categories', 0, 'QuestionCategories', '', 4, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Question Categories', 'View', 'View', 23, 'QuestionCategories', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Question Categories', 'Add', 'Add', 23, 'QuestionCategories', 'add-question-category', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Question Categories', 'Edit', 'Edit', 23, 'QuestionCategories', 'edit-question-category', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Question Categories', 'Status', 'Status', 23, 'QuestionCategories', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Question Categories', 'Delete', 'Delete', 23, 'QuestionCategories', 'delete-question-category', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Questions', 'Questions', 'Questions', 0, 'Questions', '', 5, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Questions', 'View', 'View', 29, 'Questions', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Questions', 'Add', 'Add', 29, 'Questions', 'add-question', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Questions', 'Edit', 'Edit', 29, 'Questions', 'edit-question', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Questions', 'Status', 'Status', 29, 'Questions', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Questions', 'Delete', 'Delete', 29, 'Questions', 'delete-question', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Question Answers', 'Question Answers', 'Question Answers', 0, 'QuestionAnswers', '', 6, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Question Answers', 'View', 'View', 35, 'QuestionAnswers', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Question Answers', 'Add', 'Add', 35, 'QuestionAnswers', '', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Question Answers', 'Edit', 'Edit', 35, 'QuestionAnswers', 'edit-question-answer', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Question Answers', 'Status', 'Status', 35, 'QuestionAnswers', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Question Answers', 'Delete', 'Delete', 35, 'QuestionAnswers', 'delete-question-answer', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Question Answer Comments', 'Question Answer Comments', 'Question Answer Comments', 0, 'AnswerComments', '', 7, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Question Answer Comments', 'View', 'View', 41, 'AnswerComments', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Question Answer Comments', 'Add', 'Add', 41, 'AnswerComments', '', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Question Answer Comments', 'Edit', 'Edit', 41, 'AnswerComments', 'edit-answer-comment', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Question Answer Comments', 'Status', 'Status', 41, 'AnswerComments', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Question Answer Comments', 'Delete', 'Delete', 41, 'AnswerComments', 'delete-comment', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Question Comments', 'Question Comments', 'Question Comments', 0, 'QuestionComments', '', 8, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Question Comments', 'View', 'View', 47, 'QuestionComments', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Question Comments', 'Add', 'Add', 47, 'QuestionComments', '', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Question Comments', 'Edit', 'Edit', 47, 'QuestionComments', 'edit-comment', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Question Comments', 'Status', 'Status', 47, 'QuestionComments', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Question Comments', 'Delete', 'Delete', 47, 'QuestionComments', 'delete-comment', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'News Category', 'News Category', 'News Category', 0, 'NewsCategories', '', 9, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'News Category', 'View', 'View', 53, 'NewsCategories', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'News Category', 'Add', 'Add', 53, 'NewsCategories', 'add-news-category', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'News Category', 'Edit', 'Edit', 53, 'NewsCategories', 'edit-news-category', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'News Category', 'Status', 'Status', 53, 'NewsCategories', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'News Category', 'Delete', 'Delete', 53, 'NewsCategories', 'delete-news-category', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'News Management', 'News Management', 'News Management', 0, 'News', '', 10, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'News Management', 'View', 'View', 59, 'News', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'News Management', 'Add', 'Add', 59, 'News', 'add-news', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'News Management', 'Edit', 'Edit', 59, 'News', 'edit-news', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'News Management', 'Status', 'Status', 59, 'News', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'News Management', 'Delete', 'Delete', 59, 'News', 'delete-news', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'News Comments', 'News Comments', 'News Comments', 0, 'NewsComments', '', 11, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'News Comments', 'View', 'View', 65, 'NewsComments', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'News Comments', 'Add', 'Add', 65, 'NewsComments', '', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'News Comments', 'Edit', 'Edit', 65, 'NewsComments', 'edit-comment', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'News Comments', 'Status', 'Status', 65, 'NewsComments', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'News Comments', 'Delete', 'Delete', 65, 'NewsComments', 'delete-comment', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'FAQs', 'FAQs', 'FAQs', 0, 'Faqs', '', 12, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'FAQs', 'View', 'View', 71, 'Faqs', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'FAQs', 'Add', 'Add', 71, 'Faqs', 'add-faq', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'FAQs', 'Edit', 'Edit', 71, 'Faqs', 'edit-faq', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'FAQs', 'Status', 'Status', 71, 'Faqs', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'FAQs', 'Delete', 'Delete', 71, 'Faqs', 'delete-faq', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Contacts Management', 'Contacts Management', 'Contacts Management', 0, 'Contacts', '', 13, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Contacts Management', 'View', 'View', 77, 'Contacts', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Contacts Management', 'Reply', 'Reply', 77, 'Contacts', 'reply', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Contacts Management', 'Delete', 'Delete', 77, 'Contacts', 'delete-contacts', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'CMS Management', 'CMS Management', 'CMS Management', 0, 'cms', '', 14, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'CMS Management', 'View', 'View', 81, 'cms', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'CMS Management', 'Edit', 'Edit', 81, 'cms', 'edit-cms', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Banner Management', 'Banner Management', 'Banner Management', 0, 'BannerSections', '', 15, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Banner Management', 'View', 'View', 84, 'BannerSections', 'list-data', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Banner Management', 'Add', 'Add', 84, 'BannerSections', 'add-banner-section', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Banner Management', 'Edit', 'Edit', 84, 'BannerSections', 'edit-banner-section', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Banner Management', 'Status', 'Status', 84, 'BannerSections', 'change-status', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Banner Management', 'Delete', 'Delete', 84, 'BannerSections', 'delete-banner', 0, 'Y', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Advertise Management', 'Advertise Management', 'Advertise Management', 0, 'Advertisements', '', 16, 'Y', 'A', '2017-11-16 02:00:00', '2017-11-16 02:00:00'),
(91, 'Advertise Management', 'View', 'View', 90, 'Advertisements', 'list-data', 0, 'Y', 'A', '2017-11-16 03:00:00', '2017-11-16 03:00:00'),
(92, 'Advertise Management', 'Add', 'Add', 90, 'Advertisements', 'add-advertise', 0, 'Y', 'A', '2017-11-16 03:00:00', '2017-11-16 03:00:00'),
(93, 'Advertise Management', 'Edit', 'Edit', 90, 'Advertisements', 'edit-advertise', 0, 'Y', 'A', '2017-08-09 00:00:00', '2017-08-09 00:00:00'),
(94, 'Advertise Management', 'Status', 'Status', 90, 'Advertisements', 'change-status', 0, 'Y', 'A', '2017-08-13 12:27:33', '2017-08-13 03:07:09'),
(95, 'Advertise Management', 'Delete', 'Delete', 90, 'Advertisements', 'delete-advertise', 0, 'Y', 'A', '2017-08-13 12:27:33', '2017-08-13 12:27:33'),
(96, 'Mortgage Status Management', 'Mortgage Status Management', 'Mortgage Status Management', 0, 'MortgageStatuses', '', 17, 'Y', 'A', '2018-02-23 02:00:00', '2018-02-23 01:00:00'),
(97, 'Mortgage Status Management', 'View', 'View', 96, 'MortgageStatuses', 'list-data', 0, 'Y', 'A', '2018-02-21 03:00:00', '2018-02-21 03:00:00'),
(98, 'Mortgage Status Management', 'Add', 'Add', 96, 'MortgageStatuses', 'add-mortgage-status', 0, 'Y', 'A', '2018-02-21 03:00:00', '2018-02-21 03:00:00'),
(99, 'Mortgage Status Management', 'Edit', 'Edit', 96, 'MortgageStatuses', 'edit-mortgage-status', 0, 'Y', 'A', '2018-02-21 03:00:00', '2018-02-21 03:00:00'),
(100, 'Mortgage Status Management', 'Status', 'Status', 96, 'MortgageStatuses', 'change-status', 0, 'Y', 'A', '2018-02-21 03:00:00', '2018-02-21 03:00:00'),
(101, 'Mortgage Status Management', 'Delete', 'Delete', 96, 'MortgageStatuses', 'delete-mortgage-status', 0, 'Y', 'A', '2018-02-21 03:00:00', '2018-02-21 03:00:00'),
(102, 'Testimonial Management', 'Testimonial Management', 'Testimonial Management', 0, 'Testimonials', '', 18, 'Y', 'A', '2018-02-24 02:00:00', '2018-02-24 01:00:00'),
(103, 'Testimonial Management', 'View', 'View', 102, 'Testimonials', 'list-data', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(104, 'Testimonial Management', 'Add', 'Add', 96, 'Testimonials', 'add-testimonial', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(105, 'Testimonial Management', 'Edit', 'Edit', 96, 'Testimonials', 'edit-testimonial', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(106, 'Testimonial Management', 'Status', 'Status', 96, 'Testimonials', 'change-status', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(107, 'Testimonial Management', 'Delete', 'Delete', 96, 'Testimonials', 'delete-testimonial', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(108, 'Service Management', 'Service Management', 'Service Management', 0, 'Services', '', 19, 'Y', 'A', '2018-02-24 02:00:00', '2018-02-24 01:00:00'),
(109, 'Service Management', 'View', 'View', 108, 'Services', 'list-data', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(110, 'Service Management', 'Add', 'Add', 108, 'Services', 'add-service', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(111, 'Service Management', 'Edit', 'Edit', 108, 'Services', 'edit-service', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(112, 'Service Management', 'Status', 'Status', 108, 'Services', 'change-status', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00'),
(113, 'Service Management', 'Delete', 'Delete', 108, 'Services', 'delete-service', 0, 'Y', 'A', '2018-02-24 03:00:00', '2018-02-24 03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lo_admin_permisions`
--

CREATE TABLE `lo_admin_permisions` (
  `id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `admin_menu_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lo_banner_sections`
--

CREATE TABLE `lo_banner_sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'I',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_banner_sections`
--

INSERT INTO `lo_banner_sections` (`id`, `title`, `image`, `status`, `modified`, `created`) VALUES
(5, 'Banner 1', 'banner_151954725425.jpg', 'A', '2018-02-25 08:27:36', '2018-02-24 18:50:45'),
(6, 'Banner 2', 'banner_15194983524.jpg', 'A', '2018-02-24 18:52:34', '2018-02-24 18:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `lo_cms_pages`
--

CREATE TABLE `lo_cms_pages` (
  `id` int(11) NOT NULL,
  `page_section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(1) NOT NULL COMMENT 'A=>active,I=>inactive,D=>deleted',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_cms_pages`
--

INSERT INTO `lo_cms_pages` (`id`, `page_section`, `title`, `description`, `status`, `modified`, `created`, `meta_keywords`, `meta_description`) VALUES
(1, 'home', 'Home', 'test description', 'A', '2018-02-21 00:00:00', '2018-02-21 00:00:00', 'Home', 'Home'),
(2, 'about us', 'About Us', '', 'A', '2018-02-21 06:20:28', '2018-02-21 06:20:00', 'About Us', 'About Us'),
(3, 'terms of use', 'Terms of Use', '', 'A', '2018-02-21 06:37:07', '2018-02-21 06:37:07', 'Terms of Use', 'Terms of Use'),
(4, 'clients about us', '<em>CLIENTS</em> ABOUT US', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'A', '2018-02-25 01:00:00', '2018-02-25 00:00:00', 'Clients About Us', 'Clients About Us');

-- --------------------------------------------------------

--
-- Table structure for table `lo_common_settings`
--

CREATE TABLE `lo_common_settings` (
  `id` int(11) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `google_plus_link` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_common_settings`
--

INSERT INTO `lo_common_settings` (`id`, `facebook_link`, `twitter_link`, `google_plus_link`, `linkedin`, `email`, `phone_number`, `address`, `footer_text`, `modified`, `created`) VALUES
(1, 'https://www.facebook.com/', 'http://www.twitter.com', 'https://plus.google.com', 'http://www.linkedin.com', 'administrator@listoffer.com', '9876543210', '', '', '2018-02-21 19:02:20', '2018-02-21 13:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `lo_contacts`
--

CREATE TABLE `lo_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A=>Active, I=>Inactive',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lo_contact_replies`
--

CREATE TABLE `lo_contact_replies` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `reply_message` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lo_mortgage_statuses`
--

CREATE TABLE `lo_mortgage_statuses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A=>Active, I=>Inactive',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lo_newsletter_subscriptions`
--

CREATE TABLE `lo_newsletter_subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A=>Active, I=>Inactive',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lo_services`
--

CREATE TABLE `lo_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'I',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_services`
--

INSERT INTO `lo_services` (`id`, `title`, `sub_heading`, `description`, `image`, `status`, `modified`, `created`) VALUES
(2, 'Sale Land', 'Lorem ipsum dolor', '<p>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>', 'service_15198458241.jpg', 'A', '2018-02-28 19:24:34', '2018-02-28 19:23:44'),
(3, 'Buy Land', 'Lorem ipsum dolor', '<p>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>', 'service_15198458579.jpg', 'A', '2018-02-28 19:24:48', '2018-02-28 19:24:18'),
(4, 'Sale Home', 'Lorem ipsum dolor', '<p>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempororem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>', 'service_15198459234.jpg', 'A', '2018-02-28 19:25:23', '2018-02-28 19:25:23'),
(5, 'Buy Home', 'Lorem ipsum dolor', '<p>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>', 'service_15198459576.jpg', 'A', '2018-02-28 19:25:57', '2018-02-28 19:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `lo_testimonials`
--

CREATE TABLE `lo_testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `image` text NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'I',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_testimonials`
--

INSERT INTO `lo_testimonials` (`id`, `name`, `designation`, `short_description`, `image`, `status`, `modified`, `created`) VALUES
(1, 'James Liam', 'Quality Assurance Manager', 'Motorland uis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur lorem excepteur ipsum et dolore magna aliqua. ipsum et dolore magna aliqua.', 'testimonial_15195797697.jpg', 'A', '2018-02-25 17:47:52', '2018-02-25 17:29:29'),
(2, 'James Liam', 'Quality Assurance Manager', 'Motorland uis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur lorem excepteur ipsum et dolore magna aliqua.', 'testimonial_15195797891.jpg', 'A', '2018-02-25 17:45:42', '2018-02-25 17:29:49'),
(3, 'James Liam', 'Quality Assurance Manager', 'Motorland uis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur lorem excepteur ipsum et dolore magna aliqua.', 'testimonial_15195798035.jpg', 'A', '2018-02-25 17:45:47', '2018-02-25 17:30:03'),
(4, 'James Liam', 'Quality Assurance Manager', 'Motorland uis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur lorem excepteur ipsum et dolore magna aliqua.', 'testimonial_15195798159.jpg', 'A', '2018-02-25 17:45:52', '2018-02-25 17:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `lo_users`
--

CREATE TABLE `lo_users` (
  `id` int(11) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL COMMENT 'email address',
  `password` varchar(200) DEFAULT NULL COMMENT 'Hashed password',
  `full_name` varchar(100) DEFAULT NULL,
  `birthday` date NOT NULL,
  `signup_string` varchar(200) DEFAULT NULL COMMENT 'string used to verify the signup users email',
  `forget_password_string` varchar(200) DEFAULT NULL COMMENT 'string used to verify the account owner',
  `signup_ip` varchar(50) DEFAULT NULL COMMENT 'ip from where account was created',
  `is_verified` enum('1','0') DEFAULT '1' COMMENT 'is the user verified by admin. 1=>yes, 0=>No',
  `type` enum('B','S','O') DEFAULT 'B' COMMENT '''B'' => Buyer, ''S'' => Seller',
  `modified` datetime NOT NULL COMMENT 'update time',
  `created` datetime NOT NULL COMMENT 'insert time',
  `agree` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status` enum('A','I') NOT NULL DEFAULT 'I' COMMENT 'A=>active, I=>inactive',
  `loggedin_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `loggedin_status` int(2) NOT NULL DEFAULT '0' COMMENT '1=>Online, 0=>Offline'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lo_users`
--

INSERT INTO `lo_users` (`id`, `profile_pic`, `email`, `password`, `full_name`, `birthday`, `signup_string`, `forget_password_string`, `signup_ip`, `is_verified`, `type`, `modified`, `created`, `agree`, `status`, `loggedin_time`, `loggedin_status`) VALUES
(52, 'profile_151924195481.jpg', 'john@gmail.com', '$2y$10$3VEbUQ6xqB564IhIswyNGeuFBBs299.CM5L0hvYPsB0/Hd8bMEe/u', 'John Doe', '2018-02-15', NULL, NULL, NULL, '1', 'B', '2018-02-22 18:04:30', '2018-02-21 19:39:14', 'Y', 'A', '2018-02-22 18:04:30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lo_admins`
--
ALTER TABLE `lo_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_admin_menus`
--
ALTER TABLE `lo_admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_admin_permisions`
--
ALTER TABLE `lo_admin_permisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_banner_sections`
--
ALTER TABLE `lo_banner_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_cms_pages`
--
ALTER TABLE `lo_cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_common_settings`
--
ALTER TABLE `lo_common_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_contacts`
--
ALTER TABLE `lo_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_contact_replies`
--
ALTER TABLE `lo_contact_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_mortgage_statuses`
--
ALTER TABLE `lo_mortgage_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_newsletter_subscriptions`
--
ALTER TABLE `lo_newsletter_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_services`
--
ALTER TABLE `lo_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_testimonials`
--
ALTER TABLE `lo_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_users`
--
ALTER TABLE `lo_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lo_admins`
--
ALTER TABLE `lo_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lo_admin_menus`
--
ALTER TABLE `lo_admin_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `lo_admin_permisions`
--
ALTER TABLE `lo_admin_permisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lo_banner_sections`
--
ALTER TABLE `lo_banner_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lo_cms_pages`
--
ALTER TABLE `lo_cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lo_common_settings`
--
ALTER TABLE `lo_common_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lo_contacts`
--
ALTER TABLE `lo_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lo_contact_replies`
--
ALTER TABLE `lo_contact_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lo_mortgage_statuses`
--
ALTER TABLE `lo_mortgage_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lo_newsletter_subscriptions`
--
ALTER TABLE `lo_newsletter_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lo_services`
--
ALTER TABLE `lo_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lo_testimonials`
--
ALTER TABLE `lo_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lo_users`
--
ALTER TABLE `lo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
