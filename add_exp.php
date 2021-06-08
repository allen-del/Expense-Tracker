<?php
  session_start();
  error_reporting(0);
  include "./connect.php";
  if (!isset($_SESSION['userid'])) {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    header('location:logout.php');
  }   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Expenses- Expense Tracking System</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
</head>
<body>
<div class="loginhead"><h1 class="ets">Your Expense Tracking System™</h1></div>
<form action="./add_exp2.php" method="POST"> 
    <h2>Add in your expenses: <?php echo $_SESSION['username']?></h2>
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

      <button type="submit" class="addbtn">Add</button>

</form>
		
</body>
</html>
