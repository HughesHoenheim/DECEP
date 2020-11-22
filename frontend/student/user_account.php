<?php 
        
  include('assets/includes/header.php');
        
        

?>

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

        <div class="container">
            <div class="row">


                <div class="col-lg-5 offset-lg-1">
                    <h2 style="font-family: serif" style="text-align: center">My Account</h2><br>
                    

                    <div id="info">
                        <?php 
                            echo "Name: $firstname  $lastname<br>";
                            echo "Email: $email<br>";
                            echo "Phone: $phone<br>";
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
               