/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - anthony8_seekproduct
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`anthony8_seekproduct` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `anthony8_seekproduct`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `profile_industries` */

DROP TABLE IF EXISTS `profile_industries`;

CREATE TABLE `profile_industries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profile_industries` */

insert  into `profile_industries`(`id`,`industry_text`) values (1,'Internet Marketing'),(2,'IT Consultant'),(3,'IT Recuriter');

/*Table structure for table `profile_phone_types` */

DROP TABLE IF EXISTS `profile_phone_types`;

CREATE TABLE `profile_phone_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_type_text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profile_phone_types` */

insert  into `profile_phone_types`(`id`,`phone_type_text`) values (1,'MOBILE'),(2,'WORK'),(3,'OFFICE');

/*Table structure for table `profile_roles` */

DROP TABLE IF EXISTS `profile_roles`;

CREATE TABLE `profile_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profile_roles` */

insert  into `profile_roles`(`id`,`role_text`) values (1,'Technical Specialist'),(2,'Technical Support Specialist'),(3,'Technical Support');

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `headline` text COLLATE utf8mb4_unicode_ci,
  `overview` text COLLATE utf8mb4_unicode_ci,
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `start_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` int(11) DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role`),
  KEY `industry` (`industry`),
  KEY `phone_type` (`phone_type`),
  CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`role`) REFERENCES `profile_roles` (`id`),
  CONSTRAINT `profiles_ibfk_2` FOREIGN KEY (`industry`) REFERENCES `profile_industries` (`id`),
  CONSTRAINT `profiles_ibfk_3` FOREIGN KEY (`phone_type`) REFERENCES `profile_phone_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profiles` */

insert  into `profiles`(`id`,`user_id`,`headline`,`overview`,`profile_image`,`cover_image`,`company`,`role`,`start_date`,`end_date`,`industry`,`phone`,`phone_type`,`address`,`created_at`,`updated_at`) values (4,34,'fulll stack web developer','I have worked as a full-stack web developer for 5 yrs and have a enough experience for you. please contact me.','image/profile_image/profile_image_1528382196.jpg','image/cover_image/cover_image_1528378085.jpg','IT tech',2,'01-2017','11-2017',1,'111222333',2,'no 329 California Stat','2018-06-07 06:05:33','2018-06-08 02:46:50');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lasname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `confirmation_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`surname`,`lasname`,`email`,`password`,`remember_token`,`confirmed`,`confirmation_code`,`created_at`,`updated_at`) values (1,'test','project1','Test@gmail.com','$2y$10$1yJeSs6q5omuKu04eNX.8.MWkZpvB.l9VT1BPGVt7ZAyWzaBIL8vK','KQaB8PGhk42VtLfGJAHU8Qv97BovjoeSGN4FA01XagPmqe7pRZQP980WxNWE',1,NULL,'2018-05-20 23:00:48','2018-05-20 23:00:48'),(2,'Testtest','project2','testtest@mail.com','$2y$10$t8JtjM4UddHU945HKg8xe.YsEK9opacIugyTa8mfTo.ZCfyn3JgO.','k2A0SHbdiSWxWVw33W479VaXdLfbMUGyrTGHEN7cQLnZYTAUOsPVB8vPgAqy',1,NULL,'2018-05-20 23:01:49','2018-05-20 23:01:49'),(3,'Anthony Pridham','project3','anthony.pridham@protecfrp.com.au','$2y$10$q9Y3PluENfsexwBHm1q/bO4EQx7CoaHJt17mIQNrFk4yWdS6e7aFG',NULL,1,NULL,'2018-05-21 19:43:59','2018-05-21 19:43:59'),(4,'Anthony Pridham','project4','ap@protecfrp.com.au','$2y$10$eQ3obYT9fG7D34dmIoZQCeDRU6q9L8dts7Hcz4OyfO1NAKEqSmVli','QrfENsKHuk4ZYZulwv9VPIK5SCPRJwxmcaRNMojsfr0OegEGn5fV9nvv8raE',1,NULL,'2018-05-25 06:00:23','2018-05-25 06:00:23'),(34,'mini','yu','develop.minyu@gmail.com','$2y$10$o62/1s0GBI0JV1ACUvxCo.4zEorC1CRW4qY2QmITaDmn9qOMjieoy','FbUJjiBwFrnWkwQXPYw4UbK0JdJkslL9RY7N5mxzihl3Oq3M0ToyIShgYEwd',1,'4181','2018-06-06 07:15:40','2018-06-07 21:08:56');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
