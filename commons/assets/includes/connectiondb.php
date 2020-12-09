<?php 

//Coneccion a Base de Datos local.

   $host = 'localhost';
   $username = 'root';
   $password = '';
//$password = 'Jo846104895';
   $db = 'decep_db';

//----------------------------------------------------
//Coneccion Base de Datos Remota
      // $host = '136.145.29.193';
      // $username = 'hirverme';
      // $password = 'hirverme840$cuta';
      // $db = 'hirverme_db';
            
    $dbc = @mysqli_connect($host, $username, $password, $db)
            OR die('Conection could not be made to MySQL: '.mysqli_connect_error());

    mysqli_set_charset($dbc, 'utf8');

?>