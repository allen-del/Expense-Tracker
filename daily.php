<?php
    include "./connect.php";
    session_start();;
    if (!isset($_SESSION["userid"])) header("location:index.html");
    if (!isset($_POST["submit"])) {
        $date = $_POST["date"];

        $q = "SELECT * FROM expense WHERE userid = '" . $_SESSION["userid"] . "' AND expdate = '$date'";
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
    <title>Daily Expense</title>
</head>
<body>
    <h2>This is the daily expense page</h2>
    <form action="./daily.php" method="POST">
        <label for="date">Select the date:</label>
        <input type="date" name="date" id="date">
        <input type="submit" value="Search">
    </form>
    <?php 
        if ( $rows == false ) {
            echo "No expense found for the date $date";
        } else { 
            echo '<div>';
            echo "<TABLE BORDER='1' ALIGN=\"LEFT\">";
            echo "<TR>";
            echo "<TD>Item</TD>";
            echo "<TD>Spent</TD>";
            echo "</TR>";
            while ( $row = mysqli_fetch_array($result) ) {
                echo "<TR>";
                echo "<TD>".$row['expitem']."</TD>";
                echo "<TD>".$row['expspent']."</TD>";
                echo "</TR>";
            }
            echo '</div>';
        }

    ?>
</body>
</html>