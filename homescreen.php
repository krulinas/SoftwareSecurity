<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="homestyles.css?v=1.1">
    <script src="homescreen.js"></script>
</head>
<body>
    <!-- Drawer Toggle Button -->
    <button class="drawer-toggle" onclick="toggleDrawer()">&#127849;</button>

    <!-- Drawer Navigation -->
    <div class="drawer" id="drawer">
        <div class="drawer-spacer"></div>
        <nav>
            <a href="accountscreen.php">My Account</a>
            <a href="productscreen.php">Products</a>
            <a href="orderscreen.php">My Orders</a>
            <a href="promotionscreen.php">Special Offers</a>
            <a href="aboutscreen.php">About</a>
            <a href="contactscreen.php">Contact Us</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <header>
            <h1>Roti Sri Bakery</h1>
            <p>Your Partner in Baking Excellence</p>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <img src="bakeryhero.png" alt="Freshly baked goods" style="width: 100%; max-height: 400px; object-fit: cover; border-bottom: 5px solid #d42b1e;">
            <h2>Welcome to the Roti Sri Bakery</h2>
            <p>Track sales, manage orders, and grow your bakery business with ease.</p>
        </section>

        <section class="hotselling">
            <h1>Hot Sellings</h1>    
            <section class="carousel">
                <button class="carousel-button prev" onclick="moveSlide(-1)">&#9664;</button>
                    <div class="carousel-track-container">
                        <ul class="carousel-track">
                            <li class="carousel-slide">
                                <div class="product-item">
                                    <img src="pop_tarts_strawberry.png" alt="Pop-Tarts Frosted Strawberry">
                                    <p>POP-TARTS® FROSTED STRAWBERRY</p>
                                </div>
                            </li>
                            <li class="carousel-slide">
                                <div class="product-item">
                                    <img src="pop_tarts_cinnamon.png" alt="Pop-Tarts Frosted Brown Sugar Cinnamon">
                                    <p>POP-TARTS® FROSTED BROWN SUGAR CINNAMON</p>
                                </div>
                            </li>
                            <li class="carousel-slide">
                                <div class="product-item">
                                    <img src="pop_tarts_fudge.png" alt="Pop-Tarts Frosted Chocolatey Fudge">
                                    <p>POP-TARTS® FROSTED CHOCOLATEY FUDGE</p>
                                </div>
                            </li>
                            <li class="carousel-slide">
                                <div class="product-item">
                                    <img src="original_glazed.png" alt="Original Glazed Doughnut">
                                    <p>ORIGINAL GLAZED® DOUGHNUT</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                <button class="carousel-button next" onclick="moveSlide(1)">&#9654;</button>
            </section>
        </section>

        <section id="nearest-shop" class="shop-section">
            <div class="shop-container">
                <div class="shop-image">
                    <img src="neareststore.png" alt="Krispy Kreme Team">
                </div>
                <div class="shop-details">
                    <h2>SWING BY</h2>
                    <p>Your Nearest Krispy Kreme Shop</p>
                    <p><strong>Alor Setar - Taman Kenari</strong></p>
                    <p>123 Jalan Merpati,<br>Taman Kenari,<br>05000 Alor Setar,<br>Kedah, Malaysia.</p>
                    <p><em>Open until 11:00 PM</em></p>
                    <div class="shop-buttons">
                        <a href="#" class="order-now-button">Order Now</a>
                        <a href="#" class="shops-button">Shops</a>
                        <a href="#" class="show-hours-button">Show Hours</a>
                    </div>
                </div>
            </div>
        </section>

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
    </div>

</body>
</html>
