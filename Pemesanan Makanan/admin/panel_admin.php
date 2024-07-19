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
    <header>
        <h1>Manage Menu</h1>
    </header>
    <div class="container">
        <nav>
            <a href="add_menu.php">Tambah Menu</a>
            <a href="queue.php">Lihat Antrian</a>
        </nav>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td>Rp<?php echo number_format($row['price'], 2); ?></td>
                        <td>
                            <a href="edit_menu.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete_menu.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>&copy; 2023 Our Restaurant. All rights reserved.</p>
    </footer>
</body>

</html>