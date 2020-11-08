/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.8-MariaDB : Database - decep_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`decep_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `decep_db`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `admin_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `admin` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cat_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `category` */

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `course_id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `instructor_id` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `capacity` int(3) NOT NULL,
  `schedule` time DEFAULT NULL,
  `contact_hours` int(3) unsigned NOT NULL,
  `price` float(7,2) NOT NULL,
  `category_id` int(5) NOT NULL,
  `subcategory_id` int(5) DEFAULT NULL,
  `section` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `room` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `course` */

/*Table structure for table `instructor` */

DROP TABLE IF EXISTS `instructor`;

CREATE TABLE `instructor` (
  `inst_id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `inst_img` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inst_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `instructor` */

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `order_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `order_date` date DEFAULT NULL,
  `sale` float(7,2) NOT NULL,
  `order_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `order` */

/*Table structure for table `subcategory` */

DROP TABLE IF EXISTS `subcategory`;

CREATE TABLE `subcategory` (
  `subcat_id` int(5) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `subcat_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`subcat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `subcategory` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_img` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
