/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `category` (
	`cat_id` int (5),
	`cat_name` varchar (765),
	`cat_status` varchar (30)
); 
insert into `category` (`cat_id`, `cat_name`, `cat_status`) values('1','Cursos Cortos','active');
insert into `category` (`cat_id`, `cat_name`, `cat_status`) values('2','Certificaciones Profesionales','active');
insert into `category` (`cat_id`, `cat_name`, `cat_status`) values('3','Educacion Continua','active');
insert into `category` (`cat_id`, `cat_name`, `cat_status`) values('4','Certificaciones Ocupacionales','active');
