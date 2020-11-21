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
  `description` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
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
(1,'COMO CREAR TU PROPIO BLOG','crearBLOG.png','\"El curso capacita al participante a utilizar los diferentes tipos de correos electrónicos, los procesos para la creación de cuentas y registros. Le enseña como manejar el correo electrónico como remitente, escribir mensajes y activar la página compose, utilizar los botones básicos, leer un mensaje y enviarlo a diferentes destinatarios, además de recuperar mensajes eliminados,entre otros.\"',12,100.00,1,1,0,NULL,'active'),
(2,'INTRODUCCION A LAS COMPUTADORAS','intro_compu.jpg','El estudlante tendrá la oportunidad de practicar las funciones básicas correspondientes al Sistema Operativo Windows, el procesador de palabras Word, realizar presentaciones en PowerPoint y trabajar en lnternet.',30,175.00,1,1,0,NULL,'active'),
(3,'MICROSOFT EXCEL BÁSICO','excel2.png','\"Incluye conceptos básicos de Excel, creación de una hoja de trabajo, selección de celdas, desplazamiento mediante mouse y el teclado, ingreso y formateo de números, copiado de elementos, protección de celdas y documentos. Creación de tablas, diagramas y gráficas, entre otros.',30,175.00,1,1,0,NULL,'active'),
(4,'MICROSOFT EXCEL INTERMEDIO','Curso-de-Excel-Intermedio3.jpg','\"Diseñado para que el estudiante obtenga las herramientas necesarias para trabajar en la hoja de cálculo en Microsoft Excel, el armado de cuadros, operaciones básicas, trabajo con fórmulas, entendimientos de terminologia Excel, entre otras cosas. Conoce cómo este software puede ser tan útil y conveniente en las distintas actividades y trabajos a realizar. ',30,175.00,1,1,0,NULL,'active'),
(5,'MICROSOFT OFFICE','microsoft-office3.jpg','Curso diseñado para que el estudiante se capacite en el uso de tres de los productos que forman parte de Microsoft Office 2013:Word, Excel, PowerPolnt. ',30,175.00,1,1,0,NULL,'active'),
(6,'ASISTENTE MAESTRO PREESCOLAR','ayudantepreesolar.jpg','El curso proveerá a los participantes actividades que los capacitan para entender el desarrollo humano en los primeros años de vida del niño. Podrán comprender la conducta y las  necesidades de los niños preescolares y conocerán cómo estimular el desarrollo cognitivo e interacción social. Estudiarán las funciones del Asistente de Maestro Preescolar, así como aspectos históricos,teóricos\r\ny éticos de la educación temprana.',30,200.00,1,2,0,NULL,'active'),
(7,'GROOMING','grooming-prices1.jpg','Curso básico, teórico y demostra tivo. Consta de una primera parte teórica, incluye demostración y uso de las herramientas Indispensables. En la segunda parte, se realíza prática de los cortes, baño, secado y corte de uñas. ',40,300.00,1,2,0,NULL,'active'),
(8,'FOTOFRAFÍA BÁSICA','fotografiadigital.jpg','\"Introduce al particlipante en los fundamentos básicos de la fotografía digital Se explica detalladamente las funciones de la cámara y sus modalidades de uso. A través de la experiencia práctica se aprenderá el uso adecuado de la cámara dlgital y el desarrollo de técnicas básicas en el manejo, almacenamiento y edición de\"\r\n archivos digitales. Requiere cámara digital.',30,180.00,1,2,0,NULL,'active'),
(9,'MAQUILLAJE PROFESIONAL','maquillageprof13.jpg','En este curso aprenderás a lucir bien para cada ocasión. Aprenderás a maquillar según la forma del rostro y las tendencias. Realizarás maquillajes casuales, de gala,  coquetos, técnicas correctivas y más. Podrás identificar el maquillaje de acuerdo a la ocasión. Con estecurso podrás comenzar tu carrera como maquillista profesional',30,240.00,1,2,0,NULL,'active'),
(10,'CONFECCIÓN DE JABONES','canfecionjabon2.jpg','El taller capacita al estudiante en la elaboración y técnicas de jabones naturales preparados a base de glicerina. Se discutirán temas como los diferentes tipos de aceites bases o conductores,aceites esenciales,técnicas dejabón de dos capas, inclusión entre otros temas. El estudiante adquirirá conocimientos básicos sobre algunos temas del mundo de la cosmética natural.',6,85.00,1,2,0,NULL,'active'),
(11,'CONFECCIÓN DE PRODUCTOS NATURALES','confeccionproductnatu3.jpg','El curso de confección de productos naturales para el cuidado de la piel capacita al estudiante a desarrollar conocimientos en el área de elaboración de cremas faciales,corporales,tónicos entre otros productos.El estudiante adquirirá conocimientos básicos sobre',24,150.00,1,2,0,NULL,'active'),
(12,'LENGUAJE DE SEÑAS BÁSICO','lenguajedeseñas2.jpg','Podrá aprender desde el abecedario hasta el deletreo manual. Conocerá las señas formales y diversas técnicas para comunicarse con la población audio impedida.',32,170.00,1,2,0,NULL,'active'),
(13,'LENGUAJE DE SEÑAS INTERMEDIO','lenguajedeseñas1.jpg','Es requisito tener conocimiento en lenguaje de señas básico. Aprenderás a modificar cuentos, artículos de periódicos y dialogo formal. Aprenderás las señas más importantes y utilizadas por esta población.',32,170.00,1,2,0,NULL,'active'),
(14,'DISEÑO PAISAJISTA','diseño paisajista1.jpg','En el curso se les proveerán las herramientas necesarias para desarrollar un diseño ordenado, estético y funcional, mediante el uso de principios básicos de diseño.Se toma en consideración la arquitectura de la estructura física y sus alrededores para diseñar el jardín deseado. Se estudian los tipos de plantas, su hábitat y las posibles combinaciones. Se diseña el jardín que se desea desarrollar.',30,160.00,1,3,0,NULL,'active'),
(15,'HUERTO CASERO','huerto-casero2.jpeg','\"¡Aprende a crear tu propio huerto casero y disfruta de alimentos frescos en tu propio jardín! Incluye el desarrollo del planos, abonos y sus usos, prácticas de selección y preparación de terrenos, siembra y cultivo, control de plagas y enfermedades, entre otros temas. Tendrás ta experiencia teórica y práctica, ya que se trabajará creando un huerto casero.',30,160.00,1,3,0,NULL,'active'),
(16,'INTRODUCCION A YOGA','introyoga2.jpg','\"Aprende a complementar una vida sana con la práctica de yoga. Le permite relajarse, mejorar su salud y las tareas cotidianas, además mejorar su memoria, le da paz y felicidad . Es un elemento de auto ayuda.',12,120.00,1,4,0,NULL,'active'),
(17,'SEMINARIO DE LEY HIPAA','certificación-hipaa.jpg','\"Provee las herramientas necesarias para interpretar eficazmente la ley Health lnsurance Porta bility and Accountability Acr. Al finalizar el participante estará capacitado para tener buen dominio en la interpretación de la ley.',5,60.00,1,4,0,NULL,'active'),
(18,'FLORISTERÍA','floristeri1.jpg','El curso capacita al participante en el mantenimiento de flores frescas. Explorará su fase artística y creativa diseñando con flores tropicales y exóticas. Trabajará arreglos de gala para bodas,aniversarios, homenajes y otras actividades sociales y eventos.Se trabaja con diferentes líneas de arreglos que son demostradas por el profesor confeccionando arreglos florales en clase y luego los participantes confeccionarán sus arreglos con la supervisión directa del profesor.',30,160.00,1,5,0,NULL,'active'),
(19,'CREACION Y ELABORACIÓN DE CANASTAS Y ENVOLTURA','canastayenvoltura1.jpg','El estudiante aprenderá técnicas básicas y avanzadas de envoltura de regalos y elaboración de canastas. Se diseñarán envolturas de distintas épocas y modernas. Se confeccionarán canastas con distintos materiales. Se trabajarán presentaciones de canastas y envolturas siguiendo temas de acuerdo a la ocasión.',6,80.00,1,5,0,NULL,'active'),
(20,'DISEÑO Y DECORACIÓN CON GLOBOS','','\"Sorprende a todos con el cielo lleno de corazones blancos,siluetas de globos,jardines y mesas repletas de globos. Aprende a realizar este arte tan solicitado en las celebraciones y eventos. Conoce las diversas técnicas. materiales e ideas necesarias para crear una decoración con globos espectacular. Te sorprenderá todas las creaciones que podrás realizar y lo sencillo que puede ser, gracias a las guías detalladas y lo interactivo del curso.',15,150.00,1,5,0,NULL,'active'),
(21,'DISEÑO Y COORDINACIÓN DE EVENTOS SOCIALES','cordinadoreventos1.jpg','A través del curso los participantes recibirán capacitación sobre cómo organizar y diseñar diferentes tipos de actividades sociales y profesionales, convenciones, bodas, comidas de negocio.,quinceñeros, tomas de posesión, reconocimientos, inauguración de facilidades,entre otros. Incluye además conceptos básicos de decoración el rol del anfitrión, reglas de etiqueta, códigos de conducta establecidos y protocolo según los diversos tipos de eventos.',40,250.00,1,5,0,NULL,'active'),
(22,'TÉCNICAS CREATIVAS DE DECORACIÓN DE INTERIORES','decointerior1.jpg','\"Este curso incluye técnicas creativas de la decoración y el diseño de interiores. Aprenderán sobre color, forma, líneas, exturas para aplicarlo en la decoración de su hogar. Incluye elementos complementarios de la decoración de qué es: contraste, balance, armonía, proporción y escala. Al finalizar el curso podrá aplicar los conocimientos en la decoración de su propio hogar.',30,160.00,1,5,0,NULL,'active'),
(23,'INGLÉS CONVERSACIONAL BÁSICO ','inglesconve2.jpg','Se capacitará al estudiante en el desarrollo de destrezas de pronunciación, dicción,sintaxis y otros aspectos en el idioma iglés.',30,160.00,1,6,0,NULL,'active'),
(24,'INGLÉS CONVERSACIONAL INTERMEDIO','english-intermedio2.jpg','Se le ofrecerá al estudiante la oportunidad de mejorar su fluidez en el lenguaje de tal forma que aumente',30,160.00,1,6,0,NULL,'active'),
(25,'INGLÉS CONVERSACIONAL AVANZADO','english-avanzado1.png','\"¿Tienes conocimiento de inglés, pero necesitas adquirir mayor dominio profesional para satisfacer las demandas de su trabajo? En este curso se enfatiza el enriquecimiento de vocabulario y conversación sostenida. El participante debe tener dominio básico de gramática.',30,160.00,1,6,0,NULL,'active'),
(26,'FRANCÉS','frances1.jpg\r\n\r\n','\"Orientado para personas sin conocimiento del idioma francés. Está diseñado para adquirir destrezas básicas mediante la enseñanza de voca bulario, gramática, conversación, pronunciación y ejercidos de práctica.',30,170.00,1,6,0,NULL,'active'),
(27,'ITALIANO','italiano3.jpg','Se capacitará al estudiante a desarrollar destrezas de pronunciación ,dicción, sintaxis y otros aspectos en el ldloma ltaliano.',30,170.00,1,6,0,NULL,'active'),
(28,'PORTUGUÉS','portugal3.png','Se capacitará al estudiante a desarrollar destrezas de pronunciación ,dicción, sintaxis y otros aspectos en el ldloma Portugues.',30,170.00,1,6,0,NULL,'active'),
(29,'MANDARÍN','mandarin2.jpg','Se capacitará al estudiante a desarrollar destrezas de pronunciación ,dicción, sintaxis y otros aspectos en el ldloma Mandarín.',30,170.00,1,6,0,NULL,'active'),
(30,'INGLÉS CONVERSACIONAL','inglesconve1.jpg','\"Comprensión , pronunciación , conversación en inglés.\"roll play\" en una forma dinámica y divertida .',30,160.00,1,7,0,NULL,'active'),
(31,'TENIS','tenisniño6.jpg','\"Aprenderá técnicas de agarre de la raqueta, la posición correcta del cuerpo, movimiento de pies, el tiro de frente, el tiro revés, el boleo y el servicio.',24,150.00,1,7,0,NULL,'active'),
(32,'DIBUJO Y PINTURA','dibujopintura1.jpg','\"Te prepara para desarrollar toda tu creatividad, para explorar tu propio estilo de dibujo y pintura.\"',24,150.00,1,7,0,NULL,'active'),
(33,'MANEJO DE TECLADO','manejoteclado2.jpg','El curso está diseñado para el participante que no tiene experiencia con el teclado mecanográfico y planea utllizar las destrezas en su vida personal y profesional . Desarrolla técnicas correctas en el uso del teclado alfabético, numérlco, los simbolos en la computadora y el desarrollo de la rapidez y exactitud.',20,140.00,1,7,0,NULL,'active'),
(34,'USO DE LA COMPUTADORA Y EL INTERNET','intro_compu.jpg','Incluye conceptos básicos en el uso y manejo de la computadora, los diferentes motores de búsqueda en internet, creación y manejo de una cuenta de correo electrónico y conceptos básicos de un procesador de palabras.',24,140.00,1,8,0,NULL,'active'),
(35,'BIOTECNOLOGÍA','biotec4.jpg','Esta certificación está compuesta por una secuencia de módulos de capacitación donde se provee un trasfondo histórico del desarrollo de la biotecnología y sus aplicaciones. Expone al participante a la terminología y metodología relacionada con los procesos biotecnológicos y aspectos funda mentales de biología, química e ingeniería. Requisitos: BA o Asociado en áreas relacionadas con las ciencias, experiencia en la industria. Debe presentar transcripción de créditos, copia del grado obtenido y certificación del trabajo en la industria.',84,990.00,1,9,0,NULL,'active'),
(36,'MICRIBIOLOGÍA INDUSTRIAL','microindustrial1.jpg','Los participantes fortalecerán los conocimientos en aspectos de microbiología que impactan de forma directa e indirecta la calidad en la elaboración de los productos. Dirigida a reforzar las destrezas y el conocimiento en las operaciones, metodología y tecnología biofarmacéutica, como parte del proceso de manufactura. Se desempeñaran de forma eficiente, analítica e independiente alevaluar riesgos y tomar decisiones en el laboratorio de microbiología y las áreas relacionadas.',130,1.00,1,9,0,NULL,'active'),
(37,'PROCESSOS FARMACÉUTICOS','procesosfarma1.jpg','\"El participante conocerá cualitativa y cuantitativamente los procesos y operaciones unitarias de mayor utilización en la planta, de manera que esta información contribuya a la comprensión crítica y al mejoramiento profesional de acuerdo con los diferentes roles que ejerzan. La estructura establecida para esta certificación conlleva establecer la metodología para el diseño del medicamento desde la\"\r\npre-formulación hasta el producto final. ',60,950.00,1,9,0,NULL,'active'),
(38,'CERTIFICACIÓN CDA','certCDA2.jpg','Esta certificación provee adiestramlento para obtener la credencial COA (Child Development Assoclate) otorgada por el Council for Professional Recognition para profesionales de la educación que trabajan con la ninez desde el nacimiento hasta los 5 años de edad.',120,950.00,2,NULL,0,NULL,'active'),
(39,'EMPRESARISMO','empresarismo1.jpg','En este curso aprenderás los elementos esenciales para iniciar un negocio propio y asuntos relaclonados con la compra o adquísición del mísmo. Tendrá la oportunidad de elaborar un plan de negocio y cómo utilizarlo favorablemente. Se le brinda rán las herramientas básicas para la planificación de su negocio, el financiamiento y mercadeo.',100,795.00,2,NULL,0,NULL,'active'),
(40,'FACTURACIÓN Y COBROS A PLANES MÉDICOS','facturacionMED2.jpg','Esa certificación esta dirigida al desarrollo de las destrezas necesarias para la ejecución efectiva del proceso de facturación a planes médicos.Capacitará al participante a realizar una facturación que cumpla con la Ley HIPAA y las leyes locales., además de identificar las herramientas básicas necesarias en la toma  de deciciones.Requisitos:Cuarto año de escuela superior.',110,795.00,2,NULL,0,NULL,'active'),
(41,'GERENCIA Y SUPERVISIÓN','gerenciasuper1.jpeg','\"Este certificado tiene como meta, desarrollar en los participantes los conocimiento y habilidades que le permitan maximizar sus gestiones como supervisor. Se prepara para que pueda ofrecer soluciones a los problemas de la empresa, constituyendo así un capital humano más competitivo. Desarrollarán destrezas gerenciales para elevar su nivel de calidad profesional Requisitos : BA o Asociado en cualquier especialidad y un (1) año de experiencia como supervisor.\"',80,800.00,2,NULL,0,NULL,'active'),
(42,'REGISTRADURÍA','registraduria.jpg','Dirigida a profesionales que se desempeñan en funciones como registrador, oficiales de registraduría o aspirantes a una de estas posiciones. Aprenderá las funciones y deberes de un registrador, reglamentación.políticas y normas de la institución. A través de esta certificación conoceránlas Leyes estatales y federales (FERPA) que cobijan esta función, además aprenderán la importancia de la ética y\r\nlos procesos ineludibles integrados en las funciones. Conocerán las mejores prácticas y regulaciones del puesto para disminuir los riesgos de demandas por asuntos relacionados a la oficina de registraduría.',30,550.00,2,NULL,0,NULL,'active'),
(43,'PANADERÍA Y REPOSTEÍA COMERCIAL','panaderiayrposteria2.jpg','\"Los participantes estudiarán los procesos de confección de dulces, postres y variedades de pan para uso doméstico o comercial. Estudiarán los métodos de confección a nivel comercial y el equipo que se utiliza. Realizarán diferentes confecciones para desarrollar las destrezas de la panadería y repostería. Se enfatizarán las destrezas requeridas para la búsqueda de empleo o la oportunidad para auto-emplearse.',200,675.00,3,NULL,0,NULL,'active'),
(44,'REPADOR Y MANTENEDOR DE DIFICIOS','reparadormantenedor.jpg','\"En el curso de Reparador y Mantenedor de Edificios se estudiarán las áreas de albañilería, carpintería, electricidad, plomería, terminaciones, entre otros. Aprenderán a reparar y realizar mantenimiento a las estructuras físicas de edificios comerciales, residencias e industrias, entre otros. Podrán reparar y/o reemplazar áreas sanitarias, reemplazar interruptores, rosetas, Lámparas y cableado. En el área de la construcción y albañilería, podrán reemplazar puertas y ventanas, colocar lozas, cerraduras, operadores y reparar empañetado. Además, desarrollarán las destrezas requeridas en la búsqueda de empleo o auto-em plearse.\"',300,1.00,3,NULL,0,NULL,'active'),
(45,'MODISTA: CORTE Y CONFECCIÓN DE MODAS','modista1.jpg','\"Prepara al estudiante para desempeñarse como modista en el corte y la confección de ropa. Se estudiará la confección de diferentes piezas de ropa de vestir tales como: blusas, faldas, trajes, ropa de dormir, pantalones, entre otros. Se utilizará el uso de plantilla, patrones, corte por medidas y el diseño de patrón básico. Además se discutirá la importancia de la seguridad en el taller, limpieza y lubricación del equipo y la organización del taller o área de tra bajo. Se enfatizará el dominio de las destrezas del curso. ',200,650.00,3,NULL,0,NULL,'active'),
(46,'CONSTRUCCIÓN DE GABINETES','contrucgabinete.png','En el curso de construcción de gabinetes se realizan diferentes proyectos utilizando distintas maderas, laminados, piezas con diseño, metales y otros Realizará diferentes cortes, ensamblado de piezas, terminaciones, entre otros. Desarrollarán un proyecto de construcción de gabinetes y trabajarán restauraciones en: camas, muebles y otros. Estudiarán las destrezas requeridas para la búsqueda de empleo o auto-emplearse.',250,1.00,3,NULL,0,NULL,'active'),
(47,'MECÁNICA DE REPARACIÓN Y MANTENIMIENTO DE MOTORES PEQUEÑOS.','mecanica1.jpeg','\"Los participantes se capacitarán con las destrezas y conocimientos en la reparación y mantenimiento de motores pequeños. Estudiarán la combustión interna de motores de 2 y 4 ciclos o tiempos, sistemas electrónicos, lubricación y enfriamiento, entre otros.Una vez completado el curso podrán reparar y dar mantenimiento a todo tipo de motor pequeño. Obtendrán las destrezas para la búsqueda de empleo o auto-emplearse.\"',250,1.00,3,NULL,0,NULL,'active'),
(48,'DISEÑO DE LECCIONES ELECTRÓNICAS','leccioneselectronicas.jpg','Aprenderá a través de un programado a desarrollar lecciones para fortalecer las destrezas de los estudiantes en las diferentes materias. Facilita que el estudiante pueda trabajar un módulo o lección y los ejercicios preparados por el maestro. Permite un estudio individualizado para aquel estudiante que requiere lecciones adicionales para dominar la competencia .',24,150.00,4,NULL,0,NULL,'active'),
(49,'TÉCNICAS Y ESTILOS EN LA CONTRUCCIÓN DE PRUEBAS',NULL,'Aprenderás las técnicas y estilos de redacción de pruebas que existen para medir el aprovechamiento, la forma correcta para la construcción de cada estilo e identificar el modelo correcto para medir la destreza o competencia.',24,150.00,4,NULL,0,NULL,'active'),
(50,'CONTRUCCIÓN DE RÚBRICAS',NULL,'Aprenderás el conjunto de criterios y estandares generalmente relacionados con objetivos de aprendizaje que se utillzan para evaluar el nivel de desempeño en una tarea. En el diseño de la rúbrica se trabajan los criterios que se evaluarán en el trabajo y el valor o puntaje que se otorga a cada criterio que se quiere medir. Esta estrategia nos ayuda a evaluar el aprendizaje del estudiante y permite que el estudiante autoevalúe su desempeño.',12,75.00,4,NULL,0,NULL,'active'),
(51,'INTEGRACIÓN DE LAS BELLAS ARTES A LA ENSEÑANZA ','bellas_artes1.jpg','El maestro aprenderá la técnica apropiada para integrar las bellas artes a la enseñanza de las materias.A través de las bellas artes el estudiante desarrolla la sensibilidad,el pensamiento crítico, valorar y apreciar la cultura, además de expresar emociones, sentimientos, sus gustos e ideas sobre algo.',12,75.00,4,NULL,0,NULL,'active'),
(52,'CONSTRUCCIÓN DE PORTAFOLIO ELECTRÓNICO','e-portafolio1.png','\"Aprenderá los uso del portafolio electrónico básico, el cual puede aplicarse en cualquier materia. Se incluye una colección digital de artefactos, tales como:perfiles personales,archivos, publicaciones, ideas, reflexiones y logros, entre otros, sobre un individuo o una institución que se acumulan con el tiempo.El portafolio es trabajado digitalmente y se trabaja por un período determinado, según el propósito u objetivo en la clase.',12,75.00,4,NULL,0,NULL,'active'),
(53,'INTEGRACIÓN DE TEMAS TRANSVERSALES EN LA ENSEÑANZA','integracion_enseñaza3.jpg','El uso de la estrategia de integraclón de los temas transversales,le permite al maestro integrar diferentes temas a la clase sin que esta pierda su contenido. Se pueden integrar clase, valores y ética, temas de actualidad, entre otros. Es una estrategia que se utiliza en el currículo para dar pertinencia a la relación que puede existir entre las diferentes materiatrias.',12,75.00,4,NULL,0,NULL,'active');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`firstname`,`lastname`,`email`,`pass`,`phone`,`user_img`,`user_status`) values 
(1,'Emmanuel','Roman','emmanuel.roman4@upr.edu','123','7874000745',NULL,'active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
