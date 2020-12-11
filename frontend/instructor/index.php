<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<?php 
        
    include('../../commons/assets/includes/functions.php');
    session_start();
        
?>

<head>
	<meta charset="utf-8">
	<title>DECEP - Admin</title>
	<meta name="description" content="">
	<link rel="shortcut icon" type="image/x-icon" href="../../commons/DECEP_IMG/DECEPlogo2.png">
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


</head>

<body id="welcome">

	<div class="left-sidebar">
		<div class="logo">
		
			<center><img src="img/uprainsignia.png" alt="" width="150" height="150"><br><br></center>
        	<center><h1>Menu</h1></center>
		
			
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
	</div>

	<div id="main-wrapper">
		<div class="main-content">
			<section id="welcome">
				<div class="content-header">
					<h1>Welcome, Instructor&nbsp;<?php echo  $_SESSION['instructor_name'] ?></h1>
				</div>

				<!-- <div class="welcome">
					<h2 class="twenty">Welcome, Admin Pedro</h2>

					<p>Firstly, a huge thanks for purchasing this theme, your support is truly appreciated!</p>

					<p>This document covers the installation and use of this theme and often reveals answers to common problems and issues - read this document thoroughly if you are experiencing any difficulties. If you have any questions that are beyond the scope of this document. Thank you so much!</p>
				</div> -->



				<!-- <div class="features">
					<h2 class="twenty">Template Features</h2>

					<ul>
						<li>Clean &amp; Simple Design</li>
						<li>HTML5 &amp; CSS3</li>
						<li>Fully Responsive Design</li>
						<li>PHP/Ajax Powered Working Contact Form</li>
						<li>All files are well commented</li>
						<li>Cross Browser Compatible with IE11+, Firefox, Safari, Opera, Chrome</li>
						<li>Extensive Documentation</li>
					</ul>
				</div> -->


			</section>

			<section id="installation">
				<div class="content-header">
					<h1>Panel de Control</h1>
				</div>
				<h2 class="title"></h2>

				<div class="section-content">
					<!-- <div class="row">
					<div class="col-lg-5"> -->
						<!-- <img src="../../commons/DECEP_IMG/arecibo.png" alt=""><br>

						<img src="../../commons/DECEP_IMG/imagenes%20UPR%20DECEP%20EN%20LINEA2.png" alt=""> -->
					<!-- </div> -->

					<!-- <div class="col-lg-5"> -->
						<img src="../../commons/DECEP_IMG/lobo-grande2.png" alt="" >
                    

					<!-- </div> -->
					</div>

				
				

			</section>
			
			


        
			
			

            
			
			

			
			
			
			
			
			
			<!-- <section id="installationSSSs">
				<div class="content-header">
					<h1>Log out</h1>
				</div>
				<h2 class="title"></h2>


				<div class="section-content">
					<ol>
						<li>Grooming:<br>-<br>-<br>-...</li>
						<li>Fotograf&iacute;a digital B&aacute;sica:<br>-<br>-<br>-...</li>
						<li>Lenguaje de senas B&aacute;sico:<br>-<br>-<br>-...</li>
						<li>Now go to your cpanel or open your FTP Client (like <a target="_blank" href="https://filezilla-project.org/download.php">Filezilla</a>) and upload the content of the Template on your server root.</li>
						<li>Once the files are done uploading go to www.yourdomainname.com/index.html</li>
					</ol>
				</div>
			</section> -->
			
			
			

			<!--
      		<section id="video">
      			<h2 class="title"> Video Tutorial </h2>
      			21:9 aspect ratio 
      			<div class="embed-responsive embed-responsive-21by9">
      			<iframe class="embed-responsive-item" width="100%" height="515" src="https://www.youtube.com/embed/i7_PRPLOxVE?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      			</div>	            
      		</section>
			-->
			<!--
      		<section id="credit">
      			<h2 class="title">Source and Credit</h2>		            
      			<div class="script-source">
      			<ul>
      			<li><a target="_blank" href="http://www.pexels.com">Pexels</a></li>
      			<li><a target="_blank" href="http://jquery.com/">jQuery</a></li>
      			<li><a target="_blank" href="http://getbootstrap.com">Bootstrap Framework</a></li>
      			<li><a target="_blank" href="https://dimsemenov.com/plugins/magnific-popup/">magnific popup</a></li>
      			<li><a target="_blank" href="https://masonry.desandro.com/">masonry</a></li>
      			<li><a target="_blank" href="https://www.flaticon.com/home">flaticon</a></li>
      			<li><a target="_blank" href="http://www.owlgraphic.com/owlcarousel">Owl Carousel</a></li>
      			<li><a target="_blank" href="https://github.com/iamMonzurul/jQuery-AJAX-MailChimp">Ajax Mailchimp</a></li>
      			<li><a target="_blank" href="http://fontawesome.io/">FontAwesome</a></li>
      			<li><a target="_blank" href="https://themify.me/themify-icons">Themify Icons</a></li>

      			</ul>
      			</div>
      		</section>
			-->
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
