<?php
session_start();

require 'includes/config.php';  // Include database connection

$errors = [];
$inputs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_id'] = mysqli_fetch_assoc($result)['id'];
        header('Location: admin/panel_admin.php');
        exit;
    } else {
        $errorMessage = 'Username or password is incorrect';
    }

    $inputs['username'] = $username;
    $inputs['password'] = $password;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Food Ordering System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <h1>Login to Admin Panel</h1>
    </header>
    <main>
        <div class="login-container">
            <form action="login_page.php" method="post">
                <h1>Login</h1>
                <?php if (!empty($errorMessage)) { ?>
                    <p id="message" class="error"><?php echo $errorMessage; ?></p>
                <?php } ?>
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <section>
                    <button type="submit">Login</button>
                    <a href="index.php">Back to Home</a>
                </section>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Irfan Fauzan Rahman. All rights reserved.</p>
    </footer>
</body>

</html>