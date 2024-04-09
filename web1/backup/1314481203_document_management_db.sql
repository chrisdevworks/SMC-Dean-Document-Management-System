-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: document_management_db
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attach_request_doc`
--

DROP TABLE IF EXISTS `attach_request_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attach_request_doc` (
  `attach_request_doc_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_request_id` int(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  `extension` varchar(250) NOT NULL,
  `size` double NOT NULL,
  PRIMARY KEY (`attach_request_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attach_request_doc`
--

LOCK TABLES `attach_request_doc` WRITE;
/*!40000 ALTER TABLE `attach_request_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `attach_request_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_schedule`
--

DROP TABLE IF EXISTS `class_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_schedule` (
  `id` int(200) NOT NULL,
  `subject_id` int(200) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `room` varchar(200) NOT NULL,
  `total_students` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_schedule`
--

LOCK TABLES `class_schedule` WRITE;
/*!40000 ALTER TABLE `class_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `class_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document` (
  `document_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_code` varchar(200) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `document_classification_id` int(200) NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` VALUES (9,'ad','dasd',5),(10,'asd','asdas',6),(11,'asdsa','dasd',3),(12,'as','sd',3);
/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_approvers`
--

DROP TABLE IF EXISTS `document_approvers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_approvers` (
  `document_approvers_id` int(250) NOT NULL AUTO_INCREMENT,
  `office_document_id` int(250) NOT NULL,
  `personnel_id` int(250) NOT NULL,
  `approver_employee_id` int(250) NOT NULL,
  PRIMARY KEY (`document_approvers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_approvers`
--

LOCK TABLES `document_approvers` WRITE;
/*!40000 ALTER TABLE `document_approvers` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_approvers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_classification`
--

DROP TABLE IF EXISTS `document_classification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_classification` (
  `document_classification_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_classification_code` varchar(200) NOT NULL,
  `document_classification_name` varchar(200) NOT NULL,
  PRIMARY KEY (`document_classification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_classification`
--

LOCK TABLES `document_classification` WRITE;
/*!40000 ALTER TABLE `document_classification` DISABLE KEYS */;
INSERT INTO `document_classification` VALUES (2,'12344','asdasd'),(3,'QMAN','Quality Manual'),(4,'PROC','Procedures'),(5,'RECD','Records'),(6,'SDOC','Support Documents');
/*!40000 ALTER TABLE `document_classification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_request`
--

DROP TABLE IF EXISTS `document_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_request` (
  `document_request_id` int(250) NOT NULL AUTO_INCREMENT,
  `user_id` int(250) NOT NULL,
  `office_document_id` int(250) NOT NULL,
  `request_time` varchar(250) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `purpose` varchar(250) NOT NULL,
  `document_keeper_id` int(250) NOT NULL,
  PRIMARY KEY (`document_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_request`
--

LOCK TABLES `document_request` WRITE;
/*!40000 ALTER TABLE `document_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_request_approve`
--

DROP TABLE IF EXISTS `document_request_approve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_request_approve` (
  `document_request_approve_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_approvers_id` int(250) NOT NULL,
  `approve` varchar(250) NOT NULL,
  `approve_time` varchar(250) NOT NULL,
  `approve_date` date NOT NULL DEFAULT current_timestamp(),
  `document_request_id` int(250) NOT NULL,
  PRIMARY KEY (`document_request_approve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_request_approve`
--

LOCK TABLES `document_request_approve` WRITE;
/*!40000 ALTER TABLE `document_request_approve` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_request_approve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_requested_approve`
--

DROP TABLE IF EXISTS `document_requested_approve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_requested_approve` (
  `document_requested_approve_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_request_approve_id` int(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  `extension` varchar(250) NOT NULL,
  `size` double NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` varchar(250) NOT NULL,
  `revision_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `revision_time` varchar(250) NOT NULL,
  PRIMARY KEY (`document_requested_approve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_requested_approve`
--

LOCK TABLES `document_requested_approve` WRITE;
/*!40000 ALTER TABLE `document_requested_approve` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_requested_approve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_upload`
--

DROP TABLE IF EXISTS `document_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_upload` (
  `document_upload_id` int(250) NOT NULL AUTO_INCREMENT,
  `office_document_id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `document_title` varchar(250) NOT NULL,
  `upload_time` varchar(250) NOT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp(),
  `title` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  `extension` varchar(250) NOT NULL,
  `size` double NOT NULL,
  `document_upload_code` varchar(250) NOT NULL,
  `tracking_number` varchar(250) NOT NULL,
  PRIMARY KEY (`document_upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_upload`
--

LOCK TABLES `document_upload` WRITE;
/*!40000 ALTER TABLE `document_upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(200) DEFAULT NULL,
  `position_id` int(200) DEFAULT NULL,
  `tracking_number` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `purpose` text NOT NULL,
  `remarks` text NOT NULL,
  `uploaded_files` varchar(100) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (47,NULL,0,'','dasdasd','Incomplete','','','','','assets/dist/uploads/803877bryantampz.jpg','2022-10-12 12:16:42','2022-11-16 12:56:06'),(48,32,NULL,'','Assessment','Incomplete','','','','','assets/dist/uploads/47952bryantampz.jpg','2022-10-12 12:24:57','2022-11-16 12:56:06'),(49,32,NULL,'','Assessment','Incomplete','','','','','assets/dist/uploads/387231bryantampz.jpg','2022-10-12 12:26:28','2022-11-16 12:56:06');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `smc_id` varchar(10) NOT NULL,
  `paddress` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `mothersname` varchar(200) NOT NULL,
  `fathersname` varchar(200) NOT NULL,
  `parents_address` text NOT NULL,
  `parents_contact` int(30) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`),
  CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (0,15,'Faculty','Faculty','Faculty','Male','Faculty','Faculty','Faculty@Faculty.com','0022-02-22','Single','CAS','Faculty','Roman Catholic','09123456789','FMom','FDad','asdasdas',2147483647,'assets/dist/uploads/176055download.jpg','2022-10-12 08:38:38','2022-10-12 08:38:38');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grading`
--

DROP TABLE IF EXISTS `grading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grading` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `student_id` int(100) NOT NULL,
  `subject_id` int(100) NOT NULL,
  `faculty_id` int(100) NOT NULL,
  `prospectus_id` int(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `subject_id` (`subject_id`),
  UNIQUE KEY `faculty_id` (`faculty_id`),
  UNIQUE KEY `prospectus_id` (`prospectus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grading`
--

LOCK TABLES `grading` WRITE;
/*!40000 ALTER TABLE `grading` DISABLE KEYS */;
/*!40000 ALTER TABLE `grading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `message_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_request_approve_id` int(250) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `message_date` date NOT NULL,
  `message_time` varchar(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office` (
  `office_id` int(250) NOT NULL AUTO_INCREMENT,
  `office_code` varchar(200) NOT NULL,
  `office_name` varchar(200) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office`
--

LOCK TABLES `office` WRITE;
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` VALUES (15,'CAS','College of Arts and Sciences'),(16,'CED','College of Education'),(17,'CECS','College of Engineering & Computer Studies'),(18,'CBAA','College of Business Administration and Accountancy'),(19,'CHM','College of Hospitality Management'),(20,'CON','College of Nursing'),(21,'COC','College of Criminology'),(22,'GS','Graduate School'),(23,'VPA','VP Academics Office'),(24,'GAC','Guidance and Counseling Office	'),(25,'REG','Registrars Office'),(26,'FIN','Finance Office	'),(27,'RES','Research Office'),(28,'DSA','Department of Student Affairs Office'),(29,'FAC','Faculty Office'),(30,'CLIN','Clinic'),(31,'LIB','Library'),(32,'LAB','Laboratory'),(33,'ITC','Information Technology Center');
/*!40000 ALTER TABLE `office` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office_document`
--

DROP TABLE IF EXISTS `office_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office_document` (
  `office_document_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_id` int(250) NOT NULL,
  `office_id` int(250) NOT NULL,
  PRIMARY KEY (`office_document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_document`
--

LOCK TABLES `office_document` WRITE;
/*!40000 ALTER TABLE `office_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `office_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prospectus`
--

DROP TABLE IF EXISTS `prospectus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prospectus` (
  `id` int(255) NOT NULL,
  `student_id` int(30) NOT NULL,
  `course` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `effective_sy` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prospectus`
--

LOCK TABLES `prospectus` WRITE;
/*!40000 ALTER TABLE `prospectus` DISABLE KEYS */;
/*!40000 ALTER TABLE `prospectus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `route` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `document_id` int(200) NOT NULL,
  `position_id` int(200) NOT NULL,
  `sent_from` varchar(200) NOT NULL,
  `sent_to` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `route`
--

LOCK TABLES `route` WRITE;
/*!40000 ALTER TABLE `route` DISABLE KEYS */;
/*!40000 ALTER TABLE `route` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `smc_id` varchar(10) NOT NULL,
  `year_level` int(11) NOT NULL,
  `paddress` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `mothersname` varchar(200) NOT NULL,
  `fathersname` varchar(200) NOT NULL,
  `parents_address` text NOT NULL,
  `parents_contact` int(30) NOT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Bryant Angelo','Patayan','Ampo','Male','asda',0,'asdasd','adsasd@gmail.com','1111-11-11','Single','CED','BACHELOR OF ARTS IN ENGLISH LANGUAGE','Roman Catholic','09123456789','asdasd','sdasd','sadasdas',2147483647,'assets/dist/uploads/646576bryantampz.jpg','2022-09-27 15:39:58','2022-10-10 09:23:45'),(31,'Student1','Student1','Student1','Male','C22-1234',1,'SADASDAS','Student1@gmail.com','0022-02-22','Single','CECS','BACHELOR OF SCIENCE IN COMPUTER ENGINEERING','Roman Catholic','09123456789','sadasd','sadasd','asda',0,'assets/dist/uploads/445712download.jpg','2022-10-11 11:19:29','2022-10-11 11:19:29'),(32,'Student2','Student2','Student2','Female','C22-3213',1,'sdasd','Student2@gmail.com','0002-02-22','Single','CECS','BACHELOR OF ARTS IN ENGLISH LANGUAGE','Baptist','09123456789','asdasdsadasd','asdasd','asda',0,'assets/dist/uploads/934006dog-puppy-on-garden-royalty-free-image-1586966191.jpg','2022-10-11 11:20:34','2022-10-11 11:20:34'),(33,'Faculty','Faculty','Faculty','Male','asd',0,'asd','asasda@adsas.adasd','0011-11-11','Widow','CAS','dasd','Roman Catholic','09123456789','dsadasd','adasasd','asdasda',2147483647,'assets/dist/uploads/846259bryantampz.jpg','2022-10-12 08:00:11','2022-10-12 08:00:11'),(34,'Faculty','Faculty','Faculty','Male','asd',0,'asd','asasda@adsas.adasd','0011-11-11','Widow','CAS','dasd','Roman Catholic','09123456789','dsadasd','adasasd','asdasda',2147483647,'assets/dist/uploads/146707bryantampz.jpg','2022-10-12 08:21:58','2022-10-12 08:21:58');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(200) DEFAULT NULL,
  `student_id` int(200) DEFAULT NULL,
  `course` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `course_code` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `lecture` int(10) NOT NULL,
  `laboratory` int(10) NOT NULL,
  `total_hrs` int(10) NOT NULL,
  `total_units` int(10) NOT NULL,
  `pre_requisites` varchar(200) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (2,NULL,NULL,'','CECS',NULL,'ITE 102','Computer Programming 1',2,3,5,3,'none','2022','1','2022-10-03 09:39:04','2022-10-03 09:39:04');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_appointment`
--

DROP TABLE IF EXISTS `subject_appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_appointment` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `subject_id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `faculty_id` int(100) NOT NULL,
  `section` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `room` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_appointment`
--

LOCK TABLES `subject_appointment` WRITE;
/*!40000 ALTER TABLE `subject_appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'BryantAmpz@gmail.com','25f9e794323b453885f5181f1b624d0b','Student','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `authority_level` varchar(200) NOT NULL,
  `office_id` int(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'admin@admin.com','0192023a7bbd73250516f069df18b500','','','','Dean','',0,'2022-09-27 17:43:44','2022-11-13 11:06:10'),(14,'cas@gmail.com','25f9e794323b453885f5181f1b624d0b','','','','Dean','',0,'2022-10-11 09:03:42','2022-10-11 09:03:42'),(15,'BryantAmpz@gmail.com','0192023a7bbd73250516f069df18b500','','','','Faculty','',0,'2022-10-11 09:13:43','2022-10-11 21:46:27'),(16,'admin2@admin.com','0192023a7bbd73250516f069df18b500','','','','Dean','',0,'2022-10-11 11:23:05','2022-10-11 11:23:05'),(20,'cxcvxcvc','fb0e22c79ac75679e9881e6ba183b354','sdasdasd','asasdasd','asdasd','Quality Assurance Management Director','',0,'2022-11-18 20:23:22','2022-11-18 20:23:22'),(30,'aaaaa','bcfd3203056c535aace7c6c4b810d83b','sdasdasd','asasdasd','asdasd','Quality Assurance Management Director','',0,'2022-11-18 23:56:08','2022-11-18 23:56:08'),(31,'ffffffff','71f396e4134a1160d90bb1439876df31','fffffff','fffffff','ffff','Quality Assurance Management Director','',31,'2022-11-18 23:56:52','2022-11-18 23:56:52'),(32,'dasd','e10adc3949ba59abbe56e057f20f883e','asdasd','asdas','asdas','Service Head','',33,'2022-11-19 11:52:24','2022-11-19 11:52:24'),(33,'admin','21232f297a57a5a743894a0e4a801fc3','admin firstname','admin middle','admin lastname','Quality Assurance Management Director','',33,'2022-11-19 12:03:17','2022-11-19 12:03:17'),(34,'admin123','0192023a7bbd73250516f069df18b500','a','b','c','Central Administration','',30,'2022-11-19 13:46:32','2022-11-19 13:46:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'document_management_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-19 17:41:44
