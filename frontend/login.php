<!DOCTYPE html>
<?php 
        
        include("../commons/assets/includes/header.php");
       

?>


<html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) 
		{ //conectarme a ver si existe usuario    
			if(include_once('../commons/assets/includes/connectiondb.php')) // Conectarse al servidor SQL
	   		{
                $email = $_POST['email'];
                $password = $_POST['password'];

            //    echo "<br><h3>Email: $email</h3>";
            //    echo "<h3>Password: $password</h3><br>";
                $query = "SELECT * FROM user WHERE email = '$email'  AND pass = '$password'";
                $r = mysqli_query($dbc, $query);
                
                $query2 = "SELECT * FROM admin WHERE email = '$email'  AND pass = '$password'";
                $r2 = mysqli_query($dbc, $query2);
                
                $query3 = "SELECT * FROM instructor WHERE email = '$email'  AND pass = '$password'";
                $r3 = mysqli_query($dbc, $query3);
                
                if ($row = mysqli_fetch_array($r))
                {
                    if ( (strtolower($_POST['email']) == $row['email']) && ($_POST['password'] ==$row['pass']) && ($row['user_status'] == 'active') )
                    { // El usuario existe en la tabla de customer.
      
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name'] = $row['firstname'];

                        // echo "query1= $query";
                        // echo "query2= $query2";
                        // echo "customer id in session= ". $_SESSION['cust_id'];
                        // echo "customer name in session= ". $_SESSION['cust_name'];

                       // header('Location: index.php');
                        
                      echo "<meta http-equiv=\"refresh\" content=\"0;url=student/index.php\">"  ;
                     exit();
                    }
                    else{
                        print '<h3>Su cuenta aparenta estar inactiva! Por favor contacte un administrador para restaurar el acceso a su cuenta.<br><br><a href="login.php"> Login </a></h3>';
                    }
                }
                else if($row2 = mysqli_fetch_array($r2))
                {
                    if ( (strtolower($_POST['email']) == $row2['email']) && ($_POST['password'] ==$row2['pass']) && ($row2['admin_status'] == 'active') )
                    {//El usuario es admin.
                        
                        $_SESSION['admin_name'] = $row2['firstname'];
                        $_SESSION['admin_id'] = $row2['admin_id'];
                        //header('Location: admin/index.php');
                         echo "<meta http-equiv=\"refresh\" content=\"0;url=../backend/admin/index.php\">";
                        exit();
                    }
                }
                    else if($row3 = mysqli_fetch_array($r3))
                {
                    if ( (strtolower($_POST['email']) == $row3['email']) && ($_POST['password'] ==$row3['pass']) && ($row3['inst_status'] == 'active') )
                    {//El usuario es instructor.
                        
                        $_SESSION['instructor_name'] = $row3['firstname'];
                        $_SESSION['instructor_id'] = $row3['inst_id'];
                        //header('Location: instructor/index.php');
                         echo "<meta http-equiv=\"refresh\" content=\"0;url=instructor/index.php\">";
                        exit();
                    }
                }
                else 
                { // Usuario no existe en la tabla

                    print '<h3>El email y/o password entrados no concuerdan con nuestros archivos!<br><br>
                    Vuelva a intentarlo.<a style=color:blue; href="login.php"> Login </a></h3>';

                }
			}
			else
				print'<p> No se pudo conectar a servidor MYSQL</p>';
		
        }
        else
        {
            // No entró uno de los campos

            print '<p>Asegúrese de entrar su username y password. Vuelva a intentarlo...<br /><a href="login.php"> Login </a></p>';



        }
} 
else // No llegó por un submit, por lo tanto hay que presentar el formulario
{  
?>


    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="../../DECEP/commons/DECEP_IMG/loginbanner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>¿Primera vez que nos visitas?</h2>
                            <p>¡Crea una cuenta! Para que puedas adquirir nuestros cursos ofrecidos.</p>
                            <a href="register.php" class="btn_3">Crear Cuenta</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Bienvenidos! <br><br>
                                Iniciar Sesi&oacute;n</h3>
                            <form class="row contact_form" acction= "login.php" method="post" >
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" 
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="pass" name="password" required
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Recordar</label>
                                    </div>
                                    <button type="submit" name="submit" class="btn_3">
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
<?php 

}

?>
    <!--================login_part end =================-->


<?php 
        
    include('../commons/assets/includes/footer.html');

?>
    </html>