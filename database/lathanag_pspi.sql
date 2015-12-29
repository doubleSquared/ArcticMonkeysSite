-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: webpagesdb.it.auth.gr:3306
-- Generation Time: Dec 29, 2015 at 06:13 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lathanag_pspi`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `comment`, `timestamp`) VALUES
(8, 's.yfantidou@gmail.com', 'This is a test comment!', '2015-12-17 18:31:18'),
(11, 'sifantid@yahoo.gr', 'Desperate, aren''t you?', '2015-12-27 12:50:00'),
(12, '', 'Soooooooo nice!', '2015-12-27 14:26:15'),
(13, 'lathanag@csd.auth.gr', 'hello its me', '2015-12-28 14:59:16'),
(14, 'gifantid@gmail.com', 'Welcome Sakis!', '2015-12-28 16:07:50'),
(15, 'sifantid@yahoo.gr', 'Welcome both!', '2015-12-28 16:08:03'),
(16, 's.yfantidou@gmail.com', 'Too many comments!', '2015-12-28 16:08:20'),
(17, 'sifantid@yahoo.gr', 'One more comment! It''s getting boring! :P', '2015-12-28 16:08:52'),
(18, 'sifantid@yahoo.gr', 'And one more!', '2015-12-28 16:09:02'),
(19, 'gifantid@gmail.com', 'And one more!', '2015-12-28 16:09:13'),
(20, 'lalala@hello.me', 'Hello this is lalala!', '2015-12-28 16:46:55'),
(21, '', '<br/><p>lalalala</p><br/>', '2015-12-28 17:15:58'),
(22, '', 'Sausages everywhere!!! <3', '2015-12-28 17:19:45'),
(23, '', 'kalimera', '2015-12-28 19:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`ID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Answer_1` text NOT NULL,
  `Answer_2` text NOT NULL,
  `Answer_3` text NOT NULL,
  `Answer_4` text NOT NULL,
  `n_Answer` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `Question`, `Answer_1`, `Answer_2`, `Answer_3`, `Answer_4`, `n_Answer`) VALUES
(1, 'In 2007, Arctic Monkeys collaborated with a couple other British artists under the name of:', 'Death Stairs', 'Alive Ramps', 'Alive Stairs', 'Death Ramps', 4),
(2, 'Arctic Monkeys were one of the first bands to make it big via:', 'Facebook', 'LinkedIn', 'MySpace', 'Amazon', 3),
(3, 'One of Cooks many odd jobs include:', 'Clown', 'Bathroom tiler', 'Drug Tester', 'Minister', 2),
(4, 'Frontman Alex Turner wrote ''Fluorescent Adolescent'' with his girlfriend, Johanna Bennett, who''s now married to:', 'King of Leon''s Matthew Followill', 'His father', 'Bono', 'Alexis Tsipras', 1),
(5, 'The song ''R U Mine'' was inspired:', 'Star Wars Movies', 'Shakira', 'Lil Wayne and Drake', 'Alex'' Wife', 3),
(6, 'Helders was replaced by Elvis Costello''s drummer Pete Thomas during the recording of ''AM'' because the Arctic Monkeys drummer broke his hand after:\r\n', 'A car accident', 'Drunkenly punching a wall one night', 'A fight with the other members', 'Bungee Jumping', 2),
(7, 'Arctic Monkeys is one of the most popular bands in the world. They have been nominated in Grammy awards for:', '3 Times', '2 Times', '7 Times', '25 Times', 1),
(8, 'The title of debut "Whatever People Say I Am, That''s What I''m Not" is a quote from the book:', 'Discrete Mathematics', 'Illuminati', 'Harry Potter and the Deathly Hallows', 'Saturday Night And Sunday Morning ', 4),
(9, 'The band are big fans of which TV- Series:', 'Breaking Bad', 'Dexter', 'The Wire', 'Once Upon a Time', 3),
(10, 'In 2008, former bassist Andy Nicholson opened his first pub "The Bowery" in Sheffield. Matt Helders said he''s like to follow suit, opening a pub called:\r\n', 'The Cautious Dog', 'The Cautious Horse', 'The hippy cat', 'You are former', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
