<?php
session_start();
include 'includes/config.php';

$postData = file_get_contents("php://input");
$request = json_decode($postData, true);

if ($request) {
    $table_number = $request['table_number'];
    $customer_name = $request['customer_name'];
    $cartItems = $request['cart'];

    if (empty($table_number) || empty($customer_name)) {
        echo json_encode(['success' => false, 'message' => 'Nomor Meja dan Nama Pelanggan harus diisi']);
        exit();
    }

    $total_price = 0;
    foreach ($cartItems as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $query = "INSERT INTO orders (table_number, customer_name, total_price) VALUES ('$table_number', '$customer_name', '$total_price')";
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn);

        foreach ($cartItems as $item) {
            $menu_id = $item['id'];
            $quantity = $item['quantity'];
            $query = "INSERT INTO order_items (order_id, menu_id, quantity) VALUES ('$order_id', '$menu_id', '$quantity')";
            mysqli_query($conn, $query);
        }

        // Redirect with the order_id in the URL
        header("Location: order_success.php?order_id=$order_id");
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal membuat pesanan. Silakan coba lagi.']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Data tidak valid']);
    exit();
}
