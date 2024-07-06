<?php
include_once 'includes/config.php';


$cartItems = [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <h1>Data Pemesan</h1>
    </header>
    <form action="checkout.php" method="POST">
        <div class="cart-items">
            <?php foreach ($cartItems as $item) : ?>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM menus WHERE id=" . $item['id']);
                $menu = mysqli_fetch_assoc($result);
                ?>
                <div class="cart-item">
                    <h3><?php echo $menu['name']; ?></h3>
                    <p>Quantity: <?php echo $item['quantity']; ?></p>
                    <p>Price: $<?php echo $menu['price'] * $item['quantity']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <label for="table_number">Table Number:</label>
        <input type="number" id="table_number" name="table_number" required>
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required>
        <button type="submit">Checkout</button>
    </form>
</body>

</html>