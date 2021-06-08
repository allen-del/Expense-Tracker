<?php

session_start();


$_SESSION = array();
 

session_destroy();

echo "<script type='text/javascript'>alert(\"Logged Out!\")</script>";
include("index.html");

exit;
?>