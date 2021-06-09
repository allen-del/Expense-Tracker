<?php
/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect('localhost','allen','password', 'EST') or die("Some error occured while connecting to DB!");
 
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>