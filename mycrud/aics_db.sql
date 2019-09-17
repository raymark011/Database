create database aics_db;

use aics_db;

CREATE TABLE `tbl_student` (
  `studentid` int(255) NOT NULL auto_increment,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY  (`studentid`)
);

CREATE TABLE `tbl_class` (
  `id` int(255) NOT NULL auto_increment,
  `classcode` varchar(30) NOT NULL,
  `studentid` int(255) NOT NULL,
  `subjectcode` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`studentid`) 
  REFERENCES `tbl_student` (`studentid`)
);