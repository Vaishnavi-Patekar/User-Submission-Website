<?php
$host = "localhost";
$user = "root"; // your MySQL username
$pass = "";     // your MySQL password (usually empty in XAMPP)
$dbname = "simple_site"; // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
