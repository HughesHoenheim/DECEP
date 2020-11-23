<?php 
        
                include('../commons/assets/includes/header.php');


?>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="../../DECEP/commons/DECEP_IMG/loginbanner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Registrarse</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    
    
    <style>
.dropbtn {
  background-color: #ED8A53;
  color: white;
  padding: 12px;
  font-size: 16px;
  border: none;
}

.dropdown {
/*  position: relative;*/
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #000000;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #FFAA6F;}
</style>
        
        
    
    <?php
    
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) 
    { //conectarme a ver si existe usuario    
        if(include_once('../commons/assets/includes/connectiondb.php')) // Conectarse al servidor SQL
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $con_pass = $_POST['con_pass'];

//            echo "<br><h3>Email: $email</h3>";
//            echo "<h3>Password: $password</h3><br>";
            
            $query = "SELECT * FROM user WHERE email = '$email'  AND pass = '$password'";
            $r = mysqli_query($dbc, $query);
            
            if ($row = mysqli_fetch_array($r))
                {
                    if ( (strtolower($_POST['email']) == $row['email']))
                    { // El usuario existe en la tabla customer... escoger otro email o password

                        echo "<h3 style='color:red;'>Email y/o Password escogidos ( ".$_POST['email']." , ".$_POST['password']." )
                         ya existen, por favor escoger otro o haga login.</h3>";

                        echo "<h4><a href='login.php'> Login </a></h4><br>";
                        echo "<h4><a href='register.php'> Volver a Intentar </a></h4>";

                    } 
                }
            else 
                { // Usuario NO existe en tabla customer.

                    if ($password == $con_pass)
                    {//Passwords entrados concuerdan.
                    //Hacer query de insert.
        
                        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
                        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);



                        //Query para insertar usuario.
                        $query3 = "INSERT INTO user
                                    (firstname, lastname, email, pass, phone)
                            VALUES ('".$firstname."','".$lastname."', '".$email."', '".$password."', '".$phone."')";

                        echo "<h3>$query3</h3>";
                        
                        $r3 = mysqli_query($dbc,$query3);


                        if(mysqli_affected_rows($dbc) == 1)
                        {
                            print '<h3> User has been succesfully inserted!</h3>';
                            
                            $query4 = "SELECT * FROM user WHERE email = '$email' AND pass = '$password'";
                            $r4 = mysqli_query($dbc, $query4);

                            if ($row4 = mysqli_fetch_array($r4))
                            {
                                $_SESSION['user_id'] = $row4['user_id'];
                                $_SESSION['user_name'] = $row4['firstname'];
                                echo "<meta http-equiv=\"refresh\" content=\"0;url=student/index.php\">"  ;    
                                exit();
                            }
                        }
                        else
                            print '<h3 style="color:red;">No se pudo insertar al usuario porque:<br />' . mysqli_error($dbc) . '</h3>';   
                        mysqli_close($dbc);
                        
                    }//Passwords no concuerdan!!!
                    else
                    {
//                      print '<h3>Passwords no concuerdan!!!</h3>';
                        $err_message = 'Passwords dont match!';
                        $_SESSION['err_mess'] = $err_message;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['email'] = $email;
                        $_SESSION['phone'] = $phone;
                        
                        
                          echo "<meta http-equiv=\"refresh\" content=\"0;url=register.php\">"  ;
                        exit();
                    }

                }
        }
        else
            print'<h3> No se pudo conectar a servidor MYSQL</h3>';

    }
    else
    {
        // No entró uno de los campos

        print '<h3>Asegúrese de entrar su email y password. Vuelva a intentarlo...<br /><a href="register.php"> Registrar </a></h3>';



    }
} 
else // No llegó por un submit, por lo tanto hay que presentar el formulario
{  
    if(empty($_SESSION['email']))
    {
        $_SESSION['firstname'] = ""; 
        $_SESSION['lastname'] = ""; 
        $_SESSION['email'] = "";
        $_SESSION['err_mess'] = "";
    }
    
?>


            <center><div class="col-lg-8">
                <br><br>
<!--            <center><h2>Registrarse</h2></center>-->
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <label for="name" style="color: black">First Name *</label>
                <input type="text" id="name" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" required>
              </div>
              <div class="col-md-6 form-group p_star">
                <label for="name" style="color: black">Last Name </label>
                <input type="text" id="name" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
              </div>
<!--
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
              </div>
-->
             <div class="col-md-6 form-group p_star">
                <label for="username" style="color: black">Email Address *</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
              </div>
              
              <div class="col-md-6 form-group p_star">
                <label for="pass" style="color: black">Password *</label>
                <input type="password" id="pass" name="password" required>
              </div>
              
              <div class="col-md-6 form-group p_star">
                <label for="con-pass" style="color: black">Confirm Password * 
<!--                <span style="color: red; text-shadow: 1px 1px 1px red;"><?php echo $_SESSION['err_mess']; ?></span></label>-->
                <input type="password" id="con-pass" name="con_pass" required>
              </div>
              
              
              <div class="col-md-6 form-group p_star">
                <label for="phone" style="color: black">Phone*   </label>
                <input type="phone" id="phone" name="phone">
              </div>
              
              
<!--
              <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">Country</option>
                  <option value="2">Country</option>
                  <option value="4">Country</option>
                </select>
              </div>
-->
    
<!--
              <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">District</option>
                  <option value="2">District</option>
                  <option value="4">District</option>
                </select>
              </div>
-->
<!--
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
              </div>
-->
<!--
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <input type="checkbox" id="f-option2" name="selector" />
                  <label for="f-option2">¿Crear Cuenta?</label>
                </div>
              </div>
-->
              <div class="col-md-12 form-group">
<!--
                <div class="creat_account">
                  <h3>Shipping Details</h3>
                  <input type="checkbox" id="f-option3" name="selector" />
                  <label for="f-option3">Ship to a different address?</label>
                </div>
-->
<!--
                <textarea class="form-control" name="message" id="message" rows="1"
                  placeholder="Order Notes"></textarea>
-->
              </div>
              <button type="submit" name="submit">CREATE ACCOUNT</button>
            </form>
          </div>
<!--            <a class="btn_3" href="#">Crear Cuenta</a>-->


</center>

    <!--================login_part Area =================-->
<!--
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>¿Primera vez que nos visitas?</h2>
                            <p>¡Crea una cuenta! Para que puedas adquirir nuestros cursos ofrecidos.</p>
                            <a href="#" class="btn_3">Crear Cuenta</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Bienvenidos! <br><br>
                                Iniciar Sesi&oacute;n</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Recordar</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                        Login
                                    </button>
                                    <a class="lost_pass" href="#">¿Olvidó su contraseña?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!--================login_part end =================-->


<?php 
}
    include('../commons/assets/includes/footer.html');
?>
