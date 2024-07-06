<?php
include 'includes/config.php';
$result = mysqli_query($conn, "SELECT * FROM menus");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <header>
        <h1>Sea Food Mas Rusdi</h1>
        <div class="cart-icon" onclick="toggleCart()">
            <i class="fas fa-shopping-cart"></i>
            <span id="cartCount">0</span>
        </div>
        <div class="cart-dropdown" id="cartDropdown">
            <ul id="cartItems">
                <!-- keranjang -->
            </ul>
            <div class="checkout">
                <p>Total: Rp<span id="cartTotal">0.00</span></p>
                <button onclick="checkout()">Bayar</button>
            </div>
        </div>
    </header>
    <main>
        <h2>Menu</h2>
        <div class="menu-items">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="menu-item">
                    <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <p><strong>Harga: Rp<?php echo $row['price']; ?></strong></p>
                    <button onclick="addToCart(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>', <?php echo $row['price']; ?>)">Tambah Ke Keranjang</button>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Irfan Fauzan Rahman. All rights reserved.</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>