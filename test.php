<?php
$servername = "192.168.89.6";
$username = "selfwing";
$password = "JTWQ8395duvt";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
phpinfo();
?>
 