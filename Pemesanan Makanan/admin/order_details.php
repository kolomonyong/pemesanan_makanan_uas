<?php
include '../includes/config.php';

$order_id = intval($_GET['order_id']);

// Ambil detail pesanan dari database
$order_query = "SELECT * FROM orders WHERE id = $order_id";
$order_result = mysqli_query($conn, $order_query);
$order = mysqli_fetch_assoc($order_result);

// Ambil item pesanan dari database
$order_items_query = "SELECT oi.*, m.name 
                      FROM order_items oi 
                      JOIN menus m ON oi.menu_id = m.id 
                      WHERE oi.order_id = $order_id";
$order_items_result = mysqli_query($conn, $order_items_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Order Details</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <header>
        <h1>Order Details</h1>
    </header>
    <main>
        <h2>Order ID: <?php echo $order['id']; ?></h2>
        <p>Customer Name: <?php echo htmlspecialchars($order['customer_name']); ?></p>
        <p>Table Number: <?php echo $order['table_number']; ?></p>
        <p>Total Price: $<?php echo number_format($order['total_price'], 2); ?></p>
        <p>Order Time: <?php echo $order['order_time']; ?></p>

        <h3>Order Items</h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = mysqli_fetch_assoc($order_items_result)) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>$<?php echo number_format($item['quantity'] * $item['price'], 2); ?></td>
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