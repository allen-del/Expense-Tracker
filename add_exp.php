<?php
session_start();
error_reporting(0);
include "./connect.php";
if (!isset($_SESSION['userid'])) {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    header('location:logout.php');
  } 
if(isset($_POST['submit']))
  {
  	$userid=$_SESSION['userid'];
    $expdate=$_POST['expdate'];
    $expitem=$_POST['expitem'];
    $expspent=$_POST['expspent'];
    //$query=mysqli_query($mysqli, "INSERT INTO expense(userid,expdate,expitem,expspent) value($userid,'$expdate','$expitem', $expspent)");
    echo "<script>alert(INSERT INTO expense(userid,expdate,expitem,expspent) value($userid,'$expdate','$expitem', $expspent));</script>";
    sleep(3);
if($query){
header("location:menu.html");
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}
  
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign-up Expense Tracking System</title>
	<link href="css/styles.css" rel="stylesheet">
	
</head>
<body>
<div class="loginhead"><h1 class="ets">Your Expense Tracking System™</h1></div>
<form action="./add_exp2.php" method="POST">
    <h2>Add in your expenses <?php echo $_SESSION['username']; ?></h2>
    <hr>

    <label for="expdate"><b>Expense Date</b></label><br>
    <input type="date" name="expdate" required>
    <br><br>

    <label for="expitem"><b>Expense Date</b></label><br>
    <input type="text" placeholder="Item Name" name="expitem" required>
    <br><br>

    <label for="expspent"><b>Amount spent</b></label><br>
    <input type="number" placeholder="$" name="expspent" required>
    <br><br>

    <br>
    <br>

      <button type="submit" class="addbtn">Add</button>

</form>
		
</body>
</html>