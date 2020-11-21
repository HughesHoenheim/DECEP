<?php 


 
include("connectiondb.php");
//include("../../commons/includes/connectiondb.php");



//Funcion de las Categorias del nav bar de los cursos por categorias
function getCats(){

    global $dbc;

    $get_cats = "select * from category";

    $run_cats = mysqli_query($dbc, $get_cats);

    while ($row_cats=mysqli_fetch_array($run_cats)){

        $cat_id = $row_cats['cat_id'];
        $cat_name = $row_cats['cat_name'];
        $cat_status = $row_cats['cat_status'];

        if($cat_status == "active"){
            
//            echo "<a class='nav-item nav-link' id='nav-home-tab' data-toggle='tab' href='cursos.php?cat_id=$cat_id' role='tab' aria-controls='nav-home' aria-selected='true'>$cat_name</a>";
            
            echo "<a class='nav-item nav-link' href='course.php?cat_id=$cat_id'>$cat_name</a>";

        }
    }
}



//Organizar cursos por subcategoria
function getCourseCat(){
    
//    $_GET['cat_id'] = 1;
    if(isset($_GET['cat_id'])){
      $cat_id = $_GET['cat_id'];  
    
    global $dbc;
        
        ///Determinar columna para ordenar.
            if(isset($_GET['order']))
            $orden=$_GET['order'];
            else
            $orden = 'r';
        
            switch($orden)
            {
            case 'a': $order_by = 'course_name ASC LIMIT 0,9';
                break;
                
            case 'z': $order_by = 'course_name DESC LIMIT 0,9';
                break;
                
            case 'h': $order_by = 'price DESC LIMIT 0,9';
                break;
                
            case 'l': $order_by = 'price ASC LIMIT 0,9';
                break;

            case 'r': $order_by = 'RAND() LIMIT 0,9';
                break;
                
            default: $order_by = 'RAND() LIMIT 0,9';
            }

    $get_cat_course = "select * from course where category_id = '$cat_id' order by RAND() LIMIT 0,9";
        
    $run_cat_course = mysqli_query($dbc, $get_cat_course);
    
    $count_cats = mysqli_num_rows($run_cat_course);
        
           if($count_cats == 0){
             echo "<h2 style='padding:20px;'>There is no course in this category!! </h2>";
             
            }
        
            while ($row_cat_course=mysqli_fetch_array($run_cat_course)){
        
            $cour_id       =  $row_cat_course['course_id'];
            $cour_name     =  $row_cat_course['course_name'];
            $cour_cat      =  $row_cat_course['category_id'];
            $cour_subcat   =  $row_cat_course['subcategory_id'];
            $cour_image    =  $row_cat_course['image'];
            $cour_desc     =  $row_cat_course['description'];
            $cour_keys     =  $row_cat_course['keywords'];
            $cour_price    =  $row_cat_course['price'];
            $cour_status   =  $row_cat_course['status'];
                
                if($cour_status == 'active')
                {
                      echo "<div class='col-xl-4 col-lg-4 col-md-6'>
                                <div class='single-product mb-60'>
                                    <div class='product-img'>
                                        <a href='single-product.php?cour_id=$cour_id'> <img  src='decep_images/cursos/$cour_image' alt='' width='500' height='350'></a>
                                        <div class='new-product'>
                                        </div>
                                    </div>
                                    <div class='product-caption'>
                                        <h4><a href=''>$cour_name</a></h4>
                                        <div class='price'>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                }
        }
    }
}


//Funcion para presentar los cursos
function getCourse(){
    
//    if(!isset($_GET['search'])){
    if(!isset($_GET['cat_id'])){
//        if(!isset($_GET['type_id'])){
            
            global $dbc;
    
            //Determinar columna para ordenar.
            if(isset($_GET['order']))
            $orden=$_GET['order'];
            else
            $orden = 'r';
        
            switch($orden)
            {
            case 'a': $order_by = 'prod_name ASC LIMIT 0,9';
                break;
                
            case 'z': $order_by = 'prod_name DESC LIMIT 0,9';
                break;
                
            case 'h': $order_by = 'price DESC LIMIT 0,9';
                break;
                
            case 'l': $order_by = 'price ASC LIMIT 0,9';
                break;

            case 'r': $order_by = 'RAND() LIMIT 0,9';
                break;
                
            default: $order_by = 'RAND() LIMIT 0,9';
            }
            

            $get_course = "select * from course order by $order_by";
        
            $run_course = mysqli_query($dbc, $get_course);
        
            while ($row_cat_course=mysqli_fetch_array($run_course)){
        
            $cour_id       =  $row_cat_course['course_id'];
            $cour_name     =  $row_cat_course['course_name'];
            $cour_cat      =  $row_cat_course['category_id'];
            $cour_subcat   =  $row_cat_course['subcategory_id'];
            $cour_image    =  $row_cat_course['image'];
            $cour_desc     =  $row_cat_course['description'];
            $cour_keys     =  $row_cat_course['keywords'];
            $cour_price    =  $row_cat_course['price'];
            $cour_status   =  $row_cat_course['status'];
        
                    if($cour_status == 'active')
                {
                      echo "<div class='col-xl-4 col-lg-4 col-md-6'>
                                <div class='single-product mb-60'>
                                    <div class='product-img'>
                                        <a href='single-product.php?cour_id=$cour_id'> <img  src='decep_images/cursos/$cour_image' alt='' width='500' height='350'></a>
                                        <div class='new-product'>
                                        </div>
                                    </div>
                                    <div class='product-caption'>
                                        <h4><a href=''>$cour_name</a></h4>
                                        <div class='price'>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                }
                }
//            }
    
        }

//    }
}


function searchCourse(){
     
        if(isset($_GET['search'])){
            
                global $dbc;
                            
            $search_query = $_GET['user_query'];
                            
            $get_course = "select * from course where keywords like '%$search_query%'";
        
            $run_course = mysqli_query($dbc, $get_course);

            while ($row_search_course=mysqli_fetch_array($run_course)){

                $cour_id       =  $row_search_course['course_id'];
                $cour_name     =  $row_search_course['course_name'];
                $cour_cat      =  $row_search_course['category_id'];
                $cour_subcat   =  $row_search_course['subcategory_id'];
                $cour_image    =  $row_search_course['image'];
                $cour_desc     =  $row_search_course['description'];
                $cour_keys     =  $row_search_course['keywords'];
                $cour_price    =  $row_search_course['price'];
                $cour_status   =  $row_search_course['status'];

                if($cour_status == 'active')
                {
                      echo "<div class='col-xl-4 col-lg-4 col-md-6'>
                                <div class='single-product mb-60'>
                                    <div class='product-img'>
                                        <a href='course.php'> <img  src='decep_images/cursos/$cour_image' alt='' width='500' height='350'></a>
                                        <div class='new-product'>
                                        </div>
                                    </div>
                                    <div class='product-caption'>
                                        <h4><a href=''>$cour_name</a></h4>
                                        <div class='price'>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                }
                }
            }

}



?>