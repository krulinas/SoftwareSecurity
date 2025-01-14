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
    <title>Promotion Management</title>
    <link rel="stylesheet" type="text/css" href="promostyles.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Drawer Toggle Button -->
    <button class="drawer-toggle" onclick="toggleDrawer()">&#127849;</button>

    <!-- Drawer Navigation -->
    <div class="drawer" id="drawer">
        <div class="drawer-spacer"></div>
        <div class="drawer-header">
        </div>
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

    <!-- Refresh Snackbar -->
    <div class="snackbar">
        <button class="refresh-button" onclick="refreshPromotions()" title="Refresh">
            <img src="refreshicon.png" alt="Refresh Icon">
        </button>
    </div>

    <header>
        <h1>Promotions</h1>
    </header>

    <div class="container">
        <!-- Search Promotion Section -->
        <section id="search-promotion">
            <h2>Search Promotion</h2>
            <form onsubmit="searchPromotion(event)">
                <div class="form-group">
                    <input type="text" id="search-input" class="input-field" placeholder="Enter promotion name or category" required>
                </div>
                <button type="submit" class="button">Search</button>
            </form>
            <p id="search-message" class="message"></p>
        </section>

        <!-- Available Promotions Section -->
        <section id="available-promotions">
            <h2>Available Promotions</h2>
            <div id="promotion-list" class="promotion-list">
                <!-- Example promotions, replace with dynamic content -->
                <div class="promotion-item">
                    <h3>50% Off on Bakery Items</h3>
                    <p>Category: Bakery</p>
                    <p>Valid Till: 2024-12-31</p>
                </div>
                <div class="promotion-item">
                    <h3>Buy 1 Get 1 Free</h3>
                    <p>Category: Beverages</p>
                    <p>Valid Till: 2024-11-30</p>
                </div>
                <div class="promotion-item">
                    <h3>20% Off on Snacks</h3>
                    <p>Category: Snacks</p>
                    <p>Valid Till: 2024-12-15</p>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Roti Sri Bakery System. All Rights Reserved.</p>
    </footer>

    <script>
        function toggleDrawer() {
            const drawer = document.getElementById('drawer');
            drawer.classList.toggle('open');
        }

        function searchPromotion(event) {
            event.preventDefault();
            const searchInput = document.getElementById("search-input").value.toLowerCase();
            const promotionList = document.querySelectorAll(".promotion-item");
            let found = false;

            promotionList.forEach((promotion) => {
                const promotionName = promotion.querySelector("h3").textContent.toLowerCase();
                const promotionCategory = promotion.querySelector("p").textContent.toLowerCase();
                if (promotionName.includes(searchInput) || promotionCategory.includes(searchInput)) {
                    promotion.style.display = "block";
                    found = true;
                } else {
                    promotion.style.display = "none";
                }
            });

            const searchMessage = document.getElementById("search-message");
            searchMessage.textContent = found ? "" : "No promotions found.";
        }

        function refreshPromotions() {
            // Clear search input
            document.getElementById("search-input").value = "";

            // Show all promotions
            const promotionList = document.querySelectorAll(".promotion-item");
            promotionList.forEach((promotion) => {
                promotion.style.display = "block";
            });

            // Clear search message
            const searchMessage = document.getElementById("search-message");
            searchMessage.textContent = "";
        }
    </script>
</body>
</html>