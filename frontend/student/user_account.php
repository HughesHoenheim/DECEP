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
        
        $get_user_info = "select * from user WHERE user_id={$_SESSION['user_id']}";

        $run_user_info = mysqli_query($dbc, $get_user_info);

        while ($row_user_info=mysqli_fetch_array($run_user_info)){

            $firstname = $row_user_info['firstname'];
            $lastname = $row_user_info['lastname'];
            $email = $row_user_info['email'];
            $phone = $row_user_info['phone'];
            $image = $row_user_info['user_img'];
            $user_satatus = $row_user_info['user_status'];
        }

        ?>

    <div class="register-login-section spad">
        <br>
        <div class="container" style="background: white">
            <div class="row">
                <div class="col-lg-7 offset-lg-2">
                    <h1 style="font-family: serif" style="text-align: inherit">My Account </h1>
                    <?php $customer_id = $_SESSION['user_id']; ?>
                    <?php 
                    echo "<a href=\"./edit_account.php?user_id=$customer_id\" class=\"btn header-btn\" style=\"background-color:#FBC20E\">
                    Edit Account Info</a> <a href=\"./edit_account.php?user_id=$customer_id\" class=\"btn header-btn\" style=\"background-color: #FBC20E\">View My Orders</a>"
                    ?>
                        <div id="user_info">
                            <div class="col-md-6 form-group p_star">
                            <br>
                            <img  width="250" height="250" style="border-radius: 50%" align="right" src="../../commons/user_images/<?php echo $image; ?>">
                            </div><br>
                            <?php
                            echo "Name: $firstname $lastname<br>";
                            echo "Email: $email<br>";
                            echo "Phone: $phone";
                            ?>
                        </div>
            </div>
                
        </div>
        </div>         
</div>
        
    </main>
<?php 
        
    include('assets/includes/footer.html');

?>
               