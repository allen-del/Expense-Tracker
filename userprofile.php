<?php
    include "./connect.php";
    session_start();;
    $userid=$_SESSION['userid'];
    $username=$_SESSION['username'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile-Expense Tracking System</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">

</head>
<body>
    <div class="loginhead"><h1 class="ets">Your Expense Tracking System™</h1></div>
    <div class="userow">
    <div class="pfp"><img src="assets/avatar-placeholder.png" alt="Default Grey User Profile Picture"></div>
    <div class="userdata">
    <h2>Username : <?php echo $_SESSION['username']?></h2>
    <h2>UserID &emsp; : <?php echo $_SESSION['userid']?></h2>
</div>
    </div>
    <br><br>
    <a href="change_pass.php" class="passbtn">Change Password</a>
    <a href="menu.html" class="menubtn">Return to Menu</a>
    
    
</body>
</html>