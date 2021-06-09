<?php
    include "./connect.php";
    session_start();;
    if (!isset($_SESSION["userid"])) header("location:index.html");
    if (!isset($_POST["submit"])) {
        $month = $_POST["month"];
        $year = $_POST["year"];

        $q1 = "SELECT * FROM expense WHERE userid = '" . $_SESSION["userid"] . "' AND expdate LIKE '$year-0$month%' ORDER BY expdate";
        $q2=  "SELECT * FROM expense WHERE userid = '" . $_SESSION["userid"] . "' AND expdate LIKE '$year-$month%' ORDER BY expdate";
        if($month<10){
        $result = mysqli_query($mysqli, $q1);}
        else{
        $result = mysqli_query($mysqli, $q2);
        }
        $rows = mysqli_num_rows($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Expense Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="loginhead"><h1 class="ets">Your Expense Tracking System™</h1></div>
    <h2>Monthly Expense Report</h2>
    <hr>
    
    <form action="./monthly.php" method="POST">
        <label for="month">Month:</label>
        <br><br>
        <input type="number" placeholder="Month from 01 to 12" min="01" max="12" id="month" name="month"> 
        <br><br><br>
        <label for="year">Select the Year:</label>
        <br><br>
        <input type="number" placeholder="Year" min="1990" max="2021" id="year" name="year"> 
        <br><br>
        <input type="submit" value="Search 🔎" class="searchbtn">
        <a href="menu.html" class="menubtn">Menu</a>
        <br><br><br>
    </form>
    <?php 
        if ( $rows == false ) {
            echo "No expense found for the given Month and Year";
        } else { 
            echo "Here's the list of Expenses <br><br>";
            echo '<div>';
            echo "<TABLE BORDER='1' ALIGN=\"LEFT\">";
            echo "<TR>";
            echo "<TH>&nbsp;Date of Spending&nbsp;</TH>";
            echo "<TH>&nbsp;Item/Service&emsp;</TH>";
            echo "<TH>&nbsp;Amount&nbsp;</TH>";
            echo "</TR>";
            while ( $row = mysqli_fetch_array($result) ) {
                echo "<TR>";
                echo "<TD>".$row['expdate']."</TD>";
                echo "<TD>".$row['expitem']."</TD>";
                echo "<TD>".$row['expspent']."</TD>";
                echo "</TR>";
            }
            echo '</div>';
        }

    ?>
</body>
</html>