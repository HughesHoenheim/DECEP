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
                                        <a href='single-product.php?cour_id=$cour_id'> <img  src='../commons/decep_images/cursos/$cour_image' alt='' width='500' height='350'></a>
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
            case 'a': $order_by = 'prod_name ASC LIMIT 0,54';
                break;
                
            case 'z': $order_by = 'prod_name DESC LIMIT 0,54';
                break;
                
            case 'h': $order_by = 'price DESC LIMIT 0,54';
                break;
                
            case 'l': $order_by = 'price ASC LIMIT 0,54';
                break;

            case 'r': $order_by = 'RAND() LIMIT 0,54';
                break;
                
            default: $order_by = 'RAND() LIMIT 0,54';
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
                                        <a href='single-product.php?cour_id=$cour_id'> <img  src='../commons/decep_images/cursos/$cour_image' alt='' width='500' height='350'></a>
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
                                        <a href='course.php'> <img  src='../commons/decep_images/cursos/$cour_image' alt='' width='500' height='350'></a>
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


function getInsCourse(){
    
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
            

            $get_course = "SELECT * 
FROM (instructor NATURAL JOIN teaches) LEFT OUTER JOIN course USING (course_id)";
        
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
            $section_id    =  $row_cat_course['section_id'];
            $semester      =  $row_cat_course['semester'];
            $year          =  $row_cat_course['year'];
            
                    if($cour_status == 'active')
                {
                         $get_section = "SELECT * 
FROM section where section_id = $section_id";
            $run_section = mysqli_query($dbc, $get_section);
            while ($row_cat_course=mysqli_fetch_array($run_section)){
        
            $capacity      =  $row_cat_course['capacity'];
            $room     =  $row_cat_course['room'];
        
           
                        
                      echo "<tr>
                <td>
                  <div class='media'>
                    <div class='d-flex'>
                      <img src='../../commons/decep_images/cursos/$cour_image' width='100' height='80' alt='' />
                        &nbsp;$cour_name
                    </div>
                      
                    
                  </div>
                </td>
                <td>
                  <h5>$section_id</h5>
                </td>
                <td>
                  <h5>$semester</h5>
                </td>
                <td>
                 <h5>$year</h5>
                </td>
                <td>
                 <h5>$capacity</h5>
                </td>
                <td>
                 <h5>$room</h5>
                </td>
               
                     
              </tr>";
                    }
                }
                }
//            }
    
        }

//    }
}
function getStudentsinCourse(){
    {
    
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
            

            $get_course = "SELECT * 
FROM (instructor NATURAL JOIN teaches) LEFT OUTER JOIN course USING (course_id)";
        
            $run_course = mysqli_query($dbc, $get_course);
        
            while ($row_cat_course=mysqli_fetch_array($run_course)){
        
            $cour_id       =  $row_cat_course['course_id'];
            $cour_name     =  $row_cat_course['course_name'];
            $cour_cat      =  $row_cat_course['category_id'];
            $cour_subcat   =  $row_cat_course['subcategory_id'];
            $cour_image    =  $row_cat_course['image'];
           
            $cour_keys     =  $row_cat_course['keywords'];
            
            $cour_status   =  $row_cat_course['status'];
            $section_id    =  $row_cat_course['section_id'];
            $semester      =  $row_cat_course['semester'];
            
            
                    if($cour_status == 'active')
                {
                         $get_section = "SELECT * 
            FROM section where section_id = $section_id";
            $run_section = mysqli_query($dbc, $get_section);
            while ($row_cat_course=mysqli_fetch_array($run_section)){
        
            $capacity      =  $row_cat_course['capacity'];
            $room     =  $row_cat_course['room'];
            
            $get_student = "SELECT * FROM (USER NATURAL JOIN cart) LEFT OUTER JOIN course USING (course_id) WHERE course_id= $cour_id ";
            $run_student = mysqli_query($dbc, $get_student);
            while ($row_cat_course2=mysqli_fetch_array($run_student)){
        
            $name      =  $row_cat_course2['firstname'];
            $lastname     =  $row_cat_course2['lastname'];
            $user_img     =  $row_cat_course2['user_img'];
            $email     =  $row_cat_course2['email'];
                
             
        
           
                        
    echo "
            <h2 class='twenty'>$cour_name <img src='../../commons/decep_images/cursos/$cour_image' width='90' height='55' alt='' /></h2>
            <table class='table'>
            <thead>
              <tr>
                <th scope='col'>Name</th>
                <th scope='col'>Email</th>
                <th scope='col'>Seccion ID</th>
                <th scope='col'>Semestre</th>
                
               
                <th scope='col'>Sal&oacute;n</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                  <div class='media'>
                    <div class='d-flex'>
                      <img src='../../commons/user_images/$user_img' width='100' height='80' alt='' />
                        &nbsp;$name&nbsp;$lastname
                    </div>
                      
                  </div>
                </td>
                <td>
                  <h5>$email</h5>
                </td>
               
                <td>
                  <h5>$section_id</h5>
                </td>
                <td>
                  <h5>$semester</h5>
                </td>
               
                
                <td>
                 <h5>$room</h5>
                </td>
               
                     
              </tr>
            </tbody>
          </table>"
                          ;
            }
            
                    }
                }
                }
//            }
    
        }

//    }
}

}

function getAdminCourse(){
             
    global $dbc;

    //Determinar columna para ordenar.
    if(isset($_GET['order']))
    $orden=$_GET['order'];
    else
    $orden = 'r';

    switch($orden)
    {
        case 'a': $order_by = 'course_name ASC';
            break;
            
        case 'z': $order_by = 'course_name DESC';
            break;
            
        case 'h': $order_by = 'price DESC';
            break;
            
        case 'l': $order_by = 'price ASC';
            break;

        case 'r': $order_by = 'course_name ASC';
            break;
            
        default: $order_by = 'course_name ASC';
    }
    

    $get_course = "SELECT * FROM course ORDER BY $order_by";

    $run_course = mysqli_query($dbc, $get_course);

    while($row_course=mysqli_fetch_array($run_course))
    {
        $cour_id       =  $row_course['course_id'];
        $cour_name     =  $row_course['course_name'];
        $cour_image    =  $row_course['image'];
        $cour_desc     =  $row_course['description'];
        $cour_hours    =  $row_course['contact_hours'];
        $cour_price    =  $row_course['price'];
        $cour_cat      =  $row_course['category_id'];
        $cour_subcat   =  $row_course['subcategory_id'];
        $section_id    =  $row_course['section_id'];
        $cour_keys     =  $row_course['keywords'];
        $cour_status   =  $row_course['status'];
                    
        echo    "<tr>
                    <td><h5>$cour_id</h5></td>
                    <td><h5>$cour_name</h5></td>
                    <td>
                        <div class='media'>
                        <div class='d-flex'>
                            <img src='../../commons/decep_images/cursos/$cour_image' width='100' height='90' alt='' />
                        </div>
                        </div>
                    </td>
                    <td><h5>$cour_desc</h5></td>
                    <td><h5>$cour_hours</h5></td>
                    <td><h5>$cour_price</h5></td>
                    <td><h5>$cour_cat</h5></td>
                    <td><h5>$cour_subcat</h5></td>
                    <td><h5>$section_id</h5></td>
                    <td><h5>$cour_status</h5></td>
                    <td>
                        <div class='media'>
                        <div class='d-flex'>
                        <a href='edit_course.php?cour_id=$cour_id'>
                            <img src='../../commons/decep_images/edit_icon.png' width='30' height='30' alt='Edit' />
                        </a>
                        </div>
                        </div>
                    </td>
                </tr>";
    }
}

function getAdminCategory(){
             
    global $dbc;

    //Determinar columna para ordenar.
    if(isset($_GET['order']))
    $orden=$_GET['order'];
    else
    $orden = 'r';

    switch($orden)
    {
        case 'a': $order_by = 'cat_name ASC';
            break;
            
        case 'z': $order_by = 'cat_name DESC';
            break;

        case 'r': $order_by = 'cat_name ASC';
            break;
            
        default: $order_by = 'cat_name ASC';
    }
    

    $get_cat = "SELECT * FROM category ORDER BY $order_by";

    $run_cat = mysqli_query($dbc, $get_cat);

    while($row_cat=mysqli_fetch_array($run_cat))
    {
        $cat_id       =  $row_cat['cat_id'];
        $cat_name     =  $row_cat['cat_name'];
        $cat_image    =  $row_cat['image'];
        $cat_status   =  $row_cat['cat_status'];
                    
        echo    "<tr>
                    <td><h5>$cat_id</h5></td>
                    <td><h5>$cat_name</h5></td>
                    <td>
                        <div class='media'>
                        <div class='d-flex'>
                            <img src='../../commons/decep_images/cursos/$cat_image' width='100' height='90' alt='' />
                        </div>
                        </div>
                    </td>
                    <td><h5>$cat_status</h5></td>
                    <td>
                        <div class='media'>
                        <div class='d-flex'>
                        <a href='edit_category.php?cat_id=$cat_id'>
                            <img src='../../commons/decep_images/edit_icon.png' width='30' height='30' alt='Edit' />
                        </a>
                        </div>
                        </div>
                    </td>
                </tr>";
    }
}
    
function getAdminSubcategory(){
             
    global $dbc;

    //Determinar columna para ordenar.
    if(isset($_GET['order']))
    $orden=$_GET['order'];
    else
    $orden = 'r';

    switch($orden)
    {
        case 'a': $order_by = 'subcat_name ASC';
            break;
            
        case 'z': $order_by = 'subcat_name DESC';
            break;

        case 'r': $order_by = 'subcat_name ASC';
            break;
            
        default: $order_by = 'subcat_name ASC';
    }
    

    $get_subcat = "SELECT * FROM subcategory ORDER BY $order_by";

    $run_subcat = mysqli_query($dbc, $get_subcat);

    while($row_subcat=mysqli_fetch_array($run_subcat))
    {
        $subcat_id       =  $row_subcat['subcat_id'];
        $subcat_name     =  $row_subcat['subcat_name'];
        $subcat_image    =  $row_subcat['image'];
        $subcat_status   =  $row_subcat['subcat_status'];
                    
        echo    "<tr>
                    <td><h5>$subcat_id</h5></td>
                    <td><h5>$subcat_name</h5></td>
                    <td>
                        <div class='media'>
                        <div class='d-flex'>
                            <img src='../../commons/decep_images/cursos/$subcat_image' width='100' height='90' alt='' />
                        </div>
                        </div>
                    </td>
                    <td><h5>$subcat_status</h5></td>
                    <td>
                        <div class='media'>
                        <div class='d-flex'>
                        <a href='edit_subcategory.php?subcat_id=$subcat_id'>
                            <img src='../../commons/decep_images/edit_icon.png' width='30' height='30' alt='Edit' />
                        </a>
                        </div>
                        </div>
                    </td>
                </tr>";
    }
}

function getAdminSection(){
             
    global $dbc;

    //Determinar columna para ordenar.
    if(isset($_GET['order']))
    $orden=$_GET['order'];
    else
    $orden = 'r';

    switch($orden)
    {
        case 'a': $order_by = 'section_name ASC';
            break;
            
        case 'z': $order_by = 'section_name DESC';
            break;
            
        case 'h': $order_by = 'price DESC';
            break;
            
        case 'l': $order_by = 'price ASC';
            break;

        case 'r': $order_by = 'section_name ASC';
            break;
            
        default: $order_by = 'section_name ASC';
    }
    

    $get_section = "SELECT * FROM section ORDER BY $order_by";

    $run_section = mysqli_query($dbc, $get_section);

    while($row_section=mysqli_fetch_array($run_section))
    {
        $section_id       =  $row_section['section_id'];
        $section_name     =  $row_section['section_name'];
        $course_id        =  $row_section['course_id'];
        $section_semester =  $row_section['semester'];
        $section_year     =  $row_section['year'];
        $section_capacity =  $row_section['capacity'];
        $section_room     =  $row_section['room'];
        $section_timeslot =  $row_section['time_slot_id'];
        $section_status   =  $row_section['status'];
                    
        echo    "<tr>
                    <td><h5>$section_id</h5></td>
                    <td><h5>$section_name</h5></td>
                    <td><h5>$course_id</h5></td>
                    <td><h5>$section_semester</h5></td>
                    <td><h5>$section_year</h5></td>
                    <td><h5>$section_capacity</h5></td>
                    <td><h5>$section_room</h5></td>
                    <td><h5>$section_timeslot</h5></td>
                    <td><h5>$section_status</h5></td>
                    <td>
                        <div class='media'>
                        <div class='d-flex'>
                        <a href='edit_section.php?section_id=$section_id'>
                            <img src='../../commons/decep_images/edit_icon.png' width='30' height='30' alt='Edit' />
                        </a>
                        </div>
                        </div>
                    </td>
                </tr>";
    }
}

?>