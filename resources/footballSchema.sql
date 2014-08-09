-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 08:13 AM
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
-- Table structure for table `coaches`
--

CREATE TABLE IF NOT EXISTS `coaches` (
  `coachID` int(10) NOT NULL AUTO_INCREMENT,
  `coachFirstName` varchar(20) NOT NULL,
  `coachLastName` varchar(25) NOT NULL,
  `coachYear` int(3) NOT NULL,
  `coachType` enum('headCoach','assistantCoach') DEFAULT NULL,
  `teamID` int(10) NOT NULL,
  PRIMARY KEY (`coachID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `downQuarter` enum('1st','2nd','3rd','4th','OverTime') DEFAULT NULL,
  `timeOnGameClock` time DEFAULT NULL,
  `downNumber` int(1) DEFAULT NULL,
  `matchupID` int(10) DEFAULT NULL,
  PRIMARY KEY (`downID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entityperformance`
--

CREATE TABLE IF NOT EXISTS `entityperformance` (
  `performanceID` int(100) NOT NULL AUTO_INCREMENT,
  `entityID` int(10) NOT NULL,
  `downID` int(100) NOT NULL,
  PRIMARY KEY (`performanceID`)
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kicking`
--

CREATE TABLE IF NOT EXISTS `kicking` (
  `kickingID` int(100) NOT NULL AUTO_INCREMENT,
  `kickingType` enum('punting','normalKickoff','fieldgoal','PAT','onsideKick') NOT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`kickingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE IF NOT EXISTS `leagues` (
  `leagueID` int(10) NOT NULL,
  `leagueName` varchar(100) NOT NULL,
  `leagueYear` int(3) NOT NULL,
  PRIMARY KEY (`leagueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `passing`
--

CREATE TABLE IF NOT EXISTS `passing` (
  `passingID` int(100) NOT NULL AUTO_INCREMENT,
  `intededReceiverID` int(100) NOT NULL,
  `passCompleted` enum('true','false') DEFAULT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`passingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `playerHeight` decimal(3,2) DEFAULT NULL,
  `playerWeight` decimal(5,2) DEFAULT NULL,
  `playerPosition` enum('Wide Receiver','Quarter Back','Corner Back','OL Guard','OL Center','OL Tackle','DL Center','DL Tackle','Line Backer','Safety','Tight End','Running Back','Kicker','Punter','Long Snapper','Holder','Special Teams') DEFAULT NULL,
  `playerYear` enum('Freshman','Sophomore','Junior','Senior','Redshirt') DEFAULT NULL,
  `playerPreviousSchool` varchar(50) DEFAULT NULL,
  `teamID` int(3) NOT NULL,
  PRIMARY KEY (`playerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `returns`
--

CREATE TABLE IF NOT EXISTS `returns` (
  `returnID` int(100) NOT NULL AUTO_INCREMENT,
  `returnType` enum('kickReturn','puntReturn','interceptionReturn','fumbleReturn') NOT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`returnID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rushing`
--

CREATE TABLE IF NOT EXISTS `rushing` (
  `rushingID` int(100) NOT NULL AUTO_INCREMENT,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`rushingID`)
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
  `leagueID` int(3) NOT NULL,
  PRIMARY KEY (`seasonID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `teamID` int(10) NOT NULL AUTO_INCREMENT,
  `teamSchool` varchar(100) NOT NULL,
  `teamState` char(20) DEFAULT NULL,
  `teamCity` varchar(30) DEFAULT NULL,
  `teamMascot` varchar(40) DEFAULT NULL,
  `leagueID` int(10) NOT NULL,
  PRIMARY KEY (`teamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `turnovers`
--

CREATE TABLE IF NOT EXISTS `turnovers` (
  `turnoverID` int(100) NOT NULL AUTO_INCREMENT,
  `turnoverType` enum('fumbleLost','interception','safety') NOT NULL,
  `performanceID` int(100) NOT NULL,
  PRIMARY KEY (`turnoverID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
