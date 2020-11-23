<?php 
        
  include('assets/includes/header.php');
        
        

?>
<style>
#user_info{
  font-size: 20px;
/*  float: left;*/
  margin-bottom: 50px;
}

</style>



    <main>

        
        <?php 

if(isset($_GET['user_id']))
{
    $customer_id = $_GET['user_id'];

    $query = "SELECT firstname, lastname, phone, user_img
                FROM user
                WHERE user_id={$_GET['user_id']}";

    
    if ($r = mysqli_query($dbc, $query))
        {
        $row = mysqli_fetch_array($r);
        
        $_SESSION['user_img'] = $user_img = $row['user_img'];

    ?>

    <div class="register-login-section spad">
        <br>
        <div class="container" style="background: white">
            <div class="row">
                <div class="col-lg-7 offset-lg-2">
                <?php $customer_id = $_SESSION['user_id']; ?>
                    <h1 style="font-family: serif" style="text-align: inherit">Edit Account</h1>
                    <form action="edit_account.php" method ="post" class="row contact_form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                            <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label>
                                <input type="text" name ="firstname" value="<?php echo $row['firstname'];?>" id="fir" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input type="text" name ="lastname" value="<?php echo $row['lastname'];?>" id="last" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" name ="phone" value="<?php echo $row['phone'];?>" id="phone" required>
                            </div>
                            <div class="col-lg-6">
                            <label for="myFile"><br>&nbsp;&nbsp;&nbsp;&nbsp;Profile Picture<span>*</span></label>
                                <?php echo "<img width=\"300\" height=\"170\" style=\"border-radius: 50%\"
                                            src=\"../../commons/user_images/$user_img\">"; ?>
                                <input type="file" name="profileimg" id="myFile">
<!--                            <input type="file" name ="profileimg" value="<-?php echo $row['cust_img'];?>" id="myFile" required>-->
                            </div> 

                            <div class="col-lg-12">
<!--
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
-->
                                <div class="order-btn">
                                    <br>
                                    <button  type="submit" name="save_changes" class="btn header-btn" >Save Changes</button>
                                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>" />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                    
                    
                    <?php
    }
    else
        {print '<h3 style="color:red;">No se puede mostrar la información del usuario ya que ocurrió el error:<br />' . mysqli_error($dbc) . '</h3>';}      
}                                      
else if(isset($_POST['user_id']))
{
    //Getting the text data from the fields.
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
    
    //Getting the image from the fields.
        if(empty($_FILES['profileimg']['name'])){
            //echo "<script>alert('Guachet! Adentro IF!')</script>";
            $customer_image = $_SESSION['user_image'];
        }
        else{
            //echo "<script>alert('Guachet! Adentro ELSE!')</script>";
            $customer_image = $_FILES['profileimg']['name'];
            $customer_image_tmp = $_FILES['profileimg']['tmp_name'];
            move_uploaded_file($customer_image_tmp,"../../commons/user_images/$customer_image");
        }

        //Query variable for inserting data to database.
        //To test if it works, use an echo command before 
        //query variable and try page with dummy data.
        $update_info = "UPDATE customer 
        SET firstname=\"$firstname\", lastname=\"$lastname\", phone=\"$phone\", user_img=\"$customer_image\"
        WHERE user_id={$_POST['user_id']}";

        // echo $insert_billing;
        //Query for insert.
        $run_update_info = mysqli_query($dbc, $update_info);

        if($run_update_info) {
            echo "<script>alert('User info has been updated!')</script>";
            echo "<script>window.open('user_account.php','_self')</script>";
        }
        else{
            echo"<script>alert('NO CORRE!')</script>";
        }
}
                                       
else
{
   print '<h3 style="color:red;">Esta página ha sido accedida por error!</h3>';
}


?>
            </div>
                
        </div>
        </div>         
</div>
        
    </main>
<?php 
        
    include('assets/includes/footer.html');

?>
               