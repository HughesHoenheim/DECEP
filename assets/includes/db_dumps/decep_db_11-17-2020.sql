/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB : Database - decep_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `order_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `course_id` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `price` float(7,2) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `cart` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cat_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`cat_name`,`cat_status`,`image`) values 
(1,'Cursos Cortos','active',''),
(2,'Certificaciones Profesionales','active',''),
(3,'Certificaciones Ocupacionales','active',''),
(4,'Educacion continua para educadores','active','');

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `course_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contact_hours` int(3) unsigned NOT NULL,
  `price` float(7,2) NOT NULL,
  `category_id` int(5) NOT NULL,
  `subcategory_id` int(5) DEFAULT NULL,
  `section_id` int(5) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `course` */

insert  into `course`(`course_id`,`course_name`,`image`,`description`,`contact_hours`,`price`,`category_id`,`subcategory_id`,`section_id`,`keywords`,`status`) values 
(1,'COMO CREAR TU PROPIO BLOG',NULL,'Elcurso capacita al participante a utilizar los diferentes tipos de correos electrdnicos, los procesos para\nla creacién de cuentas y registros. Le ensefia como manejar el correo electrénico como remitente,\nescribir mensajes y activar la pagina compose, ut',12,100.00,1,1,0,NULL,'active'),
(2,'INTRODUCCION A LAS COMPUTADORAS',NULL,'El estudiante tendrd la oportunidad de practicar las funciones basicas correspondientes al Sistema\nOperativo Windows, el procesador de palabras Word, realizar presentaciones en PowerPoint y trabajar',30,175.00,1,1,0,NULL,'active'),
(3,'MICROSOFT EXCEL BÁSICO',NULL,'\"Incluye conceptos báslcos de Excel, creaclón de una hoja de tra bajo, selección de celdas. desplazamlento media nte mouse y el teclado. ingreso y formateo de números, copiado de elementos. protecclón de celdas y documentos. Creaclón de tablas, diagramas ',30,175.00,1,1,0,NULL,'active'),
(4,'MICROSOFT EXCEL INTERMEDIO',NULL,'\"Diseñado para que el estudiante obtenga las herramientas necesa rias para tra baja r en la hoja de cálculo en Microsoft Excel, el armado de cuadros. operaciones básicas. trabajo con fórmulas, entendimientos de terminolog[a Excel. entre otras cosas. Conoc',30,175.00,1,1,0,NULL,'active'),
(5,'MICROSOFT OFFICE',NULL,'\"Curso diseñado para que el estudiante se capacite en el uso de tres de Los productos que forman pa rte de Microsoft Office 2013:Word, Excel, PowerPoint.',30,175.00,1,1,0,NULL,'active'),
(6,'ASISTENTE MAESTRO PREESCOLAR',NULL,'El curso proveerá a los participantes actividades que los capacita n pa ra entender el',30,200.00,1,2,0,NULL,'active'),
(7,'GROOMING',NULL,'\"Curso básico, teórlco y demostrativo. Consta de una primera parte teórica. incluye demostración y uso de las herramientas lndlspensa bles. En la segunda pa rte, se realiza prática de los cortes. baño. secado y corte de uñas.',40,300.00,1,2,0,NULL,'active'),
(8,'FOTOFRAFÍA BÁSICA',NULL,'Introduce al participante en los fundamentos básicos de la fotografia digital. Se explica detalladamente las funciones de la cámara y sus modalidades de uso. A través de la experiencia práctica se aprenderá el uso adecuado de la cámara digital y eldesarro',30,180.00,1,2,0,NULL,'active'),
(9,'MAQUILLAJE PROFESIONAL',NULL,'\"En este curso aprenderás a lucir bien para cada ocasión. Aprenderás a maquillar según la forma del rostro y las tendencias. Realizarás maquillajes casuales, de gala, coquetoS, técnicas correctivas y más. Podrás identificar el maquillaje de acuerdo a la o',30,240.00,1,2,0,NULL,'active'),
(10,'CONFECCIÓN DE JABONES',NULL,'El taller capacita al estudiante en la elaboración y técnicas de',6,85.00,1,2,0,NULL,'active'),
(11,'CONFECCIÓN DE PRODUCTOS NATURALES',NULL,'El curso de confección de productos naturales para el cuidado de la piel capacita al estudiante a desarrollar conocimientos en el área de elaboración de cremas faciales,corporales,tónicos entre otros productos.El estudiante adquirirá conocimientos básicos',24,150.00,1,2,0,NULL,'active'),
(12,'LENGUAJE DE SEÑAS BÁSICO',NULL,'Podrá aprender desde el abecedario hasta el deletreo manual. Conocerá las señas formales y diversas técnicas para comunicarse con\r\nla población audio impedida.',32,170.00,1,2,0,NULL,'active'),
(13,'LENGUAJE DE SEÑAS INTERMEDIO',NULL,'Es requisito tener conocimiento en lenguaje de señas básico. Aprenderás a modificar cuentos,artículos de periódicos y dialogo formal. Aprenderás las señas más importantes y utilizadas por esta población.',32,170.00,1,2,0,NULL,'active'),
(14,'DISEÑO PAISAJISTA',NULL,'\"En el curso se les proveerán las herramientas necesarias para desarrollar un diseño ordenado, estético y funcional, mediante el uso de principlos básicos de diseño. Se toma en consideraclón la arquitectura de la estructura fisica y sus alrededores para d',30,160.00,1,3,0,NULL,'active'),
(15,'HUERTO CASERO',NULL,'\"¡Aprende a crear tu propio huerto casero y disfruta de alimentos frescos en tu propio jardín! Incluye el desarrollo del plano, los abonos y sus usos, prácticas de selección y preparación de terrenos, siembra y cultivo, control de plagas y enfermedades, e',30,160.00,1,3,0,NULL,'active'),
(16,'INTRODUCCION A YOGA',NULL,'\"Aprende a complementar una vida sana con la práctica de yoga. Le permite relajarse, mejorar su salud y las tareas cotidianas, además mejorar su memoria , le da paz y felicidad. Es un elemento de autoayuda.',12,120.00,1,4,0,NULL,'active'),
(17,'SEMINARIO DE LEY HIPAA',NULL,'\"Provee las herramientas necesarias para interpretar eficazmente la ley \"Health lnsurance Portability and Accountability Act\". Al finalizar el participante estará capacitado para tener buen dominio en la interpretación de la ley.',5,60.00,1,4,0,NULL,'active'),
(18,'FLORISTERÍA',NULL,'El curso capacita al participante en el mantenimiento de flores frescas. Explorará su fase artística y creativa diseñando con flores tropicales y exóticas. Trabajará arreglos de gala para bodas, aniversarios, homenajes y otras actividades sociales y event',30,160.00,1,5,0,NULL,'active'),
(19,'CREACION Y ELABORACIÓN DE CANASTAS Y ENVOLTURA',NULL,'El estudlante aprenderá técnicas básicas y avanzadas de envoltura de regalos y elaboración de canastas. Se diseñarán envolturas de distintas épocas y modernas. Se confeccionarán canastas con distintos materlales. Se trabajarán presentaciones de canastas y',6,80.00,1,5,0,NULL,'active'),
(20,'DISEÑO Y DECORACIÓN CON GLOBOS',NULL,'\"Sorprende a todos con el cielo lleno de corazones blancos, siluetas de globos, jardines y mesas repletas de globos. Aprende a realizar este arte tan solicitado en las celebraciones y eventos. Conoce las diversas técnicas, materiales e ideas necesarias pa',15,150.00,1,5,0,NULL,'active'),
(21,'DISEÑO Y COORDINACIÓN DE EVENTOS SOCIALES',NULL,'\"A través del curso los participantes recibirán capacitación sobre cómo organizar y diseñar diferentes tipos de actividades sociales y prof esionales (convenciones, bodas, comidas de negocio, quinceñeros, tomas de posesión, reconocimientos, nauguración de',40,250.00,1,5,0,NULL,'active'),
(22,'TÉCNICAS CREATIVAS DE DECORACIÓN DE INTERIORES',NULL,'Este curso lncluye técnicas creativas de la decoración y el diseño de interiores. Aprenderán sobre color, forma, lineas, texturas para aplicarlo en la decoración de su hogar. Incluye elementos complementarlos de la decoración de qué es: contraste, balance',30,160.00,1,5,0,NULL,'active'),
(23,'INGLÉS CONVERSACIONAL BÁSICO ',NULL,'Se capacitará al estudiante en el desarrollo de destrezas de pronunciación, dicción, sintaxls y otros aspectos en el idioma iglés.',30,160.00,1,6,0,NULL,'active'),
(24,'INGLÉS CONVERSACIONAL INTERMEDIO',NULL,'Se le ofrecerá al estudiante la oportunidad de mejorar su fluidez en el lenguaje, de tal forma que aumente',30,160.00,1,6,0,NULL,'active'),
(25,'INGLÉS CONVERSACIONAL AVANZADO',NULL,'¿Tienes conocimiento de inglés, pero necesitas adquirir mayor dominio profesional para satisfacer las demandas de su trabajo? En este curso se enfatiza el enriquecimiento de vocabulario y conversación sostenida . El participante debe tener dominio básico ',30,160.00,1,6,0,NULL,'active'),
(26,'FRANCÉS',NULL,'Orientado para personas sin conocimiento del idioma francés. Está diseñado para adquirir destrezas básicas mediante la enseñanza de vocabulario, gramática, conversación, pronunciación y ejercicios de práctica.',30,170.00,1,6,0,NULL,'active'),
(27,'ITALIANO',NULL,'\"Se capacitará al estudiante a desarrollar destrezas de pronunciación, dicción, sintaxis, y otros aspectos en el idioma Itallano.',30,170.00,1,6,0,NULL,'active'),
(28,'PORTUGUÉS',NULL,'\"Se capacitará al estudiante a desarrollar destrezas de pronunciación, dicción. sintaxis, y otros aspectos en el idioma portugués.',30,170.00,1,6,0,NULL,'active'),
(29,'MANDARÍN',NULL,'\"Se capacitará al estudiante a desarrollar destrezas d e pronunciación, dicción, sintaxis, y otros aspectos en el idioma mandarín.',30,170.00,1,6,0,NULL,'active'),
(30,'INGLÉS CONVERSACIONAL',NULL,'\"Comprensión,pronunciación, conversación en inglés.\"roll play\" en una forma dinámica y divertida.',30,160.00,1,7,0,NULL,'active'),
(31,'TENIS',NULL,'\"Aprenderá técnicas de agarre de la raqueta, la posición correcta del cuerpo, movimlento de pies, el tiro de frente, el tiro revés, el boleo y el servicio.',24,150.00,1,7,0,NULL,'active'),
(32,'DIBUJO Y PINTURA',NULL,'Te prepara para desarrollar toda tu creatividad, para explorar tu propio estilo de dibujo y pintura. Conocerás diferentes técnicas y estilos en el dibujo y la pintura.',24,150.00,1,7,0,NULL,'active'),
(33,'MANEJO DE TECLADO',NULL,'El curso está diseñado para el partlcipante que no tiene experiencia con el teclado mecanográfico y planea utilizar las destrezas en su vida personal y profesional. Desarrolla técnicas correctas en el uso del teclado alfabético, numérico, los símbolos en ',20,140.00,1,7,0,NULL,'active'),
(34,'USO DE LA COMPUTADORA Y EL INTERNET',NULL,'Incluye conceptos básicos en el uso y manejo de la computadora, los diferentes motores de búsqueda en internet, creación y manejo de una cuenta de correo electrónico y conceptos básicos de un procesador de palabras.',24,140.00,1,8,0,NULL,'active'),
(35,'BIOTECNOLOGÍA',NULL,'\"Esta certificación está compuesta por una secuencia de módulos de capacitación donde se provee un trasfondo histórico del desarrollo de la biotecnología y sus aplicaciones.Expone al participante a la terminología y metodología relacionada con los proceso',84,990.00,1,9,0,NULL,'active'),
(36,'MICRIBIOLOGÍA INDUSTRIAL',NULL,'Los participantes fortalecerán los conocimientos en aspectos de microbiología que impactan de forma directa e indirecta la calidad en la elaboración de los productos. Dirigida a reforzar las destrezas y el conocimiento en las operaciones, metodología y te',130,1.00,1,9,0,NULL,'active'),
(37,'PROCESSOS FARMACÉUTICOS',NULL,'\"El participante conocerá cualitativa y cuantitativamente los procesos y operaciones unitarias de mayor utilización en la planta, de manera que esta información contribuya a la comprensión critica y al mejoramiento profesional de acuerdo con los diferente',60,950.00,1,9,0,NULL,'active'),
(38,'CERTIFICACIÓN CDA',NULL,'Esta certificación provee adiestramiento para obtener la credencial COA (Child Development Assoclate) otorgada por el Council for Professional Recognition para profesionales de la educación\r\nque tra bajan con la niñez desde el nacimiento hasta los 5 años ',120,950.00,2,NULL,0,NULL,'active'),
(39,'EMPRESARISMO',NULL,'En este curso aprenderás los elementos esenciales para iniciar un negocio propio y asuntos relacionados con la compra o adquisición del mismo. Tendrá la oportunidad de elaborar un plan de negocio y cómo utilizarlo favorablemente. Se le brindarán las herra',100,795.00,2,NULL,0,NULL,'active'),
(40,'FACTURACIÓN Y COBROS A PLANES MÉDICOS',NULL,'Esa certificación esta dirigida aldesarrollo de las destrezas necesarias para la ejecución efectiva del proceso de facturación a planes médicos. Capacitará al participante a realizar una facturación que cumpla con la Ley HIPAA y las leyes locales, además ',110,795.00,2,NULL,0,NULL,'active'),
(41,'GERENCIA Y SUPERVISIÓN',NULL,'Este certificado tiene como meta desarrollar en los participantes los conocimiento y habilidades que le permitan maximizar sus gestiones como supervisor. Se prepara para que pueda ofrecer soluciones a los problemas de la empresa, constituyendo así un capi',80,800.00,2,NULL,0,NULL,'active'),
(42,'REGISTRADURÍA',NULL,'Dirigida a profesionales que se desempeñan en funciones como registrador,oficiales de registraduría o aspirantes a una de estas posiciones. Aprenderá las funciones y deberes de un registrador, reglamentación, políticas y normas de la institución. A través',30,550.00,2,NULL,0,NULL,'active'),
(43,'PANADERÍA Y REPOSTEÍA COMERCIAL',NULL,'Los participantes estudiarán los procesos de confección de dulces, postres y variedades de pan para uso doméstico o comercial. Estudiarán los métodos de confección a nivel comercial y el equipo que se utiliza. Realizarán diferentes confecciones para desar',200,675.00,3,NULL,0,NULL,'active'),
(44,'REPADOR Y MANTENEDOR DE DIFICIOS',NULL,'\"En el curso de Reparador y Mantenedor de Edificios se estudiarán las áreas de albañileria, carpintería, electricidad, plomería , terminaciones, entre otros. Aprenderán a reparar y realizar mantenimiento a las estructuras físicas de edificios comerciales,',300,1.00,3,NULL,0,NULL,'active'),
(45,'MODISTA: CORTE Y CONFECCIÓN DE MODAS',NULL,'\"Prepara al estudiante para desempeñarse como modista en el corte y la confección de ropa. Se estudiará la confección de diferentes piezas de ropa de vestirtales como: blusas, faldas, trajes, ropa de dormir, pantalones, entre otros. Se utilizará el uso de',200,650.00,3,NULL,0,NULL,'active'),
(46,'CONSTRUCCIÓN DE GABINETES',NULL,'\"En el curso de construcción de gabinetes se realizan diferentes proyectos utilizando distintas maderas, laminados, piezas con diseño, metales y otros. Realizará diferentes cortes, ensamblado de piezas, terminaciones, entre otros. Desarrollarán un proyect',250,1.00,3,NULL,0,NULL,'active'),
(47,'MECÁNICA DE REPARACIÓN Y MANTENIMIENTO DE MOTORES PEQUEÑOS.',NULL,'\"Los participantes se capacitarán con las destrezas y conocimientos en la reparación y mantenimiento de motores pequeños. Estudiarán la combustión interna de motores de 2 y 4 ciclos o tiempos. sistemas electrónicos, lubrirnción y enfriamiento, entre otros',250,1.00,3,NULL,0,NULL,'active'),
(48,'DISEÑO DE LECCIONES ELECTRÓNICAS',NULL,'Aprenderá a través de un programado a desarrollar lecciones para fortalecer las destrezas de los estudiantes en las diferentes materias. Facilita que el estudiante pueda trabajar un módulo o lección y los ejercicios preparados por el maestro. Permite un e',24,150.00,4,NULL,0,NULL,'active'),
(49,'TÉCNICAS Y ESTILOS EN LA CONTRUCCIÓN DE PRUEBAS',NULL,'\"Aprenderás las técnicas y estilos de redacción de pruebas que existen para medir el aprovechamiento, la forma correcta para la construcción de cada estilo e ldentificar el modelo correcto para medir la destreza o competencia.',24,150.00,4,NULL,0,NULL,'active'),
(50,'CONTRUCCIÓN DE RÚBRICAS',NULL,'Aprenderás el conjunto de criterios y estándares generalmente relacionados con objetivos de aprendizaje que se utilizan para evaluar el nivel de desempeño en una tarea. En el diseño de la rúbrica se trabajan los criterios que se evaluarán en el trabajo y ',12,75.00,4,NULL,0,NULL,'active'),
(51,'INTEGRACIÓN DE LAS BELLAS ARTES A LA ENSEÑANZA ',NULL,'\"El maestro aprenderá la técnica apropiada para integrar las bellas artes a la enseñanza de las materias.A través de las bellas artes el estudlante desarrolla la sensibilidad, el pensamiento critico valorar y apreciar  la cultura además exprear emocioes,s',12,75.00,4,NULL,0,NULL,'active'),
(52,'CONSTRUCCIÓN DE PORTAFOLIO ELECTRÓNICO',NULL,'\"Aprenderá los uso del portafolio electrónico básico, el cual puede aplicarse en cualquier materia. Se incluye una colección digital de artefactos,tales como :perfiles personales, archivos, publicaciones, ideas, reflexiones y logros, entre otros, sobre un',12,75.00,4,NULL,0,NULL,'active'),
(53,'INTEGRACIÓN DE TEMAS TRANSVERSALES EN LA ENSEÑANZA',NULL,'\"El uso de la estrategia de integración de los temas transversales , le permite al maestro integrar diferentes temas a la clase sin que esta pierda su contenido. Se pueden integrar clase, valores y étlca, temas de actualidad, entre otros. Es una estrategi',12,75.00,4,NULL,0,NULL,'active');

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

/*Table structure for table `section` */

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `section_id` int(5) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `semester` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `capacity` int(5) NOT NULL,
  `room` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `time_slot_id` int(11) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `section` */

/*Table structure for table `subcategory` */

DROP TABLE IF EXISTS `subcategory`;

CREATE TABLE `subcategory` (
  `subcat_id` int(5) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `subcat_status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`subcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `subcategory` */

insert  into `subcategory`(`subcat_id`,`subcat_name`,`subcat_status`,`image`) values 
(1,'Computadora y sus Aplicaciones','active',''),
(2,'Destrezas técnicas y profesionales','active',''),
(3,'Jardinería','active',''),
(4,'Salud','active',''),
(5,'Decoración/Eventos','active',''),
(6,'Idiomas','active',''),
(7,'Niños','active',''),
(8,'Edad de Oro','active',''),
(9,'Sector empresarial','active','');

/*Table structure for table `takes` */

DROP TABLE IF EXISTS `takes`;

CREATE TABLE `takes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `section_id` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `semester` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `takes` */

/*Table structure for table `teaches` */

DROP TABLE IF EXISTS `teaches`;

CREATE TABLE `teaches` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `section_id` int(5) DEFAULT NULL,
  `semester` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `teaches` */

/*Table structure for table `time_slot` */

DROP TABLE IF EXISTS `time_slot`;

CREATE TABLE `time_slot` (
  `time_slot_id` int(5) NOT NULL AUTO_INCREMENT,
  `day` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`time_slot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `time_slot` */

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
