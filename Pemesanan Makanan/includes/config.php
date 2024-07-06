<?php
define('DB_SERVER', 'localhost:4306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food_ordering');

// connect database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// cek koneksi
if ($conn === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
