<?php 
        
    include('assets/includes/header.php');
    if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?>

  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="../../commons/DECEP_IMG/loginbanner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Cursos</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
                
                     <?php
                                
                                 
                                
                                    if(!empty($_SESSION["shopping_cart"]))
                                    {
                                        $total=0;
                                        foreach ($_SESSION["shopping_cart"] as $keys => $values)
                                        {
                                           
                                            $img_id=$values['item_id'];
                                            //Query para solo cojer la imagen del producto utilizando el id de la bd = id del array shopping_cart
                                            $get_cour = "select image from course where course_id ='$img_id'";
                                            $run_cour = mysqli_query($dbc, $get_cour);
                                
                                                if($row_cour=mysqli_fetch_array($run_cour))
                                                    $cour_image = $row_cour['image'];
                                            {
              
                                ?>
                
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="../../../DECEP/commons/decep_images/cursos/<?php echo $cour_image; ?>" alt="" />
                        <?php } ?>
                    </div>
                      
                    <div class="media-body">
                      <p><?php echo $values["item_name"]; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5><?php echo $values["item_price"]; ?></h5>
                </td>
                <td>
                  <div class="product_count">
                    <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                      class="input-text qty input-number" />
                    <button
                      class="increase input-number-increment items-count" type="button">
                      <i class="ti-angle-up"></i>
                    </button>
                    <button
                      class="reduced input-number-decrement items-count" type="button">
                      <i class="ti-angle-down"></i>
                    </button> -->
                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                    <input class="input-number" type="text" value="<?php echo $values["item_quantity"]; ?>" min="0" max="10">
                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                  </div>
                </td>
                <td>
                  <h5>$<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></h5>
                </td>
                     <td> <a class="btn_1" href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"/>Delete</td>
              </tr>
                
              <?php
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    }
                                    $_SESSION['total'] =$total
                                 
                                ?>
<!--
              <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr>
-->
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5><span>$ <?php echo number_format($total, 2); ?></span></h5>
                </td>
              </tr>
            <!--  <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <li>
                        Flat Rate: $5.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Free Shipping
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Flat Rate: $10.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li class="active">
                        Local Delivery: $2.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                    </ul>
                    <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                      <option value="1">Bangladesh</option>
                      <option value="2">India</option>
                      <option value="4">Pakistan</option>
                    </select>
                    <select class="shipping_select section_bg">
                      <option value="1">Select a State</option>
                      <option value="2">Select a State</option>
                      <option value="4">Select a State</option>
                    </select>
                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a>
                  </div>
                </td>
              </tr> -->
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
<!--            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Checkout</a>-->
              
              
               <form action="cart.php" method="post" enctype="multipart/form-data">
                                
                                <input type="submit" class="btn_1 checkout_btn_1" name="add_to_cartDB" value="CHECK OUT">
                                </form>
              
              
          </div>
            <?php 
                                 }
                                 else {
                                    print '<table>
                                    </table>';
                                    echo "<h2 style='text-align:center; color:red;'>Your Shopping Cart is Empty!</h2>";
                                }
					        ?>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->




<?php 
        
        include('assets/includes/footer.html');

?>