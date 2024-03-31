<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product details from the form
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Initialize or retrieve cart from session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add product to cart
    $_SESSION['cart'][] = array(
        'name' => $product_name,
        'price' => $product_price
    );

    // Redirect back to the previous page or any other page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
} else {
    // If the form was not submitted via POST method, redirect to the homepage or any other page
    header("Location: index.php"); // Replace "index.php" with the appropriate page
    exit;
}
?>