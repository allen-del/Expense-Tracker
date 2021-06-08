<?php
session_start();

include "./connect.php";

$username=$_POST["uname"];
$password=md5($_POST["pass"]);

$query= "SELECT * FROM users WHERE username='$username' AND `password`='$password'";

$result = mysqli_query($mysqli, $query);

      if ( mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $row = mysqli_fetch_array($result);
        $_SESSION["userid"] = $row["userid"];
        header("location:menu.html");
      } else {
        echo "<script type='text/javascript'>alert(\"Invalid Username or Password!\")</script>";
        include("index.html");
      }
?>
