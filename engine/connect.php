<?php
$servername = "innodb.endora.cz";
$username = "medicare";
$password = "12345678cfg33";
$db = "medicare";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>