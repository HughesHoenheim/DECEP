<?php
session_start();
session_unset();
session_destroy();
$_SESSION = array();
header('Location: ../../frontend/index.php');

//Old version?
// session_start();
// session_unset();
// $_SESSION = array();
// session_destroy();
?>