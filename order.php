<?php
session_start();

// Ensure the cart is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $productId = $_POST['productId'] ?? null;
    $productName = $_POST['productName'] ?? null;
    $productPrice = $_POST['productPrice'] ?? 0;
    $productImage = $_POST['productImage'] ?? '';
    $quantity = $_POST['quantity'] ?? 1;

    if ($action === 'add' && $productId && $productName) {
        // Ensure the product structure is correct
        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = [
                'name' => $productName,
                'price' => (float)$productPrice,
                'image' => $productImage,
                'quantity' => (int)$quantity,
            ];
        } else {
            $_SESSION['cart'][$productId]['quantity'] += (int)$quantity;
        }
    }
}

// Redirect back to the orderscreen.php
header('Location: orderscreen.php');
exit;