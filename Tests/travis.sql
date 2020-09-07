# Create Testuser
#CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';
#GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON *.* TO 'dev'@'localhost';

# Create DB
CREATE DATABASE IF NOT EXISTS `d1965919` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `d1965919`;

# Create Table
CREATE TABLE IF NOT EXISTS `student` (
  `student_no` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `student`
  ADD PRIMARY KEY (`student_no`);

# Add Data
INSERT INTO `student`(`student_no`,`password`) values('1234','123')
