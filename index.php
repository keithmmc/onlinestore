<?php
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>

    <div class="product-list">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM products");
        while ($product = mysqli_fetch_assoc($result)) {
            echo "<div class='product'>
                    <img src='{$product['image_url']}' alt='{$product['name']}'>
                    <h3>{$product['name']}</h3>
                    <p>\${$product['price']}</p>
                    <a href='product.php?id={$product['id']}'>View Product</a>
                  </div>";
        }
        ?>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
