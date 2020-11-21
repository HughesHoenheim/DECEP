<?php 
        
        include('assets/includes/header.php');
       

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
            
            'item_id'       => $_GET["id"],
            'item_name'     => $_POST["hidden_name"],
            'item_price'    => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
            
            );
            $_SESSION["shopping_cart"][$count] =  $item_array;
            echo '<script>alert("Item Added to cart!")</script>'; 
            echo '<script>window.location="course.php"</script>'; 
        }
        else
        {
           echo '<script>alert("Item Already Added")</script>'; 
            echo '<script>window.location="shop.php"</script>'; 
        }
    }
    else
    {
        $item_array = array(
            'item_id'       => $_GET["id"],
            'item_name'     => $_POST["hidden_name"],
            'item_price'    => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        echo '<script>alert("Item Added to cart!")</script>'; 
        echo '<script>window.location="course.php"</script>'; 
    }
    
}

?>

    <!-- slider Area Start-->
    <div class="slider-area ">
        
        <!-- Mobile Menu -->
<!--
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="../DECEP/DECEP_IMG/banner2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Curso</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->
    </div>

    <!-- slider Area End-->

  <!--================Single Product Area =================-->
<?php
                    if(isset($_GET['cour_id'])){

                    $course_id = $_GET['cour_id'];

                    $get_cour = "select * from course where course_id='$course_id'";

                    $run_cour = mysqli_query($dbc, $get_cour);

                        if ($row_cour=mysqli_fetch_array($run_cour)){

                            $pro_id = $row_cour['course_id'];
                            $pro_name = $row_cour['course_name'];
                            $pro_image = $row_cour['image'];
                            $pro_desc =  $row_cour['description'];
                            $pro_price = $row_cour['price'];
                            $contact_hours=$row_cour['contact_hours'];
                        } 
                    }
        
                ?>
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
    
        <div class="col-lg-8">
            
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
              <img src="../../commons/decep_images/cursos/<?php echo $row_cour['image'] ?>" alt="#" class="img-fluid">
            </div>
         
            
          </div>
        </div>
        <div class="col-lg-8">
           <form method="post" action="single-product.php?action=add&id=<?php echo $row_cour['course_id']; ?>">
          <div class="single_product_text text-center">
            <h3><?php echo $row_cour['course_name']; ?></h3>
            <p>
                 <?php echo $pro_desc; ?>
            </p>
            <div class="card_area">
                <div class="product_count_area">
                    <p>Cantidad</p>
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="text" name="quantity" value="1" min="0" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div>
                    <p> <?php echo $contact_hours; ?> horas de Contacto | Costo: <?php echo $pro_price ?></p>
                </div>
                <div class="add_to_cart">
                 <!-- <a href="#" class="btn_3">Agregar al Carro</a> <a href="checkout.php" class="btn_3">Comprar ahora</a>-->
                 <input type="submit" name="add_to_cart" style="align=right " class="btn_3" value="Agregar al Carro"/>
              </div>
                <input type="hidden" name="hidden_name" value="<?php echo $pro_name; ?>"/>
                <input type="hidden" name="hidden_price" value="<?php echo $pro_price; ?>"/>
<!--
              <div class="checkout">
                  <a href="checkout.php" class="btn_3">Comprar ahora</a>
              </div>
-->
            </div>
          </div>
        </form>
       </div>
            
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
   <!-- subscribe part here -->
<!--
   <section class="subscribe_part section_padding">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="subscribe_part_content">
                      <h2>Get promotions & updates!</h2>
                      <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                      <div class="subscribe_form">
                          <input type="email" placeholder="Enter your mail">
                          <a href="#" class="btn_1">Subscribe</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
-->
  <!-- subscribe part end -->

                 <?php 
        
        include('assets/includes/footer.html');

?>