-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2014 at 09:22 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `football`
--
CREATE DATABASE IF NOT EXISTS `football` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `football`;

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `actionID` int(10) NOT NULL AUTO_INCREMENT,
  `actionType` varchar(100) NOT NULL,
  `entityID` int(100) NOT NULL,
  `actionYards` int(3) DEFAULT NULL,
  `downID` int(100) NOT NULL,
  PRIMARY KEY (`actionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=394 ;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`actionID`, `actionType`, `entityID`, `actionYards`, `downID`) VALUES
(1, 'rush', 4, 3, 4),
(2, 'kick', 8, 40, 5),
(3, 'rush', 4, 3, 4),
(4, 'kick', 8, 40, 5),
(5, 'rush', 1, 3, 0),
(6, 'kick', 8, 40, 5),
(7, 'rush', 1, 23, 0),
(8, 'kick', 8, 40, 5),
(9, 'rush', 4, 80, 0),
(10, 'rush', 4, 80, 0),
(11, 'rush', 4, 80, 0),
(12, 'rush', 4, 100, 0),
(13, 'rush', 4, 100, 0),
(14, 'rush', 4, 100, 0),
(15, 'rush', 4, 100, 9),
(16, 'rush', 4, 100, 9),
(17, 'pass', 4, 100, 9),
(18, 'pass', 3, 23, 9),
(19, 'pass', 4, 23, 9),
(20, 'kick', 4, 100, 9),
(21, 'kick', 3, 23, 9),
(22, 'kick', 4, 23, 9),
(23, 'kickoff', 1, 1, 9),
(24, 'fieldgoal', 1, 223, 6),
(25, 'kickoff', 1, 223, 6),
(26, 'PAT', 2, 223, 6),
(27, 'PAT', 2, 223, 6),
(28, 'fieldgoal', 2, 223, 6),
(29, 'kickoff', 2, 223, 6),
(30, 'return', 2, 5, 6),
(31, 'PAT', 2, 223, 6),
(32, 'return', 2, 5, 6),
(33, 'PAT', 2, 223, 6),
(34, 'return', 2, 5, 6),
(35, '', 2, 3, 9),
(36, 'PAT', 2, 3, 9),
(37, 'return', 0, 0, 9),
(38, '', 2, 3, 9),
(39, 'punt', 2, 3, 9),
(40, '', 2, 3, 9),
(41, '', 2, 3, 9),
(42, 'PAT', 2, 3, 9),
(43, 'return', 3, 2, 9),
(44, '', 2, 3, 9),
(45, '', 2, 3, 9),
(46, 'PAT', 2, 3, 9),
(47, 'return', 3, 2, 9),
(48, '', 3, 4, 5),
(49, '', 3, 4, 5),
(50, 'fieldgoal', 3, 4, 5),
(51, 'return', 3, 1, 5),
(52, 'fieldgoal', 3, 4, 5),
(53, 'PAT', 3, 4, 5),
(54, 'fieldgoal', 3, 4, 5),
(55, 'return', 3, 1, 5),
(56, 'fieldgoal', 3, 4, 5),
(57, 'PAT', 3, 4, 5),
(58, 'fieldgoal', 3, 4, 5),
(59, 'return', 3, 1, 5),
(60, 'fieldgoal', 3, 4, 5),
(61, 'PAT', 3, 4, 5),
(62, 'fieldgoal', 3, 4, 5),
(63, 'return', 3, 1, 5),
(64, 'fieldgoal', 1, 1, 6),
(65, 'PAT', 1, 1, 6),
(66, 'PAT', 1, 1, 6),
(67, 'return', 3, 1, 6),
(68, 'PAT', 1, 1, 1),
(69, 'rush', 3, 3, 3),
(70, 'fieldgoal', 2, 3, 3),
(71, 'PAT', 2, 3, 3),
(72, 'punt', 2, 3, 3),
(73, 'return', 0, 0, 3),
(74, 'rush', 3, 3, 3),
(75, 'fieldgoal', 2, 3, 3),
(76, 'PAT', 2, 3, 3),
(77, 'punt', 2, 3, 3),
(78, 'return', 0, 0, 3),
(79, 'rush', 4, 3, 1),
(80, 'rush', 4, 3, 1),
(81, 'rush', 2, 11, 10),
(82, 'rush', 1, 2, 1),
(83, 'rush', 1, 2, 1),
(84, 'rush', 1, 2, 1),
(85, 'rush', 1, 2, 1),
(86, 'rush', 1, 1, 1),
(87, 'pass', 1, 2, 1),
(88, 'pass', 2, 23, 1),
(89, 'pass', 2, 23, 1),
(90, 'kick', 1, 2, 1),
(91, 'kick', 2, 23, 1),
(92, 'kick', 2, 23, 1),
(93, 'fieldgoal', 1, 21, 1),
(94, 'PAT', 1, 21, 1),
(95, 'kickoff', 1, 21, 1),
(96, 'return', 2, 40, 1),
(97, 'kick', 1, 2, 1),
(98, 'kick', 2, 23, 1),
(99, 'kick', 2, 23, 1),
(100, 'fieldgoal', 1, 21, 1),
(101, 'PAT', 1, 21, 1),
(102, 'fieldgoal', 1, 21, 1),
(103, 'return', 2, 40, 1),
(104, 'kick', 1, 2, 1),
(105, 'kick', 2, 23, 1),
(106, 'kick', 2, 23, 1),
(107, 'fieldgoal', 1, 2, 1),
(108, 'PAT', 1, 2, 1),
(109, 'kickoff', 1, 2, 1),
(110, 'return', 3, 4, 1),
(111, 'kick', 1, 2, 1),
(112, 'kick', 2, 23, 1),
(113, 'kick', 2, 23, 1),
(114, 'fieldgoal', 1, 2, 1),
(115, 'PAT', 1, 2, 1),
(116, 'kickoff', 1, 2, 1),
(117, 'return', 3, 4, 1),
(118, 'fieldgoal', 1, 2, 1),
(119, 'PAT', 1, 2, 1),
(120, 'kickoff', 1, 2, 1),
(121, 'return', 3, 4, 1),
(122, 'kickoff', 1, 2, 1),
(123, 'fieldgoal', 1, 2, 1),
(124, 'PAT', 1, 2, 1),
(125, 'punt', 1, 2, 1),
(126, 'return', 3, 4, 1),
(127, 'kickoff', 1, 2, 1),
(128, 'fieldgoal', 1, 2, 1),
(129, 'PAT', 1, 2, 1),
(130, 'punt', 1, 2, 1),
(131, 'return', 3, 4, 1),
(132, 'kickoff', 3, 4, 4),
(133, 'fieldgoal', 3, 4, 4),
(134, 'PAT', 3, 4, 4),
(135, 'punt', 3, 4, 4),
(136, 'return', 4, 6, 4),
(137, 'kickoff', 1, 6, 3),
(138, 'fieldgoal', 1, 6, 3),
(139, 'PAT', 1, 6, 3),
(140, 'punt', 1, 6, 3),
(141, 'return', 2, 7, 3),
(142, 'kickoff', 1, 6, 3),
(143, 'fieldgoal', 1, 6, 3),
(144, 'PAT', 1, 6, 3),
(145, 'punt', 1, 6, 3),
(146, 'return', 2, 7, 3),
(147, 'kickoff', 1, 6, 3),
(148, 'fieldgoal', 1, 6, 3),
(149, 'PAT', 1, 6, 3),
(150, 'punt', 1, 6, 3),
(151, 'return', 2, 7, 3),
(152, 'kickoff', 1, 6, 3),
(153, 'fieldgoal', 1, 6, 3),
(154, 'PAT', 1, 6, 3),
(155, 'punt', 1, 6, 3),
(156, 'return', 2, 7, 3),
(157, 'kickoff', 3, 2, 1),
(158, 'fieldgoal', 3, 2, 1),
(159, 'PAT', 3, 2, 1),
(160, 'punt', 3, 2, 1),
(161, 'return', 3, 50, 1),
(162, 'kickoff', 3, 2, 1),
(163, 'fieldgoal', 3, 2, 1),
(164, 'PAT', 3, 2, 1),
(165, 'punt', 3, 2, 1),
(166, 'return', 3, 50, 1),
(167, 'return', 3, 50, 1),
(168, 'fieldgoal', 3, 2, 1),
(169, 'return', 3, 50, 1),
(170, 'fieldgoal', 3, 2, 1),
(171, 'return', 3, 50, 1),
(172, 'punt', 3, 2, 1),
(173, 'return', 3, 50, 1),
(174, 'PAT', 2, 5, 7),
(175, 'rush', 2, 5, 10),
(176, 'touchdown', 2, 0, 10),
(177, 'kick', 2, 5, 10),
(178, 'fieldgoal', 2, 50, 10),
(179, 'touchdown', 2, 0, 10),
(180, 'touchdown', 2, 0, 10),
(181, 'fieldgoal', 1, 16, 11),
(182, 'kickoff', 1, 16, 11),
(183, 'tackle', 1, 0, 11),
(184, 'tackle', 0, 0, 11),
(185, 'kickoff', 1, 16, 11),
(186, 'tackle', 1, 0, 11),
(187, 'tackle', 0, 0, 11),
(188, 'kickoff', 1, 16, 11),
(189, 'tackle', 1, 0, 11),
(190, 'tackle', 4, 0, 11),
(191, 'kickoff', 1, 16, 11),
(192, 'tackle', 1, 0, 11),
(193, 'tackle', 4, 0, 11),
(194, 'pass', 4, 1, 9),
(195, 'pass', 2, 1, 9),
(196, 'tackle', 1, 0, 9),
(197, 'tackle', 3, 0, 9),
(198, 'pass', 4, 1, 9),
(199, 'pass', 2, 1, 9),
(200, 'tackle', 1, 0, 9),
(201, 'tackle', 3, 0, 9),
(202, 'pass', 4, 1, 9),
(203, 'pass', 2, 1, 9),
(204, 'pass', 4, 1, 5),
(205, 'pass', 2, 1, 5),
(206, 'pass', 4, 1, 5),
(207, 'pass', 2, 1, 5),
(208, 'rush', 1, 23, 7),
(209, 'rush', 1, 23, 7),
(210, 'tackle', 1, 0, 7),
(211, 'rush', 1, 23, 7),
(212, 'tackle', 1, 0, 7),
(213, 'tackle', 4, 0, 7),
(214, 'rush', 1, 23, 11),
(215, 'tackle', 1, 0, 11),
(216, 'tackle', 4, 0, 11),
(217, 'pass', 1, 23, 11),
(218, 'pass', 0, 0, 11),
(219, 'tackle', 1, 0, 11),
(220, 'tackle', 4, 0, 11),
(221, '2', 0, 0, 11),
(222, 'pass', 1, 23, 11),
(223, 'pass', 0, 0, 11),
(224, 'tackle', 1, 0, 11),
(225, 'tackle', 4, 0, 11),
(226, '2', 0, 6, 11),
(227, 'pass', 1, 23, 11),
(228, 'pass', 0, 0, 11),
(229, 'tackle', 1, 0, 11),
(230, 'tackle', 4, 0, 11),
(231, '2', 0, 6, 11),
(232, 'rush', 4, 30, 1),
(233, 'rush', 4, 30, 1),
(234, 'rush', 4, 30, 1),
(235, 'rush', 4, 30, 1),
(236, 'rush', 1, 9, 3),
(237, 'twopoint', 1, 0, 3),
(238, 'rush', 1, 9, 3),
(239, 'twopoint', 1, 0, 3),
(240, 'rush', 1, 3, 2),
(241, 'rush', 1, 34, 1),
(242, 'rush', 2, 4, 3),
(243, 'rush', 1, 1, 1),
(244, 'rush', 1, 1, 1),
(245, 'rush', 1, 1, 1),
(246, 'rush', 1, 2, 1),
(247, 'rush', 2, 4, -1),
(248, 'rush', 1, 1, 1),
(249, 'rush', 1, 1, 1),
(250, 'rush', 2, -1, -1),
(251, 'rush', 1, 2, 1),
(252, 'rush', 1, 23, 1),
(253, 'rush', 1, 1, 1),
(254, 'rush', 1, 1, 1),
(255, 'rush', 1, 1, 1),
(256, 'rush', 1, 1, 1),
(257, 'rush', 1, 34, 1),
(258, 'rush', 1, 34, 1),
(259, 'rush', 1, 1, 1),
(260, 'rush', 1, 1, 1),
(261, 'rush', 1, 1, 1),
(262, 'rush', 1, 1, 1),
(263, 'rush', 1, 1, 1),
(264, 'rush', 1, 1, 1),
(265, 'rush', 1, 1, 1),
(266, 'rush', 1, 1, 1),
(267, 'rush', 1, 1, 1),
(268, 'rush', 1, 1, 1),
(269, 'rush', 1, 1, 1),
(270, 'rush', 1, 2, 1),
(271, 'rush', 1, 1, 1),
(272, 'rush', 1, 1, 1),
(273, 'rush', 1, 1, 1),
(274, 'pass', 1, 1, 1),
(275, 'pass', 3, 1, 1),
(276, 'pass', 2, 1, 1),
(277, 'kickoff', 2, 1, 1),
(278, 'return', 1, 1, 1),
(279, 'kickoff', 3, 1, 1),
(280, 'return', 4, 1, 1),
(281, 'fieldgoal', 3, 1, 1),
(282, 'return', 4, 0, 1),
(283, 'rush', 1, 2, 2),
(284, 'rush', 1, 5, 1),
(285, 'rush', 1, 12, 1),
(286, 'rush', 3, 1, 1),
(287, 'rush', 1, 1, 1),
(288, 'rush', 1, 1, 1),
(289, 'rush', 1, 1, 1),
(290, 'rush', 1, 1, 1),
(291, 'pass', 1, 1, 1),
(292, 'pass', 3, 1, 1),
(293, 'pass', 4, 1, 1),
(294, 'kick', 1, 1, 1),
(295, 'kick', 3, 1, 1),
(296, 'kick', 4, 1, 1),
(297, 'kickoff', 2, 1, 1),
(298, 'return', 1, 1, 1),
(299, 'kick', 1, 1, 1),
(300, 'kick', 3, 1, 1),
(301, 'kick', 4, 1, 1),
(302, 'kickoff', 2, 1, 1),
(303, 'return', 1, 1, 1),
(304, 'kick', 1, 1, 1),
(305, 'kick', 3, 1, 1),
(306, 'kick', 4, 1, 1),
(307, 'kickoff', 2, 1, 1),
(308, 'return', 1, 1, 1),
(309, 'kick', 1, 1, 1),
(310, 'kick', 3, 1, 1),
(311, 'kick', 4, 1, 1),
(312, 'kickoff', 2, 1, 1),
(313, 'return', 1, 1, 1),
(314, 'kick', 1, 1, 1),
(315, 'kick', 3, 1, 1),
(316, 'kick', 4, 1, 1),
(317, 'kickoff', 2, 1, 1),
(318, 'return', 1, 1, 1),
(319, 'kick', 1, 1, 1),
(320, 'kick', 3, 1, 1),
(321, 'kick', 4, 1, 1),
(322, 'kickoff', 2, 1, 1),
(323, 'return', 1, 1, 1),
(324, 'kick', 1, 1, 1),
(325, 'kick', 3, 1, 1),
(326, 'kick', 4, 1, 1),
(327, 'kickoff', 2, 1, 1),
(328, 'return', 1, 1, 1),
(329, 'kick', 1, 1, 1),
(330, 'kick', 3, 1, 1),
(331, 'kick', 4, 1, 1),
(332, 'kickoff', 2, 1, 1),
(333, 'return', 1, 1, 1),
(334, 'kick', 1, 1, 1),
(335, 'kick', 3, 1, 1),
(336, 'kick', 4, 1, 1),
(337, 'kickoff', 2, 1, 1),
(338, 'return', 1, 1, 1),
(339, 'pass', 1, 1, 1),
(340, 'pass', 3, 1, 1),
(341, 'pass', 4, 1, 1),
(342, 'kickoff', 2, 1, 1),
(343, 'return', 1, 1, 1),
(344, 'pass', 1, 1, 1),
(345, 'pass', 3, 1, 1),
(346, 'pass', 4, 1, 1),
(347, 'kickoff', 2, 1, 1),
(348, 'return', 1, 1, 1),
(349, 'pass', 1, 1, 1),
(350, 'pass', 3, 1, 1),
(351, 'pass', 4, 1, 1),
(352, 'kickoff', 2, 1, 1),
(353, 'return', 1, 1, 1),
(354, 'pass', 1, 1, 1),
(355, 'pass', 3, 1, 1),
(356, 'pass', 4, 1, 1),
(357, 'kickoff', 2, 1, 1),
(358, 'return', 1, 1, 1),
(359, 'pass', 1, 1, 1),
(360, 'pass', 3, 1, 1),
(361, 'pass', 4, 1, 1),
(362, 'kickoff', 2, 1, 1),
(363, 'return', 1, 1, 1),
(364, 'pass', 1, 1, 1),
(365, 'pass', 3, 1, 1),
(366, 'pass', 4, 1, 1),
(367, 'kickoff', 2, 1, 1),
(368, 'return', 1, 1, 1),
(369, 'rush', 1, 1, 1),
(370, 'rush', 1, 1, 1),
(371, 'rush', 1, 1, 1),
(372, 'rush', 1, 1, 1),
(373, 'rush', 2, 1, 1),
(374, 'rush', 2, 1, 1),
(375, 'rush', 2, 1, 1),
(376, 'rush', 4, 1, 1),
(377, 'rush', 2, 1, 1),
(378, 'rush', 1, 1, 1),
(379, 'rush', 1, 1, 1),
(380, 'rush', 2, 15, 10),
(381, 'touchdown', 2, 0, 10),
(382, 'rush', 2, 15, 10),
(383, 'touchdown', 2, 0, 10),
(384, 'rush', 2, 15, 10),
(385, 'touchdown', 2, 0, 10),
(386, 'rush', 2, 15, 10),
(387, 'touchdown', 2, 0, 10),
(388, 'pass', 1, 2, 1),
(389, 'pass', 2, 2, 1),
(390, 'pass', 1, 2, 1),
(391, 'pass', 2, 2, 1),
(392, 'pass', 1, 2, 1),
(393, 'pass', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE IF NOT EXISTS `coaches` (
  `coachID` int(10) NOT NULL AUTO_INCREMENT,
  `coachFirstName` varchar(20) NOT NULL,
  `coachLastName` varchar(25) NOT NULL,
  `coachYear` int(3) NOT NULL,
  `coachType` enum('Head Coach','Assistant Coach') DEFAULT NULL,
  `teamID` int(10) NOT NULL,
  PRIMARY KEY (`coachID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`coachID`, `coachFirstName`, `coachLastName`, `coachYear`, `coachType`, `teamID`) VALUES
(1, 'Ed', 'Lamb', 2007, 'Head Coach', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(10) NOT NULL AUTO_INCREMENT,
  `commentMessage` varchar(500) NOT NULL,
  `dateTime` datetime DEFAULT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE IF NOT EXISTS `conferences` (
  `conferenceID` int(100) NOT NULL AUTO_INCREMENT,
  `conferenceName` varchar(200) NOT NULL,
  `leagueID` int(100) NOT NULL,
  PRIMARY KEY (`conferenceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`conferenceID`, `conferenceName`, `leagueID`) VALUES
(1, 'Big Sky', 1),
(2, 'Southland', 1);

-- --------------------------------------------------------

--
-- Table structure for table `defensivestops`
--

CREATE TABLE IF NOT EXISTS `defensivestops` (
  `defensiveID` int(100) NOT NULL AUTO_INCREMENT,
  `defenseType` enum('tackle','assistTackle','blockedPass','blockedKick') NOT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`defensiveID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `downs`
--

CREATE TABLE IF NOT EXISTS `downs` (
  `downID` int(10) NOT NULL AUTO_INCREMENT,
  `downQuarter` enum('1','2','3','4','OT') DEFAULT NULL,
  `downNumber` enum('1','2','3','4') DEFAULT NULL,
  `teamWithBall` int(100) NOT NULL,
  `sideOfField` int(100) NOT NULL,
  `ballOn` int(3) NOT NULL,
  `yardsToGo` int(3) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `matchupID` int(10) DEFAULT NULL,
  PRIMARY KEY (`downID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `downs`
--

INSERT INTO `downs` (`downID`, `downQuarter`, `downNumber`, `teamWithBall`, `sideOfField`, `ballOn`, `yardsToGo`, `startTime`, `endTime`, `matchupID`) VALUES
(1, '', '1', 1, 1, 35, 10, '00:13:24', '00:00:00', 1),
(2, '', '2', 1, 1, 40, 5, '00:13:20', '00:00:00', 1),
(3, '', '1', 1, 1, 60, 10, '00:13:01', '00:00:00', 1),
(4, '', '2', 1, 1, 4, 7, '13:18:02', '13:18:02', 4),
(5, '', '1', 2, 1, 10, 15, '20:41:13', '20:41:13', 1),
(6, '', '1', 2, 1, 10, 15, '20:43:32', '20:43:32', 1),
(7, '', '1', 2, 1, 10, 15, '20:43:50', '20:43:50', 1),
(8, '', '1', 2, 1, 10, 15, '20:45:23', '20:45:23', 1),
(9, '', '1', 2, 1, 10, 15, '20:45:23', '20:45:23', 1),
(10, '1', '1', 2, 1, 10, 15, '20:45:23', '20:45:23', 1),
(11, '1', '1', 2, 1, 10, 15, '20:45:23', '20:45:23', 1),
(12, '1', '1', 2, 1, 10, 15, '20:45:23', '20:45:23', 1),
(13, 'OT', '3', 1, 1, 30, 5, '10:03:20', '10:03:10', 6),
(14, '2', '2', 1, 1, 0, 4, '03:04:20', '04:09:00', 3),
(15, '2', '1', 1, 1, 0, 1, '10:03:20', '00:15:00', 1),
(16, '2', '1', 1, 1, 0, 1, '10:03:20', '00:15:00', 1),
(17, '2', '1', 1, 1, 0, 1, '10:03:20', '00:15:00', 1),
(18, '2', '1', 1, 1, 0, 1, '10:03:20', '00:15:00', 1),
(19, '2', '1', 1, 1, 0, 1, '10:03:20', '00:15:00', 1),
(20, '2', '1', 1, 1, 0, 1, '10:03:20', '00:15:00', 1),
(21, '2', '1', 1, 1, 0, 1, '10:03:20', '00:15:00', 1),
(22, '1', '1', 2, 1, 0, 1, '12:00:01', '00:15:00', 1),
(23, '1', '1', 2, 1, 0, 1, '12:00:01', '00:15:00', 1),
(24, '3', '1', 1, 1, 0, 1, '12:00:21', '00:15:10', 1),
(25, '2', '1', 1, 1, 0, 1, '12:00:00', '12:00:00', 1),
(26, '1', '1', 1, 1, 0, 1, '12:00:00', '12:00:00', 1),
(27, '1', '1', 1, 1, 0, 1, '12:00:00', '12:00:00', 1),
(28, '1', '2', 1, 1, 0, 1, '12:00:00', '12:00:00', 1),
(29, '2', '2', 2, 1, 0, 1, '12:00:00', '12:00:00', 1),
(30, '4', '1', 1, 2, 0, 1, '12:00:00', '12:00:00', 1),
(31, '1', '1', 1, 1, 0, 1, '12:00:00', '12:00:00', 1),
(32, '1', '1', 1, 1, 0, 1, '12:01:00', '12:00:00', 1),
(33, '2', '1', 2, 1, 0, 1, '00:10:00', '00:15:00', 15),
(34, '2', '1', 2, 1, 0, 1, '00:10:00', '00:15:00', 15),
(35, '2', '1', 2, 1, 0, 1, '00:10:00', '00:15:00', 15),
(36, '2', '1', 2, 1, 0, 1, '00:10:00', '00:15:00', 15),
(37, '2', '1', 1, 1, 0, 1, '00:02:00', '00:01:00', 1),
(38, '2', '1', 1, 1, 0, 1, '00:02:00', '00:01:00', 1),
(39, '2', '1', 1, 1, 0, 1, '00:02:00', '00:01:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entityawards`
--

CREATE TABLE IF NOT EXISTS `entityawards` (
  `awardID` int(100) NOT NULL AUTO_INCREMENT,
  `entityID` int(100) NOT NULL,
  `entityType` enum('Player','Coach','Team') NOT NULL,
  `awardName` varchar(200) NOT NULL,
  `awardType` varchar(200) NOT NULL,
  `awardDate` time DEFAULT NULL,
  `awardSeasonID` int(3) NOT NULL,
  PRIMARY KEY (`awardID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `everythingfootballsheets`
--

CREATE TABLE IF NOT EXISTS `everythingfootballsheets` (
  `sheetID` int(10) NOT NULL AUTO_INCREMENT,
  `playerOfGame` int(10) DEFAULT NULL,
  `playerDroveCrazy` int(10) DEFAULT NULL,
  `playOfGame` int(10) DEFAULT NULL,
  `playThatAngered` int(10) DEFAULT NULL,
  `bestMoment` varchar(300) DEFAULT NULL,
  `result` varchar(300) DEFAULT NULL,
  `feelings` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sheetID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `gameID` int(3) NOT NULL AUTO_INCREMENT,
  `gameKickOffTime` datetime DEFAULT NULL,
  `seasonID` int(10) NOT NULL,
  PRIMARY KEY (`gameID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameID`, `gameKickOffTime`, `seasonID`) VALUES
(1, '2014-10-08 19:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE IF NOT EXISTS `leagues` (
  `leagueID` int(10) NOT NULL AUTO_INCREMENT,
  `leagueName` varchar(100) NOT NULL,
  `leagueLevel` enum('FCS','FBS') DEFAULT 'FCS',
  `leagueYear` int(3) NOT NULL,
  PRIMARY KEY (`leagueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`leagueID`, `leagueName`, `leagueLevel`, `leagueYear`) VALUES
(1, 'Big Sky', 'FCS', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `matchups`
--

CREATE TABLE IF NOT EXISTS `matchups` (
  `matchupID` int(10) NOT NULL AUTO_INCREMENT,
  `homeTeamID` int(3) NOT NULL,
  `awayTeamID` int(3) NOT NULL,
  `gameID` int(3) NOT NULL,
  PRIMARY KEY (`matchupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `matchups`
--

INSERT INTO `matchups` (`matchupID`, `homeTeamID`, `awayTeamID`, `gameID`) VALUES
(1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE IF NOT EXISTS `penalties` (
  `penaltyID` int(100) NOT NULL AUTO_INCREMENT,
  `penaltyType` enum('update this') NOT NULL,
  `penaltyOn` enum('player','coach','team') NOT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`penaltyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penaltylookup`
--

CREATE TABLE IF NOT EXISTS `penaltylookup` (
  `penaltyType` varchar(250) NOT NULL,
  `penaltyYards` int(3) NOT NULL,
  `penaltyEffect` enum('none','autoFirstDown','lossOfDown') DEFAULT NULL,
  `penaltyDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`penaltyType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penaltylookup`
--

INSERT INTO `penaltylookup` (`penaltyType`, `penaltyYards`, `penaltyEffect`, `penaltyDescription`) VALUES
('Block in the back', 10, 'none', 'A blocker contacting a non-ballcarrying member of the opposing team from behind and above the waist.'),
('Blocking below the waist', 15, 'autoFirstDown', 'An illegal block, from any direction, below the waist by any defensive player or by an offensive player under certain situations, by any player after change of possession, by any player in high school with certain exceptions. Sometimes incorrectly referred to as a ''''chop block''''.'),
('Chop block', 15, 'autoFirstDown', 'An offensive player tries to cut block a defensive player that is already being blocked by another offensive player. The second block may need to be below the thigh or knee, depending on the code.'),
('Clipping', 15, 'none', 'A blocker contacting a non-ballcarrying opponent from behind and at or below the waist.'),
('Delay of game', 5, 'none', 'Any action which delays the next play. On offense, this means failing to snap the ball before the play clock reaches zero. It may also include spiking the ball.'),
('Encroachment', 5, 'none', 'Before the snap, a defensive player illegally crosses the line of scrimmage and makes contact with an opponent or has a clear path to the quarterback.'),
('Facemask', 15, 'autoFirstDown', 'Grasping the face mask of another player while attempting to block or tackle him.'),
('False start', 5, 'none', 'An offensive player illegally moves after lining up for?but prior to?the snap. Since the ball is dead, the down does not begin.  Any player who moves after he has gotten in his set position before the snap in a way that simulates the start of the play.'),
('Helmet-to-helmet', 15, 'autoFirstDown', 'Initiating contact using the crown of the helmet to any part of the opponent.'),
('Holding', 10, 'none', 'Illegally grasping or pulling an opponent other than the ball carrier while attempting to ward off a block or cover a receiver. One of the most commonly called penalties.'),
('Horse-collar tackle', 15, 'autoFirstDown', 'Illegally tackling another player by grabbing the inside of the ball carriers shoulder pads or jersey from behind and yanking the player down.'),
('Illegal batting', 10, 'none', '(offense) Any intentional batting of a loose ball or ball in player possession. Batting is legal in certain limited situations, such as blocking a kick or deflecting a forward pass (any eligible player may bat a forward pass in any direction).'),
('Illegal formation', 5, 'none', 'Fewer than 7 players line up on the line of scrimmage (NFL/High School); more than four players in the backfield (NCAA only); eligible receivers fail to line up as the leftmost and rightmost players on the line in the NFL; or when five properly numbered ineligible players fail to line up on the line.'),
('Illegal forward pass', 5, 'none', '(offense) 5 yards from the spot of the foul and loss of down (safety if the foul occurs in the end zone).'),
('Illegal hands to the face', 15, 'autoFirstDown', 'Pushing or hitting a player on offense in the head or helmet.'),
('Illegal kick', 10, 'none', 'Any ball not kicked in accordance with the rules, for instance:     When an attempted drop kick bounces more than once before being kicked.'),
('Illegal kickoff', 0, 'none', '(special teams)   The ball, after a kickoff, heads out of bounds between both goal lines without touching any player on either team.'),
('Illegal motion', 5, 'none', '(offense) A player in motion is moving forward at the time of the snap.'),
('Illegal participation', 5, 'none', '12 or more players participate during play, or an out of bound player comes back in and participates.'),
('Illegal shift', 5, 'none', 'A player is not in motion but is not set before the snap; more than one player is in motion at the snap; or after more than one player was moving (shifting), all eleven players have not been motionless for one second.'),
('Illegal substitution', 5, 'none', 'The team has twelve or more players in the huddle for a period of 3?5 seconds or twelve or more players in the formation before a play or a player is attempting to leave the field as the ball is snapped.'),
('Illegal touching of a free kick', 5, 'none', '''The ball, after the free kick, first touches a member of the kicking team prior to travelling 10 yards. This is most often seen on an onside kick.'),
('Ineligible receiver', 5, 'none', 'A forward pass first touches an ineligible receiver (an offensive lineman). If the ball is touched by the defenders first, any player may touch it.'),
('Ineligible receiver downfield', 5, 'none', '(offense) An ineligible receiver is past the line of scrimmage prior to a forward pass. Ineligible receivers must wait until the pass is thrown beyond the line of scrimmage (or touched) before moving past the line of scrimmage. This exception has been added to accommodate the screen pass, where a receiver (most often a back, but sometimes a tight end or wide receiver) catches a ball behind the line of scrimmage behind a ''''screen'''' of offensive linemen.'),
('Intentional grounding', 10, 'lossOfDown', '(offense) A forward pass is thrown intentionally incomplete while in the pocket.'),
('Leaping', 10, 'autoFirstDown', '(defense) A defender at least one yard in front of the line of scrimmage running forward and leaping in an attempt to block a field goal or a point-after try lands on other players on either team. The penalty is not called if the defender was within one yard of the line of scrimmage at the time of the snap.'),
('Leverage', 15, 'none', '(defense) A defensive player jumping or standing on a teammate or an opponent to block or attempt to block an opponents kick.'),
('Offsides', 5, 'none', 'A player is on the wrong side of the line of scrimmage when the ball is snapped. If a defender jumps across the line but gets back to his side before the snap, there is no foul.'),
('Pass interference', 15, 'autoFirstDown', 'Making physical contact with an intended receiver (intentional physical contact in NFL), after the ball has been thrown and before it has been touched by another player, in order to hinder or prevent him from catching a forward pass. (On offense, the restriction begins at the snap and continues until the ball is touched in order to prevent receivers from blocking defenders away from a passed ball.)'),
('Personal foul', 15, 'autoFirstDown', 'A conduct- or safety-related infraction. Includes unnecessary roughness, such as hitting a ball carrier after he is already out of bounds, ''''piling on'''' a ball carrier who is already down, or violent contact with an opponent who is away from and out of the play. If the officials decide that the action was particularly flagrant, the player in question can be ejected from the game.'),
('Roughing the kicker', 15, 'autoFirstDown', '(special teams)  A defender, having missed an attempt to block a kick, tackles the kicker or otherwise runs into the kicker in a way that might injure the kicker or his vulnerable extended kicking leg. This protection is also extended to the holder of a place kick.'),
('Roughing the passer', 15, 'autoFirstDown', '(defense) A defender continues an effort to tackle or ''''hit'''' a passer after the passer has already thrown a pass. (In the NFL, a defender is allowed to take one step after the ball is thrown; a defender is penalized if he hits the passer having taken two or more steps after the ball leaves the passers hand, or if the passer is hit above the shoulders, or if the passer is targeted using the crown of the helmet.)'),
('Roughing the snapper', 15, 'autoFirstDown', '(special teams) A defender, having missed an attempt to block a kick, tackles the kicker or otherwise runs into the kicker in a way that might injure the kicker or his vulnerable extended kicking leg. This protection is also extended to the holder of a place kick.'),
('Unsportsmanlike conduct', 15, 'autoFirstDown', 'A non-contact personal foul.');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `playerID` int(10) NOT NULL AUTO_INCREMENT,
  `playerNumber` int(3) NOT NULL,
  `playerFirstName` varchar(30) NOT NULL,
  `playerLastName` varchar(30) NOT NULL,
  `playerPosition` enum('Wide Receiver','Quarter Back','Corner Back','OL Guard','OL Center','OL Tackle','DL Center','DL Tackle','Line Backer','Safety','Tight End','Running Back','Kicker','Punter','Long Snapper','Holder','Special Teams') DEFAULT NULL,
  `playerHeight` decimal(3,2) DEFAULT NULL,
  `playerWeight` int(3) DEFAULT NULL,
  `playerYear` enum('Freshman','Sophomore','Junior','Senior') DEFAULT NULL,
  `isRedshirt` enum('false','true') NOT NULL DEFAULT 'false',
  `playerPreviousSchool` varchar(50) DEFAULT NULL,
  `teamID` int(10) NOT NULL,
  PRIMARY KEY (`playerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerID`, `playerNumber`, `playerFirstName`, `playerLastName`, `playerPosition`, `playerHeight`, `playerWeight`, `playerYear`, `isRedshirt`, `playerPreviousSchool`, `teamID`) VALUES
(1, 1, 'C.J.', 'Morgan', 'Wide Receiver', '5.11', 178, 'Junior', 'false', 'Aurora, Colo', 1),
(2, 2, 'Jacob', 'Allie', 'Tight End', '6.00', 230, 'Senior', 'false', 'Lindberg HS', 1),
(3, 2, 'T.J.', 'Fenton', 'Quarter Back', '6.20', 190, 'Freshman', 'false', 'The Webb School', 1),
(5, 10, 'Neil', 'Johnson', 'Quarter Back', '6.00', 200, 'Freshman', 'false', 'Canyon View', 2),
(6, 11, 'Cassity', 'Johnson', 'Wide Receiver', '5.30', 130, 'Freshman', 'false', 'Gunnison', 2),
(8, 12, 'Isaach', 'Johnson', 'Kicker', '1.00', 20, 'Freshman', 'false', 'None ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE IF NOT EXISTS `referees` (
  `refID` int(10) NOT NULL AUTO_INCREMENT,
  `refFirstName` varchar(30) NOT NULL,
  `refLastName` varchar(40) NOT NULL,
  `refType` enum('Referee','Umpire','Head Linesman','Line Judge','Back Judge','Field Judge','Side Judge') DEFAULT NULL,
  `refYear` int(3) DEFAULT NULL,
  `matchID` int(10) DEFAULT NULL,
  PRIMARY KEY (`refID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `scorelookup`
--

CREATE TABLE IF NOT EXISTS `scorelookup` (
  `scoreType` varchar(100) NOT NULL,
  `scorePoints` int(2) NOT NULL,
  PRIMARY KEY (`scoreType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorelookup`
--

INSERT INTO `scorelookup` (`scoreType`, `scorePoints`) VALUES
('2 Point Conversion', 2),
('Fieldgoal', 3),
('PAT', 1),
('Safety', 2),
('Touchdown', 6);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `scoreID` int(100) NOT NULL AUTO_INCREMENT,
  `scoreType` enum('Touchdown','PAT','2 Point Conversion','Safety','Fieldgoal') NOT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`scoreID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `seasonID` int(3) NOT NULL AUTO_INCREMENT,
  `seasonYear` year(4) NOT NULL,
  `teamID` int(3) NOT NULL,
  `conferenceID` int(3) NOT NULL,
  PRIMARY KEY (`seasonID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`seasonID`, `seasonYear`, `teamID`, `conferenceID`) VALUES
(1, 2014, 1, 1),
(2, 2014, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `teamID` int(10) NOT NULL AUTO_INCREMENT,
  `teamSchool` varchar(100) NOT NULL,
  `teamSchoolAcro` varchar(10) DEFAULT NULL,
  `teamState` char(20) DEFAULT NULL,
  `teamCity` varchar(30) DEFAULT NULL,
  `teamMascot` varchar(40) DEFAULT NULL,
  `conferenceID` int(10) NOT NULL,
  PRIMARY KEY (`teamID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamID`, `teamSchool`, `teamSchoolAcro`, `teamState`, `teamCity`, `teamMascot`, `conferenceID`) VALUES
(1, 'Southern Utah University', 'SUU', 'Utah', 'Cedar City', 'Thunderbirds', 1),
(2, 'Schoo2', 'S2', 'Texas', 'Houston', 'FooFoos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `userROLE` enum('admin','superUser','normal','coach','referee','player') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `emailAddress`, `userROLE`) VALUES
(1, 'Bob', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'bob@gmail.com', NULL),
(2, 'neilmarkjohnson', 'ff8c3049f15b3bf47a2fa686d8d0e6e917d9d5a3d2fb3c95ebcf6cd078503de8', 'neilmarkjohnson@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yards`
--

CREATE TABLE IF NOT EXISTS `yards` (
  `yardID` int(100) NOT NULL AUTO_INCREMENT,
  `yards` int(3) NOT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`yardID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `yards`
--

INSERT INTO `yards` (`yardID`, `yards`, `performanceID`) VALUES
(1, 5, 1),
(2, 5, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
