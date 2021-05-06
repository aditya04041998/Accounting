-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 02:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminhistory`
--

CREATE TABLE `adminhistory` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminhistory`
--

INSERT INTO `adminhistory` (`id`, `email`, `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`, `remark`, `name`, `balance`) VALUES
(5, 'aditya@gmail.com', '932568714', 'Admin', '', '20', '21/04/28', '', 'Instant', 'New user', 'suraj', '0'),
(8, 'aditya@gmail.com', '654173298', 'Admin', '', '20', '21/04/28', '', 'Instant', 'New user', 'Aditya Kumar', '5314'),
(9, 'aditya@gmail.com', '546187392', 'Admin', '', '200', '21/04/29', '', 'Instant', 'New user', 'Aditya', '17614'),
(10, 'aditya@gmail.com', '369482715', 'adsf', '2000', '[value-6]', '29 Apr 2021', '', 'online', 'remark', 'shop', '2800'),
(11, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '29 Apr 2021', '', 'online', 'remark', 'shop', '2800'),
(12, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '29 Apr 2021', '', 'cheque', 'Gift', 'shop', '4800'),
(13, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '29 Apr 2021', '', 'cheque', 'Gift', 'shop', '4800'),
(14, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '29 Apr 2021', '', 'cheque', 'Gift', 'shop', '4800'),
(15, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '29 Apr 2021', '', 'online', 'remark', 'shop', '2800'),
(16, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '29 Apr 2021', '', 'cheque', 'remark', 'shop', '2000'),
(17, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '29 Apr 2021', '', 'online', 'remark', 'shop', '1800'),
(18, 'aditya@gmail.com', '369482715', 'adsf', '10000', '', '29 Apr 2021', '', 'cheque', 'remark', 'shop', '17100'),
(19, 'aditya@gmail.com', '369482715', 'adsf', '100', '', '29 Apr 2021', '', 'cheque', 'Gift', 'shop', '17000'),
(20, 'aditya@gmail.com', '369482715', 'ad', '100', '', '29 Apr 2021', '', 'online', 'Gift', 'shop', '16900'),
(21, 'aditya@gmail.com', '369482715', 'adsf', '100', '', '29 Apr 2021', '', 'cheque', 'remark', 'shop', '16800'),
(22, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '29 Apr 2021', '', 'cheque', 'remark', 'shop', '100'),
(23, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '29 Apr 2021', '', 'cheque', 'remark', 'shop', '-1500'),
(24, 'aditya@gmail.com', '369482715', 'adsf', '15000', '', '29 Apr 2021', '', 'online', 'remark', 'shop', '-12500'),
(25, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '-200'),
(26, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '0'),
(27, 'aditya@gmail.com', '369482715', 'adsf', '0', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '400'),
(28, 'aditya@gmail.com', '369482715', 'adsf', '0', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '401'),
(29, 'aditya@gmail.com', '682791543', 'Admin', '', '2000', '21/04/30', '', 'Instant', 'New user', 'Ram', '57914'),
(30, 'aditya@gmail.com', '682791543', 'adsf', '200', '', '30 Apr 2021', '', 'online', 'Gift', 'Ram', '-200'),
(31, 'aditya@gmail.com', '682791543', 'adsf', '1000', '', '30 Apr 2021', '', 'cheque', 'remark', 'Ram', '-800'),
(32, 'aditya@gmail.com', '682791543', 'adsf', '6000', '', '30 Apr 2021', '', 'cheque', 'Gift', 'Ram', '-4800'),
(33, 'aditya@gmail.com', '682791543', 'adsf', '50', '', '30 Apr 2021', '', 'online', 'remark', 'Ram', '7150'),
(34, 'aditya@gmail.com', '682791543', 'adsf', '750', '', '30 Apr 2021', '', 'online', 'Gift', 'Ram', '6500'),
(35, 'aditya@gmail.com', '369482715', 'adsf', '0', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '0'),
(36, 'aditya@gmail.com', '682791543', 'adsf', '2000', '', '30 Apr 2021', '', 'online', 'remark', 'Ram', '-2000'),
(37, 'aditya@gmail.com', '682791543', 'adsf', '800', '', '30 Apr 2021', '', 'cheque', 'Gift', 'Ram', '1200'),
(38, 'aditya@gmail.com', '369482715', 'test', '2000', '', '30 Apr 2021', '', 'online', 'remark', 'shop', '-2000'),
(39, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '1100'),
(40, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '600'),
(41, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '400'),
(42, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '1100'),
(43, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '600'),
(44, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '400'),
(45, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '1100'),
(46, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '600'),
(47, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '400'),
(48, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(49, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(50, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(51, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '600'),
(52, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '400'),
(53, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(54, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '600'),
(55, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '400'),
(56, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(57, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(58, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '600'),
(59, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '400'),
(60, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(61, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '600'),
(62, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '400'),
(63, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(64, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '600'),
(65, 'aditya@gmail.com', '369482715', 'adsf', '200', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '400'),
(66, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(67, 'aditya@gmail.com', '369482715', 'adsf', '500', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '600'),
(68, 'aditya@gmail.com', '369482715', 'aditya1', '2000', '', '01 May 2021', '', 'cheque', 'remark', 'shop', '1100'),
(69, 'aditya@gmail.com', '369482715', 'aditya2', '500', '', '01 May 2021', '', 'cheque', 'Gift', 'shop', '600'),
(70, 'aditya@gmail.com', '369482715', 'aditya3', '200', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '400'),
(71, 'aditya@gmail.com', '369482715', 'adsf', '2000', '', '03 May 2021', '', 'cheque', 'remark', 'shop', '26700'),
(72, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(73, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(74, 'aditya@gmail.com', '369482715', 'aditya3', '200', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '400'),
(75, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(76, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(77, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(78, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(79, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(80, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(81, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(82, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(83, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(84, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(85, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(86, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(87, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(88, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(89, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(90, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(91, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(92, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(93, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(94, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(95, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(96, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(97, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(98, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(99, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(100, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(101, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(102, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(103, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(104, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(105, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(106, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(107, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(108, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(109, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(110, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(111, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(112, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(113, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(114, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(115, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(116, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(117, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(118, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(119, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(120, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(121, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(122, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(123, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(124, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(125, 'aditya@gmail.com', '369482715', 'Aditya', '2000', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700'),
(126, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(127, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(128, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(129, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(130, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(131, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(132, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700'),
(133, 'aditya@gmail.com', '369482715', 'ad', '2000', '', '03 May 2021', '', 'online', 'remark', 'shop', '24700');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(224) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`id`, `name`, `email`, `password`, `phone`, `date`, `balance`) VALUES
(8, 'aditya', 'aditya@gmail.com', '12345678', '1234', '2021-04-06', '208014');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`, `remark`, `name`, `balance`) VALUES
(330, '369482715', 'adsf', '200', '', '29 Apr 21', '', 'online', 'remark', 'shop', '7357'),
(331, '369482715', 'ADitya', '500', '', '29 Apr 21', '', 'online', 'remark', 'shop', '7857'),
(332, '369482715', 'This is for coffee', '143', '', '29 Apr 2021', '', 'cheque', 'remark', 'shop', '8000'),
(333, '369482715', 'adsf', '', '200', '29 Apr 2021', '', 'online', 'remark', 'shop', '7800'),
(334, '369482715', 'This is for tea', '', '800', '29 Apr 2021', '', 'online', 'remark', 'shop', '7000'),
(335, '369482715', 'adsf', '', '1', '29 Apr 2021', 'minians.jfif', 'online', 'Aditya', 'shop', '6999'),
(336, '369482715', 'ADitya', '1', '', '29 Apr 2021', '', 'cheque', 'Gift', 'shop', '7000'),
(337, '369482715', 'adsf', '10000', '', '29 Apr 2021', 'minians.jfif', 'online', 'Gift', 'shop', '17000'),
(338, '546187392', 'New User', '200', '', '21/04/29', '', 'Instant Pay', 'New Account', 'Aditya', '200'),
(339, '369482715', 'This for shallon', '10100', '', '29 Apr 2021', 'minians.jfif', 'cheque', 'Gift', 'shop', '27100'),
(340, '682791543', 'New User', '2000', '', '21/04/30', '', 'Instant Pay', 'New Account', 'Ram', '2000'),
(341, '682791543', 'adsf', '200', '', '30 Apr 2021', '', 'cheque', 'remark', 'Ram', '2200'),
(342, '682791543', 'ad', '', '200', '30 Apr 2021', '', 'online', 'remark', 'Ram', '2000'),
(343, '682791543', 'adsf', '4000', '', '30 Apr 2021', '', 'cheque', 'Gift', 'Ram', '6000'),
(344, '682791543', 'adsf', '2000', '', '30 Apr 2021', '', 'cheque', 'remark', 'Ram', '8000'),
(345, '682791543', 'adsf', '2000', '', '30 Apr 2021', '', 'online', 'Gift', 'Ram', '10000'),
(346, '682791543', 'adsf', '800', '', '30 Apr 2021', '', 'cheque', 'Gift', 'Ram', '10800'),
(347, '682791543', 'adsf', '', '8000', '30 Apr 2021', '', 'cheque', 'Gift', 'Ram', '2800'),
(348, '682791543', 'adsf', '2000', '', '30 Apr 2021', '', 'cheque', 'Gift', 'Ram', '4800'),
(349, '682791543', 'adsf', '', '100', '30 Apr 2021', '', 'online', 'Gift', 'Ram', '4700'),
(350, '369482715', 'This is for test', '2000', '', '30 Apr 2021', 'minians.jfif', 'cheque', 'remark', 'shop', '29100'),
(351, '369482715', 'adsf', '', '2000', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '27100'),
(353, '369482715', 'adsf', '', '2000', '30 Apr 2021', '', 'cheque', 'Gift', 'shop', '23100'),
(354, '369482715', 'Aditya ', '', '20000', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '3100'),
(355, '369482715', 'adsf', '', '200', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '2900'),
(356, '369482715', 'adsf', '', '200', '30 Apr 2021', '', 'online', 'title', 'shop', '2700'),
(357, '369482715', 'adsf', '', '0', '30 Apr 2021', '', 'cheque', 'remark', 'shop', '2700'),
(358, '369482715', 'aditya', '26200', '', '01 May 2021', '', 'online', 'Gift', 'shop', '28900'),
(359, '369482715', 'Aditya', 's', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '28900'),
(360, '369482715', 'adsf', '0', '', '03 May 2021', '', 'cheque', 'Gift', 'shop', '28900'),
(361, '369482715', 'adsf', 'a', '', '03 May 2021', '', 'cheque', 'remark', 'shop', '28900');

-- --------------------------------------------------------

--
-- Table structure for table `paymentrequest`
--

CREATE TABLE `paymentrequest` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL COMMENT '0=pending,1=accept,2=reject\r\n',
  `user_id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reference` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentrequest`
--

INSERT INTO `paymentrequest` (`id`, `email`, `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`, `remark`, `name`, `balance`, `status`, `reference`) VALUES
(75, 'aditya@gmail.com', '369482715', 'ad', '', '2000', '01 May 2021', '', 'online', 'remark', 'shop', '24700', '1', '716942385'),
(76, 'aditya@gmail.com', '369482715', 'Aditya', '', '2000', '03 May 2021', '', 'cheque', 'Gift', 'shop', '22700', '1', '528764931');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(255) NOT NULL,
  `name` varchar(225) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(225) NOT NULL,
  `active` char(10) NOT NULL,
  `reset` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_name`, `phone`, `password`, `date`, `active`, `reset`, `balance`) VALUES
('369482715', 'shop', 'shop@gmail.com', '7992230085', '12345678', '21/04/24', 'a', '', '28900'),
('546187392', 'Aditya', 'aditya@gmail.com', '7992230085', '46873512', '21/04/29', 'b', '', '200'),
('682791543', 'Ram', 'ram@gmail.com', '7992230085', '123', '21/04/30', 'a', '', '1900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminhistory`
--
ALTER TABLE `adminhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminhistory`
--
ALTER TABLE `adminhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
