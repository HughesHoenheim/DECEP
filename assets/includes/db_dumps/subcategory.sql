/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `subcategory` (
	`subcat_id` int (5),
	`subcat_name` varchar (765),
	`subcat_status` varchar (30)
); 
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('1','Computadora y sus Aplicaciones','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('2','Destrezas técnicas y profesinales','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('3','Jardinería','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('4','Salud','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('5','Decoración/Eventos','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('6','Idiomas','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('7','Niños','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('8','Edad de Oro','active');
insert into `subcategory` (`subcat_id`, `subcat_name`, `subcat_status`) values('9','Sector empresarial','active');
