-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2014 at 07:58 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kccregdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ay`
--

CREATE TABLE IF NOT EXISTS `ay` (
  `AY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACADYR` varchar(40) NOT NULL,
  PRIMARY KEY (`AY_ID`),
  UNIQUE KEY `acadyr` (`ACADYR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ay`
--


-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `CLASS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLASS_CODE` varchar(30) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `INST_ID` int(11) NOT NULL,
  `SYID` int(11) NOT NULL,
  `DAY` varchar(20) NOT NULL,
  `TIME` time NOT NULL,
  `IDNO` int(11) NOT NULL,
  PRIMARY KEY (`CLASS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `class`
--


-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COURSE_NAME` varchar(30) NOT NULL,
  `COURSE_LEVEL` int(11) NOT NULL DEFAULT '1',
  `COURSE_MAJOR` varchar(30) NOT NULL DEFAULT '',
  `COURSE_DESC` varchar(255) NOT NULL,
  `DEPT_ID` int(11) NOT NULL,
  PRIMARY KEY (`COURSE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE_ID`, `COURSE_NAME`, `COURSE_LEVEL`, `COURSE_MAJOR`, `COURSE_DESC`, `DEPT_ID`) VALUES
(14, 'BSIT ', 2, '', 'Bachelor of Science in Information chnology', 33),
(15, 'BSIT ', 3, '', 'Bachelor of Science in Information chnology', 33),
(16, 'BSIT ', 4, '', 'Bachelor of Science in Information Technology', 33),
(19, 'BSCA ', 1, '', 'Bachelor of Science in Customs Administrations', 33),
(21, 'BSBA', 1, 'Financial Management', 'Bachelor of Science in Busines Administration ', 34),
(22, 'AB', 1, 'Philosophy', 'Bachelor of ARTS (AB)', 34),
(23, 'AB', 2, 'Philosophy', 'Bachelor of ARTS (AB)', 34),
(24, 'AB', 3, 'Philosophy', 'Bachelor of ARTS (AB)', 34),
(25, 'AB', 4, 'Philosophy', 'Bachelor of ARTS (AB)', 34),
(26, 'AB', 1, 'English', 'Bachelor of ARTS (AB)', 34),
(27, 'AB', 2, 'English', 'Bachelor of ARTS (AB)', 34),
(28, 'AB', 3, 'English', 'Bachelor of ARTS (AB)', 34),
(29, 'AB', 4, 'English', 'Bachelor of ARTS (AB)', 34),
(30, 'BSED', 1, 'English', 'Bachelor of Secondary Education (BSED)', 35),
(31, 'BSED', 2, 'English', 'Bachelor of Secondary Education (BSED)', 35),
(32, 'BSED', 3, 'English', 'Bachelor of Secondary Education (BSED)', 35),
(33, 'BSED', 4, 'English', 'Bachelor of Secondary Education (BSED)', 35),
(34, 'BSED', 1, 'Math', 'Batchelor of Secondary Education (BSED)', 35),
(35, 'BSED', 2, 'Math', 'Batchelor of Secondary Education (BSED)', 35),
(36, 'BSED', 3, 'Math', 'Batchelor of Secondary Education (BSED)', 35),
(37, 'BSED', 4, 'Math', 'Batchelor of Secondary Education (BSED)', 35),
(38, 'BSED', 1, 'Filipino', 'Batchelor of Secondary Education (BSED)', 35),
(39, 'BSED', 2, 'Filipino', 'Batchelor of Secondary Education (BSED)', 35),
(40, 'BSED', 3, 'Filipino', 'Batchelor of Secondary Education (BSED)', 35),
(41, 'BSED', 4, 'Filipino', 'Batchelor of Secondary Education (BSED)', 35),
(42, 'BEED', 1, 'General', 'Batchelor of Elementary Education (BEED)', 35),
(43, 'BEED', 2, 'General', 'Batchelor of Elementary Education (BEED)', 35),
(44, 'BEED', 3, 'General', 'Batchelor of Elementary Education (BEED)', 35),
(45, 'BEED', 4, 'General', 'Batchelor of Elementary Education (BEED)', 35),
(46, 'BSIT ', 1, '', 'Bachelor of Science in Information Technology', 33);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_NAME` varchar(30) NOT NULL,
  `DEPARTMENT_DESC` varchar(50) NOT NULL,
  PRIMARY KEY (`DEPT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `DEPARTMENT_NAME`, `DEPARTMENT_DESC`) VALUES
(33, 'IT', 'Information Technology Department'),
(34, 'BITE', 'Business and IT Education'),
(35, 'TEA', 'Teacher Education Department'),
(36, 'arts', 'Arts Department');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `INST_ID` int(11) NOT NULL,
  `SYID` int(30) NOT NULL,
  `PRE` int(11) NOT NULL,
  `MID` int(11) NOT NULL,
  `FIN` int(11) NOT NULL,
  `FIN_AVE` int(11) NOT NULL,
  `REMARKS` text NOT NULL,
  PRIMARY KEY (`GRADE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `grades`
--


-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `INST_ID` int(30) NOT NULL AUTO_INCREMENT,
  `INST_FULLNAME` varchar(255) NOT NULL,
  `INST_ADDRESS` varchar(255) NOT NULL,
  `INST_SEX` varchar(20) NOT NULL DEFAULT 'Male',
  `INST_STATUS` varchar(20) NOT NULL DEFAULT 'Single',
  `SPECIALIZATION` text NOT NULL,
  `INST_EMAIL` varchar(255) NOT NULL,
  `EMPLOYMENT_STATUS` varchar(40) NOT NULL DEFAULT 'Probationary',
  PRIMARY KEY (`INST_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`INST_ID`, `INST_FULLNAME`, `INST_ADDRESS`, `INST_SEX`, `INST_STATUS`, `SPECIALIZATION`, `INST_EMAIL`, `EMPLOYMENT_STATUS`) VALUES
(1, 'Joken Villanueva', 'Suay Himamaylan City', 'M', 'Single', 'Computer Etc.', 'joken000189561@gmail.com', 'Probationary'),
(2, 'Erick jason Batuto', 'Kabanakalan City', 'M', 'Married', 'Computer ekc...', 'ejbatuto@hotmail.com', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `YR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL` varchar(30) NOT NULL,
  `LEVEL_DESCRIPTION` varchar(255) NOT NULL,
  PRIMARY KEY (`YR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `level`
--


-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `MAJOR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MAJOR` varchar(30) NOT NULL,
  PRIMARY KEY (`MAJOR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`MAJOR_ID`, `MAJOR`) VALUES
(1, 'English'),
(2, 'General'),
(3, 'Marketing Management'),
(4, 'Financial Management'),
(5, 'Filipino'),
(6, 'Philosophy'),
(7, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `PHOTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FILENAME` text NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `SIZE` int(30) NOT NULL,
  `CAPTION` varchar(255) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `PRIMARY` varchar(20) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`PHOTO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `photo`
--


-- --------------------------------------------------------

--
-- Table structure for table `schoolyr`
--

CREATE TABLE IF NOT EXISTS `schoolyr` (
  `SYID` int(11) NOT NULL AUTO_INCREMENT,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `IDNO` int(30) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL DEFAULT 'RESERVED',
  `DATE_RESERVED` datetime NOT NULL,
  `DATE_ENROLLED` datetime NOT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`SYID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `schoolyr`
--

INSERT INTO `schoolyr` (`SYID`, `AY`, `SEMESTER`, `COURSE_ID`, `IDNO`, `CATEGORY`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`) VALUES
(25, '2013-2014', 'First', 22, 20004277, 'RESERVED', '2014-01-08 16:10:22', '0000-00-00 00:00:00', 'New'),
(27, '2013-2014', 'First', 30, 20001484, 'RESERVED', '2014-01-09 02:50:51', '0000-00-00 00:00:00', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `SEM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SEM` varchar(15) NOT NULL DEFAULT 'First',
  PRIMARY KEY (`SEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SEM_ID`, `SEM`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBJ_CODE` varchar(30) NOT NULL,
  `SUBJ_DESCRIPTION` varchar(255) NOT NULL,
  `UNIT` int(2) NOT NULL,
  `PRE_REQUISITE` varchar(30) NOT NULL DEFAULT 'None',
  `COURSE_ID` int(11) NOT NULL,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  PRIMARY KEY (`SUBJ_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=438 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SUBJ_ID`, `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE_ID`, `AY`, `SEMESTER`) VALUES
(11, 'Theology 1', 'Faith and Creed and Basic Catholic Doctrine', 3, 'None', 22, '2013-2014', 'First'),
(12, 'English 0', 'English Plus ', 3, 'None', 22, '2013-2014', 'First'),
(13, 'English 1', 'Developmental Reading', 3, 'None', 22, '2013-2014', 'First'),
(14, 'Theology 1', 'Faith and Creed and Basic Catholic Doctrine', 3, 'None', 22, '2013-2014', 'First'),
(15, 'History 1', 'Philippine History and Culture', 3, 'None', 22, '2013-2014', 'First'),
(16, 'Psychology 1a', 'General Psychology with Moral Regen & Drug Abuse Ed.', 3, 'None', 22, '2013-2014', 'First'),
(17, 'Chem. 1', 'General and Organic Chemistry', 5, 'None', 22, '2013-2014', 'First'),
(18, 'Philosophy 1', 'Introduction to Philosophy', 3, 'None', 22, '2013-2014', 'First'),
(19, 'PE 1', 'Physical Education', 2, 'None', 22, '2013-2014', 'First'),
(20, 'NSTP 1', 'NSTP', 3, 'None', 22, '2013-2014', 'First'),
(21, 'Theology 2', 'Bible and Salvation History ', 3, 'None', 22, '2013-2014', 'Second'),
(22, 'English 1', 'Study and Thinking Skills ', 3, 'None', 22, '2013-2014', 'Second'),
(23, 'English 02', 'Developmental Reading 2', 3, 'None', 22, '2013-2014', 'Second'),
(24, 'Math 2', 'Modern College Algebra ', 3, 'None', 22, '2013-2014', 'Second'),
(25, 'Nat. Sci. 3', 'Physical Science', 3, 'None', 22, '2013-2014', 'Second'),
(26, 'Philo. 3', 'Logic', 3, 'None', 22, '2013-2014', 'Second'),
(27, 'Educ. 2', 'Child and Adolescent Development', 2, 'None', 22, '2013-2014', 'Second'),
(28, 'PE 2', 'Rhythmic Activities', 3, 'None', 22, '2013-2014', 'Second'),
(29, 'NSTP 2', 'NSTP', 3, 'None', 22, '2013-2014', 'Second'),
(30, 'Theology 3', 'Liturgy and Sacraments in General', 3, 'None', 23, '2013-2014', 'First'),
(31, 'English 2 ', 'Writing in the Decipline', 3, 'None', 23, '2013-2014', 'First'),
(32, 'English 3', 'Speech Communication', 3, 'None', 23, '2013-2014', 'First'),
(33, 'English 4', 'Interactive English', 3, 'None', 23, '2013-2014', 'First'),
(34, 'Filipino 1', 'Komunikasyon sa Akademikong Filipino', 3, 'None', 23, '2013-2014', 'First'),
(35, 'Math 2', 'Plane and Spherical Trig.', 3, 'None', 23, '2013-2014', 'First'),
(36, 'Philo. 5', 'Philosophy of being', 3, 'None', 23, '2013-2014', 'First'),
(37, 'Philo. 2', 'General Ethics', 3, 'None', 23, '2013-2014', 'First'),
(38, 'PE 3', 'Individual/ Dual Sports/ Games', 2, 'None', 23, '2013-2014', 'First'),
(39, 'Theology 4', 'Commandments and Christian Morality ', 3, 'None', 23, '2013-2014', 'Second'),
(40, 'English 15', 'Philippine Literature', 3, 'None', 23, '2013-2014', 'Second'),
(41, 'English 7a', 'Effective Writing', 3, 'None', 23, '2013-2014', 'Second'),
(42, 'Filipino 2', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 3, 'None', 23, '2013-2014', 'Second'),
(43, 'Nat. Sci. 4', 'Ecology', 3, 'None', 23, '2013-2014', 'Second'),
(44, 'Philo. 6', 'Philosophy of Nature', 3, 'None', 23, '2013-2014', 'Second'),
(45, 'Philo. 17', 'Special Ethics', 3, 'None', 23, '2013-2014', 'Second'),
(46, 'PE 4', 'Team Sports and Games', 2, 'None', 22, '2013-2014', 'Second'),
(47, 'Theology 5', 'Church History and Church Today', 3, 'None', 24, '2013-2014', 'First'),
(48, 'Filipino 3', 'Masining na Pagpapahayag', 3, 'None', 24, '2013-2014', 'First'),
(49, 'Nat. Sci. 2 ', 'Biological Science', 3, 'None', 24, '2013-2014', 'First'),
(50, 'Philo. 4', 'Theodicy', 3, 'None', 24, '2013-2014', 'First'),
(51, 'Philo. 13', 'History of Ancient Philosophy', 3, 'None', 24, '2013-2014', 'First'),
(52, 'Philo. 8a', 'Philosophical Pyschology', 3, 'None', 24, '2013-2014', 'First'),
(53, 'Educ. 104', 'Principles of Teaching 1', 3, 'None', 24, '2013-2014', 'First'),
(54, 'Computer 1', 'Basic Computer', 3, 'None', 24, '2013-2014', 'First'),
(55, 'Theology 6', 'Social Teaching of the Church', 3, 'None', 24, '2013-2014', 'Second'),
(56, 'English 5', 'Business English and Correspondence', 3, 'None', 24, '2013-2014', 'Second'),
(57, 'English 17', 'World Literature', 3, 'None', 24, '2013-2014', 'Second'),
(58, 'Philo. 14', 'History of Medieval Philosophy', 3, 'None', 24, '2013-2014', 'Second'),
(59, 'Philo. 7', 'Philosophy of Knowledge', 3, 'None', 24, '2013-2014', 'Second'),
(60, 'Philo. 19', 'Philosophy of Education', 3, 'None', 24, '2013-2014', 'Second'),
(61, 'Computer 2', 'Software Application', 3, 'None', 24, '2013-2014', 'Second'),
(62, 'Humanities 2', 'Art Education', 3, 'None', 24, '2013-2014', 'Second'),
(63, 'Pol. Sci. 4', 'Politics and Governance with PC', 3, 'None', 25, '2013-2014', 'First'),
(64, 'Philo.  51', 'Philosophy of Religion', 3, 'None', 25, '2013-2014', 'First'),
(65, 'Philo.  16', 'History of  Modern Philosophy', 3, 'None', 25, '2013-2014', 'First'),
(66, 'Philo.  31', 'Oriental Philosophy', 3, 'None', 25, '2013-2014', 'First'),
(67, 'Economics 1', 'Principles of Economics with TAR', 3, 'None', 25, '2013-2014', 'First'),
(68, 'Educ. 102', 'Facilitating Learning', 3, 'None', 25, '2013-2014', 'First'),
(69, 'Soc. Sci. 19', 'Society and Culture', 3, 'None', 25, '2013-2014', 'Second'),
(70, 'Philo. 18 ', 'History of Contemporary Philosophy ', 3, 'None', 25, '2013-2014', 'Second'),
(71, 'Philo.  9a', 'Social Phylosophy', 3, 'None', 25, '2013-2014', 'Second'),
(72, 'Philo.  20', 'Elements of Filipino Phylosophy', 3, 'None', 25, '2013-2014', 'Second'),
(73, 'Philo.  11', 'Social Phylosophy II: Values Identification & Inculcation (lncl. Institution & Ideologies)', 3, 'None', 25, '2013-2014', 'Second'),
(74, 'Rizal', 'Life, Works and Writings of Doctor Jose Rizal', 3, 'None', 25, '2013-2014', 'Second'),
(75, 'Theology 1', 'Faith and Creed and Basic Catholic Doctrine', 3, 'None', 14, '2013-2014', 'First'),
(76, 'English 0', 'English Plus', 3, 'None', 26, '2013-2014', 'First'),
(77, 'English 01 ', 'Developmental Reading', 3, 'None', 26, '2013-2014', 'First'),
(78, 'History 1', 'Philipine History and Culture', 3, 'None', 26, '2013-2014', 'First'),
(79, 'Psycho. 1a', 'General Psychology with Moral Regen & Drug Abuse Ed.', 3, 'None', 26, '2013-2014', 'First'),
(80, 'Chem. 1', 'General & Inorganic Chemistry', 3, 'None', 26, '2013-2014', 'First'),
(81, 'Economics 1', 'Principles of Economics with TAR', 3, 'None', 26, '2013-2014', 'First'),
(82, 'PE 1', 'Physical Fitness', 2, 'None', 14, '2013-2014', 'First'),
(83, 'NSTP 1', 'NSTP', 3, 'None', 26, '2013-2014', 'First'),
(84, 'Theology 2', 'Bible & Salvation History', 3, 'None', 26, '2013-2014', 'Second'),
(85, 'English 1', 'Study and Thinking Skills', 3, 'None', 26, '2013-2014', 'Second'),
(86, 'English 02', 'Developmental Reading 2', 3, 'None', 26, '2013-2014', 'Second'),
(87, 'Math 2', 'Modern College Algebra', 3, 'None', 26, '2013-2014', 'Second'),
(88, 'Soc. Sci. 19', 'Society and Culture with FP ', 3, 'None', 26, '2013-2014', 'Second'),
(89, 'Nat. Sci. 1', 'Physical Science', 3, 'None', 26, '2013-2014', 'Second'),
(90, 'Educ. 2', 'Child & Adolescent Development', 3, 'None', 26, '2013-2014', 'Second'),
(91, 'PE 2', 'Rhythmic Activities', 2, 'None', 26, '2013-2014', 'Second'),
(92, 'NSTP 2', 'NSTP', 3, 'None', 26, '2013-2014', 'Second'),
(93, 'Theology 3', 'Liturgy and Sacraments in General', 3, 'None', 27, '2013-2014', 'First'),
(94, 'English 2', 'Writing in the Decipline', 3, 'None', 27, '2013-2014', 'First'),
(95, 'English 3', 'Speech and Communication', 3, 'None', 27, '2013-2014', 'First'),
(96, 'English 33a', 'Introduction to Language Study', 3, 'None', 27, '2013-2014', 'First'),
(97, 'Filipino 1', 'Komunikasyon sa Akademikong Filipino', 3, 'None', 27, '2013-2014', 'First'),
(98, 'Math 2', 'Plane and Spherical Trigonometry', 3, 'None', 27, '2013-2014', 'First'),
(99, 'Nat. Sci. 2', 'Biological Science', 3, '', 27, '2013-2014', 'First'),
(100, 'PE 3', 'Individual/ Dual Sports/ Games', 2, '', 27, '2013-2014', 'First'),
(101, 'Theology 4', 'Commandments and Christian Morality', 3, '', 27, '2013-2014', 'Second'),
(102, 'English 15', 'Philippine Literature', 3, '', 27, '2013-2014', 'Second'),
(103, 'English 38', 'Mythology and Folklore', 3, '', 27, '2013-2014', 'Second'),
(104, 'English 50', 'Structure of the English Laguage', 3, '', 27, '2013-2014', 'Second'),
(105, 'English 40a', 'Applied Linguistics', 3, '', 27, '2013-2014', 'Second'),
(106, 'English 7a', 'Effective Writing', 3, '', 27, '2013-2014', 'Second'),
(107, 'Filipino 2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', 3, '', 27, '2013-2014', 'Second'),
(108, 'PE 4', 'Team Sports and Games', 2, '', 27, '2013-2014', 'Second'),
(109, 'Theology 5', 'Church History and Church Today', 3, '', 28, '2013-2014', 'First'),
(110, 'English 51', 'Language and Society', 3, '', 28, '2013-2014', 'First'),
(111, 'English 52', 'Cross-Culture Communication', 3, '', 28, '2013-2014', 'First'),
(112, 'English 53', 'Literary History of the Philippines', 3, '', 28, '2013-2014', 'First'),
(113, 'Filipino 3', 'Masining na Pagpapahalaga', 3, '', 28, '2013-2014', 'First'),
(114, 'English ', 'Interactive English', 3, '', 28, '2013-2014', 'First'),
(115, 'Educ. 104', 'Principles of Teaching', 3, '', 28, '2013-2014', 'First'),
(116, 'Computer 1', 'Basic computer', 3, '', 28, '2013-2014', 'First'),
(117, 'Theology 6', 'Social Teaching of the Church', 3, '', 28, '2013-2014', 'Second'),
(118, 'English 5', 'Business English and Correspondence', 3, '', 28, '2013-2014', 'Second'),
(119, 'English 17a', 'Afro-Asian Literature', 3, '', 28, '2013-2014', 'Second'),
(120, 'English 54', 'Structure of the Filipino Language', 3, '', 28, '2013-2014', 'Second'),
(121, 'English 37', 'Creative Writing', 3, '', 28, '2013-2014', 'Second'),
(122, 'Nat. Sci. 4', 'Ecology', 3, '', 28, '2013-2014', 'Second'),
(123, 'Humanities 2', 'Art Education', 3, '', 28, '2013-2014', 'Second'),
(124, 'Computer 2', 'Software Application', 3, '', 28, '2013-2014', 'Second'),
(125, 'English 55', 'Language and culture', 3, '', 29, '2013-2014', 'First'),
(126, 'English 14a', 'Anglo- American Literature', 3, '', 29, '2013-2014', 'First'),
(127, 'English 56', 'European Literature', 3, '', 29, '2013-2014', 'First'),
(128, 'Educ. 102 ', 'Facilitating Learning', 3, '', 29, '2013-2014', 'First'),
(129, 'Pol. Sci. 4', 'Politics & Governance with PC', 3, '', 29, '2013-2014', 'First'),
(130, 'English 57', 'Register in English', 3, '', 29, '2013-2014', 'Second'),
(131, 'English 9a', 'Argumentation', 3, '', 29, '2013-2014', 'Second'),
(132, 'English 58', 'Approaches in college English Teaching', 3, '', 29, '2013-2014', 'Second'),
(133, 'Rizal', 'Life, Works and Writings of Doctor Jose Rizal', 3, '', 29, '2013-2014', 'Second'),
(134, 'English 17', 'World Literature', 3, '', 29, '2013-2014', 'Second'),
(135, 'Phylosophy 11', 'Social Phylosophy II: Values Identification & Inculcation (lncl. Institution & Ideologies)', 3, '', 29, '2013-2014', 'Second'),
(136, 'Theology 1', 'Faith and Creed and Basic Catholic Doctrine', 3, '', 30, '2013-2014', 'First'),
(137, 'English 0', 'English Plus', 3, '', 30, '2013-2014', 'First'),
(138, 'Filipino 1', 'Komunikasyon sa Akademikong Filipino', 3, '', 30, '2013-2014', 'First'),
(139, 'Math 01', 'Fundamentals of Mathematics', 3, '', 30, '2013-2014', 'First'),
(140, 'Nat. Sci. 2b', 'Biological Science', 3, '', 30, '2013-2014', 'First'),
(141, 'Psycho. 1a', 'General Psychology with Moral Regen & Drug Abuse Ed.', 3, '', 30, '2013-2014', 'First'),
(142, 'ICT ', 'Basic computer', 3, '', 30, '2013-2014', 'First'),
(143, 'Educ. ', 'Developmental Reading', 3, '', 30, '2013-2014', 'First'),
(144, 'PE 1', 'Physical Fitness', 2, '', 30, '2013-2014', 'First'),
(145, 'NSTP 1', 'ROTC 1/ CWTS 1', 3, '', 30, '2013-2014', 'First'),
(146, 'Theology 2', 'Bible & Salvation History', 3, '', 30, '2013-2014', 'Second'),
(147, 'English 2', 'Study and Thinking Skills', 3, '', 30, '2013-2014', 'Second'),
(148, 'Filipino 02', 'Pagbasa at Pagsulat tungo sa Pananaliksik', 3, '', 30, '2013-2014', 'Second'),
(149, 'Math 02', 'Contemporary Mathematics', 3, '', 30, '2013-2014', 'Second'),
(150, 'Humanities 1', 'Art Education', 3, '', 30, '2013-2014', 'Second'),
(151, 'Educ. 101', 'Child & Adolescent Development', 3, '', 30, '2013-2014', 'Second'),
(152, 'Major', 'Structure of the English Laguage', 3, '', 30, '2013-2014', 'Second'),
(153, 'Rizal', 'Life, Works and Writings of Doctor Jose Rizal', 3, '', 30, '2013-2014', 'Second'),
(154, 'PE 2', 'Rhythmic Activities', 2, '', 30, '2013-2014', 'Second'),
(155, 'NSTP 2', 'ROTC 2/ CWTS 2', 3, '', 30, '2013-2014', 'Second'),
(156, 'Theology 3', 'Liturgy and Sacraments in General', 3, '', 31, '2013-2014', 'First'),
(157, 'English 2', 'Writing in the Decipline', 3, '', 31, '2013-2014', 'First'),
(158, 'Filipino 03', 'Masining na Pagpapahalaga', 3, '', 31, '2013-2014', 'First'),
(159, 'Educ. 102', 'Facilitating Learning', 3, '', 31, '2013-2014', 'First'),
(160, 'Educ. 103', 'Educational Technology 1', 3, '', 31, '2013-2014', 'First'),
(161, 'Educ. 104', 'Principles of Teaching 1', 3, '', 31, '2013-2014', 'First'),
(162, 'FS', 'Field Study 1 (Learning Dev''t Environment)', 1, '', 31, '2013-2014', 'First'),
(163, 'Major', 'Social Dimension of  Education', 3, '', 31, '2013-2014', 'First'),
(164, 'Major', 'Teaching of Listening & Reading', 3, '', 31, '2013-2014', 'First'),
(165, 'PE 3', 'Individual/ Dual Sports/ Games', 2, '', 31, '2013-2014', 'First'),
(166, 'Theology 4', 'Commandments and Christian Morality', 3, '', 31, '2013-2014', 'Second'),
(167, 'English Literature', 'Philippine Literature', 3, '', 31, '2013-2014', 'Second'),
(168, 'Educ. 105', 'Educational Technology 2', 3, '', 31, '2013-2014', 'Second'),
(169, 'Educ. 106', 'Principles of Teaching 2', 3, '', 31, '2013-2014', 'Second'),
(170, 'FS 2', 'Field Study 2 (Experience the Technology Learning Process )', 1, '', 31, '2013-2014', 'Second'),
(171, 'FS 3', 'Field Study 3 (Tech. in the Learning Environment)', 1, '', 31, '2013-2014', 'Second'),
(172, 'Major', 'Teaching of Speaking', 3, '', 31, '2013-2014', 'Second'),
(173, 'Major', 'ESP', 3, '', 31, '2013-2014', 'Second'),
(174, 'Major', 'Intro to Linguistics', 3, '', 31, '2013-2014', 'Second'),
(175, 'Major', 'Mythology and Folklore', 3, '', 31, '2013-2014', 'Second'),
(176, 'PE 4', 'Team Sports and Games', 2, '', 31, '2013-2014', 'Second'),
(177, 'English 3', 'Speech and Oral Communication', 3, '', 31, '2013-2014', 'Second'),
(178, 'English Literature', 'World Literature', 3, '', 31, '2013-2014', 'Second'),
(179, 'Pol. Sci. 4', 'Politics & Governance with PC', 3, '', 31, '2013-2014', 'Second'),
(180, 'Theology 6', 'Church History and Church Today', 3, '', 32, '2013-2014', 'First'),
(181, 'Educ. 108', 'Curriculum Development', 3, '', 32, '2013-2014', 'First'),
(182, 'History 1', 'Philipine History: Roots and Development', 3, '', 32, '2013-2014', 'First'),
(183, 'Educ. 109', 'Assessment of students Learning 1', 3, '', 32, '2013-2014', 'First'),
(184, 'FS 4', 'Field Study 4(Understanding Curriculum Development)', 1, '', 32, '2013-2014', 'First'),
(185, 'ST 1', 'Integrated Teaching Strategies', 1, '', 32, '2013-2014', 'First'),
(186, 'Major', 'Teaching Literature', 3, '', 32, '2013-2014', 'First'),
(187, 'Major', 'Speech and Stage Art', 3, '', 32, '2013-2014', 'First'),
(188, 'Major', 'Mass Communication and Campus Journalism', 3, '', 32, '2013-2014', 'First'),
(189, 'Major', 'Prep. & Eval. of Instruc. Materials', 3, '', 32, '2013-2014', 'First'),
(190, 'Theology 6', 'Social Teaching of the Church', 3, '', 32, '2013-2014', 'Second'),
(191, 'Economics 1b', 'Principles of Economics with TAR', 3, '', 32, '2013-2014', 'Second'),
(192, 'Educ. 109', 'Assessment of students Learning 2', 3, '', 32, '2013-2014', 'Second'),
(193, 'FS 5', 'Field Study 5(Learning Assessment Strategies)', 1, '', 32, '2013-2014', 'Second'),
(194, 'ST 2', 'Use of Popular Media in teaching', 1, '', 32, '2013-2014', 'Second'),
(195, 'Major', 'Creative Writing', 3, '', 32, '2013-2014', 'Second'),
(196, 'Major', 'Remedial Instruction in English', 3, '', 32, '2013-2014', 'Second'),
(197, 'Major', 'Language Curriculum for Sec. Schools', 3, '', 32, '2013-2014', 'Second'),
(198, 'Major', 'Afro-Asian Literature', 3, '', 32, '2013-2014', 'Second'),
(199, 'Major', 'English & American Literature', 3, '', 32, '2013-2014', 'Second'),
(200, 'Nat. Sci. 2', 'Physical Science', 3, '', 32, '2013-2014', 'Second'),
(201, 'Philo.  3', 'Logic', 3, '', 32, '2013-2014', 'Second'),
(202, 'Soc. Sci. 19', 'Social & Culture with AP', 3, '', 32, '2013-2014', 'Second'),
(203, 'Educ.', 'The Teaching Profession', 3, '', 33, '2013-2014', 'First'),
(204, 'FS 6', 'Field Study 6', 1, '', 33, '2013-2014', 'First'),
(205, 'ST 3', 'Research', 3, '', 33, '2013-2014', 'First'),
(206, 'Major', 'Language and Literature Assessment', 3, '', 33, '2013-2014', 'First'),
(207, 'Major', 'Intro to Stylistic', 3, '', 33, '2013-2014', 'First'),
(208, 'Major', 'Literary Criticism', 3, '', 33, '2013-2014', 'First'),
(209, 'Major', 'Language Research', 3, '', 33, '2013-2014', 'First'),
(210, 'Major', 'Translation & Editing of Text', 3, '', 33, '2013-2014', 'First'),
(211, 'Students Teaching', 'Practice Teaching', 6, '', 33, '2013-2014', 'Second'),
(212, 'Theology 1', 'Faith and  Creed & Basic Catholic Doctrine', 3, '', 34, '2013-2014', 'First'),
(213, 'English 0', 'English Plus', 3, '', 34, '2013-2014', 'First'),
(214, 'Filipino 01', 'Komunikasyon sa Akademikong Filipino', 3, '', 34, '2013-2014', 'First'),
(215, 'Math 01', 'Fundamentals of Mathematics', 3, '', 34, '2013-2014', 'First'),
(216, 'Nat. Sci. 2b', 'Biological Science', 3, '', 34, '2013-2014', 'First'),
(217, 'Psychology 1a', 'General Psy. with Moral Regen & Drug Abuse Ed.', 3, '', 34, '2013-2014', 'First'),
(218, 'ICT', 'Basic Computer', 3, '', 34, '2013-2014', 'First'),
(219, 'Educ. ', 'Developmental Reading', 3, '', 34, '2013-2014', 'First'),
(220, 'PE 1', 'Physical Fitness', 2, '', 34, '2013-2014', 'First'),
(221, 'NSTP 1', 'ROTC 1/ CWTS 1', 3, '', 34, '2013-2014', 'First'),
(222, 'Theology 2', 'Bible and Salvation History', 3, '', 34, '2013-2014', 'Second'),
(223, 'English 2', 'Study and Thinking Skills ', 3, '', 34, '2013-2014', 'Second'),
(224, 'Filipino 02', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 3, '', 34, '2013-2014', 'Second'),
(225, 'Math 02', 'Contemporary Mathematics', 3, '', 34, '2013-2014', 'Second'),
(226, 'Humanities 1', 'Art Education', 3, '', 34, '2013-2014', 'Second'),
(227, 'Educ. 101', 'Child and Adolescent Development', 3, '', 34, '2013-2014', 'Second'),
(228, 'Rizal ', 'Life, Works & Writings of Dr. Jose Rizal', 3, '', 34, '2013-2014', 'Second'),
(229, 'Major', 'Advance Algebra', 3, '', 34, '2013-2014', 'Second'),
(230, 'PE 2', 'Rhythmic Activities', 2, '', 34, '2013-2014', 'Second'),
(231, 'NSTP 2', 'ROTC 2/ CWTS 2', 3, '', 34, '2013-2014', 'Second'),
(232, 'Theology 3', 'Liturgy and Sacraments in General', 3, '', 35, '2013-2014', 'First'),
(233, 'Filipino 03', 'Masining na Pagpapahalaga', 3, '', 35, '2013-2014', 'First'),
(234, 'English 2', 'Writing & Discipline', 3, '', 35, '2013-2014', 'First'),
(235, 'Educ. 102', 'Facilitating and Learning', 3, '', 35, '2013-2014', 'First'),
(236, 'Educ. 103', 'Educational Technology', 3, '', 35, '2013-2014', 'First'),
(237, 'Educ. 104', 'Principles of Teaching 1', 3, '', 35, '2013-2014', 'First'),
(238, 'FS 1', 'Field Study 1 (Learning Dev''t Environment)', 1, '', 35, '2013-2014', 'First'),
(239, 'Educ. ', 'Social Dimension of Education', 3, '', 35, '2013-2014', 'First'),
(240, 'Major', 'Plane Geometry', 3, '', 35, '2013-2014', 'First'),
(241, 'PE 3', 'Individual/ Dual Sports/ Games', 2, '', 35, '2013-2014', 'First'),
(242, 'Theology 4', 'Commandments and Christian Morality', 3, '', 35, '2013-2014', 'Second'),
(243, 'English Literature', 'Philippine Literature', 3, '', 35, '2013-2014', 'Second'),
(244, 'Educ. 105', 'Educational Technology 2', 3, '', 35, '2013-2014', 'Second'),
(245, 'Educ. 106', 'Principles of Teaching 2', 3, '', 35, '2013-2014', 'Second'),
(246, 'FS 2', 'Field Study 2 (Experiencing the Tech. Learning Process)', 1, '', 35, '2013-2014', 'Second'),
(247, 'FS 3', 'Field Study 3 (Tech. in the Learning Environment)', 1, '', 35, '2013-2014', 'Second'),
(248, 'Major', 'Trigonometry', 3, '', 35, '2013-2014', 'Second'),
(249, 'Major', 'Solid Geometry', 3, '', 35, '2013-2014', 'Second'),
(250, 'Major', 'Analytic Geometry', 3, '', 35, '2013-2014', 'Second'),
(251, 'Major', 'Abstract Algebra', 3, '', 35, '2013-2014', 'Second'),
(252, 'PE 4', 'Team Sports and Games', 3, '', 35, '2013-2014', 'Second'),
(253, 'English 3', 'Speech and Oral Communication', 3, '', 35, '2013-2014', 'Second'),
(254, 'English Literature', 'World Literature', 3, '', 35, '2013-2014', 'Second'),
(255, 'Pol. Sci. 4', 'Politics and Governance with PC', 3, '', 35, '2013-2014', 'Second'),
(256, 'Theology 5', 'Church History and Church Today', 3, '', 36, '2013-2014', 'First'),
(257, 'Educ. 108', 'Curriculum Development', 3, '', 36, '2013-2014', 'First'),
(258, 'Educ. 109', 'Assessment of Student Learning 1', 3, '', 36, '2013-2014', 'First'),
(259, 'FS 4', 'Field Study 4 (Understanding Curriculum Development)', 1, '', 36, '2013-2014', 'First'),
(260, 'ST 1', 'Integrated Teaching Strategies', 1, '', 36, '2013-2014', 'First'),
(261, 'History 1', 'Philippine History', 3, '', 35, '2013-2014', 'First'),
(262, 'Major', 'Calculus', 3, '', 36, '2013-2014', 'First'),
(263, 'Major', 'Elementary Statistics', 3, '', 36, '2013-2014', 'First'),
(264, 'Major', 'Probability', 3, '', 36, '2013-2014', 'First'),
(265, 'Major', 'Linear Algebra', 3, '', 36, '2013-2014', 'First'),
(266, 'Theology 6', 'Social Teaching of the Church', 3, '', 36, '2013-2014', 'Second'),
(267, 'Economics 1b', 'Principles of Economics with TAR', 3, '', 36, '2013-2014', 'Second'),
(268, 'Educ. 110', 'Assessment of Student Learning 2', 3, '', 36, '2013-2014', 'Second'),
(269, 'Major', 'Calculus 2', 3, '', 36, '2013-2014', 'Second'),
(270, 'Major', 'Advance Statistics', 3, '', 36, '2013-2014', 'Second'),
(271, 'Major', 'Modern Geometry', 3, '', 36, '2013-2014', 'Second'),
(272, 'Major', 'Number Theory', 3, '', 36, '2013-2014', 'Second'),
(273, 'Major', 'Math Investigation and Modeling', 3, '', 36, '2013-2014', 'Second'),
(274, 'Nat. Sci. 3', 'Physical Science', 3, '', 36, '2013-2014', 'Second'),
(275, 'Philo. 3', 'Logic', 3, '', 36, '2013-2014', 'Second'),
(276, 'S. Sc. 19', 'Society and Culture with FP', 3, '', 36, '2013-2014', 'Second'),
(277, 'Ed. ', 'The Teaching Profession', 3, '', 37, '2013-2014', 'First'),
(278, 'FS 6', 'Field Study', 1, '', 37, '2013-2014', 'First'),
(279, 'ST 3', 'Research', 1, '', 37, '2013-2014', 'First'),
(280, 'FS 5', 'Field Study 5 (Learning Assest Strategies)', 1, '', 36, '2013-2014', 'Second'),
(281, 'ST 2', 'Use of Popular Media in Teaching', 1, '', 37, '2013-2014', 'Second'),
(282, 'Major', 'Action Research in Math', 3, '', 37, '2013-2014', 'First'),
(283, 'Major', 'Seminar on Problem Solving', 3, '', 37, '2013-2014', 'First'),
(284, 'Major', 'Seminar on Technology in Math', 3, '', 37, '2013-2014', 'First'),
(285, 'Major', 'Instrumentation in Math', 3, '', 37, '2013-2014', 'First'),
(286, 'Major', 'History of Math', 3, '', 37, '2013-2014', 'First'),
(287, 'Student Teaching', 'Practice Teaching', 6, '', 37, '2013-2014', 'Second'),
(288, 'Theology 1', 'Faith and  Creed & Basic Catholic Doctrine', 3, '', 38, '2013-2014', 'First'),
(289, 'English 1', 'English Plus', 3, '', 38, '2013-2014', 'First'),
(290, 'Filipino 01', 'Komunikasyon sa Akademikong Filipino', 3, '', 38, '2013-2014', 'First'),
(291, 'Math 01', 'Fundamentals of Mathematics', 3, '', 38, '2013-2014', 'First'),
(292, 'Nat. Sci. 2b', 'Biological Science', 3, '', 38, '2013-2014', 'First'),
(293, 'Psychology 1a', 'General Psy. with Moral Regen & Drug Abuse Ed.', 3, '', 38, '2013-2014', 'First'),
(294, 'ICT', 'Basic Computer', 3, '', 38, '2013-2014', 'First'),
(295, 'Educ. ', 'Developmental Reading', 3, '', 38, '2013-2014', 'First'),
(296, 'PE 1', 'Physical Fitness', 2, '', 38, '2013-2014', 'First'),
(297, 'NSTP 1', 'ROTC 1/ CWTS 1', 3, '', 38, '2013-2014', 'First'),
(298, 'Theology 2', 'Bible and Salvation History', 3, '', 38, '2013-2014', 'Second'),
(299, 'English 1', 'Study and Thinking Skills ', 3, '', 38, '2013-2014', 'Second'),
(300, 'Filipino 02', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 3, '', 38, '2013-2014', 'Second'),
(301, 'Math 02', 'Contemporary Mathematics', 3, '', 38, '2013-2014', 'Second'),
(302, 'Humanities 1', 'Art Education', 3, '', 38, '2013-2014', 'Second'),
(303, 'Educ. 101', 'Child and Adolescent Development', 3, '', 38, '2013-2014', 'Second'),
(304, 'Major', 'Kulrurang Popular', 3, '', 38, '2013-2014', 'Second'),
(305, 'Rizal ', 'Life, Works & Writings of Dr. Jose Rizal', 3, '', 38, '2013-2014', 'Second'),
(306, 'PE 2', 'Rhythmic Activities', 2, '', 38, '2013-2014', 'Second'),
(307, 'Theology 3', 'Liturgy and Sacraments in General', 3, '', 39, '2013-2014', 'First'),
(308, 'English 2', 'Writing & Discipline', 3, '', 39, '2013-2014', 'First'),
(309, 'Filipino 03', 'Masining na Pagpapahalaga', 3, '', 39, '2013-2014', 'First'),
(310, 'Educ. 102', 'Facilitating and Learning', 3, '', 39, '2013-2014', 'First'),
(311, 'Educ. 103', 'Educational Technology 1', 3, '', 39, '2013-2014', 'First'),
(312, 'Educ. 104', 'Principles of Teaching 1', 3, '', 39, '2013-2014', 'First'),
(313, 'FS 1', 'Field Study 1 (Learning Dev''t Environment)', 1, '', 39, '2013-2014', 'First'),
(314, 'Educ. ', 'Social Dimension of Education', 3, '', 39, '2013-2014', 'First'),
(315, 'Major', 'Panitikang Rehiyon', 3, '', 39, '2013-2014', 'First'),
(316, 'PE 3', 'Individual/ Dual Sports/ Games', 2, '', 39, '2013-2014', 'First'),
(317, 'Theology 4', 'Commandments and Christian Morality', 3, '', 39, '2013-2014', 'Second'),
(318, 'English Literature', 'Philippine Literature', 3, '', 39, '2013-2014', 'Second'),
(319, 'Educ. 105', 'Educational Technology 2', 3, '', 39, '2013-2014', 'Second'),
(320, 'Educ. 106', 'Principles of Teaching 2', 3, '', 39, '2013-2014', 'Second'),
(321, 'FS 2', 'Field Study 2 (Experiencing the Tech. Learning Process)', 1, '', 39, '2013-2014', 'Second'),
(322, 'FS 3', 'Field Study 3 (Tech. in the Learning Environment)', 1, '', 39, '2013-2014', 'Second'),
(323, 'Major', 'Instratura ng Wikang Filipino', 3, '', 39, '2013-2014', 'Second'),
(324, 'Major', 'Maikling Kuwentong Filipino', 3, '', 39, '2013-2014', 'Second'),
(325, 'Major', 'Pagtuturo at Pagtataya sa Pakikinig at Pagsasalita', 3, '', 39, '2013-2014', 'Second'),
(326, 'Major', 'lnrod sa Pag-aaral ng Wika', 3, '', 39, '2013-2014', 'Second'),
(327, 'PE 4', 'Team Sports and Games', 2, '', 39, '2013-2014', 'Second'),
(328, 'English 3', 'Speech and Oral Communication', 3, '', 39, '2013-2014', 'Second'),
(329, 'English Literature', 'World Literature', 3, '', 39, '2013-2014', 'Second'),
(330, 'Pol. Sci. 4', 'Politics and Governance with PC', 3, '', 39, '2013-2014', 'Second'),
(331, 'Theology 5', 'Church History and Church Today', 3, '', 40, '2013-2014', 'First'),
(332, 'History 1', 'Philippine History', 3, '', 40, '2013-2014', 'First'),
(333, 'Educ. 108', 'Curriculum Development', 3, '', 40, '2013-2014', 'First'),
(334, 'Educ. 109', 'Assessment of Student Learning 1', 3, '', 40, '2013-2014', 'First'),
(335, 'FS 4', 'Field Study 4 (Understanding Curriculum Development)', 1, '', 40, '2013-2014', 'First'),
(336, 'ST 1', 'Integrated Teaching Strategies', 1, '', 40, '2013-2014', 'First'),
(337, 'Major', 'Sanaysay at Talumpati', 3, '', 40, '2013-2014', 'First'),
(338, 'Major', 'Pagtuturo at Paglalaya sa Pagbasa at Pagsulat', 3, '', 40, '2013-2014', 'First'),
(339, 'Major', 'Panimulang Linguistika', 3, '', 40, '2013-2014', 'First'),
(340, 'Major', 'Intro. sa Pagsasalin', 3, '', 40, '2013-2014', 'First'),
(341, 'Theology 6', 'Social Teaching of the Church', 3, '', 40, '2013-2014', 'Second'),
(342, 'Economics 1b', 'Principles of Economics with TAR', 3, '', 40, '2013-2014', 'Second'),
(343, 'Educ. 110', 'Assessment of Student Learning 2', 3, '', 40, '2013-2014', 'Second'),
(344, 'FS 5', 'Field Study 5 (Learning Assest Strategies)', 1, '', 40, '2013-2014', 'Second'),
(345, 'ST 2', 'Use of Popular Media in Teaching', 1, '', 40, '2013-2014', 'Second'),
(346, 'Major', 'Panunuring Pampanitikan', 3, '', 40, '2013-2014', 'Second'),
(347, 'Major', 'Ang Fil. sa Kul. ng Bantayng Antas ng Edukasyon', 3, '', 40, '2013-2014', 'Second'),
(348, 'Major', 'Paghahanda at Ebalwasyon ng kagamitang Pantuturo', 3, '', 40, '2013-2014', 'Second'),
(349, 'Major', 'Pagbasa at Obramaestra sa Filipino', 3, '', 40, '2013-2014', 'Second'),
(350, 'Major', 'Intro sa Pananaliksik: Wika at Panitikan', 3, '', 40, '2013-2014', 'Second'),
(351, 'Nat. Sci. 3', 'Physical Science', 3, '', 40, '2013-2014', 'Summer'),
(352, 'Philo. 3', 'Logic', 3, '', 40, '2013-2014', 'Summer'),
(353, 'S. Sc. 19', 'Society and Culture with FP', 3, '', 40, '2013-2014', 'Summer'),
(354, 'Educ. ', 'The Teaching Profession', 3, '', 41, '2013-2014', 'First'),
(355, 'FS 6', 'Field Study', 1, '', 41, '2013-2014', 'First'),
(356, 'ST 3', 'Research', 1, '', 41, '2013-2014', 'First'),
(357, 'Major', 'Pagpahalaga ng Pampanitikan', 3, '', 41, '2013-2014', 'First'),
(358, 'Major', 'Intro sa Pamamahayag', 3, '', 41, '2013-2014', 'First'),
(359, 'Major', 'Panitikan ng Umuunlad na Bansa', 3, '', 41, '2013-2014', 'First'),
(360, 'Major', 'Pagtuturo at Pagtataya sa Panitikan', 3, '', 41, '2013-2014', 'First'),
(361, 'Major', 'Panulaang Filipino', 3, '', 41, '2013-2014', 'First'),
(362, 'Student Teaching', 'Practice Teaching', 6, '', 41, '2013-2014', 'Second'),
(363, 'Theology 1', 'Faith and  Creed & Basic Catholic Doctrine', 3, '', 42, '2013-2014', 'First'),
(364, 'English 0', 'English Plus', 3, '', 42, '2013-2014', 'First'),
(365, 'Filipino 01', 'Komunikasyon sa Akademikong Filipino', 3, '', 42, '2013-2014', 'First'),
(366, 'Math 01', 'Fundamentals of Mathematics', 3, '', 42, '2013-2014', 'First'),
(367, 'Nat. Sci. 2b', 'Biological Science', 3, '', 42, '2013-2014', 'First'),
(368, 'ICT', 'Basic Computer', 3, '', 42, '2013-2014', 'First'),
(369, 'Educ. ', 'Developmental Reading', 3, '', 42, '2013-2014', 'First'),
(370, 'Geography', 'Basic Geography', 3, '', 42, '2013-2014', 'First'),
(371, 'PE 1', 'Physical Fitness', 3, '', 42, '2013-2014', 'First'),
(372, 'NSTP 1', 'ROTC 1/ CWTS 1', 3, '', 42, '2013-2014', 'First'),
(373, 'Theology 2', 'Bible and Salvation History', 3, '', 42, '2013-2014', 'Second'),
(374, 'English 1', 'Study and Thinking Skills', 3, '', 42, '2013-2014', 'Second'),
(375, 'Filipino 02', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 3, '', 42, '2013-2014', 'Second'),
(376, 'Math 02', 'Contemporary Mathematics', 3, '', 42, '2013-2014', 'Second'),
(377, 'Educ. 101', 'Child & Adolescents Development', 3, '', 42, '2013-2014', 'Second'),
(378, 'Math ', 'Advance Algebra & Trigonometry', 3, '', 42, '2013-2014', 'Second'),
(379, 'Rizal ', 'Life, Works & Writings of Dr. Jose Rizal', 3, '', 42, '2013-2014', 'Second'),
(380, 'PE 2', 'Rhythmic Activities', 2, '', 42, '2013-2014', 'Second'),
(381, 'NSTP 2', 'ROTC 2/ CWTS 2', 3, '', 42, '2013-2014', 'Second'),
(382, 'Theology 3', 'Liturgy and Sacraments in General', 3, '', 43, '2013-2014', 'First'),
(383, 'English 2', 'Writing in the Discipline', 3, '', 43, '2013-2014', 'First'),
(384, 'Filipino 03', 'Masining na Pamamahayag', 3, '', 43, '2013-2014', 'First'),
(385, 'Educ. 102', ' Facilitating and Learning', 3, '', 43, '2013-2014', 'First'),
(386, 'Educ. 103', 'Educational Technology 1', 3, '', 43, '2013-2014', 'First'),
(387, 'Educ. 104', 'Principles in Teaching 1', 3, '', 43, '2013-2014', 'First'),
(388, 'FS 1', 'Field Study 1', 1, '', 43, '2013-2014', 'First'),
(389, 'Educ.', 'Social Dimension of Education', 3, '', 43, '2013-2014', 'First'),
(390, 'PE 3', 'Individual/ Dual Sports/ Games', 2, '', 43, '2013-2014', 'First'),
(391, 'Theology 3', 'Commandments and Christian Morality', 3, '', 43, '2013-2014', 'Second'),
(392, 'English Literature ', 'Philippine Literature', 3, '', 43, '2013-2014', 'Second'),
(393, 'English ', 'Thinking Skills 2', 3, '', 43, '2013-2014', 'Second'),
(394, 'Math ', 'Plane and Solid Geometry', 3, '', 43, '2013-2014', 'Second'),
(395, 'Soc. Sci. ', 'Geography 3', 3, '', 43, '2013-2014', 'Second'),
(396, 'Educ. 105 ', 'Educational Technology 2', 3, '', 43, '2013-2014', 'Second'),
(397, 'Educ. 106', 'Principles in Teaching 2', 3, '', 43, '2013-2014', 'Second'),
(398, 'FS 2', 'Field Study 2', 1, '', 43, '2013-2014', 'Second'),
(399, 'FS 3', 'Field Study 3', 1, '', 43, '2013-2014', 'Second'),
(400, 'History 1', 'Philippine History', 3, '', 43, '2013-2014', 'Second'),
(401, 'PE 4', 'Team Sports and Games', 2, '', 43, '2013-2014', 'Second'),
(402, 'English 3', 'Speech and Oral Communication', 3, '', 31, '2013-2014', 'Summer'),
(403, 'English Literature ', 'World Literature', 3, '', 43, '2013-2014', 'Second'),
(404, 'Pol. Sci.', 'Politics & Governance PC', 3, '', 43, '2013-2014', 'Summer'),
(405, 'Theology 5', 'Church History and Church Today', 3, '', 44, '2013-2014', 'First'),
(406, 'English ', 'Interactive English', 3, '', 44, '2013-2014', 'First'),
(407, 'English ', 'Children''s Literature', 3, '', 44, '2013-2014', 'First'),
(408, 'Filipino ', 'Pagpahalaga ng Pampanitikan', 3, '', 44, '2013-2014', 'First'),
(409, 'Math ', 'Analytic Geometry and Intro. Calculus', 3, '', 44, '2013-2014', 'First'),
(410, 'Science', 'Inorganic Chemistry', 3, '', 44, '2013-2014', 'First'),
(411, 'Educ. 108', 'Curriculum Development', 3, '', 44, '2013-2014', 'First'),
(412, 'Educ. 109', 'Assessment of student Learning 1', 3, '', 44, '2013-2014', 'First'),
(413, 'FS 4', 'Field Study 4', 1, '', 44, '2013-2014', 'First'),
(414, 'ST 1', 'Integrated Teaching Strategies', 1, '', 44, '2013-2014', 'First'),
(415, 'Theology 6', 'Social Teaching of the Church', 3, '', 44, '2013-2014', 'Second'),
(416, 'English ', 'Mythology and Folklore', 3, '', 44, '2013-2014', 'Second'),
(417, 'Filipino ', 'Panitikan ng Filipino', 3, '', 44, '2013-2014', 'Second'),
(418, 'Humanities', 'Art Education', 3, '', 44, '2013-2014', 'Second'),
(419, 'Science', 'Ecology', 3, '', 44, '2013-2014', 'Second'),
(420, 'Economics 1b', 'Principles of Economics with TAR', 3, '', 44, '2013-2014', 'Second'),
(421, 'Educ. 110', 'Assessment of student Learning 2', 3, '', 44, '2013-2014', 'Second'),
(422, 'Educ.', 'Developmental Reading 2', 3, '', 44, '2013-2014', 'Second'),
(423, 'ST 2', 'Use of Popular Media in teaching', 1, '', 44, '2013-2014', 'Second'),
(424, 'FS 5', 'Field Study 5', 1, '', 44, '2013-2014', 'Second'),
(425, 'Nat. Sci. 3', 'Physical Science', 3, '', 44, '2013-2014', 'Summer'),
(426, 'Philo. 3', 'Logic', 3, '', 44, '2013-2014', 'Summer'),
(427, 'S. Sc. 19', 'Society & Culture with FP', 3, '', 44, '2013-2014', 'Second'),
(428, 'Educ.', 'The Teaching Profession', 3, '', 45, '2013-2014', 'First'),
(429, 'Nat. Sci. 3', 'Astronomy', 3, '', 41, '2013-2014', 'First'),
(430, 'Nat. Sci. 3', 'Physics', 3, '', 45, '2013-2014', 'First'),
(431, 'Values', 'Values Education', 3, '', 45, '2013-2014', 'First'),
(432, 'HELE', 'Home Economics & Livelihood Education', 3, '', 45, '2013-2014', 'First'),
(433, 'MAPEH', 'Music Art & Physical Ed.', 3, '', 45, '2013-2014', 'First'),
(434, 'FS 6', 'Field Study 6', 1, '', 45, '2013-2014', 'First'),
(435, 'ST 3', 'Research', 3, '', 45, '2013-2014', 'First'),
(436, 'Math ', 'Probling Solving', 3, '', 45, '2013-2014', 'First'),
(437, 'Student Teaching', 'Practice Teaching', 6, '', 45, '2013-2014', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequirements`
--

CREATE TABLE IF NOT EXISTS `tblrequirements` (
  `REQ_ID` int(30) NOT NULL AUTO_INCREMENT,
  `NSO` varchar(5) NOT NULL DEFAULT 'no',
  `BAPTISMAL` varchar(5) NOT NULL DEFAULT 'no',
  `ENTRANCE_TEST_RESULT` varchar(5) NOT NULL DEFAULT 'no',
  `MARRIAGE_CONTRACT` varchar(5) NOT NULL DEFAULT 'no',
  `CERTIFICATE_OF_TRANSFER` varchar(5) NOT NULL DEFAULT 'no',
  `IDNO` int(20) NOT NULL,
  PRIMARY KEY (`REQ_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tblrequirements`
--

INSERT INTO `tblrequirements` (`REQ_ID`, `NSO`, `BAPTISMAL`, `ENTRANCE_TEST_RESULT`, `MARRIAGE_CONTRACT`, `CERTIFICATE_OF_TRANSFER`, `IDNO`) VALUES
(20, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004277),
(21, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004207),
(22, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004180),
(23, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004425),
(24, 'Yes', 'Yes', 'No', 'No', 'No', 20002251),
(25, 'Yes', 'Yes', 'Yes', 'No', 'No', 20002838),
(26, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004623),
(27, 'Yes', 'Yes', 'Yes', 'No', 'No', 2001497),
(28, 'Yes', 'Yes', 'No', 'No', 'No', 20001057),
(29, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004407),
(30, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20004749),
(31, 'Yes', 'Yes', 'No', 'No', 'No', 20001484),
(32, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20003333),
(33, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004510),
(34, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001779),
(35, 'Yes', 'Yes', 'No', 'No', 'No', 20001482),
(36, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001937),
(37, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001648),
(38, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20002408),
(39, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20005936),
(40, 'No', 'No', 'No', 'No', 'No', 20001550),
(41, 'Yes', 'Yes', 'Yes', 'No', 'No', 20002270),
(42, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001932),
(43, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001498),
(45, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001503),
(46, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001925),
(47, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001658),
(48, 'Yes', 'No', 'No', 'No', 'No', 20001550),
(49, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001957),
(50, 'No', 'No', 'No', 'No', 'No', 20001456),
(51, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001673),
(52, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001557),
(53, 'Yes', 'Yes', 'Yes', 'No', 'No', 20002311),
(54, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001742),
(55, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20002106),
(56, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001853),
(57, 'Yes', 'Yes', 'No', 'No', 'Yes', 20001645);

-- --------------------------------------------------------

--
-- Table structure for table `tblstuddetails`
--

CREATE TABLE IF NOT EXISTS `tblstuddetails` (
  `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FATHER` varchar(255) NOT NULL,
  `FATHER_OCCU` varchar(255) NOT NULL,
  `MOTHER` varchar(255) NOT NULL,
  `MOTHER_OCCU` varchar(255) NOT NULL,
  `BOARDING` varchar(5) NOT NULL DEFAULT 'no',
  `WITH_FAMILY` varchar(5) NOT NULL DEFAULT 'yes',
  `GUARDIAN` varchar(255) NOT NULL,
  `GUARDIAN_ADDRESS` varchar(255) NOT NULL,
  `OTHER_PERSON_SUPPORT` varchar(255) NOT NULL,
  `ADDRESS` text NOT NULL,
  `IDNO` int(30) NOT NULL,
  PRIMARY KEY (`DETAIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tblstuddetails`
--

INSERT INTO `tblstuddetails` (`DETAIL_ID`, `FATHER`, `FATHER_OCCU`, `MOTHER`, `MOTHER_OCCU`, `BOARDING`, `WITH_FAMILY`, `GUARDIAN`, `GUARDIAN_ADDRESS`, `OTHER_PERSON_SUPPORT`, `ADDRESS`, `IDNO`) VALUES
(20, 'Walter Da-anoy', 'Employee', 'Jessielyn Da-anoy', 'Housewife', 'No', 'No', '', '', '', '', 20004277),
(21, 'Mario P. Amparado', 'OFW', 'Yolly D. Odasco', 'Housewife', 'Yes', 'No', 'Domingga Gomez', '', '', '', 20004207),
(22, 'robert P. ferrer', 'fisherman', 'josephene b. ferrer', 'Housewife', 'Yes', 'Yes', 'josephene b ferrer', 'brgy.cayhagan,sipalay city,neg.occ.', 'sister', '', 20004180),
(23, 'Renelio Pintuan', 'Driver', 'Nanette Pintuan', 'OFW', 'No', 'Yes', 'Ma. Melca Jaranilla', 'Coloso St. Kabankalan City', '', '', 20004425),
(24, '', '', 'dionalita apawan', 'housewife', 'No', 'No', 'sofronia apawan', 'adela st. brgy. 1', '', '', 20002251),
(25, 'Pablito Vicente', 'Laborer', 'Crislie Vicente', 'Laborer', 'No', 'Yes', 'Angelo Lopez', 'Coloso Subd. Kabankalan City', '', '', 20002838),
(26, 'Luis Balico', 'N/A', 'Leonisa Balico', 'N/A', 'No', 'Yes', 'Mary Ann Balico', 'Brgy Isidro Village, Talubangi Kabankalan City', 'N/A', '', 20004623),
(27, 'Panfilo Catalan Buendia', 'Vendors', 'Gloria Aspan Buendia', 'Vendors', 'Yes', 'Yes', 'Mr. and Mrs. Gloria Buendia', 'Brgy. Tapi, Kabankalan City', '', '', 2001497),
(28, 'Ramar salazar', 'hair stylist', 'Kathryn Lucy salazar', 'none', 'No', 'Yes', 'DR. MIlagros Aurea Sabidalas ', '12 Rizal St. kabankalan city', '', '', 20001057),
(29, 'Ronald Martisano', 'laxborer', 'Jean Martisano', 'Housewife', 'No', 'Yes', '', '', '', '', 20004407),
(30, 'Rollen Gealon', 'Laborer', 'Marife Gealon', 'Housewife', 'No', 'Yes', 'Mr. & Mrs Rollen Gealon', 'Brgy.2 Ilog, Neg.Occ', '', '', 20004749),
(31, 'James Andrew Benedicto', 'Cook', 'Ma. Sheila Benedicto', 'DH', 'No', 'Yes', '', '', '', '', 20001484),
(32, 'Leve Voluntate', 'Farmer', 'Lerma Voluntate', 'Deceased', 'No', 'Yes', '', '', 'Mr.Von Martir', 'Bacolod City', 20003333),
(33, 'Rudy B. Magada, Jr', 'Fish Dealer', 'Mary I. Magada', 'Housewife', 'No', 'Yes', '', '', 'Ezperanza Magada', 'Libon, Tuyom, Cauayan, Negros Occidental', 20004510),
(34, 'Dionisio C. Herrera', 'Farmer', 'Rubylan O. Herrera', 'plane housewife', 'No', 'Yes', 'Dionisio c. Herrera', 'Mohon Brgy1 . kab city neg occ', '', '', 20001779),
(35, 'Adriano Bayog', 'Farmer', 'Mamerna Dulana', 'housekeeper', 'Yes', 'No', 'Seminary Fathers', 'Kabankalan City', 'Parish', 'La Castellana', 20001482),
(36, 'Ruben J. Principe', '', 'Evelina Gumawa Principe', '', 'No', 'No', '', '', '', '', 20001937),
(37, 'Deceased', 'Deceased', 'Lorna Bandolos', 'Housewife', 'No', 'Yes', '', 'Lorna Bandolos', '', 'Brgy Dancalan Ilog Negros Occidental', 20001648),
(38, 'AMBROCIO SERION', 'FARMER', 'NORMENDA SERION', 'HOUSE WIFE', 'No', 'No', 'JONALYN BUGALON', 'Kabankalan City', 'JONALYN BUGALON', 'KABANKALAN CITY', 20002408),
(39, 'no', '', 'Merlita Macurio', 'housewife', 'No', 'No', 'Gerom Bello', 'Brgy,1 fzo subd.', '', '', 20005936),
(40, 'b', '', '', '', 'No', 'No', '', '', '', '', 20001550),
(41, 'Mr. Edgar C. Macario', 'Farmer', 'Mrs. Hilda F. Macario', 'Housewife', 'No', 'Yes', 'Mrs. Imelda M. Gatoc', 'Cabintagan, Brgy. Linao Kabankalan City, Negros Occidental', 'Mr. Robert C. Macario', 'Brgy. Salong Kabankalan City', 20002270),
(42, 'Virgilio Puyogao', 'Carpenter', 'Angelica Puyogao', 'Housewife', 'No', 'Yes', 'Virgilio Puyogao', 'Dancalan, Ilog, Negros Occidental', 'Annabel Puyogao', 'Dancalan, Ilog, Negros Occidental', 20001932),
(43, 'William Bulgado', 'Driver', 'Lolita Bulgado', 'Housewife', 'Yes', 'Yes', 'William Bulgado', 'magsaysay tabu ilog neg.occ', 'none', 'none', 20001498),
(45, 'Ricardo Tayoba Cabiten', 'Farmer', 'Nelly Cuenca Cabiten', 'Housewife', 'No', 'Yes', 'Nancy Cuenca Cabiten', 'Mambugsay, Cauayan, Negros Occidental', 'Romar Cuenca Cabiten', 'Mambugsay, Cauayan, Negros Occidental', 20001503),
(46, 'Joenarie CastaÃ±o', 'Laborer', 'Jeanly CastaÃ±o', 'Housewife', 'No', 'Yes', 'Melinde CastaÃ±o', 'Brgy. Daan Banua, Kabankalan City', 'None', 'N.A', 20001925),
(47, 'Alex Flores', 'Carpenter', 'Nelfa L. Flores', 'Brgy. Custodian', 'No', 'Yes', 'Nelfa L. Flores', 'Brgy. Camugao, Kabankalan City', 'Maria Elena T. Flores', 'Brgy. Camugao, Kabankalan City', 20001658),
(48, 'BENIGNO B. CORTEZ', 'FARMER', 'TERESITA P. CORTEZ', 'HOUSE WIFE', 'Yes', 'No', 'BENIGNO B. CORTEZ', 'TABUGON,kABANKALAN CITY', 'NONE', 'NONE', 20001550),
(49, 'Samuel Daulong', 'Construction Worker', 'Mariles Daulong', 'Office employee', 'Yes', 'Yes', 'Mariles Daulong', 'Caliling,Cauayan Negros Occidental', 'Henry L. Jordan', 'Brgy. Binicuil, Kabankalan City', 20001957),
(50, 'Diosdado Arillo', 'Employee', 'Jesusa Arillo', 'House Wife', 'Yes', 'No', 'Nilda Jestopa', 'Nilda Jestopa', '', 'Adela St. Kabankalan City', 20001456),
(51, 'Jesus M. Gamala', 'Farmer', 'Carmen N. Gamala', 'Housewife', 'Yes', 'No', 'Saro Yana', 'Bonifacio St.Kabankalan City', 'Jeza Gamala', 'DasmariÃ±as Cavite', 20001673),
(52, 'Raul D. Deanon', 'Driver', 'Jonah O. Deanon', 'Housewife', 'No', 'Yes', 'Jonah O. Deanon', 'Dancalan Ilog, Neg, Occ', '', '', 20001557),
(53, 'Ernesto Elijan', 'Welder', 'Emilia Elijan', 'Vendor', 'No', 'Yes', 'Ernalyn Elijan Jamon', 'Pinaguinpinan, KAbankalan City', 'Erline Elijan', 'Saudi Rihad', 20002311),
(54, 'Edward E. Geria', 'Seaman', 'Nilfa G. Geria', 'Agriculturist', 'No', 'Yes', 'Nilfa G.Geria', 'Brgy.Guiljungan Cauayan Negros Occidental', '', '', 20001742),
(55, 'Benjie Melanio Sr.', 'Farmer', 'Delia Melanio', 'Housewife', 'No', 'Yes', 'Benjie Melanio', 'Brgy. Linao', '', '', 20002106),
(56, 'Jose Romel T. Silleva', 'Carpenter', 'Daisy O. Silleva', 'House Wife', 'No', 'Yes', 'Daisy O. Silleva', 'Mapait, Su-ay, Himamaylan City, Negros Occidental', 'Romsdaen O. SIlleva', 'iloilo City', 20001853),
(57, 'Dionisio espadero', 'Farming', 'Rosita Espadero', 'House wife', 'No', 'Yes', 'Erlinda Guinson', 'Tapi kab City', 'Sister', 'Tapi kab City', 20001645);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(20) NOT NULL,
  `FNAME` varchar(40) NOT NULL,
  `LNAME` varchar(40) NOT NULL,
  `MNAME` varchar(40) NOT NULL,
  `SEX` varchar(10) NOT NULL DEFAULT 'Male',
  `BDAY` date NOT NULL,
  `BPLACE` text NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `AGE` int(30) NOT NULL,
  `NATIONALITY` varchar(40) NOT NULL,
  `RELIGION` varchar(255) NOT NULL,
  `CONTACT_NO` varchar(40) NOT NULL,
  `HOME_ADD` text NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  PRIMARY KEY (`S_ID`),
  UNIQUE KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`S_ID`, `IDNO`, `FNAME`, `LNAME`, `MNAME`, `SEX`, `BDAY`, `BPLACE`, `STATUS`, `AGE`, `NATIONALITY`, `RELIGION`, `CONTACT_NO`, `HOME_ADD`, `EMAIL`) VALUES
(17, 20004277, 'Jesterramy', 'Da-anoy ', 'Patete', 'F', '1995-06-14', 'Butuan City', 'Single', 19, 'Filipino', 'roman catholic', '09099754195', 'Brgy Camugao Kabankalan City', 'jesterramy14@yahoo.com'),
(18, 20004207, 'lhenyl Grace', 'Amparado', 'odasco', 'F', '1995-08-27', 'Lancaan Dasmarinas Cavite', 'Single', 18, 'Filipino', 'roman catholic', '09263621995', 'Yao Yao Cauayan negros Occidental', 'lhenylgraceamparado@yahoo.com'),
(19, 20004180, 'mylene', 'ferrer', 'balucan', 'F', '1972-05-22', 'brgy.cayhagan,sipalay city,neg.occ.', 'Single', 18, 'Filipino', 'roman catholic', '091071717257', 'brgy.cayhagan,sipalay city,neg.occ.', 'macaferrer@yahoo.com'),
(20, 20004425, 'John kenneth', 'Pintuan', 'Jaranilla', 'M', '1996-05-14', 'PGH Manila', 'Single', 17, 'Filipino', 'Roman Catholic', '09305373831', 'Villa San jose Brgy. 6 Kabankalan City Negros Occidental', 'Pintuan123@yahoo.com'),
(21, 20002251, 'adrian', 'apawan', 'elloran', 'M', '1995-10-26', 'bacolod city', 'Single', 18, 'filipino', 'roman catholic', '09128214525', 'adela st. brgy.1', 'pidska_dian@yahoo.com'),
(22, 20002838, 'Mark Anthony', 'Vicente', 'Titong', 'M', '1995-10-19', 'Kabankalan Cit y', 'Single', 18, 'Filipino', 'Roman Catholic', '+639071564380', '', 'mav.makeu_19@ymail.com'),
(23, 20004623, 'Sharah Mae', 'Balico', 'Pillones', 'F', '1990-11-01', 'Tagoloan Misamis Oriental', 'Single', 23, 'Filipino', 'Catholic', '09216230993', 'Brgy Isidro Village, Talubangi Kabankalan City', 'Sharahmae_balico@yahoo.com'),
(24, 2001497, 'Raffy', 'Buendia', 'Rendon', 'M', '1993-04-13', 'Tapi, Kabankalan City', 'Single', 20, 'Filipino', 'Roman Catholic', '09483774901', 'Brgy. Tapi, Kabankalan City, Negros Occidental', 'Zieken@yahoo.com'),
(25, 20001057, 'Evan Lloyd', 'Salazar', 'Ayalin', 'M', '1995-05-17', 'Kabankalan City', 'Single', 18, 'filipino', 'roman catholic', '09173077451', '12 rizal St.kabankalan CIty', 'Evanlloydsalazar@yahoo.com'),
(26, 20004407, 'John Mark', 'Martisano', 'Depra', 'M', '1993-06-17', 'Ilog, Neg. Occ', 'Single', 20, 'Pilipino', 'Catholic', '09469080812', 'So. Malabong Andulauan Ilog, Neg. Occ.', 'freestyle05@yahoo.com'),
(27, 20004749, 'Jamaica Jairah', 'Gealon', 'dela Cruz', 'F', '1994-01-12', 'Brgy.2 Ilog,Neg.Occ.', 'Single', 19, 'Filipino', 'Roman Catholic', '09089917220', 'Brgy.2 Ilog Negros Occidental', 'gealon12@yahoo.com.ph'),
(28, 20001484, 'James Angelo', 'Benedicto', 'Garanganao', 'M', '1993-11-18', 'Bacolod City', 'Single', 20, 'Filipino', 'Catholic', '09305446790', 'Dancalan Ilog, Negros Occidental', 'jamesangelobenedicto@yahoo.com'),
(29, 20003333, 'Jenebie', 'Voluntate', 'Tabucon', 'F', '1991-06-17', 'Kabankalan', 'Single', 22, 'Filipino', 'Roman Catholic', '09102247024', 'Brgy.Camansi,Kabankalan City,Neg.Occ.', 'jhen1704_cute@yahoo.com'),
(30, 20004510, 'Rudy', 'Magada, I', 'Itona', 'M', '1995-02-05', 'Calumpang, Cauayan, Negros Occidental', 'Single', 18, 'Filipino', 'Roman Catholic', '09106910482', 'Libon, Tuyom, Cauayan, Negros Occidental', 'magadarudy@yahoo.com'),
(31, 20001779, 'Joevel', 'Herrera', 'Gonzales', 'M', '1993-05-16', 'Negros Occidental', 'Single', 20, 'Filipino', 'Roman Catholic', '09093789858', 'Brgy 1,Kab city ,Neg Occ', 'herrerajovel@yahoo.com'),
(32, 20001482, 'Aldren', 'Bayog', 'Dulana ', 'M', '1993-12-27', 'La Castellana', 'Single', 20, 'Filipino', 'Roman Catholic', '09077898435', 'Kabankalan City', 'Aldz_bayog@yahoo.com'),
(33, 20001937, 'Merry Grace', 'PRINCIPE', 'Gumawa', 'F', '1988-03-12', 'Candoni', 'Single', 25, 'Filipino', 'Roman Catholic', '09094397440', 'Pabera St.Brgy.East,Candoni, Negros Occidental', 'merrygraceprincipe@yahoo.com'),
(34, 20001648, 'Shiela Marie', 'Bandolos', 'Tadaya', 'F', '1990-08-21', 'Brgy. Dancalan Ilog Negros Occidental', 'Single', 22, 'Filipino', 'Roman Catholic', '09095596773', 'Brgy. Dancalan Ilog Negros Occidental', 'Marie_Bandolos@yahoo.com'),
(35, 20002408, 'ANALYN', 'SERION', 'ONLAGADA', 'F', '1993-10-30', 'Bry. TAMPALON KABANKALAN CITY', 'Single', 20, 'Filipino', 'Catholic', '09476154838', 'Kabankalan City', 'Analynserion@yahoo.com'),
(36, 20005936, 'Jean', 'MACURIO', 'Gondao', 'F', '1994-10-29', 'Brgy.Bantayan', 'Single', 19, 'Filipino', 'Baptist', '09125341710', 'Brgy. Bantayan Kabankalan City', 'jean_29_jake@yahoo.com'),
(37, 20001550, 'BENIGNO', 'CORTEZ', 'LACPAO', 'M', '1992-02-03', 'DUMAGUETE', 'Single', 21, 'FILIPINO', 'BAPTIST', '09097313999', 'TABUGON,KABANKALAN CITY,NEGROS OCCIDENTAL', 'deadlyjay_23@yahoo.com'),
(38, 20002270, 'Arhil Jun', 'Macario', 'Fernandez', 'M', '1993-06-12', 'Cabintagan, Brgy. Linao', 'Single', 20, 'Filipino', 'Roman Catholic', '09489776185', 'Cabintagan, Brgy. Linao Kabankalan City, Negros Occidental', 'elehra_jun_09@yahoo.com'),
(39, 20001932, 'Ana Mae', 'Puyogao', 'Lacson', 'F', '1992-10-11', 'Dancalan, Ilog, Neg. Occ', 'Single', 21, 'Filipino', 'Baptist', '09079002850', 'Brgy. Dancalan, Ilog, Negros Occidental', 'puyogaoanamae@yahoo.com'),
(40, 20001498, 'gina', 'bulgado', 'malabago', 'F', '1992-06-28', 'Magsaysay tabu ilog ', 'Single', 21, 'Filipino', 'Roman Catholic', '0912-981-4177', 'magsaysay tabu,ilog negros occidental', 'carlghin_52@yahoo.com'),
(42, 20001503, 'Rhea May', 'Cabiten', 'Cuenca', 'F', '1992-05-01', 'Mambugsay, Cauayan, Negros Occidental', 'Single', 21, 'Filipino', 'Roman Catholic', '09097862920', 'Mambugsay, Cauayan, Negros Occidental', 'rean7901@gmail.com'),
(43, 20001925, 'Jojean', 'CastaÃ±o', 'Soberano', 'F', '1994-09-27', 'Silay City', 'Single', 19, 'Filipino', 'Roman Catholic', '09122543919', 'Brgy. Daan Banua, Kabankalan City', 'Jojean_c@yahoo.com'),
(44, 20001658, 'Steve', 'Flores', 'Liper', 'M', '1993-01-02', 'Brgy. Camugao, Kabankalan City', 'Single', 21, 'Filipino', 'Roman Catholic', '09077659710', 'Brgy. Camugao, Kabankalan City', 'skevinz_23@ymail.com'),
(46, 20001957, 'Ma. Lavinia', 'Daulong', 'Corsino', 'F', '1994-06-09', 'Caliling,Cauayan Neg. Occ', 'Single', 19, 'Filipino', 'Roman Catholic', '09073837380', 'Caliling,Cauayan Negros Occidental', 'corsin90@yahoo.com'),
(47, 20001456, 'Diwannie', 'Arillo', 'Pagunsan', 'F', '1992-10-12', 'Brgy.Tabugon Kabankalan City Neg. Occ.', 'Single', 21, 'Filipino', 'Roman Catholic', '09484525429', 'Brgy. Tabugon Kabankalan City Neg. Occ.', 'dj_arillo@yahoo.com'),
(48, 20001673, 'Carjei', 'Gamala', 'Nazareth', 'M', '1993-04-28', 'Bulata', 'Single', 20, 'Filipino', 'Catholic', '09484207156', 'Bulata Cauyan Negros Occidental', 'kai_luv@yahoo.com'),
(49, 20001557, 'Jenny Joy', 'Deanon', 'O.', 'F', '1992-12-16', 'Dancalan Ilog,Neg, Occ', 'Single', 22, 'Filipino', 'Roman Catholic', '09466021131', 'Dancalan Ilog Neg,Occ', 'jj_deah16@Yahoo.com'),
(50, 20002311, 'Elsie', 'Elijan', 'Tabligan', 'F', '1989-10-08', 'Provincial Hospital Bacolod City', 'Single', 24, 'Filipino', 'Baptist', '09128990012', 'Malinao, Dancalan, Ilog Negros Occidental', 'cute_elz20@yahoo.com'),
(51, 20001742, 'Gergen Mae', 'Geria', 'Gadot', 'F', '1994-05-19', 'BAcolod City', 'Single', 19, 'Filipino', 'Roman Catholic', '09129207751', 'Brgy.Guiljungan Cauayan Negros Occidental', 'geriaergenmage@yahoo.com'),
(52, 20002106, 'Jerom', 'Melanio', 'Bandolon', 'M', '1992-10-12', 'Kabankalan City', 'Single', 21, 'Filipino', 'Cathilic', '09303950074', 'Brgy. Linao, Kabankalan City', 'melaniojerom@yahoo.com'),
(53, 20001853, 'Liezl', 'Silleva', 'OrdoÃ±a', 'F', '1994-05-19', 'Su-ay', 'Single', 19, 'Pilipino', 'Catholic', '09122319960', 'Mapait, Su-ay, Himamaylan City, Negros Occidental', 'lieztryx_16@yahoo.com'),
(54, 20001645, 'roselyn', 'espadero', 'T', 'F', '1989-02-11', 'dancalan ilog', 'Single', 24, 'filipino', 'Catholic', '09122292298', 'tapi kab city', 'roselyt.espadero@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE IF NOT EXISTS `useraccounts` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_NAME` varchar(255) NOT NULL,
  `ACCOUNT_USERNAME` varchar(255) NOT NULL,
  `ACCOUNT_PASSWORD` text NOT NULL,
  `ACCOUNT_TYPE` varchar(30) NOT NULL,
  PRIMARY KEY (`ACCOUNT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`ACCOUNT_ID`, `ACCOUNT_NAME`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`) VALUES
(3, 'Joken Villanueva', 'joken@yahoo.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Administrator'),
(4, 'Hatch Villanueva', 'hatchvillanueva16@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Registrar'),
(6, 'joenin', 'joenin@yahoo.com', '25f3c6036a19460cd5d3f302fa7b99e5be56cb0e', 'Encoder');
