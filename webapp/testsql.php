 <?php

ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);


$servername = "192.168.0.34";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?> 
