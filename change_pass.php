<?php
    include "./connect.php";
    session_start();

    if (isset($_POST["submit"]))
    {
        $q = "SELECT password FROM users WHERE userid =" . $_SESSION["userid"];
        $curr_pass=md5($_POST["cpass"]);
        $password = $_POST["pass"];
        $confirmPassword = $_POST["pass_repeat"];
        $result = mysqli_query($mysqli, $q);
        $storedPassword=mysqli_fetch_array($result);
        if($storedPassword['password']==$curr_pass) {
            if ( $password == $confirmPassword ) {
                $password = md5($password);    
                $query = "UPDATE users SET `password`= $password WHERE userid =". $_SESSION["userid"];
            
                if ( mysqli_query($mysqli, $query) ) {
                echo "<script type='text/javascript'>alert(\"Password Changed!\")</script>";
                include("menu.html");}
                else {
                    echo "<script type='text/javascript'>alert(\"Unknown Error occured! Try Again!\")</script>";
                    include("change_pass.php");}
            } else {
                echo "<script type='text/javascript'>alert(\"Passwords don't match!\")</script>";
                include("change_pass.php"); 
            }
        } else {
            echo "<script type='text/javascript'>alert(\"Wrong Password! Try Again!\")</script>";
            include("change_pass.php");
        }
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password-Expense Tracking System</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
    <div class="loginhead"><h1 class="ets">Your Expense Tracking System™</h1></div>
    <form action="./change_pass.php" method="POST">
    <h1>Password Reset</h1>
    <h3 class="createacc">Change Password</h3>
    <hr>
    <br>

    <label for="cpass"><b>Current Password</b></label><br>
    <input type="password" placeholder="Enter Current Password" name="cpass" required>
    <br><br>

    <label for="pass"><b>New Password</b></label><br>
    <input type="password" placeholder="Enter New Password" name="pass" required>
    <br><br>

    <label for="pass-repeat"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="pass_repeat" required>
    <br>
    <br>

      <button style="font-size: 15px;" type="submit" class="signupbtn">Continue</button>
      <a href="menu.html" class="menubtn">Return to Menu</a>

    </form>
    
</body>
</html>