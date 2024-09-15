<?php
$servername = "localhost";
$username = "root";
$password = "admin4452";
$dbname = "inventory_ad";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>