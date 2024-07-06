<?php
include '../includes/config.php';

// Ambil semua data pesanan dari database
$orders_result = mysqli_query($conn, "SELECT * FROM orders ORDER BY order_time DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Order Queue</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <header>
        <h1>Order Queue</h1>
    </header>
    <main>
        <h2>List of Orders</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Table Number</th>
                        <th>Total Price</th>
                        <th>Order Time</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = mysqli_fetch_assoc($orders_result)) : ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td><?php echo $order['table_number']; ?></td>
                            <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                            <td><?php echo $order['order_time']; ?></td>
                            <td><a href="order_details.php?order_id=<?php echo $order['id']; ?>">View Details</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Our Restaurant. All rights reserved.</p>
    </footer>
</body>

</html>