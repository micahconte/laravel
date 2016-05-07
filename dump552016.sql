CREATE DATABASE  IF NOT EXISTS `micahcon_blog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `micahcon_blog`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.5.47-log

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (27,2,'Micah','Conte','micahconte@hotmail.com','2392078036','','','','','','2016-05-04 13:58:48','2016-05-04 13:58:48'),(28,2,'Micah','Conte','micah@hotmail.com','2392078036','','','','','','2016-05-04 14:03:55','2016-05-04 14:03:55'),(29,2,'Micah','Conte','conte@hotmail.com','2392078036','','','','','','2016-05-04 14:05:24','2016-05-04 14:05:24'),(30,2,'Micah','Conte','mahahh@hotmail.com','2392078012','title:man','test:skip',':',':',':','2016-05-05 03:09:12','2016-05-05 10:20:46'),(31,2,'jo','roberts','stibynite@hotmail.com','2392071111','','','','','','2016-05-05 05:23:53','2016-05-05 05:23:53'),(33,2,'tim','jones','miccc@hotmail.com','2392072222','sub:stuff','info:data',':',':',':','2016-05-05 08:51:59','2016-05-05 09:51:51'),(34,2,'mic','mac','stibynite@hotmail.co','2392078035','test1:data1','test2:data2','test3:data3','test4:data4','test5:data5','2016-05-05 09:49:37','2016-05-05 09:49:37');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_25_222537_create_cache_table',1),('2016_03_25_223604_create_sessions_table',1),('2016_03_25_232314_create_tasks_table',1),('2016_05_03_191824_CreateContactsTable',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('micahconte@hotmail.com','f5124de1a873c1505a2ffc3d815e529069c6a536644cd55cda820e3f38c52ea2','2016-03-31 06:35:19');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('01df12cdf78101adf4dc03469fad666743a49fac',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRW5wZkZTSHZlNG9mZWp4alB1YXRGcXJFVUowa0ZnRWJCVU83ZEdUYyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NjIxOTtzOjE6ImMiO2k6MTQ1OTg4NjIxOTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459886219),('07e3820375bc7b09d6f535bd878f7f396686be55',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNGZqRUljeDExUHNtdVBVbUkxVm53dVNlZnc4VlVidFJIWXRtekpLRiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvdGFza3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvdGFza3MiO31zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NTIwOTtzOjE6ImMiO2k6MTQ1OTg4NTIwOTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459885209),('16dd550da46adb5b5f90db45fab23fa021ba07b8',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoieHE0MzVHaTVESTltU09jWGlaeG15OVNJSDM0TUFvaUhIVlBNS1dRdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg0MzUxO3M6MToiYyI7aToxNDU5ODg0MzUxO3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459884352),('17a98c7208c439274fbb957a859aaa36d393ec16',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUWNlNVJvWlBXa1BFc2JnTFhJc3V0VUlrYk9ZR2MxVzhyWTRzS3FmbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvdGFza3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvdGFza3MiO31zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NjQ2MjtzOjE6ImMiO2k6MTQ1OTg4NjQ2MjtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459886462),('1d1fde083625753b7009d1ab605ca827aca4f032',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidTlPWTZkYnFHajh4VUI0VzdtMlJSZVhZOXd2VndsQ3VUNWdObDJ4ZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg2MDE2O3M6MToiYyI7aToxNDU5ODg2MDE2O3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459886016),('27e9c53ea8ebfb7a1721d549892a9744c45894c2',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYW9rWGFsRGVFMmpDV0RnaWc0QXVLbEdhdVhoOTExWG1qYko4dFlmdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg1MDAzO3M6MToiYyI7aToxNDU5ODg1MDAzO3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459885003),('29ef0d10f847256b448b55d8a42ca4e92ff3efc7',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSGoyR29peGYwM0dvQVVlSFRNUkZLR3lTMUptZ1BQQVhJVWFDNEVpNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibG9nLmxvY2FsL2hvbWUiO31zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDQyNTtzOjE6ImMiO2k6MTQ1OTg4NDQyNTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884425),('303015c7f9b4929b5f85b3d342acee9577e322b1',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUWpBYnFtZlVraHRtRHVGZERYUXlrY01LOExza1dzb0tDY3BrWVFkUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg0MzU3O3M6MToiYyI7aToxNDU5ODg0MzU3O3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459884357),('30c5e70fbf4af9ebbae4cf38874bbf36d313b964',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU3NWRkZ4M21ER1FzbEZDVjhhTGJYWEdJNmlFaUpGcG96UXdNV3Z6MCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODgyNjQwO3M6MToiYyI7aToxNDU5ODgyNjQwO3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459882640),('378aa327af86b10cc1526b02dd14ca2f63cc4458',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSmY4TGw5WjFzd1ZtNDZoZFZmWU8xc2NmUm5XSVJmaHBTUGd1RURJZyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg2NDczO3M6MToiYyI7aToxNDU5ODg2NDczO3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459886473),('3a0fcba47b59f77249aa8d288993986f6066b83d',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSmJ0ODV2d1NmaEVnbVFlVVpZYVNSS3pZWUR1dFFMaVc4QWk5ZzVqZiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NjIxNTtzOjE6ImMiO2k6MTQ1OTg4NjIxNTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459886215),('3ddd3190c560ab0d06fa21447f5001a078baa531',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYjBlaFYzVHhtRWttUVFUWDI5M1JVeGpwbUZISTBFUXpYMUtLZHN4ZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg2MjE4O3M6MToiYyI7aToxNDU5ODg2MjE4O3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459886218),('40f284368191bfc5ba09be4b8e2983a1fa889bc0',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU25KTmJYbnlDanBhTTNsMXN3SHJKaHFHdG9oYTZwbGRrQUNsbXVwcyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4MjYyMjtzOjE6ImMiO2k6MTQ1OTg4MjYyMjtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459882622),('519d808cac087d319fc3d956c8f557ee1f193596',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM1VSWkhqOVI0YUdUYW53eHNHOUJON0hYYzdvcmN1VWJUUm9XaEJWbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvbG9naW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvbG9naW4iO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg0OTk0O3M6MToiYyI7aToxNDU5ODg0OTgyO3M6MToibCI7czoxOiIwIjt9fQ==',1459884994),('5839463e36c8d6ce9664fdd53a05c867d9cac732',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSGZjUWRuQ1o3S2RlcnprdUxxVXFLY1dDN2ZqaWVmS09SZXZtd1o3cyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg1MDA4O3M6MToiYyI7aToxNDU5ODg1MDA4O3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459885008),('5e4cc2f8b3708799a337081f7d563233fcd87ecc',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWmNjRzN0aVd1NmtDTXBOTDdiTThreWVkOEczazdhM2ZWUGY1WG1rdiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDI1NztzOjE6ImMiO2k6MTQ1OTg4NDI1NztzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884258),('5fa863c95fec933750d99af7d88125dd88de81dc',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSkNvQktMaXhUVFJtdVBCdGhUUVIxQkVpNWFneEt5ZXlZOHlRSEdPZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvdGFza3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL2Jsb2cubG9jYWwvdGFza3MiO31zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDUyOTtzOjE6ImMiO2k6MTQ1OTg4NDUyOTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884529),('65a6f6f9b9681eb118d5ddb5edf0d368726d2fef',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidkNPRjlrWkdhd3IyYTNLS284YTl3Sm9GcHFmWFg1N3pGY3NKRlVReiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg2MjIyO3M6MToiYyI7aToxNDU5ODg2MjIyO3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459886222),('6680a9d18ca43a4cbbd8005fb24a276cd018376e',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmFXRjRjSEI5cG82d0pwckp5NlhMeGFyNGowNUJkSDI3NWdXREpQcCI7czo1OiJmbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NTE5NDtzOjE6ImMiO2k6MTQ1OTg4NTE5NDtzOjE6ImwiO3M6MToiMCI7fX0=',1459885194),('69160f55f93ea829a2343e88612a71d7cd89cee5',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidzh1VzVrRndhc3I4WFRGc3ZhZkNiVTN5M0tZVDNRZkt5WEhkeHZUTiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NTAwMTtzOjE6ImMiO2k6MTQ1OTg4NTAwMTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459885001),('6aa6ae5520654ef3bfb8808bbd64720135ac4aa3',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaFhnSWxsNndaQlBuRkkyYzI0dlJObVFRNmZtNFR0Q0lLcHJ1OVJ3NSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NjAxMztzOjE6ImMiO2k6MTQ1OTg4NjAxMztzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459886013),('6d1e4f324884c9702967fe5c3d980d2ebdbf7474',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSlMwMGpybVlqSVJqaEFnOU43aXk1dTJ2T0pjRGF4NU1manJ0ZW92aiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDUxODtzOjE6ImMiO2k6MTQ1OTg4NDUxODtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884518),('7c6063eb60f4e7bb42aa3f67f563138308dadd7c',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWm5VcFlHUjE5UzBHUEFKaEowYTJSWE83NTlxdW14RzFpalJhVlZybiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NTAxNDtzOjE6ImMiO2k6MTQ1OTg4NTAxNDtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459885014),('91d4695f69d6c303a3e10597d429633237fe0ec9',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidHFEUkxnVGt2MGd4dHJ2TDNrUmJITDladzY4amdLbENFR080ZEl3WSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDM0ODtzOjE6ImMiO2k6MTQ1OTg4NDM0ODtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884348),('950e22dd3f7373edb1eec88841dd82d07a30e6ad',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiakNoWjRFQnpYSUtTSzNoYWRlTzVHSk5jSFJ1aUxBUXZKU0V4am1mbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg0MjYxO3M6MToiYyI7aToxNDU5ODg0MjYxO3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459884261),('95e04edff810d3e1c3a389b0d941982be4e00182',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidjRReE9CVkR2cTNUdUNPZW9IVlJMZWVSTFhzcDF3SHJuaGMzMU5mUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ibG9nLmxvY2FsL2xvZ2luIjt9czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NTk4ODY0NjQ7czoxOiJjIjtpOjE0NTk4ODY0NjQ7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1459886464),('99ff0b1910340fac8d6008ad60091090e4cd7b42',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT29qMll3QlY1cElkSWxNTWpBT1VpcUdmT2NxdWtWZ0Q0RmZOUjZkTSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NjQ4NjtzOjE6ImMiO2k6MTQ1OTg4NjQ4NjtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459886486),('a44d82e2382c1f0b9fabb616fa2788aa6cdf06a6',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS1c2OERjMEdIcmxvM2tEMndyWWRPeXk2ZG5tU1V3dTZkQ3Q3RjlDSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg2NDg0O3M6MToiYyI7aToxNDU5ODg2NDg0O3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459886484),('abbda1ca2f5477fc9a77dce8b0a2c63b49703c87',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoieW5VRHMwT1JhU3ViYWVYNGgycEJUS2Zqc0ZQbUZ0NEEwWGoycVJnYSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NjQ3NTtzOjE6ImMiO2k6MTQ1OTg4NjQ3NTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459886475),('adeb4f437c81ef92fcdfc84c4713875dd8ebbe3f',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYTV2U3BDbXZ4d0tIZ29Hb0laczVBTVcyM3lrbGVuVmdBY00zc1MySyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibG9nLmxvY2FsL2hvbWUiO31zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDQxMTtzOjE6ImMiO2k6MTQ1OTg4NDQxMTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884411),('b6c30afba7cc0ea544f10437c50b9d81b64bc978',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicGtYajllb2ptcjF0OUh4bm1JOWlUYWpDMk56c0ZVejVoMDU2VmZpWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibG9nLmxvY2FsL2hvbWUiO31zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDUxMztzOjE6ImMiO2k6MTQ1OTg4NDUxMztzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884513),('c8d31addfb8c27669a21240b0c82bdc2d032ca08',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFlmc2FLM09BMHltcGRFM0RldzFyejMxd0lmOEFQRUhNb3p5YTRPUiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDM1MztzOjE6ImMiO2k6MTQ1OTg4NDM1MztzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884354),('c8e2bc66ddfc2aeb6f3cfb639f754f7f9d349e25',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibWJiZ095bUR5OWFhZkNKTUpWUXl3cEE1V0IzNXBlWWdNRzBUdjBsciI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cDovL2Jsb2cubG9jYWwvdGFzayI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg0NTIxO3M6MToiYyI7aToxNDU5ODg0NTIxO3M6MToibCI7czoxOiIwIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1459884521),('d5465cf63c80466e0acef2e16032fd9561ec7592',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoid2NUQjlYZTNTMkczSHRxZXNzY1VLOEJvTXdwRlBZNWI4OEdOODFSVyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NTAwNTtzOjE6ImMiO2k6MTQ1OTg4NTAwNTtzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459885005),('d949141c88f99dd6a951bff25100507aae2ce750',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidjRReE9CVkR2cTNUdUNPZW9IVlJMZWVSTFhzcDF3SHJuaGMzMU5mUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ibG9nLmxvY2FsL2xvZ2luIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDU5ODg2NDY2O3M6MToiYyI7aToxNDU5ODg2NDY2O3M6MToibCI7czoxOiIwIjt9fQ==',1459886466),('e26456192bd4e9202956bb199d524ca0fe75056c',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRzhWMkZPcVVPWUtXNXB4THVEYUdRUkZmNDFuYzhCWVFvWjJ6Z0NnWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibG9nLmxvY2FsL2hvbWUiO31zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1OTg4NDM4NztzOjE6ImMiO2k6MTQ1OTg4NDM4NztzOjE6ImwiO3M6MToiMCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1459884388);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'task',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (2,2,'run','2016-04-06 03:01:51','2016-04-06 03:01:51'),(4,2,'jump','2016-04-06 04:03:07','2016-04-06 04:03:07'),(5,2,'sleep','2016-04-06 04:11:16','2016-04-06 04:11:16'),(7,2,'eat a lot of food','2016-04-06 04:31:13','2016-04-06 04:31:13'),(8,2,'bake a cake today','2016-04-06 04:31:23','2016-04-06 04:31:23'),(9,2,'Micah Conte','2016-04-06 12:56:48','2016-04-06 12:56:48'),(10,2,'fart','2016-05-04 01:47:30','2016-05-04 01:47:30'),(11,2,'Micah','2016-05-04 02:44:28','2016-05-04 02:44:28');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Micah','micahconte@hotmail.com','$2y$10$fzc352uw3LOPQEYTqMVF0OPhc8eaTFubV2ZcRQBSX1/NEf6g.CTTC','pqOO4A1USveoV23VB0MxVFCKkxijhbNUYn6S9YFIrXN9eBpL0ImUUuNdft3s','2016-04-06 01:00:16','2016-05-06 07:12:55');
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

-- Dump completed on 2016-05-05 22:17:45
