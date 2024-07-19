<?php
include '../includes/config.php';

$id = $_GET['id'];
$query = "DELETE FROM menus WHERE id=$id";
if (mysqli_query($conn, $query)) {
    header('Location: panel_admin.php');
}
