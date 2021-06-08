<?php
    include "./connect.php";
    session_start();;
    if (!isset($_SESSION["userid"])) header("location:index.html");
    if (!isset($_POST["submit"])) {
        $date = $_POST["date"];

        $q = "SELECT * FROM expense WHERE userid = '" . $_SESSION["userid"] . "' AND expdate = '$date' ORDER BY expspent DESC";
        $result = mysqli_query($mysqli, $q);
        $rows = mysqli_num_rows($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expense Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="loginhead"><h1 class="ets">Your Expense Tracking System™</h1></div>
    <h2>Select the Day to view your Spending History for that Day</h2>
    <hr>
    
    <form action="./daily.php" method="POST">
        <label for="date">Select the date:</label>
        <br><br>
        <input type="date" name="date" id="date">
        <br><br>
        <input type="submit" value="Search 🔎" class="searchbtn">
        <a href="menu.html" class="menubtn">Menu</a>
        <br><br><br>
    </form>
    <?php 
        if ( $rows == false ) {
            echo "No expense found for the date: $date";
        } else { 
            echo "Here's the list of Expenses <br><br>";

            echo '<div>';
            echo "<TABLE BORDER='1' ALIGN=\"LEFT\">";
            echo "<TR>";
            echo "<TH>&nbsp;Date of Spending&nbsp;</TH>";
            echo "<TH>&nbsp;Item&nbsp;</TH>";
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