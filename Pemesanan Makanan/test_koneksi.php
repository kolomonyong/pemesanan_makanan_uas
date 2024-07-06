<?php
$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "food_ordering";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
