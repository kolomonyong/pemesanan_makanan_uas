<?php
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/$image");

    $query = "INSERT INTO menus (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Menu</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <h1>Add New Menu</h1>
    <form action="add_menu.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>
        <button type="submit">Add Menu</button>
    </form>
</body>

</html>