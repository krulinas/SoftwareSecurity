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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="supervisorstyles.css">
</head>

<body>
    <header>
        <h1>Supervisor Dashboard</h1>
    </header>

    <!-- Drawer Toggle Button -->
    <button class="drawer-toggle" onclick="toggleDrawer()">☰</button>

    <!-- Drawer Navigation -->
    <div class="drawer" id="drawer">
        <div class="drawer-spacer"></div>
        <div class="drawer-header"></div>
        <nav>
            <a href="supervisorscreen.php">Home</a>
            <a href="accountscreen.php">Order Management</a>
            <a href="productscreen.php">Inventory Management</a>
            <a href="orderscreen.php">Sales Reports</a>
            <a href="promotionscreen.php">Team Coordination</a>
            <a href="aboutscreen.php">Promotions and Discounts</a>
            <a href="homescreen.php">Logout</a>
        </nav>
    </div>

    <div id="main-content" class="main-content">
        <div class="container">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Manage and oversee bakery operations efficiently using the dashboard below.</p>

            <div class="dashboard">
                <div class="card">
                    <h2>Sales Reports</h2>
                    <p>View daily, weekly, and monthly sales performance.</p>
                    <a href="sales_reports.php">View Reports</a>
                </div>
                <div class="card">
                    <h2>Inventory Management</h2>
                    <p>Track stock levels and reorder points to ensure smooth operations.</p>
                    <a href="inventory.php">Manage Inventory</a>
                </div>
                <div class="card">
                    <h2>Customer Feedback</h2>
                    <p>Analyze customer feedback and improve bakery services.</p>
                    <a href="feedback.php">View Feedback</a>
                </div>
                <div class="card">
                    <h2>Employee Management</h2>
                    <p>Monitor and manage employee tasks and performance.</p>
                    <a href="employee_management.php">Manage Employees</a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Roti Sri Bakery. All Rights Reserved.</p>
    </footer>

    <script src="supervisorscreen.js"></script>
</body>

</html>