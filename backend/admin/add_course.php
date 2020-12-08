<?php 
  include("../../commons/assets/includes/connectiondb.php");
  include("../../commons/assets/includes/functions.php"); 
  session_start();
?>
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
		
    <center><a href="index.php"><img src="img/uprainsignia.png" alt="UPRA logo" width="150" height="150"></a></center>
    <center><h1>Menu</h1></center>

		</div>
		<nav class="left-nav">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li class="current"><a href="courses.php">Cursos</a></li>
                <li><a href="categories.php">Categorias</a></li>
                <li><a href="sections.php">Secciones</a></li>
				<li><a href="news.php">Noticias</a></li>
				<li><a href="accounts.php">Cuentas</a></li>
                <li><a href="orders.php">Ordenes</a></li>
                <li><a href="#">Mi Cuenta</a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
		</nav>
  </aside>

	<div id="main-wrapper">
		<div class="main-content">
			<section id="welcome">
				<div class="content-header" style="margin-left: 5%">
					<h1>Añadir Curso</h1>
				</div>

				<div class="welcome">      
                    
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-12" style="margin-left: 2%">
                            <form class="row contact_form" action="add_course.php" method="post" enctype="multipart/form-data">

                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Titulo del Curso</b></h5>
                                <!-- <span>Titulo del Curso</span> -->
                                <input type="text" class="form-control" id="last" name="titulo" placeholder="ej. Excel Basico" />
                                <!-- <span class="placeholder" data-placeholder="Titulo del Curso"></span> -->
                            </div>

                            <div class="col-md-6 form-group p_star">
                                
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Imagen del Curso</b></h5>
                                <input type="file" class="form-control" id="number" name="imagen" />
                                <!-- <span class="placeholder" data-placeholder="Imagen del Curso"></span> -->
                            </div>

                            <!-- <div class="col-md-6 form-group p_star">
                                <?php //echo "<img align=\"left\" width=\"250\" height=\"200\" src=\"../../commons/decep_images/cursos/$cour_image\">"; ?>
                            </div> -->

                            <div class="col-md-12 form-group p_star">
                                <h5 style="text-align:left;"><b>Descripcion del Curso</b></h5>
                                <!-- <input type="text" class="form-control" id="email" name="descripcion" /> -->
                                <textarea class="form-control" name="descripcion" id="message" rows="1" placeholder="ej. Este curso tiene la mision de..."></textarea>
                                <!-- <span class="placeholder" data-placeholder="Descripcion del Curso"></span> -->
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Horas de Contacto</b></h5>
                                <input type="number" class="form-control" id="number" name="horas" min="1" step="1" max="1000" placeholder="ej. 150"/>
                                <!-- <span class="placeholder" data-placeholder="Horas de Contacto"></span> -->
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Precio del Curso</b></h5>
                                <input type="number" class="form-control" id="number" name="precio" min="0" step="10" max="10000" placeholder="ej. 350"/>
                                <!-- <span class="placeholder" data-placeholder="Precio del Curso"></span> -->
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Categoria del Curso</b></h5>
                                  <select class="country_select" name="course_cat">
                                      <option>Seleccione una Categoria</option>
                                      <?php 

                                          $get_cats = "select * from category";

                                          $run_cats = mysqli_query($dbc, $get_cats);

                                          while ($row_cats=mysqli_fetch_array($run_cats)){

                                              $cat_id = $row_cats['cat_id'];
                                              $cat_title = $row_cats['cat_name'];

                                              echo "<option value='$cat_id'>$cat_title</option>";
                                          }
                                      
                                      ?>
                                  </select>
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Subcategoria del Curso</b></h5>
                                <select class="country_select" name="course_subcat">
                                    <option>Seleccione una Subcategoria</option>
                                    <?php 

                                        $get_subcats = "select * from subcategory";

                                        $run_subcats = mysqli_query($dbc, $get_subcats);

                                        while ($row_subcats=mysqli_fetch_array($run_subcats)){

                                            $subcat_id = $row_subcats['subcat_id'];
                                            $subcat_title = $row_subcats['subcat_name'];

                                            echo "<option value='$subcat_id'>$subcat_title</option>";
                                        }
                                    
                                    ?>
                                </select>
                                <!-- <select class="country_select">
                                <option value="1" selected >Subcategoria 1</option>
                                <option value="2">Subcategoria 1</option>
                                <option value="4">Subcategoria 2</option>
                                </select> -->
                            </div>

                            <!-- Futuro: Hacer lo mismo que las categorias para coneccion con la tabla de seccion. -->
                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Seccion del Curso</b></h5>
                                  <select class="country_select" name="seccion">
                                      <option>Seleccione una Seccion</option>
                                      <?php 

                                          $get_secs = "select * from section";

                                          $run_secs = mysqli_query($dbc, $get_secs);

                                          while ($row_secs=mysqli_fetch_array($run_secs)){

                                              $sec_id = $row_secs['section_id'];
                                              $sec_title = $row_secs['section_name'];

                                              echo "<option value='$sec_id'>$sec_title</option>";
                                          }
                                      
                                      ?>
                                  </select>
                                <!-- <input type="text" class="form-control" id="city" name="seccion" placeholder="ej. ME5"
                                value="<?php //echo $section_id; ?>"/> -->
                                <!-- <span class="placeholder" data-placeholder="Codigo de Seccion"></span> -->
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <h5 style="text-align:left;"><b>Estatus del Curso</b></h5>
                                <select class="country_select" name="course_status">
                                    <option value='active'selected>Active</option>
                                    <option value='inactive'>Inactive</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="city" name="status" placeholder="ej. active"/> -->
                                <!-- <span class="placeholder" data-placeholder="Estatus del Curso"></span> -->
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <h5 style="text-align:left;"><b>Palabras Claves(Keywords) del Curso</b></h5>
                                <!-- <span>Codigo del Curso</span> -->
                                <input type="text" class="form-control" name="keywords" placeholder="ej. excel, basico, cursos cortos..."/>
                                <!-- <span class="placeholder" data-placeholder="Codigo del Curso"></span> -->
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" name="add_course" value="submit" class="btn_3" style="background-color:#ff2424">
                                Añadir Curso
                                </button>
                            </div>
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

<?php

    if(isset($_POST['add_course'])){

        //Getting the text data from the fields.
        $course_name = $_POST['titulo'];
        $course_desc = $_POST['descripcion'];
        $course_hours = $_POST['horas'];
        $course_price = $_POST['precio'];
        $course_cat = $_POST['course_cat'];
        $course_subcat = $_POST['course_subcat'];
        $course_seccion = $_POST['seccion'];
        $course_keywords = $_POST['keywords'];
        $course_status = $_POST['course_status'];

        $course_image = $_FILES['imagen']['name'];
        $course_image_tmp = $_FILES['imagen']['tmp_name'];

        move_uploaded_file($course_image_tmp,"../../commons/decep_images/cursos/$course_image");

        //Query variable for inserting data to database.
        $add_course = "insert into course 
        (course_name,image,description,contact_hours,price,category_id,subcategory_id,section_id,keywords,status)
        values ('$course_name','$course_image','$course_desc','$course_hours','$course_price','$course_cat',
        '$course_subcat','$course_seccion','$course_keywords','$course_status')";

        echo $add_course;
        //Query for insert.
        $add_cour = mysqli_query($dbc, $add_course);

        if ($add_cour) {
            echo "<script>alert('Course has been succsesfully added!')</script>";
            echo "<script>window.open('courses.php','_self')</script>";
        }
        else{
            echo "<script>alert('Guachet! NO CORRE!')</script>";
        }

    }

?>

