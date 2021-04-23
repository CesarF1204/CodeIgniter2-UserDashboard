-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: user_dashboard
-- ------------------------------------------------------
-- Server version	5.7.9-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_has_users_users1_idx` (`user_id`),
  KEY `fk_messages_has_users_messages_idx` (`message_id`),
  CONSTRAINT `fk_messages_has_users_messages` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (94,1303,86,'hello cesar~','2021-04-23 12:19:58','2021-04-23 12:19:58'),(95,1300,86,'goodmorning emilio :)','2021-04-23 12:20:30','2021-04-23 12:20:30'),(96,1303,86,'goodmorning too pedro :D','2021-04-23 12:20:50','2021-04-23 12:20:50');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users1_idx` (`user_id`),
  CONSTRAINT `fk_messages_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (86,1299,1303,'Hello emilio!','2021-04-23 12:17:05','2021-04-23 12:17:05'),(87,1299,1300,'Hi Pedring!','2021-04-23 12:21:43','2021-04-23 12:21:43');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_levels`
--

DROP TABLE IF EXISTS `user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_levels`
--

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;
INSERT INTO `user_levels` VALUES (0,'Admin',NULL,NULL),(9,'Normal',NULL,NULL);
/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_user_levels1_idx` (`user_level_id`),
  CONSTRAINT `fk_users_user_levels1` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1326 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1299,0,'Cesar','Francisco','princexcesar@gmail.com','0ed5b4b1b5ccd870e18557752a1934b6','Hi, I\'m Cesar. Let\'s Code!','2021-04-21 20:36:20','2021-04-21 20:36:20'),(1300,9,'Pedro','Penduko','pedropenduko@gmail.com','b28cbdb51d552dc1eda79833b98c8f80','Good Morning!','2021-04-21 20:36:40','2021-04-21 20:36:40'),(1303,9,'Emilio','Aguinaldo','emilioaguinaldo@gmail.com','b28cbdb51d552dc1eda79833b98c8f80',NULL,'2021-04-22 00:06:05','2021-04-22 00:06:05'),(1307,9,'Keane','Houston','hywet@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-22 17:30:09','2021-04-22 17:30:09'),(1311,9,'John','Short','mefugyjuni@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-22 17:30:42','2021-04-22 17:30:42'),(1315,9,'Ronan','Rosario','soxicibot@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 09:20:13','2021-04-23 09:20:13'),(1316,9,'William','Meyer','teqokub@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 09:22:39','2021-04-23 09:22:39'),(1317,9,'Kasimir','Hughes','batetahe@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 09:22:50','2021-04-23 09:22:50'),(1318,9,'Evelyn','Richard','maparotano@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 09:54:42','2021-04-23 09:54:42'),(1320,9,'Alice','Griffin','jydi@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 10:36:27','2021-04-23 10:36:27'),(1321,9,'Thane','Moreno','wonoloji@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 10:37:08','2021-04-23 10:37:08'),(1322,9,'Cassady','Martinez','bivy@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 10:37:25','2021-04-23 10:37:25'),(1323,9,'Bert','Hyde','deto@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 11:28:41','2021-04-23 11:28:41'),(1324,9,'Ako','Adam','admin@admin.com','b28cbdb51d552dc1eda79833b98c8f80',NULL,'2021-04-23 11:38:33','2021-04-23 11:38:33'),(1325,9,'Hayley','Morris','veqyho@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',NULL,'2021-04-23 11:39:24','2021-04-23 11:39:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-23 12:23:39
