<?php
$servername = "xxxxxx";
$username = "xxxxxx";
$password = "xxxxxx";
$dbname = "GoFile";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}


?>