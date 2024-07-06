<?php
session_start();
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table_number = $_POST['table_number'];
    $customer_name = $_POST['customer_name'];
    $cartItems = $_SESSION['cart'];

    // Calculate total price
    $total_price = 0;
    foreach ($cartItems as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    // Insert order
    $query = "INSERT INTO orders (table_number, customer_name, total_price) VALUES ('$table_number', '$customer_name', '$total_price')";
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn);

        // Insert order items
        foreach ($cartItems as $item) {
            $query = "INSERT INTO order_items (order_id, menu_id, quantity) VALUES ('$order_id', '" . $item['id'] . "', '" . $item['quantity'] . "')";
            mysqli_query($conn, $query);
        }

        // Clear the cart
        $_SESSION['cart'] = [];

        // Redirect to success page
        header('Location: order_success.php');
    }
}
