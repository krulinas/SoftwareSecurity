<?php
session_start();

// Ensure the cart is properly initialized
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Debugging: Output the session data for validation
// Uncomment for debugging
// echo '<pre>'; var_dump($_SESSION['cart']); echo '</pre>';

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $productId => $product) {
    if (is_array($product) && isset($product['price'], $product['quantity'])) {
        $totalPrice += $product['price'] * $product['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="orderstyles.css">
</head>
<body>
    <!-- Drawer Toggle Button -->
    <button class="drawer-toggle" onclick="toggleDrawer()">&#127849;</button>

    <!-- Drawer Navigation -->
    <div class="drawer" id="drawer">
        <div class="drawer-spacer"></div>
        <nav>
            <a href="homescreen.php">Home</a>
            <a href="accountscreen.php">My Account</a>
            <a href="productscreen.php">Products</a>
            <a href="orderscreen.php">My Orders</a>
            <a href="promotionscreen.php">Special Offers</a>
            <a href="aboutscreen.php">About</a>
            <a href="contactscreen.php">Contact Us</a>
        </nav>
    </div>

    <header>
        Shopping Cart
    </header>

    <div class="container">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $productId => $product): ?>
                        <?php if (is_array($product) && isset($product['name'], $product['price'], $product['quantity'], $product['image'])): ?>
                            <tr>
                                <td class="product-info">
                                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                                    <span><?php echo htmlspecialchars($product['name']); ?></span>
                                </td>
                                <td>RM<?php echo number_format($product['price'], 2); ?></td>
                                <td>
                                    <form action="order.php" method="POST" class="quantity-form">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                                        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" min="1" class="quantity-input">
                                        <button type="submit" class="update-btn">Update</button>
                                    </form>
                                </td>
                                <td>RM<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
                                <td>
                                    <form action="order.php" method="POST" class="action-form">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                                        <button type="submit" class="remove-btn">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">Invalid product data in cart.</td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Your cart is empty.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="cart-footer">
            <p>Total: RM<?php echo number_format($totalPrice, 2); ?></p>
            <form action="order.php" method="POST">
                <input type="hidden" name="action" value="clear">
                <button type="submit" class="clear-btn">Clear Cart</button>
            </form>
            <button class="checkout-btn">Checkout</button>
        </div>
    </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Roti Sri Bakery System. Freshly Baked with Love.</p>
            <p>Follow us: 
                <a href="#">Facebook</a> | 
                <a href="#">Instagram</a> | 
                <a href="#">Twitter</a>
            </p>
            <p><a href="terms.html">Terms & Conditions</a> | <a href="privacy.html">Privacy Policy</a></p>
        </footer>

        <script>
            function toggleDrawer() {
                const drawer = document.getElementById('drawer');
                drawer.classList.toggle('open');
            }
        </script>
</body>
</html>