<?php 

//Coneccion a Base de Datos.

   $host = 'localhost';
   $username = 'root';
$password = '';
    //    $password = 'Jo846104895';
   $db = 'decep_db';
            
    $dbc = @mysqli_connect($host, $username, $password, $db)
            OR die('Conection could not be made to MySQL: '.mysqli_connect_error());

    mysqli_set_charset($dbc, 'utf8');

    //Codigo para error de tutorial.
    // if (mysqli_connect_errno()) {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }

?>