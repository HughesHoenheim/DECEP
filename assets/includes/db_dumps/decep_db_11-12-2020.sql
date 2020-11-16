/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.8-MariaDB : Database - donut_eshopdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`donut_eshopdb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `donut_eshopdb`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `admin_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `a_firstname` varchar(255) NOT NULL,
  `a_lastname` varchar(255) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_pass` varchar(100) NOT NULL,
  `admin_img` text DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `UNIQUE` (`a_email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`admin_id`,`a_firstname`,`a_lastname`,`a_email`,`a_pass`,`admin_img`,`status`) values 
(1,'Hiram','Vera','hiram.vera@upr.edu','1234','admin_default_avatar.png','active'),
(2,'Emmanuel','Roman','emmanuel.roman@upr.edu','1234','admin_default_avatar.png','active'),
(3,'Josue','Mejias','josue.mejias@upr.edu','1234','admin_default_avatar.png','active'),
(4,'Nelson','Mercado','nelson.mercado@upr.edu','1234','admin_default_avatar.png','active'),
(5,'Jesus','Vera','jesus.vera@upr.edu','1234','admin_default_avatar.png','inactive');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `order_id` int(3) unsigned NOT NULL,
  `cust_id` int(5) unsigned NOT NULL,
  `prod_id` int(5) unsigned NOT NULL,
  `prod_cost` float(5,2) unsigned NOT NULL,
  `prod_qty` int(2) unsigned NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `cust_id` (`cust_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cart` */

insert  into `cart`(`order_id`,`cust_id`,`prod_id`,`prod_cost`,`prod_qty`) values 
(2,5,1,2.00,5),
(2,5,7,5.00,2),
(3,5,1,2.00,12),
(3,5,7,5.00,6),
(4,6,5,5.00,2),
(4,6,8,7.00,5),
(5,1,11,2.50,3),
(6,1,13,3.00,3),
(6,1,7,5.00,1),
(6,1,6,3.00,2),
(6,1,1,2.00,12),
(7,8,1,2.00,20),
(7,8,13,3.00,15);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` varchar(10) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`cat_id`,`cat_name`,`cat_status`) values 
(1,'Glazed','active'),
(2,'Non-Glazed','active'),
(3,'Cake','active'),
(6,'Iced','inactive');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `cust_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `c_firstname` varchar(255) NOT NULL,
  `c_lastname` varchar(255) DEFAULT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_pass` varchar(100) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `cust_img` text DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `UNIQUE` (`c_email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

insert  into `customer`(`cust_id`,`c_firstname`,`c_lastname`,`c_email`,`c_pass`,`street`,`city`,`state`,`zip_code`,`phone`,`cust_img`,`status`) values 
(1,'Julio','Papa','julio.papa@gmail.com','1234','calle2','dorado','venenzuela','456','787-123-4567','customer_default_avatar.png','active'),
(2,'Alberto','Aguacate','alberto.aguacate@gmail.com','1234',NULL,NULL,NULL,NULL,NULL,'customer_default_avatar.png','active'),
(3,'Julia','Wedge','julia.wedge@gmail.com','1234',NULL,NULL,NULL,NULL,NULL,'customer_default_avatar.png','active'),
(5,'Maria','Pera','maria.pera@gmail.com','1234','calle1','camuy','europa','123','787-965-1234','customer_default_avatar.png','active'),
(6,'Laura','Manzana','laura.manzana@gmail.com','1234','Calle Rosa','Arecibo','Puerto Rico','789','787-123-4567','customer_default_avatar.png','active'),
(7,'Bryan','Celery','bryan.celery@gmail.com','1234','','','','','','customer_default_avatar.png','inactive'),
(8,'Juan','Del Pueblo','juandelpueblo@gmail.com','1234','calle 6','arecibo','australia','00789',NULL,'customer_default_avatar.png','active');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `cust_id` int(5) unsigned NOT NULL,
  `order_date` date NOT NULL,
  `ship_date` date NOT NULL,
  `sale` float(7,2) unsigned NOT NULL,
  `order_status` varchar(10) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `cust_id` (`cust_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`cust_id`,`order_date`,`ship_date`,`sale`,`order_status`) values 
(2,5,'2020-05-15','2020-05-25',20.00,'shipped'),
(3,5,'2020-05-20','2020-05-25',54.00,'pending'),
(4,6,'2020-05-20','2020-05-25',45.00,'delivered'),
(5,1,'2020-05-01','2020-05-25',7.50,'pending'),
(6,1,'2020-05-30','2020-05-25',44.00,'pending'),
(7,8,'2020-05-17','2020-05-27',85.00,'pending');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `prod_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `type_id` int(5) NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_keywords` varchar(255) DEFAULT NULL,
  `price` float(5,2) unsigned NOT NULL,
  `stock` int(5) unsigned NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `cat_id_fk` (`cat_id`),
  KEY `type_id_fk` (`type_id`),
  CONSTRAINT `cat_id_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`prod_id`,`prod_name`,`cat_id`,`type_id`,`prod_img`,`prod_desc`,`prod_keywords`,`price`,`stock`,`status`) values 
(1,'Original Glazed',1,3,'original_glazed.jpg','<p>You can never go wrong with our expertly made, original glazed donut. It is masterfully made using our secret dough recipy to provide only the most perfect experience and it\'s topped with our signature original glaze syrup.</p>','original, glazed, simple, glaze',2.00,80,'active'),
(2,'Glazed with Cream Filling',1,2,'glazed_kreme_filling.jpg','<p>This yeast raised shell is glazed and then filled with delicious cream.</p>','glazed, filled, cream',3.00,75,'active'),
(3,'Cinnamon Sugar',2,3,'cinnamon_sugar.jpg','<p>Our classic ring is tossed in cinnamon sugar for a perfectly simple treat.</p>\r\n<p> </p>','sugar, cinnamon, non-glazed, simple',2.50,50,'active'),
(4,'Chocolate Iced Glazed Whith Sprinkles',1,2,'chocolate_ice_glazed.png','<p>Our Original Glazed ring is dipped in chocolate icing and then topped with colorful sprinkles</p>','glazed, sprinkles, chocolate',2.50,999,'active'),
(5,'Cake Batter',3,2,'cake_batter.jpg','<p>We love celebrating birthdays every day with a scrumptious cake batter doughnut. Filled with cake batter KREME, topped with yellow icing and bright confetti sprinkles, this doughnut is perfect for any party.</p>','cake, filled',5.00,25,'active'),
(6,'Apple Fritter',1,3,'apple_fritter.png','<p>Apple Fritters are a classic! Ours is bursting with cinnamon and apple flavor, all covered in glaze.</p>','apple, glazed, cinnamon, filled',3.00,50,'active'),
(7,'Glazed Chocolate Cake',3,4,'glazed_chocolate_cake.png','<p>If you love chocolate cake then you love this doughnut. It is rich, moist and full of chocolate flavor. We then top it off with our signature glaze.</p>','cake, chocolate, glazed',5.00,50,'active'),
(8,'Glazed Chocolate Cake Holes',3,4,'glazed_chocolate_cake_doughnut_holes.png','Glazed Chocolate Cake Doughnut Holes. Perfect for sharing!','cake, chocolate, glazed, holes',7.00,50,'active'),
(9,'Maple Iced Glazed',1,3,'maple_iced_glazed.png','<p>Our classic Original Glazed doughnut dipped in maple flavored icing.</p>','glazed, maple',2.50,15,'active'),
(10,'Strawberry Iced',1,3,'strawberry_iced.png','<p>The strawberry iced doughnut is a delicious treat and so pretty in pink.</p>','strawberry, glazed',2.50,15,'active'),
(11,'Key Lime Glaze',1,3,'key_lime_glazed.png','<p>Our Original Glazed Doughnut, now with a citrusy key lime glazed.</p>','Lime, glazed',2.50,15,'active'),
(12,'Powdered Strawberry Filled',2,2,'powdered_strawberry_filled.png','<p>Full of flavor, this doughnut is jam packed with strawberry filing and dusted in powdered sugar.</p>','non_glazed, strawberry',3.00,15,'active'),
(13,'Cinnamon Twist',2,3,'cinnamon_twist.png','<p>A heavenly twist to an old favorite-our yeast-raised doughnut is shaped by hand into a twist, then completely covered in cinnamon sugar!</p>','cinnamon, non_glazed, filled',3.00,0,'active'),
(14,'Powdered Blueberry Filled',2,2,'powdered_blueberry_filled.png','<p>A yeast-raised doughnut shell jam-packed with blueberry filing and coated with a light dusting of powdered sugar.</p>','non_glazed, filled, blueberry',3.00,15,'active');

/*Table structure for table `types` */

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `type_id` int(5) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `type_status` varchar(10) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `types` */

insert  into `types`(`type_id`,`type_name`,`type_status`) values 
(1,'None','active'),
(2,'Filled','active'),
(3,'Non-Filled','active'),
(4,'Chocolate','inactive');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
