<?php
include('includes/db.php');
session_start();

$user_id = $_SESSION['user_id'];
$cart_items = mysqli_query($conn, "SELECT * FROM shopping_cart WHERE user_id = '$user_id'");

echo "<div class='cart-items'>";
while ($item = mysqli_fetch_assoc($cart_items)) {
    $product_id = $item['product_id'];
    $quantity = $item['quantity'];
    $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'"));
    
   
    echo "<div class='cart-item'>
            <img src='{$product['image_url']}' alt='{$product['name']}'>
            <h3>{$product['name']}</h3>
            <p>Quantity: {$quantity}</p>
            <p>Total: $" . ($product['price'] * $quantity) . "</p>
          </div>";
}
echo "</div>";
?>




