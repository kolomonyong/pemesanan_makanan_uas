<?php
include '../includes/config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM menus WHERE id=$id");
$menu = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $query = "UPDATE menus SET name='$name', description='$description', price='$price' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header('Location: panel_admin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <h1>Edit Menu</h1>
    <form action="edit_menu.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $menu['name']; ?>" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $menu['description']; ?></textarea>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $menu['price']; ?>" required>
        <button type="submit">Update Menu</button>
    </form>
</body>

</html>