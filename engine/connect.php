<?php
$servername = "sql.endora.cz";
$username = "cdusport";
$password = "12345678cfg33";
$db = "cdusportdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>