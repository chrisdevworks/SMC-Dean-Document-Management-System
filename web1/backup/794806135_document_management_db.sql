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
INSERT INTO `document_classification` VALUES (3,'QMAN','Quality Manual'),(4,'PROC','Procedures'),(5,'RECD','Records'),(6,'SDOC','Support Documents');
/*!40000 ALTER TABLE `document_classification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_type`
--

DROP TABLE IF EXISTS `document_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_type` (
  `document_type_id` int(250) NOT NULL AUTO_INCREMENT,
  `document_code` varchar(200) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `document_classification_id` int(200) NOT NULL,
  PRIMARY KEY (`document_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_type`
--

LOCK TABLES `document_type` WRITE;
/*!40000 ALTER TABLE `document_type` DISABLE KEYS */;
INSERT INTO `document_type` VALUES (25,'COS','Certificate of Service',6),(26,'DV','Disbursement Voucher',4),(27,'IIR','Inventory and Inspection Report',5),(28,'LTR','Letter',6),(29,'LR','Liquidation Report',3),(30,'MEMO','Memorandum',6),(31,'MEMOA','Memorandum of Agreement',6),(32,'MEMOR','Memorandum Receipt',6),(33,'OCB','Official Cash Book',5),(34,'PDS','Personal Data Sheet',6),(35,'PO','Purchase Order',4),(36,'PR','Purchase Request',4),(37,'RS','Referral Slip',6),(38,'ROA','Request for Obligation of Allotments',4),(39,'RIV','Requisition and Issue Voucher',3),(40,'UNC','Unclassified',6);
/*!40000 ALTER TABLE `document_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `document_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(200) DEFAULT NULL,
  `tracking_number` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `office_id` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `purpose` text NOT NULL,
  `remarks` text NOT NULL,
  `uploaded_files` varchar(100) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (47,NULL,'','dasdasd','','','','','assets/dist/uploads/803877bryantampz.jpg','2022-10-12 12:16:42','2022-11-16 12:56:06'),(48,32,'','Assessment','','','','','assets/dist/uploads/47952bryantampz.jpg','2022-10-12 12:24:57','2022-11-16 12:56:06'),(49,32,'','Assessment','','','','','assets/dist/uploads/387231bryantampz.jpg','2022-10-12 12:26:28','2022-11-16 12:56:06'),(50,11,'2022-1129-4452-6179','TEST','College of Education','Academic Advising Report','TEST','TEST','','2022-11-30 00:50:15','2022-11-30 00:50:15'),(51,11,'2022-1129-4452-6179','TEST','VP Academics Office','Attendance','TEST','TEST','','2022-11-30 00:52:03','2022-11-30 00:52:03'),(52,11,'2022-1129-4452-6179','TEST','College of Education','Academic Advising Report','TEST','TEST','','2022-11-30 00:53:46','2022-11-30 00:53:46'),(53,11,'2022-1129-4452-6179','ADAS','College of Arts and Sciences','Academic Advising Report','ASDAS','ASDAS','','2022-11-30 00:54:58','2022-11-30 00:54:58'),(54,11,'2022-1129-4452-6179','asdas','College of Engineering & Computer Studies','Absences Monitoring','das','asd','','2022-11-30 01:05:09','2022-11-30 01:05:09'),(55,11,'2022-1129-4452-6179','asdas','College of Education','Attendance','asdas','asdasd','','2022-11-30 01:05:52','2022-11-30 01:05:52'),(56,11,'2022-1129-4452-6179','asda','College of Education','Attendance','asda','asd','','2022-11-30 01:20:07','2022-11-30 01:20:07'),(57,11,'2022-1129-4452-6179','asda','College of Education','Attendance','asda','asd','','2022-11-30 01:20:31','2022-11-30 01:20:31'),(58,11,'2022-1129-4452-6179','dasd','College of Engineering & Computer Studies','Academic Advising Report','dasdas','dasdsad','','2022-11-30 01:21:22','2022-11-30 01:21:22'),(59,11,'2022-1129-4452-6179','test','College of Education','Academic Advising Report','ada','asd','','2022-11-30 01:24:27','2022-11-30 01:24:27'),(60,11,'2022-1129-4452-6179','DASDSA','College of Education','Absences Monitoring','DSASD','ASD','','2022-11-30 01:27:30','2022-11-30 01:27:30'),(61,11,'2022-1129-4452-6179','DASD','College of Education','Attendance','ASDAS','ASDA','','2022-11-30 01:34:40','2022-11-30 01:34:40'),(62,11,'2022-1129-4452-6179','asdasd','College of Education','Academic Advising Report','asdas','asdas','','2022-11-30 01:41:04','2022-11-30 01:41:04'),(63,11,'2022-1129-4452-6179','asdas','College of Engineering & Computer Studies','Absences Monitoring','asasd','asdasd','assets/dist/uploads/299762bryantampz.jpg','2022-11-30 01:48:16','2022-11-30 01:48:16'),(64,11,'2022-1129-4452-6179','TEST','College of Education','Academic Advising Report','TEST','TEST','assets/dist/uploads/960057bryantampz.jpg','2022-11-30 01:50:27','2022-11-30 01:50:27'),(65,11,'2022-1129-8141-5964','asdsad','College of Engineering & Computer Studies','Academic Advising Report','dasd','asdads','assets/dist/uploads/916839cute-teacup-dog-breeds-4587847-hero-4e1112e93c68438eb0e22f505f739b74.jpg','2022-11-30 02:00:14','2022-11-30 02:00:14'),(66,11,'2022-1203-3102-9600','TEST','Finance Office	','Letter','ASDAS','DADASD','assets/dist/uploads/974617cute-teacup-dog-breeds-4587847-hero-4e1112e93c68438eb0e22f505f739b74.jpg','2022-12-03 12:35:58','2022-12-03 12:35:58');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office`
--

LOCK TABLES `office` WRITE;
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` VALUES (15,'CAS','College of Arts and Sciences'),(16,'CED','College of Education'),(17,'CECS','College of Engineering & Computer Studies'),(18,'CBAA','College of Business Administration and Accountancy'),(19,'CHM','College of Hospitality Management'),(20,'CON','College of Nursing'),(21,'COC','College of Criminology'),(22,'GS','Graduate School'),(23,'VPA','VP Academics Office'),(24,'GAC','Guidance and Counseling Office	'),(25,'REG','Registrars Office'),(26,'FIN','Finance Office	'),(27,'RES','Research Office'),(28,'DSA','Department of Student Affairs Office'),(29,'FAC','Faculty Office'),(30,'CLIN','Clinic'),(31,'LIB','Library'),(32,'LAB','Laboratory'),(33,'ITC','Information Technology Center'),(35,'xxxxx','dasdas');
/*!40000 ALTER TABLE `office` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'admin@admin.com','0192023a7bbd73250516f069df18b500','','','','Dean','',0,'2022-09-27 17:43:44','2022-11-13 11:06:10'),(39,'userfinance','d1ea008829549a558eec1247be136ad8','Kaylin','Kristie','Dena','Staff','3',26,'2022-12-03 12:32:17','2022-12-03 12:32:17'),(40,'useritc','c4bf6e56e760c774b551ea0a84544dbd','Valerie','Sherry','Ebony ','Staff','1',33,'2022-12-03 12:33:12','2022-12-03 12:33:12');
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

-- Dump completed on 2022-12-03 13:22:40
