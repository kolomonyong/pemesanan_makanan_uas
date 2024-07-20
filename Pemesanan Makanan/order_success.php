<?php
include 'includes/config.php';  // Adjust the path if needed

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if ($order_id === 0) {
    die('Invalid order ID.');
}

// Ambil detail pesanan dari database
$order_query = "SELECT * FROM orders WHERE id = $order_id";
$order_result = mysqli_query($conn, $order_query);

if (!$order_result || mysqli_num_rows($order_result) === 0) {
    die('Order not found.');
}

$order = mysqli_fetch_assoc($order_result);

// Ambil item pesanan dari database
$order_items_query = "SELECT oi.*, m.name, m.price 
                      FROM order_items oi 
                      JOIN menus m ON oi.menu_id = m.id 
                      WHERE oi.order_id = $order_id";
$order_items_result = mysqli_query($conn, $order_items_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <h1>Order Details</h1>
    </header>

    <?php if ($order && $order_items_result) : ?>
        <div class="receipt">
            <h2>Order ID: <?php echo $order['id']; ?></h2>
            <p>Table Number: <?php echo $order['table_number']; ?></p>
            <p>Customer Name: <?php echo $order['customer_name']; ?></p>
            <p>Total Price: Rp<?php echo number_format($order['total_price'], 2); ?></p>
            <hr>
            <h3>Order Items:</h3>
            <ul>
                <?php while ($item = mysqli_fetch_assoc($order_items_result)) : ?>
                    <li><?php echo $item['name']; ?> - Quantity: <?php echo $item['quantity']; ?> - Subtotal: Rp<?php echo number_format($item['quantity'] * $item['price'], 2); ?></li>
                <?php endwhile; ?>
            </ul>
            <p class="total">Total: Rp<?php echo number_format($order['total_price'], 2); ?></p>
        </div>

        <button class="print-button" onclick="window.print()">Print Receipt</button>
        <p>
            <a class="back-button" href="index.php">Back to Menu</a>
        </p>
    <?php else : ?>
        <p>No order found.</p>
    <?php endif; ?>

    <div class="social-share">
        <p>Share Receipt:</p>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://127.0.0.1:4306/order_success.php?order_id=' . $order['id']); ?>" target="_blank"><img src="images/fblogo.png" alt="Facebook"></a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('http://127.0.0.1:4306/order_success.php?order_id=' . $order['id']); ?>" target="_blank"><img src="images/xlogo.jpg" alt="Twitter"></a>
        <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode('http://127.0.0.1:4306/order_success.php?order_id=' . $order['id']); ?>&title=Order%20Receipt%20Details" target="_blank"><img src="images/linkedinlogo.png" alt="LinkedIn"></a>

        <footer>
            <p>&copy; 2024 Irfan Fauzan Rahman. All rights reserved.</p>
        </footer>
</body>

</html>