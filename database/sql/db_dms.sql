/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_dms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_dms` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_dms`;

/*Table structure for table `action_takens` */

DROP TABLE IF EXISTS `action_takens`;

CREATE TABLE `action_takens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT NULL,
  `office_id` bigint(20) unsigned NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `doc_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `action_takens_doc_id_index` (`doc_id`),
  CONSTRAINT `action_takens_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `docs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `action_takens` */

insert  into `action_takens`(`id`,`date_time`,`office_id`,`action`,`remarks`,`user_id`,`doc_id`,`created_at`,`updated_at`) values 
(1,NULL,2,'Pa cjecl','Sample',1,1,'2022-12-15 14:41:14','2022-12-15 14:41:14'),
(2,NULL,2,'Pa cjecl','Sample',1,1,'2022-12-15 14:42:19','2022-12-15 14:42:19'),
(3,NULL,2,'Pa cjecl','Sample',1,1,'2022-12-15 14:43:07','2022-12-15 14:43:07'),
(4,NULL,2,'Pa cjecl','Sample',1,1,'2022-12-15 14:44:59','2022-12-15 14:44:59');

/*Table structure for table `audit_trails` */

DROP TABLE IF EXISTS `audit_trails`;

CREATE TABLE `audit_trails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL,
  `elapse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_open` tinyint(4) NOT NULL,
  `doc_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_trails_doc_id_index` (`doc_id`),
  CONSTRAINT `audit_trails_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `docs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `audit_trails` */

insert  into `audit_trails`(`id`,`date_time`,`trail`,`office_id`,`user_id`,`start`,`end`,`elapse`,`is_open`,`doc_id`) values 
(1,'2022-12-15 02:44:59','origin',1,1,NULL,NULL,'',1,1),
(2,'2022-12-15 03:09:31','released',1,1,NULL,NULL,'',1,1),
(5,'2022-12-15 04:16:23','transit',1,1,'2022-12-15 03:09:31','2022-12-15 04:16:23','0 day(s) 01 hr(s) 06 min(s) 52 sec(s) ',1,1),
(6,'2022-12-15 04:16:23','received',1,1,NULL,NULL,'',1,1),
(7,'2022-12-15 04:17:06','released',1,1,NULL,NULL,'',1,1),
(8,'2022-12-15 09:34:47','transit',1,1,'2022-12-15 04:17:06','2022-12-15 09:34:47','0 day(s) 05 hr(s) 17 min(s) 41 sec(s) ',1,1),
(9,'2022-12-15 09:34:47','received',1,1,NULL,NULL,'',1,1);

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_ground` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

/*Table structure for table `doc_images` */

DROP TABLE IF EXISTS `doc_images`;

CREATE TABLE `doc_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doc_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doc_images_doc_id_index` (`doc_id`),
  CONSTRAINT `doc_images_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `docs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `doc_images` */

insert  into `doc_images`(`id`,`name`,`created_at`,`updated_at`,`doc_id`) values 
(1,'BB3ldxegCe6XkjYu9TRAuzXGLZIoar74Y9eot5cG.jpg','2023-03-22 15:45:09','2023-03-22 15:45:09',3),
(2,'123ZM3u6vqfVWzDw3E5MXHjZ1Igw4d9LxiyLqNF0.jpg','2023-03-22 15:45:09','2023-03-22 15:45:09',3),
(3,'SJOBZtibZSOqXW4OpSZr8irDut7SrHsWtKSd0i3S.jpg','2023-03-22 15:45:09','2023-03-22 15:45:09',3),
(4,'GtmNhXFVKTU4DqhzlAZu9sKgGUsNR9BAyErQuEWM.png','2023-03-23 09:55:54','2023-03-23 09:55:54',4),
(5,'gjL2w3aEYQ0u3N32N6Xkqll9vBo2fMSBvxmHy8vT.png','2023-03-23 09:55:54','2023-03-23 09:55:54',4);

/*Table structure for table `doc_office` */

DROP TABLE IF EXISTS `doc_office`;

CREATE TABLE `doc_office` (
  `doc_id` bigint(20) unsigned NOT NULL,
  `office_id` bigint(20) unsigned NOT NULL,
  `shared` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `doc_office_doc_id_foreign` (`doc_id`),
  KEY `doc_office_office_id_foreign` (`office_id`),
  CONSTRAINT `doc_office_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `docs` (`id`),
  CONSTRAINT `doc_office_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `doc_office` */

/*Table structure for table `docs` */

DROP TABLE IF EXISTS `docs`;

CREATE TABLE `docs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int(10) DEFAULT NULL,
  `author_office` int(10) unsigned DEFAULT NULL,
  `shared_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `docs` */

insert  into `docs`(`id`,`tn`,`type`,`class`,`date`,`received_by`,`title`,`origin`,`nature`,`for`,`status`,`remarks`,`author_id`,`author_office`,`shared_office`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'2022-1215-021236','public','dv','2022-12-15','Administrator','Sample','(Empty Field)','(Empty Field)','sign','originated','Draft',1,1,'[1,2]',NULL,NULL,'2022-12-15 14:19:10','2022-12-15 14:19:10'),
(2,'2023-0322-010305-1959','draft','cos','2023-03-22','Received 2','Cos',NULL,NULL,'draft',NULL,'Remarks',1,1,NULL,NULL,NULL,'2023-03-22 15:07:00','2023-03-22 15:07:00'),
(3,'2023-0322-030330-1312','draft','cos','2023-03-22','Received 3','Third Titlte',NULL,NULL,'draft',NULL,'This is a remarks',1,1,NULL,NULL,NULL,'2023-03-22 15:45:09','2023-03-22 15:45:09'),
(4,'2023-0323-090313-1362','office','dv','2023-03-23','Receiver 1','Payment For Led',NULL,NULL,'file','origin','This is remarks',1,1,NULL,NULL,NULL,'2023-03-23 09:55:54','2023-03-23 09:55:54'),
(5,'2023-0323-090318-1222','office','cos','2012-10-29','Omnis repellendus V','Expedita soluta alia',NULL,NULL,'endorse','origin','Suscipit dolores nem',1,1,NULL,NULL,NULL,'2023-03-23 11:24:09','2023-03-23 11:24:09'),
(6,'2023-0323-090318-1222','office','roa','1984-01-18','Asperiores occaecat ','Et omnis in eos exe',NULL,NULL,'draft','origin','Iusto eaque sint vit',1,1,NULL,NULL,NULL,'2023-03-23 11:25:33','2023-03-23 11:25:33'),
(7,'2023-0324-030348-1150','office','cos','2023-03-24','Rerum ea tempora et ','Sample',NULL,NULL,'act','origin',NULL,2,2,NULL,NULL,NULL,'2023-03-24 03:26:40','2023-03-24 03:26:40');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `list_barangays` */

DROP TABLE IF EXISTS `list_barangays`;

CREATE TABLE `list_barangays` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municity_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urban_rural` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `population` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_barangays` */

/*Table structure for table `list_forms` */

DROP TABLE IF EXISTS `list_forms`;

CREATE TABLE `list_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `is_active` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `list_forms` */

insert  into `list_forms`(`id`,`name`,`is_active`) values 
(2,'AF # 56','1');

/*Table structure for table `list_funds` */

DROP TABLE IF EXISTS `list_funds`;

CREATE TABLE `list_funds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `list_funds` */

insert  into `list_funds`(`id`,`name`,`is_active`) values 
(2,'GENERAL FUND',1),
(3,'PROPER FUND',1);

/*Table structure for table `list_municities` */

DROP TABLE IF EXISTS `list_municities`;

CREATE TABLE `list_municities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_municities` */

/*Table structure for table `list_provinces` */

DROP TABLE IF EXISTS `list_provinces`;

CREATE TABLE `list_provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_provinces` */

/*Table structure for table `list_regions` */

DROP TABLE IF EXISTS `list_regions`;

CREATE TABLE `list_regions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_regions` */

/*Table structure for table `menu_bars` */

DROP TABLE IF EXISTS `menu_bars`;

CREATE TABLE `menu_bars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inactive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_bars` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_12_09_190090_create_docs_table',1),
(7,'2022_12_09_190122_create_audit_trails_table',1),
(8,'2022_12_15_134530_create_action_takens_table',1),
(9,'2022_12_16_120755_create_permission_tables',2),
(11,'2023_02_16_113509_create_menu_bars_table',4),
(12,'2023_02_16_113527_create_sub_menu_bars_table',4),
(27,'2022_12_15_134532_create_doc_images_table',5),
(28,'2023_02_26_203422_create_list_barangays_table',5),
(29,'2023_02_26_203547_create_list_municities_table',5),
(30,'2023_02_26_203602_create_list_provinces_table',5),
(31,'2023_02_26_203617_create_list_regions_table',5),
(32,'2023_03_22_142551_create_companies_table',5),
(34,'2022_12_09_190100_create_offices_table',6);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

insert  into `model_has_permissions`(`permission_id`,`model_type`,`model_id`) values 
(2,'App\\Models\\User',1),
(3,'App\\Models\\User',1),
(4,'App\\Models\\User',1),
(5,'App\\Models\\User',1),
(8,'App\\Models\\User',1),
(13,'App\\Models\\User',1),
(22,'App\\Models\\User',1),
(26,'App\\Models\\User',1);

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(3,'App\\Models\\User',1),
(4,'App\\Models\\User',1),
(7,'App\\Models\\User',1);

/*Table structure for table `office_user` */

DROP TABLE IF EXISTS `office_user`;

CREATE TABLE `office_user` (
  `office_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `office_user_office_id_foreign` (`office_id`),
  KEY `office_user_user_id_foreign` (`user_id`),
  CONSTRAINT `office_user_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`),
  CONSTRAINT `office_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `office_user` */

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`code`,`name`,`created_at`,`updated_at`) values 
(1,'itss','Information Technology Services Section',NULL,NULL),
(2,'paicd','Public Affairs Information and Communication Division',NULL,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`group`,`created_at`,`updated_at`) values 
(2,'user-create','web','user','2023-02-13 16:58:17','2023-02-13 16:58:17'),
(3,'user-read','web','user','2023-02-13 16:58:17','2023-02-13 16:58:17'),
(4,'user-update','web','user','2023-02-13 16:58:17','2023-02-13 16:58:17'),
(5,'user-delete','web','user','2023-02-13 16:58:17','2023-02-13 16:58:17'),
(6,'document-create','web','document','2023-02-13 20:35:29','2023-02-13 20:35:29'),
(7,'document-read','web','document','2023-02-13 20:35:29','2023-02-13 20:35:29'),
(8,'document-update','web','document','2023-02-13 20:35:29','2023-02-13 20:35:29'),
(9,'document-delete','web','document','2023-02-13 20:35:29','2023-02-13 20:35:29'),
(10,'permission-create','web','Permission','2023-02-15 11:43:26','2023-02-15 11:43:26'),
(11,'permission-read','web','Permission','2023-02-15 11:43:27','2023-02-15 11:43:27'),
(12,'permission-update','web','Permission','2023-02-15 11:43:27','2023-02-15 11:43:27'),
(13,'permission-delete','web','Permission','2023-02-15 11:43:27','2023-02-15 11:43:27'),
(22,'sample-access','web','sample','2023-03-21 10:29:42','2023-03-21 10:29:42'),
(23,'sample-create','web','sample','2023-03-21 10:29:42','2023-03-21 10:29:42'),
(24,'sample-read','web','sample','2023-03-21 10:29:42','2023-03-21 10:29:42'),
(25,'sample-update','web','sample','2023-03-21 10:29:42','2023-03-21 10:29:42'),
(26,'sample-delete','web','sample','2023-03-21 10:29:42','2023-03-21 10:29:42');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Admin','web','2023-02-13 11:57:22','2023-02-13 11:57:22'),
(2,'User','web','2023-02-13 11:58:35','2023-02-13 11:58:35'),
(3,'Guest','web','2023-02-13 12:03:20','2023-02-13 16:24:57'),
(4,'Guest 2','web','2023-02-13 16:24:49','2023-02-13 16:24:49'),
(5,'sample','web','2023-02-15 12:57:42','2023-02-15 12:57:42'),
(6,'New ROle','web','2023-02-15 12:58:50','2023-02-15 12:58:50'),
(7,'Teller123','web','2023-02-15 13:01:50','2023-02-15 13:02:01');

/*Table structure for table `sub_menu_bars` */

DROP TABLE IF EXISTS `sub_menu_bars`;

CREATE TABLE `sub_menu_bars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inactive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_bar_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_menu_bars_menu_bar_id_index` (`menu_bar_id`),
  CONSTRAINT `sub_menu_bars_menu_bar_id_foreign` FOREIGN KEY (`menu_bar_id`) REFERENCES `docs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_menu_bars` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`fullname`,`office_id`,`username`,`email`,`is_active`,`avatar`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator',1,'admin','francisco12rosel@gmail.com',0,NULL,NULL,'$2y$10$8Q3jM6.Ns1uR7NNMenGWR.6QPyfC4TCm0C1/GW1YxWlO8Spk1WTSG',NULL,'2022-12-15 14:18:19','2022-12-15 14:18:19'),
(2,'User',2,'user','sampleuser@gmail.com',0,NULL,NULL,'$2y$10$8Q3jM6.Ns1uR7NNMenGWR.6QPyfC4TCm0C1/GW1YxWlO8Spk1WTSG',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
