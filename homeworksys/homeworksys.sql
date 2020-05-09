-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2020-05-08 23:31:39
-- 服务器版本： 5.6.47-log
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeworksys`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `adminid` bigint(20) NOT NULL,
  `adminname` varchar(30) NOT NULL,
  `adminpwd` varchar(24) NOT NULL,
  `admintel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `adminpwd`, `admintel`) VALUES
(101, '李哈哈', '123456', '18311111111');

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `classid` bigint(20) NOT NULL,
  `classmajor` varchar(30) NOT NULL,
  `classdepartment` varchar(30) NOT NULL,
  `classassistant` varchar(30) DEFAULT NULL,
  `classassistanttel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`classid`, `classmajor`, `classdepartment`, `classassistant`, `classassistanttel`) VALUES
(10, '计算机科学与技术专业', '计算机专业', '李辅零', '18352109010'),
(11, '智能科学与技术专业', '计算机专业', '李辅一', '18352109011'),
(12, '物理专业', '理学院', '李辅二', '18352109012'),
(13, '电子商务专业', '经济管理学院', '李辅三', '18352109013'),
(14, '自动化专业', '自动化学院', '李辅四', '18352109014');

-- --------------------------------------------------------

--
-- 表的结构 `classselectcourse`
--

CREATE TABLE `classselectcourse` (
  `courseid` bigint(20) NOT NULL,
  `classid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `classselectcourse`
--

INSERT INTO `classselectcourse` (`courseid`, `classid`) VALUES
(101, 10),
(105, 10),
(106, 10),
(1010, 10),
(101, 11),
(102, 11),
(106, 11),
(107, 11),
(102, 12),
(103, 12),
(107, 12),
(108, 12),
(103, 13),
(104, 13),
(108, 13),
(109, 13),
(104, 14),
(105, 14),
(109, 14),
(1010, 14);

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `courseid` bigint(20) NOT NULL,
  `teacherid` bigint(20) NOT NULL,
  `coursename` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`courseid`, `teacherid`, `coursename`) VALUES
(101, 101, '语文'),
(102, 102, '数学'),
(103, 103, '英语'),
(104, 104, '物理'),
(105, 105, '化学'),
(106, 106, '政治'),
(107, 107, '历史'),
(108, 101, '地理'),
(109, 102, '生物'),
(1010, 103, '计算机');

-- --------------------------------------------------------

--
-- 表的结构 `grade`
--

CREATE TABLE `grade` (
  `gradeid` bigint(20) NOT NULL,
  `studentid` bigint(20) NOT NULL,
  `courseid` bigint(20) NOT NULL,
  `grademarks` int(11) NOT NULL,
  `gradecomments` text,
  `gradedate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `homework`
--

CREATE TABLE `homework` (
  `homeworkid` bigint(20) NOT NULL,
  `courseid` bigint(20) NOT NULL,
  `teacherid` bigint(20) DEFAULT NULL,
  `homeworkcontext` text NOT NULL,
  `homeworkdate` varchar(50) DEFAULT NULL,
  `homeworkdeadline` varchar(50) DEFAULT NULL,
  `homeworkoffice` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `studentid` bigint(20) NOT NULL,
  `classid` bigint(20) NOT NULL,
  `studentname` varchar(30) NOT NULL,
  `studentpwd` varchar(24) NOT NULL,
  `studenttel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`studentid`, `classid`, `studentname`, `studentpwd`, `studenttel`) VALUES
(101, 10, '李零一', '123456', '183521090101'),
(102, 10, '李零二', '123456', '183521090102'),
(103, 10, '李零三', '123456', '183521090103'),
(104, 10, '李零四', '123456', '183521090104'),
(105, 10, '李零五', '123456', '183521090105'),
(111, 11, '李一一', '123456', '183521090111'),
(112, 11, '李一二', '123456', '183521090112'),
(113, 11, '李一三', '123456', '183521090113'),
(114, 11, '李一四', '123456', '183521090114'),
(115, 11, '李一五', '123456', '183521090115'),
(121, 12, '李二一', '123456', '183521090121'),
(122, 12, '李二二', '123456', '183521090122'),
(123, 12, '李二三', '123456', '183521090123'),
(124, 12, '李二四', '123456', '183521090124'),
(125, 12, '李二五', '123456', '183521090125'),
(131, 13, '李三一', '123456', '183521090131'),
(132, 13, '李三二', '123456', '183521090132'),
(133, 13, '李三三', '123456', '183521090133'),
(134, 13, '李三四', '123456', '183521090134'),
(135, 13, '李三五', '123456', '183521090135'),
(141, 14, '李四一', '123456', '183521090141'),
(142, 14, '李四二', '123456', '183521090142'),
(143, 14, '李四三', '123456', '183521090143'),
(144, 14, '李四四', '123456', '183521090144'),
(145, 14, '李四五', '123456', '183521090145');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `teacherid` bigint(20) NOT NULL,
  `teachername` varchar(30) NOT NULL,
  `teacherpwd` varchar(24) NOT NULL,
  `teacheroffice` varchar(50) DEFAULT NULL,
  `teachertel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`teacherid`, `teachername`, `teacherpwd`, `teacheroffice`, `teachertel`) VALUES
(101, '李一', '123456', 't101', '18352109131'),
(102, '李二', '123456', 't102', '18352109132'),
(103, '李三', '123456', 't103', '18352109133'),
(104, '李四', '123456', 't104', '18352109134'),
(105, '李五', '123456', 't105', '18311111111'),
(106, '李六', '123456', 't106', '18352109136'),
(107, '李七', '123456', 't107', '18352109137');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `classselectcourse`
--
ALTER TABLE `classselectcourse`
  ADD PRIMARY KEY (`courseid`,`classid`),
  ADD KEY `FK_classselectcourse2` (`classid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD KEY `FK_teach` (`teacherid`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeid`),
  ADD KEY `FK_csr_have2` (`courseid`),
  ADD KEY `FK_stu_have` (`studentid`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`homeworkid`),
  ADD KEY `FK_assign` (`teacherid`),
  ADD KEY `FK_csr_have1` (`courseid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `FK_cls_have` (`classid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- 使用表AUTO_INCREMENT `homework`
--
ALTER TABLE `homework`
  MODIFY `homeworkid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- 限制导出的表
--

--
-- 限制表 `classselectcourse`
--
ALTER TABLE `classselectcourse`
  ADD CONSTRAINT `FK_classselectcourse` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`),
  ADD CONSTRAINT `FK_classselectcourse2` FOREIGN KEY (`classid`) REFERENCES `class` (`classid`);

--
-- 限制表 `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_teach` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`);

--
-- 限制表 `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `FK_csr_have2` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`),
  ADD CONSTRAINT `FK_stu_have` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`);

--
-- 限制表 `homework`
--
ALTER TABLE `homework`
  ADD CONSTRAINT `FK_assign` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`),
  ADD CONSTRAINT `FK_csr_have1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`);

--
-- 限制表 `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_cls_have` FOREIGN KEY (`classid`) REFERENCES `class` (`classid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
