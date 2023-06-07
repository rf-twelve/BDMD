/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_bgmd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_bgmd` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_bgmd`;

/*Table structure for table `charge_slip_items` */

DROP TABLE IF EXISTS `charge_slip_items`;

CREATE TABLE `charge_slip_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `charge_slip_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `charge_slip_items_charge_slip_id_index` (`charge_slip_id`),
  CONSTRAINT `charge_slip_items_charge_slip_id_foreign` FOREIGN KEY (`charge_slip_id`) REFERENCES `charge_slips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `charge_slip_items` */

insert  into `charge_slip_items`(`id`,`item_no`,`qty`,`unit`,`particular`,`unit_price`,`total_price`,`image`,`created_at`,`updated_at`,`charge_slip_id`) values 
(1,NULL,'365','Vel ut eum nihil lor','Ex unde aperiam in u','153','55845','Y8unB4QxRxBnmTK3QZ1FOL18gU7IpQQ2GQEMPVn4.jpg','2023-04-10 13:59:07','2023-04-10 13:59:07',1),
(10,NULL,'2','Building','Rerum quasi mollitia','2000','4000','g51kpJOEOG0eULO7zK2Xlf5Y3KFOUwn70zFpO4Ww.jpg','2023-04-11 04:10:28','2023-04-11 04:10:28',2),
(14,NULL,'264','Dolore illum sint d','Ut voluptatum nulla ','180','556',NULL,'2023-06-06 11:33:36','2023-06-06 11:33:36',1);

/*Table structure for table `charge_slips` */

DROP TABLE IF EXISTS `charge_slips`;

CREATE TABLE `charge_slips` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoder_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_id` bigint(20) unsigned NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `charge_slips_vehicle_id_index` (`vehicle_id`),
  CONSTRAINT `charge_slips_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `charge_slips` */

insert  into `charge_slips`(`id`,`tn`,`date`,`to`,`from`,`for`,`prepared_by`,`noted_by`,`encoder_id`,`created_at`,`updated_at`,`vehicle_id`,`grand_total`) values 
(1,'2023-0411-040409-1154','2023-04-11','OE PERUCHO ENTERPRISE','LGU KALIBO/MEEDO/BGMD','1','LEVI OQUENDO','ADORADA T. REYNALDO','1','2023-04-10 13:59:07','2023-04-11 03:58:11',1,'0.00'),
(2,'2023-0411-040409-1153','2016-04-19','Xsdsdf','Omnis ex quae ut odi','wtertert','Dicta amet incididu','Iusto omnis qui fugi','1','2023-04-11 04:10:28','2023-06-04 19:56:14',3,'4000'),
(3,'334','30-Mar-1980','Consequatur Quo mag','Est qui voluptatum m','Sed harum minim volu','Enim enim ea facere ','Esse hic adipisicing','1','2023-06-04 19:51:21','2023-06-04 19:51:21',8,NULL);

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

insert  into `companies`(`id`,`name`,`system`,`logo`,`bg_image`,`address`,`developer`,`version`,`created_at`,`updated_at`) values 
(1,'LGU KALIBO','BGMD Monitoring System','','','Province of Aklan','Rosel Francisco','BGMD-IS v1.0','2023-04-03 23:08:17','2023-04-03 23:46:48');

/*Table structure for table `equipment` */

DROP TABLE IF EXISTS `equipment`;

CREATE TABLE `equipment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acquisition_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acquisition_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `located` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoder_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `equipment` */

insert  into `equipment`(`id`,`name`,`description`,`brand`,`serial_no`,`acquisition_date`,`acquisition_cost`,`warranty_expiration`,`located`,`remarks`,`encoder_id`,`created_at`,`updated_at`) values 
(2,'Emmanuel Humphrey','Aliquid est accusamu','Assumenda qui incidi','Culpa nisi sed totam','2006-02-23','Omnis eiusmod offici','2003-10-22','Tempora consectetur','Labore minus cupidit','1','2023-05-31 22:43:04','2023-05-31 22:43:04'),
(3,'Wade Meadows','Praesentium et ut ut','Aperiam ea quam in f','Sed in eligendi solu','1999-04-19','Qui amet enim in er','1998-09-24','Sit numquam ullam iu','Est molestiae fugit','1','2023-05-31 22:44:29','2023-05-31 22:44:29');

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

/*Table structure for table `file_images` */

DROP TABLE IF EXISTS `file_images`;

CREATE TABLE `file_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageable_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `file_images` */

insert  into `file_images`(`id`,`name`,`imageable_type`,`imageable_id`,`created_at`,`updated_at`) values 
(2,'7EI5pUgdS1zolWZyPFmI54apCqHVCuGNrCu7URAM.png','machinery','3','2023-05-31 22:44:29','2023-05-31 22:44:29'),
(5,'uBmy2mIZjbqGyXdmiJ1zWGTfLVuF2GYxrplCCdZI.png','machinery','8','2023-06-01 05:22:16','2023-06-01 05:22:16'),
(6,'BX4TbDCw73nouzJKVorZIH3QUZiTSrxxnny9sik8.png','vehicle','3','2023-06-06 02:41:29','2023-06-06 02:41:29'),
(7,'LiufxngzOSV4VMJmw0jrbTy3iIlU0xAHwbgqgOor.png','equipment','3','2023-06-06 02:43:32','2023-06-06 02:43:32');

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

/*Table structure for table `machineries` */

DROP TABLE IF EXISTS `machineries`;

CREATE TABLE `machineries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acquisition_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acquisition_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `located` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoder_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `machineries` */

insert  into `machineries`(`id`,`name`,`description`,`brand`,`serial_no`,`acquisition_date`,`acquisition_cost`,`warranty_expiration`,`located`,`remarks`,`encoder_id`,`created_at`,`updated_at`) values 
(1,'Wayne Tanner','Deserunt commodi qui','Fuga Sapiente eu la','A sit rerum et labo','2009-09-15','Non deleniti elit r','1989-08-22','Animi veritatis des','Perferendis non est','1','2023-05-31 22:45:27','2023-05-31 22:45:27');

/*Table structure for table `maintenance_requests` */

DROP TABLE IF EXISTS `maintenance_requests`;

CREATE TABLE `maintenance_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defects` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requested_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requested_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspected_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspected_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parts_needed` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_completed_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoder_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `maintenance_requests` */

insert  into `maintenance_requests`(`id`,`tn`,`class`,`class_id`,`for`,`priority_type`,`defects`,`requested_by`,`requested_date`,`received_by`,`received_date`,`inspected_by`,`inspected_date`,`comments`,`parts_needed`,`approved_by`,`approved_date`,`work_completed_on`,`status`,`encoder_id`,`created_at`,`updated_at`) values 
(1,'2023-0414-100413-1475','equipment',NULL,'3','urgent','Dicta quia voluptatek','Sunt voluptas totam ','1977-04-07','Nihil voluptas non d','2003-10-13','Nobis fugiat eu mini','2016-01-22','Praesentium et labor','ASDASDASD','Et enim laborum Nul','2023-06-05','2023-06-05','pending','1','2023-04-14 11:52:02','2023-06-05 15:28:21'),
(2,'2023-0416-030415-1371','machinery',NULL,'1','urgent','Damage Piston Ring','Rosel Francisco','2023-04-16','Juan Dela Cruz','2023-04-16','Pedro Dela Cruz','2023-04-16','This is sample comments','ASD','ADSAD','2023-06-05','2023-06-27','pending','1','2023-04-16 15:36:07','2023-06-05 15:29:05'),
(3,'2023-0416-090438-1474',NULL,NULL,NULL,'urgent','This is defect Updated','Edmond Sarabia','2023-04-16','Mark Rebaldo','2023-04-16','Juris B. Sucro','2023-04-16','This is comment updated',NULL,NULL,NULL,NULL,'pending','1','2023-04-16 21:29:59','2023-04-16 21:42:39'),
(4,'2023-0418-090400-1166',NULL,NULL,NULL,'urgent','Defective spack plug and spark wrench, Clogged fuel filter','Micheal Selorio','2023-01-20','Engr Levi Oquendo','2023-01-20','Raul T. Samoy','2023-01-20','Replacement of sparkplug.',NULL,NULL,NULL,NULL,'pending','1','2023-04-18 09:51:34','2023-04-18 09:51:34'),
(5,'2023-0426-030412-1117',NULL,NULL,NULL,'urgent','Damage Spark plug','J. Sampaton','2023-04-26','Michelle Gonzales','2023-04-26','Eng. Levy Oquendo','2023-04-26','N/A',NULL,NULL,NULL,NULL,'pending','1','2023-04-26 15:48:52','2023-04-26 15:48:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_12_09_190100_create_offices_table',1),
(6,'2022_12_16_120755_create_permission_tables',1),
(7,'2023_02_16_113509_create_menu_bars_table',1),
(8,'2023_02_16_113527_create_sub_menu_bars_table',1),
(9,'2023_02_26_203422_create_list_barangays_table',1),
(10,'2023_02_26_203547_create_list_municities_table',1),
(11,'2023_02_26_203602_create_list_provinces_table',1),
(12,'2023_02_26_203617_create_list_regions_table',1),
(13,'2023_03_22_142551_create_companies_table',1),
(14,'2023_04_03_141833_create_vehicles_table',1),
(15,'2023_04_03_141835_create_vehicle_images_table',1),
(16,'2023_04_03_142613_create_maintenance_requests_table',1),
(17,'2023_04_03_142614_create_maintenance_request_images_table',1),
(18,'2023_04_03_143631_create_work_orders_table',1),
(19,'2023_04_03_144952_create_work_descriptions_table',1),
(20,'2023_04_03_162558_create_charge_slips_table',1),
(21,'2023_04_03_163612_create_charge_slip_items_table',1),
(22,'2023_04_03_164156_create_charge_slip_item_images_table',1),
(38,'2023_01_29_090630_create_office_lists_table',2),
(39,'2023_05_28_131040_create_machineries_table',2),
(40,'2023_05_29_052153_create_equipment_table',2),
(41,'2023_05_31_182953_create_file_images_table',3);

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

/*Table structure for table `office_lists` */

DROP TABLE IF EXISTS `office_lists`;

CREATE TABLE `office_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `office_lists` */

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
  `author_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`code`,`name`,`author_id`,`created_at`,`updated_at`) values 
(1,'itss','Information Technology Services Section',NULL,'2023-04-03 22:45:37','2023-04-03 22:45:37'),
(2,'omm','Office of Municipal Mayor',NULL,'2023-04-03 22:45:37','2023-04-03 22:45:37');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

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
  CONSTRAINT `sub_menu_bars_menu_bar_id_foreign` FOREIGN KEY (`menu_bar_id`) REFERENCES `menu_bars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`fullname`,`office_id`,`username`,`email`,`is_active`,`avatar`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator',1,'admin','francisco12rosel@gmail.com',0,NULL,NULL,'$2y$10$r/pV3VcEAQ8/CwL1PRLjye9siw8OFmDWcssUHvHvFdZj0kBTxm2Nu',NULL,'2023-04-03 22:45:37','2023-04-03 22:45:37');

/*Table structure for table `vehicles` */

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acquisition_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acquisition_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `located` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoder_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicles` */

insert  into `vehicles`(`id`,`name`,`description`,`type`,`make`,`brand`,`model`,`plate_no`,`serial_no`,`engine_no`,`acquisition_date`,`acquisition_cost`,`warranty_expiration`,`located`,`remarks`,`encoder_id`,`created_at`,`updated_at`) values 
(1,NULL,NULL,'Sample Make','Sample Make','Totoya','Big Body','PLATE123','S223','E123','2023-04-08','12355',NULL,NULL,'remaks','1','2023-04-08 13:53:40','2023-04-08 13:53:40'),
(3,NULL,NULL,'MAKE3','MAKE3','BRAND3','MODEL3','PL123','SN123','ENG235','2023-04-08','5555.33',NULL,NULL,'REMARKS','1','2023-04-08 19:57:49','2023-04-08 19:57:49'),
(4,NULL,NULL,'Honda','Honda','Et sit deserunt dig','Enim quis quidem fug','Numquam doloremque e','Officia eaque quas q','Nihil nesciunt sed ','1990-02-11','Dolore exercitatione',NULL,NULL,'Alias explicabo Sed','1','2023-04-08 20:40:16','2023-04-16 22:31:19'),
(5,NULL,NULL,'DUMP TRUCK','DUMP TRUCK','ISUZU','2023-2145','SJH345','Serial124','ENG1023','2023-04-01','5000000',NULL,NULL,NULL,'1','2023-04-18 09:47:13','2023-04-18 09:47:13'),
(6,NULL,NULL,'N/A','N/A','HONDA','SUPREMO TMX 150','N/A','KY10073939','N/A','2019-10-04','129650.00',NULL,NULL,'Operational','1','2023-04-26 15:44:42','2023-04-26 15:44:42'),
(7,NULL,NULL,'Ea ut sit natus ad i','Ea ut sit natus ad i','Elit sed deleniti l','Sint eum nemo modi ','Expedita ut ullamco ','Veniam facere quis ','Ad itaque est dolore','2004-07-14','Totam provident ad ',NULL,NULL,'Vel mollit et reicie','1','2023-05-26 10:54:15','2023-05-26 10:54:15'),
(8,'MOTOR CYCLE 001','Mototr','Id sunt vitae duis ','Id sunt vitae duis ','Sit provident dolo','Dolor distinctio Ex','Quasi sit est conseq','A sed quas in tempor','Esse magna voluptat','2013-11-13','Dolor atque cupidita','2023-06-01',NULL,'Ratione explicabo I','1','2023-05-28 13:00:13','2023-06-01 05:22:16');

/*Table structure for table `work_descriptions` */

DROP TABLE IF EXISTS `work_descriptions`;

CREATE TABLE `work_descriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_man_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parts_needed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `work_order_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `work_descriptions_work_order_id_index` (`work_order_id`),
  CONSTRAINT `work_descriptions_work_order_id_foreign` FOREIGN KEY (`work_order_id`) REFERENCES `work_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `work_descriptions` */

insert  into `work_descriptions`(`id`,`description`,`estimated_man_hours`,`parts_needed`,`cost`,`remarks`,`status`,`created_at`,`updated_at`,`work_order_id`) values 
(1,'Distinctio Et nihil','Iure duis et alias d','Mother Board','8052','Maxime ut sequi id i',NULL,'2023-04-15 07:29:29','2023-04-15 07:29:29',3),
(2,'Make Project Proposal for 2024 budget','24 hours','Video Processor','5236','8 hours per day, 5 days in a week',NULL,'2023-04-16 13:37:32','2023-04-16 13:37:32',4),
(3,'Sample Work','10 hrs','Computer','8541','Repair',NULL,'2023-04-16 21:09:36','2023-04-16 21:09:36',4),
(4,'To repair ledwall display','8 hours','Video Processor','2255','This is remarks',NULL,'2023-04-16 21:47:51','2023-04-16 21:47:51',5),
(5,'Replacement of Sparkplug and wrench','48 hours','Sparkf plug and fuel filter',NULL,'N/A',NULL,'2023-04-18 10:01:54','2023-04-18 10:01:54',6),
(6,'REPLACEMENT OF THE FF: \n1. SPARK PLUG\n2. TIRE\n3. ENGINE OIL','5hours','1. SPARK PLUG\n2. TIRE\n3. ENGINE OIL',NULL,'N/A',NULL,'2023-04-26 15:53:12','2023-04-26 15:53:12',7),
(7,'This is a description','1000 hrs',NULL,NULL,'remarks','1','2023-06-06 12:15:12','2023-06-06 12:15:12',5);

/*Table structure for table `work_orders` */

DROP TABLE IF EXISTS `work_orders`;

CREATE TABLE `work_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assigned_worker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_started` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_finished` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervised_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervised_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoder_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `maintenance_request_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `work_orders_maintenance_request_id_index` (`maintenance_request_id`),
  CONSTRAINT `work_orders_maintenance_request_id_foreign` FOREIGN KEY (`maintenance_request_id`) REFERENCES `maintenance_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `work_orders` */

insert  into `work_orders`(`id`,`assigned_worker`,`work_order_no`,`date_started`,`date_finished`,`supervised_by`,`supervised_date`,`approved_by`,`approved_date`,`received_by`,`received_date`,`status`,`encoder_id`,`created_at`,`updated_at`,`maintenance_request_id`) values 
(3,'Maiores nemo ut veli','56','2013-12-17','1985-04-11','Quia ut autem nisi u','1992-09-25','Provident modi even','1990-07-11','Non quia velit saepe','1983-03-28','ok','1','2023-04-15 07:29:29','2023-06-05 15:33:03',1),
(4,'Rosel Francisco, Edmond Sarabia, Mark Rebaldo','2023-0416-010424-1152-1','2023-04-07','2023-04-16','Ara Vargas','2023-04-07','Juris Sucro','2023-04-07','Cyntia Dela Cruz','2023-04-16','23','1','2023-04-16 13:37:32','2023-06-05 15:33:39',2),
(5,'Carl Dela Cruz, Khem Donguines','2023-0416-090451-1963-1','2023-04-16','2023-04-16','Rosel Francisco','2023-04-16','Juris Sucro','2023-04-16','Ian Isturis','2023-04-16',NULL,'1','2023-04-16 21:47:51','2023-04-16 21:47:51',3),
(6,'Calum James Legaspi','2023-0418-090437-1954-1','2023-01-20','2023-01-23','Eng. Levi Oquendo','2023-01-20','Adorada Reynaldo','2023-01-20','Michelle Gonzales','2023-01-23',NULL,'1','2023-04-18 10:01:54','2023-04-18 10:01:54',4),
(7,'J. SAMPATON','2023-0426-030435-1369-1','2023-04-20','2023-04-26','Eng. Levi Oquendo','2023-04-19','Adorada Reynaldo','2023-04-19','Michelle Gonzales','2023-04-18',NULL,'1','2023-04-26 15:53:12','2023-04-26 15:53:12',5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
