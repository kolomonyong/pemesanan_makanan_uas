<?php
include '../includes/config.php';
$result = mysqli_query($conn, "SELECT * FROM menus");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Menu</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <h1>Manage Menu</h1>
    <a href="add_menu.php">Add New Menu</a>
    <a href="queue.php">Lihat Antrian</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>Rp<?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_menu.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_menu.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>