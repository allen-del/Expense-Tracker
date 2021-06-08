<?php 
    include "./connect.php";
    session_start();

    if ( !$mysqli ) echo "Connection to DB was unsuccessful";
    
    if (isset($_SESSION['uname'])) header("location:logout.php");
    $username = $_POST["uname"];
    $password = $_POST["pass"];
    $confirmPassword = $_POST["pass_repeat"];
    if ( $username ) {
      if ( $password == $confirmPassword ) {
        $password = md5($password);
        
        $query = "INSERT INTO users (username, `password`) VALUES ('$username', '$password')";
        
        if ( mysqli_query($mysqli, $query) ) {
          $_SESSION['uname'] = $username;
          header('location:logout.php');
        } else {
          echo "<script type='text/javascript'>alert(\"Username already taken!\")</script>";
          include("register.html");  
        }
      } else {
        echo "<script type='text/javascript'>alert(\"Passwords don't match!\")</script>";
        include("register.html"); 
      }
    }    
?>