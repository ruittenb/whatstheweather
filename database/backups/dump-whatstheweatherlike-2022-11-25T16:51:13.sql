-- MySQL dump 10.13  Distrib 5.7.26, for osx10.10 (x86_64)
--
-- Host: 127.0.0.1    Database: whatstheweatherlike
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advices`
--

DROP TABLE IF EXISTS `advices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) NOT NULL,
  `temperature_min` double(8,2) DEFAULT NULL,
  `temperature_max` double(8,2) DEFAULT NULL,
  `wind_force_min` int(11) DEFAULT NULL,
  `wind_force_max` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advices`
--

LOCK TABLES `advices` WRITE;
/*!40000 ALTER TABLE `advices` DISABLE KEYS */;
INSERT INTO `advices` (`id`, `sort_order`, `temperature_min`, `temperature_max`, `wind_force_min`, `wind_force_max`, `description`, `created_at`, `updated_at`) VALUES (1,999999999,NULL,NULL,NULL,NULL,'No specific advice.','2022-11-25 10:04:53','2022-11-25 10:04:53'),(2,10,NULL,NULL,7,NULL,'Batten down the hatches!','2022-11-25 10:04:53','2022-11-25 10:04:53'),(3,20,NULL,-10.00,NULL,NULL,'Stay indoors. Turn up the heating.','2022-11-25 10:04:53','2022-11-25 10:04:53'),(4,30,NULL,0.00,NULL,NULL,'Wear a warm coat and sweater.','2022-11-25 10:04:53','2022-11-25 10:04:53'),(5,40,NULL,10.00,NULL,NULL,'Wear a warm sweater.','2022-11-25 10:04:53','2022-11-25 10:04:53'),(6,50,NULL,20.00,NULL,NULL,'Bring an umbrella.','2022-11-25 10:04:53','2022-11-25 10:04:53'),(7,60,30.00,NULL,NULL,NULL,'Organize a barbecue.','2022-11-25 10:04:53','2022-11-25 10:04:53'),(8,70,20.00,NULL,NULL,NULL,'Go for a walk on the beach.','2022-11-25 10:04:53','2022-11-25 10:04:53');
/*!40000 ALTER TABLE `advices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forecasts`
--

DROP TABLE IF EXISTS `forecasts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forecasts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `temperature` double(8,2) DEFAULT NULL,
  `wind_force` int(11) DEFAULT NULL,
  `wind_direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `advice_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `forecasts_advice_id_foreign` (`advice_id`),
  CONSTRAINT `forecasts_advice_id_foreign` FOREIGN KEY (`advice_id`) REFERENCES `advices` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forecasts`
--

LOCK TABLES `forecasts` WRITE;
/*!40000 ALTER TABLE `forecasts` DISABLE KEYS */;
INSERT INTO `forecasts` (`id`, `city`, `longitude`, `latitude`, `temperature`, `wind_force`, `wind_direction`, `created_at`, `updated_at`, `advice_id`) VALUES (30,'Nijmegen',5.86,51.85,8.65,3,'S','2022-11-24 15:08:32','2022-11-24 15:08:32',1),(31,'Nijmegen',5.86,51.85,8.65,3,'S','2022-11-24 15:09:17','2022-11-24 15:09:17',1),(32,'Nijmegen',5.86,51.85,8.65,3,'S','2022-11-24 15:09:34','2022-11-24 15:09:34',1),(33,'Paramaribo',55.20,5.82,26.64,2,'NNE','2022-11-24 15:10:20','2022-11-24 15:10:20',1),(34,'Nijmegen',5.86,51.85,8.45,3,'S','2022-11-24 15:30:04','2022-11-25 12:41:49',5),(35,'Hoorn',5.07,52.65,8.84,3,'S','2022-11-24 15:30:04','2022-11-25 12:41:49',5),(36,'Tilburg',5.08,51.55,9.40,3,'SSE','2022-11-24 15:30:09','2022-11-25 12:41:49',5),(37,'Amsterdam',4.90,52.37,9.04,4,'S','2022-11-24 15:30:13','2022-11-25 12:41:49',5),(38,'Den Bosch',5.30,51.68,9.19,1,'SE','2022-11-24 15:30:25','2022-11-25 12:41:49',5),(39,'New York',-74.01,40.71,9.56,2,'N','2022-11-24 15:30:26','2022-11-25 12:41:49',5),(40,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 15:30:32','2022-11-24 15:30:32',1),(41,'Ulaanbaatar',106.92,47.92,-17.05,2,'NW','2022-11-24 15:30:33','2022-11-25 12:41:49',4),(42,'Nijmegen',5.86,51.85,8.45,3,'S','2022-11-24 15:35:01','2022-11-25 12:41:49',5),(43,'Hoorn',5.07,52.65,8.73,3,'S','2022-11-24 15:35:01','2022-11-25 12:41:49',5),(44,'Tilburg',5.08,51.55,9.22,3,'SSE','2022-11-24 15:35:01','2022-11-25 12:41:49',5),(45,'Amsterdam',4.90,52.37,9.04,4,'S','2022-11-24 15:35:01','2022-11-25 12:41:49',5),(46,'Den Bosch',5.30,51.68,9.09,1,'SSE','2022-11-24 15:35:02','2022-11-25 12:41:49',5),(47,'New York',-74.01,40.71,9.69,2,'N','2022-11-24 15:35:03','2022-11-25 12:41:49',5),(48,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 15:35:03','2022-11-24 15:35:03',1),(49,'Ulaanbaatar',106.92,47.92,-17.05,2,'NW','2022-11-24 15:35:03','2022-11-25 12:41:49',4),(50,'Nijmegen',5.86,51.85,8.38,3,'S','2022-11-24 15:40:01','2022-11-25 12:41:49',5),(51,'Hoorn',5.07,52.65,8.73,3,'S','2022-11-24 15:40:01','2022-11-25 12:41:49',5),(52,'Tilburg',5.08,51.55,9.22,3,'SSE','2022-11-24 15:40:02','2022-11-25 12:41:49',5),(53,'Amsterdam',4.90,52.37,9.07,4,'SSE','2022-11-24 15:40:02','2022-11-25 12:41:49',5),(54,'Den Bosch',5.30,51.68,9.09,1,'SSE','2022-11-24 15:40:02','2022-11-25 12:41:49',5),(55,'New York',-74.01,40.71,9.69,2,'N','2022-11-24 15:40:02','2022-11-25 12:41:49',5),(56,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 15:40:02','2022-11-24 15:40:02',1),(57,'Ulaanbaatar',106.92,47.92,-17.05,2,'NW','2022-11-24 15:40:02','2022-11-25 12:41:49',4),(58,'Nijmegen',5.86,51.85,8.38,3,'S','2022-11-24 15:45:01','2022-11-25 12:41:49',5),(59,'Hoorn',5.07,52.65,8.73,3,'S','2022-11-24 15:45:01','2022-11-25 12:41:49',5),(60,'Tilburg',5.08,51.55,9.16,3,'SSE','2022-11-24 15:45:02','2022-11-25 12:41:49',5),(61,'Amsterdam',4.90,52.37,9.07,4,'SSE','2022-11-24 15:45:02','2022-11-25 12:41:49',5),(62,'Den Bosch',5.30,51.68,8.96,1,'S','2022-11-24 15:45:03','2022-11-25 12:41:49',5),(63,'New York',-74.01,40.71,9.90,2,'N','2022-11-24 15:45:04','2022-11-25 12:41:49',5),(64,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 15:45:04','2022-11-24 15:45:04',1),(65,'Ulaanbaatar',106.92,47.92,-17.05,2,'NW','2022-11-24 15:45:05','2022-11-25 12:41:49',4),(66,'Nijmegen',5.86,51.85,8.38,3,'S','2022-11-24 15:50:01','2022-11-25 12:41:49',5),(67,'Hoorn',5.07,52.65,8.70,3,'S','2022-11-24 15:50:02','2022-11-25 12:41:49',5),(68,'Tilburg',5.08,51.55,9.16,3,'SSE','2022-11-24 15:50:03','2022-11-25 12:41:49',5),(69,'Amsterdam',4.90,52.37,9.06,4,'SSE','2022-11-24 15:50:03','2022-11-25 12:41:49',5),(70,'Den Bosch',5.30,51.68,8.96,1,'S','2022-11-24 15:50:03','2022-11-25 12:41:49',5),(71,'New York',-74.01,40.71,9.90,2,'N','2022-11-24 15:50:03','2022-11-25 12:41:49',5),(72,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 15:50:03','2022-11-24 15:50:03',1),(73,'Ulaanbaatar',106.92,47.92,-17.05,2,'NW','2022-11-24 15:50:04','2022-11-25 12:41:49',4),(74,'Nijmegen',5.86,51.85,8.28,3,'S','2022-11-24 15:55:01','2022-11-25 12:41:49',5),(75,'Hoorn',5.07,52.65,8.70,3,'S','2022-11-24 15:55:01','2022-11-25 12:41:49',5),(76,'Tilburg',5.08,51.55,9.16,3,'SSE','2022-11-24 15:55:01','2022-11-25 12:41:49',5),(77,'Amsterdam',4.90,52.37,9.06,4,'SSE','2022-11-24 15:55:01','2022-11-25 12:41:49',5),(78,'Den Bosch',5.30,51.68,8.96,1,'S','2022-11-24 15:55:01','2022-11-25 12:41:49',5),(79,'New York',-74.01,40.71,9.90,2,'N','2022-11-24 15:55:01','2022-11-25 12:41:49',5),(80,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 15:55:01','2022-11-24 15:55:01',1),(81,'Ulaanbaatar',106.92,47.92,-17.05,2,'NW','2022-11-24 15:55:01','2022-11-25 12:41:49',4),(82,'Nijmegen',5.86,51.85,8.27,3,'S','2022-11-24 16:00:06','2022-11-25 12:41:49',5),(83,'Hoorn',5.07,52.65,8.70,3,'S','2022-11-24 16:00:26','2022-11-25 12:41:49',5),(84,'Tilburg',5.08,51.55,9.05,3,'SSE','2022-11-24 16:00:46','2022-11-25 12:41:49',5),(85,'Amsterdam',4.90,52.37,9.11,4,'SSE','2022-11-24 16:00:50','2022-11-25 12:41:49',5),(86,'Den Bosch',5.30,51.68,8.89,1,'SSW','2022-11-24 16:00:50','2022-11-25 12:41:49',5),(87,'New York',-74.01,40.71,10.42,2,'SE','2022-11-24 16:00:50','2022-11-24 16:00:50',1),(88,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 16:00:52','2022-11-24 16:00:52',1),(89,'Ulaanbaatar',106.92,47.92,-18.30,2,'NW','2022-11-24 16:00:53','2022-11-25 12:41:49',4),(90,'Nijmegen',5.86,51.85,8.12,3,'S','2022-11-24 16:15:00','2022-11-25 12:41:49',5),(91,'Hoorn',5.07,52.65,8.64,3,'S','2022-11-24 16:15:01','2022-11-25 12:41:49',5),(92,'Tilburg',5.08,51.55,8.98,3,'S','2022-11-24 16:15:03','2022-11-25 12:41:49',5),(93,'Amsterdam',4.90,52.37,9.08,4,'S','2022-11-24 16:15:03','2022-11-25 12:41:49',5),(94,'Den Bosch',5.30,51.68,8.79,1,'SSE','2022-11-24 16:15:04','2022-11-25 12:41:49',5),(95,'New York',-74.01,40.71,10.52,2,'NE','2022-11-24 16:15:04','2022-11-24 16:15:04',1),(96,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 16:15:04','2022-11-24 16:15:04',1),(97,'Ulaanbaatar',106.92,47.92,-17.02,3,'NNW','2022-11-24 16:15:04','2022-11-25 12:41:49',4),(98,'Nijmegen',5.86,51.85,8.06,3,'S','2022-11-24 16:30:01','2022-11-25 12:41:49',5),(99,'Hoorn',5.07,52.65,8.58,3,'S','2022-11-24 16:30:01','2022-11-25 12:41:49',5),(100,'Tilburg',5.08,51.55,8.88,3,'S','2022-11-24 16:30:03','2022-11-25 12:41:49',5),(101,'Amsterdam',4.90,52.37,9.09,4,'S','2022-11-24 16:30:03','2022-11-25 12:41:49',5),(102,'Den Bosch',5.30,51.68,8.67,1,'SE','2022-11-24 16:30:05','2022-11-25 12:41:49',5),(103,'New York',-74.01,40.71,10.74,2,'NE','2022-11-24 16:30:05','2022-11-24 16:30:05',1),(104,'Paramaribo',55.20,5.82,26.59,2,'NNE','2022-11-24 16:30:05','2022-11-24 16:30:05',1),(105,'Ulaanbaatar',106.92,47.92,-17.05,3,'NNW','2022-11-24 16:30:24','2022-11-25 12:41:49',4),(106,'Nijmegen',5.86,51.85,8.15,4,'S','2022-11-24 16:45:02','2022-11-25 12:41:49',5),(107,'Hoorn',5.07,52.65,8.51,3,'SSE','2022-11-24 16:45:04','2022-11-25 12:41:49',5),(108,'Tilburg',5.08,51.55,8.86,4,'S','2022-11-24 16:45:05','2022-11-25 12:41:49',5),(109,'Amsterdam',4.90,52.37,9.01,4,'SSE','2022-11-24 16:45:05','2022-11-25 12:41:49',5),(110,'Den Bosch',5.30,51.68,8.72,1,'SSE','2022-11-24 16:45:06','2022-11-25 12:41:49',5),(111,'New York',-74.01,40.71,11.13,2,'S','2022-11-24 16:45:07','2022-11-24 16:45:07',1),(112,'Paramaribo',55.20,5.82,26.52,2,'NNE','2022-11-24 16:45:07','2022-11-24 16:45:07',1),(113,'Ulaanbaatar',106.92,47.92,-17.05,3,'NNW','2022-11-24 16:45:07','2022-11-25 12:41:49',4),(114,'Nijmegen',5.86,51.85,8.12,4,'S','2022-11-24 17:00:06','2022-11-25 12:41:49',5),(115,'Hoorn',5.07,52.65,8.46,3,'S','2022-11-24 17:00:29','2022-11-25 12:41:49',5),(116,'Tilburg',5.08,51.55,8.91,4,'S','2022-11-24 17:00:29','2022-11-25 12:41:49',5),(117,'Amsterdam',4.90,52.37,9.05,4,'SSE','2022-11-24 17:00:29','2022-11-25 12:41:49',5),(118,'Den Bosch',5.30,51.68,8.78,2,'SSE','2022-11-24 17:00:39','2022-11-25 12:41:49',5),(119,'New York',-74.01,40.71,11.38,2,'S','2022-11-24 17:00:39','2022-11-24 17:00:39',1),(120,'Paramaribo',55.20,5.82,26.52,2,'NNE','2022-11-24 17:00:51','2022-11-24 17:00:51',1),(121,'Ulaanbaatar',106.92,47.92,-19.01,2,'NW','2022-11-24 17:00:54','2022-11-25 12:41:49',4),(122,'Nijmegen',5.86,51.85,8.06,4,'S','2022-11-24 17:15:03','2022-11-25 12:41:49',5),(123,'Hoorn',5.07,52.65,8.38,3,'S','2022-11-24 17:15:06','2022-11-25 12:41:49',5),(124,'Tilburg',5.08,51.55,8.80,3,'S','2022-11-24 17:15:14','2022-11-25 12:41:49',5),(125,'Amsterdam',4.90,52.37,8.95,4,'SSE','2022-11-24 17:15:14','2022-11-25 12:41:49',5),(126,'Den Bosch',5.30,51.68,8.65,1,'SW','2022-11-24 17:15:18','2022-11-25 12:41:49',5),(127,'New York',-74.01,40.71,11.51,3,'SSW','2022-11-24 17:15:19','2022-11-24 17:15:19',1),(128,'Paramaribo',55.20,5.82,26.52,2,'NNE','2022-11-24 17:15:22','2022-11-24 17:15:22',1),(129,'Ulaanbaatar',106.92,47.92,-16.05,2,'N','2022-11-24 17:15:30','2022-11-25 12:41:49',4),(130,'Nijmegen',5.86,51.85,7.96,4,'S','2022-11-24 18:00:02','2022-11-25 12:41:49',5),(131,'Hoorn',5.07,52.65,8.41,3,'S','2022-11-24 18:00:33','2022-11-25 12:41:49',5),(132,'Tilburg',5.08,51.55,8.46,4,'SSE','2022-11-24 18:00:33','2022-11-25 12:41:49',5),(133,'Amsterdam',4.90,52.37,8.81,4,'SSE','2022-11-24 18:00:33','2022-11-25 12:41:49',5),(134,'Den Bosch',5.30,51.68,8.47,1,'SSW','2022-11-24 18:00:33','2022-11-25 12:41:49',5),(135,'New York',-74.01,40.71,11.68,3,'SSW','2022-11-24 18:00:34','2022-11-24 18:00:34',1),(136,'Paramaribo',55.20,5.82,26.39,2,'N','2022-11-24 18:00:34','2022-11-24 18:00:34',1),(137,'Ulaanbaatar',106.92,47.92,-17.05,3,'NNW','2022-11-24 18:00:42','2022-11-25 12:41:49',4),(138,'Nijmegen',5.86,51.85,7.62,4,'S','2022-11-24 19:00:05','2022-11-25 12:41:49',5),(139,'Hoorn',5.07,52.65,8.43,3,'S','2022-11-24 19:00:09','2022-11-25 12:41:49',5),(140,'Tilburg',5.08,51.55,8.13,4,'S','2022-11-24 19:00:30','2022-11-25 12:41:49',5),(141,'Amsterdam',4.90,52.37,8.74,4,'SSE','2022-11-24 19:00:30','2022-11-25 12:41:49',5),(142,'Den Bosch',5.30,51.68,8.04,2,'S','2022-11-24 19:00:41','2022-11-25 12:41:49',5),(143,'New York',-74.01,40.71,11.80,3,'S','2022-11-24 19:00:41','2022-11-24 19:00:41',1),(144,'Paramaribo',55.20,5.82,26.31,2,'N','2022-11-24 19:00:52','2022-11-24 19:00:52',1),(145,'Ulaanbaatar',106.92,47.92,-20.05,3,'NNW','2022-11-24 19:00:55','2022-11-25 12:41:49',4),(146,'Nijmegen',5.86,51.85,7.31,4,'S','2022-11-24 20:00:02','2022-11-25 12:41:49',5),(147,'Hoorn',5.07,52.65,8.55,4,'S','2022-11-24 20:00:03','2022-11-25 12:41:49',5),(148,'Tilburg',5.08,51.55,8.48,4,'S','2022-11-24 20:00:03','2022-11-25 12:41:49',5),(149,'Amsterdam',4.90,52.37,8.63,4,'SSE','2022-11-24 20:00:04','2022-11-25 12:41:49',5),(150,'Den Bosch',5.30,51.68,8.23,2,'SSE','2022-11-24 20:00:06','2022-11-25 12:41:49',5),(151,'New York',-74.01,40.71,10.89,3,'S','2022-11-24 20:00:31','2022-11-24 20:00:31',1),(152,'Paramaribo',55.20,5.82,26.24,2,'N','2022-11-24 20:00:39','2022-11-24 20:00:39',1),(153,'Ulaanbaatar',106.92,47.92,-20.59,2,'NW','2022-11-24 20:00:40','2022-11-25 12:41:49',4),(154,'Nijmegen',5.86,51.85,7.65,4,'S','2022-11-24 21:00:05','2022-11-25 12:41:49',5),(155,'Hoorn',5.07,52.65,8.48,3,'S','2022-11-24 21:00:09','2022-11-25 12:41:49',5),(156,'Tilburg',5.08,51.55,8.80,4,'S','2022-11-24 21:00:09','2022-11-25 12:41:49',5),(157,'Amsterdam',4.90,52.37,8.90,5,'S','2022-11-24 21:00:15','2022-11-25 12:41:49',5),(158,'Den Bosch',5.30,51.68,8.36,2,'SW','2022-11-24 21:00:35','2022-11-25 12:41:49',5),(159,'New York',-74.01,40.71,9.50,3,'SSE','2022-11-24 21:00:35','2022-11-25 12:41:49',5),(160,'Paramaribo',55.20,5.82,26.17,2,'NNE','2022-11-24 21:00:36','2022-11-24 21:00:36',1),(161,'Ulaanbaatar',106.92,47.92,-22.05,2,'WNW','2022-11-24 21:00:39','2022-11-25 12:41:49',4),(162,'Nijmegen',5.86,51.85,7.65,4,'S','2022-11-24 22:00:05','2022-11-25 12:41:49',5),(163,'Hoorn',5.07,52.65,8.56,3,'SSW','2022-11-24 22:00:10','2022-11-25 12:41:49',5),(164,'Tilburg',5.08,51.55,9.19,4,'S','2022-11-24 22:00:29','2022-11-25 12:41:49',5),(165,'Amsterdam',4.90,52.37,8.97,4,'S','2022-11-24 22:00:29','2022-11-25 12:41:49',5),(166,'Den Bosch',5.30,51.68,8.85,2,'SSE','2022-11-24 22:00:40','2022-11-25 12:41:49',5),(167,'New York',-74.01,40.71,8.85,3,'S','2022-11-24 22:00:41','2022-11-25 12:41:49',5),(168,'Paramaribo',55.20,5.82,26.12,2,'N','2022-11-24 22:00:41','2022-11-24 22:00:41',1),(169,'Ulaanbaatar',106.92,47.92,-22.05,2,'NW','2022-11-24 22:00:41','2022-11-25 12:41:49',4),(170,'Nijmegen',5.86,51.85,7.99,4,'SSW','2022-11-24 23:00:05','2022-11-25 12:41:49',5),(171,'Hoorn',5.07,52.65,8.71,3,'S','2022-11-24 23:00:24','2022-11-25 12:41:49',5),(172,'Tilburg',5.08,51.55,9.10,3,'S','2022-11-24 23:00:35','2022-11-25 12:41:49',5),(173,'Amsterdam',4.90,52.37,8.80,4,'S','2022-11-24 23:00:35','2022-11-25 12:41:49',5),(174,'Den Bosch',5.30,51.68,8.92,1,'ESE','2022-11-24 23:00:38','2022-11-25 12:41:49',5),(175,'New York',-74.01,40.71,8.54,3,'S','2022-11-24 23:00:38','2022-11-25 12:41:49',5),(176,'Paramaribo',55.20,5.82,26.09,2,'N','2022-11-24 23:00:39','2022-11-24 23:00:39',1),(177,'Ulaanbaatar',106.92,47.92,-22.02,2,'NW','2022-11-24 23:00:39','2022-11-25 12:41:49',4),(178,'Nijmegen',5.86,51.85,7.43,3,'SSW','2022-11-25 07:00:01','2022-11-25 12:41:49',5),(179,'Hoorn',5.07,52.65,7.37,3,'SSW','2022-11-25 07:00:01','2022-11-25 12:41:49',5),(180,'Tilburg',5.08,51.55,7.20,2,'SSW','2022-11-25 07:00:12','2022-11-25 12:41:49',5),(181,'Amsterdam',4.90,52.37,7.40,3,'S','2022-11-25 07:00:13','2022-11-25 12:41:49',5),(182,'Den Bosch',5.30,51.68,7.39,3,'SW','2022-11-25 07:00:23','2022-11-25 12:41:49',5),(183,'New York',-74.01,40.71,7.51,3,'N','2022-11-25 07:00:43','2022-11-25 12:41:49',5),(184,'Paramaribo',55.20,5.82,26.71,3,'NNE','2022-11-25 07:00:54','2022-11-25 07:00:54',1),(185,'Ulaanbaatar',106.92,47.92,-17.05,2,'N','2022-11-25 07:00:55','2022-11-25 12:41:49',4),(186,'Tilburg',5.08,51.55,7.71,3,'SSW','2022-11-25 07:55:48','2022-11-25 12:41:49',5),(187,'Tilburg',5.08,51.55,7.71,3,'SSW','2022-11-25 07:56:42','2022-11-25 12:41:49',5),(188,'Nijmegen',5.86,51.85,7.89,3,'SW','2022-11-25 08:00:03','2022-11-25 12:41:49',5),(189,'Hoorn',5.07,52.65,8.27,3,'S','2022-11-25 08:00:10','2022-11-25 12:41:49',5),(190,'Tilburg',5.08,51.55,7.70,3,'SSW','2022-11-25 08:00:35','2022-11-25 12:41:49',5),(191,'Amsterdam',4.90,52.37,8.07,4,'SSW','2022-11-25 08:00:35','2022-11-25 12:41:49',5),(192,'Den Bosch',5.30,51.68,7.92,1,'SW','2022-11-25 08:00:39','2022-11-25 12:41:49',5),(193,'New York',-74.01,40.71,7.80,3,'N','2022-11-25 08:01:00','2022-11-25 12:41:49',5),(194,'Paramaribo',55.20,5.82,26.78,3,'NNE','2022-11-25 08:01:00','2022-11-25 08:01:00',1),(195,'Ulaanbaatar',106.92,47.92,-19.02,3,'SSW','2022-11-25 08:01:00','2022-11-25 12:41:49',4),(196,'Nijmegen',5.86,51.85,11.36,3,'WSW','2022-11-25 13:00:03','2022-11-25 13:00:03',2),(197,'Hoorn',5.07,52.65,11.58,2,'WNW','2022-11-25 13:00:07','2022-11-25 13:00:07',2),(198,'Tilburg',5.08,51.55,11.54,2,'WSW','2022-11-25 13:00:24','2022-11-25 13:00:24',2),(199,'Amsterdam',4.90,52.37,11.83,4,'W','2022-11-25 13:00:24','2022-11-25 13:00:24',2),(201,'New York',-74.01,40.71,8.73,4,'N','2022-11-25 13:00:25','2022-11-25 13:00:25',2),(204,'Nijmegen',5.86,51.85,10.75,3,'WSW','2022-11-25 14:00:05','2022-11-25 14:00:05',6),(205,'Hoorn',5.07,52.65,10.86,2,'NW','2022-11-25 14:00:25','2022-11-25 14:00:25',6),(206,'Tilburg',5.08,51.55,11.20,2,'SSW','2022-11-25 14:00:37','2022-11-25 14:00:37',6),(207,'Amsterdam',4.90,52.37,11.00,4,'W','2022-11-25 14:00:37','2022-11-25 14:00:37',6),(208,'Den Bosch',5.30,51.68,11.16,1,'NW','2022-11-25 14:00:40','2022-11-25 14:00:40',6),(209,'New York',-74.01,40.71,9.16,4,'WSW','2022-11-25 14:00:55','2022-11-25 14:00:55',5),(210,'Paramaribo',55.20,5.82,26.74,3,'N','2022-11-25 14:01:04','2022-11-25 14:01:04',8),(211,'Ulaanbaatar',106.92,47.92,-28.05,0,'N','2022-11-25 14:01:04','2022-11-25 14:01:04',3),(212,'Nijmegen',5.86,51.85,10.61,3,'WSW','2022-11-25 14:06:04','2022-11-25 14:06:04',6),(213,'Hoorn',5.07,52.65,10.76,2,'NW','2022-11-25 14:06:05','2022-11-25 14:06:05',6),(214,'Tilburg',5.08,51.55,11.13,2,'WSW','2022-11-25 14:06:06','2022-11-25 14:06:06',6),(215,'Amsterdam',4.90,52.37,11.00,4,'W','2022-11-25 14:06:06','2022-11-25 14:06:06',6),(216,'Den Bosch',5.30,51.68,11.16,1,'NW','2022-11-25 14:06:06','2022-11-25 14:06:06',6),(217,'New York',-74.01,40.71,9.16,4,'WSW','2022-11-25 14:06:06','2022-11-25 14:06:06',5),(218,'Paramaribo',55.20,5.82,26.74,3,'N','2022-11-25 14:06:06','2022-11-25 14:06:06',8),(219,'Ulaanbaatar',106.92,47.92,-28.05,0,'N','2022-11-25 14:06:06','2022-11-25 14:06:06',3),(220,'Nijmegen',5.86,51.85,10.61,3,'WSW','2022-11-25 14:10:20','2022-11-25 14:10:20',6),(221,'Hoorn',5.07,52.65,10.76,2,'NW','2022-11-25 14:10:20','2022-11-25 14:10:20',6),(222,'Tilburg',5.08,51.55,11.11,2,'WSW','2022-11-25 14:10:20','2022-11-25 14:10:20',6),(223,'Amsterdam',4.90,52.37,10.91,3,'W','2022-11-25 14:10:21','2022-11-25 14:10:21',6),(224,'Den Bosch',5.30,51.68,11.12,3,'WSW','2022-11-25 14:10:21','2022-11-25 14:10:21',6),(225,'New York',-74.01,40.71,9.18,4,'WSW','2022-11-25 14:10:21','2022-11-25 14:10:21',5),(226,'Paramaribo',55.20,5.82,26.74,3,'N','2022-11-25 14:10:21','2022-11-25 14:10:21',8),(227,'Ulaanbaatar',106.92,47.92,-28.05,0,'N','2022-11-25 14:10:21','2022-11-25 14:10:21',3),(228,'Amsterdam',4.90,52.37,10.90,3,'W','2022-11-25 14:17:51','2022-11-25 14:17:51',6);
/*!40000 ALTER TABLE `forecasts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2022_11_24_141445_alter_forecast_table',1),(18,'2014_10_12_000000_create_users_table',2),(19,'2014_10_12_100000_create_password_resets_table',2),(20,'2019_08_19_000000_create_failed_jobs_table',2),(21,'2019_12_14_000001_create_personal_access_tokens_table',2),(22,'2022_11_24_130222_create_forecast_table',2),(23,'2022_11_25_090919_create_advice_table',3),(24,'2022_11_25_121310_alter_forecast_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2022-11-25 16:51:27
