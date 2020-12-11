<?php include("../../commons/assets/includes/functions.php"); 
 session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>DECEP - Admin</title>
	<meta name="description" content="">
	<link rel="shortcut icon" type="image/x-icon" href="../../../DECEP/commons/DECEP_IMG/DECEPlogo2.png">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="shortcut icon" href="img/favicon.png"> -->

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>

	<!-- Syntax Highlighter -->
	<link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shCore.css" media="all">
	<link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shThemeDefault.css" media="all">

	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Normalize/Reset CSS-->
	<link rel="stylesheet" href="css/normalize.min.css">
	<!-- Main CSS-->
	<link rel="stylesheet" href="css/main.css">
	<!-- Bootstrap CSS (Extra, Added)-->
	<!-- <link rel="stylesheet" href="../../commons/assets/css/bootstrap.min.css"> -->
       <link rel="stylesheet" href="../../commons/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../commons/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="../../commons/assets/css/flaticon.css">
            <link rel="stylesheet" href="../../commons/assets/css/slicknav.css">
            <link rel="stylesheet" href="../../commons/assets/css/animate.min.css">
            <link rel="stylesheet" href="../../commons/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="../../commons/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../../commons/assets/css/themify-icons.css">
            <link rel="stylesheet" href="../../commons/assets/css/slick.css">
            <link rel="stylesheet" href="../../commons/assets/css/nice-select.css">
            <link rel="stylesheet" href="../../commons/assets/css/style.css">

</head>

<body id="welcome">

	<aside class="left-sidebar">
		<div class="logo">
		
			<center><img src="img/uprainsignia.png" alt="" width="150" height="150"><br><br></center>
        	<center><h1>Menu</h1></center>
		
			<!--
			<a href="#welcome">
				<h1>Admin Area</h1>
			</a>
			-->
		</div>
		<nav class="left-nav">
			<ul >
				<li class="current"><a href="index.php">Inicio</a></li>
				<li><a href="courses.php">Cursos</a></li>
				<li><a href="categories.php">Categorias</a></li>
                <li><a href="students.php">Matricula en Cursos</a></li>
				<li><a href="news.php">Noticias</a></li>
				
				<li><a href="logout.php">Log out</a></li>
			</ul>
		</nav>
	</aside>

	<div id="main-wrapper">
		<div class="main-content">
			<section id="welcome">
				<div class="content-header">
					<h1>Cursos</h1>
				</div>

				<div class="welcome">
					

					

					<?php getStudentsinCourse(); ?>
                    
                 
                
                
				</div>




			</section>

			
  		</div>
  </div>


		<!-- Essential JavaScript Libraries
			==============================================-->
			<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
			<script type="text/javascript" src="js/jquery.nav.js"></script>
			<script type="text/javascript" src="syntax-highlighter/scripts/shCore.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushXml.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushCss.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushJScript.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushPhp.js"></script> 
			<script type="text/javascript">
				SyntaxHighlighter.all()
			</script>
			<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
