<?php
session_start();
include "./connect.php";
  	$userid=$_SESSION['userid'];
    $expdate=$_POST['expdate'];
    $expitem=$_POST['expitem'];
    $expspent=$_POST['expspent'];
    $query=mysqli_query($mysqli, "INSERT INTO expense(userid,expdate,expitem,expspent) value($userid,'$expdate','$expitem', $expspent)");
    if($query){
      header("location:menu.html");
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
    }
?>