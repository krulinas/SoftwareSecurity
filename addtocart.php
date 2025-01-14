<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'] ?? null;
    $quantity = $_POST['quantity'] ?? 1;

    if (!$productId || !is_numeric($quantity)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }

    echo json_encode(['status' => 'success', 'message' => 'Product added to cart!']);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);

?>