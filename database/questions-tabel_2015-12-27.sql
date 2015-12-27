-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2015 at 09:25 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Answer_1` text NOT NULL,
  `Answer_2` text NOT NULL,
  `Answer_3` text NOT NULL,
  `Answer_4` text NOT NULL,
  `n_Answer` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, 'The title of debut ‘Whatever People Say I Am, That’s What I’m Not’ is a quote from the book:', 'Discrete Mathematics', 'Illuminati', 'Harry Potter and the Deathly Hallows', 'Saturday Night And Sunday Morning ', 4),
(9, 'The band are big fans of which TV- Series:', 'Breaking Bad', 'Dexter', 'The Wire', 'Once Upon a Time', 3),
(10, 'In 2008, former bassist Andy Nicholson opened his first pub ‘The Bowery’ in Sheffield. Matt Helders said he''s like to follow suit, opening a pub called:\r\n', 'The Cautious Dog', 'The Cautious Horse', 'The hippy cat', 'You are former', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
